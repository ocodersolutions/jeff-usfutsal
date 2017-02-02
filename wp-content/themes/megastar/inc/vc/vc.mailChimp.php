<?php
if (function_exists('bdthemes_mailchimp_shortcode')) {
	function bdthemes_mailchimp_vc() {
		$mailchimp_api = get_option( 'bdthemes_mailchimp_api_key' );
		$mail_lists    = array('Select List' => 0);

		if ( ! empty ( $mailchimp_api ) ) {
			if ( ! class_exists( 'MCAPI' ) ) {
				if (file_exists(WP_PLUGIN_DIR.'/bdthemes-core/includes/MCAPI.class.php')) {
					include_once( WP_PLUGIN_DIR.'/bdthemes-core/includes/MCAPI.class.php');
				}
			}
			$api_key = $mailchimp_api;
			$mcapi   = new MCAPI( $api_key );
			$lists   = $mcapi->lists();
		} else {
			return;
		}

		if ( isset( $lists['data'] ) && is_array( $lists['data'] ) ) {
			foreach ( $lists['data'] as $key => $value ) {
				$mail_lists[$value['name']] = $value['id'];
			}
		}

		vc_map( array(
			"name"					=> esc_html_x( "Mailchimp", 'backend', 'megastar' ),
			"description"			=> esc_html_x( "Make easily simple newsletter", 'backend', 'megastar' ),
			"base"					=> "bdt_mailchimp",
			"icon"					=> "vc-mailchimp",
			'category'				=> "Theme Addons",
			"params"				=> array(
				array(
					"type"        => "dropdown",
					"heading"     => esc_html_x( "Email List", 'backend', 'megastar' ),
					"param_name"  => "email_list",
					"description" => esc_html_x( "Email list of the newsletter." , 'backend', 'megastar' ),
					"value"       => $mail_lists,
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html_x( "Before Text", 'backend', 'megastar' ),
					"param_name"	=> "before_text",
					"description"	=> esc_html_x( "Before text of the newsletter." , 'backend', 'megastar' )
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html_x( "After Text", 'backend', 'megastar' ),
					"param_name"	=> "after_text",
					"description"	=> esc_html_x( "After text of the newsletter." , 'backend', 'megastar' )
				),
				array(
					"type"			=> "textfield",
					"heading"		=> esc_html_x( "Button Text", 'backend', 'megastar' ),
					"param_name"	=> "button_text",
					"description"	=> esc_html_x( "Button text of the newsletter." , 'backend', 'megastar' )
				),
			)
		) );
	}
	add_action( 'vc_before_init', 'bdthemes_mailchimp_vc' );

}