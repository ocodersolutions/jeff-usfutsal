<div class="blog-posts single-post">
  <article class="post clearfix mb-0">
    <?php if (has_post_thumbnail()) : ?>
    <div class="entry-header pull-left mr-20 mb-10">
      <?php if(is_single()) : ?>
                <?php echo  the_post_thumbnail('megastar-blog-list', array('class' => ''));  ?>
            <?php else : ?>
      <div class="post-thumb thumb"> <?php the_post_thumbnail('full');?></div>
      <?php endif; ?>
    </div>
    <?php endif; ?>  
    <div class="entry-title pt-0">
      <h4><a href="#">Vonsectetur adipiscing elit. </a></h4>
    </div>
    <div class="entry-meta">
      <ul class="list-inline">
        <?php if(get_the_date()) : ?>
        <li>Posted: <span class="text-theme-colored"> <?php echo get_the_date( 'j/n/Y');?></span></li>
        <?php endif;?>

        <?php if( get_the_author()) :?>
        <li>By: <span class="text-theme-colored"><?php the_author(); ?></span></li>
        <?php endif;?>

        <?php if(comments_open() || get_comments_number()) : ?>
        <li><i class="fa fa-comments-o ml-5 mr-5"></i> <?php comments_popup_link(__('No Comments', 'megastar'), esc_html__('1 Comment', 'megastar'), esc_html__('% Comments', 'megastar'), "", ""); ?></li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="entry-content mt-10">
      <?php the_content()?>
      <div class="mt-30 mb-0">
        <h5 class="pull-left mt-10 mr-20 text-theme-colored">Share:</h5>
        <ul class="styled-icons icon-circled m-0">
          <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
          <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
          <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
        </ul>
      </div>
    </div>
  </article>

  <div class="tagline p-0 pt-20 mt-5">
    <div class="row">
    <?php if(has_tag()) { ?>
      <div class="col-md-8">
        <div class="tags">
          <p class="mb-0"><i class="fa fa-tags text-theme-colored"></i> <span>Tags : </span><?php $tags = get_tags();
          foreach ( $tags as $tag ) { echo '  '.$tag->name.',';}?></p>
        </div>
      </div>
      <?php } ?>
      <div class="col-md-4">
        <div class="share text-right">
          <p><i class="fa fa-share-alt text-theme-colored"></i> Share</p>
        </div>
      </div>
    </div>
  </div>
  

</div>