<?php // Checks if you have a Sidebar so that the content area could stretch 100%

$disableSidebarMain = get_post_meta($post->ID, 'disableSidebarMain', $single = true);
if ($disableSidebarMain !== 'true'): ?>

    <aside id="main-sidebar" class="col-2-8">
        <?php
            $mainSidebar = 'main-sidebar';
            dynamic_sidebar($mainSidebar);

            if(has_nav_menu('sidebar')) { // Checks to see if you have an sidebar menu
                wp_nav_menu( array( 'theme_location' => 'sidebar' ); // Displays sidebar menu
            }
         ?>
    </aside>

<?php endif; ?>
<!--END: sidebar~main-->