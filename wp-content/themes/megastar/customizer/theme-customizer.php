<?php
/**
 * Load the Customizer with some custom extended addons
 *
 * @package Megastar
 * @link http://codex.wordpress.org/Theme_Customization_API
 */

load_template( get_template_directory() . '/customizer/class-customizer-control.php' );
load_template( get_template_directory() . '/customizer/fonts-helper.php' );

/**
 * This funtion is only called when the user is actually on the customizer page
 * @param  WP_Customize_Manager $wp_customize
 */
if ( ! function_exists( 'megastar_customizer' ) ) {
	function megastar_customizer( $wp_customize ) {
		
		// add required files
		load_template( get_template_directory() . '/customizer/class-customizer-base.php' );
		load_template( get_template_directory() . '/customizer/class-customizer-dynamic-css.php' );

		new megastar_Customizer_Base( $wp_customize );
	}
	add_action( 'customize_register', 'megastar_customizer' );
}


/**
 * Takes care for the frontend output from the customizer and nothing else
 */
if ( ! function_exists( 'megastar_customizer_frontend' ) && ! class_exists( 'megastar_Customize_Frontent' ) ) {
	function megastar_customizer_frontend() {
		load_template( get_template_directory() . '/customizer/class-customizer-frontend.php' );
		new megastar_Customize_Frontent();
	}
	add_action( 'init', 'megastar_customizer_frontend' );
}