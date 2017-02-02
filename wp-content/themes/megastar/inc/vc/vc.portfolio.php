<?php
//Map to VC - Portfolio

if ( ! function_exists('is_plugin_active')){ include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); } // load is_plugin_active() function if no available
if(is_plugin_active('bdthemes-portfolio/bdthemes-portfolio.php')){ 

	function bdthemes_portfolio_vc() {

		$portfolio_options = NULL;

		$portfolio_filters = get_terms('portfolio_filter');

		foreach ($portfolio_filters as $filter) {
			$portfolio_options[$filter->name] = $filter->slug;
		}

		vc_map( array(
			"name"					=> esc_html_x( "Portfolio", 'backend', 'megastar' ),
			"description"			=> esc_html_x( "Show your Portfolio Items", 'backend', 'megastar' ),
			"base"					=> "bdt_portfolio",
			'category'				=> "Post Type",
			"icon"					=> "vc-portfolio",
			"params"				=> array(
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html_x( "Style", 'backend', 'megastar' ),
					"param_name"	=> "style",
					"value"			=> array(
						esc_html_x( 'Style 1', 'backend', 'megastar' ) => '1',
						esc_html_x( 'Style 2', 'backend', 'megastar' ) => '2',
					),
					"description"	=> esc_html_x( "Style of the portfolio.", 'backend', 'megastar' ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html_x( "Layout", 'backend', 'megastar' ),
					"param_name"	=> "layout",
					"value"			=> array(
						esc_html_x( 'Grid', 'backend', 'megastar' )    => 'grid',
						esc_html_x( 'Masonry', 'backend', 'megastar' ) => 'masonry',
						esc_html_x( 'Slider', 'backend', 'megastar' )  => 'slider',
					),
					"description"	=> esc_html_x( "Select your portfolio layout from here.", 'backend', 'megastar' ),
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html_x( "Limit", 'backend', 'megastar' ),
					"param_name"	=> "limit",
					"value"			=> "8",
					"description"	=> esc_html_x( "Number of item you want to show.", 'backend', 'megastar' ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html_x( "Pagination?", 'backend', 'megastar' ),
					"param_name"	=> "pagination",
					"value"			=> array(
						esc_html_x( 'Disable Pagination', 'backend', 'megastar' ) => 'no',
						esc_html_x( 'Enable Pagination', 'backend', 'megastar' ) => 'yes',
					),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html_x( "Filter", 'backend', 'megastar' ),
					"param_name"	=> "filter",
					"value"			=> array(
						esc_html_x( 'Show', 'backend', 'megastar' ) 	=> 'yes',
						esc_html_x( 'Hide', 'backend', 'megastar' ) => 'no',
					),
					'std' => 'yes',
					'description' => esc_html_x( 'Show or hide filter from here.', 'backend', 'megastar' )
				),
				array(
					"type"			=> "checkbox",
					"admin_label"	=> false,
					"class"			=> "",
					"heading"		=> esc_html_x( "Only Specific Filters?", 'backend', 'megastar' ),
					"param_name"	=> "filters",
					"value"			=> $portfolio_options,
					"description"	=> esc_html_x( "If nothing is selected, it will show Items from ALL filters.", 'backend', 'megastar' ),
				),
				array(
					"type"			=> "dropdown",
					"class"			=> "",
					"heading"		=> esc_html_x( "Filter Align", 'backend', 'megastar' ),
					"param_name"	=> "filter_align",
					"value"			=> array(
						esc_html_x( 'Left', 'backend', 'megastar' )   => 'left',
						esc_html_x( 'Right', 'backend', 'megastar' )  => 'right',
						esc_html_x( 'Center', 'backend', 'megastar' ) => 'center'
					),
					"description"	=> esc_html_x( "Filter align of the portfolio.", 'backend', 'megastar' ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html_x( "Loading Animation", 'backend', 'megastar' ),
					"param_name"	=> "loading_animation",
					"value"			=> array(
						esc_html_x( 'Default', 'backend', 'megastar' )        => 	'default',
						esc_html_x( 'Fade In', 'backend', 'megastar' )        => 	'fadeIn',     
						esc_html_x( 'LazyLoading', 'backend', 'megastar' )    => 	'lazyLoading',
						esc_html_x( 'Fade In To Top', 'backend', 'megastar' ) => 	'fadeInToTop',
						esc_html_x( 'Sequentially', 'backend', 'megastar' )   => 	'sequentially',
						esc_html_x( 'Bottom To Top', 'backend', 'megastar' )  => 	'bottomToTop'  
					),
					"description"	=> esc_html_x( "Loading animation of the portfolio.", 'backend', 'megastar' ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html_x( "Filter Animation", 'backend', 'megastar' ),
					"param_name"	=> "filter_animation",
					"value"			=> array(
						esc_html_x( 'Fade Out', 'backend', 'megastar' )       => 'fadeOut',
						esc_html_x( 'Quicksand', 'backend', 'megastar' )      => 'quicksand',
						esc_html_x( 'Box Shadow', 'backend', 'megastar' )     => 'boxShadow',
						esc_html_x( 'Bounce Left', 'backend', 'megastar' )    => 'bounceLeft',
						esc_html_x( 'Bounce Top', 'backend', 'megastar' )     => 'bounceTop',
						esc_html_x( 'Bounce Bottom', 'backend', 'megastar' )  => 'bounceBottom',
						esc_html_x( 'Move Left', 'backend', 'megastar' )      => 'moveLeft',
						esc_html_x( 'Slide Left', 'backend', 'megastar' )     => 'slideLeft',
						esc_html_x( 'Fade Out Top', 'backend', 'megastar' )   => 'fadeOutTop',
						esc_html_x( 'Sequentially', 'backend', 'megastar' )   => 'sequentially',
						esc_html_x( 'Skew', 'backend', 'megastar' )           => 'skew',
						esc_html_x( 'Slide Delay', 'backend', 'megastar' )    => 'slideDelay',
						esc_html_x( '3d Flip', 'backend', 'megastar' )        => '3dflip',
						esc_html_x( 'Rotate Sides', 'backend', 'megastar' )   => 'rotateSides',
						esc_html_x( 'Flip Out Delay', 'backend', 'megastar' ) => 'flipOutDelay',
						esc_html_x( 'Flip Out', 'backend', 'megastar' )       => 'flipOut',
						esc_html_x( 'Unfold', 'backend', 'megastar' )         => 'unfold',
						esc_html_x( 'Fold Left', 'backend', 'megastar' )      => 'foldLeft',
						esc_html_x( 'Scale Down', 'backend', 'megastar' )     => 'scaleDown',
						esc_html_x( 'Scale Sides', 'backend', 'megastar' )    => 'scaleSides',
						esc_html_x( 'Front Row', 'backend', 'megastar' )      => 'frontRow',
						esc_html_x( 'Flip Bottom', 'backend', 'megastar' )    => 'flipBottom',
						esc_html_x( 'Rotate Room', 'backend', 'megastar' )    => 'rotateRoom' 
					),
					"description"	=> esc_html_x( "Filter animation of the portfolio.", 'backend', 'megastar' ),
				),
				array(
			   		"type" => "number",
					"heading" => esc_html_x( "Horizontal Gap", 'backend', 'megastar' ),
					"param_name" => "horizontal_gap",
					"value" => "10", 
					"description" => esc_html_x( "Horizontal Gap of the portfolio.", 'backend', 'megastar' ),
				),
				array(
			   		"type" => "number",
					"heading" => esc_html_x( "vertical Gap", 'backend', 'megastar' ),
					"param_name" => "vertical_gap",
					"value" => "10", 
					"description" => esc_html_x( "vertical Gap of the portfolio.", 'backend', 'megastar' ),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html_x( "Show Link", 'backend', 'megastar' ),
					"param_name"	=> "show_link",
					"value"			=> array(
						esc_html_x( 'Show', 'backend', 'megastar' ) 	=> 'yes',
						esc_html_x( 'Hide', 'backend', 'megastar' ) => 'no',
					),
					'description' => esc_html_x( 'Show or hide link from here.', 'backend', 'megastar' )
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html_x( "Show Zoom", 'backend', 'megastar' ),
					"param_name"	=> "show_zoom",
					"value"			=> array(
						esc_html_x( 'Show', 'backend', 'megastar' ) 	=> 'yes',
						esc_html_x( 'Hide', 'backend', 'megastar' ) => 'no',
					),
					'description' => esc_html_x( 'Show or hide zoom from here.', 'backend', 'megastar' )
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
					"std"         => 4,
					"group"	=> esc_html_x( 'Responsive', 'backend', 'megastar' ),
					"description" => esc_html_x( "Large view item of the portfolio", 'backend', 'megastar' )
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
					"std"         => 3,
					"group"	=> esc_html_x( 'Responsive', 'backend', 'megastar' ),
					"description" => esc_html_x( "Medium view item of the portfolio", 'backend', 'megastar' )
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
					"std"         => 2,
					"group"	=> esc_html_x( 'Responsive', 'backend', 'megastar' ),
					"description" => esc_html_x( "Small view item of the portfolio", 'backend', 'megastar' )
				),
			)
		) );
	}
	add_action( 'vc_before_init', 'bdthemes_portfolio_vc' );

}