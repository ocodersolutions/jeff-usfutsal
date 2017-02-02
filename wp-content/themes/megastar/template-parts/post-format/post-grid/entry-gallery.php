<article id="item-<?php the_ID(); ?>" class="uk-article post-format-gallery" data-permalink="<?php the_permalink(); ?>">
    
    <?php 
    $images = get_post_meta( get_the_ID(), 'bdt_gallery_images', true );
    if (!empty($images)) : ?>
    <div class="entry-gallery">
        <div class="uk-slidenav-position" data-uk-slideshow>
            <ul class="uk-slideshow">
                <?php 

                foreach ( $images as $image => $src ) {
                    echo "<li><a href='".esc_url($src)."' data-uk-lightbox><img src='".esc_url($src)."' alt='".esc_attr($image['alt'])."' /></a></li>";
                } ?>
            </ul>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                <?php 
                $n = 0;
                foreach ( $images as $image) {
                    echo '<li data-uk-slideshow-item="'.$n++.'"><a href=""></a></li>';
                } ?>
            </ul>
        </div>
    </div>

    <?php endif ?>
    
    <?php if(!is_single()) :?>
    <h3 class="bdt-pg-title">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                <?php printf( '<span class="sticky-post featured">%s</span>', esc_html__( 'Featured', 'megastar') ); ?>
        <?php endif; ?>
    </h3>
    <?php endif ?>

    <div class="bdt-pg-meta">
        <span class="bdt-pg-date"><?php echo esc_attr(get_the_date()); ?></span>
        <span class="bdt-pg-category"><?php the_category(', '); ?></span>
    </div>
    
    
    <?php if(!is_single()){ ?>
        <p><?php echo wp_kses_post(megastar_custom_excerpt(20)); ?></p>
    <?php } else { ?>
        <?php the_content(); ?>
    <?php } ?>

</article>