<?php get_header();

// Layout
$megastar_layout = get_post_meta( get_the_ID(), 'megastar_layout', true );

if($megastar_layout == 'sidebar-left'){
	$mainlayout = 'col-md-9 blog-pull-right';
	$sidebarlayout = 'col-sm-12 col-md-3';
}
elseif($megastar_layout == 'sidebar-right'){
	$mainlayout = 'col-md-9 blog-pull-right';
	$sidebarlayout = 'col-sm-12 col-md-3';
} 
else{
	$mainlayout = '';
	$sidebarlayout = 'hidden';
}  
   ?>

  <?php
    // Layout
    $megastar_layout_container = (get_post_meta(get_the_ID(), 'megastar_layout', true) != 'full') ? 'container' : 'row';
    ?>
    <div class="<?php //echo esc_attr($megastar_layout_container); ?>">
<div id="page-wrap">

	<div class="tm-main <?php echo esc_attr($mainlayout); ?>">
		<main class="tm-content row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				<?php if(!is_page(431)){?>
					<?php if(get_theme_mod('megastar_comment_show', 1) == 1) { ?>
					<?php comments_template(); ?>
				<?php } ?>
				<?php }?>
				

			<?php endwhile; endif; ?>
		</main> <!-- end main -->
	</div> <!-- end content -->
	

	<?php if($megastar_layout == 'sidebar-left' || $megastar_layout == 'sidebar-right'){ ?>
		<aside class="tm-sidebar <?php echo esc_attr($megastar_layout); ?> <?php echo esc_attr($sidebarlayout); ?>">
			<?php get_sidebar(); ?>
		</aside> <!-- end aside -->
	<?php } ?>

</div> <!-- end page-wrap -->
    </div>	
<?php get_footer(); ?>
