<x-guest-layout>
    <h1 class="login-title">RESET<br>PASS</h1>
    <p class="login-sub">{{ __('Lupa password? Masukkan email kamu untuk mendapatkan link reset.') }}</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="kamu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button style="width: 100%; justify-content: center; display: flex;">
            {{ __('KIRIM RESET LINK →') }}
        </x-primary-button>
    </form>
</x-guest-layout>
