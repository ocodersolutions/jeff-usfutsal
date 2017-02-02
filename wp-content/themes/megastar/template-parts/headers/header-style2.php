<?php
/**
* @package   megastar
* @author    bdthemes http://www.bdthemes.com
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

$header_fullwidth     = get_theme_mod('megastar_header_fullwidth');
$page_progress        = get_theme_mod('megastar_page_progress');

?>

<div class="tm-header-wrapper">
	
	<?php get_template_part( 'template-parts/toolbar' ); ?>

	<div class="tm-headerbar uk-clearfix" <?php echo megastar_sticky_header(); ?>>
		<div class="<?php echo ($header_fullwidth) ? '' : 'uk-container '; ?>uk-container-center uk-visible-large uk-flex uk-flex-middle">

			<?php get_template_part( 'template-parts/logo-default'); ?>

			<?php if (is_active_sidebar('modal')) : ?>
			<div class="tm-modal uk-align-right uk-visible-large">
				<a href="#tm-modal" class="uk-navbar-toggle" data-uk-modal></a>
			</div>
			<?php endif; ?>
			
			<?php
				if (is_active_sidebar('headerbar')) {
					echo '<div class="headerbar-widgets uk-float-right">';
						dynamic_sidebar('headerbar');
					echo '</div>';
				}
			?>
		</div>

		<div class="menu-wrapper uk-clearfix ">
			<div class="<?php echo ($header_fullwidth) ? '' : 'uk-container '; ?>uk-container-center">
				<nav id="tmMainMenu" class="tm-navbar-full">
					<div class="uk-navbar">

						<div class="uk-align-left uk-margin-bottom-remove uk-visible-large">
							<?php get_template_part( 'template-parts/menu-primary' ); ?>
						</div>


						<?php get_template_part( 'template-parts/logo-small' ); ?>

						<div class="tm-offcanvas uk-align-right uk-hidden-large">
							<a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
						</div>

						<?php get_template_part('template-parts/search-header'); ?>

						<?php if (get_theme_mod( 'megastar_cart' ) == 'header') : ?>
							<?php get_template_part('template-parts/woocommerce-cart'); ?>
						<?php endif; ?>

					</div>



				</nav>
			</div>
		</div>
	</div>

	<?php if ($page_progress) : ?>
		<div id="tm-progress-bar"></div>
	<?php endif; ?>

</div>