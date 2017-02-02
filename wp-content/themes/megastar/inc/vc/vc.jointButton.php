<?php
	if (function_exists('bdthemes_joint_button')) {
		function bdthemes_joint_button_vc() {
			vc_map(
				array(
					"name"        => esc_html_x( "Joint Button", 'backend', 'megastar' ),
					"base"        => "bdt_joint_button",
					"icon"        => "vc-joint-button",
					"category"    => "Theme Addons",
					"description" => esc_html_x( "Make Two Adjust Button.", 'backend', 'megastar' ),
					"params"      => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Left Button Text', 'backend', 'megastar' ),
							'value'       => 'Get Support',
							'param_name'  => 'left_btn_text',
							"admin_label" => true,
							'description' => esc_html_x( 'Type text here', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Left Button URL', 'backend', 'megastar' ),
							'value'       => '',
							'param_name'  => 'left_btn_url',
							'description' => esc_html_x( 'Type url here', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html_x( 'Left Button Icon', 'backend', 'megastar' ),
							'value'       => '',
							'param_name'  => 'left_btn_icon',
							'description' => esc_html_x( 'Select an icon', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Right Button Text', 'backend', 'megastar' ),
							'value'       => 'View Details',
							'param_name'  => 'right_btn_text',
							"admin_label" => true,
							'description' => esc_html_x( 'Type text here', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Middle Text', 'backend', 'megastar' ),
							'value'       => 'or',
							'param_name'  => 'middle_text',
							'description' => esc_html_x( 'Type text here', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Right Button URL', 'backend', 'megastar' ),
							'value'       => '',
							'param_name'  => 'right_btn_url',
							'description' => esc_html_x( 'Type url here', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'iconpicker',
							'heading'     => esc_html_x( 'Right Button Icon', 'backend', 'megastar' ),
							'value'       => '',
							'param_name'  => 'right_btn_icon',
							'description' => esc_html_x( 'Select an icon', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Width', 'backend', 'megastar' ),
							'value'       => '450px',
							'param_name'  => 'width',
							'description' => esc_html_x( 'Type pixel value such as: 250px, 200px etc', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Radius', 'backend', 'megastar' ),
							'value'       => '40px',
							'param_name'  => 'radius',
							'description' => esc_html_x( 'You can set value as px, em, % etc if you need', 'backend', 'megastar' ),
						),
						array(
							'type'                 => 'dropdown',
							'heading'              => esc_html_x( 'Align', 'backend', 'megastar' ),
							'param_name'           => 'align',
							'value'                => array(
								esc_html_x( 'Center', 'backend', 'megastar' ) => 'center',
								esc_html_x( 'Left', 'backend', 'megastar' )   => 'left',
								esc_html_x( 'Right', 'backend', 'megastar' )  => 'right',
							),
							'description'          => esc_html_x( 'Set button alignment from here', 'backend', 'megastar' )
						)
					)	
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_joint_button_vc' );
	}