<?
## This is the AreaConfig-sample file: 
## copy this file:
## $: cd /path/to/area/diretory
## $: cd lib/
## $: cp AreaConfig-sample.php AreaConfig.php
## And then edit the new file and set the right data to be able to connect 
## to your database and setup the representation

## Sample configuration with documentation
$datas['violencies'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Feinicidis Estat Espanyol', // Human title for the data
	'label' => 'des del 2000 fins avui', // Human subtitle for the data
	'max_representations' => '', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'docmemproject', // database name
		'user'=>'docmemproject', // database user
		'passw'=>'c4c4t14', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'violencies', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'mes' => array( // name of one of the fields
			'label'=>'Mes', // Human name for the field
			'label_en'=>'Month', // Human name for the field
			'filter'=>'0', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'mitja' => array( // name of one of the fields
			'label'=>'Mitj&agrave;', // Human name for the field
			'label_en'=>'Media', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'nom_victima' => array( // name of one of the fields
			'label'=>'Nom de la v&iacute;ctima', // Human name for the field
			'label_en'=>'Name', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'edat' => array( // name of one of the fields
			'label'=>'Edat', // Human name for the field
			'label_en'=>'Age', // Human name for the field
			'filter'=>'0', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'edat_grups' => array( // name of one of the fields
			'label'=>'Grups d\'edat v&iacute;ctimes', // Human name for the field
			'label_en'=>'Age group', // Human name for the field
			'filter'=>'0', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'ciutat' => array( // name of one of the fields
			'label'=>'Ciutat', // Human name for the field
			'label_en'=>'City', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'comunitat_autonoma' => array( // name of one of the fields
			'label'=>'Comunitat Aut&ograve;noma', // Human name for the field
			'label_en'=>'Autonomous Comunity', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'parentiu_agresor' => array( // name of one of the fields
			'label'=>'Parentiu Agresor', // Human name for the field
			'label_en'=>'Relationship', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'armes' => array( // name of one of the fields
			'label'=>'Armes', // Human name for the field
			'label_en'=>'Weapons', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'fets' => array( // name of one of the fields
			'label'=>'Relat dels fets', // Human name for the field
			'label_en'=>'Story', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'any' => array( // name of one of the fields
			'label'=>'Any', // Human name for the field
			'label_en'=>'Year', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'tipus_violencies_1' => array( // name of one of the fields
			'label'=>'tipus violencies 1', // Human name for the field
			'label_en'=>'violencies type 1#', // Human name for the field
			'hidden'=>'1' 
		),
		'tipus_violencies_2' => array( // name of one of the fields
			'label'=>'tipus violencies 2', // Human name for the field
			'label_en'=>'violencies type 2#', // Human name for the field
			'hidden'=>'1' 
		),
		'id' => array( // name of one of the fields
			'label'=>'Entrada n&ugrave;mero', // Human name for the field
			'label_en'=>'Entry number', // Human name for the field
			'hidden'=>'1' 
		),
	)
);
?>
