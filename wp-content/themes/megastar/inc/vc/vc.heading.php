<?php
	if (function_exists('bdthemes_heading')) {
		function bdthemes_heading_vc() {
			vc_map( array(
				"name"        => esc_html_x( "Heading", 'backend', 'megastar' ),
				"description" => esc_html_x( "Huge heading collection.", 'backend', 'megastar' ),
				"base"        => "bdt_heading",
				"icon"        => "vc-heading",
				'category'    => "Theme Addons",
				"params"      => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'Heading Text', 'backend', 'megastar' ),
						"admin_label" => true,
						'value'       => "This is a heading",
						'param_name'  => 'content',
						'description' => esc_html_x( 'Type your heading text here.', 'backend', 'megastar' )
					),
					array(
						"type"       => "dropdown",
						"heading"    => esc_html_x( "Heading Tag", 'backend', 'megastar' ),
						"param_name" => "heading",
						'value'      => array(
							esc_html_x( 'H1', 'backend', 'megastar' )   => 'h1',
							esc_html_x( 'H2', 'backend', 'megastar' )   => 'h2',
							esc_html_x( 'H3', 'backend', 'megastar' )   => 'h3',
							esc_html_x( 'H4', 'backend', 'megastar' )   => 'h4',
							esc_html_x( 'H5', 'backend', 'megastar' )   => 'h5',
							esc_html_x( 'H6', 'backend', 'megastar' )   => 'h6'
		                ),
						"description" => esc_html_x( "Select heading tag from here.", 'backend', 'megastar' ),
					),
					array(
						"type"        => "dropdown",
						"heading"     => esc_html_x( "Heading Style", 'backend', 'megastar' ),
						"param_name"  => "style",
						'value'       => array(
							esc_html_x( 'Default', 'backend', 'megastar' )            => 'default',
							esc_html_x( 'Style 1', 'backend', 'megastar' )            => '1',
							esc_html_x( 'Style 2', 'backend', 'megastar' )            => '2',
							esc_html_x( 'Style 3', 'backend', 'megastar' )            => '3',
							esc_html_x( 'Style 4', 'backend', 'megastar' )            => '4',
							esc_html_x( 'Style 5', 'backend', 'megastar' )            => '5',
							esc_html_x( 'Style 6', 'backend', 'megastar' )            => '6',
							esc_html_x( 'Style 7', 'backend', 'megastar' )            => '7',
							esc_html_x( 'Style 8', 'backend', 'megastar' )            => '8',
							esc_html_x( 'Style 9', 'backend', 'megastar' )            => '9',
							esc_html_x( 'Style 10', 'backend', 'megastar' )           => '10',
							esc_html_x( 'Modern 1 Dark', 'backend', 'megastar' )      => 'modern-1-dark',
							esc_html_x( 'Modern 1 Light', 'backend', 'megastar' )     => 'modern-1-light',
							esc_html_x( 'Modern 1 Blue', 'backend', 'megastar' )      => 'modern-1-blue',
							esc_html_x( 'Modern 1 Orange', 'backend', 'megastar' )    => 'modern-1-orange',
							esc_html_x( 'Modern 1 Violet', 'backend', 'megastar' )    => 'modern-1-violet',
							esc_html_x( 'Modern 2 Dark', 'backend', 'megastar' )      => 'modern-2-dark',
							esc_html_x( 'Modern 2 Light', 'backend', 'megastar' )     => 'modern-2-light',
							esc_html_x( 'Modern 2 Blue', 'backend', 'megastar' )      => 'modern-2-blue',
							esc_html_x( 'Modern 2 Orange', 'backend', 'megastar' )    => 'modern-2-orange',
							esc_html_x( 'Modern 2 Violet', 'backend', 'megastar' )    => 'modern-2-violet',
							esc_html_x( 'Line Dark', 'backend', 'megastar' )          => 'line-dark',
							esc_html_x( 'Line Light', 'backend', 'megastar' )         => 'line-light',
							esc_html_x( 'Line Blue', 'backend', 'megastar' )          => 'line-blue',
							esc_html_x( 'Line Orange', 'backend', 'megastar' )        => 'line-orange',
							esc_html_x( 'Line Violet', 'backend', 'megastar' )        => 'line-violet',
							esc_html_x( 'Dotted Line Dark', 'backend', 'megastar' )   => 'dotted-line-dark',
							esc_html_x( 'Dotted Line Light', 'backend', 'megastar' )  => 'dotted-line-light',
							esc_html_x( 'Dotted Line Blue', 'backend', 'megastar' )   => 'dotted-line-blue',
							esc_html_x( 'Dotted Line Orange', 'backend', 'megastar' ) => 'dotted-line-orange',
							esc_html_x( 'Dotted Line Violet', 'backend', 'megastar' ) => 'dotted-line-violet',
							esc_html_x( 'Flat Dark', 'backend', 'megastar' )          => 'flat-dark',
							esc_html_x( 'Flat Light', 'backend', 'megastar' )         => 'flat-light',
							esc_html_x( 'Flat Blue', 'backend', 'megastar' )          => 'flat-blue',
							esc_html_x( 'Flat Green', 'backend', 'megastar' )         => 'flat-green',
							esc_html_x( 'Small Line', 'backend', 'megastar' )         => 'small-line',
							esc_html_x( 'Fancy', 'backend', 'megastar' )              => 'fancy'
		                ),
						"description" => esc_html_x( "Select heading style from here.", 'backend', 'megastar' ),
						"group"	=> esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
					array(
						"type"       => "dropdown",
						"heading"    => esc_html_x( "Heading Align", 'backend', 'megastar' ),
						"param_name" => 'align',
						'value'      => array(
							esc_html_x( 'Center', 'backend', 'megastar' ) => 'center',
							esc_html_x( 'Left', 'backend', 'megastar' )   => 'left',
							esc_html_x( 'Right', 'backend', 'megastar' )  => 'right'
		                ),
						"description" => esc_html_x( "Select heading align from here.", 'backend', 'megastar' ),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html_x( 'Heading Color', 'backend', 'megastar' ),
						'param_name'  => 'color',
						'description' => esc_html_x( 'Color of the heading text.', 'backend', 'megastar' ),
						"group"       => esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
					array(
						'type'        => 'number',
						'heading'     => esc_html_x( 'Heading Width', 'backend', 'megastar' ),
						'param_name'  => 'width',
						'description' => esc_html_x( 'Set heading width from here.', 'backend', 'megastar' ),
						"group"       => esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
					array(
						'type'        => 'number',
						'heading'     => esc_html_x( 'Heading Size', 'backend', 'megastar' ),
						'param_name'  => 'size',
						'value'       => 24,
						'description' => esc_html_x( 'Set heading size from here.', 'backend', 'megastar' ),
						"group"       => esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'Margin Bottom', 'backend', 'megastar' ),
						'param_name'  => 'margin',
						'description' => esc_html_x( 'Margin bottom of the hading.', 'backend', 'megastar' ),
						"group"       => esc_html_x( 'Styles', 'backend', 'megastar' ),
					),
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_heading_vc' );
	}