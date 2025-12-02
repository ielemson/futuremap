<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="icon" type="image/ico" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/favicon.png') }}">
    <title>Login - Future Map Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-image {
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-image img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row w-100">
            <div class="col-md-8 mx-auto">
                <div class="card login-card">
                    <div class="row g-0">
                        <!-- Left section (Image & Branding) -->
                        <div class="col-md-5 login-image">
                            <div class="text-center">
                                <h4 class="mb-3">Future Map Media</h4>
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="150">
                            </div>
                        </div>
                        <!-- Right section (Form) -->
                        <div class="col-md-7 bg-white p-4">
                            @foreach (['success', 'error', 'warning', 'info'] as $msg)
                                @if (session($msg))
                                    <div class="alert alert-{{ $msg }} alert-dismissible fade show"
                                        role="alert">
                                        {{ session($msg) }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            @endforeach
                            <h4 class="mb-4">Sign In</h4>
                            {{-- <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email"
                                            class="form-control py-2 @error('email') is-invalid @enderror"
                                            name="email" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password"
                                            class="form-control py-2 @error('password') is-invalid @enderror"
                                            name="password" id="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <div class="btn-group" role="group" aria-label="login">
                                                <button type="submit" class="btn btn-success">Login</button>
                                                &nbsp;
                                                <a href="{{ url('/') }}" type="button" class="btn btn-warning">Go
                                                    back </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form> --}}

                            <form method="POST" action="{{ route('login') }}">
                            @csrf

                           <div class="col-12">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email"
                                            class="form-control py-2 @error('email') is-invalid @enderror"
                                            name="email" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="password" class="form-label">Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password"
                                            class="form-control py-2 @error('password') is-invalid @enderror"
                                            name="password" id="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                        
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="btn-group" role="group" aria-label="Login controls">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    &nbsp;
                                    <a href="{{url("/")}}" class="btn btn-info">Go back</a>
                                </div>
                                <a href="{{ route('password.forget') }}" class="text-decoration-none">Forgot Password?</a>
                            </div>

                            <div class="mt-3 text-center">
                                <span>Do you want to be a vendor?</span>
                                <a href="{{ route('vendor.register') }}" class="fw-bold text-primary">Click here to register</a>
                            </div>
                        </form>

                            <!-- Vendor Registration Prompt -->
                            {{-- <div class="mt-4 text-center">
                                <p class="mb-0">
                                    Do you want to be a vendor?
                                    <a href="{{ route('vendor.register') }}"
                                        class="text-decoration-none text-primary fw-bold">Click here to register</a>
                                </p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
