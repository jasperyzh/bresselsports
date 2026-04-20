<?php
/**
 * Title: Theme Header — Mockup-Matched
 * Description: Clean header with BRESSEL logo, nav links, and red CTA button
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
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Critical CSS -->
  <style>
    html, body { background-color: #090808 !important; }
  </style>
  <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?>>

<style>
  /* Header styles */
  .header-bar {
    position: sticky;
    top: 0;
    z-index: 100;
    background-color: rgba(9, 8, 8, 0.9);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(39, 39, 42, 0.6);
    padding: 0 1.5rem;
    transition: all 0.3s ease;
  }

  .header-inner {
    max-width: 80rem;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 4rem;
  }

  @media (min-width: 64rem) {
    .header-inner {
      height: 5rem;
    }
  }

  .header-nav {
    display: none;
  }

  @media (min-width: 64rem) {
    .header-nav {
      display: flex;
      gap: 2.5rem;
      align-items: center;
    }
  }

  /* @base-ui/ nav-link pattern */
  .header-nav .nav-link {
    font-family: var(--font-header);
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    color: var(--color-bressel-zinc-400, #a1a1aa);
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .header-nav .nav-link:hover {
    color: var(--color-bressel-white, #FBFBFF);
  }

  /* @base-ui/ button pattern override */
  .header-cta {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-family: var(--font-header);
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    padding: 0.75rem 1.5rem;
    color: #ffffff !important;
    background-color: var(--color-bressel-red);
    border: 2px solid var(--color-bressel-red);
    border-radius: 0;
    transition: all 0.2s ease;
    text-decoration: none !important;
  }

  .header-cta:hover {
    background-color: #e62a1a;
    border-color: #e62a1a;
  }

  .mobile-toggle {
    display: block;
    background: none;
    border: none;
    color: #ffffff;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0.5rem;
  }

  @media (min-width: 64rem) {
    .mobile-toggle {
      display: none;
    }
  }

  /* Mobile menu overlay */
  .mobile-menu {
    position: fixed;
    inset: 0;
    z-index: 200;
    background-color: rgba(9, 8, 8, 0.98);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 2rem;
    transform: translateX(100%);
    transition: transform 0.3s ease;
  }

  .mobile-menu.open {
    transform: translateX(0);
  }

  .mobile-menu-close {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    background: none;
    border: none;
    color: #ffffff;
    font-size: 2rem;
    cursor: pointer;
  }

  .mobile-menu a {
    font-family: var(--font-header);
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #d4d4d8;
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .mobile-menu a:hover {
    color: #ffffff;
  }

  .mobile-social {
    display: flex;
    gap: 1.5rem;
    margin-top: 2rem;
  }

  .mobile-social a {
    color: #52525b;
    font-size: 1.25rem;
  }

  .mobile-social a:hover {
    color: var(--color-bressel-red);
  }
</style>

<header class="header-bar">
  <div class="header-inner">

    <!-- Logo -->
    <a href="<?= esc_url(home_url('/')) ?>" class="header-logo">
      <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-bressel-white.png') ?>" alt="BRESSEL™" class="h-6 w-auto md:h-8" />
    </a>

    <!-- Desktop Navigation (@base-ui/ .nav pattern) -->
    <nav class="header-nav nav">
      <a href="<?= esc_url(get_post_type_archive_link('coach')) ?>" class="nav-link">ACADEMY</a>
      <a href="<?= esc_url(home_url('/community/')) ?>" class="nav-link">COMMUNITY</a>
      <a href="<?= esc_url(get_post_type_archive_link('merch')) ?>" class="nav-link">PRO GEAR</a>
    </nav>

    <!-- Right: CTA + Mobile toggle -->
    <div style="display: flex; gap: 1rem; align-items: center;">
      <a href="<?= esc_url(home_url('/contact/?intent=booking')) ?>" class="btn btn-primary header-cta">
        BOOK SESSION
      </a>
      <button class="mobile-toggle" aria-label="Open menu" onclick="document.getElementById('mobile-menu').classList.add('open')">
        <i class="bi bi-list"></i>
      </button>
    </div>

  </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="mobile-menu">
  <button class="mobile-menu-close" aria-label="Close menu" onclick="document.getElementById('mobile-menu').classList.remove('open')">
    <i class="bi bi-x-lg"></i>
  </button>

  <nav>
    <a href="<?= esc_url(get_post_type_archive_link('coach')) ?>" class="nav-link">ACADEMY</a>
    <a href="<?= esc_url(home_url('/community/')) ?>" class="nav-link">COMMUNITY</a>
    <a href="<?= esc_url(get_post_type_archive_link('merch')) ?>" class="nav-link">PRO GEAR</a>
    <a href="<?= esc_url(home_url('/contact/?intent=booking')) ?>" class="nav-link" style="color: var(--color-bressel-red);">BOOK SESSION</a>
  </nav>

  <div class="mobile-social">
    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
    <a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
  </div>
</div>
