<?php
/**
 * Title: Theme Footer
 * Description: Global footer — matches homepage_50pct.jpg mockup.
 * Layout: Logo + tagline | ACADEMY links | RESOURCES links | STAY CONNECTED (email form)
 */
?>
<footer class="bg-zinc-950 border-t border-zinc-900 py-20">

    <!-- Main Footer Grid -->
    <div class="container-custom">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-16">

            <!-- Col 1: Brand -->
            <div>
                <a href="<?= esc_url(home_url('/')) ?>" class="block mb-6">
                    <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/logo-bressel-white.png') ?>" alt="BRESSEL™" class="h-12 md:h-16 w-auto" loading="eager" />
                </a>
                <p class="text-zinc-500 text-sm leading-relaxed max-w-xs">
                    The world's leading high-performance padel academy. Redefining kinetic precision for the professional era.
                </p>
            </div>

            <!-- Col 2: ACADEMY -->
            <div>
                <h4 class="uppercase tracking-widest text-xs text-zinc-400 mb-6">ACADEMY</h4>
                <ul class="space-y-2">
                    <li><a href="<?= esc_url(home_url('/contact/')) ?>" class="block text-zinc-500 hover:text-white text-sm py-1 transition-colors">Contact Us</a></li>
                    <li><a href="#centers" class="block text-zinc-500 hover:text-white text-sm py-1 transition-colors">Regional Centers</a></li>
                    <li><a href="<?= esc_url(get_post_type_archive_link('coach')) ?>" class="block text-zinc-500 hover:text-white text-sm py-1 transition-colors">Careers</a></li>
                </ul>
            </div>

            <!-- Col 3: RESOURCES -->
            <div>
                <h4 class="uppercase tracking-widest text-xs text-zinc-400 mb-6">RESOURCES</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="block text-zinc-500 hover:text-white text-sm py-1 transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="block text-zinc-500 hover:text-white text-sm py-1 transition-colors">Terms of Service</a></li>
                    <li><a href="<?= esc_url(home_url('/contact/')) ?>" class="block text-zinc-500 hover:text-white text-sm py-1 transition-colors">Support</a></li>
                </ul>
            </div>

            <!-- Col 4: STAY CONNECTED -->
            <div>
                <h4 class="uppercase tracking-widest text-xs text-zinc-400 mb-6">STAY CONNECTED</h4>
                <?php if (function_exists('fluent_form')) : ?>
                    <?= do_shortcode('[fluentform id="2"]') ?>
                <?php else : ?>
                    <form action="#" method="post" class="flex flex-col gap-3">
                        <input type="email" name="email" required placeholder="EMAIL ADDRESS" class="flex-1 bg-zinc-900 border border-zinc-700 text-white text-xs px-4 py-3 placeholder-zinc-500 focus:outline-none focus:border-[var(--color-bressel-red)] transition-colors rounded-none uppercase tracking-wide" />
                        <button type="submit" class="bg-[var(--color-bressel-red)] hover:opacity-90 text-white font-black uppercase tracking-widest text-xs px-6 py-3 transition-opacity flex items-center justify-center gap-2">
                            SUBSCRIBE
                        </button>
                    </form>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- Bottom bar -->
    <div class="container-custom mt-16 pt-6 border-t border-zinc-900">
        <p class="text-zinc-600 text-xs text-center">&copy; <?= date('Y') ?> BRESSEL. (<?= date('Y') ?>0123456 / MA0123456-U)</p>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
