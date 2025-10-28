@extends('layouts.app')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
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
