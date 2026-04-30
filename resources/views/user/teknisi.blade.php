@extends('base.app')

@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --em: #10b981; --em2: #059669; --em3: #d1fae5; --em4: #ecfdf5;
            --sl: #f8fafc; --sl2: #f1f5f9; --sl3: #e2e8f0; --ink: #0f172a;
            --muted: #64748b; --sh: 0 4px 24px rgba(16, 185, 129, .08);
            --font-d: 'Syne', sans-serif; --font-b: 'Manrope', sans-serif;
        }
        body { font-family: var(--font-b); background-color: var(--sl); }
        .font-syne { font-family: var(--font-d); }
        .hero-bg { background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 40%, #f8fafc 100%); padding: 80px 0 60px; text-align: center; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: var(--sl3); border-radius: 10px; }
        .tech-card { background: white; border: 1.5px solid var(--sl3); border-radius: 24px; transition: all 0.3s ease; cursor: pointer; }
        .tech-card:hover { border-color: var(--em); box-shadow: var(--sh); transform: translateY(-2px); }
        .tech-card.selected { border-color: var(--em) !important; background: var(--em4) !important; box-shadow: var(--sh); }
        .booking-panel { position: sticky; top: 24px; }
        .avatar-circle { width: 52px; height: 52px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; color: white; background: linear-gradient(135deg, var(--em), var(--em2)); }
        .animate-fade-in { animation: fadeIn 0.4s ease forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>

    <div class="hero-bg mt-6">
        <div class="container mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-emerald-100 text-emerald-600 text-[10px] font-bold uppercase tracking-widest mb-4">
                <i class="fa-solid fa-screwdriver-wrench"></i> Expert Network
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tighter font-syne mb-4">
                Pilih <span class="text-emerald-600">Teknisi Terbaik</span>
            </h1>
            <p class="text-slate-500 max-w-md mx-auto">
                Berdasarkan diagnosis <strong class="text-slate-800">#{{ $diagnosis['diag_id'] ?? request('diag_id', 'FXR-2026') }}</strong>, 
                temukan partner perbaikan yang tepat untuk perangkat Anda.
            </p>
        </div>
    </div>

    <main class="container mx-auto px-6 py-12">
        {{-- Search & Filter --}}
        <div class="mb-8 bg-white p-5 rounded-3xl border border-slate-200 shadow-sm">
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="flex-grow relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" id="search-tech" onkeyup="filterTechnicians()" placeholder="Cari nama toko..." class="w-full pl-11 pr-4 py-3 rounded-2xl border-2 border-slate-50 bg-slate-50 focus:bg-white focus:border-emerald-500 outline-none transition-all text-sm">
                </div>
                <div class="flex items-center gap-3 px-4 py-3 bg-slate-50 rounded-2xl border-2 border-slate-50">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Verified Only</span>
                    <input type="checkbox" id="filter-verified" onchange="filterTechnicians()" class="w-5 h-5 accent-emerald-600">
                </div>
            </div>
        </div>

        {{-- GRID UTAMA --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- KOLOM KIRI: DAFTAR TOKO --}}
            <div class="lg:col-span-2 space-y-4 overflow-y-auto pr-2 custom-scrollbar" style="max-height: 680px;" id="tech-list">
                @forelse($toko as $item)
                    <div class="tech-card p-6 flex flex-col sm:flex-row items-start sm:items-center gap-6"
                        data-verified="{{ $item->is_verified }}" 
                        data-name="{{ strtolower($item->nama_toko) }}"
                        onclick="selectTech('{{ $item->id }}', '{{ $item->nama_toko }}', this)">

                        <div class="avatar-circle flex-shrink-0 text-xl shadow-sm">
                            @if ($item->logo_toko)
                                <img src="{{ asset('storage/' . $item->logo_toko) }}" class="w-full h-full rounded-full object-cover">
                            @else
                                {{ strtoupper(substr($item->nama_toko, 0, 1)) }}
                            @endif
                        </div>

                        <div class="flex-grow">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-extrabold text-slate-800 text-lg">{{ $item->nama_toko }}</h3>
                                @if ($item->is_verified)
                                    <i class="fa-solid fa-circle-check text-blue-500 text-xs"></i>
                                @endif
                            </div>
                            <p class="text-xs text-slate-500 mb-2 line-clamp-1 italic">
                                <i class="fa-solid fa-location-dot mr-1"></i> {{ $item->alamat }}, {{ $item->kota }}
                            </p>
                            <div class="flex items-center gap-4 text-sm text-slate-400">
                                <span class="flex items-center"><i class="fa-solid fa-star text-amber-400 mr-1"></i> {{ number_format($item->rating, 1) }}</span>
                                <span class="text-slate-300">|</span>
                                <span class="text-indigo-500 font-semibold">{{ $item->kategori->nama_kategori ?? 'Umum' }}</span>
                            </div>
                        </div>

                        <div class="text-right border-t sm:border-t-0 pt-4 sm:pt-0">
                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Status</p>
                            <p class="text-sm font-bold {{ $item->is_verified ? 'text-green-600' : 'text-slate-500' }}">
                                {{ $item->is_verified ? 'Terverifikasi' : 'Reguler' }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-200 text-slate-400">
                        Tidak ada toko tersedia.
                    </div>
                @endforelse
            </div>

            {{-- KOLOM KANAN: PANEL BOOKING (KONFIRMASI) --}}
            <div class="lg:col-span-1">
                <div class="booking-panel bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden" id="booking-card">
                    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                        <h4 class="font-bold text-slate-800 flex items-center gap-2">
                            <i class="fa-solid fa-receipt text-emerald-600"></i> Konfirmasi Pesanan
                        </h4>
                    </div>

                    <div class="p-6">
                        {{-- Ringkasan Diagnosa --}}
                        <div class="flex items-center gap-4 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-white border border-emerald-200 flex items-center justify-center text-lg">📦</div>
                            <div>
                                <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-tighter">Diagnosa Aktif</p>
                                <p class="text-sm font-bold text-slate-800">{{ $diagnosis['device_name'] ?? 'Perangkat' }}</p>
                            </div>
                        </div>

                        {{-- State Kosong --}}
                        <div id="no-selection" class="{{ old('toko_id') ? 'hidden' : '' }} py-12 text-center border-2 border-dashed border-slate-100 rounded-3xl">
                            <i class="fa-solid fa-store text-slate-200 text-3xl mb-3"></i>
                            <p class="text-slate-400 text-xs px-10">Pilih salah satu toko di sebelah kiri untuk melanjutkan</p>
                        </div>

                        {{-- Form Booking --}}
                        <div id="booking-form-area" class="{{ old('toko_id') ? '' : 'hidden' }} animate-fade-in">
                            <form action="{{ route('booking.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="toko_id" id="input-tech-id" value="{{ old('toko_id') }}">
                                <input type="hidden" name="diag_id" value="{{ $diagnosis['diag_id'] ?? request('diag_id') }}">

                                <div class="space-y-5">
                                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                        <p class="text-[10px] text-slate-400 font-bold uppercase mb-1">Toko Terpilih</p>
                                        <p id="display-tech-name" class="font-black text-slate-800 text-base">{{ old('tech_name_display', 'Nama Toko') }}</p>
                                        <input type="hidden" name="tech_name_display" id="input-tech-name-display" value="{{ old('tech_name_display') }}">
                                    </div>

                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 uppercase mb-2 ml-1">Jadwal</label>
                                        <input type="datetime-local" name="schedule" value="{{ old('schedule') }}" class="w-full p-4 rounded-xl border-2 border-slate-100 focus:border-emerald-500 outline-none transition-all text-sm" required>
                                    </div>

                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 uppercase mb-2 ml-1">Alamat Penjemputan</label>
                                        <textarea name="address" rows="3" class="w-full p-4 rounded-xl border-2 border-slate-100 focus:border-emerald-500 outline-none transition-all text-sm" placeholder="Alamat lengkap..." required>{{ old('address') }}</textarea>
                                    </div>

                                    <button type="submit" class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-black shadow-lg transition-all transform hover:-translate-y-1">
                                        Konfirmasi Booking
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> {{-- End Kolom Kanan --}}

        </div> {{-- End Grid Utama --}}
    </main>

    <script>
        function filterTechnicians() {
            const query = document.getElementById('search-tech').value.toLowerCase();
            const verified = document.getElementById('filter-verified').checked;
            const cards = document.querySelectorAll('.tech-card');
            
            cards.forEach(card => {
                const name = card.getAttribute('data-name');
                const isVerif = card.getAttribute('data-verified') == "1";

                const matchesSearch = name.includes(query);
                const matchesVerif = !verified || isVerif;

                card.style.display = (matchesSearch && matchesVerif) ? "flex" : "none";
            });
        }

        function selectTech(id, name, el) {
            document.getElementById('no-selection').classList.add('hidden');
            document.getElementById('booking-form-area').classList.remove('hidden');

            document.getElementById('input-tech-id').value = id;
            document.getElementById('display-tech-name').innerText = name;
            document.getElementById('input-tech-name-display').value = name;

            document.querySelectorAll('.tech-card').forEach(c => c.classList.remove('selected'));
            el.classList.add('selected');

            // Scroll ke form jika di mobile
            if (window.innerWidth < 1024) {
                document.getElementById('booking-card').scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>
@endsection