<?php
/**
 *	Tasks Plugin
 *	@package Tasks
 *	@author Liran Tal <liran@enginx.com>
 *	@license GNU General Public License (GPL) version 2
 *	@copyright (c) Liran Tal of Enginx 2009
 *	@link http://www.enginx.com
 **/

$username = get_input('username');
$taskTitle = get_input('taskTitle');
$taskId = get_input('taskId');

if ($taskId && ($myObject = get_entity($taskId)) ) {
	set_page_owner($myObject->container_guid);
	$body = elgg_view('object/viewtask', array('entity' => $myObject, 
													'full' => true)
											);
	$title = $myObject->title;
	
	$layout_canvas = "two_column_left_sidebar";
	$layout_view = elgg_view_layout($layout_canvas, '', $body);
	
	page_draw($title, $layout_view);
			
} else {
	register_error(elgg_echo("tasks:error:objectnotfound"));
	forward();
}


?>
