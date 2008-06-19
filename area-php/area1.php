<?
session_start();

include('./lib/functions.php');

include('./lib/DataConfig.php');


#create the form object
#my $form = CGI::FormBuilder->new(
#				name => 'construct1',
#				method => 'post',
#				submit => 'Next',
#				stylesheet => 1,
#				#table      => {width => 1400},
#				table      => 0,
#				fields => [qw(datasrcname param1 param2)],
#				);


#GET DATASOURCES
$dataname = $_REQUEST['dataname'];
if (!$dataname) {echo "<h2>No dataname selected!!!!</h2>"; }
$d = $datas[$dataname];
#echo $dataname."<br />";
# CONNECT
connect($dataname);

# Starting html
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">\n
	<head>
	<title>:: AREA :: treemaps visualization - Step 1</title>\n
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n
	<link rel=\"SHORTCUT ICON\" href=\"imgs/logoareapetit.png\" />\n
	<link href=\"./css/area.css\" rel=\"stylesheet\" type=\"text/css\" />\n
	<script language=\"javascript\" src=\"./js/area.js\"></script>
</head>\n
<body>\n";

$fields = array();

#preparacio de la taula en questio
$query = "SELECT * FROM ".myescape($d['table']).";";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$numfields = mysql_num_fields($result);
$numrows = mysql_num_rows($result); 

$r = mysql_query("show columns from ".$d['table']);
if (mysql_num_rows($r) > 0) {
   while ($row = mysql_fetch_assoc($r)) {
	array_push($fields, $row['Field']);
   }
}

####### Sobre la taula:
# Nom de la taula
echo "<div id=\"headerdiv\">";
echo "<h2><a href=\"/area\"><img src=\"area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>";
echo " AREA, a database to treemap visualization tool<br>";
echo "</div>";

#$count = 0;
$bad = array();
$good = array();

#foreach my $n (@fieldnames) {
echo "<div class='debug'><hr />";
foreach ($fields as $n) {
	// get config for this field
	$f=$d['fields'][$n];

	if (!$f) {
		$alert = '<div id="alert><p>".$f." ->note: field named $n is not defined in the config!</p></div>';
	}

	# Count distinct values per field
	# this is array: field -> distinct_number
	$query = "select count(distinct $n) FROM ".myescape($d['table']).";";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	$numdistinct = mysql_fetch_array($result);
	$numdistinct = $numdistinct[0];

	# null values per field
	$query = "select count(*) from ".myescape($d['table'])." where ".myescape($n)."='' or ".myescape($n)." is null;";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	$numnull = mysql_fetch_array($result);
	$numnull = $numnull[0];

	#$count++;
	$percdistinct = number_format(($numdistinct*100)/($numrows - $numnull), 2);
	$percnotnull  = number_format((($numrows - $numnull)*100)/$numrows, 2);

$humann = $n;
if ($f['label']) {
	$humann = $f['label'];
} else {
	$humann = str_replace("_"," ", $humann);
}

if (($percnotnull < "80") or ($numdistinct > "50") or ($numdistinct < "2")) {
#		$bin=\@bad; 
		$class='bad';
		array_push($bad, $n);
		$htmlbad .= '<tr class="'.$class.'"><td>'.$humann.'</td><td> no null: '.($numrows - $numnull).' ('.$percnotnull.' %) </td><td> distinct values: '.$numdistinct.' ('.$percdistinct.' %)</td></tr>'."\n\n";

	} else {
#		$bin=\@good; 
		$class='good';
#		push(@params, $n);
#		$params{$n}=$datasrc->{fields}{$n}{label};
		//$params[$n]=$data[$dataname][fields][$n][label];
		array_push($good, $n);
		$htmlgood .= '<tr class="'.$class.'"><td>'.$humann.'</td><td> no null: '.($numrows - $numnull).' ('.$percnotnull.' %) </td><td> distinct values: '.$numdistinct.' ('.$percdistinct.' %)</td></tr>'."\n\n";
		$options .= '<option value="'.$n.'">'.$humann.'</option>\n';
	}

#	push @{$bin}, $html;
}

echo "<hr />BAD: ";
print_r($bad);
echo "<hr />GOOD: ";
print_r($good);
echo "<hr />html: ".$html;

echo '</div>';

#Add fields with sql results to the form and echo the form
#@params = sort(@params);
echo "<div id=\"formdiv\">";
#$form->field(name => 'datasrcname', type=> 'hidden', value=>$datasrcname, required => 1);
#$form->field(name => 'param1', type=> 'select', options=>\%params, required => 1);
#$form->field(name => 'param2', type=> 'select', options=>\%params, required => 1);
echo "STEP 1: choose 2 main parameters visualization<br>";
#echo $form->render();

### FORM
echo '<form action="area2.php?'.htmlspecialchars(SID).'" id="construct1" method="post" name="construct1" onsubmit="return validate_construct1(this);">
<input id="_submitted_construct1" name="_submitted_construct1" type="hidden" value="1" />
<input class="fb_hidden" id="dataname" name="dataname" type="hidden" value="'.$dataname.'" />
<span class="fb_required">Param1</span>
<select class="fb_select" id="param1" name="param1">
  <option value="">-select-</option>
  '.$options.'
</select>

<span class="fb_required">Param2</span>
<select class="fb_select" id="param2" name="param2">
  <option value="">-select-</option>
  '.$options.'
</select>
<input class="fb_button" id="construct1_submit" name="_submit" type="submit" value="Next" />
</div>
</form>';



### END FORM

echo "</div>";
echo "<br /><br /><br />";
echo "<div id=\"analisisdiv\">";

echo "<h2>About the data: ".$d['name']." </h2>";
echo "<p><ul><li>Database Name: ".$d['db']['name']."</li>\n";
echo "<p><ul><li>Database Label: ".$d['label']."</li>\n";
echo "<li>Table Name: <b>".$d['table']."</b></li>\n\n";

# Numero de camps a la taula
echo "<li>Number of fields: ".$numfields."</li>\n\n";

# Numero d'entrades
echo "<li>Number of records: ".$numrows."</li></ul></p>";

echo "<p>You can choose 2 of these parameters:</p>";
echo "<table>".$htmlgood."</table>";

echo "<p>List of the rest of fields:</p>";
echo "<table>".$htmlbad."</table>";
echo "</div>";

#es tanca la conexió
#$sth->finish();
#$dbh->disconnect();

echo "\n</body></html>";

?>

