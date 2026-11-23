
<section>

    <header class="mb-4">
        <h5 class="fw-bold">Update Password</h5>
        <p class="text-muted">
            Ensure your account uses a strong password.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        {{-- CURRENT PASSWORD --}}
        <div class="mb-3">
            <label for="current_password" class="form-label">
                Current Password
            </label>

            <input
                id="current_password"
                name="current_password"
                type="password"
                class="form-control"
                autocomplete="current-password"
                required
            >

            @error('current_password', 'updatePassword')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- NEW PASSWORD --}}
        <div class="mb-3">
            <label for="password" class="form-label">
                New Password
            </label>

            <input
                id="password"
                name="password"
                type="password"
                class="form-control"
                autocomplete="new-password"
                required
            >

            @error('password', 'updatePassword')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">
                Confirm New Password
            </label>

            <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-control"
                autocomplete="new-password"
                required
            >
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-shield-check me-2"></i>
            Update Password
        </button>

        @if (session('status') === 'password-updated')
            <span class="text-success small ms-2">
                Password updated successfully.
            </span>
        @endif

    </form>

</section>
