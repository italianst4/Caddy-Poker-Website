<?php
/**
 * Site header + opening markup.
 *
 * @package caddy-poker-2026
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php // Swap no-js -> js before paint so scroll-reveal only hides when JS can restore it. ?>
	<script>document.documentElement.className = document.documentElement.className.replace('no-js', 'js');</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php // In the app's in-app browser the site chrome is hidden; the app supplies its own. ?>
<?php if ( ! caddy_poker_is_inappwebview() ) : ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'caddy-poker-2026' ); ?></a>

<header class="site-header" id="site-header">
	<div class="container site-header__inner">
		<a class="site-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<img class="site-header__logo" src="<?php echo esc_url( caddy_poker_img( 'caddypoker-logo.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="120" height="120">
			<span class="site-header__wordmark">Caddy Poker</span>
		</a>

		<nav class="site-nav" aria-label="<?php esc_attr_e( 'Primary', 'caddy-poker-2026' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'site-nav__list',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			} else {
				// Fallback nav before a menu is assigned in WP admin.
				echo '<ul class="site-nav__list">';
				echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'caddy-poker-2026' ) . '</a></li>';
				echo '<li><a href="' . esc_url( home_url( '/#how-to-play' ) ) . '">' . esc_html__( 'How to Play', 'caddy-poker-2026' ) . '</a></li>';
				echo '</ul>';
			}
			?>
		</nav>
	</div>
</header>

<?php endif; ?>

<main id="main" class="site-main">
