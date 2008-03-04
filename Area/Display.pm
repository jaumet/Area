#!/usr/bin/perl
package Area::Display;
use Data::Dumper;
use POSIX qw(ceil floor);
use strict;
use Area::Datasources;

#sub to escape mysql special chars
sub myescape {
	my $escaped = $_[0];
	$escaped =~ s/\\/\\\\/g;
	$escaped =~ s/'/\\'/g;
	return $escaped;
}


sub html {

	my $area=shift;
	my %area=%{$area};

	#print '<pre class="debug">'.Dumper(\%colors)."\n".$blocksnum."\n".Dumper(\%area)."</pre>"; 
	#print '<div class="debug">'.HTML::Entities::encode(XMLout(\%area)).'</div>';
	#print '<pre class="debug">'.Dumper(XMLin(XMLout(\%area))).'</pre>';


print "<script language=javascript type='text/javascript'>
function hidediv(divid) {
	if (divid==null) { divid='hideShow'; } 

	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById(divid).style.visibility = 'hidden';
	} else {
		if (document.layers) { // Netscape 4
			document.hideShow.visibility = 'hidden';
		} else { // IE 4
		document.all.hideShow.style.visibility = 'hidden';
		}
	}
}

function showdiv(divid) {
	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById(divid).style.visibility = 'visible';
	} else {
		if (document.layers) { // Netscape 4
			document.hideShow.visibility = 'visible';
		} else { // IE 4
			document.all.hideShow.style.visibility = 'visible';
		}
	}
}

function area_info(pk, datasrc) {
	ajaxpage('areaPreview.cgi\?src='+datasrc+'&pk='+pk, 'node_info'); 
	showdiv('node_info');	
}


</script>";


require "./ajaxscript.pl";



	## Mysql queries
	use DBI;

  #are we connected already?
	our $dbh=$Area::Datasources::dbh;
	our $datasrc=$Area::Datasources::datasrc;
	
	if (!defined($dbh)) {
		#not yet, will connect
		my $datasrcname = $area->{datasrc};
		($dbh, $datasrc)=Area::Datasources::connect($datasrcname);
	}
	
	##### preparing blocks:
	#
	# m X n blocks:
	my $blocks_division = ceil(sqrt( @{ $area{blocks}{list} }));

	#print '<pre class="debug">'.$blocks_division."</pre>";

	#AREA panel (800x600 by default, minumum 100x100) of blocks: 
	#if ($panelx < "100" or $panely < "100") { $panelx = 800; $panely ="600"; }
	my $block_dimx = int($area{size}{x} / $blocks_division);
	my $block_dimy = int($area{size}{y} / $blocks_division);
	
	# Getting max num of nodes_per_block
	my $nodes_per_block_max = 0;
	foreach my $bl(@{$area{blocks}{list}}) {
		my $query = "SELECT COUNT(*) FROM ".&myescape($area{table})." WHERE ".&myescape($area{blocks}{field})."='".&myescape($bl->{value})."';";
		#print $query;
		my $sth = $dbh->prepare(qq{$query}) or die "Can't prepare statement: $DBI::errstr";
		my $rc = $sth->execute
			or die "Can't execute statement: $DBI::errstr";

		my $nodes_per_block = $sth->fetchrow_array();
		if ($nodes_per_block > $nodes_per_block_max) {$nodes_per_block_max = $nodes_per_block;}
		$bl->{numnodes} = $nodes_per_block;
	}
	
	#print "<div class=debug>$nodes_per_block_max</div>";
	#print "<div class=debug>".$area{pk_field}."</div>";

	print '<div class="panel">';

		########################################
		####### Building        blocks #########
		########################################

	my %colors = map {$_->{'value'} => $_ } @{$area{colors}{list}};
	# tag is the search query
	my $tag=CGI::param('tag');

		my $filter;

		if ($tag) {	
  		my @filtfields = grep { $datasrc->{fields}{$_}{filter}?$_:undef } keys(%{$datasrc->{fields}});
			$filter=", ".join(' OR ',map {$_.' LIKE "%'.myescape($tag).'%"'} @filtfields).'as filter';
			#print $filter;
		}		
  
	foreach my $bl(@{$area{blocks}{list}}) {

		my @key1;
		my @pk1;
		my $query2 = "SELECT ".&myescape($area{colors}{field}).",".&myescape($area{pk_field})."$filter FROM ".&myescape($area{table})." WHERE ".&myescape($area{blocks}{field})."='".&myescape($bl->{value})."';";

#		print "QQQQ: $query2";

		my $sth2 = $dbh->prepare(qq{$query2}) or die "Can't prepare statement: $DBI::errstr";
		my $rc2 = $sth2->execute
			or die "Can't execute statement: $DBI::errstr";

		while (my @que = $sth2->fetchrow_array) {
			push (@key1, \@que);
		}

		#@key1 = sort { $a->[0] <=> $b->[0]} @key1;	# sorting nodes by color
		my $i =0;
		my %sortorder;
		#print Dumper($area{colors}{list});
 		foreach (@{$area{colors}{list}}) {
			$sortorder{ $_->{value} } = $i;
			$i++;
		}
		#print Dumper(\%sortorder);
		@key1 = sort { $sortorder{$a->[0]} <=> $sortorder{$b->[0]} } @key1;	# sorting nodes by color
		
=comment
		if ($key1[0][0] =~ /^\d/) {
			@key1 = sort { $a->[0] <=> $b->[0]} @key1;	# sorting nodes by color
		} else {
			@key1 = sort { $a->[0] cmp $b->[0]} @key1;	# sorting nodes by color
		}
=cut
		#print Dumper(\@key1);

		my $blockstyle="width: ".($block_dimx-1)."px; height:".($block_dimy-1)."px;"; 

		print qq|
<div class="block" style="$blockstyle">
<div class="blockname">$bl->{label} [$bl->{numnodes}]</div>
|;
		
		########################################
		####### Contruccio dels nodes #########
		########################################
		if ($bl->{numnodes}) {
			#Preparing n x m nodes in a block
			my $node_division = ceil(sqrt($bl->{numnodes}));
	        my $full_rows = ceil($bl->{numnodes} / $node_division);

			#AREA panel of blocks (800x600 by default): 
			my $node_dimx = int(($block_dimx -1)/$node_division);
			my $node_dimy = int(($block_dimy - 27)/$full_rows);
			# node dimension for non-quantum treemap (relative sizes)

			my $node_division_max = ceil(sqrt($nodes_per_block_max));
			my $nodex_max = int(($block_dimx -1)/ $node_division_max);
			my $nodey_max = int(($block_dimy - 27)/ $node_division_max);
			
			my ($quantumx,$quantumy);

			if ($area{quantum} ne "quantum") { 
				$quantumx = ($node_dimx-1);
				$quantumy = ($node_dimy-1);
			} else {
				$quantumx = $nodex_max-1;
				$quantumy = $nodey_max-1;
			}
		#### jaume hack 7 jan 2008	
			if ($quantumx <1) { 
				$quantumx = 1;
			}
			if ($quantumy <1) { 
				$quantumy = 1;
			}
			foreach my $key (@key1) {
				my $match=$tag ? $key->[2] : 1;
				my $color = $match ? $colors{$key->[0]}{color} : $colors{$key->[0]}{color_dark};
				my $altlegend = $colors{$key->[0]}{label};
				if ($color) {
					print qq|<div class="node key$key->[0]" id="$key->[1]" style="background-color:$color; width: ${quantumx}px; height: ${quantumy}px;" title="$altlegend" onclick="javascript:area_info($key->[1],'$area{datasrc}')"></div>|;
				
				}
			}

		}
		print "</div>"; #end of block div
	}

print '<div class="clear">&nbsp;</div>';
print '</div>'; #end of panel div

print '<div id="node_info">loading ...</div>';
print '</div>'; #end of panel div

print '<div id="preview" style="height:'.$area{size}{y}.'px; left:'.($area{size}{x} + 40).'px;">';

#create the form object
        my $form2 = CGI::FormBuilder->new(
                                name => 'filter',
                                method => 'post',
                                submit => 'filter',
                                stylesheet => 1,
                                #table      => {width => 270},
                                table      => 0,
                                fields => [qw(tag)],
                                keepextras => 1
                                );

        $form2->field(name => 'tag', value => '');

        #print "Content-type:text/html;charset:utf-8\n\n";
        ## getting form variables
        print "<h3>Search here:</h3>";
        print $form2->render();
	print "<h2>About <b>this</b> AREA:</h2>";
	print "<h2>".$datasrc->{name}."(*)</h2>";
	print "<p><b >".$datasrc->{label}."</b></p>";
	if ($area{name}) {
        	print '<ul><li>Area Name: <b>'.$area{name}.'</b></li><li>Authoring: <b>'.$area{by}.'</b></li><li> Area description: <b>'.$area{description}.'</b></li></ul>';
	}
        #print "<h1>tag: $tag</h1>";
        ## sending post variables with keepextras => 1
        #my $mode = $form->cgi_param('mode');
        #print "<h1>mode: $mode</h1>";
        #print "<h1>xmlfile: $xmlfile</h1>";

	print "<hr /><p>* Possible representations: <b>".$datasrc->{max_representations}."</b></p>";
print '</div>'; 

	# Legend div
	$area{blocks}{field} =~ s/_/ /g; 
	$area{colors}{field} =~ s/_/ /g; 
	print "\n<div id=\"legend\">LEGEND: ".$area{blocks}{field}."<->".$area{colors}{field}."&nbsp;"; 
	foreach my $col(@{$area{colors}{list}}) {
		print qq|<span class="legend" style="background-color: $col->{color};">$col->{label}</span> |;
	}
	print "</div>\n";

	print <<EOT;

</div>
EOT

}


1;
