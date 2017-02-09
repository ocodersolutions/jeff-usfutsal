<?php get_header('sport'); 

// Layout
$sidebar = get_theme_mod('megastar_blog_layout', 'sidebar-right');

if($sidebar == 'sidebar-left'){
	$mainlayout = 'col-md-9 blog-pull-right';
	$sidebarlayout = 'col-sm-12 col-md-3';
}
elseif($sidebar == 'sidebar-right'){
	$mainlayout = 'col-md-9 blog-pull-right';
	$sidebarlayout = 'col-sm-12 col-md-3';
} 
else{
	$mainlayout = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
} ?>

<div class="row" data-uk-grid-match="" data-uk-grid-margin="" >

	<?php if($sidebar == 'sidebar-left'){ ?>
	<div class="col-sm-12 col-md-3">
		<div class="sidebar sidebar-left mt-sm-30">
		<!-- <aside id="tm-sidebar" class="tm-sidebar <?php echo esc_attr($sidebar); ?> <?php echo esc_attr($sidebarlayout); ?>"> -->
			<?php get_sidebar('single'); ?>
		<!-- </aside> --> <!-- end aside -->
		</div>
	</div>
	<?php } ?>

	<div class="<?php echo esc_attr($mainlayout); ?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<?php get_template_part( 'template-parts/post-format/single'); ?>
			
			
			<?php if(get_theme_mod('megastar_author_info', 1)) { ?>
				<?php $args = array( 
					'class'         => 'img-thumbnail',
					'height'        => 148,
					'width'			=> 128
				);?>
				<div class="author-details media-post">
				    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>" class="post-thumb mb-0 pull-left flip pr-20"><?php echo get_avatar( esc_attr(get_the_author_meta('user_email')), 125,'', '' , $args ); ?></a>
				    <div class="post-right">
				      <h5 class="post-title mt-0 mb-0"><a href="#" class="font-18"><?php echo get_the_author();?></a></h5>
				      <p><?php the_author_meta('description'); ?></p>
				      <ul class="styled-icons square-sm m-0">
				        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
				        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
				        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				      </ul>
				    </div>
				    <div class="clearfix"></div>
				  </div>

			<?php } ?>
				
			<?php if(get_theme_mod('megastar_related_post')) { ?>	
			
					<?php //for use in the loop, list 5 post titles related to first tag on current post
					$tags = wp_get_post_tags($post->ID);
					if($tags) {
					?>
					
					<hr class="uk-article-divider">
					<div id="related-posts">
						<h3><?php esc_html_e('Related Posts', 'megastar'); ?></h3>
						<ul class="uk-list uk-list-line">
							<?php  $first_tag = $tags[0]->term_id;
							  $args=array(
							    'tag__in' => array($first_tag),
							    'post__not_in' => array($post->ID),
							    'showposts'=>4
							   );
							  $my_query = new WP_Query($args);
							  if( $my_query->have_posts() ) {
							    while ($my_query->have_posts()) : $my_query->the_post(); ?>
							      <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> <span class="uk-article-meta"><?php the_time(get_option('date_format')); ?></span></li>
							      <?php
							    endwhile;
							    wp_reset_postdata();
							  } ?>
						</ul>
					</div>
					
					<?php } // end if $tags ?>

			<?php } ?>
		
			<?php comments_template(); ?>
			
			<?php if(get_theme_mod('megastar_blog_next_prev', 1)) { ?>

				<hr class="uk-article-divider">
				
				<div class="pagination-wrapper">
					<div id="pagination" class="uk-clearfix">
						<ul class="uk-pagination">
						    <li class="uk-pagination-previous">
						        <?php
						        	$pre_btn_txt = '<i class="uk-icon-arrow-left"></i> '.esc_html__( 'Previous Post', 'megastar' ); 
						        	previous_post_link('%link', "<div class='prev'>{$pre_btn_txt}</div>", FALSE); 
						        ?>
						    </li>
						    <li class="uk-pagination-next">
						        <?php $next_btn_txt = esc_html__( 'Next Post', 'megastar' ).' <i class="uk-icon-arrow-right"></i>';
	                    		next_post_link('%link', "<div class='next'>{$next_btn_txt}</div>", FALSE); ?>
						    </li>
						</ul>
					</div>
				</div>
			<?php } ?>
	
		<?php endwhile; endif; ?>
		
	</div>

	<?php if( $sidebar == 'sidebar-right'){ ?>
	<div class="col-sm-12 col-md-3">
		<div class="sidebar sidebar-left mt-sm-30">
		<!-- <aside id="tm-sidebar" class="tm-sidebar <?php echo esc_attr($sidebar); ?> <?php echo esc_attr($sidebarlayout); ?>"> -->
			<?php get_sidebar('single'); ?>
		<!-- </aside> --> <!-- end aside -->
		</div>
	</div>
	<?php } ?>

</div>

<?php get_footer('sport'); ?>