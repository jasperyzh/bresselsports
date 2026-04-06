<?php
/**
 * Title: Contact Page Template
 * Template Name: Contact Page
 * Description: Get in touch, book sessions, and inquire about products with BRESSEL Padel.
 * How-to Use: Assign this template to the "Contact" page. It dynamically accepts ?intent and ?target URL params.
 */

get_header();

// Grab dynamic URL parameters for the Unified Form
$intent = isset($_GET['intent']) ? sanitize_text_field($_GET['intent']) : 'general';
$target = isset($_GET['target']) ? sanitize_text_field($_GET['target']) : '';

// Adjust copy based on intent
$heading_copy = "GET IN<br/><span class='text-bressel-red'>TOUCH</span>";
$subtext_copy = "We usually respond within 24 hours. Your performance journey starts now.";

if ($intent === 'booking') {
    $heading_copy = "BOOK A<br/><span class='text-bressel-red'>SESSION</span>";
    if ($target) {
        $subtext_copy = "You are requesting a session with <strong>" . esc_html(str_replace('_', ' ', $target)) . "</strong>.";
    }
} elseif ($intent === 'purchase') {
    $heading_copy = "INQUIRE TO<br/><span class='text-bressel-red'>BUY</span>";
    if ($target) {
        $subtext_copy = "You are inquiring about <strong>" . esc_html(str_replace('_', ' ', $target)) . "</strong>. We will contact you regarding availability and secure checkout.";
    }
}
?>

<main class="bg-black text-white min-h-screen flex flex-col justify-center section-padding relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-1/2 left-0 w-96 h-96 bg-bressel-red opacity-10 blur-3xl rounded-full transform -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

    <div class="container-custom relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-start">
            
            <div>
                <div class="accent-bar"></div>
                <h1 class="italic leading-[0.85] mb-12"><?= $heading_copy ?></h1>
                
                <div class="space-y-10 md:space-y-12">
                    <div>
                        <span class="block text-zinc-500 uppercase font-bold tracking-widest text-[10px] mb-3">Location</span>
                        <h3 class="text-xl md:text-2xl uppercase italic leading-tight">Indie Padel Club<br/>Madrid, Spain</h3>
                    </div>
                    
                    <div>
                        <span class="block text-zinc-500 uppercase font-bold tracking-widest text-[10px] mb-3">Email</span>
                        <h3 class="text-xl md:text-2xl uppercase italic hover:text-bressel-red transition-colors">
                            <a href="mailto:hello@bresselpadel.com">hello@bresselpadel.com</a>
                        </h3>
                    </div>

                    <div>
                        <span class="block text-zinc-500 uppercase font-bold tracking-widest text-[10px] mb-3">Direct & Social</span>
                        <div class="flex flex-wrap gap-4 md:gap-8">
                            <a href="https://wa.me/" class="text-xl uppercase font-bold italic hover:text-bressel-red transition-colors flex items-center gap-2">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span> WhatsApp
                            </a>
                            <a href="#" class="text-xl uppercase font-bold italic hover:text-bressel-red transition-colors">Telegram</a>
                            <a href="#" class="text-xl uppercase font-bold italic hover:text-bressel-red transition-colors">Instagram</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Unified Form Area -->
            <div class="bg-dark-accent p-8 md:p-14">
                <h2 class="text-2xl md:text-3xl mb-4 italic">SEND A MESSAGE</h2>
                <p class="text-sm text-zinc-400 mb-10 italic"><?= wp_kses_post($subtext_copy) ?></p>
                
                <div class="w-full">
                    <!-- 
                        Fluent Forms Integration:
                        - ID 1 is assumed to be the master Unified Form.
                        - Styling is controlled via .fluentform overrides in main.css.
                    -->
                    <?php if (shortcode_exists('fluentform')) : ?>
                        <?php echo do_shortcode('[fluentform id="1"]'); ?>
                    <?php else : ?>
                        <div class="text-center py-16 border-2 border-dashed border-zinc-800 rounded-2xl">
                            <span class="text-bressel-red font-black italic uppercase tracking-widest text-xl mb-2 block">Form Missing</span>
                            <span class="text-zinc-500 font-bold uppercase tracking-[0.2em] text-[10px]">Please install and configure Fluent Forms</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</main>

<?php
get_footer();

