<style>
.pg-wrap { max-width: 860px; margin: 0 auto; padding: 40px 20px; }
.pg-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; margin-bottom: 24px; }
.pg-card-head { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; gap: 10px; }
.pg-dot { width: 4px; height: 20px; border-radius: 99px; flex-shrink: 0; }
.pg-card-title { font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #1e293b; }
.pg-card-body { padding: 28px; font-size: 14px; color: #475569; line-height: 1.85; }
.pg-card-body p { margin-bottom: 14px; }
.pg-card-body p:last-child { margin-bottom: 0; }
.pg-info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media(max-width:580px){ .pg-info-grid { grid-template-columns: 1fr; } }
.pg-info-item { background: #f8fafc; border: 1px solid #e8ecf0; border-radius: 10px; padding: 16px 18px; display: flex; align-items: flex-start; gap: 14px; }
.pg-info-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 13px; }
.pg-info-label { font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 3px; }
.pg-info-value { font-size: 13px; color: #1e293b; font-weight: 600; }
.pg-empty { text-align: center; padding: 60px 28px; }
.pg-empty-icon { width: 52px; height: 52px; background: #f8fafc; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
.pg-empty-title { font-size: 14px; font-weight: 700; color: #334155; margin-bottom: 8px; }
.pg-empty-desc { font-size: 13px; color: #94a3b8; line-height: 1.7; max-width: 340px; margin: 0 auto 24px; }
.pg-btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: #074e50; color: #fff; font-size: 13px; font-weight: 600; border-radius: 10px; text-decoration: none; }
.pg-btn:hover { background: #053c3e; }
</style>@extends("layouts.app")
@section("title", "Sejarah – LPPM STAIMAS Wonogiri")
@section("hero-title", "Sejarah LPPM")
@section("hero-subtitle", "Perjalanan Lembaga Penelitian dan Pengabdian kepada Masyarakat STAIMAS Wonogiri")
@section("hero-breadcrumb", "Sejarah")
@section("hero-icon", "fas fa-history")
@section("content")
<div class="pg-wrap">
  <div class="pg-card">
    <div class="pg-card-head">
      <div class="pg-dot" style="background:#074e50;"></div>
      <div class="pg-card-title">Latar Belakang Pembentukan</div>
    </div>
    <div class="pg-card-body">
      <p>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) STAIMAS Wonogiri didirikan sebagai wujud komitmen institusi terhadap pelaksanaan tri dharma perguruan tinggi secara menyeluruh dan terstruktur. Kehadiran LPPM menjadi tonggak penting dalam perjalanan akademik STAIMAS Wonogiri.</p>
      <p>Sejak berdirinya STAIMAS Wonogiri, kegiatan penelitian dan pengabdian telah menjadi bagian dari budaya akademik civitas. Namun, untuk memperkuat tata kelola dan koordinasinya, dibentuklah LPPM sebagai lembaga khusus yang bertanggung jawab atas perencanaan, pelaksanaan, dan pengembangan kedua bidang tersebut.</p>
    </div>
  </div>
  <div class="pg-card">
    <div class="pg-card-head">
      <div class="pg-dot" style="background:#f59e0b;"></div>
      <div class="pg-card-title">Perkembangan Lembaga</div>
    </div>
    <div class="pg-card-body">
      <p>Seiring berkembangnya STAIMAS Wonogiri, LPPM terus mengalami penguatan kapasitas kelembagaan, baik dari sisi sumber daya manusia, regulasi internal, maupun jangkauan program. LPPM aktif mendorong dosen dan mahasiswa untuk terlibat dalam penelitian yang berdampak nyata serta pengabdian yang menyentuh kebutuhan masyarakat.</p>
      <p>Kini, LPPM STAIMAS Wonogiri mengelola dua jurnal ilmiah, yakni <strong style="color:#1e293b;">Jurnal Al Basirah</strong> dan <strong style="color:#1e293b;">Jurnal Lisyabab</strong>, serta mengoordinasikan berbagai program KKN dan kemitraan strategis dengan berbagai pihak.</p>
    </div>
  </div>
</div>
@endsection
