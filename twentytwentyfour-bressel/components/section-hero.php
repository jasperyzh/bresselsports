<?php
/**
 * Section: Hero — Full-width, noise texture, CTA
 * Usage: get_template_part('components/section-hero', null, [
 *   'headline' => '...',
 *   'subtext' => '...',
 *   'cta_text' => '...',
 *   'cta_link' => '...',
 *   'bg_type' => 'video|image|solid',
 *   'bg_src' => '...',
 * ]);
 */
$headline = $args['headline'] ?? 'World-Class Padel, Within Reach';
$subtext = $args['subtext'] ?? 'Join Malaysia\'s fastest-growing padel academy.';
$cta_text = $args['cta_text'] ?? 'Book a Session';
$cta_link = $args['cta_link'] ?? home_url('/contact/?intent=booking');
$bg_type = $args['bg_type'] ?? 'solid';
$bg_src = $args['bg_src'] ?? '';
$accent_bar = $args['accent_bar'] ?? true;
?>
<section class="relative min-h-[70vh] flex items-end overflow-hidden">
  <!-- Background -->
  <?php if ($bg_type === 'video'): ?>
    <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-40">
      <source src="<?= esc_url($bg_src) ?>" type="video/mp4">
    </video>
  <?php elseif ($bg_type === 'image'): ?>
    <img src="<?= esc_url($bg_src) ?>" alt="" class="absolute inset-0 w-full h-full object-cover opacity-40" />
  <?php else: ?>
    <div class="absolute inset-0 bg-[var(--color-bressel-black)]"></div>
  <?php endif; ?>

  <!-- Noise Overlay (Starwind pattern) -->
  <div class="absolute inset-0 noise-- opacity-[0.15] pointer-events-none"></div>

  <!-- Gradient overlay at bottom -->
  <div class="absolute bottom-0 left-0 right-0 h-1/3 bg-gradient-to-t from-[var(--color-bressel-black)] to-transparent"></div>

  <!-- Content -->
  <div class="relative z-10 w-full max-w-7xl mx-auto px-6 pb-16 md:pb-24 lg:pb-32">
    <?php if ($accent_bar): ?>
      <div class="flex items-center gap-4 mb-6">
        <span class="h-0.5 w-8 bg-[var(--color-bressel-red)]"></span>
        <span class="text-[var(--color-bressel-red)] text-xs font-bold uppercase tracking-[0.3em]">BRESSSEL ACADEMY</span>
        <span class="h-0.5 w-8 bg-[var(--color-bressel-red)]"></span>
      </div>
    <?php endif; ?>

    <h1 class="font-oswald font-black text-5xl md:text-7xl lg:text-8xl uppercase tracking-tight leading-[0.95] mb-4 md:mb-6">
      <?= wp_kses_post($headline) ?>
    </h1>

    <p class="text-zinc-400 text-base md:text-lg max-w-xl mb-8 md:mb-10 leading-relaxed">
      <?= esc_html($subtext) ?>
    </p>

    <div class="flex flex-col sm:flex-row gap-4">
      <a href="<?= esc_url($cta_link) ?>"
         class="inline-flex items-center justify-center bg-[var(--color-bressel-red)] text-white px-8 py-4 font-bold uppercase tracking-widest rounded text-sm hover:bg-white hover:text-[var(--color-bressel-red)] transition min-w-[180px]">
        <?= esc_html($cta_text) ?>
      </a>
      <?php if (!empty($args['cta2_text'])): ?>
        <a href="<?= esc_url($args['cta2_link'] ?? '#') ?>"
           class="inline-flex items-center justify-center border-2 border-zinc-700 text-zinc-300 px-8 py-4 font-bold uppercase tracking-widest rounded text-sm hover:border-white hover:text-white transition min-w-[180px]">
          <?= esc_html($args['cta2_text']) ?>
        </a>
      <?php endif; ?>
    </div>
  </div>

  <!-- Scroll hint -->
  <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-2 opacity-40">
    <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-white">Scroll</span>
    <svg class="w-4 h-4 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
    </svg>
  </div>
</section>
