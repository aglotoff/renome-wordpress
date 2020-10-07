<?php
/**
 * Default view file for the Services shortcode.
 *
 * @package renome
 */

?>

<section class="services">
	<div class="heading-group heading-group_lvl_2">
		<span class="heading-group__title"><?php echo esc_html( $atts['title'] ); ?></span>
		<span class="heading-group__subtitle"><?php echo esc_html( $atts['subtitle'] ); ?></span>
	</div><!-- .services -->
	<div class="services__list-wrapper">
		<ul class="services__list">
			<?php foreach ( fw_akg( 'services', $atts, array() ) as $service ) : ?>
				<li class="services__item"><?php echo esc_html( $service ); ?></li>
			<?php endforeach; ?>
		</ul><!-- .services__list -->
	</div><!-- .services__list-wrapper -->
</section><!-- .services -->
