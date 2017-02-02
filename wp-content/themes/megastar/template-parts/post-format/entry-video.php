<article id="item-<?php the_ID(); ?>" class="uk-article post-format-video" data-permalink="<?php the_permalink(); ?>">

    <div class="entry-video">
        <?php 
        $video = get_post_meta( get_the_ID(), 'bdt_video_src', true );
        if (!empty($video)) : ?>

        <?php echo wp_oembed_get(esc_url($video)); ?>

        <?php endif ?>
    </div>

    <?php if(get_the_date()) : ?>
    <span class="catDateWrap">
        <span class="date">
            <?php
                printf(get_the_date('j'));
            ?>
        </span>
        <span class="time">
            <?php
                printf(get_the_date('M'));
            ?>
        </span>
    </span>
    <?php endif; ?>

    <?php if(!is_single()) :?>
    <h1 class="uk-article-title catBlogTitle">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                <?php printf( '<span class="sticky-post featured">%s</span>', esc_html__( 'Featured', 'megastar') ); ?>
        <?php endif; ?>
    </h1>
    <?php elseif(is_single()) :?>
        <h1 class="uk-article-title catBlogTitle"><?php the_title(); ?></h1>
    <?php endif ?>

    <?php if(get_theme_mod('megastar-blog_meta', 1)) :?>
        <div class="entry-meta">
            <?php get_template_part( 'template-parts/post-format/meta' ); ?>
        </div>
    <?php endif; ?>
    
    <div class="entry-content">
    <?php if(!is_single()) : ?>
        <p><?php echo wp_kses_post(megastar_custom_excerpt(50)); ?></p>
    <?php else : ?>
        <?php the_content(); ?>
    <?php endif ?>
    </div>

</article>