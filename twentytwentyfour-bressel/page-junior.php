<?php
/**
 * Title: Junior Program Template
 * Template Name: Junior Program
 * Description: A high-performance landing page for the Junior Competition Program.
 * How-to Use: Assign this template to the "Junior Program" page in WP Admin.
 */

get_header();
?>

<main class="bg-black text-white">
    <!-- Hero Section -->
    <section class="relative min-h-[70vh] flex items-center bg-zinc-950 border-b border-zinc-900/50 overflow-hidden">
        <div class="absolute inset-0 opacity-20 pointer-events-none mask-gradient-to-b">
            <!-- Background pattern would go here -->
        </div>
        <div class="container-custom relative z-10 py-24">
            <div class="accent-bar"></div>
            <span class="text-bressel-red font-bold uppercase tracking-[0.4em] mb-6 block text-xs">Competition Program</span>
            <h1 class="italic leading-[0.85] mb-10 md:text-9xl">
                JUNIOR<br/>
                <span class="text-gradient-red">ACADEMY</span>
            </h1>
            <div class="max-w-2xl">
                <p class="text-xl md:text-3xl font-bold text-white italic leading-tight">Train with the method of the professionals. Performance-driven development for the next generation.</p>
            </div>
        </div>
    </section>


    <!-- Methodology & Info -->
    <section class="section-padding">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div>
                    <h2 class="mb-8">LEARN WITH THE<br/>PROFESSIONALS</h2>
                    <p>In our youth academy, we train players in their early stages. We do it with our method based on five core pillars: teamwork, technical precision, tactical intelligence, mental preparation, and the BRESSEL values.</p>
                    <p>Our competition program helps you improve the quality of your game, achieving more consistency, rhythm, and variety in your strokes.</p>
                    
                    <div class="mt-12 p-8 bg-zinc-900/50 border border-zinc-800 rounded-2xl">
                        <h3 class="text-2xl mb-6 italic">THE METHODOLOGY</h3>
                        <ul class="space-y-4 font-bold uppercase tracking-wide text-zinc-300">
                            <li class="flex items-center gap-3"><span class="w-2 h-2 bg-bressel-red rounded-full"></span> Methodology M3 Inspired</li>
                            <li class="flex items-center gap-3"><span class="w-2 h-2 bg-bressel-red rounded-full"></span> Monday to Thursday</li>
                            <li class="flex items-center gap-3"><span class="w-2 h-2 bg-bressel-red rounded-full"></span> Indie Padel Club HQ</li>
                            <li class="flex items-center gap-3"><span class="w-2 h-2 bg-bressel-red rounded-full"></span> Integrated Fitness Training</li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col justify-center">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-zinc-900 p-8 rounded-2xl border border-zinc-800 flex flex-col items-center text-center">
                            <span class="text-4xl font-black italic mb-2">01</span>
                            <span class="uppercase font-bold tracking-widest text-sm text-zinc-500">Technical</span>
                        </div>
                        <div class="bg-zinc-900 p-8 rounded-2xl border border-zinc-800 flex flex-col items-center text-center">
                            <span class="text-4xl font-black italic mb-2">02</span>
                            <span class="uppercase font-bold tracking-widest text-sm text-zinc-500">Tactical</span>
                        </div>
                        <div class="bg-zinc-900 p-8 rounded-2xl border border-zinc-800 flex flex-col items-center text-center">
                            <span class="text-4xl font-black italic mb-2">03</span>
                            <span class="uppercase font-bold tracking-widest text-sm text-zinc-500">Physical</span>
                        </div>
                        <div class="bg-zinc-900 p-8 rounded-2xl border border-zinc-800 flex flex-col items-center text-center">
                            <span class="text-4xl font-black italic mb-2">04</span>
                            <span class="uppercase font-bold tracking-widest text-sm text-zinc-500">Mental</span>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h3 class="mb-6">CONSULT OUR RATES</h3>
                        <?php get_template_part('components/button', null, ['text' => 'See Rates', 'variant' => 'solid', 'class' => 'w-full md:w-auto text-center']); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="section-padding bg-zinc-950">
        <div class="container-custom">
            <h2 class="text-center mb-16">TRAINING CATEGORIES</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php 
                $categories = [
                    ['name' => 'ALEVÍN', 'age' => 'U12'],
                    ['name' => 'INFANTIL', 'age' => 'U14'],
                    ['name' => 'CADETE', 'age' => 'U16'],
                    ['name' => 'JUNIOR', 'age' => 'U18'],
                ];
                foreach ($categories as $cat) : ?>
                <div class="bg-zinc-900 p-10 rounded-2xl border border-zinc-800 text-center hover:border-bressel-red transition-colors group">
                    <span class="text-zinc-500 font-bold mb-4 block"><?= esc_html($cat['age']) ?></span>
                    <h4 class="group-hover:text-bressel-red transition-colors italic"><?= esc_html($cat['name']) ?></h4>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="section-padding relative overflow-hidden">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-bressel-red opacity-5 transform skew-x-12 translate-x-1/2 pointer-events-none"></div>
        <div class="container-custom relative z-10">
            <div class="max-w-4xl">
                <h2 class="mb-8 italic">READY TO JOIN THE<br/><span class="text-bressel-red">COMPETITION?</span></h2>
                <p class="text-xl mb-12">Fill in the form and sign up now! Our team will contact you to schedule a placement test.</p>
                
                <div class="bg-zinc-900 p-8 md:p-12 rounded-3xl border border-zinc-800">
                    <!-- Placeholder for Fluent Forms -->
                    <div class="text-center py-12 border-2 border-dashed border-zinc-800 rounded-xl">
                        <span class="text-zinc-600 font-bold uppercase tracking-widest">[ Fluent Form Shortcode Here ]</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
