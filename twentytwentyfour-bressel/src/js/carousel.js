/**
 * Base UI — Carousel Component
 *
 * Buttons: data-slot="carousel-prev", data-slot="carousel-next"
 * Tracks slide index per carousel id in module state.
 *
 * Hooks:
 *   data-slot="carousel"              → carousel root
 *   data-slot="carousel-prev"         → prev button
 *   data-slot="carousel-next"         → next button
 *   data-slot="carousel-viewport"     → slide viewport element
 */

(function () {
  'use strict';

  var state = {};

  function slide(carousel, direction) {
    var id = carousel.id || ('carousel-' + Date.now());
    if (!state[id]) state[id] = 0;

    if (direction === 'prev') {
      state[id] = Math.max(0, state[id] - 1);
    } else {
      state[id]++;
    }

    var slides = carousel.querySelectorAll('.carousel-track > div');
    if (slides.length === 0) return;
    if (state[id] >= slides.length) state[id] = 0;

    var viewport = carousel.querySelector('[data-slot="carousel-viewport"]');
    if (viewport) {
      viewport.style.transform = 'translateX(-' + (state[id] * 100) + '%)';
      viewport.style.transition = 'transform 0.3s ease';
    }
  }

  BaseUI.register('carousel', function () {
    document.addEventListener('click', function (e) {
      var prevBtn = BaseUI.closestSlot(e.target, 'carousel-prev');
      var nextBtn = BaseUI.closestSlot(e.target, 'carousel-next');
      if (!prevBtn && !nextBtn) return;

      var carousel = BaseUI.closestSlot(e.target, 'carousel');
      if (!carousel) return;

      if (prevBtn) slide(carousel, 'prev');
      if (nextBtn) slide(carousel, 'next');
    });

    BaseUI.log('carousel registered (click).');
  });

})();
