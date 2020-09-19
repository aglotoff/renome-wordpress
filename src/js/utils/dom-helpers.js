/**
 * @file DOM helper functions.
 */

/**
 * Force a reflow.
 *
 * @param {jQuery} $el The element whose styles have been changed.
 */
export function forceReflow( $el ) {
	return $el.get( 0 ).offsetHeight;
}

/**
 * Get transition duration for the specified element.
 *
 * @param {jQuery} $el The element to compute transition duration on.
 * @return {number} transition duration in milliseconds.
 */
export function getTransitionDuration( $el ) {
	const duration = $el.css( 'transition-duration' ) || '';
	const delay = $el.css( 'transition-delay' ) || '';

	if ( ! duration && ! delay ) {
		return 0;
	}

	const floatDuration = parseFloat( duration );
	const floatDelay = parseFloat( delay );

	const msDuration = ( floatDuration + floatDelay ) * 1000;
	return Number.isNaN( msDuration ) ? 0 : msDuration;
}

/**
 * Detect the end of CSS transition.
 *
 * @param {jQuery} $el The element to detect transition end on.
 * @return {jQuery.Promise} Promise that resolves when CSS transition ends.
 */
export function detectTransitionEnd( $el ) {
	const duration = getTransitionDuration( $el );

	const deferred = $.Deferred();

	const handleTransitionEnd = ( event ) => {
		if ( $( event.target ).is( $el ) ) {
			deferred.resolve();
		}
	};

	$el.on( 'transitionend', handleTransitionEnd );

	deferred.always( () => {
		$el.off( 'transitionend', handleTransitionEnd );
	} );

	setTimeout( () => deferred.resolve, duration );

	return deferred.promise();
}

/**
 * Generic animation function.
 *
 * @param {Function} cb The callback to invoke for each animation step.
 * @param {number} duration Animation duration in milliseconds.
 */
export function animate( cb, duration ) {
	const startTime =
		'now' in window.performance
			? window.performance.now()
			: new Date().getTime();

	requestAnimationFrame( function step( currentTime ) {
		const deltaTime = currentTime - startTime;
		if ( deltaTime >= duration ) {
			cb( 1 );
		} else {
			const progress = deltaTime / duration;
			cb( progress );

			requestAnimationFrame( step );
		}
	} );
}

/**
 * Scroll smoothly to a given element.
 *
 * @param {HTMLElement} target The element to scroll to.
 * @param {number} duration A number of milliseconds determining how long
 *  the scrolling animation will run.
 * @return {jQuery.Promise} A promise that resolves when the animation
 *  completes.
 */
export function scrollTo( target, duration ) {
	const startOffset = window.pageYOffset;
	const leftOffset = window.pageXOffset;

	const documentHeight = document.body.clientHeight;
	const windowHeight = window.innerHeight;

	let targetOffset;
	if ( documentHeight - target.offsetTop < windowHeight ) {
		targetOffset = documentHeight - windowHeight;
	} else {
		targetOffset = target.offsetTop;
	}

	const deferred = $.Deferred();

	animate( ( progress ) => {
		if ( progress === 1 ) {
			window.scroll( leftOffset, targetOffset );
			deferred.resolve();
		} else {
			window.scroll(
				leftOffset,
				startOffset + progress * ( targetOffset - startOffset )
			);
		}
	}, duration );

	return deferred.promise();
}

/**
 * Determine the size of 1 em for the given element.
 *
 * @param {jQuery} $el The element whose em size is to be computed.
 * @return {number} The size of 1 em in pixels.
 */
export function getEmSize( $el ) {
	return parseInt( $el.css( 'font-size' ) );
}
