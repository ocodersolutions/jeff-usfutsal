<?php

/*******************************/
/* Create new Admin Page */
/*******************************/
if (!function_exists('megastar_add_demo_import_page')) {
	function megastar_add_demo_import_page() {
		add_theme_page(esc_html_x('Demo Import', 'backend', 'megastar'), esc_html_x('Demo Import', 'backend', 'megastar'), 'manage_options', 'megastar-demo-import','megastar_demo_import');
	}
}
add_action('admin_menu', 'megastar_add_demo_import_page');


if (!function_exists('megastar_demo_import')) {
	function megastar_demo_import() {		
		?>
		<div class="wrap">

			<?php if (is_plugin_active('bdthemes-core/bdthemes-core.php')) : ?>

				<div class="demo-import-message content" style="display:none;">
					<img src="<?php echo get_template_directory_uri(); ?>/demo-import/spinner.gif" alt="spinner">
					<h1 class="demo-import-message-title"><?php echo esc_html_x('Importing Demo Content...', 'backend', 'megastar'); ?></h1>
					<p><?php echo wp_kses(_x('Please be patient and <strong>do not navigate away</strong> from this page while the import is in progress. This may take up to several minutes (according to your server speed). <br>You will get a notification on this page when the import is completed.', 'backend', 'megastar'), array('strong' => array(), 'br' => array())); ?></p>
				</div>

				<div class="demo-import-message success" style="display:none;">
					<h1 class="demo-import-message-title"><?php echo esc_html_x('Data Import Successfully Completed!', 'backend', 'megastar'); ?></h1>
					<p><?php 
						$customizer_url = admin_url('customize.php');
						$site_url       = site_url();
						echo sprintf(wp_kses(_x('The Megastar dummy data, slider, widgets etc imported successfully in your site. View <a href="%1$s" target="_blank">your website</a><br>or start to customize it with <a href="%2$s">WordPress Customizer</a>.', 'backend', 'megastar'), array('a' => array('href'=>array(),'target'=>array()), 'br' => array())), esc_url( $site_url  ), esc_url( $customizer_url)  ); ?></p>
				</div>

				<form class="megastar-admin-container" action="?page=megastar-demo-import" method="post">

					<div class="megastar-admin-container-options">
						
						<h2><?php echo esc_html_x('One-Click Installer', 'backend', 'megastar'); ?></h2>
						<p><?php echo wp_kses(_x('Select from the options below which type of data you want to import in your site. The standard content gets always imported (including pages, images, navigation). <strong>If you want to import the demo content for plugins (WooCommerce, Contactform 7, Slider Revolution), make sure to install them before click on the Import button!</strong>.', 'backend', 'megastar'), array('strong' => array(), 'br' => array())); ?></p>

						<div class="megastar-admin-container-option rev-slider">
							<label class="megastar-admin-container-option-check">
								<input id="rev_slider" type="checkbox" value="ON" name="rev_slider"<?php if ( ! class_exists('RevSlider')) { echo ' disabled="disabled"'; }?>>
								<span class="megastar-admin-container-option-title"><?php echo esc_html_x('Import Slider Revolution Data', 'backend', 'megastar'); ?></span>
							</label>
						</div>

						<?php if ( ! class_exists('RevSlider')) :?> 
							<div class="megastar-admin-container-note megastar-admin-container-error">
								<p>
									<?php echo wp_kses(_x('<strong>Slider Revolution</strong> plugin is not active. Please activate it if you want Sliders to be imported.', 'backend', 'megastar'), array('strong' => array(), 'br' => array())); ?>
								</p>
							</div>
						<?php endif; ?>

						<div class="megastar-admin-container-note">
							<strong><?php echo esc_html_x('Important Notes:', 'backend', 'megastar'); ?></strong>
							<ol>
								<li><?php echo esc_html_x('We recommend to run the Demo Import on a clean WordPress installation.', 'backend', 'megastar'); ?></li>
								<li><?php 
								$wordpress_reset_plg = 'https://wordpress.org/plugins/wordpress-reset/';
								echo sprintf(wp_kses(_x('To reset your installation (if the import fails) we recommend <a href="%s" target="_blank">Wordpress Reset Plugin</a>.', 'backend', 'megastar'), array('a' => array('href'=>array(),'target'=>array()), 'br' => array())), esc_url( $wordpress_reset_plg )  ); ?></li>
								<li><?php echo esc_html_x('The Demo Import will not import the images we have used in our live demo, due to copyright / license reasons.', 'backend', 'megastar'); ?></li>
								<li><?php echo esc_html_x('Do not run the Demo Import multiple times, it will result in duplicated content.', 'backend', 'megastar'); ?></li>
							</ol>
						</div>

						<input type="hidden" name="action" value="perform_import">
						<input class="button-primary size_big" type="submit" value="<?php echo esc_html_x('Import Data', 'backend', 'megastar'); ?>" id="import_demo_data">
					</div>
				</form>
			<?php else : ?>
				
				<form class="megastar-admin-container">
					<div class="megastar-admin-container-note megastar-admin-container-error">
						<p>
							<?php echo wp_kses(_x('<strong>BdThemes Core</strong> plugin is not active. Please activate it if you want demo data in your site and some extra features.', 'backend', 'megastar'), array('strong' => array(), 'br' => array())); ?>
						</p>
					</div>

					<input class="button-primary size_big" type="submit" value="<?php echo esc_html_x('Import Data', 'backend', 'megastar'); ?>" id="import_demo_data" disabled>
				</form>

			<?php endif; ?>

		</div>
		<script>
			jQuery(document).ready(function($) {
				'use strict';
				var import_running = false;
				jQuery('#import_demo_data').click(function() {
					if ( !import_running) {
						import_running = true;
						jQuery("html, body").animate({ scrollTop: 0 }, { duration: 300 });
						jQuery('.megastar-admin-container').slideUp(null, function(){
							jQuery('.demo-import-message.content').slideDown();
						});

						// Importing Content
						jQuery.ajax({
							type: 'POST',
							url: '<?php echo admin_url('admin-ajax.php'); ?>',
							data: {
								action: 'megastar_demo_import_content'
							},
							success: function(data, textStatus, XMLHttpRequest) {

								if (jQuery('#rev_slider').is(':checked')) {
									// Importing Slider after Content
									jQuery('.demo-import-message.sliders').slideDown();
									jQuery.ajax({
										type: 'POST',
										url: '<?php echo admin_url('admin-ajax.php'); ?>',
										data: {
											action: 'megastar_demo_import_sliders'
										},
										success: function(data, textStatus, XMLHttpRequest) {
											jQuery('.demo-import-message.content').slideUp();
											jQuery('.demo-import-message.sliders').slideUp();
											jQuery('.demo-import-message.success').slideDown();
											import_running = false;
										},
										error: function(MLHttpRequest, textStatus, errorThrown){
											console.log('Something wrong when importing slider template!');
										}
									});

								} else {
									jQuery('.demo-import-message.content').slideUp();
									jQuery('.demo-import-message.success').slideDown();
									import_running = false;
								}

							},
							error: function(MLHttpRequest, textStatus, errorThrown) {
								console.log('Something wrong when importing demo content!');
							}
						});
					}

					return false;
				});
			});
		</script>
		<?php
	}

/*******************************/
/* Import content.xml File with WordPress Importer */
/*******************************/
	function megastar_demo_import_content() {
		set_time_limit(0);

		if (!defined('WP_LOAD_IMPORTERS')) define('WP_LOAD_IMPORTERS', true);

		if (!class_exists('WP_Import')) {
			$wordpress_importer = WP_PLUGIN_DIR.'/bdthemes-core/includes/wordpress-importer/wordpress-importer.php';

			if (file_exists($wordpress_importer)) {
				require_once($wordpress_importer);
			}
		}

		$wp_import = new WP_Import();
		$wp_import->fetch_attachments = true;

		 ob_start();
		 $wp_import->import(get_template_directory().'/demo-import/demo-files/content.xml');
		 ob_end_clean();


		// Set Menu Locations
		$locations = get_theme_mod('nav_menu_locations');
		$menus     = wp_get_nav_menus();

		if(!empty($menus)) {
			foreach($menus as $menu) {
				if(is_object($menu) && $menu->name == 'Main Menu') {
					$locations['primary'] = $menu->term_id;
				}elseif(is_object($menu) && $menu->name == 'Footer Menu') {
					$locations['footer'] = $menu->term_id;
				}elseif(is_object($menu) && $menu->name == 'Offcanvas Menu') {
					$locations['offcanvas'] = $menu->term_id;
				}
			}
		}
		set_theme_mod('nav_menu_locations', $locations);

		set_theme_mod('megastar_logo_upload', get_template_directory_uri() . '/images/logo-default.png');

		megastar_import_widget_demo();

		// Set Front Page
		$front_page = get_page_by_title('Homepage');

		if(isset($front_page->ID)) {
			update_option('show_on_front', 'page');
			update_option('page_on_front',  $front_page->ID);
		}

		echo 'Done!';
		die();

	}
	add_action('wp_ajax_megastar_demo_import_content', 'megastar_demo_import_content');

	/*******************************/
	/* Import Slider Revolution */
	/*******************************/
	function megastar_demo_import_sliders() {
		if (!class_exists('RevSlider')) { return false; }
        WP_Filesystem();
        global $wp_filesystem;

		ob_start();
		
		// Import Sliders
        $links = array(
		        	"http://bdthemes.com/secure/megastar/slider1.zip?key=13fb823b8016d31411a7fe281f41044g", 
		        	"http://bdthemes.com/secure/megastar/slider2.zip?key=13fb823b8016d31411a7fe281f41044g", 
		        	"http://bdthemes.com/secure/megastar/slider4.zip?key=13fb823b8016d31411a7fe281f41044g", 
		        	"http://bdthemes.com/secure/megastar/slider5.zip?key=13fb823b8016d31411a7fe281f41044g"
        		);

        foreach($links as $link){
            $wp_filesystem->put_contents(
                get_template_directory().'/wp-content/uploads/slider.zip', 
                $wp_filesystem->get_contents($link), FS_CHMOD_FILE                         
            );

            //slider import
            $_FILES["import_file"]["tmp_name"] =  get_template_directory().'/wp-content/uploads/slider.zip';
            $slider = new RevSlider();
            $response = $slider->importSliderFromPost();
            unset($slider);
            unlink($_FILES["import_file"]["tmp_name"]);
        }
		ob_end_clean();

		echo 'Done!';
		die();

	}
	add_action('wp_ajax_megastar_demo_import_sliders', 'megastar_demo_import_sliders');
}

function megastar_import_widget_demo() {

	global $wp_registered_widgets, $wp_registered_widget_controls, $wp_registered_widget_updates;
	/**
	 * Fires early when editing the widgets displayed in sidebars.
	 */
	do_action('load-widgets.php');

	/**
	 * Fires early when editing the widgets displayed in sidebars.
	 */
	do_action('widgets.php');

	/** This action is documented in wp-admin/widgets.php */
	do_action('sidebar_admin_setup');

	if (!function_exists('wie_upload_import_file')) {
		$wordpress_importer = WP_PLUGIN_DIR.'/bdthemes-core/includes/widget-importer/widget-importer.php';

		if (file_exists($wordpress_importer)) {
			require_once($wordpress_importer);
		}
	}

	ob_start();
	wie_process_import_file(get_template_directory() . '/demo-import/demo-files/widgets.wie');
	ob_end_clean();

}