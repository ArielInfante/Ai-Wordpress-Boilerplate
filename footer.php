</div>
<!-- END: body-wrapper started in header.php-->

<!--BEGIN: Footer Section-->
<footer id="footer-wrapper" class="group">

	<!--BEGIN: Footer Nav-->
	<nav role="navigation">
		<?php
			if(has_nav_menu('footer')) { // Checks to see if you have created a footer menu
				wp_nav_menu( array( 'theme_location' => 'footer' )); // Displays the footer menu
			}
		?>
	</nav>
	<!--END: Footer Nav-->

	<!--BEGIN: Optional Contact Info using microformats: http://microformats.org/-->
	<!--dl class="vcard">
		<dt class="org fn">OrgName or Full Name of person - remove one or the other class</dt>
		<dd class="adr">
			<span class="street-address"></span>
			<span class="locality">City</span>
			<span class="region">State</span>
			<span class="postal-code">xxxxx</span>
		</dd>
		<dd class="tel"></dd>
		<dd class="tel"></dd>
		<dd class="email"><a href="mailto:"></a></dd>
		<dd class="fax"></dd>
	</dl-->
	<!--END: Contact Info-->

	<p id="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name')?></p>

	<!-- wp_footer hook for Plugins -->
	<?php wp_footer(); ?>

</footer>
<!--END: Footer Section-->

</div>
<!--END: page-wrapper started in header.php-->

</body>
</html>