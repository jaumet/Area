<?php
// $Id: DataConfig.php,v 1.1.2.1 2009/02/24 16:47:32 jaume Exp $
/**
 * @file
 * This is a configuration file for the Area module.
 *
 * Optionally you can edit this file to tune the module
 */

// Sample configuration with documentation
$datas['area_type'] = array // Name for the data (only letters and/or numbers
(
  'name' => 'Area drupal', // Human title for the data
  'label' => 'Visualitzacions drupal with Area visualization tool', // Human subtitle for the data
  'max_representations' => '', // Use area_calc.rb to calculate how many 
           // representations you can do with your data using Area
  'description' => 'site description', // Description of the Data (accepts HTML.  
  'table'=> 'node', // Table to be represented.
  'pkey'=>'nid', // Unique value per entrye (use to be the 'id'
  'fields' => array( // list of fields in the database
    'type' => array( 
      'label'=>'Content type', 
      'filter'=>'0', 
      'show'=>'1' 
    ),
    'title' => array( 
      'label'=>'Title', 
      'filter'=>'1', 
      'show'=>'1' 
    ),
    'uid' => array( 
      'label'=>'Users', 
      'filter'=>'1', 
      'show'=>'1', 
      'join' => array(
        'table'=>'users', // Table to join
        'key' => 'uid', // Key to join
        'val' => 'name'  // value to get
      )
    ),
      'nid' => array( 
      'label'=>'Content', 
      'filter'=>'1', 
      'show'=>'1', 
      'join' => array(
        'table'=>'node_revisions', // Table to join
        'key' => 'nid', // Key to join
        'val' => 'body'  // value to get
      )
    ),
    'comment' => array( 
      'label'=>'Comments', 
      'filter'=>'1', 
      'show'=>'1' 
    ),
    'promote' => array( 
      'label'=>'Promoted', 
      'filter'=>'1', 
      'show'=>'1' 
    ),
    'moderate' => array( 
      'label'=>'Moderated', 
      'filter'=>'1', 
      'show'=>'1' 
    ),
    'sticky' => array( 
      'label'=>'Sticked', 
      'filter'=>'1', 
      'show'=>'1' 
    ),
    'translate' => array( 
      'label'=>'Translated', 
      'filter'=>'1', 
      'show'=>'1' 
    ),
    'language' => array( 
      'label'=>'Language', 
      'filter'=>'1', 
      'show'=>'1',
      'join' => array(
        'table'=>'languages', // Table to join
        'key' => 'language', // Key to join
        'val' => 'name'  // value to get
      )
    )
  )
);

?>
