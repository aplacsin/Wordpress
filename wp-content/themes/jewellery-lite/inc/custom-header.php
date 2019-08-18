<?php
/**
 * @package Jewellery Lite
 * Setup the WordPress core custom header feature.
 *
 * @uses jewellery_lite_header_style()
*/
function jewellery_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'jewellery_lite_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'jewellery_lite_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'jewellery_lite_custom_header_setup' );

if ( ! function_exists( 'jewellery_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see jewellery_lite_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'jewellery_lite_header_style' );

function jewellery_lite_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .middle-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'jewellery-lite-basic-style', $custom_css );
	endif;
}
endif;