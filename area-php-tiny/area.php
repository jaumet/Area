<?
include('./lib/functions.php');
include('./lib/AreaConfig.php');
include($area_path.'lib/DataConfig.php');

## Getting the right tab activated
$status = $_POST['status'];

## Handling session:
session_start();

############## $_REQUEST -> $vars
//if (isset($_REQUEST['block_selected']) ) {
//	$_REQUEST = $vars;
//}

##  IS ANY DATABASE SELECTED?
$dataname = $_GET['dataname'];
if ($dataname == "") {
$dataname = $_POST['dataname'];
}
$d = $datas[$dataname];


if (!$dataname) {
	head_html("Area 0 step", $status);
	get_areadiv($area_url);
	echo "<div id=\"analisisdiv\">";
	echo "<h2>No dataname selected!!<br /> Choose one of the list:</h2>";
	echo "<ul>"; 
	foreach ($datas as $k => $v) {
		echo "<li><a href=\"".$area_url."area.php?dataname=".$k."\">$k</a></li>";
	}
	echo "</ul>";
	echo "</div>";
	
	
} else {

	## CONNECT to database
	connect($dataname);

	//$dataname = $_POST['datasrcname']; //FIXME
	$param1 = $_POST['param1'];
	$param2 = $_POST['param2'];

	######## ARE PARAMETERS DEFINED?
	if (!$param1 OR !$param2) {
		head_html("Area 0 step", $status);
		get_areadiv($area_url);
		$noparameters_html = "<br /><br /><br /> 
			<div id=\"analisisdiv\">
			<h2>About the data: ".$d['name']." </h2>
			<p><ul><li>Database Name: ".$d['db']['name']."</li>
			<p><ul><li>Database Label: ".$d['label']."</li>
			<li>Table Name: <b>".$d['table']."</b></li>\n\n";

		# Numero de camps a la taula
		$noparameters_html .= "<li>Number of fields: ".$numfields."</li>\n\n";

		# Numero d'entrades
		$noparameters_html .=  "<li>Number of records: ".$numrows."</li>";
		$noparameters_html .=  "<li>Possible representations: <b>".$d['max_representations']."</b></li></ul></p>";
		$noparameters_html .=  "<p>You can choose 2 of these parameters:</p>";
		$noparameters_html .=  "<table>".$htmlgood."</table>";

		$noparameters_html .=  "<p>List of the rest of fields:</p>"."\n";
		$noparameters_html .=  "<table>".$htmlbad."</table>"."\n";
		$noparameters_html .=  "</div>"."\n";
		
        echo $noparameters_html;

	} else {
        head_html("Area 0 step", $status);
        $table = $d['table'];
        $blocks_selected = get_distinct_values($param1, $table, $dataname);
        $param1_list_copy = $blocks_selected;
        if (array_pop($param1_list_copy) == "__join_needed__") {
            array_pop($blocks_selected);
            $blocks_values_h = array_values($blocks_selected);
            $param1_list = array_keys($blocks_selected);
        } else {
            $blocks_values_h = $blocks_selected;
        }

        $color_selected = get_distinct_values($param2, $table, $dataname);
        $param2_list_copy = $color_selected;
        if (array_pop($param2_list_copy) == "__join_needed__") {
            array_pop($color_selected);
            $color_values_h = array_values($color_selected);
            $color_selected = array_keys($color_selected);
        } else {
            $color_values_h = $color_selected;
        }        
    }

    $options1 = get_parameters_list($param1, $d['table'], $area_percnotnull, $area_numdistinct_max, $area_numdistinct_min);
    $options2 = get_parameters_list($param2, $d['table'], $area_percnotnull, $area_numdistinct_max, $area_numdistinct_min);

    if ($_POST['panelx'] and $_POST['panely']) {
        $x = $_POST['panelx'];
        $y = $_POST['panely'];
    } else {
        $x = $x_min;
        $y = $y_min;
    }

    if (isset($_POST['quantum'])) {
        $quantum = $_POST['quantum'];
    } else {
        $quantum = $quantum_default;
    }

    if (isset($_POST['randomcolor'])) {
        $randomcolor = $_POST['randomcolor'];
    } else {
        $randomcolor = "";
    }

    if ($_POST['submitted_filter'] == 1) {
        $submitted_filter = $_POST['submitted_filter'];
        if ($_POST['tag']) {  $tag = $_POST['tag'];  }
    } else {
        $submitted_filter = 0;
    }

    ########################  html start
    
    //head_html("Area 1 step", $status);

    ##### DEBUG  DIV
    echo "<div class='debug'>";
    echo "REQUEST<br /><pre>";
    print_r($_REQUEST);

    if ($param1 AND $param2) {
        echo "</pre><hr />quantum?".$quantum."<br />";
        echo "<hr />BLOCKS<br />";
        echo "Num of blocks seleccionats: ".sizeof($blocks_selected)."<br />";
        echo "Num of blocks possibles: ".sizeof($blocks_values)."<br />";
        $blocks = sizeof($blocks_selected);
        $matrix = round(sqrt($blocks), 0);
        while ($matrix*$matrix < $blocks) { $matrix++;}
        echo "Blocks matrix size:".$matrix." x ".$matrix."<br />";

        $block_x = round($x/$matrix, 0);
        $block_y = round($y/$matrix, 0);
        echo "Desired size ( ".$x.", ".$y." )<br />";
        echo "Size of each block: ".$block_x." px / ".$block_y." px<br />";

    //Getting max num the nodes in a block
        $block_array = $blocks_selected;
        $block_array_h = $blocks_values_h;

        $d = $datas[$dataname];
        connect($dataname);
        $nodes_per_block_max[0] = 0;

        foreach ($block_array as $bl) {
        //echo $query;
            $query = "SELECT COUNT(*) FROM ".myescape($d['table'])." WHERE ".myescape($param1)."='".myescape($bl)."';";
            $result = mysql_query($query) or die('Query count L132: ' . mysql_error());
            $nodes_per_block = mysql_fetch_array($result);
            ## add nodes per block to the array as a value
            $block1_array[$bl] = $nodes_per_block[0];
            if ($nodes_per_block[0] > $nodes_per_block_max[0]) {
                $nodes_per_block_max[0] = $nodes_per_block[0];
                $nodes_per_block_max[1] = $bl;
            }
        }
        echo "Nodes per block max: ".$nodes_per_block_max[0]." -> ".$nodes_per_block_max[1]."<br />";
        //while ($matrix_nodes*$matrix_nodes < ($nodes_per_block_max[0])) { $matrix_nodes++;}
        $matrix_nodes = round(sqrt($nodes_per_block_max[0]), 0);
        if ($matrix_nodes*$matrix_nodes < $nodes_per_block_max[0]) { $matrix_nodes++;}
        echo "<br />matrix nodes: ".$matrix_nodes." x ".$matrix_nodes;
        echo "<br />node x :".$block_x/$matrix_nodes." | node y : ".$block_y/$matrix_nodes;
        //echo "Nodes matrix max: ".$matrix_nodes = (round(sqrt($nodes_per_block_max[0]), 0) + 0.8)."<br />";
        echo "<hr />COLORS<br />";

        $color_joins = array_combine($color_selected, $color_values_h);
        $num_colors = sizeof($color_selected);


        echo "Num of colors seleccionats: ".$num_colors."<br />";
        echo "Num of colors total: ".sizeof($color_selected)."<br />";
        echo "<pre>VARS:";
        print_r($vars);
        echo "<hr />color_joins:";
        print_r($color_joins);echo "</pre>";
    }
    echo "</div>";
    ##### END DEBUG  DIV

    ## header
    get_areadiv($area_url);

    #######################
    ## Legend
    if ($param1 AND $param2) { 

    ## Getting names of the parameters
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

    $legend = '<div id="legend">'."\n";
    $legend .= 'Representing: <b>'.$pa1.'</b> (blocks) <-> <b>'.$pa2.'</b> (colors)<br />'.$pa2.' -> ';

    ####### list of selected values / join values / colors
    ## make colors if is needed:
    if ($randomcolor == "yes" or $randomcolor == "") {
        $colors = get_random_colors($num_colors);
        $_SESSION['colors'] = $colors;
    } else {
        $colors = $_SESSION['colors'];
    }

    $n = 0;
    $p = $color_selected;
    $p_v = $color_values_h;
    $p2 = array();
    foreach ($colors as $col) {
        $legend .= '<span class="legend" style="background-color: '.$col.';">'.$p_v[$n].'</span>'."\n";
        ## 1: building array param2 <-> colors
        array_push($p2, $p[$n]);
        $n++;
    //	echo $legend."<br />";
    }
    //exit;
    if ($p2) {
        $vars['p2'] = $p2;
    }

    if ($colors) {
        $vars['colors'] = $colors;
    }

    ## and 2: building array param2 <-> colors

    if (!$colors_array) {
        $colors_array = array_combine($vars['p2'] , $colors);
    }

    $legend .= "</div>";
    }


    #Add fields with sql results to the form and echo the form
    $form_html .= "<div id=\"formdiv\">"."\n";
    $form_html .= '<div id="tabs">
        <div id="t1" class="my_tab">
        <h5 class="tab_title">Legend</h5>
        <p>';
    $form_html .=  $legend;
    $form_html .= '</p></div>';

    $form_html .= '<div id="t2" class="my_tab">
        <h5 class="tab_title">Parameters</h5>';

    $form_html .= "<p>";

    ### FORM
    $form_html .= '<form action="area.php" id="construct1" method="post" name="construct1" onsubmit="return validate_construct1(this);">'."\n";
    $form_html .= '<input id="_submitted_construct1" name="_submitted_construct1" type="hidden" value="1" />'."\n".'
    <input class="fb_hidden" id="dataname" name="dataname" type="hidden" value="'.$dataname.'" />'."\n".'
    <input id="submitted_filter" name="submitted_filter" value="1" type="hidden">'."\n".'
    <input class="fb_hidden" id="tag" name="tag" value="'.$tag.'" type="hidden">
    <input class="fb_hidden" id="randomcolor" name="randomcolor" value="yes" type="hidden">
    <input class="fb_hidden" id="status" name="status" type="hidden" value="parameters" />'."\n".'
    <span class="fb_required">Parameter #1</span>'."\n".'
    <select class="fb_select" id="param1" name="param1">'."\n".'
      <option value="">-select-</option>'."\n".'
      '.$options1.'
    </select>'."\n".'
    <span class="fb_required">Parameter #2</span>'."\n".'
    <select class="fb_select" id="param2" name="param2">'."\n".'
      <option value="">-select-</option>'."\n".'
      '.$options2.'
    </select>'."\n".'
    <input class="fb_button" id="construct1_submit" name="_submit" type="submit" value="Area it" /><br /><span class="fb_required"><b>Choose 2 parameters for the visualization</b></span>'."\n";
    $form_html .= '</form>'."\n";


    ### END FORM
    $form_html .= "</p></div>"."\n";
    //echo '</p></div>';

    ## formdiv
    if ($randomcolor == "yes") {
        $checkedr = ' checked="checked" '; $checkednr = '';
    } elseif ($randomcolor == "no" or $randomcolor == "") {
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

    ### JAUME
    //echo '<div id="formdiv">'."\n";
    echo $form_html;
    echo '<div id="t3" class="my_tab">
        <h5 class="tab_title">Config</h5>
        <p>';
    echo '<form action="area.php" id="update" method="post" name="update">
    <div class="fb_required">
    <input id="param1" name="param1" value="'.$param1.'" type="hidden">
    <input id="param2" name="param2" value="'.$param2.'" type="hidden">
    <input class="fb_hidden" id="status" name="status" type="hidden" value="config" />'."\n".'
    <input id="dataname" name="dataname" value="'.$dataname.'" type="hidden">
    <input id="submitted_filter" name="submitted_filter" value="1" type="hidden">'."\n".'
    <input class="fb_hidden" id="tag" name="tag" value="'.$tag.'" type="hidden">
    - Randomize colors
    <input '.$checkedr.' class="fb_radio" id="randomcolor_yes" name="randomcolor" value="yes" type="radio">
    <label class="fb_option" for="randomcolor_yes">yes</label>
    <input '.$checkednr.' class="fb_required" id="randomcolor_no" name="randomcolor" value="no" type="radio"> <label class="fb_option" for="randomcolor_no">no</label>
<br />
    - Type of visualization
    <input '.$checkedq.' class="fb_radio" id="quantum_quantum" name="quantum" value="quantum" type="radio">
    <label class="fb_option" for="quantum_quantum">quantum</label>

    <input '.$checkednq.' class="fb_radio" id="quantum_non_quantum" name="quantum" value="non-quantum" type="radio">
    <label class="fb_required" for="quantum_non_quantum">non-quantum</label>
<br />
    - Size
    <input class="fb_input" id="panelx" maxlength="4" name="panelx" size="2" type="text" value="'.$x.'" />
    <b>x</b>
    <input class="fb_input" id="panely" maxlength="4" name="panely" size="2" type="text" value="'.$y.'" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="fb_button" id="_submit" name="_submit" onclick="this.form._submit.value = this.value;" value="update" type="submit">
    <!--<input class="fb_button" id="_savethis" name="_savethis" onclick="javascript:showdiv(\'savethis\');" value="save this">-->
    </div>
    </form>';
    echo "</div>";
    echo "</div>";
    echo "</div>";

    ###################################

    if ($param1 AND $param2) { // IF L325
        ## panel
        $panel_w = $x + (15*$matrix) ;
        $panel_h = $y + (15*$matrix);
        echo '<div class="panel" style="width:'.$panel_w.'px;heigth:'.$panel_y.'px;">'."\n";

        ########### Building blocks and nodes
        ####### correction FIXME
        if ($total_nodes > 5000) {
            $correction = 0;
        } else {
            $correction = 30;
        }

        $blockstyle = "width: ".($block_x)."px; height:".($block_y + $correction)."px;";

        $node_h = intval((($block_y)/$matrix_nodes) - (0.30*$matrix));
        $nodestyle = "width: ".(($block_x)/($matrix_nodes))."px; height:".$node_h."px;";

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
            echo '<div class="block" style="'.$blockstyle.'">'."\n";
            echo '<div class="blockname">'.$block_array_h[$s].'( '.$block1_array[$bl].')</div>';
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
                    $result = mysql_query($query) or die('Query filter param2: ' . mysql_error());
                    while ($line = mysql_fetch_array($result)) {
                        array_push($filter_array, $line[0]);
                    }
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
                        $dark_nodes++;
                    }
                    $total_nodes++;
                    echo '<div class="node" id="'.$id.'" name="'.$id.'" style="background-color:'.$rgb.';'.$nodestyle.';" title="'.$color_joins[$cl[$i]]."-".$cl[$i].'"  onclick="javascript:showdiv(\'node_info\');area_info(\''.htmlentities($id).'\', \''.$dataname.'\');"></div>';
                }
            }
            echo "</div>"."\n";
        }

        echo "</div>"."\n";
        $sesion_id = session_id();
        echo '
        <div id="preview" style="height: '.$panel_h.'px; left: '.($x + 13*$matrix).'px;">
        <form action="area.php" id="filter" method="post" name="filter">'."\n".'
        <input id="submitted_filter" name="submitted_filter" value="1" type="hidden">'."\n".'
        <input id="param1" name="param1" value="'.$param1.'" type="hidden">
        <input class="fb_hidden" id="status" name="status" type="hidden" value="'.$status.'" />'."\n".'
        <input id="param2" name="param2" value="'.$param2.'" type="hidden">
        <input id="dataname" name="dataname" value="'.$dataname.'" type="hidden">
        <input class="fb_hidden" id="randomcolor" name="randomcolor" value="no" type="hidden">
        <h3>Filter by tag:</h3>'."\n".'
        <input class="fb_input" id="tag" size="10" name="tag" value="" type="text">
        <input class="fb_button" id="filter_submit" name="_submit" value="filter" type="submit">
        </form>'."\n";

        if ($tag != "") { echo '<p>Filter:<span class="tag">'.$tag.'</span><br /> Found: <span class="tag">'.($total_nodes - $dark_nodes).' ('.round(((1 - ($dark_nodes/$total_nodes))*100), 2).'%)</span></p>'; }

        echo '<h2>About <b>this</b> AREA</h2>';
        echo '<p>- Name: <b>'.$d['name'].'</b></p><p>- Description: <b>'.$d['description'].'</b></p>';
        echo '<p>- Total nodes: <b>'.$total_nodes.'</b></p>';
        echo '<p>- Possible representations: <b>'.$d['max_representations'].'</b></p>'."\n";
        echo "<br /><hr />";
        echo "</div>"."\n";

        echo '<div id="node_info" style="visibility: hidden;">
        </div>'."\n";
        echo '<div id="savethis" style="visibility: hidden;">
        </div>'."\n";
	}  // END IF L256
}
echo "</body></html>";
?>
