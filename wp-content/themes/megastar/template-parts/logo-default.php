<?php
$megastar_logo_upload = get_theme_mod('megastar_logo_upload');
$logo_width_height    = get_theme_mod('logo_width_height', '');

?>

<?php if (!$megastar_logo_upload) : ?>
<div class="logo-container uk-visible-large">
    <div class="logo-wrapper">
        <a class="tm-logo" href="<?php echo esc_url(home_url('/')); ?>">
			<h1 class="uk-margin-remove"><?php bloginfo( 'name' );?></h1>
		</a>
    </div>
</div>	
<?php else : ?>
<div itemtype="http://schema.org/Organization" itemscope="itemscope" class="logo-container uk-visible-large">
    <div class="logo-wrapper">
        <a class="tm-logo" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url" title="<?php bloginfo( 'name' );?>">
            <img alt="<?php bloginfo( 'name' );?>" src="<?php echo esc_url($megastar_logo_upload); ?>" itemprop="logo" <?php echo wp_kses_post($logo_width_height); ?> />
		</a>
    </div>
</div>							
<?php endif; ?>