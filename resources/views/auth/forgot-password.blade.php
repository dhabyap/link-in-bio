<x-guest-layout>
    <h1 class="login-title">RESET<br>PASS</h1>
    <p class="login-sub">{{ __('Lupa password? Masukkan email kamu untuk mendapatkan link reset.') }}</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="input-label">{{ __('Email') }}</label>
            <input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus placeholder="kamu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <button class="btn" style="width: 100%; justify-content: center; display: flex;">
            {{ __('KIRIM RESET LINK →') }}
        </button>
    </form>
</x-guest-layout>
