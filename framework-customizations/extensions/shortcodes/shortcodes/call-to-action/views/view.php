<?php
/**
 * Default view file for the Call to Action shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#default-view-file
 *
 * @package renome
 */

?>
<div class="cta" style="background-image: url(<?php echo esc_url( $atts['image']['url'] ); ?>);">
	<div class="cta__inner">
		<a class="btn btn_theme_default btn_size_default cta__btn" href="<?php echo esc_url( $atts['btn_link'] ); ?>">
			<?php echo esc_html( $atts['btn_title'] ); ?>
		</a><!-- .cta__btn -->
	</div><!-- .cta__inner -->
</div><!-- .cta -->
