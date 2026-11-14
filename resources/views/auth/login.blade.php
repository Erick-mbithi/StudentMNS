
<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email address"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Enter your password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-5">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember"
                >

                <span class="ms-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Links and Login Button -->
        <div class="mt-6 flex flex-col gap-5">

            <!-- First Time User -->
            <div class="text-center">
                <span class="text-sm text-gray-600">
                    First time using the system?
                </span>

                <a
                    href="{{ route('register') }}"
                    class="ms-1 text-sm font-semibold text-indigo-600 hover:text-indigo-800 underline"
                >
                    Create an account
                </a>
            </div>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <div class="text-center">
                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm text-gray-600 hover:text-indigo-600 underline"
                    >
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            @endif

            <!-- Login Button -->
            <div class="flex justify-center">
                <x-primary-button class="w-full justify-center py-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

        </div>

    </form>

</x-guest-layout>
