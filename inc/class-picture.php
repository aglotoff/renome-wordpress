<?php
/**
 * Helpers: Picture class.
 *
 * @package renome
 */

namespace Renome;

/**
 * Helper class used to create responsive images.
 */
class Picture {
	/**
	 * Image ID.
	 *
	 * @var int
	 */
	private $id;
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
	 * Image src attribute.
	 *
	 * @var string
	 */
	private $src = '';
	/**
	 * Image srcset attribute.
	 *
	 * @var string
	 */
	private $srcset = '';

	/**
	 * Setup a new Picture instance.
	 *
	 * @param int    $id            Image ID.
	 * @param string $sizes         Array of width and height pairs to generate
	 *                              images.
	 * @param string $fallback_size Array of width and height values used for
	 *                              the fallback src attribute.
	 */
	public function __construct( $id, $sizes, $fallback_size ) {
		$this->id            = $id;
		$this->sizes         = $sizes;
		$this->fallback_size = $fallback_size;
	}

	/**
	 * Initialize the srcset attribute.
	 */
	protected function init_srcset() {
		list( $full_src, $full_width, $full_height ) = wp_get_attachment_image_src( $this->id, 'full' );

		if ( ! function_exists( 'fly_get_attachment_image_src' ) ) {
			$this->srcset = $full_src;
			return;
		}

		$image = fly_get_attachment_image_src( $this->id, $this->sizes[0], true );

		$this->srcset = "{$image['src']} {$image['width']}w";

		foreach ( array_slice( $this->sizes, 1 ) as $size ) {
			if ( ( $full_width < $size[0] ) || ( $full_height < $size[1] ) ) {
				break;
			}

			$image = fly_get_attachment_image_src( $this->id, $size, true );

			$this->srcset .= ", {$image['src']} {$image['width']}w";
		}
	}

	/**
	 * Initialize the src attribute.
	 */
	protected function init_src() {
		list( $full_src ) = wp_get_attachment_image_src( $this->id, 'full' );

		if ( ! function_exists( 'fly_get_attachment_image_src' ) ) {
			$this->srcset = $full_src;
			return;
		}

		$image = fly_get_attachment_image_src( $this->id, $this->fallback_size, true );

		$this->srcset = $image['src'];
	}

	/**
	 * Get the value of the srcset attribute containing the set of images of
	 * different sizes.
	 *
	 * @return string The value of the srcset attribute.
	 */
	public function get_srcset() {
		if ( empty( $this->srcset ) ) {
			$this->init_srcset();
		}
		return $this->srcset;
	}

	/**
	 * Get the value of the src attribute to be used for the fallback img tag
	 * inside the picture tag.
	 *
	 * @return string The value of the src attribute.
	 */
	public function get_src() {
		if ( empty( $this->src ) ) {
			$this->init_src();
		}
		return $this->src;
	}
}
