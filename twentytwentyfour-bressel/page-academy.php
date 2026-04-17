<?php
/**
 * Title: Academy Page Template
 * Description: Academy landing page — KINETIC PRECISION hero, coach roster, smart booking form.
 * How-to Use: Create a WordPress page and select this template, or visit /academy/
 */

get_header();

$assets_base = get_stylesheet_directory_uri() . '/assets/';
?>

<main class="page-dark">

    <!-- ═══════════════════════════════════════
         1. HERO — KINETIC PRECISION
         Court image background, red accent typography
    ═══════════════════════════════════════ -->
    <section class="hero-section relative min-h-screen flex-col justify-end overflow-hidden">

        <!-- Background image (court) -->
        <div class="absolute inset-0 z-0">
            <img src="<?= esc_url($assets_base . 'hero-bg.jpg') ?>"
                 alt=""
                 class="w-full h-full object-cover select-none pointer-events-none opacity-50"
                 style="filter: saturate(0.3) brightness(0.6);"
                 aria-hidden="true" />
        </div>

        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black/90 z-10"></div>

        <!-- Noise texture -->
        <div class="absolute inset-0 opacity-[0.06] mix-blend-overlay pointer-events-none" style="background-image: url('<?= esc_url($assets_base . 'textures/noise--.png') ?>'); background-size: 256px 256px; background-repeat: repeat; z-index: 11;"></div>

        <!-- BEYOND watermark -->
        <div class="beyond-watermark text-[10rem] md:text-[18rem] lg:text-[24rem] top-1/4 right-0 -translate-y-1/2 select-none pointer-events-none">
            BEYOND
        </div>

        <!-- Content -->
        <div class="relative z-20 container-custom pb-24 md:pb-32">

            <!-- Tagline -->
            <div class="hero-tagline mb-6">
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
                <span class="text-[var(--color-bressel-red)] uppercase text-xs">TRAINING METHODOLOGY</span>
                <span class="block w-8 h-0.5 bg-[var(--color-bressel-red)]"></span>
            </div>

            <!-- Headline -->
            <h1 class="mb-4">
                <span class="block text-5xl md:text-7xl lg:text-8xl font-black uppercase leading-none text-white">KINETIC</span>
                <span class="block text-5xl md:text-7xl lg:text-8xl font-black uppercase leading-none text-[var(--color-bressel-red)]">PRECISION</span>
            </h1>

            <!-- Body -->
            <p class="hero-body text-zinc-400 max-w-2xl mb-10 leading-relaxed">
                A data-driven evolution of padel performance. We dismantle the mechanics of every stroke to reconstruct your game with absolute velocity and strategic ruthlessness.
            </p>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         2. COACH ROSTER
         3 coach cards: B/w photos + accent tags
    ═══════════════════════════════════════ -->
    <section class="section-padding page-dark noise-overlay">
        <div class="container-custom">

            <!-- Section header -->
            <div class="flex items-center gap-4 mb-12">
                <h2 class="section-title lg:text-6xl">COACH ROSTER</h2>
                <div class="flex-1 h-px bg-zinc-800"></div>
                <span class="text-zinc-600 text-xs uppercase tracking-widest hidden md:block">WORLD-CLASS INSTRUCTION</span>
            </div>

            <!-- Coach grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <?php
                $coaches = [
                    [
                        'name'      => 'DANI BRESSEL',
                        'role'      => 'HEAD OF PERFORMANCE',
                        'specialty' => 'MASTER OF THE KINETIC SERVE',
                        'img'       => $assets_base . 'products/cap-goal.jpg',
                        'tag_color' => 'red',
                    ],
                    [
                        'name'      => 'MARCO SILVA',
                        'role'      => 'SENIOR TACTICAL COACH',
                        'specialty' => 'DEFENSIVE TRANSITION SPECIALIST',
                        'img'       => $assets_base . 'products/lifestyle-shot.jpg',
                        'tag_color' => 'zinc',
                    ],
                    [
                        'name'      => 'ELENA VANCE',
                        'role'      => 'TECHNICAL DIRECTOR',
                        'specialty' => 'PRECISION VOLLEY ANALYTICS',
                        'img'       => $assets_base . 'products/cap-on-person.jpg',
                        'tag_color' => 'zinc',
                    ],
                ];

                foreach ($coaches as $coach) :
                    $tag_bg = $coach['tag_color'] === 'red' ? 'bg-[var(--color-bressel-red)]' : 'bg-zinc-700';
                ?>
                    <div class="relative overflow-hidden rounded-lg border border-zinc-800 group" data-animate>
                        <!-- B/w coach photo -->
                        <img src="<?= esc_url($coach['img']) ?>"
                             alt="<?= esc_attr($coach['name']) ?>"
                             class="w-full h-[28rem] object-cover grayscale brightness-75 transition-all duration-700 group-hover:grayscale-0 group-hover:brightness-90 group-hover:scale-105" />

                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent"></div>

                        <!-- Noise overlay -->
                        <div class="absolute inset-0 opacity-[0.05] mix-blend-overlay pointer-events-none" style="background-image: url('<?= esc_url($assets_base . 'textures/noise--.png') ?>'); background-size: 256px 256px; background-repeat: repeat;"></div>

                        <!-- Red accent bar -->
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-[var(--color-bressel-red)] scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

                        <!-- Content -->
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <span class="<?= $tag_bg ?> text-white text-[9px] font-black uppercase tracking-widest px-2 py-0.5 inline-block mb-2">
                                <?= esc_html($coach['role']) ?>
                            </span>
                            <h3 class="text-2xl font-black uppercase italic text-white mb-1"><?= esc_html($coach['name']) ?></h3>
                            <p class="text-zinc-400 text-xs uppercase tracking-wider"><?= esc_html($coach['specialty']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════
         3. TAKE THE ADVANTAGE — Booking CTA
         Split layout: info left, form right
    ═══════════════════════════════════════ -->
    <section class="section-padding page-dark relative noise-overlay texture-dark">

        <!-- BEYOND watermark -->
        <div class="beyond-watermark text-[10rem] md:text-[16rem] lg:text-[20rem] top-1/2 left-0 -translate-y-1/2 select-none pointer-events-none">
            BEYOND
        </div>

        <div class="container-custom relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                <!-- Left: Info -->
                <div data-animate>
                    <h2 class="mb-6">
                        <span class="block text-4xl md:text-6xl font-black uppercase text-white">TAKE THE</span>
                        <span class="block text-4xl md:text-6xl font-black uppercase text-[var(--color-bressel-red)]">ADVANTAGE.</span>
                    </h2>

                    <div class="space-y-6 mt-10">
                        <!-- Feature 1 -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-8 h-8 rounded flex items-center justify-center" style="background-color: rgba(255,51,31,0.15);">
                                <svg class="w-4 h-4 text-[var(--color-bressel-red)]" fill="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-black uppercase text-lg mb-1">HI-INTENSITY CLINICS</h4>
                                <p class="text-zinc-500 text-sm leading-relaxed">60-minute technical sessions designed to push metabolic and skill boundaries.</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-8 h-8 rounded flex items-center justify-center" style="background-color: rgba(255,51,31,0.15);">
                                <svg class="w-4 h-4 text-[var(--color-bressel-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-white font-black uppercase text-lg mb-1">SMART ANALYSIS</h4>
                                <p class="text-zinc-500 text-sm leading-relaxed">Every session includes video review and kinetic output reporting.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Smart Form -->
                <div class="bg-zinc-900/50 border border-zinc-800 rounded-lg p-8 md:p-10" data-animate>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-1 h-8 bg-[var(--color-bressel-red)]"></div>
                        <h3 class="text-xl font-black uppercase text-white">SMART FORM</h3>
                    </div>

                    <form class="space-y-5" action="<?= esc_url(home_url('/contact/')) ?>" method="get">
                        <!-- Player Name -->
                        <div>
                            <label class="block text-zinc-500 text-[10px] uppercase tracking-widest mb-2">PLAYER NAME</label>
                            <input type="text" name="player_name"
                                   placeholder="NAME"
                                   class="w-full bg-black border border-zinc-800 text-white text-sm px-4 py-3 outline-none transition-colors placeholder-zinc-700 focus:border-[var(--color-bressel-red)]/50" />
                        </div>

                        <!-- Expert Level -->
                        <div>
                            <label class="block text-zinc-500 text-[10px] uppercase tracking-widest mb-2">EXPERT LEVEL</label>
                            <select name="level"
                                    class="w-full bg-black border border-zinc-800 text-white text-sm px-4 py-3 outline-none transition-colors appearance-none focus:border-[var(--color-bressel-red)]/50">
                                <option value="" class="text-zinc-600">INTERMEDIATE</option>
                                <option value="advanced">ADVANCED</option>
                                <option value="elite">ELITE</option>
                            </select>
                        </div>

                        <!-- Select Program -->
                        <div>
                            <label class="block text-zinc-500 text-[10px] uppercase tracking-widest mb-2">SELECT PROGRAM</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="cursor-pointer">
                                    <input type="radio" name="program" value="kinetic-1on1" class="peer hidden" checked />
                                    <div class="border border-zinc-800 rounded px-4 py-3 text-center text-white text-xs uppercase tracking-widest peer-checked:border-[var(--color-bressel-red)] peer-checked:bg-[var(--color-bressel-red)]/20 transition-all">
                                        KINETIC 1-ON-1
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="program" value="squad-drills" class="peer hidden" />
                                    <div class="border border-zinc-800 rounded px-4 py-3 text-center text-white text-xs uppercase tracking-widest peer-checked:border-[var(--color-bressel-red)] peer-checked:bg-[var(--color-bressel-red)]/20 transition-all">
                                        SQUAD DRILLS
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                                class="w-full bg-[var(--color-bressel-red)] text-white font-black uppercase tracking-wider py-4 rounded hover:bg-white hover:text-black transition-colors duration-300 flex items-center justify-center gap-3">
                            BOOK A SESSION
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm7 4l-1.4 1.4L14.2 12l-3.6 3.6L12 17l5-5-5-5z"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
