<?php

if (function_exists('bdthemes_calltoaction')) {
	function bdthemes_calltoaction_vc() {
		vc_map( array(
			"name"        => esc_html_x( "Call to Action", 'backend', 'megastar' ),
			"description" => esc_html_x( "Make your call to action easily.", 'backend', 'megastar' ),
			"base"        => "bdt_calltoaction",
			"icon"        => "vc-call-to-action",
			'category'    => "Theme Addons",
			"params"      => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html_x( 'Title', 'backend', 'megastar' ),
					"admin_label" => true,
					'param_name'  => 'title',
					'description' => esc_html_x( 'Title of the call to aciton.', 'backend', 'megastar' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html_x( 'Button Text', 'backend', 'megastar' ),
					'param_name'  => 'button_text',
					'description' => esc_html_x( 'Button text of the call to aciton.', 'backend', 'megastar' )
				),
				array(
					'type'       => 'textarea_html',
					'heading'    => esc_html_x( 'Calltoaction Content', 'backend', 'megastar' ),
					'value'      => 'And it has huge awesome features, unlimited colors, advanced template admin options and so much more!',
					'param_name' => 'content'
				),
				array(
					"type"       => "dropdown",
					"heading"    => esc_html_x( "Align", 'backend', 'megastar' ),
					"param_name" => "align",
					'value'      => array(
						esc_html_x('Left', 'backend', 'megastar' )   => 'left',
						esc_html_x('Right', 'backend', 'megastar' )  => 'right',
						esc_html_x('Center', 'backend', 'megastar' ) => 'center'
	                ),
					"description" => esc_html_x( "Select alignment of the calltoaction.", 'backend', 'megastar' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html_x( 'Button Link', 'backend', 'megastar' ),
					'value'       => '#',
					'param_name'  => 'button_link',
					'description' => esc_html_x( 'You can type here any hyperlink to make link in button.', 'backend', 'megastar' )
				),
				array(
					"type"       => "dropdown",
					"heading"    => esc_html_x( "Target", 'backend', 'megastar' ),
					"param_name" => "target",
					'value'      => array(
						esc_html_x( 'Self', 'backend', 'megastar' )   => 'self',
						esc_html_x( 'Blank', 'backend', 'megastar' )  => 'blank'
	                ),
					"description" => esc_html_x( "Set link target self or blank.", 'backend', 'megastar' )
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html_x( 'Background', 'backend', 'megastar' ),
					'param_name'  => 'background',
					'description' => esc_html_x( 'Select your content background color.', 'backend', 'megastar' ),
					"group"       => esc_html_x( 'Styles', 'backend', 'megastar' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html_x( 'Button Radius', 'backend', 'megastar' ),
					'param_name'  => 'button_radius',
					'description' => esc_html_x( 'You can set button border radius from here.', 'backend', 'megastar' )
				)
			)
		) );
	}
	add_action( 'vc_before_init', 'bdthemes_calltoaction_vc' );
}