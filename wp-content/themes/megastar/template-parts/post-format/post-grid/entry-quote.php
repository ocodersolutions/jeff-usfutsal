<article id="item-<?php the_ID(); ?>" class="uk-article post-format-quote" data-permalink="<?php the_permalink(); ?>">
    
    <?php 
    $quote_text = get_post_meta( get_the_ID(), 'bdt_quote_text', true );
    $quote_src = get_post_meta( get_the_ID(), 'bdt_quote_src', true );

    if (!empty($quote_text)) : ?>
    <div class="entry-quote">
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'megastar'), the_title_attribute('echo=0') ); ?>" class="quote-text"><?php echo esc_html($quote_text); ?>
        <span class="quote-source"><?php echo esc_html($quote_src); ?></span></a>
    </div>

    <?php else : ?>

        <?php echo 'Please insert a Quote'; ?>

    <?php endif ?>
    
    <?php if(is_single()) :?>
        <h1 class="uk-article-title catBlogTitle"><?php the_title(); ?></h1>
    <?php endif ?>

    <div class="entry-meta uk-clearfix">
        <?php get_template_part( 'layouts/meta' ); ?>
    </div>
    
    <?php if(is_single()) : ?> 
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <?php endif  ?>

</article>