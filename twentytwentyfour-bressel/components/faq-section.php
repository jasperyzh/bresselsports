<?php
/**
 * Title: FAQ Section Component
 * Description: Wrapper component for multiple FAQ items with optional title.
 * How-to Use: 
 *   Static: get_template_part('components/faq-section', null, ['title' => '...']);
 *   With items: Loop and call faq-item.php for each
 * 
 *   Example:
 *   get_template_part('components/faq-section', null, ['title' => 'Booking FAQs']);
 *   // Then in template file, use faq-item.php in a loop
 */
$title    = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
?>
<section class="faq-section">
    <?php if ($title || $subtitle) : ?>
        <header class="mb-8 md:mb-12">
            <?php if ($title) : ?>
                <h2 class="text-3xl md:text-5xl mb-4"><?= esc_html($title) ?></h2>
            <?php endif; ?>
            <?php if ($subtitle) : ?>
                <p class="text-xl text-zinc-400 max-w-2xl"><?= esc_html($subtitle) ?></p>
            <?php endif; ?>
        </header>
    <?php endif; ?>
    
    <div class="faq-container bg-dark-accent rounded-2xl p-6 md:p-8 lg:p-10" data-faq-container>
        <!-- FAQ items will be inserted here -->
        <?php
        // Hook for child themes/plugins to inject FAQ items
        do_action('bressel_faq_items');
        ?>
    </div>
</section>
