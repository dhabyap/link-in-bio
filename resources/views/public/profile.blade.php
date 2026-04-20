<x-public-layout>
    @php
    if (!function_exists('hexToRgb')) {
        function hexToRgb($hex) {
            $hex = str_replace("#", "", $hex);
            if(strlen($hex) == 3) {
                $r = hexdec(substr($hex,0,1).substr($hex,0,1));
                $g = hexdec(substr($hex,1,1).substr($hex,1,1));
                $b = hexdec(substr($hex,2,1).substr($hex,2,1));
            } else {
                $r = hexdec(substr($hex,0,2));
                $g = hexdec(substr($hex,2,2));
                $b = hexdec(substr($hex,4,2));
            }
            return ['r' => $r, 'g' => $g, 'b' => $b];
        }
    }
    @endphp
    
    <x-slot name="title">
        {{ $user->display_name ?? $user->name }} (@{{ $user->username }})
    </x-slot>

    @php
        $themeColor = $user->theme_color ?? '#6366f1';
        $rgb = hexToRgb($themeColor);
    @endphp

    <style>
        :root {
            --primary-color: {{ $themeColor }};
            --primary-rgba: rgba({{ $rgb['r'] }}, {{ $rgb['g'] }}, {{ $rgb['b'] }}, 0.1);
        }
        .bg-dynamic {
            background: linear-gradient(135deg, {{ $themeColor }} 0%, #1a1a1a 100%);
        }
        .link-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="min-h-screen bg-dynamic flex flex-col items-center py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Profile Header -->
        <div class="max-w-xl w-full flex flex-col items-center mb-12" 
             x-data="{ copied: false }">
            <div class="relative mb-6 group">
                <div class="absolute -inset-1 bg-gradient-to-r from-white/30 to-white/10 rounded-full blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                @if($user->avatar_path)
                    <img src="{{ Storage::url($user->avatar_path) }}" alt="Avatar" class="relative w-32 h-32 rounded-full border-4 border-white/20 object-cover shadow-2xl">
                @else
                    <div class="relative w-32 h-32 rounded-full border-4 border-white/20 bg-gray-800 flex items-center justify-center text-4xl font-bold text-white shadow-2xl">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <h1 class="text-3xl font-bold text-white mb-2 text-center">{{ $user->display_name ?? $user->name }}</h1>
            <p class="text-white/70 text-lg mb-6 text-center max-w-sm">{{ $user->bio }}</p>

            <!-- Share Button -->
            <button @click="navigator.clipboard.writeText(window.location.href); copied = true; setTimeout(() => copied = false, 2000)"
                    class="glass px-6 py-2 rounded-full text-white/90 text-sm font-medium flex items-center gap-2 hover:bg-white/20 transition-all duration-300">
                <span x-show="!copied"><i class="fas fa-share-alt"></i> Share Profile</span>
                <span x-show="copied" x-cloak><i class="fas fa-check"></i> Link Copied!</span>
            </button>
        </div>

        <!-- Links Grid -->
        <div class="max-w-2xl w-full space-y-4 mb-16">
            @forelse($links as $link)
                <a href="{{ $link->url }}" target="_blank" 
                   class="link-card glass block p-4 rounded-2xl text-white transition-all duration-300 flex items-center justify-between group">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-xl group-hover:bg-white/20 transition-colors">
                            <i class="{{ $link->icon ?? 'fas fa-link' }}"></i>
                        </div>
                        <span class="font-medium text-lg">{{ $link->title }}</span>
                    </div>
                    <i class="fas fa-chevron-right text-white/30 group-hover:text-white transition-colors"></i>
                </a>
            @empty
                <p class="text-white/40 text-center py-4 italic border border-white/10 rounded-2xl">No active links found.</p>
            @endforelse
        </div>

        <!-- Portfolio Section -->
        <div class="max-w-4xl w-full">
            <h2 class="text-2xl font-bold text-white mb-8 text-center sm:text-left flex items-center gap-3">
                <span class="w-8 h-1 bg-white/30 rounded-full"></span>
                Featured Work
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($portfolios as $portfolio)
                    <div class="glass rounded-2xl overflow-hidden hover:border-white/50 transition-all duration-300 group">
                        @if($portfolio->thumbnail_path)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ Storage::url($portfolio->thumbnail_path) }}" 
                                     alt="{{ $portfolio->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                        @else
                            <div class="h-48 bg-white/5 flex items-center justify-center text-white/20 italic">
                                No preview available
                            </div>
                        @endif
                        <div class="p-5">
                            <h3 class="text-white font-semibold text-lg mb-2">{{ $portfolio->title }}</h3>
                            <p class="text-white/60 text-sm line-clamp-3 mb-4">{{ $portfolio->description }}</p>
                            
                            @if($portfolio->external_api_url && isset($apiData[$portfolio->id]))
                                <div class="mt-4 pt-4 border-t border-white/10">
                                    <div class="text-[10px] uppercase tracking-wider text-white/40 mb-2">Live Status</div>
                                    <pre class="bg-black/20 p-2 rounded text-[10px] text-green-400 overflow-x-auto">{{ json_encode($apiData[$portfolio->id], JSON_PRETTY_PRINT) }}</pre>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-white/40 col-span-full text-center py-8">Portfolio items coming soon.</p>
                @endforelse
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-24 text-white/30 text-sm flex flex-col items-center gap-4">
            <a href="/" class="hover:text-white transition-colors flex items-center gap-2">
                <span>Created with</span>
                <span class="font-bold tracking-tighter">{{ config('app.name') }}</span>
            </a>
        </footer>
    </div>
</x-public-layout>


