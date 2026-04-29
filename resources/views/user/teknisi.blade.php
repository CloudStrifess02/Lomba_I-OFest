@extends('base.app')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --em: #10b981; --em2: #059669; --em3: #d1fae5; --em4: #ecfdf5;
        --sl: #f8fafc; --sl2: #f1f5f9; --sl3: #e2e8f0;
        --ink: #0f172a; --ink2: #1e293b; --muted: #64748b;
        --sh: 0 4px 24px rgba(16,185,129,.08);
        --font-d: 'Syne', sans-serif;
        --font-b: 'Manrope', sans-serif;
    }

    body { font-family: var(--font-b); background-color: var(--sl); }
    .font-syne { font-family: var(--font-d); }

    .hero-bg {
        background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 40%, #f8fafc 100%);
        padding: 80px 0 60px;
        text-align: center;
    }

    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: var(--sl3); border-radius: 10px; }

    .tech-card {
        background: white;
        border: 1.5px solid var(--sl3);
        border-radius: 24px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }
    .tech-card:hover {
        border-color: var(--em);
        box-shadow: var(--sh);
        transform: translateY(-2px);
    }
    .tech-card.selected {
        border-color: var(--em) !important;
        background: var(--em4) !important;
        box-shadow: var(--sh);
    }

    .booking-panel { position: sticky; top: 24px; }

    .avatar-circle {
        width: 52px; height: 52px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 800; color: white;
        background: linear-gradient(135deg, var(--em), var(--em2));
    }

    .animate-fade-in { animation: fadeIn 0.4s ease forwards; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="hero-bg mt-6">
    <div class="container mx-auto px-6">
        <div class="flex flex-col items-center justify-center gap-4">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-emerald-100 text-emerald-600 text-[10px] font-bold uppercase tracking-widest">
                <i class="fa-solid fa-screwdriver-wrench"></i> Expert Network
            </div>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tighter font-syne">
                Pilih <span class="text-emerald-600">Teknisi Terbaik</span>
            </h1>
            <p class="text-slate-500 max-w-md mx-auto">
                Berdasarkan diagnosis <strong class="text-slate-800">#{{ $diagnosis['diag_id'] ?? request('diag_id', 'FXR-2026') }}</strong>, temukan partner perbaikan yang tepat.
            </p>
        </div>
    </div>
</div>

@if($errors->any() || session('error'))
<div class="container mx-auto px-6 mt-8">
    <div class="bg-red-50 border border-red-100 p-4 rounded-2xl">
        <div class="flex items-start gap-3">
            <i class="fa-solid fa-circle-exclamation text-red-500 mt-1"></i>
            <div>
                <h5 class="text-sm font-bold text-red-800 mb-1">Gagal Melanjutkan Booking</h5>
                <ul class="text-xs text-red-600 list-disc ml-4">
                    @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    @if(session('error')) <li>{{ session('error') }}</li> @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endif

<main class="container mx-auto px-6 py-12">
    <div class="mb-8 bg-white p-5 rounded-3xl border border-slate-200 shadow-sm">
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex-grow relative">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" id="search-tech" onkeyup="filterTechnicians()" 
                    placeholder="Cari nama atau spesialisasi..." 
                    class="w-full pl-11 pr-4 py-3 rounded-2xl border-2 border-slate-50 bg-slate-50 focus:bg-white focus:border-emerald-500 outline-none transition-all text-sm">
            </div>
            
            <div class="md:w-64 relative">
                <i class="fa-solid fa-tag absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <select id="filter-budget" onchange="filterTechnicians()" 
                    class="w-full pl-11 pr-10 py-3 rounded-2xl border-2 border-slate-50 bg-slate-50 focus:bg-white focus:border-emerald-500 outline-none transition-all text-sm appearance-none cursor-pointer">
                    <option value="9999999">Semua Budget</option>
                    <option value="100000">Di bawah 100rb</option>
                    <option value="150000">Di bawah 150rb</option>
                    <option value="250000">Di bawah 250rb</option>
                </select>
                <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
            </div>

            <div class="flex items-center gap-3 px-4 py-3 bg-slate-50 rounded-2xl border-2 border-slate-50">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">Verified Only</span>
                <input type="checkbox" id="filter-verified" onchange="filterTechnicians()" class="w-5 h-5 accent-emerald-600">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-4 overflow-y-auto pr-2 custom-scrollbar" style="max-height: 680px;" id="tech-list">
            @forelse($technicians as $tech)
            <div class="tech-card p-6 flex flex-col sm:flex-row items-start sm:items-center gap-6" 
                 data-price="{{ $tech->price_min }}"
                 data-verified="{{ $tech->is_verified }}"
                 data-spec="{{ strtolower($tech->description) }}"
                 onclick="selectTech('{{ $tech->id }}', '{{ $tech->shop_name }}', '{{ number_format($tech->price_min, 0, ',', '.') }}', this)">
                
                <div class="avatar-circle flex-shrink-0 text-xl shadow-sm">
                    {{ strtoupper(substr($tech->shop_name, 0, 1)) }}
                </div>

                <div class="flex-grow">
                    <div class="flex items-center gap-2 mb-1">
                        <h3 class="font-extrabold text-slate-800 text-lg">{{ $tech->shop_name }}</h3>
                        @if($tech->is_verified)
                        <i class="fa-solid fa-circle-check text-blue-500 text-xs"></i>
                        @endif
                    </div>
                    <p class="text-xs text-slate-500 mb-2 line-clamp-1 italic">"{{ $tech->description }}"</p>
                    <div class="flex items-center gap-4 text-sm text-slate-400">
                        <span class="flex items-center"><i class="fa-solid fa-star text-amber-400 mr-1"></i> {{ $tech->rating }}</span>
                        <span class="flex items-center"><i class="fa-solid fa-comment mr-1"></i> {{ $tech->total_reviews }} Reviews</span>
                    </div>
                </div>

                <div class="text-right border-t sm:border-t-0 pt-4 sm:pt-0">
                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Estimasi Mulai</p>
                    <p class="text-xl font-black text-slate-800">Rp{{ number_format($tech->price_min, 0, ',', '.') }}</p>
                </div>
            </div>
            @empty
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-200">
                <p class="text-slate-400">Tidak ada teknisi tersedia.</p>
            </div>
            @endforelse
        </div>

        <div class="lg:col-span-1">
            <div class="booking-panel bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h4 class="font-bold text-slate-800 flex items-center gap-2">
                        <i class="fa-solid fa-receipt text-emerald-600"></i> Konfirmasi Pesanan
                    </h4>
                </div>
                
                <div class="p-6">
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-white border border-emerald-200 flex items-center justify-center text-xl">📦</div>
                        <div>
                            <p class="text-[10px] text-emerald-600 font-bold uppercase tracking-tighter">Diagnosa Aktif</p>
                            <p class="text-sm font-bold text-slate-800">{{ $diagnosis['device_name'] ?? request('device_name', 'Perangkat Tidak Diketahui') }}</p>
                        </div>
                    </div>

                    <div id="no-selection" class="{{ old('technician_id') ? 'hidden' : '' }} py-16 text-center border-2 border-dashed border-slate-100 rounded-3xl">
                        <i class="fa-solid fa-user-plus text-slate-200 text-3xl mb-3"></i>
                        <p class="text-slate-400 text-xs px-10">Pilih salah satu teknisi di sebelah kiri untuk melanjutkan</p>
                    </div>

                    <div id="booking-form-area" class="{{ old('technician_id') ? '' : 'hidden' }} animate-fade-in">
                        <form action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="technician_id" id="input-tech-id" value="{{ old('technician_id') }}">
                            <input type="hidden" name="diag_id" value="{{ $diagnosis['diag_id'] ?? request('diag_id') }}">

                            <div class="space-y-5">
                                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                    <p class="text-[10px] text-slate-400 font-bold uppercase mb-1">Teknisi Terpilih</p>
                                    <p id="display-tech-name" class="font-black text-slate-800">{{ old('tech_name_display') }}</p>
                                    <input type="hidden" name="tech_name_display" id="input-tech-name-display" value="{{ old('tech_name_display') }}">
                                </div>

                                <div>
                                    <label class="block text-[10px] font-bold text-slate-400 uppercase mb-2 ml-1">Jadwal Perbaikan</label>
                                    <input type="datetime-local" name="schedule" value="{{ old('schedule') }}" class="w-full p-4 rounded-xl border-2 border-slate-100 focus:border-emerald-500 outline-none transition-all text-sm" required>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-bold text-slate-400 uppercase mb-2 ml-1">Alamat Penjemputan</label>
                                    <textarea name="address" rows="3" class="w-full p-4 rounded-xl border-2 border-slate-100 focus:border-emerald-500 outline-none transition-all text-sm" placeholder="Masukkan alamat lengkap penjemputan..." required>{{ old('address') }}</textarea>
                                </div>

                                <button type="submit" class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-black shadow-lg shadow-emerald-100 transition-all transform hover:-translate-y-1">
                                    Konfirmasi Booking
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function filterTechnicians() {
        const query = document.getElementById('search-tech').value.toLowerCase();
        const budget = parseInt(document.getElementById('filter-budget').value);
        const verified = document.getElementById('filter-verified').checked;
        const cards = document.querySelectorAll('.tech-card');
        let found = false;

        cards.forEach(card => {
            const name = card.querySelector('h3').innerText.toLowerCase();
            const spec = card.getAttribute('data-spec');
            const price = parseInt(card.getAttribute('data-price'));
            const isVerif = card.getAttribute('data-verified') == "1";

            const matchesSearch = name.includes(query) || spec.includes(query);
            const matchesBudget = price <= budget;
            const matchesVerif = !verified || isVerif;

            if (matchesSearch && matchesBudget && matchesVerif) {
                card.style.display = "flex";
                found = true;
            } else {
                card.style.display = "none";
            }
        });

        const listContainer = document.getElementById('tech-list');
        const existingMsg = document.getElementById('empty-msg');
        if (!found && !existingMsg) {
            const div = document.createElement('div');
            div.id = 'empty-msg';
            div.className = 'text-center py-20 bg-white rounded-3xl border border-dashed border-slate-200';
            div.innerHTML = '<p class="text-slate-400">Tidak ada teknisi yang sesuai dengan kriteria Anda.</p>';
            listContainer.appendChild(div);
        } else if (found && existingMsg) {
            existingMsg.remove();
        }
    }

    function selectTech(id, name, price, el) {
        document.getElementById('no-selection').classList.add('hidden');
        document.getElementById('booking-form-area').classList.remove('hidden');

        document.getElementById('input-tech-id').value = id;
        document.getElementById('display-tech-name').innerText = name;
        document.getElementById('input-tech-name-display').value = name; // Simpan untuk persistence

        document.querySelectorAll('.tech-card').forEach(c => c.classList.remove('selected'));
        el.classList.add('selected');

        if (window.innerWidth < 1024) {
            document.getElementById('booking-panel').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
</script>
@endsection