<?php
/**
 * Section: Newsletter CTA — Centered, large typography, single CTA
 * Usage: get_template_part('components/section-newsletter-cta', null, [
 *   'title' => '...',
 *   'subtitle' => '...',
 *   'placeholder' => '...',
 *   'button_text' => '...',
 * ]);
 */
$title = $args['title'] ?? 'Stay in the Game';
$subtitle = $args['subtitle'] ?? 'Get training tips, tournament updates, and exclusive gear drops. No spam, just padel.';
$placeholder = $args['placeholder'] ?? 'your@email.com';
$button_text = $args['button_text'] ?? 'Subscribe';
$bg = $args['bg'] ?? 'black';
$accent = $args['accent'] ?? true;
?>

<section class="section-padding bg-[var(--color-bressel-<?= $bg ?>)] relative overflow-hidden">
  <!-- Decorative watermark -->
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 beyond-watermark text-[12rem] md:text-[20rem] font-oswald font-black italic opacity-20 whitespace-nowrap pointer-events-none select-none">
    BRESSSEL
  </div>

  <div class="container-custom relative z-10 text-center max-w-3xl mx-auto">

    <?php if ($accent): ?>
      <div class="flex items-center justify-center gap-4 mb-8">
        <span class="h-0.5 w-12 md:w-16 bg-[var(--color-bressel-red)]"></span>
        <span class="text-[var(--color-bressel-red)] text-xs font-bold uppercase tracking-[0.3em]">Newsletter</span>
        <span class="h-0.5 w-12 md:w-16 bg-[var(--color-bressel-red)]"></span>
      </div>
    <?php endif; ?>

    <h2 class="font-oswald font-black text-5xl md:text-7xl lg:text-8xl uppercase tracking-tight leading-[0.95] mb-6">
      <?= wp_kses_post($title) ?>
    </h2>

    <p class="text-zinc-400 text-base md:text-lg max-w-xl mx-auto mb-10 leading-relaxed">
      <?= esc_html($subtitle) ?>
    </p>

    <!-- Newsletter form -->
    <form class="max-w-md mx-auto" method="POST" action="">
      <div class="flex flex-col sm:flex-row gap-3">
        <input type="email"
               placeholder="<?= esc_attr($placeholder) ?>"
               required
               class="flex-1 bg-[var(--color-bressel-zinc-800)] border border-[var(--color-bressel-zinc-600)] rounded px-5 py-4 text-white placeholder-zinc-500 text-sm font-bold uppercase tracking-widest focus:outline-none focus:border-[var(--color-bressel-red)] transition" />
        <button type="submit"
                class="bg-[var(--color-bressel-red)] text-white px-8 py-4 font-bold uppercase tracking-widest rounded text-sm hover:bg-white hover:text-[var(--color-bressel-red)] transition whitespace-nowrap">
          <?= esc_html($button_text) ?>
        </button>
      </div>
      <p class="text-zinc-600 text-[10px] uppercase tracking-widest mt-4">
        Unsubscribe anytime. We respect your inbox.
      </p>
    </form>

  </div>
</section>
