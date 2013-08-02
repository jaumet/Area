
///////////////////////////////////////////////////////////////////
// AREA CONFIGURATION
//
	var MAX_DISTINC = 10;
	var AREAX = 800;
	var AREAY = 600;
	var COLORS_APPROACH = "random"; // fix, random, gradient
	var PARAM1 = "gender";
	var PARAM2 = "mood";
	var AREA_TITLE = "";

///////////////////////////////////////////////////////////////////
// FIELDS CONFIGURATIONS:
//
// -> the index are the machine-names for each field (only alphanumeric characters)/ Also used in var DATA
// -> human : human name for the field
// -> filter: 0 no eligible for filtering | 1 eligible for filtering
//

	var FIELDS = [
		{
			"id": 
				{ human: "ID", filter: "0"},
			"mood": 
				{ human: "Mood", filter: "1"},
			"gender": 
				{ human: "Gender", filter: "1"},
			"name": 
				{ human: "Name", filter: "1"}
		}
	];

// NOTE: could be interesting when data is big, to use short index names, f.e. 0, 1, 2, 3, 4...

///////////////////////////////////////////////////////////////////
// DATA
//
	var DATA = [
		{"id": 0, "mood": "1good", "gender": "male", "name": "joan"},
		{"id": 1, "mood": "good", "gender": "female", "name": "pep"},
		{"id": 2, "mood": "0good", "gender": "male", "name": "maria"},
		{"id": 3, "mood": "xgood", "gender": "female", "name": "meli"},
		{"id": 4, "mood": "xgood", "gender": "female", "name": "jaume"},
		{"id": 5, "mood": "1good", "gender": "male", "name": "jordi"},
		{"id": 6, "mood": "lgood", "gender": "female", "name": "kiami"},
		{"id": 7, "mood": "lgood", "gender": "female", "name": "lluis"},
		{"id": 8, "mood": "zzgood", "gender": "male", "name": "Laia"},
		{"id": 9, "mood": "zzgood", "gender": "female", "name": "eva"},
		{"id": 10, "mood": "zzgood", "gender": "female", "name": "anna"},
		{"id": 11, "mood": "aagood", "gender": "female", "name": "joan"},
		{"id": 12, "mood": "aagood", "gender": "female", "name": "pep"},
		{"id": 13, "mood": "good", "gender": "male", "name": "maria"},
		{"id": 14, "mood": "good", "gender": "male", "name": "meli"},
		{"id": 15, "mood": "good", "gender": "trans", "name": "jaume ifgc b yb uyb uyb cuyb cuyb uyb uyb uycb uybe uyb \
		cuygb uyb uybe ucyg uyebg uybge yub uye bbeg yueb guy gubg uyb uyf uybf uy buyfuyvfuyfvb uy fufhjfuyvf uyvbfubf \
		jbf jbf uyk fuybvf uyabf iabfiuhb iu hfiagbf yuag vuyfvgifbgiufb iuf bygfuygfihoiusghsoibh oiuh iusdb u"},
		{"id": 16, "mood": "good", "gender": "male", "name": "jordi"},
		{"id": 17, "mood": "dunno", "gender": "male", "name": "kiami"},
		{"id": 18, "mood": "good", "gender": "male", "name": "lluis"},
		{"id": 19, "mood": "dunno", "gender": "female", "name": "Laia"},
		{"id": 20, "mood": "good", "gender": "male", "name": "eva"},
		{"id": 21, "mood": "dunno", "gender": "male", "name": "anna"},
		{"id": 22, "mood": "good", "gender": "male", "name": "joan"},
		{"id": 23, "mood": "dunno", "gender": "female", "name": "pep"},
		{"id": 24, "mood": "dunno", "gender": "male", "name": "maria"},
		{"id": 25, "mood": "dunno", "gender": "male", "name": "meli"},
		{"id": 26, "mood": "dunno", "gender": "male", "name": "jaume"},
		{"id": 27, "mood": "dunno", "gender": "female", "name": "jordi"},
		{"id": 28, "mood": "bad", "gender": "male", "name": "kiami"},
		{"id": 29, "mood": "dunno", "gender": "male", "name": "lluis"},
		{"id": 30, "mood": "bad", "gender": "male", "name": "Laia"},
		{"id": 31, "mood": "bad", "gender": "female", "name": "eva"},
		{"id": 32, "mood": "dunno", "gender": "male", "name": "anna"},
		{"id": 33, "mood": "bad", "gender": "female", "name": "joan"},
		{"id": 34, "mood": "bad", "gender": "male", "name": "pep"},
		{"id": 35, "mood": "dunno", "gender": "male", "name": "maria"},
		{"id": 36, "mood": "bad", "gender": "male", "name": "meli"},
		{"id": 37, "mood": "bad", "gender": "male", "name": "jaume"},
		{"id": 38, "mood": "bad", "gender": "male", "name": "jordi"},
		{"id": 39, "mood": "bad", "gender": "female", "name": "kiami"},
		{"id": 40, "mood": "bad", "gender": "female", "name": "lluis"},
		{"id": 41, "mood": "bad", "gender": "male", "name": "Laia"},
		{"id": 42, "mood": "bad", "gender": "male", "name": "eva"},
		{"id": 42, "mood": "bad", "gender": "male", "name": "eva"},
		{"id": 43, "mood": "dunno", "gender": "female", "name": "anna"}						
	]
