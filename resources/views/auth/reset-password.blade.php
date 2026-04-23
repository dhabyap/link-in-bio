<x-guest-layout>
    <h1 class="login-title">BARU<br>PASS</h1>
    <p class="login-sub">{{ __('Masukkan password baru kamu untuk mengakses akun kembali.') }}</p>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="input-label">{{ __('Email') }}</label>
            <input id="email" class="input" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" placeholder="kamu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="input-label">{{ __('Password') }}</label>
            <input id="password" class="input" type="password" name="password" required autocomplete="new-password" placeholder="Min. 8 karakter" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation" class="input-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="input"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button class="btn" style="width: 100%; justify-content: center; display: flex;">
            {{ __('SIMPAN PASSWORD BARU →') }}
        </button>
    </form>
</x-guest-layout>
