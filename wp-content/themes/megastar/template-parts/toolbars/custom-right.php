<?php 

if( get_theme_mod('megastar_toolbar_right_custom') ) {
	
	echo wp_kses_post(get_theme_mod('megastar_toolbar_right_custom'));

}
