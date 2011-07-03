<?
include('./lib/functions.php');
include('./lib/AreaConfig.php');
include($area_path.'lib/DataConfig.php');

## Handling session:
session_start();

#check if there is data in the session or redirect to the first step
#if(!$session->param('param1')) {
#	echo "Location: areac1.cgi\n\n";
#	exit();
#}

#get variables from first form
#my $param1 = $session->param('param1');
#my $param2 = $session->param('param2');
#my $datasrcname = $session->param('datasrcname');

$param1 = $_REQUEST['param1'];
$param2 = $_REQUEST['param2'];
$dataname = $_REQUEST['dataname'];
$d = $datas[$dataname];

## Adding variables to the phpsession
$_SESSION['dataname'] = $dataname;
$_SESSION['param1'] = $param1;
$_SESSION['param2'] = $param2;


#connexio a la bd mysql
connect($dataname);

echo '<div class="debug">';
$table = $d['table'];
echo $query;
echo "<pre>SESSION:";
print_r($_SESSION);
echo "</pre>";
$param1_list = get_distinct_values($param1, $table, $dataname);
echo "<hr />param1_list";
$param1_list_copy = $param1_list;
if (array_pop($param1_list_copy) == "__join_needed__") { 
	array_pop($param1_list);
	$param1_list_val = array_values($param1_list);
	$param1_list = array_keys($param1_list);
} else {
	$param1_list_val = $param1_list;
}
print_r($param1_list);
echo "<hr />param1_list_val";
print_r($param1_list_val);
echo "<hr />";

$param2_list = get_distinct_values($param2, $table, $dataname);
$param2_list_copy = $param2_list;
if (array_pop($param2_list_copy) == "__join_needed__") {
	array_pop($param2_list);
	$param2_list_val = array_values($param2_list);
	$param2_list = array_keys($param2_list);
} else {
	$param2_list_val = $param2_list;
}
echo "</div>";

#my $rndcolor;
#if(!$colors){$colors = ""};
#if ($colors !~ m/\d/g)  { 
#	$colors = ""; $rndcolor = "si"; 
#} else { 
#	$rndcolor = "no"; 
#}

# Starting html
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">\n
	<head>\n
	<title>:: AREA :: treemaps visualization - Step 1</title>\n
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n
	<link rel=\"SHORTCUT ICON\" href=\"imgs/logoareapetit.png\" />\n
	<link href=\"./css/area.css\" rel=\"stylesheet\" type=\"text/css\" />\n
	<script language=\"javascript\" src=\"./js/area.js\"></script>\n
</head>\n
<body>\n";

######################## Writing.....................
echo "<div id=\"headerdiv\">\n";
echo "<h2><a href=\"/area\"><img src=\"./images/area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>\n";
echo " AREA, visualization tool<br>\n";
echo "</div>\n";

echo "<div id=\"formdiv\">\n";
echo "<h2>Step 2: define & refine both parameters <span class =\"emphat\">".$d['fields'][$param1]['label']."</span> and <span class =\"emphat\">".$d['fields'][$param2]['label']."</span></h2>\n";


echo '<form action="area3.php" id="construct2" method="post" name="construct2" onsubmit="return validate_construct2(this);">
<div>
<input id="_submitted_construct2" name="_submitted_construct2" type="hidden" value="1" />
<input class="fb_hidden" id="datasrcname" name="datasrcname" type="hidden" value="'.$dataname.'" />
<input class="fb_hidden" id="savethis" name="savethis" type="hidden" value="no" />

<input class="fb_hidden" id="param1" name="param1" type="hidden" value="'.$param1.'" />
<input class="fb_hidden" id="param2" name="param2" type="hidden" value="'.$param2.'" />'."\n";
foreach ($param1_list_val as $v1) {
	echo '<input class="fb_hidden" id="block_values_h" name="block_values_h[]" type="hidden" value="'.$v1.'" />'."\n";
}
foreach ($param1_list as $p) {
	echo '<input class="fb_hidden" id="block_values" name="block_values[]" type="hidden" value="'.$p.'" />'."\n";
}
foreach ($param2_list_val as $v2) {
	echo '<input class="fb_hidden" id="color_values_h" name="color_values_h[]" type="hidden" value="'.$v2.'" />'."\n";
}
foreach ($param2_list as $p) {
	echo '<input class="fb_hidden" id="color_values" name="color_values[]" type="hidden" value="'.$p.'" />'."\n";
}

echo '<span class="fb_required">Panelx</span>
<input class="fb_input" id="panelx" maxlength="4" name="panelx" size="2" type="text" value="800" />

<br />
<span class="fb_required">Panely</span>
<input class="fb_input" id="panely" maxlength="4" name="panely" size="2" type="text" value="600" />
<br />
<span class="fb_required">Node size</span>
<input checked="checked" class="fb_radio" id="quantum_quantum" name="quantum" type="radio" value="quantum" /> <label class="fb_option" for="quantum_quantum">quantum</label>
<input class="fb_radio" id="quantum_non_quantum" name="quantum" type="radio" value="non-quantum" /> 
<label class="fb_option" for="quantum_non_quantum">non-quantum</label>

<br />
<span class="fb_required">Blocks: '.$d['fields'][$param1]['label'].' ( <a href="#" onClick="checkAll(document.construct2.block_selected,this);return false;">Uncheck</a> | <a href="#" onClick="uncheckAll(document.construct2.block_selected,this);return false;">Check</a> all )</span><br />'."\n";
$f1 = 0;
foreach ($param1_list as $p) {
	echo '<input checked="checked" class="fb_checkbox" id="block_selected" name="block_selected[]" size="8" type="checkbox" value="'.$p.'" /> <label class="fb_option" for="block_selected'.$p.'">'.$param1_list_val[$f1].'</label><br />'."\n";
$f1++;
}

echo '<br />
<span class="fb_required">Colors: '.$d['fields'][$param2]['label'].' ( <a href="#" onClick="checkAll(document.construct2.color_selected,this);return false;">Uncheck</a> | <a href="#" onClick="uncheckAll(document.construct2.color_selected,this);return false;">Check</a> all )<br></span>'."\n";
$f2 = 0;
foreach ($param2_list as $p) {
	echo '<input checked="checked" class="fb_checkbox" id="color_selected" name="color_selected[]" type="checkbox" value="'.$p.'" /> <label class="fb_option" for="color_selected'.$p.'">'.$param2_list_val[$f2].'</label><br />'."\n";
$f2++;
}

echo '<br />
<input class="fb_button" id="construct2_submit" name="_submit" type="submit" value="Next" />
</div>
</form>'."\n";

echo "</div>";
echo "\n</body></html>";

#es tanca la conexi�
#$sth->finish();
#$dbh->disconnect();

?>
