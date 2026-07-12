<?php
/**
 * Front page — Caddy Poker app landing.
 *
 * Sections: hero, coming-soon store placeholders, how-it-works features,
 * card-deck showcase. The footer (credit + physical-game link) is in footer.php.
 *
 * @package caddy-poker-2026
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Cache-bust the video + poster by file mtime so a re-exported file (same name)
// is always fetched fresh instead of served from a stale browser/CDN cache.
$video_path  = get_template_directory() . '/assets/video/caddypoker-how-to-play.mp4';
$poster_path = get_template_directory() . '/assets/img/how-to-play-poster.jpg';
$video_url   = get_template_directory_uri() . '/assets/video/caddypoker-how-to-play.mp4';
$poster_url  = caddy_poker_img( 'how-to-play-poster.jpg' );
if ( file_exists( $video_path ) ) {
	$video_url = add_query_arg( 'v', filemtime( $video_path ), $video_url );
}
if ( file_exists( $poster_path ) ) {
	$poster_url = add_query_arg( 'v', filemtime( $poster_path ), $poster_url );
}
?>

<!-- ============================ HERO ============================ -->
<section class="hero">
	<div class="hero__bg" style="background-image:url('<?php echo esc_url( caddy_poker_img( 'cp-landscaping.png' ) ); ?>');" aria-hidden="true"></div>
	<img class="hero__cloud hero__cloud--1" src="<?php echo esc_url( caddy_poker_img( 'cloud-1.png' ) ); ?>" alt="" aria-hidden="true">
	<img class="hero__cloud hero__cloud--2" src="<?php echo esc_url( caddy_poker_img( 'cloud-2.png' ) ); ?>" alt="" aria-hidden="true">

	<div class="container hero__inner">
		<img class="hero__logo" src="<?php echo esc_url( caddy_poker_img( 'caddypoker-logo.png' ) ); ?>" alt="Caddy Poker" width="340" height="340">
		<p class="hero__tagline">Play Golf. Play Poker. Play Both.</p>
		<p class="hero__sub">
			Draw challenge cards as you play, earn poker cards for every hole you conquer, and build the best five-card hand on the course.
		</p>

		<!-- ================= COMING SOON PLACEHOLDERS ================= -->
		<div class="store-badges" id="get-the-app">
			<?php
			/*
			 * TODO: When the app ships, make each badge a link and drop its "Coming Soon"
			 * chip — change <span class="store-badge"> to
			 * <a class="store-badge" href="https://apps.apple.com/app/idXXXXXXXXX">.
			 * The [href] CSS rule lifts them on hover.
			 */
			?>
			<span class="store-badge" data-store="ios" role="img" aria-label="Caddy Poker for iOS — coming soon">
				<span class="store-badge__tag">Coming Soon</span>
				<img class="store-badge__img" src="<?php echo esc_url( caddy_poker_img( 'app-store.png' ) ); ?>" alt="Download on the App Store" width="174" height="58">
			</span>

			<span class="store-badge" data-store="android" role="img" aria-label="Caddy Poker for Android — coming soon">
				<span class="store-badge__tag">Coming Soon</span>
				<img class="store-badge__img" src="<?php echo esc_url( caddy_poker_img( 'google-play.png' ) ); ?>" alt="Get it on Google Play" width="174" height="58">
			</span>
		</div>
	</div>

	<!-- Course ground: pinned to the bottom of the hero (bottom of the first
	     viewport), scrolls up with the hero as the user scrolls down. -->
	<div class="ground" aria-hidden="true">
		<img class="ground__hazard ground__hazard--ball" src="<?php echo esc_url( caddy_poker_img( 'ball-on-tee.png' ) ); ?>" alt="" loading="lazy">
		<img class="ground__hazard ground__hazard--sand" src="<?php echo esc_url( caddy_poker_img( 'sand-trap.png' ) ); ?>" alt="" loading="lazy">
		<img class="ground__hazard ground__hazard--water"
			src="<?php echo esc_url( caddy_poker_img( 'water-hazard.png' ) ); ?>"
			data-frame1="<?php echo esc_url( caddy_poker_img( 'water-hazard.png' ) ); ?>"
			data-frame2="<?php echo esc_url( caddy_poker_img( 'water-hazard-2.png' ) ); ?>"
			alt="" loading="lazy">
	</div>
</section>

<!-- ========================= HOW TO PLAY (VIDEO) ========================= -->
<section class="section section--elevated section--center" id="how-to-play">
	<div class="container">
		<span class="eyebrow">How to play</span>
		<h2>It&rsquo;s anyone&rsquo;s game to lose!</h2>
		<p class="lead">You don&rsquo;t need a scratch handicap to take the pot &mdash; just the right cards at the right hole. See how it works.</p>

		<div class="video-wrap" style="margin-top: var(--sp-2xl);">
			<video
				controls
				playsinline
				preload="metadata"
				poster="<?php echo esc_url( $poster_url ); ?>">
				<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
				Your browser doesn&rsquo;t support embedded video.
				<a href="<?php echo esc_url( $video_url ); ?>">Download the how-to-play video</a>.
			</video>
		</div>
	</div>
</section>

<!-- ========================= DECK SHOWCASE ========================= -->
<section class="section section--center">
	<div class="container">
		<span class="eyebrow">The deck</span>
		<h2>Every card is a little golf story.</h2>
		<p class="lead">Hole challenges earn poker cards. Use a PokerCaddy to strengthen your hand. Best poker hand wins!</p>

		<div class="deck reveal">
			<img class="deck__card" src="<?php echo esc_url( caddy_poker_img( 'card-find-it.png' ) ); ?>" alt="Find It challenge card" loading="lazy">
			<img class="deck__card" src="<?php echo esc_url( caddy_poker_img( 'card-split-the-fairway.png' ) ); ?>" alt="Split the Fairway challenge card" loading="lazy">
			<img class="deck__card" src="<?php echo esc_url( caddy_poker_img( 'card-make-par.png' ) ); ?>" alt="Make Par challenge card" loading="lazy">
			<img class="deck__card" src="<?php echo esc_url( caddy_poker_img( 'card-closest-to-the-pin.png' ) ); ?>" alt="Closest to the Pin matchup card" loading="lazy">
			<img class="deck__card" src="<?php echo esc_url( caddy_poker_img( 'card-birdie-hunter.png' ) ); ?>" alt="Birdie Hunter pro challenge card" loading="lazy">
			<img class="deck__card" src="<?php echo esc_url( caddy_poker_img( 'card-pocket-aces.png' ) ); ?>" alt="Pocket Aces caddy card" loading="lazy">
		</div>
	</div>
</section>

<?php
get_footer();
