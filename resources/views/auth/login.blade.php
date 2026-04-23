<x-guest-layout>
    <h1 class="login-title">MASUK<br>AKUN</h1>
    <p class="login-sub">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang →</a></p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="kamu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-primary-button style="width: 100%; justify-content: center; display: flex; margin-bottom: 8px;">
            {{ __('MASUK →') }}
        </x-primary-button>

        @if (Route::has('password.request'))
            <p class="login-toggle">
                <a href="{{ route('password.request') }}" style="opacity: 0.5; font-size: 11px; color: rgba(255,255,255,0.4)">
                    {{ __('Lupa password?') }}
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>
