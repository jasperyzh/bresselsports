<?php
/**
 * Title: Single Event Template
 * Description: Detailed view of a single event or announcement.
 * How-to Use: Automatically handled by WordPress for 'event' post type.
 */

get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main class="bg-black text-white min-h-screen">
    <!-- Hero Header -->
    <header class="relative section-padding border-b border-zinc-900 bg-zinc-950 flex items-center min-h-[50vh]">
        <div class="absolute inset-0 z-0">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover opacity-30 grayscale']); ?>
            <?php endif; ?>
        </div>
        <div class="container-custom relative z-10">
            <nav class="mb-12">
                <a href="<?= esc_url(get_post_type_archive_link('event')) ?>" class="text-zinc-500 hover:text-bressel-red transition-colors font-bold uppercase tracking-widest text-sm">&larr; Back to Events</a>
            </nav>
            <div class="inline-block bg-bressel-red text-white px-4 py-1 font-black italic text-sm uppercase tracking-widest mb-6">
                <?= get_the_date('F d, Y') ?>
            </div>
            <h1 class="italic leading-none max-w-5xl"><?php the_title(); ?></h1>
        </div>
    </header>

    <!-- Content -->
    <section class="section-padding">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto prose prose-invert prose-red prose-xl">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <!-- Navigation -->
    <section class="section-padding bg-zinc-950 border-t border-zinc-900">
        <div class="container-custom flex justify-between gap-8">
            <div class="w-1/2">
                <?php previous_post_link('%link', '&larr; Previous Announcement', true, '', 'event'); ?>
            </div>
            <div class="w-1/2 text-right">
                <?php next_post_link('%link', 'Next Announcement &rarr;', true, '', 'event'); ?>
            </div>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>

<?php
get_footer();
