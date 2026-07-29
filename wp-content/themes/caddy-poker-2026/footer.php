<?php
/**
 * Site footer + closing markup.
 *
 * @package caddy-poker-2026
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- #main -->

<?php // In the app's in-app browser the site chrome is hidden; the app supplies its own. ?>
<?php if ( ! caddy_poker_is_inappwebview() ) : ?>

<footer class="site-footer">
	<div class="container site-footer__inner">
		<p class="site-footer__tagline">Play Golf. Play Poker. Play Both.</p>

		<?php
		$cp_privacy = get_page_by_path( 'privacy-policy' );
		$cp_terms   = get_page_by_path( 'terms-of-service' );
		$cp_privacy_url = $cp_privacy ? get_permalink( $cp_privacy ) : home_url( '/privacy-policy/' );
		$cp_terms_url   = $cp_terms ? get_permalink( $cp_terms ) : home_url( '/terms-of-service/' );
		?>
		<nav class="site-footer__legalnav" aria-label="<?php esc_attr_e( 'Legal', 'caddy-poker-2026' ); ?>">
			<a href="<?php echo esc_url( $cp_privacy_url ); ?>"><?php esc_html_e( 'Privacy Policy', 'caddy-poker-2026' ); ?></a>
			<span aria-hidden="true">&middot;</span>
			<a href="<?php echo esc_url( $cp_terms_url ); ?>"><?php esc_html_e( 'Terms of Service', 'caddy-poker-2026' ); ?></a>
		</nav>

		<p class="site-footer__credit">a montalbano amusement</p>
		<p class="site-footer__legal">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Caddy Poker. All rights reserved.</p>
	</div>
</footer>

<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
