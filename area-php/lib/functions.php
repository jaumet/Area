<?
## AREA functions

function connect($dataname) {
	if (file_exists('./lib/DataConfig.php')) {
	        include ('./lib/DataConfig.php');
	} else {
	       include ('./DataConfig.php');
	}
	$DBserver = $datas[$dataname]['db']['server'];
	$DBname = $datas[$dataname]['db']['name'];
	$DBuser = $datas[$dataname]['db']['user'];
	$DBpassw = $datas[$dataname]['db']['passw'];

	#echo "data: ".$DBserver." - ".$DBuser." - ".$DBpassw." - ".$DBname;
        $link = mysql_connect($DBserver, $DBuser, $DBpassw)
            or die('Could not connect: ' . mysql_error());
        mysql_select_db($DBname) or die('Could not select database');
}

#sub to escape mysql special chars
function myescape($escaped) {
	$escaped = str_replace("\\","\\\\", $escaped);
	$escaped = str_replace("'","\'", $escaped);
	return $escaped;
}

function get_distinct_values($param, $table, $dataname) {

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
	}
################## JAUME FIXME 

	$distinct = array();
	$query = "select distinct ".myescape($param)." from ".myescape($table)." where ".$param." != '' order by ".myescape($param).";";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	while ($line = mysql_fetch_assoc($result)) {
		array_push($distinct, htmlentities($line[$param]));
	}
	return $distinct;
}

function get_random_colors($num_colors, $factor)  {
	$colors = array();
	for ($i=0;$i<$num_colors;$i++) {
		$r = intval( 100+rand(0, 155));
		$rd = intval($r/1.5);
		$g = intval( 100+rand(0, 155));
		$gd = intval($g/1.5);
		$b = intval( 50+rand(0, 205));
		$bd = intval($b/1.5);
		$bgcolorc = "rgb(".$r.",".$g.",".$b.")";
		$bgcolord = "rgb(".$rd.",".$gd.",".$bd.")";  
		//$clear .= '<div style="float:left;width:30px;height:30px;padding:3px;background-color:'.$bgcolorc.';">'.$b.'</div>';
		//$dark .= '<div style="float:left;width:30px;height:30px;padding:3px;background-color:'.$bgcolord.';">'.$bd.'</div>';
		if ($factor == "dark")  {
			array_push($colors, $bgcolord);
		} else {
			array_push($colors, $bgcolorc);
		}
	}
	return $colors;
}
?>
