<nav class="fixed top-0 left-0 right-0 z-[200] bg-white/70 backdrop-blur-xl border-b border-emerald-100 shadow-[0_4px_20px_rgba(0,0,0,0.04)]">
    <div class="flex items-center justify-between px-[6%] h-[70px]">

        <!-- Logo -->
        <a href="#" class="flex items-center gap-3 font-['Syne'] font-extrabold text-xl">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center text-white shadow-md">
                <i class="fa-solid fa-rotate"></i>
            </div>
            <span class="text-emerald-600 tracking-tight">Fixora</span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}" class="nav-link">Tentang Kami</a>
            <a href="{{ route('diagnosis.index') }}" class="nav-link">Diagnosis</a>
            <a href="#hubs" class="nav-link">Fixora Hub</a>
            <a href="#technicians" class="nav-link">Teknisi</a>
        </div>

        <div class="hidden md:flex items-center">
            <button
                class="bg-gradient-to-r from-emerald-500 to-green-600 text-white px-6 py-2.5 rounded-full font-semibold text-sm shadow-lg shadow-emerald-500/20 hover:shadow-xl hover:scale-[0.97] transition-all flex items-center gap-2 cursor-pointer">
                Masuk / Daftar <i class="fa-solid fa-arrow-right text-xs"></i>
            </button>
        </div>

        <!-- Hamburger -->
        <button onclick="toggleMenu()" class="md:hidden text-2xl text-emerald-600 transition transition-all cursor-pointer">
            <i id="hamburgerIcon" class="fa-solid fa-bars"></i>
        </button>

    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="hidden md:hidden px-[6%] pb-4 transition-all duration-300 origin-top scale-y-95 opacity-0">

        <div class="flex flex-col gap-4 mt-3 bg-white/80 backdrop-blur-lg p-4 rounded-2xl shadow-lg border border-emerald-100">

            <a href="{{ route('home') }}" class="mobile-link">Tentang Kami</a>
            <a href="{{ route('diagnosis.index') }}" class="mobile-link">Diagnosis</a>
            <a href="#hubs" class="mobile-link">Fixora Hub</a>
            <a href="#technicians" class="mobile-link">Teknisi</a>

            <button
                class="mt-2 bg-gradient-to-r from-emerald-500 to-green-600 text-white px-4 py-2.5 rounded-full font-semibold flex items-center justify-center gap-2 shadow-md cursor-pointer">
                Masuk / Daftar <i class="fa-solid fa-arrow-right text-xs"></i>
            </button>

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

    .nav-link:hover {
        color: #059669;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .mobile-link {
        padding: 8px 10px;
        border-radius: 10px;
        transition: 0.2s;
        color: #475569;
    }

    .mobile-link:hover {
        background: #ecfdf5;
        color: #059669;
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