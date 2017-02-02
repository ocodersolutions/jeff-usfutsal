<?php
	if (function_exists('bdthemes_post_carousel')) {
		function bdthemes_post_carousel_vc() {
			vc_map( array(
				"name"					=> esc_html_x( "Posts Carousel", 'backend', 'megastar' ),
				"description"			=> esc_html_x( "Add recent post in your carousel", 'backend', 'megastar' ),
				"base"					=> "bdt_post_carousel",
				"icon"					=> "vc-post-carousel",
				'category'				=> "Theme Addons",
				"params"				=> array(
					array(
						"type"			=> "textfield",
						"admin_label"	=> false,
						"class"			=> "",
						"heading"		=> esc_html_x( "Number of Posts", 'backend', 'megastar' ),
						"param_name"	=> "posts",
						"value"			=> "6",
						"description"	=> esc_html_x( "Number of Posts.", 'backend', 'megastar' )
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"class"			=> "",
						"heading"		=> esc_html_x( "Categories", 'backend', 'megastar' ),
						"param_name"	=> "categories",
						"value"			=> "all",
						"description"	=> esc_html_x( "Category Slugs - For example: sports, business, all", 'backend', 'megastar' )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Show Thumbnail", 'backend', 'megastar' ),
						"param_name"	=> "thumbs",
						"value"			=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> 'true',
							esc_html_x( 'No', 'backend', 'megastar' ) => 'false',
						),
						'description' => esc_html_x( 'Show or hide your post carousel thumbnail.', 'backend', 'megastar' ),
						"std"         => "true",
					),
					array(
						"type"			=> "dropdown",
						"admin_label"	=> false,
						"class"			=> "",
						"heading"		=> esc_html_x( "Style", 'backend', 'megastar' ),
						"param_name"	=> "style",
						"value"			=> array(
							esc_html_x( 'White', 'backend', 'megastar' ) 	=> 'white',
							esc_html_x( 'Lightgrey', 'backend', 'megastar' ) => 'grey',
							esc_html_x( 'Transparent', 'backend', 'megastar' ) => 'transparent'
						)
					),
					array(
				   		'type' => 'dropdown',
						'heading' => esc_html_x('Gutter', 'backend', 'megastar' ),
						'param_name' => 'gutter',
						'value' => array(
							esc_html_x('Collapse', 'backend', 'megastar' ) => 'collapse',
							esc_html_x('Large', 'backend', 'megastar' ) => 'large',
							esc_html_x('Medium', 'backend', 'megastar' ) => 'medium',
							esc_html_x('Small', 'backend', 'megastar' ) => 'small'
						),
						'std'         => 'medium',
						'description' => esc_html_x('Gutter of the event carousel.', 'backend', 'megastar' )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Navigation", 'backend', 'megastar' ),
						"param_name"	=> "arrows",
						"value"			=> array(
							esc_html_x( 'Show', 'backend', 'megastar' ) 	=> 'true',
							esc_html_x( 'Hide', 'backend', 'megastar' ) => 'false',
						),
						'description' => esc_html_x( 'Show or hide navigation from here.', 'backend', 'megastar' ),
						"std"         => "true",
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Pagination", 'backend', 'megastar' ),
						"param_name"	=> "pagination",
						"value"			=> array(
							esc_html_x( 'Show', 'backend', 'megastar' ) 	=> 'true',
							esc_html_x( 'Hide', 'backend', 'megastar' ) => 'false',
						),
						'description' => esc_html_x( 'Show or hide pagination from here.', 'backend', 'megastar' ),
						"std"         => "true",
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
					),
					array(
						"type"        => "number",
						"heading"     => esc_html_x( "Delay", 'backend', 'megastar' ),
						"param_name"  => "delay",
						"value"       => 4000,
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
						"description" => wp_kses(_x( "Delay of the event carousel. It's set <strong>ms</strong> value.", 'backend', 'megastar' ), array('strong'=>array())),
					),
					array(
						"type"        => "number",
						"heading"     => esc_html_x( "Speed", 'backend', 'megastar' ),
						"param_name"  => "speed",
						"value"       => 350,
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' ),
						"description" => wp_kses(_x( "Speed of the event carousel. It's set <strong>ms</strong> value.", 'backend', 'megastar' ), array('strong'=>array())),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Auto Play", 'backend', 'megastar' ),
						"param_name"	=> "autoplay",
						"value"			=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> 'true',
							esc_html_x( 'No', 'backend', 'megastar' ) => 'false',
						),
						'description' => esc_html_x( 'Show or hide auto play from here.', 'backend', 'megastar' ),
						"std"         => "true",
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Hover Pause", 'backend', 'megastar' ),
						"param_name"	=> "hoverpause",
						"value"			=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> 'true',
							esc_html_x( 'No', 'backend', 'megastar' ) => 'false',
						),
						'description' => esc_html_x( 'Set yes or no hover pause from here.', 'backend', 'megastar' ),
						"std"         => "false",
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Loop", 'backend', 'megastar' ),
						"param_name"	=> "loop",
						"value"			=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) 	=> 'true',
							esc_html_x( 'No', 'backend', 'megastar' ) => 'false',
						),
						'description' => esc_html_x('Set yes or no loop from here.', 'backend', 'megastar' ),
						"std"         => "true",
						"group"	=> esc_html_x( 'Carousel Settings', 'backend', 'megastar' )
					),
					array(
				   		"type" => "dropdown",
						"heading" => esc_html_x( "Large View", 'backend', 'megastar' ),
						"param_name" => "large",
						"value" => array(
							esc_html_x('1', 'backend', 'megastar' ) => 1,
							esc_html_x('2', 'backend', 'megastar' ) => 2,
							esc_html_x('3', 'backend', 'megastar' ) => 3,
							esc_html_x('4', 'backend', 'megastar' ) => 4,
							esc_html_x('5', 'backend', 'megastar' ) => 5,
							esc_html_x('6', 'backend', 'megastar' ) => 6
						),
						"std"         => 3,
						"group"	=> esc_html_x( 'Responsive', 'backend', 'megastar' ),
						"description" => esc_html_x( "Large view item of the event carousel.", 'backend', 'megastar' )
					),
					array(
				   		"type" => "dropdown",
						"heading" => esc_html_x( "Medium View", 'backend', 'megastar' ),
						"param_name" => "medium",
						"value" => array(
							esc_html_x('1', 'backend', 'megastar' ) => 1,
							esc_html_x('2', 'backend', 'megastar' ) => 2,
							esc_html_x('3', 'backend', 'megastar' ) => 3,
							esc_html_x('4', 'backend', 'megastar' ) => 4
						),
						"std"         => 2,
						"group"	=> esc_html_x( 'Responsive', 'backend', 'megastar' ),
						"description" => esc_html_x( "Medium view item of the event carousel.", 'backend', 'megastar' )
					),
					array(
				   		"type" => "dropdown",
						"heading" => esc_html_x( "Small View", 'backend', 'megastar' ),
						"param_name" => "small",
						"value" => array(
							esc_html_x('1', 'backend', 'megastar' ) => 1,
							esc_html_x('2', 'backend', 'megastar' ) => 2,
							esc_html_x('3', 'backend', 'megastar' ) => 3
						),
						"std"         => 1,
						"group"	=> esc_html_x( 'Responsive', 'backend', 'megastar' ),
						"description" => esc_html_x( "Small view item of the event carousel.", 'backend', 'megastar' )
					),
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_post_carousel_vc' );
	}