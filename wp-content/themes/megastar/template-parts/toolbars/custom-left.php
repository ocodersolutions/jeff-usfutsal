<?php 

if( get_theme_mod('megastar_toolbar_left_custom') ) {
	
	echo wp_kses_post(get_theme_mod('megastar_toolbar_left_custom'));

}