<?php
/**
 * Title: Theme Header
 * Description: The global header template including the head section and navigation.
 * How-to Use: Automatically loaded via get_header().
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <!-- Critical CSS to prevent white flash -->
  <style>
    html, body { background-color: #000000 !important; }
  </style>
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-black text-white antialiased'); ?> style="background-color: #000000;">
<header id="main-header" class="header-transparent text-white sticky top-0 z-[100] transition-all duration-500">
  <div class="container-custom flex justify-between items-center h-16 md:h-20">

    <!-- Logo -->
    <a href="<?= esc_url(home_url('/')); ?>" class="flex items-center gap-2 hover:opacity-80 transition-opacity relative z-[210]">
      <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-bressel-white.png') ?>" alt="BRESSEL™" class="h-8 md:h-20 w-auto" loading="eager" />
    </a>

    <!-- Desktop Nav (centered) -->
    <nav class="hidden lg:block absolute left-1/2 -translate-x-1/2">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'bressel-desktop-nav',
          'fallback_cb' => false,
        ]);
      ?>
    </nav>

    <!-- Right: CTA + Mobile toggle -->
    <div class="flex items-center gap-4 relative z-[210]">
        <a href="<?php echo esc_url(home_url('/contact/?intent=booking')); ?>"
         class="group header-cta btn-ripple hidden md:inline-flex">
        BOOK SESSION
        <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-icon-white.svg') ?>" alt="Brain Icon" class="w-8 h-8 group-hover:hidden" />
        <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-icon-red.svg') ?>" alt="Brain Icon" class="hidden w-8 h-8 group-hover:block" />
      </a>

      <!-- Mobile Menu Toggle -->
      <button id="mobile-menu-btn" class="lg:hidden text-white uppercase font-bold tracking-widest text-xs p-2 focus:outline-none focus:text-[var(--color-bressel-red)] transition-colors">
        <span id="mobile-menu-text">Menu</span>
      </button>
    </div>
  </div>
</header>

<!-- Full-Screen Mobile Menu Overlay -->
<div id="mobile-menu" class="fixed inset-0 bg-black/95 backdrop-blur-3xl z-[200] hidden flex-col justify-center items-center">
    <!-- Close Button (Top Right) -->
    <button id="mobile-menu-close" class="absolute top-6 right-6 text-white hover:text-bressel-red transition-colors p-2 z-[220]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    
    <nav class="w-full">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'flex flex-col items-center space-y-8 uppercase font-black italic tracking-tighter',
          'fallback_cb' => false,
        ]);
      ?>
    </nav>
    <div class="absolute bottom-12 text-center">
        <span class="block text-zinc-500 font-bold uppercase tracking-widest text-xs mb-4">Connect With Us</span>
        <div class="flex gap-6 justify-center">
            <a href="#" class="text-white hover:text-bressel-red font-bold uppercase tracking-widest text-sm transition-colors">WA</a>
            <a href="#" class="text-white hover:text-bressel-red font-bold uppercase tracking-widest text-sm transition-colors">TG</a>
            <a href="#" class="text-white hover:text-bressel-red font-bold uppercase tracking-widest text-sm transition-colors">IG</a>
        </div>
    </div>
</div>
