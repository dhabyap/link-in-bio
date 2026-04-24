<x-dashboard-layout>
    <x-slot name="header">
        EDIT LINK
    </x-slot>

    <div class="section-card">
        <div class="section-card-header">
            <div class="section-card-title">EDIT: {{ $link->title }}</div>
        </div>
        <div class="section-card-body" style="padding: 36px;">
            <form method="POST" action="{{ route('admin.links.update', $link) }}" style="display: flex; flex-direction: column; gap: 24px;">
                @csrf
                @method('PATCH')

                <div style="display:flex; flex-direction:column; gap:8px;">
                    <label class="input-label">Judul Link</label>
                    <input type="text" name="title" class="input" value="{{ old('title', $link->title) }}" required>
                    @error('title') <p style="color:var(--red); font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                </div>

                <div style="display:flex; flex-direction:column; gap:8px;">
                    <label class="input-label">URL (Link)</label>
                    <input type="url" name="url" class="input" value="{{ old('url', $link->url) }}" required>
                    @error('url') <p style="color:var(--red); font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                </div>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <label class="input-label">Urutan (Order)</label>
                        <input type="number" name="order" class="input" value="{{ old('order', $link->order) }}" required>
                        @error('order') <p style="color:var(--red); font-size:12px; margin-top:4px;">{{ $message }}</p> @enderror
                    </div>
                    <div style="display:flex; flex-direction:column; gap:8px; justify-content: center;">
                         <label style="display: flex; align-items: center; gap: 12px; cursor: pointer; font-weight: 700; font-size: 13px;">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $link->is_active) ? 'checked' : '' }} style="width: 20px; height: 20px; accent-color: var(--black);">
                            AKTIFKAN LINK
                        </label>
                    </div>
                </div>

                <div style="display:flex; gap:16px; margin-top: 12px;">
                    <button type="submit" class="btn">SIMPAN PERUBAHAN</button>
                    <a href="{{ route('admin.links.index') }}" class="btn btn-white">BATAL</a>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
