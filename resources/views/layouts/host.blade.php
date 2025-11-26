<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Host Dashboard') - E-Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/host/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/host/index.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
    <div class="d-flex">
        <nav class="sidebar vh-100 position-fixed p-3">
            <div class="profile-card">
                <img src="{{ auth()->user()->avatar ?? asset('images/profile.jpg') }}" alt="Profile">
                <h6>{{ auth()->user()->name }}</h6>
                <small>{{ auth()->user()->email }}</small>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center gap-2 fw-semibold @if(request()->routeIs('host.dashboard')) active @endif" 
                       href="{{ route('host.dashboard') }}">
                        <i class="fas fa-home-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center gap-2 fw-semibold @if(request()->routeIs('host.properties')) active @endif" 
                       href="{{ route('host.properties') }}">
                        <i class="fas fa-building"></i> My Properties
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link d-flex align-items-center gap-2 fw-semibold @if(request()->routeIs('host.bookings')) active @endif" 
                       href="{{ route('host.bookings') }}">
                        <i class="fas fa-calendar-check"></i> Bookings
                    </a>
                </li>
            </ul>
        </nav>
        <div class="flex-grow-1" style="margin-left: 240px;">
                <nav class="navbar navbar-expand-lg navbar-light px-4 py-3 shadow-sm">
                    <div class="container-fluid d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1 text-muted">
                                @php
                                    $hour = date('H');
                                    if ($hour < 12) {
                                        $greeting = 'Good Morning';
                                    } elseif ($hour < 18) {
                                        $greeting = 'Good Afternoon';
                                    } else {
                                        $greeting = 'Good Evening';
                                    }
                                @endphp
                                {{ $greeting }}, <span>{{ auth()->user()->name }}</span>!
                            </h6>
                        </div>
                        <a href="{{ url('/') }}" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-2">
                            <i class="fas fa-globe"></i> Back to Website
                        </a>
                    </div>
                </nav>      
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
