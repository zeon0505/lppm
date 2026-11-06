@extends('layouts.app')

@section('title', 'Berita – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Berita & Pengumuman')
@section('hero-subtitle', 'Informasi terkini seputar kegiatan dan publikasi LPPM STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Berita')

@section('content')
<style>
  .bn-wrap {
    max-width: 1140px;
    margin: 0 auto;
    padding: 48px 20px;
  }
  .bn-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
  }
  @media (max-width: 900px) {
    .bn-grid { grid-template-columns: repeat(2, 1fr); }
  }
  @media (max-width: 580px) {
    .bn-grid { grid-template-columns: 1fr; }
  }

  .bn-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #e9edf2;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    display: flex;
    flex-direction: column;
    transition: transform 0.22s ease, box-shadow 0.22s ease;
    text-decoration: none;
    color: inherit;
  }
  .bn-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 32px rgba(7,78,80,0.12);
  }

  /* ── Gambar ── */
  .bn-thumb {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: #e2e8f0;
    flex-shrink: 0;
  }
  .bn-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }
  .bn-card:hover .bn-thumb img {
    transform: scale(1.04);
  }
  .bn-thumb-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f0fdf4, #dcfce7);
  }

  /* Badge kategori */
  .bn-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: #074e50;
    color: #fff;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    padding: 4px 10px;
    border-radius: 6px;
  }

  /* ── Body ── */
  .bn-body {
    padding: 18px 20px 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .bn-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 11px;
    color: #94a3b8;
    margin-bottom: 10px;
  }
  .bn-meta i { color: #074e50; margin-right: 3px; }

  .bn-title {
    font-size: 14px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.45;
    margin: 0 0 10px 0;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .bn-excerpt {
    font-size: 12px;
    color: #64748b;
    line-height: 1.65;
    margin: 0 0 14px 0;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .bn-read {
    font-size: 12px;
    font-weight: 700;
    color: #074e50;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
  }
  .bn-read:hover { text-decoration: underline; }
  .bn-read i { transition: transform 0.2s; }
  .bn-card:hover .bn-read i { transform: translateX(3px); }

  /* Pagination */
  .bn-pagination {
    margin-top: 44px;
    display: flex;
    justify-content: center;
  }
  .bn-pagination nav { display: flex; gap: 6px; align-items: center; flex-wrap: wrap; justify-content: center; }
  .bn-pagination span, .bn-pagination a {
    padding: 7px 14px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 700;
    border: 1px solid #e2e8f0;
    color: #334155;
    text-decoration: none;
    background: #fff;
  }
  .bn-pagination a:hover { background: #f0fdf4; border-color: #074e50; color: #074e50; }
  .bn-pagination [aria-current="page"] span, .bn-pagination span[aria-current="page"] {
    background: #074e50 !important;
    color: #fff !important;
    border-color: #074e50 !important;
  }
</style>

<div class="bn-wrap">

  @if($beritas->isEmpty())
    <div style="text-align:center; padding:70px 20px; background:#f8fafc; border-radius:20px; border:1px dashed #cbd5e1;">
      <div style="font-size:48px; margin-bottom:16px; opacity:0.4;">📰</div>
      <h4 style="font-size:18px; font-weight:800; color:#0f172a; margin:0 0 8px 0;">Belum Ada Berita</h4>
      <p style="font-size:13px; color:#64748b; margin:0;">Admin belum mempublikasikan berita apapun.</p>
    </div>
  @else
    <div class="bn-grid">
      @foreach($beritas as $b)
        <a href="{{ route('berita.show', $b->slug) }}" class="bn-card reveal">

          {{-- Thumbnail --}}
          <div class="bn-thumb">
            @php
              $bThumb = $b->foto ? (\Illuminate\Support\Str::startsWith($b->foto, ['http://', 'https://']) ? $b->foto : asset($b->foto)) : null;
            @endphp
            @if($bThumb)
              <img src="{{ $bThumb }}" alt="{{ $b->judul }}">
            @else
              <div class="bn-thumb-placeholder">
                <i class="fas fa-newspaper" style="font-size:44px; color:#a7f3d0;"></i>
              </div>
            @endif
            <span class="bn-badge">{{ $b->kategori }}</span>
          </div>

          {{-- Body --}}
          <div class="bn-body">
            <div class="bn-meta">
              <span><i class="fas fa-calendar-alt"></i>{{ $b->tanggal->format('d F Y') }}</span>
            </div>
            <h3 class="bn-title">{{ $b->judul }}</h3>
            <p class="bn-excerpt">
              @if($b->ringkasan)
                {{ $b->ringkasan }}
              @else
                {{ Str::limit(strip_tags($b->isi), 110) }}
              @endif
            </p>
            <span class="bn-read">Baca Selengkapnya <i class="fas fa-arrow-right" style="font-size:10px;"></i></span>
          </div>

        </a>
      @endforeach
    </div>

    {{-- Pagination --}}
    @if($beritas->hasPages())
      <div class="bn-pagination">
        {{ $beritas->links() }}
      </div>
    @endif
  @endif

</div>
@endsection
