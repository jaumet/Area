#!/usr/bin/perl
#use strict;

BEGIN {
	push @INC , './';
}

#my $file = 'xml/sample10.xml';

use CGI::Session;
use CGI::FormBuilder;
use Area::Display;
use XML::Simple;

#session inicialization
my $session = CGI::Session->new();



#if (!$xmlfile) {
#	$xmlfile = "xml/test.xml";
#	my $default_gallery = "on";
#}


#create the form object
my $form = CGI::FormBuilder->new(
				name => 'gallery',
				method => 'post',
				submit => 'area it',
				stylesheet => 1,
				#table      => {width => 1400},
				table      => 0,
				fields => [qw(gallery xmlfile)],
				);

#	my $xmlfile = $session->param('gallery');
if ($session->param('gallery')) { 
	$xmlfile = $session->param('gallery');
} else { 
	$xmlfile = $form->cgi_param('xmlfile');
}
	
if($form->submitted && $form->validate) {
	#Begin the session
	my $session = CGI::Session->new('driver:File', undef, { Directory=> "/tmp"});

	#save the params into the session
	$session->save_param($form);
	print "Location: areaFromXML.cgi?CGISESSID=".$session->id."\n\n";
	exit(0);
}

my %area;

if ($xmlfile) {
my $xs1 = XML::Simple->new();
 %area = %{$xs1->XMLin($xmlfile)};
}

# Starting html
print "Content-type:text/html;charset:utf-8\n\n";
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">
<head>
	<title>:: AREA :: ";
	print $area{name} ? $area{name} : "Gallery";
	print " :: </title>\n";
	print "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	<link rel=\"SHORTCUT ICON\" href=\"imgs/logoareapetit.png\" />
	<!-- <meta http-equiv=\"refresh\" content=\"50\"> -->";
# writing css styles
print "<LINK href=\"area.css\" rel=\"stylesheet\" type=\"text/css\" />";
print "<script language=javascript type='text/javascript'>
function hideDiv() {
	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById('hideShow').style.visibility = 'hidden';
	} else {
		if (document.layers) { // Netscape 4
			document.hideShow.visibility = 'hidden';
		} else { // IE 4
		document.all.hideShow.style.visibility = 'hidden';
		}
	}
}

function showdiv() {
	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById('hideShow').style.visibility = 'visible';
	} else {
		if (document.layers) { // Netscape 4
			document.hideShow.visibility = 'visible';
		} else { // IE 4
			document.all.hideShow.style.visibility = 'visible';
		}
	}
}
</script>";
require "./ajaxscript.pl";
print "</head>";
print "<body bgcolor=\"grey\" >";

	print "<div id=\"headerdiv\">";
	print "<h2><a href=\"/area\"><img src=\"area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>";
	print " AREA, visualization tool</h2>";
	print "</div>";

	my @list_xml = <./xml/*.xml>;
   # $form->field(name => 'gallery', type=> 'select', options=>\@list_xml);
   # $form->field(name => 'xmlfile', type=> 'hidden');

	print "<div id=\"formdiv\">";
	print "List of areas we have in the server. ";
	print $area{name}?"Showing  the area called: <span class=\"gallery\">$area{name}</span>":"";
	#/ <a href=\"javascript:hideDiv()\">-</a> <br />";
	print "<br /><a href=\"./areaFromXML.cgi\" class=\"gallery\">Go to gallery</a>";
	##print $form->render();
	print "</div>";


if ($xmlfile) {

        print "<div id=\"hideShow\">";
        print "<p>Area Name: $area{name}<br>Authoring: $area{by}<br> Area description: $area{description}
<br>Dim: $panelx X $panely pixels<br><a href=\"#\" onmouseover=\"hideDiv()\"\">close</a></p>";
        print "</div>";
 

	Area::Display::html(\%area);
		
	#print "THE END!";
	
} else {

	
	print "<div id=\"analisisdiv\">";
	print "<h2>List of static areas:<br><br>";
	my $li;
	$list_xml = @list_xml;
	print "Currently there are $list_xml areas in the gallery:<br>";
	foreach $li(@list_xml) {
		if ($li =~ m/E-Library-/) {
			$list_elibrary .= "<li><a href=\"areaFromXML.cgi?xmlfile=$li\">";
			$li =~ s/\.\/xml\///;
			$li =~ s/\.xml//;
			$li =~ s/_/ /g;
			$li =~ s/E-Library-/ /g;
			$list_elibrary .= "$li</a></li>";
		}
		if ($li =~ m/violencies-/) {
			$list_violencies .= "<li><a href=\"areaFromXML.cgi?xmlfile=$li\">";
			$li =~ s/\.\/xml\///;
			$li =~ s/\.xml//;
			$li =~ s/_/ /g;
			$li =~ s/violencies-/ /g;
			$list_violencies .= "$li</a></li>";
		}
		if ($li =~ m/donestech2007-/) {
			$list_donestech2007 .= "<li><a href=\"areaFromXML.cgi?xmlfile=$li\">";
			$li =~ s/\.\/xml\///;
			$li =~ s/\.xml//;
			$li =~ s/_/ /g;
			$li =~ s/donestech2007-/ /g;
			$list_donestech2007 .= "$li</a></li>";
		}
		if ($li =~ m/moviments_d-/) {
			$list_moviments_d .= "<li><a href=\"areaFromXML.cgi?xmlfile=$li\">";
			$li =~ s/\.\/xml\///;
			$li =~ s/\.xml//;
			$li =~ s/_/ /g;
			$li =~ s/moviments_d-/ /g;
			$list_moviments_d .= "$li</a></li>";
		}
	}
	print "<p><a href=\"http://donestech.net\">Donestech</a> 2007:</p><ul>";
	print $list_donestech2007;
	print "</ul>";
	print "<p>Violencies, Feminicidis:</p><ul>";
	print $list_violencies;
	print "</ul>";
	print "<p>E-Library:</p><ul>";
	print $list_elibrary;
	print "</ul>";
	print "<p>Guis Util de Movimets:</p><ul>";
	print $list_moviments_d;
	print "</ul>";
	print "</h2>";
	
	print "</div>";
}
print "\n</body></html>";

