<?php
/**
 *	Tasks Plugin
 *	@package Tasks
 *	@author Liran Tal <liran@enginx.com>
 *	@license GNU General Public License (GPL) version 2
 *	@copyright (c) Liran Tal of Enginx 2009
 *	@link http://www.enginx.com
 **/
 
global $CONFIG;

/**
 * Tasks page handler
 *
 * @param array $page Array of page elements, forwarded by the page handling mechanism
 */
function area_page_handler($page) {
	global $CONFIG;
	
	include(dirname(__FILE__) . "/index.php");
	
	return true;
}

function area_init() {
	global $CONFIG;
	// register a page handler for the /pg/ urls
	register_page_handler('area','area_page_handler');

	if (isloggedin())
		add_menu(elgg_echo('area:area'), $CONFIG->wwwroot . "pg/area/" . $_SESSION['user']->username);
}

function area_pagesetup() {
    global $CONFIG;
    // Group submenu
//    $page_owner = page_owner_entity();
//    if ($page_owner instanceof ElggGroup && get_context() == 'groups') {
//        if($page_owner->tasks_enable != "no"){
//            add_submenu_item(sprintf(elgg_echo("group:task"),$page_owner->name), $CONFIG->wwwroot . "pg/tasks/" . $page_owner->username );
//        }
//    }
}

// plugin init hook
register_elgg_event_handler('init','system','area_init');
register_elgg_event_handler('pagesetup','system','area_pagesetup');

?>
