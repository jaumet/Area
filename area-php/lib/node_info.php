<?
$id = $_REQUEST['id'];
$datasource = $_REQUEST['data'];
include ('./functions.php');
include ('./AreaConfig.php');
include ('./DataConfig.php');

$d = $datas[$datasource];
## Getting the info for the node:
## FIXME : select only the parameters with filter = 1 in DataConfig!
connect($datasource, $area_data_config_path);
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
		echo "<br />".$d['fields'][$k]['label']." -> <b>".htmlentities($v)."</b>";
	}
}
echo "<br /><hr />";
echo "<pre>";
//print_r($line);
echo "</pre>";
?>
