#!/usr/bin/perl
use strict;

use CGI qw/:standard/;
use CGI::FormBuilder;
use CGI::Session;
use DBI;

use Area::Datasources;

#session inicialization
my $session = CGI::Session->new();

#create the form object
my $form = CGI::FormBuilder->new(
				name => 'construct1',
				method => 'post',
				submit => 'Next',
				stylesheet => 1,
				#table      => {width => 1400},
				table      => 0,
				fields => [qw(datasrcname param1 param2)],
				);

if($form->submitted && $form->validate) {
	#Begin the session
	my $session = CGI::Session->new('driver:File', undef, { Directory=> "/tmp"});

	#save the params into the session
	$session->save_param($form);
	print "Location: areac2.cgi?CGISESSID=".$session->id."\n\n";
	exit(0);
}

my $datasrcname = param('datasrcname');
$datasrcname = $session->param('datasrcname') unless $datasrcname;

#connexio a la bd mysql
my ($dbh,$datasrc)=Area::Datasources::connect($datasrcname);
#my %datasrc = %{$datasrc};

#sub to escape mysql special chars
sub myescape {
	my $escaped = $_[0];
	$escaped =~ s/\\/\\\\/g;
	$escaped =~ s/'/\\'/g;
	return $escaped;
}

# Starting html
print "Content-type:text/html; charset:utf-8;\n\n";
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\">\n
	<head>
	<title>:: AREA :: treemaps visualization - Step 1</title>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	<link rel=\"SHORTCUT ICON\" href=\"imgs/logoareapetit.png\" />
	<!-- <meta http-equiv=\"refresh\" content=\"50\"> -->";

# writing css styles
print "\n<LINK href=\"area.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
print "</head>\n";

print "<body>";


#preparacio de la taula en questio
my $query = "SELECT * FROM ".&myescape($datasrc->{table}).";";
my $sth = $dbh->prepare(qq{$query}) or die "Can't prepare statement: $DBI::errstr";
my $rc = $sth->execute
	or die "Can't execute statement: $DBI::errstr";

# Info de cada camp
my $numfields = $sth->{NUM_OF_FIELDS};
my $numrows = $sth->rows;
my @fieldnames =  @{ $sth->{NAME} };

####### Sobre la taula:
# Nom de la taula
print "<div id=\"headerdiv\">";
print "<h2><a href=\"/area\"><img src=\"area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>";
print " AREA, visualization tool<br>";
print "</div>";

my @params;
my %params;		
my $count = "0";
my $i = 0;
my @good;
my @bad;

foreach my $n (@fieldnames) {

	my $f=$datasrc->{fields}{$n};

	if (!defined($f)) {
		print "note: field named $n is not defined in the config!"
	}		

	# Count valors distinct per a cada field
	my $qdistinct = "SELECT COUNT(DISTINCT $n) from ".&myescape($datasrc->{table});
	my $stdistinct = $dbh->prepare(qq{$qdistinct}) or die "Can't prepare statement: $DBI::errstr";
	
	# veure quants son nuls per a cada field	
	my $qnull = "SELECT COUNT(*) from ".&myescape($datasrc->{table})." WHERE ".&myescape($n)."='' OR ".&myescape($n)." IS NULL ;";
	my $stnull = $dbh->prepare(qq{$qnull}) or die "Can't prepare statement: $DBI::errstr";
		
	$count++;
	$stdistinct->execute or die "Can't execute statement: $DBI::errstr";
	$stnull->execute or die "Can't execute statement: $DBI::errstr";
	my $numdistinct = ($stdistinct->fetchrow_array())[0];
	my $numnull = ($stnull->fetchrow_array())[0];

	my $percdistinct = sprintf("%.2f", ($numdistinct*100)/($numrows - $numnull + 1));
	my $percnotnull = sprintf("%.2f", (($numrows - $numnull)*100)/$numrows);

	my $class;
	my $bin;
	
	if (($percnotnull < "80") or ($numdistinct > "50") or ($numdistinct < "2")) {
		$bin=\@bad; 
		$class='bad';
	} else {
		$bin=\@good; 
		$class='good';
		push(@params, $n);
		$params{$n}=$datasrc->{fields}{$n}{label};
	}

	my $humann = $n;
	if (defined($f->{label})) {
		$humann = $f->{label};
	} else {
		$humann =~ s/_/ /g;
	}
	
	my $html = qq|<tr class="$class"><td>$humann</td><td> no null: |.($numrows - $numnull).qq| ($percnotnull %) </td><td> distinct values: $numdistinct ($percdistinct %)</td></tr>\n|;

	push @{$bin}, $html;


}

##########################################################
###################      Writing      ####################
##########################################################


#Add fields with sql results to the form and print the form
@params = sort(@params);
print "<div id=\"formdiv\">";
$form->field(name => 'datasrcname', type=> 'hidden', value=>$datasrcname, required => 1);
$form->field(name => 'param1', type=> 'select', options=>\%params, required => 1);
$form->field(name => 'param2', type=> 'select', options=>\%params, required => 1);
print "<h2>Step 1: choose 2 main parameters visualization</h2>";
print $form->render();
print "</div>";
print "<br /><br /><br />";
print "<div id=\"analisisdiv\">";

print "<h2>About the data: $datasrc->{name} </h2>";
##print "<p><ul><li>Database Name: ".$datasrc->{db}{name}."</li>\n";
print "<p><ul><li>Database Label: <b>".$datasrc->{label}."</b></li>\n";
##print "<li>Table Name: <b>".$datasrc->{table}."</b></li>\n\n";
# Numero de camps a la taula
print "<li>Number of fields: ".$numfields."</li>\n\n";
# Numero d'entrades
print "<li>Number of records: ".$numrows."</li>";
if ($datasrc->{max_representations}) { 
	print "<li>Possible AREA representations: <b>".$datasrc->{max_representations}."</b></li>";
}
print "</ul></p>";
print "<p>You can choose 2 of these parameters:</p>";
print "<table>".join('',@good)."</table>";

#Valors < 10% no nuls. Els "no bons?"
print "<p>List of the rest of fields:</p>";
print "<table>".join('',@bad)."</table>";
print "</div>";

#es tanca la conexió
$sth->finish();
$dbh->disconnect();

print "\n</body></html>";
