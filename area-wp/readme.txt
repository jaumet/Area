=== Plugin Name ===
Contributors: jaume nualart
Donate link: http://
Tags: area, representation, visualization
Requires at least: 2.8
Tested up to: 2.8
Stable tag: 1.0

AREA is a visualization tool that allows friendly-graphical browsing of post and pages and creation of intuitive representations.

== Description ==

AREA is a visualization tool that allows friendly-graphical browsing of data and creation of intuitive and attractive representations. AREA creates treemaps visualisations from databases.

AREA assumes that there is a multiplicity of points of view and permits to choose one own perspective to approach any given data base. AREA is a treemap multi generator, which means that AREA gives several ways to display loads of data entities.
The idea was to make a web attractive interface in order to configure an Area visualization from a mysql tables. With a browser it is possible to choose the importance of table fields and the style of the Area visualization with the aim to present non hierarchical visualisations. AREA is a non-hierarchical visualization because all the information entities of a representation belongs to a unique visual level with same visual weight. Area gives the possibility to anyone to participate navigating through the data, choosing which data wants to visualise and even introducing new data bases to be visualised.

Area gives you an image of the databases. When you look for data using Area, you can get a view of the whole data that you are looking on for free, in terms of time. Currently, Area must be adapted to each data source.
With AREA it is also possible to correlate two different variables to permit bivariate analysis, as well as univariate one. Next step will be to write a web configurator. People will have the chance to fine tune and define the desired representation easily, using a simple browser. AREA can be a quantum treemap or a non-quantum treemap.


A few notes about the sections above:

*   "Contributors" is a comma separated list of wp.org/wp-plugins.org usernames
*   "Tags" is a comma separated list of tags that apply to the plugin
*   "Requires at least" is the lowest version that the plugin will work on
*   "Tested up to" is the highest version that you've *successfully used to test the plugin*. Note that it might work on
higher versions... this is just the highest one you've verified.
*   Stable tag should indicate the Subversion "tag" of the latest stable version, or "trunk," if you use `/trunk/` for
stable.

    Note that the `readme.txt` of the stable tag is the one that is considered the defining one for the plugin, so
if the `/trunk/readme.txt` file says that the stable tag is `4.3`, then it is `/tags/4.3/readme.txt` that'll be used
for displaying information about the plugin.  In this situation, the only thing considered from the trunk `readme.txt`
is the stable tag pointer.  Thus, if you develop in trunk, you can update the trunk `readme.txt` to reflect changes in
your in-development version, without having that information incorrectly disclosed about the current stable version
that lacks those changes -- as long as the trunk's `readme.txt` points to the correct stable tag.

    If no stable tag is provided, it is assumed that trunk is stable, but you should specify "trunk" if that's where
you put the stable version, in order to eliminate any doubt.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the directory of the stable readme.txt, so in this case, `/tags/4.3/screenshot-1.png` (or jpg, jpeg, gif)
2. This is the second screen shot

== Changelog ==

= 1.0 =
* A change since the previous version.
* Another change.

= 0.5 =
* List versions from most recent at top to oldest at bottom.

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`

