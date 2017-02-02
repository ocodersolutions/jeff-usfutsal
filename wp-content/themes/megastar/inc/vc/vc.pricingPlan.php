<?php
	if (function_exists('bdthemes_pricing_plan')) {
		function bdthemes_pricing_plan_vc() {
			vc_map(
				array(
					"name"        => esc_html_x( "Pricing Plan", 'backend', 'megastar' ),
					"base"        => "bdt_pricing_plan",
					"category"    => "Theme Addons",
					"icon"        => "vc-pricing-plan",
					"description" => esc_html_x( "Add your pricing table in your site", 'backend', 'megastar' ),
					"params"      => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Name', 'backend', 'megastar' ),
							"admin_label" => true,
							'param_name'  => 'name',
							'value'       => 'Standard',
							'description' => esc_html_x( 'Enter text here for your pricing plan', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Price', 'backend', 'megastar' ),
							'param_name'  => 'price',
							'value'       => '19.99',
							'description' => esc_html_x( 'Specify the price for this object.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Before Price', 'backend', 'megastar' ),
							'param_name'  => 'before',
							'value'       => '$',
							'description' => esc_html_x( 'This price will be shown as before price.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'After Price', 'backend', 'megastar' ),
							'param_name'  => 'after',
							'description' => esc_html_x( 'This price will be shown as after price.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Period', 'backend', 'megastar' ),
							'param_name'  => 'period',
							'value'       => 'per month',
							'description' => esc_html_x( 'Specify period. Leave this field empty to hide this text.', 'backend', 'megastar' ),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> esc_html_x( "Featured", 'backend', 'megastar' ),
							"param_name"	=> "featured",
							"value"			=> array(
								esc_html_x( 'No', 'backend', 'megastar' ) => false,
								esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> true,
							),
							'description' => esc_html_x( 'Show this plan as featured.', 'backend', 'megastar' ),
						),
						array(
							'type'         => 'iconpicker',
							'heading'      => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'param_name'   => 'icon',
							'settings'     => array(
								'emptyIcon'    => true,
								'iconsPerPage' => 500,
							),
							'description'  => esc_html_x( 'Set icon of the pricing plan.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Button Text', 'backend', 'megastar' ),
							'param_name'  => 'btn_text',
							'value'       => 'Sign up Now',
							'description' => esc_html_x( 'Button text of the pricing plan.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Button URL', 'backend', 'megastar' ),
							'param_name'  => 'btn_url',
							'value'       => '#',
							'description' => esc_html_x( 'Button url of the pricing plan.', 'backend', 'megastar' ),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> esc_html_x( "Button Target", 'backend', 'megastar' ),
							"param_name"	=> "btn_target",
							"value"			=> array(
								esc_html_x( 'Self', 'backend', 'megastar' ) 	=> 'self',
								esc_html_x( 'Blank', 'backend', 'megastar' ) => 'blank',
							),
							'description' => esc_html_x( 'Button target of the pricing plan.', 'backend', 'megastar' ),
							"std"         => "self",
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Button Background', 'backend', 'megastar' ),
							'param_name'  => 'btn_background',
							'value'       => '#80cb2b',
							'description' => esc_html_x( 'Select button background color', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Button Color', 'backend', 'megastar' ),
							'param_name'  => 'btn_color',
							'value'       => '#ffffff',
							'description' => esc_html_x( 'Select button color', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Badge', 'backend', 'megastar' ),
							'param_name'  => 'badge',
							'description' => wp_kses(_x( 'Type your plan badge from here. Example: <strong>Populer</strong>', 'backend', 'megastar' ), array('strong'=>array())),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Badge Background', 'backend', 'megastar' ),
							'param_name'  => 'badge_background',
							'value'       => '#ed5564',
							'description' => esc_html_x( 'Select badge background color', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Plan Background', 'backend', 'megastar' ),
							'param_name'  => 'background',
							'value'       => '#f5f5f5',
							'description' => esc_html_x( 'Select plan background color', 'backend', 'megastar' ),
						),
						array(
							"type"        => "textarea_html",
							"class"       => "",
							"heading"     => esc_html_x( "Description", 'backend', 'megastar' ),
							"param_name"  => "content",
							"value"       => '<ul>
											 	<li><span style="color: #999999; margin: 10px; display: block;">Vitae adipiscing turpis. Aenean ligula nibh, molestie id vivide.</span></li>
											 	<li><strong>30GB</strong> Space amount</li>
											 	<li><strong>Unlimited</strong> users</li>
											 	<li><strong>60GB</strong> Bandwidth</li>
											 	<li>Basic Security</li>
											 	<li><strong>20</strong> MySQL Databases</li>
											</ul>',
							"description" => esc_html_x( "Provide the description for this icon box.", 'backend', 'megastar' ),
						),
					)
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_pricing_plan_vc' );
	}