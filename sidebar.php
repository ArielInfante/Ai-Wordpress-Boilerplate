<?php // Checks if you have a Sidebar so that the content area could stretch 100%

$disableSidebarMain = get_post_meta($post->ID, 'disableSidebarMain', $single = true);
if ($disableSidebarMain !== 'true'): ?>

    <aside id="sidebar-main">
        <?php dynamic_sidebar('sidebar-main'); ?>

        <?php
            if(has_nav_menu('sidebar-menu')) { // Checks to see if you have an sidebar menu
                wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ); // Displays sidebar menu
            }
         ?>
    </aside>

<?php endif; ?>
<!--END: sidebar~main-->