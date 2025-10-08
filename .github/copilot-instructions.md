# Copilot Instructions for Megaminds-Crud

## Project Overview
- **Framework:** Laravel (PHP)
- **Purpose:** CRUD operations for Offers, Categories, Locations, and Users
- **Key Directories:**
  - `app/Models/`: Eloquent models for core entities
  - `app/Http/Controllers/`: Route logic and request handling
  - `app/Services/`: Business logic (e.g., `OfferService.php`)
  - `database/migrations/`: Schema definitions
  - `database/seeders/`: Initial/test data population
  - `routes/`: Route definitions (`web.php`, `auth.php`, `console.php`)
  - `tests/`: Pest and PHPUnit tests (Feature/Unit)

## Architecture & Patterns
- **MVC:** Standard Laravel structure; controllers delegate to services and models
- **Service Layer:** Business logic is separated into `app/Services/` (e.g., `OfferService`)
- **Policies:** Authorization logic in `app/Policies/`
- **Constants:** Shared enums/constants in `app/Constants/`
- **Factories/Seeders:** Use for test data and local development

## Developer Workflows
- **Build/Serve:**
  - Start local server: `php artisan serve`
  - Compile assets: `npm run dev` (uses Vite + Tailwind)
- **Database:**
  - Migrate: `php artisan migrate`
  - Seed: `php artisan db:seed`
- **Testing:**
  - Run all tests: `./vendor/bin/pest` or `./vendor/bin/phpunit`
  - Feature tests in `tests/Feature/`, unit tests in `tests/Unit/`
- **Debugging:**
  - Use Laravel's built-in logging (`storage/logs/`)
  - Tinker REPL: `php artisan tinker`

## Conventions & Integration
- **Routing:**
  - Web routes in `routes/web.php`, API routes may be added as needed
- **Model Relationships:**
  - Many-to-many via pivot tables (see migrations for `category_offer`, `location_offer`)
- **Authorization:**
  - Policies enforce access control for Offers
- **Frontend:**
  - Tailwind CSS, Vite for asset pipeline
- **Testing:**
  - Pest is preferred for new tests

## External Dependencies
- **Composer:** PHP packages (see `composer.json`)
- **NPM:** JS/CSS tooling (see `package.json`)

## Examples
- **Service Usage:** Controllers call methods in `OfferService` for business logic
- **Factory Usage:** `UserFactory` for generating test users
- **Seeder Usage:** `OfferSeeder` for populating offers

## Tips for AI Agents
- Follow Laravel conventions unless project files indicate otherwise
- Prefer Pest for new tests, but maintain PHPUnit compatibility
- Reference migrations for schema details
- Use service layer for business logic, not controllers
- Check `app/Constants/` for shared enums/values

---
If any section is unclear or missing, please provide feedback for further refinement.
