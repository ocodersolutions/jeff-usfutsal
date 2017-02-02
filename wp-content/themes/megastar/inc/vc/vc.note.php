<?php
	if (function_exists('bdthemes_note_shortcode')) {
		function bdthemes_note_vc() {
			vc_map( array(
				"name"					=> esc_html_x( "Note", 'backend', 'megastar' ),
				"description"			=> esc_html_x( "Superb! various note style", 'backend', 'megastar' ),
				"base"					=> "bdt_note",
				"icon"					=> "vc-note",
				'category'				=> "Theme Addons",
				"params"				=> array(
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Style", 'backend', 'megastar' ),
						"param_name"	=> "style",
						"value"			=> array(
							esc_html_x( "Style 1", 'backend', 'megastar' )	=> "1",
							esc_html_x( "Style 2", 'backend', 'megastar' )  => "2",
							esc_html_x( "Style 3", 'backend', 'megastar' )  => "3",
							esc_html_x( "Style 4", 'backend', 'megastar' )  => "4",
							esc_html_x( "Style 5", 'backend', 'megastar' )  => "5",
							esc_html_x( "Style 6", 'backend', 'megastar' )  => "6",
						),
						"description"	=> esc_html_x( "You can set four attractive note style. You can set any style with any type", 'backend', 'megastar' )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Type", 'backend', 'megastar' ),
						"param_name"	=> "type",
						"value"			=> array(
							esc_html_x( "Info", 'backend', 'megastar' )    => "info",
							esc_html_x( "Success", 'backend', 'megastar' ) => "success",
							esc_html_x( "Warning", 'backend', 'megastar' ) => "warning",
							esc_html_x( "Danger", 'backend', 'megastar' )  => "danger",
						),
						"description"	=> esc_html_x( "You can set any note type into four note type. Please! select as you need.", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Icon", 'backend', 'megastar' ),
						"param_name"	=> "icon",
						"value" => array(
							esc_html_x( "Yes", 'backend', 'megastar' ) => "yes"
						),
						"description"	=> esc_html_x( "If you want to show note icon then please select yes. default value is no", 'backend', 'megastar' )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html_x( "Radius", 'backend', 'megastar' ),
						"param_name"	=> "radius",
						"value"			=> "3px",
						"description"	=> esc_html_x( "You can set border radius from here, for example: 3px 10px 25px also you can set value as em, % etc if you need", 'backend', 'megastar' )
					),
					array(
						'type'       => 'textarea_html',
						'holder'     => 'div',
						'heading'    => esc_html_x( 'Text', 'backend', 'megastar' ),
						'param_name' => 'content',
						'value'      => esc_html_x( "Heads up! This alert needs your attention, but it's not super important.", 'backend', 'megastar' ),
					)
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_note_vc' );
	}