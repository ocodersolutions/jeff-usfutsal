<?php
	if (function_exists('bdthemes_progress_bar')) {
		function bdthemes_progress_bar_vc() {
			vc_map( array(
				"name"        => esc_html_x( "Progress Bar", 'backend', 'megastar' ),
				"description" => esc_html_x( "Show performence in bar chart", 'backend', 'megastar' ),
				"base"        => "bdt_progress_bar",
				"icon"        => "vc-progress-bar",
				'category'    => "Theme Addons",
				"params"      => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html_x( 'Progress Bar Text', 'backend', 'megastar' ),
						'value' => "HTML",
						'param_name' => 'text',
						'description' => esc_html_x( 'Type your progress bar text to this input box.', 'backend', 'megastar' )
					),
					array(
						'type' => 'number',
						'heading' => esc_html_x( 'Percent', 'backend', 'megastar' ),
						'param_name' => 'percent',
						'value' => 75,
						'description' => esc_html_x( 'Percentage of the progress bar.', 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Show Percent", 'backend', 'megastar' ),
						"param_name"	=> "show_percent",
						"value" => array(
							esc_html_x( "Yes", 'backend', 'megastar' ) => "yes"
						),
						"description"	=> esc_html_x( "You can show or hide percent from here.", 'backend', 'megastar' )
					),
					array(
						"type"       => "dropdown",
						"heading"    => esc_html_x( "Animation", 'backend', 'megastar' ),
						"param_name" => "animation",
						'value'      => array(
							esc_html_x( 'linear', 'backend', 'megastar' )           => 'linear',
							esc_html_x( 'swing', 'backend', 'megastar' )            => 'swing',
							esc_html_x( 'jswing', 'backend', 'megastar' )           => 'jswing',
							esc_html_x( 'easeInQuad', 'backend', 'megastar' )       => 'easeInQuad',
							esc_html_x( 'easeInCubic', 'backend', 'megastar' )      => 'easeInCubic',
							esc_html_x( 'easeInQuart', 'backend', 'megastar' )      => 'easeInQuart',
							esc_html_x( 'easeInQuint', 'backend', 'megastar' )      => 'easeInQuint',
							esc_html_x( 'easeInSine', 'backend', 'megastar' )       => 'easeInSine',
							esc_html_x( 'easeInExpo', 'backend', 'megastar' )       => 'easeInExpo',
							esc_html_x( 'easeInCirc', 'backend', 'megastar' )       => 'easeInCirc',
							esc_html_x( 'easeInElastic', 'backend', 'megastar' )    => 'easeInElastic',
							esc_html_x( 'easeInBack', 'backend', 'megastar' )       => 'easeInBack',
							esc_html_x( 'easeInBounce', 'backend', 'megastar' )     => 'easeInBounce',
							esc_html_x( 'easeOutQuad', 'backend', 'megastar' )      => 'easeOutQuad',
							esc_html_x( 'easeOutCubic', 'backend', 'megastar' )     => 'easeOutCubic',
							esc_html_x( 'easeOutQuart', 'backend', 'megastar' )     => 'easeOutQuart',
							esc_html_x( 'easeOutQuint', 'backend', 'megastar' )     => 'easeOutQuint',
							esc_html_x( 'easeOutSine', 'backend', 'megastar' )      => 'easeOutSine',
							esc_html_x( 'easeOutExpo', 'backend', 'megastar' )      => 'easeOutExpo',
							esc_html_x( 'easeOutCirc', 'backend', 'megastar' )      => 'easeOutCirc',
							esc_html_x( 'easeOutElastic', 'backend', 'megastar' )   => 'easeOutElastic',
							esc_html_x( 'easeOutBack', 'backend', 'megastar' )      => 'easeOutBack',
							esc_html_x( 'easeOutBounce', 'backend', 'megastar' )    => 'easeOutBounce',
							esc_html_x( 'easeInOutQuad', 'backend', 'megastar' )    => 'easeInOutQuad',
							esc_html_x( 'easeInOutCubic', 'backend', 'megastar' )   => 'easeInOutCubic',
							esc_html_x( 'easeInOutQuart', 'backend', 'megastar' )   => 'easeInOutQuart',
							esc_html_x( 'easeInOutQuint', 'backend', 'megastar' )   => 'easeInOutQuint',
							esc_html_x( 'easeInOutSine', 'backend', 'megastar' )    => 'easeInOutSine',
							esc_html_x( 'easeInOutExpo', 'backend', 'megastar' )    => 'easeInOutExpo',
							esc_html_x( 'easeInOutCirc', 'backend', 'megastar' )    => 'easeInOutCirc',
							esc_html_x( 'easeInOutElastic', 'backend', 'megastar' ) => 'easeInOutElastic',
							esc_html_x( 'easeInOutBack', 'backend', 'megastar' )    => 'easeInOutBack',
							esc_html_x( 'easeInOutBounce', 'backend', 'megastar' )  => 'easeInOutBounce'
		                ),
						"description" => esc_html_x( "Select animation of the progress bar.", 'backend', 'megastar' ),
					),
					array(
						'type' => 'number',
						'heading' => esc_html_x( 'Duration', 'backend', 'megastar' ),
						'param_name' => 'duration',
						'value' => 1.5,
						'description' => esc_html_x( 'You can set animation duration as (seconds) units from here.', 'backend', 'megastar' )
					),
					array(
						'type' => 'number',
						'heading' => esc_html_x( 'Delay', 'backend', 'megastar' ),
						'param_name' => 'delay',
						'value' => 0.3,
						'description' => esc_html_x( 'After mentioned time (in second) animation will start.', 'backend', 'megastar' )
					),
					array(
						"type"       => "dropdown",
						"heading"    => esc_html_x( "Styles", 'backend', 'megastar' ),
						"param_name" => "style",
						'value'      => array(
							esc_html_x( 'Default', 'backend', 'megastar' )   => '1',
							esc_html_x( 'Fancy', 'backend', 'megastar' )     => '2',
							esc_html_x( 'Thin', 'backend', 'megastar' )      => '3',
							esc_html_x( 'Striped', 'backend', 'megastar' )   => '4',
							esc_html_x( 'Animation', 'backend', 'megastar' ) => '5'
		                ),
						"description" => esc_html_x( "Select style of the progress bar.", 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html_x( 'Text Color', 'backend', 'megastar' ),
						'param_name' => 'text_color',
						'description' => esc_html_x( 'This color will be applied to the text.', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' )
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html_x( 'Bar Color', 'backend', 'megastar' ),
						'param_name' => 'bar_color',
						'description' => esc_html_x( 'You can set progress bar background color from here.', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' )
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html_x( 'Fill Color', 'backend', 'megastar' ),
						'param_name' => 'fill_color',
						'description' => esc_html_x( 'Select progress bar fill color, if you need it transparent color.', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' )
					),
					array(
						'type' => 'number',
						'heading' => esc_html_x( 'Progress Bar Margin', 'backend', 'megastar' ),
						'param_name' => 'margin',
						'value' => 0,
						'description' => esc_html_x( 'This value will be apply on progress bar bottom margin.', 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' )
					)
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_progress_bar_vc' );
	}