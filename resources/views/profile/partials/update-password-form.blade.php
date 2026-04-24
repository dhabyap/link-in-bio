<section>
    <form method="post" action="{{ route('password.update') }}" style="display: flex; flex-direction: column; gap: 20px;">
        @csrf
        @method('put')

        <div style="display:flex; flex-direction:column; gap:6px;">
            <label class="input-label">Password Saat Ini</label>
            <input type="password" name="current_password" class="input" autocomplete="current-password">
            @error('current_password', 'updatePassword') <p style="color:var(--red); font-size:11px;">{{ $message }}</p> @enderror
        </div>

        <div style="display:flex; flex-direction:column; gap:6px;">
            <label class="input-label">Password Baru</label>
            <input type="password" name="password" class="input" autocomplete="new-password">
            @error('password', 'updatePassword') <p style="color:var(--red); font-size:11px;">{{ $message }}</p> @enderror
        </div>

        <div style="display:flex; flex-direction:column; gap:6px;">
            <label class="input-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="input" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword') <p style="color:var(--red); font-size:11px;">{{ $message }}</p> @enderror
        </div>

        <div style="display: flex; align-items: center; gap: 16px;">
            <button type="submit" class="btn">GANTI PASSWORD</button>
            @if (session('status') === 'password-updated')
                <span style="font-weight: 700; color: #00C896;">✓ BERHASIL DISIMPAN</span>
            @endif
        </div>
    </form>
</section>
