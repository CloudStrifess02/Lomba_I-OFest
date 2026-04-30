<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Fixora') – Fixora</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        green: {
                            50:  '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        fixora: {
                            DEFAULT: '#2E7D32',
                            mid:     '#388E3C',
                            light:   '#4CAF50',
                            pale:    '#E8F5E9',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom styles that Tailwind CDN can't generate inline */
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Input focus ring */
        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76,175,80,.15);
            outline: none;
        }
        .form-control.is-invalid { border-color: #EF5350; }

        /* Password strength bars */
        .strength-bar span {
            flex: 1; height: 3px; border-radius: 99px;
            background: #E0E0E0; transition: background .3s;
        }

        /* Latar Belakang Gradien Utama */
        .main-bg {
            background:
                radial-gradient(ellipse 70% 60% at 65% 25%, rgba(187,247,208,.55) 0%, transparent 70%),
                radial-gradient(ellipse 50% 70% at 15% 85%, rgba(187,247,208,.3) 0%, transparent 60%),
                #f8fdfb;
        }

        /* Eye button */
        .eye-btn svg { width: 17px; height: 17px; fill: none; stroke: currentColor;
            stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

        /* Nav/trust SVG icons */
        .icon-stroke { fill: none; stroke: currentColor;
            stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    </style>
</head>

{{-- REVISI: Latar belakang gradien diletakkan di body agar full screen --}}
<body class="min-h-screen flex flex-col main-bg relative overflow-x-hidden">

<div class="flex-1 flex flex-col justify-center items-center min-h-screen p-6 py-16">

    {{-- ══════════════════════════════════════
         MAIN CONTAINER (Bungkus Tengah)
    ══════════════════════════════════════ --}}
    <div class="w-full max-w-[1100px] flex flex-col lg:flex-row items-center justify-between gap-12 lg:gap-20 z-10">

        {{-- ══════════════════════════════════════
             KIRI — Teks & Fitur
        ══════════════════════════════════════ --}}
        <div class="flex flex-col flex-1 w-full max-w-lg lg:pr-10">

            {{-- Logo --}}
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 text-fixora font-extrabold text-xl no-underline mb-12 w-fit">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center text-white shadow-md"
                     style="background: linear-gradient(135deg, #4CAF50, #2E7D32);">
                    <svg class="w-5 h-5 icon-stroke" viewBox="0 0 24 24">
                        <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/>
                        <path d="M21 3v5h-5"/>
                        <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/>
                        <path d="M8 16H3v5"/>
                    </svg>
                </div>
                Fixora
            </a>

            {{-- Hero heading --}}
            <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight text-gray-900 mb-8">
                Gabung Fixora &amp;<br>
                Selamatkan <span class="text-fixora">Gadgetmu</span>
            </h1>

            {{-- Feature list --}}
            <div class="flex flex-col gap-5">
                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-fixora icon-stroke" viewBox="0 0 24 24">
                            <rect x="2" y="8" width="20" height="12" rx="3"/>
                            <path d="M12 2v6M8 2h8"/>
                            <circle cx="8.5" cy="14" r="1.5"/>
                            <circle cx="15.5" cy="14" r="1.5"/>
                            <path d="M9 18h6"/>
                        </svg>
                    </div>
                    <p class="font-bold text-gray-900 text-sm">AI Diagnosis Cerdas</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-fixora icon-stroke" viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <polyline points="9 12 11 14 15 10"/>
                        </svg>
                    </div>
                    <p class="font-bold text-gray-900 text-sm">Teknisi Terpercaya</p>
                </div>

                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-fixora icon-stroke" viewBox="0 0 24 24">
                            <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/>
                            <path d="M21 3v5h-5"/>
                            <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/>
                            <path d="M8 16H3v5"/>
                        </svg>
                    </div>
                    <p class="font-bold text-gray-900 text-sm">Dukung Bumi Kita</p>
                </div>
            </div>

        </div>

        {{-- ══════════════════════════════════════
             KANAN — Form Area (Menjadi Card Melayang)
        ══════════════════════════════════════ --}}
        <div class="w-full lg:w-[460px] shrink-0 bg-white rounded-[2rem] p-8 lg:p-10 border border-emerald-50"
             style="box-shadow: 0 20px 40px rgba(0,0,0,.04), 0 1px 3px rgba(0,0,0,.02);">
            
            <div class="w-full">
                {{-- Form dari login.blade akan masuk ke sini --}}
                @yield('form')
            </div>

        </div>

    </div>

    {{-- Trust bar (Dipindah ke bawah pojok kiri) --}}
    <div class="absolute bottom-6 left-6 lg:left-12 z-10 flex gap-6 flex-wrap opacity-70">
        <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
            <svg class="w-4 h-4 text-fixora icon-stroke" viewBox="0 0 24 24">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            </svg>
            Aman &amp; Terpercaya
        </div>
        <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
            <svg class="w-4 h-4 text-fixora icon-stroke" viewBox="0 0 24 24">
                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            Data Anda Terlindungi
        </div>
        <div class="flex items-center gap-2 text-xs font-semibold text-gray-700">
            <svg class="w-4 h-4 text-fixora icon-stroke" viewBox="0 0 24 24">
                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/>
                <path d="M21 3v5h-5"/>
                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/>
                <path d="M8 16H3v5"/>
            </svg>
            Mendukung Ekonomi Sirkular
        </div>
    </div>

</div>

{{-- ══════════════════════════════════════
     GLOBAL CSS HELPERS (used by form partials)
══════════════════════════════════════ --}}
<style>
    /* Card (menyesuaikan agar tidak ganda kotaknya) */
    .card       { width: 100%; } /* Dihapus batas max-width agar mengikuti kotak putih luar */
    .card-title { font-size: 1.5rem; font-weight: 800; text-align: center; color: #1a1a1a; margin-bottom: 4px; }
    .card-title .accent { color: #2E7D32; }
    .card-sub   { font-size: 13.5px; text-align: center; color: #757575; margin-bottom: 28px; }

    /* Sisanya biarkan sama seperti sebelumnya */
    .alert          { padding: 12px 16px; border-radius: 10px; font-size: 13.5px; font-weight: 500; margin-bottom: 16px; }
    .alert-error    { background: #FFEBEE; color: #C62828; border: 1px solid #EF9A9A; }
    .alert-success  { background: #E8F5E9; color: #2E7D32; border: 1px solid #A5D6A7; }
    .form-group     { margin-bottom: 16px; }
    .form-group label { display: block; font-size: 13.5px; font-weight: 600; color: #1a1a1a; margin-bottom: 7px; }
    .input-wrap     { position: relative; display: flex; align-items: center; }
    .input-icon     { position: absolute; left: 14px; width: 16px; height: 16px; color: #BDBDBD;
                      pointer-events: none; fill: none; stroke: currentColor;
                      stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
    .form-control   { width: 100%; padding: 12px 14px 12px 42px; border: 1.5px solid #E0E0E0;
                      border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif;
                      font-size: 14px; color: #1a1a1a; background: #fff;
                      transition: border-color .2s, box-shadow .2s; appearance: none; }
    .form-control::placeholder { color: #C0C0C0; }
    .invalid-feedback { font-size: 12px; color: #EF5350; margin-top: 5px; display: block; }
    .eye-btn        { position: absolute; right: 12px; background: none; border: none;
                      cursor: pointer; color: #BDBDBD; display: flex; align-items: center;
                      padding: 2px; transition: color .2s; }
    .eye-btn:hover  { color: #444; }
    .forgot-wrap    { text-align: right; margin-top: 8px; }
    .forgot-wrap a  { font-size: 13px; font-weight: 600; color: #2E7D32; text-decoration: none; }
    .forgot-wrap a:hover { text-decoration: underline; }
    .btn-primary    { width: 100%; padding: 14px; background: #2E7D32; color: #fff;
                      border: none; border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif;
                      font-size: 15px; font-weight: 700; cursor: pointer;
                      transition: background .2s, transform .1s; }
    .btn-primary:hover  { background: #388E3C; }
    .btn-primary:active { transform: scale(.99); }
    .divider        { display: flex; align-items: center; gap: 12px;
                      margin: 20px 0; font-size: 13px; color: #757575; }
    .divider::before, .divider::after { content: ''; flex: 1; height: 1px; background: #E0E0E0; }
    .btn-google     { width: 100%; padding: 12px; background: #fff; border: 1.5px solid #E0E0E0;
                      border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif;
                      font-size: 14.5px; font-weight: 600; color: #1a1a1a; cursor: pointer;
                      display: flex; align-items: center; justify-content: center; gap: 10px;
                      transition: background .2s, border-color .2s; text-decoration: none; margin-bottom: 10px; }
    .btn-google:hover { background: #FAFAFA; border-color: #BDBDBD; }
    .btn-google svg { width: 20px; height: 20px; }
    .register-link  { text-align: center; font-size: 13.5px; color: #757575; margin-top: 22px; }
    .register-link a { color: #2E7D32; font-weight: 700; text-decoration: none; }
    .register-link a:hover { text-decoration: underline; }
</style>

{{-- Password toggle JS --}}
<script>
    function togglePassword(inputId, btn) {
        const input  = document.getElementById(inputId);
        const isText = input.type === 'text';
        input.type   = isText ? 'password' : 'text';
        btn.querySelector('.icon-eye').style.display     = isText ? 'none'  : 'block';
        btn.querySelector('.icon-eye-off').style.display = isText ? 'block' : 'none';
    }
</script>

@yield('scripts')
</body>
</html>