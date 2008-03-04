#!/usr/bin/perl

use CGI qw/:standard/;
use CGI::FormBuilder;
use CGI::Session;

use XML::Simple;
my $xs = new XML::Simple;
use HTML::Entities;
use Area::Datasources;

#session inicialization
my $session = CGI::Session->new(param('CGISESSID'));


#form creation
my $form = CGI::FormBuilder->new(
			method => 'post',
			submit => ['save this'],
			stylesheet => 1,
			#styleclass => 'about',
			table => 1,
			fields => [ qw(datasrcname area_name area_by area_description CGISESSID) ]
);

# submitting form
if($form->submitted && $form->validate) {
	$session->save_param($form);
	print "Location: areaWriteXML.cgi?CGISESSID=".$session->id."\n\n";
	exit();
}
			
# defining form fields
$form->field(name => 'datasrcname', type => 'hidden', value => $session->param('datasrcname'));
$form->field(name => 'area_name', value => $session->param('area_name'));
$form->field(name => 'area_by', value => $session->param('area_by'));
$form->field(name => 'area_description', type => 'textarea', value => $session->param('area_description'));
$form->field(name => 'CGISESSID', type => 'hidden', value => param('CGISESSID'));

#$session->save_param($form);
#getting variables
## not hidden fields
my $datasrcname = $session->param('datasrcname');
my $tablename =  $session->param('tablename');
my $area_name = $session->param('area_name');
my $area_by = $session->param('area_by');
my $area_description = $session->param('area_description');
$area_description = qq{$area_description};
## hidden fiels
my $param1 = $session->param('param1');
my $param2 = $session->param('param2');
my $blocks = $session->param('param1_selected');
my $blocks_realname = $session->param('param11_selected');
my $panelx = $session->param('panelx');
my $panely = $session->param('panely');
my $list2 = $session->param('param2_selected');
my $list2_realname = $session->param('param22_selected');
my $quantum = $session->param('quantum');
my $colors = $session->param('colors');

my $blocksnum = @{$blocks};
if($blocksnum == 0) {
	@{$blocks} = $blocks;
	$blocksnum = @{$blocks};
}

## variables hardcoded:
#$dbName ="docmemproject"; 
my $dbName;
if ($tablename eq "autori") { $dbName = "docmemproject_elibrary"; } else { $dbName = "docmemproject"; }
$dbPasswd = "c4c4t14";
$dbUser = "docmemproject";

# Starting html
print "Content-type:text/html;charset:utf-8\n\n";
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">\n
	<head>
	<title>:: AREA :: treemaps visualization - Step 3</title>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	<link rel=\"SHORTCUT ICON\" href=\"imgs/logoareapetit.png\" />
	<!-- <meta http-equiv=\"refresh\" content=\"50\"> -->";

# writing css styles
print "\n<LINK href=\"area.css\" rel=\"stylesheet\" type=\"text/css\" />\n";

print "</head>";
print "<body bgcolor=\"grey\" onload=\"javascript:document.areaform.tag.focus()\">";

#print HTML::Entities::encode($session->param('areaxml'));

# Legend div
print "<div id=\"headerdiv\">";
print "<h2><a href=\"/area\"><img src=\"area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>";
print " AREA, visualization tool</h2>";
print "</div>";

print "\n<div id=\"formdiv\">";

# 2 options:

## Coming here from 3r step (save this)
if ($area_name and $area_description) {

	my %area=%{XMLin($session->param('areaxml'))};

	$area{name}=$area_name;
	$area{author}=$area_by;
	$area{description}=$area_description;

#if ($area_name and $area_by and $area_description) {
	# writing xml conf file
	my $xmlname = qq{$area_name};; $xmlname =~ s/ /_/g; $xmlname = qq{$xmlname};
	$f = "./xml/".$datasrcname."-".$xmlname.".xml";
	print "hola".$f;
	open(DAT,"> $f") || die("Cannot Open File");
	print DAT XMLout(\%area);
	close(DAT);
	
	print "<div>";
	print "<h1>Area saved!</h1>";
	print "<h1>You can see it in the <a href=\"areaFromXML.cgi\">gallery</a></h1>";
	print "</div>";
	print "</div>\n";
}
	print "<div>";

if (!$area_name or !$area_description) {
	print "<h1>Area info</h1>";
	print "<h1>Please decide this important information. People will find your area depending on this information:</h1>";
	print "</div>";
	print "</div>\n";
	print "\n<div id=\"analisisdiv\">";
	print "<div>";
	print $form->render();
}

print "</div>";

print "\n<div id=\"analisisdiv\">";
print "</div>";

print "\n</body></html>";
