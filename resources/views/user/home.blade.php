@extends('base.app')

@section('content')
    <div class="bg-[#f0f9f6] min-h-screen pt-20 font-sans text-slate-800 overflow-x-hidden">

        <section class="relative py-12 md:py-20 px-8 md:px-12 overflow-hidden min-h-screen flex items-center justify-center">
            <div
                class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-gradient-to-b from-emerald-100/40 to-transparent rounded-full blur-3xl -z-10">
            </div>

            <div class="max-w-6xl mx-auto text-center relative z-10 -mt-10 md:-mt-16">
                <div class="inline-flex items-center gap-2 bg-emerald-50 border border-emerald-100 px-4 py-2 rounded-full mb-6 md:mb-8 shadow-sm"
                    data-aos="fade-down">
                    <span class="relative flex h-3 w-3">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                    </span>
                    <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest text-emerald-700">
                        From Waste to Worth
                    </span>
                </div>

                <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold tracking-tight leading-tight mb-6 md:mb-8 font-inter text-slate-900"
                    data-aos="fade-up">
                    Transforming <span
                        class="bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">E-Waste</span>
                    <br class="hidden md:block"> Into Value
                </h1>

                <p class="max-w-2xl mx-auto text-base md:text-xl text-slate-600 font-light leading-relaxed mb-10 md:px-0"
                    data-aos="fade-up" data-aos-delay="100">
                    Fixora menghadirkan solusi cerdas untuk mengurangi e-waste dan menghidupkan kembali nilai dari setiap
                    barang elektronik Anda.
                </p>

                <div class="flex justify-center px-4 md:px-0" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('diagnosis.index') }}"
                        class="bg-emerald-600 text-white px-8 py-4 md:px-12 md:py-5 rounded-full font-bold text-lg shadow-xl shadow-emerald-200 hover:bg-emerald-700 hover:-translate-y-1 transition-all w-full sm:w-auto">
                        Mulai Diagnosis AI
                    </a>
                </div>
            </div>
        </section>
        <section class="py-16 md:py-24 bg-slate-900 text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 pointer-events-none text-emerald-500">
                <i class="fa-solid fa-microchip text-[15rem] md:text-[20rem] absolute -left-20 -bottom-20 rotate-12"></i>
            </div>

            <div class="max-w-6xl mx-auto px-8 md:px-6 relative z-10">
                <div class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">

                    <div data-aos="fade-right">
                        <h2 class="text-2xl md:text-4xl font-bold font-inter mb-6 leading-tight">
                            Krisis E-Waste di <br>
                            <span class="text-emerald-400 text-balance">Indonesia</span>
                        </h2>
                        <p class="text-slate-400 text-base md:text-lg leading-relaxed mb-8">
                            Produksi limbah elektronik nasional terus meningkat sebesar <span
                                class="text-white font-bold">14,91% per tahun</span>. Tanpa pengelolaan formal, zat beracun
                            seperti merkuri dan kadmium akan meresap ke sumber air kita dan mengancam kesehatan masyarakat.
                        </p>
                        <div class="flex items-center gap-4 text-slate-300">
                            <div
                                class="w-12 h-12 bg-emerald-500/10 rounded-full flex items-center justify-center text-emerald-400">
                                <i class="fa-solid fa-quote-left"></i>
                            </div>
                            <p class="text-sm italic">"Fixora hadir menghentikan budaya 'buang-ganti' melalui solusi
                                perbaikan cerdas."</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-5" data-aos="fade-left">

                        <div
                            class="bg-slate-800/50 backdrop-blur-sm p-6 rounded-[2rem] border border-white/5 group hover:border-emerald-500/50 transition-all">
                            <div class="flex justify-between items-start mb-2">
                                <span
                                    class="text-[10px] font-bold text-emerald-400 bg-emerald-400/10 px-3 py-1 rounded-full uppercase tracking-widest">Produksi
                                    Nasional</span>
                                <div class="text-2xl opacity-50 group-hover:scale-110 transition-transform">🚛</div>
                            </div>
                            <h4 class="text-2xl md:text-3xl font-black font-inter text-white tracking-tighter">> 2.000.000
                                Ton</h4>
                            <p class="text-slate-400 text-xs mt-1 italic">Sumber: KLHK</p>
                        </div>

                        <div
                            class="bg-slate-800/50 backdrop-blur-sm p-6 rounded-[2rem] border border-white/5 group hover:border-emerald-500/50 transition-all">
                            <div class="flex justify-between items-start mb-2">
                                <span
                                    class="text-[10px] font-bold text-emerald-400 bg-emerald-400/10 px-3 py-1 rounded-full uppercase tracking-widest">Peringkat
                                    di Asia</span>
                                <div class="text-2xl opacity-50 group-hover:scale-110 transition-transform">🌏</div>
                            </div>
                            <h4 class="text-2xl md:text-3xl font-black font-inter text-white tracking-tighter">Posisi Ke-4
                                Terbesar</h4>
                            <p class="text-slate-400 text-xs mt-1 italic">Sumber: Statista / UNITAR, 2024</p>
                        </div>

                        <div
                            class="bg-slate-800/50 backdrop-blur-sm p-6 rounded-[2rem] border border-white/5 group hover:border-red-500/50 transition-all">
                            <div class="flex justify-between items-start mb-2">
                                <span
                                    class="text-[10px] font-bold text-red-400 bg-red-400/10 px-3 py-1 rounded-full uppercase tracking-widest">Tingkat
                                    Pengelolaan</span>
                                <div class="text-2xl opacity-50 group-hover:scale-110 transition-transform">⚠️</div>
                            </div>
                            <h4 class="text-2xl md:text-3xl font-black font-inter text-white tracking-tighter">Hanya ~17,4%
                            </h4>
                            <p class="text-slate-400 text-xs mt-1 italic text-balance">Sebagian besar limbah masih berakhir
                                di TPA atau dibakar.</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 px-6">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10">
                <div class="group bg-white p-10 md:p-12 rounded-[3rem] shadow-xl shadow-emerald-900/5 border border-emerald-50 transition-all duration-500 hover:-translate-y-3"
                    data-aos="fade-right">
                    <div
                        class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center text-3xl text-white mb-8 shadow-lg shadow-emerald-200 group-hover:rotate-6 transition-transform">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold mb-6 font-syne text-slate-900">Visi Kami</h3>
                    <p class="text-slate-600 text-base md:text-lg leading-relaxed">
                        Menjadi pionir ekonomi sirkular digital di Indonesia, di mana tidak ada lagi perangkat elektronik
                        yang berakhir sia-sia di tempat pembuangan sampah.
                    </p>
                </div>

                <div class="group bg-emerald-600 p-10 md:p-12 rounded-[3rem] shadow-xl shadow-emerald-900/20 text-white transition-all duration-500 hover:-translate-y-3"
                    data-aos="fade-left">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-3xl text-emerald-600 mb-8 shadow-lg group-hover:-rotate-6 transition-transform">
                        <i class="fa-solid fa-microchip"></i>
                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold mb-6 font-syne">Misi Kami</h3>
                    <p class="text-emerald-50 text-base md:text-lg leading-relaxed opacity-90">
                        Mengintegrasikan AI diagnosis untuk memperpanjang usia perangkat, membangun jaringan teknisi
                        tersertifikasi, dan menciptakan sistem donasi yang transparan.
                    </p>
                </div>
            </div>
        </section>

        <section class="py-24 px-6 bg-white">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold font-syne mb-4">Bagaimana <span
                            class="text-emerald-600">Fixora Bekerja</span></h2>
                    <p class="text-slate-500">Empat langkah sederhana menuju masa depan tanpa limbah elektronik.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="relative group text-center" data-aos="fade-up">
                        <div class="mb-6 flex justify-center">
                            <div
                                class="w-20 h-20 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-600 text-2xl font-bold border-2 border-dashed border-emerald-200 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                                1</div>
                        </div>
                        <h4 class="font-bold text-xl mb-2 font-syne">Input Device</h4>
                        <p class="text-slate-500 text-sm px-4">Pilih kategori, subkategori, dan deskripsikan kerusakan
                            perangkat Anda.</p>
                        <div class="hidden md:block absolute top-10 left-[70%] w-full h-[2px] bg-emerald-100"></div>
                    </div>
                    <div class="relative group text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="mb-6 flex justify-center">
                            <div
                                class="w-20 h-20 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-600 text-2xl font-bold border-2 border-dashed border-emerald-200 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                                2</div>
                        </div>
                        <h4 class="font-bold text-xl mb-2 font-syne">AI Analysis</h4>
                        <p class="text-slate-500 text-sm px-4">AI mengevaluasi tingkat kerusakan dan potensi perbaikan
                            secara instan.</p>
                        <div class="hidden md:block absolute top-10 left-[70%] w-full h-[2px] bg-emerald-100"></div>
                    </div>
                    <div class="relative group text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="mb-6 flex justify-center">
                            <div
                                class="w-20 h-20 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-600 text-2xl font-bold border-2 border-dashed border-emerald-200 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                                3</div>
                        </div>
                        <h4 class="font-bold text-xl mb-2 font-syne">Smart Decision</h4>
                        <p class="text-slate-500 text-sm px-4">Terima hasil diagnosis: Repair (perbaiki) atau Donate (donasi
                            komponen).</p>
                        <div class="hidden md:block absolute top-10 left-[70%] w-full h-[2px] bg-emerald-100"></div>
                    </div>
                    <div class="relative group text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="mb-6 flex justify-center">
                            <div
                                class="w-20 h-20 bg-emerald-50 rounded-full flex items-center justify-center text-emerald-600 text-2xl font-bold border-2 border-dashed border-emerald-200 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                                4</div>
                        </div>
                        <h4 class="font-bold text-xl mb-2 font-syne">Take Action</h4>
                        <p class="text-slate-500 text-sm px-4">Pesan teknisi atau kirim ke Fixora Hub terdekat untuk dampak
                            maksimal.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-950 py-32 px-6 relative overflow-hidden" id="impact-section">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-emerald-500/10 rounded-full blur-[100px]"></div>

            <div class="max-w-7xl mx-auto relative z-10">
                <div class="text-center mb-20" data-aos="fade-up">
                    <h2 class="text-white text-4xl md:text-5xl font-bold font-syne mb-4">Dampak <span
                            class="text-emerald-400">Kolektif</span></h2>
                    <p class="text-slate-400 text-lg">Bukti nyata aksi komunitas Fixora untuk bumi kita</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                    <div
                        class="bg-slate-900/50 p-8 rounded-[2.5rem] border border-white/5 text-center transition-transform hover:scale-105 min-h-[220px] flex flex-col justify-center items-center">
                        <div class="text-3xl md:text-4xl mb-4">♻️</div>
                        <div
                            class="text-emerald-400 text-3xl md:text-[2.5rem] font-black font-syne mb-2 leading-none px-2">
                            <span class="count-up" data-target="48320">0</span>
                        </div>
                        <div
                            class="text-slate-500 text-[10px] md:text-xs uppercase font-bold tracking-widest mt-2 whitespace-nowrap">
                            Waste Saved (Kg)</div>
                    </div>
                    <div
                        class="bg-slate-900/50 p-8 rounded-[2.5rem] border border-white/5 text-center transition-transform hover:scale-105 min-h-[220px] flex flex-col justify-center items-center">
                        <div class="text-3xl md:text-4xl mb-4">🛠️</div>
                        <div
                            class="text-emerald-400 text-3xl md:text-[2.5rem] font-black font-syne mb-2 leading-none px-2">
                            <span class="count-up" data-target="12480">0</span>
                        </div>
                        <div
                            class="text-slate-500 text-[10px] md:text-xs uppercase font-bold tracking-widest mt-2 whitespace-nowrap">
                            Items Fixed</div>
                    </div>
                    <div
                        class="bg-slate-900/50 p-8 rounded-[2.5rem] border border-white/5 text-center transition-transform hover:scale-105 min-h-[220px] flex flex-col justify-center items-center">
                        <div class="text-3xl md:text-4xl mb-4">👨‍🔧</div>
                        <div
                            class="text-emerald-400 text-3xl md:text-[2.5rem] font-black font-syne mb-2 leading-none px-2">
                            <span class="count-up" data-target="350">0</span>
                        </div>
                        <div
                            class="text-slate-500 text-[10px] md:text-xs uppercase font-bold tracking-widest mt-2 whitespace-nowrap">
                            Fixora Expert</div>
                    </div>
                    <div
                        class="bg-slate-900/50 p-8 rounded-[2.5rem] border border-white/5 text-center transition-transform hover:scale-105 min-h-[220px] flex flex-col justify-center items-center">
                        <div class="text-3xl md:text-4xl mb-4">🌟</div>
                        <div
                            class="text-emerald-400 text-3xl md:text-[2.5rem] font-black font-syne mb-2 leading-none px-2">
                            <span class="count-up" data-target="98">0</span>%
                        </div>
                        <div
                            class="text-slate-500 text-[10px] md:text-xs uppercase font-bold tracking-widest mt-2 whitespace-nowrap">
                            Success Rate</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 px-6 bg-[#f0f9f6]">
            <div class="max-w-5xl mx-auto relative group">
                <div
                    class="absolute inset-0 bg-emerald-600 rounded-[4rem] rotate-1 scale-105 opacity-10 group-hover:rotate-0 transition-transform duration-500">
                </div>
                <div
                    class="relative bg-white p-12 md:p-20 rounded-[4rem] shadow-2xl border border-emerald-100 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 font-syne">Jadilah Pahlawan <span
                            class="text-emerald-600">Sirkular</span></h2>
                    <p class="text-slate-500 text-lg mb-10 max-w-2xl mx-auto">Satu klik diagnosis Anda hari ini adalah satu
                        langkah besar menjauhkan perangkat elektronik dari lautan limbah.</p>
                    <div class="flex flex-col md:flex-row gap-4 justify-center">
                        <a href="{{ route('diagnosis.index') }}"
                            class="bg-emerald-600 text-white px-10 py-4 md:px-12 md:py-5 rounded-full font-bold text-lg shadow-xl shadow-emerald-200 hover:bg-emerald-700 hover:-translate-y-1 transition-all">
                            Mulai Diagnosis AI
                        </a>
                        <a href="#contact"
                            class="bg-white text-emerald-600 border-2 border-emerald-600 px-10 py-4 md:px-12 md:py-5 rounded-full font-bold text-lg hover:bg-emerald-50 transition-all">
                            Hubungi Tim Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
        const counters = document.querySelectorAll('.count-up');
        let hasStarted = false;

        const rollingNumbers = () => {
            if (!hasStarted) {
                counters.forEach(counter => {
                    counter.innerText = Math.floor(Math.random() * 9999);
                });
            }
        };

        let rollInterval = setInterval(rollingNumbers, 80);

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !hasStarted) {
                    hasStarted = true;
                    clearInterval(rollInterval);

                    counters.forEach(counter => {
                        const target = +counter.getAttribute('data-target');
                        const duration = 2000;
                        let startTime = null;

                        const animation = (currentTime) => {
                            if (startTime === null) startTime = currentTime;
                            const progress = currentTime - startTime;
                            const run = Math.min(progress / duration, 1);
                            const easeOut = 1 - Math.pow(1 - run, 3);
                            const currentCount = Math.floor(easeOut * target);
                            counter.innerText = currentCount.toLocaleString('id-ID');
                            if (run < 1) {
                                requestAnimationFrame(animation);
                            } else {
                                counter.innerText = target.toLocaleString('id-ID');
                            }
                        };
                        requestAnimationFrame(animation);
                    });
                }
            });
        }, {
            threshold: 0.3
        });

        observer.observe(document.querySelector('#impact-section'));
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&display=swap');

        .font-syne {
            font-family: 'Syne', sans-serif;
        }

        #impact-section .bg-slate-900\/50 {
            backdrop-filter: blur(8px);
        }
    </style>
@endsection
