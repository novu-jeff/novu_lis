@extends('layouts.auth')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center px-3" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 50%, #084298 100%);">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="max-width: 420px; width: 100%;">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                @if(config('app.logo'))
                    <img src="{{ asset('default/' . config('app.logo')) }}" alt="{{ config('app.name') }}" class="img-fluid" style="max-height: 56px;">
                @endif
                <h4 class="mt-3 mb-1 fw-semibold text-dark">Member Portal</h4>
                <p class="text-muted small mb-0">Sign in to your account</p>
            </div>

            <form method="POST" action="{{ route('members.login.submit') }}" novalidate>
                @csrf

                <div class="form-floating mb-3">
                    <input
                        type="email"
                        class="form-control rounded-3 @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        placeholder="Email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                    >
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating mb-4">
                    <input
                        type="password"
                        class="form-control rounded-3 @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        placeholder="Password"
                        required
                        autocomplete="current-password"
                    >
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-semibold py-2">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
