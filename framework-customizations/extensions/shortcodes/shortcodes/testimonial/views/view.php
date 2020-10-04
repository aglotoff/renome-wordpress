<?php
/**
 * Default view file for the Testimonial shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#default-view-file
 *
 * @package renome
 */

$section_class = 'testimonial';
if ( 'image-right' === $atts['layout'] ) {
	$section_class .= ' testimonial_reverse';
}

$picture_factory = new Renome\Picture_Factory(
	// Image sizes.
	array(
		array( 360, 480 ), // Small.
		array( 540, 720 ), // Medium.
		array( 720, 960 ), // Large.
	),
	// Fallback size.
	array( 540, 720 )
);
?>

<div class="<?php echo esc_attr( $section_class ); ?>">
	<div class="testimonial__content">
		<div class="testimonial__inner">
			<?php if ( $atts['image'] ) : ?>
				<?php
				$image_id = $atts['image']['attachment_id'];

				$image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
				$image_type = get_post_mime_type( $image_id );

				$picture = $picture_factory->create( $image_id );
				?>
				<div class="testimonial__img-wrapper">
					<picture>
						<source srcset="<?php echo esc_attr( $picture->get_srcset() ); ?>" sizes="360px" type="<?php echo esc_attr( $image_alt ); ?>" />
						<img class="testimonial__img" src="<?php echo esc_attr( $picture->get_src() ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" />
					</picture>
				</div><!-- .testimonial__img-wrapper -->
			<?php endif; ?>

			<blockquote class="testimonial__quote">
				<p class="testimonial__quote-text"><?php echo esc_html( $atts['quote'] ); ?></p>
				<footer class="testimonial__quote-footer"><cite><?php echo esc_html( $atts['author'] ); ?></cite></footer>
			</blockquote><!-- .testimonial__quote -->
		</div><!-- .testimonial__inner -->
	</div><!-- .testimonial__content -->
</div><!-- .testimonial -->
