<?php
/**
 * Title: Community Page Template
 * Description: Community landing — GLOBAL HUB hero, event cards, club partnerships.
 * How-to Use: Create a WordPress page and select this template, or visit /community/
 */

get_header();

$assets_base = get_stylesheet_directory_uri() . '/assets/';
?>

<main class="page-dark">

    <!-- ═══════════════════════════════════════
         1. HERO — THE GLOBAL HUB OF PADEL WARRIOR
         Dark court background, red accent typography
    ═══════════════════════════════════════ -->
    <section class="hero-section relative min-h-screen flex-col justify-end overflow-hidden">

        <!-- Background -->
        <div class="absolute inset-0 z-0">
            <img src="<?= esc_url($assets_base . 'hero-bg.jpg') ?>"
                 alt=""
                 class="w-full h-full object-cover select-none pointer-events-none opacity-40"
                 style="filter: saturate(0) brightness(0.4);"
                 aria-hidden="true" />
        </div>

        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-black/90 z-10"></div>

        <!-- Noise texture -->
        <div class="absolute inset-0 opacity-[0.06] mix-blend-overlay pointer-events-none" style="background-image: url('<?= esc_url($assets_base . 'textures/noise--.png') ?>'); background-size: 256px 256px; background-repeat: repeat; z-index: 11;"></div>

        <!-- Surge accent top -->
        <div class="absolute top-0 left-0 w-24 h-0.5 bg-[var(--color-bressel-red)] opacity-40 z-20" style="transform: skewX(-20deg);"></div>

        <!-- BEYOND watermark -->
        <div class="beyond-watermark text-[10rem] md:text-[18rem] lg:text-[24rem] bottom-1/4 right-0 translate-y-1/2 select-none pointer-events-none">
            BEYOND
        </div>

        <!-- Content -->
        <div class="relative z-20 container-custom pb-24 md:pb-32">

            <!-- Tagline -->
            <div class="hero-tagline mb-6">
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
                <span class="text-[var(--color-bressel-red)] uppercase text-xs">BRESSEL MALAYSIA // SOUTH-EAST ASIA</span>
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
            </div>

            <!-- Headline -->
            <h1 class="mb-4">
                <span class="block text-4xl md:text-6xl lg:text-8xl font-black uppercase leading-none text-white">THE GLOBAL</span>
                <span class="block text-4xl md:text-6xl lg:text-8xl font-black uppercase leading-none text-[var(--color-bressel-red)]">HUB</span>
                <span class="block text-4xl md:text-6xl lg:text-8xl font-black uppercase leading-none text-white">OF PADEL WARRIOR.</span>
            </h1>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         2. UPCOMING EVENTS
         Large featured event + smaller event cards
    ═══════════════════════════════════════ -->
    <section class="section-padding page-dark noise-overlay">
        <div class="container-custom">

            <!-- Section header -->
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h2 class="section-title lg:text-6xl mb-2">UPCOMING EVENTS</h2>
                    <p class="text-zinc-600 text-sm max-w-md">Join the highest precision competitions across South East Asia. Limited slots available for tactical exhibition matches and ranking tournaments.</p>
                </div>
                <a href="<?= esc_url(home_url('/events/')) ?>" class="text-[var(--color-bressel-red)] text-xs font-black uppercase tracking-widest hover:text-white transition-colors flex items-center gap-2">
                    VIEW FULL CALENDAR
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <!-- Events grid: 1 large + 2 small -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Featured event: Junior Padel Circuit -->
                <div class="lg:col-span-2 relative overflow-hidden rounded-lg border border-zinc-800 group" data-animate>
                    <img src="<?= esc_url($assets_base . 'products/cap-on-person.jpg') ?>"
                         alt="Junior Padel Circuit 2026"
                         class="w-full h-[32rem] lg:h-[28rem] object-cover grayscale brightness-70 transition-all duration-700 group-hover:grayscale-30 group-hover:brightness-80 group-hover:scale-105" />

                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>

                    <!-- Noise -->
                    <div class="absolute inset-0 opacity-[0.05] mix-blend-overlay pointer-events-none" style="background-image: url('<?= esc_url($assets_base . 'textures/noise--.png') ?>'); background-size: 256px 256px; background-repeat: repeat;"></div>

                    <!-- Live badge -->
                    <div class="absolute top-4 left-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[var(--color-bressel-red)] animate-pulse"></span>
                        <span class="text-white text-[9px] font-black uppercase tracking-widest bg-black/60 px-2 py-0.5 rounded">LIVE IN</span>
                    </div>

                    <!-- Content -->
                    <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
                        <h3 class="text-2xl md:text-3xl font-black uppercase italic text-white mb-1">JUNIOR PADEL CIRCUIT 2026</h3>
                        <p class="text-zinc-400 text-sm">FEB 24-26 • KUALA LUMPUR, MALAYSIA</p>
                    </div>

                    <!-- Surge bottom accent -->
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-[var(--color-bressel-red)] opacity-40"></div>
                </div>

                <!-- Sidebar events -->
                <div class="space-y-6">

                    <!-- Elite Clinic -->
                    <div class="relative rounded-lg border border-zinc-800 bg-zinc-900/50 p-6 group overflow-hidden" data-animate>
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-[var(--color-bressel-red)] opacity-60"></div>

                        <h4 class="text-white font-black uppercase text-lg mb-2 ml-4">ELITE CLINIC</h4>
                        <p class="text-zinc-500 text-sm mb-4 ml-4 leading-relaxed">Master the technical serve with Head Coach Ferrero. Limited to 8 participants.</p>

                        <div class="flex items-center justify-between ml-4">
                            <span class="text-[var(--color-bressel-red)] text-xs font-black uppercase tracking-widest">SEP 12</span>
                            <svg class="w-4 h-4 text-zinc-600 group-hover:text-[var(--color-bressel-red)] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </div>

                    <!-- Night Smash -->
                    <div class="relative rounded-lg border border-zinc-800 bg-zinc-900/50 p-6 group overflow-hidden" data-animate>
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-zinc-700 opacity-40"></div>

                        <h4 class="text-white font-black uppercase text-lg mb-2 ml-4">NIGHT SMASH</h4>
                        <p class="text-zinc-500 text-sm mb-4 ml-4 leading-relaxed">Social tournament & networking under the lights. Singapore Hub.</p>

                        <div class="flex items-center justify-between ml-4">
                            <span class="text-[var(--color-bressel-red)] text-xs font-black uppercase tracking-widest">SEP 18</span>
                            <svg class="w-4 h-4 text-zinc-600 group-hover:text-[var(--color-bressel-red)] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         3. CLUB PARTNERSHIPS
         Split layout: graphic left, benefits right
    ═══════════════════════════════════════ -->
    <section class="section-padding page-dark relative noise-overlay texture-dark">

        <!-- BEYOND watermark -->
        <div class="beyond-watermark text-[10rem] md:text-[16rem] lg:text-[20rem] top-1/2 left-0 -translate-y-1/2 select-none pointer-events-none">
            BEYOND
        </div>

        <div class="container-custom relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- Left: Graphic -->
                <div class="relative" data-animate>
                    <div class="aspect-square rounded-lg bg-zinc-800 border border-zinc-700 flex items-center justify-center overflow-hidden">
                        <!-- CLUB text graphic -->
                        <div class="text-center">
                            <h3 class="text-6xl md:text-8xl font-black tracking-tight text-white/20 uppercase">CLUB</h3>
                            <p class="text-[var(--color-bressel-red)] text-xs font-black uppercase tracking-[0.5em] mt-4">PARTNERSHIP</p>
                            <div class="mt-3 w-12 h-px bg-zinc-700 mx-auto"></div>
                            <p class="text-zinc-600 text-[8px] uppercase tracking-widest mt-2">SAFE • SAVED • SURE</p>
                        </div>
                    </div>

                    <!-- Surge badge -->
                    <div class="absolute -bottom-4 -right-4 bg-[var(--color-bressel-red)] text-white p-4 rounded-sm shadow-lg">
                        <span class="block text-2xl font-black">12</span>
                        <span class="text-[8px] font-black uppercase tracking-widest">REGIONAL PARTNERS</span>
                    </div>

                    <!-- Noise -->
                    <div class="absolute inset-0 opacity-[0.04] mix-blend-overlay pointer-events-none" style="background-image: url('<?= esc_url($assets_base . 'textures/noise--.png') ?>'); background-size: 256px 256px; background-repeat: repeat; border-radius: inherit;"></div>
                </div>

                <!-- Right: Benefits -->
                <div data-animate>
                    <h2 class="mb-6">
                        <span class="block text-3xl md:text-5xl font-black uppercase text-white">CLUB</span>
                        <span class="block text-3xl md:text-5xl font-black uppercase text-[var(--color-bressel-red)]">PARTNERSHIPS</span>
                    </h2>

                    <p class="text-zinc-400 mb-10 leading-relaxed max-w-md">
                        BRESSEL™ is revolutionizing the facility experience. We partner with premium clubs to provide technical oversight, high-performance equipment, and exclusive regional tournament circuits.
                    </p>

                    <!-- Benefits list -->
                    <ul class="space-y-5 mb-10">
                        <li class="flex items-center gap-4">
                            <div class="w-5 h-5 rounded-full border border-[var(--color-bressel-red)] flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-[var(--color-bressel-red)]" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <span class="text-white font-bold uppercase text-sm tracking-wide">EXCLUSIVE TECHNICAL CERTIFICATION</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="w-5 h-5 rounded-full border border-[var(--color-bressel-red)] flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-[var(--color-bressel-red)]" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <span class="text-white font-bold uppercase text-sm tracking-wide">RETAIL INTEGRATION & PRO-SHOP SUPPORT</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="w-5 h-5 rounded-full border border-[var(--color-bressel-red)] flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-[var(--color-bressel-red)]" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <span class="text-white font-bold uppercase text-sm tracking-wide">MARKETING & COMMUNITY OUTREACH</span>
                        </li>
                    </ul>

                    <a href="<?= esc_url(home_url('/contact/?intent=partner')) ?>"
                       class="btn-solid btn-ripple inline-flex items-center gap-3">
                        BECOME A PARTNER
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm7 4l-1.4 1.4L14.2 12l-3.6 3.6L12 17l5-5-5-5z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
