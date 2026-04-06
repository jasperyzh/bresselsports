<?php
/**
 * Title: About Page Template
 * Template Name: About Page
 * Description: The story, vision, and mission of BRESSEL Padel.
 * How-to Use: Assign this template to the "About" page in WP Admin.
 */

get_header();
?>

<main class="bg-black text-white">
    <!-- Story Header -->
    <section class="section-padding border-b border-zinc-900 bg-gradient-to-b from-zinc-950 to-black">
        <div class="container-custom">
            <h1 class="italic leading-none mb-12">THE<br/><span class="text-bressel-red">BRESSEL</span> STORY</h1>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="prose prose-invert prose-xl max-w-none">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
                <div class="relative">
                    <div class="aspect-[4/5] bg-zinc-900 rounded-2xl overflow-hidden shadow-2xl">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                        <?php else : ?>
                            <div class="w-full h-full flex items-center justify-center italic text-4xl font-black text-zinc-800">BRESSEL</div>
                        <?php endif; ?>
                    </div>
                    <!-- Decorative element -->
                    <div class="absolute -bottom-8 -right-8 w-48 h-48 bg-bressel-red opacity-10 blur-3xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Values -->
    <section class="section-padding bg-zinc-950">
        <div class="container-custom">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <h3 class="italic text-bressel-red mb-6">OUR VISION</h3>
                    <p class="text-zinc-300">To redefine the padel experience by making elite-level coaching and community accessible to every player, from juniors to seasoned pros.</p>
                </div>
                <div>
                    <h3 class="italic text-bressel-red mb-6">OUR MISSION</h3>
                    <p class="text-zinc-300">Empowering players through a scientifically-backed methodology, high-performance gear, and a culture built on discipline and passion.</p>
                </div>
                <div>
                    <h3 class="italic text-bressel-red mb-6">OUR VALUES</h3>
                    <p class="text-zinc-300">Excellence, Community, and Momentum. We don't just play the game; we push the boundaries of what's possible on the court.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Academy Numbers -->
    <section class="section-padding">
        <div class="container-custom">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <span class="block text-6xl md:text-8xl font-black italic text-zinc-800 mb-2">15+</span>
                    <span class="uppercase font-bold tracking-widest text-zinc-500">Expert Coaches</span>
                </div>
                <div class="text-center">
                    <span class="block text-6xl md:text-8xl font-black italic text-zinc-800 mb-2">500</span>
                    <span class="uppercase font-bold tracking-widest text-zinc-500">Active Players</span>
                </div>
                <div class="text-center">
                    <span class="block text-6xl md:text-8xl font-black italic text-zinc-800 mb-2">08</span>
                    <span class="uppercase font-bold tracking-widest text-zinc-500">Tournament Wins</span>
                </div>
                <div class="text-center">
                    <span class="block text-6xl md:text-8xl font-black italic text-zinc-800 mb-2">100%</span>
                    <span class="uppercase font-bold tracking-widest text-zinc-500">Commitment</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="section-padding bg-bressel-red text-white">
        <div class="container-custom text-center">
            <h2 class="text-white mb-8 italic">WANT TO BE PART OF THE STORY?</h2>
            <?php get_template_part('components/button', null, [
                'text' => 'Join the Academy', 
                'variant' => 'outline', 
                'class' => 'border-white text-white hover:bg-white hover:text-bressel-red'
            ]); ?>
        </div>
    </section>
</main>

<?php
get_footer();
