<?php
	if (function_exists('bdthemes_progress_pie')) {
		function bdthemes_progress_pie_vc() {
			vc_map( array(
				"name"        => esc_html_x( "Progress Pie", 'backend', 'megastar' ),
				"description" => esc_html_x( "Customizable progress pie", 'backend', 'megastar' ),
				"base"        => "bdt_progress_pie",
				"icon"        => "vc-progress-pie",
				'category'    => "Theme Addons",
				"params"      => array(
					array(
						'type'        => 'number',
						'heading'     => esc_html_x( 'Percent', 'backend', 'megastar' ),
						"admin_label" => true,
						'param_name'  => 'percent',
						'value'       => 75,
						'description' => esc_html_x( 'Specify percentage value.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'Before Text', 'backend', 'megastar' ),
						'param_name'  => 'before',
						'description' => esc_html_x( 'This content will be shown before the percent.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'Middle Text', 'backend', 'megastar' ),
						'param_name'  => 'text',
						'description' => esc_html_x( 'You can show custom text. Leave this field empty to show the percentage value.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'After Text', 'backend', 'megastar' ),
						'param_name'  => 'after',
						'description' => esc_html_x( 'This content will be shown after the percent.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'Progress Pie Title', 'backend', 'megastar' ),
						"admin_label" => true,
						'param_name'  => 'after_title',
						'value'       => 'Pie Title',
						'description' => esc_html_x( 'This content will be shown as progress pie title.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'Text Size', 'backend', 'megastar' ),
						'param_name'  => 'text_size',
						'description' => esc_html_x( 'Select your text size (pixel)', 'backend', 'megastar' )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html_x( 'Text Color', 'backend', 'megastar' ),
						'param_name'  => 'text_color',
						'value'       => '#444444',
						'group'       => esc_html_x( 'Styles', 'backend', 'megastar' ),
						'description' => esc_html_x( 'You can select text color from here.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html_x( 'Fill Color', 'backend', 'megastar' ),
						'param_name'  => 'fill_color',
						'value'       => '#f5f5f5',
						'group'       => esc_html_x( 'Styles', 'backend', 'megastar' ),
						'description' => esc_html_x( 'You can select fill color from here.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html_x( 'Pie Color', 'backend', 'megastar' ),
						'param_name'  => 'bar_color',
						'value'       => '#F14B51',
						'group'       => esc_html_x( 'Styles', 'backend', 'megastar' ),
						'description' => esc_html_x( 'You can select pie color from here.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'Border', 'backend', 'megastar' ),
						'param_name'  => 'border',
						'value'       => '1px solid rgba(0,0,0,.05)',
						'group'       => esc_html_x( 'Styles', 'backend', 'megastar' ),
						'description' => esc_html_x( 'Enter border value for progress pie', 'backend', 'megastar' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'Padding', 'backend', 'megastar' ),
						'param_name'  => 'padding',
						'value'       => '47px',
						'group'       => esc_html_x( 'Styles', 'backend', 'megastar' ),
						'description' => esc_html_x( 'Enter padding value for progress pie', 'backend', 'megastar' )
					),
					array(
						'type'        => 'number',
						'heading'     => esc_html_x( 'Duration', 'backend', 'megastar' ),
						'param_name'  => 'duration',
						'value'       => 1,
						'description' => esc_html_x( 'You can set animation duration as (seconds) units from here.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'number',
						'heading'     => esc_html_x( 'Delay', 'backend', 'megastar' ),
						'param_name'  => 'delay',
						'value'       => 1,
						'description' => esc_html_x( 'After mentioned time (in second) animation will start.', 'backend', 'megastar' )
					),
					array(
						'type'        => 'number',
						'heading'     => esc_html_x( 'Line Width', 'backend', 'megastar' ),
						'param_name'  => 'line_width',
						'value'       => 8,
						'description' => esc_html_x( 'Set your pie width from here.', 'backend', 'megastar' )
					),
					array(
						"type"        => "dropdown",
						"heading"     => esc_html_x( "Line Cap", 'backend', 'megastar' ),
						"param_name"  => "line_cap",
						'value'       => array(
							esc_html_x( 'Round', 'backend', 'megastar' )       => 'round',
							esc_html_x( 'Square', 'backend', 'megastar' )      => 'square',
							esc_html_x( 'Butt', 'backend', 'megastar' )        => 'butt'
		                ),
						"description" => esc_html_x( "Set your line edge cap style from here.", 'backend', 'megastar' ),
						"group"	      => esc_html_x( 'Styles', 'backend', 'megastar' ),
					)
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_progress_pie_vc' );
	}