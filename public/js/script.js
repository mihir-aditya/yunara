document.addEventListener('DOMContentLoaded', () => {
    
    // Register GSAP Plugins
    gsap.registerPlugin(ScrollTrigger);
    
    /* =========================================
       1. INITIALIZATION & LENIS SMOOTH SCROLL
    ========================================= */
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
    });
    
    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);
    
    // Connect GSAP ScrollTrigger to Lenis
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time)=>{
      lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0, 0);

    // Scroll to top on logo click
    const navLogoLink = document.querySelector('.nav-brand a');
    if (navLogoLink) {
        navLogoLink.addEventListener('click', (e) => {
            const url = new URL(navLogoLink.href);
            if (url.pathname === window.location.pathname) {
                e.preventDefault();
                lenis.scrollTo(0, { duration: 1.5 });
            }
        });
    }

    // Smooth scroll for inline navigation links
    const navLinks = document.querySelectorAll('.nav-link, .mobile-link');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            
            // If mobile menu is open, close it
            if(document.querySelector('.mobile-nav').classList.contains('active')) {
                document.querySelector('.mobile-nav').classList.remove('active');
                document.querySelector('.menu-trigger').classList.remove('active');
            }

            try {
                const url = new URL(link.href);
                // Only intercept if it's a hash link on the CURRENT page
                if (url.pathname === window.location.pathname && url.hash) {
                    e.preventDefault();
                    lenis.scrollTo(url.hash, { duration: 1.5, offset: -100 });
                }
            } catch (err) {
                // Let default happen if URL parsing fails
            }
        });
    });

    // Mobile Menu Toggle
    const menuTrigger = document.querySelector('.menu-trigger');
    const mobileNav = document.querySelector('.mobile-nav');
    
    if (menuTrigger && mobileNav) {
        menuTrigger.addEventListener('click', () => {
            menuTrigger.classList.toggle('active');
            mobileNav.classList.toggle('active');
        });
    }

    /* =========================================
       2. PRELOADER ANIMATION
    ========================================= */
    const loader = document.querySelector('.loader');
    const loaderProgress = document.querySelector('.loader-progress');
    const loaderLogo = document.querySelector('.loader-logo');
    const loaderSvg = document.querySelector('.loader-svg');
    
    const tlLoader = gsap.timeline({
        onComplete: () => {
            loader.style.display = 'none';
            // Start Hero Animations
            initHeroAnimations();
        }
    });
    
    tlLoader.to(loaderSvg, { opacity: 1, y: -20, duration: 1.5, ease: "power3.out" })
            .to(loaderLogo, { opacity: 1, duration: 1, ease: "power2.out" }, "-=1")
            .to(loaderProgress, { width: "100%", duration: 1.5, ease: "power4.inOut" })
            .to(loader, { yPercent: -100, duration: 1.2, ease: "power4.inOut", delay: 0.2 });

    /* =========================================
       3. CUSTOM CURSOR (Removed)
    ========================================= */

    /* =========================================
       4. HERO & SCROLL ANIMATIONS
    ========================================= */
    function initHeroAnimations() {
        const splitTitles = new SplitType('.hero-title', { types: 'lines, words, chars' });
        
        gsap.from(splitTitles.chars, {
            y: 100,
            opacity: 0,
            rotationZ: 10,
            duration: 1,
            stagger: 0.05,
            ease: "power4.out"
        });
        
        gsap.from('.hero-kicker', { y: 20, opacity: 0, duration: 1, delay: 0.5 });
        gsap.from('.hero-ctas', { y: 20, opacity: 0, duration: 1, delay: 0.7 });
    }
    
    // General text splitting on scroll
    const splitElements = document.querySelectorAll('.split-text:not(.hero-title)');
    splitElements.forEach(el => {
        const split = new SplitType(el, { types: 'lines, words' });
        
        gsap.from(split.words, {
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.05,
            ease: "power3.out"
        });
    });
    
    // Fade Up Elements
    const fadeUps = document.querySelectorAll('.fade-up');
    fadeUps.forEach(el => {
        gsap.from(el, {
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
            },
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        });
    });
    
    // Parallax Images
    const parallaxImgs = document.querySelectorAll('.parallax-img');
    parallaxImgs.forEach(img => {
        gsap.to(img, {
            scrollTrigger: {
                trigger: img.parentElement,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true
            },
            y: 50, // Move image down slightly as we scroll
            ease: "none"
        });
    });

    // Image Mask Reveals
    const revealImgs = document.querySelectorAll('.reveal-img');
    revealImgs.forEach(wrapper => {
        // Create mask
        const mask = document.createElement('div');
        mask.style.position = 'absolute';
        mask.style.top = '0'; mask.style.left = '0';
        mask.style.width = '100%'; mask.style.height = '100%';
        mask.style.backgroundColor = '#fffdfd';
        mask.style.transformOrigin = 'right';
        mask.style.zIndex = '2';
        wrapper.style.position = 'relative';
        wrapper.appendChild(mask);
        
        const img = wrapper.querySelector('img');
        gsap.set(img, { scale: 1.2 });
        
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: wrapper,
                start: 'top 80%',
            }
        });
        
        tl.to(mask, { scaleX: 0, duration: 1.2, ease: "power4.inOut" })
          .to(img, { scale: 1, duration: 1.2, ease: "power4.out" }, "-=1.2");
    });
    
    // Navbar Scroll Effect
    const nav = document.querySelector('.luxury-nav');
    ScrollTrigger.create({
        start: 'top -50',
        onUpdate: (self) => {
            if(self.direction === 1) { // Scrolling down
                nav.classList.add('scrolled');
            } else if (self.scroll() === 0) {
                nav.classList.remove('scrolled');
            }
        }
    });

    /* =========================================
       4.5 HORIZONTAL SCROLL (PORTFOLIO)
    ========================================= */
    const portfolioSwiper = new Swiper('.portfolio-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        speed: 800,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                centeredSlides: false,
            },
            1024: {
                slidesPerView: 3,
                centeredSlides: false,
            }
        }
    });

    /* =========================================
       5. COUNTERS
    ========================================= */
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        ScrollTrigger.create({
            trigger: counter,
            start: 'top 85%',
            once: true,
            onEnter: () => {
                let obj = { val: 0 };
                gsap.to(obj, {
                    val: target,
                    duration: 2,
                    ease: "power2.out",
                    onUpdate: () => {
                        counter.innerText = Math.floor(obj.val) + (target === 100 ? '%' : '+');
                    }
                });
            }
        });
    });

    /* =========================================
       6. SWIPER JS INITIALIZATION
    ========================================= */
    const trustedSwiper = new Swiper('.trusted-swiper', {
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 5000,
        breakpoints: {
            640: { slidesPerView: 3 },
            1024: { slidesPerView: 5 }
        }
    });

    const testimonialSwiper = new Swiper('.testimonial-swiper', {
        slidesPerView: 1,
        spaceBetween: 50,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            992: { slidesPerView: 2 }
        }
    });

    /* =========================================
       7. MAGNETIC BUTTONS
    ========================================= */
    const magnetics = document.querySelectorAll('.magnetic');
    magnetics.forEach(btn => {
        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            gsap.to(btn, {
                x: x * 0.3,
                y: y * 0.3,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, {
                x: 0, y: 0,
                duration: 0.5,
                ease: 'elastic.out(1, 0.3)'
            });
        });
    });

    /* =========================================
       8. CANVAS SAKURA PETALS
    ========================================= */
    const canvas = document.getElementById('petalsCanvas');
    if(canvas) {
        const ctx = canvas.getContext('2d');
        let width, height;
        let petals = [];

        function resize() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();

        class Petal {
            constructor() {
                this.reset();
                this.y = Math.random() * height; // initial random distribution
            }
            reset() {
                this.x = Math.random() * width;
                this.y = -20;
                this.size = Math.random() * 8 + 5;
                this.speedY = Math.random() * 1 + 0.5;
                this.speedX = (Math.random() - 0.5) * 1;
                this.angle = Math.random() * Math.PI * 2;
                this.spin = (Math.random() - 0.5) * 0.1;
            }
            update() {
                this.y += this.speedY;
                this.x += this.speedX + Math.sin(this.angle) * 0.5;
                this.angle += this.spin;
                
                if (this.y > height + 20) {
                    this.reset();
                }
            }
            draw() {
                ctx.save();
                ctx.translate(this.x, this.y);
                ctx.rotate(this.angle);
                
                // Draw petal shape
                ctx.beginPath();
                ctx.fillStyle = 'rgba(168, 46, 46, 0.4)'; // Darker, muted red (vintage Sakura)
                
                // Quadratic curve for a simple petal
                ctx.moveTo(0, 0);
                ctx.quadraticCurveTo(this.size, -this.size, 0, -this.size * 2);
                ctx.quadraticCurveTo(-this.size, -this.size, 0, 0);
                ctx.fill();
                
                ctx.restore();
            }
        }

        // Initialize petals
        for (let i = 0; i < 40; i++) {
            petals.push(new Petal());
        }

        function animatePetals() {
            ctx.clearRect(0, 0, width, height);
            
            // Only draw if we are at the top of the page (performance)
            if(window.scrollY < height * 1.5) {
                petals.forEach(petal => {
                    petal.update();
                    petal.draw();
                });
            }
            requestAnimationFrame(animatePetals);
        }
        animatePetals();
    }

    /* =========================================
       9. GALLERY VIDEO MUTE BUTTONS
    ========================================= */
    const muteButtons = document.querySelectorAll('.mute-btn-overlay');
    muteButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const container = btn.closest('.video-container');
            if (container) {
                const video = container.querySelector('video');
                if (video) {
                    video.muted = !video.muted;
                    
                    const iconMuted = btn.querySelector('.icon-muted');
                    const iconUnmuted = btn.querySelector('.icon-unmuted');
                    
                    if (video.muted) {
                        iconMuted.classList.remove('hidden');
                        iconUnmuted.classList.add('hidden');
                    } else {
                        iconMuted.classList.add('hidden');
                        iconUnmuted.classList.remove('hidden');
                    }
                }
            }
        });
    });

});

