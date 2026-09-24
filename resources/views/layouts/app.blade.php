<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'LPPM') – Sekolah Tinggi Agama Islam Mulia Astuti (STAIMAS) Wonogiri</title>
  <meta name="description" content="Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) STAIMAS Wonogiri – Pusat penelitian, publikasi jurnal, dan pengabdian masyarakat." />
  <link rel="icon" type="image/png" href="https://www.staimaswonogiri.ac.id/assest/LOGO%20STAIMAS%20AI.png" />
  
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  <style>
    html, body { font-family: 'Plus Jakarta Sans', sans-serif; margin: 0 !important; padding: 0 !important; }

    /* ===== GLOBAL ANIMATIONS FOR ALL PAGES ===== */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.75s cubic-bezier(0.22, 1, 0.36, 1), transform 0.75s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .reveal-left {
      opacity: 0;
      transform: translateX(-40px);
      transition: opacity 0.8s cubic-bezier(0.22, 1, 0.36, 1), transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .reveal-left.visible {
      opacity: 1;
      transform: translateX(0);
    }
    .reveal-right {
      opacity: 0;
      transform: translateX(40px);
      transition: opacity 0.8s cubic-bezier(0.22, 1, 0.36, 1), transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .reveal-right.visible {
      opacity: 1;
      transform: translateX(0);
    }
    .reveal-scale {
      opacity: 0;
      transform: scale(0.93);
      transition: opacity 0.75s cubic-bezier(0.22, 1, 0.36, 1), transform 0.75s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .reveal-scale.visible {
      opacity: 1;
      transform: scale(1);
    }
    .reveal-delay-1 { transition-delay: 0.08s; }
    .reveal-delay-2 { transition-delay: 0.16s; }
    .reveal-delay-3 { transition-delay: 0.24s; }
    .reveal-delay-4 { transition-delay: 0.32s; }
    .reveal-delay-5 { transition-delay: 0.40s; }

    /* Dropdown Styling */
    .nav-dropdown { position: relative; }
    .nav-dropdown-menu {
      position: absolute;
      top: calc(100% + 10px);
      left: 0;
      min-width: 260px;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      box-shadow: 0 10px 30px -5px rgba(0,0,0,0.12);
      padding: 8px 0;
      opacity: 0;
      visibility: hidden;
      transform: translateY(8px);
      transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
      z-index: 100;
    }
    .nav-dropdown.open .nav-dropdown-menu {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }
    .nav-dropdown-menu a {
      display: block;
      padding: 10px 18px;
      font-size: 12px;
      font-weight: 700;
      color: #334155;
      transition: all 0.15s ease;
      white-space: nowrap;
      text-decoration: none;
    }
    .nav-dropdown-menu a:hover {
      background: #f0fdf4;
      color: #074e50;
      padding-left: 22px;
    }
    .chevron-icon { transition: transform 0.2s ease; }
    .nav-dropdown.open .chevron-icon { transform: rotate(180deg); }

    /* FOOTER STYLING BERSISIH & SOLID */
    footer.lppm-footer {
      background-color: #052b2c !important;
      color: #cbd5e1 !important;
      margin-top: 60px;
      border-top: 4px solid #f59e0b;
    }
    .footer-wrap {
      max-width: 1280px;
      margin: 0 auto;
      padding: 50px 24px 30px 24px;
    }
    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 36px;
    }
    .footer-brand-col {
      grid-column: span 1;
    }
    @media (min-width: 768px) {
      .footer-brand-col { grid-column: span 2; }
    }
    .footer-title {
      font-size: 13px;
      font-weight: 800;
      color: #ffffff;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin: 0 0 16px 0;
      padding-bottom: 8px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .footer-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .footer-links li {
      margin-bottom: 10px;
    }
    .footer-links a {
      color: #94a3b8;
      font-size: 13px;
      text-decoration: none;
      transition: color 0.15s ease;
    }
    .footer-links a:hover {
      color: #f59e0b;
    }
    .footer-bottom {
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid rgba(255,255,255,0.1);
      display: flex;
      flex-direction: column;
      sm:flex-row;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
      font-size: 12px;
      color: #64748b;
    }
  </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

  <!-- ===== TOP BAR ===== -->
  <div class="bg-[#074e50] text-slate-200 text-xs py-2.5 px-6 z-50 relative">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
      <div class="flex items-center gap-6">
        <a href="tel:082223204552" class="hover:text-amber-400 transition-colors flex items-center gap-1.5 text-[11px] font-medium"><i class="fas fa-phone text-amber-400"></i> 082223204552</a>
        <a href="mailto:lppm@staimaswonogiri.ac.id" class="hover:text-amber-400 transition-colors flex items-center gap-1.5 text-[11px] font-medium"><i class="fas fa-envelope text-amber-400"></i> lppm@staimaswonogiri.ac.id</a>
      </div>
      <div class="flex items-center gap-4 text-[11px]">
        <a href="https://staimaswonogiri.ecampuz.com/eadmisi/" target="_blank" class="bg-amber-500 text-slate-950 px-3 py-1 rounded font-bold hover:bg-amber-600 transition-colors"><i class="fas fa-user-plus mr-1"></i> PMB 2026</a>
        <a href="https://staimaswonogiri.ecampuz.com/eakademikportal/" target="_blank" class="hover:text-amber-400 transition-colors font-semibold">SIAKAD</a>
        <a href="https://e-journal.staimaswonogiri.ac.id/" target="_blank" class="hover:text-amber-400 transition-colors font-semibold">E-Journal</a>

      </div>
    </div>
  </div>

  <!-- ===== NAVBAR MAIN ===== -->
  <header class="sticky top-0 bg-white/95 backdrop-blur-md border-b border-slate-200 z-40 shadow-xs" id="navbar">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
      
      <!-- Logo Resmi LPPM STAIMAS -->
      <a href="{{ route('home') }}" class="flex items-center gap-3 group py-0.5 flex-shrink-0">
        <img src="{{ asset('assest/image.png') }}" alt="LPPM STAIMAS Wonogiri" class="h-10 md:h-12 w-auto object-contain drop-shadow-xs transition-transform hover:scale-[1.02]">
      </a>

      <!-- Desktop Nav (Optimal Spacing & Typography) -->
      <nav class="hidden lg:flex items-center gap-6 xl:gap-8 text-[13px] font-semibold text-slate-700 tracking-normal">
        
        <a href="{{ route('home') }}" class="px-2.5 py-2 transition-colors hover:text-[#074e50] uppercase rounded-lg hover:bg-slate-50">
          BERANDA
        </a>
        
        <a href="{{ route('program-kebijakan') }}" class="px-2.5 py-2 transition-colors hover:text-[#074e50] uppercase rounded-lg hover:bg-slate-50">
          PROGRAM DAN KEBIJAKAN
        </a>
        
        <!-- Dropdown Tentang Kami -->
        <div class="nav-dropdown py-2">
          <button class="px-2.5 py-2 flex items-center gap-1.5 hover:text-[#074e50] transition-colors uppercase cursor-pointer rounded-lg hover:bg-slate-50">
            <span>TENTANG KAMI</span>
            <i class="fas fa-chevron-down text-[8px] chevron-icon text-slate-400"></i>
          </button>
          <div class="nav-dropdown-menu">
            <a href="{{ route('selayang-pandang') }}"><i class="fas fa-circle text-[6px] mr-2 text-amber-500"></i> Selayang Pandang</a>
            <a href="{{ route('sejarah') }}"><i class="fas fa-circle text-[6px] mr-2 text-amber-500"></i> Sejarah</a>
            <a href="{{ route('visi-misi') }}"><i class="fas fa-circle text-[6px] mr-2 text-amber-500"></i> Visi dan Misi</a>
            <a href="{{ route('struktur') }}"><i class="fas fa-circle text-[6px] mr-2 text-amber-500"></i> Struktur Organisasi</a>
          </div>
        </div>

        <!-- Dropdown Pusat Studi -->
        <div class="nav-dropdown py-2">
          <button class="px-2.5 py-2 flex items-center gap-1.5 hover:text-[#074e50] transition-colors uppercase cursor-pointer rounded-lg hover:bg-slate-50">
            <span>PUSAT STUDI DAN UNIT</span>
            <i class="fas fa-chevron-down text-[8px] chevron-icon text-slate-400"></i>
          </button>
          <div class="nav-dropdown-menu">
            <a href="{{ route('pusat-studi-bk-parenting') }}"><i class="fas fa-flask text-[10px] mr-2 text-amber-500"></i> Pusat Studi BK, Psikologi & Parenting</a>
            <a href="{{ route('pusat-studi-gender-anak') }}"><i class="fas fa-child text-[10px] mr-2 text-amber-500"></i> Pusat Studi Gender dan Anak</a>
            <a href="{{ route('pusat-studi-moderasi-beragama') }}"><i class="fas fa-hands-helping text-[10px] mr-2 text-amber-500"></i> Pusat Studi Moderasi Beragama</a>
            <a href="{{ route('pusat-studi-kewirausahaan') }}"><i class="fas fa-store text-[10px] mr-2 text-amber-500"></i> Pusat Studi Kewirausahaan</a>
          </div>
        </div>

        <a href="{{ route('dokumen') }}" class="px-2.5 py-2 transition-colors hover:text-[#074e50] uppercase rounded-lg hover:bg-slate-50">
          DOKUMEN
        </a>

        <a href="{{ route('dokumentasi') }}" class="px-2.5 py-2 transition-colors hover:text-[#074e50] uppercase rounded-lg hover:bg-slate-50">
          DOKUMENTASI
        </a>

        <!-- Dropdown Publikasi LPPM -->
        <div class="nav-dropdown py-2">
          <button class="px-2.5 py-2 flex items-center gap-1.5 hover:text-[#074e50] transition-colors uppercase cursor-pointer rounded-lg hover:bg-slate-50">
            <span>PUBLIKASI LPPM</span>
            <i class="fas fa-chevron-down text-[8px] chevron-icon text-slate-400"></i>
          </button>
          <div class="nav-dropdown-menu">
            <a href="{{ route('jurnal-al-basirah') }}"><i class="fas fa-book mr-2 text-teal-600"></i> Jurnal Al-Basirah</a>
            <a href="{{ route('jurnal-lisyabab') }}"><i class="fas fa-feather-alt mr-2 text-amber-600"></i> Jurnal Li Syabab</a>
            <a href="{{ route('ketua-jurnal-lppm') }}"><i class="fas fa-user-shield mr-2 text-indigo-600"></i> Ketua Jurnal LPPM</a>
          </div>
        </div>

      </nav>

      <!-- Mobile Nav Trigger -->
      <button class="lg:hidden text-slate-700 hover:text-[#074e50] p-2 rounded-xl bg-slate-100" id="mobile-menu-btn" aria-label="Menu">
        <i class="fas fa-bars text-lg"></i>
      </button>

    </div>

    <!-- Mobile Nav Panel -->
    <div class="lg:hidden hidden bg-white border-t border-slate-100 px-4 py-3 shadow-inner" id="mobile-menu">
      <a href="{{ route('home') }}" class="block px-3 py-2.5 text-xs font-bold text-slate-700 border-b border-slate-50 uppercase">BERANDA</a>
      <a href="{{ route('program-kebijakan') }}" class="block px-3 py-2.5 text-xs font-bold text-slate-700 border-b border-slate-50 uppercase">PROGRAM DAN KEBIJAKAN</a>
      
      <div class="border-b border-slate-50">
        <button onclick="this.nextElementSibling.classList.toggle('hidden')" class="w-full flex justify-between items-center px-3 py-2.5 text-xs font-bold text-slate-700 uppercase">
          <span>TENTANG KAMI</span>
          <i class="fas fa-chevron-down text-[10px] text-slate-400"></i>
        </button>
        <div class="hidden pl-6 pb-2 space-y-1">
          <a href="{{ route('selayang-pandang') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Selayang Pandang</a>
          <a href="{{ route('sejarah') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Sejarah</a>
          <a href="{{ route('visi-misi') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Visi dan Misi</a>
          <a href="{{ route('struktur') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Struktur Organisasi</a>
        </div>
      </div>

      <div class="border-b border-slate-50">
        <button onclick="this.nextElementSibling.classList.toggle('hidden')" class="w-full flex justify-between items-center px-3 py-2.5 text-xs font-bold text-slate-700 uppercase">
          <span>PUSAT STUDI DAN UNIT</span>
          <i class="fas fa-chevron-down text-[10px] text-slate-400"></i>
        </button>
        <div class="hidden pl-6 pb-2 space-y-1">
          <a href="{{ route('pusat-studi-bk-parenting') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Pusat Studi BK & Parenting</a>
          <a href="{{ route('pusat-studi-gender-anak') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Pusat Studi Gender & Anak</a>
          <a href="{{ route('pusat-studi-moderasi-beragama') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Pusat Studi Moderasi Beragama</a>
          <a href="{{ route('pusat-studi-kewirausahaan') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Pusat Studi Kewirausahaan</a>
        </div>
      </div>

      <a href="{{ route('dokumen') }}" class="block px-3 py-2.5 text-xs font-bold text-slate-700 border-b border-slate-50 uppercase">DOKUMEN</a>
      <a href="{{ route('dokumentasi') }}" class="block px-3 py-2.5 text-xs font-bold text-slate-700 border-b border-slate-50 uppercase">DOKUMENTASI</a>

      <div class="border-b border-slate-50">
        <button onclick="this.nextElementSibling.classList.toggle('hidden')" class="w-full flex justify-between items-center px-3 py-2.5 text-xs font-bold text-slate-700 uppercase">
          <span>PUBLIKASI LPPM</span>
          <i class="fas fa-chevron-down text-[10px] text-slate-400"></i>
        </button>
        <div class="hidden pl-6 pb-2 space-y-1">
          <a href="{{ route('jurnal-al-basirah') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Jurnal Al-Basirah</a>
          <a href="{{ route('jurnal-lisyabab') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Jurnal Li Syabab</a>
          <a href="{{ route('ketua-jurnal-lppm') }}" class="block py-1.5 text-xs font-semibold text-slate-600">Ketua Jurnal LPPM</a>
        </div>
      </div>
    </div>
  </header>

  <!-- HERO SECTION WITH REVEAL ANIMATION -->
  @hasSection('hero-title')
  <div class="bg-gradient-to-r from-[#053c3e] to-[#074e50] text-white py-12 px-6 shadow-md overflow-hidden">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-4">
      <div class="reveal-left">
        <div class="flex items-center gap-2 text-xs font-semibold text-amber-400 mb-2.5">
          <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
          <i class="fas fa-chevron-right text-[8px]"></i>
          <span>@yield('hero-breadcrumb', 'Detail')</span>
        </div>
        <h1 class="text-3xl font-extrabold tracking-tight">@yield('hero-title')</h1>
        <p class="text-slate-200 text-sm mt-2 max-w-xl font-light">@yield('hero-subtitle')</p>
      </div>
      <div class="hidden md:block reveal-right">
        <i class="@yield('hero-icon', 'fas fa-graduation-cap') text-6xl text-white/10"></i>
      </div>
    </div>
  </div>
  @endif

  <!-- MAIN CONTENT -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- ===== FOOTER (STUNNING DARK TEAL) ===== -->
  <footer class="lppm-footer reveal">
    <div class="footer-wrap">
      <div class="footer-grid">
        
        <!-- Brand & Description Column -->
        <div class="footer-brand-col">
          <div style="background: #ffffff; padding: 6px 12px; border-radius: 10px; display: inline-block; margin-bottom: 16px;">
            <img src="{{ asset('assest/image.png') }}" alt="Logo STAIMAS" style="height: 38px; width: auto; display: block;">
          </div>
          <p style="font-size: 13px; color: #94a3b8; line-height: 1.7; margin: 0; max-width: 460px;">
            Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Sekolah Tinggi Agama Islam Mulia Astuti (STAIMAS) Wonogiri berorientasi pada pengembangan keilmuan Islam, riset terapan, publikasi ilmiah terakreditasi, dan pengabdian masyarakat.
          </p>
        </div>

        <!-- Links Column -->
        <div>
          <h3 class="footer-title">Navigasi Utama</h3>
          <ul class="footer-links">
            <li><a href="{{ route('selayang-pandang') }}"><i class="fas fa-chevron-right" style="font-size: 9px; margin-right: 6px; color: #f59e0b;"></i> Selayang Pandang</a></li>
            <li><a href="{{ route('visi-misi') }}"><i class="fas fa-chevron-right" style="font-size: 9px; margin-right: 6px; color: #f59e0b;"></i> Visi & Misi</a></li>
            <li><a href="{{ route('struktur') }}"><i class="fas fa-chevron-right" style="font-size: 9px; margin-right: 6px; color: #f59e0b;"></i> Struktur Organisasi</a></li>
            <li><a href="{{ route('dokumen') }}"><i class="fas fa-chevron-right" style="font-size: 9px; margin-right: 6px; color: #f59e0b;"></i> Dokumen Unduhan</a></li>
            <li><a href="{{ route('dokumentasi') }}"><i class="fas fa-chevron-right" style="font-size: 9px; margin-right: 6px; color: #f59e0b;"></i> Dokumentasi Kegiatan</a></li>
          </ul>
        </div>

        <!-- Contact Column -->
        <div>
          <h3 class="footer-title">Kontak LPPM</h3>
          <ul class="footer-links">
            <li style="display: flex; gap: 10px; align-items: flex-start; color: #cbd5e1; font-size: 13px;">
              <i class="fas fa-map-marker-alt" style="color: #f59e0b; margin-top: 4px; flex-shrink: 0;"></i>
              <span>Jl. Wonogiri - Ponorogo, Sabuk, Pokoh Kidul, Kec. Wonogiri, Kab. Wonogiri, Jawa Tengah</span>
            </li>
            <li style="display: flex; gap: 10px; align-items: center; color: #cbd5e1; font-size: 13px; margin-top: 10px;">
              <i class="fas fa-phone" style="color: #f59e0b; flex-shrink: 0;"></i>
              <span>082223204552</span>
            </li>
            <li style="display: flex; gap: 10px; align-items: center; color: #cbd5e1; font-size: 13px; margin-top: 10px;">
              <i class="fas fa-envelope" style="color: #f59e0b; flex-shrink: 0;"></i>
              <span>lppm@staimaswonogiri.ac.id</span>
            </li>
          </ul>
        </div>

      </div>

      <!-- Copyright Bottom Bar -->
      <div class="footer-bottom">
        <div>&copy; {{ date('Y') }} LPPM STAIMAS Wonogiri. All rights reserved.</div>
        <div>Sekolah Tinggi Agama Islam Mulia Astuti Wonogiri</div>
      </div>
    </div>
  </footer>

  <script>
    // Dropdown navbar toggle
    document.querySelectorAll('.nav-dropdown').forEach(dropdown => {
      dropdown.addEventListener('mouseenter', () => dropdown.classList.add('open'));
      dropdown.addEventListener('mouseleave', () => dropdown.classList.remove('open'));
    });

    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileBtn && mobileMenu) {
      mobileBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    }

    // IntersectionObserver for global reveal animations (Refresh & Scroll)
    document.addEventListener("DOMContentLoaded", function () {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
          }
        });
      }, { threshold: 0.05, rootMargin: "0px 0px -20px 0px" });

      const animateElements = document.querySelectorAll(
        ".reveal, .reveal-left, .reveal-right, .reveal-scale, main .sp-section, main .sp-pillar, main .sp-komitmen, main .vm-card, main .vm-nilai-card, main .st-box, main .pk-card, main .dok-card, main .gal-card, main .ps-card, main .ps-sidebar-card, main article, main table, main .grid > div"
      );
      
      animateElements.forEach(el => observer.observe(el));
    });
  </script>

</body>
</html>

