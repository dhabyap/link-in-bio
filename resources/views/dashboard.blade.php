<x-dashboard-layout>
    <x-slot name="header">
        DASHBOARD
    </x-slot>

    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-card-delta">+12%</div>
            <div class="stat-card-num">1.2K</div>
            <div class="stat-card-label">TOTAL VIEWS</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-num">840</div>
            <div class="stat-card-label">UNIQUE VISITORS</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-num">{{ Auth::user()->links()->count() }}</div>
            <div class="stat-card-label">TOTAL LINKS</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-num">4.5%</div>
            <div class="stat-card-label">AVG CTR</div>
        </div>
    </div>

    <div class="section-card">
        <div class="section-card-header">
            <div class="section-card-title">AKTIVITAS TERBARU</div>
        </div>
        <div class="section-card-body" style="padding: 24px;">
            <p style="opacity: 0.6; font-size: 13px;">{{ __("Selamat datang kembali! Dashboard kamu sudah menggunakan desain Brutalist.") }}</p>
        </div>
    </div>
</x-dashboard-layout>
