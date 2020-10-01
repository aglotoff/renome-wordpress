<?php
/**
 * Default view file for the Specials shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#default-view-file
 *
 * @package renome
 */

$slides = fw_akg( 'slides', $atts, array() );

$picture_factory = new Renome\Picture_Factory(
	// Image sizes.
	array(
		array( 600, 400 ),  // Small.
		array( 900, 600 ),  // Medium.
		array( 1200, 800 ), // Large.
	),
	// Fallback size.
	array( 600, 400 )
);

$week_days = array(
	'mon' => __( 'Monday', 'renome' ),
	'tue' => __( 'Tuesday', 'renome' ),
	'wed' => __( 'Wednesday', 'renome' ),
	'thu' => __( 'Thursday', 'renome' ),
	'fri' => __( 'Friday', 'renome' ),
	'sat' => __( 'Saturday', 'renome' ),
	'sun' => __( 'Sunday', 'renome' ),
);
?>

<section class="specials" id="<?php echo esc_attr( $atts['id'] ); ?>">
	<div class="specials__inner">
		<h2 class="heading-group heading-group_lvl_2 specials__heading">
			<span class="heading-group__title"><?php echo esc_html( $atts['title'] ); ?></span>
			<span class="heading-group__subtitle"><?php echo esc_html( $atts['subtitle'] ); ?></span>
		</h2><!-- .heading-group -->

		<?php if ( ! empty( $slides ) ) : ?>
			<div class="specials-slider specials__slider" role="group" aria-roledescription="carousel">
				<div class="specials-slider__inner">
					<div class="specials-slider__container" aria-atomic="false" aria-live="polite">
						<?php foreach ( $slides as $i => $slide ) : ?>
							<?php
							$slide_class = 'specials-slider__slide';
							if ( 0 == $i ) {
								$slide_class .= ' specials-slider__slide_active';
							}

							$image_id = $slide['image']['attachment_id'];

							$image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
							$image_type = get_post_mime_type( $image_id );

							$picture = $picture_factory->create( $image_id );

							$slide_id = "{$atts['id']}-slide-{$i}";
							?>
							<div class="<?php echo esc_attr( $slide_class ); ?>" role="group" aria-roledescription="slide" aria-labelledby="<?php echo esc_attr( $slide_id ); ?>">
								<div class="specials-slider__slide-inner">
									<picture>
										<source srcset="<?php echo esc_attr( $picture->get_srcset() ); ?>" types="<?php echo esc_attr( $image_attr ); ?>" sizes="(min-width: 750px) 600px, calc(100vw - 20px)" />
										<img class="specials-slider__slide-img" src="<?php echo esc_url( $picture->get_src() ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" />
									</picture>
									<div class="specials-slider__slide-text">
										<h3 class="specials-slider__slide-title" id="<?php echo esc_attr( $slide_id ); ?>"><?php echo esc_html( $slide['title'] ); ?></h3>
										<div class="specials-slider__slide-weekday"><?php echo esc_html( $week_days[ $slide['weekday'] ] ); ?></div>
									</div>
									<div class="specials-slider__slide-price"><?php echo esc_html( $slide['price'] ); ?></div>
								</div><!-- .specials-slider__slide-inner -->
							</div><!-- .specials-slider__slide -->
						<?php endforeach; ?>
					</div><!-- .specials-slider__container -->

					<div class="specials-slider__arrows">
						<button class="specials-slider__arrow specials-slider__arrow_dir_prev" type="button">
							<?php esc_html_e( 'Previous', 'renome' ); ?>
						</button>
						<button class="specials-slider__arrow specials-slider__arrow_dir_next" type="button">
							<?php esc_html_e( 'Next', 'renome' ); ?>
						</button>
					</div><!-- .specials-slider__arrows -->
				</div><!-- .specials-slider__inner -->
			</div><!-- .specials-slider -->
		<?php endif; ?>
	</div><!-- .specials__inner -->
</section><!-- .specials -->
