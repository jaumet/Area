<?
$id = $_REQUEST['id'];
$datasource = $_REQUEST['data'];
include ('./functions.php');
#include ('./DataConfig.php');
$area_path_data = "./DataConfig.php";
include ($area_path_data);
$d = $datas[$datasource];
## Getting the info for the node:
## FIXME : select only the parameters with filter = 1 in DataConfig!
connect($datasource);
$query = "SELECT *  
	FROM ".myescape($d['table'])." 
	WHERE ".myescape($d['pkey'])."='".$id."';";
//echo "<br />query: ".$query."<br />";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
$cl = array(); $id_array = array();
$line = mysql_fetch_array($result, MYSQL_ASSOC);

echo '<h3>'.$d['name'].' - <a onclick="javascript: hidediv(\'node_info\');" href="#">close</a></h3>';

foreach($line as $k => $v) {
	if ($d['fields'][$k]['show'] == 1)  {
		echo "<br />".$d['fields'][$k]['label']." -> <b>".htmlspecialchars_decode($v)."</b>";
	}
}
echo "<hr />";
echo "<pre>";
##print_r($line);
echo "</pre>";
?>
