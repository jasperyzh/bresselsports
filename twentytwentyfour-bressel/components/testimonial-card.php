<?php
/**
 * Title: Testimonial Card Component
 * Description: Displays a testimonial with quote, author, and role.
 * How-to Use: get_template_part('components/testimonial-card', null, ['quote' => '...', 'author' => '...', 'role' => '...']);
 */
$quote  = $args['quote'] ?? 'Great experience!';
$author = $args['author'] ?? 'John Doe';
$role   = $args['role'] ?? 'Customer';
?>

<div class="rounded-xl border border-zinc-800 bg-zinc-900 p-8">
    <!-- Stars -->
    <div class="flex gap-1 mb-4">
        <?php for ($i = 0; $i < 5; $i++) : ?>
            <svg class="w-4 h-4 text-[var(--color-bressel-red)]" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>
        <?php endfor; ?>
    </div>

    <!-- Quote -->
    <blockquote class="text-zinc-300 text-sm leading-relaxed mb-6 italic">
        "<?= esc_html($quote) ?>"
    </blockquote>

    <!-- Author -->
    <div class="flex items-center gap-3 pt-4 border-t border-zinc-800">
        <div class="w-10 h-10 rounded-full bg-[var(--color-bressel-red)] flex items-center justify-center text-white font-bold text-sm">
            <?= strtoupper(substr($author, 0, 1)) ?>
        </div>
        <div>
            <p class="text-white font-bold text-sm"><?= esc_html($author) ?></p>
            <p class="text-zinc-500 text-xs"><?= esc_html($role) ?></p>
        </div>
    </div>
</div>
