
///////////////////////////////////////////////////////////////////
// AREA CONFIGURATION
//
	var MAX_DISTINC = 30;
	var AREAX = 920;
	var AREAY = 600;
	var COLORS_APPROACH = "fix"; // fix, random, gradient
	var PARAM1 = "any";
	var PARAM2 = "parentiu_agresor";
	var AREA_TITLE = "AREA Feminicides";

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
		{ human: "ID", areafilter: "0", type:"number"},
  "data": 
		{ human: "Date", areafilter: "0s", type:"text"},
  "tipus_violencies_1": 
		{ human: "Type 1", areafilter: "1", type:"text"},
  "tipus_violencies_2": 
		{ human: "Type 2", areafilter: "1", type:"text"},
  "tipus_violencies_3": 
		{ human: "Type 3", areafilter: "1", type:"text"},
  "mes": 
		{ human: "Month", areafilter: "1", type:"text"},
  "mitja": 
		{ human: "Media", areafilter: "1", type:"text"},
  "nom_victima": 
		{ human: "Victim name", areafilter: "1", type:"text"},
  "edat": 
		{ human: "Age", areafilter: "1", type:"number"},
  "edat_grups": 
		{ human: "Age group", areafilter: "1", type:"text"},
  "ciutat": 
		{ human: "City", areafilter: "1", type:"text"},
  "comunitat_autonoma": 
		{ human: "Region", areafilter: "1", type:"text"},
  "parentiu_agresor": 
		{ human: "Perpetrator relationship", areafilter: "1", type:"text"},
  "armes": 
		{ human: "Weapon", areafilter: "1", type:"text"},
  "fets": 
		{ human: "Narrative", areafilter: "1", type:"text"},
  "any": 
		{ human: "Year", areafilter: "1", type:"number"}
	}
];

