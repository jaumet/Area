#!/usr/bin/perl
package Area::Display;
use Data::Dumper;
use POSIX qw(ceil floor);
use strict;

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

function area_info(pk, table) {
	ajaxpage('areaPreview.cgi\?table='+table+'&pk='+pk, 'node_info'); 
	showdiv('node_info');	
}


</script>";


require "./ajaxscript.pl";



	## Mysql queries
	use DBI;

	my $DBName;
	if ($area{table} eq "autori") { $DBName = "docmemproject_elibrary"; } else { $DBName = "docmemproject"; }

	my $DBUser = "docmemproject";
	my $DBPass = "c4c4t14";

	my $dbh = DBI->connect("DBI:mysql:$DBName", $DBUser, $DBPass) 
	         or die "Couldn't connect to database: " . DBI->errstr;
	
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
  my $tag=CGI::param('tag');
  
	foreach my $bl(@{$area{blocks}{list}}) {

		my @key1;
		my @pk1;
		my $filter;

		if ($tag) {	
			##$filter=',autori.abstract LIKE "%'.myescape($tag).'%" as filter';
			$filter=',violencies.fets LIKE "%'.myescape($tag).'%" as filter';
		}		
		my $query2 = "SELECT ".&myescape($area{colors}{field}).",".&myescape($area{pk_field})."$filter FROM ".&myescape($area{table})." WHERE ".&myescape($area{blocks}{field})."='".&myescape($bl->{value})."';";

#		print "Q $query2";

		my $sth2 = $dbh->prepare(qq{$query2}) or die "Can't prepare statement: $DBI::errstr";
		my $rc2 = $sth2->execute
			or die "Can't execute statement: $DBI::errstr";

		while (my @que = $sth2->fetchrow_array) {
			push (@key1, \@que);
		}

		@key1 = sort { $a->[0] <=> $b->[0]} @key1;	# sorting nodes by color
#		print Dumper(\@key1);

		my $blockstyle="width: ".($block_dimx-1)."px; height:".($block_dimy-1)."px;"; 

		print qq|
<div class="block" style="$blockstyle">
<div class="blockname">$bl->{label} ($bl->{value}) [$bl->{numnodes}]</div>
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
			
			foreach my $key (@key1) {
				my $match=$tag ? $key->[2] : 1;
				my $color = $match ? $colors{$key->[0]}{color} : $colors{$key->[0]}{color_dark};
				my $altlegend = $colors{$key->[0]}{label};
				if ($color) {
					print qq|<div class="node key$key->[0]" id="$key->[1]" style="background-color:$color; width: ${quantumx}px; height: ${quantumy}px;" title="$altlegend" onclick="javascript:area_info($key->[1],'$area{table}')"></div>|;
				
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
                                #table      => {width => 170},
                                table      => 0,
                                fields => [qw(tag)],
                                keepextras => 1
                                );

        $form2->field(name => 'tag', value => '');

        #print "Content-type:text/html;charset:utf-8\n\n";
        ## getting form variables
        print "<h3>You can filter the representation</h3>";
        print $form2->render();
        print "<p><i>[help: just look for a tag and click on the colored squares]</i></p>";
        #print "<h1>tag: $tag</h1>";
        ## sending post variables with keepextras => 1
        #my $mode = $form->cgi_param('mode');
        #print "<h1>mode: $mode</h1>";
        #print "<h1>xmlfile: $xmlfile</h1>";

print '</div>'; 

		
	# Legend div
	print "\n<div id=\"legend\">LEGEND: "; 

	foreach my $col(@{$area{colors}{list}}) {

		print "<span style=\"background:".$col->{color}.";padding-left:8px;border-width: 1px 1px 1px 1px;border-style: solid;border-color: #ffa904;\"></span>&nbsp;".$col->{label}.".&nbsp;&nbsp;";
	}
	print "</div>\n";


	print <<EOT;
</div>
EOT

}


1;
