<?

$fields = array();

#preparacio de la taula en questio
$query = "SELECT * FROM ".myescape($d['table']).";";
$result = mysql_query($query) or die('Query select table: ' . mysql_error());

$numfields = mysql_num_fields($result);
$numrows = mysql_num_rows($result); 
$r = mysql_query("show columns from ".$d['table']);
if (mysql_num_rows($r) > 0) {
	while ($row = mysql_fetch_assoc($r)) {
		array_push($fields, $row['Field']);
	}
}

$bad = array();
$good = array();

foreach ($fields as $n) {
	// get config for this field
	$f=$f[$n];

	if (!$f) {
		$alert = '<div id="alert><p>".$f." ->note: field named $n is not';
		$alert .= ' defined in the DataConfig file!</p></div>'."\n";
	}

	# Count distinct values per field
	# array: field -> distinct_number
	$query = "select count(distinct $n) FROM ".myescape($d['table']).";";
	$result = mysql_query($query) or die('Query count distinc L11: ' . mysql_error());
	$numdistinct = mysql_fetch_array($result);
	$numdistinct = $numdistinct[0];

	# null values per field
	$query = "select count(*) from ".myescape($d['table'])." where ".myescape($n)."='' or ".myescape($n)." is null;";
	$result = mysql_query($query) or die('Query count step1 L39: ' . mysql_error());
	$numnull = mysql_fetch_array($result);
	$numnull = $numnull[0];

	$percdistinct = number_format(($numdistinct*100)/($numrows - $numnull +1), 2);
	$percnotnull  = number_format((($numrows - $numnull)*100)/$numrows, 2);


	if ($f[$n]['label']) {
		$humann = $f[$n]['label'];
	} else {
		$humann = str_replace("_"," ", $n);
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
			$options .= '<option value="'.$n.'" >'.$humann.'</option>'."\n";	
	}

}

	//print_r($options);exit;


?>
