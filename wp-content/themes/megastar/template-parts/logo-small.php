<?php
$megastar_logo_upload       = get_theme_mod('megastar_logo_upload');
$megastar_logo_small_upload = get_theme_mod('megastar_logo_small_upload');
$megastar_header_style      = (get_theme_mod('megastar_header_style', 'default') !='style3') ? 'uk-align-left' : '';

?>

<?php if ($megastar_logo_upload or $megastar_logo_small_upload) : ?>
<div itemtype="http://schema.org/Organization" itemscope="itemscope" class="logo-container uk-align-left uk-margin-remove uk-hidden-large">
    <div class="logo-small-wrapper">
        <a class="tm-logo" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url" title="<?php bloginfo( 'name' );?>">
        	<?php if ($megastar_logo_small_upload) : ?>
            <img alt="<?php bloginfo( 'name' );?>" src="<?php echo esc_url($megastar_logo_small_upload); ?>" itemprop="logo"  />
            <?php else : ?>
			<img alt="<?php bloginfo( 'name' );?>" src="<?php echo esc_url($megastar_logo_upload); ?>" itemprop="logo" />
			<?php endif; ?>
			
		</a>
    </div>
</div>
<?php else : ?>
<div class="logo-small-container uk-align-left uk-margin-remove uk-hidden-large">
    <div class="logo-wrapper">
        <a class="tm-logo" href="<?php echo esc_url(home_url('/')); ?>">
			<?php bloginfo( 'name' );?>
		</a>
    </div>
</div>						
<?php endif; ?>