
///////////////////////////////////////////////////////////////////
// AREA CONFIGURATION
//
	var MAX_DISTINC = 30;
	var AREAX = 800;
	var AREAY = 600;
	var COLORS_APPROACH = "fix"; // fix, random, gradient
	var PARAM1 = "Legal_entity";
	var PARAM2 = "Legal_entity";
	var AREA_TITLE = "P2PValue directory";

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
"Name": 
			{ human: "Name", areafilter: "0"},	
"Description": 
			{ human: "Description", areafilter: "1"},	
"Homepage": 
			{ human: "Homepage", areafilter: "0"},
"Social_networks_accounts": 
			{ human: "Social networks accounts", areafilter: "0"},
"E-mail": 
			{ human: "E-mail", areafilter: "0"},
"Contact_page": 
			{ human: "Contact page", areafilter: "0"},
"Organisation_Type": 
			{ human: "Organisation Type", areafilter: "0"},
"Physical_address": 
			{ human: "Physical address", areafilter: "0"},
"Legal_entity": 
			{ human: "Legal entity", areafilter: "0"},
"Year_of_foundation": 
			{ human: "Year of foundation", areafilter: "0"},
"Languages_of_the_platform": 
			{ human: "Language(s)", areafilter: "0"},
"Phone": 
			{ human: "Phone", areafilter: "0"},
"Keywords": 
			{ human: "Keywords", areafilter: "1"},
"Type_of_activity": 
			{ human: "Type of activity", areafilter: "0"},
"The_most_important_type_of_collaboration": 
			{ human: "Type of collaboration", areafilter: "0"},	
"Type_of_common_resource_resulting": 
			{ human: "Type of common resource", areafilter: "0"},
"User_generated_content_license": 
			{ human: "content license", areafilter: "0"},
"Software_platform_license": 
			{ human: "Software license", areafilter: "0"},
"Owner": 
			{ human: "Owner", areafilter: "0"},
"Infrastructure_provider": 
			{ human: "Infrastructure", areafilter: "1"},
"Other_information": 
			{ human: "Other", areafilter: "0"},
"Scope": 
			{ human: "Scope", areafilter: "0"},
	},
];
