<article id="item-<?php the_ID(); ?>" class="uk-article post-format-standard" data-permalink="<?php the_permalink(); ?>">
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-standard">
        <?php if(is_single()) : ?>
            <?php echo  the_post_thumbnail('megastar-blog', array('class' => ''));  ?>
        <?php else : ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                <span class="catBlogLink"></span>
                <?php echo  the_post_thumbnail('megastar-blog', array('class' => ''));  ?>
            </a>
        <?php endif; ?>
        </div>
    <?php endif; ?>
    
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
    
    
    <?php if(!is_single()){ ?>
        <p><?php echo wp_kses_post(megastar_custom_excerpt(50)); ?></p>
    <?php } else { ?>
        <?php the_content(); ?>
    <?php } ?>
    
</article>