@extends('layouts.app')

@section('title', 'Visi dan Misi – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Visi & Misi')
@section('hero-subtitle', 'Pedoman dan tujuan utama LPPM STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Visi dan Misi')
@section('hero-icon', 'fas fa-bullseye')

@section('content')

<style>
.vm-wrap { max-width: 860px; margin: 0 auto; padding: 40px 20px; }
.vm-card { background: #fff; border: 1px solid #e8ecf0; border-radius: 16px; margin-bottom: 24px; overflow: hidden; }
.vm-card-head { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; gap: 10px; }
.vm-dot { width: 4px; height: 20px; border-radius: 99px; flex-shrink: 0; }
.vm-label { font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; }
.vm-title { font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.06em; color: #1e293b; }
.vm-card-body { padding: 28px; }
.vm-quote { border-left: 3px solid #074e50; padding-left: 20px; font-size: 14.5px; color: #334155; line-height: 1.85; font-style: italic; }
.vm-misi-list { display: flex; flex-direction: column; gap: 10px; }
.vm-misi-item { display: flex; align-items: flex-start; gap: 14px; padding: 14px 16px; background: #f8fafc; border: 1px solid #e8ecf0; border-radius: 10px; }
.vm-num { width: 24px; height: 24px; background: #074e50; color: #fff; font-size: 11px; font-weight: 800; border-radius: 7px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px; }
.vm-misi-text { font-size: 13.5px; color: #475569; line-height: 1.75; }
.vm-tujuan-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media(max-width:600px){ .vm-tujuan-grid { grid-template-columns: 1fr; } }
.vm-tujuan-item { display: flex; gap: 14px; padding: 14px 16px; background: #f8fafc; border: 1px solid #e8ecf0; border-radius: 10px; align-items: flex-start; }
.vm-tujuan-icon { width: 32px; height: 32px; background: #f0fdf4; color: #074e50; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 12px; }
.vm-tujuan-text { font-size: 13px; color: #475569; line-height: 1.7; }
.vm-nilai-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
@media(max-width:600px){ .vm-nilai-grid { grid-template-columns: 1fr; } }
.vm-nilai-card { background: #fff; border: 1px solid #e8ecf0; border-radius: 14px; padding: 24px 20px; text-align: center; }
.vm-nilai-icon { width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 14px; font-size: 15px; }
.vm-nilai-name { font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 8px; }
.vm-nilai-desc { font-size: 12.5px; color: #64748b; line-height: 1.65; }
</style>

<div class="vm-wrap">

  {{-- VISI --}}
  <div class="vm-card">
    <div class="vm-card-head">
      <div class="vm-dot" style="background:#074e50;"></div>
      <div>
        <div class="vm-label" style="color:#074e50;">Visi</div>
        <div class="vm-title">Visi LPPM STAIMAS Wonogiri</div>
      </div>
    </div>
    <div class="vm-card-body">
      <div class="vm-quote">
        "Menjadi lembaga penelitian dan pengabdian kepada masyarakat yang unggul, inovatif, produktif, dan berlandaskan nilai-nilai keislaman dalam rangka mewujudkan tridharma perguruan tinggi yang berkualitas dan berdampak nyata bagi masyarakat."
      </div>
    </div>
  </div>

  {{-- MISI --}}
  <div class="vm-card">
    <div class="vm-card-head">
      <div class="vm-dot" style="background:#f59e0b;"></div>
      <div>
        <div class="vm-label" style="color:#b45309;">Misi</div>
        <div class="vm-title">Misi LPPM STAIMAS Wonogiri</div>
      </div>
    </div>
    <div class="vm-card-body">
      <div class="vm-misi-list">
        @foreach([
          'Merencanakan, melaksanakan, dan mengoordinasikan kegiatan penelitian yang bermutu dan relevan dengan kebutuhan masyarakat serta perkembangan ilmu pengetahuan.',
          'Menyelenggarakan program pengabdian kepada masyarakat yang berpijak pada nilai-nilai keislaman, kearifan lokal, dan potensi komunitas setempat.',
          'Mendorong dan memfasilitasi publikasi ilmiah dosen dan mahasiswa pada jurnal terakreditasi nasional maupun internasional.',
          'Meningkatkan kapasitas sumber daya manusia dalam bidang penelitian, penulisan ilmiah, dan pengabdian masyarakat secara berkelanjutan.',
          'Membangun kemitraan strategis dengan instansi pemerintah, lembaga swadaya masyarakat, dan dunia usaha dalam pengembangan penelitian dan pengabdian.',
        ] as $i => $m)
        <div class="vm-misi-item">
          <div class="vm-num">{{ $i + 1 }}</div>
          <div class="vm-misi-text">{{ $m }}</div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  {{-- TUJUAN --}}
  <div class="vm-card">
    <div class="vm-card-head">
      <div class="vm-dot" style="background:#10b981;"></div>
      <div>
        <div class="vm-label" style="color:#059669;">Tujuan</div>
        <div class="vm-title">Tujuan LPPM STAIMAS Wonogiri</div>
      </div>
    </div>
    <div class="vm-card-body">
      <div class="vm-tujuan-grid">
        <div class="vm-tujuan-item">
          <div class="vm-tujuan-icon"><i class="fas fa-microscope"></i></div>
          <div class="vm-tujuan-text">Menghasilkan karya penelitian berkualitas yang bermanfaat bagi pengembangan ilmu pengetahuan dan pemecahan masalah nyata di masyarakat.</div>
        </div>
        <div class="vm-tujuan-item">
          <div class="vm-tujuan-icon"><i class="fas fa-users"></i></div>
          <div class="vm-tujuan-text">Mewujudkan pengabdian masyarakat yang berdampak luas berbasis keilmuan, keislaman, dan kearifan lokal daerah.</div>
        </div>
        <div class="vm-tujuan-item">
          <div class="vm-tujuan-icon"><i class="fas fa-book"></i></div>
          <div class="vm-tujuan-text">Meningkatkan jumlah publikasi ilmiah dosen dan mahasiswa STAIMAS Wonogiri pada jurnal terakreditasi.</div>
        </div>
        <div class="vm-tujuan-item">
          <div class="vm-tujuan-icon"><i class="fas fa-link"></i></div>
          <div class="vm-tujuan-text">Memperluas jaringan kemitraan dengan berbagai pemangku kepentingan untuk mendukung pengembangan lembaga.</div>
        </div>
      </div>
    </div>
  </div>

  {{-- NILAI --}}
  <div class="vm-nilai-grid">
    <div class="vm-nilai-card">
      <div class="vm-nilai-icon" style="background:#f0fdf4; color:#047857;">
        <i class="fas fa-shield-alt"></i>
      </div>
      <div class="vm-nilai-name">Integritas</div>
      <div class="vm-nilai-desc">Menjunjung kejujuran dan tanggung jawab dalam setiap kegiatan akademik.</div>
    </div>
    <div class="vm-nilai-card">
      <div class="vm-nilai-icon" style="background:#fffbeb; color:#b45309;">
        <i class="fas fa-lightbulb"></i>
      </div>
      <div class="vm-nilai-name">Inovasi</div>
      <div class="vm-nilai-desc">Mendorong kreativitas dan pembaruan dalam penelitian dan pengabdian masyarakat.</div>
    </div>
    <div class="vm-nilai-card">
      <div class="vm-nilai-icon" style="background:#f0f9ff; color:#0369a1;">
        <i class="fas fa-globe"></i>
      </div>
      <div class="vm-nilai-name">Kebermanfaatan</div>
      <div class="vm-nilai-desc">Berorientasi pada dampak nyata bagi masyarakat dan kemajuan bangsa.</div>
    </div>
  </div>

</div>

@endsection
