<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content tag and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package renome
 */

?>
	</main><!-- #content -->

	<footer class="footer" id="colophon">
		<div class="footer__inner">
			<?php get_template_part( 'template-parts/footer/social' ); ?>
			<?php get_template_part( 'template-parts/footer/logo' ); ?>
			<?php get_template_part( 'template-parts/footer/copyright' ); ?>
		</div><!-- .footer__inner -->
	</footer><!-- #colophon -->

	<?php wp_footer(); ?>
</body>
</html>
