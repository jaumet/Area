<?
## This is the AreaConfig-sample file: 
## copy this file:
## $: cd /path/to/area/diretory
## $: cd lib/
## $: cp AreaConfig-sample.php AreaConfig.php
## And then edit the new file and set the right data to be able to connect 
## to your database and setup the representation

## Default parameters (OPTIONAL). If default params are not set, then the first page shows a report about the data
#$param1_default = "XXXX";
#$param2_default = "XXXX";

## Set the dataname here (you can define several arrays for each dataname)
$dataname = 'XXXX';

## dataname configuration
$datas['XXXX'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'XXXX', // Human title for the data
	'label' => 'XXXX', // Human subtitle for the data
	'max_representations' => "XXXX", // representations you can do with your data using Area
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
		'XXXX' => array( // name of one of the fields
			'label'=>'XXXX', // Human name for the field
			'label_en'=>'XXXX', // Human name for the field
			'hidden'=>'1' 
		),
		'XXXX' => array( // name of one of the fields
			'label'=>'XXXX', // Human name for the field
			'label_en'=>'XXXX', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not set, its value is 0
			'show'=>'1' // 0 or 1
		),
		'XXXX' => array( // name of one of the fields
			'label'=>'XXXX', // Human name for the field
			'label_en'=>'XXXX', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
	)
);
?>
