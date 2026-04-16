# Comprehensive Fix Plan for BRESSEL

## Phase 1: Resolving Academy and Community Pages
The current issue is that /academy/ and /community/ already exist as Pages in WordPress, and since `archive-coach.php` and `archive-event.php` rely on CPT rewrite rules, they conflict.
Additionally, the user requested to remove CPT Event and use standard Posts with categories/tags instead.

**Actions:**
1. Update `functions.php`: Remove `event` CPT.
2. Setup standard Posts: Use Categories (`event`, `announcement`).
3. Handle /academy/: We'll use a custom page template `page-academy.php` or rename the page and let the CPT archive take over. Let's rename the CPT slug to `coach` and create a `page-academy.php` template that queries coaches. This is much more stable than playing with rewrite conflicts.
4. Handle /community/: Create a `page-community.php` template that queries standard posts with the `event` or `announcement` category.
5. Provide standard WP-CLI commands to create the necessary taxonomy terms and sample posts.

## Phase 2: Contact Page
**Actions:**
1. Create a simple `page-contact.php` template.
2. Use WP-CLI to ensure the Contact page exists and uses this template.

## Phase 3: Sample Data via WP-CLI
**Actions:**
1. Generate coaches.
2. Generate merchandise.
3. Generate sample events/announcements (standard posts).

