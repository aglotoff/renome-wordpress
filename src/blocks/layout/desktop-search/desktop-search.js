/**
 * @file Implementation of the desktop search block
 */

/* global focusTrap */

// -------------------------- BEGIN MODULE VARIABLES --------------------------

// Block name
const BLOCK = 'desktop-search';

// Element selectors
const SELECTORS = {
	BLOCK: `.${ BLOCK }`,
	CLOSE: `.${ BLOCK }__close`,
};

// Element class names
const CLASSES = {
	BLOCK_VISIBLE: `${ BLOCK }_visible`,
};

// Cache of jQuery elements
const elements = {};

// Focus-trap instance
let popupFocusTrap;

// --------------------------- END MODULE VARIABLES ---------------------------

// --------------------------- BEGIN PUBLIC METHODS ---------------------------

/**
 * Show the search modal
 */
export function show() {
	elements.$search.addClass( CLASSES.BLOCK_VISIBLE );

	// Need to wait 100ms for autofocus to work
	setTimeout( () => {
		popupFocusTrap.activate();
	}, 100 );
}

/**
 * Hide the search modal
 */
export function hide() {
	popupFocusTrap.deactivate();
}

/**
 * Initialize the desktop search block.
 */
export function init() {
	const $search = $( SELECTORS.BLOCK );
	const $close = $( SELECTORS.CLOSE, $search );

	elements.$search = $search;

	popupFocusTrap = focusTrap( $search.get( 0 ), {
		clickOutsideDeactivates: true,
		escapeDeactivates: true,

		onDeactivate: function handleSearchDeactivate() {
			$search.removeClass( CLASSES.BLOCK_VISIBLE );
		},
	} );

	$close.click( hide );
}

// ---------------------------- END PUBLIC METHODS ----------------------------
