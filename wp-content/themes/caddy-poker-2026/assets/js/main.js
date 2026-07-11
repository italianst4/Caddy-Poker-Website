/* Caddy Poker 2026 — small progressive enhancements. No dependencies. */
(function () {
	'use strict';

	// Reveal elements as they scroll into view.
	var reveals = document.querySelectorAll('.reveal');
	if (reveals.length && 'IntersectionObserver' in window) {
		var io = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-visible');
						io.unobserve(entry.target);
					}
				});
			},
			{ rootMargin: '0px 0px -10% 0px', threshold: 0.1 }
		);
		reveals.forEach(function (el) {
			io.observe(el);
		});
	} else {
		// No IO support: just show everything.
		reveals.forEach(function (el) {
			el.classList.add('is-visible');
		});
	}

	// Course ground: animate the water hazard (positions are fixed in CSS).
	var ground = document.querySelector('.ground');
	if (ground) {
		// Alternate the water hazard's two frames every 500ms.
		var water = ground.querySelector('.ground__hazard--water');
		if (water && water.dataset.frame1 && water.dataset.frame2) {
			var frames = [water.dataset.frame1, water.dataset.frame2];
			frames.forEach(function (src) { var im = new Image(); im.src = src; }); // preload
			var fi = 0;
			setInterval(function () {
				fi = 1 - fi;
				water.src = frames[fi];
			}, 1000);
		}
	}

	// On iOS/Android, show only the matching store badge. Other platforms see both.
	var badgeWrap = document.getElementById('get-the-app');
	if (badgeWrap) {
		var ua = navigator.userAgent || '';
		var isIOS = /iPad|iPhone|iPod/.test(ua) ||
			(navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1); // iPadOS
		var isAndroid = /Android/.test(ua);
		if (isIOS || isAndroid) {
			var hide = isIOS ? 'android' : 'ios';
			badgeWrap.querySelectorAll('.store-badge[data-store="' + hide + '"]').forEach(function (el) {
				el.remove();
			});
		}
	}

	// Hide the nav bar at the very top; reveal it once the user scrolls down.
	var header = document.getElementById('site-header');
	if (header) {
		var SHOW_AT = 24; // px scrolled before the bar slides in
		var syncHeader = function () {
			var y = window.pageYOffset || document.documentElement.scrollTop || 0;
			header.classList.toggle('is-visible', y > SHOW_AT);
		};
		syncHeader();
		window.addEventListener('scroll', syncHeader, { passive: true });
	}
})();
