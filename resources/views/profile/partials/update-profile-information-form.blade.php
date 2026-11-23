
<section>

    <header class="mb-4">
        <h5 class="fw-bold">Profile Information</h5>
        <p class="text-muted">
            Update your account name and email address.
        </p>
    </header>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        {{-- NAME --}}
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>

            <input
                id="name"
                name="name"
                type="text"
                class="form-control"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            >

            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- EMAIL --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>

            <input
                id="email"
                name="email"
                type="email"
                class="form-control"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            >

            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted small">
                        Your email address is not verified.
                    </p>

                    <button
                        form="send-verification"
                        class="btn btn-link p-0">
                        Resend verification email
                    </button>
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-2"></i>
            Save Changes
        </button>

        @if (session('status') === 'profile-updated')
            <span class="text-success small ms-2">
                Profile updated successfully.
            </span>
        @endif

    </form>

    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
            @csrf
        </form>
    @endif

</section>
