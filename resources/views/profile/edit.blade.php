<x-dashboard-layout>
    <x-slot name="header">
        PROFIL KAMU
    </x-slot>

    @if(session('status') === 'profile-updated')
        <div style="background: var(--yellow); border: var(--border-thick); padding: 16px; margin-bottom: 24px; font-weight: 700; box-shadow: var(--shadow);">
            Profil berhasil diperbarui!
        </div>
    @endif

    <div class="section-card">
        <div class="section-card-header">
            <div class="section-card-title">INFORMASI PROFIL</div>
        </div>
        <div class="section-card-body" style="padding: 36px;">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="section-card">
        <div class="section-card-header">
            <div class="section-card-title">KEAMANAN AKUN</div>
        </div>
        <div class="section-card-body" style="padding: 36px;">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="section-card" style="border-color: var(--red);">
        <div class="section-card-header" style="background: var(--red);">
            <div class="section-card-title">HAPUS AKUN</div>
        </div>
        <div class="section-card-body" style="padding: 36px;">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-dashboard-layout>
