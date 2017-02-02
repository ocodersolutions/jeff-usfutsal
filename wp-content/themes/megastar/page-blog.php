<?php 
/* Template Name: Blog */

get_header(); 

// Layout
$megastar_layout = get_post_meta( get_the_ID(), 'megastar_layout', true );

if($megastar_layout == 'default'){
	$mainlayout    = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
} 
elseif($megastar_layout == 'fullwidth'){
	$mainlayout    = 'uk-width-medium-1-1';
	$sidebarlayout = 'page-section nopadding';
}
elseif($megastar_layout == 'sidebar-left'){
	$mainlayout    = 'uk-width-medium-7-10 uk-push-3-10 ';
	$sidebarlayout = 'uk-width-medium-3-10 uk-pull-7-10 uk-row-first';
}
elseif($megastar_layout == 'sidebar-right'){
	$mainlayout    = 'uk-width-medium-7-10 uk-row-first';
	$sidebarlayout = 'uk-width-medium-3-10';
} 
else{
	$mainlayout    = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
} ?>

<div id="blog-page" class="tm-middle uk-grid" <?php echo ($megastar_layout == 'sidebar-left' or $megastar_layout == 'sidebar-right') ? 'data-uk-grid-match' : ''; ?> data-uk-grid-margin>

	<div class="tm-main <?php echo esc_attr($mainlayout); ?>">
		<main class="tm-content">
			<?php 

				global $wp_query;
				// Pagination fix to work when set as Front Page
				// $paged = get_query_var('paged') ? get_query_var('paged') : 1;
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } elseif ( get_query_var('page') ) { $paged = get_query_var('page'); } else { $paged = 1; }	

				// Get Categories
				$categories = rwmb_meta( 'megastar_blogcategories', 'type=checkbox_list' );
				$categories = implode( ', ', $categories );	

				$args = array(
					'post_status'   => 'publish',
					'orderby'       => 'date',
					'order'         => 'DESC',
					'category_name' => $categories,
					'paged'         => $paged
				);
				$wp_query = new WP_Query($args);

				if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'template-parts/post-format/entry', get_post_format() ); ?>

				<?php endwhile; endif; ?>

			<?php get_template_part( 'template-parts/pagination' ); ?>
		</main> <!-- end main -->
	</div> <!-- end content -->



	<?php if($megastar_layout == 'sidebar-left' || $megastar_layout == 'sidebar-right'){ ?>
		<aside class="tm-sidebar <?php echo esc_attr($megastar_layout); ?> <?php echo esc_attr($sidebarlayout); ?>">
			<?php get_sidebar(); ?>
		</aside> <!-- end aside -->
	<?php } ?>

</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>
