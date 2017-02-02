<?php
	if (function_exists('bdthemes_device_slider')) {
		function bdthemes_device_slider_vc() {
			vc_map( array(
				"name"					=> esc_html_x( "Device Slider", 'backend', 'megastar' ),
				"description"			=> esc_html_x( "Add device slider", 'backend', 'megastar' ),
				"base"					=> "bdt_device_slider",
				"icon"					=> "vc-device-slider",
				'category'				=> "Theme Addons",
				"params"				=> array(
					array(
						"type"			=> "attach_images",
						"admin_label"	=> true,
						"class"			=> "",
						"heading"		=> esc_html_x( "Slider Images", 'backend', 'megastar' ),
						"param_name"	=> "source",
						"value"			=> "",
						"description"	=> esc_html_x( "Upload your Images here.", 'backend', 'megastar' ),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"class"			=> "",
						"heading"		=> esc_html_x( "Limit", 'backend', 'megastar' ),
						"param_name"	=> "limit",
						"value"			=> "10",
						"description"	=> esc_html_x( "Maximum number of item that you want to display", 'backend', 'megastar' ),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Device", 'backend', 'megastar' ),
						"admin_label"	=> true,
						"param_name"	=> "device",
						"value"			=> array(
							esc_html_x( 'Mac Desktop', 'backend', 'megastar' ) => 'imac',
							esc_html_x( 'IPad', 'backend', 'megastar' )        => 'ipad',
							esc_html_x( 'IPhone', 'backend', 'megastar' )      => 'iphone',
							esc_html_x( 'MacBook', 'backend', 'megastar' )     => 'macbook',
							esc_html_x( 'Galaxy S6', 'backend', 'megastar' )   => 'galaxys6',
						),
						"description"	=> esc_html_x( "Select your device which you want to show as slider. Note: Use Image Size:
        for Mac Desktop or IPad: 944x590, for IPhone: 596x771 and for MacBook or Galaxy S6: 447x762", 'backend', 'megastar' ),
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Lightbox", 'backend', 'megastar' ),
						"param_name"	=> "lightbox",
						'value' => array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"description"	=> esc_html_x( "You want to show your content in lightbox window", 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Arrows", 'backend', 'megastar' ),
						"param_name"	=> "arrows",
						'value' => array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
						"description"	=> esc_html_x( "You want to show your content in lightbox window", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Pagination", 'backend', 'megastar' ),
						"param_name"	=> "pagination",
						'value' => array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
						'description' => esc_html_x( 'If you select Yes pagination will be appeard.', 'backend', 'megastar' ),
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Autoplay", 'backend', 'megastar' ),
						"param_name"	=> "autoplay",
						'value' => array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
						'description' => esc_html_x( 'Set yes if you need to set auto play', 'backend', 'megastar' ),
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Hover On Pause", 'backend', 'megastar' ),
						"param_name"	=> "hoverpause",
						'value' => array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
						'description' => esc_html_x( 'If you select Yes then when you hover on the slide then it will be paused', 'backend', 'megastar' ),
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Loop", 'backend', 'megastar' ),
						"param_name"	=> "loop",
						'value' => array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						'description' => esc_html_x('Set yes or no loop from here.', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
					),
					array(
						"type"        => "number",
						"heading"     => esc_html_x( "Delay", 'backend', 'megastar' ),
						"param_name"  => "delay",
						"value"       => 4,
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
						"description" => wp_kses(_x( "Delay of the event carousel. It's set <strong>second</strong> value.", 'backend', 'megastar' ), array('strong'=>array())),
					),
					array(
						"type"        => "number",
						"heading"     => esc_html_x( "Speed", 'backend', 'megastar' ),
						"param_name"  => "speed",
						"value"       => 0.35,
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
						"description" => wp_kses(_x( "Speed of the event carousel. It's set <strong>second</strong> value.", 'backend', 'megastar' ), array('strong'=>array())),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Extra class name', 'backend', 'megastar' ),
						'param_name' => 'class',
						'description' => esc_html_x( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'backend', 'megastar' ),
					)
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_device_slider_vc' );
	}