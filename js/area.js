function validate_construct1 (form) {
    var alertstr = '';
    var invalid  = 0;

    // param1: select list, always assume it's multiple to get all values
    var param1 = null;
    var selected_param1 = 0;
    for (var loop = 0; loop < form.elements['param1'].options.length; loop++) {
        if (form.elements['param1'].options[loop].selected) {
            param1 = form.elements['param1'].options[loop].value;
            selected_param1++;
            if (param1 == null || param1 === "") {
                alertstr += '- Select an option from the "Param1" list\n';
                invalid++;
            }
        } // if
    } // for param1
    if (! selected_param1) {
        alertstr += '- Select an option from the "Param1" list\n';
        invalid++;
    }

    // param2: select list, always assume it's multiple to get all values
    var param2 = null;
    var selected_param2 = 0;
    for (var loop = 0; loop < form.elements['param2'].options.length; loop++) {
        if (form.elements['param2'].options[loop].selected) {
            param2 = form.elements['param2'].options[loop].value;
            selected_param2++;
            if (param2 == null || param2 === "") {
                alertstr += '- Select an option from the "Param2" list\n';
                invalid++;
            }
        } // if
    } // for param2
    if (! selected_param2) {
        alertstr += '- Select an option from the "Param2" list\n';
        invalid++;
    }

    if (invalid > 0 || alertstr != '') {
        if (! invalid) invalid = 'The following';   // catch for programmer error
        alert(''+invalid+' error(s) were encountered with your submission:'+'\n\n'
                +alertstr+'\n'+'Please correct these fields and try again.');
        // reset counters
        alertstr = '';
        invalid  = 0;
        return false;
    }
    return true;  // all checked ok
}

function checkAll(checkname, exby) {
	for (i = 0; i < checkname.length; i++)
		checkname[i].checked = exby.checked? true:false
}

function uncheckAll(checkname, exby) {
	for (i = 0; i < checkname.length; i++)
		checkname[i].checked = exby.checked? false:true
}

function validate_construct2 (form) {
    var alertstr = '';
    var invalid  = 0;

    // panelx: standard text, hidden, password, or textarea box
    var panelx = form.elements['panelx'].value;
    if (panelx == null || panelx === "") {
        alertstr += '- Invalid entry for the "Panelx" field\n';
        invalid++;
    }
    // panely: standard text, hidden, password, or textarea box
    var panely = form.elements['panely'].value;
    if (panely == null || panely === "") {
        alertstr += '- Invalid entry for the "Panely" field\n';
        invalid++;
    }
    // quantum: radio group or multiple checkboxes
    var quantum = null;
    var selected_quantum = 0;
    for (var loop = 0; loop < form.elements['quantum'].length; loop++) {
        if (form.elements['quantum'][loop].checked) {
            quantum = form.elements['quantum'][loop].value;
            selected_quantum++;
            if (quantum == null || quantum === "") {
                alertstr += '- Choose one of the "Node size" options\n';
                invalid++;
            }
        } // if
    } // for quantum
    if (! selected_quantum) {
        alertstr += '- Choose one of the "Node size" options\n';
        invalid++;
    }

    // block_selected: radio group or multiple checkboxes
    var block_selected = null;
    var selected_block_selected = 0;
    for (var loop = 0; loop < form.elements['block_selected'].length; loop++) {
        if (form.elements['block_selected'][loop].checked) {
            block_selected = form.elements['block_selected'][loop].value;
            selected_block_selected++;
            if (block_selected == null || block_selected === "") {
                alertstr += '- Check one or more of the "Blocks: Any<br />" options\n';
                invalid++;
            }
        } // if
    } // for block_selected
    if (! selected_block_selected) {
        alertstr += '- Check one or more of the "Blocks: Any<br />" options\n';
        invalid++;
    }

    // color_selected: radio group or multiple checkboxes
    var color_selected = null;
    var selected_color_selected = 0;
    for (var loop = 0; loop < form.elements['color_selected'].length; loop++) {
        if (form.elements['color_selected'][loop].checked) {
            color_selected = form.elements['color_selected'][loop].value;
            selected_color_selected++;
            if (color_selected == null || color_selected === "") {
                alertstr += '- Check one or more of the "Colors: Armes<br />" options\n';
                invalid++;
            }
        } // if
    } // for color_selected
    if (! selected_color_selected) {
        alertstr += '- Check one or more of the "Colors: Armes<br />" options\n';
        invalid++;
    }

    if (invalid > 0 || alertstr != '') {
        if (! invalid) invalid = 'The following';   // catch for programmer error
        alert(''+invalid+' error(s) were encountered with your submission:'+'\n\n'
                +alertstr+'\n'+'Please correct these fields and try again.');
        // reset counters
        alertstr = '';
        invalid  = 0;
        return false;
    }
    return true;  // all checked ok
}

function area_info(id, data) {
	new Ajax.Updater('node_info', 'lib/node_info.php?id=' + id + '&data=' + data, { method: 'get' });
}

function hidediv(divid) {
	if (divid==null) { divid='hideShow'; } 

	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById(divid).style.visibility = 'hidden';
	} else {
		if (document.layers) { // Netscape 4
			document.hideShow.visibility = 'hidden';
		} else { // IE 4
		document.all.hideShow.style.visibility = 'hidden';
		}
	}
}

function showdiv(divid) {
	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById(divid).style.visibility = 'visible';
	} else {
		if (document.layers) { // Netscape 4
			document.hideShow.visibility = 'visible';
		} else { // IE 4
			document.all.hideShow.style.visibility = 'visible';
		}
	}
}
function area_tabs() {
	new Control.Tabs('area_tabs'); 
}
