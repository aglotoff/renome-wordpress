<?php
/**
 * Default view file for the Page Section shortcode.
 *
 * @package renome
 */

// Determine element class names based on selected options.

$section_class = 'section';
if ( 'images-right' === $atts['layout'] ) {
	$section_class .= ' section_reverse';
}

$img_group_class = 'img-group';
if ( ! empty( $atts['image_order'] ) ) {
	$img_group_class .= ' img-group_order_' . $atts['image_order'];
}
$img_group_class .= ' section__images';

$img_wrapper_class = 'img-group__wrapper';
if ( 'large' === $atts['image_size'] ) {
	$img_wrapper_class .= ' img-group__wrapper_wide';
}

$picture_factory = new Renome\Picture_Factory(
	// Image sizes.
	array(
		array( 450, 300 ), // Small.
		array( 600, 400 ), // Medium.
		array( 900, 600 ), // Large.
	),
	// Fallback size.
	array( 600, 400 )
);
?>

<section class="<?php echo esc_attr( $section_class ); ?>">
	<div class="section__inner">
		<div class="<?php echo esc_attr( $img_group_class ); ?>">
			<?php foreach ( fw_akg( 'images', $atts, array() ) as $image ) : ?>
				<?php
				$image_id = $image['attachment_id'];

				$image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
				$image_type = get_post_mime_type( $image_id );

				$picture = $picture_factory->create( $image_id );
				?>
				<div class="<?php echo esc_attr( $img_wrapper_class ); ?>">
					<picture>
						<source srcset="<?php echo esc_attr( $picture->get_srcset() ); ?>" sizes="(min-width: 470px) 450px, calc(100vh - 20px)" types="<?php echo esc_attr( $image_attr ); ?>" />
						<img src="<?php echo esc_url( $picture->get_src() ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" />
					</picture>
				</div><!-- .img-group__wrapper -->
			<?php endforeach; ?>
		</div><!-- .img-group -->

		<div class="section__content">
			<h2 class="heading-group heading-group_lvl_2">
				<span class="heading-group__title"><?php echo esc_html( $atts['title'] ); ?></span>
				<span class="heading-group__subtitle"><?php echo esc_html( $atts['subtitle'] ); ?></span>
			</h2><!-- .heading-group -->

			<div class="rich-text section__text">
				<?php echo wp_kses( $atts['text'], 'post' ); ?>
			</div><!-- .section__text -->

			<?php if ( $atts['link'] ) : ?>
				<a class="section__read-more" href="<?php echo esc_url( $atts['link'] ); ?>" aria-label="<?php echo esc_attr( __( 'Read More', 'renome' ) ); ?>">...</a>
			<?php endif; ?>
		</div><!-- .section__content -->
	</div><!-- .section__inner -->
</section><!-- .section -->
