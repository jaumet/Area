
///////////////////////////////////////////////////////////////////
// AREA CONFIGURATION
//
	var MAX_DISTINC = 50;
	var AREAX = 1100;
	var AREAY = 900;
	var COLORS_APPROACH = "fix"; // fix, random, gradient
	var PARAM1 = "rem_year";
	var PARAM2 = "rem_year";
	var AREA_TITLE = "PeaceAgreements.org";

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
	"index":
	  { human: "Index", areafilter: "0", type:"number", exclude:"0"},
	"agreementid":
	  { human: "ID", areafilter: "0", type:"number", exclude:"0"},
	"agreement_conflict_level":
	  { human: "agreement/Conflict Level", areafilter: "0", type:"text", exclude:"0"},
	"peace_proc_name":
		  { human: "Peace Process Name", areafilter: "1", type:"text", exclude:"0"},
	"name":
	  { human: "Name", areafilter: "1", type:"text", exclude:"0"},
	"country":
	  { human: "Country", areafilter: "1", type:"text", exclude:"0"},
	"region":
	  { human: "Region", areafilter: "1", type:"text", exclude:"0"},
	"peace_proc":
	  { human: "Peace Process", areafilter: "1", type:"text", exclude:"0"},
	"confl_nat":
	  { human: "Conflict Nature", areafilter: "1", type:"text", exclude:"0"},
	"agr_status":
	  { human: "Agreement Status", areafilter: "1", type:"text", exclude:"0"},
	"sign_date":
	  { human: "Signed Date", areafilter: "1", type:"text", exclude:"0"},
	"rem_year":
	  { human: "Signed Year", areafilter: "1", type:"number", exclude:"0"},
	"stage":
	  { human: "Stage", areafilter: "0", type:"text", exclude:"0"}
	}
];
