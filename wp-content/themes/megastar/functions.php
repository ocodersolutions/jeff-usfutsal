<?php

/**
 * megastar functions and definitions.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package megastar
 */
define('MEGASTAR_VER', wp_get_theme()->get('Version'));

// Megastar only works in WordPress 4.4 or later.
if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

require_once(get_template_directory() . '/admin/dom-helper.php');
require_once(get_template_directory() . '/admin/compile.php');
/* Demo Installer */
require_once(get_template_directory() . '/demo-import/import.php');

// Theme customizer integration
require_once(get_template_directory() . '/customizer/theme-customizer.php');

require_once(get_template_directory() . '/inc/nav_walker.php');
require_once(get_template_directory() . '/inc/menu_options.php');


//TGM Plugin Activation
if (!class_exists('TGM_Plugin_Activation')) {
    require_once(get_template_directory() . '/inc/plugin-activation.php');
}
// Custom Widgets
require_once(get_template_directory() . '/inc/sidebars.php');
require_once(get_template_directory() . '/inc/sidebar-generator.php');
require_once(get_template_directory() . '/inc/breadcrumbs.php');


/* Meta Box Script */
define('MEGASTAR_MB_URL', trailingslashit(get_template_directory_uri() . '/inc/meta-box'));
define('MEGASTAR_MB_DIR', trailingslashit(get_template_directory() . '/inc/meta-box'));
require_once MEGASTAR_MB_DIR . 'meta-box.php';
require_once MEGASTAR_MB_DIR . 'meta-box-tabs/meta-box-tabs.php'; // Include Tabs Extension
require_once MEGASTAR_MB_DIR . 'meta-box-conditional-logic/meta-box-conditional-logic.php'; // Include Conditional Logic Extension
require_once get_template_directory() . '/inc/meta-boxes.php';




// Visual composer integration
if (class_exists('WPBakeryVisualComposerAbstract')) {
    require_once(get_template_directory() . '/inc/visualComposer.php');
}

// Visual composer integration
if (class_exists('Woocommerce')) {
    require_once(get_template_directory() . '/inc/woocommerce.php');
}

// enqueue style and script
require_once(get_template_directory() . '/inc/enqueue.php');



if (!function_exists('megastar_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function megastar_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on megastar, use a find and replace
         * to change 'megastar' to the name of your theme in all the template files.
         */
        load_theme_textdomain('megastar', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        // Post Formats
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'audio', 'video'));

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        if (function_exists('add_image_size')) {
            add_image_size('megastar-blog', 810, 350, true); // Standard Blog Image
        }

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'toolbar' => esc_html_x('Toolbar Menu', 'backend', 'megastar'),
            'primary' => esc_html_x('Primary Menu', 'backend', 'megastar'),
            'footer' => esc_html_x('Footer Menu', 'backend', 'megastar'),
            'offcanvas' => esc_html_x('Offcanvas Menu', 'backend', 'megastar'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('megastar_custom_background_args', array(
            'default-color' => 'f5f5f5',
            'default-image' => '',
        )));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style('admin/css/editor-style.css');
    }

endif;
add_action('after_setup_theme', 'megastar_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function megastar_content_width() {
    $GLOBALS['content_width'] = apply_filters('megastar_content_width', 640);
}

add_action('after_setup_theme', 'megastar_content_width', 0);

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*
 * Custom Excerpts
 */

// Set new Default Excerpt Length
function megastar_new_excerpt_length($length) {
    return 200;
}

add_filter('excerpt_length', 'megastar_new_excerpt_length');

// Custom Excerpt Length
function megastar_custom_excerpt($limit = 50) {
    $show_readmore = get_theme_mod('megastar_blog_readmore', 1);
    if ($show_readmore != 0) {
        return strip_shortcodes(wp_trim_words(get_the_content(), $limit, '... <a class="uk-button-link" href="' . get_permalink() . '">' . esc_html__('Read more', 'megastar') . '  &rarr;</a>'));
    } else {
        return strip_shortcodes(wp_trim_words(get_the_content(), $limit));
    }
}

// Word Limiter
function megastar_limit_words($string, $word_limit) {
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $word_limit));
}

// Remove Shortcodes from Search Results Excerpt
function megastar_remove_shortcode_from_excerpt($excerpt) {
    if (is_search()) {
        $excerpt = strip_shortcodes($excerpt);
    }
    return $excerpt;
}

add_filter('the_excerpt', 'megastar_remove_shortcode_from_excerpt');


/*
 * Helper - expand allowed tags()
 * Source: https://gist.github.com/adamsilverstein/10783774
 */

function megastar_allowed_tags() {
    $allowed_tag = wp_kses_allowed_html('post');
    // iframe
    $allowed_tag['iframe'] = array(
        'src' => array(),
        'height' => array(),
        'width' => array(),
        'frameborder' => array(),
        'allowfullscreen' => array(),
    );
    return $allowed_tag;
}

function megastar_rs_hide_updates($value) {
    if (isset($value->response['revslider/revslider.php'])) {
        unset($value->response['revslider/revslider.php']);
        return $value;
    }
    return null;
}

add_filter('site_transient_update_plugins', 'megastar_rs_hide_updates');

/**
 * Remove Default Rev Slider Metabox because we intigrate with own metabox system for better user experience
 */
if (is_admin()) {

    function megastar_remove_revolution_slider_meta_boxes() {
        remove_meta_box('mymetabox_revslider_0', 'page', 'normal');
        remove_meta_box('mymetabox_revslider_0', 'post', 'normal');
        remove_meta_box('mymetabox_revslider_0', 'give_forms', 'normal');
        remove_meta_box('mymetabox_revslider_0', 'tribe_events', 'normal');
        remove_meta_box('mymetabox_revslider_0', 'product', 'normal');
    }

    add_action('do_meta_boxes', 'megastar_remove_revolution_slider_meta_boxes');
}

// Remove meta tag from header
function megastar_remove_revslider_meta_tag() {
    return '';
}

add_filter('revslider_meta_generator', 'megastar_remove_revslider_meta_tag');


// set custom menu walker
add_filter('wp_nav_menu_args', function($args) {
    if (empty($args['walker'])) {
        $args['walker'] = new megastar_menu_walker;
    }
    return $args;
});

// add css and script
function my_function_name() {
    // Enqueue the css
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('jquery-ui', get_stylesheet_directory_uri() . '/css/jquery-ui.min.css');
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/css/animate.css');
    wp_enqueue_style('css-plugin-collections', get_stylesheet_directory_uri() . '/css/css-plugin-collections.css');
    wp_enqueue_style('menuzord-boxed', get_stylesheet_directory_uri() . '/css/menuzord-skins/menuzord-boxed.css');
    wp_enqueue_style('style-main', get_stylesheet_directory_uri() . '/css/style-main.css');
    
    $theme_style = get_theme_mod('main_themes_color', get_theme_support( 'main_themes_color', 'lemon' ) );
    wp_enqueue_style('theme-skin-lemon', get_stylesheet_directory_uri() . '/css/colors/theme-skin-'.$theme_style.'.css');

//    wp_enqueue_style('theme-skin-lemon', get_stylesheet_directory_uri() . '/css/colors/theme-skin-lemon.css');
    wp_enqueue_style('preloader', get_stylesheet_directory_uri() . '/css/preloader.css');
    wp_enqueue_style('custom-bootstrap-margin-padding', get_stylesheet_directory_uri() . '/css/custom-bootstrap-margin-padding.css');
    wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('settings', get_stylesheet_directory_uri() . '/css/revolution-slider/settings.css');
    wp_enqueue_style('layers', get_stylesheet_directory_uri() . '/css/revolution-slider/layers.css');
    wp_enqueue_style('navigation', get_stylesheet_directory_uri() . '/css/revolution-slider/navigation.css');
    // Enqueue the script

    wp_enqueue_script('jquery-2.2.4', get_stylesheet_directory_uri() . '/js/jquery-2.2.4.min.js');
    wp_enqueue_script('jquery-ui', get_stylesheet_directory_uri() . '/js/jquery-ui.min.js');
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('jquery-plugin-collection', get_stylesheet_directory_uri() . '/js/jquery-plugin-collection.js');
    wp_enqueue_script('jquery-themepunch-tools', get_stylesheet_directory_uri() . '/js/jquery.themepunch.tools.min.js');
    wp_enqueue_script('jquery-themepunch-revolution', get_stylesheet_directory_uri() . '/js/jquery.themepunch.revolution.min.js');
}

add_action('wp_enqueue_scripts', 'my_function_name');

// add  script in footer
function your_function() {
    wp_enqueue_script('calendar-events-data', get_stylesheet_directory_uri() . '/js/calendar-events-data.js');
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js');
    wp_enqueue_script('actions', get_stylesheet_directory_uri() . '/js/revolution-slider/extensions/revolution.extension.actions.min.js');
    wp_enqueue_script('carousel', get_stylesheet_directory_uri() . '/js/revolution-slider/extensions/revolution.extension.carousel.min.js');
    wp_enqueue_script('kenburn', get_stylesheet_directory_uri() . '/js/revolution-slider/extensions/revolution.extension.kenburn.min.js');
    wp_enqueue_script('layeranimation', get_stylesheet_directory_uri() . '/js/revolution-slider/extensions/revolution.extension.layeranimation.min.js');
    wp_enqueue_script('migration', get_stylesheet_directory_uri() . '/js/revolution-slider/extensions/revolution.extension.migration.min.js');
    wp_enqueue_script('navigation', get_stylesheet_directory_uri() . '/js/revolution-slider/extensions/revolution.extension.navigation.min.js');
    wp_enqueue_script('parallax', get_stylesheet_directory_uri() . '/js/revolution-slider/extensions/revolution.extension.parallax.min.js');
    wp_enqueue_script('slideanims', get_stylesheet_directory_uri() . '/js/revolution-slider/extensions/revolution.extension.slideanims.min.js');
    wp_enqueue_script('video', get_stylesheet_directory_uri() . '/js/revolution-slider/extensions/revolution.extension.video.min.js');
}

add_action('wp_footer', 'your_function');
// enqueue script control select color
function select_color_enqueue_js() {
    wp_enqueue_script('jquery-2.2.4', get_stylesheet_directory_uri() . '/admin/js/select-min-color.js');
}
add_action('customize_preview_init', 'select_color_enqueue_js');

/**
 * Adds Tittle_Session_Widget widget.
 */
class Tittle_Session_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'Tittle_Session_Widget', // Base ID
            esc_html__( 'Widget Title', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'A Tittle Session Widget', 'text_domain' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        //store the options in variables
        $title_ft = $instance['title_ft'];
        $title_bf = $instance['title_bf'];
        $title_tag_e =  ! empty( $instance['title_tag_e'] ) ? $instance['title_tag_e'] : 'h2';
        $title_class = ! empty( $instance['title_class'] ) ? $instance['title_class'] : 'title text-uppercase';
        $title_sd = $instance['title_sd'];
        $title_ct = $instance['title_ct'];
        // before widget (defined by theme)
        echo $args['before_widget'];

        if(!empty( $title_ft) || !empty( $title_bf)){
            echo '<'.$instance['title_tag_e'].' class="'.$title_class.'">'.$title_ft.' <span class="text-black font-weight-300">'.$title_bf.'</span></'.$instance['title_tag_e'].'>';
        }
        if(!empty($title_sd)){
            echo '<h6 class="letter-space-8 font-weight-400 text-uppercase">'.$title_sd.'</h6>';
        }
         if(!empty($title_ct)){
            echo '<p class="text-uppercase letter-space-1">'.$title_ct.'</p>';
        }
        

        // after widget (defined by theme)
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
       
        $title_ft = ! empty( $instance['title_ft'] ) ? $instance['title_ft'] : '';
        $title_bf = ! empty( $instance['title_bf'] ) ? $instance['title_bf'] : '';
        $title_tag_e =  ! empty( $instance['title_tag_e'] ) ? $instance['title_tag_e'] : 'h2';
        $title_class =  ! empty( $instance['title_class'] ) ? $instance['title_class'] : 'title text-uppercase';
        $title_sd = ! empty( $instance['title_sd'] ) ? $instance['title_sd'] : '';
        $title_ct = ! empty( $instance['title_ct'] ) ? $instance['title_ct'] : '';
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title_ft' ) ); ?>"><?php esc_attr_e( 'Title First:', 'text_domain' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_ft' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_ft' ) ); ?>" type="text" value="<?php echo esc_attr( $title_ft ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title_bf' ) ); ?>"><?php esc_attr_e( 'Title Second:', 'text_domain' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_bf' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_bf' ) ); ?>" type="text" value="<?php echo esc_attr( $title_bf ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title_tag_e' ) ); ?>"><?php esc_attr_e( 'Choice Title Tag:', 'text_domain' ); ?></label> 
        <select name="<?php echo $this->get_field_name('title_tag_e'); ?>" id="<?php echo $this->get_field_id('title_tag_e'); ?>" class="widefat"> 
            
            <?php for($i=1;$i<=6;$i++){
                $value = 'h'.$i; ?>
                <option value="<?php echo $value ?>" <?php if($value == $instance['title_tag_e']): ?>selected="selected"<?php endif; ?>><?php echo $value ?></option>
            <?php } ?>
            </option> 
            
        </select>
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title_class' ) ); ?>"><?php esc_attr_e( 'Add Class Title:', 'text_domain' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_class' ) ); ?>" type="text" value="<?php echo esc_attr( $title_class ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title_sd' ) ); ?>"><?php esc_attr_e( 'Excerpt title:', 'text_domain' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_sd' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_sd' ) ); ?>" type="text" value="<?php echo esc_attr( $title_sd ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title_ct' ) ); ?>"><?php esc_attr_e( 'Content:', 'text_domain' ); ?></label> 
        <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_ct' ) );?>" name="<?php echo esc_attr( $this->get_field_name( 'title_ct' ) ); ?>" type="textarea"  rows="5"><?php echo esc_attr( $title_ct );?></textarea>
        </p>
      
        <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title_ft'] = $new_instance['title_ft'];
        $instance['title_bf'] = $new_instance['title_bf'];
        $instance['title_tag_e'] = $new_instance['title_tag_e'];
        $instance['title_class'] = $new_instance['title_class'];
        $instance['title_sd'] = $new_instance['title_sd'];
        $instance['title_ct'] = $new_instance['title_ct'];
        
        return $instance;
    }

} // class Tittle_Session_Widget

// register Foo_Widget widget
function register_Tittle_Session_Widget() {
    register_widget( 'Tittle_Session_Widget' );
}
add_action( 'widgets_init', 'register_Tittle_Session_Widget' );


/**
 * Adds Feature_Box_Widget widget.
 */
class Feature_Box_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'Feature_Box_Widget', // Base ID
            esc_html__( 'Feature Box Widget', 'text_domain' ), // Name
            array( 'description' => esc_html__( 'A Feature Box Widget', 'text_domain' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {

        $title = $instance['title'];
        $icons_tag = $instance['icons_tag'];
        $content = $instance['content'];

        // before widget (defined by theme)
        echo $args['before_widget'];?>
        <div class="icon-box text-center">
            <?php

            if(!empty($icons_tag)){
                echo '<a class="icon bg-theme-colored icon-circled icon-border-effect effect-circle icon-xl" href="#">'.$icons_tag.'</a>';
            }

            if(!empty( $title)){
                echo '<h4 class="Personal trainer text-uppercase"><strong>'.$title.'</strong></h4>';
            }
            
             if(!empty($content)){
                echo '<p>'.$content.'</p>';
            }?>
            
        </div>
        <?php
        // after widget (defined by theme)
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
       
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $icons_tag = ! empty( $instance['icons_tag'] ) ? $instance['icons_tag'] : '';
        $content = ! empty( $instance['content'] ) ? $instance['content'] : '';
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title_ft' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'icons_tag' ) ); ?>"><?php esc_attr_e( 'Icons Tag:', 'text_domain' ); ?></label> 
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icons_tag' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icons_tag' ) ); ?>" type="text" value="<?php echo esc_attr( $icons_tag ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>"><?php esc_attr_e( 'Content:', 'text_domain' ); ?></label> 
        <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content' ) ); ?>" type="textarea"  rows="5"> <?php echo esc_attr( $content ); ?></textarea>
        </p>
      
        <?php 
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['icons_tag'] = $new_instance['icons_tag'];
        $instance['content'] = $new_instance['content'];
        
        return $instance;
    }

} 

// register Foo_Widget widget
function register_Feature_Box_Widget() {
    register_widget( 'Feature_Box_Widget' );
}
add_action( 'widgets_init', 'register_Feature_Box_Widget' ); 




// register sidebar 1
for($i=1;$i<7;$i++){
    register_sidebar(array(
    'name' => 'Block Tittle '.$i,
    'id' => 'block-tittle-'.$i,
    'description' => 'Location Sidebar show Tittle Block',
    'before_widget' => '<div class="col-md-8 col-md-offset-2">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
));
}

//register our feature Sidebar area
register_sidebar(array(
    'name' => 'Feautre Box Area Widget',
    'id' => 'feature_box',
    'description' => 'Location Sidebar show Feautre Box',
    'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
));

//register carousel Client Sidebar area
register_sidebar(array(
    'name' => 'Carousel Client',
    'id' => 'carousel_client',
    'description' => 'Location Sidebar show Carousel Client Logo',
    'before_widget' => '<div class="section-content">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
));

//register carousel archievement Sidebar area
register_sidebar(array(
    'name' => 'Carousel Archievement',
    'id' => 'carousel_archievement',
    'description' => 'Carousel Archievement',
    'before_widget' => '<div class="section-content">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
));
// latest news

function latest_news_sc(){
    $lt_new_Qr = new WP_Query(array(
                'posts_per_page' => 5,
                'orderby'        => 'post_date',
                'order'          => 'ASC',
                'category'       => 'news'
        ));
    ob_start();
        if ( $lt_new_Qr->have_posts() ) :

                while ( $lt_new_Qr->have_posts() ) :
                        $lt_new_Qr->the_post();?>
                            <div class="items">
                                <div class="schedule-box maxwidth500 mb-30 bg-lighter">
                                    <div class="thumb"> <img class="img-fullwidth" alt="" src="<?php the_post_thumbnail_url(array(350,233));?>">
                                      <div class="overlay"> <a href="<?php the_permalink(); ?>"><i class="fa fa-search mr-5 bg-theme-colored"></i></a> </div>
                                    </div>
                                    <div class="schedule-details clearfix p-20 pt-10">
                                      <h5 class="font-16 title text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                      <p>with <a href="#">Corks</a> &amp; <a href="#">Camelia</a></p>
                                      <ul class="list-inline font-10 mt-15 mb-20 text-gray-silver">
                                        <li><i class="fa fa-calendar mr-5"></i> <?php the_date( 'M  d/Y');?></li>
                                        <li><i class="fa fa-map-marker mr-5"></i> 89 Newyork City.</li>
                                      </ul>
                                      <p><?php the_excerpt();?></p>
                                      <div class="mt-10"> <a class="btn btn-theme-colored btn-sm btn-flat" href="<?php the_permalink(); ?>">Read More</a> </div>
                                    </div>
                                </div>
                            </div>
                                
                <?php endwhile;
                
        endif;
        $list_post = ob_get_contents(); 
 
        ob_end_clean();
 
        return $list_post;
}
add_shortcode( 'latest_news_shortcode', 'latest_news_sc' );

add_filter( 'widget_text', 'do_shortcode' ); 
// Assign the tag for our shortcode and identify the function that will run. 
add_shortcode( 'template_directory_uri', 'wpse61170_template_directory_uri' );

// Define function 
function wpse61170_template_directory_uri() {
    return get_template_directory_uri();
}

/* widget Image Gallery with text*/
