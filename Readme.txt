AREA :: database representation usin treemaps.

Area project page: http://nualart.com/area

Download Area: svn co http://svn2.assembla.com/svn/area

 Area is copyrihg of Jaume Nualart (2006-2010) and is released under the tems of GPL license (see http://gnu.org)

INSTALL

* 3 Area versions:

1- Area-drupal: this is a module for Drupal CMS, tested in 6.x versions
	- cp -R area-drupal/* /your_drupal_path/modules/area
	- Activate the module in drupal admin
	- Setup the Area configuration in drupal administer
	- Set permissions for are use
	- Setup Area block

2- Area-php: php version of Area. It works separate to any application.
	- cp lib/AreaConfig-sample.php lib/AreaConfig.php
	- Edit lib/AreaConfig.php
	- cp lib/DataConfig-sample.php lib/DataConfig.php
	- Edit lib/DataConfig.php
	- Go to http://path_to_area/area/area-php/

3 area-perl: old Area version in perl.
	- Setup apache permissions for cgi execution in the directory area-perl/
	- cp lib/AreaConfig-sample.php lib/AreaConfig.php
	- Edit lib/AreaConfig.php
	- cp lib/DataConfig-sample.php lib/DataConfig.php
	- Edit lib/DataConfig.php
	- Go to http://path_to_area/area/area-php/


	
