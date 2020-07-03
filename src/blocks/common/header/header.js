/**
 * @file Implementation of the header block.
 */

import { getEmSize, forceReflow } from '../../../js/utils/dom-helpers';
import { throttle } from '../../../js/utils/helpers';

import * as HeaderSearch from '../header-search';
import * as MiniCart from '../mini-cart';
import * as Nav from '../nav';

// -------------------------- BEGIN MODULE VARIABLES --------------------------

// Block name
const BLOCK = 'header';

// Element selectors
const SELECTORS = {
	BLOCK: `.${ BLOCK }`,
	SEARCH_TOGGLE: `.${ BLOCK }__search-toggle`,
};

// Element class names
const CLASSES = {
	BLOCK_TRANSPARENT: `${ BLOCK }_transparent`,
	BLOCK_HIDDEN: `${ BLOCK }_hidden`,
	BLOCK_ANIMATED: `${ BLOCK }_animated`,
	BLOCK_SCROLL: `${ BLOCK }_scroll`,
};

const STICKY_HEADER_OFFSET = 6; // Scroll offset to make the header "sticky"
const VISIBLE_HEADER_OFFSET = 32; // Scroll offset to show the "sticky" header
const SCROLL_INTERVAL = 200; // Scroll event throttling interval

// Possible header states
const HEADER_STATES = {
	NORMAL: 0,
	STICKY: 1,
	VISIBLE: 2,
};

// jQuery elements map
const elements = {};

// Is header initially transparent?
let isTransparent = false;

// Default header state
let headerState = HEADER_STATES.NORMAL;

// --------------------------- END MODULE VARIABLES ---------------------------

// --------------------------- BEGIN PRIVATE METHODS --------------------------

/**
 * Add or remove header classes based on the current scroll offset to create an
 * animated sticky header effect.
 */
function updateHeaderStyles() {
	const currentOffset = $( window ).scrollTop() / getEmSize( $( '.page' ) );

	let newState = null;
	if ( currentOffset < STICKY_HEADER_OFFSET ) {
		newState = HEADER_STATES.NORMAL;
	} else if ( currentOffset < VISIBLE_HEADER_OFFSET ) {
		newState = HEADER_STATES.STICKY;
	} else {
		newState = HEADER_STATES.VISIBLE;
	}

	if ( newState !== headerState ) {
		const { $header } = elements;

		if ( newState === HEADER_STATES.NORMAL ) {
			$header
				.removeClass( CLASSES.BLOCK_SCROLL )
				.removeClass( CLASSES.BLOCK_HIDDEN )
				.removeClass( CLASSES.BLOCK_ANIMATED )
				.toggleClass( CLASSES.BLOCK_TRANSPARENT, isTransparent );
		} else if ( newState === HEADER_STATES.STICKY ) {
			$header
				.addClass( CLASSES.BLOCK_SCROLL )
				.addClass( CLASSES.BLOCK_HIDDEN )
				.removeClass( CLASSES.BLOCK_TRANSPARENT );

			forceReflow( $header );

			$header.addClass( CLASSES.BLOCK_ANIMATED );
		} else {
			// HEADER_STATES.VISIBLE
			if ( headerState === HEADER_STATES.NORMAL ) {
				// Make sure the animation is played before showing the header
				$header
					.addClass( CLASSES.BLOCK_SCROLL )
					.addClass( CLASSES.BLOCK_HIDDEN )
					.removeClass( CLASSES.BLOCK_TRANSPARENT );

				forceReflow( $header );

				$header.addClass( CLASSES.BLOCK_ANIMATED );
			}

			$header.removeClass( CLASSES.BLOCK_HIDDEN );
		}

		headerState = newState;
	}
}

/**
 * Initialize the header block.
 */
export function init() {
	const $header = $( SELECTORS.BLOCK );
	if ( $header.length === 0 ) {
		return false;
	}

	const $searchToggle = $( SELECTORS.SEARCH_TOGGLE, elements.$header );

	elements.$header = $header;
	elements.$searchToggle = $searchToggle;

	isTransparent = $header.hasClass( CLASSES.BLOCK_TRANSPARENT );

	elements.$searchToggle.click( HeaderSearch.show );

	$( window ).scroll( throttle( updateHeaderStyles, SCROLL_INTERVAL ) );

	// Process initial scroll position
	updateHeaderStyles();

	HeaderSearch.init();
	MiniCart.init();
	Nav.init();
}

// ---------------------------- END PRIVATE METHODS ---------------------------
