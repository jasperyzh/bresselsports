<?php
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="bg-zinc-900 text-white py-4">
  <div class="container mx-auto px-4 flex justify-between items-center">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-xl font-bold uppercase">BRESSEL</a>
    <nav>
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'flex space-x-4',
        ]);
      ?>
    </nav>
  </div>
</header>
