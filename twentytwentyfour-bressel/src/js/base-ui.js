/**
 * Base UI — Global Event Delegation Engine
 *
 * All interactive components are handled via event delegation on `document`.
 * No per-element initialization needed — works with SPA routers and AJAX-loaded content.
 *
 * Rules:
 *   - All components use `data-slot="..."` attributes as hooks.
 *   - State is stored in `data-state` or `data-value` attributes.
 *   - No MutationObserver needed — event delegation handles new elements automatically.
 *
 * Architecture:
 *   - Each component in src/js/components/*.js registers itself via BaseUI.register()
 *   - base-ui.js bootstraps all registered components on DOMContentLoaded
 *
 * Usage:
 *   <script src="components/accordion.js"></script>
 *   <script src="components/dialog.js"></script>
 *   <!-- ... more components ... -->
 *   <script src="base-ui.js"></script>
 *
 * Toast: window.showToast({ title: 'Saved', variant: 'success' })
 */

(function () {
  'use strict';

  // === SHARED UTILITIES ===

  window.BaseUI = window.BaseUI || {};

  /** Find the closest element with a data-slot attribute */
  window.BaseUI.closestSlot = function (el, name) {
    var target = el && el.nodeType === 1 ? el : el && el.parentElement;
    return target && target.closest ? target.closest('[data-slot="' + name + '"]') : null;
  };

  /** Animate open a collapsible content panel */
  window.BaseUI.animateOpen = function (el, item) {
    el.style.overflow = 'auto';
    var h = el.scrollHeight;
    el.style.maxHeight = '0';
    el.offsetHeight;
    el.style.maxHeight = h + 'px';
    el.setAttribute('data-state', 'open');
    el.setAttribute('aria-expanded', 'true');
    if (item) {
      item.setAttribute('data-state', 'open');
      var trigger = item.querySelector('[data-slot="accordion-trigger"]');
      if (trigger) trigger.setAttribute('aria-expanded', 'true');
    }
  };

  /** Animate close a collapsible content panel */
  window.BaseUI.animateClose = function (el, item) {
    el.style.maxHeight = el.scrollHeight + 'px';
    el.offsetHeight;
    el.style.maxHeight = '0';
    el.style.overflow = 'hidden';
    el.setAttribute('data-state', 'closed');
    el.setAttribute('aria-expanded', 'false');
    if (item) {
      item.setAttribute('data-state', 'closed');
      var trigger = item.querySelector('[data-slot="accordion-trigger"]');
      if (trigger) trigger.setAttribute('aria-expanded', 'false');
    }
  };

  /** Get all sibling accordion items */
  window.BaseUI.accordionSiblings = function (item) {
    var parent = window.BaseUI.closestSlot(item, 'accordion');
    if (!parent) return [];
    return Array.from(parent.querySelectorAll('[data-slot="accordion-item"]'));
  };

  // === COMPONENT REGISTRY ===

  var registry = [];

  /** Register a component module */
  window.BaseUI.register = function (name, fn) {
    registry.push({ name: name, fn: fn });
  };

  /** Bootstrap all registered components */
  window.BaseUI.init = function () {
    for (var i = 0; i < registry.length; i++) {
      try {
        registry[i].fn();
      } catch (err) {
        console.error('[base-ui] Failed to init ' + registry[i].name, err);
      }
    }
  };

  /** Dev status logging */
  window.BaseUI.log = function (msg) {
    console.log('[base-ui] ' + msg);
  };

  // === BOOTSTRAP ===
  document.addEventListener('DOMContentLoaded', function () {
    BaseUI.init();
    BaseUI.log('All components initialized.');
  });

})();
