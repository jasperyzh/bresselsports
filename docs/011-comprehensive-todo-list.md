# BRESSEL™ - Comprehensive To-Do List

**Date:** April 16, 2026  
**Priority Order:** Quick Wins → High Value → Nice to Have  
**Status:** ✅ MAJOR UPDATES COMPLETED

---

## 🚀 QUICK WINS - ALL COMPLETED ✅

### QW-01: Fix Academy URL Slug ✅
**Time:** 5 min  
**File:** `functions.php`  
**Task:** Changed Coach CPT slug from `/coaches/` to `/academy/`  
**Status:** ✅ COMPLETE

---

### QW-02: Create Community/Events Archive ✅
**Time:** 30 min  
**Files:** `functions.php`, `page-community.php`  
**Tasks:**
1. ✅ Removed Event CPT (conflicts with Page)
2. ✅ Using standard `post` with `event` category
3. ✅ Created `page-community.php` template
**Status:** ✅ COMPLETE

---

### QW-03: Configure WordPress Navigation Menu ✅
**Time:** 10 min  
**Location:** WordPress Admin → Appearance → Menus  
**Tasks:**
1. ✅ Created "Primary Menu" via WP-CLI
2. ✅ Added: Home, Academy, Community, Shop, Contact
3. ✅ Assigned to "Primary" location
**Status:** ✅ COMPLETE

---

### QW-04: Create Fluent Forms ⚠️
**Time:** 20 min  
**Location:** WordPress Admin → Fluent Forms  
**Tasks:**
1. ❌ Create Contact Form (ID: 1) - Need to do manually in admin
2. ❌ Create Newsletter Form (ID: 2) - Need to do manually in admin
3. Test form submissions

**Note:** Forms must be created manually in WP Admin. The templates are ready for them.
**Status:** ⚠️ PENDING - Requires manual WP Admin setup

---

### QW-05: Polish Footer Content ✅
**Time:** 15 min  
**File:** `footer.php`  
**Tasks:**
1. ✅ Added dynamic year: `<?= date('Y') ?>`
2. ✅ Added social media icons (Instagram, Facebook, YouTube)
3. ✅ Complete copyright text with BRESSEL™ trademark
4. ✅ Proper footer columns (Brand, Academy, Community, Newsletter)
**Status:** ✅ COMPLETE

---

### QW-06: Quote Carousel Implementation ✅
**Time:** 45 min  
**Files:** `front-page.php`, `components/quote-carousel.php`, `functions.php`, `main.js`  
**Tasks:**
1. ✅ Create CMB2 theme option for editable quotes
2. ✅ Create quote-carousel component with slider
3. ✅ Replace static quote section with carousel
4. ✅ Add carousel JS with auto-play and navigation
**Status:** ✅ COMPLETE

---

## 💎 HIGH VALUE TARGETS

### HV-01: Event/Community CPT Switch to Standard Posts ✅
**Time:** 1 hour  
**Files:** `functions.php`, `page-community.php`, `components/event-card.php`  
**Tasks:**
1. ✅ Removed Event CPT registration
2. ✅ Using standard posts with category `event` and `announcement`
3. ✅ Updated CMB2 metabox to work with posts
4. ✅ Updated event-card.php component
5. ✅ Added sample events via WP-CLI
**Status:** ✅ COMPLETE

---

### HV-02: Newsletter Form Integration ⚠️
**Time:** 1 hour  
**Tasks:**
1. ❌ Connect homepage newsletter section to Fluent Form ID 2
2. ❌ Add email validation
3. ❌ Create confirmation message
4. ❌ Set up email notifications

**Status:** ⚠️ PENDING - Requires Fluent Forms setup in admin

---

### HV-03: SEO Framework Setup
**Time:** 1 hour  
**Location:** WordPress Admin → SEO  
**Tasks:**
1. Install The SEO Framework plugin
2. Configure site-wide settings
3. Add meta descriptions for all pages
4. Set up Open Graph tags
5. Configure schema markup

**Status:** 🔄 POST-DEMO

---

### HV-04: CSS Refactoring (temp.css cleanup)
**Time:** 2-3 hours  
**Files:** `src/temp.css`, `src/css/components/`  
**Tasks:**
1. Move ticker styles to `css/modifiers/ticker.css`
2. Move hero utilities to `css/components/hero.css`
3. Create `css/components/academy.css`
4. Create `css/components/community.css`
5. Consolidate button styles

**Status:** 🔄 POST-DEMO

---

### HV-05: Content Population ✅
**Time:** 1 hour  
**Location:** WordPress Admin  
**Tasks:**
1. ✅ Added 4 coaches (Coach Jeremy, Coach Sofia, Coach Ravi + test)
2. ✅ Added 7 merchandise items
3. ✅ Added 3 events + 1 announcement
4. ✅ Created categories: Event (6), Announcement (7)

**Sample Data Summary:**
- **Coaches (4):** Coach Jeremy (Head of Pro Training), Coach Sofia (Performance Coach), Coach Ravi (Junior Development Coach)
- **Merch (7):** PADEL-X Pro, KINETIC GRIP-V1, PRO TOUR BAG, + 4 existing items
- **Events (3):** Malaysia Open Qualifiers, Junior Padel Circuit, Academy Ranking Tournament
- **Announcements (1):** New BRESSEL PRO Gear Available

**Status:** ✅ COMPLETE

---

### HV-06: Footer Complete Implementation ✅
**Time:** 1 hour  
**File:** `footer.php`  
**Tasks:**
1. ✅ Added social media icons (SVG)
2. ✅ Created footer navigation (4 columns)
3. ✅ Newsletter signup (Fluent Form or fallback)
4. ✅ Copyright with dynamic year
5. ✅ Privacy Policy & Terms links

**Status:** ✅ COMPLETE

---

## ✨ NICE TO HAVE (Optional)

### NH-01: Terms & Privacy Pages
**Time:** 30 min  
**Files:** `page-terms.php`, `page-privacy.php`  
**Tasks:**
1. Create generic terms template
2. Create generic privacy template
3. Add to footer links

**Status:** 🔄 Optional

---

### NH-02: Search Functionality
**Time:** 2 hours  
**Files:** `search.php`, `search-form.php`  
**Tasks:**
1. Create search results template
2. Style search form
3. Add search to header

**Status:** 🔄 Optional

---

### NH-03: Cookie Consent Banner
**Time:** 1 hour  
**Files:** `components/cookie-banner.php`  
**Tasks:**
1. Create cookie banner component
2. Add JavaScript for show/hide
3. Create cookie settings page

**Status:** 🔄 Optional

---

### NH-04: Blog/News Section
**Time:** 3 hours  
**Files:** `archive-news.php`, `single-news.php`  
**Tasks:**
1. Register News CPT (or use standard posts with separate category)
2. Create archive template
3. Create single template
4. Add to navigation

**Status:** 🔄 Optional

---

### NH-05: Performance Optimization
**Time:** 2 hours  
**Tasks:**
1. Optimize all images (WebP conversion)
2. Configure caching plugin
3. Set up CDN for assets
4. Minimize CSS/JS

**Status:** 🔄 Pre-deployment

---

### NH-06: Google Analytics Setup
**Time:** 30 min  
**Files:** `functions.php` (tracking option)  
**Tasks:**
1. Create GA4 property
2. Add tracking ID to BRESSEL Settings
3. Create event tracking for form submissions
4. Create conversion goals

**Status:** 🔄 Pre-deployment

---

## 📊 TECHNICAL DEBT

### TD-01: CSS Architecture
**Issue:** Styles scattered across `temp.css` and organized files  
**Solution:** Move all temp.css styles to proper component files  
**Time:** 2-3 hours

---

### TD-02: JavaScript Organization
**Issue:** All JS in `main.js` with comments  
**Solution:** Split into feature files (hero, ticker, modal, etc.)  
**Time:** 1-2 hours

---

### TD-03: Vite Config
**Issue:** Basic config, could be more optimized  
**Solution:** Add sourcemaps, env variables, build optimization  
**Time:** 1 hour

---

### TD-04: WordPress Security Hardening
**Issue:** Basic security only  
**Solution:** Add meta fields, CMB2 options, custom fields  
**Time:** 2 hours

---

## 🎯 MILESTONE: CLIENT PRESENTATION (Tomorrow)

### Must Complete:
- [x] QW-01: Academy URL (CPT slug changed)
- [x] QW-02: Community Template (switched to standard posts)
- [x] QW-03: Navigation Menu (created via WP-CLI)
- [x] QW-05: Footer Polish (social icons, dynamic year)
- [x] QW-06: Quote Carousel (CMB2 options, component, JS)
- [x] HV-01: Event CPT removed, using posts
- [x] HV-05: Content Population (coaches, merch, events)

### Still Needed (Manual WP Admin):
- [ ] QW-04: Fluent Forms creation (ID 1 & 2)
- [ ] Connect forms in templates if needed

**Total Time:** ~1 hour 30 min for automated tasks

---

## 🎯 DEMO CHECKLIST

### URLs to Verify:
- [ ] `http://localhost:8080/` - Homepage with quote carousel
- [ ] `http://localhost:8080/academy/` - Coach grid (4 coaches)
- [ ] `http://localhost:8080/community/` - Events grid (3 events)
- [ ] `http://localhost:8080/shop/` - Products (7 items)
- [ ] `http://localhost:8080/contact/` - Contact page
- [ ] `http://localhost:8080/contact/?intent=booking` - Pre-filled intent

### Visual Checks:
- [ ] Navigation menu appears (Home, Academy, Community, Shop, Contact)
- [ ] Mobile menu works
- [ ] Quote carousel auto-plays (6 second interval)
- [ ] Hero video plays correctly
- [ ] Footer has social icons and dynamic year

---

## 📈 PRIORITY MATRIX (Updated)

| Priority | Task | Status | Notes |
|----------|------|--------|-------|
| **1** | QW-01: Academy URL | ✅ | CPT slug changed |
| **2** | QW-02: Community Template | ✅ | Using standard posts |
| **3** | QW-03: Navigation | ✅ | WP-CLI created |
| **4** | QW-04: Fluent Forms | ⚠️ | Manual WP Admin needed |
| **5** | QW-05: Footer Polish | ✅ | Social icons, dynamic year |
| **6** | QW-06: Quote Carousel | ✅ | CMB2, component, JS |
| **7** | HV-01: Event CPT Switch | ✅ | Removed CPT, use posts |
| **8** | HV-02: Newsletter | ⚠️ | Pending Fluent Forms |
| **9** | HV-05: Content | ✅ | WP-CLI populated |
| **10** | HV-03: SEO | 🔄 | Post-demo |
| **11** | HV-04: CSS Refactor | 🔄 | Post-demo |

---

## 📝 WP-CLI Commands Used

```bash
# Menu Setup
wp menu create "Primary Menu"
wp menu item add-post primary-menu 31 --title="Home"
wp menu item add-post primary-menu 23 --title="Academy"
wp menu item add-post primary-menu 25 --title="Community"
wp menu item add-post primary-menu 15 --title="Shop"
wp menu item add-post primary-menu 34 --title="Contact"
wp menu location assign primary-menu primary

# Categories
wp term create category Event --slug=event
wp term create category Announcement --slug=announcement

# Coaches
wp post create --post_type=coach --post_title="Coach Jeremy" --post_status=publish
wp post meta update <ID> _bressel_coach_role "Head of Pro Training"
wp post meta update <ID> _bressel_coach_experience "12 Years"

# Merch
wp post create --post_type=merch --post_title="BRESSEL PADEL-X Pro" --post_status=publish
wp post meta update <ID> _bressel_merch_price "160.00"

# Events (standard posts)
wp post create --post_type=post --post_title="Malaysia Open Qualifiers 2026" --post_status=publish
wp post update <ID> --post_category=6
wp post meta update <ID> _bressel_event_date "2026-05-15"
wp post meta update <ID> _bressel_event_location "Kuala Lumpur, Malaysia"
```

---

**Last Updated:** April 16, 2026 - 7:30 PM  
**Next Review:** Before client presentation