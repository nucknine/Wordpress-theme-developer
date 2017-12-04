<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Humanscores
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses humanscores_header_style()
 */
function humanscores_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'humanscores_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'fff',
		'width'                  => 2000,
		'height'                 => 800,
		'flex-height'            => true,
		'flex-width'            => true,
		'wp-head-callback'       => 'humanscores_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'humanscores_custom_header_setup' );
