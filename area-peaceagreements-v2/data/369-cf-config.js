
///////////////////////////////////////////////////////////////////
// AREA CONFIGURATION
//
	var MAX_DISTINC = 50;
	var AREAX = 1100;
	var AREAY = 900;
	var COLORS_APPROACH = "fix"; // fix, random, gradient
	var PARAM1 = "Year";
	var PARAM2 = "Reg";
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
    "Con":
	  { human: "Con", areafilter: "0", type:"text", exclude:"0"},
	"Contp":
	  { human: "Contp", areafilter: "0", type:"text", exclude:"0"},
	"PP":
	  { human: "PP", areafilter: "0", type:"text", exclude:"0"},
	"PPName":
	  { human: "PPName", areafilter: "0", type:"text", exclude:"0"},
	"Reg":
	  { human: "Reg", areafilter: "0", type:"text", exclude:"0"},
	"AgtId":
	  { human: "AgtId", areafilter: "0", type:"text", exclude:"0"},
	"Agt":
	  { human: "Agt", areafilter: "0", type:"text", exclude:"0"},
	"Year":
	  { human: "Year", areafilter: "0", type:"text", exclude:"0"},
	"Dat":
	  { human: "Dat", areafilter: "0", type:"text", exclude:"0"},
	"Status":
	  { human: "Status", areafilter: "0", type:"text", exclude:"0"},
	"Lgt":
	  { human: "Lgt", areafilter: "0", type:"text", exclude:"0"},
	"N_characters":
	  { human: "N_characters", areafilter: "0", type:"text", exclude:"0"},
	"Agtp":
	  { human: "Agtp", areafilter: "0", type:"text", exclude:"0"},
	"Stage":
	  { human: "Stage", areafilter: "0", type:"text", exclude:"0"},
	"StageSub":
	  { human: "StageSub", areafilter: "0", type:"text", exclude:"0"},
	"Part":
	  { human: "Part", areafilter: "0", type:"text", exclude:"0"},
	"ThrdPart":
	  { human: "ThrdPart", areafilter: "0", type:"text", exclude:"0"},
	"OthAgr":
	  { human: "OthAgr", areafilter: "0", type:"text", exclude:"0"},
	"Loc1ISO":
	  { human: "Loc1ISO", areafilter: "0", type:"text", exclude:"0"},
	"Loc2ISO":
	  { human: "Loc2ISO", areafilter: "0", type:"text", exclude:"0"},
	"Loc1GWNO":
	  { human: "Loc1GWNO", areafilter: "0", type:"text", exclude:"0"},
	"Loc2GWNO":
	  { human: "Loc2GWNO", areafilter: "0", type:"text", exclude:"0"},
	"UcdpCon":
	  { human: "UcdpCon", areafilter: "0", type:"text", exclude:"0"},
	"UcdpAgr":
	  { human: "UcdpAgr", areafilter: "0", type:"text", exclude:"0"},
	"PamAgr":
	  { human: "PamAgr", areafilter: "0", type:"text", exclude:"0"},
	"CowWar":
	  { human: "CowWar", areafilter: "0", type:"text", exclude:"0"},
	"GCh":
	  { human: "GCh", areafilter: "0", type:"text", exclude:"0"},
	"GChRhet":
	  { human: "GChRhet", areafilter: "0", type:"text", exclude:"0"},
	"GChAntid":
	  { human: "GChAntid", areafilter: "0", type:"text", exclude:"0"},
	"GChSubs":
	  { human: "GChSubs", areafilter: "0", type:"text", exclude:"0"},
	"GChOth":
	  { human: "GChOth", areafilter: "0", type:"text", exclude:"0"},
	"GDis":
	  { human: "GDis", areafilter: "0", type:"text", exclude:"0"},
	"GDisRhet":
	  { human: "GDisRhet", areafilter: "0", type:"text", exclude:"0"},
	"GDisAntid":
	  { human: "GDisAntid", areafilter: "0", type:"text", exclude:"0"},
	"GDisSubs":
	  { human: "GDisSubs", areafilter: "0", type:"text", exclude:"0"},
	"GDisOth":
	  { human: "GDisOth", areafilter: "0", type:"text", exclude:"0"},
	"GAge":
	  { human: "GAge", areafilter: "0", type:"text", exclude:"0"},
	"GAgeRhet":
	  { human: "GAgeRhet", areafilter: "0", type:"text", exclude:"0"},
	"GAgeAntid":
	  { human: "GAgeAntid", areafilter: "0", type:"text", exclude:"0"},
	"GAgeSubs":
	  { human: "GAgeSubs", areafilter: "0", type:"text", exclude:"0"},
	"GAgeOth":
	  { human: "GAgeOth", areafilter: "0", type:"text", exclude:"0"},
	"GMig":
	  { human: "GMig", areafilter: "0", type:"text", exclude:"0"},
	"GMigRhet":
	  { human: "GMigRhet", areafilter: "0", type:"text", exclude:"0"},
	"GMigAntid":
	  { human: "GMigAntid", areafilter: "0", type:"text", exclude:"0"},
	"GMigSubs":
	  { human: "GMigSubs", areafilter: "0", type:"text", exclude:"0"},
	"GMigOth":
	  { human: "GMigOth", areafilter: "0", type:"text", exclude:"0"},
	"GRa":
	  { human: "GRa", areafilter: "0", type:"text", exclude:"0"},
	"GRaRhet":
	  { human: "GRaRhet", areafilter: "0", type:"text", exclude:"0"},
	"GRaAntid":
	  { human: "GRaAntid", areafilter: "0", type:"text", exclude:"0"},
	"GRaSubs":
	  { human: "GRaSubs", areafilter: "0", type:"text", exclude:"0"},
	"GRaOth":
	  { human: "GRaOth", areafilter: "0", type:"text", exclude:"0"},
	"GRe":
	  { human: "GRe", areafilter: "0", type:"text", exclude:"0"},
	"GReRhet":
	  { human: "GReRhet", areafilter: "0", type:"text", exclude:"0"},
	"GReAntid":
	  { human: "GReAntid", areafilter: "0", type:"text", exclude:"0"},
	"GReSubs":
	  { human: "GReSubs", areafilter: "0", type:"text", exclude:"0"},
	"GReOth":
	  { human: "GReOth", areafilter: "0", type:"text", exclude:"0"},
	"GInd":
	  { human: "GInd", areafilter: "0", type:"text", exclude:"0"},
	"GIndRhet":
	  { human: "GIndRhet", areafilter: "0", type:"text", exclude:"0"},
	"GIndAntid":
	  { human: "GIndAntid", areafilter: "0", type:"text", exclude:"0"},
	"GIndSubs":
	  { human: "GIndSubs", areafilter: "0", type:"text", exclude:"0"},
	"GIndOth":
	  { human: "GIndOth", areafilter: "0", type:"text", exclude:"0"},
	"GOth":
	  { human: "GOth", areafilter: "0", type:"text", exclude:"0"},
	"GOthRhet":
	  { human: "GOthRhet", areafilter: "0", type:"text", exclude:"0"},
	"GOthAntid":
	  { human: "GOthAntid", areafilter: "0", type:"text", exclude:"0"},
	"GOthSubs":
	  { human: "GOthSubs", areafilter: "0", type:"text", exclude:"0"},
	"GOthOth":
	  { human: "GOthOth", areafilter: "0", type:"text", exclude:"0"},
	"GRef":
	  { human: "GRef", areafilter: "0", type:"text", exclude:"0"},
	"GRefRhet":
	  { human: "GRefRhet", areafilter: "0", type:"text", exclude:"0"},
	"GRefSubs":
	  { human: "GRefSubs", areafilter: "0", type:"text", exclude:"0"},
	"GRefOth":
	  { human: "GRefOth", areafilter: "0", type:"text", exclude:"0"},
	"GSoc":
	  { human: "GSoc", areafilter: "0", type:"text", exclude:"0"},
	"GSocRhet":
	  { human: "GSocRhet", areafilter: "0", type:"text", exclude:"0"},
	"GSocAntid":
	  { human: "GSocAntid", areafilter: "0", type:"text", exclude:"0"},
	"GSocSubs":
	  { human: "GSocSubs", areafilter: "0", type:"text", exclude:"0"},
	"GSocOth":
	  { human: "GSocOth", areafilter: "0", type:"text", exclude:"0"},
	"GeWom":
	  { human: "GeWom", areafilter: "0", type:"text", exclude:"0"},
	"GeMe":
	  { human: "GeMe", areafilter: "0", type:"text", exclude:"0"},
	"GeMeNu":
	  { human: "GeMeNu", areafilter: "0", type:"text", exclude:"0"},
	"GeMeOth":
	  { human: "GeMeOth", areafilter: "0", type:"text", exclude:"0"},
	"GeSo":
	  { human: "GeSo", areafilter: "0", type:"text", exclude:"0"},
	"GeLgbti":
	  { human: "GeLgbti", areafilter: "0", type:"text", exclude:"0"},
	"GeLgbtiPos":
	  { human: "GeLgbtiPos", areafilter: "0", type:"text", exclude:"0"},
	"GeLgbtiNeg":
	  { human: "GeLgbtiNeg", areafilter: "0", type:"text", exclude:"0"},
	"GeFa":
	  { human: "GeFa", areafilter: "0", type:"text", exclude:"0"},
	"StDef":
	  { human: "StDef", areafilter: "0", type:"text", exclude:"0"},
	"StGen":
	  { human: "StGen", areafilter: "0", type:"text", exclude:"0"},
	"StCon":
	  { human: "StCon", areafilter: "0", type:"text", exclude:"0"},
	"StSd":
	  { human: "StSd", areafilter: "0", type:"text", exclude:"0"},
	"StRef":
	  { human: "StRef", areafilter: "0", type:"text", exclude:"0"},
	"StSym":
	  { human: "StSym", areafilter: "0", type:"text", exclude:"0"},
	"StInd":
	  { human: "StInd", areafilter: "0", type:"text", exclude:"0"},
	"StUni":
	  { human: "StUni", areafilter: "0", type:"text", exclude:"0"},
	"StBor":
	  { human: "StBor", areafilter: "0", type:"text", exclude:"0"},
	"StXbor":
	  { human: "StXbor", areafilter: "0", type:"text", exclude:"0"},
	"Pol":
	  { human: "Pol", areafilter: "0", type:"text", exclude:"0"},
	"PolGen":
	  { human: "PolGen", areafilter: "0", type:"text", exclude:"0"},
	"PolNewInd":
	  { human: "PolNewInd", areafilter: "0", type:"text", exclude:"0"},
	"PolNewTemp":
	  { human: "PolNewTemp", areafilter: "0", type:"text", exclude:"0"},
	"ConRen":
	  { human: "ConRen", areafilter: "0", type:"text", exclude:"0"},
	"Cons":
	  { human: "Cons", areafilter: "0", type:"text", exclude:"0"},
	"Ele":
	  { human: "Ele", areafilter: "0", type:"text", exclude:"0"},
	"ElecComm":
	  { human: "ElecComm", areafilter: "0", type:"text", exclude:"0"},
	"PolPar":
	  { human: "PolPar", areafilter: "0", type:"text", exclude:"0"},
	"PolParTrans":
	  { human: "PolParTrans", areafilter: "0", type:"text", exclude:"0"},
	"PolParOth":
	  { human: "PolParOth", areafilter: "0", type:"text", exclude:"0"},
	"Civso":
	  { human: "Civso", areafilter: "0", type:"text", exclude:"0"},
	"Tral":
	  { human: "Tral", areafilter: "0", type:"text", exclude:"0"},
	"Pubad":
	  { human: "Pubad", areafilter: "0", type:"text", exclude:"0"},
	"Polps":
	  { human: "Polps", areafilter: "0", type:"text", exclude:"0"},
	"PpsSt":
	  { human: "PpsSt", areafilter: "0", type:"text", exclude:"0"},
	"PpsSub":
	  { human: "PpsSub", areafilter: "0", type:"text", exclude:"0"},
	"PpsEx":
	  { human: "PpsEx", areafilter: "0", type:"text", exclude:"0"},
	"PpsOro":
	  { human: "PpsOro", areafilter: "0", type:"text", exclude:"0"},
	"PpsOthPr":
	  { human: "PpsOthPr", areafilter: "0", type:"text", exclude:"0"},
	"PpsVet":
	  { human: "PpsVet", areafilter: "0", type:"text", exclude:"0"},
	"PpsAut":
	  { human: "PpsAut", areafilter: "0", type:"text", exclude:"0"},
	"PpsInt":
	  { human: "PpsInt", areafilter: "0", type:"text", exclude:"0"},
	"PpsOth":
	  { human: "PpsOth", areafilter: "0", type:"text", exclude:"0"},
	"Terps":
	  { human: "Terps", areafilter: "0", type:"text", exclude:"0"},
	"TpsSub":
	  { human: "TpsSub", areafilter: "0", type:"text", exclude:"0"},
	"TpsLoc":
	  { human: "TpsLoc", areafilter: "0", type:"text", exclude:"0"},
	"TpsAut":
	  { human: "TpsAut", areafilter: "0", type:"text", exclude:"0"},
	"TpsOth":
	  { human: "TpsOth", areafilter: "0", type:"text", exclude:"0"},
	"Eps":
	  { human: "Eps", areafilter: "0", type:"text", exclude:"0"},
	"EpsRes":
	  { human: "EpsRes", areafilter: "0", type:"text", exclude:"0"},
	"EpsFis":
	  { human: "EpsFis", areafilter: "0", type:"text", exclude:"0"},
	"EpsOth":
	  { human: "EpsOth", areafilter: "0", type:"text", exclude:"0"},
	"Mps":
	  { human: "Mps", areafilter: "0", type:"text", exclude:"0"},
	"MpsMe":
	  { human: "MpsMe", areafilter: "0", type:"text", exclude:"0"},
	"MpsJt":
	  { human: "MpsJt", areafilter: "0", type:"text", exclude:"0"},
	"MpsPro":
	  { human: "MpsPro", areafilter: "0", type:"text", exclude:"0"},
	"MpsOth":
	  { human: "MpsOth", areafilter: "0", type:"text", exclude:"0"},
	"HrGen":
	  { human: "HrGen", areafilter: "0", type:"text", exclude:"0"},
	"EqGen":
	  { human: "EqGen", areafilter: "0", type:"text", exclude:"0"},
	"HrDem":
	  { human: "HrDem", areafilter: "0", type:"text", exclude:"0"},
	"Prot":
	  { human: "Prot", areafilter: "0", type:"text", exclude:"0"},
	"ProtCiv":
	  { human: "ProtCiv", areafilter: "0", type:"text", exclude:"0"},
	"ProtGrp":
	  { human: "ProtGrp", areafilter: "0", type:"text", exclude:"0"},
	"ProtLgl":
	  { human: "ProtLgl", areafilter: "0", type:"text", exclude:"0"},
	"ProtOth":
	  { human: "ProtOth", areafilter: "0", type:"text", exclude:"0"},
	"HrFra":
	  { human: "HrFra", areafilter: "0", type:"text", exclude:"0"},
	"HrfSp":
	  { human: "HrfSp", areafilter: "0", type:"text", exclude:"0"},
	"HrfBor":
	  { human: "HrfBor", areafilter: "0", type:"text", exclude:"0"},
	"HrfTinc":
	  { human: "HrfTinc", areafilter: "0", type:"text", exclude:"0"},
	"HrfOth":
	  { human: "HrfOth", areafilter: "0", type:"text", exclude:"0"},
	"HrCp":
	  { human: "HrCp", areafilter: "0", type:"text", exclude:"0"},
	"CprLife":
	  { human: "CprLife", areafilter: "0", type:"text", exclude:"0"},
	"CprTort":
	  { human: "CprTort", areafilter: "0", type:"text", exclude:"0"},
	"CprEq":
	  { human: "CprEq", areafilter: "0", type:"text", exclude:"0"},
	"CprSlav":
	  { human: "CprSlav", areafilter: "0", type:"text", exclude:"0"},
	"CprLib":
	  { human: "CprLib", areafilter: "0", type:"text", exclude:"0"},
	"CprDet":
	  { human: "CprDet", areafilter: "0", type:"text", exclude:"0"},
	"CprFmov":
	  { human: "CprFmov", areafilter: "0", type:"text", exclude:"0"},
	"CprFspe":
	  { human: "CprFspe", areafilter: "0", type:"text", exclude:"0"},
	"CprFass":
	  { human: "CprFass", areafilter: "0", type:"text", exclude:"0"},
	"CprTria":
	  { human: "CprTria", areafilter: "0", type:"text", exclude:"0"},
	"CprPriv":
	  { human: "CprPriv", areafilter: "0", type:"text", exclude:"0"},
	"CprVote":
	  { human: "CprVote", areafilter: "0", type:"text", exclude:"0"},
	"CprReli":
	  { human: "CprReli", areafilter: "0", type:"text", exclude:"0"},
	"CprOth":
	  { human: "CprOth", areafilter: "0", type:"text", exclude:"0"},
	"HrSec":
	  { human: "HrSec", areafilter: "0", type:"text", exclude:"0"},
	"SerProp":
	  { human: "SerProp", areafilter: "0", type:"text", exclude:"0"},
	"SerWork":
	  { human: "SerWork", areafilter: "0", type:"text", exclude:"0"},
	"SerHeal":
	  { human: "SerHeal", areafilter: "0", type:"text", exclude:"0"},
	"SerEdu":
	  { human: "SerEdu", areafilter: "0", type:"text", exclude:"0"},
	"SerStdl":
	  { human: "SerStdl", areafilter: "0", type:"text", exclude:"0"},
	"SerShel":
	  { human: "SerShel", areafilter: "0", type:"text", exclude:"0"},
	"SerSs":
	  { human: "SerSs", areafilter: "0", type:"text", exclude:"0"},
	"SerCult":
	  { human: "SerCult", areafilter: "0", type:"text", exclude:"0"},
	"SerOth":
	  { human: "SerOth", areafilter: "0", type:"text", exclude:"0"},
	"HrNi":
	  { human: "HrNi", areafilter: "0", type:"text", exclude:"0"},
	"HrNiMe":
	  { human: "HrNiMe", areafilter: "0", type:"text", exclude:"0"},
	"HrNiNe":
	  { human: "HrNiNe", areafilter: "0", type:"text", exclude:"0"},
	"HrNiOth":
	  { human: "HrNiOth", areafilter: "0", type:"text", exclude:"0"},
	"HrIi":
	  { human: "HrIi", areafilter: "0", type:"text", exclude:"0"},
	"HrIiMon":
	  { human: "HrIiMon", areafilter: "0", type:"text", exclude:"0"},
	"HrIiBod":
	  { human: "HrIiBod", areafilter: "0", type:"text", exclude:"0"},
	"HrIiOth":
	  { human: "HrIiOth", areafilter: "0", type:"text", exclude:"0"},
	"HrMob":
	  { human: "HrMob", areafilter: "0", type:"text", exclude:"0"},
	"HrDet":
	  { human: "HrDet", areafilter: "0", type:"text", exclude:"0"},
	"Med":
	  { human: "Med", areafilter: "0", type:"text", exclude:"0"},
	"MedGov":
	  { human: "MedGov", areafilter: "0", type:"text", exclude:"0"},
	"MedSubs":
	  { human: "MedSubs", areafilter: "0", type:"text", exclude:"0"},
	"MedLog":
	  { human: "MedLog", areafilter: "0", type:"text", exclude:"0"},
	"MedOth":
	  { human: "MedOth", areafilter: "0", type:"text", exclude:"0"},
	"HrCit":
	  { human: "HrCit", areafilter: "0", type:"text", exclude:"0"},
	"CitGen":
	  { human: "CitGen", areafilter: "0", type:"text", exclude:"0"},
	"CitRights":
	  { human: "CitRights", areafilter: "0", type:"text", exclude:"0"},
	"CitDef":
	  { human: "CitDef", areafilter: "0", type:"text", exclude:"0"},
	"CitOth":
	  { human: "CitOth", areafilter: "0", type:"text", exclude:"0"},
	"JusCr":
	  { human: "JusCr", areafilter: "0", type:"text", exclude:"0"},
	"JusCrSp":
	  { human: "JusCrSp", areafilter: "0", type:"text", exclude:"0"},
	"JusCrSys":
	  { human: "JusCrSys", areafilter: "0", type:"text", exclude:"0"},
	"JusCrPow":
	  { human: "JusCrPow", areafilter: "0", type:"text", exclude:"0"},
	"JusEm":
	  { human: "JusEm", areafilter: "0", type:"text", exclude:"0"},
	"JusJu":
	  { human: "JusJu", areafilter: "0", type:"text", exclude:"0"},
	"JusPri":
	  { human: "JusPri", areafilter: "0", type:"text", exclude:"0"},
	"JusTra":
	  { human: "JusTra", areafilter: "0", type:"text", exclude:"0"},
	"Dev":
	  { human: "Dev", areafilter: "0", type:"text", exclude:"0"},
	"DevSoc":
	  { human: "DevSoc", areafilter: "0", type:"text", exclude:"0"},
	"DevHum":
	  { human: "DevHum", areafilter: "0", type:"text", exclude:"0"},
	"DevInfra":
	  { human: "DevInfra", areafilter: "0", type:"text", exclude:"0"},
	"NEC":
	  { human: "NEC", areafilter: "0", type:"text", exclude:"0"},
	"NatRes":
	  { human: "NatRes", areafilter: "0", type:"text", exclude:"0"},
	"IntFu":
	  { human: "IntFu", areafilter: "0", type:"text", exclude:"0"},
	"Bus":
	  { human: "Bus", areafilter: "0", type:"text", exclude:"0"},
	"Tax":
	  { human: "Tax", areafilter: "0", type:"text", exclude:"0"},
	"TaxPo":
	  { human: "TaxPo", areafilter: "0", type:"text", exclude:"0"},
	"TaxRef":
	  { human: "TaxRef", areafilter: "0", type:"text", exclude:"0"},
	"TaxOth":
	  { human: "TaxOth", areafilter: "0", type:"text", exclude:"0"},
	"Ban":
	  { human: "Ban", areafilter: "0", type:"text", exclude:"0"},
	"CenBan":
	  { human: "CenBan", areafilter: "0", type:"text", exclude:"0"},
	"BanPers":
	  { human: "BanPers", areafilter: "0", type:"text", exclude:"0"},
	"BanInt":
	  { human: "BanInt", areafilter: "0", type:"text", exclude:"0"},
	"BanXb":
	  { human: "BanXb", areafilter: "0", type:"text", exclude:"0"},
	"LaRef":
	  { human: "LaRef", areafilter: "0", type:"text", exclude:"0"},
	"LaRefMan":
	  { human: "LaRefMan", areafilter: "0", type:"text", exclude:"0"},
	"LaRefRet":
	  { human: "LaRefRet", areafilter: "0", type:"text", exclude:"0"},
	"LaRefOth":
	  { human: "LaRefOth", areafilter: "0", type:"text", exclude:"0"},
	"LaNom":
	  { human: "LaNom", areafilter: "0", type:"text", exclude:"0"},
	"LaCH":
	  { human: "LaCH", areafilter: "0", type:"text", exclude:"0"},
	"LaCHTa":
	  { human: "LaCHTa", areafilter: "0", type:"text", exclude:"0"},
	"LaCHIt":
	  { human: "LaCHIt", areafilter: "0", type:"text", exclude:"0"},
	"LaCHPro":
	  { human: "LaCHPro", areafilter: "0", type:"text", exclude:"0"},
	"LaCHOth":
	  { human: "LaCHOth", areafilter: "0", type:"text", exclude:"0"},
	"LaEn":
	  { human: "LaEn", areafilter: "0", type:"text", exclude:"0"},
	"Wat":
	  { human: "Wat", areafilter: "0", type:"text", exclude:"0"},
	"SsrGua":
	  { human: "SsrGua", areafilter: "0", type:"text", exclude:"0"},
	"Ce":
	  { human: "Ce", areafilter: "0", type:"text", exclude:"0"},
	"CeProv":
	  { human: "CeProv", areafilter: "0", type:"text", exclude:"0"},
	"CeGen":
	  { human: "CeGen", areafilter: "0", type:"text", exclude:"0"},
	"SsrPol":
	  { human: "SsrPol", areafilter: "0", type:"text", exclude:"0"},
	"SsrArm":
	  { human: "SsrArm", areafilter: "0", type:"text", exclude:"0"},
	"SsrDdr":
	  { human: "SsrDdr", areafilter: "0", type:"text", exclude:"0"},
	"DdrDemil":
	  { human: "DdrDemil", areafilter: "0", type:"text", exclude:"0"},
	"DdrProg":
	  { human: "DdrProg", areafilter: "0", type:"text", exclude:"0"},
	"SsrInt":
	  { human: "SsrInt", areafilter: "0", type:"text", exclude:"0"},
	"SsrPsf":
	  { human: "SsrPsf", areafilter: "0", type:"text", exclude:"0"},
	"SsrFf":
	  { human: "SsrFf", areafilter: "0", type:"text", exclude:"0"},
	"Cor":
	  { human: "Cor", areafilter: "0", type:"text", exclude:"0"},
	"SsrCrOcr":
	  { human: "SsrCrOcr", areafilter: "0", type:"text", exclude:"0"},
	"SsrDrugs":
	  { human: "SsrDrugs", areafilter: "0", type:"text", exclude:"0"},
	"Terr":
	  { human: "Terr", areafilter: "0", type:"text", exclude:"0"},
	"TjGen":
	  { human: "TjGen", areafilter: "0", type:"text", exclude:"0"},
	"TjAm":
	  { human: "TjAm", areafilter: "0", type:"text", exclude:"0"},
	"TjAmPro":
	  { human: "TjAmPro", areafilter: "0", type:"text", exclude:"0"},
	"TjSan":
	  { human: "TjSan", areafilter: "0", type:"text", exclude:"0"},
	"TjPower":
	  { human: "TjPower", areafilter: "0", type:"text", exclude:"0"},
	"TjAmBan":
	  { human: "TjAmBan", areafilter: "0", type:"text", exclude:"0"},
	"TjCou":
	  { human: "TjCou", areafilter: "0", type:"text", exclude:"0"},
	"TjJaNc":
	  { human: "TjJaNc", areafilter: "0", type:"text", exclude:"0"},
	"TjJaIc":
	  { human: "TjJaIc", areafilter: "0", type:"text", exclude:"0"},
	"TjMech":
	  { human: "TjMech", areafilter: "0", type:"text", exclude:"0"},
	"TjPrire":
	  { human: "TjPrire", areafilter: "0", type:"text", exclude:"0"},
	"TjVet":
	  { human: "TjVet", areafilter: "0", type:"text", exclude:"0"},
	"TjVic":
	  { human: "TjVic", areafilter: "0", type:"text", exclude:"0"},
	"TjMis":
	  { human: "TjMis", areafilter: "0", type:"text", exclude:"0"},
	"TjRep":
	  { human: "TjRep", areafilter: "0", type:"text", exclude:"0"},
	"TjRSym":
	  { human: "TjRSym", areafilter: "0", type:"text", exclude:"0"},
	"TjRMa":
	  { human: "TjRMa", areafilter: "0", type:"text", exclude:"0"},
	"TjNR":
	  { human: "TjNR", areafilter: "0", type:"text", exclude:"0"},
	"ImUN":
	  { human: "ImUN", areafilter: "0", type:"text", exclude:"0"},
	"ImOth":
	  { human: "ImOth", areafilter: "0", type:"text", exclude:"0"},
	"ImRef":
	  { human: "ImRef", areafilter: "0", type:"text", exclude:"0"},
	"ImPK":
	  { human: "ImPK", areafilter: "0", type:"text", exclude:"0"},
	"ImE":
	  { human: "ImE", areafilter: "0", type:"text", exclude:"0"},
	"ImSrc":
	  { human: "InSrc", areafilter: "0", type:"text", exclude:"0"}
  }
];
