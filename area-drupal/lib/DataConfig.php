<?
## This is the AreaConfig-sample file: 
## copy this file:
## $: cd /path/to/area/diretory
## $: cd lib/
## $: cp AreaConfig-sample.php AreaConfig.php
## And then edit the new file and set the right data to be able to connect 
## to your database and setup the representation

## Sample configuration with documentation
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
			'filter'=>'1', 
			'show'=>'1' 
		),
		'title' => array( 
			'label'=>'Title', 
			'filter'=>'1', 
			'show'=>'1' 
		),
		'uid' => array( 
			'label'=>'Status', 
			'filter'=>'1', 
			'show'=>'0', 
			'join' => array(
                                'table'=>'users', // Table to join
                                'key' => 'uid', // Key to join
                                'val' => 'name'  // value to get
                        )
		),
		'comment' => array( 
			'label'=>'Comments', 
			'filter'=>'1', 
			'show'=>'1' 
		)
	)
);


?>
