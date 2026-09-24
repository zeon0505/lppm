@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<style>
  /* ===== ANIMATIONS ===== */
  .reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.7s cubic-bezier(0.22,1,0.36,1), transform 0.7s cubic-bezier(0.22,1,0.36,1);
  }
  .reveal.visible { opacity: 1; transform: translateY(0); }
  .reveal-left {
    opacity: 0;
    transform: translateX(-40px);
    transition: opacity 0.8s cubic-bezier(0.22,1,0.36,1), transform 0.8s cubic-bezier(0.22,1,0.36,1);
  }
  .reveal-left.visible { opacity: 1; transform: translateX(0); }
  .reveal-right {
    opacity: 0;
    transform: translateX(40px);
    transition: opacity 0.9s cubic-bezier(0.22,1,0.36,1), transform 0.9s cubic-bezier(0.22,1,0.36,1);
  }
  .reveal-right.visible { opacity: 1; transform: translateX(0); }
  .reveal-delay-1 { transition-delay: 0.05s; }
  .reveal-delay-2 { transition-delay: 0.15s; }
  .reveal-delay-3 { transition-delay: 0.25s; }
  .reveal-delay-4 { transition-delay: 0.35s; }
  .reveal-delay-5 { transition-delay: 0.1s; }

  /* ===== HERO SECTION (UMY DPPS Style) ===== */
  .hero-section {
    background: #ffffff;
    width: 100%;
    overflow: hidden;
    position: relative;
  }
  .hero-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 2rem;
    display: grid;
    grid-template-columns: 1fr 520px;
    align-items: flex-end;
    min-height: 440px;
  }
  .hero-text {
    padding: 56px 40px 56px 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 18px;
  }
  .hero-title {
    font-size: 2.6rem;
    font-weight: 900;
    color: #0f172a;
    line-height: 1.15;
    letter-spacing: -0.02em;
  }
  .hero-title span { color: #074e50; }
  .hero-desc {
    font-size: 0.92rem;
    color: #475569;
    line-height: 1.75;
    max-width: 500px;
  }
  .hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    padding-top: 4px;
  }
  .hero-btn-primary {
    background: #074e50;
    color: #fff;
    font-size: 0.8rem;
    font-weight: 700;
    padding: 10px 22px;
    border-radius: 8px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
    box-shadow: 0 4px 12px rgba(7,78,80,0.25);
  }
  .hero-btn-primary:hover { background: #053c3e; transform: translateY(-2px); box-shadow: 0 6px 16px rgba(7,78,80,0.3); }
  .hero-btn-secondary {
    background: transparent;
    color: #475569;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 10px 22px;
    border-radius: 8px;
    border: 1.5px solid #cbd5e1;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: border-color 0.2s, color 0.2s, background 0.2s;
  }
  .hero-btn-secondary:hover { border-color: #074e50; color: #074e50; background: #f0fafa; }
  .hero-photo {
    display: flex;
    align-items: flex-end;
    justify-content: center;
    height: 440px;
    overflow: hidden;
  }
  .hero-photo img {
    height: 100%;
    width: auto;
    object-fit: contain;
    object-position: bottom center;
    display: block;
  }

  @media (max-width: 900px) {
    .hero-inner {
      grid-template-columns: 1fr;
      grid-template-rows: auto auto;
    }
    .hero-text { padding: 40px 0 24px 0; }
    .hero-title { font-size: 2rem; }
    .hero-photo { height: 240px; }
  }
</style>

<!-- ===== HERO SECTION ===== -->
<div class="hero-section">
  <div class="hero-inner">

    <!-- LEFT: Text -->
    <div class="hero-text">
      <h1 class="hero-title reveal-left reveal-delay-1">
        Lembaga Penelitian &amp;<br>Pengabdian kepada<br>Masyarakat <span>(LPPM)</span>
      </h1>
      <p class="hero-desc reveal-left reveal-delay-2">
        LPPM STAIMAS Wonogiri bertugas mengoordinasikan, memfasilitasi, dan memantau pelaksanaan kegiatan penelitian serta pengabdian kepada masyarakat oleh para dosen dan mahasiswa. Kami berkomitmen meningkatkan kapasitas riset akademik dan kontribusi sosial berbasis nilai-nilai keislaman.
      </p>
      <div class="hero-actions reveal-left reveal-delay-3">
        <a href="{{ route('profil') }}" class="hero-btn-primary">
          Selengkapnya tentang LPPM <i class="fas fa-arrow-right" style="font-size:10px"></i>
        </a>
        <a href="{{ route('unduhan') }}" class="hero-btn-secondary">
          <i class="fas fa-download" style="font-size:10px"></i> Unduh Panduan &amp; Template
        </a>
      </div>
    </div>

    <!-- RIGHT: Photo seamless -->
    <div class="hero-photo reveal-right reveal-delay-5">
      <img src="{{ asset('assest/WhatsApp_Image_2026-09-22_at_10.46.31-removebg-preview.png') }}" alt="Ketua LPPM STAIMAS Wonogiri">
    </div>

  </div>
</div>

<!-- ===== CONTENT BELOW ===== -->
<div class="max-w-7xl mx-auto px-4 md:px-6 pt-8 pb-4">

  <!-- QUICK STATS -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-12">
    <div class="reveal reveal-delay-1 bg-white p-5 rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
      <div class="w-12 h-12 bg-teal-50 text-[#074e50] rounded-lg flex items-center justify-center text-xl font-bold flex-shrink-0">
        <i class="fas fa-file-invoice"></i>
      </div>
      <div>
        <div class="text-2xl font-extrabold text-[#074e50]">45+</div>
        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Proposal Penelitian</div>
      </div>
    </div>
    <div class="reveal reveal-delay-2 bg-white p-5 rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
      <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center text-xl font-bold flex-shrink-0">
        <i class="fas fa-users"></i>
      </div>
      <div>
        <div class="text-2xl font-extrabold text-[#074e50]">32+</div>
        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Mitra Pengabdian</div>
      </div>
    </div>
    <div class="reveal reveal-delay-3 bg-white p-5 rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
      <div class="w-12 h-12 bg-sky-50 text-sky-600 rounded-lg flex items-center justify-center text-xl font-bold flex-shrink-0">
        <i class="fas fa-journal-whills"></i>
      </div>
      <div>
        <div class="text-2xl font-extrabold text-[#074e50]">3</div>
        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Jurnal Ilmiah Sinta</div>
      </div>
    </div>
    <div class="reveal reveal-delay-4 bg-white p-5 rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
      <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center text-xl font-bold flex-shrink-0">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <div>
        <div class="text-2xl font-extrabold text-[#074e50]">15</div>
        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Dosen Peneliti</div>
      </div>
    </div>
  </div>

  <!-- FOCUS AREAS -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
    <div class="reveal reveal-delay-1 bg-white p-6 rounded-xl border border-slate-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
      <div class="w-10 h-10 bg-teal-50 text-[#074e50] rounded-lg flex items-center justify-center mb-4 text-lg">
        <i class="fas fa-magnifying-glass-dollar"></i>
      </div>
      <h3 class="text-lg font-bold text-slate-900 mb-2">Fokus Penelitian</h3>
      <p class="text-xs text-slate-500 leading-relaxed mb-4">
        Pengembangan kajian riset strategis di bidang keilmuan Islam, khususnya pada integrasi ilmu-ilmu keislaman, metodologi pendidikan Islam, pengembangan instrumen ekonomi syariah, dan hukum tata negara yang responsif terhadap dinamika hukum nasional.
      </p>
      <a href="{{ route('penelitian') }}" class="text-xs font-bold text-[#074e50] hover:text-[#053c3e] inline-flex items-center gap-1.5 hover:translate-x-1 transition-transform">
        Daftar Penelitian <i class="fas fa-chevron-right text-[9px]"></i>
      </a>
    </div>
    <div class="reveal reveal-delay-2 bg-white p-6 rounded-xl border border-slate-100 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
      <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center mb-4 text-lg">
        <i class="fas fa-handshake-angle"></i>
      </div>
      <h3 class="text-lg font-bold text-slate-900 mb-2">Pengabdian Masyarakat</h3>
      <p class="text-xs text-slate-500 leading-relaxed mb-4">
        Pemberdayaan masyarakat berbasis nilai keagamaan melalui penyuluhan hukum keluarga sakinah, sertifikasi halal gratis untuk pelaku UMKM lokal, KKN mahasiswa, serta pembinaan dan peningkatan kompetensi literasi dakwah di berbagai lembaga sosial keagamaan.
      </p>
      <a href="{{ route('pengabdian') }}" class="text-xs font-bold text-[#074e50] hover:text-[#053c3e] inline-flex items-center gap-1.5 hover:translate-x-1 transition-transform">
        Daftar Kegiatan Pengabdian <i class="fas fa-chevron-right text-[9px]"></i>
      </a>
    </div>
  </div>

</div>

<script>
(function() {
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });
  function init() {
    document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(el => obs.observe(el));
  }
  document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', init) : init();
})();
</script>

@endsection