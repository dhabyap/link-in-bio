<x-guest-layout>
    <h1 class="login-title">VERIFIKASI<br>EMAIL</h1>
    <p class="login-sub">{{ __('Terima kasih telah mendaftar! Sebelum mulai, silakan verifikasi email kamu melalui link yang baru saja kami kirimkan.') }}</p>

    @if (session('status') == 'verification-link-sent')
        <div class="stat-card" style="padding: 12px; background: var(--yellow); border: 2px solid var(--black); margin-bottom: 20px; font-size: 11px; font-weight: 700;">
            {{ __('Link verifikasi baru telah dikirim ke alamat email yang kamu daftarkan.') }}
        </div>
    @endif

    <div class="mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button style="width: 100%; justify-content: center; display: flex; margin-bottom: 12px;">
                {{ __('KIRIM ULANG EMAIL VERIFIKASI →') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="login-back" style="width: 100%; border: none; background: none; justify-content: center;">
                {{ __('Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
