<?php
/**
 * The Blog template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package megastar
 */

get_header();

// Layout
$megastar_layout = (get_post_meta( get_the_ID(), 'megastar_layout', true )) ? get_post_meta( get_the_ID(), 'megastar_layout', true ) : get_theme_mod('megastar_blog_layout', 'sidebar-right');

if($megastar_layout == 'default'){
	$mainlayout = 'col-md-9 blog-pull-right';
	$sidebarlayout = 'col-sm-12 col-md-3';
} 
elseif($megastar_layout == 'fullwidth'){
	$mainlayout = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
}
elseif($megastar_layout == 'sidebar-left'){
	$mainlayout = 'col-md-9 blog-pull-right';
	$sidebarlayout = 'col-sm-12 col-md-3';
}
elseif($megastar_layout == 'sidebar-right'){
	$mainlayout = 'col-md-9 blog-pull-right';
	$sidebarlayout = 'col-sm-12 col-md-3';
} 
else{
	$mainlayout = 'uk-width-medium-1-1';
	$sidebarlayout = 'uk-hidden';
} ?>



<section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row ">
	        <?php if($megastar_layout == 'sidebar-left'){ ?>
	        <div class="col-sm-12 col-md-3">
	        	<div class="sidebar sidebar-left mt-sm-30">
				<?php get_sidebar(); ?>
				</div>
			</div>
	        <?php } ?>
			
			<div class="<?php echo esc_attr($mainlayout); ?>">
	            <div class="blog-posts">
	              
	                	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php get_template_part( 'template-parts/post-format/entry', get_post_format() ); ?>

						<?php endwhile; endif; ?>
						
						<?php get_template_part( 'template-parts/pagination' ); ?>
                </div>
            </div>
	              

			<?php if( $megastar_layout == 'sidebar-right'){ ?>
			<div class="col-sm-12 col-md-3">
				<div class="sidebar sidebar-right mt-sm-30">
				<?php get_sidebar(); ?>
				</div>
			</div>
			<?php } ?>
        </div>
    </div>
</section>
	
<?php get_footer(); ?>