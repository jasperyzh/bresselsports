<?php
/**
 * Title: Theme Header — KISE + @base-ui/
 * Description: Semantic header with BRESSEL logo, nav links, and red CTA
 * Layout: Logo (left) | Nav (center) | BOOK SESSION (right)
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= wp_get_document_title() ?></title>
  <link rel="icon" href="<?= esc_url(get_stylesheet_directory_uri() . '/assets/favicon.svg') ?>" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>html, body { background-color: #090808 !important; }</style>
  <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?>>

<header class="sticky top-0 z-100 bg-black/90 backdrop-blur-md border-b border-zinc-800/60 px-6">
  <div class="max-w-7xl mx-auto flex justify-between items-center h-16 md:h-20">

    <!-- Logo -->
    <a href="<?= esc_url(home_url('/')) ?>" class="flex-shrink-0">
      <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-bressel-white.png') ?>" alt="BRESSEL™" class="h-6 md:h-8 w-auto" />
    </a>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex gap-10 items-center">
      <a href="<?= esc_url(get_post_type_archive_link('coach')) ?>" class="nav-link">ACADEMY</a>
      <a href="<?= esc_url(home_url('/community/')) ?>" class="nav-link">COMMUNITY</a>
      <a href="<?= esc_url(get_post_type_archive_link('merch')) ?>" class="nav-link">PRO GEAR</a>
    </nav>

    <!-- Right: CTA + Mobile toggle -->
    <div class="flex items-center gap-4">
      <a href="<?= esc_url(home_url('/contact/?intent=booking')) ?>" class="btn btn-primary">
        BOOK SESSION
      </a>
      <button class="md:hidden text-white text-2xl" aria-label="Open menu" onclick="document.getElementById('mobile-menu').classList.add('open')">
        <i class="bi bi-list"></i>
      </button>
    </div>

  </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="fixed inset-0 z-200 bg-black/95 backdrop-blur-md flex flex-col items-center justify-center gap-8 transform translate-x-full transition-transform duration-300">
  <button class="absolute top-6 right-6 text-white text-3xl" aria-label="Close menu" onclick="document.getElementById('mobile-menu').classList.remove('open')">
    <i class="bi bi-x-lg"></i>
  </button>

  <nav class="flex flex-col gap-6">
    <a href="<?= esc_url(get_post_type_archive_link('coach')) ?>" class="nav-link text-2xl">ACADEMY</a>
    <a href="<?= esc_url(home_url('/community/')) ?>" class="nav-link text-2xl">COMMUNITY</a>
    <a href="<?= esc_url(get_post_type_archive_link('merch')) ?>" class="nav-link text-2xl">PRO GEAR</a>
    <a href="<?= esc_url(home_url('/contact/?intent=booking')) ?>" class="nav-link text-2xl" style="color: var(--color-bressel-red);">BOOK SESSION</a>
  </nav>

  <div class="flex gap-6 mt-8">
    <a href="#" aria-label="Instagram" class="text-2xl text-zinc-500 hover:text-red"><i class="bi bi-instagram"></i></a>
    <a href="#" aria-label="YouTube" class="text-2xl text-zinc-500 hover:text-red"><i class="bi bi-youtube"></i></a>
    <a href="#" aria-label="WhatsApp" class="text-2xl text-zinc-500 hover:text-red"><i class="bi bi-whatsapp"></i></a>
  </div>
</div>
