<?php
if (has_nav_menu('toolbar')) {
	$ulclass =  wp_nav_menu( array( 'theme_location' => 'toolbar', 
            'container'      => false,
            'echo'          => false,   
            'menu_id'        => 'toolbar_nav',
            'container_class' => '', 
            'menu_class' => 'list-inline sm-text-center text-left flip mt-5', 'depth' => 1 ) );  
        $primary_menu = new megastar_nav_toolbar_dom($ulclass);
        echo $primary_menu->proccess();
} else {
	echo '<ul class="no-menu uk-hidden-small"><li><a href="'.admin_url('/nav-menus.php').'"><strong>NO MENU ASSIGNED</strong></a></li></ul>';
}