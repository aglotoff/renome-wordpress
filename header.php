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

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>
<body class="page">
	<a class="skip-link page__skip-link" href="#content">Skip to content</a>

	<header class="header page__header" id="masthead">
		<div class="header__inner">
			<?php get_template_part( 'template-parts/header/logo' ); ?>
			<?php get_template_part( 'template-parts/header/nav' ); ?>
			<?php get_template_part( 'template-parts/header/actions' ); ?>
		</div>

		<?php get_template_part( 'template-parts/search/search', 'desktop' ); ?>
	</header>
