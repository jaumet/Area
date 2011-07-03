<?
## This is the AreaConfig-sample file: 
## copy this file:
## $: cd /path/to/area/diretory
## $: cd lib/
## $: cp AreaConfig-sample.php AreaConfig.php
## And then edit the new file and set the right data to be able to connect 
## to your database and setup the representation

## Sample configuration with documentation
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
		'host'=>'XXXX' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'XXXX', // Table to be represented.
	'pkey'=>'XXXX', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'XXXX' => array( // name of one of the fields
			'label'=>'XXXX', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'XXXX' => array( // example of one field that joins another table
			'label'=>'XXXX', // Human name for the field
			'filter'=>'1',
			'join' => array(
				'table'=>'XXXX', // Table to join
				'key' => 'XXXX', // Key to join
				'val' => 'XXXX'  // value to get
			),
		),
	)
);
?>
