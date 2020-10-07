<?php
/**
 * Default view file for the Gallery shortcode.
 *
 * @package renome
 */

$picture_factory = new Renome\Picture_Factory(
	// Image sizes.
	array(
		array( 200, 200 ), // Small.
		array( 300, 300 ), // Medium.
		array( 400, 400 ), // Large.
	),
	// Fallback size.
	array( 300, 300 )
);
?>

<section class="gallery">
	<div class="gallery__inner">
		<h2 class="heading-group heading-group_lvl_2">
			<span class="heading-group__title"><?php echo esc_html( $atts['title'] ); ?></span>
			<span class="heading-group__subtitle"><?php echo esc_html( $atts['subtitle'] ); ?></span>
		</h2><!-- .heading-group -->

		<div class="gallery__wrapper">
			<div class="gallery__grid">
				<?php foreach ( fw_akg( 'images', $atts, array() ) as $image ) : ?>
					<?php
					$image_id = $image['attachment_id'];

					$image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
					$image_type = get_post_mime_type( $image_id );

					$picture = $picture_factory->create( $image_id );
					?>
					<div class="gallery__item">
						<div class="gallery__thumb">
							<picture>
								<source srcset="<?php echo esc_attr( $picture->get_srcset() ); ?>" sizes="200px" types="<?php echo esc_attr( $image_attr ); ?>" />
								<img src="<?php echo esc_url( $picture->get_src() ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="gallery__thumb-img" />
							</picture>

							<a role="button" href="<?php echo esc_url( $image['url'] ); ?>" class="gallery__thumb-link">
								<?php Renome\svg_icon( 'zoom', __( 'Zoom image', 'renome' ) ); ?>
							</a><!-- .gallery__thumb-link -->
						</div><!-- .gallery__thumb -->
					</div><!-- .gallery__item -->
				<?php endforeach; ?>
			</div><!-- .gallery__grid -->
		</div><!-- .gallery__wrapper -->
	</div><!-- .gallery__inner -->
</section><!-- .gallery -->
