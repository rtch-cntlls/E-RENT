<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - E-rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/layout.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg p-5 sticky-top bg-white">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="E-Rent Logo" width="40">
               <span class="logo">E</span><span class="text-danger">-rent</span>
            </a>
            <ul class="navbar-nav mx-auto d-flex flex-row">
                <li class="nav-item dropdown">
                    <a class="text-dark nav-link d-flex align-items-center" href="#" id="dashboardDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Dashboard
                        <i class="ms-1 fas fa-chevron-down fa-xs"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-wide" aria-labelledby="dashboardDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-chart-pie me-3"></i> Overview
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="{{ route('admin.host') }}">
                                <i class="fas fa-user-tie me-3"></i> Hosts Analytics
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="#">
                                <i class="fas fa-building me-3"></i> Property Analytics
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="#">
                                <i class="fas fa-users me-3"></i> User Analytics
                            </a>
                        </li>
                    </ul>                    
                </li>
                <li class="nav-item dropdown">
                    <a class="text-dark nav-link d-flex align-items-center" href="#" id="hostsDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Hosts
                        <i class="ms-1 fas fa-chevron-down fa-xs"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-wide" aria-labelledby="hostsDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="{{ route('admin.hosts.pending') }}">
                                <i class="fas fa-hourglass-half me-3"></i> Pending
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="{{ route('admin.hosts.approved') }}">
                                <i class="fas fa-check-circle me-3"></i> Approved
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="{{ route('admin.hosts.rejected') }}">
                                <i class="fas fa-times-circle me-3"></i> Rejected
                            </a>
                        </li>
                    </ul>
                </li>                            
                <li class="nav-item">
                    <a class="nav-link" href="#">Properties</a>
                </li>
                <li class="nav-item dropdown">
                   <a class="text-dark nav-link d-flex align-items-center" href="#" id="dashboardDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Settings
                        <i class="ms-1 fas fa-chevron-down fa-xs"></i>
                    </a>
                
                    <ul class="dropdown-menu dropdown-wide" aria-labelledby="settingsDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="#">
                                <i class="fas fa-user-cog me-3"></i> Profile Settings
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="#">
                                <i class="fas fa-shield-alt me-3"></i> Security
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="#">
                                <i class="fas fa-bell me-3"></i> Notifications
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center p-3" href="#">
                                <i class="fas fa-sign-out-alt me-3"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>                
            </ul>
            
            <div class="d-flex align-items-center">
                <div class="notification">
                    <i class="fas fa-bell fa-lg"></i>
                </div>
                <a class="d-flex align-items-center text-decoration-none" href="#">
                    <i class="fas fa-user-circle fa-lg"></i>
                </a>
                
            </div>

        </div>
    </nav>
    <main class="container-fluid px-5 mt-4">
        @yield('content')
    </main>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
