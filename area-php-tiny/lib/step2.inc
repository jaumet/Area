<?

$table = $d['table'];
$param1_list = get_distinct_values($param1, $table, $dataname);
$param1_list_copy = $param1_list;
if (array_pop($param1_list_copy) == "__join_needed__") { 
	array_pop($param1_list);
	$param1_list_val = array_values($param1_list);
	$param1_list = array_keys($param1_list);
} else {
	$param1_list_val = $param1_list;
}

$param2_list = get_distinct_values($param2, $table, $dataname);
$param2_list_copy = $param2_list;
if (array_pop($param2_list_copy) == "__join_needed__") {
	array_pop($param2_list);
	$param2_list_val = array_values($param2_list);
	$param2_list = array_keys($param2_list);
} else {
	$param2_list_val = $param2_list;
}


?>
