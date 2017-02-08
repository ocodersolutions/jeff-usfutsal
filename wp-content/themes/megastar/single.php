<?php get_header(); 

// Layout
$sidebar = get_theme_mod('megastar_blog_layout', 'sidebar-right');

if($sidebar == 'sidebar-left'){
	$mainlayout = 'uk-width-medium-7-10 uk-push-3-10';
	$sidebarlayout = 'uk-row-first uk-width-medium-3-10 uk-pull-7-10';
}
elseif($sidebar == 'sidebar-right'){
	$mainlayout = 'uk-row-first uk-width-medium-7-10';
	$sidebarlayout = 'uk-width-medium-3-10';
} 
else{
	$mainlayout = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
} ?>

<div id="page-wrap" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="" >
	<div class="tm-main <?php echo esc_attr($mainlayout); ?>">
		<main class="tm-content">
	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php get_template_part( 'template-parts/post-format/entry', get_post_format() ); ?>
				
				
				<?php if(get_theme_mod('megastar_author_info', 1)) { ?>

					<div id="author-info" class="uk-clearfix author-info">
					    <div class="author-image uk-float-left">
					    	<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><?php echo get_avatar( esc_attr(get_the_author_meta('user_email')), '160', '' ); ?></a>
					    </div>   
					    <div class="author-bio">
					       <h3><?php esc_html_e('About The Author', 'megastar'); ?></h3>
					        <?php the_author_meta('description'); ?>
					    </div>
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
		</main> <!-- end main -->
	</div>

	<?php if($sidebar == 'sidebar-left' || $sidebar == 'sidebar-right'){ ?>
		<aside id="tm-sidebar" class="tm-sidebar <?php echo esc_attr($sidebar); ?> <?php echo esc_attr($sidebarlayout); ?>">
			<?php get_sidebar('single'); ?>
		</aside> <!-- end aside -->
	<?php } ?>

</div>

<?php get_footer(); ?>