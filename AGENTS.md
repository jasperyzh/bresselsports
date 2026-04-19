# AGENTS.md — BRESSEL™ WordPress Framework (SUB)

> Inherits all rules from MAIN AGENTS.md at `~/ai_autoresearch/AGENTS.md`

---

## Overrides

- **CSS:** Tailwind v4 + BRESSEL brand tokens (not classless CSS)
- **Build:** Vite (not Astro)
- **Runtime:** PHP + WordPress conventions apply

## Adds

- WordPress context: use `wp_enqueue_scripts`, respect WP coding standards
- Theme: Twenty Twenty-Four base, custom child theme
- Deploy: WP Engine push via git (not npm publish)
- Admin panel: CLI-based task management (see `/docs/006-ai_agent_workflow_strategy.md`)

## References

- `/docs/006-ai_agent_workflow_strategy.md` — Core AI workflow
- `/docs/` — All detailed WP conventions, CLI commands, patterns
- MAIN AGENTS.md — Shared rules (naming, commits, git, deletion)

---

## Quick WP Commands

```bash
# Dev (HMR + live reload)
npm run dev

# Prod build
npm run build

# WP Coding Standards
npm run lint:php
```

---

**Inherits:** MAIN AGENTS.md
**Last Updated:** 260419
