<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @package Megastar
 * @link http://codex.wordpress.org/Theme_Customization_API
 */

class megastar_Customizer_Base {
	/**
	 * The singleton manager instance
	 *
	 * @see wp-includes/class-wp-customize-manager.php
	 * @var WP_Customize_Manager
	 */
	protected $wp_customize;

	public function __construct( WP_Customize_Manager $wp_manager ) {
		// set the private propery to instance of wp_manager
		$this->wp_customize = $wp_manager;

		// register the settings/panels/sections/controls, main method
		$this->register();

		/**
		 * Action and filters
		 */

		// render the CSS and cache it to the theme_mod when the setting is saved
		add_action( 'customize_save_after' , array( $this, 'cache_rendered_css' ) );

		// save logo width/height dimensions
		add_action( 'customize_save_megastar_logo_upload' , array( $this, 'megastar_save_logo_dimensions' ), 10, 1 );

		// flush the rewrite rules after the customizer settings are saved
		add_action( 'customize_save_after', 'flush_rewrite_rules' );

		// handle the postMessage transfer method with some dynamically generated JS in the footer of the theme
		add_action( 'wp_footer', array( $this, 'customize_footer_js' ), 30 );
		add_action('wp_head',array( $this, 'hook_custom_css' ));


	}

	/**
	* This hooks into 'customize_register' (available as of WP 3.4) and allows
	* you to add new sections and controls to the Theme Customize screen.
	*
	* Note: To enable instant preview, we have to actually write a bit of custom
	* javascript. See live_preview() for more.
	*
	* @see add_action('customize_register',$func)
	*/
	public function register () {
		/**
		 * Settings
		 */


		$this->wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$this->wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


		if ( isset( $this->wp_customize->selective_refresh ) ) {
			$this->wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.site-title a',
				'container_inclusive' => false,
				'render_callback' => 'megastar_customize_partial_blogname',
			));
			$this->wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector' => '.site-description',
				'container_inclusive' => false,
				'render_callback' => 'megastar_customize_partial_blogdescription',
			));
		}

		$this->wp_customize->add_setting( 'megastar_logo_upload' , array(
			'sanitize_callback' => 'esc_url'
		));
		$this->wp_customize->add_control( new WP_Customize_Image_Control( $this->wp_customize, 'megastar_logo_upload', array(
			'priority' => 101,
		    'label'    => esc_html_x( 'Logo Upload', 'backend', 'megastar' ),
			'description' => esc_html_x('Use 155px by 33px default logo dimension for best header look.', 'backend', 'megastar'),
		    'section'  => 'title_tagline',
		    'settings' => 'megastar_logo_upload'
		)));

		$this->wp_customize->add_setting( 'megastar_logo_small_upload' , array(
			'sanitize_callback' => 'esc_url'
		));
		$this->wp_customize->add_control( new WP_Customize_Image_Control( $this->wp_customize, 'megastar_logo_small_upload', array(
			'priority' => 103,
		    'label'    => esc_html_x( 'Mobile Logo Upload', 'backend', 'megastar' ),
			'description' => esc_html_x('Use 155px by 33px mobile logo dimension for best header look.', 'backend', 'megastar'),
		    'section'  => 'title_tagline',
		    'settings' => 'megastar_logo_small_upload'
		)));


		/**
		 * General Customizer Settings
		 */

		//general section
		$this->wp_customize->add_section('general', array(
			'title' => esc_html_x('General', 'backend', 'megastar'),
			'priority' => 30
		));	

		$this->wp_customize->add_setting('megastar_comment_show', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_comment_show',
	        array(
				'label'       => esc_html_x('Show Global Page Comment', 'backend', 'megastar'),
				'description' => esc_html_x('Enable / Disable global page comments (not post comment).', 'backend', 'megastar'),
				'section'     => 'general',
				'settings'    => 'megastar_comment_show',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('Yes', 'backend', 'megastar'),
					0  => esc_html_x('No', 'backend', 'megastar')
				)
	        )
		));

		$this->wp_customize->add_setting('megastar_offcanvas_search', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_offcanvas_search',
	        array(
				'label'       => esc_html_x('Offcanvas Search', 'backend', 'megastar'),
				'description' => esc_html_x('Enable / Disable Offcanvas search display', 'backend', 'megastar'),
				'section'     => 'general',
				'settings'    => 'megastar_offcanvas_search',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('Yes', 'backend', 'megastar'),
					0  => esc_html_x('No', 'backend', 'megastar')
				)
	        )
		));

		$this->wp_customize->add_setting('megastar_offcanvas_align', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_offcanvas_align',
	        array(
				'label'       => esc_html_x('Offcanvas Alignment', 'backend', 'megastar'),
				'description' => esc_html_x('Set the offcanvas bar alignment.', 'backend', 'megastar'),
				'section'     => 'general',
				'settings'    => 'megastar_offcanvas_align',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('Right Side', 'backend', 'megastar'),
					0  => esc_html_x('Left Side', 'backend', 'megastar')
				)
	        )
		));




		//titlebar section
		$this->wp_customize->add_section('titlebar', array(
			'title' => esc_html_x('Titlebar', 'backend', 'megastar'),
			'priority' => 31
		));

		$this->wp_customize->add_setting('megastar_global_header', array(
			'default' => 'title',
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control('megastar_global_header', array(
			'label'    => esc_html_x('Titlebar Layout', 'backend', 'megastar'),
			'section'  => 'titlebar',
			'settings' => 'megastar_global_header', 
			'type'     => 'select',
			'priority' => 1,
			'choices'  => array(
				'title'               => esc_html_x('Titlebar (Left Align)', 'backend', 'megastar'),
				'featuredimagecenter' => esc_html_x('Titlebar (Center Align)', 'backend', 'megastar'),
				'notitle'             => esc_html_x('No Titlebar', 'backend', 'megastar')
			)
		));


		$this->wp_customize->add_setting('megastar_titlebar_style', array(
			'default' => 'titlebar-dark',
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control('megastar_titlebar_style', array(
			'label'    => esc_html_x('Titlebar Style', 'backend', 'megastar'),
			'section'  => 'titlebar',
			'settings' => 'megastar_titlebar_style', 
			'type'     => 'select',
			'priority' => 1,
			'choices'  => array(
				'titlebar-dark' => esc_html_x('Dark (for dark backgrounds)', 'backend', 'megastar'),
				'titlebar-light' => esc_html_x('Light (for light backgrounds)', 'backend', 'megastar')
			)
		));

		$this->wp_customize->add_setting( 'megastar_titlebar_bg_image' , array(
			'sanitize_callback' => 'esc_url'
		));
		$this->wp_customize->add_control( new WP_Customize_Image_Control( $this->wp_customize, 'megastar_titlebar_bg_image', array(
			'priority' => 1,
		    'label'    => esc_html_x( 'Titlebar Background', 'backend', 'megastar' ),
		    'section'  => 'titlebar',
		    'settings' => 'megastar_titlebar_bg_image'
		)));

		$this->wp_customize->add_setting('megastar_blog_title', array(
			'default' => esc_html_x('Blog', 'backend', 'megastar'),
			'sanitize_callback' => 'esc_attr'
		));
		$this->wp_customize->add_control('megastar_blog_title', array(
			'priority' => 2,
		    'label'    => esc_html_x('Blog Title: ', 'backend', 'megastar'),
		    'section'  => 'titlebar',
		    'settings' => 'megastar_blog_title'
		));

		if (class_exists('Woocommerce')){
			$this->wp_customize->add_setting('megastar_woocommerce_title', array(
				'default' => esc_html_x('Shop', 'backend', 'megastar'),
				'sanitize_callback' => 'esc_attr'
			));
			$this->wp_customize->add_control('megastar_woocommerce_title', array(
				'priority' => 4,
			    'label'    => esc_html_x('WooCommerce Title: ', 'backend', 'megastar'),
			    'section'  => 'titlebar',
			    'settings' => 'megastar_woocommerce_title'
			));
		}
		
		$this->wp_customize->add_setting('megastar_right_element', array(
			'default' => 'back_button',
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control('megastar_right_element', array(
			'label'    => esc_html_x('Right Element', 'backend', 'megastar'),
			'section'  => 'titlebar',
			'settings' => 'megastar_right_element', 
			'type'     => 'select',
			'priority' => 5,
			'choices'  => array(
				0             => esc_html_x('Nothing', 'backend', 'megastar'),
				'back_button' => esc_html_x('Back Button', 'backend', 'megastar'),
				'breadcrumb'  => esc_html_x('Breadcrumb', 'backend', 'megastar')
			)
		));



		//blog section
		$this->wp_customize->add_section('blog', array(
			'title' => esc_html_x('Blog', 'backend', 'megastar'),
			'priority' => 30
		));


		$this->wp_customize->add_setting('megastar_blog_layout', array(
			'default' => 'sidebar-right',
			'sanitize_callback' => 'megastar_sanitize_choices',
		));
		$this->wp_customize->add_control(new megastar_Customize_Layout_Control( $this->wp_customize, 'megastar_blog_layout', 
			array(
				'label'       => esc_html_x('Blog Page Layout', 'backend', 'megastar'),
				'description' => esc_html_x('If you select static blog page so you need to select your blog page layout from here.', 'backend', 'megastar'),
				'section'     => 'blog',
				'settings'    => 'megastar_blog_layout', 
				'type'        => 'layout',
				'priority'    => 1,
				'choices' => array(
					"sidebar-left"  => esc_html_x('Sidebar Left', 'backend', 'megastar'), 
					"full"          => esc_html_x('Fullwidth', 'backend', 'megastar'),
					"sidebar-right" => esc_html_x('Sidebar Right', 'backend', 'megastar'),
				),
				//'active_callback' => 'is_front_page',
			)
		));



		$this->wp_customize->add_setting('megastar_blog_readmore', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_blog_readmore',
	        array(
				'priority'    => 2,
				'label'       => esc_html_x('Read More Button in Blog Posts', 'backend', 'megastar'),
				'description' => esc_html_x('Enable / Disable read more button on blog posts.', 'backend', 'megastar'),
				'section'     => 'blog',
				'settings'    => 'megastar_blog_readmore',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('Yes', 'backend', 'megastar'),
					0  => esc_html_x('No', 'backend', 'megastar')
				)
	        )
		));

		$this->wp_customize->add_setting('megastar_blog_meta', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_blog_meta',
	        array(
				'priority'    => 3,
				'label'       => esc_html_x('Metadata on Blog Posts', 'backend', 'megastar'),
				'description' => esc_html_x('Enable / Disable metadata on blog post.', 'backend', 'megastar'),
				'section'     => 'blog',
				'settings'    => 'megastar_blog_meta',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('Yes', 'backend', 'megastar'),
					0  => esc_html_x('No', 'backend', 'megastar')
				)
	        )
		));

		$this->wp_customize->add_setting('megastar_blog_next_prev', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_blog_next_prev',
	        array(
				'priority'    => 4,
				'label'       => esc_html_x('Previous / Next Pagination', 'backend', 'megastar'),
				'description' => esc_html_x('Enable / Disable next previous button on blog posts.', 'backend', 'megastar'),
				'section'     => 'blog',
				'settings'    => 'megastar_blog_next_prev',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('Yes', 'backend', 'megastar'),
					0  => esc_html_x('No', 'backend', 'megastar')
				)
	        )
		));

		$this->wp_customize->add_setting('megastar_author_info', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_author_info',
	        array(
				'priority'    => 5,
				'label'       => esc_html_x('Author Info in Blog Details', 'backend', 'megastar'),
				'description' => esc_html_x('Enable / Disable author info from underneath of blog posts.', 'backend', 'megastar'),
				'section'     => 'blog',
				'settings'    => 'megastar_author_info',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('Yes', 'backend', 'megastar'),
					0  => esc_html_x('No', 'backend', 'megastar')
				)
	        )
		));

		$this->wp_customize->add_setting('megastar_related_post', array(
			'default' => 0,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_related_post',
	        array(
				'priority'    => 6,
				'label'       => esc_html_x('Related Posts in Blog Details', 'backend', 'megastar'),
				'description' => esc_html_x('Enable / Disable related post underneath of blog posts.', 'backend', 'megastar'),
				'section'     => 'blog',
				'settings'    => 'megastar_related_post',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('Yes', 'backend', 'megastar'),
					0  => esc_html_x('No', 'backend', 'megastar')
				)
	        )
		));



		
		/**
		 * Layout Customizer Settings
		 */

		//layout section
		$this->wp_customize->add_section('layout', array(
			'title' => esc_html_x('Layout', 'backend', 'megastar'),
			'priority' => 31
		));

		$this->wp_customize->add_setting('megastar_global_layout', array(
			'default' => 'full',
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_global_layout', array(
			'label'    => esc_html_x('Global Layout', 'backend', 'megastar'),
			'section'  => 'layout',
			'settings' => 'megastar_global_layout', 
			'type'     => 'select',
			'choices'  => array(
				'full'  => esc_html_x('Fullwidth', 'backend', 'megastar'),
				'boxed' => esc_html_x('Boxed', 'backend', 'megastar'),
			)
		)));


		$this->wp_customize->add_setting('megastar_header_style', array(
			'default' => 'default',
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_header_style', array(
			'label'    => esc_html_x('Header Style', 'backend', 'megastar'),
			'section'  => 'layout',
			'settings' => 'megastar_header_style', 
			'type'     => 'select',
			'choices'  => array(
				'default' => esc_html_x('Default', 'backend', 'megastar'),
				'style2'  => esc_html_x('Style 2', 'backend', 'megastar'),
				'style3'  => esc_html_x('Style 3', 'backend', 'megastar'),
				//'style4'  => esc_html_x('Style 4', 'backend', 'megastar'),
			)
		)));


		$this->wp_customize->add_setting('megastar_header_type', array(
			'default' => 'default',
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_header_type', array(
			'label'    => esc_html_x('Header Type', 'backend', 'megastar'),
			'section'  => 'layout',
			'settings' => 'megastar_header_type', 
			'type'     => 'select',
			'choices'  => array(
				'default'      => esc_html_x('Default', 'backend', 'megastar'),
				'sticky'       => esc_html_x('Sticky', 'backend', 'megastar'),
				'smart-sticky' => esc_html_x('Smart Sticky', 'backend', 'megastar'),
				'fixed'        => esc_html_x('Fixed', 'backend', 'megastar'),
			)
		)));


		$this->wp_customize->add_setting('megastar_header_transparent', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_checkbox'
		));
		$this->wp_customize->add_control('megastar_header_transparent', array(
			'label'       => esc_html_x('Transparent Header', 'backend', 'megastar'),
			'description' => esc_html_x('(Enable / Disable header transparancy on fixed state)', 'backend', 'megastar'),
			'section'     => 'layout',
			'settings'    => 'megastar_header_transparent',
			'type'        => 'checkbox',
			'active_callback' => 'megastar_header_type_check',
		));



		$this->wp_customize->add_setting('megastar_navbar_style', array(
			'default' => 'default',
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_navbar_style', array(
			'label'    => esc_html_x('Menu Style', 'backend', 'megastar'),
			'section'  => 'layout',
			'settings' => 'megastar_navbar_style', 
			'type'     => 'select',
			'choices'  => array(
				'default' => esc_html_x('Default', 'backend', 'megastar'),
				'style2'  => esc_html_x('Style 2', 'backend', 'megastar'),
				'style3'  => esc_html_x('Style 3', 'backend', 'megastar'),
				'style4'  => esc_html_x('Style 4', 'backend', 'megastar'),
			)
		)));


		$this->wp_customize->add_setting('megastar_toolbar', array(
			'default' => 0,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_toolbar', array(
			'label'    => esc_html_x('Show Toolbar', 'backend', 'megastar'),
			'section'  => 'layout',
			'settings' => 'megastar_toolbar', 
			'type'     => 'select',
			'choices'  => array(
				1 => esc_html_x('Yes', 'backend', 'megastar'),
				0 => esc_html_x('No', 'backend', 'megastar'),
			)
		)));


		$this->wp_customize->add_setting('megastar_toolbar_left', array(
			'default' => 'tagline',
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_toolbar_left', array(
			'label'           => esc_html_x('Toolbar Left Area', 'backend', 'megastar'),
			'section'         => 'layout',
			'settings'        => 'megastar_toolbar_left', 
			'active_callback' => 'megastar_toolbar_check',
			'type'            => 'select',
			'choices'         => $this->megastar_toolbar_left_elements()
		)));


		$this->wp_customize->add_setting('megastar_toolbar_left_custom', array(
			'sanitize_callback' => 'megastar_sanitize_textarea'
		));
		$this->wp_customize->add_control( new megastar_Customize_Textarea_Control( $this->wp_customize, 'megastar_toolbar_left_custom', array(
			'label'           => esc_html_x('Toolbar Left Custom Text', 'backend', 'megastar'),
			'section'         => 'layout',
			'settings'        => 'megastar_toolbar_left_custom',
			'active_callback' => 'megastar_toolbar_left_custom_check',
			'type'            => 'textarea',
		)));

		$this->wp_customize->add_setting('megastar_toolbar_right', array(
			'default' => 'social',
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control( $this->wp_customize, 'megastar_toolbar_right', array(
			'label'           => esc_html_x('Toolbar Right Area', 'backend', 'megastar'),
			'description' 	  => (get_theme_mod( 'megastar_cart' ) == 'toolbar') ? esc_html_x('This element automatically hide on mobile mode, for better preview shopping cart.', 'backend', 'megastar') : '',
			'section'         => 'layout',
			'settings'        => 'megastar_toolbar_right', 
			'active_callback' => 'megastar_toolbar_check',
			'type'            => 'select',
			'choices'         => $this->megastar_toolbar_right_elements()
		)));


		$this->wp_customize->add_setting('megastar_toolbar_right_custom', array(
			'sanitize_callback' => 'megastar_sanitize_textarea'
		));
		$this->wp_customize->add_control( new megastar_Customize_Textarea_Control( $this->wp_customize, 'megastar_toolbar_right_custom', array(
			'label'           => esc_html_x('Toolbar Right Custom Text', 'backend', 'megastar'),
			'section'         => 'layout',
			'settings'        => 'megastar_toolbar_right_custom',
			'active_callback' => 'megastar_toolbar_right_custom_check',
			'type'            => 'textarea',
		)));





		$this->wp_customize->add_setting('megastar_header_search', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_checkbox'
		));
		$this->wp_customize->add_control('megastar_header_search', array(
			'label'       => esc_html_x('Search on Header', 'backend', 'megastar'),
			'description' => esc_html_x('(Enable / Disable search on header position)', 'backend', 'megastar'),
			'section'     => 'layout',
			'settings'    => 'megastar_header_search',
			'type'        => 'checkbox'
		));






		$this->wp_customize->add_setting('megastar_bg_note', array(
				'default'           => '',
				'sanitize_callback' => 'esc_attr'
		    )
		);
		$this->wp_customize->add_control( new megastar_Customize_Alert_Control( $this->wp_customize, 'megastar_bg_note', array(
			'label'       => 'Background Alert',
			'section'     => 'background_image',
			'settings'    => 'megastar_bg_note',
			'type'        => 'alert',
			'priority'    => 1,
			'text'        => esc_html_x('You must set your layout mode Boxed for use this feature. Otherwise you can\'t see what happening in background', 'backend', 'megastar'),
			'alert_type' => 'warning',
		    )) 
		);


		// Add drawer background color setting.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'drawer_background_color', array(
			'default'           => '#40363a',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map'           => array(
				'background-color' => array(
					'.tm-drawer',
				),
				'border-right-color' => array(
					'.drawer_toggle',
				),
			)
		)));

		// Add drawer background color control.
		$this->wp_customize->add_control( new WP_Customize_Color_Control( $this->wp_customize, 'drawer_background_color', array(
			'label'           => esc_html_x( 'Drawer Background Color', 'backend', 'megastar' ),
			'section'         => 'colors',
			'active_callback' => 'megastar_drawer_widget_check',
		)));


		// Add drawer text color setting.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'drawer_text_color', array(
			'default'           => '#a5a5a5',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map' => array(
				'color' => array(
					'.tm-drawer',
				),
				'color|lighten(10)' => array(
					'.tm-drawer h3.uk-panel-title'
				),
			)
		)));

		// Add drawer text color control.
		$this->wp_customize->add_control( new WP_Customize_Color_Control( $this->wp_customize, 'drawer_text_color', array(
			'label'       => esc_html_x( 'Drawer Text Color', 'backend', 'megastar' ),
			'section'     => 'colors',
			'active_callback' => 'megastar_drawer_widget_check',
		)));

 		
 		// Add main color setting and control.
                $this->wp_customize->add_setting(new megastar_Customizer_Dynamic_CSS($this->wp_customize, 'main_themes_color', array(
                    'default' => '',
                    'transport' => 'postMessage',
                    'active_callback' => 'choice_color_callback',
                        // 'css_map' => array(
                        // 	'background-color' => array(
                        // 		'.tm-headerbar'
                        // 	),
                        // 	'border-top-color|darken(5)' => array(
                        // 		'.header-style2 .menu-wrapper'
                        // 	)
                        // )
                )));

                $this->wp_customize->add_control(new megastar_Choice_Color_Control($this->wp_customize, 'main_themes_color', array(
                    'label' => esc_html_x('Main Themes Color', 'backend', 'megastar'),
                    'priority' => 1,
                    'section' => 'colors',
                    'type' => 'select-color',
                    'settings'    => 'main_themes_color', 
                    'colors_box' => array(
                        'blue' => 'blue',
                        'blue-gary' => 'blue-gary',
                        'brown'     => 'brown',
                        'gray'      => 'gray',
                        'green'     => 'green',
                        'lemon'     => 'lemon',
                        'orange'    => 'orange',
                        'red'       => 'red',
                        'sky-blue'  => 'sky-blue',
                        'yellow'    => 'yellow',
                    ),
                )));



		// Add header background color setting and control.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'header_background_color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'megastar_sanitize_rgba_color',
			'css_map' => array(
				'background-color' => array(
					'.tm-headerbar'
				),
				'border-top-color|darken(5)' => array(
					'.header-style2 .menu-wrapper'
				)
			)
		)));

		$this->wp_customize->add_control(new megastar_Alpha_Color_Control( $this->wp_customize, 'header_background_color', array(
			'label'       => esc_html_x('Header Background Color', 'backend', 'megastar'),
			'section'     => 'colors',
        )));


        // Add menu color setting and control.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'navbar_nav_color', array(
			'default'           => '#888888',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map' => array(
				'color' => array(
					'.uk-navbar-nav > li > a'
				),
			)
		)));

		$this->wp_customize->add_control(new WP_Customize_Color_Control( $this->wp_customize, 'navbar_nav_color', array(
			'label'       => esc_html_x('Main Menu Color', 'backend', 'megastar'),
			'section'     => 'colors',
        )));

        // Add menu hover color setting and control.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'navbar_nav_hover_color', array(
			'default'           => '#666666',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map' => array(
				'color' => array(
					'.uk-navbar-nav > li.uk-active > a',
					'.uk-navbar-nav > li:hover > a',
					'.uk-navbar-nav > li > a:focus', 
					'.uk-navbar-nav > li.uk-open > a',
				),
			)
		)));

		$this->wp_customize->add_control(new WP_Customize_Color_Control( $this->wp_customize, 'navbar_nav_hover_color', array(
			'label'       => esc_html_x('Main Menu Hover Color', 'backend', 'megastar'),
			'section'     => 'colors',
        )));




		// Dropdown background color
        $this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'dropdown_navbar_background', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'megastar_sanitize_rgba_color',
			'css_map' => array(
				'background-color' => array(
					'.uk-dropdown-navbar'
				),
				'border-left-color|darken(5)' => array(
					'.uk-dropdown:not(.uk-dropdown-stack) > .uk-dropdown-grid > [class*=\'uk-width-\']:nth-child(n+2)'
				)
			)
		)));

		$this->wp_customize->add_control(new megastar_Alpha_Color_Control( $this->wp_customize, 'dropdown_navbar_background', array(
			'label'       => esc_html_x('Dropdown Background Color', 'backend', 'megastar'),
			'section'     => 'colors',
        )));



        // Add menu color setting and control.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'nav_navbar_color', array(
			'default'           => '#666666',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map' => array(
				'color' => array(
					'.uk-nav-navbar > li > a',
					'div.uk-dropdown .sub-dropdown ul > li > a',
				),
			)
		)));

		$this->wp_customize->add_control(new WP_Customize_Color_Control( $this->wp_customize, 'nav_navbar_color', array(
			'label'       => esc_html_x('Dropdown Color', 'backend', 'megastar'),
			'section'     => 'colors',
        )));

        // Add menu hover color setting and control.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'nav_navbar_hover_color', array(
			'default'           => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map' => array(
				'color' => array(
					'.uk-nav-navbar > li > a:hover',
					'.uk-nav-navbar > li > a:focus',
					'div.uk-dropdown .sub-dropdown ul > li > a:hover',
				),
			)
		)));

		$this->wp_customize->add_control(new WP_Customize_Color_Control( $this->wp_customize, 'nav_navbar_hover_color', array(
			'label'       => esc_html_x('Dropdown Hover Color', 'backend', 'megastar'),
			'section'     => 'colors',
        )));






        // Add page background color setting and control.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'global_page_background_color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map' => array(
				'background-color' => array(
					'.site',
					'.uk-navbar-nav > li:hover > a', 
					'.uk-navbar-nav > li > a:focus', 
					'.uk-navbar-nav > li.uk-open > a',
					'.uk-form select', 
					'.uk-form textarea', 
					'.uk-form input:not([type])', 
					'.uk-form input[type=\'text\']', 
					'.uk-form input[type=\'password\']', 
					'.uk-form input[type=\'datetime\']', 
					'.uk-form input[type=\'datetime-local\']', 
					'.uk-form input[type=\'date\']', 
					'.uk-form input[type=\'month\']', 
					'.uk-form input[type=\'time\']', 
					'.uk-form input[type=\'week\']', 
					'.uk-form input[type=\'number\']', 
					'.uk-form input[type=\'email\']', 
					'.uk-form input[type=\'url\']', 
					'.uk-form input[type=\'search\']', 
					'.uk-form input[type=\'tel\']', 
					'.uk-form input[type=\'color\']'
				),
			)
		)));

		$this->wp_customize->add_control(new WP_Customize_Color_Control( $this->wp_customize, 'global_page_background_color', array(
			'label'       => esc_html_x('Page Background Color', 'backend', 'megastar'),
			'section'     => 'colors',
        )));


        // Add global link color setting.
        $this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'global_link_color', array(
        	'default'           => '#f57c00',
        	'sanitize_callback' => 'sanitize_hex_color',
        	'css_map' => array(
        		'color' => array(
					'a',
					'.uk-link',
					'.uk-nav-side ul a',
					'.uk-nav-dropdown ul a',
					'.uk-nav-navbar ul a',
					'.uk-navbar-content > a:not([class])',
					'.uk-subnav > * > :hover',
					'.uk-subnav > * > :focus',
					'.uk-subnav > .uk-active > *',
					'.uk-tab > li > a',
					'.uk-button-primary',
					'.uk-button-link',
					'.su-member.su-member-style-1 a.btn-view-all:hover',
					'.tm-copyright .tribe-list-widget h4.tribe-event-title a',
					'.su-heading a.btn-view-all:hover',
					'.su-icon-list .list-img-icon',
					'.su-counter-icon i',
					'.bdt_countdown [class*=\'-amount\']',
					'.global-link-color',
				),
				'background-color' => array(
					'.readon',
					'.tm-navigation-wrapper .tm-navbar ul.uk-navbar-nav > li > a:before', 
					'.uk-button-primary', 
					'.entry-quote a:hover', 
					'.readon.primary', 
					'.tm-totop-scroller', 
					'.su-progress-bar .su-pb-fill',
					'.navbar-style2 .uk-navbar-nav > li > a:before',
					'.navbar-style3 .uk-navbar-nav > li:hover > a:before', 
					'.navbar-style3 .uk-navbar-nav > li.uk-active > a:before',
					'.navbar-style3 .uk-navbar-nav > li > a:after',
					'.navbar-style4 .uk-navbar-nav > li.uk-parent > a:after',

				),
				'border-color' => array(
					'.readon',
				),

        	)
        )));

        // Add global link color control.
        $this->wp_customize->add_control( new WP_Customize_Color_Control( $this->wp_customize, 'global_link_color', array(
        	'label'       => esc_html_x( 'Global Link Color', 'backend', 'megastar' ),
        	'section'     => 'colors',
        )));



        // Add global link hover color setting.
        $this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'global_link_hover_color', array(
        	'default'           => '#fa8d1d',
        	'sanitize_callback' => 'sanitize_hex_color',
        	'css_map' => array(
        		'color' => array(
        			'a:hover',
					'.uk-link:hover',
					'.uk-nav-side ul a:hover',
					'.uk-nav-dropdown ul a:hover',
					'.uk-nav-navbar ul a:hover',
					'.uk-navbar-content > a:not([class]):hover',
					'.uk-tab > li > a:hover',
					'.uk-tab > li > a:focus',
					'.uk-tab > li.uk-open > a',
					'.uk-button-link:hover',
					'.uk-button-link:focus',
					'.uk-button-link:active',
					'.uk-button-link.uk-active',
					'.tm-copyright .tribe-list-widget h4.tribe-event-title a:hover',
        		),
        		'background-color' => array(
        			'.readon:hover',
        			'.uk-button-primary:hover',
					'.uk-button-primary:focus',
					'.uk-button-primary:active',
					'.uk-button-primary.uk-active',
					'.readon.border:hover',
					'.readon.primary:hover',
        		),
        		'border-color' => array(
        			'.readon:hover',
        		),
        	)
        )));

        // Add global link hover color control.
        $this->wp_customize->add_control( new WP_Customize_Color_Control( $this->wp_customize, 'global_link_hover_color', array(
        	'label'       => esc_html_x( 'Global Link Hover Color', 'backend', 'megastar' ),
        	'section'     => 'colors',
        )));



        // Add global link hover color setting.
        $this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'global_color', array(
        	'default'           => '#666666',
        	'sanitize_callback' => 'sanitize_hex_color',
        	'css_map' => array(
        		'color' => array(
        			'body',
        			'.uk-form select', 
        			'.uk-form textarea', 
        			'.uk-form input:not([type])', 
        			'.uk-form input[type=\'text\']', 
        			'.uk-form input[type=\'password\']', 
        			'.uk-form input[type=\'datetime\']', 
        			'.uk-form input[type=\'datetime-local\']', 
        			'.uk-form input[type=\'date\']', 
        			'.uk-form input[type=\'month\']', 
        			'.uk-form input[type=\'time\']', 
        			'.uk-form input[type=\'week\']', 
        			'.uk-form input[type=\'number\']', 
        			'.uk-form input[type=\'email\']', 
        			'.uk-form input[type=\'url\']', 
        			'.uk-form input[type=\'search\']', 
        			'.uk-form input[type=\'tel\']', 
        			'.uk-form input[type=\'color\']',

        		),
        	)
        )));

        // Add global link hover color control.
        $this->wp_customize->add_control( new WP_Customize_Color_Control( $this->wp_customize, 'global_color', array(
        	'label'       => esc_html_x( 'Main Text Color', 'backend', 'megastar' ),
        	'section'     => 'colors',
        )));





		/**
		 * Footer Customizer Settings
		 */

		// footer appearance
		$this->wp_customize->add_section('footer', array(
			'title' => esc_html_x('Footer', 'backend', 'megastar'),
			'description' => esc_html_x( 'All Megastar theme specific settings.', 'backend', 'megastar' ),
			'priority' => 999
		));

		$this->wp_customize->add_setting('megastar_footer_widgets', array(
			'default' => 1,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control($this->wp_customize, 'megastar_footer_widgets',
	        array(
				'priority'    => 1,
				'label'       => esc_html_x('Show Footer Widgets', 'backend', 'megastar'),
				'section'     => 'footer',
				'settings'    => 'megastar_footer_widgets',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('Yes', 'backend', 'megastar'),
					0 => esc_html_x('No', 'backend', 'megastar')
				)
	        )
		));

		$this->wp_customize->add_setting('megastar_footer_columns', array(
			'default' => 4,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control(new WP_Customize_Control($this->wp_customize, 'megastar_footer_columns',
	        array(
				'priority'    => 2,
				'label'       => esc_html_x('Footer Columns', 'backend', 'megastar'),
				'section'     => 'footer',
				'settings'    => 'megastar_footer_columns',
				'type'        => 'select',
				'choices'     => array(
					1 => esc_html_x('One Column', 'backend', 'megastar'),
					2 => esc_html_x('Two Columns', 'backend', 'megastar'),
					3 => esc_html_x('Three Columns', 'backend', 'megastar'),
					4 => esc_html_x('Four Columns', 'backend', 'megastar'),
				)
	        )
		));



		$this->wp_customize->add_setting(new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'footer_background_image', array(
			'default' => get_template_directory_uri() . '/images/footer-bg.png',
			'css_map' => array(
				'background-image|url' => array(
					'.footer-wrapper',
				),
			)
		)));

		$this->wp_customize->add_control( new WP_Customize_Image_Control( $this->wp_customize, 'footer_background_image', array(
			'label'       => esc_html_x( 'Footer Background Image', 'backend', 'megastar' ),
			'section'     => 'colors',
			'active_callback' => 'megastar_footer_widget_check',
		)));



		// Add footer background color setting.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'footer_background_color', array(
			'default'           => '#222222',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map' => array(
				'background-color' => array(
					'.footer-wrapper',
				),
				'border-color' => array(
					'.footer-wrapper [class*=\'uk-width-\']',
				),
				'background-color|lighten(2)' => array(
					'body .widget_tag_cloud a',
				),
			)
		)));

		// Add footer background color control.
		$this->wp_customize->add_control( new WP_Customize_Color_Control( $this->wp_customize, 'footer_background_color', array(
			'label'       => esc_html_x( 'Footer Background Color', 'backend', 'megastar' ),
			'section'     => 'colors',
			'active_callback' => 'megastar_footer_widget_check',
		)));


		// Add footer text color setting.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'footer_text_color', array(
			'default'           => '#a5a5a5',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map' => array(
				'color' => array(
					'.footer-wrapper',
				),
				'color|darken(5)' => array(
					'.widget_tag_cloud a',
				),
			)
		)));

		// Add footer text color control.
		$this->wp_customize->add_control( new WP_Customize_Color_Control( $this->wp_customize, 'footer_text_color', array(
			'label'       => esc_html_x( 'Footer Text Color', 'backend', 'megastar' ),
			'section'     => 'colors',
			'active_callback' => 'megastar_footer_widget_check',
		)));


		// Add copyright background color setting.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'copyright_background_color', array(
			'default'           => 'rgba(0, 0, 0, 0.5)',
			'sanitize_callback' => 'megastar_sanitize_rgba_color',
			'css_map' => array(
				'background-color' => array(
					'.copyright-wrapper',
				),
			)
		)));

		// Add copyright background color control.
		$this->wp_customize->add_control( new megastar_Alpha_Color_Control( $this->wp_customize, 'copyright_background_color', array(
			'label'        => esc_html_x( 'Copyright Background Color', 'backend', 'megastar' ),
			'section'      => 'colors',
			'show_opacity' => true, // Optional.
		)));


		// Add copyright text color setting.
		$this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'copyright_text_color', array(
			'default'           => '#bbbbbb',
			'sanitize_callback' => 'sanitize_hex_color',
			'css_map' => array(
				'color' => array(
					'.copyright-wrapper',
					'.copyright-wrapper .uk-container',
					'.copyright-wrapper .uk-container a',
				),
				'color|lighten(5)' => array(
					'.copyright-wrapper .uk-container a:hover',
				),
				'border-color|darken(5)' => array(
					'.copyright-wrapper ul.uk-subnav li:before',
				),
			)
		)));

		// Add copyright text color control.
		$this->wp_customize->add_control( new WP_Customize_Color_Control( $this->wp_customize, 'copyright_text_color', array(
			'label'       => esc_html_x( 'Copyright Text Color', 'backend', 'megastar' ),
			'section'     => 'colors',
		)));	



		/*
		 * "go to top" link
		 */
		$this->wp_customize->add_setting('megastar_top_link', array(
			'default' => 0,
			'sanitize_callback' => 'megastar_sanitize_checkbox'
		));
		$this->wp_customize->add_control(new WP_Customize_Control($this->wp_customize, 'megastar_top_link',
	        array(
				'priority' => 3,
				'label'    => esc_html_x('Disable "Go to top" link', 'backend', 'megastar'),
				'section'  => 'footer',
				'settings' => 'megastar_top_link',
				'type'     => 'checkbox'
	        )
		));

		$this->wp_customize->add_setting('megastar_show_copyright_text', array(
			'default' => 0,
			'sanitize_callback' => 'megastar_sanitize_checkbox'
		));
		$this->wp_customize->add_control(new WP_Customize_Control($this->wp_customize, 'megastar_show_copyright_text',
	        array(
				'priority' => 4,
				'label'    => esc_html_x('Show Custom Copyright Text', 'backend', 'megastar'),
				'section'  => 'footer',
				'settings' => 'megastar_show_copyright_text',
				'type'     => 'checkbox',
	        )
		));
		
		//Footer Content
		$this->wp_customize->add_setting('megastar_custom_copyright_text', array(
			'default'           => 'Theme Designed by <a href="'.esc_url( esc_html_x( 'https://www.bdthemes.com', 'backend', 'megastar')).' ">BdThemes Ltd</a>',
			'sanitize_callback' => 'megastar_sanitize_textarea'
		));
		$this->wp_customize->add_control( new megastar_Customize_Textarea_Control( $this->wp_customize, 'megastar_custom_copyright_text', array(
			'priority' => 5,
			'label'    => esc_html_x('Copyright Text', 'backend', 'megastar'),
			'section'  => 'footer',
			'settings' => 'megastar_custom_copyright_text',
			'active_callback' => 'megastar_footer_custom_text_check',
			'type'     => 'textarea',
		)));




		//header section
		if (class_exists('Woocommerce')){
			$this->wp_customize->add_section('woocommerce', array(
				'title' => esc_html_x('WooCommerce', 'backend', 'megastar'),
				'priority' => 32
			));


			$this->wp_customize->add_setting('megastar_woocommerce_sidebar', array(
				'default' => 'sidebar-left',
				'sanitize_callback' => 'megastar_sanitize_choices',
			));
			$this->wp_customize->add_control(new megastar_Customize_Layout_Control( $this->wp_customize, 'megastar_woocommerce_sidebar', 
				array(
					'label'       => esc_html_x('Shop Page Sidebar', 'backend', 'megastar'),
					'description' => esc_html_x('Make sure you add your widget in shop widget position.', 'backend', 'megastar'),
					'section'     => 'woocommerce',
					'settings'    => 'megastar_woocommerce_sidebar', 
					'choices' => array(
						"sidebar-left"  => esc_html_x('Sidebar Left', 'backend', 'megastar'), 
						"full"          => esc_html_x('Fullwidth', 'backend', 'megastar'),
						"sidebar-right" => esc_html_x('Sidebar Right', 'backend', 'megastar'),
					),
					//'active_callback' => 'is_front_page',
				)
			));

			//avatar shape
			$this->wp_customize->add_setting('megastar_cart', array(
				'default'           => 'no',
				'sanitize_callback' => 'megastar_sanitize_choices'
			));
			$this->wp_customize->add_control('megastar_cart', array(
				'label'       => esc_html_x('Shopping Cart Icon in Header:', 'backend', 'megastar'),
				'description' => esc_html_x('Enable / Disable Shopping Cart Icon', 'backend', 'megastar'),
				'section'     => 'woocommerce',
				'settings'    => 'megastar_cart', 
				'type'        => 'select',
				'choices'     => array(
					'no'      => esc_html_x('No Need', 'backend', 'megastar'),
					'header'  => esc_html_x('Yes (in header)', 'backend', 'megastar'),
					'toolbar' => esc_html_x('Yes (in toolbar)', 'backend', 'megastar'),
				)
			));

			$this->wp_customize->add_setting('megastar_woocommerce_title', array(
				'default'           => esc_html_x('Shop', 'backend', 'megastar'),
				'sanitize_callback' => 'esc_attr'
			));
			$this->wp_customize->add_control('megastar_woocommerce_title', array(
			    'label'    => esc_html_x('WooCommerce Page Title: ', 'backend', 'megastar'),
			    'section'  => 'titlebar',
			    'settings' => 'megastar_woocommerce_title',
			    'priority' => 4,
			));


			$this->wp_customize->add_setting('megastar_woocommerce_columns', array(
				'default' => 3,
				'sanitize_callback' => 'megastar_sanitize_choices'
			) );
			$this->wp_customize->add_control('megastar_woocommerce_columns', array(
				'label'    => esc_html_x('WooCommerce Columns:', 'backend', 'megastar'),
				'section'  => 'woocommerce',
				'settings' => 'megastar_woocommerce_columns', 
				'type'     => 'select',
				'choices'  => array(
					2 => esc_html_x('2 Columns', 'backend', 'megastar'),
					3 => esc_html_x('3 Columns', 'backend', 'megastar'),
					4 => esc_html_x('4 Columns', 'backend', 'megastar')
				)
			));

			$this->wp_customize->add_setting('megastar_woocommerce_limit', array(
				'default' => 12,
				'sanitize_callback' => 'esc_attr'
			));
			$this->wp_customize->add_control('megastar_woocommerce_limit', array(
				'label'       => esc_html_x('Items per Shop Page: ', 'backend', 'megastar'),
				'description' => esc_html_x('Enter how many items you want to show on Shop pages & Categorie Pages before Pagination shows up (Default: 12)', 'backend', 'megastar'),
				'section'     => 'woocommerce',
				'settings'    => 'megastar_woocommerce_limit'
			));

			$this->wp_customize->add_setting('megastar_woocommerce_sort', array(
				'default' => 1,
				'sanitize_callback' => 'megastar_sanitize_checkbox'
			));
			$this->wp_customize->add_control('megastar_woocommerce_sort', array(
				'label'       => esc_html_x('Shop Sort', 'backend', 'megastar'),
				'description' => esc_html_x('(Enable / Disable sort-by function on Shop Pages)', 'backend', 'megastar'),
				'section'     => 'woocommerce',
				'settings'    => 'megastar_woocommerce_sort',
				'type'        => 'checkbox'
			));

			$this->wp_customize->add_setting('megastar_woocommerce_result_count', array(
				'default' => 1,
				'sanitize_callback' => 'megastar_sanitize_checkbox'
			));
			$this->wp_customize->add_control('megastar_woocommerce_result_count', array(
				'label'       => esc_html_x('Shop Result Count', 'backend', 'megastar'),
				'description' => esc_html_x('(Enable / Disable Result Count on Shop Pages)', 'backend', 'megastar'),
				'section'     => 'woocommerce',
				'settings'    => 'megastar_woocommerce_result_count',
				'type'        => 'checkbox'
			));

			$this->wp_customize->add_setting('megastar_woocommerce_cart_button', array(
				'default' => 1,
				'sanitize_callback' => 'megastar_sanitize_checkbox'
			));
			$this->wp_customize->add_control('megastar_woocommerce_cart_button', array(
				'label'       => esc_html_x('Add to Cart Button', 'backend', 'megastar'),
				'description' => esc_html_x('(Enable / Disable "Add to Cart"-Button on Shop Pages)', 'backend', 'megastar'),
				'section'     => 'woocommerce',
				'settings'    => 'megastar_woocommerce_cart_button',
				'type'        => 'checkbox'
			));

			$this->wp_customize->add_setting('megastar_woocommerce_upsells', array(
				'default' => 0,
				'sanitize_callback' => 'megastar_sanitize_checkbox'
			));
			$this->wp_customize->add_control('megastar_woocommerce_upsells', array(
				'label'       => esc_html_x('Upsells Products', 'backend', 'megastar'),
				'description' => esc_html_x('(Enable / Disable to show upsells Products on Product Item Details)', 'backend', 'megastar'),
				'section'     => 'woocommerce',
				'settings'    => 'megastar_woocommerce_upsells',
				'type'        => 'checkbox'
			));
			$this->wp_customize->add_setting('megastar_woocommerce_related', array(
				'default' => 1,
				'sanitize_callback' => 'megastar_sanitize_checkbox'
			));
			$this->wp_customize->add_control('megastar_woocommerce_related', array(
				'label'       => esc_html_x('Related Products', 'backend', 'megastar'),
				'description' => esc_html_x('(Enable / Disable to show related Products on Product Item Details)', 'backend', 'megastar'),
				'section'     => 'woocommerce',
				'settings'    => 'megastar_woocommerce_related',
				'type'        => 'checkbox'
			));
		}


		//header section
		$this->wp_customize->add_section('portfolio', array(
			'title' => esc_html_x('Portfolio', 'backend', 'megastar'),
			'priority' => 31
		));

		$this->wp_customize->add_setting('megastar_portfolio_slug', array(
			'default' => esc_html_x('portfolio-item', 'backend', 'megastar'),
			'sanitize_callback' => 'esc_attr'
		));
		$this->wp_customize->add_control('megastar_portfolio_slug', array(
		    'label'    => esc_html_x('Portfolio Slug: ', 'backend', 'megastar'),
		    'section'  => 'portfolio',
		    'settings' => 'megastar_portfolio_slug'
		));

		$this->wp_customize->add_setting('megastar_portfolio_comment', array(
			'default' => 0,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control('megastar_portfolio_comment', array(
			'label'    => esc_html_x('Show Comment', 'backend', 'megastar'),
			'section'  => 'portfolio',
			'settings' => 'megastar_portfolio_comment', 
			'type'     => 'radio',
			'choices'  => array(
				0 => esc_html_x('No', 'backend', 'megastar'),
				1 => esc_html_x('Yes', 'backend', 'megastar')
			)
		));

		$this->wp_customize->add_setting('megastar_portfolio_navigation', array(
			'default' => 0,
			'sanitize_callback' => 'megastar_sanitize_choices'
		));
		$this->wp_customize->add_control('megastar_portfolio_navigation', array(
			'label'    => esc_html_x('Show Navigation', 'backend', 'megastar'),
			'section'  => 'portfolio',
			'settings' => 'megastar_portfolio_navigation', 
			'type'     => 'radio',
			'choices'  => array(
				0 => esc_html_x('No', 'backend', 'megastar'),
				1 => esc_html_x('Yes', 'backend', 'megastar')
			)
		));


		// //typography section
		// $this->wp_customize->add_section('typography', array(
		// 	'title' => esc_html_x('Typography', 'backend', 'megastar'),
		// 	'priority' => 30
		// ));





		// // Add setting Heading font family settings
		// $this->wp_customize->add_setting( 'megastar_heading_font_family', array(
		// 	'type'              => 'theme_mod',
		// 	'default'           => NULL,
		// 	'transport'         => 'postMessage',
		// 	'sanitize_callback' => false,
		// ));

		// // Add Heading Font Control
		// $this->wp_customize->add_control( new megastar_Google_Fonts_Control( $this->wp_customize, 'megastar_heading_font_family', array(
		// 		'label' => esc_html__( 'Font Family', 'total' ),
		// 		'section' => 'typography',
		// 		'settings' => 'megastar_heading_font_family',
		// 		'priority' => 1,
		// )));
                
                //typography section
                $this->wp_customize->add_section('typography', array(
			'title' => esc_html_x('Typography', 'backend', 'megastar'),
			'priority' => 30
		));
                 //Add setting Heading font family settings
                $this->wp_customize->add_setting( new megastar_Customizer_Dynamic_CSS( $this->wp_customize, 'base_heading_font_family', array(
			'type'              => 'theme_mod',
			'default'           => 'Open Sans',
			'transport'         => 'postMessage',
			'sanitize_callback' => false,
                        'css_map' => array(
				'font-family' => array(
                                    'h1, h2, h3, h4, h5, h6',
					'.largeHeading,.largeHeading h1,.largeHeading h2,.largeHeading h3, .largeHeadingWhite,.largeHeadingWhite h1,'
                                    . '.largeHeadingWhite h2,.largeHeadingWhite h3, .mediumHeading,.mediumHeading h1,.mediumHeading h2,.mediumHeading h3, '
                                    . '.mediumHeadingThin,.mediumHeadingThin h1,.mediumHeadingThin h2,.mediumHeadingThin h3, '
                                    . '.smallHeading,.smallHeading h1,.smallHeading h2,.smallHeading h3, '
                                    . '.mediumHeadingWhite,.mediumHeadingWhite h1,.mediumHeadingWhite h2,.mediumHeadingWhite h3, '
                                    . '.mediumHeadingBlack,.mediumHeadingBlack h1,.mediumHeadingBlack h2,.mediumHeadingBlack h3, '
                                    . '.sup-style1 .mega-hovertitle, .pace.pace-active .pace-progress:before '
				)
			)
		)));
 
		// Add Heading Font Control
		$this->wp_customize->add_control( new megastar_Google_Fonts_Control( $this->wp_customize, 'base_heading_font_family', array(
				'label' => esc_html__( 'Font Family', 'total' ),
				'section' => 'typography',
				'settings' => 'base_heading_font_family',
 				'priority' => 1,
		)));


	}


	public function megastar_toolbar_left_elements() {

		$toolbar_elements = array();
		$description      = get_bloginfo( 'description', 'display' );

		if (function_exists('icl_object_id')) {
			$toolbar_elements['wpml'] = esc_html_x( 'Language Switcher', 'backend', 'megastar' );
		}

		if ($description) {
			$toolbar_elements['tagline'] = esc_html_x('Tagline', 'backend', 'megastar');
		}

		if (has_nav_menu('toolbar')) {
			$toolbar_elements['menu'] = esc_html_x('Toolbar Menu', 'backend', 'megastar');
		}

		$toolbar_elements['social'] = esc_html_x('Social Share', 'backend', 'megastar');

		$toolbar_elements['custom-left'] = esc_html_x('Custom Text', 'backend', 'megastar');

		return $toolbar_elements;
	}

	public function megastar_toolbar_right_elements() {

		$toolbar_elements = array();
		$description      = get_bloginfo( 'description', 'display' );

		if (function_exists('icl_object_id')) {
			$toolbar_elements['wpml'] = esc_html_x( 'Language Switcher', 'backend', 'megastar' );
		}

		if ($description) {
			$toolbar_elements['tagline'] = esc_html_x('Tagline', 'backend', 'megastar');
		}

		if (has_nav_menu('toolbar')) {
			$toolbar_elements['menu'] = esc_html_x('Toolbar Menu', 'backend', 'megastar');
		}

		$toolbar_elements['social'] = esc_html_x('Social Share', 'backend', 'megastar');

		$toolbar_elements['custom-right'] = esc_html_x('Custom Text', 'backend', 'megastar');

		return $toolbar_elements;
	}


	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @since Megastar 1.0
	 * @see megastar_customize_register_colors()
	 *
	 * @return void
	 */
	public function megastar_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @since Megastar 1.0
	 * @see megastar_customize_register_colors()
	 *
	 * @return void
	 */
	public function megastar_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Cache the rendered CSS after the settings are saved in the DB.
	 * This is purely a performance improvement.
	 *
	 * Used by hook: add_action( 'customize_save_after' , array( $this, 'cache_rendered_css' ) );
	 *
	 * @return void
	 */
	public function cache_rendered_css() {
	    global $wp_filesystem;

		$file = 'uikit/variables.less';
	    $path = get_template_directory() . '/less/';

		$url = wp_nonce_url('customize.php?theme=megastar', 'megastar_compile_less_to_css');
		if (false === ($creds = request_filesystem_credentials($url, '', false, $path, null) )) {
		return; // stop processing here
		}
		if (!WP_Filesystem($creds)) {
		request_filesystem_credentials($url, '', true, false, null);
		return;
		}
		$file = $path . $file;
		$path = dirname($file) . '/';

		// get content from file, if not already set
		if (file_exists($file)) {
		$content = $wp_filesystem->get_contents($file);
		}
 		
		foreach ( $this->get_dynamic_css_settings() as $key => $setting ) {
		    $css_key  = key($setting->css_map);
 		    $value = $setting->render_css_save();
		    if($css_key == 'background-image|url'){
			$value = '"'.$value.'"';
		    } 
		    $key = str_replace("_", "-", $key);
		    preg_match('/@'.$key.'\s*:/', $content, $matches) ;	
                    if($css_key == 'font-family'){
                        
                        $google_fonts = megastar_google_fonts_array();
                        if(in_array($value, $google_fonts)){
                            $font_val = str_replace(' ', '+', $value);
                            preg_match('/\/\*'.$key.' google font\*\*\/(.*)#'.$key.'/', $content, $matches) ;		     
                            if($matches && $matches[0]){
                                $content = preg_replace('/(\/\*'.$key.' google font\*\*\/\s*@import\s*"\/\/fonts.googleapis.com\/css\?family=)(.*)(:300,300i,400,400i,600,600i,700,700i#'.$key.'";)/', '$1'.$font_val.'$3', $content);
                            }else{
                                $content .=  "\r\n/*".$key." google font**/ ".'@import "//fonts.googleapis.com/css?family='.$font_val.":300,300i,400,400i,600,600i,700,700i#$key\";";
                            }
                        }
                        $vals = explode(',', $value);
                        foreach ($vals as &$val){
                            $val = '"'.trim($val).'"';
                        }
                        $value = implode(',', $vals);
                    }
		    if($matches && $matches[0]){
			$content = preg_replace('/(@'.$key.'\s*:\s*)(.*)(;)/', '$1'.$value.'$3', $content);
		    }else{
			$content .=  "\r\n".'@'.$key.':'.$value.";";
		    }
                    
                    
 		}
		
		$result = $wp_filesystem->put_contents(
		    $file, ($content), FS_CHMOD_FILE // predefined mode settings for WP files
		); 
		
		$return = new stdClass();
		if($result){
		   $return->success = true;
		}else{
		    $return->success = false;
		}
	}

	/**
	 * Get the dimensions of the logo image when the setting is saved
	 * This is purely a performance improvement.
	 *
	 * Used by hook: add_action( 'customize_save_logo_img' , array( $this, 'megastar_save_logo_dimensions' ), 10, 1 );
	 *
	 * @return void
	 */
	public static function megastar_save_logo_dimensions( $setting ) {
		$logo_width_height = '';
		$img_data          = getimagesize( esc_url( $setting->post_value() ) );

		if ( is_array( $img_data ) ) {
			$logo_width_height = $img_data[3];
		}

		set_theme_mod( 'logo_width_height', $logo_width_height );
	}

	/**
	 * Render the CSS from all the settings which are of type `megastar_Customizer_Dynamic_CSS`
	 *
	 * @return string text/css
	 */
	public function render_css() {
		$out = '';

		foreach ( $this->get_dynamic_css_settings() as $setting ) {
			$out .= $setting->render_css();
		}

		return $out;
	}

	/**
	 * Get only the CSS settings of type `megastar_Customizer_Dynamic_CSS`.
	 *
	 * @see is_dynamic_css_setting
	 * @return array
	 */
	public function get_dynamic_css_settings() {
		return array_filter( $this->wp_customize->settings(), array( $this, 'is_dynamic_css_setting' ) );
	}

	/**
	 * Helper conditional function for filtering the settings.
	 *
	 * @see
	 * @param  mixed  $setting
	 * @return boolean
	 */
	protected static function is_dynamic_css_setting( $setting ) {
		return is_a( $setting, 'megastar_Customizer_Dynamic_CSS' );
	}

	/**
	 * Dynamically generate the JS for previewing the settings of type `megastar_Customizer_Dynamic_CSS`.
	 *
	 * This function is better for the UX, since all the color changes are transported to the live
	 * preview frame using the 'postMessage' method. Since the JS is generated on-the-fly and we have a single
	 * entry point of entering settings along with related css properties and classes, we cannnot forget to
	 * include the setting in the customizer itself. Neat, man!
	 *
	 * @return string text/javascript
	 */
	public function customize_footer_js() {
		$settings = $this->get_dynamic_css_settings();

		ob_start();
		?>

			<script type="text/javascript">
				'use strict';
				//megastar customizer color live preview
				( function( $ ) {
				    var style = []
			
				<?php
					foreach ( $settings as $key_id => $setting ) :
				?>
					style['<?php echo esc_attr($key_id) ?>'] = '';
					wp.customize( '<?php echo esc_attr($key_id); ?>', function( value ) {
					   
						value.bind( function( newval ) {
						     style['<?php echo esc_attr($key_id) ?>'] = '';
						<?php
							foreach ( $setting->get_css_map() as $css_prop_raw => $css_selectors ) {
								
								extract( $setting->filter_css_property( $css_prop_raw ) );
	                                                            if($lighten){
	                                                                echo 'newval = LightenDarkenColor(newval,'.$lighten.' ); ';
	                                                            }
								// background image needs a little bit different treatment
								if ( 'background-image' === $css_prop ) {
									echo 'newval = "url(\'" + newval + "\')";' . PHP_EOL;
								}else if ( 'font-family' === $css_prop ) {
                                                                    echo 'WebFont.load({
                                                                        google: {
                                                                          families: [newval]
                                                                        }
                                                                    });newval = \'"\'+newval+\'"\';
                                                                        newval = newval.replace(",", \'","\'); ';
                                                                }
								printf( 'style["%1$s"]  += "%2$s{ %3$s: "+ newval + " }" %4$s ' .  '+"\r\n"; '."\r\n",$key_id, $setting->plain_selectors_for_all_groups( $css_prop_raw ), $css_prop, PHP_EOL);
							}
						?>
						   add_style(style); 	    
						} );
						
					} );
					<?php
					foreach ($setting->get_css_map() as $css_prop_raw => $css_selectors) {
	                                      
					    extract($setting->filter_css_property($css_prop_raw));
	                                         if($lighten){
	                                              $value = $value;
	                                         }else{
	                                              $value = $setting->render_css_save();
	                                         }
					   
					    if ( 'background-image' === $css_prop ) {
						$value = 'url(\''.$value.'\');';
					    }
					    printf('style["%1$s"]  += "%2$s{ %3$s: %5$s }" %4$s ' . '+"\r\n"; ' . "\r\n", $key_id, $setting->plain_selectors_for_all_groups($css_prop_raw),
						    $css_prop, PHP_EOL, $value);
					}
					?>
					add_style(style);
				<?php
					endforeach;
				?>
				    function add_style(style){
                                       
					    var str_style = '';
					    var key;
					    for(key in style){
						if(style[key]){
						    str_style += '/*' + key + "*/\r\n";
						    str_style += style[key] + "\r\n";
						}
					    }
					    $('#custome_live_preview').html(str_style)

				    }
	                                
                    function LightenDarkenColor(col, amt) {  
                        var usePound = false;
                        if (col[0] == "#") {
                            col = col.slice(1);
                            usePound = true;
                        }
                        var num = parseInt(col,16);
                        var r = (num >> 16) + amt;
                        if (r > 255) r = 255;
                        else if  (r < 0) r = 0;

                        var b = ((num >> 8) & 0x00FF) + amt;

                        if (b > 255) b = 255;
                        else if  (b < 0) b = 0;

                        var g = (num & 0x0000FF) + amt;

                        if (g > 255) g = 255;
                        else if (g < 0) g = 0;

                        return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);

                    }
				} )( jQuery );
			</script>

		<?php

		echo ob_get_clean();
	}
	
    public function hook_custom_css() { 
//        $google_fonts = megastar_google_fonts_array();
//        foreach ( $google_fonts as $font ) { 
//            megastar_enqueue_google_font($font);
//        }
        ?>
            <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
            <style id='custome_live_preview'></style>
    	<?php
    }

}

