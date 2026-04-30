@extends('base.app')

@section('content')
    <div class="pt-24 pb-20 bg-[#F8FAFC] min-h-screen">
        <div class="max-w-[1200px] mx-auto px-[5%]">

            {{-- HERO --}}
            <div
                class="relative w-full rounded-[32px] bg-gradient-to-br from-emerald-900 via-emerald-800 to-green-900 overflow-hidden mb-12 shadow-2xl flex flex-col md:flex-row items-center justify-between p-10 md:p-14">
                <div class="relative z-10 md:w-2/3">
                    <span
                        class="inline-block py-1.5 px-4 rounded-full bg-white/10 border border-white/20 text-emerald-100 text-sm font-semibold mb-6">
                        ♻️ Fixora Hub
                    </span>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 leading-tight">
                        Pengepul Resmi <br> E-Waste
                    </h1>
                    <p class="text-emerald-100/80 text-lg max-w-xl font-light">
                        Temukan pengepul resmi terdekat untuk menukar limbah elektronikmu menjadi poin dan kontribusi
                        lingkungan.
                    </p>
                </div>
            </div>

            <div class="bg-white/80 backdrop-blur-xl p-3 rounded-full shadow border flex flex-col md:flex-row gap-3 mb-12">

                {{-- SEARCH --}}
                <div class="flex-grow relative flex items-center">
                    <div class="w-12 h-12 flex items-center justify-center text-slate-400 absolute left-2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari nama toko, alamat, atau kota..."
                        class="w-full pl-14 pr-6 py-4 bg-transparent text-slate-700 font-medium placeholder-slate-400 focus:outline-none rounded-full">
                </div>

                {{-- DIVIDER --}}
                <div class="hidden md:block w-px h-10 bg-slate-200 self-center"></div>

                {{-- FILTER KOTA --}}
                <div class="relative">
                    <select id="cityFilter"
                        class="w-full md:w-[200px] px-5 py-4 bg-transparent text-slate-700 font-medium focus:outline-none rounded-full border border-slate-200">
                        <option value="">Semua Kota</option>
                        @foreach ($kotaList as $kota)
                            <option value="{{ $kota }}">{{ $kota }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            {{-- STORE LIST --}}
            <div id="storeContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @include('user.fixora_hub.cards')
            </div>

            {{-- LOADING --}}
            <div id="loadingIndicator" class="hidden text-center py-10">
                <i class="fa-solid fa-circle-notch fa-spin text-4xl text-emerald-500"></i>
                <p class="text-slate-500 mt-3 font-medium">Mencari data...</p>
            </div>

            {{-- EMPTY --}}
            <div id="noDataMessage"
                class="{{ $toko->isEmpty() ? '' : 'hidden' }} text-center py-20 bg-white rounded-[32px] mt-8 border shadow-sm">
                <div class="text-slate-200 text-7xl mb-6">
                    <i class="fa-solid fa-magnifying-glass-location"></i>
                </div>
                <h3 class="text-2xl font-extrabold text-slate-700 mb-2">
                    Data Tidak Ditemukan
                </h3>
                <p class="text-slate-500 max-w-md mx-auto">
                    Tidak ada pengepul yang sesuai dengan pencarian atau filter Anda.
                </p>
                <button onclick="resetFilters()"
                    class="mt-6 px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-full">
                    Reset Filter
                </button>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const searchInput = document.getElementById('searchInput');
            const cityFilter = document.getElementById('cityFilter');
            const storeContainer = document.getElementById('storeContainer');
            const noDataMessage = document.getElementById('noDataMessage');
            const loadingIndicator = document.getElementById('loadingIndicator');

            function fetchStores() {
                const search = searchInput.value;
                const kota = cityFilter.value;

                storeContainer.style.opacity = '0.5';
                loadingIndicator.classList.remove('hidden');
                noDataMessage.classList.add('hidden');

                fetch(`/fixora-hub?search=${encodeURIComponent(search)}&kota=${encodeURIComponent(kota)}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        storeContainer.innerHTML = data.html;
                        storeContainer.style.opacity = '1';
                        loadingIndicator.classList.add('hidden');

                        if (data.count === 0) {
                            storeContainer.classList.add('hidden');
                            noDataMessage.classList.remove('hidden');
                        } else {
                            storeContainer.classList.remove('hidden');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        storeContainer.style.opacity = '1';
                        loadingIndicator.classList.add('hidden');
                    });
            }

            // Debounce search
            let timeout = null;
            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(fetchStores, 500);
            });

            // Filter kota
            cityFilter.addEventListener('change', fetchStores);

            // Reset
            window.resetFilters = function() {
                searchInput.value = '';
                cityFilter.value = '';
                fetchStores();
            }

        });
    </script>
@endsection
