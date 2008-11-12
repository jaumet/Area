<?
## This is the AreaConfig-sample file: 
## copy this file:
## $: cd /path/to/area/diretory
## $: cd lib/
## $: cp AreaConfig-sample.php AreaConfig.php
## And then edit the new file and set the right data to be able to connect 
## to your database and setup the representation

## Sample configuration with documentation

#### DRUPAL 6.x general configuration sample
$datas['area_type'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Area drupal', // Human title for the data
	'label' => 'Visualitzacions drupal with Area visualization tool', // Human subtitle for the data
	'max_representations' => '', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'site description', // Description of the Data (accepts HTML.	
	'db'=> array(
		'name'=>'XXXX', // database name
		'user'=>'XXXX', // database user
		'passw'=>'XXXX', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	'table'=> 'node', // Table to be represented.
	'pkey'=>'nid', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'type' => array( 
			'label'=>'Type', 
			'filter'=>'1', 
			'show'=>'1' 
		),
		'title' => array( 
			'label'=>'Title', 
			'filter'=>'1', 
			'show'=>'1' 
		),
		'status' => array( 
			'label'=>'Status', 
			'filter'=>'1', 
			'show'=>'0' 
		),
		'uid' => array( 
			'label'=>'Status', 
			'filter'=>'1', 
			'show'=>'0',
			'join' => array(
				'table'=>'users', // Table to join
				'key' => 'uid', // Key to join
				'val' => 'name'  // value to get
			),
		)
	)
);

#### General sample
$datas['XXXX'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'XXXX', // Human title for the data
	'label' => 'XXXX', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'XXXX', // database name
		'user'=>'XXXX', // database user
		'passw'=>'XXXX', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'XXXX', // Table to be represented.
	'pkey'=>'XXXX', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'XXXX' => array( 
			'label'=>'XXXX', 
			'filter'=>'1', // 0, by default. 1 active 
			'show'=>'1', // 0, by default. 1 active
			'join' => array(
				'table'=>'XXXX', // Table to join
				'key' => 'XXXX', // Key to join
				'val' => 'XXXX'  // value to get
			),
		),
	)
);


?>
