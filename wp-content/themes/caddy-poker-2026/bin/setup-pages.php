<?php
/**
 * One-shot setup for the Caddy Poker 2026 site.
 *
 * Run with WP-CLI:
 *   wp eval-file wp-content/themes/caddy-poker-2026/bin/setup-pages.php
 * or, in this repo, simply:
 *   npm run setup   (starts wp-env then runs this file)
 *
 * It is idempotent — safe to run more than once.
 *
 * - Activates the Caddy Poker 2026 theme.
 * - Creates a "Home" page (static front page) and a "How to Play" page.
 * - Builds a primary nav menu (Home, How to Play) and assigns it.
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return; // Only meant to run under WP-CLI.
}

// 1. Activate the theme.
switch_theme( 'caddy-poker-2026' );
WP_CLI::log( 'Activated theme: caddy-poker-2026' );

/**
 * Create a page if one with the slug doesn't exist; return its ID.
 */
function cp_ensure_page( $title, $slug, $template = '' ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		WP_CLI::log( "Page '{$slug}' already exists (ID {$existing->ID})." );
		return $existing->ID;
	}
	$id = wp_insert_post(
		array(
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		)
	);
	if ( $template ) {
		update_post_meta( $id, '_wp_page_template', $template );
	}
	WP_CLI::log( "Created page '{$slug}' (ID {$id})." );
	return $id;
}

// 2. Pages. The site is a single page — the How to Play video lives on the front page.
$home_id = cp_ensure_page( 'Home', 'home' );

// Clean up the old standalone "How to Play" page if a previous setup created it.
$old_how = get_page_by_path( 'how-to-play' );
if ( $old_how ) {
	wp_delete_post( $old_how->ID, true );
	WP_CLI::log( 'Removed legacy How to Play page.' );
}

// Legal pages — content lives in their page templates; these are empty shells
// with the matching slugs so page-privacy-policy.php / page-terms-of-service.php apply.
cp_ensure_page( 'Privacy Policy', 'privacy-policy', 'page-privacy-policy.php' );
cp_ensure_page( 'Terms of Service', 'terms-of-service', 'page-terms-of-service.php' );

// Normalize the legal pages: WordPress ships a "Privacy Policy" draft with
// boilerplate content. Force them published and empty so the template is the
// single source of truth.
foreach ( array( 'privacy-policy', 'terms-of-service' ) as $cp_slug ) {
	$cp_p = get_page_by_path( $cp_slug );
	if ( $cp_p ) {
		wp_update_post(
			array(
				'ID'           => $cp_p->ID,
				'post_status'  => 'publish',
				'post_content' => '',
			)
		);
		update_post_meta( $cp_p->ID, '_wp_page_template', 'page-' . $cp_slug . '.php' );
		WP_CLI::log( "Normalized '{$cp_slug}' (published, template applied)." );
	}
}

// 3. Static front page.
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $home_id );
WP_CLI::log( 'Set static front page to Home.' );

// 4. Primary nav menu.
$menu_name = 'Primary';
$menu      = wp_get_nav_menu_object( $menu_name );
if ( ! $menu ) {
	$menu_id = wp_create_nav_menu( $menu_name );
	WP_CLI::log( "Created menu '{$menu_name}'." );
} else {
	$menu_id = $menu->term_id;
}

// Only add items if the menu is empty (keeps this idempotent).
if ( empty( wp_get_nav_menu_items( $menu_id ) ) ) {
	wp_update_nav_menu_item(
		$menu_id,
		0,
		array(
			'menu-item-title'     => 'Home',
			'menu-item-object'    => 'page',
			'menu-item-object-id' => $home_id,
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
		)
	);
	wp_update_nav_menu_item(
		$menu_id,
		0,
		array(
			'menu-item-title'  => 'How to Play',
			'menu-item-url'    => home_url( '/#how-to-play' ),
			'menu-item-type'   => 'custom',
			'menu-item-status' => 'publish',
		)
	);
	WP_CLI::log( 'Added Home and How to Play (anchor) to the menu.' );
}

// 5. Assign the menu to the theme's "primary" location.
$locations            = get_theme_mod( 'nav_menu_locations', array() );
$locations['primary'] = $menu_id;
set_theme_mod( 'nav_menu_locations', $locations );
WP_CLI::log( 'Assigned menu to the primary location.' );

// 6. Pretty permalinks. Hard flush regenerates rewrite rules (and .htaccess on
// Apache), which a soft flush would skip.
update_option( 'permalink_structure', '/%postname%/' );
if ( function_exists( 'flush_rewrite_rules' ) ) {
	flush_rewrite_rules( true );
}

WP_CLI::success( 'Caddy Poker 2026 site setup complete.' );
