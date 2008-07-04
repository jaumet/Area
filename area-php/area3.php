<?
include('./lib/functions.php');
include('./lib/DataConfig.php');
## Handling session:
session_start();

############## $_REQUEST -> $_SESSION
if (isset($_REQUEST['block_selected']) ) {
	$_SESSION = $_REQUEST;
}
$dataname = $_SESSION['datasrcname'];
$param1 = $_SESSION['param1'];
$param2 = $_SESSION['param2'];
$blocks_selected = $_SESSION['block_selected'];
$blocks_values = $_SESSION['block_values'];
$blocks_values_h = $_SESSION['block_values_h'];
$color_selected = $_SESSION['color_selected'];
$color_values = $_SESSION['color_values'];
$color_values_h = $_SESSION['color_values_h'];
if ($_REQUEST['panelx'] and $_REQUEST['panely']) {
	$x = $_REQUEST['panelx'];
	$y = $_REQUEST['panely'];
} else {
	$x = $_SESSION['panelx'];
	$y = $_SESSION['panely'];
}

if (isset($_REQUEST['quantum'])) {
	$_SESSION['quantum'] = $_REQUEST['quantum'];
}
$quantum = $_SESSION['quantum'];

if (isset($_REQUEST['randomcolor'])) {
	$_SESSION['randomcolor'] = $_REQUEST['randomcolor'];
}
$randomcolor = $_SESSION['randomcolor'];
if ($_REQUEST['submitted_filter'] == 1) {
	$_SESSION['submitted_filter'] = $_REQUEST['submitted_filter'];
	$_SESSION['tag'] = $_REQUEST['tag'];
}
$submitted_filter = $_SESSION['submitted_filter'];
$tag = $_SESSION['tag'];

########################  html start
echo <<<DOC
<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
DOC;
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
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


echo "<div class='debug'>";
echo "REQUEST<br /><pre>";
print_r($_REQUEST);
echo "</pre><hr />quantum?".$quantum."<br />";
echo "<hr />BLOCKS<br />";
echo "Num of blocks seleccionats: ".sizeof($blocks_selected)."<br />";
echo "Num of blocks possibles: ".sizeof($blocks_values)."<br />";
$blocks = sizeof($blocks_selected);
$matrix = round(sqrt($blocks), 0);
while ($matrix*$matrix < $blocks) { $matrix++;}
echo "Blocks matrix size:".$matrix." x ".$matrix."<br />";

$block_x = round($x/$matrix);
$block_y = round($y/$matrix);
echo "Desired size ( ".$x.", ".$y." )<br />";
echo "Size of each block: ".$block_x." px / ".$block_y." px<br />";

//Getting max num the nodes in a block
$block_array = $blocks_selected;
$block_array_h = $blocks_values_h;

$d = $datas[$dataname];
connect($dataname);
$nodes_per_block_max[0] = 0;

foreach ($block_array as $bl) {
	$query = "SELECT COUNT(*) FROM ".myescape($d['table'])." WHERE ".myescape($param1)."='".myescape($bl)."';";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	$nodes_per_block = mysql_fetch_array($result);
	## add nodes per block to the array as a value
	$block1_array[$bl] = $nodes_per_block[0];
	if ($nodes_per_block[0] > $nodes_per_block_max[0]) { 
		$nodes_per_block_max[0] = $nodes_per_block[0];
		$nodes_per_block_max[1] = $bl;
	}
}
echo "Nodes per block max: ".$nodes_per_block_max[0]." -> ".$nodes_per_block_max[1]."<br />";
while ($matrix_nodes*$matrix_nodes < ($nodes_per_block_max[0])) { $matrix_nodes++;}
//echo "Nodes matrix max: ".$matrix_nodes = (round(sqrt($nodes_per_block_max[0]), 0) + 0.8)."<br />";
echo "<hr />COLORS<br />";

$color_joins = array_combine($color_selected, $color_values_h);
$num_colors = sizeof($color_selected);


echo "Num of colors seleccionats: ".$num_colors."<br />";
echo "Num of colors total: ".sizeof($color_values)."<br />";
echo "<pre>";print_r($_SESSION);echo "</pre>";
echo "</div>";

## Adding variables to the phpsession
//$_SESSION['quantum'] = $quantum;
//$_SESSION['param1_selected'] = $block_array;

## header
echo '<div id="headerdiv">'."\n";
echo "<h2><a href=\"/area\"><img src=\"./images/area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>\n";
echo " AREA, visualization tool<br>\n";
echo "</div>";

## formdiv
if ($randomcolor == "yes") { 
	$checkedr = ' checked="checked" '; $checkednr = ''; 
} else {
	$checkednr = ' checked="checked" '; $checkedr = ''; 
}
if ($quantum == "quantum") { 
	$checkedq = ' checked="checked" '; $checkednq = ''; 
} else {
	$checkednq = ' checked="checked" '; $checkedq = ''; 
}
if ($x<=50 or $y<=50) { 
	$x = 800; $y=600;
}

echo '<div id="formdiv">'."\n";
echo '<form action="area3.php" id="update" method="post" name="update">
<div>
Randomize colors
<input '.$checkedr.' class="fb_radio" id="randomcolor_yes" name="randomcolor" value="yes" type="radio"> 
<label class="fb_option" for="randomcolor_yes">yes</label>

<input '.$checkednr.' class="fb_radio" id="randomcolor_no" name="randomcolor" value="no" type="radio"> <label class="fb_option" for="randomcolor_no">no</label>

Type of visualization
<input '.$checkedq.' class="fb_radio" id="quantum_quantum" name="quantum" value="quantum" type="radio"> 
<label class="fb_option" for="quantum_quantum">quantum</label>

<input '.$checkednq.' class="fb_radio" id="quantum_non_quantum" name="quantum" value="non-quantum" type="radio"> 
<label class="fb_option" for="quantum_non_quantum">non-quantum</label>

Size
<input class="fb_input" id="panelx" maxlength="4" name="panelx" size="2" type="text" value="'.$x.'" />
<b>x</b>
<input class="fb_input" id="panely" maxlength="4" name="panely" size="2" type="text" value="'.$y.'" />

<input class="fb_button" id="_submit" name="_submit" onclick="this.form._submit.value = this.value;" value="update" type="submit">
<input class="fb_button" id="_savethis" name="_savethis" onclick="javascript:showdiv(\'savethis\');" value="save this">
</div>
</form>';
echo "</div>";

## Legend
# FIXME ????
$pa1 = $d['fields'][$param1]['label'];
$pa2 = $d['fields'][$param2]['label'];

echo '<div id="legend">'."\n";
echo 'LEGEND: '.$pa1.' <-> '.$pa2.": ";

####### list of selected values / join values / colors
## make colors if is needed:
if (!$_SESSION['colors'] or $randomcolor == "yes") { 
	$colors = get_random_colors($num_colors); 
} else {
	$colors = $_SESSION['colors'];
}

$n = 0;
$p = $color_selected;
$p_v = $color_values_h;
$p2 = array();
foreach ($colors as $col) {
	echo '<span class="legend" style="background-color: '.$col.';">'.$p_v[$n].'</span>'."\n";
	## 1: building array param2 <-> colors
	array_push($p2, $p[$n]);
	$n++;
}

if ($p2) { 
	$_SESSION['p2'] = $p2; 
}

if ($colors) { 
	$_SESSION['colors'] = $colors; 
}

## and 2: building array param2 <-> colors

if ($colors_array) { 
	$_SESSION['colors_array'] = $colors_array; 
} else {

	//echo "<pre>p2:";
	//print_r($_SESSION['p2']);
	//echo "<hr />colors";
	//print_r($colors);
	//echo "</pre>";
	$colors_array = array_combine($_SESSION['p2'] , $colors);
	//$colors_array = $_SESSION['colors_array'];
}

echo "</div>";

## panel
echo '<div class="panel" style="width:'.($x + 50).'px;heigth:'.($y + 10).'px;">'."\n";

########### Building blocks and nodes
$blockstyle = "width: ".($block_x-2)."px; height:".($block_y-2)."px;";
## for non quantum:
$nodestyle = "width: ".($block_x-15)/$matrix_nodes."px; height:".($block_y-38)/$matrix_nodes."px;";

$s = 0;
foreach ($block_array as $bl) {
	echo '<div class="block" style="'.$blockstyle.'">'."\n";
	echo '<div class="blockname">'.$block_array_h[$s].'( '.$block1_array[$bl].')</div>';
	$s++;
	if ($block1_array[$bl])  {
		if ($quantum != "quantum") { 
			$matrix_nodes = round(sqrt($block1_array[$bl]), 0);
			while ($matrix_nodes*$matrix_nodes < $block1_array[$bl]) { $matrix_nodes++;}
			$nodestyle = "width: ".($block_x-15)/$matrix_nodes."px; height:".($block_y-38)/$matrix_nodes."px;";
		}

		## Param2 and colors
		#### AND ".myescape($d['table']).".subvideo_name REGEXP '".myescape($_REQUEST['tag'])."'
		if ($submitted_filter == 1) {
			$query = "SELECT ".myescape($d['pkey'])." 
			FROM ".myescape($d['table'])." 
			WHERE ".myescape($param1)."='".myescape($bl)."' 
			AND LOWER(".myescape($d['table']).".subvideo_name) LIKE LOWER('%%".$tag."%%') 
			ORDER BY ".myescape($param2).";";
			//echo "<br />query: ".$query."<br />";
			$result = mysql_query($query) or die('Query filter param2: ' . mysql_error());
			$filter_array = array();
			while ($line = mysql_fetch_array($result)) {
				array_push($filter_array, $line[0]);
			}			
		} else {
			$filter_array = array();
		}

		$query = "SELECT ".myescape($param2).", ".myescape($d['pkey'])." 
		FROM ".myescape($d['table'])." 
		WHERE ".myescape($param1)."='".myescape($bl)."'  
		ORDER BY ".myescape($param2).";";
		//echo "<br />query: ".$query."<br />";
		$result = mysql_query($query) or die('Query select param2: ' . mysql_error());
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
			}
			echo '<div class="node" id="'.$id.'" name="'.$id.'" style="background-color:'.$rgb.';'.$nodestyle.';" title="'.$color_joins[$cl[$i]]."-".$cl[$i].'" onclick="javascript:showdiv(\'node_info\');area_info('.$id.', \''.$dataname.'\');"></div>';
		}
	}
	echo "</div>"."\n";
}

echo "</div>"."\n";
$sesion_id = session_id();
echo '
<div id="preview" style="height: 600px; left: '.($x + 40).'px;"><h3>Search here:</h3>
<form action="area3.php" id="filter" method="post" name="filter">

<input id="submitted_filter" name="submitted_filter" value="1" type="hidden">
<h3>Filter by tag:</h3>
<input class="fb_input" id="tag" name="tag" value="" type="text">
<input class="fb_button" id="filter_submit" name="_submit" value="filter" type="submit">
</form>';
if ($tag) { echo "<p>TAG:  ".$tag."</p>"; }
echo '<h2>About <b>this</b> AREA: <br />Name: '.$d['name'].'<br />Bescription: '.$d['description'].'</h2>
<p>* Possible representations: <b>13.852.879.303.186 ~= 1.3 * E13</b></p>';

echo "<p>TAG:  ".$tag."</p>";
//print_r($filter_array);
echo " submitted: ".$submitted_filter;
echo "</div>";


echo '<div id="node_info" style="visibility: hidden;">
</div>';
echo '<div id="savethis" style="visibility: hidden;">
</div>';
echo "</body></html>";
?>
