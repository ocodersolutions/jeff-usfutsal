<article id="item-<?php the_ID(); ?>" class="uk-article post-format-video" data-permalink="<?php the_permalink(); ?>">

    <div class="entry-video">
        <?php 
        $video = get_post_meta( get_the_ID(), 'bdt_video_src', true );
        if (!empty($video)) : ?>

        <?php echo wp_oembed_get(esc_url($video)); ?>

        <?php endif ?>
    </div>

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