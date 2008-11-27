<?
## AREA functions

#sub to escape mysql special chars
function area_myescape($escaped) {
	$escaped = str_replace("\\","\\\\", $escaped);
	$escaped = str_replace("'","\'", $escaped);
	return $escaped;
}

function area_get_distinct_values($param, $table, $dataname) { /// used in area2.php
	## Is there any join in the config?
	if ($datas[$dataname]['fields'][$param]['join']) {
		$join_table = $datas[$dataname]['fields'][$param]['join']['table'];
		$join_key = $datas[$dataname]['fields'][$param]['join']['key'];
		$join_val = $datas[$dataname]['fields'][$param]['join']['val'];
		$query = "SELECT DISTINCT 
		".area_myescape($table).".".area_myescape($param).", ".$join_table.".".area_myescape($join_val)." 
		FROM ".area_myescape($table).", ".$join_table." 
		WHERE ".area_myescape($table).".".$param." != '' 
		AND ".area_myescape($table).".".area_myescape($param)." = ".$join_table.".".area_myescape($join_key)."
		ORDER BY ".area_myescape($table).".".area_myescape($param).";";
		$combine = "yes";
//		echo "<hr />".$query."<hr />";
	} else {
		$query = "SELECT DISTINCT ".area_myescape($param)." 
			FROM ".area_myescape($table)." 
			WHERE ".$param." != '' 
			ORDER BY ".area_myescape($param).";";
	}
	$distinct = array(); $distinct_key = array(); $distinct_val = array();
	$result = db_query($query) or die('Query failed: ' . mysql_error());
	while ($line = db_fetch_object($result)) {

		array_push($distinct, $line->$param);
	}
	array_unshift($distinct, 'All nodes');
	return $distinct;
}

function area_get_random_colors($num_colors)  {
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
function area_get_dark_color($rgb)  {
	$rgb1 = substr($rgb, 4, -1);
	$rgb2 = split(",", $rgb1);
	$rd = intval($rgb2[0]/2.5);
	$gd = intval($rgb2[1]/2.5);
	$bd = intval($rgb2[2]/2.5);
	$dark = "rgb(".$rd.",".$gd.",".$bd.")"; 
	return $dark;
}

?>
