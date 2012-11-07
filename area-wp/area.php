<?php
/*
Plugin Name: Area
Plugin URI: http://nualart.com/area
Description: AREA is a visualization tool that allows friendly-graphical browsing of post and pages and creation of intuitive representations.
Version: 1.0
Author: Jaume Nualart
Author URI: http://nualart.cat
License: GPL2

Copyright 2011  Jaume Nualart i Vilaplana  (email : jaume@nualart.cat)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!function_exists('area_main')) {
	function area_main()  {
		echo "<p>AREA is HERE!!!</p>";
	}
}

//add_action ( 'loop_start', 'area_main', 10, 0);

add_filter ( 'the_content', 'area_main');


### ADMIN

add_action('admin_menu', 'area_admin_menu');
add_action( 'admin_init', 'register_area_settings' );


function area_admin_menu() {
  add_options_page('AREA Options', 'AREA', 8, 'area', 'area_admin_options');
}

function register_area_settings() { // whitelist options
  register_setting( 'area-group', 'new_option_name' );
  register_setting( 'area-group', 'some_other_option' );
}

function area_admin_options() {
  echo '<div class="wrap">';
  echo '<h2>AREA Plugin</h2>';
  echo '<p>Here is where the form would go if I actually had options.</p>';
  echo '<form method="post" action="options.php">';
  wp_nonce_field('update-options');
  echo '
	<table class="form-table">
	<tr valign="top">
	<th scope="row">New Option Name</th>
	<td>
		<input type="text" name="area_option" value="'.get_option('area_option').'" />
	</td>
	</tr>
		<input type="text" name="new_option_name" value="'.get_option('area_option').'" />
	</table>';
	settings_fields( 'area-group' );
  echo '<p class="submit">
	<input type="submit" class="button-primary" value=".';
	_e('Save Changes');
	echo '" />
	</p>
	</form>
	<?php echo wp_dropdown_categories(array('hide_empty' => 0, 'name' => 'category_parent', 'orderby' => 'name', 'selected' => $category->parent, 'hierarchical' => true, 'show_option_none' => __('None'))); ?>
	</div>';
}


?>
