<x-guest-layout>
    <h1 class="login-title">BUAT<br>AKUN</h1>
    <p class="login-sub">Sudah punya akun? <a href="{{ route('login') }}">Masuk →</a></p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="input-label">{{ __('Name') }}</label>
            <input id="name" class="input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama Lengkap" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="form-group">
            <label for="username" class="input-label">{{ __('Username') }}</label>
            <input id="username" class="input" type="text" name="username" :value="old('username')" required autocomplete="username" placeholder="usernamekamu" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="input-label">{{ __('Email') }}</label>
            <input id="email" class="input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="kamu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="input-label">{{ __('Password') }}</label>
            <input id="password" class="input"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="Min. 8 karakter" />
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

        <button class="btn" style="width: 100%; justify-content: center; display: flex; margin-bottom: 8px;">
            {{ __('DAFTAR GRATIS →') }}
        </button>
    </form>
</x-guest-layout>
