@forelse ($toko as $item)
    <div
        class="bg-white rounded-2xl shadow hover:shadow-lg transition border border-slate-100 overflow-hidden flex flex-col h-full">

        {{-- IMAGE --}}
        <img src="{{ Str::startsWith($item->foto_cover, 'http') ? $item->foto_cover : asset('storage/' . $item->foto_cover) }}"
            alt="{{ $item->nama_toko }}" class="w-full h-full object-cover">

        {{-- CONTENT --}}
        <div class="p-6 flex flex-col flex-grow">

            <div class="flex items-start justify-between mb-3 gap-2">
                <h3 class="font-bold text-lg text-slate-800 leading-tight">
                    {{ $item->nama_toko }}
                </h3>

                <span
                    class="text-xs px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full font-semibold whitespace-nowrap">
                    Resmi
                </span>
            </div>

            <p class="text-sm text-slate-500 mb-4">
                <i class="fa-solid fa-location-dot mr-2 text-emerald-500"></i>
                {{ $item->alamat ?? 'Alamat tidak tersedia' }}
            </p>

            {{-- PUSH KE BAWAH --}}
            <div class="mt-auto flex justify-between items-center pt-4">
                <span class="text-xs text-emerald-600 font-semibold">
                    ♻ Terima E-Waste
                </span>

                <a href="/marketplace/{{ $item->id }}"
                    class="text-sm px-4 py-1.5 bg-emerald-500 text-white rounded-full hover:bg-emerald-600 transition">
                    Detail
                </a>
            </div>

        </div>
    </div>

@empty
@endforelse
