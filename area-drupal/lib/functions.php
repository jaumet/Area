<?php
// $Id: functions.php,v 1.1.2.1 2009/02/24 16:47:32 jaume Exp $

/**
 * @file
 * This is a list of functions used by area.inc and area.module
 */


/**
 * escape mysql special chars
 *
 * @escaped
 *   string to scape
 *
 */
function area_myescape($escaped) {
  $escaped = str_replace("\\","\\\\", $escaped);
  $escaped = str_replace("'","\'", $escaped);
  return $escaped;
}

/**
 * Get distinct values for content-type, this is a list of active content-types
 *
 * @param 
 *   name of the field the check
 * @table
 *   name of the table
 * @dataname
 *   name of the drupal database
 *
 */
function area_get_distinct_values($param, $table, $dataname) { /// used in area2.php
  // Is there any join in the config?
  if ($datas[$dataname]['fields'][$param]['join']) {
    $join_table = $datas[$dataname]['fields'][$param]['join']['table'];
    $join_key = $datas[$dataname]['fields'][$param]['join']['key'];
    $join_val = $datas[$dataname]['fields'][$param]['join']['val'];
    $query = "SELECT DISTINCT 
    ".area_myescape($table).".".area_myescape($param).", ".$join_table.".".area_myescape($join_val)." 
    FROM ".area_myescape($table).", ".$join_table." 
    WHERE ".area_myescape($table).".".$param." != '' 
    AND ".area_myescape($table).".".area_myescape($param)." = ".$join_table.".".area_myescape($join_key)."
    ORDER BY ".area_myescape($table).".".area_myescape($param).";";
    $combine = "yes";
  } else {
    $query = "SELECT DISTINCT ".area_myescape($param)." 
      FROM ".area_myescape($table)." 
      WHERE ".$param." != '' 
      ORDER BY ".area_myescape($param).";";
  }
  $distinct = array(); $distinct_key = array(); $distinct_val = array();
  $result = db_query($query) or die('Query failed: ' . mysql_error());
  while ($line = db_fetch_object($result)) {
    array_push($distinct, $line->$param);
  }
  array_unshift($distinct, 'All nodes');
  return $distinct;
}

/**
 * Get a pseudo-random number of colors in RGB notation.
 *
 * @num_colors 
 *   Integer, number of colors
 *
 */
function area_get_random_colors($num_colors)  {
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

/**
 * Get a dark version of a RGB color
 *
 * @rgb 
 *   gives an RGB color in the format, for ejemple: rgb(210,56,123)
 *
 */
function area_get_dark_color($rgb)  {
  $rgb1 = substr($rgb, 4, -1);
  $rgb2 = split(",", $rgb1);
  $rd = intval($rgb2[0]/2.5);
  $gd = intval($rgb2[1]/2.5);
  $bd = intval($rgb2[2]/2.5);
  $dark = "rgb(".$rd.",".$gd.",".$bd.")"; 
  return $dark;
}

?>
