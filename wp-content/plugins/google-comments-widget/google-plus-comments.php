<?php 
/*
Plugin Name: Google+ Comments Widget
Plugin URI: http://www.skipser.com/test/google-comments-widget/
Description: Adds google+ contact badge widget to your blog
Version: 1.0.1
Author: Arun
Author URI: http://www.skipser.com
License: GPL3
*/

/*  
* 	Copyright (C) 2011  Skipser
*	http://skipser.com
*	http://www.skipser.com/test/google-comments-widget/
*
*	This program is free software: you can redistribute it and/or modify
*	it under the terms of the GNU General Public License as published by
*	the Free Software Foundation, either version 3 of the License, or
*	(at your option) any later version.
*
*	This program is distributed in the hope that it will be useful,
*	but WITHOUT ANY WARRANTY; without even the implied warranty of
*	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*	GNU General Public License for more details.
*
*	You should have received a copy of the GNU General Public License
*	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/********************************************************************/
/*                                                                  */
/*                         Global variables                         */
/*                                                                  */
/********************************************************************/
$WIDTH=500;

/********************************************************************/
/*                                                                  */
/*            Do not change anything below this.                    */
/*                                                                  */
/********************************************************************/

define( 'GPLUSCOMMENTS_CURRENT_VERSION', '1.0.1' );
define( 'GPLUSCOMMENTS_DEBUG', false);

//Set Defaults.
if(get_option('GOOGLEPLUSCOMMENTS-WIDTH')=== false) {
	update_option( 'GOOGLEPLUSCOMMENTS-WIDTH', 500 );
}
if(get_option('GOOGLEPLUSCOMMENTS-CREDITS')=== false) {
	update_option( 'GOOGLEPLUSCOMMENTS-CREDITS', 0 );
}
if(get_option('GOOGLEPLUSCOMMENTS-DYNAMICWIDTH')=== false) {
	update_option( 'GOOGLEPLUSCOMMENTS-DYNAMICWIDTH', 1 );
}
if(get_option('GOOGLEPLUSCOMMENTS-HIDECOMMENTS')=== false) {
	update_option( 'GOOGLEPLUSCOMMENTS-HIDECOMMENTS', 0 );
}
if(get_option('GOOGLEPLUSCOMMENTS-RETAINOLDCOMMENTS')=== false) {
	update_option( 'GOOGLEPLUSCOMMENTS-RETAINOLDCOMMENTS', 1 );
}

function gplus_comments_template($value) {
    return dirname(__FILE__) . '/comments.php';
}
add_filter('comments_template', 'gplus_comments_template');

function gplus_pre_comment_on_post($comment_post_ID) {
	wp_die( dsq_i('Sorry, the built-in commenting system is disabled because Gogole+ Commenting is active.') );
}
add_action('pre_comment_on_post', 'gplus_pre_comment_on_post');


function gplus_plugin_action_links($links, $file) {
    $plugin_file = basename(__FILE__);
    if (basename($file) == $plugin_file) {
           $settings_link = '<a href="edit-comments.php?page=googlepluscomments">Configure</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
add_filter('plugin_action_links', 'gplus_plugin_action_links', 10, 2);


function gplus_add_pages() {
     add_submenu_page(
         'edit-comments.php',
         'Google+ Comments',
         'Google+ Comments',
         'moderate_comments',
         'googlepluscomments',
         'googlepluscomments_manage'
     );
}
add_action('admin_menu', 'gplus_add_pages', 10);

function googlepluscomments_manage() {
	include_once(dirname(__FILE__) . '/manage.php');
}

// a little jQuery goodness to get comments menu working as desired
function gplus_menu_admin_head() {
?>
<script type="text/javascript">
jQuery(function($) {
    // fix menu
    var mc = $('#menu-comments');
    mc.find('a.wp-has-submenu').attr('href', 'edit-comments.php?page=googlepluscomments').end().find('.wp-submenu  li:has(a[href="edit-comments.php?page=googlepluscomments"])').prependTo(mc.find('.wp-submenu ul'));
    // fix admin bar
    $('#wp-admin-bar-comments').find('a.ab-item').attr('href', 'edit-comments.php?page=googlepluscomments');
});
</script>
<?php }
add_action('admin_head', 'gplus_menu_admin_head');
?>
