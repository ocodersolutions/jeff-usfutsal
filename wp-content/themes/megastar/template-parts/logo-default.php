<?php
$megastar_logo_upload = get_theme_mod('megastar_logo_upload');
$logo_width_height = get_theme_mod('logo_width_height', '');
?>

<?php if (!$megastar_logo_upload) : ?>
    <a class="menuzord-brand stylish-header font-30 text-white pull-left flip"  href="<?php echo get_home_url(); ?>" > 
        <span><?php bloginfo('name'); ?></span>
  	</a>
<?php else : ?>
	<a class="menuzord-brand stylish-header font-30 text-white pull-left flip"  href="<?php echo get_home_url(); ?>" > 
        <span><?php bloginfo('name'); ?></span></a>
    <div class="flag logo_flag">
    	<a class=""  href="<?php echo get_home_url(); ?>" > 
    		<img class="img-responsive" alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($megastar_logo_upload); ?>" itemprop="logo" <?php echo wp_kses_post($logo_width_height); ?> />
    	</a>
    </div>
<?php endif; ?>
