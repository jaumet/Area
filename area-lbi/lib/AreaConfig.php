<?
## This is the General settings for all Area representations using this file

## AREA Vars paths
## NOTE: use slash (/) at the end
$area_path = "/var/www/html/area-lbi/";
$area_url = "http://localhost/area-lbi/";

##################################################
## Put this file in a non-webserver public space, 
## otherwise, the access to the databases will be 
## accessible publicly in internet !!
$area_data_config_path = "/var/www/html/area/area-lbi/lib/AreaConfig.php"; 


## AREA general parameters: 
##
##		values of variables to accept a parameter (field of the selected 
##		database) accepted as an area parameter (that meants the parameter will be 
##		added to the dropdown menus in the first step of an Area representation.

## $area_percnotnull : minimum of percentage of non null values of any field 
## 			the selected database (default/recommended: 80)
$area_percnotnull = 90;

## $numdistinct_max      : maximum number of distinct values (different values) 
## 			of any field of the selected database (default/recommended: 50)
$area_numdistinct_max = 50;

## $numdistinct_min       : minimum number of distinct values (different values) 
## 			of any field of the selected database (default/recommended: 2)
$area_numdistinct_min      = 2;

$quantum_default  = "quantum";

$x_min ="800";

$y_min = "600";
?>
