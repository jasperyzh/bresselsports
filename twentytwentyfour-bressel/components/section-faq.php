<?php
/**
 * Section: FAQ — Accordion with Starwind patterns
 * Usage: get_template_part('components/section-faq', null, [
 *   'title' => '...',
 *   'questions' => [['q'=>'...', 'a'=>'...'], ...],
 * ]);
 */
$title = $args['title'] ?? 'Frequently Asked Questions';
$questions = $args['questions'] ?? [
  ['q' => 'What level of experience do I need?', 'a' => 'No experience needed. We welcome beginners through elite athletes. Our programs are tailored to your level.'],
  ['q' => 'Where are your academy locations?', 'a' => 'We have multiple centers across Malaysia. View our locations in the Academy section.'],
  ['q' => 'Do I need my own equipment?', 'a' => 'No. We provide rackets and balls for all beginners. Shop for your own gear in our merchandise section.'],
  ['q' => 'How do I book a session?', 'a' => 'Use our booking form, WhatsApp us, or call any of our centers directly.'],
  ['q' => 'Do you offer corporate packages?', 'a' => 'Yes! We offer corporate team-building programs and private event hosting.'],
];
$accent = $args['accent'] ?? true;
?>

<section class="section-padding bg-[var(--color-bressel-black)]">
  <div class="container-custom max-w-3xl mx-auto">

    <?php if ($title): ?>
      <header class="text-center mb-12 md:mb-16">
        <?php if ($accent): ?>
          <div class="accent-bar mb-4 mx-auto"></div>
        <?php endif; ?>
        <h2 class="text-4xl md:text-5xl font-oswald font-black uppercase italic mb-4">
          <?= wp_kses_post($title) ?>
        </h2>
      </header>
    <?php endif; ?>

    <div class="space-y-3">
      <?php foreach ($questions as $i => $question): ?>
        <details class="b-card group overflow-hidden">
          <summary class="cursor-pointer font-oswald font-bold text-base md:text-lg tracking-wider text-white hover:text-[var(--color-bressel-red)] transition select-none py-2">
            <span class="flex items-center gap-3">
              <span class="text-[var(--color-bressel-red)] text-xs font-bold uppercase tracking-widest w-6 text-center"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
              <?= wp_kses_post($question['q']) ?>
              <svg class="w-4 h-4 ml-auto text-zinc-500 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </span>
          </summary>
          <div class="pt-4 pb-2 pl-9 pr-4 text-zinc-400 leading-relaxed">
            <?= esc_html($question['a']) ?>
          </div>
        </details>
      <?php endforeach; ?>
    </div>

  </div>
</section>
