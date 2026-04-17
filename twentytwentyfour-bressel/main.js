import './src/main.css';

document.addEventListener('DOMContentLoaded', () => {
    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenuText = document.getElementById('mobile-menu-text');
    const mobileMenu = document.getElementById('mobile-menu');
    let isMenuOpen = false;

    function openMenu() {
        isMenuOpen = true;
        mobileMenu.classList.add('menu-open');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        isMenuOpen = false;
        mobileMenu.classList.remove('menu-open');
        document.body.style.overflow = '';
    }

    function toggleMenu() {
        if (isMenuOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    }

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', toggleMenu);
    }

    if (mobileMenuClose && mobileMenu) {
        mobileMenuClose.addEventListener('click', closeMenu);
    }

    // Close menu when clicking a link inside it
    if (mobileMenu) {
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });
    }

    // Close menu on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isMenuOpen) {
            closeMenu();
        }
    });

    // Header Scroll Transition
    const header = document.getElementById('main-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.remove('header-transparent');
                header.classList.add('header-scrolled');
            } else {
                header.classList.add('header-transparent');
                header.classList.remove('header-scrolled');
            }
        }, { passive: true });
    }

    // FAQ Accordion
    const faqTriggers = document.querySelectorAll('[data-faq-trigger]');
    
    faqTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const content = document.getElementById(trigger.getAttribute('aria-controls'));
            const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
            
            // Toggle current item
            trigger.setAttribute('aria-expanded', !isExpanded);
            
            if (isExpanded) {
                content.classList.add('hidden');
            } else {
                content.classList.remove('hidden');
            }
        });
    });

    // Close FAQ on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            faqTriggers.forEach(trigger => {
                const content = document.getElementById(trigger.getAttribute('aria-controls'));
                trigger.setAttribute('aria-expanded', 'false');
                content.classList.add('hidden');
            });
        }
    });

    // Stats Counter Animation (Intersection Observer)
    const statElements = document.querySelectorAll('[data-stat]');
    
    const animateCounter = (element) => {
        const target = parseInt(element.dataset.target, 10);
        const suffix = element.dataset.suffix || '';
        const valueEl = element.querySelector('.stat-value');
        
        if (!valueEl) return;
        
        const duration = 2000; // 2 seconds
        const startTime = performance.now();
        
        const updateCounter = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function (ease-out)
            const easeOut = 1 - Math.pow(1 - progress, 3);
            const currentValue = Math.floor(easeOut * target);
            
            valueEl.textContent = currentValue + suffix;
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        };
        
        requestAnimationFrame(updateCounter);
    };
    
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll('[data-stat]').forEach(stat => {
                    if (!stat.classList.contains('animated')) {
                        stat.classList.add('animated');
                        animateCounter(stat);
                    }
                });
                statsObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.3
    });
    
    const statsContainer = document.querySelector('[data-stats-container]');
    if (statsContainer) {
        statsObserver.observe(statsContainer);
    }

    // Scroll-triggered Fade-in Animations
    const scrollAnimatedElements = document.querySelectorAll('[data-animate]');
    
    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
                scrollObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    scrollAnimatedElements.forEach(el => {
        el.classList.add('opacity-0');
        scrollObserver.observe(el);
    });

    // Hero Video Fallback — show static image if video fails
    const heroVideo = document.querySelector('#hero video');
    const heroFallback = document.getElementById('hero-fallback-bg');
    if (heroVideo && heroFallback) {
        heroVideo.addEventListener('error', function() {
            heroVideo.style.display = 'none';
            heroFallback.style.display = 'block';
        });
        // Also check if video plays (some browsers block autoplay)
        heroVideo.addEventListener('canplay', function() {
            // Video plays fine, keep it
        });
        heroVideo.addEventListener('playing', function() {
            // Video is playing, hide fallback
            heroFallback.style.display = 'none';
        });
        // Timeout fallback: if video hasn't started playing after 3s, use static image
        setTimeout(function() {
            if (heroVideo.readyState < 2) {
                heroVideo.style.display = 'none';
                heroFallback.style.display = 'block';
            }
        }, 3000);
    }

    // Parallax Hero Effect
    const parallaxContainer = document.querySelector('[data-parallax]');
    const parallaxTarget = parallaxContainer?.querySelector('[data-parallax-target]');
    
    if (parallaxContainer && parallaxTarget) {
        let ticking = false;
        
        const updateParallax = () => {
            const rect = parallaxContainer.getBoundingClientRect();
            const scrollPercent = -rect.top / rect.height;
            const translateY = scrollPercent * 100; // 100px max offset
            
            parallaxTarget.style.transform = `translateY(${translateY}px)`;
            ticking = false;
        };
        
        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }, { passive: true });
        
        // Initial position
        updateParallax();
    }

    // Button Ripple Effect
    document.querySelectorAll('.btn-ripple').forEach(btn => {
        btn.addEventListener('click', function(e) {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const ripple = document.createElement('span');
            ripple.style.cssText = `
                position: absolute;
                background: rgba(255,255,255,0.4);
                border-radius: 50%;
                width: 0;
                height: 0;
                top: ${y}px;
                left: ${x}px;
                transform: translate(-50%, -50%);
                pointer-events: none;
            `;
            
            btn.appendChild(ripple);
            
            requestAnimationFrame(() => {
                ripple.style.transition = 'width 0.6s ease, height 0.6s ease, opacity 0.6s ease';
                ripple.style.width = '300px';
                ripple.style.height = '300px';
                ripple.style.opacity = '0';
            });
            
            setTimeout(() => ripple.remove(), 700);
        });
    });

    // Fluent Forms AJAX Handling
    document.addEventListener('fluentform_submitting', function() {
        const form = document.querySelector('.fluentform');
        if (form) {
            form.classList.add('is-loading');
        }
    });
    
    document.addEventListener('fluentform_submitted', function() {
        const form = document.querySelector('.fluentform');
        if (form) {
            form.classList.remove('is-loading');
            // Scroll to form
            form.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });

    // Real-time validation feedback
    document.querySelectorAll('.fluentform input, .fluentform textarea, .fluentform select').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value && !this.checkValidity()) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid') && this.checkValidity()) {
                this.classList.remove('is-invalid');
            }
        });
    });

    // URL Parameter Pre-fill for Forms
    const urlParams = new URLSearchParams(window.location.search);
    
    const intent = urlParams.get('intent');
    const target = urlParams.get('target');
    const source = urlParams.get('source');
    
    if (intent || target || source) {
        const form = document.querySelector('.fluentform');
        
        if (form) {
            // Set intent (hidden field or dropdown)
            if (intent) {
                const intentField = form.querySelector('[name*="intent"], [name*="subject"], [name*="type"]');
                if (intentField) {
                    if (intentField.tagName === 'SELECT') {
                        const option = intentField.querySelector(`option[value*="${intent}"]`);
                        if (option) {
                            intentField.value = option.value;
                        }
                    } else {
                        intentField.value = intent.charAt(0).toUpperCase() + intent.slice(1);
                    }
                }
            }
            
            // Set target (usually text input)
            if (target) {
                const targetField = form.querySelector('[name*="target"], [name*="coach"], [name*="product"], [name*="reference"]');
                if (targetField) {
                    targetField.value = decodeURIComponent(target);
                }
            }
            
            // Set source (referral tracking)
            if (source) {
                const sourceField = form.querySelector('[name*="source"], [name*="referral"]');
                if (sourceField) {
                    sourceField.value = decodeURIComponent(source);
                }
            }
            
            // Add visual indicator
            const introEl = form.querySelector('.ff-el-inner');
            if ((intent || target) && introEl) {
                introEl.classList.add('has-prefill');
            }
        }
    }

    // Ticker — duplicate content for seamless infinite loop
    document.querySelectorAll('.ticker-track').forEach(track => {
        // Only clone once: mark with data attribute to prevent double-cloning
        if (track.dataset.cloned) return;
        const items = Array.from(track.children);
        items.forEach(item => {
            track.appendChild(item.cloneNode(true));
        });
        track.dataset.cloned = 'true';
    });

    // Accordion Toggle (for UI demo)
    document.querySelectorAll('.accordion-toggle').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const content = document.getElementById(this.getAttribute('aria-controls'));
            const icon = this.querySelector('.accordion-icon');
            const isExpanded = this.getAttribute('aria-expanded') === 'true';

            // Close all other accordions in same group
            this.closest('.space-y-3, .space-y-0').querySelectorAll('.accordion-toggle').forEach(function(other) {
                if (other !== toggle) {
                    other.setAttribute('aria-expanded', 'false');
                    other.closest('.accordion').querySelector('.accordion-content').classList.add('hidden');
                    other.querySelector('.accordion-icon').style.transform = 'rotate(0deg)';
                }
            });

            // Toggle current
            this.setAttribute('aria-expanded', !isExpanded);
            content.classList.toggle('hidden');
            icon.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
        });
    });

    // Quote Carousel
    const quoteCarousel = document.querySelector('#quote-carousel');
    if (quoteCarousel) {
        const slides = quoteCarousel.querySelectorAll('.quote-slide');
        const dots = quoteCarousel.querySelectorAll('.dot');
        const prevBtn = quoteCarousel.querySelector('.prev-btn');
        const nextBtn = quoteCarousel.querySelector('.next-btn');
        
        const autoPlayInterval = parseInt(quoteCarousel.dataset.autoPlay) || 6000;
        const slideCount = parseInt(quoteCarousel.dataset.slideCount) || slides.length;
        
        let currentSlide = 0;
        let autoPlayTimer = null;
        
        function goToSlide(index) {
            // Remove active class from all
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active', 'bg-[var(--color-bressel-red)]'));
            dots.forEach(dot => dot.classList.add('bg-zinc-600'));
            
            // Activate target slide
            currentSlide = index;
            if (currentSlide >= slideCount) currentSlide = 0;
            if (currentSlide < 0) currentSlide = slideCount - 1;
            
            slides[currentSlide]?.classList.add('active');
            if (dots[currentSlide]) {
                dots[currentSlide].classList.add('active', 'bg-[var(--color-bressel-red)]');
                dots[currentSlide].classList.remove('bg-zinc-600');
            }
        }
        
        function nextSlide() {
            goToSlide(currentSlide + 1);
        }
        
        function prevSlide() {
            goToSlide(currentSlide - 1);
        }
        
        function startAutoPlay() {
            stopAutoPlay();
            autoPlayTimer = setInterval(nextSlide, autoPlayInterval);
        }
        
        function stopAutoPlay() {
            if (autoPlayTimer) {
                clearInterval(autoPlayTimer);
                autoPlayTimer = null;
            }
        }
        
        // Navigation buttons
        if (prevBtn) prevBtn.addEventListener('click', () => { nextSlide(); startAutoPlay(); });
        if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); startAutoPlay(); });
        
        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
                startAutoPlay();
            });
        });
        
        // Pause on hover
        quoteCarousel.addEventListener('mouseenter', stopAutoPlay);
        quoteCarousel.addEventListener('mouseleave', startAutoPlay);
        
        // Start auto-play
        if (slideCount > 1) {
            startAutoPlay();
        }
    }
});