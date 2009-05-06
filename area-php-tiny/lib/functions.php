<?
## AREA functions

function connect($dataname) {
	if (file_exists('./lib/DataConfig.php')) {
	        include ('./lib/DataConfig.php');
	} else {
	       include ('./DataConfig.php');
	}
	$DBserver = $datas[$dataname]['db']['server'];
	$DBname = $datas[$dataname]['db']['name'];
	$DBuser = $datas[$dataname]['db']['user'];
	$DBpassw = $datas[$dataname]['db']['passw'];

	#echo "data: ".$DBserver." - ".$DBuser." - ".$DBpassw." - ".$DBname;
        $link = mysql_connect($DBserver, $DBuser, $DBpassw)
            or die('Could not connect: ' . mysql_error());
        mysql_select_db($DBname) or die('Could not select database');
	mysql_query("SET NAMES 'utf8'");
}

#sub to escape mysql special chars
function myescape($escaped) {
	$escaped = str_replace("\\","\\\\", $escaped);
	$escaped = str_replace("'","\'", $escaped);
	return $escaped;
}

function get_distinct_values($param, $table, $dataname) {
	if ($param) {
		## Is there any join in the config?
		if (file_exists('./lib/DataConfig.php')) {
		        include ('./lib/DataConfig.php');
		} else {
		       include ('./DataConfig.php');
		}
		if ($datas[$dataname]['fields'][$param]['join']) {
			$join_table = $datas[$dataname]['fields'][$param]['join']['table'];
			$join_key = $datas[$dataname]['fields'][$param]['join']['key'];
			$join_val = $datas[$dataname]['fields'][$param]['join']['val'];
			$query = "SELECT DISTINCT 
			".myescape($table).".".myescape($param).", ".$join_table.".".myescape($join_val)." 
			FROM ".myescape($table).", ".$join_table." 
			WHERE ".myescape($table).".".$param." != '' 
			AND ".myescape($table).".".myescape($param)." = ".$join_table.".".myescape($join_key)."
			ORDER BY ".myescape($table).".".myescape($param).";";
			$combine = "yes";
		//		echo "<hr />".$query."<hr />";
		} else {
			$query = "SELECT DISTINCT ".myescape($param)." 
				FROM ".myescape($table)." 
				WHERE ".$param." != '' 
				ORDER BY ".myescape($param).";";
		}
		$distinct = array(); $distinct_key = array(); $distinct_val = array();
		//echo $query;
		$result = mysql_query($query) or die('Query main distinct functions.php L57: ' . mysql_error());
		while ($line = mysql_fetch_array($result)) {
			array_push($distinct_key, htmlentities($line[0]));
			array_push($distinct_val, htmlentities($line[1]));
		}
		if ($combine == "yes") { 
			$distinct = array_combine($distinct_key, $distinct_val);
			array_push($distinct, "__join_needed__");
		} else { 
			$distinct = $distinct_key; 
		}
	
//echo "<hr />distinct_key";
//print_r($distinct_key);
//echo "<hr />distinct_val";
//print_r($distinct_val);
//echo "<hr />distinct";
//print_r($distinct);
//exit;

	return $distinct;
	} else {
		return;
		}

}



function get_random_colors($num_colors)  {
	$colors = array();
	for ($i=0;$i<$num_colors;$i++) {
		$r = intval( 100+rand(0, 155));
		$g = intval( 100+rand(0, 155));
		$b = intval( 50+rand(0, 205));
		$bgcolorc = "rgb(".$r.",".$g.",".$b.")";
		array_push($colors, $bgcolorc);
	}
	
	return $colors;
}
function get_dark_color($rgb)  {
	$rgb1 = substr($rgb, 4, -1);
	$rgb2 = split(",", $rgb1);
	$rd = intval($rgb2[0]/2.5);
	$gd = intval($rgb2[1]/2.5);
	$bd = intval($rgb2[2]/2.5);
	$dark = "rgb(".$rd.",".$gd.",".$bd.")"; 
	return $dark;
}

############### HTML INCLUDES
function head_html($page_title) {
    # Starting html
    $html = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $html .= "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
    <html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">\n
    <head>
      <title>:: AREA :: data visualization  - ".$page_title."</title>\n
    	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n
    	<link rel=\"SHORTCUT ICON\" href=\"imgs/logoareapetit.png\" />\n
    	<link href=\"./css/area.css\" rel=\"stylesheet\" type=\"text/css\" />\n
    	<link href=\"./css/myTabz.css\" rel=\"stylesheet\" type=\"text/css\" />\n
    	<script language=\"javascript\" src=\"./js/area.js\"></script>
    	<script language=\"javascript\" src=\"./js/prototype.js\"></script>
    	<script language=\"javascript\" src=\"./js/myTabz.js\"></script>
			<script type=\"text/javascript\">
				var ActivateTabs=function(){
					if(typeof(MT)=='undefined'){
						var MyTabs= new mt('tabs','div.my_tab');
					
						MyTabs.removeTabTitles('h5.tab_title');
						MyTabs.addTab('t1','Legend');
						MyTabs.addTab('t2','Parameters');
						MyTabs.addTab('t3','Config');
						//MyTabs.addTab('t4','tab 4 - Long Title');
						MyTabs.makeActive('t1');
					}
				}

			</script>
    </head>\n
    <body onload=\"ActivateTabs('tabs');\">\n";
    echo $html;
}

function get_areadiv()  {
	$output = '<div id="headerdiv">'."\n";
	$output .=  "<h1><a href=\"/area\"><img src=\"./images/area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>\n";
	$output .=   " AREA, visualization tool</h1>\n";
	$output .=   "</div>";
	echo $output;
}
?>
