<?php
/**
 * Title: Theme Footer
 * Description: The global footer template with BRESSEL brand block.
 * How-to Use: Automatically loaded via get_footer().
 */
?>
<footer class="bg-black text-white py-16 mt-auto border-t border-zinc-900 overflow-hidden">
  <div class="container-custom">
    <div class="flex flex-col md:flex-row justify-between items-center md:items-end gap-12">
        
        <!-- Brand Block -->
        <div class="text-center md:text-left">
            <h2 class="text-6xl md:text-8xl font-black italic tracking-tighter leading-none mb-4">
                BRESSEL<span class="text-bressel-red">™</span>
            </h2>
            <p class="text-zinc-500 uppercase font-bold tracking-widest text-xs mb-0">World-class padel, within reach.</p>
        </div>

        <!-- Social & Communication Block -->
        <div class="flex flex-col items-center md:items-end gap-6">
            <span class="text-zinc-500 uppercase font-bold tracking-[0.2em] text-[10px]">Connect With Us</span>
            <div class="flex gap-6">
                <!-- WhatsApp -->
                <a href="https://wa.me/" class="text-zinc-400 hover:text-green-500 transition-colors text-2xl" aria-label="WhatsApp">
                    <i class="bi bi-whatsapp"></i>
                </a>
                <!-- Telegram -->
                <a href="#" class="text-zinc-400 hover:text-blue-400 transition-colors text-2xl" aria-label="Telegram">
                    <i class="bi bi-telegram"></i>
                </a>
                <!-- Instagram -->
                <a href="#" class="text-zinc-400 hover:text-pink-500 transition-colors text-2xl" aria-label="Instagram">
                    <i class="bi bi-instagram"></i>
                </a>
                <!-- LinkedIn -->
                <a href="#" class="text-zinc-400 hover:text-blue-600 transition-colors text-2xl" aria-label="LinkedIn">
                    <i class="bi bi-linkedin"></i>
                </a>
            </div>
            <p class="text-zinc-600 uppercase font-bold tracking-widest text-[9px] mt-4">&copy; <?php echo date('Y'); ?> BRESSEL PADEL. ALL RIGHTS RESERVED.</p>
        </div>

    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

