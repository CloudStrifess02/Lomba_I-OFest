@extends('base.app') 

@section('content')
<section id="diagnose" class="py-20 bg-white m-6 flex justify-center">
    <div class="container mx-auto px-6">
        <div class="text-center mb-10">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 text-emerald-600 text-xs font-bold uppercase tracking-wider mb-4">
                <i class="fa-solid fa-brain"></i> Fixora Core Feature
            </div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                AI <span class="text-emerald-600">Repair Diagnosis</span>
            </h2>
            <p class="text-slate-500 max-w-lg mx-auto mt-4">
                Biarkan AI Fixora menganalisa kerusakan barang Anda dan memberikan rekomendasi jalur sirkular terbaik.
            </p>
        </div>

        <div class="max-w-3xl mx-auto bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
            
            <div class="flex bg-slate-50 border-b border-slate-200" id="step-bar">
                @foreach(['Kategori', 'Spesifikasi', 'Visual', 'Deskripsi'] as $index => $step)
                <div class="step-item flex-1 py-4 flex flex-col items-center gap-1 border-b-2 transition-all duration-300 {{ $index === 0 ? 'border-emerald-500 text-emerald-600 bg-emerald-50/50' : 'border-transparent text-slate-400' }}" id="si-{{ $index + 1 }}">
                    <div class="step-num w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold {{ $index === 0 ? 'bg-emerald-500 text-white' : 'bg-slate-200 text-slate-500' }}">
                        {{ $index + 1 }}
                    </div>
                    <span class="text-[11px] font-semibold uppercase tracking-tight">{{ $step }}</span>
                </div>
                @endforeach
            </div>

            <form id="diagForm" enctype="multipart/form-data">
                @csrf
                
                <div class="step-panel p-8" id="step-1">
                    <h4 class="text-xl font-bold text-slate-800 mb-2">Pilih Kategori Barang</h4>
                    <p class="text-sm text-slate-500 mb-6">Apa jenis barang yang ingin Anda diagnosa hari ini?</p>
                    
                    <div class="space-y-4">
                        <label class="block text-sm font-bold text-slate-700">Kategori Utama</label>
                        <select name="category" class="w-full p-4 rounded-xl border-2 border-slate-100 bg-slate-50 focus:border-emerald-500 focus:bg-white transition-all appearance-none" id="cat-sel" required>
                            <option value="">— Pilih Kategori —</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Small Appliance">Small Appliance</option>
                            <option value="Mobile Device">Mobile Device</option>
                        </select>
                    </div>
                    
                    <div class="flex justify-end mt-8">
                        <button type="button" class="px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full font-bold shadow-lg transition-all transform hover:-translate-y-1" onclick="goStep(2)">
                            Selanjutnya <i class="fa-solid fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <div class="step-panel p-8 hidden" id="step-2">
                    <h4 class="text-xl font-bold text-slate-800 mb-2">Spesifikasi Barang</h4>
                    <p class="text-sm text-slate-500 mb-6">Pilih jenis barang yang lebih spesifik.</p>
                    
                    <div class="space-y-4">
                        <label class="block text-sm font-bold text-slate-700">Sub-Kategori</label>
                        <select name="subcategory" class="w-full p-4 rounded-xl border-2 border-slate-100 bg-slate-50 focus:border-emerald-500 focus:bg-white transition-all appearance-none" id="sub-sel" required>
                            <option value="">— Pilih Subkategori —</option>
                        </select>
                    </div>

                    <div class="flex justify-between mt-8">
                        <button type="button" class="px-8 py-3 border-2 border-slate-100 text-slate-400 rounded-full font-bold hover:text-emerald-600 transition-all" onclick="goStep(1)">Kembali</button>
                        <button type="button" class="px-8 py-3 bg-emerald-600 text-white rounded-full font-bold shadow-lg transition-all" onclick="goStep(3)">Selanjutnya</button>
                    </div>
                </div>

                <div class="step-panel p-8 hidden" id="step-3">
                    <h4 class="text-xl font-bold text-slate-800 mb-2">Upload Bukti Visual</h4>
                    <p class="text-sm text-slate-500 mb-6">Foto membantu AI mengenali pola kerusakan secara akurat.</p>
                    
                    <div class="dropzone border-2 border-dashed border-slate-200 rounded-2xl p-10 text-center bg-slate-50 hover:bg-emerald-50 hover:border-emerald-300 transition-all cursor-pointer group" onclick="document.getElementById('file-input').click()">
                        <i class="fa-solid fa-cloud-arrow-up text-4xl text-slate-300 group-hover:text-emerald-500 mb-4 block"></i>
                        <p class="text-slate-500 text-sm">Tarik foto ke sini atau <span class="text-emerald-600 font-bold">klik untuk pilih file</span></p>
                    </div>
                    <input type="file" name="image" id="file-input" class="hidden" accept="image/*" onchange="previewImage(event)">
                    <img id="photo-preview" class="mt-6 rounded-xl border-2 border-emerald-500 hidden max-h-48 w-full object-cover">

                    <div class="flex justify-between mt-8">
                        <button type="button" class="px-8 py-3 border-2 border-slate-100 text-slate-400 rounded-full font-bold" onclick="goStep(2)">Kembali</button>
                        <button type="button" class="px-8 py-3 bg-emerald-600 text-white rounded-full font-bold shadow-lg" onclick="goStep(4)">Selanjutnya</button>
                    </div>
                </div>

                <div class="step-panel p-8 hidden" id="step-4">
                    <h4 class="text-xl font-bold text-slate-800 mb-2">Detail Kerusakan</h4>
                    <p class="text-sm text-slate-500 mb-6">Ceritakan gejala yang dialami perangkat Anda.</p>
                    
                    <textarea name="description" id="dmg-desc" class="w-full p-4 rounded-xl border-2 border-slate-100 bg-slate-50 focus:border-emerald-500 focus:bg-white transition-all min-h-[120px]" placeholder="Contoh: TV bergaris-garis setelah jatuh..."></textarea>

                    <div class="flex justify-between mt-8">
                        <button type="button" class="px-8 py-3 border-2 border-slate-100 text-slate-400 rounded-full font-bold" onclick="goStep(3)">Kembali</button>
                        <button type="submit" class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-full font-bold shadow-xl flex items-center gap-2 transform hover:-translate-y-1 transition-all">
                            <i class="fa-solid fa-wand-magic-sparkles"></i> Analisa Sekarang
                        </button>
                    </div>
                </div>
            </form>

            <div id="loading" class="hidden p-20 text-center">
                <div class="w-16 h-16 border-4 border-emerald-100 border-t-emerald-600 rounded-full animate-spin mx-auto mb-4"></div>
                <p class="text-slate-600 font-bold italic tracking-wide">Fixora AI sedang menganalisa data...</p>
            </div>

            <div id="result" class="hidden p-8 animate-fade-in">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 id="res-dev" class="text-2xl font-extrabold text-slate-800 uppercase tracking-tighter"></h2>
                        <p class="text-xs text-slate-400 mt-1 uppercase tracking-widest">Diagnosis ID: <span id="res-id" class="text-emerald-600 font-bold"></span></p>
                    </div>
                    <div id="res-status-badge" class="px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm border"></div>
                </div>

                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div class="bg-emerald-50 p-5 rounded-2xl border border-emerald-100 text-center">
                        <div class="text-2xl mb-1">💰</div>
                        <div id="cost" class="text-xl font-black text-emerald-700"></div>
                        <p class="text-[10px] uppercase text-slate-400 font-bold tracking-widest mt-1">Cost Saved</p>
                    </div>
                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100 text-center">
                        <div class="text-2xl mb-1">♻️</div>
                        <div id="kg" class="text-xl font-black text-slate-800"></div>
                        <p class="text-[10px] uppercase text-slate-400 font-bold tracking-widest mt-1">Waste Saved</p>
                    </div>
                    <div class="bg-teal-50 p-5 rounded-2xl border border-teal-100 text-center">
                        <div class="text-2xl mb-1">🌍</div>
                        <div id="co2" class="text-xl font-black text-teal-700"></div>
                        <p class="text-[10px] uppercase text-slate-400 font-bold tracking-widest mt-1">Emission</p>
                    </div>
                </div>

                <div id="repair-estimate-box" class="hidden mb-6 overflow-hidden rounded-2xl border-2 border-emerald-100 bg-white">
                    <div class="bg-emerald-600 px-4 py-2 text-white text-[10px] font-black uppercase tracking-[0.2em] text-center">
                        Repair Estimation Detail
                    </div>
                    <div class="p-6 grid grid-cols-2 gap-4 divide-x divide-slate-100">
                        <div class="text-center">
                            <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Estimasi Biaya</p>
                            <p id="res-price" class="text-lg font-black text-slate-800">Rp --</p>
                        </div>
                        <div class="text-center">
                            <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Durasi Kerja</p>
                            <p id="res-duration" class="text-lg font-black text-slate-800">-- Hari</p>
                        </div>
                    </div>
                </div>

                <div id="action-area" class="bg-slate-50 p-6 rounded-2xl border border-slate-200 text-center mb-6">
                    <p id="status-text" class="text-slate-600 text-sm mb-4"></p>
                    <button id="action-btn" class="w-full px-10 py-4 rounded-full text-white font-bold shadow-lg transition-all transform hover:scale-[1.02]"></button>
                </div>

                <div class="text-center">
                    <button onclick="location.reload()" class="text-emerald-600 text-xs font-bold uppercase tracking-widest hover:underline">
                        <i class="fa-solid fa-rotate-left mr-2"></i>Diagnosa Barang Lain
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let currentStep = 1;
    const subMap = {
        'Elektronik': ['Laptop', 'TV', 'Monitor', 'Printer'],
        'Furniture': ['Kursi', 'Meja', 'Lemari', 'Sofa'],
        'Small Appliance': ['Blender', 'Rice Cooker', 'Setrika', 'Kipas Angin'],
        'Mobile Device': ['Smartphone', 'Tablet', 'Smartwatch']
    };

    document.getElementById('cat-sel').addEventListener('change', function() {
        const sub = document.getElementById('sub-sel');
        const options = subMap[this.value] || [];
        sub.innerHTML = '<option value="">— Pilih Subkategori —</option>';
        options.forEach(item => {
            sub.innerHTML += `<option value="${item}">${item}</option>`;
        });
    });

    function goStep(step) {
        if (step > currentStep) {
            if (currentStep === 1 && !document.getElementById('cat-sel').value) return alert('Pilih kategori!');
            if (currentStep === 2 && !document.getElementById('sub-sel').value) return alert('Pilih subkategori!');
        }

        document.getElementById(`step-${currentStep}`).classList.add('hidden');
        currentStep = step;
        document.getElementById(`step-${currentStep}`).classList.remove('hidden');

        for (let i = 1; i <= 4; i++) {
            const el = document.getElementById(`si-${i}`);
            const num = el.querySelector('.step-num');
            if (i < currentStep) {
                el.className = "step-item flex-1 py-4 flex flex-col items-center gap-1 border-b-2 border-emerald-500 text-emerald-600";
                num.className = "step-num w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold bg-emerald-500 text-white";
                num.innerHTML = '<i class="fa-solid fa-check"></i>';
            } else if (i === currentStep) {
                el.className = "step-item flex-1 py-4 flex flex-col items-center gap-1 border-b-2 border-emerald-500 text-emerald-600 bg-emerald-50/50";
                num.className = "step-num w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold bg-emerald-500 text-white";
                num.innerHTML = i;
            } else {
                el.className = "step-item flex-1 py-4 flex flex-col items-center gap-1 border-b-2 border-transparent text-slate-400";
                num.className = "step-num w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold bg-slate-200 text-slate-500";
                num.innerHTML = i;
            }
        }
    }

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('photo-preview');
            preview.src = reader.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    document.getElementById('diagForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        document.getElementById('step-4').classList.add('hidden');
        document.getElementById('step-bar').classList.add('hidden');
        document.getElementById('loading').classList.remove('hidden');

        fetch("{{ route('diagnosis.analyze') }}", {
            method: "POST",
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(data => {
            setTimeout(() => {
                document.getElementById('loading').classList.add('hidden');
                document.getElementById('result').classList.remove('hidden');

                document.getElementById('res-dev').innerText = data.device_name;
                document.getElementById('res-id').innerText = data.diag_id;
                document.getElementById('cost').innerText = data.cost_saved || data.impact?.save_pct || '0%';
                document.getElementById('kg').innerText = data.kg_saved || data.impact?.waste_prevented || '0kg';
                document.getElementById('co2').innerText = data.emission_saved || data.impact?.co2_reduced || '0kg';

                const badge = document.getElementById('res-status-badge');
                const btn = document.getElementById('action-btn');
                const stext = document.getElementById('status-text');
                const estimateBox = document.getElementById('repair-estimate-box');

                if (data.is_repairable) {
                    estimateBox.classList.remove('hidden');
                    document.getElementById('res-price').innerText = data.repair_price || 'Rp 150.000 - 300.000';
                    document.getElementById('res-duration').innerText = data.repair_duration || '1-3 Hari';

                    badge.innerText = "Layak Repair";
                    badge.className = "px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm border bg-emerald-50 text-emerald-600 border-emerald-200";
                    stext.innerText = "Kabar baik! Perangkat Anda masih sangat layak untuk diperbaiki.";
                    btn.innerText = "Booking Teknisi Sekarang";
                    btn.className = "w-full px-10 py-4 rounded-full text-white font-bold shadow-lg bg-emerald-600 hover:bg-emerald-700 transition-all";
                } else {
                    estimateBox.classList.add('hidden');

                    badge.innerText = "Disarankan Donasi";
                    badge.className = "px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm border bg-amber-50 text-amber-600 border-amber-200";
                    stext.innerText = "Kerusakan cukup berat. Donasikan agar komponen sisa dapat didaur ulang.";
                    btn.innerText = "Cari Hub Donasi";
                    btn.className = "w-full px-10 py-4 rounded-full text-white font-bold shadow-lg bg-amber-500 hover:bg-amber-600 transition-all";
                }
            }, 1500);
        })
        .catch(error => {
            console.error(error);
            alert('Terjadi kesalahan analisa.');
            location.reload();
        });
    });
</script>

<style>
    @keyframes fade-in { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fade-in 0.5s ease forwards; }
    .step-panel { animation: fade-in 0.3s ease-out; }
</style>
@endsection