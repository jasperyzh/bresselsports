<?php
/**
 * Template Name: UI Components Demo
 * Description: Systematic UI component showcase — build section by section.
 */

get_header();

$assets_base = get_stylesheet_directory_uri() . '/assets/';
?>

<main class="bg-zinc-950 text-white">

    <!-- ═══ 0. HEADER NAVIGATION (sticky demo) ═══ -->
    <nav class="sticky top-16 z-40 bg-black/90 backdrop-blur-sm border-b border-zinc-800" id="demo-nav">
        <div class="container-custom py-4">
            <div class="flex flex-wrap gap-3 overflow-x-auto pb-2">
                <a href="#nav-check" class="text-xs font-bold uppercase tracking-widest text-zinc-500 px-3 py-2 border border-zinc-800 rounded">1. Nav</a>
                <a href="#hero-check" class="text-xs font-bold uppercase tracking-widest text-zinc-500 px-3 py-2 border border-zinc-800 rounded">2. Hero</a>
                <a href="#stats-check" class="text-xs font-bold uppercase tracking-widest text-zinc-500 px-3 py-2 border border-zinc-800 rounded">3. Stats</a>
                <a href="#split-check" class="text-xs font-bold uppercase tracking-widest text-zinc-500 px-3 py-2 border border-zinc-800 rounded">4. Split</a>
                <a href="#grid-check" class="text-xs font-bold uppercase tracking-widest text-zinc-500 px-3 py-2 border border-zinc-800 rounded">5. Grid</a>
                <a href="#cards-check" class="text-xs font-bold uppercase tracking-widest text-zinc-500 px-3 py-2 border border-zinc-800 rounded">6. Cards</a>
                <a href="#carousel-step" class="text-xs font-bold uppercase tracking-widest text-zinc-500 px-3 py-2 border border-zinc-800 rounded">7. Carousel</a>
                <a href="#faq-check" class="text-xs font-bold uppercase tracking-widest text-zinc-500 px-3 py-2 border border-zinc-800 rounded">8. FAQ</a>
                <a href="#newsletter-check" class="text-xs font-bold uppercase tracking-widest text-zinc-500 px-3 py-2 border border-zinc-800 rounded">9. Newsletter</a>
            </div>
        </div>
    </nav>

    <!-- ═══════════════════════════════════════
         STEP 0: HEAD/BASE CHECK
    ═══════════════════════════════════════ -->
    <section id="nav-check" class="bg-black py-8">
        <div class="container-custom">
            <div class="b-card">
                <p class="text-white font-bold text-lg mb-2">✓ Step 0: Head & Base CSS Loaded</p>
                <p class="text-zinc-400 text-sm">If you see this card with proper styling (zinc-800 bg, rounded, shadow), Tailwind + Starwind patterns are working.</p>
                <div class="mt-4 flex gap-4 text-xs font-mono">
                    <span class="text-zinc-500">Page: <?= basename($_SERVER['REQUEST_URI']) ?></span>
                    <span class="text-zinc-500">Theme: <?= get_stylesheet() ?></span>
                </div>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 1: HEADER/FOOTER CHECK
    ═══════════════════════════════════════ -->
    <section id="hero-check" class="bg-zinc-950 py-8" style="scroll-margin-top: 4rem;">
        <div class="container-custom">
            <div class="b-card">
                <p class="text-white font-bold text-lg mb-2">✓ Step 1: Header/Footer Working</p>
                <p class="text-zinc-400 text-sm">If this card appears with correct styling, header.php and footer.php are properly loaded.</p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 2: PAGE WRAPPER CHECK
    ═══════════════════════════════════════ -->
    <section id="stats-check" class="bg-black py-8" style="scroll-margin-top: 4rem;">
        <div class="container-custom">
            <div class="b-card">
                <p class="text-white font-bold text-lg mb-2">✓ Step 2: Page Wrapper / Container Custom Working</p>
                <p class="text-zinc-400 text-sm">If this card is properly centered with max-width, the container-custom class is working.</p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 3: SPACING / SECTION LAYOUT
    ═══════════════════════════════════════ -->
    <section id="split-check" class="bg-zinc-900 py-8" style="scroll-margin-top: 4rem;">
        <div class="container-custom">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="b-card">
                    <p class="text-white font-bold text-lg mb-2">✓ Step 3a: Section Spacing</p>
                    <p class="text-zinc-400 text-sm">If this card has proper padding, section padding classes work.</p>
                </div>
                <div class="b-card">
                    <p class="text-white font-bold text-lg mb-2">✓ Step 3b: Grid System</p>
                    <p class="text-zinc-400 text-sm">If you see two cards side-by-side on desktop, Tailwind grid works.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 4: SECTION-CONTENT-SPLIT TEMPLATE
    ═══════════════════════════════════════ -->
    <section id="cards-check" class="bg-black py-8" style="scroll-margin-top: 4rem;">
        <div class="container-custom">
            <div class="b-card">
                <p class="text-white font-bold text-lg mb-2">✓ Step 4: Section Content Split Template</p>
                <p class="text-zinc-400 text-sm mb-4">Testing section-content-split.php with 61.8/38.2 golden ratio grid:</p>
            </div>
            <?php get_template_part('components/section-content-split', null, [
                'layout' => 'main-sidebar',
                'title' => 'Golden Ratio Split Check',
                'content' => '<p>This is the main content column (61.8% width). If this card and the sidebar appear side by side with proper proportions, the section-content-split template is working correctly.</p>',
                'sidebar_html' => '<div class="b-card"><p class="text-zinc-400 text-sm">Sidebar column (38.2%) — if you see this beside the content, grid split works.</p></div>',
                'bg' => 'black',
            ]); ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 5: SECTION-STATS-STRIP TEMPLATE
    ═══════════════════════════════════════ -->
    <section id="carousel-check" class="bg-black" style="scroll-margin-top: 4rem;">
        <?php get_template_part('components/section-stats-strip', null, [
            'stats' => [
                ['value' => '500+', 'label' => 'Players Coached'],
                ['value' => '12', 'label' => 'Certified Coaches'],
                ['value' => '4', 'label' => 'Academy Locations'],
                ['value' => '3', 'label' => 'National Titles'],
            ],
            'bg' => 'black',
        ]); ?>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 6: SECTION-CARD-GRID — COACH CARDS
    ═══════════════════════════════════════ -->
    <section id="grid-check" class="section-padding bg-black" style="scroll-margin-top: 4rem;">
        <div class="container-custom">
            <div class="b-card mb-8">
                <p class="text-white font-bold text-lg">✓ Step 6a: Card Grid — Coach Cards</p>
            </div>
            <?php get_template_part('components/section-card-grid', null, [
                'title' => 'Coach Cards Test',
                'cards' => [
                    ['name' => 'Coach Jeremy', 'role' => 'Head of Pro Training', 'image' => $assets_base . 'placeholder.jpg'],
                    ['name' => 'Coach Sofia', 'role' => 'Performance Coach', 'image' => $assets_base . 'placeholder.jpg'],
                    ['name' => 'Coach Ravi', 'role' => 'Junior Development', 'image' => $assets_base . 'placeholder.jpg'],
                ],
                'card_type' => 'coach',
                'cols' => '3',
                'bg' => 'black',
            ]); ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 7: SECTION-CARD-GRID — MERCH CARDS
    ═══════════════════════════════════════ -->
    <section id="cards-check-2" class="section-padding bg-zinc-950" style="scroll-margin-top: 4rem;">
        <div class="container-custom">
            <div class="b-card mb-8">
                <p class="text-white font-bold text-lg">✓ Step 7: Card Grid — Merch Cards</p>
            </div>
            <?php get_template_part('components/section-card-grid', null, [
                'title' => 'Merch Cards Test',
                'cards' => [
                    ['name' => 'PADEL-X Pro', 'price' => 'RM 160', 'image' => $assets_base . 'placeholder.jpg'],
                    ['name' => 'KINETIC GRIP V1', 'price' => 'RM 159', 'image' => $assets_base . 'placeholder.jpg'],
                    ['name' => 'PRO TOUR BAG', 'price' => 'RM 220', 'image' => $assets_base . 'placeholder.jpg'],
                ],
                'card_type' => 'merch',
                'cols' => '3',
                'bg' => 'black',
            ]); ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 8: QUOTE CAROUSEL
    ═══════════════════════════════════════ -->
    <section id="carousel-step" class="bg-black" style="scroll-margin-top: 4rem;">
        <div class="container-custom mb-8">
            <div class="b-card">
                <p class="text-white font-bold text-lg">✓ Step 8: Quote Carousel</p>
            </div>
        </div>
        <?php get_template_part('components/section-quote-carousel', null, [
            'quotes' => [
                ['text' => 'Padel is not just a game of force. It is a symphony of kinetic precision.', 'author' => 'Dani', 'role' => 'Padel Coach / Malaysia\'s National Team'],
                ['text' => 'The best players don\'t hit harder. They hit smarter.', 'author' => 'Marcus L.', 'role' => 'Regional Champion 2025'],
                ['text' => 'From zero to tournament-ready in six months.', 'author' => 'Sarah Tan', 'role' => 'Club Player, KL'],
            ],
        ]); ?>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 9: FAQ SECTION
    ═══════════════════════════════════════ -->
    <section id="faq-check" class="section-padding bg-zinc-950" style="scroll-margin-top: 4rem;">
        <div class="container-custom">
            <div class="b-card mb-8">
                <p class="text-white font-bold text-lg">✓ Step 9: FAQ Accordion</p>
            </div>
            <?php get_template_part('components/section-faq', null, [
                'title' => 'FAQ Test',
                'questions' => [
                    ['q' => 'What level of experience do I need?', 'a' => 'No experience needed. We welcome beginners through elite athletes.'],
                    ['q' => 'Where are your academy locations?', 'a' => 'We have multiple centers across Malaysia.'],
                    ['q' => 'Do I need my own equipment?', 'a' => 'No. We provide rackets and balls for all beginners.'],
                ],
            ]); ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         STEP 10: NEWSLETTER CTA
    ═══════════════════════════════════════ -->
    <section id="newsletter-check" class="section-padding bg-black" style="scroll-margin-top: 4rem;">
        <div class="container-custom">
            <div class="b-card mb-8">
                <p class="text-white font-bold text-lg">✓ Step 10: Newsletter CTA</p>
            </div>
            <?php get_template_part('components/section-newsletter-cta', null, [
                'title' => 'Newsletter Test',
                'subtitle' => 'This tests the newsletter CTA section with watermark, form, and button.',
                'placeholder' => 'your@email.com',
                'button_text' => 'Subscribe',
            ]); ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         BONUS: BUTTONS / FORMS SHOWCASE
    ═══════════════════════════════════════ -->
    <section class="section-padding bg-zinc-900" style="scroll-margin-top: 4rem;">
        <div class="container-custom">
            <div class="b-card mb-8">
                <p class="text-white font-bold text-lg">Bonus: Buttons & Forms</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Buttons -->
                <div>
                    <h3 class="text-zinc-300 font-bold uppercase tracking-widest text-xs mb-4">Buttons</h3>
                    <div class="flex flex-wrap gap-4 mb-8">
                        <?php get_template_part('components/button', null, ['text' => 'Solid', 'variant' => 'solid']); ?>
                        <?php get_template_part('components/button', null, ['text' => 'Outline', 'variant' => 'outline']); ?>
                        <?php get_template_part('components/button', null, ['text' => 'Ghost', 'variant' => 'ghost']); ?>
                    </div>

                    <h3 class="text-zinc-300 font-bold uppercase tracking-widest text-xs mb-4">Accordion Demo</h3>
                    <div class="space-y-3">
                        <?php get_template_part('components/accordion', null, ['title' => 'Test Accordion 1', 'content' => 'Accordion content here.']); ?>
                        <?php get_template_part('components/accordion', null, ['title' => 'Test Accordion 2', 'content' => 'Another accordion panel.']); ?>
                    </div>
                </div>

                <!-- Forms -->
                <div>
                    <h3 class="text-zinc-300 font-bold uppercase tracking-widest text-xs mb-4">Form Elements</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Name</label>
                            <input type="text" placeholder="Enter name" class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white placeholder-zinc-500 text-sm focus:outline-none focus:border-[var(--color-bressel-red)] transition-colors rounded" />
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Email</label>
                            <input type="email" placeholder="you@example.com" class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white placeholder-zinc-500 text-sm focus:outline-none focus:border-[var(--color-bressel-red)] transition-colors rounded" />
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-zinc-400 mb-2">Message</label>
                            <textarea rows="3" placeholder="Your message..." class="w-full px-4 py-3 bg-zinc-900 border border-zinc-700 text-white placeholder-zinc-500 text-sm focus:outline-none focus:border-[var(--color-bressel-red)] transition-colors rounded resize-y"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         FOOTER
    ═══════════════════════════════════════ -->
    <footer class="py-12 bg-zinc-950 border-t border-zinc-800">
        <div class="container-custom text-center">
            <p class="text-zinc-600 text-sm">
                BRESSEL™ UI Demo — Systematic Verification<br/>
                Build: <?= file_exists(get_stylesheet_directory() . '/dist/.vite/manifest.json') ? 'Vite Production' : 'No Manifest' ?>
            </p>
        </div>
    </footer>

</main>

<script>
    // Smooth scroll for nav links
    document.querySelectorAll('#demo-nav a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Active nav link highlighter
    const sections = ['nav-check', 'hero-check', 'stats-check', 'split-check', 'cards-check', 'carousel-step', 'faq-check', 'newsletter-check', 'grid-check'];
    const navLinks = document.querySelectorAll('#demo-nav a');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                navLinks.forEach(link => {
                    const href = link.getAttribute('href').replace('#', '');
                    if (href === entry.target.id) {
                        link.classList.add('text-[var(--color-bressel-red)]', 'border-[var(--color-bressel-red)]');
                        link.classList.remove('text-zinc-500', 'border-zinc-800');
                    } else {
                        link.classList.remove('text-[var(--color-bressel-red)]', 'border-[var(--color-bressel-red)]');
                        link.classList.add('text-zinc-500', 'border-zinc-800');
                    }
                });
            }
        });
    }, { threshold: 0.3 });

    sections.forEach(id => {
        const el = document.getElementById(id);
        if (el) observer.observe(el);
    });
</script>

<?php get_footer(); ?>
