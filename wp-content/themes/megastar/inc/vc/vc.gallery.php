<?php
	if (function_exists('bdt_gallery_function')) {
		function bdthemes_gallery_vc() {
			vc_map( array(
				"name"					=> esc_html_x( "Gallery", 'backend', 'megastar' ),
				"description"			=> esc_html_x( "Show Photo Gallery", 'backend', 'megastar' ),
				"base"					=> "gallery",
				'category'				=> "Theme Addons",
				"icon"					=> "vc-gallery",
				"params"				=> array(
					array(
						"type"			=> "attach_images",
						"admin_label"	=> true,
						"class"			=> "",
						"heading"		=> esc_html_x( "Gallery Images", 'backend', 'megastar' ),
						"param_name"	=> "ids",
						"value"			=> "",
						"description"	=> esc_html_x( "Upload your Images here.", 'backend', 'megastar' ),
					),

					array(
						"type"			=> "dropdown",
						"admin_label"	=> false,
						"class"			=> "",
						"heading"		=> esc_html_x( "Thumbnail Size", 'backend', 'megastar' ),
						"param_name"	=> "size",
						"value"			=> array(
							esc_html_x( 'Thumbnail', 'backend', 'megastar' ) => 'thumbnail',
							esc_html_x( 'Medium', 'backend', 'megastar' )    => 'medium',
							esc_html_x( 'Large', 'backend', 'megastar' )     => 'large',
							esc_html_x( 'Full', 'backend', 'megastar' )      => 'full'
						),
					),
					array(
						"type"			=> "dropdown",
						"admin_label"	=> false,
						"class"			=> "",
						"heading"		=> esc_html_x( "Link To", 'backend', 'megastar' ),
						"param_name"	=> "link",
						"value"			=> array(
							esc_html_x( 'Lightbox Image', 'backend', 'megastar' ) => 'file',
							esc_html_x( 'None', 'backend', 'megastar' )           => 'none',
						),
					),
					array(
						"type"			=> "dropdown",
						"admin_label"	=> false,
						"class"			=> "",
						"heading"		=> esc_html_x( "Columns", 'backend', 'megastar' ),
						"param_name"	=> "columns",
						"value"			=> array(
							esc_html_x( "1", 'backend', 'megastar' ) => "1",
						    esc_html_x( "2", 'backend', 'megastar' ) => "2",
					  		esc_html_x( "3", 'backend', 'megastar' ) => "3",
					  		esc_html_x( "4", 'backend', 'megastar' ) => "4",
					  		esc_html_x( "5", 'backend', 'megastar' ) => "5",
					  		esc_html_x( "6", 'backend', 'megastar' ) => "6"
						),
						"std"         => "3",
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( "Gutter", 'backend', 'megastar' ),
						"param_name"	=> "gutter",
						"value"			=> array(
							esc_html_x( "No Gutter", 'backend', 'megastar' ) => "0",
							esc_html_x( "5", 'backend', 'megastar' )         => "5",
							esc_html_x( "10", 'backend', 'megastar' )        => "10",
							esc_html_x( "15", 'backend', 'megastar' )        => "15",
							esc_html_x( "20", 'backend', 'megastar' )        => "20",
							esc_html_x( "25", 'backend', 'megastar' )        => "25",
							esc_html_x( "35", 'backend', 'megastar' )        => "35",
							esc_html_x( "45", 'backend', 'megastar' )        => "45",
							esc_html_x( "50", 'backend', 'megastar' )        => "50"
						),
						"std"         => "10",
						"description"	=> esc_html_x( "Select gutter of the gallery item.", 'backend', 'megastar' )
					),
				)
			) );
		}
		add_action( 'vc_before_init', 'bdthemes_gallery_vc' );
	}