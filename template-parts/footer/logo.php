<?php
/**
 * Footer logo.
 *
 * @package renome
 */

?>

<div class="footer__logo-wrap">
	<a href="<?php echo esc_url( home_url() ); ?>" class="footer__logo">
		<img class="footer__logo-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
	</a><!-- .footer__logo -->
</div><!-- .footer__logo-wrap -->
