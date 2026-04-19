# AGENTS.md - BRESSEL™ WordPress Framework

Guidelines for AI agents working on the BRESSEL™ Padel WordPress framework.

---

## 🧠 Agentic Workflow & Expectations

This project uses an explicitly managed, AI-friendly agentic workflow. We prioritize solving real problems, active context management, and using trackable issue management (Backlog.md) over "vibe coding" with endless prompting. Ensure you follow the practices outlined below and in `docs/006-ai_agent_workflow_strategy.md`.

- **Active Persona**: KISE Engineer (applies minimalist, zero-bloat principles where applicable)
- **Primary AI Documentation**: Read `docs/006-ai_agent_workflow_strategy.md` for our core philosophies (handling context amnesia, using HTML for evaluation output, etc.)

### Important Notes for Agents

1. **Read First**: Before making changes, review `docs/006-ai_agent_workflow_strategy.md` regarding effective AI workflow execution.
2. **WordPress Context**: This is a WordPress project - PHP, Tailwind v4, and Vite are required (overrides Node.js-only preference)
3. **KISE Alignment**: Apply KISE principles to custom code, but respect WordPress conventions where necessary

---

## Build & Development Commands

```bash
# Development (HMR + live reload)
cd twentytwentyfour-bressel && npm run dev

# Production build (generates dist/ with manifest)
cd twentytwentyfour-bressel && npm run build

# Docker (from project root)
docker compose up -d
docker compose down

# WP-CLI content scaffolding
./setup-wp-content.sh

# Check WordPress installation
docker compose run --rm wp-cli core is-installed
```

**Note:** No test framework is currently configured. Add PHPUnit or Jest for testing if needed.

## Tech Stack Overview

- **PHP**: 8.2+ (modern syntax, no legacy code)
- **CSS**: Tailwind CSS v4 with classless approach (custom properties in `@theme`)
- **JS**: Vanilla ES6+ (strictly NO jQuery)
- **Build Tool**: Vite 6.x with live-reload plugin
- **CMS**: WordPress (child theme of Twenty Twenty-Four)
- **Data**: CMB2 for custom fields, Custom Post Types for content
- **Environment**: Docker (WordPress + MySQL + WP-CLI)

## Code Style Guidelines

### PHP Conventions

**Naming:**
- Functions: `bressel_function_name()` (lowercase with underscores, bressel prefix)
- Constants: `BRESSSELTHEME_VERSION` (uppercase with underscores)
- Classes: `Bressel_Class_Name` (PascalCase)
- Files: `file-name.php` (kebab-case)

**Structure:**
```php
<?php
/**
 * Title: Descriptive Title
 * Description: What this file does
 * How-to Use: Usage instructions
 */

// Security check first
if (!defined('ABSPATH')) {
    exit;
}

// Function definition
function bressel_example_function($param) {
    // Early return for invalid input
    if (empty($param)) {
        return false;
    }
    
    return sanitize_text_field($param);
}
add_action('init', 'bressel_example_function');
```

**Security:**
- Always use `esc_html()`, `esc_url()`, `esc_attr()` for output
- Use `sanitize_text_field()` for form inputs
- Use `wp_nonce_field()` + `wp_verify_nonce()` for forms
- Never trust user input - validate and sanitize everything

### CSS/Tailwind Conventions

**Classless Approach:**
Use CSS custom properties in `@theme` for global styles:
```css
@theme {
  --color-bressel-red: #E62E2D;
  --font-header: "Oswald", sans-serif;
}
```

**When to use Tailwind utilities:**
- Layouts: `grid`, `flex`, `md:grid-cols-3`
- Spacing: `p-4`, `my-8`, `gap-6`
- Component modifiers: `hover:`, `focus:`, `group-hover:`

**When to use semantic CSS:**
- Global typography in `@layer base`
- Custom components in `@layer components`
- Form overrides for third-party plugins

**BRESSEL Brand Colors:**
- Black: `#000000` (var: `--color-bressel-black`)
- White: `#ffffff` (var: `--color-bressel-white`)
- Red: `#E62E2D` (var: `--color-bressel-red`)
- Zinc scale: `--color-bressel-zinc-100` to `900`

### JavaScript Conventions

**No jQuery Rule:**
Always use vanilla JS:
```javascript
// Good
document.addEventListener('DOMContentLoaded', () => {
    const element = document.getElementById('mobile-menu');
    element.classList.add('hidden');
});

// Bad - don't use jQuery
// $('#mobile-menu').addClass('hidden');
```

**File Structure:**
- Main entry: `main.js` (imports CSS, initializes features)
- Feature-specific code in `main.js` with clear comments
- Use ES6+ features: arrow functions, destructuring, template literals

### Component Architecture (Astro-style)

All components live in `/components/` with standardized headers:

```php
<?php
/**
 * Title: Button Component
 * Description: Reusable button with variants
 * How-to Use: get_template_part('components/button', null, ['text' => 'Submit', 'variant' => 'solid']);
 */
$text = $args['text'] ?? 'Click Here';
$url = $args['url'] ?? '#';
?>
<a href="<?= esc_url($url) ?>" class="...">
    <?= esc_html($text) ?>
</a>
```

**Component Naming:**
- `component-name.php` (kebab-case)
- Use `$args` array for passing data
- Provide sensible defaults with null coalescing operator `??`

## File Organization

```
twentytwentyfour-bressel/
├── components/           # Reusable Astro-style components
├── dist/                 # Generated build assets (gitignored)
├── node_modules/         # NPM dependencies (gitignored)
├── archive-*.php         # Archive templates for CPTs
├── footer.php            # Site footer
├── front-page.php        # Homepage
├── functions.php         # Theme functions, CPTs, hooks
├── header.php            # Site header + nav
├── index.php             # Fallback template
├── main.css              # Tailwind entry + custom styles
├── main.js               # JS entry + feature initialization
├── page-*.php            # Page templates
├── single-*.php          # Single post templates for CPTs
├── style.css             # WP theme declaration
└── vite.config.js        # Vite configuration
```

## Error Handling Patterns

**PHP:**
```php
// Check if function exists before defining
if (!function_exists('bressel_setup')) {
    function bressel_setup() {
        // implementation
    }
}

// Defensive checks for WP functions
if (function_exists('new_cmb2_box')) {
    // CMB2-specific code
}
```

**Template Safety:**
```php
// Always escape output
$title = get_the_title();
echo esc_html($title);

// Check if image exists before output
if (has_post_thumbnail()) {
    the_post_thumbnail('large');
}
```

## Custom Post Types

**Registered CPTs:**
- `coach` - Academy coaches (archive: /coaches/)
- `merch` - Products/gear (archive: /shop/)
- `event` - Events/announcements (archive: /events/)

**Metadata Fields (CMB2):**
- Coach: `_bressel_coach_role`, `_bressel_coach_experience`
- Merch: `_bressel_merch_price`
- Global: `_bressel_tracking_scripts` (theme options)

## Plugin Dependencies

**Required:**
- CMB2 - Custom fields
- Fluent Forms - Contact/booking forms

**Recommended:**
- The SEO Framework - SEO
- FluentSMTP - Email delivery
- Imsanity - Image optimization
- Safe SVG - SVG uploads

**Forbidden:**
- jQuery (use vanilla JS)
- Elementor (use `template-canvas.php` escape hatch only)
- WooCommerce (use "Inquire to Buy" flow)

## WordPress Coding Standards

1. **Text Domain:** Use `'bressel'` for all translatable strings
2. **Nonces:** Verify with `wp_verify_nonce()` for form submissions
3. **Capabilities:** Check with `current_user_can()` before admin actions
4. **Hooks:** Use `add_action()` and `add_filter()` with proper priorities
5. **Assets:** Enqueue with `wp_enqueue_scripts` action, use version constants

## Development Workflow

1. Run `npm run dev` in theme directory for HMR
2. Access site at `http://localhost:8080`
3. Make changes to PHP/CSS/JS files
4. Vite auto-reloads browser on file changes
5. Run `npm run build` before committing to generate production assets
6. Use `./setup-wp-content.sh` to scaffold dummy content for testing

## Common Patterns

**URL Parameters for Unified Form:**
```php
$booking_url = add_query_arg([
    'intent' => 'booking',
    'target' => urlencode(get_the_title())
], home_url('/contact/'));
```

**Query Loop:**
```php
$query = new WP_Query([
    'post_type' => 'coach',
    'posts_per_page' => 3,
]);

if ($query->have_posts()) : 
    while ($query->have_posts()) : $query->the_post();
        get_template_part('components/card');
    endwhile;
    wp_reset_postdata();
endif;
```

## Questions?

Check the backlog tasks for context, or refer to:
- `README.md` - Project overview and Fluent Forms setup
- `docs/006-ai_agent_workflow_strategy.md` - AI Agent Workflow Strategy (handling context amnesia, evaluation, agent tracking)
- `agent_connect_to_wordpress.md` - WP-CLI usage guide
- Backlog document `doc-005` - MVP framework preferences

<!-- BACKLOG.MD GUIDELINES START -->
# Instructions for the usage of Backlog.md CLI Tool

## Backlog.md: Comprehensive Project Management Tool via CLI

### Assistant Objective

Efficiently manage all project tasks, status, and documentation using the Backlog.md CLI, ensuring all project metadata
remains fully synchronized and up-to-date.

### Core Capabilities

- ✅ **Task Management**: Create, edit, assign, prioritize, and track tasks with full metadata
- ✅ **Search**: Fuzzy search across tasks, documents, and decisions with `backlog search`
- ✅ **Acceptance Criteria**: Granular control with add/remove/check/uncheck by index
- ✅ **Definition of Done checklists**: Per-task DoD items with add/remove/check/uncheck
- ✅ **Board Visualization**: Terminal-based Kanban board (`backlog board`) and web UI (`backlog browser`)
- ✅ **Git Integration**: Automatic tracking of task states across branches
- ✅ **Dependencies**: Task relationships and subtask hierarchies
- ✅ **Documentation & Decisions**: Structured docs and architectural decision records
- ✅ **Export & Reporting**: Generate markdown reports and board snapshots
- ✅ **AI-Optimized**: `--plain` flag provides clean text output for AI processing

### Why This Matters to You (AI Agent)

1. **Comprehensive system** - Full project management capabilities through CLI
2. **The CLI is the interface** - All operations go through `backlog` commands
3. **Unified interaction model** - You can use CLI for both reading (`backlog task 1 --plain`) and writing (
   `backlog task edit 1`)
4. **Metadata stays synchronized** - The CLI handles all the complex relationships

### Key Understanding

- **Tasks** live in `backlog/tasks/` as `task-<id> - <title>.md` files
- **You interact via CLI only**: `backlog task create`, `backlog task edit`, etc.
- **Use `--plain` flag** for AI-friendly output when viewing/listing
- **Never bypass the CLI** - It handles Git, metadata, file naming, and relationships

---

# ⚠️ CRITICAL: NEVER EDIT TASK FILES DIRECTLY. Edit Only via CLI

**ALL task operations MUST use the Backlog.md CLI commands**

- ✅ **DO**: Use `backlog task edit` and other CLI commands
- ✅ **DO**: Use `backlog task create` to create new tasks
- ✅ **DO**: Use `backlog task edit <id> --check-ac <index>` to mark acceptance criteria
- ❌ **DON'T**: Edit markdown files directly
- ❌ **DON'T**: Manually change checkboxes in files
- ❌ **DON'T**: Add or modify text in task files without using CLI

**Why?** Direct file editing breaks metadata synchronization, Git tracking, and task relationships.

---

## 1. Source of Truth & File Structure

### 📖 **UNDERSTANDING** (What you'll see when reading)

- Markdown task files live under **`backlog/tasks/`** (drafts under **`backlog/drafts/`**)
- Files are named: `task-<id> - <title>.md` (e.g., `task-42 - Add GraphQL resolver.md`)
- Project documentation is in **`backlog/docs/`**
- Project decisions are in **`backlog/decisions/`**

### 🔧 **ACTING** (How to change things)

- **All task operations MUST use the Backlog.md CLI tool**
- This ensures metadata is correctly updated and the project stays in sync
- **Always use `--plain` flag** when listing or viewing tasks for AI-friendly text output

---

## 2. Common Mistakes to Avoid

### ❌ **WRONG: Direct File Editing**

```markdown
# DON'T DO THIS:

1. Open backlog/tasks/task-7 - Feature.md in editor
2. Change "- [ ]" to "- [x]" manually
3. Add notes or final summary directly to the file
4. Save the file
```

### ✅ **CORRECT: Using CLI Commands**

```bash
# DO THIS INSTEAD:
backlog task edit 7 --check-ac 1  # Mark AC #1 as complete
backlog task edit 7 --notes "Implementation complete"  # Add notes
backlog task edit 7 --final-summary "PR-style summary"  # Add final summary
backlog task edit 7 -s "In Progress" -a @agent-k  # Multiple commands: change status and assign the task when you start working on the task
```

---

## 3. Understanding Task Format (Read-Only Reference)

⚠️ **FORMAT REFERENCE ONLY** - The following sections show what you'll SEE in task files.
**Never edit these directly! Use CLI commands to make changes.**

### Task Structure You'll See

```markdown
---
id: task-42
title: Add GraphQL resolver
status: To Do
assignee: [@sara]
labels: [backend, api]
---

## Description

Brief explanation of the task purpose.

## Acceptance Criteria

<!-- AC:BEGIN -->

- [ ] #1 First criterion
- [x] #2 Second criterion (completed)
- [ ] #3 Third criterion

<!-- AC:END -->

## Definition of Done

<!-- DOD:BEGIN -->

- [ ] #1 Tests pass
- [ ] #2 Docs updated

<!-- DOD:END -->

## Implementation Plan

1. Research approach
2. Implement solution

## Implementation Notes

Progress notes captured during implementation.

## Final Summary

PR-style summary of what was implemented.
```

### How to Modify Each Section

| What You Want to Change | CLI Command to Use                                       |
|-------------------------|----------------------------------------------------------|
| Title                   | `backlog task edit 42 -t "New Title"`                    |
| Status                  | `backlog task edit 42 -s "In Progress"`                  |
| Assignee                | `backlog task edit 42 -a @sara`                          |
| Labels                  | `backlog task edit 42 -l backend,api`                    |
| Description             | `backlog task edit 42 -d "New description"`              |
| Add AC                  | `backlog task edit 42 --ac "New criterion"`              |
| Add DoD                 | `backlog task edit 42 --dod "Ship notes"`                |
| Check AC #1             | `backlog task edit 42 --check-ac 1`                      |
| Check DoD #1            | `backlog task edit 42 --check-dod 1`                     |
| Uncheck AC #2           | `backlog task edit 42 --uncheck-ac 2`                    |
| Uncheck DoD #2          | `backlog task edit 42 --uncheck-dod 2`                   |
| Remove AC #3            | `backlog task edit 42 --remove-ac 3`                     |
| Remove DoD #3           | `backlog task edit 42 --remove-dod 3`                    |
| Add Plan                | `backlog task edit 42 --plan "1. Step one\n2. Step two"` |
| Add Notes (replace)     | `backlog task edit 42 --notes "What I did"`              |
| Append Notes            | `backlog task edit 42 --append-notes "Another note"` |
| Add Final Summary       | `backlog task edit 42 --final-summary "PR-style summary"` |
| Append Final Summary    | `backlog task edit 42 --append-final-summary "Another detail"` |
| Clear Final Summary     | `backlog task edit 42 --clear-final-summary` |

---

## 4. Defining Tasks

### Creating New Tasks

**Always use CLI to create tasks:**

```bash
# Example
backlog task create "Task title" -d "Description" --ac "First criterion" --ac "Second criterion"
```

### Title (one liner)

Use a clear brief title that summarizes the task.

### Description (The "why")

Provide a concise summary of the task purpose and its goal. Explains the context without implementation details.

### Acceptance Criteria (The "what")

**Understanding the Format:**

- Acceptance criteria appear as numbered checkboxes in the markdown files
- Format: `- [ ] #1 Criterion text` (unchecked) or `- [x] #1 Criterion text` (checked)

**Managing Acceptance Criteria via CLI:**

⚠️ **IMPORTANT: How AC Commands Work**

- **Adding criteria (`--ac`)** accepts multiple flags: `--ac "First" --ac "Second"` ✅
- **Checking/unchecking/removing** accept multiple flags too: `--check-ac 1 --check-ac 2` ✅
- **Mixed operations** work in a single command: `--check-ac 1 --uncheck-ac 2 --remove-ac 3` ✅

```bash
# Examples

# Add new criteria (MULTIPLE values allowed)
backlog task edit 42 --ac "User can login" --ac "Session persists"

# Check specific criteria by index (MULTIPLE values supported)
backlog task edit 42 --check-ac 1 --check-ac 2 --check-ac 3  # Check multiple ACs
# Or check them individually if you prefer:
backlog task edit 42 --check-ac 1    # Mark #1 as complete
backlog task edit 42 --check-ac 2    # Mark #2 as complete

# Mixed operations in single command
backlog task edit 42 --check-ac 1 --uncheck-ac 2 --remove-ac 3

# ❌ STILL WRONG - These formats don't work:
# backlog task edit 42 --check-ac 1,2,3  # No comma-separated values
# backlog task edit 42 --check-ac 1-3    # No ranges
# backlog task edit 42 --check 1         # Wrong flag name

# Multiple operations of same type
backlog task edit 42 --uncheck-ac 1 --uncheck-ac 2  # Uncheck multiple ACs
backlog task edit 42 --remove-ac 2 --remove-ac 4    # Remove multiple ACs (processed high-to-low)
```

### Definition of Done checklist (per-task)

Definition of Done items are a second checklist in each task. Defaults come from `definition_of_done` in the project config file (`backlog/config.yml`, `.backlog/config.yml`, or `backlog.config.yml`) or from Web UI Settings, and can be disabled per task.

**Managing Definition of Done via CLI:**

```bash
# Add DoD items (MULTIPLE values allowed)
backlog task edit 42 --dod "Run tests" --dod "Update docs"

# Check/uncheck DoD items by index (MULTIPLE values supported)
backlog task edit 42 --check-dod 1 --check-dod 2
backlog task edit 42 --uncheck-dod 1

# Remove DoD items by index
backlog task edit 42 --remove-dod 2

# Create without defaults
backlog task create "Feature" --no-dod-defaults
```

**Key Principles for Good ACs:**

- **Outcome-Oriented:** Focus on the result, not the method.
- **Testable/Verifiable:** Each criterion should be objectively testable
- **Clear and Concise:** Unambiguous language
- **Complete:** Collectively cover the task scope
- **User-Focused:** Frame from end-user or system behavior perspective

Good Examples:

- "User can successfully log in with valid credentials"
- "System processes 1000 requests per second without errors"
- "CLI preserves literal newlines in description/plan/notes/final summary; `\\n` sequences are not auto‑converted"

Bad Example (Implementation Step):

- "Add a new function handleLogin() in auth.ts"
- "Define expected behavior and document supported input patterns"

### Task Breakdown Strategy

1. Identify foundational components first
2. Create tasks in dependency order (foundations before features)
3. Ensure each task delivers value independently
4. Avoid creating tasks that block each other

### Task Requirements

- Tasks must be **atomic** and **testable** or **verifiable**
- Each task should represent a single unit of work for one PR
- **Never** reference future tasks (only tasks with id < current task id)
- Ensure tasks are **independent** and don't depend on future work

---

## 5. Implementing Tasks

### 5.1. First step when implementing a task

The very first things you must do when you take over a task are:

* set the task in progress
* assign it to yourself

```bash
# Example
backlog task edit 42 -s "In Progress" -a @{myself}
```

### 5.2. Review Task References and Documentation

Before planning, check if the task has any attached `references` or `documentation`:
- **References**: Related code files, GitHub issues, or URLs relevant to the implementation
- **Documentation**: Design docs, API specs, or other materials for understanding context

These are visible in the task view output. Review them to understand the full context before drafting your plan.

### 5.3. Create an Implementation Plan (The "how")

Previously created tasks contain the why and the what. Once you are familiar with that part you should think about a
plan on **HOW** to tackle the task and all its acceptance criteria. This is your **Implementation Plan**.
First do a quick check to see if all the tools that you are planning to use are available in the environment you are
working in.
When you are ready, write it down in the task so that you can refer to it later.

```bash
# Example
backlog task edit 42 --plan "1. Research codebase for references\n2Research on internet for similar cases\n3. Implement\n4. Test"
```

## 5.4. Implementation

Once you have a plan, you can start implementing the task. This is where you write code, run tests, and make sure
everything works as expected. Follow the acceptance criteria one by one and MARK THEM AS COMPLETE as soon as you
finish them.

### 5.5 Implementation Notes (Progress log)

Use Implementation Notes to log progress, decisions, and blockers as you work.
Append notes progressively during implementation using `--append-notes`:

```
backlog task edit 42 --append-notes "Investigated root cause" --append-notes "Added tests for edge case"
```

```bash
# Example
backlog task edit 42 --notes "Initial implementation done; pending integration tests"
```

### 5.6 Final Summary (PR description)

When you are done implementing a task you need to prepare a PR description for it.
Because you cannot create PRs directly, write the PR as a clean summary in the Final Summary field.

**Quality bar:** Write it like a reviewer will see it. A one‑liner is rarely enough unless the change is truly trivial.
Include the key scope so someone can understand the impact without reading the whole diff.

```bash
# Example
backlog task edit 42 --final-summary "Implemented pattern X because Reason Y; updated files Z and W; added tests"
```

**IMPORTANT**: Do NOT include an Implementation Plan when creating a task. The plan is added only after you start the
implementation.

- Creation phase: provide Title, Description, Acceptance Criteria, and optionally labels/priority/assignee.
- When you begin work, switch to edit, set the task in progress and assign to yourself
  `backlog task edit <id> -s "In Progress" -a "..."`.
- Think about how you would solve the task and add the plan: `backlog task edit <id> --plan "..."`.
- After updating the plan, share it with the user and ask for confirmation. Do not begin coding until the user approves the plan or explicitly tells you to skip the review.
- Append Implementation Notes during implementation using `--append-notes` as progress is made.
- Add Final Summary only after completing the work: `backlog task edit <id> --final-summary "..."` (replace) or append using `--append-final-summary`.

## Phase discipline: What goes where

- Creation: Title, Description, Acceptance Criteria, labels/priority/assignee.
- Implementation: Implementation Plan (after moving to In Progress and assigning to yourself) + Implementation Notes (progress log, appended as you work).
- Wrap-up: Final Summary (PR description), verify AC and Definition of Done checks.

**IMPORTANT**: Only implement what's in the Acceptance Criteria. If you need to do more, either:

1. Update the AC first: `backlog task edit 42 --ac "New requirement"`
2. Or create a new follow up task: `backlog task create "Additional feature"`

---

## 6. Typical Workflow

```bash
# 1. Identify work
backlog task list -s "To Do" --plain

# 2. Read task details
backlog task 42 --plain

# 3. Start work: assign yourself & change status
backlog task edit 42 -s "In Progress" -a @myself

# 4. Add implementation plan
backlog task edit 42 --plan "1. Analyze\n2. Refactor\n3. Test"

# 5. Share the plan with the user and wait for approval (do not write code yet)

# 6. Work on the task (write code, test, etc.)

# 7. Mark acceptance criteria as complete (supports multiple in one command)
backlog task edit 42 --check-ac 1 --check-ac 2 --check-ac 3  # Check all at once
# Or check them individually if preferred:
# backlog task edit 42 --check-ac 1
# backlog task edit 42 --check-ac 2
# backlog task edit 42 --check-ac 3

# 8. Add Final Summary (PR Description)
backlog task edit 42 --final-summary "Refactored using strategy pattern, updated tests"

# 9. Mark task as done
backlog task edit 42 -s Done
```

---

## 7. Definition of Done (DoD)

A task is **Done** only when **ALL** of the following are complete:

### ✅ Via CLI Commands:

1. **All acceptance criteria checked**: Use `backlog task edit <id> --check-ac <index>` for each
2. **All Definition of Done items checked**: Use `backlog task edit <id> --check-dod <index>` for each
3. **Final Summary added**: Use `backlog task edit <id> --final-summary "..."`
4. **Status set to Done**: Use `backlog task edit <id> -s Done`

### ✅ Via Code/Testing:

5. **Tests pass**: Run test suite and linting
6. **Documentation updated**: Update relevant docs if needed
7. **Code reviewed**: Self-review your changes
8. **No regressions**: Performance, security checks pass

⚠️ **NEVER mark a task as Done without completing ALL items above**

---

## 8. Finding Tasks and Content with Search

When users ask you to find tasks related to a topic, use the `backlog search` command with `--plain` flag:

```bash
# Search for tasks about authentication
backlog search "auth" --plain

# Search only in tasks (not docs/decisions)
backlog search "login" --type task --plain

# Search with filters
backlog search "api" --status "In Progress" --plain
backlog search "bug" --priority high --plain
```

**Key points:**
- Uses fuzzy matching - finds "authentication" when searching "auth"
- Searches task titles, descriptions, and content
- Also searches documents and decisions unless filtered with `--type task`
- Always use `--plain` flag for AI-readable output

---

## 9. Quick Reference: DO vs DON'T

### Viewing and Finding Tasks

| Task         | ✅ DO                        | ❌ DON'T                         |
|--------------|-----------------------------|---------------------------------|
| View task    | `backlog task 42 --plain`   | Open and read .md file directly |
| List tasks   | `backlog task list --plain` | Browse backlog/tasks folder     |
| Check status | `backlog task 42 --plain`   | Look at file content            |
| Find by topic| `backlog search "auth" --plain` | Manually grep through files |

### Modifying Tasks

| Task          | ✅ DO                                 | ❌ DON'T                           |
|---------------|--------------------------------------|-----------------------------------|
| Check AC      | `backlog task edit 42 --check-ac 1`  | Change `- [ ]` to `- [x]` in file |
| Add notes     | `backlog task edit 42 --notes "..."` | Type notes into .md file          |
| Add final summary | `backlog task edit 42 --final-summary "..."` | Type summary into .md file |
| Change status | `backlog task edit 42 -s Done`       | Edit status in frontmatter        |
| Add AC        | `backlog task edit 42 --ac "New"`    | Add `- [ ] New` to file           |

---

## 10. Complete CLI Command Reference

### Task Creation

| Action           | Command                                                                             |
|------------------|-------------------------------------------------------------------------------------|
| Create task      | `backlog task create "Title"`                                                       |
| With description | `backlog task create "Title" -d "Description"`                                      |
| With AC          | `backlog task create "Title" --ac "Criterion 1" --ac "Criterion 2"`                 |
| With final summary | `backlog task create "Title" --final-summary "PR-style summary"`                 |
| With references  | `backlog task create "Title" --ref src/api.ts --ref https://github.com/issue/123`   |
| With documentation | `backlog task create "Title" --doc https://design-docs.example.com`               |
| With all options | `backlog task create "Title" -d "Desc" -a @sara -s "To Do" -l auth --priority high --ref src/api.ts --doc docs/spec.md` |
| Create draft     | `backlog task create "Title" --draft`                                               |
| Create subtask   | `backlog task create "Title" -p 42`                                                 |

### Task Modification

| Action           | Command                                     |
|------------------|---------------------------------------------|
| Edit title       | `backlog task edit 42 -t "New Title"`       |
| Edit description | `backlog task edit 42 -d "New description"` |
| Change status    | `backlog task edit 42 -s "In Progress"`     |
| Assign           | `backlog task edit 42 -a @sara`             |
| Add labels       | `backlog task edit 42 -l backend,api`       |
| Set priority     | `backlog task edit 42 --priority high`      |

### Acceptance Criteria Management

| Action              | Command                                                                     |
|---------------------|-----------------------------------------------------------------------------|
| Add AC              | `backlog task edit 42 --ac "New criterion" --ac "Another"`                  |
| Remove AC #2        | `backlog task edit 42 --remove-ac 2`                                        |
| Remove multiple ACs | `backlog task edit 42 --remove-ac 2 --remove-ac 4`                          |
| Check AC #1         | `backlog task edit 42 --check-ac 1`                                         |
| Check multiple ACs  | `backlog task edit 42 --check-ac 1 --check-ac 3`                            |
| Uncheck AC #3       | `backlog task edit 42 --uncheck-ac 3`                                       |
| Mixed operations    | `backlog task edit 42 --check-ac 1 --uncheck-ac 2 --remove-ac 3 --ac "New"` |

### Task Content

| Action           | Command                                                  |
|------------------|----------------------------------------------------------|
| Add plan         | `backlog task edit 42 --plan "1. Step one\n2. Step two"` |
| Add notes        | `backlog task edit 42 --notes "Implementation details"`  |
| Add final summary | `backlog task edit 42 --final-summary "PR-style summary"` |
| Append final summary | `backlog task edit 42 --append-final-summary "More details"` |
| Clear final summary | `backlog task edit 42 --clear-final-summary` |
| Add dependencies | `backlog task edit 42 --dep task-1 --dep task-2`         |
| Add references   | `backlog task edit 42 --ref src/api.ts --ref https://github.com/issue/123` |
| Add documentation | `backlog task edit 42 --doc https://design-docs.example.com --doc docs/spec.md` |

### Multi‑line Input (Description/Plan/Notes/Final Summary)

The CLI preserves input literally. Shells do not convert `\n` inside normal quotes. Use one of the following to insert real newlines:

- Bash/Zsh (ANSI‑C quoting):
  - Description: `backlog task edit 42 --desc $'Line1\nLine2\n\nFinal'`
  - Plan: `backlog task edit 42 --plan $'1. A\n2. B'`
  - Notes: `backlog task edit 42 --notes $'Done A\nDoing B'`
  - Append notes: `backlog task edit 42 --append-notes $'Progress update line 1\nLine 2'`
  - Final summary: `backlog task edit 42 --final-summary $'Shipped A\nAdded B'`
  - Append final summary: `backlog task edit 42 --append-final-summary $'Added X\nAdded Y'`
- POSIX portable (printf):
  - `backlog task edit 42 --notes "$(printf 'Line1\nLine2')"`
- PowerShell (backtick n):
  - `backlog task edit 42 --notes "Line1`nLine2"`

Do not expect `"...\n..."` to become a newline. That passes the literal backslash + n to the CLI by design.

Descriptions support literal newlines; shell examples may show escaped `\\n`, but enter a single `\n` to create a newline.

### Implementation Notes Formatting

- Keep implementation notes concise and time-ordered; focus on progress, decisions, and blockers.
- Use short paragraphs or bullet lists instead of a single long line.
- Use Markdown bullets (`-` for unordered, `1.` for ordered) for readability.
- When using CLI flags like `--append-notes`, remember to include explicit
  newlines. Example:

  ```bash
  backlog task edit 42 --append-notes $'- Added new API endpoint\n- Updated tests\n- TODO: monitor staging deploy'
  ```

### Final Summary Formatting

- Treat the Final Summary as a PR description: lead with the outcome, then add key changes and tests.
- Keep it clean and structured so it can be pasted directly into GitHub.
- Prefer short paragraphs or bullet lists and avoid raw progress logs.
- Aim to cover: **what changed**, **why**, **user impact**, **tests run**, and **risks/follow‑ups** when relevant.
- Avoid single‑line summaries unless the change is truly tiny.

**Example (good, not rigid):**
```
Added Final Summary support across CLI/MCP/Web/TUI to separate PR summaries from progress notes.

Changes:
- Added `finalSummary` to task types and markdown section parsing/serialization (ordered after notes).
- CLI/MCP/Web/TUI now render and edit Final Summary; plain output includes it.

Tests:
- bun test src/test/final-summary.test.ts
- bun test src/test/cli-final-summary.test.ts
```

### Task Operations

| Action             | Command                                      |
|--------------------|----------------------------------------------|
| View task          | `backlog task 42 --plain`                    |
| List tasks         | `backlog task list --plain`                  |
| Search tasks       | `backlog search "topic" --plain`              |
| Search with filter | `backlog search "api" --status "To Do" --plain` |
| Filter by status   | `backlog task list -s "In Progress" --plain` |
| Filter by assignee | `backlog task list -a @sara --plain`         |
| Archive task       | `backlog task archive 42`                    |
| Demote to draft    | `backlog task demote 42`                     |

---

## Common Issues

| Problem              | Solution                                                           |
|----------------------|--------------------------------------------------------------------|
| Task not found       | Check task ID with `backlog task list --plain`                     |
| AC won't check       | Use correct index: `backlog task 42 --plain` to see AC numbers     |
| Changes not saving   | Ensure you're using CLI, not editing files                         |
| Metadata out of sync | Re-edit via CLI to fix: `backlog task edit 42 -s <current-status>` |

---

## Remember: The Golden Rule

**🎯 If you want to change ANYTHING in a task, use the `backlog task edit` command.**
**📖 Use CLI to read tasks, exceptionally READ task files directly, never WRITE to them.**

Full help available: `backlog --help`

<!-- BACKLOG.MD GUIDELINES END -->

---

## CSS Architecture - Import Structure

**Date:** 2026-04-15  
**Scope:** `@twentytwentyfour-bressel/src/main.css`

### Full Import Structure

```css
/* 1. Tailwind v4 */
@import "tailwindcss";

/* 2. Components (@layer components) */
@import './css/components/layout.css';
@import './css/components/buttons.css';
@import './css/components/header.css';
@import './css/components/forms.css';
@import './css/components/faq.css';
@import './css/components/modal.css';

/* 4. Modifiers & Animations */
@import './css/modifiers/effects.css';

/* 5. Utilities & Helpers */
@import './css/utilities/helpers.css';
```

### File Organization

| Directory | Files | Purpose |
|-----------|-------|--------|
| `base/` | `theme.css` | @theme directive, CSS custom properties, @layer base |
| `components/` | `layout.css` | Section padding, container, gradient text, accent bar |
| | `buttons.css` | Button system with variants (solid, outline) and sizes (sm, md, lg) |
| | `header.css` | Header scroll transitions, desktop navigation |
| | `forms.css` | Fluent Forms dark mode styling |
| | `faq.css` | FAQ accordion styles |
| | `modal.css` | Mobile menu & modal overlay |
| `modifiers/` | `effects.css` | Button ripple, glow effects, animations, parallax |
| `utilities/` | `helpers.css` | Form validation states, hero section, ticker animation, watermark |

### Key Notes

1. **@theme is inline** - CSS custom properties are defined directly in `main.css` (not imported)
2. **Components use `@layer components`** - They can be overridden by utilities
3. **Modifiers include animations** - Keyframes for fade-in-up, ticker scroll, button spin
4. **Utilities include helper classes** - `.text-center`, `.overflow-hidden`, `.flex-center`, `.gradient-text`
5. **WordPress overrides are unlayered** - Keep outside `@layer base` to beat Gutenberg's global-styles

### Build Process

```bash
# Development (HMR + live reload)
cd twentytwentyfour-bressel && npm run dev

# Production build
cd twentytwentyfour-bressel && npm run build
```

---

## CSS Cleanup Log - Zinc Scale Standardization

**Date:** 2026-04-15  
**Scope:** `@twentytwentyfour-bressel/src/css/`

### Changes Applied

#### 1. `src/css/base/theme.css`
**Action:** Removed all commented-out odd zinc values  
**Result:** Zinc scale now contains only 4 even values:
- `--color-bressel-zinc-200: #e4e4e7;`
- `--color-bressel-zinc-400: #a1a1aa;`
- `--color-bressel-zinc-600: #52525b;`
- `--color-bressel-zinc-800: #27272a;`

**Removed (commented out):**
- `--color-bressel-zinc-100`
- `--color-bressel-zinc-300`
- `--color-bressel-zinc-500`
- `--color-bressel-zinc-700`
- `--color-bressel-zinc-900`

#### 2. `src/css/components/forms.css`
**Action:** Replaced odd zinc with nearest even equivalent  
**Change:** Line 11 - `var(--color-bressel-zinc-900)` → `var(--color-bressel-zinc-800)`

### Rationale

Minimalist KISE-aligned design philosophy - reducing CSS bloat while maintaining sufficient grayscale variation for monochrome sections. The 4 even values provide adequate contrast hierarchy without the overhead of a full 9-value scale.

### Verification

```bash
grep -rn "zinc-[13579]" twentytwentyfour-bressel/src/css/
# Result: No odd zinc values found
```

---

## CSS Structure Update - Tailwind v4 @base Directive Test

**Date:** 2026-04-15  
**Scope:** `@twentytwentyfour-bressel/src/main.css`

### Architecture Note

**CSS Import Path:** `src/main.js` → imports `./src/main.css` → builds to `dist/`

### Changes Applied

#### `src/main.css`
**Action:** Added Tailwind v4 `@base` directive with custom base styles

**New @base Styles Added:**

1. **Global Typography**
   - `body`: Uses `--font-body`, `--color-bressel-white`, `--color-bressel-black`
   - Headings (`h1-h6`): Uses `--font-header` with tight line-height

2. **Links**
   - Red (`--color-bressel-red`) with white hover state
   - Smooth color transition

3. **Buttons**
   - Header font, uppercase, letter-spacing for brand consistency

4. **Form Elements**
   - Body font for consistency

5. **Utility Classes**
   - `.text-center` - text alignment
   - `.overflow-hidden` - overflow control
   - `.flex-center` - flexbox centering
   - `.gradient-text` - gradient text effect (red→yellow)

### Verification

```bash
cat src/main.css | grep -A 50 "@base"
```

### Notes

- The `@base` directive allows semantic CSS alongside Tailwind utility classes
- Mix of semantic base styles + utility classes is the recommended approach
- Can enable component imports later when needed:
  - `layout.css`, `buttons.css`, `header.css`, `forms.css`, `faq.css`, `modal.css`

---

## CSS Order Fix - Gutenberg Global Styles Override

**Date:** 2026-04-15  
**Scope:** `@twentytwentyfour-bressel/functions.php`

### Problem

WordPress's Gutenberg editor injects **global styles** via the `global-styles` handler. These styles use CSS custom properties like `--wp-preset--color-...` and apply at a high specificity level, which was overriding our custom Tailwind/base styles.

The inline styles appear as `<style id="global-styles-inline-css">` in the page head.

### Solution Applied

Added `'global-styles'` as a dependency to ensure our Vite CSS loads **after** Gutenberg's global styles. (Note: The correct handle is `'global-styles'`, not `'wp-global-styles'`.)

#### Changes in `functions.php`

**1. Manifest-based CSS enqueue (line 61-68):**
```php
wp_enqueue_style(
    'bressel-main-style-' . $index,
    $dist_uri . '/' . $css_file,
    array('global-styles'), // ← Added dependency
    BRESSSELTHEME_VERSION
);
```

**2. Fallback direct CSS enqueue (line 71):**
```php
wp_enqueue_style(
    'bressel-tailwind', 
    $dist_uri . '/main.css', 
    array('global-styles'), // ← Added dependency
    BRESSSELTHEME_VERSION
);
```

### How It Works

WordPress's dependency system ensures that when you add a dependency like `'global-styles'`, WordPress will automatically enqueue that dependency first, then your stylesheet. This guarantees the correct load order:

1. Gutenberg global styles (`global-styles`) ← loaded first
2. Our Vite/Tailwind styles (`bressel-main-style-*` or `bressel-tailwind`) ← loaded second, can override

### Verification

**Command-line check:**
```bash
# In WordPress root directory
wp eval 'global $wp_styles; echo "global-styles deps: "; print_r($wp_styles->registered["global-styles"]->deps);'
# Should output: Array ( )
```

**Page source check:**
```html
<!-- Should see: global-styles loaded BEFORE bressel-tailwind -->
<style id="global-styles-inline-css">...</style>
<link rel='stylesheet' id='bressel-tailwind-css' ... />
```

Or inspect an element that was being overridden and verify your custom styles are applied.

### Notes

- No need to manually adjust `add_action` priority - WordPress dependency system handles this
- The correct handle is `'global-styles'` (not `'wp-global-styles'`)
- This fix applies to both production (manifest) and fallback modes

### Critical Issue: Tailwind v4 Native CSS Layers

**Date:** 2026-04-15  
**Scope:** `@twentytwentyfour-bressel/src/main.css`

---

#### The Core Problem

**Tailwind v4 now uses Native CSS Cascade Layers** directly in the browser, not a compiled "fake" layer like v3.

---

#### The Golden Rule of Native CSS Layers

**Unlayered CSS ALWAYS overrides Layered CSS, regardless of specificity.**

```css
/* Even with MASSIVE specificity inside @layer base, this LOSES: */
@layer base {
  html body main article div.content h1#super-title { 
    color: white; 
  }
}

/* This simple unlayered rule WINS: */
h1 { color: black; }
```

**Why?** WordPress's `global-styles` is **unlayered** (no `@layer` directive). Your styles inside `@layer base` are **layered**. The browser ignores specificity and WordPress wins automatically.

---

#### Why WordPress Wins

| Style | Layered? | Query Monitor Position | Result |
|-------|----------|------------------------|--------|
| WordPress `global-styles` | ❌ Unlayered | Position 6 | **Wins** |
| Your CSS (inside @layer base) | ✅ Layered | Position 8 | Loses |
| Your CSS (outside @layer base) | ❌ Unlayered | Position 8 | **Wins** |

---

#### Solution: Keep WordPress Override Styles Unlayered

Move base styles that need to override WordPress OUTSIDE of `@layer base`:

```css
/* ====== LAYERED STYLES ====== */
/* Put CSS you want utilities to easily override HERE */
@layer base {
  :root {
    --color-bressel-white: #ffffff;
    --color-bressel-black: #000000;
  }
}

/* ====== UNLAYERED STYLES (WordPress Overrides) ====== */
/* Keep HTML tag overrides OUTSIDE @layer base */

html body {
  font-family: var(--font-body);
  color: var(--color-bressel-white);
  background-color: var(--color-bressel-black);
  line-height: 1.6;
}

h1, h2, h3, h4, h5, h6 {
  font-family: var(--font-header);
  line-height: 1.2;
  margin-bottom: 0.75rem;
  color: var(--color-bressel-white);
}

a {
  color: var(--color-bressel-red);
  transition: color 0.2s ease;
}

a:hover {
  color: var(--color-bressel-white);
}
```

**Why this works:**

By keeping your WordPress override styles **unlayered**, they respect source order. Your Position 8 enqueued CSS wins over WordPress's Position 6 because both are now on the same "unlayered" playing field.


