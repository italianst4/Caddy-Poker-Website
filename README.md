# Caddy Poker Website

Marketing website and custom WordPress theme (**Caddy Poker 2026**) for the Caddy Poker
mobile app. Play Golf. Play Poker. Play Both.

- **Single landing page** — app pitch + "iOS / Android — Coming Soon" placeholders (swap to
  real store links later), an embedded **How to Play** tutorial video (`#how-to-play` anchor),
  and a card-deck showcase.
- Hosted on **Bluehost** (standard WordPress). Developed locally with `@wordpress/env`.

## Repository layout

```
.wp-env.json                                  local WordPress + Docker config
package.json                                  wp-env scripts
docs/plans/                                   design/plan docs
wp-content/themes/caddy-poker-2026/           the custom theme
  style.css  functions.php  header.php  footer.php
  front-page.php            single landing page (hero, how-to-play video, deck)
  page-privacy-policy.php   Privacy Policy (content in the template)
  page-terms-of-service.php Terms of Service (content in the template)
  index.php  404.php
  bin/setup-pages.php       one-shot WP-CLI site setup
  assets/css  assets/js  assets/img  assets/video
```

## Local development

**Prerequisites:** [Docker Desktop](https://www.docker.com/products/docker-desktop/) running,
and Node.js 18+.

```bash
npm install        # installs @wordpress/env
npm start          # boots WordPress at http://localhost:8888
npm run setup      # activates theme + creates the Home page, menu, front page (idempotent)
```

- Site: http://localhost:8888
- Admin: http://localhost:8888/wp-admin — user `admin`, password `password`

The theme folder is mounted live, so edits to PHP/CSS/JS show on refresh (CSS/JS are
cache-busted by file mtime). Other commands:

```bash
npm stop           # stop the containers
npm run clean      # reset the database (fresh WordPress)
npm run destroy    # remove the environment entirely
npm run cli -- <wp-cli args>   # e.g. npm run cli -- plugin list
```

If you skip `npm run setup`, create the two pages manually (see "Manual WordPress wiring" below).

## Deploying to Bluehost

The theme is a self-contained, uploadable WordPress theme.

1. **Zip the theme folder** (the inner `caddy-poker-2026` directory, so the zip contains
   `caddy-poker-2026/style.css` at its root):
   ```bash
   cd wp-content/themes && zip -r ../../caddy-poker-2026.zip caddy-poker-2026 \
     -x '*.DS_Store'
   ```
2. In WordPress admin on Bluehost: **Appearance → Themes → Add New → Upload Theme** →
   choose `caddy-poker-2026.zip` → **Install** → **Activate**.
3. Do the one-time content wiring below.

### Manual WordPress wiring (Bluehost, or local without `npm run setup`)

1. **Pages → Add New:** create "Home" (any slug). This is the whole site — the front-page
   template renders the hero, the How to Play video, and the deck.
2. **Settings → Reading → Your homepage displays → A static page → Homepage: Home.**
3. **Appearance → Menus:** create a menu with a **Home** link and a **Custom Link** labeled
   "How to Play" pointing to `/#how-to-play`; set it as the **Primary Menu** location.
4. **Settings → Permalinks:** choose **Post name**.

## Updating for launch

- **Real app store links:** in [`front-page.php`](wp-content/themes/caddy-poker-2026/front-page.php),
  each "Coming Soon" badge is a `<span class="store-badge">`. Change it to
  `<a class="store-badge" href="STORE_URL">` and drop the `store-badge__tag` span — the CSS
  restyles `[href]` badges into live, gold-bordered buttons automatically. (Search for the
  `TODO` comment in that file.)
- **Tutorial video:** lives at `assets/video/caddypoker-how-to-play.mp4` (compressed to ~2 MB,
  720p portrait) with a poster at `assets/img/how-to-play-poster.jpg`. Re-export from the app
  repo's `assets/caddypoker-how-to-play.mp4` if it changes.
- **Legal pages:** Privacy Policy and Terms of Service copy lives directly in
  `page-privacy-policy.php` / `page-terms-of-service.php` (edit the text and the
  `$cp_effective` / `$cp_contact_email` / `$cp_jurisdiction` variables at the top). They are
  linked from the footer. **This copy is a starting template, not legal advice — have it
  reviewed by an attorney before launch.** `npm run setup` creates the two pages (and normalizes
  WordPress's default Privacy Policy draft to published/empty so the template is the source of
  truth).

## Brand

Palette and voice mirror the app (`caddy-poker-app/src/theme.ts`): deep fairway green
backgrounds (`#0B1F17`), golf-green accent (`#34C759`), gold highlight (`#FFD66B`), off-white
text, heavy 800–900 system-font weights. Assets originate in the sister app repo and are
downscaled/compressed into `assets/` here.
