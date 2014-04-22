<?php
/*************************************************
*
*      Highly Customizable How Wordpress Works - Should not be touched unless with complete knowledge
*
*************************************************/
// Remove Wordpress Version Number
function remove_wordpress_version() {
	return '';
}
add_filter('the_generator', 'remove_wordpress_version');

/**
* Remove code from the <head>
**/
//remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
//remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
//remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_filter( 'the_content', 'capital_P_dangit' ); // Get outta my Wordpress codez dangit!
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

//Remove meta boxes from Post and Page Screens
function customize_meta_boxes() {
    /* These remove meta boxes from POSTS */
  //remove_post_type_support("post","excerpt"); //Remove Excerpt Support
  //remove_post_type_support("post","author"); //Remove Author Support
  //remove_post_type_support("post","revisions"); //Remove Revision Support
  //remove_post_type_support("post","comments"); //Remove Comments Support
  //remove_post_type_support("post","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("post","editor"); //Remove Editor Support
  //remove_post_type_support("post","custom-fields"); //Remove custom-fields Support
  //remove_post_type_support("post","title"); //Remove Title Support


    /* These remove meta boxes from PAGES */
  //remove_post_type_support("page","revisions"); //Remove Revision Support
  //remove_post_type_support("page","comments"); //Remove Comments Support
  //remove_post_type_support("page","author"); //Remove Author Support
  //remove_post_type_support("page","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("page","custom-fields"); //Remove custom-fields Support

}
add_action('admin_init','customize_meta_boxes');

/**
* Remove Left Nav Menu Items
**/
function remove_the_links_menu() {

	global $menu;

	remove_menu_page('upload.php'); // Media
	remove_menu_page('link-manager.php'); // Links
	remove_menu_page('options-general.php'); // Settings
	remove_menu_page('tools.php'); // Tools

}
add_action('admin_menu', 'remove_the_links_menu');

/**
* Remove Nav Sub Menus
**/
function remove_the_submenus() {

	global $submenu;

	unset($submenu['themes.php'][5]); // Removes 'Themes'
	unset($submenu['options-general.php'][15]); // Removes 'Writing'
	unset($submenu['options-general.php'][25]); // Removes 'Discussion'
	unset($submenu['tools.php'][5]); // Removes 'Available Tools'
	unset($submenu['tools.php'][10]); // Removes 'Import'
	unset($submenu['tools.php'][15]); // Removes 'Export'

}
add_action('admin_menu', 'remove_the_submenus');

// Remove Appearance Editor Link
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

// Remove PLugin Editor Link
function remove_the_plugin_editor() {
	remove_submenu_page('plugins.php', 'plugin-editor.php');
}
add_action('admin_init', 'remove_the_plugin_editor');

/**
*	Remove Some Default Widgets
**/
function unregister_the_default_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Custom_Menu');
}
add_action('widgets_init', 'unregister_the_default_widgets', 11);

/**
*	Remove Dashboard Widgets
**/
function remove_the_dashboard_widgets() {

	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
}
add_action('wp_dashboard_setup', 'remove_the_dashboard_widgets', 11);

/**
*	Remove Columns From Posts List
**/
function filter_post_columns($columns) {
	unset($columns['author']);
	unset($columns['tags']);
	unset($columns['categories']);
	unset($columns['tags']);
	return $columns;
}
add_filter('manage_edit-post_columns', 'filter_post_columns', 20, 1);

/**
*	Remove Author Column From Pages List
**/
function filter_pages_columns($columns) {
	unset($columns['author']);
	return $columns;
}
add_filter('manage_pages_columns', 'filter_pages_columns');



?>