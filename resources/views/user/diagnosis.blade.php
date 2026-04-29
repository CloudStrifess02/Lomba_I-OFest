@extends('base.app')

@section('content')
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Booking Teknisi Berhasil!',
                text: "{{ session('swal_success') }}",
                icon: 'success',
                confirmButtonColor: '#2563eb', 
                confirmButtonText: 'Ok',
                backdrop: `rgba(16, 185, 129, 0.1)` 
            });
        @endif
    </script>
    
    <section id="diagnose" class="pb-25 bg-slate-50 flex pt-35 justify-center">
        <div class="container mx-auto px-6">
            <div class="text-center mb-10">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 text-emerald-600 text-xs font-bold uppercase tracking-wider mb-4">
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
                    @foreach (['Kategori', 'Spesifikasi', 'Visual', 'Deskripsi'] as $index => $step)
                        <div class="step-item flex-1 py-4 flex flex-col items-center gap-1 border-b-2 transition-all duration-300 {{ $index === 0 ? 'border-emerald-500 text-emerald-600 bg-emerald-50/50' : 'border-transparent text-slate-400' }}"
                            id="si-{{ $index + 1 }}">
                            <div
                                class="step-num w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold {{ $index === 0 ? 'bg-emerald-500 text-white' : 'bg-slate-200 text-slate-500' }}">
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
                        <select name="category"
                            class="w-full p-4 rounded-xl border-2 border-slate-100 bg-slate-50 focus:border-emerald-500 focus:bg-white transition-all appearance-none"
                            id="cat-sel" required>
                            <option value="">— Pilih Kategori —</option>
                            <option value="Computing Devices">Computing Devices</option>
                            <option value="Mobile Devices">Mobile Devices</option>
                            <option value="Home Appliances">Home Appliances</option>
                            <option value="Entertainment Electronics">Entertainment Electronics</option>
                            <option value="Office Equipment">Office Equipment</option>
                            <option value="Accessories & Components">Accessories & Components</option>
                        </select>
                        <div class="flex justify-end mt-8">
                            <button type="button"
                                class="px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-full font-bold shadow-lg transition-all transform hover:-translate-y-1"
                                onclick="goStep(2)">
                                Selanjutnya <i class="fa-solid fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="step-panel p-8 hidden" id="step-2">
                        <h4 class="text-xl font-bold text-slate-800 mb-2">Spesifikasi Barang</h4>
                        <p class="text-sm text-slate-500 mb-6">Pilih jenis barang yang lebih spesifik.</p>
                        <select name="subcategory"
                            class="w-full p-4 rounded-xl border-2 border-slate-100 bg-slate-50 focus:border-emerald-500 focus:bg-white transition-all appearance-none"
                            id="sub-sel" required>
                            <option value="">— Pilih Subkategori —</option>
                        </select>
                        <div class="flex justify-between mt-8">
                            <button type="button"
                                class="px-8 py-3 border-2 border-slate-100 text-slate-400 rounded-full font-bold hover:text-emerald-600 transition-all"
                                onclick="goStep(1)">Kembali</button>
                            <button type="button"
                                class="px-8 py-3 bg-emerald-600 text-white rounded-full font-bold shadow-lg transition-all transform hover:-translate-y-1"
                                onclick="goStep(3)">
                                Selanjutnya <i class="fa-solid fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="step-panel p-8 hidden" id="step-3">
                        <h4 class="text-xl font-bold text-slate-800 mb-2">Upload Bukti Visual</h4>
                        <p class="text-sm text-slate-500 mb-6">Foto membantu AI mengenali pola kerusakan secara akurat.</p>
                        <div class="dropzone border-2 border-dashed border-slate-200 rounded-2xl p-10 text-center bg-slate-50 hover:bg-emerald-50 hover:border-emerald-300 transition-all cursor-pointer group"
                            onclick="document.getElementById('file-input').click()">
                            <i
                                class="fa-solid fa-cloud-arrow-up text-4xl text-slate-300 mb-4 block group-hover:text-emerald-500"></i>
                            <p class="text-slate-500 text-sm">Tarik foto ke sini atau <span
                                    class="text-emerald-600 font-bold">klik untuk pilih file</span></p>
                        </div>
                        <input type="file" name="image" id="file-input" class="hidden" accept="image/*"
                            onchange="previewImage(event)">
                        <img id="photo-preview"
                            class="mt-6 rounded-xl border-2 border-emerald-500 hidden max-h-48 w-full object-cover">
                        <div class="flex justify-between mt-8">
                            <button type="button"
                                class="px-8 py-3 border-2 border-slate-100 text-slate-400 rounded-full font-bold"
                                onclick="goStep(2)">Kembali</button>
                            <button type="button"
                                class="px-8 py-3 bg-emerald-600 text-white rounded-full font-bold shadow-lg transition-all transform hover:-translate-y-1"
                                onclick="goStep(4)">
                                Selanjutnya <i class="fa-solid fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>

                    <div class="step-panel p-8 hidden" id="step-4">
                        <h4 class="text-xl font-bold text-slate-800 mb-2">Detail Kerusakan</h4>
                        <p class="text-sm text-slate-500 mb-6">Ceritakan gejala yang dialami perangkat Anda.</p>
                        <textarea name="description" id="dmg-desc"
                            class="w-full p-4 rounded-xl border-2 border-slate-100 bg-slate-50 focus:border-emerald-500 focus:bg-white transition-all min-h-[120px]"
                            placeholder="Contoh: TV bergaris-garis setelah jatuh..."></textarea>
                        <div class="flex justify-between mt-8">
                            <button type="button"
                                class="px-8 py-3 border-2 border-slate-100 text-slate-400 rounded-full font-bold"
                                onclick="goStep(3)">Kembali</button>
                            <button type="submit"
                                class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-full font-bold shadow-xl flex items-center gap-2 transform hover:-translate-y-1 transition-all">
                                <i class="fa-solid fa-wand-magic-sparkles"></i> Analisa Sekarang
                            </button>
                        </div>
                    </div>
                </form>

                <div id="loading" class="hidden p-20 text-center">
                    <div
                        class="w-16 h-16 border-4 border-emerald-100 border-t-emerald-600 rounded-full animate-spin mx-auto mb-4">
                    </div>
                    <p class="text-slate-600 font-bold italic tracking-widest">Fixora AI sedang menganalisa data...</p>
                </div>

                <div id="result" class="hidden p-8 animate-fade-in">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 id="res-dev" class="text-2xl font-extrabold text-slate-800 uppercase tracking-tighter">
                            </h2>
                            <p class="text-xs text-slate-400 mt-1 uppercase tracking-widest">Diagnosis ID: <span
                                    id="res-id" class="text-emerald-600 font-bold"></span></p>
                        </div>
                        <div id="res-status-badge"
                            class="px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm border">
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-6">
                        <div class="bg-emerald-50 p-5 rounded-2xl border border-emerald-100 text-center">
                            <div class="text-2xl mb-1">💰</div>
                            <div id="cost-val" class="text-xl font-black text-emerald-700">--</div>
                            <p class="text-[10px] uppercase text-slate-400 font-bold tracking-widest mt-1">Cost Saved</p>
                        </div>
                        <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100 text-center">
                            <div class="text-2xl mb-1">♻️</div>
                            <div id="kg-val" class="text-xl font-black text-slate-800">--</div>
                            <p class="text-[10px] uppercase text-slate-400 font-bold tracking-widest mt-1">Waste Saved</p>
                        </div>
                        <div class="bg-teal-50 p-5 rounded-2xl border border-teal-100 text-center">
                            <div class="text-2xl mb-1">🌍</div>
                            <div id="co2-val" class="text-xl font-black text-teal-700">--</div>
                            <p class="text-[10px] uppercase text-slate-400 font-bold tracking-widest mt-1">Emission</p>
                        </div>
                    </div>

                    <div id="repair-area" class="hidden">
                        <div id="repair-estimate-box"
                            class="mb-6 overflow-hidden rounded-2xl border-2 border-emerald-100 bg-white">
                            <div
                                class="bg-emerald-600 px-4 py-2 text-white text-[10px] font-black uppercase tracking-[0.2em] text-center">
                                Repair Estimation Detail</div>
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
                        <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 text-center mb-6">
                            <p class="text-slate-600 text-sm mb-4">Kabar baik! Perangkat Anda masih sangat layak untuk
                                diperbaiki.</p>
                            <button id="action-btn-repair"
                                class="w-full px-10 py-4 rounded-full text-white font-bold shadow-xl bg-gradient-to-r from-emerald-600 via-emerald-500 to-lime-500 hover:from-emerald-700 hover:to-lime-600 transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fa-solid fa-wand-magic-sparkles"></i> Lihat Teknisi Sekarang
                            </button>
                        </div>
                    </div>

                    <div id="donation-area" class="hidden">
                        <div class="bg-amber-50 border border-amber-100 p-4 rounded-2xl flex gap-3 mb-6">
                            <i class="fa-solid fa-recycle text-amber-600 mt-1"></i>
                            <p class="text-xs text-amber-800 leading-relaxed">
                                <strong>Barang ini masih bisa menjadi sumber spare part berharga.</strong> Melalui donasi ke
                                Fixora Hub, komponen yang masih berfungsi akan didistribusikan ke komunitas repair.
                            </p>
                        </div>

                        <div class="flex gap-1 bg-slate-100 p-1 rounded-xl mb-6 pointer-events-none">
                            <button type="button" id="tab-btn-hub"
                                class="don-tab-btn active flex-1 py-2 text-[10px] font-bold uppercase rounded-lg transition-all">1.
                                Pilih Hub</button>
                            <button type="button" id="tab-btn-method"
                                class="don-tab-btn flex-1 py-2 text-[10px] font-bold uppercase rounded-lg transition-all">2.
                                Metode</button>
                            <button type="button" id="tab-btn-scan"
                                class="don-tab-btn flex-1 py-2 text-[10px] font-bold uppercase rounded-lg transition-all">3.
                                Konfirmasi</button>
                        </div>

                        <div id="don-panel-hub" class="don-panel space-y-3">
                            <div class="relative mb-4">
                                <i
                                    class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                                <input type="text" id="hub-search" onkeyup="filterHubs()"
                                    placeholder="Cari lokasi hub terdekat..."
                                    class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-slate-100 focus:border-emerald-500 text-sm">
                            </div>

                            <div id="hub-list-container" class="space-y-3 max-h-[250px] overflow-y-auto pr-1">
                                <div class="hub-card p-4 border-2 border-emerald-500 bg-emerald-50 rounded-2xl cursor-pointer transition-all active-hub"
                                    onclick="selectHub(this, 'Surabaya Pusat')">
                                    <div class="flex justify-between items-start">
                                        <div class="flex gap-3">
                                            <div
                                                class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-emerald-600 shadow-sm">
                                                <i class="fa-solid fa-warehouse"></i>
                                            </div>
                                            <div>
                                                <h5 class="hub-name text-sm font-bold text-slate-800">Fixora Hub Surabaya
                                                    Pusat</h5>
                                                <p class="text-[10px] text-slate-500 mb-2">Jl. Raya Darmo No. 45, Surabaya
                                                </p>
                                                <div class="flex gap-2">
                                                    <span
                                                        class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-[9px] font-bold rounded-md">BUKA</span>
                                                    <span class="text-[9px] text-slate-400 font-bold"><i
                                                            class="fa-solid fa-location-dot mr-1"></i>1.2 KM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                    </div>
                                </div>
                                <div class="hub-card p-4 border-2 border-slate-100 rounded-2xl cursor-pointer hover:border-emerald-500 transition-all"
                                    onclick="selectHub(this, 'Wiyung')">
                                    <div class="flex justify-between items-start">
                                        <div class="flex gap-3">
                                            <div
                                                class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 shadow-sm">
                                                <i class="fa-solid fa-warehouse"></i>
                                            </div>
                                            <div>
                                                <h5 class="hub-name text-sm font-bold text-slate-800">Fixora Hub Wiyung
                                                </h5>
                                                <p class="text-[10px] text-slate-500 mb-2">Jl. Menganti No. 12, Surabaya
                                                </p>
                                                <div class="flex gap-2">
                                                    <span
                                                        class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-[9px] font-bold rounded-md">BUKA</span>
                                                    <span class="text-[9px] text-slate-400 font-bold"><i
                                                            class="fa-solid fa-location-dot mr-1"></i>3.5 KM</span>
                                                </div>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-circle-check text-slate-200"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="switchDonTab('method')"
                                class="w-full mt-4 py-4 bg-emerald-600 text-white rounded-2xl text-xs font-bold shadow-lg">Lanjut
                                Pilih Metode</button>
                        </div>

                        <div id="don-panel-method" class="don-panel hidden space-y-4 animate-fade-in">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="method-card p-6 border-2 border-emerald-500 bg-emerald-50 rounded-2xl text-center cursor-pointer transition-all"
                                    onclick="selectMethod(this, 'Pickup')">
                                    <div
                                        class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-emerald-600 shadow-sm mx-auto mb-3">
                                        <i class="fa-solid fa-truck"></i>
                                    </div>
                                    <span class="block text-xs font-bold text-slate-800">Pickup Rumah</span>
                                </div>
                                <div class="method-card p-6 border-2 border-slate-100 rounded-2xl text-center cursor-pointer transition-all"
                                    onclick="selectMethod(this, 'Drop-off')">
                                    <div
                                        class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-slate-400 shadow-sm mx-auto mb-3">
                                        <i class="fa-solid fa-person-walking"></i>
                                    </div>
                                    <span class="block text-xs font-bold text-slate-800">Drop-off Hub</span>
                                </div>
                            </div>
                            <div class="bg-slate-900 p-5 rounded-2xl text-white flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center text-emerald-400 text-xl">
                                    <i class="fa-solid fa-gift"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase text-emerald-400 tracking-widest">Circular
                                        Bonus</p>
                                    <p class="text-sm font-bold">Anda akan menerima +150 Fixora Points</p>
                                </div>
                            </div>
                            <button type="button" onclick="switchDonTab('scan')"
                                class="w-full py-4 bg-emerald-600 text-white rounded-2xl text-xs font-bold shadow-lg">Generate
                                Barcode</button>
                        </div>

                        <div id="don-panel-scan" class="don-panel hidden text-center animate-fade-in">
                            <div class="bg-slate-900 p-8 rounded-[2.5rem] mb-6 relative overflow-hidden">
                                <div
                                    class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-emerald-500 to-teal-400">
                                </div>
                                <p class="text-[10px] text-emerald-400 font-bold mb-6 tracking-[0.3em] uppercase">E-Waste
                                    Clearance ID</p>
                                <div class="bg-white p-5 rounded-3xl inline-block mb-6 shadow-2xl">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=FIXORA-DONATE"
                                        alt="QR" class="w-36 h-36">
                                </div>
                                <p id="bc-display" class="font-mono text-white text-sm tracking-[0.4em] font-bold">
                                    FXR-2026-XXXX</p>
                            </div>
                            <button type="button" onclick="simulateScan()" id="sim-btn"
                                class="w-full py-4 border-2 border-emerald-500 text-emerald-600 rounded-2xl text-xs font-bold hover:bg-emerald-50 transition-all">Selesaikan
                                Donasi Sekarang</button>

                            <div id="pts-card"
                                class="hidden mt-6 animate-fade-in bg-white border-2 border-emerald-100 p-6 rounded-3xl text-left shadow-xl">
                                <div class="flex items-center gap-4 mb-4">
                                    <div
                                        class="w-12 h-12 rounded-2xl bg-emerald-500 flex items-center justify-center text-white text-xl shadow-lg">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div>
                                        <h5 class="text-sm font-black text-slate-800 uppercase tracking-tight">Mission
                                            Accomplished!</h5>
                                        <p class="text-[10px] text-slate-500 font-bold uppercase">Reward: Circular Champion
                                        </p>
                                    </div>
                                </div>
                                <div class="text-4xl font-black text-emerald-600 mb-3">+150 <span
                                        class="text-sm font-bold text-slate-400">Pts</span></div>
                                <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden mb-2">
                                    <div class="bg-emerald-500 h-full w-[70%] transition-all duration-1000"></div>
                                </div>
                                <p class="text-[9px] font-bold text-slate-400 uppercase">350 / 500 Pts to Voucher</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-8">
                        <button type="button" onclick="location.reload()"
                            class="text-slate-400 text-[12px] font-bold  hover:text-emerald-600 hover:underline transition-all">
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
            'Computing Devices': ['Laptop', 'Desktop PC', 'Monitor'],
            'Mobile Devices': ['Smartphone', 'Tablet', 'Smartwatch'],
            'Home Appliances': ['Rice Cooker', 'Blender', 'Microwave'],
            'Entertainment Electronics': ['Television', 'Speaker', 'Headphones'],
            'Office Equipment': ['Printer', 'Scanner', 'Projector'],
            'Accessories & Components': ['Charger', 'Battery', 'SSD']
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
            document.getElementById(`step-${currentStep}`).classList.add('hidden');
            currentStep = step;
            document.getElementById(`step-${currentStep}`).classList.remove('hidden');

            for (let i = 1; i <= 4; i++) {
                const el = document.getElementById(`si-${i}`);
                const numEl = el.querySelector('.step-num');

                if (i < currentStep) {
                    // Selesai (Centang Hijau)
                    el.className =
                        "step-item flex-1 py-4 flex flex-col items-center gap-1 border-b-2 border-emerald-500 text-emerald-600";
                    numEl.className =
                        "step-num w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold bg-emerald-500 text-white";
                    numEl.innerHTML = '<i class="fa-solid fa-check"></i>';
                } else if (i === currentStep) {
                    // Aktif
                    el.className =
                        "step-item flex-1 py-4 flex flex-col items-center gap-1 border-b-2 border-emerald-500 text-emerald-600 bg-emerald-50/50";
                    numEl.className =
                        "step-num w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold bg-emerald-500 text-white";
                    numEl.innerHTML = i;
                } else {
                    // Belum Lewat
                    el.className =
                        "step-item flex-1 py-4 flex flex-col items-center gap-1 border-b-2 border-transparent text-slate-400";
                    numEl.className =
                        "step-num w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold bg-slate-200 text-slate-500";
                    numEl.innerHTML = i;
                }
            }
        }

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = () => {
                document.getElementById('photo-preview').src = reader.result;
                document.getElementById('photo-preview').classList.remove('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        // DONATION LOGIC
        function switchDonTab(tab) {
            document.querySelectorAll('.don-panel').forEach(p => p.classList.add('hidden'));
            document.getElementById(`don-panel-${tab}`).classList.remove('hidden');
            document.querySelectorAll('.don-tab-btn').forEach(b => b.classList.remove('active', 'bg-white',
                'text-emerald-600', 'shadow-sm'));
            document.getElementById(`tab-btn-${tab}`).classList.add('active', 'bg-white', 'text-emerald-600', 'shadow-sm');
        }

        function selectHub(el, name) {
            document.querySelectorAll('.hub-card').forEach(c => {
                c.classList.remove('border-emerald-500', 'bg-emerald-50');
                c.classList.add('border-slate-100');
                c.querySelector('.fa-circle-check').className = "fa-solid fa-circle-check text-slate-200";
            });
            el.classList.remove('border-slate-100');
            el.classList.add('border-emerald-500', 'bg-emerald-50');
            el.querySelector('.fa-circle-check').className = "fa-solid fa-circle-check text-emerald-500";
        }

        function filterHubs() {
            const input = document.getElementById('hub-search').value.toLowerCase();
            document.querySelectorAll('.hub-card').forEach(card => {
                const name = card.querySelector('.hub-name').innerText.toLowerCase();
                card.style.display = name.includes(input) ? "" : "none";
            });
        }

        function selectMethod(el, name) {
            document.querySelectorAll('.method-card').forEach(card => {
                card.classList.remove('border-emerald-500', 'bg-emerald-50');
                card.classList.add('border-slate-100');
                card.querySelector('.fa-solid').parentElement.classList.replace('text-emerald-600',
                    'text-slate-400');
            });
            el.classList.remove('border-slate-100');
            el.classList.add('border-emerald-500', 'bg-emerald-50');
            el.querySelector('.fa-solid').parentElement.classList.replace('text-slate-400', 'text-emerald-600');
        }

        function simulateScan() {
            const btn = document.getElementById('sim-btn');
            btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin mr-2"></i> Mengonfirmasi...';
            setTimeout(() => {
                btn.classList.add('hidden');
                document.getElementById('pts-card').classList.remove('hidden');
            }, 1800);
        }

        document.getElementById('diagForm').addEventListener('submit', function(e) {
            e.preventDefault();
            document.getElementById('step-4').classList.add('hidden');
            document.getElementById('step-bar').classList.add('hidden');
            document.getElementById('loading').classList.remove('hidden');

            fetch("{{ route('diagnosis.analyze') }}", {
                    method: "POST",
                    body: new FormData(this),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    setTimeout(() => {
                        document.getElementById('loading').classList.add('hidden');
                        document.getElementById('result').classList.remove('hidden');

                        document.getElementById('res-dev').innerText = data.device_name;
                        document.getElementById('res-id').innerText = data.diag_id;
                        document.getElementById('bc-display').innerText = data.diag_id;

                        document.getElementById('cost-val').innerText = data.cost_saved || (data
                            .impact && data.impact.save_pct) || '65%';
                        document.getElementById('kg-val').innerText = data.kg_saved || (data.impact &&
                            data.impact.waste_prevented) || '2.4kg';
                        document.getElementById('co2-val').innerText = data.emission_saved || (data
                            .impact && data.impact.co2_reduced) || '1.8kg';

                        if (data.is_repairable) {
                            document.getElementById('repair-area').classList.remove('hidden');
                            document.getElementById('donation-area').classList.add('hidden');
                            document.getElementById('res-price').innerText = data.repair_price ||
                                'Rp 150.000';
                            document.getElementById('res-duration').innerText = data.repair_duration ||
                                '2 Hari';
                            document.getElementById('res-status-badge').innerText = "Layak Repair";
                            document.getElementById('res-status-badge').className =
                                "px-4 py-2 rounded-full text-[10px] font-black uppercase bg-emerald-50 text-emerald-600 border border-emerald-200";
                            document.getElementById('action-btn-repair').onclick = () => {
                                window.location.href =
                                    `{{ route('booking.index') }}?diag_id=${data.diag_id}&device_name=${encodeURIComponent(data.device_name)}`;
                            };
                        } else {
                            document.getElementById('repair-area').classList.add('hidden');
                            document.getElementById('donation-area').classList.remove('hidden');
                            switchDonTab('hub');
                            document.getElementById('res-status-badge').innerText = "Disarankan Donasi";
                            document.getElementById('res-status-badge').className =
                                "px-4 py-2 rounded-full text-[10px] font-black uppercase bg-amber-50 text-amber-600 border border-amber-200";
                        }
                    }, 1500);
                })
                .catch(err => {
                    console.error(err);
                    alert('Terjadi kesalahan analisa.');
                    location.reload();
                });
        });
    </script>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.5s ease forwards;
        }

        .don-tab-btn.active {
            background-color: white;
            color: #059669;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        #hub-list-container::-webkit-scrollbar {
            width: 4px;
        }

        #hub-list-container::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
    </style>
@endsection
