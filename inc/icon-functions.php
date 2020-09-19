<?php
/**
 * SVG icon related functions.
 *
 * @package renome
 */

namespace Renome;

/**
 * Display SVG icon.
 *
 * @param string       $name Icon name.
 * @param string|false $title Optional title for accessibility purposes.
 */
function svg_icon( $name, $title = false ) {
	?>

	<svg class="icon icon_<?php echo esc_attr( $name ); ?>">
		<?php if ( $title ) : ?>
			<title><?php echo esc_html( $title ); ?></title>
		<?php endif; ?>

		<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icons.svg#<?php echo esc_attr( $name ); ?>"></use>
	</svg>

	<?php
}
