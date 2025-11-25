<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-rent') - Find Your Perfect Rental Home</title>
    <meta name="description" content="Discover beautiful apartments, houses, and condos for rent. Modern living starts here.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                 alt="Profile" width="40" height="40" class="rounded-circle me-2 border border-dark">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="}">
                                    <i class="bi bi-person-circle me-2"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">
                                    <i class="bi bi-card-checklist me-2"></i> My Bookings
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('guest.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
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
    <footer id="contact" class="border border-top py-5 mt-5">
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
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
