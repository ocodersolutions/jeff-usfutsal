<?php
	if (function_exists('bdthemes_icon_list_item_shortcode')) {
		function bdthemes_icon_list_item_vc() {
			vc_map(
				array(
					"name"        => esc_html_x( "Icon List Item", 'backend', 'megastar' ),
					"base"        => "bdt_icon_list_item",
					"category"    => "Theme Addons",
					"icon"        => "vc-icon-list",
					"description" => esc_html_x( "Adds icon box with custom font icon", 'backend', 'megastar' ),
					"params"      => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Title', 'backend', 'megastar' ),
							"admin_label" => true,
							'param_name'  => 'title',
							'value'       => 'Icon List Heading',
							'description' => esc_html_x( 'Enter text here that you want to show for title', 'backend', 'megastar' ),
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html_x( 'Icon library', 'backend', 'megastar' ),
							'value' => array(
								esc_html_x( 'Font Awesome', 'backend', 'megastar' ) => 'fontawesome',
								esc_html_x( 'Line Icon', 'backend', 'megastar' ) => 'lineicon',
								esc_html_x( 'Image', 'backend', 'megastar' ) => 'image',
							),
							'admin_label' => true,
							'param_name' => 'type',
							'description' => esc_html_x( 'Select icon library.', 'backend', 'megastar' ),
						),
						array(
							'type' => 'iconpicker',
							'heading' => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'param_name' => 'icon_fontawesome',
							'value' => 'fa fa-adjust',
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
							'type' => 'attach_image',
							'heading' => esc_html_x( 'Image', 'backend', 'megastar' ),
							'param_name' => 'image',
							'value' => '',
							'description' => esc_html_x( 'Select image from media library.', 'backend', 'megastar' ),
							'dependency' => array(
								'element' => 'source',
								'value' => 'media_library',
							),
							'dependency' => array(
								'element' => 'type',
								'value' => 'image',
							),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Title Color', 'backend', 'megastar' ),
							'param_name'  => 'title_color',
							'value'       => '#444444',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can select title color from here.', 'backend', 'megastar' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Title  Size', 'backend', 'megastar' ),
							'param_name'  => 'title_size',
							'value'       => '16px',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can change title size from here.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Icon  Size', 'backend', 'megastar' ),
							'param_name'  => 'icon_size',
							'value'       => 24,
							'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Select your object size. Its will be set in pixel value', 'backend', 'megastar' ),
						),
						array(
							'type'                       => 'dropdown',
							'heading'                    => esc_html_x( 'Icon Animation', 'backend', 'megastar' ),
							'param_name'                 => 'icon_animation',
							'value'                      => array(
								esc_html_x( 'No Animation', 'backend', 'megastar' ) => '',
								esc_html_x( 'Animation 1', 'backend', 'megastar' )  => '1',
								esc_html_x( 'Animation 2', 'backend', 'megastar' )  => '2',
								esc_html_x( 'Animation 3', 'backend', 'megastar' )  => '3',
								esc_html_x( 'Animation 4', 'backend', 'megastar' )  => '4',
								esc_html_x( 'Animation 5', 'backend', 'megastar' )  => '5'
							),
							'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Select your icon list icon hover animation', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Text Color', 'backend', 'megastar' ),
							'param_name'  => 'color',
							'value'       => '#333333',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Select custom icon color.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Icon color', 'backend', 'megastar' ),
							'param_name'  => 'icon_color',
							'value'       => '#333333',
							'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Select custom icon color.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Icon Background', 'backend', 'megastar' ),
							'param_name'  => 'icon_background',
							'value'       => '',
							'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Select icon background color.', 'backend', 'megastar' )
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Icon Border', 'backend', 'megastar' ),
							'param_name'  => 'icon_border',
							'value'       => '0px solid #cccccc',
							'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can set content border from here.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Icon  Radius', 'backend', 'megastar' ),
							'param_name'  => 'icon_radius',
							'value'       => '0px',
							'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'description' => wp_kses(_x( "You can set border radius from here, for example: <b class='su-generator-set-value' title='Click to set this value'>3px</b> <b class='su-generator-set-value' title='Click to set this value'>10px</b> <b class='su-generator-set-value' title='Click to set this value'>25px</b> also you can set value as em, % etc if you need", 'backend', 'megastar' ), array('b'=>array())),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Icon Shadow', 'backend', 'megastar' ),
							'param_name'  => 'icon_shadow',
							'value'       => '0px 0px 0px #ddd',
							'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can set object shadow from here', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Icon Padding', 'backend', 'megastar' ),
							'param_name'  => 'icon_padding',
							'value'       => '20px',
							'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'description' => wp_kses(_x( "You can set padding from here, for example: <b class='su-generator-set-value' title='Click to set this value'>5px</b> <b class='su-generator-set-value' title='Click to set this value'>10px</b> <b class='su-generator-set-value' title='Click to set this value'>25px</b> also you can set value as em, % etc if you need", 'backend', 'megastar' ), array('b'=>array())),
						),
				   		array(
							"type"       => "dropdown",
							"class"      => "",
							"heading"    => esc_html_x( "Icon Alignment", 'backend', 'megastar' ),
							"param_name" => "icon_align",
							'value'      => array(
								esc_html_x( 'Left', 'backend', 'megastar' )       	=> 'left',
								esc_html_x( 'Right', 'backend', 'megastar' )	   	=> 'right',
								esc_html_x( 'Top', 'backend', 'megastar' )	       	=> 'top',
								esc_html_x( 'Title', 'backend', 'megastar' )	   	=> 'title',
								esc_html_x( 'Top Left', 'backend', 'megastar' )	=> 'top_left',
								esc_html_x( 'Top Right', 'backend', 'megastar' )	=> 'top_right'
		                    ),
		                    'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							"description" => esc_html_x( "You can set alignment from here.", 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Icon gap', 'backend', 'megastar' ),
							'param_name'  => 'icon_gap',
							'value'       => '',
							'group'       => esc_html_x( 'Icon', 'backend', 'megastar' ),
							'description' => esc_html_x( "You can integer value in icon gap as px from here.", 'backend', 'megastar' ),
						),
				   		array(
							"type"        => "dropdown",
							"class"       => "",
							"heading"     => esc_html_x( "Icon to Icon Connector", 'backend', 'megastar' ),
							"param_name"  => "connector",
							'value'       => array(
								esc_html_x( 'No', 'backend', 'megastar' )	=> 'no',
								esc_html_x( 'Yes', 'backend', 'megastar' )	=> 'yes'
		                    ),
							"description" => esc_html_x( "If you select yes icon connector will appear", 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'URL', 'backend', 'megastar' ),
							'param_name'  => 'url',
							'description' => esc_html_x( 'URL/Link of the icon. Leave empty to disable link.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html_x( 'Link Target', 'backend', 'megastar' ),
							'param_name'  => 'target',
							'description' => esc_html_x( 'Select where to open  custom links.', 'backend', 'megastar' ),
							'value'       => array(
								esc_html_x( 'Same window', 'backend', 'megastar' ) => '_self',
								esc_html_x( 'New window', 'backend', 'megastar' )  => '_blank',
							),		
						),
						// Add some description
						array(
							"type"        => "textarea_html",
							"class"       => "",
							"heading"     => esc_html_x( "Description", 'backend', 'megastar' ),
							"param_name"  => "content",
							"value"       => "Icon description text here",
							"description" => esc_html_x( "Provide the description for this icon box.", 'backend', 'megastar' ),
						),
					)
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_icon_list_item_vc' );
	}