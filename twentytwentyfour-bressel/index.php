<?php
/**
 * Title: Main Index Template
 * Description: The fallback template when a more specific template is not found.
 * How-to Use: Automatically loaded by WordPress.
 */

get_header();
?>

<main class="container mx-auto px-4 py-20 bg-black text-white min-h-screen">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article class="prose prose-invert prose-red mx-auto">
      <h1 class="text-4xl font-black uppercase italic tracking-tighter mb-8"><?php the_title(); ?></h1>
      <div><?php the_content(); ?></div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_footer();

