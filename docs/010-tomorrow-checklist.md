# BRESSEL™ - Tomorrow's Client Presentation Checklist

**Target:** Complete by tomorrow's meeting

---

## ✅ Quick Wins (Total: ~1 hour 30 min)

### 1. Academy Template (`/academy/`) - 5 min
```bash
# Change Coach CPT slug from 'coaches' to 'academy'
# File: functions.php, line ~118
'rewrite' => array('slug' => 'academy'),
```

### 2. Community Template (`/community/`) - 30 min
- Register Event CPT with `/community/` slug
- Create `archive-event.php` template
- Add Event CMB2 fields (date, location)

### 3. Navigation Menu - 10 min
- Create Primary Menu in WordPress admin
- Add: Home, Academy, Community, Shop, Contact

### 4. Fluent Forms - 20 min
- Create Contact Form (ID: 1)
- Create Newsletter Form (ID: 2)
- Test form submissions

### 5. Footer Polish - 15 min
- Add dynamic year
- Add social links placeholders
- Complete copyright text

---

## 📋 Pre-Presentation Testing

### URLs to Check

- [ ] `http://localhost:8080/` - Homepage
- [ ] `http://localhost:8080/academy/` - Academy (should show coach grid)
- [ ] `http://localhost:8080/community/` - Community (should show event grid)
- [ ] `http://localhost:8080/shop/` - Shop (already working)
- [ ] `http://localhost:8080/contact/` - Contact form

### Visual Checks

- [ ] Hero video plays correctly
- [ ] Navigation menu appears
- [ ] Mobile menu works
- [ ] All buttons have hover states
- [ ] Footer displays correctly

---

## 🎯 Demo Script (5-7 min)

1. **Homepage** (2 min)
   - Show hero video + parallax effect
   - Scroll through program pillars
   - Show shop teaser with "Inquire" buttons

2. **Academy** (1 min)
   - Navigate to `/academy/`
   - Show coach cards
   - Click "Book Session" → goes to contact with intent

3. **Community** (1 min)
   - Navigate to `/community/`
   - Show events grid
   - Explain community features

4. **Shop** (1 min)
   - Navigate to `/shop/`
   - Show product cards
   - Explain "Inquire to Buy" flow (no WooCommerce bloat)

5. **Contact** (1 min)
   - Show unified form
   - Explain intent routing (booking vs purchase vs inquiry)

6. **Closing** (1 min)
   - Explain tech stack (Tailwind v4, Vite, Vanilla JS)
   - Mention performance focus
   - Ask for feedback

---

## 📝 Talking Points

### Why This Stack?

- **WordPress** - Client-friendly admin, 5-year future-proof
- **Tailwind v4** - Modern, classless approach, no bloat
- **Vite** - Lightning-fast development with HMR
- **No jQuery** - Clean, modern vanilla JS
- **No WooCommerce** - Lean "inquire" flow instead of full e-commerce

### Key Features

- **Unified Contact Form** - One form handles all intents (booking, purchase, inquiry)
- **Security-First** - CMB2 for custom fields, proper sanitization
- **Performance** - No page builder bloat, optimized assets
- **Brand-Aligned** - BRESSEL red/black/white, Oswald typography

### Next Steps (After Demo)

- Add real coach/event/merch data
- Set up SEO Framework
- Configure tracking (Google Analytics)
- Deploy to DigitalOcean

---

## 🔧 Commands Reference

```bash
# Start Docker
cd /home/matsu/Desktop/wp_bressel
docker compose up -d

# Start Vite dev server
cd twentytwentyfour-bressel
npm run dev

# Check WordPress status
docker compose ps

# View logs
docker compose logs -f wordpress
```

---

**Good luck with the presentation!** 🚀
