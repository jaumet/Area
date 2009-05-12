<?
$table = $d['table'];
$blocks_selected = get_distinct_values($param1, $table, $dataname);
$param1_list_copy = $blocks_selected;
if (array_pop($param1_list_copy) == "__join_needed__") { 
	array_pop($blocks_selected);
	$blocks_values_h = array_values($blocks_selected);
	$param1_list = array_keys($blocks_selected);
} else {
	$blocks_values_h = $blocks_selected;
}

$color_selected = get_distinct_values($param2, $table, $dataname);
$param2_list_copy = $color_selected;
if (array_pop($param2_list_copy) == "__join_needed__") {
	array_pop($color_selected);
	$color_values_h = array_values($color_selected);
	$color_selected = array_keys($color_selected);
} else {
	$color_values_h = $color_selected;
}


?>
