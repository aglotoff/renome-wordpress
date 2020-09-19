<?php
/**
 * Main Menu Walker
 *
 * @package renome
 */

namespace Renome;

/**
 * Class used to implement an HTML list of nav menu items.
 *
 * @see \Walker_Nav_Menu
 */
class Walker_Nav_Menu extends \Walker_Nav_Menu {
	/**
	 * Starts the list before the elements are added.
	 *
	 * @see \Walker_Nav_Menu::start_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '<ul class="nav__list">';
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see \Walker_Nav_Menu::end_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= '</ul>';
	}

	/**
	 * Starts the element output.
	 *
	 * @see \Walker_Nav_Menu::start_el()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$permalink = $item->url;
		if ( ! $permalink ) {
			$permalink = 'javascript:void(0)';
		}

		$link_class = 'nav__link';

		if ( 0 < $depth ) {
			$link_class .= ' nav__link_submenu';
		}

		$output .= '<li class="nav__item" id="menu-item-' . esc_attr( $item->ID ) . '">';

		if ( $args->walker->has_children ) {
			$output .= '<button class="' . $link_class . '" aria-haspopup="true" aria-expanded="false" aria-controls="menu-item-submenu-' . esc_attr( $item->ID ) . '">';
			$output .= esc_html( $item->title );
			$output .= '<span class="nav__arrow nav__arrow_open" aria-hidden="true"></span>';
			$output .= '</button>';

			$output .= '<div class="nav__submenu" id="menu-item-submenu-' . esc_attr( $item->ID ) . '">';
			$output .= '<div class="nav__scrollpane">';

			$output .= '<button class="nav__link nav__link_back">';
			$output .= __( 'Back', 'renome' );
			$output .= '<span class="nav__arrow nav__arrow_close" aria-hidden="true"></span>';
			$output .= '</button>';
		} else {
			$output .= '<a href="' . $permalink . '" class="' . $link_class . '">';
			$output .= esc_html( $item->title );
			$output .= '</a>';
		}
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @see \Walker_Nav_Menu::end_el()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Page data object. Not used.
	 * @param int      $depth  Depth of page. Not Used.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ( $args->walker->has_children ) {
			$output .= '</div>';
			$output .= '</div>';
		}

		$output .= '</li>';
	}
}
