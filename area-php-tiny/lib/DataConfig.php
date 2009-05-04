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
		'passw'=>'gotic', // database password
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

$datas['prixars'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'prixdata', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
);
$datas['prixars_ca'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'ca', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
);
$datas['prixars_jp'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'jp', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
);
$datas['prixars_ju'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'ju', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
);
$datas['prixars_pe'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'pe', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
);
$datas['prixars_wo'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'wo', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
);
$datas['prixars_ca'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'ca', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
);
$datas['prixars_jp'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'jp', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
);
$datas['prixars_ju'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'ju', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
);
$datas['prixars_pe'] = array // Name for the data (only letters and/or numbers
(
	'name' => 'Prix Ars', // Human title for the data
	'label' => 'test data', // Human subtitle for the data
	'max_representations' => 'XXXX', // Use area_calc.rb to calculate how many 
					 // representations you can do with your data using Area
	'description' => 'XXXX', // Description of the Data (accepts HTML.
	'db'=> array(
		'name'=>'prixars', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'pe', // Table to be represented.
	'pkey'=>'id', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
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
		'name'=>'ae_submissions', // database name
		'user'=>'root', // database user
		'passw'=>'gotic', // database password
		'host'=>'localhost' // Host. Ussually is 'localhost'
	),
	
	'table'=> 'submission', // Table to be represented.
	'pkey'=>'iSubmissionID', // Unique value per entrye (use to be the 'id'
	'fields' => array( // list of fields in the database
		'gender' => array( // name of one of the fields
			'label'=>'Gender', // Human name for the field
			'filter'=>'1', // 0 or 1. By defaulf or if 'label' is not setted, its value is 0
			'show'=>'1' // 0 or 1
		),
		'year' => array( // example of one field that joins another table
			'label'=>'Year', // Human name for the field
			'filter'=>'1'
			//'join' => array(
			//	'table'=>'XXXX', // Table to join
			//	'key' => 'XXXX', // Key to join
			//	'val' => 'XXXX'  // value to get
			//),
		),
	)
)
?>
