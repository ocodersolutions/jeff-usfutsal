<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package megastar
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function megastar_body_classes( $classes ) {
    $page_layout = (get_post_meta( get_the_ID(), 'megastar_layout', true )) ? 'page-'. get_post_meta( get_the_ID(), 'megastar_layout', true ) : '';
    $header_style = get_post_meta( get_the_ID(), 'megastar_header_style', true);
    $header_style = ( !empty($header_style) ) ? get_post_meta( get_the_ID(), 'megastar_header_style', true) : get_theme_mod('megastar_header_style', 'default');
    $header_type = get_post_meta( get_the_ID(), 'megastar_header_type', true);
    $header_type = ( !empty($header_type)) ? get_post_meta( get_the_ID(), 'megastar_header_type', true) : get_theme_mod('megastar_header_type', 'default');
    $navbar_style = get_post_meta( get_the_ID(), 'megastar_navbar_style', true);
    $navbar_style = ( !empty($navbar_style) ) ? get_post_meta( get_the_ID(), 'megastar_navbar_style', true) : get_theme_mod('megastar_navbar_style', 'default');

    
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }



    $classes[] = 'layout-' . get_theme_mod('megastar_global_layout', 'default');

    $classes[] = $page_layout;
    $classes[] = 'navbar-' . $navbar_style;

    $classes[] = 'header-'. $header_style;


	$classes[] = 'headertype-'. $header_type;

	return $classes;
}
add_filter( 'body_class', 'megastar_body_classes' );



add_filter( 'the_password_form', 'megastar_password_form' );
function megastar_password_form() {
    global $post;
    $label = ( empty( $post->ID ) ? uniqid('pf') : $post->ID );
    $output = '<form class="uk-form" action="' . esc_url( site_url( '/wp-login.php?action=postpass', 'login_post' ) ).'" method="post">
    <div class="uk-alert uk-alert-warning">' . esc_html__( "This content is password protected. To view it please enter your password below:", "megastar" ) . '</div>
    <input name="post_password" id="' . $label . '" type="password" class="uk-form-large" /><input type="submit" name="Submit" class="uk-button uk-button-primary uk-button-large uk-contrast" value="' . esc_attr__( "Submit", "megastar" ) . '" />
    </form>
    ';
    return $output;
}

add_action('wp_ajax_megastar_search', 'megastar_ajax_search');
add_action('wp_ajax_nopriv_megastar_search', 'megastar_ajax_search');

function megastar_ajax_search() {
    global $wp_query;

    $result = array('results' => array());
    $query  = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';

    if (strlen($query) >= 3) {

        $wp_query->query_vars['posts_per_page'] = 5;
        $wp_query->query_vars['post_status'] = 'publish';
        $wp_query->query_vars['s'] = $query;
        $wp_query->is_search = true;

        foreach ($wp_query->get_posts() as $post) {

            $content = !empty($post->post_excerpt) ? strip_tags(strip_shortcodes($post->post_excerpt)) : strip_tags(strip_shortcodes($post->post_content));

            if (strlen($content) > 180) {
                $content = substr($content, 0, 179).'...';
            }

            $result['results'][] = array(
                'title' => $post->post_title,
                'text'  => $content,
                'url'   => get_permalink($post->ID)
            );
        }
    }

    die(json_encode($result));
}


function megastar_sticky_header() {
    $sticky      = '';
    $header_type = (get_post_meta( get_the_ID(), 'megastar_header_type', true) !== 'default') ? get_post_meta( get_the_ID(), 'megastar_header_type', true) : get_theme_mod('megastar_header_type', 'default');

    if ($header_type === 'sticky') {
        $sticky = 'data-uk-sticky="{top: -100, animation: \'uk-animation-slide-top\'}"';
    } elseif ($header_type === 'smart-sticky') {
        $sticky = 'data-uk-sticky="{showup: true, animation: \'uk-animation-slide-top\'}"';
    }

    return $sticky;
}