<section>
    <p style="font-size: 13px; opacity: 0.7; margin-bottom: 20px;">
        {{ __('Setelah akun dihapus, semua data akan hilang permanen. Harap berhati-hati.') }}
    </p>

    <button 
        class="btn btn-red"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >HAPUS AKUN PERMANEN</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" style="padding: 36px; background: var(--white); border: var(--border-thick);">
            @csrf
            @method('delete')

            <h2 style="font-family: 'Bebas Neue', sans-serif; font-size: 32px; margin-bottom: 12px;">
                {{ __('APAKAH KAMU YAKIN?') }}
            </h2>

            <p style="font-size: 14px; opacity: 0.7; margin-bottom: 24px;">
                {{ __('Silakan masukkan password kamu untuk mengonfirmasi penghapusan akun secara permanen.') }}
            </p>

            <div style="margin-bottom: 24px;">
                <label class="input-label">Password</label>
                <input type="password" name="password" class="input" placeholder="Password Konfirmasi">
                @error('password', 'userDeletion') <p style="color:var(--red); font-size:11px; margin-top:4px;">{{ $message }}</p> @enderror
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 16px;">
                <button type="button" class="btn btn-white" x-on:click="$dispatch('close')">BATAL</button>
                <button type="submit" class="btn btn-red">YA, HAPUS AKUN</button>
            </div>
        </form>
    </x-modal>
</section>
