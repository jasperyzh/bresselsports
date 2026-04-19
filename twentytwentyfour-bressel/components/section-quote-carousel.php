<?php
/**
 * Section: Quote Carousel — Full-screen, dramatic dark background
 * Usage: get_template_part('components/section-quote-carousel', null, [
 *   'quotes' => [['text'=>'...', 'author'=>'...', 'role'=>'...'], ...],
 * ]);
 */
$quotes = $args['quotes'] ?? [
  [
    'text' => 'Padel is not just a game of force. It is a symphony of kinetic precision.',
    'author' => 'Dani',
    'role' => 'Padel Coach / Malaysia\'s National Team',
  ],
  [
    'text' => 'The best players don\'t hit harder. They hit smarter. BRESSSEL taught me that.',
    'author' => 'Marcus L.',
    'role' => 'Regional Champion 2025',
  ],
  [
    'text' => 'From zero to tournament-ready in six months. The methodology is scientific.',
    'author' => 'Sarah Tan',
    'role' => 'Club Player, KL',
  ],
];

$quote_count = count($quotes);
?>

<section class="relative min-h-[80vh] md:min-h-[70vh] flex items-center justify-center bg-[var(--color-bressel-black)] overflow-hidden">
  <!-- Noise overlay -->
  <div class="absolute inset-0 noise-- opacity-[0.1] pointer-events-none"></div>

  <!-- Background gradient -->
  <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[var(--color-bressel-black)]/50 to-[var(--color-bressel-black)]"></div>

  <div class="relative z-10 w-full max-w-4xl mx-auto px-6 py-20 md:py-32 text-center">

    <!-- Quote counter -->
    <div class="text-zinc-600 text-xs uppercase tracking-[0.3em] mb-12">
      <span class="quote-current">1</span> / <span class="quote-total"><?= $quote_count ?></span>
    </div>

    <!-- Quotes -->
    <div class="quote-carousel relative">
      <?php foreach ($quotes as $i => $quote): ?>
        <div class="quote-slide <?= $i === 0 ? 'active' : '' ?>" style="<?= $i > 0 ? 'display:none' : '' ?>">
          <div class="mb-8">
            <svg class="w-12 h-12 text-[var(--color-bressel-red)] mx-auto opacity-60" fill="currentColor" viewBox="0 0 24 24">
              <path d="M14.017 21v-7.351c0-5.704 3.731-9.57 8.983-10.649l.841 2.361c-3.605 1.505-5.568 4.072-5.568 7.675V21h-4.256zM3.017 21v-7.351c0-5.704 3.731-9.57 8.983-10.649l.841 2.361c-3.605 1.505-5.568 4.072-5.568 7.675V21H3.017z"/>
            </svg>
          </div>
          <blockquote class="font-oswald font-bold text-2xl md:text-4xl lg:text-5xl uppercase leading-tight mb-8">
            <?= wp_kses_post($quote['text']) ?>
          </blockquote>
          <cite class="not-italic">
            <span class="block text-[var(--color-bressel-red)] font-bold text-sm uppercase tracking-widest mb-1">
              <?= esc_html($quote['author']) ?>
            </span>
            <span class="block text-zinc-500 text-xs uppercase tracking-widest">
              <?= esc_html($quote['role']) ?>
            </span>
          </cite>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Navigation dots -->
    <div class="flex justify-center gap-3 mt-12">
      <?php foreach ($quotes as $i => $quote): ?>
        <button class="quote-dot w-3 h-3 rounded-full transition-all <?= $i === 0 ? 'bg-[var(--color-bressel-red)] w-8' : 'bg-zinc-700 hover:bg-zinc-500' ?>"
                data-index="<?= $i ?>" aria-label="Quote <?= $i + 1 ?>"></button>
      <?php endforeach; ?>
    </div>

    <!-- Arrow navigation -->
    <div class="flex justify-center gap-6 mt-8">
      <button class="quote-prev text-zinc-500 hover:text-white transition" aria-label="Previous quote">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>
      <button class="quote-next text-zinc-500 hover:text-white transition" aria-label="Next quote">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>

  </div>
</section>

<?php
// Enqueue carousel JS for this section
add_action('wp_footer', function() {
  if (wp_script_is('bressel-carousel', 'registered')) {
    wp_enqueue_script('bressel-carousel');
  }
});
?>
