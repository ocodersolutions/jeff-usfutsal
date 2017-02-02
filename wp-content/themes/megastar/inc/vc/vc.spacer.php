<?php
	if (function_exists('bdthemes_spacer_shortcode')) {
		function bdthemes_spacer_vc() {
			vc_map( 
				array(
					"name"					=> esc_html_x( "Spacer", 'backend', 'megastar' ),
					"description"			=> esc_html_x( "Empty space with adjust table height", 'backend', 'megastar' ),
					"base"					=> "bdt_spacer",
					"icon"					=> "vc-spacer",
					'category'				=> "Theme Addons",
					"params"				=> array(
						array(
							"type"			=> "textfield",
							"heading"		=> esc_html_x( "Spacer Size", 'backend', 'megastar' ),
							"admin_label"	=> true,
							"param_name"	=> "size",
							"value"			=> "20",
							"description"	=> esc_html_x( "Set your spacer height. it's set px value", 'backend', 'megastar' )
						)
					)
				)
		 	);
		}
		add_action( 'vc_before_init', 'bdthemes_spacer_vc' );
	}