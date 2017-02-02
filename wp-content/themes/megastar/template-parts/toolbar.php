<?php 
$megastar_mb_toolbar = (get_post_meta( get_the_ID(), 'megastar_toolbar', true ) != null) ? get_post_meta( get_the_ID(), 'megastar_toolbar', true ) : null;
$megastar_tm_toolbar = (get_theme_mod( 'megastar_toolbar', 1)) ? 1 : 0;
$megastar_toolbar    = ($megastar_mb_toolbar != null ) ? $megastar_mb_toolbar : $megastar_tm_toolbar;
$toolbar_left        = get_theme_mod( 'megastar_toolbar_left' );
$toolbar_right       = get_theme_mod( 'megastar_toolbar_right' );
$toolbar_cart        = get_theme_mod( 'megastar_cart' );

?>

<?php if ($megastar_toolbar) : ?>
	<div class="toolbar-wrapper">
		<div class="uk-container uk-container-center">
			<div class="tm-toolbar uk-clearfix">
				<?php if (!empty($toolbar_left)) : ?>
				<div class="tm-toolbar-l uk-float-left"><?php get_template_part( 'template-parts/toolbars/'.$toolbar_left ); ?></div>
				<?php endif; ?>

				<?php if (!empty($toolbar_right) or $toolbar_cart == 'toolbar') : ?>
				<div class="tm-toolbar-r uk-float-right">
					<?php if ($toolbar_cart == 'toolbar') : ?>
						<div class="uk-hidden-small uk-display-inline-block">
							<?php get_template_part( 'template-parts/toolbars/'.$toolbar_right ); ?>
						</div>
						<?php get_template_part('template-parts/woocommerce-cart'); ?>
					<?php else: ?>
						<?php get_template_part( 'template-parts/toolbars/'.$toolbar_right ); ?>
					<?php endif; ?>		
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>