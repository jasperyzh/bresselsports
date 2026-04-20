<?php
/**
 * Title: Tabs Component
 * Description: Accessible tabs using base_ui_tv.
 * How-to Use: get_template_part('components/tabs', null, array('tabs' => [...], 'default' => 0));
 * 
 * Args:
 *   tabs: array of ['label' => '', 'content' => '']
 *   default: index of default active tab (default: 0)
 */

require_once get_stylesheet_directory() . '/components/base-ui-tv.php';

$tabs    = $args['tabs'] ?? [];
$default = $args['default'] ?? 0;
?>

<div data-slot="tabs" data-default-value="<?= esc_attr($default) ?>" class="starwind-tabs">
    
    <div data-slot="tabs-list" class="inline-flex h-10 items-center justify-center rounded-md bg-muted p-1 text-muted-foreground">
        <?php foreach ($tabs as $i => $tab): 
            $isActive = ($i === $default);
        ?>
        <button
            data-slot="tabs-trigger"
            data-value="<?= esc_attr("tab-$i") ?>"
            data-state="<?= $isActive ? 'active' : 'inactive' ?>"
            class="inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm"
            role="tab"
            aria-selected="<?= $isActive ? 'true' : 'false' ?>"
        >
            <?= esc_html($tab['label'] ?? '') ?>
        </button>
        <?php endforeach; ?>
    </div>

    <?php foreach ($tabs as $i => $tab): 
        $isActive = ($i === $default);
    ?>
    <div
        data-slot="tabs-content"
        data-value="<?= esc_attr("tab-$i") ?>"
        data-state="<?= $isActive ? 'active' : 'inactive' ?>"
        role="tabpanel"
        <?= $isActive ? '' : 'hidden' ?>
    >
        <div class="mt-2">
            <?= wp_kses_post($tab['content'] ?? '') ?>
        </div>
    </div>
    <?php endforeach; ?>

</div>
