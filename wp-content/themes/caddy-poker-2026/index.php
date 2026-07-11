<?php
/**
 * Generic fallback template. The marketing site is driven by front-page.php and
 * page-how-to-play.php; this renders any other page/post simply and on-brand.
 *
 * @package caddy-poker-2026
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="section">
	<div class="container container--narrow">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'entry' ); ?>>
					<h1 class="entry__title"><?php the_title(); ?></h1>
					<div class="entry__content">
						<?php the_content(); ?>
					</div>
				</article>
				<?php
			endwhile;
		else :
			?>
			<h1 class="entry__title"><?php esc_html_e( 'Nothing here', 'caddy-poker-2026' ); ?></h1>
			<p><?php esc_html_e( 'It looks like this page is still out on the course.', 'caddy-poker-2026' ); ?></p>
			<?php
		endif;
		?>
	</div>
</section>

<?php
get_footer();
