<?php
/**
 * Title: Quote Carousel Component
 * Description: Editable quote carousel with auto-play and navigation
 * How-to Use: get_template_part('components/quote-carousel');
 */

// Get quotes from theme options
$settings = get_option('bressel_quote_carousel_settings', []);
$quotes = $settings['bressel_quote_carousel'] ?? [];
$bg_image = $settings['bressel_quote_bg_image'] ?? '';

// Default quotes if none configured
if (empty($quotes)) {
    $quotes = [
        [
            'quote' => 'PADEL IS NOT JUST A GAME OF FORCE.<br>IT IS A SYMPHONY OF KINETIC PRECISION<br>AND UNYIELDING GEOMETRY.',
            'author' => 'JEREMY',
            'role' => 'HEAD OF PRO TRAINING'
        ]
    ];
}

// Count for auto-play timing
$quote_count = count($quotes);
$auto_play_interval = 6000; // 6 seconds per slide
?>

<section id="quote-carousel" class="section-padding bg-zinc-950 relative overflow-hidden" data-carousel data-auto-play="<?= esc_attr($auto_play_interval) ?>" data-slide-count="<?= esc_attr($quote_count) ?>">
    
    <!-- Background Image -->
    <div class="absolute inset-0 opacity-50">
        <?php if ($bg_image) : ?>
            <img src="<?= esc_url($bg_image) ?>" alt="" class="w-full h-full object-cover" aria-hidden="true" />
        <?php else : ?>
            <img src="<?= get_stylesheet_directory_uri() ?>/assets/quote-bg-silhouette.jpg" alt="" class="w-full h-full object-cover" aria-hidden="true" />
        <?php endif; ?>
    </div>

    <div class="container-custom relative z-10 text-center max-w-5xl mx-auto">
        
        <!-- Carousel Container -->
        <div class="quote-carousel-container">
            
            <!-- Quotes Wrapper -->
            <div class="quote-slides-wrapper">
                <?php foreach ($quotes as $index => $quote) : 
                    $quote_text = $quote['quote'] ?? '';
                    $author = $quote['author'] ?? '';
                    $role = $quote['role'] ?? '';
                ?>
                    <div class="quote-slide <?= $index === 0 ? 'active' : '' ?>" data-slide-index="<?= $index ?>">
                        <div class="flex items-center justify-center gap-3 mb-8">
                            <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
                            <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-icon-red.svg') ?>" alt="Brand Icon" class="w-12 h-12 group-hover:block" />
                            <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
                        </div>

                        <blockquote>
                            <p class="text-3xl md:text-4xl lg:text-5xl font-black uppercase italic leading-tight text-white mb-8">
                                <?php echo wp_kses_post($quote_text); ?>
                            </p>
                            <cite class="not-italic block">
                                <span class="text-zinc-500 uppercase tracking-[0.3em] text-xs font-bold">
                                    <?php echo esc_html($author); ?>
                                    <?php if ($role) : ?> / <?php echo esc_html($role); ?><?php endif; ?>
                                </span>
                            </cite>
                        </blockquote>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Navigation Dots -->
            <div class="quote-carousel-dots flex justify-center gap-3 mt-8">
                <?php foreach ($quotes as $index => $quote) : ?>
                    <button class="dot w-3 h-3 rounded-full bg-zinc-600 hover:bg-zinc-400 transition-colors <?= $index === 0 ? 'active bg-[var(--color-bressel-red)]' : '' ?>" data-dot-index="<?= $index ?>">
                        <span class="sr-only">Go to slide <?php echo $index + 1; ?></span>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Navigation Arrows -->
            <div class="quote-carousel-nav absolute top-1/2 -translate-y-1/2 left-0 right-0 flex justify-between pointer-events-none px-4">
                <button class="prev-btn pointer-events-auto w-12 h-12 rounded-full bg-zinc-900/50 hover:bg-zinc-800 flex items-center justify-center text-white hover:text-[var(--color-bressel-red)] transition-colors">
                    <svg class="w-6 h-6 fill-none stroke=currentColor viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    <span class="sr-only">Previous quote</span>
                </button>
                <button class="next-btn pointer-events-auto w-12 h-12 rounded-full bg-zinc-900/50 hover:bg-zinc-800 flex items-center justify-center text-white hover:text-[var(--color-bressel-red)] transition-colors">
                    <svg class="w-6 h-6 fill-none stroke=currentColor viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <span class="sr-only">Next quote</span>
                </button>
            </div>
        </div>
    </div>
</section>