#!/usr/bin/perl
## Sample of database configuration to represent witrh Area

package Area::Datasources;
use Data::Dumper;
use strict;

our %datas;
our $dbh;
our $datasrc;

sub connect {
	my ($datasrcname)=@_;
	$datasrc=$datas{$datasrcname};
	
	#connexio a la bd mysql
	$dbh = DBI->connect("DBI:mysql:".$datasrc->{db}{name}, $datasrc->{db}{user}, $datasrc->{db}{pass})
         or die "Couldn't connect to database: " . DBI->errstr;

	return ($dbh,$datasrc);         
}


$datas{'XXXXX'} = {
        'name' => 'XXXXXX',
	'label' => 'XXXXXXXX',
        'max_representations' => 'XXXXXXX',
	'db'=> {
		'name'=>'XXXXXX',
		'user'=>'XXXXXX',
		'pass'=>'XXXXXXX',
		'host'=>''
	},
	'table'=> 'XXXXX',
	'pkey'=>'XXXXX',

	'fields' => {
  	XXXX	=> { hidden => 1 },
		'abstract' => { 
			'label'=>"XXXXXX",
			'filter'=>1,
		},

		'XXXXX' => { 
			'label'=>"XXXXX",
			'filter'=>1,
		},

		'XXXXX' => { 
			'label'=>"XXXXXX",
			'filter'=>1,
		},

		'XXXXX' => { 
			'label'=>"XXXXX",
			'filter'=>1,
		},
		
		'XXXXX' => { 
			'label'=>"XXXXXX",
			'join' => {
				'table'=>'XXXXX',
				'key' => 'XXXXX',
				'val' => 'XXXXX' 
			},
 			hidden => 1
		},

	}
};

1;
