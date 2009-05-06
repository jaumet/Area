<?
## This is the AreaConfig-sample file: 
## copy this file:
## $: cd /path/to/area/diretory
## $: cd lib/
## $: cp AreaConfig-sample.php AreaConfig.php
## And then edit the new file and set the right data to be able to connect 
## to your database and setup the representation


## Sample configuration with documentation
$datas['area_test'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Area test data', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'area_test_minim', // database name
		'user'=>'root', // database user
		'passw'=>'qwerasdf', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'minim', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'id' => array( // name of one of the fields
			'label'=>'ID', // Human name for the field
			'filter'=>'0', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'parameter1' => array( // name of one of the fields
			'label'=>'Parameter 1', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'parameter2' => array( // example of one field that joins another table
			'label'=>'Parameter 2', // Human name for the field
			'filter'=>'1',
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
			'show'=>'1'
		),
	)
);

$datas['ae_submissions'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars submissions', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'ae', // database name
		'user'=>'root', // database user
		'passw'=>'qwerasdf', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'submission', // Table to be represented.
	'pkey'=>'iSubmissionID', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'sYear' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1',
			'show'=>'1' // 0 or 1
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
		'sTitle' => array(
			'label'=>'Title', // Human name for the field
			'filter'=>'1',
			'show'=>'1' // 0 or 1
		),
		'sFirstname' => array(
			'label'=>'Firstname', // Human name for the field
			'filter'=>'1',
			'show'=>'1' // 0 or 1
		),
		'sSurname' => array(
			'label'=>'Surname', // Human name for the field
			'filter'=>'1',
			'show'=>'1' // 0 or 1
		),
		'iCategoryID' => array(
			'label'=>'Category', // Human name for the field
			'filter'=>'1',
			'show'=>'1', // 0 or 1
			'join' => array(
				'table'=>'prixcategory', // Table to join
				'key' => 'iCategoryID', // Key to join
				'val' => 'sCategorytitleE'  // value to get
			)
		),
		'sFormat' => array(
			'label'=>'Format', // Human name for the field
			'filter'=>'1',
			'show'=>'1' // 0 or 1
		),
		'xml' => array(
			'label'=>'xml', // Human name for the field
			'filter'=>'1',
			'show'=>'1' // 0 or 1
		),
		'sCountry' => array(
			'label'=>'Country', // Human name for the field
			'filter'=>'1',
			'show'=>'1' // 0 or 1
		),
	)
)
?>
