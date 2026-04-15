<?php
/**
 * Title: Newsletter Signup Component
 * Description: Email signup form integrating with Fluent Forms. Use in footer or dedicated sections.
 * How-to Use: get_template_part('components/newsletter-signup', null, ['title' => '...', 'form_id' => 2]);
 * 
 * Note: Requires Fluent Forms plugin. Falls back to mailto: if not available.
 */
$title   = $args['title'] ?? 'Stay in the Game';
$subtitle = $args['subtitle'] ?? 'Get the latest news, events, and exclusive offers.';
$form_id = $args['form_id'] ?? 1; // Default Fluent Forms ID
$dark_bg = $args['dark_bg'] ?? true;
?>
<section class="newsletter-signup py-16 md:py-20 <?= $dark_bg ? 'bg-zinc-900/50' : '' ?>">
    <div class="container-custom">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Icon -->
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-[var(--color-bressel-red)]/10 mb-6">
                <svg class="w-8 h-8 text-[var(--color-bressel-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            
            <!-- Heading -->
            <?php if ($title) : ?>
                <h2 class="text-3xl md:text-5xl mb-4"><?= esc_html($title) ?></h2>
            <?php endif; ?>
            
            <?php if ($subtitle) : ?>
                <p class="text-zinc-400 mb-8"><?= esc_html($subtitle) ?></p>
            <?php endif; ?>
            
            <!-- Form Container -->
            <div class="newsletter-form-wrapper">
                <?php 
                // Check if Fluent Forms is active and has the form
                if (function_exists('fluent_form') && $form_id) : 
                    // Use Fluent Forms render
                    echo do_shortcode('[fluentform id="' . intval($form_id) . '"]');
                else : 
                    // Fallback: Simple mailto form
                ?>
                    <form action="#" method="post" class="newsletter-fallback flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                        <div class="flex-grow">
                            <label for="newsletter-email" class="sr-only">Email address</label>
                            <input type="email" name="email" id="newsletter-email" required
                                   placeholder="Enter your email"
                                   class="w-full px-5 py-4 bg-zinc-900 border border-zinc-800 rounded-xl text-white placeholder-zinc-600 focus:outline-none focus:border-[var(--color-bressel-red)] focus:ring-1 focus:ring-[var(--color-bressel-red)] transition-all" />
                        </div>
                        <button type="submit"
                                class="px-8 py-4 bg-[var(--color-bressel-red)] text-white font-bold uppercase tracking-wider rounded-xl hover:bg-white hover:text-[var(--color-bressel-red)] transition-all whitespace-nowrap">
                            Subscribe
                        </button>
                    </form>
                    <p class="text-zinc-600 text-sm mt-4">No spam, ever. Unsubscribe anytime.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
