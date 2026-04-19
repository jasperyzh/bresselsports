<?php
/**
 * Section: Content Split — Golden Ratio grid (61.8/38.2 or 38.2/61.8)
 * Usage: get_template_part('components/section-content-split', null, [
 *   'layout' => 'main-sidebar'|'sidebar-main',
 *   'title' => '...',
 *   'content' => '...',
 *   'sidebar_html' => '...',
 * ]);
 */
$layout = $args['layout'] ?? 'main-sidebar';
$title = $args['title'] ?? '';
$content = $args['content'] ?? '';
$sidebar_html = $args['sidebar_html'] ?? '';
$bg = $args['bg'] ?? 'black';
$accent = $args['accent'] ?? true;

$grid_class = $layout === 'main-sidebar'
  ? 'grid-cols-1 md:grid-cols-[61.8fr_38.2fr]'
  : 'grid-cols-1 md:grid-cols-[38.2fr_61.8fr]';
$side_label = $layout === 'main-sidebar' ? 'main' : 'sidebar';
?>

<section class="section-padding bg-[var(--color-bressel-<?= $bg ?>)]">
  <div class="container-custom">

    <?php if ($title): ?>
      <header class="mb-12 md:mb-16">
        <?php if ($accent): ?>
          <div class="accent-bar mb-4"></div>
        <?php endif; ?>
        <h2 class="text-4xl md:text-5xl font-oswald font-black uppercase italic mb-4">
          <?= wp_kses_post($title) ?>
        </h2>
      </header>
    <?php endif; ?>

    <div class="grid <?= $grid_class ?> gap-6 md:gap-8">

      <!-- <?= ucfirst($side_label) ?> Content -->
      <div class="min-h-[200px]">
        <?php if ($content): ?>
          <div class="prose prose-invert prose-lg max-w-none">
            <?= wp_kses_post($content) ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- <?= ucfirst($side_label) ?> Sidebar -->
      <div class="min-h-[200px]">
        <?php if ($sidebar_html): ?>
          <div class="space-y-6">
            <?= wp_kses_post($sidebar_html) ?>
          </div>
        <?php else: ?>
          <!-- Empty sidebar with subtle texture -->
          <div class="b-card b-texture-- bg-[var(--color-bressel-zinc-800)]/50 min-h-[300px] flex items-center justify-center">
            <p class="text-zinc-600 text-sm uppercase tracking-widest">Sidebar Content</p>
          </div>
        <?php endif; ?>
      </div>

    </div>

  </div>
</section>
