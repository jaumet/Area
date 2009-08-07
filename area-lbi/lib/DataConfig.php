<?
## This is the AreaConfig-sample file: 
## copy this file:
## $: cd /path/to/area/diretory
## $: cd lib/
## $: cp AreaConfig-sample.php AreaConfig.php
## And then edit the new file and set the right data to be able to connect 
## to your database and setup the representation

## Sample configuration with documentation
$datas['AEsubmissions'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Ars Electronica submissions', // Human title for the data
	'label' => 'from 1987 to 2008', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'AEsubmissions', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'submissions', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'prix_category_en' => array( // name of one of the fields
			'label'=>'Category', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'sYear' => array( // name of one of the fields
			'label'=>'Year', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'title' => array( // name of one of the fields
			'label'=>'Title', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'country' => array( // name of one of the fields
			'label'=>'Country', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'price' => array( // name of one of the fields
			'label'=>'Price', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'nomination' => array( // name of one of the fields
			'label'=>'Nomination', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
	)
);

$datas['test'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Test', // Human title for the data
	'label' => 'simple test', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'test', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'minim', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'id' => array( // name of one of the fields
			'label'=>'ID', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),

	)
);
?>
