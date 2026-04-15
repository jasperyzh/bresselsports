# Git Worktree Guide for BRESSEL™ WordPress Framework

**Purpose:** Isolate feature branches, experiments, and hotfixes without multiple Git clones.

---

## 🎯 Why Use Git Worktree?

### Problem: WordPress Development Constraints
- Vite dev server + Docker environment already running
- Need to test a feature branch without stopping current work
- Hotfix needed while on a long-running feature
- Experiments that might break the build

### Solution: Git Worktree
Multiple working directories linked to the same Git repository. Each worktree is a full branch checkout, sharing `.git` data.

---

## 📚 Quick Reference

| Command | Purpose |
|---------|---------|
| `git worktree add <path> <branch>` | Create new worktree |
| `git worktree list` | List all worktrees |
| `git worktree remove <path>` | Remove worktree |
| `git worktree prune` | Clean stale entries |
| `git worktree move <old> <new>` | Move worktree location |

---

## 🚀 Recommended Setup for BRESSEL

### 1. Check Current Worktrees
```bash
git worktree list
```

**Output example:**
```
main    /home/matsu/Desktop/wp_bressel (main)
```

### 2. Create Feature Worktree
```bash
# Create a worktree for a new feature
git workworktree add ../bressel-feature-branch feature/branch-name
git checkout -b feature/new-feature

# Now you have:
# - Main directory: daily dev work
# - ../bressel-feature-branch/: isolated feature work
```

### 3. Create Hotfix Worktree
```bash
# Quick hotfix without leaving current branch
git worktree add ../bressel-hotfix main
git checkout -b hotfix/urgent-fix

# Fix, commit, merge to main
# Return to your feature work
```

### 4. Create Experiment Worktree
```bash
# Test new component/library
git worktree add ../bressel-experiments main
git checkout -b experiment/test-new-thing

# If it works great → merge to main
# If it breaks → just remove worktree
```

---

## 💡 WordPress-Specific Workflows

### Workflow 1: Parallel Feature Development

```bash
# Main directory: working on homepage redesign
# Need to add a new component?

git worktree add ../bressel-component-test main
git checkout -b feature/test-button-component
cd ../bressel-component-test

# WordPress + Vite still running on main directory
# Edit files in worktree, Vite HMR picks up changes
# Test in browser at http://localhost:8080
```

### Workflow 2: Hotfix While on Feature Branch

```bash
# You're on feature/booking-system (2 weeks of work)
# Need a quick homepage hotfix?

# Don't create a worktree for hotfixes - just use main:
git worktree add ../bressel-hotfix main
git checkout -b hotfix/fix-cta-button

# Fix, commit, push
git push origin hotfix/fix-cta-button

# Create PR or merge to main
# Return to your feature work
```

### Workflow 3: CSS Refactoring (Current Use Case)

```bash
# Main directory: daily work
# Need to refactor buttons without breaking everything?

git worktree add ../bressel-css-refactor main
git checkout -b refactor/button-system

# Refactor main.css safely
# Test thoroughly
# If good → merge to main
# If issues → fix in worktree, no need to merge
```

### Workflow 4: Component Experiments

```bash
# Testing a new hero banner design?

git worktree add ../bressel-experiments main
git checkout -b experiment/hero-v2

# Create new component
# Test in WordPress admin
# If successful → copy component to main
# If not → remove entire worktree
```

---

## 📋 Best Practices

### ✅ DO
- Use worktrees for isolated experiments
- Keep main directory for daily development
- Remove worktrees when done: `git worktree remove ../path`
- Document worktrees in a `WORKTREES.md` file if team collaboration

### ❌ DON'T
- Forget to remove old worktrees (they take disk space)
- Use worktrees for long-term feature branches (use normal branches)
- Run multiple Vite servers from same worktree without port changes

---

## 🧹 Cleanup

### List All Worktrees
```bash
git worktree list
```

### Remove Worktree
```bash
git worktree remove ../bressel-experiments
```

### Prune Stale Worktrees
```bash
git worktree prune
```

---

## 🔧 Advanced: Multiple Vite Instances

If you need to run Vite in multiple worktrees simultaneously:

```bash
# Main directory (port 5173)
cd twentytwentyfour-bressel
npm run dev

# Worktree (port 5174)
cd ../bressel-experiments/twentytwentyfour-bressel
npm run dev -- --port 5174
```

**Note:** WordPress Docker environment is shared, so theme changes in any worktree affect the site.

---

## 📊 Example Project Structure

```
wp_bressel/
├── .git/              # Shared Git data
├── twentytwentyfour-bressel/  # Main worktree
├── docs/
└── docker-compose.yml

bressel-hotfix/        # Hotfix worktree
└── twentytwentyfour-bressel/

bressel-experiments/   # Experiment worktree
└── twentytwentyfour-bressel/
```

All worktrees share the same `.git/` directory, saving disk space.

---

## 🎓 When to Use What

| Scenario | Solution |
|----------|----------|
| Daily development | Main directory |
| Quick hotfix | Worktree on `main` |
| Feature branch | Worktree with new branch |
| Experiment | Worktree, remove if successful |
| Long-term feature | Normal branch (no worktree) |
| CSS refactoring | Worktree for safety |

---

## 📖 Resources

- [Git Worktree Documentation](https://git-scm.com/book/en/v2/Git-Tools-Alternatives-to-Cloning)
- [Pro Git: Worktrees](https://git-scm.com/docs/git-worktree)

---

**Last Updated:** 2026-04-15  
**Author:** KISE Engineer (AI Agent)
