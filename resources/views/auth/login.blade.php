<x-guest-layout>

    <h2 class="auth-heading">Welcome back</h2>
    <p class="auth-subheading">Sign in to your admin account</p>

    <x-auth-session-status class="mb-5" :status="session('status')"/>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email Address')"/>
            <x-text-input type="email" name="email" id="email"
                value="{{ old('email') }}" placeholder="admin@example.com"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input type="password" name="password" id="password"
                placeholder="••••••••" required autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <div class="auth-divider"></div>

        <div class="flex items-center justify-between mb-5">
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" name="remember" class="auth-checkbox">
                <span class="auth-remember-text">{{ __('Remember me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="auth-forgot" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <x-primary-button class="w-full">
            {{ __('Sign In') }}
        </x-primary-button>

    </form>
</x-guest-layout>