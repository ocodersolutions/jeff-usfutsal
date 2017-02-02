<?php
	if (function_exists('bdthemes_content_slider')) {
		function bdthemes_content_slider_vc() {
			vc_map(
				array(
					"name"                    => esc_html_x( "Content Slider", 'backend', 'megastar' ),
					"base"                    => "bdt_content_slider",
					"icon"                    => "vc-content-slider",
					"category"                => "Theme Addons",
					"description"             => esc_html_x( "Describe your content as a slider.", 'backend', 'megastar' ),
					'show_settings_on_create' => true,
					"as_parent"               => array('only' => 'bdt_content_slide'),
					"params" => array(			
						array(
					   		'type' => 'dropdown',
							'heading' => esc_html_x('Animation', 'backend', 'megastar' ),
							'param_name' => 'animation',
							'value' => array(
								esc_html_x('Fade', 'backend', 'megastar' ) => 'fade',
								esc_html_x('Scroll', 'backend', 'megastar' ) => 'scroll',
								esc_html_x('Scale', 'backend', 'megastar' ) => 'scale',
								esc_html_x('Swipe', 'backend', 'megastar' ) => 'swipe'
							),
							'std'         => 'fade',
							'description' => esc_html_x('Select animation from here.', 'backend', 'megastar' )
						),
						array(
							"type"        => "number",
							"heading"     => esc_html_x( "Delay", 'backend', 'megastar' ),
							"param_name"  => "delay",
							"value"       => 4000,
							"description" => wp_kses(_x("Delay of the event carousel. It's set <strong>ms</strong> value.", 'backend', 'megastar' ), array('strong'=>array())),
						),
						array(
							"type"        => "number",
							"heading"     => esc_html_x( "Duration", 'backend', 'megastar' ),
							"param_name"  => "duration",
							"value"       => 600,
							"description" => esc_html_x( "Duration of the slide animation.", 'backend', 'megastar' )
						),
						array(
							"type"			=> "checkbox",
							"heading"		=> esc_html_x( "Auto Play", 'backend', 'megastar' ),
							"param_name"	=> "autoplay",
							"value"			=> array(
								esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> 'true'
							),
							'description' => esc_html_x( 'Show or hide auto play from here.', 'backend', 'megastar' )
						),
						array(
							"type"			=> "checkbox",
							"heading"		=> esc_html_x( "Hover Pause", 'backend', 'megastar' ),
							"param_name"	=> "hoverpause",
							"value"			=> array(
								esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> 'true'
							),
							'description' => esc_html_x( 'Set yes or no hover pause from here.', 'backend', 'megastar' )
						)
					),	
					'js_view' => 'VcColumnView',
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_content_slider_vc' );


		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		    class WPBakeryShortCode_bdt_content_slider extends WPBakeryShortCodesContainer {
		    }
		}
	}


	if (function_exists('bdthemes_content_slide')) {
		function bdthemes_content_slide_vc() {
			vc_map(
				array(
					"name"                    => esc_html_x( "Content Slide", 'backend', 'megastar' ),
					"base"                    => "bdt_content_slide",
					"icon"                    => "vc-content-slide",
					"category"                => "Theme Addons",
					"description"             => esc_html_x( "Describe your content as a slide.", 'backend', 'megastar' ),
					"as_child" => array('only' => 'bdt_content_slider'),
					"params" => array(			
						array(
					   		'type' => 'textfield',
							'heading' => esc_html_x('Title', 'backend', 'megastar' ),
							'param_name' => 'title',
							"admin_label" => true,
							'description' => esc_html_x('Type content slide title.', 'backend', 'megastar' )
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html_x( 'Button Text', 'backend', 'megastar' ),
							'param_name' => 'btn_text',
							'description' => esc_html_x( 'Type button text here.', 'backend', 'megastar' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html_x( 'Button URL', 'backend', 'megastar' ),
							'param_name' => 'btn_url',
							'value' => '',
							'description' => esc_html_x( 'Type button url here.', 'backend', 'megastar' ),
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html_x( 'Image', 'backend', 'megastar' ),
							'param_name' => 'image',
							'value' => '',
							'description' => esc_html_x( 'Select image from media library.', 'backend', 'megastar' ),
						),
						array(
							"type"        => "textarea_html",
							"heading"     => esc_html_x( "Description", 'backend', 'megastar' ),
							"param_name"  => "content",
							"value"       => "Slide description text here",
						),
					),
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_content_slide_vc' );
	}