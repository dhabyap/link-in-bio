# Project Issues & Roadmap: Link-in-Bio & Mini Portfolio

## 🚀 Completed Phases

- [x] **Phase 1: Database Schema & Models**
    - `User` table modified with username slugs.
    - `Link` and `Portfolio` tables created.
    - Eloquent relationships defined.
- [x] **Phase 2: Authentication & Routing Setup**
    - Laravel Breeze (Blade/Tailwind) installed.
    - Custom registration with mandatory `username` slug.
    - Protected `/admin` routes and wildcard `/{username}` route established.

---

## 🐞 Resolved Bugs

### 1. CI/CD Composer Compatibility Error
- **Status:** ✅ Fixed
- **Issue:** The GitHub Actions workflow (`laravel.yml`) was defaulting to PHP 8.0, but the project and `composer.lock` required PHP ^8.1. This caused a "compatible set of packages" error during the `composer install` step.
- **Resolution:** Updated the workflow file to use `php-version: '8.1'`.
- **Note:** Also disabled `optimize-autoloader` in local config to improve environment compatibility during development.

---

## 📋 Current Backlog

### [ ] Phase 3: Admin Dashboard View & Controllers
**Goal:** Build the CRUD interfaces for users to manage their profiles securely.
- [ ] **Profile Settings Module**: Avatar upload, display name, bio, theme color.
- [ ] **Links Management CRUD**: Adding, editing, deleting, and reordering.
- [ ] **Portfolio Management CRUD**: Title, description, API URLs, thumbnail uploads.

### [ ] Phase 4: Public Profile Page (Performance Optimized)
**Goal:** Dynamic profile display with server-side caching.
- [ ] Build responsive mobile-first profile layout.
- [ ] Implement query caching (30 min) for public profile data.
- [ ] Implement server-side proxy for external API metrics with heavy caching.

### [ ] Phase 5: Deployment Readiness & Documentation
**Goal:** Scaffolding for cPanel/FTP deployment.
- [ ] Create `storage:link` workaround for shared hosting.
- [ ] Update Vite build config for `public_html` deployment.
- [ ] Finalize README instructions for FTP deployment.
