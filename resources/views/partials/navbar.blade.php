<nav
    class="fixed top-0 left-0 right-0 z-[200] bg-white/70 backdrop-blur-xl border-b border-emerald-100 shadow-[0_4px_20px_rgba(0,0,0,0.04)]">
    <div class="flex items-center justify-between px-[6%] h-[70px]">

        <a href="{{ route('home') }}" class="flex items-center gap-3 font-['Syne'] font-extrabold text-xl">
            <div
                class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white shadow-md">
                <i class="fa-solid fa-rotate"></i>
            </div>
            <span class="text-emerald-600 tracking-tight">Fixora</span>
        </a>

        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ route('diagnosis.index') }}" class="nav-link {{ request()->routeIs('diagnosis.*') ? 'active' : '' }}">Diagnosis</a>
            <a href="{{ route('fixora-hub.index') }}" class="nav-link {{ request()->routeIs('fixora-hub.*') ? 'active' : '' }}">Fixora Hub</a>
            <a href="{{ route('marketplace.index') }}" class="nav-link {{ request()->routeIs('marketplace.*') ? 'active' : '' }}">Marketplace</a>
        </div>

        <div class="hidden md:flex items-center">
            @guest
                <a href="{{ route('login') }}"
                    class="bg-gradient-to-r from-emerald-500 to-green-600 text-white px-6 py-2.5 rounded-full font-semibold text-sm shadow-lg shadow-emerald-500/20 hover:shadow-xl hover:scale-[0.97] transition-all flex items-center gap-2 cursor-pointer">
                    Masuk / Daftar <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            @endguest

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="border border-red-200 text-red-600 hover:bg-red-50 px-6 py-2.5 rounded-full font-semibold text-sm transition-all flex items-center gap-2 cursor-pointer">
                        Keluar <i class="fa-solid fa-right-from-bracket text-xs"></i>
                    </button>
                </form>
            @endauth
        </div>

        <button onclick="toggleMenu()"
            class="md:hidden text-2xl text-emerald-600 transition transition-all cursor-pointer">
            <i id="hamburgerIcon" class="fa-solid fa-bars"></i>
        </button>

    </div>

    <div id="mobileMenu"
        class="hidden md:hidden px-[6%] pb-4 transition-all duration-300 origin-top scale-y-95 opacity-0">

        <div
            class="flex flex-col gap-4 mt-3 bg-white/80 backdrop-blur-lg p-4 rounded-2xl shadow-lg border border-emerald-100">

            <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('home') ? 'active' : '' }}">Tentang Kami</a>
            <a href="{{ route('diagnosis.index') }}" class="mobile-link {{ request()->routeIs('diagnosis.*') ? 'active' : '' }}">Diagnosis</a>
            <a href="{{ route('fixora-hub.index') }}" class="mobile-link {{ request()->routeIs('fixora-hub.*') ? 'active' : '' }}">Fixora Hub</a>
            <a href="{{ route('marketplace.index') }}" class="mobile-link {{ request()->routeIs('marketplace.*') ? 'active' : '' }}">Marketplace</a>
            
            @guest
                <a href="{{ route('login') }}"
                    class="mt-2 bg-gradient-to-r from-emerald-500 to-green-600 text-white px-4 py-2.5 rounded-full font-semibold flex items-center justify-center gap-2 shadow-md cursor-pointer">
                    Masuk / Daftar <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            @endguest

            @auth
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit"
                        class="w-full border border-red-200 text-red-600 hover:bg-red-50 px-4 py-2.5 rounded-full font-semibold flex items-center justify-center gap-2 shadow-sm transition-all cursor-pointer">
                        Keluar <i class="fa-solid fa-right-from-bracket text-xs"></i>
                    </button>
                </form>
            @endauth

        </div>
    </div>
</nav>

<style>
    .nav-link {
        position: relative;
        font-size: 0.9rem;
        font-weight: 500;
        color: #475569;
        transition: 0.2s;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #10b981;
        transition: 0.3s;
        border-radius: 10px;
    }

    /* Hover effect */
    .nav-link:hover {
        color: #059669;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    /* Active State Desktop */
    .nav-link.active {
        color: #059669;
        font-weight: 600; /* Sedikit lebih tebal untuk penekanan */
    }

    .nav-link.active::after {
        width: 100%; /* Garis bawah permanen jika sedang aktif */
    }

    .mobile-link {
        padding: 8px 10px;
        border-radius: 10px;
        transition: 0.2s;
        color: #475569;
        font-weight: 500;
    }

    /* Hover effect */
    .mobile-link:hover {
        background: #ecfdf5;
        color: #059669;
    }

    /* Active State Mobile */
    .mobile-link.active {
        background: #d1fae5; /* Emerald 100 */
        color: #047857; /* Emerald 700 */
        font-weight: 600;
    }
</style>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        const icon = document.getElementById('hamburgerIcon');

        menu.classList.toggle('hidden');

        setTimeout(() => {
            menu.classList.toggle('scale-y-95');
            menu.classList.toggle('opacity-0');
        }, 10);

        if (icon.classList.contains('fa-bars')) {
            icon.classList.replace('fa-bars', 'fa-xmark');
        } else {
            icon.classList.replace('fa-xmark', 'fa-bars');
        }
    }

    document.querySelectorAll('#mobileMenu a, #mobileMenu button').forEach(item => {
        item.addEventListener('click', () => {
            const menu = document.getElementById('mobileMenu');
            const icon = document.getElementById('hamburgerIcon');

            menu.classList.add('hidden', 'scale-y-95', 'opacity-0');
            icon.classList.replace('fa-xmark', 'fa-bars');
        });
    });
</script>