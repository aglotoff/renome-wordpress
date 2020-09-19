<?php
/**
 * Desktop search form.
 *
 * @package renome
 */

?>

<div class="desktop-search header__search" role="dialog" aria-label="<?php echo esc_attr( __( 'Search', 'renome' ) ); ?>">
	<form class="desktop-search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="search-desktop">
		<input class="desktop-search__input" type="text" name="s" placeholder="<?php echo esc_attr( __( 'Search...', 'renome' ) ); ?>" />
		<button class="desktop-search__submit" type="submit">
			<?php Renome\svg_icon( 'search', __( 'Search', 'renome' ) ); ?>
		</button>
		<button class="desktop-search__close" type="button" aria-label="<?php echo esc_attr( __( 'Close', 'renome' ) ); ?>>"></button>
	</form><!-- .desktop-search__form -->
</div><!-- .desktop-search -->
