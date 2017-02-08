<?php
$megastar_logo_upload = get_theme_mod('megastar_logo_upload');
$logo_width_height = get_theme_mod('logo_width_height', '');
?>

<a class="menuzord-brand stylish-header pull-left flip"  href="<?php echo esc_url(home_url('/')); ?>" > 

<?php if (!$megastar_logo_upload) : ?>
    
                <span><?php bloginfo('name'); ?></span>
  	
<?php else : ?>
    <img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($megastar_logo_upload); ?>" itemprop="logo" <?php echo wp_kses_post($logo_width_height); ?> />
 							
<?php endif; ?>
</a>