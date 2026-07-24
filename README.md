# Harbor Conf 2026 — Tugboat demo app

Demo credentials for the Filament admin panel at `/admin`:

- **Email**: `admin@example.com`
- **Password**: `password`

The same login works locally (`https://laravel-demo.ddev.site/admin`) and on every Tugboat preview — the user is seeded by `DemoSeeder` and survives reseeds.

## Demo branches

Five branches, each a single PR-sized commit on top of `main`, kept rebased so their diffs stay clean. Push them and open PRs to stage the demo — the plurality is the point: several live previews at once is what one shared staging server can't do.

| Branch | Where to QA | What to look for | Local checkout only: run first |
|---|---|---|---|
| `demo/speaker-company` | `/speakers` | Every card gains an accent-colored company line; the grid reflows. In `/admin` → Speakers → Edit, the Company field now sits above Bio. Visual diff fires on `/speakers` only | — |
| `demo/session-status-column` | `/admin` → Sessions | New Status badge column, all "Confirmed". Public pages are untouched — the visual diff stays clean. That's the point: a schema change you can safely merge without opening staging | `ddev artisan migrate` |
| `demo/rebrand-accent` | Any public page | Teal accents (top bar, brand mark, nav underline, links, footer) turn violet. Visual diff fires on all four screenshot URLs. Also the "let them drive" edit — change the hex in the GitHub web UI live on a call | `ddev npm run build` |
| `demo/require-abstract` | `/admin` → Sessions → Edit | Abstract is now marked required; clearing it and saving shows a validation error. No public change, visual diff stays clean | — |
| `demo/broken` | `/speakers` | **Never merge.** Oversized headshots; María Fernanda's un-truncated name wrecks the grid at side-by-side width (visual diff catches it) and the missing alt text drops the Lighthouse accessibility score vs. base. Edits the same speaker card as `demo/speaker-company` — on shared staging, nobody could tell which PR broke the layout | `ddev npm run build` |

The last column applies **only to a local DDEV checkout** — Tugboat previews never need it, because every preview build runs the full pipeline (`composer install`, `migrate --force`, `npm ci && npm run build`) on a fresh clone. If a Blade change seems invisible after switching branches locally, run `ddev artisan view:clear`.

### Operating notes

- Stage the demo: `git push origin demo/speaker-company demo/session-status-column demo/rebrand-accent demo/require-abstract demo/broken`, then open a PR for each against `main`. Leave them all open; `demo/broken` stays open forever.
- The branches are rebased onto `main` whenever it changes — after that, pushing them again requires `--force-with-lease`.
- **Refreshing the base preview reseeds the database** (`update` phase runs `migrate --seed`), resetting any admin edits to the canonical demo state. Do this before each demo session.
- PR previews clone the base preview's database and run only the `build` phase — they never reseed. That clone is both the build speed and the database isolation being sold.
- Previews sleep after 15 idle minutes and wake with a brief 503 — hit each preview once before demoing so the first visitor click is instant.
- Side-by-side means roughly 800–960px per window; the layout is built to hold two columns there at up to 150% browser zoom.

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
