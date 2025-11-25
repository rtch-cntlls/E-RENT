<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-rent') - Find Your Perfect Rental Home</title>
    <meta name="description" content="Discover beautiful apartments, houses, and condos for rent. Modern living starts here.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/guest/layout.css')}}">
</head>
<body class="bg-light text-dark">
    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top py-2">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary fs-4 d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="E-Rent Logo" width="40">
               <span class="logo">E</span><span class="text-danger">-rent</span>
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-3 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold modern-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold modern-link" href="#properties">Properties</a>
                    </li>
                </ul>
            </div>
            <div class="d-none d-lg-flex align-items-center">
                @auth
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ auth()->user()->avatar ?? asset('images/profile.jpg') }}" 
                                alt="Profile" width="30" height="30" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3 mt-3 shadow-sm" aria-labelledby="userDropdown" style="min-width: 280px;">
                           <a class="dropdown-item py-2 rounded" href="">
                                <div class="d-flex align-items-center gap-2">
                                    <div>
                                        <img src="{{ auth()->user()->avatar ?? asset('images/profile.jpg') }}" 
                                        alt="Profile Picture" width="60" height="60" class="rounded-circle mb-2">
                                    </div>
                                    <div>
                                        <p class="m-0 fw-semibold">{{ auth()->user()->name }}</p>
                                        <p class="m-0" style="font-size: 12px;">
                                            @if(auth()->user()->role === 'user')
                                                Personal Account
                                            @elseif(auth()->user()->role === 'host')
                                                Host Account
                                            @endif
                                        </p>
                                        <p class="m-0" style="font-size: 13px;">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                           </a> 
                           <a class="dropdown-item fw-medium rounded" href="{{ route('guest.upgrade.form') }}">
                                Convent to host account
                            </a><hr>
                            <li>
                                <a class="dropdown-item fw-semibold rounded py-2" href="{{ route('guest.settings') }}">
                                    Account Settings
                                </a>
                            </li>                 
                            <li>
                                <form action="{{ route('guest.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item fw-medium py-2 rounded">
                                        Logout
                                    </button>
                                </form>
                            </li>                            
                        </ul>
                    </div>
                @endauth
                @guest
                    <a href="{{ route('guest.login') }}" class="nav-link fw-semibold modern-link me-2">Login</a>
                    <a href="{{ route('guest.register') }}" class="btn btn-primary px-3 py-2 rounded-pill shadow-sm">
                        Sign Up
                    </a>
                @endguest
            </div>            
        </div>
    </nav>
    <main class="pt-5">
        @yield('content')
    </main>
    {{-- <footer id="contact" class="border border-top py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="fw-bold">E-rent</h5>
                    <p class="text-muted">Your trusted platform for finding the perfect rental home.</p>
                </div>
                <div class="col-md-2">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#" class="text-decoration-none text-muted">About Us</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">List Your Property</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">How It Works</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h6>Legal</h6>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#" class="text-decoration-none text-muted">Privacy Policy</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Terms of Service</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Cookie Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Stay Connected</h6>
                    <p class="text-muted">Subscribe to get the latest listings</p>
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Your email">
                        <button class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4 text-muted">
                &copy; 2025 E-rent. All rights reserved.
            </div>
        </div>
    </footer> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
