<?php
/**
 * Title: Testimonial Component
 * Description: Displays a testimonial quote with author info and optional avatar.
 * How-to Use: get_template_part('components/testimonial', null, ['quote' => '...', 'author' => '...', 'role' => '...', 'avatar' => '...']);
 */
$quote  = $args['quote'] ?? 'Amazing experience!';
$author = $args['author'] ?? 'Happy Customer';
$role   = $args['role'] ?? '';
$avatar = $args['avatar'] ?? null;
$rating = $args['rating'] ?? 0; // 0-5 stars

// Generate initials fallback
$initials = '';
$name_parts = explode(' ', $author);
foreach ($name_parts as $part) {
    $initials .= substr($part, 0, 1);
}
$initials = strtoupper(substr($initials, 0, 2));
?>
<figure class="relative">
    <!-- Quote Icon -->
    <svg class="absolute -top-4 -left-2 w-12 h-12 text-[var(--color-bressel-red)] opacity-20" fill="currentColor" viewBox="0 0 24 24">
        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
    </svg>
    
    <blockquote class="relative pl-8 md:pl-12 pr-4">
        <p class="text-xl md:text-2xl text-zinc-200 italic leading-relaxed mb-6">
            "<?= esc_html($quote) ?>"
        </p>
    </blockquote>
    
    <!-- Author -->
    <figcaption class="flex items-center gap-4 ml-8 md:ml-12">
        <?php if ($avatar) : ?>
            <img src="<?= esc_url($avatar) ?>" alt="<?= esc_attr($author) ?>" 
                 class="w-12 h-12 md:w-14 md:h-14 rounded-full object-cover border-2 border-[var(--color-bressel-red)]" />
        <?php else : ?>
            <div class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center">
                <span class="text-[var(--color-bressel-red)] font-bold text-lg"><?= esc_html($initials) ?></span>
            </div>
        <?php endif; ?>
        
        <div>
            <cite class="not-italic font-bold text-white uppercase tracking-wide">
                <?= esc_html($author) ?>
            </cite>
            <?php if ($role) : ?>
                <p class="text-zinc-500 text-sm mt-1"><?= esc_html($role) ?></p>
            <?php endif; ?>
        </div>
    </figcaption>
    
    <!-- Rating Stars -->
    <?php if ($rating > 0) : ?>
        <div class="flex gap-1 mt-4 ml-8 md:ml-12">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <svg class="w-5 h-5 <?= $i <= $rating ? 'text-[var(--color-bressel-red)]' : 'text-zinc-700' ?>" 
                     fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</figure>
