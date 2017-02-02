<?php 

get_header();

// Layout
$megastar_layout = (is_active_sidebar('blog-widgets')) ? 'sidebar-right' : 'default';


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

			<?php if (is_author()) { ?>
				<div class="author-archive">

					<div id="author-info" class="uk-clearfix uk-margin-large-bottom">
					    <div class="author-image uk-float-left uk-margin-right">
						    	<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><?php echo get_avatar( esc_attr(get_the_author_meta('user_email')), '80', '' ); ?></a>
						    </div>   
						    <div class="author-bio">
						       <h4 class="uk-margin-small-bottom"><?php esc_html_e('About', 'megastar'); ?> <?php the_author(); ?></h4>
						        <?php the_author_meta('description'); ?>
						    </div>
					</div>

				</div>
			<?php } ?>
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php get_template_part( 'template-parts/post-format/entry', get_post_format() ); ?>
		
			<?php endwhile; endif; ?>

			<?php get_template_part( 'template-parts/pagination' ); ?>
	
		</main> <!-- end main -->
	</div> <!-- end content -->

	<?php if($megastar_layout == 'sidebar-right'){ ?>
		<aside class="tm-sidebar <?php echo esc_attr($megastar_layout); ?> <?php echo esc_attr($sidebarlayout); ?>">
			<?php get_sidebar(); ?>
		</aside> <!-- end aside -->
	<?php } ?>

</div>

<?php get_footer(); ?>
