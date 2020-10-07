<?php
/**
 * Footer copyright.
 *
 * @package renome
 */

if ( ! function_exists( 'fw_get_db_settings_option' ) ) {
	return;
}
?>

<div class="footer__copyright">
	<?php echo wp_kses( fw_get_db_settings_option( 'copyright' ), 'post' ); ?>
</div><!-- .footer__copyright -->
