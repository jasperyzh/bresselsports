# 📦 Archive & Consolidation Plan

**Date:** 2026-04-17  
**Purpose:** Clean up root folder and consolidate documentation to avoid duplication.

---

## 🗂️ ARCHIVE LIST (Manual Move by User)

### 1. `bressel--docs/` → `docs/archive/brand-assets/`
**Content:** PDF brand files, invoices, brand research (~550 MB)
```
260325-bressel - homepage v1.pdf          (6 MB) — Design reference
BRESSEL - Pitch Deck.pdf                   (19 MB) — Reference only
Bressel™ - 01. Brand Research.pdf          (547 MB) — Reference only
inv-0261004-bressel--invoice_*.pdf         (120 KB) — Invoice
ci_guide--/                              — CI guide
downloaded_files--/                      — Downloaded files
images--/                                — Brand images
mockup--/                                — Mockup images
```
**Action:** Move entire `bressel--docs/` folder to `docs/archive/brand-assets/`

---

### 2. `mockups/` → `docs/archive/mockups/`
**Content:** Design mockup screenshots (434 KB)
```
mockup.jpg                              (434 KB)
raw/                                    — Raw mockup files
```
**Action:** Move entire `mockups/` folder to `docs/archive/mockups/`

---

### 3. `extra_flair/` → `docs/archive/screenshots/`
**Content:** Dev iteration screenshots, noise effect tests (~15 MB)
```
draft_mockup--Academy - Coaches & Programs.jpg    (967 KB)
draft_mockup--BRESSEL PRO - Merch Catalog.jpg     (917 KB)
draft_mockup--Community - Clubs & Events.jpg      (1.1 MB)
footer-hidden.png                               (536 KB)
noise_effect-Screenshot From 2026-04-17 02-52-05.png (1.7 MB)
noise_effect-Screenshot From 2026-04-17 02-52-11.png (1.2 MB)
noise--.png                                    (232 KB)
Screenshot From 2026-04-17 02-48-43.png         (310 KB)
Screenshot From 2026-04-17 02-48-48.png         (445 KB)
[... 15 more screenshot PNGs ...]
beyond.svg                                     (5 KB)  ← ALREADY IN assets/brand/
the_surge--*.png                               (25-538 KB)
```
**Action:** Move `extra_flair/*.png` files to `docs/archive/screenshots/` (keep SVGs in `assets/brand/`)

---

### 4. Root folder files to DELETE
```
current_view--localhost_8080_ (2).png   (11 MB) — Large screenshot
fix-functions.php                       (606 B) — Outdated standalone fix
readme--placeholder_items.md            (992 B) — Outdated placeholder docs
```

---

## 📝 DOCUMENT CONSOLIDATION PLAN

### Keep (Active Docs)
| File | Size | Reason |
|------|------|--------|
| `001-project_master_plan.md` | 8.7 KB | Project blueprint |
| `002-initial_environment_setup.md` | 3.1 KB | Setup guide |
| `003-wp_cli_agent_connection.md` | 2.0 KB | WP-CLI guide |
| `004-digitalocean_ubuntu_wordpress_setup.md` | 4.2 KB | DO setup (if applicable) |
| `005-digitalocean_deployment_guide.md` | 3.8 KB | DO deployment (if applicable) |
| `006-ai_agent_workflow_strategy.md` | 4.2 KB | AI agent workflow |
| `009-client-presentation-review.md` | 14.8 KB | Reference doc |
| `git-worktree-guide.md` | 5.5 KB | Useful reference |

### Archive (Outdated/Superseded)
| File | Size | Reason | Action |
|------|------|--------|--------|
| `007-homepage_implementation_plan.md` | 6.3 KB | Completed, superseded by CHANGELOG.md | → `docs/archive/plans/` |
| `008-css_classless_refactor_plan.md` | 4.5 KB | Completed, superseded by CHANGELOG.md | → `docs/archive/plans/` |
| `010-tomorrow-checklist.md` | 3.3 KB | Outdated checklist | DELETE |
| `011-comprehensive-todo-list.md` | 11.3 KB | Replaced by TODO.md + backlog | → `docs/archive/plans/` |
| `012-fix-summary.md` | 2.5 KB | Superseded by CHANGELOG.md | → `docs/archive/plans/` |
| `013-documentation-summary.md` | 3.3 KB | Redundant | DELETE |
| `014-ui-components-demo-release-notes.md` | 4.9 KB | Superseded by CHANGELOG.md | → `docs/archive/plans/` |
| `bressel_plan_and_workflow.md` | 7.7 KB | Content merged into 001 | → `docs/archive/plans/` |
| `cleanup-log.md` | 3.5 KB | Superseded by CHANGELOG.md | → `docs/archive/plans/` |
| `cleanup-summary.md` | 3.0 KB | Superseded by CHANGELOG.md | → `docs/archive/plans/` |
| `css-refactor-plan.md` | 4.2 KB | Completed, superseded by CHANGELOG.md | → `docs/archive/plans/` |

### Delete (Dev Artifacts)
| File | Size | Reason |
|------|------|--------|
| `eval-hero.html` | 2.3 KB | Dev eval artifact |
| `eval-task-13.1.html` | 2.1 KB | Dev eval artifact |
| `eval-teaser-cards.html` | 4.6 KB | Dev eval artifact |

---

## 📁 NEW DOCS STRUCTURE (After Consolidation)

```
docs/
├── 001-project_master_plan.md           ← KEEP
├── 002-initial_environment_setup.md     ← KEEP
├── 003-wp_cli_agent_connection.md       ← KEEP
├── 004-digitalocean_ubuntu_wordpress_setup.md  ← KEEP (if using DO)
├── 005-digitalocean_deployment_guide.md  ← KEEP (if using DO)
├── 006-ai_agent_workflow_strategy.md    ← KEEP
├── 009-client-presentation-review.md    ← KEEP
├── git-worktree-guide.md                ← KEEP
└── archive/                             ← NEW DIRECTORY
    ├── brand-assets/                    ← from bressel--docs/
    ├── mockups/                         ← from mockups/
    ├── screenshots/                     ← from extra_flair/ PNGs
    └── plans/                           ← archived plan files
```

---

## ✅ EXECUTION CHECKLIST

- [ ] Create `docs/archive/` directory
- [ ] Create `docs/archive/brand-assets/`
- [ ] Create `docs/archive/mockups/`
- [ ] Create `docs/archive/screenshots/`
- [ ] Create `docs/archive/plans/`
- [ ] Move `bressel--docs/` → `docs/archive/brand-assets/`
- [ ] Move `mockups/` → `docs/archive/mockups/`
- [ ] Move `extra_flair/*.png` → `docs/archive/screenshots/`
- [ ] Move plan files → `docs/archive/plans/`
- [ ] Delete outdated plan files (010, 013)
- [ ] Delete eval artifacts (3 HTML files)
- [ ] Delete root folder files (fix-functions.php, readme--placeholder_items.md, 11MB PNG)
