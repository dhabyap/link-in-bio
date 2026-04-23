<x-guest-layout>
    <h1 class="login-title">KONFIRMASI<br>AKSES</h1>
    <p class="login-sub">{{ __('Ini adalah area aman. Harap konfirmasi password kamu sebelum melanjutkan.') }}</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-primary-button style="width: 100%; justify-content: center; display: flex;">
            {{ __('KONFIRMASI →') }}
        </x-primary-button>
    </form>
</x-guest-layout>
