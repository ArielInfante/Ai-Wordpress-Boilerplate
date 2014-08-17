<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://ogp.me/ns#">

<head>

	<meta charset="<?php bloginfo( 'charset' ); // lets you change the charset from within wp, defaults to UTF8 ?>" />

	<!--Forces latest IE rendering engine & chrome frame-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<!-- title & meta handled by the yoast plugin, don't add your own here just activate the plugin -->

	<title><?php wp_title(''); ?></title>

	<!-- Other link Tags -->
	<link rel="copyright" href="#copyright" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); // wp_head hook for Plugins ~ always keep this just before the /head tag ?>
</head>

<!--see http://www.mimoymima.com/2010/03/lab/wordpress-body-tag/-->
<body id="<?php $post_parent = get_post($post->post_parent);
				$parentSlug = $post_parent->post_name;
				if (is_page('blog')) { echo "blog-template"; }
				elseif (is_category()) { echo "category-template"; }
				elseif (is_archive()) { echo "archive-template"; }
				elseif (is_search()) { echo "search-results"; }
				elseif (is_single()) { echo "single-template"; }
				elseif (is_tag()) { echo "tag-template"; }
				else { echo $parentSlug; } ?>"

				class="<?php global $wp_query; $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true ); $tn = str_replace(".php", "", $template_name); echo "template-".$tn." "; ?>
				<?php
					if (is_category()) { echo 'category'; }
					elseif (is_search()) { echo 'search'; }
					elseif (is_tag()) { echo "tag"; }
					elseif (is_home()) { echo "home"; }
					elseif (is_404()) { echo "page404"; }
					else { echo $post->post_name; }
				?>">

	<!--BEGIN: page-wrapper-->
	<div id="page-wrapper" class="group">

		<header id="header-wrapper" class="group" role="banner">

			<h1 id="site-title"><a href="/"><?php bloginfo('name'); ?></a></h1>
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>

			<?php
				if(has_nav_menu('header')) { // Checks to see if you have an header menu
					wp_nav_menu( array( 'theme_location' => 'header' ) ); // Displays header menu
				}
			?>
		</header>

		<div id="body-wrapper" class="group">
			<div class="grid group">
