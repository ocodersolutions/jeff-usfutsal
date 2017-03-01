<?php
$megastar_titlebar_show = rwmb_meta('megastar_header');
?>

<?php
global $post;
$titlebar_bg_image = '';
$post_titlebar_style = '';

$event_id = get_the_ID();
if ($event_id && is_single()) {
    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($event_id), 'large', false);
     if ($featured_image[0]){
        $titlebar_bg_image = 'style="background-image: url( ' . $featured_image[0] . ');"';
    }
}

//echo tribe_event_featured_image( $event_id, 'large', false );
$titlebar_bg_image = $titlebar_bg_image ? $titlebar_bg_image : ((get_theme_mod('megastar_titlebar_bg_image')) ? 'style="background-image: url( ' . get_theme_mod('megastar_titlebar_bg_image') . ');"' : '');
$title = "Events";
?>


<section class="inner-header divider"  <?php echo wp_kses_post($titlebar_bg_image); ?>>
    <div class="container">
        <!-- Section Content -->
        <div class="section-content col-sm-8 col-lg-offset-2 bg-dark-transparent-light">
            <div class="row"> 
                <div class="col-md-12">
                    <h2 class="m-0 text-center text-uppercase font-60 text-white line-height-0 pt-40 pb-40 letter-space-1  <?php echo esc_attr($titlebar_style); ?>"><?php echo esc_html($title); ?></h2>

                </div>
            </div>
        </div>
    </div>
</section>


    <?php


  