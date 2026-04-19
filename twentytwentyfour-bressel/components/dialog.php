<?php
/**
 * Title: Dialog Component
 * Description: Accessible modal dialog using base_ui_tv.
 * How-to Use: get_template_part('components/dialog', null, array('id' => 'my-dialog', 'title' => '', 'description' => '', 'actions' => [...], 'trigger' => 'Open Dialog'));
 * 
 * Args:
 *   id: unique dialog ID
 *   title: dialog title
 *   description: dialog description
 *   content: main dialog content
 *   actions: array of ['label' => '', 'variant' => 'primary|outline', 'slot' => 'close|cancel']
 *   trigger: text for the open trigger button
 *   trigger_variant: variant of the trigger button (default: primary)
 *   trigger_size: size of the trigger button (default: md)
 */

require_once get_template_directory() . '/components/base-ui-tv.php';
require_once get_template_directory() . '/components/button.php';

$id         = $args['id'] ?? 'dialog-' . uniqid();
$title      = $args['title'] ?? 'Dialog';
$description = $args['description'] ?? '';
$content    = $args['content'] ?? '';
$actions    = $args['actions'] ?? [['label' => 'Cancel', 'variant' => 'outline', 'slot' => 'close']];
$trigger    = $args['trigger'] ?? 'Open Dialog';
$trigger_variant = $args['trigger_variant'] ?? 'primary';
$trigger_size  = $args['trigger_size'] ?? 'md';
?>

<!-- Trigger -->
<?php get_template_part('components/button', null, array(
    'text' => $trigger,
    'variant' => $trigger_variant,
    'size' => $trigger_size,
    'url' => '#',
)); ?>

<!-- Dialog -->
<div id="<?= esc_attr($id) ?>" data-slot="dialog" data-state="closed" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div data-slot="dialog-backdrop" class="fixed inset-0 bg-black/80 backdrop-blur-sm"></div>
    
    <!-- Content -->
    <div class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border bg-background p-6 shadow-lg duration-200 sm:rounded-lg">
        
        <div class="flex flex-col space-y-1.5 text-center sm:text-left">
            <?php if ($title): ?>
            <h2 class="text-lg font-semibold leading-none tracking-tight" data-slot="dialog-title">
                <?= esc_html($title) ?>
            </h2>
            <?php endif; ?>
            <?php if ($description): ?>
            <p class="text-sm text-muted-foreground" data-slot="dialog-description">
                <?= esc_html($description) ?>
            </p>
            <?php endif; ?>
        </div>

        <div class="py-4">
            <?= wp_kses_post($content) ?>
        </div>

        <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:gap-x-2">
            <?php foreach ($actions as $action): 
                $slot = $action['slot'] ?? 'close';
            ?>
            <button
                data-slot="dialog-<?= esc_attr($slot) ?>"
                class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors h-10 px-4 py-2"
            >
                <?= esc_html($action['label'] ?? '') ?>
            </button>
            <?php endforeach; ?>
        </div>
        
    </div>
</div>
