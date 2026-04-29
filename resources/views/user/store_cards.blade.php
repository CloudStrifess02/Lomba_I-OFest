@foreach($stores as $store)
    @php
        $kategori = strtolower($store->kategoriToko->nama_kategori ?? '');
        
        $theme = match(true) {
            str_contains($kategori, 'servis') => [
                'text' => 'text-emerald-600',
                'bg_light' => 'bg-emerald-50',
                'bg_hover' => 'hover:bg-emerald-500',
                'border_light' => 'border-emerald-100',
                'text_light' => 'text-emerald-500',
                'gradient' => 'from-emerald-500 to-emerald-700',
                'icon' => 'fa-wrench'
            ],
            str_contains($kategori, 'suku cadang') || str_contains($kategori, 'sparepart') => [
                'text' => 'text-blue-600',
                'bg_light' => 'bg-blue-50',
                'bg_hover' => 'hover:bg-blue-500',
                'border_light' => 'border-blue-100',
                'text_light' => 'text-blue-500',
                'gradient' => 'from-blue-500 to-blue-700',
                'icon' => 'fa-microchip'
            ],
            str_contains($kategori, 'daur ulang') || str_contains($kategori, 'pengepul') => [
                'text' => 'text-green-600',
                'bg_light' => 'bg-green-50',
                'bg_hover' => 'hover:bg-green-500',
                'border_light' => 'border-green-100',
                'text_light' => 'text-green-500',
                'gradient' => 'from-green-500 to-emerald-600',
                'icon' => 'fa-recycle'
            ],
            default => [
                'text' => 'text-slate-600',
                'bg_light' => 'bg-slate-50',
                'bg_hover' => 'hover:bg-slate-500',
                'border_light' => 'border-slate-100',
                'text_light' => 'text-slate-500',
                'gradient' => 'from-slate-800 to-slate-900',
                'icon' => 'fa-store'
            ],
        };

        $coverUrl = 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?auto=format&fit=crop&w=600&q=80';
        if ($store->foto_cover) {
            $coverUrl = str_starts_with($store->foto_cover, 'http') 
                ? $store->foto_cover 
                : asset('storage/' . $store->foto_cover);
        }
    @endphp

    <div class="store-card group bg-white rounded-[28px] overflow-hidden border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.15)] transition-all duration-500 hover:-translate-y-2 flex flex-col h-full">
        
        <div class="h-36 w-full relative overflow-hidden bg-slate-200 shrink-0">
            <img src="{{ $coverUrl }}"
                alt="Cover {{ $store->nama_toko }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <span class="absolute top-4 right-4 bg-white/95 backdrop-blur shadow-sm {{ $theme['text'] }} text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1">
                <i class="fa-solid {{ $theme['icon'] }}"></i> {{ $store->kategori->nama_kategori ?? 'Mitra' }}
            </span>
        </div>

        <div class="px-6 pb-6 flex flex-col flex-grow">
            
            <div class="w-16 h-16 rounded-2xl bg-white p-1.5 shadow-md relative -mt-8 mb-4 border border-slate-50 z-10 shrink-0">
                @if($store->logo_toko)
                    <img src="{{ str_starts_with($store->logo_toko, 'http') ? $store->logo_toko : asset('storage/' . $store->logo_toko) }}" alt="Logo" class="w-full h-full rounded-xl object-cover">
                @else
                    <div class="w-full h-full rounded-xl bg-gradient-to-br {{ $theme['gradient'] }} flex items-center justify-center text-white font-bold text-xl">
                        {{ strtoupper(substr($store->nama_toko, 0, 2)) }}
                    </div>
                @endif
            </div>

            <div class="mb-5 flex justify-between items-start gap-2">
                <div>
                    <h3 class="font-extrabold text-xl text-slate-800 {{ $theme['text'] }} transition-colors leading-tight">
                        {{ $store->nama_toko }}
                    </h3>
                    <p class="text-slate-500 text-sm mt-1.5 flex items-center gap-1.5">
                        <i class="fa-solid fa-location-dot text-slate-400"></i> {{ ucfirst($store->lokasi) }}
                    </p>
                </div>
                
                @if($store->is_verified)
                    <div class="flex items-center gap-1 bg-green-50 px-2 py-1 rounded-lg text-green-600 font-bold text-sm shrink-0">
                        <i class="fa-solid fa-certificate text-xs"></i> Verified
                    </div>
                @else
                    <div class="flex items-center gap-1 bg-amber-50 px-2 py-1 rounded-lg text-amber-600 font-bold text-sm shrink-0">
                        <i class="fa-solid fa-star text-xs"></i> {{ $store->rating }}
                    </div>
                @endif
            </div>

            <div class="space-y-3 mb-6">
                @foreach($store->produk->take(2) as $item)
                    <div class="group/item flex items-center gap-3 p-2.5 rounded-2xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-colors cursor-pointer">
                        <div class="w-12 h-12 rounded-xl {{ $theme['bg_light'] }} {{ $theme['border_light'] }} flex items-center justify-center {{ $theme['text_light'] }} shrink-0">
                            <i class="{{ str_starts_with($item->icon, 'fa') ? 'fa-solid ' . $item->icon : $item->icon }}"></i>
                        </div>
                        <div class="flex-grow">
                            <p class="text-sm font-bold text-slate-700">{{ $item->nama_produk }}</p>
                            
                            @if($item->harga)
                                <p class="text-xs {{ $theme['text'] }} font-semibold mt-0.5">
                                    {{ $item->is_harga_mulai ? 'Mulai ' : '' }}Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </p>
                            @elseif($item->deskripsi_singkat)
                                <p class="text-xs text-slate-500 mt-0.5">{{ $item->deskripsi_singkat }}</p>
                            @endif
                        </div>
                        <i class="fa-solid fa-chevron-right text-slate-300 text-xs mr-2 shrink-0"></i>
                    </div>
                @endforeach
            </div>

            <button class="mt-auto w-full {{ $theme['bg_light'] }} {{ $theme['bg_hover'] }} {{ $theme['text'] }} hover:text-white font-bold py-3.5 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                Kunjungi Toko <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>
@endforeach