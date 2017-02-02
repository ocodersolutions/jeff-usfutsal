<article id="item-<?php the_ID(); ?>" class="uk-article post-format-link" data-permalink="<?php the_permalink(); ?>">

    <?php 
    $link_url = get_post_meta( get_the_ID(), 'bdt_link_url', true );

    if (!empty($link_url)) : ?>

    <div class="entry-link">
        <a href="<?php echo esc_url($link_url) ?>" title="<?php printf( esc_attr__('Link to %s', 'megastar'), the_title_attribute('echo=0') ); ?>" target="_blank"><?php the_title(); ?><span><?php echo esc_html($link_url) ?></span></a>
    </div>
    <?php endif ?>
    
    <div class="entry-meta uk-clearfix">
        <?php get_template_part( 'layouts/meta' ); ?>
    </div>

    <?php if(is_single()){ ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <?php } ?>

</article>