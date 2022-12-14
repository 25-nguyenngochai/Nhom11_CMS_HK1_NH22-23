<?php
/**
 * @package Multivendor Marketplace
 * Setup the WordPress core custom header feature.
 *
 * @uses multivendor_marketplace_header_style()
*/
function multivendor_marketplace_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'multivendor_marketplace_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 80,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'multivendor_marketplace_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'multivendor_marketplace_custom_header_setup' );

if ( ! function_exists( 'multivendor_marketplace_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see multivendor_marketplace_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'multivendor_marketplace_header_style' );

function multivendor_marketplace_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .middle-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'multivendor-marketplace-basic-style', $custom_css );
	endif;
}
endif;