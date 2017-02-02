<?php 
$offcanvas_search = get_theme_mod('megastar_offcanvas_search', 1);
?>

<?php if ($offcanvas_search) : ?>
	<div class="uk-panel offcanvas-search">
		<div class="panel-content">
			<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="searchform uk-form">
					<div class="uk-form-icon">
				    	<i class="uk-icon-search"></i>
				    	<input type="text" name="s" placeholder="<?php esc_html_e('Search...', 'megastar') ?>" autocomplete="off" class="uk-form-width-large uk-form-large" />
				    	</div>
					<input type="submit" value="<?php esc_html_e('Search', 'megastar') ?>" class="uk-hidden" />
			</form>
		</div>
	</div>
<?php endif; ?>