<?php

$offcanvas_align = (get_theme_mod('megastar_offcanvas_align', 1)) ? 'uk-offcanvas-bar-flip' : '';

?>

<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar <?php echo esc_attr($offcanvas_align); ?>">
		

		<?php get_template_part('template-parts/offcanvas-search');	?>

        <?php 
			if(has_nav_menu('primary') and !has_nav_menu('offcanvas')) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_id'        => 'nav-offcanvas',
					'menu_class'     => 'uk-nav uk-nav-offcanvas',
					'echo'           => true,
					'before'         => '',
					'after'          => '',
					'link_before'    => '',
					'link_after'     => '',
					'depth'          => 0,
					)
				); 
			}
			elseif(has_nav_menu('offcanvas')) {
				wp_nav_menu( array(
					'theme_location' => 'offcanvas',
					'container'      => false,
					'menu_id'        => 'nav-offcanvas',
					'menu_class'     => 'uk-nav uk-nav-offcanvas',
					'echo'           => true,
					'before'         => '',
					'after'          => '',
					'link_before'    => '',
					'link_after'     => '',
					'depth'          => 0,
					)
				); 
			}
			else {
				echo '<div class="uk-panel"><div class="panel-content"><div class="uk-alert uk-alert-warning uk-margin-bottom-remove"><strong>NO MENU ASSIGNED</strong> <span>Go To Appearance > <a class="uk-link" href="'.admin_url('/nav-menus.php').'">Menus</a> and create a Menu</span></div></div></div>';
			}

			if (is_active_sidebar('offcanvas')) {
				echo '<hr class="uk-article-divider">';
				echo '<div class="offcanvas-widgets">';
				dynamic_sidebar('offcanvas');
				echo '</div>';
			}

		?>


    </div>
</div>
