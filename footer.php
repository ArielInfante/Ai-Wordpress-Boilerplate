</div>
<!-- END: grid gutter div started in header.php -->
</div>
<!-- END: body-wrapper started in header.php-->

<!--BEGIN: Footer Section-->
<footer id="footer-wrapper" class="group">

	<!--BEGIN: Footer Nav-->
	<?php
		if(has_nav_menu('footer')) { // Checks to see if you have created a footer menu
			wp_nav_menu( array( 'theme_location' => 'footer' )); // Displays the footer menu
		}
	?>
	<!--END: Footer Nav-->

	<p class="copyright">&copy; <?php echo the_time('Y'); ?><a href="/"><?php bloginfo('name'); ?></a></p>

	<!-- wp_footer hook for Plugins -->
	<?php wp_footer(); ?>

</footer>
<!--END: Footer Section-->

</div>
<!--END: page-wrapper started in header.php-->

</body>
</html>