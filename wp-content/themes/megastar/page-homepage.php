<?php 
/* Template Name: Homepage */

get_header();

// Layout
$megastar_layout = get_post_meta( get_the_ID(), 'megastar_layout', true );

if($megastar_layout == 'default'){
	$mainlayout = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
} 
elseif($megastar_layout == 'full'){
	$mainlayout = 'uk-width-medium-1-1 page-section nopadding';
	$sidebarlayout = 'uk-hidden';
}
elseif($megastar_layout == 'sidebar-left'){
	$mainlayout = 'uk-width-medium-7-10 uk-push-3-10 ';
	$sidebarlayout = 'uk-width-medium-3-10 uk-pull-7-10 uk-row-first';
}
elseif($megastar_layout == 'sidebar-right'){
	$mainlayout = 'uk-width-medium-7-10 uk-row-first';
	$sidebarlayout = 'uk-width-medium-3-10';
} 
else{
	$mainlayout = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
} ?>



<div id="page-wrap" class="tm-middle uk-grid" <?php echo ($megastar_layout == 'sidebar-left' or $megastar_layout == 'sidebar-right') ? 'data-uk-grid-match' : ''; ?> data-uk-grid-margin>

	<div class="tm-main <?php echo esc_attr($mainlayout); ?>">
		<main class="tm-content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			<?php endwhile; endif; ?>
		</main> <!-- end main -->
	</div> <!-- end content -->
	

	<?php if($megastar_layout == 'sidebar-left' || $megastar_layout == 'sidebar-right'){ ?>
		<aside class="tm-sidebar <?php echo esc_attr($megastar_layout); ?> <?php echo esc_attr($sidebarlayout); ?>">
			<?php get_sidebar(); ?>
		</aside> <!-- end aside -->
	<?php } ?>

</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>
