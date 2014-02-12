
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
		"id": 
			{ human: "ID", areafilter: "0", role:"area"},
		"myfield1": 
			{ human: "my Field 1", areafilter: "0", role:"area"},
		"myfield2": 
			{ human: "my Field 2", areafilter: "0", role:"area"},
		"myfield3": 
			{ human: "my Field 3", areafilter: "0", role:"area"},
		"myfield4": 
			{ human: "my Field 4", areafilter: "0", role:"area"}
	}
];
