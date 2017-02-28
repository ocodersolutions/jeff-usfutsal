<?php 

get_header();

// Layout
$megastar_layout = (is_active_sidebar('blog-widgets')) ? 'sidebar-right' : 'default';


if($megastar_layout == 'sidebar-right'){
	$mainlayout = 'col-md-9 blog-pull-right';
	$sidebarlayout = 'col-sm-12 col-md-3';
} 
else{
	$mainlayout = 'col-md-12';
	$sidebarlayout = '';
}

?>

<section>
    <div class="container mt-0   pt-10 pb-60">
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
	              	<div class="col-md-12">
                		<div class="row list">
	                	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php get_template_part( 'template-parts/post-format/entry', get_post_format() )?>
							
						<?php endwhile; endif; ?>
						
						
						</div>
            		</div>
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
