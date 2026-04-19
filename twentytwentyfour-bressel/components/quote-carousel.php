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
    $base = get_stylesheet_directory_uri() . '/assets/';
    $quotes = [
        [
            'quote' => 'PADEL IS NOT JUST A GAME OF FORCE.<br>IT IS A SYMPHONY OF KINETIC PRECISION<br>AND UNYIELDING GEOMETRY.',
            'author' => 'Dani',
            'role' => 'Padel Coach of Malaysia\'s National Team',
            'bg_image' => $base . '20260402_115159.webp'
        ],
        [
            'quote' => 'THE WALL DOES NOT FORGIVE.<br>NEITHER DOES EXCELLENCE.<br>BOTH DEMAND TOTAL COMMITMENT.',
            'author' => 'Ryan The Weekend Pedel Warrior',
            'role' => 'Padel Enthusiast',
            'bg_image' => $base . 'hero-bg.jpg'
        ],
        [
            'quote' => 'CHAMPIONS ARE NOT BUILT<br>ON THE COURT ALONE.<br>THEY ARE FORGED IN REPEITION.',
            'author' => 'Coach C',
            'role' => 'SPORTS PSYCHOLOGIST',
            'bg_image' => $base . '20260402_115809.webp'
        ]
    ];
}

// Count for auto-play timing
$quote_count = count($quotes);
$auto_play_interval = 6000; // 6 seconds per slide
$default_bg = get_stylesheet_directory_uri() . '/assets/quote-bg-silhouette.jpg';
?>

<section id="quote-carousel" class="min-h-[60vh] md:min-h-[50vh] relative overflow-hidden flex items-center justify-center py-24 md:py-32" data-carousel data-auto-play="<?= esc_attr($auto_play_interval) ?>" data-slide-count="<?= esc_attr($quote_count) ?>">
    
    <!-- Background Images — per-slide with crossfade -->
    <div class="carousel-bg-layer absolute inset-0">
        <?php foreach ($quotes as $index => $quote) : ?>
            <div class="carousel-bg-slide <?= $index === 0 ? 'active' : '' ?>" data-bg-index="<?= $index ?>">
                <img src="<?= esc_url($quote['bg_image'] ?? $default_bg) ?>" alt="" class="w-full h-full object-cover" aria-hidden="true" />
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Heavy dark overlay for text readability -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Noise texture overlay -->
    <div class="absolute inset-0 opacity-[0.08] mix-blend-overlay pointer-events-none" style="background-image: url('<?= esc_url(get_stylesheet_directory_uri() . '/assets/textures/noise--.png') ?>'); background-size: 256px 256px; background-repeat: repeat;"></div>

    <!-- Content -->
    <div class="relative z-10 text-center max-w-5xl mx-auto px-6">
        
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
                            <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-icon-red.svg') ?>" alt="Brand Icon" class="w-12 h-12" />
                            <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
                        </div>

                        <blockquote>
                            <p class="text-[clamp(1.75rem,4vw,4.5rem)] font-black uppercase italic leading-[1.1] text-white mb-8" style="text-shadow: 0 4px 20px rgba(0,0,0,0.8);">
                                <?php echo wp_kses_post($quote_text); ?>
                            </p>
                            <cite class="not-italic block">
                                <span class="text-zinc-400 uppercase tracking-[0.35em] text-[10px] font-bold">
                                    <?php echo esc_html($author); ?>
                                    <?php if ($role) : ?> / <?php echo esc_html($role); ?><?php endif; ?>
                                </span>
                            </cite>
                        </blockquote>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Navigation Arrows — bottom positioned to not block text -->
            <div class="hidden quote-carousel-nav absolute bottom-4 left-0 right-0 flex justify-center gap-4 pointer-events-none">
                <button class="prev-btn pointer-events-auto w-10 h-10 rounded-full bg-black/40 backdrop-blur-sm border border-white/10 hover:bg-[var(--color-bressel-red)]/30 hover:border-[var(--color-bressel-red)]/40 flex items-center justify-center text-white hover:text-[var(--color-bressel-red)] transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    <span class="sr-only">Previous quote</span>
                </button>
                <button class="next-btn pointer-events-auto w-10 h-10 rounded-full bg-black/40 backdrop-blur-sm border border-white/10 hover:bg-[var(--color-bressel-red)]/30 hover:border-[var(--color-bressel-red)]/40 flex items-center justify-center text-white hover:text-[var(--color-bressel-red)] transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <span class="sr-only">Next quote</span>
                </button>
            </div>

            <!-- Navigation Dots -->
            <div class="quote-carousel-dots flex justify-center gap-4 mt-8">
                <?php foreach ($quotes as $index => $quote) : ?>
                    <button class="dot w-3 h-3 rounded-full bg-zinc-600 hover:bg-zinc-500 transition-all <?= $index === 0 ? 'active bg-[var(--color-bressel-red)] w-8' : '' ?>" data-dot-index="<?= $index ?>">
                        <span class="sr-only">Go to slide <?php echo $index + 1; ?></span>
                    </button>
                <?php endforeach; ?>
            </div>


        </div>
    </div>
</section>