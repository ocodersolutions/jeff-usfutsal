<?php 
$megastar_header_search = get_post_meta( get_the_ID(), 'megastar_header_search', true );
$megastar_header_search = (!empty($megastar_header_search)) ? get_post_meta( get_the_ID(), 'megastar_header_search', true ) : get_theme_mod( 'megastar_header_search', 1);
?>

<?php if ($megastar_header_search) : ?>
	<div class="tm-search uk-align-right uk-visible-large">
		<div class="uk-navbar-content ">
			<?php $id = uniqid('search-'); ?>

				<form class="uk-search" id="<?php echo esc_attr($id); ?>" action="<?php echo home_url( '/' ); ?>" method="get" data-uk-search="{'source': '<?php echo site_url('wp-admin'); ?>/admin-ajax.php?action=megastar_search', 'param': 's', 'msgResultsHeader': '<?php esc_html_e("Search Results", 'megastar'); ?>', 'msgMoreResults': '<?php esc_html_e("More Results", 'megastar'); ?>', 'msgNoResults': '<?php esc_html_e("No results found", 'megastar'); ?>', flipDropdown: 1}">
				    <input class="uk-search-field" type="text" value="" name="s" placeholder="<?php esc_html_e('search...', 'megastar'); ?>">
				    
				</form>
		</div>
	</div>
<?php endif; ?>