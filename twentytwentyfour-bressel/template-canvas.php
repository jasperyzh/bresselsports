<?php
/**
 * Template Name: Canvas (Elementor Escape Hatch)
 */
get_header();
?>
<main class="container mx-auto px-4 py-8">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
</main>
<?php get_footer();