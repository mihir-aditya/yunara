/* ==========================================================================
   YUNARA PRODUCTIONS — MAIN SCRIPT
   Handles: loader, responsive nav, scroll reveals, parallax, swipers,
   counters, and video controls. Every feature degrades gracefully if a
   library failed to load (e.g. on a slow mobile connection).
   ========================================================================== */

document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {

    /* ---------------- Loader ---------------- */
    const loader = document.querySelector('.loader');
    window.addEventListener('load', () => {
        setTimeout(() => loader && loader.classList.add('loaded'), 400);
    });
    // Safety net: never let the loader trap a user on a slow connection.
    setTimeout(() => loader && loader.classList.add('loaded'), 4000);

    /* ---------------- Responsive Nav ---------------- */
    const menuTrigger = document.querySelector('.menu-trigger');
    const mobileNav = document.querySelector('.mobile-nav');
    const body = document.body;

    function closeMenu() {
        menuTrigger && menuTrigger.classList.remove('active');
        mobileNav && mobileNav.classList.remove('active');
        menuTrigger && menuTrigger.setAttribute('aria-expanded', 'false');
        mobileNav && mobileNav.setAttribute('aria-hidden', 'true');
        body.classList.remove('nav-open');
    }

    if (menuTrigger && mobileNav) {
        menuTrigger.addEventListener('click', () => {
            const isOpen = mobileNav.classList.toggle('active');
            menuTrigger.classList.toggle('active', isOpen);
            menuTrigger.setAttribute('aria-expanded', String(isOpen));
            mobileNav.setAttribute('aria-hidden', String(!isOpen));
            body.classList.toggle('nav-open', isOpen);
        });

        // Close mobile nav on link click, resize to desktop, or Escape.
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeMenu();
        });

        let lastWidth = window.innerWidth;
        window.addEventListener('resize', () => {
            const w = window.innerWidth;
            if (w >= 1024 && lastWidth < 1024) closeMenu();
            lastWidth = w;
        });
    }

    /* ---------------- Lenis Smooth Scroll (desktop only, respects reduced motion) ---------------- */
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let lenis;
    if (typeof Lenis !== 'undefined' && !prefersReducedMotion && window.innerWidth >= 1024) {
        lenis = new Lenis({ lerp: 0.1, smoothWheel: true });
        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);
        if (typeof gsap !== 'undefined' && gsap.ticker) {
            gsap.ticker.add((time) => lenis.raf(time * 1000));
        }
    }

    /* ---------------- GSAP Scroll Reveals ---------------- */
    if (typeof gsap !== 'undefined') {
        if (typeof ScrollTrigger !== 'undefined') gsap.registerPlugin(ScrollTrigger);

        gsap.utils.toArray('.fade-up').forEach((el, i) => {
            gsap.fromTo(el,
                { opacity: 0, y: 24 },
                {
                    opacity: 1, y: 0, duration: 0.8, ease: 'power2.out',
                    delay: Math.min(i * 0.04, 0.3),
                    scrollTrigger: { trigger: el, start: 'top 88%', once: true }
                }
            );
        });

        // Parallax images: disabled on small screens to avoid jank / layout thrash.
        if (window.innerWidth >= 1024 && typeof ScrollTrigger !== 'undefined') {
            gsap.utils.toArray('.parallax-img').forEach((el) => {
                gsap.fromTo(el, { yPercent: -8 }, {
                    yPercent: 8, ease: 'none',
                    scrollTrigger: { trigger: el, scrub: true }
                });
            });
        }
    } else {
        // No GSAP available: reveal everything immediately so content isn't stuck hidden.
        document.querySelectorAll('.fade-up').forEach(el => el.classList.add('is-visible'));
    }

    /* ---------------- SplitType headings ---------------- */
    if (typeof SplitType !== 'undefined') {
        try {
            new SplitType('.split-text', { types: 'lines,words' });
        } catch (e) { /* fail silently, headings still render as plain text */ }
    }

    /* ---------------- Swiper: Portfolio ---------------- */
    if (typeof Swiper !== 'undefined' && document.querySelector('.portfolio-swiper')) {
        new Swiper('.portfolio-swiper', {
            slidesPerView: 1.15,
            spaceBetween: 16,
            centeredSlides: false,
            navigation: {
                nextEl: '.portfolio-swiper .swiper-button-next',
                prevEl: '.portfolio-swiper .swiper-button-prev',
            },
            pagination: { el: '.portfolio-swiper .swiper-pagination', clickable: true },
            breakpoints: {
                640:  { slidesPerView: 1.6, spaceBetween: 20 },
                1024: { slidesPerView: 2.4, spaceBetween: 28 },
                1440: { slidesPerView: 3.2, spaceBetween: 32 },
            },
        });
    }

    /* ---------------- Swiper: Testimonials ---------------- */
    if (typeof Swiper !== 'undefined' && document.querySelector('.testimonial-swiper')) {
        new Swiper('.testimonial-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            autoHeight: true,
            pagination: { el: '.testimonial-swiper .swiper-pagination', clickable: true },
        });
    }

    /* ---------------- Animated Counters ---------------- */
    const counters = document.querySelectorAll('.counter');
    if (counters.length) {
        const animateCounter = (el) => {
            const target = parseInt(el.dataset.target, 10) || 0;
            const duration = 1600;
            const start = performance.now();
            function tick(now) {
                const progress = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.round(eased * target);
                if (progress < 1) requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
        };

        if ('IntersectionObserver' in window) {
            const io = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            counters.forEach(c => io.observe(c));
        } else {
            counters.forEach(animateCounter);
        }
    }

    /* ---------------- Gallery video mute toggle ---------------- */
    document.querySelectorAll('.video-container').forEach(container => {
        const video = container.querySelector('video');
        const btn = container.querySelector('.mute-btn-overlay');
        if (!video || !btn) return;
        const iconMuted = btn.querySelector('.icon-muted');
        const iconUnmuted = btn.querySelector('.icon-unmuted');
        btn.addEventListener('click', () => {
            video.muted = !video.muted;
            iconMuted && iconMuted.classList.toggle('hidden', !video.muted);
            iconUnmuted && iconUnmuted.classList.toggle('hidden', video.muted);
        });
    });

    /* ---------------- Video Showcase play button ---------------- */
    const videoShowcase = document.querySelector('.video-showcase');
    if (videoShowcase) {
        videoShowcase.addEventListener('click', () => {
            // Hook point: replace with a real inline <video> swap or modal/lightbox
            // once a hosted video source is available.
            videoShowcase.classList.toggle('is-playing');
        });
    }

    /* ---------------- Magnetic buttons (desktop only — pointer precision needed) ---------------- */
    if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        document.querySelectorAll('.magnetic').forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                btn.style.transform = `translate(${x * 0.18}px, ${y * 0.35}px)`;
            });
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = '';
            });
        });
    }
});