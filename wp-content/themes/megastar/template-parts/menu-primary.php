<?php
$megastar_main_menu = get_theme_mod('megastar_menu_show', true);

if ($megastar_main_menu) {

	if(has_nav_menu('primary')) {
		$navbar = wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_id'        => 'nav',
			'menu_class'     => 'menuzord-menu menuzord-right menuzord-indented scrollable',
			'echo'           => false,
			'before'         => '',
			'after'          => '',
			'link_before'    => '',
			'link_after'     => '',
			'depth'          => 0,
			'parent_id'      => 'tmMainMenu',
			)
		);

//		$primary_menu = new megastar_nav_dom($navbar);
		echo $navbar;
	} else {
		echo '<ul class="no-menu uk-hidden-small"><li><a href="'.admin_url('/nav-menus.php').'"><strong>NO MENU ASSIGNED</strong> <span>Go To Appearance > Menus and create a Menu</span></a></li></ul>';
	} 
}