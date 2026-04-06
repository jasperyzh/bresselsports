<?php
/**
 * Title: Front Page Template
 * Description: The homepage of the BRESSEL Padel website.
 * How-to Use: Automatically assigned to the site front page.
 */

get_header();

// 1. Hero Section
get_template_part('components/hero-banner', null, [
    'heading' => 'World-class padel,<br/><span class="text-gradient-red italic">within reach.</span>',
    'subtext' => 'Join the elite community of BRESSEL Padel. Expert coaching, premium gear, and the best courts in town.'
]);
?>

<main class="bg-black text-white">
    <div class="container-custom">
        
        <!-- 2. Coaches Preview -->
        <section id="coaches" class="section-padding">
            <div class="flex flex-col md:flex-row justify-between items-baseline mb-16 gap-6">
                <div>
                    <div class="accent-bar"></div>
                    <h2 class="italic italic">The Academy</h2>
                    <p class="text-zinc-500 mt-2 max-w-lg">Learn from the best to become the best. Our methodology is built on five core pillars of high performance.</p>
                </div>
                <a href="<?= esc_url(get_post_type_archive_link('coach')) ?>" class="text-bressel-red font-bold uppercase hover:text-white transition-colors tracking-[0.2em] text-xs pb-1 border-b-2 border-bressel-red">View All Coaches</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php
                $coaches_query = new WP_Query([
                    'post_type' => 'coach',
                    'posts_per_page' => 3,
                ]);

                if ($coaches_query->have_posts()) : 
                    while ($coaches_query->have_posts()) : $coaches_query->the_post();
                        get_template_part('components/coach-card', null, [
                            'name'  => get_the_title(),
                            'image' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                            'role'  => get_post_meta(get_the_ID(), '_bressel_coach_role', true) ?: 'Coach'
                        ]);
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="text-zinc-700 italic">No coaches found. Check back soon!</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- 3. Latest Events & Announcements -->
        <section id="announcements" class="section-padding border-y border-zinc-900/50">
            <div class="flex flex-col md:flex-row justify-between items-baseline mb-16 gap-6">
                <div>
                    <div class="accent-bar"></div>
                    <h2 class="italic italic">Announcements</h2>
                    <p class="text-zinc-500 mt-2 max-w-lg">Stay in the loop with BRESSEL news, tournaments, and community events.</p>
                </div>
                <a href="<?= esc_url(get_post_type_archive_link('event')) ?>" class="text-bressel-red font-bold uppercase hover:text-white transition-colors tracking-[0.2em] text-xs pb-1 border-b-2 border-bressel-red">All Announcements</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <?php
                $events_query = new WP_Query([
                    'post_type' => 'event',
                    'posts_per_page' => 2,
                ]);

                if ($events_query->have_posts()) : 
                    while ($events_query->have_posts()) : $events_query->the_post(); ?>
                        <article class="bg-dark-accent p-10 group transition-all duration-500 hover:border-bressel-red/50">
                            <span class="text-bressel-red font-bold uppercase tracking-[0.2em] text-[10px] mb-4 block"><?= get_the_date('M d, Y') ?></span>
                            <h3 class="text-3xl mb-6 italic leading-tight group-hover:text-bressel-red transition-colors">
                                <a href="<?= esc_url(get_permalink()); ?>"><?= esc_html(get_the_title()); ?></a>
                            </h3>
                            <div class="text-zinc-400 mb-8 line-clamp-2">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-white font-bold uppercase tracking-widest text-[10px] group-hover:gap-4 transition-all">
                                Read Full Article <span class="text-bressel-red">&rarr;</span>
                            </a>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="text-zinc-700 italic">No announcements today.</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- 4. Merch Preview -->
        <section id="merch" class="section-padding">
            <div class="flex flex-col md:flex-row justify-between items-baseline mb-16 gap-6">
                <div>
                    <div class="accent-bar"></div>
                    <h2 class="italic italic">BRESSEL PRO</h2>
                    <p class="text-zinc-500 mt-2 max-w-lg">Engineered for the court. Designed for the community. Explore our latest technical gear.</p>
                </div>
                <a href="<?= esc_url(get_post_type_archive_link('merch')) ?>" class="text-bressel-red font-bold uppercase hover:text-white transition-colors tracking-[0.2em] text-xs pb-1 border-b-2 border-bressel-red">Shop Collection</a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $merch_query = new WP_Query([
                    'post_type' => 'merch',
                    'posts_per_page' => 3,
                ]);

                if ($merch_query->have_posts()) : 
                    while ($merch_query->have_posts()) : $merch_query->the_post();
                        get_template_part('components/merch-card', null, [
                            'name'  => get_the_title(),
                            'image' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                            'price' => get_post_meta(get_the_ID(), '_bressel_merch_price', true) ?: '??'
                        ]);
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="text-zinc-700 italic">Gear coming soon.</p>';
                endif;
                ?>
            </div>
        </section>

    </div>
</main>

<?php
get_footer();
