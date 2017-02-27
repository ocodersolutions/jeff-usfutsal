<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package megastar
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site layout-<?php echo get_theme_mod('megastar_global_layout', 'full'); ?>-wrapper">
	
	<?php get_template_part('template-parts/drawer');	?>	

	<?php
		$page_header_override = get_post_meta( get_the_ID(), 'megastar_header_style', true); 
		$megastar_header_style = ( !empty($page_header_override) ) ? get_post_meta( get_the_ID(), 'megastar_header_style', true) : get_theme_mod('megastar_header_style', 'default');
		get_template_part('template-parts/headers/header-'.$megastar_header_style);

	?>

	
	<?php if (!is_front_page() and !is_page_template( 'page-homepage.php' )) : ?>
			<?php get_template_part('template-parts/titlebar');	?>
	<?php endif; ?>	
	
	<?php get_template_part('template-parts/slider');	?>	

	<div id="content" class="site-content ">

		<div class="mainbody-wrapper" id="tmMainBody">
			
