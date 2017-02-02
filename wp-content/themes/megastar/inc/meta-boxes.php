<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 * You also should read the changelog to know what has been changed before updating.
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* Meta Box Definitions ***********************/

add_action( 'admin_init', 'rw_register_meta_boxes' );
function rw_register_meta_boxes() {
	
	// load is_plugin_active() function if no available
	if (!function_exists('is_plugin_active')) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
	}
	global $meta_boxes;

	$prefix = 'megastar_';
	$meta_boxes = array();
	
	/* ----------------------------------------------------- */
	// Portfolio Filter Array
	if(is_plugin_active('megastar-portfolio/megastar-portfolio.php')){ 

		$types = get_terms('portfolio_filter', 'hide_empty=0');
		$types_array[0] = 'All categories';
		if($types) {
			foreach($types as $type) {
				$types_array[$type->term_id] = $type->name;
			}
		}
	}

	/* ----------------------------------------------------- */
	// FAQ Filter Array
	if(is_plugin_active('megastar-faq/megastar-faq.php')){ 

		$types = get_terms('faq_filter', 'hide_empty=0');
		$types_array[0] = 'All categories';
		if($types) {
			foreach($types as $type) {
				$types_array[$type->term_id] = $type->name;
			}
		}

	}


	// SIDEBAR ARRAY
	function get_sidebars_array() {
	    global $wp_registered_sidebars;
	    $list_sidebars = array();
	    foreach ( $wp_registered_sidebars as $sidebar ) {
	        $list_sidebars[$sidebar['id']] = $sidebar['name'];
	    }
	    // remove them from the list for better understand purpose
	    unset($list_sidebars['footer-widgets']);
	    unset($list_sidebars['footer-widgets-2']);
	    unset($list_sidebars['footer-widgets-3']);
	    unset($list_sidebars['footer-widgets-4']);
	    unset($list_sidebars['offcanvas']);
	    unset($list_sidebars['fixed-left']);
	    unset($list_sidebars['fixed-right']);
	    unset($list_sidebars['headerbar']);
	    unset($list_sidebars['drawer']);
	    return $list_sidebars;
	}

	// Rev Slider list generate
	function rev_slider_list() {
		if(shortcode_exists("rev_slider")){
			$return = "";
			$slider = new RevSlider();
			$revolution_sliders = $slider->getArrSliders();

			foreach ( $revolution_sliders as $revolution_slider ) {
			       $alias = $revolution_slider->getAlias();
			       $title = $revolution_slider->getTitle();
			       $return[$alias] = $title;
			}
			return $return;
		}	
	}


	/* ----------------------------------------------------- */
	// Blog Categories Filter Array
	$blog_options = array(); // fixes a PHP warning when no blog posts at all.
	$blog_categories = get_categories();
	if($blog_categories) {
		foreach ($blog_categories as $category) {
			$blog_options[$category->slug] = $category->name;
		}
	}

	/* ----------------------------------------------------- */
	// Page Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => esc_html_x('Page Settings', 'backend', 'megastar'),
		'pages' => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',

		'tabs'      => array(
			'layout' => array(
                'label' => esc_html_x('Layout', 'backend', 'megastar'),
            ),
            'slider' => array(
                'label' => esc_html_x('Slider', 'backend', 'megastar'),
            ),
            'header' => array(
                'label' => esc_html_x('Page Titlebar', 'backend', 'megastar'),
            ),
            'footer' => array(
                'label' => esc_html_x('Footer', 'backend', 'megastar'),
            ),
            'blog'  => array(
                'label' => esc_html_x( 'Blog', 'backend', 'megastar'),
            ),
        ),

        // Tab style: 'default', 'box' or 'left'. Optional
        'tab_style' => 'default',
	
		// List of meta fields
		'fields' => array(
			array(
					'name'		=> esc_html_x('Layout', 'backend', 'megastar'),
					'id'		=> $prefix . "layout",
					'type'		=> 'select',
					'options'	=> array(
						'default'       => esc_html_x('Default', 'backend', 'megastar'),
						'full'          => esc_html_x('Fullwidth', 'backend', 'megastar'),
						'sidebar-right' => esc_html_x('Sidebar Right', 'backend', 'megastar'),
						'sidebar-left'  => esc_html_x('Sidebar Left', 'backend', 'megastar'),
					),
					'multiple' => false,
					'std'      => array( 'default' ),
					'desc'     => wp_kses(_x('<strong>Default:</strong> For usage normal Text Pages<br /> <strong>Full Width:</strong> For pages using Visual Composer Elements (commonly used)<br /> <strong>Sidebar Left:</strong> Sidebar Left Template<br /> <strong>Sidebar Right:</strong> Sidebar Right Template', 'backend', 'megastar'), array('strong'=>array(), 'br'=>array())),
					'tab'      => 'layout',
			),

			array(
				'name'     => esc_html_x('Sidebar', 'backend', 'megastar'),
				'id'       => $prefix . "sidebar",
				'type'     => 'select',
				'options'  => get_sidebars_array(),
				'multiple' => false,
				'std'      => array( 'show' ),
				'desc'     => esc_html_x('Select the sidebar you wish to display on this page.', 'backend', 'megastar'),
				'tab'      => 'layout',
				'visible'  => array($prefix . 'layout', 'starts with', 'sidebar'),
			),
			
			array(
					'name'		=> esc_html_x('Header Style', 'backend', 'megastar'),
					'id'		=> $prefix . "header_style",
					'type'		=> 'select',
					'options'	=> array(
						null      => esc_html_x('Default (as customizer)', 'backend', 'megastar'),
						'default' => esc_html_x('Style 1', 'backend', 'megastar'),
						'style2'  => esc_html_x('Style 2', 'backend', 'megastar'),
						'style3'  => esc_html_x('Style 3', 'backend', 'megastar'),
					),
					'multiple' => false,
					'std'      => array( null ),
					'desc'     => esc_html_x('Override the header style for this page.', 'backend', 'megastar'),
					'tab'      => 'layout',
			),

			array(
					'name'		=> esc_html_x('Header Type', 'backend', 'megastar'),
					'id'		=> $prefix . "header_type",
					'type'		=> 'select',
					'options'	=> array(
						null           => esc_html_x('Default (as customizer)', 'backend', 'megastar'),
						'default'      => esc_html_x('No Sticky', 'backend', 'megastar'),
						'sticky'       => esc_html_x('Sticky', 'backend', 'megastar'),
						'smart-sticky' => esc_html_x('Smart Sticky', 'backend', 'megastar'),
						'fixed'        => esc_html_x('Fixed', 'backend', 'megastar'),
					),
					'multiple' => false,
					'std'      => array( null ),
					'desc'     => esc_html_x('Override the header type for this page.', 'backend', 'megastar'),
					'tab'      => 'layout',
			),

			array(
					'name'		=> esc_html_x('Menu Style', 'backend', 'megastar'),
					'id'		=> $prefix . "navbar_style",
					'type'		=> 'select',
					'options'	=> array(
						null      => esc_html_x('Default (as customizer)', 'backend', 'megastar'),
						'default' => esc_html_x('Style 1', 'backend', 'megastar'),
						'style2'  => esc_html_x('Style 2', 'backend', 'megastar'),
						'style3'  => esc_html_x('Style 3', 'backend', 'megastar'),
						'style4'  => esc_html_x('Style 4', 'backend', 'megastar'),
					),
					'multiple' => false,
					'std'      => array( null ),
					'desc'     => esc_html_x('Override the header type for this page.', 'backend', 'megastar'),
					'tab'      => 'layout',
			),

			array(
				'name'		=> esc_html_x('Show Search', 'backend', 'megastar'),
				'id'		=> $prefix . 'header_search',
				'type'		=> 'select',
				'options'	=> array(
					null  => esc_html_x('Default (as customizer)', 'backend', 'megastar'),
					true  => esc_html_x('Yes', 'backend', 'megastar'),
					false => esc_html_x('No', 'backend', 'megastar')
				),
				'multiple' => false,
				'std'      => array( null ),
				'desc'     => esc_html_x('Show / Hide search in header', 'backend', 'megastar'),
				'tab'      => 'layout',
			),

			array(
					'name'		=> esc_html_x('Show Toolbar', 'backend', 'megastar'),
					'id'		=> $prefix . "toolbar",
					'type'		=> 'select',
					'options'	=> array(
						null  => esc_html_x('Default (as customizer)', 'backend', 'megastar'),
						true  => esc_html_x('Yes', 'backend', 'megastar'),
						false => esc_html_x('No', 'backend', 'megastar')
					),
					'multiple' => false,
					'std'      => array( null ),
					'desc'     => esc_html_x('Override the toolbar visiblity for this page.', 'backend', 'megastar'),
					'tab'      => 'layout',
			),


			array(
				'name'		=> esc_html_x('Show Slider', 'backend', 'megastar'),
				'id'		=> $prefix . 'show_rev_slider',
				'type'		=> 'radio',
				'options'	=> array(
					'yes'		=> esc_html_x('Yes', 'backend', 'megastar'),
					'no'		=> esc_html_x('No', 'backend', 'megastar')
				),
				'multiple' => false,
				'std'      => array( 'no' ),
				'desc'     => esc_html_x('Select yes if you want to show slider in this page.', 'backend', 'megastar'),
				'tab'      => 'slider',
			),
			array(
				'name'     => esc_html_x('Select Slider', 'backend', 'megastar'),
				'id'       => $prefix . "rev_slider",
				'type'     => 'select',
				'options'  => rev_slider_list(),
				'multiple' => false,
				'desc'     => esc_html_x('Select which revolution slider you want to show this page.', 'backend', 'megastar'),
				'tab'      => 'slider',
				'hidden' => array($prefix . 'show_rev_slider', '=', 'no'),
			),

			array(
					'name'		=> esc_html_x('Titlebar', 'backend', 'megastar'),
					'id'		=> $prefix . "header",
					'type'		=> 'select',
					'options'	=> array(
						'show' => esc_html_x('Enable', 'backend', 'megastar'),
						'hide' => esc_html_x('Disable', 'backend', 'megastar')
					),
					'multiple' => false,
					'std'      => array( true ),
					'desc'     => esc_html_x('Enable or disable the Titlebar on this Page.', 'backend', 'megastar'),
					'tab'      => 'header',
			),
			array(
					'name'		=> esc_html_x('Titlebar Layout', 'backend', 'megastar'),
					'id'		=> $prefix . "titlebar",
					'type'		=> 'select',
					'options'	=> array(
						'default'				=> esc_html_x('Default (set in Theme Customizer)', 'backend', 'megastar'),
						'title'					=> esc_html_x('Titlebar (Left Align)', 'backend', 'megastar'),
						'featuredimagecenter'	=> esc_html_x('Titlebar (Center Align)', 'backend', 'megastar'),
						//'notitle'				=> 'No Titlebar'
					),
					'multiple' => false,
					'std'      => array( 'default' ),
					'desc'     => esc_html_x('Choose your Titlebar Layout for this Page', 'backend', 'megastar'),
					'tab'      => 'header',
					'hidden' => array($prefix . 'header', '=', 'hide'),
			),
			array(
					'name'		=> esc_html_x('Titlebar Style', 'backend', 'megastar'),
					'id'		=> $prefix . "titlebar_style",
					'type'		=> 'select',
					'options'	=> array(
						'titlebar-light' => esc_html_x('Light (for light backgrounds)', 'backend', 'megastar'),
						'titlebar-dark'  => esc_html_x('Dark (for dark backgrounds)', 'backend', 'megastar'),
					),
					'multiple' => false,
					'std'      => array( 'light' ),
					'desc'     => esc_html_x('Select your titlebar style from here.', 'backend', 'megastar'),
					'tab'      => 'header',
					'hidden' => array($prefix . 'titlebar', '=', 'default'),
			),
			array(
					'name'		=> esc_html_x('Titlebar Background', 'backend', 'megastar'),
					'id'		=> $prefix . "titlebar_bg_image",
					'type'		=> 'image_advanced',
					'max_file_uploads' => 1,
					'desc' => esc_html_x('Upload Titlebar Image for the Titlebar Style.', 'backend', 'megastar'),
					'tab'  => 'header',
					'hidden' => array($prefix . 'titlebar', '=', 'default'),
			),
			array(
					'name'		=> esc_html_x('Optional Element', 'backend', 'megastar' ),
					'id'		=> $prefix . "right_side",
					'type'		=> 'select',
					'options'	=> array(
						'0'           => esc_html_x('Nothing', 'backend', 'megastar' ),
						'back_button' => esc_html_x('Back Button', 'backend', 'megastar' ),
						'breadcrumb'  => esc_html_x('Breadcrumb', 'backend', 'megastar' )
					),
					'multiple' => false,
					'std'      => array( 'back_button' ),
					'desc'     => esc_html_x('Select what you want to show on right side of page header.', 'backend', 'megastar' ),
					'tab'      => 'header',
					'hidden' => array($prefix . 'titlebar', '=', 'default'),
			),
			array(
					'name'		=> esc_html_x('Footer Widgets', 'backend', 'megastar' ),
					'id'		=> $prefix . "footer_widgets",
					'type'		=> 'select',
					'options'	=> array(
						'show'		=> esc_html_x('Enable', 'backend', 'megastar' ),
						'hide'		=> esc_html_x('Disable', 'backend', 'megastar' )
					),
					'multiple' => false,
					'std'      => array( 'show' ),
					'desc'     => esc_html_x('Enable or disable the Footer Widgets on this Page.', 'backend', 'megastar' ),
					'tab'      => 'footer',
			),
			array(
					'name'		=> esc_html_x('Footer Copyright', 'backend', 'megastar' ),
					'id'		=> $prefix . "footer_copyright",
					'type'		=> 'select',
					'options'	=> array(
						'show'		=> esc_html_x('Enable', 'backend', 'megastar' ),
						'hide'		=> esc_html_x('Disable', 'backend', 'megastar' )
					),
					'multiple' => false,
					'std'      => array( 'show' ),
					'desc'     => esc_html_x('Enable or disable the Footer Copyright Section on this Page.', 'backend', 'megastar' ),
					'tab'      => 'footer',
			),
			array(
				'name'     => esc_html_x('Blog Categories', 'backend', 'megastar' ),
				'id'       => $prefix . "blogcategories",
				'type'     => 'checkbox_list',
				'options'  => $blog_options,
				'multiple' => true,
				'before'     => wp_kses(_x('Blog category filter for only blog template. If nothing is selected, it will show Items from <strong>ALL</strong> categories.', 'backend', 'megastar' ), array('strong'=>array())),
				'tab'      => 'blog',
			),
		)
	);

	add_filter( 'rwmb_outside_conditions', function( $conditions ) {
	    $conditions['.rwmb-tab-blog'] = array(
	        'hidden' => array('page_template', '!=', 'page-blog.php')
	    );
	    return $conditions;
	});

	/* ----------------------------------------------------- */
	// Blog Metaboxes
	/* ----------------------------------------------------- */

	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => esc_html_x('Blog Post Settings', 'backend', 'megastar' ),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
			array(
				'name'		=> esc_html_x('Titlebar Layout', 'backend', 'megastar' ),
				'id'		=> $prefix . "titlebar",
				'type'		=> 'select',
				'options'	=> array(
					'default'				=> esc_html_x('Default (set in Theme Customizer)', 'backend', 'megastar' ),
					'title'					=> esc_html_x('Titlebar (Left Align)', 'backend', 'megastar' ),
					'featuredimagecenter'	=> esc_html_x('Titlebar (Center Align)', 'backend', 'megastar' ),
					//'notitle'				=> 'No Titlebar'
				),
				'multiple'	=> false,
				'std'		=> array( 'default' ),
				'desc' => esc_html_x('Choose your Titlebar Layout for this post', 'backend', 'megastar' ),
			),
			array(
				'name'		=> esc_html_x('Titlebar Style', 'backend', 'megastar' ),
				'id'		=> $prefix . "titlebar_style",
				'type'		=> 'select',
				'options'	=> array(
					'titlebar-light'	=> esc_html_x('Light (for light backgrounds)', 'backend', 'megastar' ),
					'titlebar-dark'	=> esc_html_x('Dark (for dark backgrounds)', 'backend', 'megastar' ),
				),
				'multiple'	=> false,
				'std'		=> array( 'light' ),
				'desc' => esc_html_x('Select your titlebar style from here.', 'backend', 'megastar' )
			),
			array(
					'name'		=> esc_html_x('Titlebar Image', 'backend', 'megastar' ),
					'id'		=> $prefix . "headerimage",
					'type'		=> 'image_advanced',
					'max_file_uploads' => 1,
					'desc' => esc_html_x('Upload Titlebar Image for the Titlebar Style.', 'backend', 'megastar' ),
			),
			array(
				'name'		=> esc_html_x('Hide Featured Image?', 'backend', 'megastar' ),
				'id'		=> $prefix . "hideimage",
				'type'		=> 'checkbox',
				'multiple'	=> false,
				'desc' => esc_html_x('Check this if you want to hide the Featured Image / Gallery on the Blog Detail Page', 'backend', 'megastar' ),
			),
		)
	);
	
	// Link Post Format
	$meta_boxes[] = array(
		'id' => 'blog-link',
		'title' => esc_html_x('Link Settings', 'backend', 'megastar' ),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
			array(
				'name'		=> esc_html_x('URL', 'backend', 'megastar' ),
				'id'		=> $prefix . 'blog_link',
				'desc'		=> esc_html_x('Enter a URL for your link post format. (Don\'t forget the http://)', 'backend', 'megastar' ),
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
			)
		)
	);

	// Quote Post Format
	$meta_boxes[] = array(
		'id' => 'blog-quote',
		'title' => esc_html_x('Quote Settings', 'backend', 'megastar' ),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
			array(
				'name'		=> esc_html_x('Quote', 'backend', 'megastar' ),
				'id'		=> $prefix . 'blog_quote',
				'desc'		=> esc_html_x('Please enter the text for your quote here.', 'backend', 'megastar' ),
				'clone'		=> false,
				'type'		=> 'textarea',
				'std'		=> ''
			),
			array(
				'name'		=> esc_html_x('Quote Source', 'backend', 'megastar' ),
				'id'		=> $prefix . 'blog_quotesrc',
				'desc'		=> esc_html_x('Please enter the Source of the Quote here.', 'backend', 'megastar' ),
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
			)
		)
	);

	// Video Post Format
	$meta_boxes[] = array(
		'id' => 'blog-video',
		'title' => esc_html_x('Video Settings', 'backend', 'megastar' ),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
			array(
				'name'		=> esc_html_x('Video Source', 'backend', 'megastar' ),
				'id'		=> $prefix . 'blog_videosrc',
				'type'		=> 'select',
				'options'	=> array(
					'videourl'		=> esc_html_x('Video URL', 'backend', 'megastar' ),
					'embedcode'		=> esc_html_x('Embed Code', 'backend', 'megastar' )
				),
				'multiple'	=> false,
				'std'		=> array( 'videourl' ),
			),
			array(
				'name'		=> esc_html_x('Video URL/Embed Code', 'backend', 'megastar' ),
				'id'		=> $prefix . 'blog_video',
				'desc'		=> wp_kses(_x('If you choose Video URL you can just insert the URL of the <a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">Supported Video Site</a>. Otherwise insert the full embed code.', 'backend', 'megastar' ), array('a'=>array())),
				'clone'		=> false,
				'type'		=> 'textarea',
				'std'		=> '',
			),
		)
	);

	// Audio Post Format
	$meta_boxes[] = array(
		'id' => 'blog-audio',
		'title' => esc_html_x('Audio Settings', 'backend', 'megastar' ),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
			array(
				'name'		=> esc_html_x('Audio Embed Code', 'backend', 'megastar' ),
				'id'		=> $prefix . 'blog_audio',
				'desc'		=> esc_html_x('Please enter the Audio Embed Code here.', 'backend', 'megastar' ),
				'clone'		=> false,
				'type'		=> 'textarea',
				'std'		=> ''
			),
		)
	);

	// Gallery Post Format
	$meta_boxes[] = array(
		'id' => 'blog-gallery',
		'title' => esc_html_x('Gallery Settings', 'backend', 'megastar' ),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
			array(
				'name'	=> esc_html_x('Gallery', 'backend', 'megastar' ),
				'desc'	=> esc_html_x('You can upload up to 30 gallery images for a slideshow', 'backend', 'megastar' ),
				'id'	=> $prefix . 'blog_gallery',
				'type'	=> 'image_advanced',
				'max_file_uploads' => 30,
			)
		)
	);

	/* ----------------------------------------------------- */
	// Project Info Metabox
	/* ----------------------------------------------------- */
	if( is_plugin_active('bdthemes-portfolio/bdthemes-portfolio.php') ) { 

		$meta_boxes[] = array(
			'id' => 'portfolio',
			'title' => esc_html_x( 'Project Information', 'backend', 'megastar' ),
			'pages' => array( 'portfolio' ),
			'context' => 'normal',

			'tabs'      => array(
				'portfolio'  => array(
	                'label' => esc_html_x( 'Portfolio Configuration', 'backend', 'megastar' ),
	            ),
	            'header'  => array(
	                'label' => esc_html_x( 'Titlebar', 'backend', 'megastar' ),
	            ),
	            'slides'  => array(
	                'label' => esc_html_x( 'Portfolio Slides', 'backend', 'megastar' ),
	            ),
	            'video'  => array(
	                'label' => esc_html_x( 'Portfolio Video', 'backend', 'megastar' ),
	            ),
	        ),

	        // Tab style: 'default', 'box' or 'left'. Optional
	        'tab_style' => 'default',
			
			'fields' => array(

				array(
					'name'		=> esc_html_x( 'Titlebar Layout', 'backend', 'megastar' ),
					'id'		=> $prefix . "titlebar",
					'type'		=> 'select',
					'options'	=> array(
						'default'				=> esc_html_x( 'Default (set in Theme Customizer)', 'backend', 'megastar' ),
						'title'					=> esc_html_x( 'Titlebar (Left Align)', 'backend', 'megastar' ),
						'featuredimagecenter'	=> esc_html_x( 'Titlebar (Center Align)', 'backend', 'megastar' ),
						'notitle'				=> esc_html_x( 'No Titlebar', 'backend', 'megastar' )
					),
					'multiple'	=> false,
					'std'		=> array( 'default' ),
					'desc' => esc_html_x( 'Choose your Titlebar Layout for this post', 'backend', 'megastar' ),
					'tab'  => 'header'
				),
				array(
					'name'		=> esc_html_x( 'Titlebar Style', 'backend', 'megastar' ),
					'id'		=> $prefix . "headercolor",
					'type'		=> 'select',
					'options'	=> array(
						'titlebar-light'	=> esc_html_x( 'Light (for light backgrounds)', 'backend', 'megastar' ),
						'titlebar-dark'	=> esc_html_x( 'Dark (for dark backgrounds)', 'backend', 'megastar' ),
					),
					'multiple'	=> false,
					'std'		=> array( 'light' ),
					'desc' => esc_html_x( 'Select your titlebar style from here.', 'backend', 'megastar' ),
					'tab'  => 'header'
				),
				array(
						'name'		=> esc_html_x( 'Titlebar Image', 'backend', 'megastar' ),
						'id'		=> $prefix . "headerimage",
						'type'		=> 'image_advanced',
						'max_file_uploads' => 1,
						'desc' => esc_html_x( 'Upload Titlebar Image for the Titlebar Style.', 'backend', 'megastar' ),
						'tab'  => 'header'
				),

				array(
					'name'		=> esc_html_x( 'Detail Layout', 'backend', 'megastar' ),
					'id'		=> $prefix . 'portfolio-detaillayout',
					'desc'		=> wp_kses(_x( 'Choose your Layout for the Portfolio Detail Page.<br />If you choose the "Custom Portfolio Page" Layout, the Project Slides & Video fields below will be ignored. You will start with a blank canvas & use shortcodes to style your Page like a normal Page.', 'backend', 'megastar' ), array('br'=>array())),
					'type'		=> 'select',
					'options'	=> array(
						'wide'			=> esc_html_x( 'Full Width (Slider)', 'backend', 'megastar' ),
						'wide-ns'		=> esc_html_x( 'Full Width (No Slider)', 'backend', 'megastar' ),
						'sidebyside'	=> esc_html_x( 'Side By Side (Slider)', 'backend', 'megastar' ),
						'sidebyside-ns'	=> esc_html_x( 'Side By Side (No Slider)', 'backend', 'megastar' ),
						'custom'		=> esc_html_x( 'Custom Portfolio Page (100% Section)', 'backend', 'megastar' ),
					),
					'multiple'	=> false,
					'std'		=> array( 'no' ),
					'tab'  => 'portfolio',
				),
				array(
					'name'		=> esc_html_x( 'Subtitle', 'backend', 'megastar'),
					'id'		=> $prefix . 'subtitle',
					'desc'		=> esc_html_x( 'The Subtitle is shown on the Portfolio Overview Pages, Shortcodes & Related Projects. You can leave this empty to hide it.', 'backend', 'megastar'),
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'tab'  => 'portfolio',
				),	
				array(
					'name'		=> esc_html_x( 'Client', 'backend', 'megastar'),
					'id'		=> $prefix . 'portfolio_client',
					'desc'		=> esc_html_x( 'The Client is shown on the Portfolio Detail Page. You can leave this empty to hide it.', 'backend', 'megastar'),
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'tab'  => 'portfolio',
				),
				array(
					'name'		=> esc_html_x( 'Project link', 'backend', 'megastar'),
					'id'		=> $prefix . 'portfolio_link',
					'desc'		=> esc_html_x( 'URL Link to your Project (Do not forget the http://). This will be shown on the Portfolio Detail Page. You can leave this empty to hide it.', 'backend', 'megastar'),
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'tab'  => 'portfolio',
				),
				array(
					'name'		=> esc_html_x( 'Show Project Details?', 'backend', 'megastar'),
					'id'		=> $prefix . "portfolio_details",
					'type'		=> 'checkbox',
					'std'		=> true,
					'tab'  => 'portfolio',
				),
				array(
					'name'		=> esc_html_x( 'Show Related Projects?', 'backend', 'megastar'),
					'id'		=> $prefix . "portfolio_relatedposts",
					'type'		=> 'checkbox',
					'desc'		=> '',
					'std'		=> false,
					'tab'  => 'portfolio',
				),
				array(
					'name'		=> esc_html_x( 'Masonry Size', 'backend', 'megastar'),
					'id'		=> $prefix . 'portfolio_size',
					'desc'		=> esc_html_x( 'Only relevant when the portfolio is displayed in masonry format.', 'backend', 'megastar'),
					'type'		=> 'select',
					'options'	=> array(
						'regular'	=> esc_html_x( 'Regular', 'backend', 'megastar'),
						'wide'		=> esc_html_x( 'Wide', 'backend', 'megastar'),
						'tall'		=> esc_html_x( 'Tall', 'backend', 'megastar'),
						'widetall'	=> esc_html_x( 'Wide & Tall', 'backend', 'megastar'),
					),
					'multiple'	=> false,
					'std'		=> array( 'regular' ),
					'tab'  => 'portfolio',
				),
				array(
					'name'		=> esc_html_x( 'Link to Lightbox', 'backend', 'megastar'),
					'id'		=> $prefix . "portfolio_lightbox",
					'type'		=> 'checkbox',
					'desc'		=> esc_html_x( 'Open the Preview Image in a Lightbox (on Portfolio Overview, Shortcodes & Related Posts)', 'backend', 'megastar'),
					'std'		=> false,
					'tab'  => 'portfolio',
				),
				array(
					'name'	=> esc_html_x( 'Project Slider Images', 'backend', 'megastar'),
					'desc'	=> wp_kses(_x( 'You can upload up to 50 project images for a slideshow, or only one image to display a single image. <br /><strong>Notice:</strong> The Preview Image (on Overview, Shortcodes & Related Projects) will be the Image set as Featured Image.', 'backend', 'megastar'), array('strong'=>array(), 'br'=>array())),
					'id'	=> $prefix . 'screenshot',
					'type'	=> 'image_advanced',
					'max_file_uploads' => 50,
					'tab'  => 'slides',
				),
				array(
					'name'		=> esc_html_x( 'Video Source', 'backend', 'megastar'),
					'id'		=> $prefix . 'source',
					'type'		=> 'select',
					'options'	=> array(
						'videourl'		=> esc_html_x( 'Video URL', 'backend', 'megastar'),
						'embedcode'		=> esc_html_x( 'Embed Code', 'backend', 'megastar')
					),
					'multiple'	=> false,
					'std'		=> array( 'no' ),
					'tab'  => 'video',
				),
				array(
					'name'	=> esc_html_x( 'Video URL or own Embed Code', 'backend', 'megastar'),
					'id'	=> $prefix . 'embed',
					'desc'	=> wp_kses(_x( 'If you choose Video URL you can just insert the URL of the <a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">Supported Video Site</a>. You can also insert your own Embed Code. If you fill out this field, it will be shown <strong>instead</strong> of the Slider.<br /><br /><strong>Notice:</strong> The Preview Image will be the Image set as Featured Image.', 'backend', 'megastar'), array('strong'=>array(), 'br'=>array(), 'a'=>array())),
					'type' 	=> 'textarea',
					'std' 	=> "",
					'cols' 	=> "40",
					'rows' 	=> "8",
					'tab'  => 'video',
				)
			)
		);

	}

	/* ----------------------------------------------------- */
	// FAQ Metabox
	/* ----------------------------------------------------- */
	if(is_plugin_active('bdthemes-faq/bdthemes-faq.php')){ 

		$meta_boxes[] = array(
			'id' => 'faq_info',
			'title' => esc_html_x( 'FAQ Additional', 'backend', 'megastar'),
			'pages' => array( 'faq' ),
			'context' => 'normal',

			
			'fields' => array(
				array(
					'name'		=> esc_html_x('Show FAQ Icon', 'backend', 'megastar'),
					'id'		=> 'bdthemes_show_faq_icon',
					'type'		=> 'radio',
					'options'	=> array(
						'yes'		=> esc_html_x('Yes', 'backend', 'megastar'),
						'no'		=> esc_html_x('No', 'backend', 'megastar')
					),
					'multiple' => false,
					'std'      => array( 'no' ),
				),
				array(
					'name'		=> esc_html_x( 'FAQ Icon', 'backend', 'megastar'),
					'id'		=> 'bdthemes_faq_icon',
					'desc'		=> esc_html_x( 'Please type a fontawesome icon name for your FAQ. for example: fa fa-home', 'backend', 'megastar'),
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> '',
					'hidden' => array('bdthemes_show_faq_icon', '=', 'no'),
				),			
			)
		);

	}
	
	foreach ( $meta_boxes as $meta_box ) {
		new RW_Meta_Box( $meta_box );
	}
}


/* ----------------------------------------------------- */
// Background Styling
/* ----------------------------------------------------- */
add_action( 'admin_init', 'rw_register_meta_boxes_background' );
function rw_register_meta_boxes_background() {
	
	global $meta_boxes;

	if(get_theme_mod('megastar_global_layout', 'full') == 'boxed') {

		$prefix = 'megastar_';
		$meta_boxes = array();

		$meta_boxes[] = array(
			'id' => 'styling',
			'title' => esc_html_x( 'Background Styling Options', 'backend', 'megastar'),
			'pages' => array( 'post', 'page', 'portfolio' ),
			'context' => 'side',
			'priority' => 'low',
		
			// List of meta fields
			'fields' => array(
				array(
					'name'             => esc_html_x( 'Background Image URL', 'backend', 'megastar'),
					'id'               => $prefix . 'bgurl',
					'desc'             => '',
					'clone'            => false,
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'std'              => ''
				),
				array(
					'name'		=> esc_html_x( 'Style', 'backend', 'megastar'),
					'id'		=> $prefix . "bgstyle",
					'type'		=> 'select',
					'options'	=> array(
						'stretch'		=> esc_html_x( 'Stretch Image', 'backend', 'megastar'),
						'repeat'		=> esc_html_x( 'Repeat', 'backend', 'megastar'),
						'no-repeat'		=> esc_html_x( 'No-Repeat', 'backend', 'megastar'),
						'repeat-x'		=> esc_html_x( 'Repeat-X', 'backend', 'megastar'),
						'repeat-y'		=> esc_html_x( 'Repeat-Y', 'backend', 'megastar')
					),
					'multiple'	=> false,
					'std'		=> array( 'stretch' )
				),
				array(
					'name'		=> esc_html_x( 'Background Color', 'backend', 'megastar'),
					'id'		=> $prefix . "bgcolor",
					'type'		=> 'color'
				)
			)
		);
		
		foreach ( $meta_boxes as $meta_box ) {
			new RW_Meta_Box( $meta_box );
		}
	}
}

/********************* META BOX DISPLAY ***********************/

add_action( 'admin_print_scripts', 'displayMetaboxes', 1000 );

if ( ! function_exists( 'displayMetaboxes' ) ) {
	
	function displayMetaboxes() {

	    if ( get_post_type() == "post" || get_post_type() == "page" ) { ?>
	        
	        <script type="text/javascript">// <![CDATA[
			
			jQuery(document).ready(function($){
				"use strict";
				function displayMetaBox() {
	                $('#blog-link, #blog-quote, #blog-video, #blog-audio, #blog-gallery').hide();
	                var selectedformat = $("input[name='post_format']:checked").val();
	                
	                if( selectedformat ) {
	                	if( selectedformat == 'link' ) {
							$("#blog-link").fadeIn();
						}
						if( selectedformat == 'quote' ) {
							$("#blog-quote").fadeIn();
						}
						if( selectedformat == 'video' ) {
							$("#blog-video").fadeIn();
						}
						if( selectedformat == 'audio' ) {
							$("#blog-audio").fadeIn();
						}
						if( selectedformat == 'gallery' ) {
							$("#blog-gallery").fadeIn();
						}
					}
	            }

	            $(function() {
	                displayMetaBox();
	                $("input[name='post_format']").change(function() {
	                    displayMetaBox();
	                });
	            });
			 });

			// ]]></script>
	    <?php 
		}
	
	}
}