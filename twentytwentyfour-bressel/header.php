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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Critical CSS to prevent white flash -->
  <style>
    html, body { background-color: #000000 !important; }
  </style>
  <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?>>
<style>
  /* Custom header styles - migrated from classes */
  .header-transparent {
    background-color: transparent;
    backdrop-filter: blur(0px);
    border-bottom: 1px solid transparent;
  }
  .header-scrolled {
    background-color: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(24, 24, 27, 0.6);
  }
</style>
<header id="main-header" class="header-transparent sticky top-0 z-[100]">
  <div class="max-w-6xl mx-auto flex justify-between items-center h-16 md:h-20">

    <!-- Logo -->
    <a id="header-logo" href="<?= esc_url(home_url('/')); ?>" class="flex items-center gap-2 relative z-[210]">
      <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-bressel-white.png') ?>" alt="BRESSEL™" class="h-7 md:h-10 w-auto" loading="eager" />
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
         class="group btn-cta btn-md ripple hidden md:inline-flex">
        BOOK SESSION
        <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-icon-white.svg') ?>" alt="Brain Icon" class="w-5 h-5 group-hover:hidden" />
        <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-icon-red.svg') ?>" alt="Brain Icon" class="hidden w-5 h-5 group-hover:block" />
      </a>

      <!-- Mobile Menu Toggle -->
      <button id="mobile-menu-btn" class="lg:hidden uppercase font-bold tracking-widest text-xs p-2 focus:outline-none">
        <i class="bi bi-list text-2xl"></i>
      </button>
    </div>
  </div>
</header>

<!-- Full-Screen Mobile Menu Overlay -->
<div id="mobile-menu" class="fixed inset-0 z-[9999] bg-black mobile-menu-overlay transition-opacity duration-300 ease-in-out opacity-0 invisible">
    <!-- Header: Close Button -->
    <div class="flex justify-end p-6">
      <button id="mobile-menu-close" class="text-white hover:opacity-70 transition-opacity">
        <i class="bi bi-x-lg text-4xl"></i>
      </button>
    </div>

    <!-- Main Navigation (centered) -->
    <nav class="flex-1 flex items-center justify-center">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'flex flex-col items-center gap-8 uppercase font-black italic tracking-tighter',
          'fallback_cb' => false,
        ]);
      ?>
    </nav>

    <!-- Footer with Social Media -->
    <div class="flex justify-center pb-12">
      <div class="text-center">
        <span class="block font-bold uppercase tracking-widest text-xs mb-4">Connect With Us</span>
        <div class="flex gap-6 justify-center">
          <a href="#" class="text-3xl text-white hover:text-[var(--color-bressel-red)] transition-colors duration-300"><i class="bi bi-whatsapp"></i></a>
          <a href="#" class="text-3xl text-white hover:text-[var(--color-bressel-red)] transition-colors duration-300"><i class="bi bi-telegram"></i></a>
          <a href="#" class="text-3xl text-white hover:text-[var(--color-bressel-red)] transition-colors duration-300"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
    </div>
</div>