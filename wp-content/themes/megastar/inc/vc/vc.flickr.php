<?php
	if (function_exists('bdthemes_flickr')) {
		function bdthemes_flickr_vc() {
			vc_map(
				array(
					"name"        => esc_html_x( "Flickr", 'backend', 'megastar' ),
					"base"        => "bdt_flickr",
					"icon"        => "vc-flickr",
					"category"    => "Theme Addons",
					"description" => esc_html_x( "Flickr is for make flickr feed .", 'backend', 'megastar' ),
					"params"      => array(
						array(
					   		"type" => "textfield",
							"heading" => esc_html_x( "Flickr ID", 'backend', 'megastar' ),
		                    'param_name' => 'id',
							"value" => "95572727@N00", 
							"description" => wp_kses(_x( "Enter your flickr ID, To find your flickID visit <a href='http://idgettr.com/' target='_blank'>idGettr</a>", 'backend', 'megastar' ), array('a'=>array())),
						),
		                array(
		                    'type' => 'dropdown',
		                    'heading' => esc_html_x( 'Limit', 'backend', 'megastar' ),
		                    'param_name' => 'limit',
		                    'value' => array( 20, 19, 18, 17, 16, 15, 14, 13, 12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1 ),
		                    'description' => esc_html_x( 'Select number of photos to display.', 'backend', 'megastar' )
		                ), 
						array(
							'type' => 'checkbox',
							'heading' => esc_html_x( 'Lightbox', 'backend', 'megastar' ),
							'param_name' => 'lightbox',
							'description' => esc_html_x( 'If checked row will be set to full height.', 'backend', 'megastar' ),
							'value' => array(
								esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
							)
						),
						array(
					   		"type" => "textfield",
							"heading" => esc_html_x( "Radius", 'backend', 'megastar' ),
							'param_name' => 'radius',
							"value" => "0px", 
							"description" => esc_html_x( "You can set border radius from here.", 'backend', 'megastar' )
						),
					)	
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_flickr_vc' );
	}