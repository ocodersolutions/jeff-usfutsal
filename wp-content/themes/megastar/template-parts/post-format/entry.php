<!-- <article id="item-<?php the_ID(); ?>" class="uk-article post-format-standard" data-permalink="<?php the_permalink(); ?>">
    
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
    
</article> -->


<article class="post mb-50 pb-30 border-bottom-gray" id="item-<?php the_ID(); ?>" data-permalink="<?php the_permalink(); ?>">                  
    <div class="entry-header pull-left mr-10 mb-10">
        <?php if (has_post_thumbnail()) : ?>
            <?php if(is_single()) : ?>
                <?php echo  the_post_thumbnail('megastar-blog', array('class' => 'img-fullwidth img-responsive'));  ?>
            <?php else : ?>
            <div class="post-thumb">
                <?php echo  the_post_thumbnail('megastar-blog-list', array('class' => 'img-fullwidth img-responsive'));  ?>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    
     <!--  <ul class="list-inline font-12 mb-20 mt-10">
        <?php if(get_the_date()) { ?>
        <li><i class="fa fa-calendar mr-5"></i><?php echo get_the_date( 'd/m/Y');?> </li>
        <?php } ?>
        <?php if(comments_open() || get_comments_number()) : ?>
        <li><i class="fa fa-comments-o ml-5 mr-5"></i><?php comments_popup_link(__('No Comments', 'megastar'), esc_html__('1 Comment', 'megastar'), esc_html__('% Comments', 'megastar'), "", ""); ?></li>
        <?php endif; ?>
      </ul> -->
    </div>

    <div class="entry-content">
         <?php if(!is_single()) :?>
            <h2 class="entry-title mt-30 font-weight-700 mb-0"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>
        <?php 
            foreach((get_the_category()) as $category) { ?>
               <h4 class="title mt-0 mb-0"><?php echo $category->cat_name;?></h4>
           <?php } 
           
        ?>
        <?php if(!is_single()) {?>
        <p><?php echo wp_kses_post(custom_excerpt_lt(get_the_content(),1500)); ?></p>
        <?php }?>
    </div>
    <div class="entry_readmore text-center mt-30">
        <a href="<?php the_permalink() ?>" class="btn btn-colored btn-light-blue-hover hvr-shutter-out-horizontal no-bg btn-sm border-1px"> Read More</a> 
    </div>
    <div class="clear-fix" style="clear:both;"></div>
</article>