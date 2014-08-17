<?php // to disable this sidebar on a page by page basis just add a custom field to your page or post of disableSidebarMain = true

$mainSidebar = 'main-sidebar';

if (is_active_sidebar($mainSidebar)) { ?>

    <aside id="main-sidebar" class="group col-2-8">

        <?php dynamic_sidebar($mainSidebar); ?>

        <?php
            if(has_nav_menu('sidebar')) { // Checks to see if you have an sidebar menu
                wp_nav_menu( array( 'theme_location' => 'sidebar' ) ); // Displays sidebar menu
            }
        ?>
    </aside>

<?php } ?>
<!--END: sidebar~main-->