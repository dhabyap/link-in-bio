<section>
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 24px;">
        @csrf
        @method('patch')

        <div class="profile-grid">
            <div class="profile-avatar-section">
                <div class="profile-avatar-big">
                    @if($user->avatar_path)
                        <img src="{{ asset('storage/' . $user->avatar_path) }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                    @else
                        {{ substr($user->name, 0, 1) }}
                    @endif
                </div>
                <input type="file" name="avatar" id="avatar" style="display: none;" onchange="document.getElementById('avatar-name').textContent = this.files[0].name">
                <button type="button" class="btn btn-white" style="padding: 8px 12px; font-size: 11px;" onclick="document.getElementById('avatar').click()">GANTI FOTO</button>
                <span id="avatar-name" style="font-size: 10px; opacity: 0.5;"></span>
                @error('avatar') <p style="color:var(--red); font-size:10px; margin-top:4px;">{{ $message }}</p> @enderror
            </div>

            <div class="profile-info-section" style="display: flex; flex-direction: column; gap: 20px;">
                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label class="input-label">Username</label>
                    <input type="text" class="input" value="{{ $user->username }}" disabled style="background: #eee; cursor: not-allowed;">
                    <p style="font-size: 10px; opacity: 0.5;">Username tidak dapat diubah.</p>
                </div>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <label class="input-label">Nama Lengkap</label>
                        <input type="text" name="name" class="input" value="{{ old('name', $user->name) }}" required>
                        @error('name') <p style="color:var(--red); font-size:11px;">{{ $message }}</p> @enderror
                    </div>
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <label class="input-label">Display Name (Judul Profil)</label>
                        <input type="text" name="display_name" class="input" value="{{ old('display_name', $user->display_name) }}" placeholder="Nama yang muncul di publik">
                        @error('display_name') <p style="color:var(--red); font-size:11px;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div style="display:flex; flex-direction:column; gap:6px;">
                    <label class="input-label">Bio Singkat</label>
                    <textarea name="bio" class="input" style="height: 100px; resize: none;">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio') <p style="color:var(--red); font-size:11px;">{{ $message }}</p> @enderror
                </div>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <label class="input-label">Email</label>
                        <input type="email" name="email" class="input" value="{{ old('email', $user->email) }}" required>
                        @error('email') <p style="color:var(--red); font-size:11px;">{{ $message }}</p> @enderror
                    </div>
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <label class="input-label">Warna Tema</label>
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <input type="color" name="theme_color" class="input" value="{{ old('theme_color', $user->theme_color ?? '#FFE500') }}" style="width: 80px; padding: 4px; height: 50px;">
                            <span style="font-size: 11px; font-weight: 700;">{{ old('theme_color', $user->theme_color ?? '#FFE500') }}</span>
                        </div>
                        @error('theme_color') <p style="color:var(--red); font-size:11px;">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end;">
            <button type="submit" class="btn">SIMPAN PROFIL</button>
        </div>
    </form>
</section>
