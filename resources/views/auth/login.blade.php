
<x-guest-layout>

    <div style="text-align: center; margin-bottom: 26px;">

        {{-- College Icon --}}
        <div style="margin-bottom: 14px;">
            <div style="display: inline-flex; align-items: center; justify-content: center;
                        width: 65px; height: 65px; background: #e8f0ff;
                        border-radius: 18px; color: #2563eb;">

                <i class="bi bi-mortarboard-fill" style="font-size: 30px;"></i>

            </div>
        </div>

        {{-- Branding --}}
        <h1 style="font-size: 26px; font-weight: 700; color: #1e293b; margin: 0;">
            USHINDI COLLEGE
        </h1>

        <p style="font-size: 13px; color: #64748b; margin-top: 5px;">
            College Management System
        </p>

        <div style="margin-top: 24px;">

            <h2 style="font-size: 22px; font-weight: 600; color: #334155; margin: 0;">
                Welcome Back
            </h2>

            <p style="font-size: 14px; color: #64748b; margin-top: 7px;">
                Sign in to access your dashboard
            </p>

        </div>

    </div>

    {{-- Session Status --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div style="margin-bottom: 18px;">

            <label for="email"
                   style="display: block; font-size: 14px; font-weight: 600;
                          color: #334155; margin-bottom: 8px;">
                Email Address
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email address"
                style="display: block; width: 100%; box-sizing: border-box;
                       padding: 12px 14px; border: 1px solid #cbd5e1;
                       border-radius: 9px; outline: none; background: #ffffff;
                       font-size: 14px; color: #334155;"
            >

            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>

        {{-- Password --}}
        <div style="margin-bottom: 18px;">

            <label for="password"
                   style="display: block; font-size: 14px; font-weight: 600;
                          color: #334155; margin-bottom: 8px;">
                Password
            </label>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your password"
                style="display: block; width: 100%; box-sizing: border-box;
                       padding: 12px 14px; border: 1px solid #cbd5e1;
                       border-radius: 9px; outline: none; background: #ffffff;
                       font-size: 14px; color: #334155;"
            >

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        {{-- Remember Me --}}
        <div style="display: flex; align-items: center; margin-bottom: 20px;">

            <input
                id="remember_me"
                type="checkbox"
                name="remember"
                style="width: 16px; height: 16px; accent-color: #2563eb;"
            >

            <label for="remember_me"
                   style="margin-left: 9px; font-size: 14px; color: #64748b;">
                Remember me
            </label>

        </div>

        {{-- Login Button --}}
        <button
            type="submit"
            style="width: 100%; padding: 13px; border: none;
                   border-radius: 9px; background: #2563eb;
                   color: #ffffff; font-size: 15px; font-weight: 600;
                   cursor: pointer;">

            <i class="bi bi-box-arrow-in-right me-2"></i>
            Log in

        </button>

        {{-- Forgot Password --}}
        @if (Route::has('password.request'))

            <div style="text-align: center; margin-top: 18px;">

                <a href="{{ route('password.request') }}"
                   style="font-size: 14px; color: #2563eb; text-decoration: none;">
                    Forgot your password?
                </a>

            </div>

        @endif

        {{-- Register --}}
        @if (Route::has('register'))

            <div style="text-align: center; border-top: 1px solid #e2e8f0;
                        margin-top: 22px; padding-top: 18px;">

                <p style="font-size: 13px; color: #64748b; margin: 0;">

                    First time using the system?

                    <a href="{{ route('register') }}"
                       style="font-weight: 600; color: #2563eb; text-decoration: none;">
                        Create an account
                    </a>

                </p>

            </div>

        @endif

    </form>

    {{-- Footer --}}
    <div style="text-align: center; margin-top: 24px;">

        <p style="font-size: 12px; color: #94a3b8; margin: 0;">
            &copy; {{ date('Y') }} USHINDI COLLEGE
        </p>

    </div>

</x-guest-layout>
