<?
include_once('/var/www/vis/modules/area/lib/functions.php');
include_once('/var/www/vis/modules/area/lib/AreaConfig.php');
include_once('/var/www/vis/modules/area/lib/preset.inc');
include_once('/var/www/vis/modules/area/lib/DataConfig.php');

## Handling session:
//session_start();

############## $vars_block -> $vars_block
//if (isset($vars_block['block_selected']) ) {
	
//}
$dataname = $vars_block['datasrcname'];
$param1 = $vars_block['param1'];
$param2 = $vars_block['param2'];

// Get the node-types list:
$content_types = array();
$content_types_h = array();
$query = "SELECT type, name FROM {node_type};";
$result =  db_query($query);
//$content_types = mysql_fetch_array($result);
 while ($links = db_fetch_object($result)) {
	array_push($content_types, $links->type);
	array_push($content_types_h, $links->name);
}
//print_r($content_types);

$blocks_selected = $content_types;
$blocks_values = $content_types;
$blocks_values_h = $content_types_h;
$color_selected = $content_types;
$color_values = $content_types;
$color_values_h = $content_types_h;
if ($vars_block['panelx'] and $vars_block['panely']) {
	$x = $vars_block['panelx'];
	$y = $vars_block['panely'];
} else {
	$x = $vars_block['panelx'];
	$y = $vars_block['panely'];
}

if (isset($vars_block['quantum'])) {
	$vars_block['quantum'] = $vars_block['quantum'];
}
$quantum = $vars_block['quantum'];

if (isset($vars_block['randomcolor'])) {
	$vars_block['randomcolor'] = $vars_block['randomcolor'];
}
$randomcolor = $vars_block['randomcolor'];
if ($vars_block['submitted_filter'] == 1) {
	$vars_block['submitted_filter'] = $vars_block['submitted_filter'];
	$vars_block['tag'] = $vars_block['tag'];
}
$submitted_filter = $vars_block['submitted_filter'];
$tag = $vars_block['tag'];

########################  html start
/*$page_content .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">\n
	<head>
	<title>:: AREA :: when data talks - Step 3</title>\n
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n
	<link rel=\"SHORTCUT ICON\" href=\"imgs/logoareapetit.png\" />\n
	<link href=\"./css/area.css\" rel=\"stylesheet\" type=\"text/css\" />\n
	<script language=\"javascript\" src=\"./js/area.js\"></script>
	<script language=\"javascript\" src=\"./js/prototype.js\"></script>
</head>\n
<body>\n";
*/

//$page_content .= "<div class='debug'>";
//$page_content .= "REQUEST<br /><pre>";
//print_r($vars_block);
//$page_content .= "</pre><hr />quantum?".$quantum."<br />";
//$page_content .= "<hr />BLOCKS<br />";
$page_content .= "Content type: ";print_r($content_types);echo "<br />";
$page_content .= "Num of blocks seleccionats: ".sizeof($blocks_selected)."<br />";
$page_content .= "Num of blocks possibles: ".sizeof($blocks_values)."<br />";

$blocks = sizeof($blocks_selected);
$matrix = round(sqrt($blocks), 0);
while ($matrix*$matrix < $blocks) { $matrix++;}
//$page_content .= "Blocks matrix size:".$matrix." x ".$matrix."<br />";

$block_x = round($x/$matrix, 0);
$block_y = round($y/$matrix, 0);
//$page_content .= "Desired size ( ".$x.", ".$y." )<br />";
//$page_content .= "Size of each block: ".$block_x." px / ".$block_y." px<br />";

//Getting max num the nodes in a block
$block_array = $blocks_selected;
$block_array_h = $blocks_values_h;

$d = $datas[$dataname];
//connect($dataname);
$nodes_per_block_max[0] = 0;

foreach ($block_array as $bl) {
	$query = "SELECT COUNT(*) FROM {".myescape($d['table'])."} WHERE ".myescape($param1)."='".myescape($bl)."';";
	//$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	$result =  db_query($query);
	$nodes_per_block = mysql_fetch_array($result);
	## add nodes per block to the array as a value
	$block1_array[$bl] = $nodes_per_block[0];
	if ($nodes_per_block[0] > $nodes_per_block_max[0]) { 
		$nodes_per_block_max[0] = $nodes_per_block[0];
		$nodes_per_block_max[1] = $bl;
	}
}
//$page_content .= "Nodes per block max: ".$nodes_per_block_max[0]." -> ".$nodes_per_block_max[1]."<br />";
//while ($matrix_nodes*$matrix_nodes < ($nodes_per_block_max[0])) { $matrix_nodes++;}
$matrix_nodes = round(sqrt($nodes_per_block_max[0]), 0);
if ($matrix_nodes*$matrix_nodes < $nodes_per_block_max[0]) { $matrix_nodes++;}
//$page_content .= "<br />matrix nodes: ".$matrix_nodes;
//$page_content .= "<br />node x :".$block_x/$matrix_nodes." | node y : ".$block_y/$matrix_nodes;
//$page_content .= "Nodes matrix max: ".$matrix_nodes = (round(sqrt($nodes_per_block_max[0]), 0) + 0.8)."<br />";
//$page_content .= "<hr />COLORS<br />";

$color_joins = array_combine($color_selected, $color_values_h);
$num_colors = sizeof($color_selected);


//$page_content .= "Num of colors seleccionats: ".$num_colors."<br />";
//$page_content .= "Num of colors total: ".sizeof($color_values)."<br />";
//$page_content .= "<pre>";print_r($vars_block);print_r($color_joins);$page_content .= "</pre>";
//$page_content .= "</div>";

## Adding variables to the phpsession
//$vars_block['quantum'] = $quantum;
//$vars_block['param1_selected'] = $block_array;

## header
//$page_content .= '<div id="headerdiv">'."\n";
//$page_content .= "<h2><a href=\"/area\"><img src=\"./images/area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>\n";
//$page_content .= " AREA, visualization tool<br>\n";
//$page_content .= "</div>";

## formdiv
//if ($randomcolor == "yes") { 
//	$checkedr = ' checked="checked" '; $checkednr = ''; 
//} else {
//	$checkednr = ' checked="checked" '; $checkedr = ''; 
//}
//if ($quantum == "quantum") { 
//	$checkedq = ' checked="checked" '; $checkednq = ''; 
//} else {
//	$checkednq = ' checked="checked" '; $checkedq = ''; 
//}
if ($x<=50 or $y<=50) { 
	$x = 800; $y=600;
}

//$page_content .= '<div id="formdiv">'."\n";
//$page_content .= '<form action="area3.php" id="update" method="post" name="update">
//<div>
//Randomize colors
//<input '.$checkedr.' class="fb_radio" id="randomcolor_yes" name="randomcolor" value="yes" type="radio"> 
//<label class="fb_option" for="randomcolor_yes">yes</label>

//<input '.$checkednr.' class="fb_radio" id="randomcolor_no" name="randomcolor" value="no" type="radio"> <label class="fb_option" for="randomcolor_no">no</label>

//Type of visualization
//<input '.$checkedq.' class="fb_radio" id="quantum_quantum" name="quantum" value="quantum" type="radio"> 
//<label class="fb_option" for="quantum_quantum">quantum</label>

//<input '.$checkednq.' class="fb_radio" id="quantum_non_quantum" name="quantum" value="non-quantum" type="radio"> 
//<label class="fb_option" for="quantum_non_quantum">non-quantum</label>

//Size
//<input class="fb_input" id="panelx" maxlength="4" name="panelx" size="2" type="text" value="'.$x.'" />
//<b>x</b>
//<input class="fb_input" id="panely" maxlength="4" name="panely" size="2" type="text" value="'.$y.'" />

//<input class="fb_button" id="_submit" name="_submit" onclick="this.form._submit.value = this.value;" value="update" type="submit">
//<!--<input class="fb_button" id="_savethis" name="_savethis" onclick="javascript:showdiv(\'savethis\');" value="save this">-->
//</div>
//</form>';
//$page_content .= "</div>";

## Legend
# FIXME ????
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



//$page_content .= '<div id="legend">'."\n";
//$page_content .= 'LEGEND: '.$pa1.' <-> '.$pa2.": ";

####### list of selected values / join values / colors
## make colors if is needed:
if (!$vars_block['colors'] or $randomcolor == "yes") { 
	$colors = get_random_colors($num_colors); 
} else {
	$colors = $vars_block['colors'];
}

$n = 0;
$p = $color_selected;
$p_v = $color_values_h;
$p2 = array();
foreach ($colors as $col) {
	//$page_content .= '<span class="legend" style="background-color: '.$col.';">'.$p_v[$n].'</span>'."\n";
	## 1: building array param2 <-> colors
	array_push($p2, $p[$n]);
	$n++;
}

if ($p2) { 
	$vars_block['p2'] = $p2; 
}

if ($colors) { 
	$vars_block['colors'] = $colors; 
}

## and 2: building array param2 <-> colors

if ($colors_array) { 
	$vars_block['colors_array'] = $colors_array; 
} else {
	$colors_array = array_combine($vars_block['p2'] , $colors);
}

//$page_content .= "</div>";

## panel
//$page_content .= '<div class="panel" style="">'."\n";
/////FIXME 
if ($matrix_nodes < 1) {$matrix_nodes = 1;}
########### Building blocks and nodes
$blockstyle = "width: ".($block_x)."px; height:".($block_y + 50)."px;";

## for quantum:
$nodestyle = "width: ".(($block_x)/($matrix_nodes) - 2)."px; height:".intval(($block_y/$matrix_nodes))."px;";

$qqq = "";
if ($submitted_filter == 1) {
	$qqq = "(";
	foreach ($d['fields'] as $key => $value) {
		if ($d['fields'][$key]['filter'] == 1)  {
		  if ($d['fields'][$key]['join'])  {
		    $qqq .= " LOWER(".myescape($d['table']).".".$key.") LIKE LOWER('%%".$tag."%%') OR ";
		  } else {
		    $qqq .= " LOWER(".myescape($d['table']).".".$key.") LIKE LOWER('%%".$tag."%%') OR ";
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
	$page_content .= '<div class="blockname">'.$block_array_h[$s].'( '.$block1_array[$bl].')</div>';
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
			$query = "SELECT ".myescape($d['pkey'])." 
				FROM ".myescape($d['table'])." 
				WHERE ".myescape($param1)."='".myescape($bl)."' AND ";

			if ($qqq) { $query .= $qqq; }
	
			$query .= " ORDER BY ".myescape($param2).";";
			//$page_content .= "<br />query: ".$query."<br />";
			//$result = mysql_query($query) or die('Query filter param2: ' . mysql_error());
			$result =  db_query($query);
			while ($line = mysql_fetch_array($result)) {
				array_push($filter_array, $line[0]);
			}
		}			
		$query = "SELECT ".myescape($param2).", ".myescape($d['pkey'])." 
		FROM ".myescape($d['table'])." 
		WHERE ".myescape($param1)."='".myescape($bl)."'  
		ORDER BY ".myescape($param2).";";
		//$page_content .= "<br />query: ".$query."<br />";
		//$result = mysql_query($query) or die('Query select param2: ' . mysql_error());
		$result =  db_query($query);
		$cl = array(); $id_array = array();
		while ($line = mysql_fetch_array($result)) {
			array_push($cl, $line[0]);
			array_push($id_array, $line[1]);
		}
		for ($i=0;$i<($block1_array[$bl]);$i++) {
			$rgb = $colors_array[$cl[$i]];
			$id  = $id_array[$i];
			if (!in_array($id, $filter_array) and $submitted_filter == 1) { 
				$rgb = get_dark_color($rgb);
				$dark_nodes++;
			}
			$total_nodes++;
			$page_content .= '<div class="areanode" id="block-'.$id.'" name="block-'.$id.'" style="background-color:'.$rgb.';'.$nodestyle.';" title="'.$color_joins[$cl[$i]]."-".$cl[$i].'"  onclick="javascript:showdiv(\'node_info\');area_info(\''.htmlentities($id).'\', \''.$dataname.'\');"></div>';
		}
	}
	$page_content .= "</div>"."\n";
}

//$page_content .= "</div><br />"."\n";
$sesion_id = session_id();
//$page_content .= '
//<div id="preview" style="height: 600px; left: '.($x + intval($x/20)).'px;"><h3>Search here:</h3>
//<form action="area3.php" id="filter" method="post" name="filter">'."\n".'
//<input id="submitted_filter" name="submitted_filter" value="1" type="hidden">'."\n".'
//<h3>Filter by tag:</h3>'."\n".'
//<input class="fb_input" id="tag" name="tag" value="" type="text">
//<input class="fb_button" id="filter_submit" name="_submit" value="filter" type="submit">
//</form>'."\n";

//if ($tag != "") { $page_content .= '<p>Filter:<span class="tag">'.$tag.'</span><br /> Found: <span class="tag">'.($total_nodes - $dark_nodes).' ('.round(((1 - ($dark_nodes/$total_nodes))*100), 2).'%)</span></p>'; }

//$page_content .= '<h2>About <b>this</b> AREA: <br />Name: '.$d['name'].'<br />Description: '.$d['description'].'</h2>';
//$page_content .= '<p> Total nodes: '.$total_nodes.'</p>';

//$page_content .= "<hr />";
//$page_content .= '<p>* Possible representations: <b>'.$d['max_representations'].'</b></p>'."\n";
//$page_content .= "</div>"."\n";

//$page_content .= '<div id="node_info" style="visibility: hidden;">
//</div>'."\n";
//$page_content .= '<div id="savethis" style="visibility: hidden;">
//</div>'."\n";
//$page_content .= "</body></html>";
?>
