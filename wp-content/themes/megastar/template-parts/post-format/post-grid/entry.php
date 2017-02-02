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