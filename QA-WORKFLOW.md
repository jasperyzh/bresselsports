# QA Viewer — Visual QA Workflow

## Setup

1. Open `qa-viewer.html` in a browser (double-click or serve via `npx serve .`)
2. The viewer polls `screenshot.png` in the same directory every 2 seconds

## Taking Screenshots

### Option A: MCP Screen Vision
```
# Take screenshot → saves to qa-viewer.html directory
```

### Option B: Browser DevTools
```javascript
// Paste in console to capture visible area
// (requires puppeteer or similar)
```

### Option C: Drag & Drop
Just drag any image file onto the QA viewer — it loads instantly.

## Keyboard Shortcuts

| Key | Action |
|-----|--------|
| `Space` | Capture current screenshot |
| `S` | Switch to Single view |
| `P` | Switch to Split view |
| `O` | Switch to Overlay (compare slider) |
| `H` | Toggle history panel |
| `F` | Toggle fullscreen |
| `R` | Toggle auto-refresh |
| `←` | Swap panels (compare mode) |
| `Esc` | Close history |

## Viewport Presets

- **360px** — Mobile
- **768px** — Tablet  
- **1200px** — Desktop
- **Full** — Full width

## Comparison Modes

1. **Single** — View latest screenshot only
2. **Split** — Side-by-side comparison (left=current, right=compare)
3. **Overlay** — Drag the red slider to compare pixel-by-pixel

## Workflow

1. **Before coding:** Take a screenshot of current state → saves as compare image
2. **Make changes**
3. **Capture:** Take new screenshot → appears in left panel
4. **Compare:** Use split/overlay mode to spot regressions
5. **Approve:** If it looks good, the screenshot stays in history for reference

## Storage

Screenshots are stored in localStorage (base64). The viewer keeps up to 50 entries.

## File Polling

The viewer polls `screenshot.png` every 2 seconds. Save your screenshots there and they auto-load.
