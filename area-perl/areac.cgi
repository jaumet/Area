#!/usr/bin/perl
use strict;
use CGI::FormBuilder;
use CGI::Session;

#create the form object
my $form = CGI::FormBuilder->new(
				name => 'construct1',
				method => 'post',
				submit => 'next step',
				stylesheet => 1,
				#table      => {width => 1400},
				table      => 0,
				fields => [qw(datasrcname)],
				);


if($form->submitted && $form->validate) {
	#Begin the session
	my $session = CGI::Session->new('driver:File', undef, { Directory=> "/tmp"});

	#save the params into the session
	$session->save_param($form);
	print "Location: areac1.cgi?CGISESSID=".$session->id."\n\n";
	exit(0);
}

# Starting html
print "Content-type:text/html;charset:utf-8\n\n";
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">\n
	<head>
	<title>:: AREA :: treemaps visualization - Step 0</title>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	<link rel=\"SHORTCUT ICON\" href=\"imgs/logoareapetit.png\" />
	<!-- <meta http-equiv=\"refresh\" content=\"50\"> -->";

# writing css styles
print "\n<LINK href=\"area.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
print "</head>\n";

print "<body>";

####### HEAD div
print "<div id=\"headerdiv\">";
print "<h2><a href=\"/area\"><img src=\"area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>";
print " AREA, visualization tool<br>";
print "</h2>";
print "</div>";

print "<div id=\"formdiv\">";
print "<a href=\"d/\">project & about</a> | <a href=\"areaFromXML.cgi\">gallery</a>";
print "</div>";

print "<div id=\"analisisdiv\">";
print "<h2>Welcome, this is AREA.</h2>";
print "<h3>AREA allows to represent Data Bases. You can represent 2 fields of the data base,<br /> the number of entries and a third aparameter using the filter. Just follow the steps to try it.</h3>";
print "<br>";
print "<p>Three steps for your representation:</p>";
print "<ol><li>Data source <i>(this step)</i>: choose the data you want to represent.</li>";
print "<li>Parameters: choose 2 fields of the database.</li>";
print "<li>Values: refine what to represent for each field. And graph settings: dimesion, colors, kind of map.</li></ol>";
my @tables = ("violencies","autori","freemusic");
$form->field(name => 'datasrcname', type=> 'select', options=>\@tables, required => 1);
print "<p><b>First</b> you have to choose which data you want to represent. We have right now <b>2 avaliable data bases</b>:<br>";
print "<ul><li><b>Violencies</b>: data compiled by <a href=\"http://riereta.cat\" target=\"_nuria\">Núria Vergés</a> about killed women & gender violence from 2000 to 2006 in spanish state</li><li><b>E-library</b>: a compilation of articles about Social Moviments in Europe since 2000. Made inside Memory Project (Data in English). <a href=\"http://nualart.com/area/d/?q=node/3\">Read more</a></ul>";
print $form->render();
print "</p></div>";


print "\n</body></html>";
