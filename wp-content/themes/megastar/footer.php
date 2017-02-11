<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package megastar
 */

$footer_active = get_theme_mod('megastar_footer_widgets', 1) && get_post_meta( get_the_ID(), 'megastar_footer_widgets', true ) != 'hide';
$footer_background_image =  get_theme_mod('footer_background_image','http://placehold.it/1920x1280');
$megastar_logo_upload = get_theme_mod('megastar_logo_upload');

 ?>

			</div>
		</div>
	</div><!-- #content -->
 
 
</div><!-- #page -->

<?php if (is_active_sidebar('fixed-left')) : ?>
<div id="tmFixedLeft" class="uk-fixed-l">
	<div class="uk-fixed-l-wrapper">
		<?php dynamic_sidebar('fixed-left'); ?>
	</div>
</div>
<?php endif; ?>

<?php if (is_active_sidebar('fixed-right')) : ?>
<div id="tmFixedRight" class="uk-fixed-r">
	<div class="uk-fixed-r-wrapper">
		<?php dynamic_sidebar('fixed-right'); ?>
	</div>
</div>
<?php endif; ?>
<footer class="footer divider layer-overlay overlay-dark" data-bg-img="<?php echo $footer_background_image ?>">
    <div class="container pt-100 pb-30">
        <div class="row mb-50">
        <?php if($footer_active) { ?>
			<?php 

				$footer_columns = (get_theme_mod('megastar_footer_columns')) ? get_theme_mod('megastar_footer_columns') : '3';			
			$col_number = $footer_columns? 12/$footer_columns : 12;
			$footer_columns_class = "col-sm-$col_number col-md-$col_number mb-sm-60";	 
			?>

			<?php if (is_active_sidebar('footer-widgets') || is_active_sidebar('footer-widgets-2') || is_active_sidebar('footer-widgets-3') || is_active_sidebar('footer-widgets-4')) : ; ?>
                            <div class="<?php echo esc_attr($footer_columns_class); ?>"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 1')); ?></div>
                            <?php if($footer_columns == '2' || $footer_columns == '3' || $footer_columns == '4') { ?>
                            <div class="<?php echo esc_attr($footer_columns_class); ?>"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 2')); ?></div>
                            <?php } ?>
                            <?php if($footer_columns == '3' || $footer_columns == '4') { ?>
                            <div class="<?php echo esc_attr($footer_columns_class); ?>"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 3')); ?></div>
                            <?php } ?>
                            <?php if($footer_columns == '4') { ?>
                            <div class="<?php echo esc_attr($footer_columns_class); ?>"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 4')); ?></div>	
                            <?php } ?>
					 
			<?php endif; 
	} ?>
    </div>
       
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark"> 
            <img class="mt-10 mb-20" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($megastar_logo_upload); ?>">
           <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets Below Logo')); ?>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Pages</h5>
            <?php
            if (has_nav_menu('footer')) {
                    echo wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'list angle-double-right list-border', 'depth' => 1 ) );  
            }
            ?>             
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Quick Links</h5>
            <?php
            if (has_nav_menu('offcanvas')) {
                    echo wp_nav_menu( array( 'theme_location' => 'offcanvas', 'container' => false, 'menu_class' => 'list angle-double-right list-border', 'depth' => 1 ) );  
            }
            ?>               
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <!-- <h5 class="widget-title line-bottom">Opening Hours</h5> -->
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets Open Hour')); ?>            
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid copy-right p-20">
      <div class="row text-center">
        <div class="col-md-12">
            <?php  if(get_theme_mod('megastar_show_copyright_text')) : ?>
										
                    <div class="copyright-txt"><?php echo wp_kses_post(get_theme_mod('megastar_custom_copyright_text')); ?></div>

            <?php else : ?>								

                    <div class="copyright-txt">&copy; <?php esc_html_e('Copyright', 'megastar') ?> <?php echo esc_html(date("Y ")); ?> <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' );?>"> <?php echo esc_html(bloginfo('name')); ?> </a></div>

            <?php endif; ?>
        </div>
      </div>
    </div>
  </footer>

<?php $megastar_top_link = get_theme_mod('megastar_top_link');
if(!$megastar_top_link): ?>
	<a class="scrollToTop" href="#" style="display: block;"><i class="fa fa-angle-up"></i></a>
<?php endif; ?>

<?php // get_template_part( 'template-parts/offcanvas' ); ?>

<?php wp_footer(); ?>

</body>
</html>