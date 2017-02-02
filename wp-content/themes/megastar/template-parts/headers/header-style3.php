<?php
/**
* @package   megastar
* @author    bdthemes http://www.bdthemes.com
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/
	
$header_fullwidth     = get_theme_mod('megastar_header_fullwidth');
$page_progress        = get_theme_mod('megastar_page_progress');
$header_transparancy = (get_theme_mod('megastar_header_type', 'fixed') and get_theme_mod('megastar_header_transparent', 1) == 1) ? ' tm-header-transparent' : '';
?>

<div class="tm-header-wrapper<?php echo esc_attr($header_transparancy); ?>">
	
	<?php get_template_part( 'template-parts/toolbar' ); ?>


	<div class="tm-headerbar uk-clearfix" <?php echo megastar_sticky_header(); ?>>
		<div class="uk-container-center">
			<nav id="tmMainMenu" class="tm-navbar-center">
				<div class="uk-navbar">

					
					<?php get_template_part( 'template-parts/logo-default'); ?>

					
					<div class="tm-offcanvas uk-align-left uk-hidden-large">
						<a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
					</div>

					<?php if (is_active_sidebar('modal')) : ?>
					<div class="tm-modal uk-align-right uk-visible-large">
						<a href="#tm-modal" class="uk-navbar-toggle" data-uk-modal></a>
					</div>
					<?php endif; ?>


					<?php if (get_theme_mod( 'megastar_cart' ) == 'header') : ?>
						<?php get_template_part('template-parts/woocommerce-cart'); ?>
					<?php endif; ?>
					
					<?php get_template_part('template-parts/search-header'); ?>
					
					<div class="tm-nav-wrapper uk-visible-large">
						<?php get_template_part( 'template-parts/menu-primary' ); ?>
					</div>

					<?php get_template_part( 'template-parts/logo-small' ); ?>

				</div>
			</nav>
		</div>
	</div>


	<?php if ($page_progress) : ?>
		<div id="tm-progress-bar"></div>
	<?php endif; ?>

</div>