<?php
/**
 * Footer social links.
 *
 * @package renome
 */

if ( ! function_exists( 'fw_get_db_settings_option' ) ) {
	return;
}
?>

<div class="footer__social">
	<div class="footer__social-text">
		<?php esc_html_e( 'Follow us:', 'renome' ); ?>
	</div><!-- .footer__social-text -->

	<ul class="social footer__social-list">
		<?php foreach ( fw_get_db_settings_option( 'social-links' ) as $social ) : ?>
			<li class="social__item">
				<a href="<?php echo esc_url( $social['link'] ); ?>" class="social__link">
					<?php Renome\svg_icon( $social['media'], $social['text'] ); ?>
				</a><!-- .social__link -->
			</li><!-- .social__item -->
		<?php endforeach; ?>
	</ul><!-- .footer__social-list -->
</div><!-- .footer__social -->
