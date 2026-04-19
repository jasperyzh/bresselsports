<?php
/**
 * Section: Stats Strip — Horizontal strip with animated counters
 * Usage: get_template_part('components/section-stats-strip', null, [
 *   'stats' => [['value'=>'1000+', 'label'=>'Players Coached'], ...],
 *   'bg' => 'zinc-800',
 * ]);
 */
$stats = $args['stats'] ?? [
  ['value' => '500+', 'label' => 'Players Coached'],
  ['value' => '12', 'label' => 'Certified Coaches'],
  ['value' => '4', 'label' => 'Academy Locations'],
  ['value' => '3', 'label' => 'National Titles'],
];
$bg = $args['bg'] ?? 'zinc-800';
$bg_color = match($bg) {
  'red' => 'bg-[var(--color-bressel-red)]',
  'black' => 'bg-[var(--color-bressel-black)]',
  default => 'bg-[var(--color-bressel-zinc-800)]',
};
?>

<section class="py-12 md:py-16 <?= $bg_color ?> relative overflow-hidden">
  <!-- Noise overlay -->
  <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
       style="background-image: url('<?= get_stylesheet_directory_uri() ?>/assets/textures/noise--.png'); background-size: 256px 256px; background-repeat: repeat; mix-blend-mode: soft-light;"></div>

  <div class="container-custom relative z-10">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12">
      <?php foreach ($stats as $stat): ?>
        <div class="text-center">
          <div class="font-oswald font-black text-4xl md:text-5xl text-white mb-2"
               data-counter="<?= preg_replace('/[^0-9]/', '', $stat['value']) ?>">
            <?= wp_kses_post($stat['value']) ?>
          </div>
          <div class="text-zinc-500 text-[10px] md:text-xs font-bold uppercase tracking-widest">
            <?= esc_html($stat['label']) ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
// Enqueue counter JS
add_action('wp_footer', function() {
  if (wp_script_is('bressel-counters', 'registered')) {
    wp_enqueue_script('bressel-counters');
  }
});
?>
