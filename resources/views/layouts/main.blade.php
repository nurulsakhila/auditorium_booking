<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Booking Auditorium FMIPA')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind / Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            background: radial-gradient(circle at 20% 30%, #1e1b4b, #0f172a 70%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background: #0f172a;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .nav-container {
            max-width: 1100px;
            margin: auto;
            padding: 18px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .nav-logo {
            font-size: 20px;
            font-weight: 800;
            color: #e2e8f0;
            letter-spacing: 0.5px;
        }
        
        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        
        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .nav-links a:hover {
            color: #f1f5f9;
        }
        
        .nav-active {
            color: #60a5fa !important;
        }
        
        .nav-outline {
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 8px;
        }
        
        .container {
            max-width: 1100px;
            margin: auto;
            padding: 30px 20px;
            flex: 1;
        }
        
        .footer {
            background: #0f172a;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            padding: 20px;
            text-align: center;
            color: #94a3b8;
            font-size: 14px;
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <header class="navbar">
        <nav class="nav-container">

            <div class="nav-logo">
                Auditorium FMIPA UNRI
            </div>

            <div class="nav-links">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'nav-active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('schedule') }}"
                    class="{{ request()->routeIs('schedule') ? 'nav-active' : '' }}">
                    Schedule
                </a>

                <a href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'nav-active' : '' }}">
                    About
                </a>


                <a href="{{ route('admin.login') }}" class="nav-outline">
                    Login Admin
                </a>
            </div>

        </nav>
    </header>


    <main class="container">
        @yield('content')
    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} Auditorium FMIPA Universitas Riau · All Rights Reserved
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>