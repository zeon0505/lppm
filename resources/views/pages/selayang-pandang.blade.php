@extends('layouts.app')

@section('title', 'Selayang Pandang – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Selayang Pandang')
@section('hero-subtitle', 'Profil Lembaga Penelitian dan Pengabdian kepada Masyarakat STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Selayang Pandang')
@section('hero-icon', 'fas fa-university')

@section('content')

<style>
.sp-section { background: #fff; border: 1px solid #e8ecf0; border-radius: 16px; margin-bottom: 24px; overflow: hidden; }
.sp-section-head { padding: 20px 32px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; gap: 10px; }
.sp-accent { width: 4px; height: 22px; border-radius: 99px; flex-shrink: 0; }
.sp-section-title { font-size: 11px; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; color: #1e293b; }
.sp-section-body { padding: 28px 32px; }
.sp-prose p { font-size: 14px; color: #475569; line-height: 1.85; margin-bottom: 16px; }
.sp-prose p:last-child { margin-bottom: 0; }
.sp-pillar-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px; }
@media(max-width: 640px){ .sp-pillar-grid { grid-template-columns: 1fr; } }
.sp-pillar { background: #fff; border: 1px solid #e8ecf0; border-radius: 14px; padding: 22px 24px; }
.sp-pillar-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: 14px; font-size: 14px; }
.sp-pillar-label { font-size: 11px; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px; }
.sp-pillar-desc { font-size: 13px; color: #64748b; line-height: 1.7; }
.sp-luaran-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
@media(max-width: 640px){ .sp-luaran-grid { grid-template-columns: 1fr; } }
.sp-luaran-item { display: flex; align-items: flex-start; gap: 14px; padding: 16px 18px; background: #f8fafc; border: 1px solid #e8ecf0; border-radius: 12px; }
.sp-luaran-icon { width: 34px; height: 34px; border-radius: 9px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 13px; }
.sp-luaran-name { font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 3px; }
.sp-luaran-desc { font-size: 12.5px; color: #64748b; line-height: 1.6; }
.sp-komitmen { background: linear-gradient(135deg, #053c3e, #074e50); border-radius: 16px; padding: 32px 36px; display: flex; gap: 20px; align-items: flex-start; }
.sp-komitmen-icon { width: 40px; height: 40px; background: rgba(255,255,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.sp-komitmen-label { font-size: 10px; font-weight: 800; letter-spacing: 0.12em; text-transform: uppercase; color: #fbbf24; margin-bottom: 8px; }
.sp-komitmen-text { font-size: 14px; color: #cbd5e1; line-height: 1.85; }
</style>

<div style="max-width: 860px; margin: 0 auto; padding: 40px 20px;">

  {{-- 3 Pilar --}}
  <div class="sp-pillar-grid">
    <div class="sp-pillar">
      <div class="sp-pillar-icon" style="background:#f0fdf4; color:#047857;">
        <i class="fas fa-flask"></i>
      </div>
      <div class="sp-pillar-label" style="color:#047857;">Penelitian</div>
      <div class="sp-pillar-desc">Mendorong riset inovatif yang relevan dengan perkembangan keilmuan dan kebutuhan masyarakat.</div>
    </div>
    <div class="sp-pillar">
      <div class="sp-pillar-icon" style="background:#fffbeb; color:#b45309;">
        <i class="fas fa-hands-helping"></i>
      </div>
      <div class="sp-pillar-label" style="color:#b45309;">Pengabdian</div>
      <div class="sp-pillar-desc">Melaksanakan program pemberdayaan masyarakat berbasis nilai-nilai keislaman dan potensi lokal.</div>
    </div>
    <div class="sp-pillar">
      <div class="sp-pillar-icon" style="background:#f0f9ff; color:#0369a1;">
        <i class="fas fa-book-open"></i>
      </div>
      <div class="sp-pillar-label" style="color:#0369a1;">Publikasi</div>
      <div class="sp-pillar-desc">Mendukung penerbitan karya ilmiah dosen dan mahasiswa pada jurnal terakreditasi nasional.</div>
    </div>
  </div>

  {{-- Tentang --}}
  <div class="sp-section">
    <div class="sp-section-head">
      <div class="sp-accent" style="background:#074e50;"></div>
      <span class="sp-section-title">Tentang LPPM</span>
    </div>
    <div class="sp-section-body">
      <div class="sp-prose">
        <p>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) STAIMAS Wonogiri merupakan lembaga yang memiliki peran strategis dalam mengembangkan budaya akademik melalui pelaksanaan penelitian, pengabdian kepada masyarakat, serta penguatan inovasi dan publikasi ilmiah di lingkungan Sekolah Tinggi Agama Islam Mulia Astuti (STAIMAS) Wonogiri.</p>
        <p>LPPM hadir sebagai bagian penting dalam mewujudkan tridharma perguruan tinggi, khususnya dalam mengintegrasikan penelitian dan pengabdian kepada masyarakat dengan kebutuhan nyata masyarakat serta perkembangan ilmu pengetahuan dan teknologi. Melalui berbagai program yang terencana dan berkelanjutan, LPPM mendorong dosen dan mahasiswa menghasilkan karya akademik yang bernilai ilmiah sekaligus bermanfaat nyata bagi masyarakat.</p>
      </div>
    </div>
  </div>

  {{-- Peran & Fungsi --}}
  <div class="sp-section">
    <div class="sp-section-head">
      <div class="sp-accent" style="background:#f59e0b;"></div>
      <span class="sp-section-title">Peran dan Fungsi LPPM</span>
    </div>
    <div class="sp-section-body">
      <div class="sp-prose">
        <p>Dalam bidang penelitian, LPPM mendorong pengembangan ilmu pengetahuan melalui kegiatan riset terstruktur, baik yang bersifat fundamental maupun terapan. LPPM memfasilitasi dosen dan mahasiswa dalam mengakses pendanaan penelitian, baik dari sumber internal maupun hibah eksternal dari Kementerian Agama, Kemendikbudristek, dan lembaga mitra lainnya.</p>
        <p>Dalam bidang pengabdian kepada masyarakat, LPPM berkomitmen mendampingi dan memberdayakan masyarakat melalui program yang berpijak pada kearifan lokal dan nilai-nilai keislaman — mencakup KKN, pelatihan, penyuluhan, dan pemberdayaan ekonomi berbasis potensi desa.</p>
        <p>LPPM juga mengelola dua jurnal ilmiah, yakni <strong style="color:#1e293b; font-weight:600;">Jurnal Al Basirah</strong> dan <strong style="color:#1e293b; font-weight:600;">Jurnal Lisyabab</strong>, sebagai media diseminasi hasil penelitian civitas akademika STAIMAS Wonogiri kepada khalayak ilmiah yang lebih luas.</p>
      </div>
    </div>
  </div>

  {{-- Luaran --}}
  <div class="sp-section">
    <div class="sp-section-head">
      <div class="sp-accent" style="background:#10b981;"></div>
      <span class="sp-section-title">Luaran dan Capaian</span>
    </div>
    <div class="sp-section-body">
      <div class="sp-luaran-grid">
        <div class="sp-luaran-item">
          <div class="sp-luaran-icon" style="background:#f0fdf4; color:#047857;"><i class="fas fa-file-alt"></i></div>
          <div>
            <div class="sp-luaran-name">Artikel & Publikasi Ilmiah</div>
            <div class="sp-luaran-desc">Hasil penelitian dipublikasikan pada jurnal nasional dan internasional terindeks.</div>
          </div>
        </div>
        <div class="sp-luaran-item">
          <div class="sp-luaran-icon" style="background:#fffbeb; color:#b45309;"><i class="fas fa-map-marked-alt"></i></div>
          <div>
            <div class="sp-luaran-name">Program KKN</div>
            <div class="sp-luaran-desc">Kegiatan pengabdian mahasiswa di desa-desa binaan STAIMAS Wonogiri.</div>
          </div>
        </div>
        <div class="sp-luaran-item">
          <div class="sp-luaran-icon" style="background:#f0f9ff; color:#0369a1;"><i class="fas fa-certificate"></i></div>
          <div>
            <div class="sp-luaran-name">Hak Kekayaan Intelektual</div>
            <div class="sp-luaran-desc">Pendampingan pengajuan HKI bagi karya-karya dosen dan mahasiswa.</div>
          </div>
        </div>
        <div class="sp-luaran-item">
          <div class="sp-luaran-icon" style="background:#faf5ff; color:#7c3aed;"><i class="fas fa-handshake"></i></div>
          <div>
            <div class="sp-luaran-name">Kemitraan Strategis</div>
            <div class="sp-luaran-desc">Kerjasama dengan instansi pemerintah, swasta, dan komunitas lokal.</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Komitmen --}}
  <div class="sp-komitmen">
    <div class="sp-komitmen-icon">
      <i class="fas fa-star" style="color:#fbbf24; font-size:16px;"></i>
    </div>
    <div>
      <div class="sp-komitmen-label">Komitmen LPPM</div>
      <div class="sp-komitmen-text">Dengan semangat kolaborasi, integritas akademik, dan dedikasi penuh terhadap pengembangan ilmu pengetahuan yang berlandaskan nilai-nilai keislaman, LPPM STAIMAS Wonogiri berkomitmen untuk terus berkontribusi nyata bagi kemajuan civitas akademika, masyarakat, dan bangsa.</div>
    </div>
  </div>

</div>

@endsection
