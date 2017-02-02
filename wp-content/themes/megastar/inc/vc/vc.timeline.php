<?php
	if (function_exists('bdthemes_timeline_shortcode')) {
		function bdthemes_timeline_vc() {
			vc_map( array(
				"name"					=> esc_html_x( "Timeline", 'backend', 'megastar' ),
				"description"			=> esc_html_x( "Superb! various timeline style", 'backend', 'megastar' ),
				"base"					=> "bdt_timeline",
				"icon"					=> "vc-home",
				'category'				=> "Theme Addons",
				"params"				=> array(
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html_x( "Post Category Source", 'backend', 'megastar' ),
						"param_name"	=> "categories",
						"value"			=> "all",
						"description"	=> esc_html_x( "Category Slugs - For example: sports, business, all", 'backend', 'megastar' )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html_x( "Post Limit", 'backend', 'megastar' ),
						"param_name"	=> "limit",
						"value"			=> "20",
						"description"	=> esc_html_x( "How many item you want to display by clicking show more button?", 'backend', 'megastar' )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Order By", 'backend', 'megastar' ),
						"param_name"	=> "order_by", //none, id or term_id, name, slug, term_group, count, description
						"value"			=> array(
							esc_html_x( "Default", 'backend', 'megastar' )	 => "none",
							esc_html_x( "Name", 'backend', 'megastar' )  => "name",
							esc_html_x( "Date", 'backend', 'megastar' )  => "date",
						),
						"description"	=> esc_html_x( "You can sort your item by this order", 'backend', 'megastar' )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Order", 'backend', 'megastar' ),
						"param_name"	=> "order",
						"value"			=> array(
							esc_html_x( "Ascending", 'backend', 'megastar' )	 => "ASC",
							esc_html_x( "Decending", 'backend', 'megastar' )  => "DESC",
						),
						"description"	=> esc_html_x( "You can select your post order method(as assending ro descending order) from here", 'backend', 'megastar' )
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html_x( 'Icon Background Color', 'backend', 'megastar' ),
						'param_name' => 'icon_bg',
						'description' => esc_html_x( 'You can set icon background color from here.', 'backend', 'megastar' ),
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Image Show", 'backend', 'megastar' ),
						"param_name"	=> "image",
						'value' 		=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"description"	=> esc_html_x( "Setting of Yes will be cause for background image show", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Highlight Year", 'backend', 'megastar' ),
						"param_name"	=> "highlight_year",
						'value'			=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"description"	=> esc_html_x( "if you select yes then show Year in your time line", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Read More", 'backend', 'megastar' ),
						"param_name"	=> "read_more",
						'value'			=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"description"	=> esc_html_x( "You can set read more from here", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Intro Text", 'backend', 'megastar' ),
						"param_name"	=> "intro_text",
						'value'			=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"description"	=> esc_html_x( "If you check, then show intro text", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Date", 'backend', 'megastar' ),
						"param_name"	=> "date",
						'value'			=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"description"	=> esc_html_x( "If you check yes then appear date", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Time", 'backend', 'megastar' ),
						"param_name"	=> "time",
						'value'			=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"description"	=> esc_html_x( "If you check yes then appear time", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Title", 'backend', 'megastar' ),
						"param_name"	=> "title",
						'value' 		=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"description"	=> esc_html_x( "If you check yes then appear title", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Linked Title", 'backend', 'megastar' ),
						"param_name"	=> "link_title",
						'value' 		=> array(
							esc_html_x( 'Yes', 'backend', 'megastar' ) => 'yes'
						),
						"description"	=> esc_html_x( "If you check yes then title appear as link", 'backend', 'megastar' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'Before Text', 'backend', 'megastar' ),
						'param_name'  => 'before_text',
						'description' => esc_html_x( "You can set description before the post.", 'backend', 'megastar' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html_x( 'After Text', 'backend', 'megastar' ),
						'param_name'  => 'after_text',
						'description' => esc_html_x( "You can set description after the post.", 'backend', 'megastar' ),
					)
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_timeline_vc' );
	}