/**
 * Base UI — Tabs Component
 *
 * Supports click + ArrowLeft/Right/Up/Down keyboard navigation.
 *
 * Hooks:
 *   data-slot="tabs"                → tabs container
 *   data-slot="tabs-list"           → tab button group
 *   data-slot="tabs-trigger"        → each tab button (data-value="X")
 *   data-slot="tabs-content"        → each content panel (data-value="X")
 */

(function () {
  'use strict';

  function activateTab(trigger, tabs) {
    var value = trigger.getAttribute('data-value');

    var triggers = tabs.querySelectorAll('[data-slot="tabs-trigger"]');
    for (var i = 0; i < triggers.length; i++) {
      triggers[i].setAttribute('data-state', 'inactive');
    }
    trigger.setAttribute('data-state', 'active');

    var contents = tabs.querySelectorAll('[data-slot="tabs-content"]');
    for (var j = 0; j < contents.length; j++) {
      if (contents[j].getAttribute('data-value') === value) {
        contents[j].setAttribute('data-state', 'active');
        contents[j].hidden = false;
      } else {
        contents[j].setAttribute('data-state', 'inactive');
        contents[j].hidden = true;
      }
    }
  }

  BaseUI.register('tabs', function () {
    document.addEventListener('click', function (e) {
      var trigger = BaseUI.closestSlot(e.target, 'tabs-trigger');
      if (!trigger) return;
      var tabs = BaseUI.closestSlot(trigger, 'tabs');
      if (!tabs) return;
      activateTab(trigger, tabs);
    });

    document.addEventListener('keydown', function (e) {
      var trigger = BaseUI.closestSlot(e.target, 'tabs-trigger');
      if (!trigger) return;
      var tabs = BaseUI.closestSlot(trigger, 'tabs');
      if (!tabs) return;

      var triggers = Array.from(tabs.querySelectorAll('[data-slot="tabs-trigger"]'));
      var idx = triggers.indexOf(trigger);
      var dir = 0;
      if (e.key === 'ArrowRight' || e.key === 'ArrowDown') dir = 1;
      if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') dir = -1;
      if (dir === 0) return;
      e.preventDefault();

      var nextIdx = (idx + dir + triggers.length) % triggers.length;
      triggers[nextIdx].focus();
      triggers[nextIdx].click();
    });

    BaseUI.log('tabs registered (click, arrow keys).');
  });

})();
