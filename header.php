<?php
/**
 * The header for the Renome theme
 *
 * This is the template that displays all of the <head> section and everything
 * up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package renome
 */

$header_class = 'header';

if ( is_admin_bar_showing() ) {
	$header_class .= ' header_after-admin-bar';
}

if ( ! is_front_page() ) {
	$header_class .= ' header_transparent';
}

$header_class .= ' page__header';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body class="page">
	<a class="skip-link page__skip-link" href="#content">
		<?php esc_html_e( 'Skip to content', 'renome' ); ?>
	</a>

	<header class="<?php echo esc_attr( $header_class ); ?>" id="masthead">
		<div class="header__inner">
			<?php get_template_part( 'template-parts/header/logo' ); ?>
			<?php get_template_part( 'template-parts/header/nav' ); ?>
			<?php get_template_part( 'template-parts/header/actions' ); ?>
		</div>

		<?php get_template_part( 'template-parts/search/search', 'desktop' ); ?>
	</header>
