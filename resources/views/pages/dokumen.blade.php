@extends('layouts.app')

@section('title', 'Dokumen & Unduhan – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Dokumen & Panduan')
@section('hero-subtitle', 'Pusat Unduhan Panduan Penelitian, Pengabdian, dan Format Laporan LPPM')
@section('hero-breadcrumb', 'Dokumen')

@section('content')
<style>
  .pg-wrap { max-width: 900px; margin: 0 auto; padding: 40px 20px; }
  .pg-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
  .pg-card-head { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; }
  .pg-card-head h3 { margin: 0; font-size: 15px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: 0.05em; display: flex; align-items: center; gap: 10px; }
  .pg-card-head h3 i { color: #074e50; font-size: 16px; }
  .pg-card-body { padding: 28px; font-size: 14px; line-height: 1.8; color: #334155; }
  
  .doc-item { display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; border-radius: 14px; border: 1px solid #e2e8f0; background: #f8fafc; transition: all 0.2s ease; margin-bottom: 14px; }
  .doc-item:hover { border-color: #074e50; background: #fff; box-shadow: 0 4px 12px rgba(7,78,80,0.08); }
</style>

<div class="pg-wrap">

  <div class="pg-card" style="border-top: 4px solid #074e50;">
    <div class="pg-card-head">
      <h3><i class="fas fa-folder-open"></i> Dokumen & Panduan Resmi LPPM</h3>
      <span style="font-size: 11px; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 4px 12px; border-radius: 9999px;">
        {{ $dokumens->count() }} Dokumen Terpublikasi
      </span>
    </div>
    <div class="pg-card-body">

      @if($dokumens->isEmpty())
        <!-- STATE KOSONG -->
        <div style="text-align: center; padding: 60px 20px; background: #f8fafc; border-radius: 16px; border: 2px dashed #e2e8f0;">
          <div style="width: 72px; height: 72px; background: #fffbeb; border-radius: 9999px; display: inline-flex; align-items: center; justify-content: center; color: #d97706; font-size: 32px; margin-bottom: 16px;">
            <i class="fas fa-folder-open"></i>
          </div>
          <h4 style="font-size: 18px; font-weight: 800; color: #0f172a; margin: 0 0 6px 0;">Dokumen Sedang Diperbarui</h4>
          <p style="color: #64748b; font-size: 13px; max-width: 440px; margin: 0 auto 20px auto; line-height: 1.6;">
            File panduan penelitian, PkM, dan template laporan akan diunggah oleh administrator LPPM STAIMAS Wonogiri.
          </p>
          <a href="{{ route('home') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #074e50; color: white; padding: 10px 20px; border-radius: 10px; font-weight: 700; font-size: 12px; text-decoration: none;">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
          </a>
        </div>
      @else
        <!-- DAFTAR DOKUMEN DINAMIS -->
        @foreach($dokumens as $dok)
          @php
            $targetUrl = \Illuminate\Support\Str::startsWith($dok->file_path, ['http://', 'https://']) ? $dok->file_path : asset($dok->file_path);
            $iconClass = 'fa-file-pdf';
            $iconBg = '#f0fdf4';
            $iconColor = '#074e50';

            if ($dok->file_type == 'doc' || $dok->file_type == 'docx') {
              $iconClass = 'fa-file-word';
              $iconBg = '#eff6ff';
              $iconColor = '#2563eb';
            } elseif ($dok->file_type == 'link') {
              $iconClass = 'fa-link';
              $iconBg = '#fffbeb';
              $iconColor = '#d97706';
            }
          @endphp

          <div class="doc-item">
            <div style="display: flex; align-items: center; gap: 16px; flex: 1;">
              <div style="width: 44px; height: 44px; border-radius: 12px; background: {{ $iconBg }}; color: {{ $iconColor }}; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;">
                <i class="fas {{ $iconClass }}"></i>
              </div>
              <div style="flex: 1;">
                <div style="display: flex; gap: 8px; align-items: center; margin-bottom: 2px;">
                  <span style="font-size: 10px; font-weight: 800; color: #074e50; background: #f0fdf4; padding: 2px 8px; border-radius: 9999px; text-transform: uppercase; border: 1px solid #bbf7d0;">
                    {{ $dok->kategori }}
                  </span>
                  <span style="font-size: 11px; color: #94a3b8; font-weight: 600;">
                    {{ \Carbon\Carbon::parse($dok->created_at)->format('d M Y') }}
                  </span>
                </div>
                <div style="font-weight: 800; color: #0f172a; font-size: 14px; line-height: 1.4;">{{ $dok->judul }}</div>
              </div>
            </div>

            <a href="{{ $targetUrl }}" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #074e50; color: white; padding: 10px 20px; border-radius: 10px; font-size: 12px; font-weight: 800; text-decoration: none; flex-shrink: 0; box-shadow: 0 2px 6px rgba(7,78,80,0.15);">
              <i class="fas fa-download"></i> Unduh
            </a>
          </div>
        @endforeach
      @endif

    </div>
  </div>

</div>
@endsection