<?php
/**
 * Section: Card Grid — Reusable grid of cards with Starwind patterns
 * Usage: get_template_part('components/section-card-grid', null, [
 *   'title' => '...',
 *   'subtitle' => '...',
 *   'cards' => [['title'=>'...', 'desc'=>'...', 'link'=>'...'], ...],
 *   'card_type' => 'default'|'coach'|'merch'|'event',
 *   'cols' => '2'|'3'|'4',
 * ]);
 */
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$cards = $args['cards'] ?? [];
$card_type = $args['card_type'] ?? 'default';
$cols = $args['cols'] ?? '3';
$bg = $args['bg'] ?? 'black';
$accent = $args['accent'] ?? true;

$col_class = match($cols) {
  '2' => 'grid-cols-1 md:grid-cols-2',
  '4' => 'grid grid-cols-2 md:grid-cols-4',
  default => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
};
?>

<section class="section-padding bg-[var(--color-bressel-<?= $bg ?>)]">
  <div class="container-custom">

    <?php if ($title || $subtitle): ?>
      <header class="mb-12 md:mb-16 text-center">
        <?php if ($accent): ?>
          <div class="accent-bar mb-4 mx-auto"></div>
        <?php endif; ?>
        <?php if ($title): ?>
          <h2 class="text-4xl md:text-5xl font-oswald font-black uppercase italic mb-4">
            <?= wp_kses_post($title) ?>
          </h2>
        <?php endif; ?>
        <?php if ($subtitle): ?>
          <p class="text-zinc-400 text-base max-w-2xl mx-auto"><?= esc_html($subtitle) ?></p>
        <?php endif; ?>
      </header>
    <?php endif; ?>

    <?php if ($cards): ?>
      <div class="grid <?= $col_class ?> gap-6">
        <?php foreach ($cards as $card): ?>
          <?php
            $card_html = '';
            switch ($card_type) {
              case 'coach':
                $card_html = render_coach_card($card);
                break;
              case 'merch':
                $card_html = render_merch_card($card);
                break;
              case 'event':
                $card_html = render_event_card($card);
                break;
              default:
                $card_html = render_default_card($card);
                break;
            }
            echo wp_kses_post($card_html);
          ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php
/**
 * Helper: Default card
 */
function render_default_card($card) {
  $title = $card['title'] ?? '';
  $desc = $card['desc'] ?? '';
  $link = $card['link'] ?? '#';
  $badge = $card['badge'] ?? '';

  $badge_html = '';
  if ($badge) {
    $badge_html = '<span class="inline-block bg-[var(--color-bressel-red)] text-white px-2 py-1 rounded text-[10px] font-bold uppercase tracking-widest mb-3">' . esc_html($badge) . '</span>';
  }

  return '<div class="b-card b-texture-- group">' .
    $badge_html .
    '<h3 class="font-oswald font-bold text-lg mb-2 group-hover:text-[var(--color-bressel-red)] transition">' .
    '<a href="' . esc_url($link) . '" class="text-inherit hover:underline">' . wp_kses_post($title) . '</a>' .
    '</h3>' .
    '<p class="text-zinc-400 text-sm mb-4 leading-relaxed">' . esc_html($desc) . '</p>' .
    '<a href="' . esc_url($link) . '" class="text-[var(--color-bressel-red)] text-xs font-bold uppercase tracking-widest group/link inline-flex items-center gap-2 hover:text-white transition">' .
    'Learn More <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>' .
    '</div>';
}

/**
 * Helper: Coach card
 */
function render_coach_card($card) {
  $name = $card['name'] ?? '';
  $role = $card['role'] ?? '';
  $image = $card['image'] ?? get_stylesheet_directory_uri() . '/assets/placeholder.jpg';

  return '<div class="b-card group overflow-hidden">' .
    '<div class="aspect-[4/3] overflow-hidden mb-4">' .
    '<img src="' . esc_url($image) . '" alt="' . esc_attr($name) . '" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />' .
    '</div>' .
    '<span class="text-[var(--color-bressel-red)] text-[10px] font-bold uppercase tracking-widest block mb-2">Coach</span>' .
    '<h3 class="font-oswald font-bold text-xl mb-1 group-hover:text-[var(--color-bressel-red)] transition">' . wp_kses_post($name) . '</h3>' .
    '<p class="text-zinc-400 text-sm mb-4">' . esc_html($role) . '</p>' .
    '<a href="#" class="text-[var(--color-bressel-red)] text-xs font-bold uppercase tracking-widest group/link inline-flex items-center gap-2 hover:text-white transition">' .
    'View Profile <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>' .
    '</div>';
}

/**
 * Helper: Merch card
 */
function render_merch_card($card) {
  $name = $card['name'] ?? '';
  $price = $card['price'] ?? '';
  $desc = $card['desc'] ?? '';
  $image = $card['image'] ?? get_stylesheet_directory_uri() . '/assets/placeholder.jpg';
  $badge = $card['badge'] ?? '';

  $badge_html = '';
  if ($badge) {
    $badge_html = '<span class="absolute top-3 right-3 bg-[var(--color-bressel-red)] text-white px-2 py-1 rounded text-[10px] font-bold uppercase tracking-widest">' . esc_html($badge) . '</span>';
  }

  return '<div class="b-card group overflow-hidden">' .
    '<div class="aspect-[4/3] overflow-hidden mb-4 relative">' .
    '<img src="' . esc_url($image) . '" alt="' . esc_attr($name) . '" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />' .
    $badge_html .
    '</div>' .
    '<div class="flex justify-between items-start mb-2">' .
    '<h3 class="font-oswald font-bold text-lg group-hover:text-[var(--color-bressel-red)] transition">' . wp_kses_post($name) . '</h3>' .
    '<span class="text-[var(--color-bressel-red)] font-bold">' . esc_html($price) . '</span>' .
    '</div>' .
    '<p class="text-zinc-400 text-sm mb-4 leading-relaxed">' . esc_html($desc) . '</p>' .
    '<a href="#" class="inline-flex items-center justify-center w-full bg-[var(--color-bressel-red)] text-white px-4 py-3 font-bold uppercase tracking-widest rounded text-xs hover:bg-white hover:text-[var(--color-bressel-red)] transition">' .
    'Inquire to Buy</a>' .
    '</div>';
}

/**
 * Helper: Event card
 */
function render_event_card($card) {
  $title = $card['title'] ?? '';
  $date = $card['date'] ?? '';
  $location = $card['location'] ?? '';
  $desc = $card['desc'] ?? '';
  $link = $card['link'] ?? '#';
  $badge = $card['badge'] ?? '';

  $badge_html = '';
  if ($badge) {
    $badge_html = '<span class="inline-block bg-[var(--color-bressel-red)] text-white px-2 py-1 rounded text-[10px] font-bold uppercase tracking-widest mb-3">' . esc_html($badge) . '</span>';
  }

  return '<div class="b-card group overflow-hidden">' .
    $badge_html .
    '<div class="flex items-center gap-2 mb-3">' .
    '<span class="text-[var(--color-bressel-red)] text-[10px] font-bold uppercase tracking-widest">' . esc_html($date) . '</span>' .
    '<span class="text-zinc-700">.</span>' .
    '<span class="text-zinc-500 text-[10px] uppercase tracking-widest">' . esc_html($location) . '</span>' .
    '</div>' .
    '<h3 class="font-oswald font-bold text-lg mb-2 group-hover:text-[var(--color-bressel-red)] transition">' . wp_kses_post($title) . '</h3>' .
    '<p class="text-zinc-400 text-sm mb-4 leading-relaxed">' . esc_html($desc) . '</p>' .
    '<a href="' . esc_url($link) . '" class="text-[var(--color-bressel-red)] text-xs font-bold uppercase tracking-widest group/link inline-flex items-center gap-2 hover:text-white transition">' .
    'Register <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>' .
    '</div>';
}
