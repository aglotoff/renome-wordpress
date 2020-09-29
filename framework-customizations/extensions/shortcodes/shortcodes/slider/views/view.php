<?php
/**
 * Default view file for the Slider shortcode.
 *
 * @link http://manual.unyson.io/en/latest/extension/shortcodes/#default-view-file
 *
 * @package renome
 */

$slides = fw_akg( 'slides', $atts, array() );
?>

<div class="slider">
	<div class="slider__container">
		<?php foreach ( $slides as $i => $slide ) : ?>
			<?php
			$slide_class = 'slider__slide';
			if ( 0 === $i ) {
				$slide_class .= ' slider__slide_active';
			}
			?>
			<div class="<?php echo esc_attr( $slide_class ); ?>" style="background-image: url(<?php echo esc_url( $slide['image']['url'] ); ?>);">
				<div class="slider__slide-content">
					<h2 class="slider__slide-heading">
						<?php if ( ! empty( $slide['title'] ) ) : ?>
							<span class="slider__slide-title"><?php echo esc_html( $slide['title'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $slide['subtitle'] ) ) : ?>
							<span class="slider__slide-subtitle"><?php echo esc_html( $slide['subtitle'] ); ?></span>
						<?php endif; ?>
					</h2><!-- .slider__slide-heading -->
				</div><!-- .slider__slide-content -->
			</div><!-- .slider__slide -->
		<?php endforeach; ?>
	</div><!-- .slider__container -->

	<?php if ( 1 < count( $slides ) ) : ?>
		<div class="slider__arrows">
			<button class="slider__arrow slider__arrow_dir_prev" type="button">
				<?php esc_html_e( 'Previous', 'renome' ); ?>
			</button>
			<button class="slider__arrow slider__arrow_dir_next" type="button">
				<?php esc_html_e( 'Next', 'renome' ); ?>
			</button>
		</div><!-- .slider__arrow -->
	<?php endif; ?>
</div><!-- .slider -->
