#!/usr/bin/perl

use strict;

use CGI qw/:standard/;
use DBI;
use Area::Datasources;

print "Content-type:text/html;charset:utf-8\n\n";

#sub to escape mysql special chars
sub myescape {
	my $escaped = $_[0];
	$escaped =~ s/\\/\\\\/g;
	$escaped =~ s/'/\\'/g;
	return $escaped;
}

my $pk=param('pk');
my $datasrcname=param('src');

#connexio a la bd mysql
my ($dbh,$datasrc)=Area::Datasources::connect($datasrcname);
my %datasrc = %{$datasrc};
my $pk_field=$datasrc{pkey};

$pk+=0;

##############
#my $data_val = $datasrc->{fields}{id}{join}{val};
#my $data_key= $datasrc->{fields}{id}{join}{key};
#my $data_table = $datasrc->{fields}{id}{join}{table};
#my $mm;
#my $join;
my $query;
#my $qqq;
#foreach $mm($datasrc->{fields}) {
#print "SSSS: ".$datasrc->{fields}{$mm}{join};
#	if ($datasrc->{fields}{$mm}{join}{table}) {
#		$query = "SELECT $datasrc->{fields}{$mm}{join}{table}.$datasrc->{fields}{$mm}{join}{val}, $datasrc->{table}
#			FROM $datasrc->{fields}{$mm}{join}{table}, $datasrc->{table} 
#			WHERE $datasrc->{fields}{$mm}{join}{table}.$datasrc->{fields}{$mm}{join}{key} = ".$pk_field." ;";
#		$qqq .= $query;
#	} else {        
		$query = "SELECT * FROM ".&myescape($datasrc{table})." WHERE ".&myescape($pk_field)."=".$pk.";";
		##my $query = "SELECT * FROM ".&myescape($datasrc{table})." WHERE ".$filter.";";
#	}
#}
#print "DDDDD: ".$qqq;
#print "QQQQQ: $query";
my $sth = $dbh->prepare($query) or die "Can't prepare statement: $DBI::errstr";
my $rc = $sth->execute() or die "Can't execute statement: $DBI::errstr";

## getting form variables
print qq|<h3>Node info - <a href="#" onclick="javascript: hidediv('node_info');">close</a></h3>|;
#print "<p><i>[help: just look for a tag and click on the colored squares]</i></p>";

my $row = $sth->fetchrow_hashref();

print "<dl>\n";
map { 	
	if (	(my $val=$row->{$_}) && !($datasrc{fields}{$_}{hidden})) {
		my $label=$datasrc{fields}{$_}{label};
		$label=$_ if !defined $label;
	  print "<dt>$label:</dt><dd><b>$val</b></dd><br />\n"; 
	}	  
} keys(%{$row});
print "</dl>\n";

