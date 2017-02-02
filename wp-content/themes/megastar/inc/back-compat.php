<?php

/**
 * Prevent switching to Megastar on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Megastar 1.0
 */
function megastar_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'megastar_upgrade_notice' );
}
add_action( 'after_switch_theme', 'megastar_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Megastar on WordPress versions prior to 4.4.
 *
 * @since Megastar 1.0
 *
 * @global string $wp_version WordPress version.
 */
function megastar_upgrade_notice() {
	$message = sprintf( esc_html__( 'Megastar requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'megastar' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Megastar 1.0
 *
 * @global string $wp_version WordPress version.
 */
function megastar_customize() {
	wp_die( sprintf( esc_html__( 'Megastar requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'megastar' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'megastar_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Megastar 1.0
 *
 * @global string $wp_version WordPress version.
 */
function megastar_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Megastar requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'megastar' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'megastar_preview' );
