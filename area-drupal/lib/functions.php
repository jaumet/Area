<?
## AREA functions

/*function connect($dataname) {
	if (file_exists('/var/www/vis/modules/area/lib/DataConfig.php')) {
	        include ('/var/www/vis/modules/area/lib/DataConfig.php');
	} else {
	       include ('/var/www/vis/modules/area/DataConfig.php');
	}
	$DBserver = $datas[$dataname]['db']['server'];
	$DBname = $datas[$dataname]['db']['name'];
	$DBuser = $datas[$dataname]['db']['user'];
	$DBpassw = $datas[$dataname]['db']['passw'];

	#echo "data: ".$DBserver." - ".$DBuser." - ".$DBpassw." - ".$DBname;
        $link = mysql_connect($DBserver, $DBuser, $DBpassw)
            or die('Could not connect: ' . mysql_error());
        mysql_select_db($DBname) or die('Could not select database');
	mysql_query("SET NAMES 'utf8'");
}
*/
#sub to escape mysql special chars
function myescape($escaped) {
	$escaped = str_replace("\\","\\\\", $escaped);
	$escaped = str_replace("'","\'", $escaped);
	return $escaped;
}

function get_possible_params($table, $dataname) {
	include_once('/var/www/vis/modules/area/lib/AreaConfig.php');
	include_once('/var/www/vis/modules/area/lib/DataConfig.php');

	$fields = array();
	$query = "SELECT * FROM ".myescape($table).";";
	$result = db_query($query);

	$numfields = mysql_num_fields($result);
	$numrows = mysql_num_rows($result); 
	$r = db_query("show columns from ".$table);
	if (mysql_num_rows($r) > 0) {
	   while ($row = mysql_fetch_assoc($r)) {
		array_push($fields, $row['Field']);
	   }
	}
	$bad = array();
	$good = array();
	$goodlist = array();
	foreach ($fields as $n) {
		// get config for this field
		$f=$d['fields'][$n];
		if (!$f) {
			$alert = '<div id="alert><p>".$f." ->note: field named $n is not';
			$alert .= ' defined in the DataConfig file!</p></div>'."\n";
		}
		# Count distinct values per field
		# array: field -> distinct_number
		$query = "select count(distinct $n) FROM ".myescape($table).";";
		$result = db_query($query);
		$numdistinct = mysql_fetch_array($result);
		$numdistinct = $numdistinct[0];
		# null values per field
		$query = "select count(*) from ".myescape($table)." where ".myescape($n)."='' or ".myescape($n)." is null;";
		$result = db_query($query);
		$numnull = mysql_fetch_array($result);
		$numnull = $numnull[0];
		#$count++;
		$percdistinct = number_format(($numdistinct*100)/($numrows - $numnull +1), 2);
		$percnotnull  = number_format((($numrows - $numnull)*100)/$numrows, 2);
		$humann = $n;
		if ($f['label']) {
			$humann = $f['label'];
		} else {
			$humann = str_replace("_"," ", $humann);
		}
		if (($percnotnull < $area_percnotnull ) 
		  or ($numdistinct > $area_numdistinct_max ) 
		  or ($numdistinct < $area_numdistinct_min)) {
			$class='bad';
			array_push($bad, $n);
			$htmlbad .= '<tr class="'.$class.'"><td>'.$humann.'</td><td> no null: '.($numrows - $numnull).' ('.$percnotnull.' %) </td><td> distinct values: '.$numdistinct.' ('.$percdistinct.' %)</td></tr>'."\n\n";
		} else {
			$class='good';
			array_push($good, $n);
			$htmlgood .= '<tr class="'.$class.'"><td>'.$humann.'</td><td> no null: '.($numrows - $numnull).' ('.$percnotnull.' %) </td><td> distinct values: '.$numdistinct.' ('.$percdistinct.' %)</td></tr>'."\n\n";
			//$options .= '<option value="'.$n.'">'.$humann.'</option>\n';
			//array_push($options, $n);
		}
	}
	$good = array_combine($good, $good);
	return $good;
}

function get_distinct_values($param, $table, $dataname) { /// used in area2.php
	## Is there any join in the config?
	if (file_exists('./lib/DataConfig.php')) {
	        include ('./lib/DataConfig.php');
	} else {
	       include ('./DataConfig.php');
	}
	if ($datas[$dataname]['fields'][$param]['join']) {
		$join_table = $datas[$dataname]['fields'][$param]['join']['table'];
		$join_key = $datas[$dataname]['fields'][$param]['join']['key'];
		$join_val = $datas[$dataname]['fields'][$param]['join']['val'];
		$query = "SELECT DISTINCT 
		".myescape($table).".".myescape($param).", ".$join_table.".".myescape($join_val)." 
		FROM ".myescape($table).", ".$join_table." 
		WHERE ".myescape($table).".".$param." != '' 
		AND ".myescape($table).".".myescape($param)." = ".$join_table.".".myescape($join_key)."
		ORDER BY ".myescape($table).".".myescape($param).";";
		$combine = "yes";
//		echo "<hr />".$query."<hr />";
	} else {
		$query = "SELECT DISTINCT ".myescape($param)." 
			FROM ".myescape($table)." 
			WHERE ".$param." != '' 
			ORDER BY ".myescape($param).";";
	}
	$distinct = array(); $distinct_key = array(); $distinct_val = array();
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	while ($line = mysql_fetch_array($result)) {
		array_push($distinct_key, htmlentities($line[0]));
		array_push($distinct_val, htmlentities($line[1]));
	}
	if ($combine == "yes") { 
		$distinct = array_combine($distinct_key, $distinct_val);
		array_push($distinct, "__join_needed__");
	} else { 
		$distinct = $distinct_key; 
	}
	return $distinct;
}

function get_random_colors($num_colors)  {
	$colors = array();
	for ($i=0;$i<$num_colors;$i++) {
		$r = intval( 100+rand(0, 155));
		$g = intval( 100+rand(0, 155));
		$b = intval( 50+rand(0, 205));
		$bgcolorc = "rgb(".$r.",".$g.",".$b.")";
		array_push($colors, $bgcolorc);
	}
	
	return $colors;
}
function get_dark_color($rgb)  {
	$rgb1 = substr($rgb, 4, -1);
	$rgb2 = split(",", $rgb1);
	$rd = intval($rgb2[0]/2.5);
	$gd = intval($rgb2[1]/2.5);
	$bd = intval($rgb2[2]/2.5);
	$dark = "rgb(".$rd.",".$gd.",".$bd.")"; 
	return $dark;
}

?>
