AREA :: data visualization tool
================================

Area code page: http://github.com/jaumet/Area

Area is copyright of Jaume Nualart (2006-2015) and is released under the tems of GPLv3 license (see http://gnu.org)

Description
-----------

Area is a software developed to explore and filter results of digital collections. At the same time it gives a visual overview of the collection. 

Area is a simple and small application coded in Javascript ‒including the libraries jquery and D3‒, HTML, and CSS. The data files are stored in JSON format. The application is accessible with a modern browser. When visiting Area web site the client downloads all necessary files to run the application entirely client-side.

There are two main constraints for the implementation of this application: screen resolution. and dataset size. The first is related to the number of items of the collection. The second is related to the size of RAM memory available in the client side. Conducted texts sugest collections not bigger than fifty thousand items, and 

Use / Install
-------------

- To use Area you need to edit 2 files:
	* data/config.json -> it defines several global variables. And defines the parameters to be represented (see the example that come with this distribution)
	* data/data.json -> you need to add your data here following the JSON format you see in the example. Of course adding your own parameters and values, and accordingly with data/config.json file

- To install Area you just need to put all Area files accessible. The client browser will do the rest.

Comments
--------

Send comments to jaume AT nualart.cat

Thanks / Gr&agrave;cies

Jaume Nualart
||*||


