<?php
	if (function_exists('bdthemes_testimonial_shortcode')) {
		function bdthemes_testimonial_vc() {
			vc_map(
				array(
					"name"        => esc_html_x( "Testimonial", 'backend', 'megastar' ),
					"base"        => "bdt_testimonial",
					"icon"        => "vc-testimonial",
					"category"    => "Theme Addons",
					"description" => esc_html_x( "Testimonial.", 'backend', 'megastar' ),
					"params"      => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html_x( 'Name', 'backend', 'megastar' ),
							'value' => 'John Doe',
							'param_name' => 'name',
							'description' => esc_html_x( 'Type name here that you want to show for title', 'backend', 'megastar' ),
						),
				   		array(
							"type"       => "dropdown",
							"heading"    => esc_html_x( "Testimonial Style", 'backend', 'megastar' ),
							"param_name" => "style",
		                    'value' => array(
		                        esc_html_x( 'Style1', 'backend', 'megastar' ) => '1',
		                        esc_html_x( 'Style2', 'backend', 'megastar' ) => '2',
		                        esc_html_x( 'Style3', 'backend', 'megastar' ) => '3'
		                    ),
							"group" => esc_html_x( 'Style', 'backend', 'megastar' ),
							"description" => esc_html_x( "Select style for Testimonial.", 'backend', 'megastar' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html_x( 'Title', 'backend', 'megastar' ),
							'param_name' => 'title',
						),
						array(
							'type' => 'attach_image',
							'heading' => esc_html_x( 'Photo', 'backend', 'megastar' ),
							'param_name' => 'photo',
							'value' => '',
							'description' => esc_html_x( 'Select image from media library.', 'backend', 'megastar' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html_x( 'Company', 'backend', 'megastar' ),
							'param_name' => 'company',
							'description' => esc_html_x( 'Type here a company name. Leave this field empty to hide company name', 'backend', 'megastar' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html_x( 'Website URL', 'backend', 'megastar' ),
							'param_name' => 'url',
							'description' => esc_html_x( 'Enter the client company website url. Leave empty to disable link', 'backend', 'megastar' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html_x( 'Target', 'backend', 'megastar' ),
							'param_name' => 'target',
							'value' => array(
								esc_html_x( 'Same window', 'backend', 'megastar' ) => '_self',
								esc_html_x( 'New window', 'backend', 'megastar' ) => '_blank',
							),
							'description' => esc_html_x( 'Set link target self or blank', 'backend', 'megastar' )
						),
						array(
							"type"       => "checkbox",
							"class"      => "",
							"heading"    => esc_html_x( "Italic", 'backend', 'megastar' ),
							"param_name" => "italic",
							"value"      => array(
								esc_html_x( "Yes", 'backend', 'megastar' ) => "yes"
							),
							"group" => esc_html_x( 'Style', 'backend', 'megastar' ),
							"description" => esc_html_x( "If you want show content italic, so tick", 'backend', 'megastar' ),
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html_x( 'Radius', 'backend', 'megastar' ),
							'param_name' => 'radius',
							"group" => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can set border radius from here, for example: 3px, 10px, 25px also you can set value as em, % etc if you need', 'backend', 'megastar' ),
						),
						array(
							'type' => 'textarea_html',
							'holder' => 'div',
							'heading' => esc_html_x( 'Text', 'backend', 'megastar' ),
							'param_name' => 'content',
							'value' => '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>',
						)
					)	
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_testimonial_vc' );
	}