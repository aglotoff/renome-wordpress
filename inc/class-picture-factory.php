<?php
/**
 * Helpers: Picture_Factory class.
 *
 * @package renome
 */

namespace Renome;

/**
 * Factory to create responsive images with predefined sizes.
 */
class Picture_Factory {
	/**
	 * Array of width and height pairs.
	 *
	 * @var array
	 */
	private $sizes;
	/**
	 * Array of fallback width and height values.
	 *
	 * @var array
	 */
	private $fallback_size;

	/**
	 * Setup a new Picture Factory instance.
	 *
	 * @param string $sizes         Array of width and height pairs to generate
	 *                              images.
	 * @param string $fallback_size Array of width and height values used for
	 *                              the fallback src attribute.
	 */
	public function __construct( $sizes, $fallback_size ) {
		$this->sizes         = $sizes;
		$this->fallback_size = $fallback_size;
	}

	/**
	 * Create a new Picture instance for the specified image.
	 *
	 * @param int $id Image ID.
	 */
	public function create( $id ) {
		return new Picture( $id, $this->sizes, $this->fallback_size );
	}
}
