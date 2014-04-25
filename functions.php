<?php
/*************************************************
*
*      Extends functions.php to checks which browser is currently being used
*      If you do not want this function you could delete the line and also the files with 'browser-detection'
*
*************************************************/
require_once('includes/php-browser-detection.php');

// Hide Admin Bar(During Development)
show_admin_bar( false );

/*
COMMENT FUNCTIONS:
we usually use LiveFyre, Disqus, or Intense Debate for comments
If you're making a site that requires a totally custom comments area,
check this tutorial which has a bunch of functions to customize comments:
http://code.tutsplus.com/articles/customizing-comments-in-wordpress-functionality-and-appearance--wp-26128
*/

/***********************************
*
* Make theme available for translation - Translations can be filed in the /languages/ directory
*
***********************************/
function the_language_setup() {
    load_theme_textdomain( 'themename', get_template_directory() . '/languages' );

    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if ( is_readable( $locale_file ) )
        require_once( $locale_file );
}
add_action('after_setup_theme', 'the_language_setup');

/**********************************
*
*       Register Menus - If you want more menus just keep adding under Other Menu with same format
*       Default values for Menus - replacing div container with nav
*
***********************************/
function register_the_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ), // In header.php
            'footer-menu' => __( 'Footer Menu' ), // In footer.php
            'sidebar-menu' => __( 'Sidebar Menu' ), // In sidebar.php
            'utility-menu' => __( 'Utility Menu' ) // Place wp_nav_menu in location of choice
        )
    );
}
add_action( 'init', 'register_the_menus');

$defaultArgs = array(
    'theme_location' => '',
    'menu' => '',
    'menu_class' => 'menu',
    'menu_id' => '',
    'container' => 'nav',
    'container_class' => '',
    'container_id' => '',
    'echo' => 'true',
    'fallback_cb' => 'wp_page_menu',
    'before' => '',
    'after' => '',
    'Link_before' => '',
    'link_after' => '',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth' => '0',
    'walker' => ''
);

// Activates menu features
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

// Activates Featured Image function
add_theme_support( 'post-thumbnails' );

// Removes the automatic paragraph tags from the excerpt, we leave it on for the content and have a custom field you can use to turn it off on a page by page basis --> wpautop = false
remove_filter('the_excerpt', 'wpautop');

// Used to create custom length excerpts
function get_the_custom_excerpt($length){
	return substr( get_the_excerpt(), 0, strrpos( substr( get_the_excerpt(), 0, $length), ' ' ) ).'...';
}

/*************************************************
*
*      Dynamic Sidebar making it 'divs' instead the standard 'list items'
*
*************************************************/
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'id' => 'main-sidebar',
        'name' => 'Main Sidebar',
        'description' => 'The First Sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgetTitle">',
        'after_title' => '</h4>',
    ));

    // // if you want to add more just keep adding them like this:
    // register_sidebar(array(
    //     'id' => 'footer-sidebar',
    //     'name' => 'Footer Sidebar',
    //     'description' => 'Footer sidebar',
    //     'before_widget' => '<div id="%1$s" class="widget %2$s">',
    //     'after_widget' => '</div>',
    //     'before_title' => '<h4 class="widgettitle">',
    //     'after_title' => '</h4>',
    // ));
}

// Custom 'more' link format
function new_more_excerpt($more) {
    global $post;

    return '...<br /><br /><a href="' . get_permalink($post->ID) . '" class="read-more">read more</a>';

}
add_filter('excerpt_more', 'new_more_excerpt');

// This function is used to get the slug of the page
function get_the_slug() {
	global $post;
	if ( is_single() || is_page() ) {
		return $post->post_name;
	} else {
		return "";
	}
}

// Adds RSS Feed Links for Posts and Comments
add_theme_support('automatic-feed-links');

/*************************************************
*
*      Defines The Content Width
*
*************************************************/
if(!isset($content_width))
    $content_width = 1024;

/*************************************************
*
*      Adds a backup title to the website if no title is entered
*
*************************************************/
function backup_title() {}
add_filter('wp_title', 'backup_title');
/*************************************************
*
*      Adds Google Analytics to the theme at the footer
*
*************************************************/
function add_google_analytics() { ?>
    <!-- Insert the Google code here -->
<?php }
add_action('wp_footer', 'add_google_analytics');

/*************************************************
*
*      Adds the viewport Meta tag to the website
*
*************************************************/
function add_viewport() {
    if(is_mobile() || is_android() || is_iphone() || is_ipad() || is_ipod()) {
        echo '<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />';
    }
}
add_action('wp_head', 'add_viewport');

/*************************************************
*
*      Adds the Custom Favicon to the website
*
*************************************************/
function the_favicon() {
    if(is_iphone() || is_ipad() || is_ipod()) {
        //For rounded corners and reflective shine in Apple devices
        echo '<link rel="apple-touch-icon" type="image/png" href="' . get_template_directory_uri() . '/favicon/favicon-reflective.png" />';
        //Recommended basic size for Apple devices is 57x57 with 90 degree corners. Higher resolution is 114x114
        echo '<link rel="apple-touch-icon-precomposed" type="image/png" href="' . get_template_directory_uri() . '/favicon/favicon-no-reflect.png" />';
    }
    if(is_ie() && get_browser_version() >= 9) {
        // This is for Windows 8 which has tiles in the main menu 'TileColor' displays the background of the tile
        echo '<meta name="msapplication-TileColor" content="#ddd">';
        // 'TileImage' is the favicon/image on the tile to display your logo
        echo '<meta name="msapplication-TileImage" content="' . get_template_directory_uri() . '/favicon/tileicon.png">';
        // Display Favicon on the browser tab
        echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_template_directory_uri() . '/favicon/favicon.ico" />';
    } elseif( is_ie() && get_browser_version() <= 8) {
        // Displays the favicon on older IE version without Meta Tags removing Tiles
        echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_template_directory_uri() . '/favicon/favicon.ico" />';
    }
    if(is_firefox() || is_opera() || is_chrome() || is_safari()) {
        // Displays favicon png format with modern browsers
        echo '<link rel="shortcut icon" type="image/png" href="' . get_template_directory_uri() . '/favicon/favicon.png" />';
    } else {
        // Fallback to any other browser
        echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_template_directory_uri() . '/favicon/favicon.ico" />';
    }
}
add_action('wp_head', 'the_favicon');

/*************************************************
*
*      LOAD CSS FILES/ENQUEUE SCRIPT METHOD
*
*************************************************/
function enqueue_css_sheets() {
    wp_register_style('aireset', get_stylesheet_directory_uri() . '/css/aireset.min.css', 'style');
    wp_register_style('aigrid', get_stylesheet_directory_uri() . '/css/aigrid.css', 'style');
    wp_enqueue_style('aireset');
    wp_enqueue_style('aigrid');

    if(is_ie(7)) {
        wp_register_style('ie7', get_stylesheet_directory_uri() . '/css/ie7.css', 'style');
        wp_enqueue_style('ie7');
    }
    if(is_ie(8)) {
        wp_register_style('ie8', get_stylesheet_directory_uri() . '/css/ie8.css', 'style');
        wp_enqueue_style('ie8');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_css_sheets');

/*************************************************
*
*      LOAD SCRIPT FILES/ENQUEUE SCRIPT METHOD
*
*************************************************/
function enqueue_js_scripts() {
    wp_register_script('mondernizr', get_template_directory_uri() . '/js/modernizr.js', '', '2.7.1', false);
    wp_enqueue_script('modernizr');

    if(!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
        wp_enqueue_script('jquery');
    }

    global $is_IE;
    if($is_IE) {
        wp_register_script('html5shiv', get_template_directory_uri().'/js/html5shiv.min.js');
        wp_enqueue_script('html5shiv');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_js_scripts');

/**********************************
*
*  Replace the default welcome 'Howdy' in the admin bar with something more professional.
*
***********************************/
function admin_bar_replace_howdy($wp_admin_bar) {
    $account = $wp_admin_bar->get_node('my-account');
    $replace = str_replace('Howdy,', 'Welcome,', $account->title);
    $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}
add_filter('admin_bar_menu', 'admin_bar_replace_howdy', 25);

/*************************************************
*
*      Custom Login Page
*
*************************************************/
// Custom Stylesheet for Login
function custom_login_stylesheet() {
    wp_enqueue_style('login-head', 'css/login.css', false);
}
add_action('login_enqueue_scripts', 'custom_login_stylesheet');

// Change Login Logo URL
function the_login_logo_url() {
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'the_login_logo_url');

function the_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter('login_headertitle', 'the_login_logo_url_title');

// Remove Lost Password Link
function remove_lost_password_text($text) {
    if($text == 'Lost your password?'){ $text = ''; }
    return $text;
}
add_filter('gettext', 'remove_lost_password_text');

// Hide Login Error Message
add_filter('login_errors', create_function('$a', "return null;"));

// Remove Login Page Shake
function the_login_head() {
    remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'the_login_head');

// Change Redirect URL
function admin_login_redirect($redirect_to, $request, $user) {
    global $user;

    if(isset($user->roles) && is_array($user->roles)) {
        if(in_array("administrator", $user->roles)) {
            return $redirect_to;
        } else {
            return home_url();
        }
    } else {
        return $redirect_to;
    }
}
add_filter('login_redirect', 'admin_login_redirect', 10, 3);

/*************************************************
*
*      Customizable Logo on Top of Dashboard Page
*
*************************************************/
function the_custom_logo() {
    echo '<style type="text/css">#header-logo{background-image:url('.get_template_directory_uri().'/images/favicon/Name of file !important;}</style>';
}

/*************************************************
*
*      Highly Customizable How Wordpress Works - Removes unused dashboard widgets and others
*      Uncomment the line below to enable remove.php - please know what you are doing by enabling it.
*      If it is to complex you could use a plugin such as Adminimize or AG Custom Admin for simlar experience
*
*************************************************/
//require_once('includes/remove.php');

?>