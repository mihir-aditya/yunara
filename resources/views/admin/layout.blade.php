<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Yunara Admin</title>
    <!-- Use Bootstrap for grid/components, but override styling for luxury aesthetic -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-primary: #cf3d3d;
            --color-bg: #f4f0e6;
            --color-surface: #eaddcf;
            --color-text: #2c2a25;
            --color-text-light: #59554d;
            --font-heading: 'Cormorant Garamond', serif;
            --font-body: 'Montserrat', sans-serif;
        }

        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: var(--font-body);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-heading);
            font-weight: 600;
        }

        /* Sidebar Styling */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: #2c2a25;
            color: #eaddcf;
            padding-top: 2rem;
            z-index: 100;
        }

        #sidebar .logo {
            font-family: var(--font-heading);
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            text-align: center;
            color: #fff;
            text-decoration: none;
            display: block;
            margin-bottom: 3rem;
        }

        #sidebar .logo span {
            color: var(--color-primary);
        }

        #sidebar .nav-link {
            color: rgba(234, 221, 207, 0.7);
            font-family: var(--font-body);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }

        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            color: #fff;
            background: rgba(255, 255, 255, 0.05);
            border-left: 3px solid var(--color-primary);
        }

        #sidebar .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .logout-form {
            position: absolute;
            bottom: 2rem;
            left: 0;
            width: 100%;
        }

        /* Main Content Area */
        #content {
            margin-left: 250px;
            padding: 2rem 4rem;
            min-height: 100vh;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
            border-bottom: 1px solid rgba(44, 42, 37, 0.1);
            padding-bottom: 1rem;
        }

        .btn-primary-custom {
            background: var(--color-text);
            color: #fff;
            border: none;
            font-family: var(--font-body);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.8rem;
            padding: 0.8rem 1.5rem;
            transition: all 0.3s;
        }
        .btn-primary-custom:hover {
            background: var(--color-primary);
            color: #fff;
        }

        .card {
            background: var(--color-surface);
            border: 1px solid rgba(44, 42, 37, 0.05);
            border-radius: 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            margin-bottom: 2rem;
        }
        .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(44, 42, 37, 0.1);
            padding: 1.5rem;
        }
        .card-body {
            padding: 1.5rem;
        }

        .table th {
            font-family: var(--font-body);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--color-text-light);
            border-bottom: 1px solid rgba(44, 42, 37, 0.2);
            font-weight: 600;
        }
        .table td {
            vertical-align: middle;
            border-bottom: 1px solid rgba(44, 42, 37, 0.05);
        }

        .table img, .table video { 
            max-width: 120px; 
            max-height: 80px; 
            object-fit: cover; 
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <nav id="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="logo">Yunara<span>.</span></a>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" href="{{ route('admin.gallery.index') }}">
                    <i class="fas fa-images"></i> Gallery
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}" href="{{ route('admin.portfolio.index') }}">
                    <i class="fas fa-briefcase"></i> Portfolio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.submissions.*') ? 'active' : '' }}" href="{{ route('admin.submissions.index') }}">
                    <i class="fas fa-envelope"></i> Submissions
                </a>
            </li>
        </ul>

        <div class="logout-form">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link w-100 text-start" style="background:transparent; border:none; border-top: 1px solid rgba(255,255,255,0.1);">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <div id="content">
        <div class="top-header">
            <h2 class="m-0">@yield('title')</h2>
            <a href="{{ route('home') }}" class="btn-primary-custom text-decoration-none" target="_blank">View Live Site</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0" style="background: rgba(168, 46, 46, 0.1); color: var(--color-primary); border-left: 3px solid var(--color-primary) !important;">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger border-0" style="background: rgba(207, 61, 61, 0.1); color: var(--color-primary); border-left: 3px solid var(--color-primary) !important;">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>
