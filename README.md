# Caddy Poker Website

Marketing website and custom WordPress theme (**Caddy Poker 2026**) for the Caddy Poker
mobile app. Play Golf. Play Poker. Play Both.

- **Single landing page** — app pitch + store badges (**App Store link is live**; Android is
  still a "Coming Soon" placeholder), an embedded **How to Play** tutorial video
  (`#how-to-play` anchor), and a card-deck showcase.
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

- **Real app store links:** the iOS badge in
  [`front-page.php`](wp-content/themes/caddy-poker-2026/front-page.php) is live and points at
  `CADDY_POKER_IOS_APP_URL` (defined in
  [`functions.php`](wp-content/themes/caddy-poker-2026/functions.php) — edit it there). The
  Android badge is still a `<span class="store-badge">`; when the Play Store listing ships,
  change it to `<a class="store-badge" href="STORE_URL">` and drop the `store-badge__tag` span,
  matching the iOS badge. The CSS gives `[href]` badges a pointer cursor and hover lift.
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

Palette and voice mirror the app (`caddy-poker-app/src/theme.ts`): a dark "deep fairway green"
theme with a bright golf-green accent, gold highlights, and a vibrant sky-blue hero, set in heavy
800–900 system-font weights. Assets originate in the sister app repo and are downscaled/compressed
into `assets/` here.

Colors are defined as CSS custom properties at the top of
[`assets/css/main.css`](wp-content/themes/caddy-poker-2026/assets/css/main.css).

| Hex | Token | Use |
|---|---|---|
| `#0B1F17` | `--cp-bg` | page background (deep fairway green) |
| `#102B20` | `--cp-bg-elevated` | elevated sections |
| `#16382A` | `--cp-card` | cards / panels |
| `#1F4D39` | `--cp-border` | borders |
| `#F4F8F5` | `--cp-text` | body text |
| `#9CB7A8` | `--cp-text-muted` | secondary text (sage) |
| `#34C759` | `--cp-primary` | golf-green accent, primary buttons |
| `#06210F` | `--cp-primary-text` | text on green buttons |
| `#42A7DE` | `--cp-sky` | hero background (sky blue) |
| `#FFD66B` | `--cp-gold` | highlights, CTA accents |
| `#FF6B6B` | `--cp-danger` | errors / warnings |
| `#FFFFFF` | `--cp-white` | white |
| `#0A0A0A` | `--cp-black` | black |
| `#3AA756` | — | course "grass" ground band |
| `#102445` | — | ground horizon line |

Type: heavy system-font weights (800–900) — no custom/licensed font.
