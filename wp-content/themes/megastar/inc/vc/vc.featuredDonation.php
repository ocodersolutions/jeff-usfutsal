<?php
	if (function_exists('bdthemes_featured_donation_shortcode')) {
		function bdthemes_featured_donation_vc() {
			vc_map(
				array(
					"name"        => esc_html_x( "Featured Donation", 'backend', 'megastar' ),
					"base"        => "bdt_featured_donation",
					"icon"        => "vc-featured-donation",
					"category"    => "Theme Addons",
					"description" => esc_html_x( "Highlights your featured donation.", 'backend', 'megastar' ),
					"params"      => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html_x( 'Title', 'backend', 'megastar' ),
							'value' => 'Featured Donation Title',
							'param_name' => 'title',
							"admin_label" => true,
							'description' => esc_html_x( 'Type here that you want to show for title', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Title Color', 'backend', 'megastar' ),
							'value'       => '#ffffff',
							'param_name'  => 'title_color',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Choose a color for title', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Title Size', 'backend', 'megastar' ),
							'value'       => '20px',
							'param_name'  => 'title_size',
							'group'       => esc_html_x( 'Style', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Enter pixel value for title size', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'attach_image',
							'heading'     => esc_html_x( 'Photo', 'backend', 'megastar' ),
							'param_name'  => 'image',
							'value'       => '',
							'description' => esc_html_x( 'Select image from media library.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Goal Value', 'backend', 'megastar' ),
							'param_name'  => 'goal',
							'value'       => '',
							'group'       => esc_html_x( 'Progress', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Enter numeric goal value.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Achieve Value', 'backend', 'megastar' ),
							'param_name'  => 'achieve',
							'value'       => '',
							'group'       => esc_html_x( 'Progress', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Enter numeric achieve value.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Bar Color', 'backend', 'megastar' ),
							'param_name'  => 'bar_color',
							'value'       => '#E8E8E8',
							'group'       => esc_html_x( 'Progress', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Choose a color for progress bar', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'colorpicker',
							'heading'     => esc_html_x( 'Fill Color', 'backend', 'megastar' ),
							'param_name'  => 'fill_color',
							'value'       => '#F39C12',
							'group'       => esc_html_x( 'Progress', 'backend', 'megastar' ),
							'description' => esc_html_x( 'Choose progress bar fill color', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html_x( 'Extra class name', 'backend', 'megastar' ),
							'param_name'  => 'class',
							'description' => esc_html_x( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'backend', 'megastar' ),
						),
						array(
							'type'        => 'textarea_html',
							'heading'     => esc_html_x( 'Content Text', 'backend', 'megastar' ),
							'param_name'  => 'content',
							'value'       => 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.<br></br>
							<a href="#" class="readon border">Donate Now</a>',
						)
					)	
				)
			);
		}
		add_action( 'vc_before_init', 'bdthemes_featured_donation_vc' );
	}
