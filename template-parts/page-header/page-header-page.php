<?php
/**
 * Template part for displaying inner page header.
 *
 * @package renome
 */

if ( function_exists( 'fw_get_db_post_option' ) ) {
	$page_subtitle = fw_get_db_post_option( get_the_ID(), 'page-subtitle' );

	$header_image = fw_get_db_post_option( get_the_ID(), 'header-image' );
	if ( $header_image ) {
		$header_style = "background-image: url({$header_image['url']});";
	}
}
?>

<div class="page-header" style="<?php echo esc_attr( $header_style ); ?>">
	<div class="page-header__inner">
		<div class="heading-group heading-group_lvl_1 page-header__title">
			<h1 class="heading-group__title"><?php echo esc_html( get_the_title() ); ?></h1>
			<p class="heading-group__subtitle"><?php echo esc_html( $page_subtitle ); ?></p>
		</div><!-- .heading-group -->
	</div><!-- .page-header__inner -->
</div><!-- .page-header -->
