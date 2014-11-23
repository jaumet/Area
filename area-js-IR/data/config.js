
///////////////////////////////////////////////////////////////////
// AREA CONFIGURATION
//
	var MAX_DISTINC = 30;
	var AREAX = 920;
	var AREAY = 600;
	var COLORS_APPROACH = "fix"; // fix, random, gradient
	var PARAM1 = "year";
	var PARAM2 = "year";
	var AREA_TITLE = "AREA IR";

///////////////////////////////////////////////////////////////////
// FIELDS CONFIGURATIONS:
//
// -> the index are the machine-names for each field (only alphanumeric characters)/ Also used in var DATA
// -> human : human name for the field
// -> filter: 0 no eligible for filtering | 1 eligible for filtering
//

	
// NOTE: could be interesting when data is big, to use short index names, f.e. 0, 1, 2, 3, 4...

///////////////////////////////////////////////////////////////////
// DATA
//

var FIELDS = [
	{
    "paperid": 
			{ human: "Paper Id", areafilter: "0", type:"number"},
    "issue": 
			{ human: "Issue", areafilter: "0", type:"number"},
    "lang": 
			{ human: "Language", areafilter: "1", type:"text"},
    "title": 
			{ human: "Title", areafilter: "1", type:"text"},
    "numref": 
			{ human: "No. refs", areafilter: "0", type:"number"},
    "numrefgrp": 
			{ human: "No. refs", areafilter: "0", type:"number"},
    "citation":  
			{ human: "Citation", areafilter: "1", type:"text"},
    "year": 
      { human: "Year", areafilter: "1", type:"number"},
    "volume": 
			{ human: "Volume", areafilter: "0", type:"number"},
    "link": 
			{ human: "Paper (URL)", areafilter: "0", type:"url"},
    "authors": 
			{ human: "Authors, intitutions", areafilter: "1", type:"text"},
    "issueurl": 
      { human: "Issue (URL)", areafilter: "0", type:"url"},
    "subject": 
      { human: "Subject/s", areafilter: "1", type:"text"},
	}
];

