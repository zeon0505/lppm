@extends('layouts.app')

@section('title', ($page->title ?? 'Halaman') . ' – LPPM STAIMAS Wonogiri')
@section('hero-title', $page->title ?? 'LPPM STAIMAS')
@section('hero-subtitle', $page->subtitle ?? 'Lembaga Penelitian dan Pengabdian kepada Masyarakat STAIMAS Wonogiri')
@section('hero-breadcrumb', $page->title ?? 'Halaman')

@section('content')
<style>
  .pg-wrap { max-width: 860px; margin: 0 auto; padding: 40px 20px; }
  .pg-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
  .pg-card-head { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; }
  .pg-card-head h3 { margin: 0; font-size: 15px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: 0.05em; display: flex; align-items: center; gap: 10px; }
  .pg-card-head h3 i { color: #074e50; font-size: 16px; }
  .pg-card-body { padding: 28px; font-size: 14px; line-height: 1.8; color: #334155; }
</style>

<div class="pg-wrap">
  <div class="pg-card" style="border-top: 4px solid #074e50;">
    <div class="pg-card-head">
      <h3><i class="fas fa-file-alt"></i> {{ $page->title ?? 'Informasi' }}</h3>
    </div>
    <div class="pg-card-body">
      @if(isset($page->content) && !empty($page->content))
        {!! $page->content !!}
      @else
        <div style="text-align: center; padding: 20px 0;">
          <div style="width: 56px; height: 56px; background: #f0fdf4; border-radius: 9999px; display: inline-flex; align-items: center; justify-content: center; color: #074e50; font-size: 22px; margin-bottom: 12px;">
            <i class="fas fa-info-circle"></i>
          </div>
          <p style="margin: 0; color: #64748b; font-size: 14px;">Konten halaman sedang diperbarui oleh pengelola LPPM STAIMAS Wonogiri.</p>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
