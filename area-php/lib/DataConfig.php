<?
## DIrectori moviments.net
$datas['directori'] = array
(
	'name' => 'Directori',
	'label' => 'Guia util moviments',
	'max_representations' => '6.103.527.116.845.563.008 ~ 6 E18',
	'description' => 'Descriptio Descriptio Descriptio Descriptio Descriptio Descriptio Descriptio Descriptio <a href="http://moviments.net" target="_moviments">moviments.net</a>',
	'db'=> array(
		'name'=>'directori',
		'user'=>'root',
		'passw'=>'gotic',
		'host'=>'localhost'
	),
	
	'table'=> 'Anydata_ItemContacts',
	'pkey'=>'id_Items',
	'fields' => array(
		's_contactname' => array(
			'label'=>'Nom',
			'filter'=>'1'
		),
		's_type' => array(
			'label'=>'Tipus',
			'filter'=>'1'
		)
	)
);

## DIrectori moviments.net
$datas['directori1'] = array
(
	'name' => 'Directori1',
	'label' => 'Guia util moviments',
	'max_representations' => '6.103.527.116.845.563.008 ~ 6 E18',
	'description' => 'Descriptio Descriptio Descriptio Descriptio Descriptio Descriptio Descriptio Descriptio <a href="http://moviments.net" target="_moviments">moviments.net</a>',
	'db'=> array(
		'name'=>'directori',
		'user'=>'root',
		'passw'=>'gotic',
		'host'=>'localhost'
	),
	
	'table'=> 'Anydata_Items',
	'pkey'=>'id_Items',
	'fields' => array(
		's_name' => array(
			'label'=>'Name',
			'filter'=>'1'
		)
	)
);

##  Data donestech2007
$datas['subvideo'] = array
(
	'name' => 'subvideo',
	'label' => 'translate online videos',
	'max_representations' => '6.103.527.116.845.563.008 ~ 6 E18',
	'description' => 'With subvideo you can add subtitles to one video (subtitles, transcriptions, translations, comments, deficitions,...). You can add timed images next to the video screen. You can search a query in subvideo database and find in which videos and at which second appears your query. Then you can see the moments in a playlist. Visit <a href="http://subvideo.tv" target="_subvideo">subvideo.tv</a>',
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
			'filter'=>'1'
		),
		'subvideo_description' => array(
			'label'=>'Description',
			'filter'=>'1'
		),
		'created_by' => array(
			'label'=>'Created by',
			'filter'=>'1'
		),
		'views' => array(
			'label'=>'Views',
			'filter'=>'0'
		),
		'kind' => array(
			'label'=>'Kind',
			'filter'=>'0',
			'join' => array(
				'table'=>'subvideo_kind',
				'key' => 'id',
				'val' => 'kind' 
			),
		),
		'subvideo_lang' => array(
			'label'=>'Language',
			'filter'=>'1'
		),
		'protected' => array(
			'label'=>'Protection',
			'filter'=>'0',
			'join' => array(
				'table'=>'subvideo_protected',
				'key' => 'id',
				'val' => 'protected' 
			)
		)
	)
);

#echo"Datas: <br />";
#echo"<pre>";
#print_r($datas);
#echo"</pre>";

#echo "Label Mes: ".$datas['donestech']['fields']['CONTINENT_ORIGEN']['label'];

?>
