<footer class="bg-gradient-to-br from-emerald-900 via-green-900 to-emerald-800 text-emerald-100">

    <div class="h-[1px] bg-gradient-to-r from-transparent via-emerald-500 to-transparent opacity-40"></div>

    <div class="max-w-6xl mx-auto px-[6%] py-12 grid grid-cols-2 md:grid-cols-3 gap-y-8 md:gap-y-0 md:gap-x-12">

        <div class="col-span-2 md:col-span-1 md:pr-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-green-500 flex items-center justify-center text-white shadow-md">
                    <i class="fa-solid fa-rotate"></i>
                </div>
                <span class="text-xl font-extrabold text-white">Fixora</span>
            </div>

            <p class="text-sm text-emerald-200 leading-relaxed">
                Platform inovatif untuk membantu diagnosis kerusakan elektronik dan mendukung ekonomi sirkular melalui perbaikan dan donasi perangkat.
            </p>
        </div>

        <div class="md:pl-4 border-t border-emerald-800 pt-4 md:border-none md:pt-0">
            <h3 class="text-white font-semibold mb-3 text-sm md:text-base">Navigasi</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="footer-link">Tentang Kami</a></li>
                <li><a href="{{ route('diagnosis.index') }}" class="footer-link">Diagnosis</a></li>
                <li><a href="{{ route('fixora-hub.index') }}" class="footer-link">Fixora Hub</a></li>
                <li><a href="{{ route('marketplace.index') }}" class="footer-link">Teknisi</a></li>
            </ul>
        </div>

        <div class="md:pl-2 border-t border-emerald-800 pt-4 md:border-none md:pt-0">
            <h3 class="text-white font-semibold mb-3 text-sm md:text-base">Kontak</h3>

            <div class="space-y-3 text-sm text-emerald-200">
                <p class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope"></i> fixora@email.com
                </p>
                <p class="flex items-center gap-2">
                    <i class="fa-solid fa-phone"></i> +62 812-3456-7890
                </p>
                <p class="flex items-center gap-2">
                    <i class="fa-solid fa-location-dot"></i> Indonesia
                </p>
            </div>

            <div class="flex gap-3 mt-4 text-lg">
                <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>

    </div>

    <div class="border-t border-emerald-700 text-center text-sm py-4 text-emerald-300">
        © 2026 Fixora. All rights reserved.
    </div>

</footer>

<style>
    .footer-link {
        color: #a7f3d0;
        transition: 0.2s;
    }

    .footer-link:hover {
        color: #ffffff;
        padding-left: 4px;
    }

    .social-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: rgba(255,255,255,0.08);
        transition: 0.2s;
    }

    .social-icon:hover {
        background: #10b981;
        color: white;
        transform: translateY(-2px);
    }
</style>