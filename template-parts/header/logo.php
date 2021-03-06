<?php
/**
 * Header logo.
 *
 * @package renome
 */

?>

<?php if ( is_front_page() ) : ?>
	<h1 class="header__logo">
		<img class="header__logo-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
		<span class="header__logo-text"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
	</h1><!-- .header__logo -->
<?php else : ?>
	<a href="<?php echo esc_url( home_url() ); ?>" class="header__logo">
		<img class="header__logo-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
		<img class="header__logo-img_alt" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-alt.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
	</a><!-- .header__logo -->
<?php endif; ?>
