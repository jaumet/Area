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
		)
	)
);

$datas['riereta_drupal'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'riereta_drupal', // Human title for the data
	'label' => 'Visualitzacions drupal Riereta', // Human subtitle for the data
	'max_representations' => 'moltes', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'Riereta drupal', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'riereta_drupal', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
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
		)
	)
);


$datas['wp-test'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'WP test', // Human title for the data
	'label' => 'Visualitzacions WP', // Human subtitle for the data
	'max_representations' => 'muchassss', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'wp blabla', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'xnca_wp', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'wp_posts', // Table to be represented.
	'pkey'=>'ID', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'post_author' => array( 
			'label'=>'author', 
			'filter'=>'1', 
			'show'=>'1' 
		),
		'post_date' => array( 
			'label'=>'date', 
			'filter'=>'1', 
			'show'=>'1' 
		),
		'post_content' => array( 
			'label'=>'content', 
			'filter'=>'1', 
			'show'=>'1' 
		),
		'post_title' => array( 
			'label'=>'title', 
			'filter'=>'1', 
			'show'=>'1' 
		),
		'post_category' => array( 
			'label'=>'Category', 
			'filter'=>'1', 
			'show'=>'1' 
		),
		'post_status' => array( 
			'label'=>'status', 
			'filter'=>'1', 
			'show'=>'1' 
		),
		'comment_status' => array( 
			'label'=>'comment status', 
			'filter'=>'1', 
			'show'=>'1' 
		),
	)
);
?>
