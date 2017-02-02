<?php
	if (function_exists('bdthemes_faq')) {
		function bdthemes_faq_vc() {
			vc_map( array(
				"name"					=> esc_html_x( "FAQ", 'backend', 'megastar' ),
				"description"			=> esc_html_x( "Insert frequently asked question with filter system", 'backend', 'megastar' ),
				"base"					=> "bdt_faq",
				"icon"					=> "vc-faq",
				'category'				=> "Theme Addons",
				"params"				=> array(
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html_x( "Category", 'backend', 'megastar' ),
						"param_name"	=> "categories",
						"value"			=> "all",
						"admin_label" => true,
						"description"	=> esc_html_x( "Category Slugs or ID - For example: buying,author,account,community", 'backend', 'megastar' )
					),
					array(
						"type"			=> "number",
						"heading"		=> esc_html_x( "Limit", 'backend', 'megastar' ),
						"param_name"	=> "limit",
						"value"			=> "20",
						"description"	=> esc_html_x( "How many item you want to display", 'backend', 'megastar' )
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
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Loading Animation", 'backend', 'megastar' ),
						"param_name"	=> "loading_animation",
						"value"			=> array(
							esc_html_x( "Default", 'backend', 'megastar' )	        => "fadeIn",
							esc_html_x( "LazyLoading", 'backend', 'megastar' )	    => "lazyLoading",
							esc_html_x( "Fade In To Top", 'backend', 'megastar' )	=> "fadeInToTop",
							esc_html_x( "Sequentially", 'backend', 'megastar' )	=> "sequentially",
							esc_html_x( "Bottom To Top", 'backend', 'megastar' )   => "bottomToTop",
						),
						"description"	=> esc_html_x( "Select loading animation", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Filter", 'backend', 'megastar' ),
						"param_name"	=> "show_filter",
						"value"			=> array(
							esc_html_x( 'Show', 'backend', 'megastar' )	=> 'yes',
						),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Filter Animation", 'backend', 'megastar' ),
						"param_name"	=> "filter_animation",
						"value"			=> array(
							esc_html_x( "Fade Out", 'backend', 'megastar' )       => "fadeOut",
							esc_html_x( "Quicksand", 'backend', 'megastar' )      => "quicksand",
							esc_html_x( "Box Shadow", 'backend', 'megastar' )     => "boxShadow",
							esc_html_x( "Bounce Left", 'backend', 'megastar' )    => "bounceLeft",
							esc_html_x( "Bounce Top", 'backend', 'megastar' )     => "bounceTop",
							esc_html_x( "Bounce Bottom", 'backend', 'megastar' )  => "bounceBottom",
							esc_html_x( "Move Left", 'backend', 'megastar' )      => "moveLeft",
							esc_html_x( "Slide Left", 'backend', 'megastar' )     => "slideLeft",
							esc_html_x( "Fade Out Top", 'backend', 'megastar' )   => "fadeOutTop",
							esc_html_x( "Sequentially", 'backend', 'megastar' )   => "sequentially",
							esc_html_x( "Skew", 'backend', 'megastar' )           => "skew",
							esc_html_x( "Slide Delay", 'backend', 'megastar' )    => "slideDelay",
							esc_html_x( "3d Flip", 'backend', 'megastar' )        => "3dflip",
							esc_html_x( "Rotate Sides", 'backend', 'megastar' )   => "rotateSides",
							esc_html_x( "Flip Out Delay", 'backend', 'megastar' ) => "flipOutDelay",
							esc_html_x( "Flip Out", 'backend', 'megastar' )       => "flipOut",
							esc_html_x( "Unfold", 'backend', 'megastar' )         => "unfold",
							esc_html_x( "Fold Left", 'backend', 'megastar' )      => "foldLeft",
							esc_html_x( "Scale Down", 'backend', 'megastar' )     => "scaleDown",
							esc_html_x( "Scale Sides", 'backend', 'megastar' )    => "scaleSides",
							esc_html_x( "Front Row", 'backend', 'megastar' )      => "frontRow",
							esc_html_x( "Flip Bottom", 'backend', 'megastar' )    => "flipBottom",
							esc_html_x( "Rotate Room", 'backend', 'megastar' )    => "rotateRoom",
						),
						"description"	=> esc_html_x( "Select filter animation", 'backend', 'megastar' )
					),
					array(
						"type"			=> "checkbox",
						"heading"		=> esc_html_x( "Read More", 'backend', 'megastar' ),
						"param_name"	=> "read_more",
						"value"			=> array(
							esc_html_x( 'Show', 'backend', 'megastar' )	=> 'yes',
						),
					),
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_faq_vc' );
	}