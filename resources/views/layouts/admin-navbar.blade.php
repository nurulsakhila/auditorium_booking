<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen" style="background: radial-gradient(circle at 20% 30%, #1e1b4b, #0f172a 70%);">

    {{-- NAVBAR ADMIN --}}
    <nav class="bg-slate-900/50 backdrop-blur-sm border-b border-white/10 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center py-4 gap-4">
                <div class="text-xl font-bold text-slate-200 tracking-wide">
                    Admin · Auditorium FMIPA UNRI
                </div>
                
                <div class="flex flex-wrap gap-3 justify-center">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium text-slate-300 hover:bg-white/10 transition-colors
                              {{ request()->routeIs('admin.dashboard') ? 'text-indigo-400 font-semibold' : '' }}">
                        Dashboard
                    </a>
                    
                    <a href="{{ route('admin.booking.index') }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium text-slate-300 hover:bg-white/10 transition-colors
                              {{ request()->routeIs('admin.booking.index') ? 'text-indigo-400 font-semibold' : '' }}">
                        Data Booking
                    </a>
                    
                    <a href="{{ route('admin.logout') }}" 
                       class="px-4 py-2 rounded-lg text-sm font-medium text-slate-300 border border-white/20 hover:bg-white/10 transition-colors">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ADMIN CONTENT --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

</body>
</html>
