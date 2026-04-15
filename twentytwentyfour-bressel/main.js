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
        mobileMenu.classList.remove('hidden');
        mobileMenu.classList.add('flex');
        document.body.style.overflow = 'hidden';
        if (mobileMenuText) mobileMenuText.innerText = 'Close';
    }

    function closeMenu() {
        isMenuOpen = false;
        mobileMenu.classList.add('hidden');
        mobileMenu.classList.remove('flex');
        document.body.style.overflow = '';
        if (mobileMenuText) mobileMenuText.innerText = 'Menu';
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
        // Clone all children and append so the animation loops seamlessly
        const items = Array.from(track.children);
        items.forEach(item => {
            track.appendChild(item.cloneNode(true));
        });
    });
});