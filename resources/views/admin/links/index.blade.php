<x-dashboard-layout>
    <x-slot name="header">
        KELOLA LINKS
    </x-slot>

    @if(session('success'))
        <div style="background: var(--yellow); border: var(--border-thick); padding: 16px; margin-bottom: 24px; font-weight: 700; box-shadow: var(--shadow);">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="background: var(--red); color: white; border: var(--border-thick); padding: 16px; margin-bottom: 24px; font-weight: 700; box-shadow: var(--shadow);">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="section-card">
        <div class="section-card-header">
            <div class="section-card-title">SEMUA LINK — {{ $links->count() }} TOTAL</div>
        </div>
        <div class="section-card-body" id="links-list">
            @forelse($links as $link)
                <div class="link-item" data-id="{{ $link->id }}">
                    <div class="drag-handle">⠿</div>
                    <div class="link-info">
                        <div class="link-title-text">{{ $link->title }}</div>
                        <div class="link-url-text">{{ $link->url }}</div>
                    </div>
                    <div class="link-toggle {{ $link->is_active ? 'on' : '' }}"></div>
                    <div class="link-actions">
                        <a href="{{ route('admin.links.edit', $link) }}" class="link-btn">EDIT</a>
                        <form action="{{ route('admin.links.destroy', $link) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="link-btn del" onclick="return confirm('Hapus link ini?')">✕</button>
                        </form>
                    </div>
                </div>
            @empty
                <div style="padding: 40px; text-align: center; opacity: 0.5; font-style: italic;">
                    Belum ada link. Tambahkan melalui form di bawah!
                </div>
            @endforelse
        </div>

        <form action="{{ route('admin.links.store') }}" method="POST" class="add-link-row">
            @csrf
            <input type="hidden" name="order" value="{{ ($links->max('order') ?? 0) + 1 }}">
            <input type="hidden" name="is_active" value="1">
            
            <div style="display:flex; flex-direction:column; gap:4px; flex:1;">
                <label class="input-label">Judul Link</label>
                <input type="text" name="title" class="input" placeholder="Contoh: My Portfolio" required>
            </div>
            <div style="display:flex; flex-direction:column; gap:4px; flex:1;">
                <label class="input-label">URL (Link)</label>
                <input type="url" name="url" class="input" placeholder="https://..." required>
            </div>
            <button type="submit" class="btn" style="padding: 14px 24px;">TAMBAH +</button>
        </form>
    </div>
</x-dashboard-layout>
