<?php
	if (function_exists('bdthemes_divider')) {
		function bdthemes_divider_vc() {
			vc_map( array(
				"name"        => esc_html_x( "Divider", 'backend', 'megastar' ),
				"description" => esc_html_x( "Setting of Yes can cause for show divider", 'backend', 'megastar' ),
				"base"        => "bdt_divider",
				"icon"        => "vc-divider",
				'category'    => "Theme Addons",
				"params"      => array(
			   		array(
						"type"       => "dropdown",
						"heading"    => esc_html_x( "Divider Align", 'backend', 'megastar' ),
						"param_name" => "align",
		                'value'  => array(
		                    esc_html_x( 'center', 'backend', 'megastar' )  => 'center',
		                    esc_html_x( 'left', 'backend', 'megastar' )    => 'left',
		                    esc_html_x( 'right', 'backend', 'megastar' )   => 'right',
		                ),
						"description" => esc_html_x( "Select divider alignment here.", 'backend', 'megastar' ),
					),
					array(
						"type"       => "dropdown",
						"heading"    => esc_html_x( "Icon Align", 'backend', 'megastar' ),
						"param_name" => "icon_align",
		                'value'  => array(
		                    esc_html_x( 'center', 'backend', 'megastar' )  => 'center',
		                    esc_html_x( 'left', 'backend', 'megastar' )    => 'left',
		                    esc_html_x( 'right', 'backend', 'megastar' )   => 'right',
		                ),
						"description" => esc_html_x( "You can set icon alignment from here.", 'backend', 'megastar' ),
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Show Top Link", 'backend', 'megastar' ),
						"param_name"	=> "top",
						"description"	=> esc_html_x( "Set show or hide top link here.", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Force Fullwidth", 'backend', 'megastar' ),
						"param_name"	=> "force_fullwidth",
						"description"	=> esc_html_x( "Force fullwidht of the divider.", 'backend', 'megastar' )
					),
					array(
						"type"       => "dropdown",
						"heading"    => esc_html_x( "Divider Style", 'backend', 'megastar' ),
						"param_name" => "style",
						'value'      => array(
							esc_html_x( 'Single Line', 'backend', 'megastar' )   => '1',
							esc_html_x( 'Double Line', 'backend', 'megastar' )   => '2',
							esc_html_x( 'Single Dashed', 'backend', 'megastar' ) => '3',
							esc_html_x( 'Double Dashed', 'backend', 'megastar' ) => '4',
							esc_html_x( 'Single Dotted', 'backend', 'megastar' ) => '5',
							esc_html_x( 'Double Dotted', 'backend', 'megastar' ) => '6',
							esc_html_x( 'Striped', 'backend', 'megastar' )       => '7',
		                ),
						"description" => esc_html_x( "Select divider style from here.", 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html_x( 'Style Color', 'backend', 'megastar' ),
						'param_name' => 'color',
						'value' => '#c5c5c5',
						'description' => esc_html_x( 'Set divider style color.', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
					array(
						"type"       => "checkbox",
						"class"      => "",
						"heading"    => esc_html_x( "Add Divider Icon", 'backend', 'megastar' ),
						"param_name" => "add_icon",
						"value"      => array(
							esc_html_x( "Yes", 'backend', 'megastar' ) => "yes"
						),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
						"description" => esc_html_x( "Add icon of the divider, just check it.", 'backend', 'megastar' ),
					),
					array(
						'type' => 'iconpicker',
						'heading' => esc_html_x( 'Divider Icon', 'backend', 'megastar' ),
						'param_name' => 'icon',
						'settings' => array(
							'iconsPerPage' => 100, // default 100, how many icons per/page to display
						),
						'description' => esc_html_x( 'Click on the icon picker to pick an icons for this shortcode.', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
						'dependency'       => array(
							'element' => 'add_icon',
							'value'   => 'yes',
						),
					),
					array(
						"type"       => "dropdown",
						"heading"    => esc_html_x( "Icon Style", 'backend', 'megastar' ),
						"param_name" => "icon_style",
		                'value'  => array(
							esc_html_x( 'Default', 'backend', 'megastar' )    => '1',
							esc_html_x( 'Background', 'backend', 'megastar' ) => '2',
							esc_html_x( 'Border', 'backend', 'megastar' )     => '3'
		                ),
						"description" => esc_html_x( "Set icon style from here.", 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
						'dependency'       => array(
							'element' => 'add_icon',
							'value'   => 'yes',
						),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html_x( 'Icon Color', 'backend', 'megastar' ),
						'param_name' => 'icon_color',
						'value' => '#c5c5c5',
						'description' => esc_html_x( 'Set icon color from here.', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
						'dependency'       => array(
							'element' => 'add_icon',
							'value'   => 'yes',
						),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Icon Size', 'backend', 'megastar' ),
						'param_name' => 'icon_size',
						'value' => 16,
						'description' => esc_html_x( 'Select your icon size. It will be set in pixel value', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
						'dependency'       => array(
							'element' => 'add_icon',
							'value'   => 'yes',
						),
					),
					array(
						'type' => 'number',
						'heading' => esc_html_x( 'Divider Width', 'backend', 'megastar' ),
						'param_name' => 'width',
						'value' => 100,
						'description' => esc_html_x( 'Set divider width from here.', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Margin Top', 'backend', 'megastar' ),
						'param_name' => 'margin_top',
						'value' => '10px',
						'description' => esc_html_x( 'Top margin of the divider', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Margin Bottom', 'backend', 'megastar' ),
						'param_name' => 'margin_bottom',
						'value' => '10px',
						'description' => esc_html_x( 'Bottom margin of the divider', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_divider_vc' );
	}