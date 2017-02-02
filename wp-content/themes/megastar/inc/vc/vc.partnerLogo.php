<?php
	if (function_exists('bdthemes_partner_logo')) {
		function bdthemes_partner_logo_vc() {
			vc_map(
				array(
					"name"                    => esc_html_x( "Partner Logo", 'backend', 'megastar' ),
					"base"                    => "bdt_partner_logo",
					"icon"                    => "vc-partner-logo",
					"category"                => "Theme Addons",
					"description"             => esc_html_x( "Describe your partner logo.", 'backend', 'megastar' ),
					'is_container'            => true,
					'show_settings_on_create' => true,
					"as_parent"               => array('only' => 'vc_single_image'),
					"params" => array(			
						array(
					   		'type' => 'dropdown',
							'heading' => esc_html_x('Gutter', 'backend', 'megastar' ),
							'param_name' => 'gutter',
							'value' => array(
								esc_html_x('Collapse', 'backend', 'megastar' ) => 'collapse',
								esc_html_x('Large', 'backend', 'megastar' ) => 'large',
								esc_html_x('Medium', 'backend', 'megastar' ) => 'medium',
								esc_html_x('Small', 'backend', 'megastar' ) => 'small'
							),
							'std'         => 'medium',
							'description' => esc_html_x('Gutter of the carousel.', 'backend', 'megastar' )
						),
						array(
					   		'type' => 'dropdown',
							'heading' => esc_html_x('Style', 'backend', 'megastar' ),
							'param_name' => 'style',
							'value' => array(
								esc_html_x('Dark', 'backend', 'megastar' ) => 'dark',
								esc_html_x('Light', 'backend', 'megastar' ) => 'light'
							),
							'std'         => 'dark',
							'description' => esc_html_x('Style of the carousel.', 'backend', 'megastar' ),
							"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> esc_html_x( "Navigation", 'backend', 'megastar' ),
							"param_name"	=> "arrows",
							"value"			=> array(
								esc_html_x( 'Show', 'backend', 'megastar' ) 	=> 'true',
								esc_html_x( 'Hide', 'backend', 'megastar' ) => 'false',
							),
							'description' => esc_html_x( 'Show or hide navigation from here.', 'backend', 'megastar' ),
							"std"         => "true",
							"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> esc_html_x( "Pagination", 'backend', 'megastar' ),
							"param_name"	=> "pagination",
							"value"			=> array(
								esc_html_x( 'Show', 'backend', 'megastar' ) 	=> 'true',
								esc_html_x( 'Hide', 'backend', 'megastar' ) => 'false',
							),
							'description' => esc_html_x( 'Show or hide pagination from here.', 'backend', 'megastar' ),
							"std"         => "true",
							"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
						),
						array(
							"type"        => "number",
							"heading"     => esc_html_x( "Delay", 'backend', 'megastar' ),
							"param_name"  => "delay",
							"value"       => 4000,
							"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
							"description" => wp_kses(_x( "Delay of the carousel. It's set <strong>ms</strong> value.", 'backend', 'megastar' ), array('strong'=>array())),
						),
						array(
							"type"        => "number",
							"heading"     => esc_html_x( "Speed", 'backend', 'megastar' ),
							"param_name"  => "speed",
							"value"       => 350,
							"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
							"description" => wp_kses(_x( "Speed of the carousel. It's set <strong>ms</strong> value.", 'backend', 'megastar' ), array('strong'=>array())),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> esc_html_x( "Auto Play", 'backend', 'megastar' ),
							"param_name"	=> "autoplay",
							"value"			=> array(
								esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> 'true',
								esc_html_x( 'No', 'backend', 'megastar' ) => 'false',
							),
							'description' => esc_html_x( 'Show or hide auto play from here.', 'backend', 'megastar' ),
							"std"         => "true",
							"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> esc_html_x( "Hover Pause", 'backend', 'megastar' ),
							"param_name"	=> "hoverpause",
							"value"			=> array(
								esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> 'true',
								esc_html_x( 'No', 'backend', 'megastar' ) => 'false',
							),
							'description' => esc_html_x( 'Set yes or no hover pause from here.', 'backend', 'megastar' ),
							"std"         => "false",
							"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> esc_html_x( "Loop", 'backend', 'megastar' ),
							"param_name"	=> "loop",
							"value"			=> array(
								esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> 'true',
								esc_html_x( 'No', 'backend', 'megastar' ) => 'false',
							),
							'description' => esc_html_x('Set yes or no loop from here.', 'backend', 'megastar' ),
							"std"         => "true",
							"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
						),
						array(
					   		"type" => "dropdown",
							"heading" => esc_html_x( "Large View", 'backend', 'megastar' ),
							"param_name" => "large",
							"value" => array(
								esc_html_x('1', 'backend', 'megastar' ) => 1,
								esc_html_x('2', 'backend', 'megastar' ) => 2,
								esc_html_x('3', 'backend', 'megastar' ) => 3,
								esc_html_x('4', 'backend', 'megastar' ) => 4,
								esc_html_x('5', 'backend', 'megastar' ) => 5,
								esc_html_x('6', 'backend', 'megastar' ) => 6
							),
							"std"         => 5,
							"group"	=> esc_html_x( 'Responsive', 'backend', 'megastar' ),
							"description" => esc_html_x( "Large view item of the carousel.", 'backend', 'megastar' )
						),
						array(
					   		"type" => "dropdown",
							"heading" => esc_html_x( "Medium View", 'backend', 'megastar' ),
							"param_name" => "medium",
							"value" => array(
								esc_html_x('1', 'backend', 'megastar' ) => 1,
								esc_html_x('2', 'backend', 'megastar' ) => 2,
								esc_html_x('3', 'backend', 'megastar' ) => 3,
								esc_html_x('4', 'backend', 'megastar' ) => 4
							),
							"std"         => 3,
							"group"	=> esc_html_x( 'Responsive', 'backend', 'megastar' ),
							"description" => esc_html_x( "Medium view item of the carousel.", 'backend', 'megastar' )
						),
						array(
					   		"type" => "dropdown",
							"heading" => esc_html_x( "Small View", 'backend', 'megastar' ),
							"param_name" => "small",
							"value" => array(
								esc_html_x('1', 'backend', 'megastar' ) => 1,
								esc_html_x('2', 'backend', 'megastar' ) => 2,
								esc_html_x('3', 'backend', 'megastar' ) => 3
							),
							"std"         => 1,
							"group"	=> esc_html_x( 'Responsive', 'backend', 'megastar' ),
							"description" => esc_html_x( "Small view item of the carousel.", 'backend', 'megastar' )
						),
					),	
					'js_view' => 'VcColumnView',
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_partner_logo_vc' );


		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		    class WPBakeryShortCode_bdt_partner_logo extends WPBakeryShortCodesContainer {
		    }
		}
	}