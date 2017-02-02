<?php
	if (function_exists('bdthemes_team_member_shortcode')) {
		function bdthemes_team_member_vc() {
			vc_map(
				array(
					"name"        => esc_html_x( "Team Member", 'backend', 'megastar' ),
					"base"        => "bdt_team_member",
					"icon"        => "vc-team-member",
					"category"    => "Theme Addons",
					"description" => esc_html_x( "Team Member.", 'backend', 'megastar' ),
					"params"      => array(

						array(
							'type'        => 'attach_image',
							'heading'     => esc_html_x( 'Photo', 'backend', 'megastar' ),
							'param_name'  => 'photo',
							'value'       => '',
							'description' => esc_html_x( 'Select image from media library.', 'backend', 'megastar' ),
						),
				   		array(
							"type"       => "dropdown",
							"heading"    => esc_html_x( "Style", 'backend', 'megastar' ),
							"admin_label" => true,
							"param_name" => "style",
		                    'value' 	 => array(
		                        esc_html_x('Style 1', 'backend', 'megastar' ) => '1',
		                        esc_html_x('Style 2', 'backend', 'megastar' ) => '2',
		                        esc_html_x('Style 3', 'backend', 'megastar' ) => '3',
		                        esc_html_x('Style 4', 'backend', 'megastar' ) => '4'
		                    ),
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							"description" => esc_html_x( "Select style for Team Member.", 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Background', 'backend', 'megastar' ),
							'param_name'  => 'background',
							'value'       => '#FFFFFF',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Select custom background color.', 'backend', 'megastar' )
						),	
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Color', 'backend', 'megastar' ),
							'param_name'  => 'color',
							'value'       => '#222222',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Select custom color.', 'backend', 'megastar' )
						),					
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Border', 'backend', 'megastar' ),
							'param_name'  => 'border',
							'value'       => '',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can set content border from here.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Border Radius', 'backend', 'megastar' ),
							'param_name'  => 'radius',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can set member border radius from here. This radius value will be only pixel (px) units.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Shadow', 'backend', 'megastar' ),
							'param_name'  => 'shadow',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'You can set member box-shadow radius from here.', 'backend', 'megastar' ),
						),
				   		array(
							"type"               => "dropdown",
							"class"              => "",
							"heading"            => esc_html_x( "Align", 'backend', 'megastar' ),
							"param_name"         => "text_align",
							'value'              => array(
								esc_html_x('Center', 'backend', 'megastar' ) => 'center',
								esc_html_x('Left', 'backend', 'megastar' )   => 'left',
								esc_html_x('Right', 'backend', 'megastar' )  => 'right',
		                    ),
							'group'              => esc_html_x( 'Style', 'backend', 'megastar' ),
							"description"        => esc_html_x( "You can set alignment from here.", 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Name', 'backend', 'megastar' ),
							"admin_label" => true,
							'value'       => esc_html_x( 'John Due', 'backend', 'megastar' ),
							'param_name'  => 'name',
							'description' => esc_html_x( 'Type name here that you want to show for title', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Role', 'backend', 'megastar' ),
							"admin_label" => true,
							'param_name'  => 'role',
							'description' => esc_html_x( 'Member role', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Facebook URL', 'backend', 'megastar' ),
							'param_name'  => 'facebook_url',
							'group'       => esc_html_x( 'Social Share', 'backend', 'megastar' ),
							'description' => esc_html_x( 'URL/Link of the author. Leave empty to disable link', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Twitter URL', 'backend', 'megastar' ),
							'param_name'  => 'twitter_url',
							'group'       => esc_html_x( 'Social Share', 'backend', 'megastar' ),
							'description' => esc_html_x( 'URL/Link of the author. Leave empty to disable link', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Google-Plus URL', 'backend', 'megastar' ),
							'param_name'  => 'googleplus_url',
							'group'       => esc_html_x( 'Social Share', 'backend', 'megastar' ),
							'description' => esc_html_x( 'URL/Link of the author. Leave empty to disable link', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Pinterest URL', 'backend', 'megastar' ),
							'param_name'  => 'pinterest_url',
							'group'       => esc_html_x( 'Social Share', 'backend', 'megastar' ),
							'description' => esc_html_x( 'URL/Link of the author. Leave empty to disable link', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Github URL', 'backend', 'megastar' ),
							'param_name'  => 'github_url',
							'group'       => esc_html_x( 'Social Share', 'backend', 'megastar' ),
							'description' => esc_html_x( 'URL/Link of the author. Leave empty to disable link', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Linkedin URL', 'backend', 'megastar' ),
							'param_name'  => 'linkedin_url',
							'group'       => esc_html_x( 'Social Share', 'backend', 'megastar' ),
							'description' => esc_html_x( 'URL/Link of the author. Leave empty to disable link', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'URL', 'backend', 'megastar' ),
							'param_name'  => 'url',
							'description' => esc_html_x( 'URL/Link of the author. Leave empty to disable link', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Extra class name', 'backend', 'megastar' ),
							'param_name'  => 'el_class',
							'description' => esc_html_x( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textarea_html',
							'holder'      => 'div',
							'heading'     => esc_html_x( 'Text', 'backend', 'megastar' ),
							'param_name'  => 'content',
							'value'       => '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>',
						)
					)	
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_team_member_vc' );
	}