<?php
/**
 * Mobile search form.
 *
 * @package renome
 */

?>

<form class="mobile-search nav__search" action="#" method="post" id="search-mobile">
	<input class="mobile-search__input" type="text" name="s" placeholder="<?php echo esc_attr( __( 'Search...', 'renome' ) ); ?>" />
	<button class="mobile-search__submit" type="submit">
		<?php Renome\svg_icon( 'search', __( 'Search', 'renome' ) ); ?>
	</button>
</form>
