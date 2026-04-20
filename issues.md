# Link-in-Bio & Mini Portfolio Project Specifications

## 🎯 Context & Role
Act as a Senior Laravel Developer. Your task is to architect and scaffold a "Link-in-Bio & Mini Portfolio" web application. The target deployment environment is a standard cPanel Shared Hosting (Apache/Nginx, PHP, MySQL), and the deployment will be done via simple CI/CD FTP transfer.

## ⚠️ Technical Constraints (Strictly Enforced)
- **Queues:** Avoid long-running daemon processes (no `php artisan queue:work`). Use the `sync` queue driver or handle tasks synchronously.
- **Cache:** Use `file` or `database` caching. Do NOT require Redis or Memcached.
- **Hosting Structure:** Prepare the file structure so that the `public` directory contents can easily be mapped or deployed to `public_html` on cPanel.
- **Storage:** Use standard local file storage (not AWS S3).

## 🛠️ Tech Stack
- **Framework:** Laravel (latest version)
- **Database:** MySQL
- **Frontend:** Blade Templates, Tailwind CSS (via CDN or pre-compiled via Vite for FTP deployment), and Alpine.js for lightweight reactivity.
- **Authentication:** Laravel Breeze (Blade stack)

---

## 📝 Task Execution Instructions (Please execute sequentially)

### 🏗️ Phase 1: Database Schema & Models
**Goal:** Define the data structure and Eloquent relationships.
***Instructions for Worker:** Output the migration files and model classes first. Wait for user approval before moving to Phase 2.*

- [ ] **Create `User` Migrations & Model**
  - Required fields constraint: `username` (unique, used for public slug `domain.com/username`), `display_name`, `bio`, `theme_color` (hex string), `avatar_path`.
- [ ] **Create `Link` Migrations & Model**
  - Required fields constraint: `user_id` (foreign key), `title`, `url`, `icon`, `order` (integer for sorting), `is_active` (boolean).
- [ ] **Create `Portfolio` Migrations & Model**
  - Required fields constraint: `user_id` (foreign key), `title`, `description`, `external_api_url` (nullable), `thumbnail_path`, `order`.
- [ ] **Define Eloquent Relationships**
  - `User` hasMany `Link` and `Portfolio`.
  - `Link` & `Portfolio` belongsTo `User`.

---

### 🔒 Phase 2: Authentication & Routing Setup
**Goal:** Set up user authentication (tenant context) and web routes.
- [ ] **Install and Configure Laravel Breeze**
  - Use the Blade stack.
- [ ] **Update Registration Flow**
  - Force new users to fill in the `username` during registration.
  - Add validation for `username` (unique, valid characters, no spaces).
- [ ] **Define Web Routes**
  - Implement a wildcard public route: `GET /{username}` -> Public profile page.
  - Implement protected routes under `/admin/...` group using `auth` middleware.

---

### ⚙️ Phase 3: Admin Dashboard View & Controllers
**Goal:** Build the CRUD interfaces for users to manage their profiles securely.
- [ ] **Profile Settings Module**
  - Form to manage `avatar`, `display_name`, `bio`, and `theme_color`.
  - Handle avatar image upload locally inside `storage/app/public/avatars`.
- [ ] **Links Management Module**
  - Implement full CRUD operations for Links.
  - Implement a sorting mechanism to update the `order` field.
- [ ] **Portfolio Management Module**
  - Implement full CRUD operations for Portfolio items.
  - Handle thumbnail image uploads locally.
  - Implement validation and safe save functionality for `external_api_url`.

---

### 🚀 Phase 4: Public Profile Page (Performance Optimized)
**Goal:** The view that handles user profiles dynamically with severe constraints on query executions.
- [ ] **Public Profile Controller & Layout**
  - Resolve the `User` by `username`, load active `Links` and `Portfolios`.
  - Build a responsive, mobile-first Blade layout heavily leveraging Tailwind CSS and Alpine.js.
  - Inject the user’s `theme_color` dynamically into the view.
- [ ] **Backend Caching Implementation**
  - Refactor the controller to implement Laravel's built-in Cache.
  - Store the database query results for the public profile for at least 30 minutes to reduce hits on MySQL. Ensure cache keys are unique per user (e.g., `profile_{user_id}`).
  - Setup cache invalidation whenever a user edits their Profile, Links, or Portfolio.
- [ ] **Server-Side External API Fetching**
  - For Portfolios containing an `external_api_url` (e.g., GitHub stats, gaming API, crypto), explicitly fetch this via server-side HTTP request (`Http::get`).
  - **CRITICAL:** Heavily cache this API response on the backend.
  - **Do NOT** execute this fetch via client-side/JS to prevent CORS issues or leaking API keys.

---

### 🧰 Phase 5: Deployment Readiness & Documentation
**Goal:** Prepare the scaffolding to gracefully exit to a Shared Hosting FTP deployment.
- [ ] **cPanel `storage:link` Helper Workaround**
  - Since SSH access might be limited in cPanel, create a dedicated helper for symlinking.
  - Implement either: A) An authenticated or secret route (e.g., `/setup-storage-link`) that executes `Artisan::call('storage:link')` OR B) Provide a raw PHP script equivalent for symlinking that can directly be uploaded.
- [ ] **Vite Asset Bundling Configuration**
  - Configure `vite.config.js` and `package.json` so `npm run build` maps outputs beautifully considering traditional `public_html` targets without requiring tricky pathing.
- [ ] **Documentation (README.md)**
  - Write detailed instructions on compiling assets, running FTP transfer, executing migrations if SSH is missing, and establishing the symlink in shared hosting environments.
