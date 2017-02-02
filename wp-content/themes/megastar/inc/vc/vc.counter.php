<?php

if (function_exists('bdthemes_counter_shortcode')) {		
	function bdthemes_counter_vc() {
		vc_map(
			array(
				"name"        => esc_html_x( "Counter", 'backend', 'megastar' ),
				"base"        => "bdt_counter",
				"class"       => "vc_counter",
				"icon"        => "vc-counter",
				"category"    => "Theme Addons",
				"description" => esc_html_x( "Add animated counting number", 'backend', 'megastar' ),
				"params"      => array(
					array(
				   		"type" => "textfield",
						"heading" => esc_html_x( "Count Start", 'backend', 'megastar' ),
						"param_name" => "count_start",
						"value" => "0", 
						"description" => esc_html_x( "Enter the number that is minimum number of the counter where from counter will start counting", 'backend', 'megastar' ),
					),
					array(
				   		"type" => "textfield",
						"heading" => esc_html_x( "Count End", 'backend', 'megastar' ),
						"param_name" => "count_end",
						"value" => "5000", 
						"description" => esc_html_x( "Enter the number that is maximum number of the counter where to counter will finish counting", 'backend', 'megastar' ),
					),
					array(
				   		"type" => "textfield",
						"heading" => esc_html_x( "Count Speed", 'backend', 'megastar' ),
						"param_name" => "counter_speed",
						"value" => "5", 
						"description" => esc_html_x( "Counting will finish in specified time (in second)", 'backend', 'megastar' ),
					),
					array(
				   		"type" => "textfield",
						"heading" => esc_html_x( "Prefix Text", 'backend', 'megastar' ),
						"param_name" => "prefix",
						"value" => "", 
						"description" => esc_html_x( "You can add text before the count number. For example: $ sign", 'backend', 'megastar' ),
					),
					array(
				   		"type" => "textfield",
						"heading" => esc_html_x( "Suffix Text", 'backend', 'megastar' ),
						"param_name" => "suffix",
						"value" => "", 
						"description" => esc_html_x( "You can add text after the count number. For example: /-", 'backend', 'megastar' ),
					),
					array(
						"type"       => "checkbox",
						"class"      => "",
						"heading"    => esc_html_x( "Separator", 'backend', 'megastar' ),
						"param_name" => "separator",
						"value"      => array(
							esc_html_x( "Yes", 'backend', 'megastar' ) => "yes"
						),
						"description" => esc_html_x( "You can separate count text by comma(,) if you select yes.For example: 1,500", 'backend', 'megastar' ),
					),
					array(
						"type"       => "checkbox",
						"class"      => "",
						"heading"    => esc_html_x( "Add Icon", 'backend', 'megastar' ),
						"param_name" => "add_icon",
						"value"      => array(
							esc_html_x( "Yes", 'backend', 'megastar' ) => "yes"
						),
						"description" => esc_html_x( "If you want to add icon with counter, just check it.", 'backend', 'megastar' ),
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html_x( 'Icon', 'backend', 'megastar' ),
						'param_name' => 'icon',
						'value'      => '', // default value to backend editor admin_label
						'settings' 	 => array(
							'emptyIcon'    => false,
							'iconsPerPage' => 500,
						),
						"group" => esc_html_x( "Icon", 'backend', 'megastar' ),
						'description'      => esc_html_x( 'Select icon from library.', 'backend', 'megastar' ),
						'dependency'       => array(
							'element' => 'add_icon',
							'value'   => 'yes',
						),
					),
					array(
				   		"type" => "dropdown",
						"heading" => esc_html_x( "Icon Align", 'backend', 'megastar' ),
						"param_name" => "align",
						"value" => array(
							esc_html_x( "Top", 'backend', 'megastar' )=>'top',
							esc_html_x( "Left", 'backend', 'megastar' )=>"left",
							esc_html_x( "Right", 'backend', 'megastar' )=>"right",
						),
						"group" => esc_html_x( "Icon", 'backend', 'megastar' ),
						"description" => esc_html_x( "You can set alignment from here.", 'backend', 'megastar' ),
						'dependency'       => array(
							'element' => 'add_icon',
							'value'   => 'yes',
						),
					),
					array(
				   		"type" => "colorpicker",
						"heading" => esc_html_x( "Icon Color", 'backend', 'megastar' ),
						"param_name" => "icon_color",
						"value" => "",
						"description" => esc_html_x( "Text color for time ticks Period.", 'backend', 'megastar' ),
						"group" => esc_html_x( "Icon", 'backend', 'megastar' ),
						'dependency'       => array(
							'element' => 'add_icon',
							'value'   => 'yes',
						),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Icon  Size', 'backend', 'megastar' ),
						'param_name' => 'icon_size',
						'value' => "24px",
						'description' => esc_html_x( 'Select your object size. Its will be set in pixel value', 'backend', 'megastar' ),
						"group" => esc_html_x( "Icon", 'backend', 'megastar' ),
						'dependency'       => array(
							'element' => 'add_icon',
							'value'   => 'yes',
						),
					),
					array(
				   		"type" => "colorpicker",
						"heading" => esc_html_x( "Count Color", 'backend', 'megastar' ),
						"param_name" => "count_color",
						"value" => "#444444",
						"group" => esc_html_x( "Style", 'backend', 'megastar' ),
						"description" => esc_html_x( "Text color for time ticks Period.", 'backend', 'megastar' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Count  Size', 'backend', 'megastar' ),
						'param_name' => 'count_size',
						'value' => "32px",
						"group" => esc_html_x( "Style", 'backend', 'megastar' ),
						'description' => esc_html_x( 'Select your object size. Its will be set in pixel value', 'backend', 'megastar' ),
					),
					array(
				   		"type" => "colorpicker",
						"heading" => esc_html_x( "Text Color", 'backend', 'megastar' ),
						"param_name" => "text_color",
						"value" => "#666666",
						"group" => esc_html_x( "Style", 'backend', 'megastar' ),
						"description" => esc_html_x( "Text color for time ticks Period.", 'backend', 'megastar' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Text  Size', 'backend', 'megastar' ),
						'param_name' => 'text_size',
						'value' => "14px",
						"group" => esc_html_x( "Style", 'backend', 'megastar' ),
						'description' => esc_html_x( 'Select your object size. Its will be set in pixel value', 'backend', 'megastar' ),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html_x( 'Background', 'backend', 'megastar' ),
						'param_name' => 'background',
						'value' => 'transparent',
						"group" => esc_html_x( "Style", 'backend', 'megastar' ),
						'description' => esc_html_x( 'Select background color.', 'backend', 'megastar' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Padding', 'backend', 'megastar' ),
						'param_name' => 'padding',
						'value' => '15px',
						"group" => esc_html_x( "Style", 'backend', 'megastar' ),
						'description' => wp_kses(_x( 'Select counter padding from here. support <strong>px, em</strong> value.', 'backend', 'megastar' ), array('strong'=>array())),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Border', 'backend', 'megastar' ),
						'param_name' => 'border',
						'value' => '0px solid #cccccc',
						"group" => esc_html_x( "Style", 'backend', 'megastar' ),
						'description' => esc_html_x( 'You can set content border from here.', 'backend', 'megastar' ),
					),
					// Add some description
					array(
						"type" => "textarea_html",
						"heading" => esc_html_x( "Description", 'backend', 'megastar' ),
						"param_name" => "content",
						"value" => "",
						"description" => esc_html_x( "Provide the description for this icon box.", 'backend', 'megastar' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Extra class name', 'backend', 'megastar' ),
						'param_name' => 'el_class',
						'description' => esc_html_x( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'backend', 'megastar' ),
					)
				)	
			)
		);
	}
	add_action( 'vc_before_init', 'bdthemes_counter_vc' );
}	