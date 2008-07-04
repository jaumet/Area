<?

##  Data donestech2007
$datas['subvideo'] = array
(
	'name' => 'subvideo',
	'label' => 'translate online videos',
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
		),
		'protected' => array(
			'label'=>'Protection',
			'filter'=>'1',
			'join' => array(
				'table'=>'subvideo_protected',
				'key' => 'id',
				'val' => 'protected' 
			),
		),
	)
);

#echo"Datas: <br />";
#echo"<pre>";
#print_r($datas);
#echo"</pre>";

#echo "Label Mes: ".$datas['donestech']['fields']['CONTINENT_ORIGEN']['label'];

?>
