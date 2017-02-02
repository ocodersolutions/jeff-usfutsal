<?php
	if (function_exists('bdthemes_inline_icon_shortcode')) {
		function bdthemes_inline_icon_vc() {
			vc_map(
				array(
					"name"        => esc_html_x( "Inline Icon", 'backend', 'megastar' ),
					"base"        => "bdt_inline_icon",
					"icon"        => "vc-icon",
					"category"    => "Theme Addons",
					"description" => esc_html_x( "Adds icon box with custom font icon", 'backend', 'megastar' ),
					"params"      => array(
						array(
							'type' => 'dropdown',
							'heading' => esc_html_x( 'Icon library', 'backend', 'megastar' ),
							'value' => array(
								esc_html_x( 'Font Awesome', 'backend', 'megastar' ) => 'fontawesome',
								esc_html_x( 'Line Icon', 'backend', 'megastar' ) => 'lineicon',
							),
							'admin_label' => true,
							'param_name' => 'type',
							'description' => esc_html_x( 'Select icon library.', 'backend', 'megastar' ),
						),
						array(
							'type' => 'iconpicker',
							'heading' => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'param_name' => 'icon_fontawesome',
							'value' => 'fa fa-adjust', // default value
							'settings' => array(
								'emptyIcon' => false,
								'iconsPerPage' => 200,
							),
							'dependency' => array(
								'element' => 'type',
								'value' => 'fontawesome',
							),
							'description' => esc_html_x( 'Select icon from library.', 'backend', 'megastar' ),
						),
						array(
							'type'       => 'iconpicker',
							'heading'    => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'param_name' => 'icon_lineicon',
							'value' => 'li li-heart', 
							'settings'   => array(
								'emptyIcon'    => false,
								'type'         => 'lineicon',
								'iconsPerPage' => 200,
							),
							'dependency' => array(
								'element' => 'type',
								'value' => 'lineicon',
							),
							'description' => esc_html_x( 'Select icon from library.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Icon color', 'backend', 'megastar' ),
							'param_name'  => 'color',
							'value'       => '#333333',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'This color will be applied to the selected icon.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Icon Background', 'backend', 'megastar' ),
							'param_name'  => 'background',
							'value'       => '',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Select icon background color.', 'backend', 'megastar' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Icon Size', 'backend', 'megastar' ),
							'param_name'  => 'size',
							'value'       => '16',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can set icon size from here. Icon size set only pixel value.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Icon Border', 'backend', 'megastar' ),
							'param_name'  => 'border',
							'value'       => '0px solid #cccccc',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can set content border from here.', 'backend', 'megastar' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html_x( 'Border  Radius', 'backend', 'megastar' ),
							'param_name' => 'radius',
							'value'      => '0px',
							'group'      => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => wp_kses(_x( "You can set border radius from here, for example: <b class='su-generator-set-value' title='Click to set this value'>3px</b> <b class='su-generator-set-value' title='Click to set this value'>10px</b> <b class='su-generator-set-value' title='Click to set this value'>25px</b> also you can set value as em, % etc if you need", 'backend', 'megastar' ), array('b'=>array())),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Icon Margin', 'backend', 'megastar' ),
							'param_name'  => 'margin',
							'value'       => '0px',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can set margin from here.', 'backend', 'megastar' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html_x( 'Icon Padding', 'backend', 'megastar' ),
							'param_name' => 'padding',
							'value'      => '15px',
							'group'      => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => wp_kses(_x( "You can set padding from here, for example: <b class='su-generator-set-value' title='Click to set this value'>5px</b> <b class='su-generator-set-value' title='Click to set this value'>10px</b> <b class='su-generator-set-value' title='Click to set this value'>25px</b> also you can set value as em, % etc if you need", 'backend', 'megastar' ), array('b'=>array())),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'URL', 'backend', 'megastar' ),
							'param_name'  => 'url',
							'description' => esc_html_x( 'URL/Link of the author. Leave empty to disable link.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html_x( 'Link Target', 'backend', 'megastar' ),
							'param_name'  => 'target',
							'description' => esc_html_x( 'Select where to open  custom links.', 'backend', 'megastar' ),
							'value'       => array(
								esc_html_x( 'Same window', 'backend', 'megastar' ) => '_self',
								esc_html_x( 'New window', 'backend', 'megastar' ) => '_blank',
							),		
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Inline Text', 'backend', 'megastar' ),
							'param_name'  => 'inline_text',
							'description' => esc_html_x( '(optional) if you want show text with icon', 'backend', 'megastar' ),
						)
					) 
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_inline_icon_vc' );
	}