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
$footer_padding = ($footer_active) ? ' tm-padding-small' : '';
?>
	

			</div>
		</div>
	</div><!-- #content -->


	<div class="footer-wrapper<?php echo esc_attr($footer_padding); ?>" id="tmFooter">
		<?php if($footer_active) { ?>
			<?php 

				$footer_columns = (get_theme_mod('megastar_footer_columns')) ? get_theme_mod('megastar_footer_columns') : '3';
				
			
				if($footer_columns == '4'){
					$footer_columns_class = 'uk-width-1-1 uk-width-medium-1-2 uk-width-large-1-4';
				} else if($footer_columns == '3'){
					$footer_columns_class = 'uk-width-1-1 uk-width-medium-1-2 uk-width-large-1-3';
				} else if($footer_columns == '2'){
					$footer_columns_class = 'uk-width-1-1 uk-width-medium-1-2';
				} else {
					$footer_columns_class = 'uk-width-1-1';
				}
			?>

			<?php if (is_active_sidebar('footer-widgets') || is_active_sidebar('footer-widgets-2') || is_active_sidebar('footer-widgets-3') || is_active_sidebar('footer-widgets-4')) : ; ?>
				<div class="uk-container uk-container-center">
					<section class="tm-footer uk-grid uk-grid-divider" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
						<div class="<?php echo esc_attr($footer_columns_class); ?> columns"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 1')); ?></div>
						<?php if($footer_columns == '2' || $footer_columns == '3' || $footer_columns == '4') { ?>
						<div class="<?php echo esc_attr($footer_columns_class); ?> columns"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 2')); ?></div>
						<?php } ?>
						<?php if($footer_columns == '3' || $footer_columns == '4') { ?>
						<div class="<?php echo esc_attr($footer_columns_class); ?> columns"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 3')); ?></div>
						<?php } ?>
						<?php if($footer_columns == '4') { ?>
						<div class="<?php echo esc_attr($footer_columns_class); ?> columns"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 4')); ?></div>	
						<?php } ?>
					</section>
				</div>
			<?php endif; 
	} ?>

			<?php if (get_post_meta( get_the_ID(), 'megastar_footer_copyright', true ) != 'hide') : ?>
				<div class="copyright-wrapper" id="tmCopyright">
					<div class="uk-container uk-container-center">
						<footer class="tm-copyright">
								<div class="footer-l">
										
									<?php									 
									if (has_nav_menu('footer')) {
										echo wp_nav_menu( array( 'theme_location' => 'footer', 'container_class' => 'tm-copyright-menu', 'menu_class' => 'uk-subnav uk-subnav-line', 'depth' => 1 ) );  
									}
									
									if(get_theme_mod('megastar_show_copyright_text')) : ?>
										
										<div class="copyright-txt"><?php echo wp_kses_post(get_theme_mod('megastar_custom_copyright_text')); ?></div>

									<?php else : ?>								

										<div class="copyright-txt">&copy; <?php esc_html_e('Copyright', 'megastar') ?> <?php echo esc_html(date("Y ")); ?> <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' );?>"> <?php echo esc_html(bloginfo('name')); ?> </a></div>
									
									<?php endif; ?>
								</div>
						</footer>

					</div>
				</div>
			<?php endif; ?>

		</div>

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


<?php $megastar_top_link = get_theme_mod('megastar_top_link');
if(!$megastar_top_link): ?>
	<a class="tm-totop-scroller totop-hidden" data-uk-smooth-scroll href="#"></a>
<?php endif; ?>

<?php get_template_part( 'template-parts/offcanvas' ); ?>

<?php wp_footer(); ?>

</body>
</html>
