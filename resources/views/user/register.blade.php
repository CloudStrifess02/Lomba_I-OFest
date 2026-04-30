<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Daftar ke Fixora</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .main-bg {
            background:
                radial-gradient(ellipse 70% 60% at 65% 25%, rgba(187,247,208,.55) 0%, transparent 70%),
                radial-gradient(ellipse 50% 70% at 15% 85%, rgba(187,247,208,.3) 0%, transparent 60%),
                #f8fdfb;
        }
        .icon-stroke { fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    </style>
</head>
<body class="min-h-screen flex flex-col main-bg relative overflow-x-hidden">

<div class="flex-1 flex flex-col justify-center items-center min-h-screen px-8 lg:px-20 py-12">
    
    {{-- Pembungkus utama menggunakan lg:items-start agar bisa diatur jarak turunnya secara manual --}}
    <div class="w-full max-w-[960px] flex flex-col lg:flex-row items-center lg:items-start justify-between gap-12 lg:gap-16 z-10">

        {{-- ═════ BAGIAN KIRI (TEKS) ═════ --}}
        {{-- PERBAIKAN: Menambahkan lg:mt-24 agar konten ini terdorong turun sejajar dengan "Nama Lengkap" --}}
        <div class="flex flex-col w-full lg:flex-1 max-w-md mt-8 lg:mt-24">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 text-[#2E7D32] font-extrabold text-lg no-underline mb-8 w-fit">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white shadow-md" style="background: linear-gradient(135deg, #4CAF50, #2E7D32);">
                    <svg class="w-5 h-5 icon-stroke" viewBox="0 0 24 24"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
                </div>
                Fixora
            </a>
            
            <h1 class="text-3xl lg:text-4xl font-extrabold leading-tight text-gray-900 mb-8">
                Gabung Fixora &amp;<br>Selamatkan <span class="text-[#2E7D32]">Gadgetmu</span>
            </h1>
            
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-[#2E7D32] icon-stroke" viewBox="0 0 24 24"><rect x="2" y="8" width="20" height="12" rx="3"/><path d="M12 2v6M8 2h8"/><circle cx="8.5" cy="14" r="1.5"/><circle cx="15.5" cy="14" r="1.5"/><path d="M9 18h6"/></svg>
                    </div>
                    <p class="font-bold text-gray-900 text-sm">AI Diagnosis Cerdas</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-[#2E7D32] icon-stroke" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                    </div>
                    <p class="font-bold text-gray-900 text-sm">Teknisi Terpercaya</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-[#2E7D32] icon-stroke" viewBox="0 0 24 24"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
                    </div>
                    <p class="font-bold text-gray-900 text-sm">Dukung Bumi Kita</p>
                </div>
            </div>
        </div>

        {{-- ═════ BAGIAN KANAN (FORM REGISTRASI) ═════ --}}
        <div class="w-full max-w-md lg:w-[440px] shrink-0 bg-white rounded-[1.5rem] p-6 lg:p-8 border border-emerald-50" style="box-shadow: 0 20px 40px rgba(0,0,0,.04), 0 1px 3px rgba(0,0,0,.02);">
            <div class="w-full">
                <h1 class="text-xl lg:text-2xl font-extrabold text-center text-gray-800 mb-2">Daftar ke <span class="text-emerald-600">Fixora</span></h1>
                <p class="text-center text-xs lg:text-sm text-gray-500 mb-6 lg:mb-8">Buat akun gratis dan mulai selamatkan gadgetmu!</p>

                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-xl text-xs sm:text-sm">{{ $errors->first() }}</div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    
                    {{-- Nama Lengkap --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="name" class="text-xs lg:text-sm font-semibold text-gray-700">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </span>
                            <input type="text" id="name" name="name" class="w-full pl-9 pr-4 py-2.5 border rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition text-sm border-gray-200" placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}" required autofocus>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="email" class="text-xs lg:text-sm font-semibold text-gray-700">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </span>
                            <input type="email" id="email" name="email" class="w-full pl-9 pr-4 py-2.5 border rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition text-sm border-gray-200" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="password" class="text-xs lg:text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </span>
                            <input type="password" id="password" name="password" class="w-full pl-9 pr-10 py-2.5 border rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition text-sm border-gray-200" placeholder="Buat password" required>
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-emerald-600" onclick="togglePassword('password', this)">
                                <svg class="w-4 h-4 icon-eye-off" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                                <svg class="w-4 h-4 icon-eye" style="display:none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.543 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                        </div>
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="password_confirmation" class="text-xs lg:text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </span>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full pl-9 pr-10 py-2.5 border rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition text-sm border-gray-200" placeholder="Ulangi password" required>
                        </div>
                    </div>

                    {{-- Syarat dan Ketentuan (Teks Biasa) --}}
                    <div class="flex items-start gap-2.5 pt-1">
                        <input type="checkbox" id="terms" name="terms" class="mt-0.5 w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500 cursor-pointer" required>
                        <label for="terms" class="text-[12px] lg:text-[13px] text-gray-600 leading-relaxed cursor-pointer">
                            Saya setuju dengan <span class="text-emerald-600 font-semibold">Syarat & Ketentuan</span> dan <span class="text-emerald-600 font-semibold">Kebijakan Privasi</span> Fixora
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 rounded-xl shadow-lg shadow-emerald-200 transition-all active:scale-95 mt-4 text-sm">Daftar Sekarang</button>
                </form>

                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-200"></div></div>
                    <div class="relative flex justify-center text-xs"><span class="px-3 bg-white text-gray-500">atau</span></div>
                </div>

                <a href="{{ url('/auth/google') }}" class="w-full flex items-center justify-center gap-2 border border-gray-200 py-2.5 rounded-xl hover:bg-gray-50 transition-all font-semibold text-gray-700 text-sm">
                    <svg viewBox="0 0 24 24" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Daftar dengan Google
                </a>

                <div class="text-center mt-6 text-xs lg:text-sm text-gray-600">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-emerald-600 font-bold hover:underline">Masuk Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Trust Bar --}}
    <div class="hidden md:flex absolute bottom-6 left-12 z-10 gap-6 flex-wrap opacity-70">
        <div class="flex items-center gap-2 text-[11px] font-semibold text-gray-700">
            <svg class="w-4 h-4 text-[#2E7D32] icon-stroke" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg> Aman &amp; Terpercaya
        </div>
        <div class="flex items-center gap-2 text-[11px] font-semibold text-gray-700">
            <svg class="w-4 h-4 text-[#2E7D32] icon-stroke" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Data Anda Terlindungi
        </div>
        <div class="flex items-center gap-2 text-[11px] font-semibold text-gray-700">
            <svg class="w-4 h-4 text-[#2E7D32] icon-stroke" viewBox="0 0 24 24"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg> Mendukung Ekonomi Sirkular
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const isText = input.type === 'text';
        input.type = isText ? 'password' : 'text';
        btn.querySelector('.icon-eye').style.display = isText ? 'none' : 'block';
        btn.querySelector('.icon-eye-off').style.display = isText ? 'block' : 'none';
    }
</script>
</body>
</html>