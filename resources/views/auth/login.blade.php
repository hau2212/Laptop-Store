@extends('layouts.app')

@section('style')
<!-- Bootstrap 5.3 (official CDN) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Reset nhẹ để tránh style lạ làm lệch layout */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background: linear-gradient(135deg, #74ABE2 0%, #5563DE 100%);
        font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    /* Wrapper để canh giữa theo chiều dọc & ngang */
    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    /* Card chính */
    .auth-card {
        background: rgba(255,255,255,0.95);
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        padding: 1.5rem;
        width: 100%;
        max-width: 720px; /* responsive limit */
    }

    .auth-card .heading {
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 0.75rem;
        color: #222;
    }

    /* Button */
    .btn-login {
        width: 100%;
        background: linear-gradient(90deg,#5b63e6,#3a44b0);
        border: none;
        color: #fff;
        font-weight: 600;
        padding: .6rem 1rem;
        border-radius: .5rem;
    }
    .btn-login:hover {
        filter: brightness(0.95);
    }

    /* Khi màn nhỏ, giảm padding */
    @media (max-width: 576px) {
        .auth-card { padding: 1rem; border-radius: 10px; }
    }
</style>
@endsection

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="row g-0">
            <!-- Left: optional image/branding -->
            <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center px-4">
                <div class="text-center">
                    <!-- Bạn có thể thay bằng logo -->
                    <div style="width:120px; height:120px; border-radius:12px; background: linear-gradient(135deg,#7688f0,#4b57c7); display:inline-flex; align-items:center; justify-content:center; color:#fff; font-weight:700; font-size:28px;">
                        LS
                    </div>
                    <p class="mt-3 mb-0" style="color:#333; font-weight:600;">Laptop Store</p>
                    <small class="text-muted">Admin panel</small>
                </div>
            </div>

            <!-- Right: form -->
            <div class="col-md-7 px-4 py-4">
                <div class="heading">🔐 Sign in to your account</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email address</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">Forgot password?</a>
                        @endif
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-login">Sign In</button>
                    </div>

                    <!-- Optional: extra links -->
                    <div class="text-center">
                        <small class="text-muted">Don't have an account? <a href="#" class="text-decoration-none">Contact admin</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
