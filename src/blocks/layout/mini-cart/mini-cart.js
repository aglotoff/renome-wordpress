/**
 * Implementation of the mini cart block
 */

// Utility imports
import Dropdown from '../../../js/utils/dropdown';

// -------------------------- BEGIN MODULE VARIABLES --------------------------

// Block name
const BLOCK = 'mini-cart';

// Element selectors
const SELECTORS = {
	BLOCK: `.${ BLOCK }`,
	TRIGGER: `.${ BLOCK }__trigger`,
	DRAWER: `.${ BLOCK }__drawer`,
};

// Element class names
const CLASSES = {
	DRAWER_EXPANDED: `${ BLOCK }__drawer_expanded`,
};

// --------------------------- END MODULE VARIABLES ---------------------------

// --------------------------- BEGIN PUBLIC METHODS ---------------------------

/**
 * Initialize the mini cart block.
 */
export function init() {
	const $minicart = $( SELECTORS.BLOCK );
	const $trigger = $( SELECTORS.TRIGGER, $minicart );
	const $drawer = $( SELECTORS.DRAWER, $minicart );

	const dropdown = new Dropdown( {
		$root: $minicart,
		$trigger,
		$drawer,

		onExpand() {
			$drawer.addClass( CLASSES.DRAWER_EXPANDED );
		},
		onCollapse() {
			$drawer.removeClass( CLASSES.DRAWER_EXPANDED );
		},
	} );

	dropdown.activate();
}

// ---------------------------- END PUBLIC METHODS ----------------------------
