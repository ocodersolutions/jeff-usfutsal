<?php get_header(); ?>


<?php 
	$megastar_woocommerce_columns = get_theme_mod('megastar_woocommerce_columns');
	$wooclass = 'product-columns-'.$megastar_woocommerce_columns;

?>

<?php
// Single Products Page
if(is_product()){
	// Get WooCommerce Single Product Layout from Theme Options
	$megastar_woocommerce_single_sidebar = get_theme_mod('megastar_woocommerce_single_sidebar');

	if($megastar_woocommerce_single_sidebar == 'default'){
		$mainlayout = 'uk-width-medium-1-1';
		$sidebarlayout = 'uk-hidden';
	} 
	elseif($megastar_woocommerce_single_sidebar == 'fullwidth'){
		$mainlayout = 'uk-width-medium-1-1';
		$sidebarlayout = 'uk-hidden';
	}
	elseif($megastar_woocommerce_single_sidebar == 'sidebar-left'){
		$mainlayout = 'uk-width-medium-7-10 uk-push-3-10 ';
		$sidebarlayout = 'uk-width-medium-3-10 uk-pull-7-10 uk-row-first';
	}
	elseif($megastar_woocommerce_single_sidebar == 'sidebar-right'){
		$mainlayout = 'uk-width-medium-7-10 uk-row-first';
		$sidebarlayout = 'uk-width-medium-3-10';
	} 
	else{
		$mainlayout = 'uk-width-medium-1-1';
		$sidebarlayout = 'uk-hidden';
	}
	?>

	<div id="page-wrap" class="tm-middle uk-grid" data-uk-grid-margin>
		<div class="tm-main uk-width-medium-1-1">
			<main class="tm-content">

				<?php woocommerce_content(); ?>

			</main> <!-- end main -->
		</div> <!-- end content -->
	</div> <!-- end page-wrap -->
		
	<?php

	// Main Shop Layout
	} else {

		// Get WooCommerce Layout from Theme Options
		$megastar_woocommerce_sidebar = get_theme_mod('megastar_woocommerce_sidebar', 'sidebar-left');

		if($megastar_woocommerce_sidebar == 'default'){
			$mainlayout = 'uk-width-medium-1-1';
			$sidebarlayout = 'uk-hidden';
		} 
		elseif($megastar_woocommerce_sidebar == 'fullwidth'){
			$mainlayout = 'uk-width-medium-1-1';
			$sidebarlayout = 'uk-hidden';
		}
		elseif($megastar_woocommerce_sidebar == 'sidebar-left'){
			$mainlayout = 'uk-width-medium-7-10 uk-push-3-10 ';
			$sidebarlayout = 'uk-width-medium-3-10 uk-pull-7-10 uk-row-first';
		}
		elseif($megastar_woocommerce_sidebar == 'sidebar-right'){
			$mainlayout = 'uk-width-medium-7-10 uk-row-first';
			$sidebarlayout = 'uk-width-medium-3-10';
		} 
		else{
			$mainlayout = 'uk-width-medium-1-1';
			$sidebarlayout = 'uk-hidden';
		}
		?>

		<div id="page-wrap" class="tm-middle uk-grid" <?php echo ($megastar_woocommerce_sidebar == 'sidebar-left' or $megastar_woocommerce_sidebar == 'sidebar-right') ? 'data-uk-grid-match' : ''; ?> data-uk-grid-margin>

			<div class="tm-main <?php echo esc_attr($mainlayout); ?>">
				<main class="tm-content <?php echo esc_attr($wooclass); ?>">
					<?php woocommerce_content(); ?>
				
				</main> <!-- end main -->
			</div> <!-- end content -->

			<?php if($megastar_woocommerce_sidebar == 'sidebar-left' || $megastar_woocommerce_sidebar == 'sidebar-right'){ ?>
				<aside class="tm-sidebar <?php echo esc_attr($megastar_woocommerce_sidebar); ?> <?php echo esc_attr($sidebarlayout); ?>">
					<?php if(is_woocommerce()) {
						/* WooCommerce Sidebar */
						if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('shop-widgets') );
					} ?>
				</aside> <!-- end aside -->
			<?php } ?>

		</div> <!-- end page-wrap -->		

	<?php } // end-if main shop layout ?>
	
<?php get_footer(); ?>