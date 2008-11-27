<?
global $base_path;
global $base_url;

include_once('./modules/area/lib/functions.php');
include('./modules/area/lib/DataConfig.php');

// Get the node-types list:
$blocks_selected = array();
$blocks_values_h = array();
$param1 = variable_get($area_param1, "type");
$query = "SELECT ".$param1.", name FROM {node_type};";
//////echo "query: ".$query;exit;
$result =  db_query($query);
while ($links = db_fetch_object($result)) {
	array_push($blocks_selected, $links->type);
	array_push($blocks_values_h, $links->name);
}

//$blocks_selected = $content_types;
//$blocks_values_h = $content_types_h;
$color_selected = $blocks_selected;
$color_values_h = $blocks_values_h;

$x = $panelx;
$y = $panely;

$randomcolor = 1;

// Filter?
$submitted_filter = $_REQUEST['submitted_filter']; //$submitted_filter = 1;


$filter_sticky = $_REQUEST['filter_sticky'];
if (!$filter_sticky) {
	$filter_sticky = 0;
	variable_set('filter_sticky', 0);
} else {
	$filter_sticky = 1;
	variable_set('filter_sticky' ,1);
}

if ($_REQUEST['tag']) {
	$tag = $_REQUEST['tag'];
} else {
	$tag = variable_get('tag', '');
}

$blocks = sizeof($blocks_selected);
$matrix = round(sqrt($blocks), 0);
while ($matrix*$matrix < $blocks) { $matrix++;}

$block_x = round($x/$matrix, 0);
$block_y = round($y/$matrix, 0);

//Getting max num the nodes in a block
$block_array = $blocks_selected;
$block_array_h = $blocks_values_h;

$d = $datas[$dataname];
$nodes_per_block_max[0] = 0;
foreach ($block_array as $bl) {
	$query = "SELECT COUNT(*) FROM {".area_myescape($d['table'])."} WHERE ".area_myescape($param1)."='".area_myescape($bl)."';";
	$result =  db_query($query);
	$nodes_per_block = db_fetch_array($result);

	## add nodes per block to the array as a value
	$block1_array[$bl] = $nodes_per_block['COUNT(*)'];
	if ($nodes_per_block['COUNT(*)'] > $nodes_per_block_max[0]) { 
		$nodes_per_block_max[0] = $nodes_per_block['COUNT(*)'];
		$nodes_per_block_max[1] = $bl;
	}
}
$matrix_nodes = round(sqrt($nodes_per_block_max[0]), 0);
if ($matrix_nodes*$matrix_nodes < $nodes_per_block_max[0]) { $matrix_nodes++;}
$block_px = intval($block_x/$matrix_nodes);

$color_joins = array_combine($color_selected, $color_values_h);
$num_colors = sizeof($color_selected);

if ($x<=50 or $y<=50) { 
	$x = 800; $y=600;
}

## Legend
if ($d['fields'][$param1]['label']) { 
	$pa1 = $d['fields'][$param1]['label'];
} else {
	$pa1 = $param1;
}
if ($d['fields'][$param2]['label']) { 
	$pa2 = $d['fields'][$param2]['label'];
} else {
	$pa2 = $param2;
}

####### list of selected values / join values / colors
## make colors if is needed:
$colors = area_get_random_colors($num_colors); 

// Is this only one block or the whole area?
if (variable_get('area_block_type', "page") != "All types") { 
	$block_array = array(0 => variable_get('area_block_type', "page"));
	$block_array_h= array(0 => variable_get('area_block_type', "page"));
}

$n = 0;
$p = $color_selected;
$p_h = $color_values_h;
$p2 = array();
foreach ($colors as $col) {
	if ($area_block != 1) { 
		$page_content .= '<span class="legend" style="background-color: '.$col.';">'.$p_h[$n].'</span>'."\n";
	}
	## 1: building array param2 <-> colors
	array_push($p2, $p[$n]);
	$n++;
}
## and 2: building array param2 <-> colors
$colors_array = array_combine($p2 , $colors);

//if ($filter_sticky == 1) { $checked = "checked=\"checked\""; }

$page_content .= '<form action="#" id="filter" method="post" name="filter">'."\n".'
<input id="submitted_filter" name="submitted_filter" value="1" type="hidden">'."\n".'
<input id="tag" name="tag" value="'.$tag.'" type="text" size="10">
<input id="filter_submit" name="_submit" value="filter" type="submit">
<!--<input type="checkbox" name="filter_sticky" value="1" '.$checked.' > -->
</form>'."\n";

## panel
$page_content .= '<div class="panel" style="width: '.(intval(($block_x*1.05)*$matrix)).'px">'."\n";

########### Building blocks and nodes
$correct = intval($matrix_nodes * 1.1);
$blockstyle = "width: ".($block_x + $correct)."px; height:".($block_y + 30)."px;";

## for quantum:
$nodestyle = "width: ".intval(($block_x/$matrix_nodes))."px; height:".intval(($block_y/$matrix_nodes))."px;";

$qqq = "";

if ($submitted_filter == 1) {
	$qqq = "(";
	foreach ($d['fields'] as $key => $value) {
		if ($d['fields'][$key]['filter'] == 1)  {
		  if ($d['fields'][$key]['join'])  {
		    $qqq .= " LOWER(".area_myescape($d['table']).".".$key.") LIKE LOWER('%%".$tag."%%') OR ";
		  } else {
		    $qqq .= " LOWER(".area_myescape($d['table']).".".$key.") LIKE LOWER('%%".$tag."%%') OR ";
		  }
		}
	}
	if (substr($qqq, -3) == "OR ") {
$qqq = substr($qqq, 0, -3);
}
	$qqq .= ")";
}

$s = 0;
$total_nodes = 0;
$dark_nodes = 0;
foreach ($block_array as $bl) {
	$page_content .= '<div class="areablock" style="'.$blockstyle.'">'."\n";
	$page_content .= '<div class="blockname">'.$block_array_h[$s].' ('.$block1_array[$bl].')</div>';
	$s++;
	if ($block1_array[$bl])  {
		if ($quantum != "quantum") { 
			$matrix_nodes = round(sqrt($block1_array[$bl]), 0);
			while ($matrix_nodes*$matrix_nodes < $block1_array[$bl]) { $matrix_nodes++;}
			$nodestyle = "width: ".(($block_x/$matrix_nodes) - 2)."px; height:".($block_y)/$matrix_nodes."px;";
		}

		## Param2 and colors
		$filter_array = array();
		if ($submitted_filter == 1) {
			$query = "SELECT ".area_myescape($d['pkey'])." 
				FROM ".area_myescape($d['table'])." 
				WHERE ".area_myescape($param1)."='".area_myescape($bl)."' AND ";

			if ($qqq) { $query .= $qqq; }
	
			$query .= " ORDER BY '".$d['pkey']."', ".area_myescape($param2).";";
			$result =  db_query($query);
			while ($line = db_fetch_object($result)) {
				array_push($filter_array, $line->$d['pkey']);
			}
		}			
		$query = "SELECT ".area_myescape($param2).", ".area_myescape($d['pkey'])." 
		FROM ".area_myescape($d['table'])." 
		WHERE ".area_myescape($param1)."='".area_myescape($bl)."'  
		ORDER BY '".$d['pkey']."', ".area_myescape($param2).";";
		$result =  db_query($query);
		$cl = array(); $id_array = array();
		while ($line = db_fetch_object($result)) {
			array_push($cl, $line->$param2);
			array_push($id_array, $line->$d['pkey']);
		}
		for ($i=0;$i<($block1_array[$bl]);$i++) {
			$rgb = $colors_array[$cl[$i]];
			$id  = $id_array[$i];
			if (!in_array($id, $filter_array) and $submitted_filter == 1) { 
				$rgb = area_get_dark_color($rgb);
				$dark_nodes++;
			}
			$total_nodes++;
			$page_content .= '<div class="areanode" id="block-'.$id.'" name="block-'.$id.'" style="background-color:'.$rgb.';'.$nodestyle.';" title="'.$color_joins[$cl[$i]]."-".$cl[$i].'"  onclick="javascript:location.href=\''.url('node/'.htmlentities($id)).'\';"></div>'."\n";
		}
	}
	$page_content .= "</div>"."\n";
}

$page_content .= "</div>"."\n";
$page_content .= "<div class='clear'></div>"."\n";

?>
