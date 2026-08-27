<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Yunara</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Montserrat:wght@200;300;400;500&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <style>
        .login-hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background-color: var(--color-bg);
            overflow: hidden;
        }
        
        .login-bg {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: url('https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            z-index: 1;
        }
        
        .login-bg::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to bottom, rgba(244, 240, 230, 0.4) 0%, rgba(244, 240, 230, 0.95) 100%);
            backdrop-filter: blur(5px);
        }
        
        .login-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 450px;
            padding: 3rem;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .login-logo {
            font-family: var(--font-heading);
            font-size: 3rem;
            color: var(--color-text);
            text-decoration: none;
            display: inline-block;
        }
        
        .login-logo span {
            color: var(--color-primary);
        }

        /* Override w-100 if it doesn't exist in style.css */
        .w-100 {
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Loading Screen -->
    <div class="loader">
        <div class="loader-content">
            <img src="{{ asset('assets/logo.png') }}" alt="Yunara Logo" class="loader-svg" onerror="this.style.display='none'">
            <h1 class="loader-logo" style="font-family: 'Cormorant Garamond', serif;">Yunara</h1>
            <div class="loader-progress"></div>
        </div>
    </div>

    <section class="login-hero">
        <div class="login-bg parallax-img"></div>
        
        <div class="login-content">
            <div class="login-header fade-up">
                <a href="{{ route('home') }}" class="login-logo">Yunara<span>.</span></a>
                <p class="section-label mt-2" style="font-size: 0.8rem;">Admin Portal</p>
            </div>

            @if($errors->any())
                <div class="fade-up mb-4" style="padding: 1rem; border-left: 2px solid var(--color-primary); background: rgba(207,61,61,0.05); color: var(--color-primary); text-align: left; font-size: 0.85rem;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="glass-form fade-up">
                @csrf
                <div class="input-group">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    <label for="email">Email Address</label>
                </div>
                
                <div class="input-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="btn-luxury magnetic w-100 mt-4">Sign In</button>
            </form>
        </div>
    </section>

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
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
