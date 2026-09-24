@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px;">

  <!-- Welcome Banner -->
  <div style="background: linear-gradient(135deg, #1c2434, #074e50); color: white; border-radius: 20px; padding: 32px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
    <span style="background: rgba(255,255,255,0.15); color: #38bdf8; font-size: 11px; font-weight: 800; padding: 4px 12px; border-radius: 9999px; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: 8px;">
      Sistem Admin LPPM STAIMAS
    </span>
    <h1 style="font-size: 24px; font-weight: 800; margin: 0 0 6px 0;">Selamat Datang, Administrator!</h1>
    <p style="font-size: 13px; color: #cbd5e1; margin: 0; max-width: 600px; line-height: 1.6;">
      Kelola file dokumen panduan/template unduhan dan galeri foto dokumentasi kegiatan LPPM STAIMAS Wonogiri.
    </p>
  </div>

  <!-- 2 MAIN WIDGETS CARDS -->
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
    
    <!-- Widget 1: Kelola Dokumen -->
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); display: flex; justify-content: space-between; align-items: center;">
      <div>
        <span style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; tracking: 0.08em; display: block; margin-bottom: 4px;">PANDUAN & UNDUHAN</span>
        <h3 style="font-size: 24px; font-weight: 800; color: #0f172a; margin: 0 0 16px 0;">
          {{ $totalDokumen }} <span style="font-size: 13px; color: #64748b; font-weight: 600;">File Dokumen</span>
        </h3>
        <a href="{{ route('admin.dokumen.index') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #074e50; color: white; padding: 10px 18px; border-radius: 12px; font-size: 12px; font-weight: 800; text-decoration: none;">
          <i class="fas fa-folder-open"></i> Kelola Dokumen &rarr;
        </a>
      </div>
      <div style="width: 64px; height: 64px; background: #fffbeb; border-radius: 16px; border: 1px solid #fef3c7; display: flex; align-items: center; justify-content: center; color: #d97706; font-size: 28px;">
        <i class="fas fa-file-alt"></i>
      </div>
    </div>

    <!-- Widget 2: Kelola Dokumentasi -->
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); display: flex; justify-content: space-between; align-items: center;">
      <div>
        <span style="font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; tracking: 0.08em; display: block; margin-bottom: 4px;">GALERI FOTO REL KERETA</span>
        <h3 style="font-size: 24px; font-weight: 800; color: #0f172a; margin: 0 0 16px 0;">
          {{ $totalDokumentasi }} <span style="font-size: 13px; color: #64748b; font-weight: 600;">Foto Kegiatan</span>
        </h3>
        <a href="{{ route('admin.dokumentasi.index') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #059669; color: white; padding: 10px 18px; border-radius: 12px; font-size: 12px; font-weight: 800; text-decoration: none;">
          <i class="fas fa-camera"></i> Kelola Dokumentasi &rarr;
        </a>
      </div>
      <div style="width: 64px; height: 64px; background: #ecfdf5; border-radius: 16px; border: 1px solid #a7f3d0; display: flex; align-items: center; justify-content: center; color: #059669; font-size: 28px;">
        <i class="fas fa-images"></i>
      </div>
    </div>

  </div>

</div>
@endsection