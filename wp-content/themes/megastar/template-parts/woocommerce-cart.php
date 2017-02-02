<?php if (class_exists('Woocommerce')) { 

	$megastar_cart = get_theme_mod('megastar_cart');

	if($megastar_cart !== 'no') { 
	global $woocommerce; 
	$megastar_wcrtl = (is_rtl()) ? 'left' : 'right';
	?>
	
	<div class="tm-cart-popup" data-uk-dropdown="{pos:'bottom-<?php echo esc_attr( $megastar_wcrtl); ?>'}">
		<div class="uk-navbar-content">
			<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" id="shopping-btn" class="tm-shopping-cart" title="<?php esc_html_e('View Cart', 'megastar'); ?>">
				<i class="uk-icon-shopping-basket"></i>
					<?php
						$product_bumber = $woocommerce->cart->cart_contents_count; 
						if ($megastar_cart == 'header') {
							if ( sizeof( $woocommerce->cart->cart_contents ) != 0 ) {
								echo '<span>'.esc_html($product_bumber).'</span>';
							} 
							
						}
						if ($megastar_cart == 'toolbar') {
							echo '<div class="uk-hidden-small uk-display-inline">';
							if ( sizeof( $woocommerce->cart->cart_contents ) == 0 ) {
								esc_html_e('Cart is Empty', 'megastar');
							} else {
								echo sprintf( _n( '%s Item in cart', '%s Items in cart', $product_bumber, 'megastar' ), $product_bumber );
							}
							echo '</div>';
						} 
					?>
			</a>
		</div>

		<?php if ( sizeof( $woocommerce->cart->cart_contents ) != 0 and !is_checkout() and !is_cart()) : ?>
			<div class="uk-dropdown uk-dropdown-navbar uk-visible-large">
				<?php if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) { the_widget( 'WC_Widget_Cart', '' ); } ?>
			</div>
		<?php endif; ?>

	</div>
	<?php }
} ?>