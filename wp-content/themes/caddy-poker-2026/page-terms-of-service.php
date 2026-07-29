<?php
/**
 * Template Name: Terms of Service
 *
 * Applies to a Page with slug "terms-of-service". Also serves as the app's
 * End User License Agreement (EULA).
 *
 * NOTE: This is a plain-language starting template, not legal advice. Have it
 * reviewed by a qualified attorney and update the placeholders below (contact
 * email, governing law, minimum age, effective date) before publishing. The
 * "Apple App Store" section reflects Apple's minimum EULA terms; if you instead
 * adopt Apple's standard Licensed Application EULA, reference that instead.
 *
 * @package caddy-poker-2026
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Edit these values as needed.
$cp_effective     = 'July 6, 2026';
$cp_contact_email = 'hello@caddypoker.com';
$cp_jurisdiction  = 'the United States'; // e.g. 'the State of Illinois, USA'
$cp_min_age       = '17'; // Align with your App Store / Google Play content rating.

// Inside the app's in-app browser: no page title, just a left-aligned "last updated".
$cp_embed = caddy_poker_is_inappwebview();

get_header();
?>

<section class="legal-hero<?php echo $cp_embed ? ' legal-hero--embed' : ''; ?>">
	<div class="container">
		<?php if ( ! $cp_embed ) : ?>
			<h1>Terms of Service</h1>
		<?php endif; ?>
		<p class="legal-hero__updated">Last updated: <?php echo esc_html( $cp_effective ); ?></p>
	</div>
</section>

<section class="section">
	<div class="container container--narrow legal">
		<p class="legal__intro">
			Welcome to Caddy Poker. These Terms of Service (&ldquo;Terms&rdquo;) govern your use of the
			Caddy Poker mobile app and this website (together, the &ldquo;Service&rdquo;) and also serve
			as the End User License Agreement (&ldquo;EULA&rdquo;) for the app. By using the Service, you
			agree to these Terms. If you don&rsquo;t agree, please don&rsquo;t use the Service.
		</p>

		<h2>Eligibility</h2>
		<p>You must be at least <?php echo esc_html( $cp_min_age ); ?> years old (consistent with the
			app&rsquo;s store content rating), or the age of majority where you live, to use the Service.
			By using the Service, you represent that you meet this requirement.</p>

		<h2>The Service</h2>
		<p>Caddy Poker is a golf-meets-poker game and companion app, along with this marketing website.
			The app is provided as a free companion to enhance your round of golf. Features may change,
			and we may add, modify, or remove parts of the Service at any time.</p>

		<h2>License to use the app</h2>
		<p>We grant you a personal, non-exclusive, non-transferable, revocable license to download and
			use the Caddy Poker app for your own non-commercial entertainment, subject to these Terms and
			to the usage rules of the app store you downloaded it from.</p>

		<h2>App stores</h2>
		<p>You obtain the app through the Apple App Store or Google Play, and your use is also subject to
			that store&rsquo;s terms. The following applies to the extent required by each store.</p>

		<h3>Apple App Store</h3>
		<ul>
			<li>This EULA is concluded solely between you and Caddy Poker, and <strong>not with
				Apple</strong>. Caddy Poker, not Apple, is solely responsible for the app and its content.</li>
			<li>The license granted is limited to a non-transferable license to use the app on any
				Apple-branded products that you own or control, as permitted by the Usage Rules in the
				Apple Media Services Terms and Conditions.</li>
			<li><strong>Apple has no obligation</strong> to furnish any maintenance or support services
				for the app.</li>
			<li>If the app fails to conform to any applicable warranty, you may notify Apple, and Apple
				will refund the purchase price (if any). To the maximum extent permitted by law, Apple has
				no other warranty obligation with respect to the app.</li>
			<li>Caddy Poker, not Apple, is responsible for addressing any claims relating to the app,
				including product-liability, legal or regulatory compliance, and consumer-protection
				claims, and any claim that the app infringes a third party&rsquo;s intellectual property.</li>
			<li>You represent that you are not located in a country subject to a U.S. Government embargo
				or designated as &ldquo;terrorist supporting,&rdquo; and that you are not on any U.S.
				Government list of prohibited or restricted parties.</li>
			<li><strong>Apple and its subsidiaries are third-party beneficiaries</strong> of this EULA and,
				upon your acceptance, have the right to enforce it against you.</li>
			<li>You must comply with any applicable third-party terms when using the app.</li>
		</ul>

		<h3>Google Play</h3>
		<p>If you download the app from Google Play, your use is also subject to the Google Play Terms of
			Service. Google is not a party to these Terms and is not responsible for the app or its
			content.</p>

		<h2>No real-money gambling</h2>
		<p>Caddy Poker uses poker themes for entertainment only. The Service does <strong>not</strong>
			involve real-money wagering, betting, or gambling, and does not offer prizes of monetary value.
			Any wagering you arrange with your own group is entirely your responsibility and is not part
			of the Service.</p>

		<h2>Payments</h2>
		<p>The app is currently free to download and play. If we offer any paid features or in-app
			purchases in the future, those transactions will be processed by the applicable app store
			(Apple or Google) under its terms, and any additional purchase terms will be presented to you
			at that time.</p>

		<h2>Acceptable use</h2>
		<p>When using the Service, you agree not to:</p>
		<ul>
			<li>Copy, modify, reverse engineer, or create derivative works of the app, except as
				permitted by law.</li>
			<li>Use the Service for any unlawful purpose or in violation of these Terms.</li>
			<li>Interfere with or disrupt the Service or attempt to gain unauthorized access to it.</li>
			<li>Resell, redistribute, or commercially exploit the Service without our permission.</li>
		</ul>

		<h2>Intellectual property</h2>
		<p>The Service, including its artwork, logos, card designs, text, and software, is owned by us
			or our licensors and is protected by intellectual property laws. Except for the limited
			license above, these Terms do not grant you any rights to our trademarks or content.</p>

		<h2>The physical game and third-party links</h2>
		<p>Caddy Poker also exists as a physical card game sold separately. The Service may link to
			third-party sites (such as our store or the app stores) that we do not control. We are not
			responsible for the content, products, or policies of third-party sites.</p>

		<h2>Play responsibly</h2>
		<p>Caddy Poker is meant for fun on the golf course. Always follow the rules and etiquette of the
			course you&rsquo;re playing, respect other golfers, and play safely. You are responsible for
			your own conduct while using the Service.</p>

		<h2>Disclaimers</h2>
		<p>The Service is provided <strong>&ldquo;as is&rdquo;</strong> and <strong>&ldquo;as
			available&rdquo;</strong> without warranties of any kind, whether express or implied,
			including warranties of merchantability, fitness for a particular purpose, and
			non-infringement. We do not warrant that the Service will be uninterrupted, error-free, or
			secure. Apple and Google provide no warranty for the app.</p>

		<h2>Limitation of liability</h2>
		<p>To the fullest extent permitted by law, Caddy Poker and its owners, and the app stores through
			which you obtained the app, will not be liable for any indirect, incidental, special,
			consequential, or punitive damages, or any loss of data, profits, or goodwill, arising from
			your use of the Service.</p>

		<h2>Changes to these Terms</h2>
		<p>We may update these Terms from time to time. When we do, we will revise the &ldquo;Last
			updated&rdquo; date above. Your continued use of the Service after changes take effect means
			you accept the updated Terms.</p>

		<h2>Governing law</h2>
		<p>These Terms are governed by the laws of <?php echo esc_html( $cp_jurisdiction ); ?>, without
			regard to its conflict-of-laws rules.</p>

		<h2>Contact us</h2>
		<p>Questions about these Terms? Reach out at
			<a href="mailto:<?php echo esc_attr( $cp_contact_email ); ?>"><?php echo esc_html( $cp_contact_email ); ?></a>.</p>

		<?php
		// Allow optional extra content entered in the WP Page editor.
		while ( have_posts() ) :
			the_post();
			if ( trim( get_the_content() ) ) :
				echo '<div class="entry__content">';
				the_content();
				echo '</div>';
			endif;
		endwhile;
		?>
	</div>
</section>

<?php
get_footer();
