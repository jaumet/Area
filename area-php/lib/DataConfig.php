<?

##  Data donestech2007
$datas['donestech'] = array
(
	        'name' => 'dones i tecnologies 2007',
		'label' => 'Feminicis a l\'Estat Espanyol des de l\'any 2000. 556 entrades',
		'db'=> array(
			'name'=>'donestech2007',
			'user'=>'area',
			'passw'=>'lala',
			'host'=>'localhost'
		),
	
	'table'=> 'donestech2007',
	'pkey'=>'numero',
	'fields' => array(
		'CONTINENT_ORIGEN' => array(
			'label'=>'Continent d\'origen',
			'filter'=>'1'
		),
		'EDAT' => array(
			'label'=>'Edat'
		),
		'ESTUDIS_TECNICS' => array(
			'label'=>'Estucis tecnics'
		)
		
	)
);

#echo"Datas: <br />";
#echo"<pre>";
#print_r($datas);
#echo"</pre>";

#echo "Label Mes: ".$datas['donestech']['fields']['CONTINENT_ORIGEN']['label'];

?>
