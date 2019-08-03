
///////////////////////////////////////////////////////////////////
// AREA CONFIGURATION
//
	var MAX_DISTINC = 50;
	var AREAX = 1100;
	var AREAY = 900;
	var COLORS_APPROACH = "fix"; // fix, random, gradient
	var PARAM1 = "numero";
	var PARAM2 = "tipologia_general";
	var AREA_TITLE = "Amauta explorada";

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
	"numero":
	  { human: "n&uacute;mero", areafilter: "0", type:"number", exclude:"0"},
	"mes":
	  { human: "Mes", areafilter: "0", type:"text", exclude:"1"},
		"ano":
		  { human: "a&ntilde;o", areafilter: "1", type:"number", exclude:"0"},
	"amauta_libro_y_revitas":
	  { human: "Libro y Revitas", areafilter: "1", type:"text", exclude:"0"},
	"nombre_de_seccion":
	  { human: "Secciones", areafilter: "1", type:"text", exclude:"0"},
	"tipologia_general":
	  { human: "Tipolog&iacute;a general", areafilter: "1", type:"text", exclude:"0"},
	"tipologia_particular":
	  { human: "Tipolog&iacute;a Particular", areafilter: "1", type:"text", exclude:"0"},
	"autor":
	  { human: "Personas Autoras", areafilter: "1", type:"text", exclude:"0"},
	"sexo":
	  { human: "G&eacute;nero autor/a", areafilter: "1", type:"text", exclude:"0"},
	"titulo":
	  { human: "T&iacute;tulo", areafilter: "1", type:"text", exclude:"0"},
	"acompanado_texto_e_imagen":
	  { human: "Individual o acompa&ntilde;ado", areafilter: "0", type:"text", exclude:"1"},
	"pag":
	  { human: "P&aacute;gina", areafilter: "0", type:"text", exclude:"0"},
	"ciudad":
	  { human: "Ciudad", areafilter: "1", type:"text", exclude:"0"},
	"pais":
	  { human: "Pa&iacute;s", areafilter: "1", type:"text", exclude:"0"},
	"region":
	  { human: "Regi&oacute;n", areafilter: "0", type:"text", exclude:"0"},
	"nombre_de_imagen":
	  { human: "T&iacute;tulo imagen acompa&ntilde;.", areafilter: "1", type:"text", exclude:"0"},
	"nombre_de_artista":
	  { human: "Autor imagen", areafilter: "1", type:"text", exclude:"0"},
	"pag_acomp":
	  { human: "P&aacute;gina", areafilter: "0", type:"number", exclude:"0"},
	"pais2":
	  { human: "Pa&iacute;s2", areafilter: "0", type:"text", exclude:"1"},
	"nombre_del_anuncio":
	  { human: "Anuncio", areafilter: "1", type:"text", exclude:"0"},
	"a_cargo_de":
	  { human: "A cargo de", areafilter: "0", type:"text", exclude:"0"},
	"domicilio":
	  { human: "Domicilio", areafilter: "1", type:"text", exclude:"0"},
	"obs":
	  { human: "Observaciones", areafilter: "1", type:"text", exclude:"0"},
  }
];
