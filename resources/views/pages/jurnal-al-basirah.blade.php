@extends('layouts.app')

@section('title', 'Jurnal Al-Basirah – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Jurnal Al-Basirah')
@section('hero-subtitle', 'Jurnal Ilmiah Penelitian & Pengabdian Masyarakat STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Jurnal Al-Basirah')

@section('content')
<style>
  .pg-wrap { max-width: 860px; margin: 0 auto; padding: 40px 20px; }
  .pg-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
  .pg-card-head { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; }
  .pg-card-head h3 { margin: 0; font-size: 15px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: 0.05em; display: flex; align-items: center; gap: 10px; }
  .pg-card-head h3 i { color: #074e50; font-size: 16px; }
  .pg-card-body { padding: 28px; font-size: 14px; line-height: 1.8; color: #334155; }
  .pg-badge { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; padding: 4px 12px; border-radius: 9999px; }
  .badge-teal { background: #f0fdf4; color: #074e50; border: 1px solid #bbf7d0; }
  .badge-amber { background: #fffbeb; color: #b45309; border: 1px solid #fef3c7; }
</style>

<div class="pg-wrap">

  <!-- HERO JOURNAL HEADER CARD -->
  <div class="pg-card" style="border-top: 4px solid #074e50;">
    <div class="pg-card-body" style="padding: 32px;">
      <div style="display: flex; flex-direction: column; gap: 24px; align-items: flex-start;">
        <div style="width: 80px; height: 100px; background: linear-gradient(135deg, #074e50, #0a696c); border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: white; box-shadow: 0 4px 12px rgba(7,78,80,0.25); flex-shrink: 0; text-align: center; padding: 8px;">
          <i class="fas fa-journal-whills" style="font-size: 28px; margin-bottom: 6px;"></i>
          <span style="font-size: 9px; font-weight: 800; letter-spacing: 0.1em;">AL-BASIRAH</span>
        </div>
        <div style="flex: 1;">
          <div style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap;">
            <span class="pg-badge badge-teal">E-Journal Terakreditasi</span>
            <span class="pg-badge badge-amber">Frekuensi: 2 Kali / Tahun</span>
          </div>
          <h2 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.02em;">Jurnal Al-Basirah</h2>
          <p style="margin: 0; color: #475569; font-size: 14px; line-height: 1.7;">
            Jurnal Al-Basirah merupakan wadah publikasi ilmiah berkala yang diterbitkan oleh Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) STAIMAS Wonogiri. Jurnal ini memuat hasil penelitian dan kajian kritis dalam bidang Studi Islam, Hukum Ekonomi Syariah, serta Pendidikan Agama Islam.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- FOCUS & SCOPE GRID -->
  <div class="pg-card">
    <div class="pg-card-head">
      <h3><i class="fas fa-bullseye"></i> Fokus & Cakupan (Focus & Scope)</h3>
    </div>
    <div class="pg-card-body">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
        <div style="padding: 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #074e50; font-size: 14px; margin-bottom: 4px;"><i class="fas fa-book-open" style="margin-right: 6px;"></i> Studi Islam & Pemikiran</div>
          <p style="font-size: 13px; color: #64748b; margin: 0;">Kajian kontemporer keislaman, tafsir, hadis, serta perkembangan pemikiran Islam modern.</p>
        </div>
        <div style="padding: 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #074e50; font-size: 14px; margin-bottom: 4px;"><i class="fas fa-balance-scale" style="margin-right: 6px;"></i> Hukum & Ekonomi Syariah</div>
          <p style="font-size: 13px; color: #64748b; margin: 0;">Riset muamalah, perbankan syariah, manajemen keuangan Islam, dan hukum keluarga Islam.</p>
        </div>
        <div style="padding: 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #074e50; font-size: 14px; margin-bottom: 4px;"><i class="fas fa-graduation-cap" style="margin-right: 6px;"></i> Pendidikan Agama Islam</div>
          <p style="font-size: 13px; color: #64748b; margin: 0;">Inovasi pembelajaran, kurikulum pendidikan Islam, metodologi pengajaran, dan manajemen madrasah/pesantren.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- INFORMASI REDAKSI & AKSES PORTAL -->
  <div class="pg-card">
    <div class="pg-card-head">
      <h3><i class="fas fa-external-link-alt"></i> Portal Akses OJS & Pengiriman Artikel</h3>
    </div>
    <div class="pg-card-body">
      <p style="margin-top: 0; margin-bottom: 20px;">
        Seluruh proses penerimaan naskah, penelaahan (peer-review), hingga penerbitan Jurnal Al-Basirah dilakukan secara fully online melalui Open Journal System (OJS).
      </p>
      <div style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="https://e-journal.staimaswonogiri.ac.id/index.php/albasirah" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #074e50; color: white; padding: 12px 24px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; box-shadow: 0 2px 6px rgba(7,78,80,0.2);">
          <i class="fas fa-globe"></i> Kunjungi Portal Jurnal Al-Basirah
        </a>
        <a href="{{ route('dokumen') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #f1f5f9; color: #334155; padding: 12px 24px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; border: 1px solid #cbd5e1;">
          <i class="fas fa-file-download"></i> Unduh Template Artikel
        </a>
      </div>
    </div>
  </div>

</div>
@endsection