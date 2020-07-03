/**
 * @file Miscellaneous helper functions.
 */

/**
 * Debounce function execution.
 *
 * @param {Function} cb The function to execute.
 * @param {number} interval The debouncing interval in milliseconds.
 * @return {Function} The debounced function.
 */
export function debounce( cb, interval ) {
	let timer = null;

	return () => {
		clearTimeout( timer );
		timer = setTimeout( cb, interval );
	};
}

/**
 * Throttle function execution.
 *
 * @param {Function} cb The function to execute.
 * @param {number} interval The throttling interval in milliseconds.
 * @return {Function} The throttled function.
 */
export function throttle( cb, interval ) {
	let called = false;
	let timer = null;

	return () => {
		if ( timer !== null ) {
			// Ensure that we catch and execute that last invocation.
			called = true;
			return;
		}

		cb();

		timer = setTimeout( () => {
			timer = null;
			if ( called ) {
				cb();
				called = false;
			}
		}, interval );
	};
}
