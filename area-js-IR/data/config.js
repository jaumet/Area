
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
			{ human: "Paper Id", areafilter: "0", role:"area"},
    "issue": 
			{ human: "Issue", areafilter: "0", role:"area"},
    "title": 
			{ human: "Tiitle", areafilter: "1", role:"area"},
    "numref": 
			{ human: "No. refs", areafilter: "0", role:"area"},
    "numrefgrp": 
			{ human: "No. refs", areafilter: "0", role:"area"},
    "citation":  
			{ human: "Citation", areafilter: "1", role:"area"},
    "year": 
      { human: "Year", areafilter: "1", role:"area"},
    "volume": 
			{ human: "Volume", areafilter: "0", role:"area"},
    "link": 
			{ human: "Link paper", areafilter: "0", role:"area"},
    "authors": 
			{ human: "Authors", areafilter: "1", role:"area"},
    "issueurl": 
      { human: "Link issue", areafilter: "0", role:"area"},
    "subject": 
      { human: "Subject", areafilter: "1", role:"area"},
	}
];

