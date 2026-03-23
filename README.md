# HRM System (Laravel + MySQL + Blade)

Production-ready HRM foundation with RBAC, multi-branch support, attendance (GPS/QR-ready), leave, payroll, admin dashboard, and employee panel.

## Stack

- Backend: Laravel 12 (MVC)
- DB: MySQL
- Frontend: Blade
- Auth: Laravel built-in auth (Breeze-based)
- RBAC: spatie/laravel-permission
- PDF: barryvdh/laravel-dompdf
- QR generator: simplesoftwareio/simple-qrcode

## Roles

- Super Admin
- Admin / HR
- Employee

All role routes are protected by `role` middleware.

## Core Modules Included

- Employee Management
- Multi-Branch Management
- Attendance (4 scans/day, GPS radius validation, anti-duplicate scans)
- Leave Management (approve/reject + balance deduction)
- Payroll Generation + Payslip PDF
- Admin Dashboard summaries
- Employee Mobile-first panel + PWA-ready manifest/service worker placeholders
- Corporate Admin panel (sidebar + top header + data-first dashboard)
- Attendance management table with detail modal
- Leave reject flow with required admin comment
- Payroll detail page + paid/pending workflow
- SaaS subscription dashboard (plans + companies + revenue summary)
- Company settings (primary color, plan label, payroll visibility toggle)
- API-ready structure at `/api/v1/*` (token-auth ready)

## Install

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Set `.env` MySQL credentials, then run:

```bash
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

### Local testing database (optional)

This project defines a second connection named **mysql_testing** that you can use
when running tests locally. The production/online connection (`mysql`) is left
untouched. To use the test database:

1. Create a `.env.testing` file by copying the example:

   ```bash
   cp .env.testing.example .env.testing
   # edit credentials if needed (DB_TEST_*)
   ```

2. Make sure your testing database exists (e.g. `CREATE DATABASE hrm_test;`).
3. Run the tests normally; PHPUnit will pick up `DB_CONNECTION=mysql_testing` from
   `phpunit.xml` and use the `DB_TEST_*` values.

   ```bash
   php artisan test
   ```

By separating the connections you can safely run migrations and seeders against
a dedicated local database without affecting your online deployment.

#### Migrate both databases at once

A custom artisan command `migrate:all` has been added for convenience. It will
run the Laravel migration command sequentially for the default connection and
(for testing) the `mysql_testing` connection. You can call it like this:

```bash
# migrate both the regular and test connections
php artisan migrate:all

# including seeds on each connection
php artisan migrate:all --seed

# or specify a subset of connections by name
php artisan migrate:all --connections=mysql,mysql_testing
```

This is useful when you maintain two databases locally and want to bring both
schemas up to date with a single command.


## Default Accounts

- Super Admin: `superadmin@hrm.local` / `password123`
- SaaS Admin: `saas@hrm.local` / `password123`
- Admin HR: `hr@hrm.local` / `password123`
- Employee: `employee@hrm.local` / `password123`

> **Note:** running `php artisan db:seed` (the default seeder) will create the super admin user with these credentials. If you customise the address or password, update the seeder accordingly.

## How to Create a New Plan

1. Log in as **SaaS Admin** (`saas@hrm.local` / `password123`).
2. Go to the sidebar and click **Subscription Plans**.
3. Click the **Create Plan** button at the top right.
4. Fill in the plan details (name, price, employee/branch limits, etc).
5. Click **Create Plan** to save.

Plans will now be available for companies to subscribe.

## Shared Hosting (cPanel)

1. Upload project files to your app folder.
2. Point domain document root to `/public`.
3. Set `.env` and run `php artisan key:generate`.
4. Run `php artisan migrate --seed` once.
5. Run `php artisan storage:link`.
6. Ensure `storage/` and `bootstrap/cache/` are writable.

### Quick Repair (500 error)

If you get `500 Internal Server Error` on cPanel, run this from project root:

```bash
chmod +x scripts/cpanel_repair.sh
bash scripts/cpanel_repair.sh
```

The script automatically:
- fixes `public/storage` symlink issues,
- clears/rebuilds Laravel caches,
- reapplies required permissions,
- creates a safe root `index.php` + `.htaccess` fallback for hosts that cannot point document root to `/public`.

No WebSocket server is required.

## Security + Performance Notes

- CSRF enabled by default.
- Password hashing via Laravel hashed cast/bcrypt.
- FormRequest validation on write actions.
- Activity logging middleware stores request metadata.
- Duplicate attendance scan prevented by DB unique index and service checks.
- QR scanner requires a secure (HTTPS) connection and valid camera permissions; most browsers will block camera access over plain HTTP.
- Eager loading used in dashboards/list pages.
- Dashboard summary cached for 5 minutes.

## Next Extensions

- Strong anti-fake-GPS heuristics (speed/device attestation)
- Dynamic QR token issuing/expiration scheduler
- Multi-level leave approvals workflow rules
- API auth tokens using Sanctum/Passport

## Deploy to Vercel (container workaround)

Vercel is primarily a frontend / serverless platform. Deploying a full Laravel app on Vercel requires using a container build. This repository includes a basic `Dockerfile` + `vercel.json` that uses the `@vercel/docker` builder as a quick way to run the app on Vercel.

Notes and required steps:
- Vercel does not provide a managed MySQL instance. You must provide an external database (ClearDB, Amazon RDS, PlanetScale, Render, etc.) and set `DB_*` env vars in the Vercel project.
- Persistent storage (for uploaded files) must be on S3 or another external storage. Keep `FILESYSTEM_DRIVER=s3` and config S3 credentials in Vercel env.
- The included `Dockerfile` uses `php artisan serve` for simplicity. It's suitable for testing / small deployments but not optimized for heavy production traffic.

Quick deploy steps:

1. Push your repo to GitHub.
2. Create a new project on Vercel and import the Git repo.
3. In Vercel Project Settings -> Environment Variables, set all necessary env vars that your app needs (APP_KEY, APP_URL, DB_CONNECTION/DB_HOST/DB_DATABASE/DB_USERNAME/DB_PASSWORD, S3_* if used, etc.).
4. (Optional) Configure a persistent external DB and S3 bucket and point env vars to them.
5. Deploy — Vercel will use `vercel.json` to build the `Dockerfile` and run the container.

After deployment complete, run migrations and seeders via one-off container console or by providing startup commands. Example migration trigger (run locally or via remote container shell):

```bash
php artisan migrate --force
php artisan db:seed --class=DatabaseSeeder --force
php artisan storage:link
```

If you want a production-ready container (nginx + php-fpm, health checks, supervisor), I can replace the simple `Dockerfile` with a production multi-stage Dockerfile and add a GitHub Actions workflow to build/push images to a registry. Tell me if you want that.

I've added a production Dockerfile and CI scaffolding to this repo.

What's included now:
- `Dockerfile.prod` — multi-stage image (composer install, optional node build) with `php-fpm` + `nginx`.
- `docker/nginx.conf` + `docker/start-container.sh` — simple runtime glue.
- `.github/workflows/docker-image.yml` — GitHub Actions workflow to build and push image to GitHub Container Registry (`ghcr.io`).
- `scripts/cloudflare-worker/` — example Cloudflare Worker and `wrangler.toml` showing how to bind a D1 database (dev example only).

Quick usage notes:

1) GitHub Container Registry build

 - Push your code to GitHub (main branch).
 - Ensure Actions are enabled and the repository has permission to write packages.
 - The workflow publishes `ghcr.io/<owner>/<repo>:latest` on pushes to `main`.

2) Vercel deployment using the container

 - You can either let Vercel build the container from `Dockerfile.prod` (update `vercel.json` to point to `Dockerfile.prod`) or deploy the pushed image to a platform that runs containers.

3) Cloudflare D1

 - `scripts/cloudflare-worker/worker.js` is a minimal example that calls a bound D1 database. It is NOT a drop-in replacement for a MySQL connection used by Laravel. Use it only as a reference.
 - If you truly want Laravel to use D1, you'll need to implement a full HTTP-to-SQL proxy API (the worker here is a starting point), and update Laravel to use that API instead of a direct MySQL connection.

If you want, I'll now:

- (A) Replace `vercel.json` to use `Dockerfile.prod` for Vercel builds, and set up example env var list for Vercel.
- (B) Add a GitHub Actions workflow that runs database migrations on deploy via `docker run` against the built image (requires secrets).
- (C) Harden the Cloudflare Worker example (safer parameterization and authentication) and show an example Laravel client call.

Which of A/B/C should I implement next? Or do you want me to implement all three now?

