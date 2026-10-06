@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white rounded-top-3 py-3">
                    <h5 class="mb-0 fw-semibold">Update account credentials</h5>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('members.account.update') }}" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="form-floating mb-3">
                            <input
                                type="email"
                                class="form-control rounded-3 @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email', $account->email) }}"
                                required
                                autocomplete="email"
                            >
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input
                                type="password"
                                class="form-control rounded-3 @error('current_password') is-invalid @enderror"
                                id="current_password"
                                name="current_password"
                                required
                                autocomplete="current-password"
                            >
                            <label for="current_password">Current password</label>
                            @error('current_password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <p class="text-muted small mb-3">Leave blank to keep your current password.</p>

                        <div class="form-floating mb-3">
                            <input
                                type="password"
                                class="form-control rounded-3 @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                autocomplete="new-password"
                            >
                            <label for="password">New password</label>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input
                                type="password"
                                class="form-control rounded-3"
                                id="password_confirmation"
                                name="password_confirmation"
                                autocomplete="new-password"
                            >
                            <label for="password_confirmation">Confirm new password</label>
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('members.dashboard') }}" class="btn btn-outline-secondary rounded-pill">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill">Update credentials</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
