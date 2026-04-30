<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixora - Perbaiki, Pakai Lagi, Kurangi Limbah Elektronik</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green-dark:    #1b5e3b;
            --green-primary: #276749;
            --green-btn:     #2e7d4f;
            --green-accent:  #3dba72;
            --green-light:   #eaf6ef;
            --yellow:        #f5a623;
            --text-dark:     #111827;
            --text-mid:      #374151;
            --text-muted:    #6b7280;
            --white:         #ffffff;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--white);
            color: var(--text-dark);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* ══════════════════════════════════════
           NAVBAR
        ══════════════════════════════════════ */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            height: 72px;
            background: var(--white);
            border-bottom: 1px solid #e9ecef;
            position: sticky;
            top: 0;
            z-index: 200;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 9px;
            text-decoration: none;
        }

        .logo-wordmark {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--green-dark);
            letter-spacing: -0.3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-mid);
            transition: color 0.18s;
            white-space: nowrap;
        }

        .nav-links a:hover { color: var(--green-btn); }

        .nav-links a.active {
            color: var(--green-btn);
            font-weight: 600;
            position: relative;
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            left: 0; right: 0; bottom: -4px;
            height: 2.5px;
            background: var(--green-btn);
            border-radius: 2px;
        }

        .nav-right { display: flex; align-items: center; gap: 20px; }

        .nav-location {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.93rem;
            font-weight: 500;
            color: var(--text-mid);
            cursor: pointer;
        }

        .btn-nav {
            background: var(--green-btn);
            color: var(--white);
            border: none;
            padding: 11px 28px;
            border-radius: 9px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.18s;
            white-space: nowrap;
            font-family: inherit;
        }

        .btn-nav:hover { background: var(--green-dark); }

        /* ══════════════════════════════════════
           HERO
        ══════════════════════════════════════ */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 76px 60px 64px 60px;
            background: linear-gradient(150deg, #f4fbf6 0%, #e8f5ed 55%, #dceeE5 100%);
            min-height: 610px;
            gap: 48px;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(61,186,114,0.12) 0%, transparent 65%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* ── Hero Left ── */
        .hero-left {
            flex: 0 0 auto;
            max-width: 510px;
            z-index: 2;
        }

        .hero-left h1 {
            font-size: 3.75rem;
            font-weight: 800;
            line-height: 1.1;
            color: var(--text-dark);
            margin-bottom: 24px;
            letter-spacing: -0.6px;
        }

        .hero-left h1 .green { color: var(--green-accent); }

        .hero-desc {
            font-size: 1.08rem;
            color: var(--text-muted);
            line-height: 1.72;
            margin-bottom: 44px;
            max-width: 440px;
        }

        .hero-btns {
            display: flex;
            gap: 18px;
            margin-bottom: 44px;
            flex-wrap: wrap;
        }

        .btn-fill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--green-btn);
            color: var(--white);
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.18s, transform 0.15s;
            font-family: inherit;
            white-space: nowrap;
        }

        .btn-fill:hover { background: var(--green-dark); transform: translateY(-1px); }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            color: var(--green-btn);
            padding: 14px 30px;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 700;
            text-decoration: none;
            border: 2px solid var(--green-btn);
            cursor: pointer;
            transition: background 0.18s, transform 0.15s;
            font-family: inherit;
            white-space: nowrap;
        }

        .btn-outline:hover { background: var(--green-light); transform: translateY(-1px); }

        .hero-rating { display: flex; align-items: center; gap: 14px; }

        .avatar-row { display: flex; }

        .avatar {
            width: 42px; height: 42px;
            border-radius: 50%;
            border: 2.5px solid var(--white);
            margin-left: -11px;
            font-size: 0.63rem;
            font-weight: 700;
            color: var(--green-dark);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .avatar:first-child { margin-left: 0; }

        .stars { color: var(--yellow); font-size: 1.15rem; letter-spacing: 2px; line-height: 1; display: block; margin-bottom: 3px; }
        .rating-label { font-size: 0.88rem; color: var(--text-muted); }

        /* ── Hero Right ── */
        .hero-right {
            flex: 0 0 auto;
            width: 510px;
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circle-wrap {
            position: relative;
            width: 450px;
            height: 450px;
        }

        .green-circle {
            width: 100%; height: 100%;
            border-radius: 50%;
            background: radial-gradient(circle at 42% 42%, #c2e8d0 0%, #a0d8b8 60%, #85cba0 100%);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* dashed ring */
        .green-circle::before {
            content: '';
            position: absolute;
            inset: -16px;
            border-radius: 50%;
            border: 2px dashed rgba(61,186,114,0.38);
        }

        /* ── Recycle arrows ── */
        .arr {
            position: absolute;
            width: 64px; height: 64px;
        }

        .arr-top    { top: -18px; left: 50%; transform: translateX(-50%); }
        .arr-right  { right: -18px; top: 50%; transform: translateY(-50%) rotate(90deg); }
        .arr-bottom { bottom: -18px; left: 50%; transform: translateX(-50%) rotate(180deg); }

        /* ── Devices ── */
        .devices {
            position: relative;
            width: 340px;
            height: 330px;
        }

        /* Laptop */
        .laptop        { position: absolute; bottom: 22px; left: 10px; width: 240px; }
        .laptop-screen { width: 240px; height: 156px; background: #1c1c1c; border-radius: 10px 10px 0 0; position: relative; overflow: hidden; }
        .laptop-screen::before {
            content: '';
            position: absolute; inset: 8px;
            background: linear-gradient(145deg, #0b3020 0%, #1a5538 50%, #0e3c26 100%);
            border-radius: 5px;
        }
        .laptop-base {
            width: 260px; height: 10px; background: #2a2a2a;
            border-radius: 0 0 8px 8px; margin-left: -10px;
        }

        /* Phone */
        .phone {
            position: absolute; right: 26px; bottom: 38px;
            width: 64px; height: 122px;
            background: #111; border-radius: 13px; border: 2px solid #2a2a2a; overflow: hidden;
        }
        .phone::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(160deg, #0d1a26 0%, #142340 100%);
        }
        .phone-notch {
            position: absolute; top: 7px; left: 50%; transform: translateX(-50%);
            width: 20px; height: 4px; background: #222; border-radius: 4px; z-index: 1;
        }

        /* Camera */
        .camera {
            position: absolute; right: 10px; bottom: 174px;
            width: 82px; height: 64px;
            background: #1a1a1a; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .cam-lens {
            width: 40px; height: 40px; border-radius: 50%;
            background: #0d0d0d; border: 4px solid #2e2e2e;
            display: flex; align-items: center; justify-content: center;
        }
        .cam-lens::after {
            content: ''; width: 18px; height: 18px;
            border-radius: 50%; background: #0a1a2e; display: block;
        }

        /* Circuit */
        .circuit {
            position: absolute; bottom: 18px; left: 58px;
            width: 145px; height: 56px;
            background: #162616; border-radius: 6px; overflow: hidden;
        }
        .circuit::before {
            content: '';
            position: absolute; top: 13px; left: 10px; right: 10px; height: 2px;
            background: #3dba72; opacity: 0.5;
            box-shadow: 0 13px 0 rgba(61,186,114,0.3), 0 26px 0 rgba(61,186,114,0.5);
        }
        .cdots {
            position: absolute; top: 8px; left: 16px;
            display: flex; gap: 10px;
        }
        .cdots span {
            width: 5px; height: 5px; border-radius: 50%;
            background: #3dba72; opacity: 0.7; display: block;
        }

        /* ── Floating cards ── */
        .fcard {
            position: absolute;
            background: var(--white);
            border-radius: 15px;
            padding: 14px 18px;
            box-shadow: 0 8px 36px rgba(0,0,0,0.12);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10;
            white-space: nowrap;
        }

        .fcard-ico {
            width: 42px; height: 42px;
            border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .fcard-ico.teal  { background: #e0f5f0; }
        .fcard-ico.green { background: var(--green-light); }
        .fcard-ico svg   { width: 22px; height: 22px; }

        .fcard-txt h4 { font-size: 0.88rem; font-weight: 700; color: var(--text-dark); margin-bottom: 2px; }
        .fcard-txt p  { font-size: 0.76rem; color: var(--text-muted); line-height: 1.4; }

        .fc-ai      { top: 14px;   right: -24px; }
        .fc-teknisi { top: 44%;    left: -170px; transform: translateY(-50%); }
        .fc-kelola  { bottom: 36px; right: -20px; }

        /* ══════════════════════════════════════
           STATS BAR
        ══════════════════════════════════════ */
        .stats-outer {
            padding: 0 60px;
            position: relative;
            z-index: 10;
            margin-top: -38px;
        }

        .stats-bar {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 6px 44px rgba(0,0,0,0.09);
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 38px 52px;
        }

        .stat-item { display: flex; align-items: center; gap: 20px; }

        .stat-ico {
            width: 60px; height: 60px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .si-green  { background: #e2f5ea; }
        .si-yellow { background: #fef3dc; }
        .si-teal   { background: #ddf4ec; }
        .si-blue   { background: #e3ecf8; }
        .stat-ico svg { width: 30px; height: 30px; }

        .stat-txt h3 { font-size: 1.6rem; font-weight: 800; color: var(--text-dark); line-height: 1.1; }
        .stat-txt p  { font-size: 0.83rem; color: var(--text-muted); max-width: 150px; line-height: 1.45; margin-top: 3px; }

        .stat-sep { width: 1px; height: 56px; background: #e5e7eb; }

        /* ══════════════════════════════════════
           HOW IT WORKS
        ══════════════════════════════════════ */
        .section { padding: 88px 60px; }

        .sec-title { text-align: center; margin-bottom: 56px; }

        .sec-title h2 {
            font-size: 2.15rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 13px;
        }

        .sec-line {
            width: 52px; height: 3.5px;
            background: var(--green-accent);
            border-radius: 4px; margin: 0 auto;
        }

        .how-grid {
            display: grid;
            grid-template-columns: 1fr 56px 1fr 56px 1fr;
            align-items: center;
            margin-bottom: 68px;
        }

        .how-card {
            background: var(--green-light);
            border-radius: 18px;
            padding: 30px 26px;
            display: flex;
            align-items: flex-start;
            gap: 18px;
        }

        .how-icon {
            width: 58px; height: 58px;
            border-radius: 14px;
            background: var(--white);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .how-icon svg { width: 28px; height: 28px; }

        .step-num {
            display: inline-flex;
            align-items: center; justify-content: center;
            width: 24px; height: 24px;
            border-radius: 50%;
            background: var(--green-btn);
            color: var(--white);
            font-size: 0.73rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .how-card h3 { font-size: 1rem; font-weight: 700; color: var(--text-dark); margin-bottom: 8px; }
        .how-card p  { font-size: 0.87rem; color: var(--text-muted); line-height: 1.58; }

        .how-dots {
            display: flex;
            align-items: center; justify-content: center;
            gap: 5px;
        }

        .how-dots span {
            display: block; width: 6px; height: 6px;
            border-radius: 50%; background: #b0d8c0;
        }

        /* WHY */
        .why-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 38px;
        }

        .why-item { display: flex; flex-direction: column; gap: 14px; }

        .why-icon {
            width: 52px; height: 52px;
            border-radius: 13px;
            background: var(--green-light);
            display: flex; align-items: center; justify-content: center;
        }

        .why-icon svg { width: 26px; height: 26px; }

        .why-item h4 { font-size: 1rem; font-weight: 700; color: var(--text-dark); }
        .why-item p  { font-size: 0.87rem; color: var(--text-muted); line-height: 1.5; }
    </style>
</head>
<body>

<!-- ══════════════════════════════════════
     NAVBAR
══════════════════════════════════════ -->
<nav>
    <a href="#" class="nav-logo">
        <!-- Fixora logo: rocket with leaf/shield — matches screenshot -->
        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Outer leaf shape -->
            <path d="M19 2C19 2 7 9 7 20C7 26.63 12.37 32 19 32C25.63 32 31 26.63 31 20C31 9 19 2 19 2Z" fill="#d4eedf"/>
            <path d="M19 2C19 2 7 9 7 20C7 26.63 12.37 32 19 32C25.63 32 31 26.63 31 20C31 9 19 2 19 2Z" stroke="#2e7d4f" stroke-width="1.4" fill="none"/>
            <!-- Rocket body -->
            <path d="M19 8L22.5 18H15.5L19 8Z" fill="#2e7d4f"/>
            <!-- Rocket cabin -->
            <rect x="15.5" y="18" width="7" height="7" rx="1.5" fill="#2e7d4f"/>
            <!-- Left fin -->
            <path d="M15.5 21.5L12 26H15.5V21.5Z" fill="#3dba72"/>
            <!-- Right fin -->
            <path d="M22.5 21.5L26 26H22.5V21.5Z" fill="#3dba72"/>
            <!-- Window -->
            <circle cx="19" cy="15.5" r="2.5" fill="white" opacity="0.9"/>
        </svg>
        <span class="logo-wordmark">Fixora</span>
    </a>

    <ul class="nav-links">
        <li><a href="#" class="active">Beranda</a></li>
        <li><a href="#">Diagnosis</a></li>
        <li><a href="#">Marketplace</a></li>
        <li><a href="#">Teknisi</a></li>
        <li><a href="#">Promo &amp; News</a></li>
        <li><a href="#">Tentang Kami</a></li>
    </ul>

    <div class="nav-right">
        <div class="nav-location">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M8 1.5C5.79 1.5 4 3.29 4 5.5C4 8.75 8 14.5 8 14.5C8 14.5 12 8.75 12 5.5C12 3.29 10.21 1.5 8 1.5ZM8 7C7.17 7 6.5 6.33 6.5 5.5C6.5 4.67 7.17 4 8 4C8.83 4 9.5 4.67 9.5 5.5C9.5 6.33 8.83 7 8 7Z" fill="#2e7d4f"/>
            </svg>
            Jakarta
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                <path d="M3 4.5L6 7.5L9 4.5" stroke="#6b7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        
        {{-- JIKA USER BELUM LOGIN --}}
        @guest
            <a href="{{ route('login') }}" class="btn-nav">Masuk / Daftar</a>
        @endguest

        {{-- JIKA USER SUDAH LOGIN --}}
        @auth
            <div style="display: flex; align-items: center; gap: 15px;">
                <span style="font-size: 14px; font-weight: 600; color: #4b5563;">
                    Halo, {{ explode(' ', Auth::user()->name)[0] }}!
                </span>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-nav" style="background-color: #fee2e2; color: #dc2626; border: 1px solid #fca5a5;">
                        Keluar
                    </button>
                </form>
            </div>
        @endauth
    </div>
</nav>

<!-- ══════════════════════════════════════
     HERO
══════════════════════════════════════ -->
<section class="hero">

    <div class="hero-left">
        <h1>Perbaiki, Pakai Lagi,<br>Kurangi <span class="green">Limbah Elektronik</span></h1>

        <p class="hero-desc">Fixora membantu kamu mendiagnosis kerusakan perangkat,<br>
        menemukan teknisi terpercaya, membeli sparepart,<br>
        atau menjual perangkat dengan mudah.</p>

        <div class="hero-btns">
            <a href="#" class="btn-fill">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M11 3L5 10H10L9 17L15 10H10L11 3Z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Mulai Diagnosis
            </a>
            <a href="#" class="btn-outline">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M6 2L3 6V17C3 17.55 3.45 18 4 18H16C16.55 18 17 17.55 17 17V6L14 2H6Z" stroke="#2e7d4f" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 6H17M13 9C13 10.66 11.66 12 10 12C8.34 12 7 10.66 7 9" stroke="#2e7d4f" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Jelajahi Marketplace
            </a>
        </div>

        <div class="hero-rating">
            <div class="avatar-row">
                <div class="avatar" style="background:#b4e2c6;">AW</div>
                <div class="avatar" style="background:#9fd8b6;">BR</div>
                <div class="avatar" style="background:#8acfa6;">CY</div>
                <div class="avatar" style="background:#75c595;">DS</div>
            </div>
            <div>
                <span class="stars">★★★★★</span>
                <div class="rating-label">4.8/5 dari 2.500+ pengguna</div>
            </div>
        </div>
    </div>

    <!-- ILLUSTRATION -->
    <div class="hero-right">
        <div class="circle-wrap">
            <div class="green-circle">

                <!-- Arrows -->
                <svg class="arr arr-top" viewBox="0 0 64 64" fill="none">
                    <path d="M12 32 Q32 6 52 32" stroke="#5cc882" stroke-width="4" stroke-linecap="round" fill="none"/>
                    <path d="M46 23 L52 32 L43 34" stroke="#5cc882" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                <svg class="arr arr-right" viewBox="0 0 64 64" fill="none">
                    <path d="M12 32 Q32 6 52 32" stroke="#5cc882" stroke-width="4" stroke-linecap="round" fill="none"/>
                    <path d="M46 23 L52 32 L43 34" stroke="#5cc882" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                <svg class="arr arr-bottom" viewBox="0 0 64 64" fill="none">
                    <path d="M12 32 Q32 6 52 32" stroke="#5cc882" stroke-width="4" stroke-linecap="round" fill="none"/>
                    <path d="M46 23 L52 32 L43 34" stroke="#5cc882" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>

                <!-- Devices -->
                <div class="devices">
                    <div class="laptop">
                        <div class="laptop-screen"></div>
                        <div class="laptop-base"></div>
                    </div>
                    <div class="phone"><div class="phone-notch"></div></div>
                    <div class="camera"><div class="cam-lens"></div></div>
                    <div class="circuit">
                        <div class="cdots"><span></span><span></span><span></span><span></span></div>
                    </div>
                </div>

                <!-- Floating Cards -->
                <div class="fcard fc-ai">
                    <div class="fcard-ico teal">
                        <svg viewBox="0 0 22 22" fill="none">
                            <circle cx="11" cy="9" r="5" stroke="#2e7d4f" stroke-width="1.8"/>
                            <path d="M9 16.5C6.5 17.2 5 18.5 5 20H17C17 18.5 15.5 17.2 13 16.5" stroke="#2e7d4f" stroke-width="1.8" stroke-linecap="round"/>
                            <path d="M8.5 9L10.5 11L14 7.5" stroke="#2e7d4f" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="fcard-txt">
                        <h4>AI Diagnosis</h4>
                        <p>Cek kerusakan dalam<br>30 detik</p>
                    </div>
                </div>

                <div class="fcard fc-teknisi">
                    <div class="fcard-ico green">
                        <svg viewBox="0 0 22 22" fill="none">
                            <path d="M11 3C8.24 3 6 5.24 6 8C6 11.53 11 19 11 19C11 19 16 11.53 16 8C16 5.24 13.76 3 11 3Z" stroke="#2e7d4f" stroke-width="1.7" fill="none"/>
                            <circle cx="11" cy="8" r="2.5" stroke="#2e7d4f" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <div class="fcard-txt">
                        <h4>Teknisi Terpercaya</h4>
                        <p>Terverifikasi &amp;<br>berpengalaman</p>
                    </div>
                </div>

                <div class="fcard fc-kelola">
                    <div class="fcard-ico green">
                        <svg viewBox="0 0 22 22" fill="none">
                            <path d="M11 3L13.5 8H19L14.5 11.5L16.5 17L11 13.5L5.5 17L7.5 11.5L3 8H8.5L11 3Z" stroke="#2e7d4f" stroke-width="1.7" stroke-linejoin="round" fill="none"/>
                        </svg>
                    </div>
                    <div class="fcard-txt">
                        <h4>Kelola dengan Bijak</h4>
                        <p>Perbaiki, jual, atau<br>daur ulang</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════
     STATS BAR
══════════════════════════════════════ -->
<div class="stats-outer">
    <div class="stats-bar">

        <div class="stat-item">
            <div class="stat-ico si-green">
                <svg viewBox="0 0 30 30" fill="none">
                    <path d="M15 5L17 9H13L15 5ZM15 25L13 21H17L15 25ZM5 15L9 17V13L5 15ZM25 15L21 13V17L25 15Z" fill="#2e7d4f"/>
                    <circle cx="15" cy="15" r="5" stroke="#2e7d4f" stroke-width="2" fill="none" opacity="0.5"/>
                </svg>
            </div>
            <div class="stat-txt">
                <h3>2+ Juta Ton</h3>
                <p>E-waste dihasilkan di Indonesia setiap tahun</p>
            </div>
        </div>

        <div class="stat-sep"></div>

        <div class="stat-item">
            <div class="stat-ico si-yellow">
                <svg viewBox="0 0 30 30" fill="none">
                    <path d="M15 3L17.5 10.5L25.5 11L19.5 16.5L21.5 24.5L15 20.5L8.5 24.5L10.5 16.5L4.5 11L12.5 10.5L15 3Z" fill="#f5a623"/>
                </svg>
            </div>
            <div class="stat-txt">
                <h3>17.4%</h3>
                <p>Saja yang dikelola dengan benar</p>
            </div>
        </div>

        <div class="stat-sep"></div>

        <div class="stat-item">
            <div class="stat-ico si-teal">
                <svg viewBox="0 0 30 30" fill="none">
                    <path d="M15 4C15 4 6 9 6 16C6 21 10.03 25 15 25C19.97 25 24 21 24 16C24 9 15 4 15 4Z" stroke="#2e7d4f" stroke-width="1.8" fill="#c8eeda" opacity="0.6"/>
                    <path d="M15 25V15" stroke="#2e7d4f" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M15 15C15 15 10 12 10 8" stroke="#2e7d4f" stroke-width="1.5" stroke-linecap="round" opacity="0.5"/>
                </svg>
            </div>
            <div class="stat-txt">
                <h3>80%</h3>
                <p>Perangkat masih bisa diperbaiki dan digunakan</p>
            </div>
        </div>

        <div class="stat-sep"></div>

        <div class="stat-item">
            <div class="stat-ico si-blue">
                <svg viewBox="0 0 30 30" fill="none">
                    <circle cx="11" cy="11" r="4.5" stroke="#4a7ec0" stroke-width="1.8"/>
                    <circle cx="21" cy="11" r="3.5" stroke="#4a7ec0" stroke-width="1.6"/>
                    <path d="M2 24C2 20.13 6.03 17 11 17C15.97 17 20 20.13 20 24" stroke="#4a7ec0" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M21 17C24.87 17 28 19.24 28 22" stroke="#4a7ec0" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="stat-txt">
                <h3>1000+</h3>
                <p>Teknisi profesional siap membantu Anda</p>
            </div>
        </div>

    </div>
</div>

<!-- ══════════════════════════════════════
     HOW IT WORKS
══════════════════════════════════════ -->
<section class="section">
    <div class="sec-title">
        <h2>Bagaimana Fixora bekerja?</h2>
        <div class="sec-line"></div>
    </div>

    <div class="how-grid">

        <div class="how-card">
            <div class="how-icon">
                <svg viewBox="0 0 28 28" fill="none">
                    <path d="M14 4V18M14 4L9 9M14 4L19 9" stroke="#2e7d4f" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4 20H24V22C24 23.1 23.1 24 22 24H6C4.9 24 4 23.1 4 22V20Z" stroke="#2e7d4f" stroke-width="2.2" stroke-linecap="round"/>
                </svg>
            </div>
            <div>
                <div class="step-num">1</div>
                <h3>Unggah &amp; Ceritakan Masalah</h3>
                <p>Unggah foto perangkat dan jelaskan masalahnya dengan mudah.</p>
            </div>
        </div>

        <div class="how-dots"><span></span><span></span><span></span></div>

        <div class="how-card">
            <div class="how-icon">
                <svg viewBox="0 0 28 28" fill="none">
                    <path d="M7 7L21 21M21 7L7 21" stroke="#2e7d4f" stroke-width="2" stroke-linecap="round" opacity="0.2"/>
                    <circle cx="14" cy="14" r="9" stroke="#2e7d4f" stroke-width="2"/>
                    <path d="M10.5 14L13 16.5L18 11" stroke="#2e7d4f" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="step-num">2</div>
                <h3>Dapatkan Analisis AI</h3>
                <p>AI kami menganalisis kerusakan dan memberikan rekomendasi terbaik.</p>
            </div>
        </div>

        <div class="how-dots"><span></span><span></span><span></span></div>

        <div class="how-card">
            <div class="how-icon">
                <svg viewBox="0 0 28 28" fill="none">
                    <path d="M22.5 7L21 8.5L17.5 5L19 3.5C19.78 2.72 21.05 2.72 21.83 3.5L22.5 4.17C23.28 4.95 23.28 6.22 22.5 7Z" stroke="#2e7d4f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21 8.5L8 21.5L4 23.5L6 19.5L19 6.5L21 8.5Z" stroke="#2e7d4f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="step-num">3</div>
                <h3>Pilih Solusi Terbaik</h3>
                <p>Perbaiki, beli sparepart, jual, atau daur ulang sesuai kebutuhanmu.</p>
            </div>
        </div>

    </div>

    <!-- WHY FIXORA -->
    <div class="why-grid">

        <div class="why-item">
            <div class="why-icon">
                <svg viewBox="0 0 26 26" fill="none">
                    <path d="M13 3C8.58 3 5 6.58 5 11C5 13.38 6.19 15.47 8 16.74L13 23L18 16.74C19.81 15.47 21 13.38 21 11C21 6.58 17.42 3 13 3Z" fill="#c8ead5" stroke="#2e7d4f" stroke-width="1.6"/>
                    <path d="M9.5 11L12 13.5L17 8.5" stroke="#2e7d4f" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h4>Hemat Biaya</h4>
            <p>Perbaiki lebih murah</p>
        </div>

        <div class="why-item">
            <div class="why-icon">
                <svg viewBox="0 0 26 26" fill="none">
                    <path d="M13 3C8 3 4 7 4 12C4 15 5.4 17.7 7.6 19.5L13 23L18.4 19.5C20.6 17.7 22 15 22 12C22 7 18 3 13 3Z" stroke="#2e7d4f" stroke-width="1.8" fill="none"/>
                    <path d="M9 13C9 10.79 10.79 9 13 9C15.21 9 17 10.79 17 13C17 15.21 15.21 17 13 17" stroke="#2e7d4f" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M13 17V19" stroke="#2e7d4f" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
            </div>
            <h4>Perpanjang Umur Perangkat</h4>
            <p>Kurangi limbah elektronik</p>
        </div>

        <div class="why-item">
            <div class="why-icon">
                <svg viewBox="0 0 26 26" fill="none">
                    <circle cx="10" cy="10" r="4" stroke="#2e7d4f" stroke-width="1.8"/>
                    <circle cx="19" cy="10" r="3" stroke="#2e7d4f" stroke-width="1.6"/>
                    <path d="M2 22C2 18.69 5.58 16 10 16C14.42 16 18 18.69 18 22" stroke="#2e7d4f" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M19 15C22.31 15 25 16.79 25 19" stroke="#2e7d4f" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </div>
            <h4>Dukung Ekonomi Lokal</h4>
            <p>Memberdayakan teknisi &amp; UMKM</p>
        </div>

        <div class="why-item">
            <div class="why-icon">
                <svg viewBox="0 0 26 26" fill="none">
                    <circle cx="13" cy="13" r="9" stroke="#2e7d4f" stroke-width="1.8"/>
                    <path d="M13 6C13 6 8 9 8 13C8 16.31 10.24 19 13 19C15.76 19 18 16.31 18 13C18 9 13 6 13 6Z" stroke="#2e7d4f" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.5"/>
                    <path d="M8 13H18" stroke="#2e7d4f" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M13 5V21" stroke="#2e7d4f" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>
            <h4>Selamatkan Bumi</h4>
            <p>Bersama wujudkan masa depan hijau</p>
        </div>

    </div>

</section>

</body>
</html>