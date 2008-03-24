#!/usr/bin/perl
#use strict;

use DBI;
use CGI::FormBuilder;
use CGI::Session;

use Area::Datasources;

use Data::Dumper;



#print "Content-type:text/html;charset:utf-8\n\n";

#session inicialization
my $session = CGI::Session->new();


#build the form
my $form = CGI::FormBuilder->new(
				name => 'construct2',
				method => 'post',
				submit => 'Next',
				stylesheet => 1,
				table => 0,
				linebreaks => 1,
				fields => [qw(datasrcname savethis panelx panely quantum block_values block_selected block_labels color_selected color_values color_labels param1 param2 pk_field)],
				);


if($form->submitted && $form->validate) {
	$session->save_param($form);
	print "Location: areac3.cgi?CGISESSID=".$session->id."\n\n";
	exit();
}

#check if there is data in the session or redirect to the first step
if(!$session->param('param1')) {
	print "Location: areac1.cgi\n\n";
	exit();
}

#get variables from first form
my $param1 = $session->param('param1');
my $param2 = $session->param('param2');
my $datasrcname = $session->param('datasrcname');
#connexio a la bd mysql
my ($dbh,$datasrc)=Area::Datasources::connect($datasrcname);
#my %datasrc = %{$datasrc};

#print "DEBUG $param1 $param2 $datasrcname!";
#print Dumper( $datasrc );
#print Dumper( \%Area::Datasources::datas );



#sub to escape mysql special chars
sub myescape {
	my $escaped = $_[0];
	$escaped =~ s/\\/\\\\/g;
	$escaped =~ s/'/\\'/g;
	return $escaped;
}

my ($blkkeys,$blkvals) = getdistinctvals($datasrc,$param1);
my ($colkeys,$colvals) = getdistinctvals($datasrc,$param2);

#print Dumper($blkkeys);
#print Dumper($blkvals);
#print Dumper($colkeys);
#print Dumper($colvals);


sub getdistinctvals() {
	my $ds=shift;
	my $fieldn=shift;

	my $f=$ds->{fields}{$fieldn};
	my $localf=&myescape($datasrc->{table}.".".$fieldn);
	my $localtbl=&myescape($datasrc->{table});

	## Selectng distinct values for key
	my $query = "SELECT DISTINCT $localf FROM $localtbl WHERE $localf IS NOT NULL ORDER BY 1";
  #print $query;
	my $keys = $dbh->selectcol_arrayref($query) or die("database error");

	my $vals;

	if (defined($f->{join})) { 
		my $join=$f->{join};
	    my $joinkey=myescape($join->{table}.".".$join->{key});
	    my $joinval=myescape($join->{table}.".".$join->{val});
		my $jointbl=&myescape($join->{table});

		$query = "SELECT DISTINCT $joinval FROM $localtbl, $jointbl where $localf=$joinkey ORDER BY $localf";
	 	$vals = $dbh->selectcol_arrayref($query) or die("database error");

	} else {
		$vals = $keys;
	}
			
#	print "KEYS\n".Dumper($keys)."VALS\n".Dumper($vals);
	return($keys,$vals);
}

$form->field(name => 'datasrcname', type => 'hidden', value => $session->param('datasrcname'));
$form->field(name => 'panelx', value => '800', maxlength => 4, size => 2, required => 1);
$form->field(name => 'panely', value => '600', maxlength => 4, size => 2, required => 1);
$form->field(name => 'quantum', label =>'Node size',options => [ ('quantum', 'non-quantum')], value => 'quantum', required => 1);
$form->field(name => 'block_selected', type => 'checkbox', options => $blkvals, linebreaks => 1, label => "Blocks: $datasrc->{fields}{$param1}{label}<br />", value => $blkvals, required => 1, size=>  scalar @{$blkkeys});

$form->field(
	name => 'color_selected', 
	type => 'checkbox', 
	options => $colvals, 
	value => $colvals, 
	linebreaks => 1, 
	label => "Colors: $datasrc->{fields}{$param2}{label}<br />", 
	required => 1, 
	);

$form->field(name => 'block_values', type => 'hidden', value => $blkkeys);
$form->field(name => 'block_labels', type => 'hidden', value => $blkvals);
$form->field(name => 'color_values', type => 'hidden', value => $colkeys);
$form->field(name => 'color_labels', type => 'hidden', value => $colvals);
$form->field(name => 'param1', type => 'hidden', value => $param1);
$form->field(name => 'param2', type => 'hidden', value => $param2);
$form->field(name => 'pk_field', type => 'hidden', value => $pk_field);

#needed for next step
my $savethis ="no"; $form->field(name => 'savethis', type => 'hidden', value => $savethis);

my $rndcolor;
if(!$colors){$colors = ""};
if ($colors !~ m/\d/g)  { 
	$colors = ""; $rndcolor = "si"; 
} else { 
	$rndcolor = "no"; 
}

# Starting html
print "Content-type:text/html;charset:utf-8\n\n";

print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">\n
	<head>
	<title>:: AREA :: treemaps visualization - Step 2</title>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	<link rel=\"SHORTCUT ICON\" href=\"imgs/logoareapetit.png\" />
	<!-- <meta http-equiv=\"refresh\" content=\"50\"> -->";
# writing css styles and js functions
print "\n<LINK href=\"area.css\" rel=\"stylesheet\" type=\"text/css\" />\n";

print "<script type=\"text/javascript\">
function checkAll(checkname, exby) {
  for (i = 0; i < checkname.length; i++)
    checkname[i].checked = exby.checked? true:false
    }";
print "function uncheckAll(checkname, exby) {
  for (i = 0; i < checkname.length; i++)
    checkname[i].checked = exby.checked? false:true
    }
</script>";
print "</head>";
print "<body>";

######################## Writing.....................
print "<div id=\"headerdiv\">";
print "<h2><a href=\"/area\"><img src=\"area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>";
print " AREA, visualization tool<br>";
print "</div>";

print "<div id=\"formdiv\">";
print "<h2>Step 2: define & refine both parameters <b>$datasrc->{fields}{$param1}{label}</b> and <b>$datasrc->{fields}{$param2}{label}</b></h2>\n";
print "<p>Param1 ( <a href=\"#\" onClick=\"checkAll(document.construct2.block_selected,this)\">Uncheck</a> | ";
print "<a href=\"#\" onClick=\"uncheckAll(document.construct2.block_selected,this)\">Check</a> )<br>\n";
print "Param2 ( <a href=\"#\" onClick=\"checkAll(document.construct2.color_selected,this)\">Uncheck</a> |";
print "<a href=\"#\" onClick=\"uncheckAll(document.construct2.color_selected,this)\">Check</a> )<br>\n";
print $form->render();
#print "<p>>>>>>>>$tablename1</p>";
print "</div>";
print "\n</body></html>";


#print Dumper(@Area::Datasources::datas);

#es tanca la conexió
$sth->finish();
$dbh->disconnect();
