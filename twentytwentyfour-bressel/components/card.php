<?php
/**
 * Title: Card Component
 * Description: Card wrapper using base_ui_tv.
 * How-to Use: get_template_part('components/card', null, array('header' => 'Title', 'description' => '', 'content' => ''));
 * 
 * Args:
 *   header: card title
 *   description: card description
 *   content: main card content
 *   action_label: action button text
 *   action_url: action button URL
 */

require_once get_stylesheet_directory() . '/components/base-ui-tv.php';

$header      = $args['header'] ?? '';
$description = $args['description'] ?? '';
$content     = $args['content'] ?? '';
$action_label = $args['action_label'] ?? '';
$action_url   = $args['action_url'] ?? '#';

$class = base_ui_tv(
    'rounded-lg border bg-card text-card-foreground shadow-sm',
    [],
    []
);
?>

<div class="<?= esc_attr($class) ?>">
    <?php if ($header || $description): ?>
    <div class="flex flex-col space-y-1.5 p-6">
        <?php if ($header): ?>
        <h3 class="font-semibold leading-none tracking-tight"><?= esc_html($header) ?></h3>
        <?php endif; ?>
        <?php if ($description): ?>
        <p class="text-sm text-muted-foreground"><?= esc_html($description) ?></p>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <?php if ($content): ?>
    <div class="p-6 pt-0">
        <?= wp_kses_post($content) ?>
    </div>
    <?php endif; ?>

    <?php if ($action_label): ?>
    <div class="flex items-center p-6 pt-0">
        <a href="<?= esc_url($action_url) ?>" class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors h-10 px-4 py-2 bg-primary text-primary-foreground hover:bg-primary/90" data-slot="button">
            <?= esc_html($action_label) ?>
        </a>
    </div>
    <?php endif; ?>
</div>
