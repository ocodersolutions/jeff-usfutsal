<?php 

get_header();

// Layout
$megastar_layout = (is_active_sidebar('search-results-widgets')) ? 'sidebar-right' : 'default';


if($megastar_layout == 'sidebar-right'){
	$mainlayout = 'uk-width-medium-7-10 uk-row-first';
	$sidebarlayout = 'uk-width-medium-3-10';
} 
else{
	$mainlayout = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
}

?>

<div id="page-wrap" class="tm-middle uk-grid" <?php echo ($megastar_layout == 'sidebar-left' or $megastar_layout == 'sidebar-right') ? 'data-uk-grid-match' : ''; ?> data-uk-grid-margin>

	<div class="tm-main <?php echo esc_attr($mainlayout); ?>">
		<main class="tm-content">

		<h3><?php esc_html_e('New Search', 'megastar') ?></h3>

		<p><?php esc_html_e('If you are not happy with the results below please do another search', 'megastar') ?></p>

		<?php get_search_form(); ?>

		<div class="uk-clearfix"></div>
	
		<hr class="uk-article-divider">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('uk-article post entry-search clearfix'); ?>>

				<!-- <div class="entry-icon"><i class="fa fa-align-left"></i></div> -->
			        
			    <div class="entry-wrap">

			        <div class="entry-title">
			            <h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'megastar'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			        </div>

			        <div class="entry-type">
			        <?php if( get_post_type($post->ID) == 'post' ){ ?>
			        	<?php echo esc_html__('Blog Post', 'megastar'); ?>
			        <?php } elseif( get_post_type($post->ID) == 'page' ){ ?>
			        	<?php echo esc_html__('Page', 'megastar'); ?>
			        <?php } elseif( get_post_type($post->ID) == 'product' ){ ?>
			        	<?php echo esc_html__('Product', 'megastar'); ?>
			        <?php } ?>
			        </div>

		        	<?php if (megastar_custom_excerpt(100) != '') { ?>
					<div class="entry-content"><?php echo wp_kses_post(megastar_custom_excerpt(100)); ?></div>
		        	<?php } ?>

			    </div>

			</article><!-- #post -->
			
		<?php endwhile; ?>
		
		<?php get_template_part( 'template-parts/pagination' ); ?>
	
		<?php else : ?>
	
			<div class="uk-alert uk-alert-warning"><?php esc_html_e('No results found', 'megastar') ?></div>
	
		<?php endif; ?>
	
	</main> <!-- end main -->
	</div> <!-- end content -->

	<?php if($megastar_layout == 'sidebar-right'){ ?>
		<aside class="tm-sidebar <?php echo esc_attr($megastar_layout); ?> <?php echo esc_attr($sidebarlayout); ?>">
			<?php get_sidebar(); ?>
		</aside> <!-- end aside -->
	<?php } ?>

</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>