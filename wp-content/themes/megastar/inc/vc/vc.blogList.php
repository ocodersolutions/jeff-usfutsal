<?php

if (function_exists('bdthemes_blog_list')) {
	function bdthemes_blog_list_vc() {

		$post_grid_options = NULL;

		$post_grid_filters = get_terms('category');

		foreach ($post_grid_filters as $filter) {
			$post_grid_options[$filter->name] = $filter->slug;
		}
 
		vc_map( array(
			"name"					=> esc_html_x( "Blog List", 'backend', 'megastar' ),
			"description"			=> esc_html_x( "Show blog post in list layout", 'backend', 'megastar' ),
			"base"					=> "bdt_blog_list",
			'category'				=> "Post Type",
			"icon"					=> "vc-blog-list",
			"params"				=> array(
				array(
					"type"        => "number",
					"heading"     => esc_html_x( "Post(s)", 'backend', 'megastar' ),
					"param_name"  => "posts",
					"value"       => "3",
					"std"         => "3",
					"description" => esc_html_x( "Number of post you want to show.", 'backend', 'megastar' ),
				),
				array(
					"type"			=> "checkbox",
					"class"			=> "",
					"heading"		=> esc_html_x( "Only Specific Filters?", 'backend', 'megastar' ),
					"param_name"	=> "categories",
					"value"			=> $post_grid_options,
					"description"	=> wp_kses(_x( "If nothing is selected, it will show Items from <strong>ALL</strong> categories.", 'backend', 'megastar' ), array('strong'=>array())),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html_x( "Style", 'backend', 'megastar' ),
					"param_name"	=> "style",
					"value"			=> array(
						esc_html_x( "Dark", 'backend', 'megastar' )	  	=> 	'style-dark',
						esc_html_x( "Light", 'backend', 'megastar' )	=> 	'style-light',
					),
					"description" => esc_html_x( "Select background style.", 'backend', 'megastar' ),
				)
			)
		) );
	}
	add_action( 'vc_before_init', 'bdthemes_blog_list_vc' );

}