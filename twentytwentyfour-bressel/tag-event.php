<?php
/**
 * Title: Event Tag Archive Template
 * Description: Displays posts tagged with 'event' (announcements, news).
 * How-to Use: Automatically handles /tag/event/ URL for default posts
 */

get_header();
?>

<main class="bg-black text-white py-20">
    <div class="container-custom">
        <header class="mb-20">
            <h1 class="italic italic leading-none mb-4">ANNOUNCEMENTS &<br/><span class="text-bressel-red">NEWS</span></h1>
            <p class="text-xl text-zinc-400">Stay up to date with the latest from the BRESSEL community.</p>
        </header>

        <div class="space-y-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="group bg-zinc-950 border border-zinc-900 rounded-3xl overflow-hidden hover:border-bressel-red transition-colors flex flex-col md:flex-row">
                    <div class="md:w-1/3 aspect-video md:aspect-auto bg-zinc-900 relative">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500']); ?>
                        <?php endif; ?>
                        <div class="absolute top-6 left-6 bg-bressel-red text-white px-4 py-1 font-black italic text-sm uppercase tracking-widest shadow-xl">
                            <?= get_the_date('M d, Y') ?>
                        </div>
                    </div>
                    
                    <div class="p-8 md:p-12 md:w-2/3 flex flex-col justify-center">
                        <h2 class="text-3xl md:text-4xl mb-6 group-hover:text-bressel-red transition-colors italic leading-none">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="text-zinc-400 text-lg mb-8 line-clamp-3">
                            <?php the_excerpt(); ?>
                        </div>
                        <div>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-bressel-red font-bold uppercase tracking-widest text-sm group-hover:gap-4 transition-all">
                                Read Full Article <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endwhile; else : ?>
                <div class="text-center py-20 bg-zinc-900 rounded-3xl border border-zinc-800">
                    <p class="text-zinc-500 italic text-2xl font-bold uppercase">No announcements at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();
