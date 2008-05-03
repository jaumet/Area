<?
include('./lib/functions.php');
include('./lib/DataConfig.php');
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
</head>\n
<body>\n";

echo "<div class='debug'>BLOCKS";
echo "Num of blocks seleccionats: ".sizeof($_REQUEST['block_selected'])."<br />";
echo "Num of blocks seleccionats: ".sizeof($_REQUEST['block_values'])."<br />";
$blocks = sizeof($_REQUEST['block_selected']);
$matrix = round(sqrt($blocks), 0);
echo "Blocks matrix size:".$matrix." x ".$matrix."<br />";
$x = $_REQUEST['panelx'];
$y = $_REQUEST['panely'];
$block_x = round($x/$matrix);
$block_y = round($y/$matrix);
echo "Desired size ( ".$x.", ".$y." )<br />";
echo "Size of each block: ".$block_x." px / ".$block_y." px<br />";

//Getting max num the nodes in a block
$block_array = $_REQUEST['block_selected'];
$dataname = $_REQUEST['datasrcname'];
$param1 = $_REQUEST['param1'];
$param2 = $_REQUEST['param2'];
$d = $datas[$dataname];
connect($dataname);
$nodes_per_block_max[0] = 0;
foreach ($block_array as $bl) {
	$query = "SELECT COUNT(*) FROM ".myescape($d['table'])." WHERE ".myescape($param1)."='".myescape($bl)."';";
	//echo "<br />query: ".$query."<br />";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	$nodes_per_block = mysql_fetch_array($result);
	echo "-------- ".$bl." -> ".$nodes_per_block[0]."<br />";
	## add nodes per block to the array as a value
	$block1_array = array($bl => $nodes_per_block[0]);
	if ($nodes_per_block[0] > $nodes_per_block_max[0]) { 
		$nodes_per_block_max[0] = $nodes_per_block[0];
		$nodes_per_block_max[1] = $bl;} 
}
echo "Nodes per block max:".$nodes_per_block_max[0]." -> ".$nodes_per_block_max[1]."<br />";
echo "<hr />COLORS";
echo "Num of colors seleccionats: ".sizeof($_REQUEST['color_selected'])."<br />";
echo "Num of colors seleccionats: ".sizeof($_REQUEST['color_values'])."<br />";
echo "</div>";
print '<div class="panel" style="width:'.$x.'px;heigth:'.$y.'px;">'."\n";

#### Building blocks
$blockstyle = "width: ".($block_x-2)."px; height:".($block_y-2)."px;";
foreach ($block_array as $bl) {
	echo '<div class="block" style="'.$blockstyle.'">'."\n";
	echo '<div class="blockname">'.$bl.'( '.$block_array[$bl].')</div>';
	if ($block1_array[$bl])  {
		$matrix_nodes = round(sqrt($block1_array[$bl]), 0);
		for ($i=0;$i<($block1_array[$bl]);$i++) {
			echo '<div class="node" id="a" style="background-color:yellow; width: 5px; height: 3px;" title="title" onclick="javascript:area_info()">ss</div>';
			//echo "<p>".$matrix_nodes."</p>";
		}
	}
	echo "xxx</div>"."\n";
}




echo '<hr /><pre>';
//print_r($_REQUEST);
echo '</pre>';
?>
