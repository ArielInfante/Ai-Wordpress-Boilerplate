<?php
	// store a few user agent variables
	$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://ogp.me/ns#">

<head>

	<meta charset="<?php bloginfo( 'charset' ); // lets you change the charset from within wp, defaults to UTF8 ?>" />

	<!--Forces latest IE rendering engine & chrome frame-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<!-- title & meta handled by the yoast plugin, don't add your own here just activate the plugin -->

	<title><?php wp_title(''); ?></title>

	<!-- favicon & other link Tags -->
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="icon" type="image/png" href="/favicon.ico" />
	<link rel="apple-touch-icon" href="/images/custom_icon.png"/><!-- 114x114 icon for iphones and ipads -->
	<link rel="copyright" href="#copyright" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- BEGIN: IE Specific Hacks -->
	<!--[if IE 8]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie8.css" media="screen" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie7.css" media="screen" /><![endif]-->
	<!--END: IE Specific Hacks-->

	<!--REMOVE this viewport code if you are making a site that is NOT responsive-->
	<?php if ($iphone == true || $android == true || $ipad == true) : ?>
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
	<?php endif; ?>
 	<!--REMOVE this viewport code if you are making a site that is NOT responsive-->

	<?php wp_head(); // wp_head hook for Plugins ~ always keep this just before the /head tag ?>
</head>

<!--see http://www.mimoymima.com/2010/03/lab/wordpress-body-tag/-->
<body id="<?php $post_parent = get_post($post->post_parent); $parentSlug = $post_parent->post_name; if (is_category()) { echo "category-template"; } elseif (is_archive()) { echo "archive-template"; } elseif (is_search()) { echo "search-results"; } elseif (is_single()) { echo "single-template"; } elseif (is_tag()) { echo "tag-template"; } else { echo $parentSlug; } ?>" class="<?php global $wp_query; $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true ); $tn = str_replace(".php", "", $template_name); echo "template-".$tn." "; ?><?php if (is_category()) { echo 'category'; } elseif (is_search()) { echo 'search'; } elseif (is_tag()) { echo "tag"; } elseif (is_home()) { echo "home"; } elseif (is_404()) { echo "page404"; } else { echo $post->post_name; } ?>">

	<!--BEGIN: page~wrapper-->
	<div id="page-wrapper" class="group">

		<header id="header-wrapper" role="banner">

			<h1 id="site-title"><a href="/"><?php bloginfo('name'); ?></a></h1>
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>

			<nav id="main-nav" role="navigation">
				<?php
					if(has_nav_menu('header-menu')) { // Checks to see if you have an header menu
						wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); // Displays header menu
					}
				?>
			</nav>
		</header>

		<?php // Checks if you have a Sidebar so that the content area could stretch 100%
			$disableSidebarMain = get_post_meta($post->ID, 'disableSidebarMain', $single = true);
			if ($disableSidebarMain !== 'true') {
				$fullwidth = '';
			} else {
				$fullwidth = ' full';
			}
		?>

		<div id="body-wrapper" class="group<?php echo $fullwidth; // Adds full width to the body-wrapper when there are is no sidebar ?>">

