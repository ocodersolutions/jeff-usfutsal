<?php

function megastar_admin_style() {
	wp_register_style( 'admin-setting', get_template_directory_uri() . '/admin/css/admin-settings.css' );
	wp_enqueue_style( 'admin-setting' );
}
add_action( 'admin_enqueue_scripts', 'megastar_admin_style' ); 

function megastar_admin_script() {
	wp_register_script('admin-setting', get_template_directory_uri() . '/admin/js/admin-settings.js', array( 'jquery' ), NULL, true);
	$admin_setting_message = array( 'compilingLess' => esc_html_x('Compiling Less...', 'backend', 'megastar'), 'compilingLessError' => esc_html_x('An error while Compiling Less!!!', 'backend', 'megastar') ); 
	wp_localize_script( 'admin-setting', 'adminSettingMessage', $admin_setting_message ); //pass 'adminSettingMessage' to admin-settings.js
	
	wp_register_script('admin-less', get_template_directory_uri() . '/inc/vendor/less/less.js', array(), NULL, true);


	wp_enqueue_script('admin-setting');
	wp_enqueue_script('admin-less');
}
add_action( 'admin_enqueue_scripts', 'megastar_admin_script' ); 




/* ------------------------------------------------------------------------ */
/* Site Stylesheet and Scripts */
/* ------------------------------------------------------------------------ */
function megastar_scripts() {

	$header_type = (get_post_meta( get_the_ID(), 'megastar_header_type', true)) ? get_post_meta( get_the_ID(), 'megastar_header_type', true) : get_theme_mod('megastar_header_type', 'default');
	$megastar_header_search = get_theme_mod( 'megastar_header_search', 1);

	// Register Script
	wp_register_script('uikit', get_template_directory_uri() . '/inc/vendor/uikit/js/uikit.min.js', array( 'jquery' ), NULL, true);
	wp_register_script('uikit-tooltip', get_template_directory_uri() . '/inc/vendor/uikit/js/components/tooltip.js', array( 'jquery' ), NULL, true);
	wp_register_script('uikit-lightbox', get_template_directory_uri() . '/inc/vendor/uikit/js/components/lightbox.js', array( 'jquery' ), NULL, true);
	wp_register_script('uikit-slideshow', get_template_directory_uri() . '/inc/vendor/uikit/js/components/slideshow.js', array( 'jquery' ), NULL, true);
	wp_register_script('uikit-grid', get_template_directory_uri() . '/inc/vendor/uikit/js/components/grid.js', array( 'jquery' ), NULL, true);
	wp_register_script('fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery' ), NULL, true);
	wp_register_script('theme-ready-script', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), NULL, true);
	
	// Enqueue
	wp_enqueue_script('uikit');
	wp_enqueue_script('uikit-tooltip');
	wp_enqueue_script('uikit-lightbox');
	wp_enqueue_script('uikit-slideshow');
	wp_enqueue_script('uikit-grid');

	if ($megastar_header_search) {
		wp_enqueue_script('uikit-autocomplete', get_template_directory_uri() . '/inc/vendor/uikit/js/components/autocomplete.js', array( 'jquery' ), NULL, true);
		wp_enqueue_script('uikit-search', get_template_directory_uri() . '/inc/vendor/uikit/js/components/search.js', array( 'jquery' ), NULL, true);
	}

	if ($header_type == 'sticky' or $header_type == 'smart-sticky') {
		wp_enqueue_script('uikit-sticky', get_template_directory_uri() . '/inc/vendor/uikit/js/components/sticky.js', array( 'jquery' ), NULL, true);
	}

	wp_enqueue_script('fitvids');
	wp_enqueue_script('theme-ready-script');
  	
}
add_action( 'wp_enqueue_scripts', 'megastar_scripts' );  

/* ------------------------------------------------------------------------ */
/* Stylesheets */
/* ------------------------------------------------------------------------ */
function megastar_styles() {  
	
	// Predefine css style 
	if (is_rtl()) {
		wp_enqueue_style( 'theme-style', get_template_directory_uri().'/css/rtl-theme.css', array(), MEGASTAR_VER, 'all' );
	} else {
		wp_enqueue_style( 'theme-style', get_template_directory_uri().'/css/theme.css', array(), MEGASTAR_VER, 'all' );
	}

	// Load Primary Stylesheet
	wp_enqueue_style( 'megastar-style', get_stylesheet_uri(), array(), MEGASTAR_VER, 'all' );
	
	// Deregister Composer Custom CSS
	wp_deregister_style( 'js_composer_custom_css' );

	// Disable default WooCommerce CSS & load own styles
	if (class_exists('Woocommerce')){
		if (is_rtl()) {
			wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/css/rtl-woocommerce.css', array(), MEGASTAR_VER, 'all' );
		} else {
			wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/css/woocommerce.css', array(), MEGASTAR_VER, 'all' );
		}
	}


}  
add_action( 'wp_enqueue_scripts', 'megastar_styles' ); 