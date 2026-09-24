@extends('layouts.app')

@section('title', 'Jurnal Li Syabab – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Jurnal Li Syabab')
@section('hero-subtitle', 'Jurnal Pemikiran & Pendidikan Islam Mahasiswa/Dosen STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Jurnal Li Syabab')

@section('content')
<style>
  .pg-wrap { max-width: 860px; margin: 0 auto; padding: 40px 20px; }
  .pg-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
  .pg-card-head { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; }
  .pg-card-head h3 { margin: 0; font-size: 15px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: 0.05em; display: flex; align-items: center; gap: 10px; }
  .pg-card-head h3 i { color: #d97706; font-size: 16px; }
  .pg-card-body { padding: 28px; font-size: 14px; line-height: 1.8; color: #334155; }
  .pg-badge { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; padding: 4px 12px; border-radius: 9999px; }
  .badge-amber { background: #fffbeb; color: #b45309; border: 1px solid #fef3c7; }
  .badge-blue { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }
</style>

<div class="pg-wrap">

  <!-- HERO JOURNAL HEADER CARD -->
  <div class="pg-card" style="border-top: 4px solid #d97706;">
    <div class="pg-card-body" style="padding: 32px;">
      <div style="display: flex; flex-direction: column; gap: 24px; align-items: flex-start;">
        <div style="width: 80px; height: 100px; background: linear-gradient(135deg, #d97706, #b45309); border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: white; box-shadow: 0 4px 12px rgba(217,119,6,0.25); flex-shrink: 0; text-align: center; padding: 8px;">
          <i class="fas fa-feather-alt" style="font-size: 28px; margin-bottom: 6px;"></i>
          <span style="font-size: 9px; font-weight: 800; letter-spacing: 0.1em;">LI SYABAB</span>
        </div>
        <div style="flex: 1;">
          <div style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap;">
            <span class="pg-badge badge-amber">Jurnal Ilmiah Akademik</span>
            <span class="pg-badge badge-blue">Karya Mahasiswa & Dosen</span>
          </div>
          <h2 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.02em;">Jurnal Li Syabab</h2>
          <p style="margin: 0; color: #475569; font-size: 14px; line-height: 1.7;">
            Jurnal Li Syabab diterbitkan oleh LPPM STAIMAS Wonogiri sebagai media ilmiah berkala untuk mempublikasikan gagasan, hasil riset akademis, dan kajian reflektif para civitas akademika dalam rumpun studi keislaman dan kelembagaan masyarakat.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- FOCUS & SCOPE GRID -->
  <div class="pg-card">
    <div class="pg-card-head">
      <h3><i class="fas fa-search"></i> Ruang Lingkup Riset</h3>
    </div>
    <div class="pg-card-body">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
        <div style="padding: 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #b45309; font-size: 14px; margin-bottom: 4px;"><i class="fas fa-user-graduate" style="margin-right: 6px;"></i> Karya Ilmiah Mahasiswa</div>
          <p style="font-size: 13px; color: #64748b; margin: 0;">Skripsi pilihan, naskah riset lapangan, dan pengabdian berbasis komunitas.</p>
        </div>
        <div style="padding: 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #b45309; font-size: 14px; margin-bottom: 4px;"><i class="fas fa-lightbulb" style="margin-right: 6px;"></i> Inovasi Pengajaran</div>
          <p style="font-size: 13px; color: #64748b; margin: 0;">Metode pengajaran Pendidikan Islam kontemporer dan studi sosial keagamaan.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- AKSES PORTAL OJS -->
  <div class="pg-card">
    <div class="pg-card-head">
      <h3><i class="fas fa-upload"></i> Submisi & Akses Online</h3>
    </div>
    <div class="pg-card-body">
      <p style="margin-top: 0; margin-bottom: 20px;">
        Naskah dikirimkan melalui sistem OJS dengan mengikuti panduan penulisan yang berlaku di LPPM STAIMAS Wonogiri.
      </p>
      <div style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="https://e-journal.staimaswonogiri.ac.id/index.php/lisyabab" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #d97706; color: white; padding: 12px 24px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; box-shadow: 0 2px 6px rgba(217,119,6,0.2);">
          <i class="fas fa-globe"></i> Kunjungi Portal Jurnal Li Syabab
        </a>
        <a href="{{ route('dokumen') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #f1f5f9; color: #334155; padding: 12px 24px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; border: 1px solid #cbd5e1;">
          <i class="fas fa-file-alt"></i> Petunjuk Penulisan
        </a>
      </div>
    </div>
  </div>

</div>
@endsection