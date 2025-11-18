<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/auth/adminLogin.css') }}">
    <title>E-Rent Admin Login</title>
</head>
<body class="adminlogin">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100 shadow-lg rounded overflow-hidden bg-white" style="max-width: 900px;">
            <div class="col-md-7 d-none d-md-flex flex-column justify-content-center 
                align-items-center text-dark p-4 bg-cover text-center">
                <img src="{{ asset('images/logo.png') }}" alt="E-Rent Logo" width="100">
                <h4 class="fw-bold m-0">E<span class="text-danger">-Rent</span></h4>
                <h3 class="fw-bold mt-3">Manage Properties With Ease</h3>
                <p class="text-dark small mt-2" style="max-width: 80%;">
                    Streamline your rental management, secure, fast, and effortless admin control.
                </p>
            </div>
            <div class="col-md-5 p-4 d-flex align-items-center">
                <form action="" method="POST" class="w-100 p-4">
                    @csrf
                    <div class="mb-4">
                        <div class="text-center d-block d-md-none">
                            <img src="{{ asset('images/logo.png') }}" alt="E-Rent Logo" width="80">
                            <h4 class="fw-bold m-0">E<span class="text-danger">-Rent</span> Admin Login</h4>
                            <small class="text-muted m-0" style="font-size:13px;">Please enter your credential to continue</small>
                        </div>
                        <div class="mt-2 mb-0 d-none d-md-block">
                            <h3 class="fw-bold">Login</h3>
                            <small class="text-muted m-0" style="font-size:13px;">Please enter your credential to continue</small>
                        </div>
                    </div>
                    @if (session('error'))
                        <x-alert type="danger" :message="session('error')" />
                    @endif
                    <div class="mb-3">
                        <label for="email" class="small fw-bold">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Please enter your email" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="small fw-bold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Please enter your password" id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" name="log-in" class="btn btn-admin w-100" id="loginBtn">
                            <span id="btnText">Log in</span>
                            <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                        </button>                        
                    </div>
                    <div class="text-center mt-3 mb-3 small">
                        <a href="#" class="form-text">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('script/authloader.js')}}"></script>
</html>
