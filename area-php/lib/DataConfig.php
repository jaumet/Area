<?

##  Data donestech2007
$datas['subvideo'] = array
(
	'name' => 'subvideo',
	'label' => 'translate online videos',
	'db'=> array(
		'name'=>'subvideo',
		'user'=>'root',
		'passw'=>'gotic',
		'host'=>'localhost'
	),
	
	'table'=> 'subvideos',
	'pkey'=>'id',
	'fields' => array(
		'subvideo_name' => array(
			'label'=>'Name',
			'filter'=>'0'
		),

		'created_by' => array(
			'label'=>'Created by',
			'filter'=>'1'
		),

		'kind' => array(
			'label'=>'Kind',
			'filter'=>'1',
			'join' => array(
				'table'=>'subvideo_kind',
				'key' => 'id',
				'val' => 'kind' 
			),
		),
		'subvideo_lang' => array(
			'label'=>'Language',
			'filter'=>'1'
		)
		
	)
);

#echo"Datas: <br />";
#echo"<pre>";
#print_r($datas);
#echo"</pre>";

#echo "Label Mes: ".$datas['donestech']['fields']['CONTINENT_ORIGEN']['label'];

?>
