<?php 

function megastar_widgets_init() {
	
	// Blog Widgets
	register_sidebar(array( 'name' => esc_html__('Blog Widgets','megastar' ), 'id' => 'blog-widgets', 'description' => esc_html__( 'These are widgets for the Blog sidebar.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));

	// Search Results Widgets
	register_sidebar(array( 'name' => esc_html__('Search Results Widgets','megastar' ), 'id' => 'search-results-widgets', 'description' => esc_html__( 'These are widgets for the Search Results sidebar. These sidebar widgets show on right side.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	
	// Footer Widgets
	$footercolumns = (get_theme_mod('megastar_footer_columns')) ? get_theme_mod('megastar_footer_columns') : '3';

	register_sidebar(array( 'name' => esc_html__('Footer Widgets 1','megastar' ), 'id' => 'footer-widgets', 'description' => esc_html__( 'These are widgets for the Footer. You can control them from Appearance &rarr; Customize &rarr; Footer &rarr; Footer Columns.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	
	if($footercolumns == '2' || $footercolumns == '3' || $footercolumns == '4'){
		register_sidebar(array( 'name' => esc_html__('Footer Widgets 2','megastar' ), 'id' => 'footer-widgets-2', 'description' => esc_html__( 'These are widgets for the Footer. You can control them from Appearance &rarr; Customize &rarr; Footer &rarr; Footer Columns.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}
	if($footercolumns == '3' || $footercolumns == '4'){
		register_sidebar(array( 'name' => esc_html__('Footer Widgets 3','megastar' ), 'id' => 'footer-widgets-3', 'description' => esc_html__( 'These are widgets for the Footer. You can control them from Appearance &rarr; Customize &rarr; Footer &rarr; Footer Columns.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}
	if($footercolumns == '4'){
		register_sidebar(array( 'name' => esc_html__('Footer Widgets 4','megastar' ), 'id' => 'footer-widgets-4', 'description' => esc_html__( 'These are widgets for the Footer. You can control them from Appearance &rarr; Customize &rarr; Footer &rarr; Footer Columns.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}

	register_sidebar(array( 'name' => esc_html__('Header Bar','megastar' ), 'id' => 'headerbar', 'description' => esc_html__( 'These are widgets for showing widgets (such as countdown, search small ads etc) on header top right corner, but only for header style 2.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3 class="uk-hidden">', 'after_title' => '</h3>' ));

	register_sidebar(array( 'name' => esc_html__('Off-canvas','megastar' ), 'id' => 'offcanvas', 'description' => esc_html__( 'These are widgets for off-canvas bar (it\'s only show in small device mode) and it\'s show under off-canvas menu.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));

	register_sidebar(array( 'name' => esc_html__('Drawer','megastar' ), 'id' => 'drawer', 'description' => esc_html__( 'These are widgets for show widgets like as drawer on top of the page.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="uk-panel-title">', 'after_title' => '</h3>' ));

	register_sidebar(array( 'name' => esc_html__('Fixed Left','megastar' ), 'id' => 'fixed-left', 'description' => esc_html__( 'These are widgets for show widgets in fixed left position of the page.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="uk-hidden">', 'after_title' => '</h3>' ));

	register_sidebar(array( 'name' => esc_html__('Fixed Right','megastar' ), 'id' => 'fixed-right', 'description' => esc_html__( 'These are widgets for show widgets in fixed right position of the page.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="uk-hidden">', 'after_title' => '</h3>' ));
	

	// The Event Calender Widgets
	if (class_exists('Tribe__Events__Main')){
		register_sidebar(array( 'name' => esc_html__('The Events Calender Widgets','megastar' ), 'id' => 'event-calender', 'description' => esc_html__( 'These are widgets for the events calender sidebar.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}

   	// WooCommerce Widgets
	if (class_exists('Woocommerce')){
		register_sidebar(array( 'name' => esc_html__('Shop Widgets','megastar' ), 'id' => 'shop-widgets', 'description' => esc_html__( 'These are widgets for the Shop sidebar.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}

	// BBPress Widgets
	if (class_exists('bbPress')){
		register_sidebar(array( 'name' => esc_html__('Forum Widgets','megastar' ), 'id' => 'forum-widgets', 'description' => esc_html__( 'These are widgets for the Forum sidebar.','megastar' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="uk-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}

}
   	
add_action( 'widgets_init', 'megastar_widgets_init' );


function megastar_drawer_widgets_params($params) {

    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'drawer' ) {

        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);

        $params[0]['before_widget'] = str_replace('class="widget', 'class="widget uk-width-medium-1-' . $sidebar_widgets . ' ', $params[0]['before_widget']);
    }

    return $params;
}
add_filter('dynamic_sidebar_params','megastar_drawer_widgets_params');



function megastar_widget_visiblity_form($t,$return,$instance){
    $instance = wp_parse_args( (array) $instance, array( 'large' => 0, 'medium' => 0, 'small' => 0) );
    ?>
    <ul class="megastar-visiblity-control" title="<?php echo esc_html_x('Set visiblity setting from here.', 'backend', 'megastar'); ?>">
	    <li class="display-large-field">
	    	<label for="<?php echo esc_attr($t->get_field_id('large')); ?>">
		        <input id="<?php echo esc_attr($t->get_field_id('large')); ?>" name="<?php echo esc_attr($t->get_field_name('large')); ?>" type="checkbox" <?php checked(isset($instance['large']) ? $instance['large'] : 0); ?> />
		        <i class="dashicons display-large"></i>
		        <?php echo esc_html_x('Large', 'backend', 'megastar'); ?>
	        </label>
	    </li>
	    <li class="display-medium-field">
	    	<label for="<?php echo esc_attr($t->get_field_id('medium')); ?>">
		        <input id="<?php echo esc_attr($t->get_field_id('medium')); ?>" name="<?php echo esc_attr($t->get_field_name('medium')); ?>" type="checkbox" <?php checked(isset($instance['medium']) ? $instance['medium'] : 0); ?> />
		        <i class="dashicons display-medium"></i>
		        <?php echo esc_html_x('Medium', 'backend', 'megastar'); ?>
	        </label>
	    </li>

	    <li class="display-small-field">
	    	<label for="<?php echo esc_attr($t->get_field_id('small')); ?>">
		        <input id="<?php echo esc_attr($t->get_field_id('small')); ?>" name="<?php echo esc_attr($t->get_field_name('small')); ?>" type="checkbox" <?php checked(isset($instance['small']) ? $instance['small'] : 0); ?> />
		        <i class="dashicons display-small"></i>
		        <?php echo esc_html_x('Small', 'backend', 'megastar'); ?>
	        </label>
	    </li>
    </ul>

    <?php
    $retrun = null;
    return array($t,$return,$instance);
}


function megastar_widget_visiblity_form_update($instance, $new_instance, $old_instance){
    $instance['large'] = isset($new_instance['large']);
    $instance['medium'] = isset($new_instance['medium']);
    $instance['small'] = isset($new_instance['small']);
    return $instance;
}

function megastar_widget_visiblity_params($params){
    global $wp_registered_widgets;
    $widget_id = $params[0]['widget_id'];
    $widget_obj = $wp_registered_widgets[$widget_id];
    $widget_opt = get_option($widget_obj['callback'][0]->option_name);
    $widget_num = $widget_obj['params'][0]['number'];

    if (isset($widget_opt[$widget_num]['large']) and $widget_opt[$widget_num]['large'] == 1){
        $display[] = 'uk-hidden-large';
    } 
    if (isset($widget_opt[$widget_num]['medium']) and $widget_opt[$widget_num]['medium'] == 1){
        $display[] = 'uk-hidden-medium';
    }
    if (isset($widget_opt[$widget_num]['small']) and $widget_opt[$widget_num]['small'] == 1){
        $display[] = 'uk-hidden-small';
    } else {
    	$display[] = '';
    }
    
    if ($display != null) {
	    $display = implode(' ', $display);
	    $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$display.' ',  $params[0]['before_widget'], 1);
    	return $params;
    } else {
    	return null;
    }
}

//Add input fields(priority 5, 3 parameters)
add_action('in_widget_form', 'megastar_widget_visiblity_form',5,3);

//Callback function for options update (priority 5, 3 parameters)
add_filter('widget_update_callback', 'megastar_widget_visiblity_form_update',5,3);

//add class names (default priority, one parameter)
add_filter('dynamic_sidebar_params', 'megastar_widget_visiblity_params');