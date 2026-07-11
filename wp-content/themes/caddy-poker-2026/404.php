<?php
/**
 * 404 template.
 *
 * @package caddy-poker-2026
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="section section--center">
	<div class="container container--narrow">
		<h1 class="entry__title">Out of Bounds</h1>
		<p>That page hooked into the trees. Let&rsquo;s get you back on the fairway.</p>
		<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a></p>
	</div>
</section>

<?php
get_footer();
