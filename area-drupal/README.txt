***********
* README: *
***********

DESCRIPTION:
------------
This is Area module for Drupal tested only in versions 6.6
(27 nov 2008)


REQUIREMENTS:
-------------
It has not other dependencies.


INSTALLATION:
-------------
1. Uncompress the file area-x.x.tar.gz

2. Place the entire area into your Drupal modules/
   directory.

3. (ONLY if you use PHP4: edit hte file area/lib/functions.php and uncoment the last function array_combine)

3. Enable the Area module by navigating to:
     administer > modules

4. Set permissions for area use
     administer > User management > Permissions

5. Configure teh Area module in 
     administer > Site configuration > Area settings

6. (optional) Acticate and configure the Area block in
     administer > Site building > Blocks


Features:
---------
* Represents the content types published in the drupal as a treemap
* Show a block for one or all content types
* Filter the representation using tags. And see the weight of your search in the whole site content


Future:
-------
Plans for the version 1.0:
* Some languages versions.
* Sticky Area filter in block
* Group nodes depending on how big is the drupal
* Options for parameters: content-types (now), user author, etc... 

Author:
-------
Jaume Nualart
jaume AT riereta.net

