@extends('base.app')

@section('content')
    <div class="min-h-screen bg-slate-50/50 pt-[70px]">

        <div class="relative">
            <div class="h-48 md:h-64 w-full overflow-hidden bg-emerald-100">
                @if ($toko->foto_cover)
                    <img src="{{ $toko->foto_cover }}" class="w-full h-full object-cover" alt="Cover {{ $toko->nama_toko }}">
                @else
                    <div class="w-full h-full bg-gradient-to-r from-emerald-400 to-green-500 opacity-20"></div>
                @endif
            </div>

            <div class="max-w-6xl mx-auto px-[6%]">
                <div class="flex flex-col md:flex-row items-start md:items-end gap-6">

                    <div class="relative -mt-16 md:-mt-20 z-10">
                        <div class="w-32 h-32 md:w-40 md:h-40 rounded-3xl bg-white p-1.5 shadow-xl border border-emerald-50">
                            <div class="w-full h-full rounded-2xl overflow-hidden bg-slate-100 flex items-center justify-center">
                                @if ($toko->logo_toko)
                                    <img src="{{ asset('storage/' . $toko->logo_toko) }}" class="w-full h-full object-cover"
                                        alt="Logo {{ $toko->nama_toko }}">
                                @else
                                    <i class="fa-solid fa-store text-4xl text-emerald-300"></i>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex-grow pb-2 pt-2 md:pt-0">
                        <div class="flex flex-wrap items-center gap-3 mb-2">
                            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 font-['Syne'] tracking-tight">
                                {{ $toko->nama_toko }}
                            </h1>
                            @if ($toko->is_verified)
                                <div class="bg-blue-500 text-white text-[10px] px-2.5 py-1 rounded-full flex items-center gap-1 shadow-sm font-bold uppercase tracking-wider">
                                    <i class="fa-solid fa-circle-check"></i> Verified
                                </div>
                            @endif
                        </div>

                        <div class="flex flex-wrap items-center gap-y-3 gap-x-5 text-sm text-slate-500 font-medium">
                            <span class="flex items-center gap-1.5 bg-emerald-100 text-emerald-700 px-3 py-1 rounded-lg border border-emerald-200">
                                <i class="fa-solid fa-tag text-xs"></i> {{ $toko->kategori->nama_kategori }}
                            </span>
                            <span class="flex items-center gap-1.5">
                                <i class="fa-solid fa-location-dot text-emerald-500"></i> {{ $toko->alamat }}
                            </span>
                            <span class="flex items-center gap-1.5">
                                <i class="fa-solid fa-star text-yellow-400"></i> 
                                <span class="text-slate-700 font-bold">{{ $toko->rating }}</span> 
                                <span class="text-slate-400">/ 5.0</span>
                            </span>
                        </div>
                    </div>

                    <div class="pb-4 w-full md:w-auto">
                        <button class="w-full md:w-auto bg-white border-2 border-emerald-500 text-emerald-600 px-6 py-2.5 rounded-full font-bold text-sm hover:bg-emerald-500 hover:text-white transition-all shadow-md active:scale-95 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-share-nodes"></i> Bagikan
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-[6%] mt-12 pb-20">

            <div class="flex items-center justify-between mb-8 border-b border-slate-200 pb-5">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">Semua Produk & Layanan</h2>
                    <p class="text-slate-400 text-sm mt-1">Jelajahi penawaran terbaik dari toko ini</p>
                </div>
                <span class="hidden md:block bg-slate-100 text-slate-600 px-4 py-1.5 rounded-full text-xs font-bold">
                    {{ $toko->produk->count() }} Produk
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($toko->produk as $item)
                    <div class="group bg-white rounded-3xl p-5 border border-emerald-50 shadow-sm hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">

                        <div class="flex-grow">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-50 to-green-50 text-emerald-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-500">
                                <i class="{{ $item->icon }} text-2xl"></i>
                            </div>

                            <h3 class="font-bold text-slate-800 mb-2 group-hover:text-emerald-600 transition-colors leading-tight">
                                {{ $item->nama_produk }}
                            </h3>

                            <p class="text-sm text-slate-500 line-clamp-2 mb-6 leading-relaxed">
                                {{ $item->deskripsi_singkat }}
                            </p>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-slate-50 mt-auto">
                            <div>
                                @if ($toko->kategori->nama_kategori == 'Pengepul Resmi')
                                    <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Metode</p>
                                    <p class="text-emerald-600 font-extrabold text-lg flex items-center gap-2">
                                        <i class="fa-solid fa-hand-holding-heart text-sm"></i> Donasikan
                                    </p>
                                @else
                                    <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Estimasi Harga</p>
                                    <p class="text-emerald-600 font-extrabold text-lg">
                                        @if ($item->is_harga_mulai)
                                            <span class="text-[10px] text-slate-400 font-normal italic">Mulai</span>
                                        @endif
                                        Rp{{ number_format($item->harga, 0, ',', '.') }}
                                    </p>
                                @endif
                            </div>
                            <a href="#" class="w-10 h-10 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-emerald-500 hover:text-white transition-all shadow-inner group/btn">
                                <i class="fa-solid fa-arrow-right text-xs group-hover/btn:translate-x-0.5 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                            <i class="fa-solid fa-box-open text-3xl"></i>
                        </div>
                        <h3 class="text-slate-500 font-medium">Belum ada produk di toko ini.</h3>
                    </div>
                @endforelse
            </div>

            <div class="mt-16 flex justify-center">
                <a href="{{ route('marketplace.index') }}"
                    class="group flex items-center gap-3 px-8 py-3.5 bg-white border border-slate-200 text-slate-600 rounded-full font-bold text-sm shadow-sm hover:border-emerald-500 hover:text-emerald-600 hover:shadow-md transition-all duration-300">
                    <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
                    Kembali ke Marketplace
                </a>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&display=swap');

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection