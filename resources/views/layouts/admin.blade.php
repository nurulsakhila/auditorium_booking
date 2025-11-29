<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            Auditorium FMIPA UR
            <div class="sub">Admin Panel</div>
        </div>

        <div class="menu">
            <a href="{{ route('admin.dashboard') }}"
               class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
               📊 Dashboard
            </a>

            <a href="{{ route('admin.booking.index') }}"
               class="menu-item {{ request()->routeIs('admin.booking.index') ? 'active' : '' }}">
               📁 Data Booking
            </a>

            <a href="#" class="menu-item">👤 Kelola User</a>
            <a href="#" class="menu-item">🗂 File Upload</a>
            <a href="#" class="menu-item">🔐 API & Sanctum</a>

            <a href="{{ route('admin.logout') }}" class="menu-item logout">
                🚪 Logout
            </a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
