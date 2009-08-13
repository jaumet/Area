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
		$result = mysql_query($query) or die('Query main distinct functions.php L57: '.$query.' | '.$table.' | ' . mysql_error());
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

function get_parameters_list($param, $table, $area_percnotnull, $area_numdistinct_max, $area_numdistinct_min) {
    $fields = array();

    #preparacio de la taula en questio
    $query = "SELECT * FROM ".myescape($table).";";
    $result = mysql_query($query) or die('Query select table: ' . mysql_error());

    $numfields = mysql_num_fields($result);
    $numrows = mysql_num_rows($result);
    $r = mysql_query("show columns from ".$table);
    if (mysql_num_rows($r) > 0) {
        while ($row = mysql_fetch_assoc($r)) {
            array_push($fields, $row['Field']);
        }
    }

    $bad = array();
    $good = array();

    foreach ($fields as $n) {
        // get config for this field
        $f=$f[$n];

        if (!$f) {
            $alert = '<div id="alert><p>".$f." ->note: field named $n is not';
            $alert .= ' defined in the DataConfig file!</p></div>'."\n";
        }

        # Count distinct values per field
        # array: field -> distinct_number
        $query = "select count(distinct $n) FROM ".myescape($table).";";
        $result = mysql_query($query) or die('Query count distinc L11: ' . mysql_error());
        $numdistinct = mysql_fetch_array($result);
        $numdistinct = $numdistinct[0];
        //echo $query;print_r($numdistinct);echo "<hr />";
        # null values per field
        $query = "select count(*) from ".myescape($table)." where ".myescape($n)."='' or ".myescape($n)." is null;";
        $result = mysql_query($query) or die('Query count step1 L39: ' . mysql_error());
        $numnull = mysql_fetch_array($result);
        $numnull = $numnull[0];

        $percdistinct = number_format(($numdistinct*100)/($numrows - $numnull +1), 2);
        $percnotnull  = number_format((($numrows - $numnull)*100)/$numrows, 2);


        if ($f[$n]['label']) {
            $humann = $f[$n]['label'];
        } else {
            $humann = str_replace("_"," ", $n);
        }
        if (($percnotnull < $area_percnotnull )
            or ($numdistinct > $area_numdistinct_max )
            or ($numdistinct < $area_numdistinct_min)) {
                $class='bad';
                array_push($bad, $n);
                $htmlbad .= '<tr class="'.$class.'"><td>'.$humann.'</td><td> no null: '.($numrows - $numnull).' ('.$percnotnull.' %) </td><td> distinct values: '.$numdistinct.' ('.$percdistinct.' %)</td></tr>'."\n\n";
        } else {
            if ($param == $n) {$checked = ' selected="selected" ';} else { $checked = ""; }
                $class='good';
                array_push($good, $n);
                $htmlgood .= '<tr class="'.$class.'"><td>'.$humann.'</td><td> no null: '.($numrows - $numnull).' ('.$percnotnull.' %) </td><td> distinct values: '.$numdistinct.' ('.$percdistinct.' %)</td></tr>'."\n\n";
                $options .= '<option value="'.$n.'" '.$checked.'>'.$humann.'</option>'."\n";
        }
    }
    return $options;
}

############### HTML INCLUDES
function head_html($page_title, $status) {
    switch ($status) {
        case "legend":
             $tab_active = "t1";
             break;
        case "parameters":
             $tab_active = "t2";
             break;
        case "config":
             $tab_active = "t3";
             break;
         default:
             $tab_active = "t1";
    }

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
						MyTabs.makeActive('".$tab_active."');
					}
				}

			</script>
    </head>\n
    <body onload=\"ActivateTabs('tabs');\">
	 <div style=\"background-image:url('/area-lbi/images/bg_head.gif');width:100%;height:10px;padding:0px;margin:0px;\"></div>";
    echo $html;
}

function get_areadiv($area_url)  {
	$output = '<div id="headerdiv">'."\n";
	$output .= "<a href=\"/webarchive\"><img src=\"./images/wa_logo.png\" style=\"border-width:0px;\" /></a><br/>";
	$output .= "<span style=\"padding-left:25px;\"><a href=\"/webarchive/public/view/mid:5\" style=\"color:#2abbf1;\">back</a></span>";
	//$output .=  "<h1><a href=\"".$area_url."\"><img src=\"./images/	area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>\n";
	//$output .=   " AREA, visualization tool</h1>\n";
	$output .=   "</div>";
	echo $output;
}
?>
