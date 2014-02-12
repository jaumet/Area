
///////////////////////////////////////////////////////////////////
// AREA CONFIGURATION
//
	var MAX_DISTINC = 30;
	var AREAX = 800;
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
			{ human: "Paper ID", areafilter: "0", role:"table"},
		"issue": 
			{ human: "Issue", areafilter: "0", role:"table-area"},
		"title": 
			{ human: "Title", areafilter: "1", role:"table-area"},
		"numref": 
			{ human: "Num ref", areafilter: "0", role:"table-area"},
                "numrefgrp": 
			{ human: "Num ref (grp)", areafilter: "0", role:"table-area"},
		"citation": 
			{ human: "Citation", areafilter: "1", role:"table-area"},
		"year": 
			{ human: "Year", areafilter: "1", role:"table-area"},
		"volume": 
			{ human: "Volume", areafilter: "0", role:"table-area"},
		"link": 
			{ human: "Link", areafilter: "0", role:"table-area"},
		"authors": 
			{ human: "Authors", areafilter: "1", role:"table-area"},
		"issueurl": 
			{ human: "Issue URL", areafilter: "0", role:"table-area"}
	}
];
