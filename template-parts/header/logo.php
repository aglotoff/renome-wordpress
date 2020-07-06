<?php
/**
 * Header logo.
 *
 * @package renome
 */

?>

<h1 class="header__logo">
	<img class="header__logo-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
	<span class="header__logo-text"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
</h1>
