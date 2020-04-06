
//-------------------------------------------------------------------
// AREA CONFIGURATION
//
	var MAX_DISTINC = 50;
	var AREAX = 1100;
	var AREAY = 900;
	var COLORS_APPROACH = "fix"; // fix, random, gradient
	var PARAM1 = "Year";
	var PARAM2 = "Reg";
	var AREA_TITLE = "PeaceAgreements.org";

//////////////////-- FIELDS CONFIGURATIONS:
//
// -> the index are the machine-names for each field (only alphanumeric characters)- Also used in var DATA
// -> human : human name for the field
// -> filter: 0 no eligible for filtering | 1 eligible for filtering
//


// NOTE: could be interesting when data is big, to use short index names, f.e. 0, 1, 2, 3, 4...

//////////////////////////////////////////////////////////
// DATA
//

var FIELDS = [
		{
			"Con":
				  { human: "Country-Entity", areafilter: "0", type:"text", exclude:"0", areafilter: "0", type:"text", exclude:"0"},
			"Contp":
				  { human: "Conflict type", areafilter: "0", type:"text", exclude:"0", areafilter: "0", type:"text", exclude:"0"},
			"PP_name":
				  { human: "Peace process Name", areafilter: "0", type:"text", exclude:"0", areafilter: "0", type:"text", exclude:"0"},
			"PP":
				  { human: "Peace Process Number", areafilter: "0", type:"text", exclude:"0"},
 			"PPName":
			    { human: "Peace Process Name", areafilter: "0", type:"text", exclude:"0"},
			"Reg":
				  { human: " Region", areafilter: "0", type:"text", exclude:"0"},
			"AgtId":
				  { human: "Agreement ID", areafilter: "0", type:"text", exclude:"0"},
			"Agt":
				  { human: "Agreement Name", areafilter: "0", type:"text", exclude:"0"},
			"Dat":
				  { human: "Date Signed", areafilter: "0", type:"text", exclude:"0"},
			"Year":
				  { human: "Year Signed", areafilter: "0", type:"text", exclude:"0"},
			"Status":
				  { human: "Agreement Definition and Status", areafilter: "0", type:"text", exclude:"0"},
			"Lgt":
				  { human: "Agreement length (pages)", areafilter: "0", type:"text", exclude:"0"},
			"N_characters":
				  { human: "Agreement length (characters)", areafilter: "0", type:"text", exclude:"0"},
			"Agtp":
				  { human: "Agreement-conflict type.", areafilter: "0", type:"text", exclude:"0"},
			"Stage":
				  { human: "Agreement stage", areafilter: "0", type:"text", exclude:"0"},
			"StageSub":
				  { human: "subcoding of stage", areafilter: "0", type:"text", exclude:"0"},
			"Part":
				  { human: "Parties", areafilter: "0", type:"text", exclude:"0"},
			"ThrdPart":
				  { human: "Third Parties", areafilter: "0", type:"text", exclude:"0"},
			"OthAgr":
				  { human: "Other Agreement", areafilter: "0", type:"text", exclude:"0"},
			"Loc1ISO":
				  { human: "Primary location ISO code ", areafilter: "0", type:"text", exclude:"0"},
			"Loc2ISO":
				  { human: "Secondary location ISO code", areafilter: "0", type:"text", exclude:"0"},
			"Loc1GWNO":
				  { human: "Primary location GWNO code ", areafilter: "0", type:"text", exclude:"0"},
			"Loc2GWNO":
				  { human: "Secondary location GWNO code ", areafilter: "0", type:"text", exclude:"0"},
			"UcdpCon":
				  { human: "UCDP conflict code ", areafilter: "0", type:"text", exclude:"0"},
			"UcdpAgr":
				  { human: "UCDP agreement code", areafilter: "0", type:"text", exclude:"0"},
			"PamAgr":
				  { human: "PAM agreement code ", areafilter: "0", type:"text", exclude:"0"},
			"CowWar":
				  { human: "CoW War Number ", areafilter: "0", type:"text", exclude:"0"},
			"GCh":
				  { human: "Children-Youth", areafilter: "0", type:"text", exclude:"0"},
			"GChRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GChAntid":
				  { human: "Anti-discrimination", areafilter: "0", type:"text", exclude:"0"},
			"GChSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GChOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GDis":
				  { human: "Disabled persons", areafilter: "0", type:"text", exclude:"0"},
			"GDisRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GDisAntid":
				  { human: "Anti-discrimination", areafilter: "0", type:"text", exclude:"0"},
			"GDisSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GDisOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GAge":
				  { human: "Elderly-Age", areafilter: "0", type:"text", exclude:"0"},
			"GAgeRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GAgeAntid":
				  { human: "Anti-discrimination", areafilter: "0", type:"text", exclude:"0"},
			"GAgeSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GAgeOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GMig":
				  { human: "Migrant workers", areafilter: "0", type:"text", exclude:"0"},
			"GMigRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GMigAntid":
				  { human: "Anti-discrimination", areafilter: "0", type:"text", exclude:"0"},
			"GMigSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GMigOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GRa":
				  { human: "Racial-ethnic-national groups", areafilter: "0", type:"text", exclude:"0"},
			"GRaRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GRaAntid":
				  { human: "Anti-discrimination", areafilter: "0", type:"text", exclude:"0"},
			"GRaSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GRaOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GRe":
				  { human: "Religious groups", areafilter: "0", type:"text", exclude:"0"},
			"GReRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GReAntid":
				  { human: "Anti-discrimination", areafilter: "0", type:"text", exclude:"0"},
			"GReSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GReOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GInd":
				  { human: "Indigenous people", areafilter: "0", type:"text", exclude:"0"},
			"GIndRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GIndAntid":
				  { human: "Anti-discrimination", areafilter: "0", type:"text", exclude:"0"},
			"GIndSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GIndOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GOth":
				  { human: "Other groups", areafilter: "0", type:"text", exclude:"0"},
			"GOthRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GOthAntid":
				  { human: "Anti-discrimination", areafilter: "0", type:"text", exclude:"0"},
			"GOthSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GOthOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GRef":
				  { human: "Refugees- displaced persons", areafilter: "0", type:"text", exclude:"0"},
			"GRefRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GRefSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GRefOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GSoc":
				  { human: "Social Class", areafilter: "0", type:"text", exclude:"0"},
			"GSocRhet":
				  { human: "Rhetorical", areafilter: "0", type:"text", exclude:"0"},
			"GSocAntid":
				  { human: "Anti-discrimination", areafilter: "0", type:"text", exclude:"0"},
			"GSocSubs":
				  { human: "Substantive", areafilter: "0", type:"text", exclude:"0"},
			"GSocOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"GeWom":
				  { human: "Women, girls and gender", areafilter: "0", type:"text", exclude:"0"},
			"GeMe":
				  { human: "Men and Boys", areafilter: "0", type:"text", exclude:"0"},
			"GeMeNu":
				  { human: "Gender neutrality wording", areafilter: "0", type:"text", exclude:"0"},
			"GeMeOth":
				  { human: "other", areafilter: "0", type:"text", exclude:"0"},
			"GeSo":
				  { human: "Sexual Orientation", areafilter: "0", type:"text", exclude:"0"},
			"GeLgbti":
				  { human: "LGBTI references", areafilter: "0", type:"text", exclude:"1"},
			"GeLgbtiPos":
				  { human: "LGBTI references Pos", areafilter: "0", type:"text", exclude:"1"},
			"GeLgbtiNeg":
				  { human: "LGBTI references Neg", areafilter: "0", type:"text", exclude:"1"},
			"GeFa":
				  { human: "Family", areafilter: "0", type:"text", exclude:"0"},
			"StDef":
				  { human: "State definition", areafilter: "0", type:"text", exclude:"0"},
			"StGen":
				  { human: "Nature of State - general", areafilter: "0", type:"text", exclude:"0"},
			"StCon":
				  { human: "State configuration", areafilter: "0", type:"text", exclude:"0"},
			"StSd":
				  { human: "Self determination", areafilter: "0", type:"text", exclude:"0"},
			"StRef":
				  { human: "Referendum", areafilter: "0", type:"text", exclude:"0"},
			"StSym":
				  { human: "State symbols", areafilter: "0", type:"text", exclude:"0"},
			"StInd":
				  { human: "Independence-secession", areafilter: "0", type:"text", exclude:"0"},
			"StUni":
				  { human: "Accession-unification", areafilter: "0", type:"text", exclude:"0"},
			"StBor":
				  { human: "Border delimitation", areafilter: "0", type:"text", exclude:"0"},
			"StXbor":
				  { human: "Cross-border provision", areafilter: "0", type:"text", exclude:"0"},
			"Pol":
				  { human: "Political Institutions", areafilter: "0", type:"text", exclude:"0"},
			"PolGen":
				  { human: "General References to Political institutions", areafilter: "0", type:"text", exclude:"0"},
			"PolNewInd":
				  { human: "New political institutions", areafilter: "0", type:"text", exclude:"0"},
			"PolNewTemp":
				  { human: "temporary institutional arrangement", areafilter: "0", type:"text", exclude:"0"},
			"Cons":
				  { human: "Constitutional reform-making", areafilter: "0", type:"text", exclude:"0"},
			"Ele":
				  { human: "Elections", areafilter: "0", type:"text", exclude:"0"},
			"ElecComm":
				  { human: "Electoral Commission", areafilter: "0", type:"text", exclude:"0"},
			"PolPar":
				  { human: "Political parties reform", areafilter: "0", type:"text", exclude:"0"},
			"PolParTrans":
				  { human: "rebels transitioning to political parties", areafilter: "0", type:"text", exclude:"0"},
			"PolParOth":
				  { human: "Other instances of political party reform-regulation.", areafilter: "0", type:"text", exclude:"0"},
			"Civso":
				  { human: "Civil Society", areafilter: "0", type:"text", exclude:"0"},
			"Tral":
				  { human: "Traditional-Religious Leaders", areafilter: "0", type:"text", exclude:"0"},
			"Pubad":
				  { human: "Public Administration (Civil Service)", areafilter: "0", type:"text", exclude:"0"},
			"Polps":
				  { human: "Political Powersharing", areafilter: "0", type:"text", exclude:"0"},
			"PpsSt":
				  { human: "State level powersharing", areafilter: "0", type:"text", exclude:"0"},
			"PpsSub":
				  { human: "Sub-state level powersharing", areafilter: "0", type:"text", exclude:"0"},
			"PpsEx":
				  { human: "Executive coalition.", areafilter: "0", type:"text", exclude:"0"},
			"PpsOro":
				  { human: "Proportionality in the legislature.", areafilter: "0", type:"text", exclude:"0"},
			"PpsOthPr":
				  { human: "Other Proportionality.", areafilter: "0", type:"text", exclude:"0"},
			"PpsVet":
				  { human: "Form of veto or communal majority.", areafilter: "0", type:"text", exclude:"0"},
			"PpsAut":
				  { human: "Segmental autonomy.", areafilter: "0", type:"text", exclude:"0"},
			"PpsInt":
				  { human: "International involvement.", areafilter: "0", type:"text", exclude:"0"},
			"PpsOth":
				  { human: "Other form of political powersharing", areafilter: "0", type:"text", exclude:"0"},
			"Terps":
				  { human: "Territorial powersharing", areafilter: "0", type:"text", exclude:"0"},
			"TpsSub":
				  { human: "Federal or similarly sub-divided", areafilter: "0", type:"text", exclude:"0"},
			"TpsLoc":
				  { human: "Local-Municipal", areafilter: "0", type:"text", exclude:"0"},
			"TpsAut":
				  { human: "Autonomy", areafilter: "0", type:"text", exclude:"0"},
			"TpsOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"Eps":
				  { human: "Economic powersharing", areafilter: "0", type:"text", exclude:"0"},
			"EpsRes":
				  { human: "Sharing of resources", areafilter: "0", type:"text", exclude:"0"},
			"EpsFis":
				  { human: "Fiscal federalism", areafilter: "0", type:"text", exclude:"0"},
			"EpsOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"Mps":
				  { human: "Military powersharing", areafilter: "0", type:"text", exclude:"0"},
			"MpsMe":
				  { human: "Merger of forces", areafilter: "0", type:"text", exclude:"0"},
			"MpsJt":
				  { human: "Joint Command Structure", areafilter: "0", type:"text", exclude:"0"},
			"MpsPro":
				  { human: "Proportionality", areafilter: "0", type:"text", exclude:"0"},
			"MpsOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"HrGen":
				  { human: "Human Rights- Rule of Law", areafilter: "0", type:"text", exclude:"0"},
			"EqGen":
				  { human: "Equality", areafilter: "0", type:"text", exclude:"0"},
			"HrDem":
				  { human: "Democracy", areafilter: "0", type:"text", exclude:"0"},
			"Prot":
				  { human: "Protection measures", areafilter: "0", type:"text", exclude:"0"},
			"ProtCiv":
				  { human: "Protection of civilians", areafilter: "0", type:"text", exclude:"0"},
			"ProtGrp":
				  { human: "Protection of groups", areafilter: "0", type:"text", exclude:"0"},
			"ProtLgl":
				  { human: "Protection of rights and legal frameworks", areafilter: "0", type:"text", exclude:"0"},
			"ProtOth":
				  { human: "Other protection measures", areafilter: "0", type:"text", exclude:"0"},
			"HrFra":
				  { human: "Human Rights Framework", areafilter: "0", type:"text", exclude:"0"},
			"HrfSp":
				  { human: "Isolated rights", areafilter: "0", type:"text", exclude:"0"},
			"HrfBor":
				  { human: "Bill of Rights.", areafilter: "0", type:"text", exclude:"0"},
			"HrfTinc":
				  { human: "Incorporation of human rights treaties, humanitarian law, or international criminal law treaties (Treaty Incorporation", areafilter: "0", type:"text", exclude:"0"},
			"HrfOth":
				  { human: "Other.", areafilter: "0", type:"text", exclude:"0"},
			"HrCp":
				  { human: "Civil and political rights", areafilter: "0", type:"text", exclude:"0"},
			"CprLife":
				  { human: "Life", areafilter: "0", type:"text", exclude:"0"},
			"CprTort":
				  { human: "Torture", areafilter: "0", type:"text", exclude:"0"},
			"CprEq":
				  { human: "Equality", areafilter: "0", type:"text", exclude:"0"},
			"CprSlav":
				  { human: "Slavery", areafilter: "0", type:"text", exclude:"0"},
			"CprLib":
				  { human: "Liberty and security of person", areafilter: "0", type:"text", exclude:"0"},
			"CprDet":
				  { human: "Humane treatment in detention", areafilter: "0", type:"text", exclude:"0"},
			"CprFmov":
				  { human: "Freedom of movement", areafilter: "0", type:"text", exclude:"0"},
			"CprFspe":
				  { human: "Freedom of speech", areafilter: "0", type:"text", exclude:"0"},
			"CprFass":
				  { human: "Freedom of association", areafilter: "0", type:"text", exclude:"0"},
			"CprTria":
				  { human: "Fair trial", areafilter: "0", type:"text", exclude:"0"},
			"CprPriv":
				  { human: "Privacy and family life", areafilter: "0", type:"text", exclude:"0"},
			"CprVote":
				  { human: "Vote and take part", areafilter: "0", type:"text", exclude:"0"},
			"CprReli":
				  { human: "Thought, opinion, conscience and religion", areafilter: "0", type:"text", exclude:"0"},
			"CprOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"HrSec":
				  { human: "Socio-economic rights", areafilter: "0", type:"text", exclude:"0"},
			"SerProp":
				  { human: "Property", areafilter: "0", type:"text", exclude:"0"},
			"SerWork":
				  { human: "Work", areafilter: "0", type:"text", exclude:"0"},
			"SerHeal":
				  { human: "Health", areafilter: "0", type:"text", exclude:"0"},
			"SerEdu":
				  { human: "Education", areafilter: "0", type:"text", exclude:"0"},
			"SerStdl":
				  { human: "Adequate standard of living", areafilter: "0", type:"text", exclude:"0"},
			"SerShel":
				  { human: "Shelter-housing", areafilter: "0", type:"text", exclude:"0"},
			"SerSs":
				  { human: "Social security", areafilter: "0", type:"text", exclude:"0"},
			"SerCult":
				  { human: "Cultural rights", areafilter: "0", type:"text", exclude:"0"},
			"SerOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"HrNi":
				  { human: "NHRI (National Human Rights Institution)", areafilter: "0", type:"text", exclude:"0"},
			"HrNiMe":
				  { human: "Mentions of NHRI", areafilter: "0", type:"text", exclude:"0"},
			"HrNiNe":
				  { human: "New or fundamentally revised NHRI", areafilter: "0", type:"text", exclude:"0"},
			"HrNiOth":
				  { human: "Other NHRI", areafilter: "0", type:"text", exclude:"0"},
			"HrIi":
				  { human: "Regional or international human rights institutions", areafilter: "0", type:"text", exclude:"0"},
			"HrIiMon":
				  { human: " Monitoring calls.", areafilter: "0", type:"text", exclude:"0"},
			"HrIiBod":
				  { human: "Body tasked.", areafilter: "0", type:"text", exclude:"0"},
			"HrIiOth":
				  { human: "Other regional or international human rights institutions", areafilter: "0", type:"text", exclude:"0"},
			"HrMob":
				  { human: "mobility-access", areafilter: "0", type:"text", exclude:"0"},
			"HrDet":
				  { human: "Detention Procedures", areafilter: "0", type:"text", exclude:"0"},
			"Med":
				  { human: "Media and communication", areafilter: "0", type:"text", exclude:"0"},
			"MedGov":
				  { human: "Governance of Media.", areafilter: "0", type:"text", exclude:"0"},
			"MedSubs":
				  { human: " Media Roles", areafilter: "0", type:"text", exclude:"0"},
			"MedLog":
				  { human: "Media Logistics", areafilter: "0", type:"text", exclude:"0"},
			"MedOth":
				  { human: "Media Other", areafilter: "0", type:"text", exclude:"0"},
			"HrCit":
				  { human: "Citizenship", areafilter: "0", type:"text", exclude:"0"},
			"CitGen":
				  { human: "Citizen, general.", areafilter: "0", type:"text", exclude:"0"},
			"CitRights":
				  { human: "Citizens, specific rights", areafilter: "0", type:"text", exclude:"0"},
			"CitDef":
				  { human: "Citizenship delimitation", areafilter: "0", type:"text", exclude:"0"},
			"CitOth":
				  { human: "Citizenship other", areafilter: "0", type:"text", exclude:"0"},
			"JusCr":
				  { human: "Criminal Justice and Emergency law", areafilter: "0", type:"text", exclude:"0"},
			"JusCrSp":
				  { human: "Reform to specific laws", areafilter: "0", type:"text", exclude:"0"},
			"JusCrSys":
				  { human: "Criminal Justice System Reform", areafilter: "0", type:"text", exclude:"0"},
			"JusCrPow":
				  { human: "Delimitation of powers in Criminal Justice System", areafilter: "0", type:"text", exclude:"0"},
			"JusEm":
				  { human: "State of Emergency Provisions", areafilter: "0", type:"text", exclude:"0"},
			"JusJu":
				  { human: "Judiciary and courts", areafilter: "0", type:"text", exclude:"0"},
			"JusPri":
				  { human: "Prisons and detention", areafilter: "0", type:"text", exclude:"0"},
			"JusTra":
				  { human: "Traditional- Religious Laws", areafilter: "0", type:"text", exclude:"0"},
			"Dev":
				  { human: "Development or socio-economic reconstruction", areafilter: "0", type:"text", exclude:"0"},
			"DevSoc":
				  { human: "Development provisions ", areafilter: "0", type:"text", exclude:"0"},
			"DevHum":
				  { human: "Humanitarian assistance", areafilter: "0", type:"text", exclude:"0"},
			"DevInfra":
				  { human: "Infrastructure and reconstruction", areafilter: "0", type:"text", exclude:"0"},
			"NEC":
				  { human: "National economic plan", areafilter: "0", type:"text", exclude:"0"},
			"NatRes":
				  { human: "Natural resources", areafilter: "0", type:"text", exclude:"0"},
			"IntFu":
				  { human: "International funds", areafilter: "0", type:"text", exclude:"0"},
			"Bus":
				  { human: "Business", areafilter: "0", type:"text", exclude:"0"},
			"Tax":
				  { human: "Taxation", areafilter: "0", type:"text", exclude:"0"},
			"TaxPo":
				  { human: "Power to Tax", areafilter: "0", type:"text", exclude:"0"},
			"TaxRef":
				  { human: "Reform of Taxation", areafilter: "0", type:"text", exclude:"0"},
			"TaxOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"Ban":
				  { human: "Banks", areafilter: "0", type:"text", exclude:"0"},
			"CenBan":
				  { human: "Central bank", areafilter: "0", type:"text", exclude:"0"},
			"BanPers":
				  { human: "Personal or commercial banking", areafilter: "0", type:"text", exclude:"0"},
			"BanInt":
				  { human: "International finance", areafilter: "0", type:"text", exclude:"0"},
			"BanXb":
				  { human: "Cross-border financial flows", areafilter: "0", type:"text", exclude:"0"},
			"LaRef":
				  { human: "Land reform-rights", areafilter: "0", type:"text", exclude:"0"},
			"LaRefMan":
				  { human: "Land reform, transfer, and management", areafilter: "0", type:"text", exclude:"0"},
			"LaRefRet":
				  { human: "Property return, restitution, and dispute mechanisms.", areafilter: "0", type:"text", exclude:"0"},
			"LaRefOth":
				  { human: "Other", areafilter: "0", type:"text", exclude:"0"},
			"LaNom":
				  { human: "Pastoralist-nomadism rights", areafilter: "0", type:"text", exclude:"0"},
			"LaCH":
				  { human: "Cultural heritage", areafilter: "0", type:"text", exclude:"0"},
			"LaCHTa":
				  { human: "Cultural Heritage: Tangible", areafilter: "0", type:"text", exclude:"0"},
			"LaCHIt":
				  { human: "Cultural Heritage: Intangible", areafilter: "0", type:"text", exclude:"0"},
			"LaCHPro":
				  { human: "Cultural Heritage, Promotion of values", areafilter: "0", type:"text", exclude:"0"},
			"LaCHOth":
				  { human: "Cultural Heritage Other", areafilter: "0", type:"text", exclude:"0"},
			"LaEn":
				  { human: "Environment", areafilter: "0", type:"text", exclude:"0"},
			"Wat":
				  { human: "Water or riparian (river) rights-access", areafilter: "0", type:"text", exclude:"0"},
			"SsrGua":
				  { human: "Security Sector (General)", areafilter: "0", type:"text", exclude:"0"},
			"Ce":
				  { human: "Ceasefire", areafilter: "0", type:"text", exclude:"0"},
			"CeProv":
				  { human: "Ceasefire provisions", areafilter: "0", type:"text", exclude:"0"},
			"CeGen":
				  { human: "General references to ceasefires", areafilter: "0", type:"text", exclude:"0"},
			"SsrPol":
				  { human: "Police", areafilter: "0", type:"text", exclude:"0"},
			"SsrArm":
				  { human: "Armed Forces", areafilter: "0", type:"text", exclude:"0"},
			"SsrDdr":
				  { human: "DDR", areafilter: "0", type:"text", exclude:"0"},
			"DdrDemil":
				  { human: "Demilitarisation", areafilter: "0", type:"text", exclude:"0"},
			"DdrProg":
				  { human: "DDR Programme", areafilter: "0", type:"text", exclude:"0"},
			"SsrInt":
				  { human: "Intelligence service", areafilter: "0", type:"text", exclude:"0"},
			"SsrPsf":
				  { human: "Rebel-opposition-Para-statal forces", areafilter: "0", type:"text", exclude:"0"},
			"SsrFf":
				  { human: "Withdrawal of foreign forces", areafilter: "0", type:"text", exclude:"0"},
			"Cor":
				  { human: "Corruption", areafilter: "0", type:"text", exclude:"0"},
			"SsrCrOcr":
				  { human: "Crime-Organised crime", areafilter: "0", type:"text", exclude:"0"},
			"SsrDrugs":
				  { human: "Drugs", areafilter: "0", type:"text", exclude:"0"},
			"Terr":
				  { human: "Terrorism", areafilter: "0", type:"text", exclude:"0"},
			"TjGen":
				  { human: "Transitional Justice General", areafilter: "0", type:"text", exclude:"0"},
			"TjAm":
				  { human: "Amnesty-pardon", areafilter: "0", type:"text", exclude:"0"},
			"TjAmPro":
				  { human: "Amnesty-pardon proper", areafilter: "0", type:"text", exclude:"0"},
			"TjSan":
				  { human: "Relief of other Sanctions", areafilter: "0", type:"text", exclude:"0"},
			"TjPower":
				  { human: "Power to amnesty", areafilter: "0", type:"text", exclude:"0"},
			"TjAmBan":
				  { human: "Amnesty prohibition", areafilter: "0", type:"text", exclude:"0"},
			"TjCou":
				  { human: "Courts", areafilter: "0", type:"text", exclude:"0"},
			"TjJaNc":
				  { human: "National Courts", areafilter: "0", type:"text", exclude:"0"},
			"TjJaIc":
				  { human: "International Courts", areafilter: "0", type:"text", exclude:"0"},
			"TjMech":
				  { human: "Mechanism", areafilter: "0", type:"text", exclude:"0"},
			"TjPrire":
				  { human: "Prisoner release", areafilter: "0", type:"text", exclude:"0"},
			"TjVet":
				  { human: "Vetting", areafilter: "0", type:"text", exclude:"0"},
			"TjVic":
				  { human: "Victims", areafilter: "0", type:"text", exclude:"0"},
			"TjMis":
				  { human: "Missing", areafilter: "0", type:"text", exclude:"0"},
			"TjRep":
				  { human: " Reparations", areafilter: "0", type:"text", exclude:"0"},
			"TjRSym":
				  { human: "symbolic reparations", areafilter: "0", type:"text", exclude:"0"},
			"TjRMa":
				  { human: " Material reparations (includes compensation)", areafilter: "0", type:"text", exclude:"0"},
			"TjNR":
				  { human: "Reconciliation", areafilter: "0", type:"text", exclude:"0"},
			"ImUN":
				  { human: "UN Signatory", areafilter: "0", type:"text", exclude:"0"},
			"ImOth":
				  { human: "Other International Signatory", areafilter: "0", type:"text", exclude:"0"},
			"ImRef":
				  { human: "Referendum for agreement", areafilter: "0", type:"text", exclude:"0"},
			"ImPK":
				  { human: "International Mission-Force-Similar", areafilter: "0", type:"text", exclude:"0"},
			"ImE":
				  { human: "Enforcement Mechanism", areafilter: "0", type:"text", exclude:"0"},
			"ImSrc":
				  { human: "Source", areafilter: "0", type:"text", exclude:"0"},
			"ConRen":
				  { human: "Constitutional renewal-affirmation", areafilter: "0", type:"text", exclude:"0"}
  }
];
