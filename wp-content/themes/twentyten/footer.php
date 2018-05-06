<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

	<div role="contentinfo" class="footer">
			<div class="wrapper footer__container">
				<div class="footer__copy">© 1998-2018 Salesforce.by. Все права защищены.</div>
				<div class="footer__social">
					<a href="/"><div class="icon_social icon-facebook-1"></div></a>
					<a href="/"><div class="icon_social icon-twitter-bird"></div></a>
					<a href="/"><div class="icon_social icon-instagram"></div></a>
				</div>			
			</div>
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/*
	 * Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
