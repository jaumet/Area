#!/usr/bin/perl
use strict;
use CGI qw/:standard/;
use CGI::FormBuilder;
use CGI::Session;
use DBI;
use POSIX qw(ceil floor);
use Data::Dumper;
use HTML::Entities;
use XML::Simple;
use Area::Display;
use Area::Datasources;

#print "Content-type:text/html;charset:utf-8\n\n";

#session inicialization
my $session = CGI::Session->new(param('CGISESSID'));

#form creation
my $form = CGI::FormBuilder->new(
			method => 'post',
			submit => ['update', 'save this'],
			stylesheet => 1,
			syleclass => 'about',
			table => 0,
			fields => [ qw(datasrcname randomcolor quantum colors param1 param2 block_values block_selected block_labels color_selected color_values color_labels panelx panely CGISESSID) ]
);

if($form->submitted eq 'update' && $form->validate) {
	$session->save_param($form);
	print "Location: areac3.cgi?CGISESSID=".$session->id."\n\n";
	exit;
} elsif($form->submitted eq 'save this') {
	$session->save_param($form);
	print "Location: areaWriteXML.cgi?CGISESSID=".$session->id."\n\n";
	exit;
}
#check if there is data in the session or redirect to the first step
if(!$session->param('param1')) {
	print "Location: areac1.cgi\n\n";
	exit();
}

# hidden fields
$form->field(name => 'datasrcname', type => 'hidden', value => $session->param('datasrcname'));
$form->field(name => 'colors', type => 'hidden', value => $session->param('colors'));
$form->field(name => 'param1', type => 'hidden', value => $session->param('param1'));
$form->field(name => 'param2', type => 'hidden', value => $session->param('param2'));
$form->field(name => 'block_selected', type => 'hidden', value => $session->param('block_selected'));
$form->field(name => 'block_labels', type => 'hidden', value => $session->param('block_labels'));
$form->field(name => 'block_values', type => 'hidden', value => $session->param('block_values'));
$form->field(name => 'color_selected', type => 'hidden', value => $session->param('color_selected'));
$form->field(name => 'color_labels', type => 'hidden', value => $session->param('color_labels'));
$form->field(name => 'color_values', type => 'hidden', value => $session->param('color_values'));
$form->field(name => 'panelx', type => 'hidden', value => $session->param('panelx'));
$form->field(name => 'panely', type => 'hidden', value => $session->param('panely'));

$form->field(name => 'CGISESSID', type => 'hidden', value => param('CGISESSID'));

# not hidden fields
my $randomcolor = $session->param('randomcolor');
if (!$randomcolor) { $randomcolor = "yes" };
$form->field(name => "randomcolor", label => "Randomize colors", options => [('yes', 'no')], value => $randomcolor);
$form->field(name => 'quantum', label =>'Type of visulization',options => [('quantum', 'non-quantum')] , value => $session->param('quantum'));

my %area;

#get variables from previous form
my $param1 = $session->param('param1');
my $param2 = $session->param('param2');
my $datasrcname = $session->param('datasrcname');

#connexio a la bd mysql
my ($dbh,$datasrc)=Area::Datasources::connect($datasrcname);
my %datasrc = %{$datasrc};

#print "DEBUG $param1 $param2 $datasrcname!";
#print Dumper( \$datasrc );
#print Dumper( \%datasrc );
#print Dumper( \%Area::Datasources::datas );

$area{datasrc} = $datasrcname;
$area{table} = $datasrc{table};
$area{pk_field} = $datasrc{pkey};
$area{blocks}{field} = $session->param('param1');
$area{colors}{field} = $session->param('param2');


# AREA Panel Dim
$area{size} = { 'x'=> $session->param('panelx'), 'y' => $session->param('panely')} ;

# Tree map will be quantum? (1 or 0)
	$area{quantum} = $session->param('quantum');

# List of types/blocks selected from the $param1 field (in a string "::" separeted)
my $blocks = $session->param('block_selected');
my $block_values = $session->param('block_values');
my $block_labels = $session->param('block_labels');
my $blocksnum = @{$blocks};
my $allblocksnum = @{$block_labels};
my %blockidx = map {$block_labels->[$_] => $_ } (0..$allblocksnum-1);

my @bllist = ( map { {'value' => $block_values->[$blockidx{$_}], 'label' => ($block_labels->[$blockidx{$_}]) } } @{$blocks} );
$area{blocks}{list} = \@bllist;

#Second parameter list of distinc and colors array
my $colors = $session->param('color_selected');
my $color_values = $session->param('color_values');
my $color_labels = $session->param('color_labels');
my $colsnum = @{$colors};
my $allcolsnum = @{$color_values};
my %colidx = map {$color_labels->[$_] => $_ } (0..$allcolsnum-1);

#FIXME: dont randomize colors if they are specified
#my %colors = $session->param('colors');

my @collist;

if (($session->param('randomcolor') eq 'no') && defined($session->param('collist')) ) {
	@collist = @{$session->param('collist')};
	} else {
@collist = ( 
	map { 
		my ($light,$dark)=randcolor(); 
		{
			value => $color_values->[$colidx{$_}], 
			label => $color_labels->[$colidx{$_}], 
			color => $light, 
			color_dark=> $dark } 
		} @{$colors} );
}		

$area{colors}{list} = \@collist;

$session->param('collist',\@collist);

#sub to create random color
sub randcolor {
	 my @rgb=map{ int( 55+rand(200)) } (1..3);		
	 
	 return randcolor() if ($rgb[0]+$rgb[1]+$rgb[2])<250;

	 my @dark=map { int($_/3) } @rgb;	  
	 my $rgb='#'.join('',map { sprintf "%02x", $_ } @rgb);		
	 my $dark='#'.join('',map { sprintf "%02x", $_ } @dark);		
	 return ($rgb,$dark);
}

# Starting html

print <<EOTEXT;
Content-type:text/html;charset:utf-8

<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
	<title>:: AREA :: treemaps visualization - Step 3</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel=\"SHORTCUT ICON\" href=\"area-icon.png\" />
	<!-- <meta http-equiv="refresh" content="50"> -->
	<link href="area.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="grey">

EOTEXT


#if ($blocksnum ne $blocknamesnum) { print '<div class="debug">'.$blocksnum.'<>'.$blocknamesnum.'</div>';}


	print "<div id=\"headerdiv\">";
	print "<h2><a href=\"/area\"><img src=\"area.png\" width=\"33px\" align=\"left\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"go to AREA\" style=\"margin-right:3px;margin-left:2px;\" /></a>";
	print " AREA, visualization tool</h2>";
	print "</div>";

	print "<div id=\"formdiv\">";
	print "<b>Now you can tune the representation filtering rsults, changing colors, kind of representation  and saving AREAs.</b>";
	print $form->render();
	print "</div>";


#print '<div class="debug">'.HTML::Entities::encode(XMLout(\%area)).'</div>';
#print '<pre class="debug">'.HTML::Entities::encode(Dumper($session)).'</pre>';

Area::Display::html(\%area);

$session->param('areaxml',XMLout(\%area));

$session->flush();

#print "<br>list2:"."@list2";

#print '<pre class="debug">'.Dumper($session->param('param11_selected') )."\n".Dumper($session->param('param22_selected'))."</pre>";

#print '<pre class="debug">'.Dumper($session->param('color_selected')).
#Dumper($session->param('color_values')).
#Dumper($session->param('color_labels')).
#"</pre>";

#print '<pre class="debug">'.Dumper(\%colors)."\n".$blocksnum."\n".Dumper(\%area)."</pre>";
#print '<div class="debug">'.HTML::Entities::encode(XMLout(\%area)).'</div>';
#print '<pre class="debug">'.Dumper(XMLin(XMLout(\%area))).'</pre>';


print <<EOTEXT;
</body>
</html>
EOTEXT

