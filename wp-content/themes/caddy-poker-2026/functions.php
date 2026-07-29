<?php
/**
 * Caddy Poker 2026 theme functions.
 *
 * @package caddy-poker-2026
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

if ( ! defined( 'CADDY_POKER_VERSION' ) ) {
	define( 'CADDY_POKER_VERSION', '1.0.0' );
}

/**
 * Theme setup: title tag, featured images, HTML5 markup, nav menus.
 */
function caddy_poker_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array( 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);
	add_theme_support( 'custom-logo' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'caddy-poker-2026' ),
		)
	);
}
add_action( 'after_setup_theme', 'caddy_poker_setup' );

/**
 * Enqueue styles and scripts. Versioned by file mtime so cache busts on every edit.
 */
function caddy_poker_assets() {
	$theme_dir = get_template_directory();
	$theme_uri = get_template_directory_uri();

	$css_path = $theme_dir . '/assets/css/main.css';
	wp_enqueue_style(
		'caddy-poker-main',
		$theme_uri . '/assets/css/main.css',
		array(),
		file_exists( $css_path ) ? filemtime( $css_path ) : CADDY_POKER_VERSION
	);

	$js_path = $theme_dir . '/assets/js/main.js';
	wp_enqueue_script(
		'caddy-poker-main',
		$theme_uri . '/assets/js/main.js',
		array(),
		file_exists( $js_path ) ? filemtime( $js_path ) : CADDY_POKER_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'caddy_poker_assets' );

/**
 * Helper: URL to a theme image asset.
 *
 * @param string $file File name inside assets/img/.
 * @return string
 */
function caddy_poker_img( $file ) {
	return get_template_directory_uri() . '/assets/img/' . ltrim( $file, '/' );
}

/**
 * Whether the page is being viewed inside the app's in-app browser (?inappwebview=1).
 *
 * When true, templates drop the site chrome (header, footer, page title) so the
 * legal pages read as part of the app rather than as website pages.
 *
 * @return bool
 */
function caddy_poker_is_inappwebview() {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only presentation toggle.
	return isset( $_GET['inappwebview'] ) && '1' === sanitize_text_field( wp_unslash( $_GET['inappwebview'] ) );
}

/**
 * Flag in-app-browser requests on <body> so CSS can adjust.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function caddy_poker_body_class( $classes ) {
	if ( caddy_poker_is_inappwebview() ) {
		$classes[] = 'is-inappwebview';
	}
	return $classes;
}
add_filter( 'body_class', 'caddy_poker_body_class' );

/**
 * Emit the favicon from the theme (so no admin upload is needed on Bluehost).
 */
function caddy_poker_favicon() {
	$icon = get_template_directory() . '/assets/img/favicon.png';
	if ( file_exists( $icon ) && ! has_site_icon() ) {
		printf(
			'<link rel="icon" type="image/png" href="%s">' . "\n",
			esc_url( caddy_poker_img( 'favicon.png' ) )
		);
	}
}
add_action( 'wp_head', 'caddy_poker_favicon' );
