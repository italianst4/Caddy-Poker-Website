<?php
/**
 * Template Name: Privacy Policy
 *
 * Applies to a Page with slug "privacy-policy".
 *
 * NOTE: This is a plain-language starting template, not legal advice. Have it
 * reviewed by a qualified attorney and confirm it matches your App Store
 * "App Privacy" labels and Google Play "Data safety" form before publishing.
 * Update the placeholders below (contact email, effective date, minimum age).
 *
 * @package caddy-poker-2026
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Edit these values as needed.
$cp_effective     = 'July 12, 2026';
$cp_contact_email = 'hello@caddypoker.com';
$cp_min_age       = '17'; // Align with your App Store / Google Play content rating.

get_header();
?>

<section class="legal-hero">
	<div class="container">
		<h1>Privacy Policy</h1>
		<p class="legal-hero__updated">Last updated: <?php echo esc_html( $cp_effective ); ?></p>
	</div>
</section>

<section class="section">
	<div class="container container--narrow legal">
		<p class="legal__intro">
			This Privacy Policy explains how Caddy Poker (&ldquo;Caddy Poker,&rdquo; &ldquo;we,&rdquo;
			&ldquo;us,&rdquo; or &ldquo;our&rdquo;) handles information in connection with the Caddy Poker
			mobile app (on the Apple App Store and Google Play) and this website (together, the
			&ldquo;Service&rdquo;). We keep things simple: the app is designed to be played without an
			account, and we collect as little as possible.
		</p>

		<h2>Information we collect</h2>
		<p>We do <strong>not</strong> require you to create an account or give us your name or email to
			play the game, and any payment for the optional in-app purchase is handled by the App Store &mdash;
				we never receive your credit-card or bank details. The information involved is limited to the following
			(the categories in parentheses match the App Store &ldquo;App Privacy&rdquo; and Google Play
			&ldquo;Data safety&rdquo; disclosures):</p>
		<ul>
			<li><strong>On-device game data.</strong> Your round setup, scores, and preferences are
				stored locally on your device so the app can function. This stays on your device and is
				not sent to us.</li>
			<li><strong>Usage &amp; product-interaction data</strong> (Usage Data). Which screens are
				opened and in-app events, so we can understand how the game is used and improve it.</li>
			<li><strong>Diagnostics &amp; crash data</strong> (Diagnostics). Basic device and OS type and
				crash information to help us fix bugs.</li>
			<li><strong>Device identifiers</strong> (Identifiers). A pseudonymous analytics identifier
				used to count sessions. This is not tied to your name and is not used to track you across
				other apps or websites.</li>
			<li><strong>Purchase data</strong> (Purchases). If you buy the optional one-time full-game
					unlock, we receive a record of the transaction &mdash; such as the product identifier,
					purchase and restore status, store country, and a pseudonymous purchase identifier &mdash;
					from the App Store and our purchases provider so we can deliver and restore your purchase.
					This does <strong>not</strong> include your payment card or App Store account credentials.</li>
				<li><strong>Approximate location</strong> (Coarse Location). Our analytics provider may infer
				an approximate, city-level location from your IP address. We do not collect precise GPS
				location.</li>
			<li><strong>Website data.</strong> When you visit this website, standard technical
				information (such as browser type and pages viewed) may be logged by our hosting provider,
				and the site may use cookies needed for basic functionality.</li>
		</ul>
		<p>This data is <strong>not linked to your identity</strong> and is <strong>not used to track
			you</strong> across other companies&rsquo; apps or websites.</p>

		<h2>How we use information</h2>
		<ul>
			<li>To operate, maintain, and improve the Service.</li>
				<li>To process, deliver, and restore your in-app purchase, and to keep basic sales records.</li>
			<li>To diagnose problems, analyze trends, and understand overall usage.</li>
			<li>To protect the security and integrity of the Service.</li>
		</ul>
		<p>We do not sell or share your personal information, and we do not use it for advertising.</p>

		<h2>Analytics and third-party services</h2>
		<p>We use <strong>PostHog</strong> as our product-analytics provider to collect the usage,
			diagnostics, identifier, and approximate-location data described above on our behalf. We also
			use a third-party website hosting provider that may process technical logs to deliver this
			site. These providers process data under their own privacy policies, and your information may
			be processed or stored in countries other than your own (including the United States). You can
			review PostHog&rsquo;s privacy practices at
			<a href="https://posthog.com/privacy" target="_blank" rel="noopener">posthog.com/privacy</a>.</p>

		<h2>Purchases and payments</h2>
			<p>The app is free to download and includes a limited-time free trial. After the trial, an
				optional <strong>one-time in-app purchase</strong> unlocks the full game. It is not a
				subscription and does not recur. <strong>All payments are processed by Apple</strong> through
				your App Store account &mdash; we do not receive or store your payment card, bank, or App Store
				login details.</p>
			<p>We use <strong>RevenueCat</strong> to manage, validate, and restore in-app purchases on our
				behalf. RevenueCat processes purchase-related data &mdash; such as the product purchased,
				transaction and receipt details, purchase and restore status, store country, and a
				pseudonymous app-user identifier &mdash; so we can deliver your purchase, enable
				&ldquo;Restore Purchase&rdquo; across your devices, prevent fraud and abuse, and keep basic
				sales records. This data is not tied to your name and is not used to track you across other
				companies&rsquo; apps or websites. RevenueCat may process this data in the United States and
				other countries under its own privacy policy, available at
				<a href="https://www.revenuecat.com/privacy" target="_blank" rel="noopener">revenuecat.com/privacy</a>.</p>

		<h2>Tracking and advertising identifiers</h2>
		<p>We do <strong>not</strong> use the Apple Advertising Identifier (IDFA), the Google Advertising
			ID for advertising, or any cross-app/cross-site tracking, and the app does not show ads.
			Because we don&rsquo;t track you across other companies&rsquo; apps and sites, the app does not
			present Apple&rsquo;s App Tracking Transparency prompt. If this ever changes, we will update
			this policy and request your permission where required.</p>

		<h2>Cookies</h2>
		<p>This website may use cookies to support core functionality. You can control cookies through
			your browser settings; disabling them may affect how parts of the site work. The mobile app
			does not use browser cookies.</p>

		<h2>How to delete your data</h2>
		<ul>
			<li><strong>On-device data:</strong> clear the app&rsquo;s data in your device settings, or
				uninstall the app, to remove game data stored on your device.</li>
			<li><strong>Analytics data:</strong> email us at
				<a href="mailto:<?php echo esc_attr( $cp_contact_email ); ?>"><?php echo esc_html( $cp_contact_email ); ?></a>
				to request deletion of analytics data associated with your device, and we will process
				your request as required by applicable law.</li>
				<li><strong>Purchase records:</strong> your purchase is tied to your App Store account and can
					be re-downloaded with &ldquo;Restore Purchase&rdquo;; to request deletion of purchase data
					held by our purchases provider, email us. We may retain records needed to honor or restore
					your purchase, prevent fraud, or meet tax and accounting obligations.</li>
		</ul>

		<h2>Data retention</h2>
		<p>On-device game data remains on your device until you delete the app or clear its data.
			Analytics data is retained only as long as needed for the purposes described in this policy,
			after which it is deleted or de-identified. Purchase and transaction records are kept for as
				long as needed to honor and restore your purchase and to meet legal, tax, and accounting
				requirements.</p>

		<h2>Your privacy choices and rights</h2>
		<p><strong>Opting out of analytics.</strong> You can opt out of analytics in the app&rsquo;s
			settings where available, and you can limit ad/measurement identifiers through your device
			privacy settings.</p>
		<p><strong>EEA/UK (GDPR).</strong> Where the GDPR or UK GDPR applies, we process usage and
			diagnostics data on the basis of your consent and/or our legitimate interest in improving and
			securing the Service. You have rights to access, correct, delete, restrict, or object to
			processing, and to data portability, and you may withdraw consent at any time.</p>
		<p><strong>California (CCPA/CPRA).</strong> We do <strong>not sell</strong> or
			<strong>share</strong> personal information as those terms are defined under California law,
			and we do not use sensitive personal information to infer characteristics. California
			residents may exercise their rights to know, delete, and correct.</p>
		<p>Because the app is account-free and stores game data on your device, you can remove most data
			yourself by clearing the app&rsquo;s data or uninstalling it. To make any privacy request,
			contact us using the details below. We will not discriminate against you for exercising your
			rights.</p>

		<h2>Children&rsquo;s privacy</h2>
		<p>The Service is intended for a general audience aged <?php echo esc_html( $cp_min_age ); ?> and
			older, consistent with its app-store content rating, and is <strong>not</strong> part of any
			&ldquo;Designed for Families&rdquo; or child-directed program. It is not directed to children
			under 13, and we do not knowingly collect personal information from them. If you believe a
			child has provided us information, please contact us and we will take appropriate steps.</p>

		<h2>Notifications and Live Activities</h2>
		<p>With your permission, the app may use notifications and iOS Live Activities to display
			round-related information. You can control or revoke these permissions at any time in your
			device settings.</p>

		<h2>Data security</h2>
		<p>We take reasonable measures to protect information handled through the Service. However, no
			method of transmission or storage is completely secure, and we cannot guarantee absolute
			security.</p>

		<h2>Changes to this policy</h2>
		<p>We may update this Privacy Policy from time to time. When we do, we will revise the
			&ldquo;Last updated&rdquo; date above. Your continued use of the Service after changes take
			effect means you accept the updated policy.</p>

		<h2>Contact us</h2>
		<p>Questions about this Privacy Policy? Reach out at
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
