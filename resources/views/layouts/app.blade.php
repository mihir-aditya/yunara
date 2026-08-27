<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yunara Productions | Luxury Event Management</title>
    <meta name="description" content="Florida's premier luxury event management and production company. Experience Omotenashi.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
</head>
<body>

    <!-- Loading Screen -->
    <div class="loader">
        <div class="loader-content">
            <img src="{{ asset('assets/logo.png') }}" alt="Yunara Logo" class="loader-svg">
            <h1 class="loader-logo" style="font-family: 'Amanojaku', serif;">Yunara</h1>
            <div class="loader-progress"></div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="luxury-nav">
        <div class="nav-brand">
            <a href="{{ route('home') }}"><img src="{{ asset('assets/logo.png') }}" alt="Yunara" class="nav-logo"></a>
        </div>
        
        <div class="nav-links">
            <a href="{{ route('home') }}#home" class="nav-link">Home</a>
            <a href="{{ route('gallery') }}" class="nav-link">Gallery</a>
            <a href="{{ route('home') }}#philosophy" class="nav-link">About</a>
            <a href="{{ route('home') }}#services" class="nav-link">Services</a>
            <a href="{{ route('home') }}#portfolio" class="nav-link">Portfolio</a>
            <a href="{{ route('home') }}#industries" class="nav-link">Industries</a>
            <a href="{{ route('home') }}#contact" class="nav-link">Contact</a>
        </div>

        <div class="nav-menu">
            <button class="menu-trigger" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobileNav">
                <span>Menu</span>
                <div class="menu-lines" aria-hidden="true">
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </button>
        </div>
    </nav>

    <!-- Mobile Navigation Overlay -->
    <div class="mobile-nav" id="mobileNav" aria-hidden="true">
        <div class="mobile-nav-links">
            <a href="{{ route('home') }}#home" class="mobile-link">Home</a>
            <a href="{{ route('gallery') }}" class="mobile-link">Gallery</a>
            <a href="{{ route('home') }}#philosophy" class="mobile-link">About</a>
            <a href="{{ route('home') }}#services" class="mobile-link">Services</a>
            <a href="{{ route('home') }}#portfolio" class="mobile-link">Portfolio</a>
            <a href="{{ route('home') }}#industries" class="mobile-link">Industries</a>
            <a href="{{ route('home') }}#contact" class="mobile-link">Contact</a>
        </div>
    </div>

    @yield('content')

    <!-- 18. Premium Footer -->
    <footer class="luxury-footer">
        <div class="container">
            <div class="footer-top">
                <h2 class="footer-logo">Yunara</h2>
                <div class="footer-links">
                    <div class="f-col">
                        <h4>Explore</h4>
                        <a href="{{ route('home') }}#services">Services</a>
                        <a href="{{ route('home') }}#portfolio">Portfolio</a>
                        <a href="{{ route('home') }}#casestudy">Case Studies</a>
                    </div>
                    <div class="f-col">
                        <h4>Company</h4>
                        <a href="{{ route('home') }}#philosophy">Philosophy</a>
                        <a href="{{ route('home') }}#team">The Artisans</a>
                        <a href="{{ route('home') }}#contact">Contact</a>
                    </div>
                    <div class="f-col">
                        <h4>Social</h4>
                        <a href="#">Instagram</a>
                        <a href="#">LinkedIn</a>
                        <a href="#">Pinterest</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Yunara Productions. All rights reserved.</p>
                <div class="legal-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- GSAP & Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <!-- Lenis Smooth Scroll -->
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.19/bundled/lenis.min.js"></script>
    
    <!-- SplitType -->
    <script src="https://unpkg.com/split-type"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}?v={{ filemtime(public_path('js/script.js')) }}"></script>
</body>
</html>