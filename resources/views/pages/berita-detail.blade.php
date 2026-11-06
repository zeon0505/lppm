@extends('layouts.app')

@section('title', $berita->judul . ' – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Berita & Pengumuman')
@section('hero-breadcrumb', 'Berita')

{{-- OG TAGS untuk share WhatsApp / Facebook / Twitter --}}
@push('og-tags')
  @php
    $ogImage = $berita->foto
      ? asset($berita->foto)
      : 'https://www.staimaswonogiri.ac.id/assest/LOGO%20STAIMAS%20AI.png';
    $ogDesc = $berita->ringkasan
      ? $berita->ringkasan
      : Str::limit(strip_tags($berita->isi), 160);
  @endphp
  <meta property="og:type"               content="article" />
  <meta property="og:site_name"          content="LPPM STAIMAS Wonogiri" />
  <meta property="og:title"              content="{{ $berita->judul }}" />
  <meta property="og:description"        content="{{ $ogDesc }}" />
  <meta property="og:url"               content="{{ url()->current() }}" />
  <meta property="og:image"             content="{{ $ogImage }}" />
  <meta property="og:image:secure_url"  content="{{ $ogImage }}" />
  <meta property="og:image:width"       content="1200" />
  <meta property="og:image:height"      content="630" />
  <meta property="article:published_time" content="{{ $berita->tanggal->toIso8601String() }}" />

  <meta name="twitter:card"        content="summary_large_image" />
  <meta name="twitter:title"       content="{{ $berita->judul }}" />
  <meta name="twitter:description" content="{{ $ogDesc }}" />
  <meta name="twitter:image"       content="{{ $ogImage }}" />
@endpush

@section('content')
<style>
  .bd-outer { max-width: 1100px; margin: 0 auto; padding: 44px 20px 60px; }

  /* ── Layout Grid ── */
  .bd-layout {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 32px;
    align-items: start;
  }
  @media (max-width: 820px) {
    .bd-layout { grid-template-columns: 1fr; }
  }

  /* ── Article Card ── */
  .bd-card {
    background: #fff;
    border: 1px solid #e9edf2;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  }
  .bd-cover-wrap {
    width: 100%;
    aspect-ratio: 16/9;
    overflow: hidden;
    background: #f0f4f8;
  }
  .bd-cover-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .bd-cover-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f0fdf4, #dcfce7);
  }

  /* ── Meta bar ── */
  .bd-meta-bar {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
    padding: 14px 24px 0;
    font-size: 12px;
    color: #64748b;
  }
  .bd-kat-badge {
    background: #f0fdf4;
    color: #074e50;
    border: 1px solid #bbf7d0;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    padding: 3px 12px;
    border-radius: 9999px;
  }
  .bd-meta-bar span { display: flex; align-items: center; gap: 5px; }
  .bd-meta-bar i { color: #074e50; }

  /* ── Article body ── */
  .bd-body { padding: 20px 24px 28px; }
  .bd-title {
    font-size: 22px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.35;
    margin: 0 0 20px 0;
  }
  .bd-ringkasan {
    background: #f8fafc;
    border-left: 4px solid #074e50;
    padding: 13px 18px;
    border-radius: 0 10px 10px 0;
    font-size: 14px;
    font-weight: 600;
    color: #334155;
    line-height: 1.65;
    margin-bottom: 24px;
  }
  .bd-isi {
    font-size: 15px;
    line-height: 1.9;
    color: #334155;
  }

  /* ── Prev / Next ── */
  .bd-prevnext {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin: 28px 24px 0;
    padding-top: 20px;
    border-top: 1px solid #f1f5f9;
  }
  .bd-prevnext-item {
    padding: 12px 14px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    text-decoration: none;
    transition: background 0.2s, border-color 0.2s;
  }
  .bd-prevnext-item:hover { background: #f8fafc; border-color: #074e50; }
  .bd-prevnext-label { font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 4px; }
  .bd-prevnext-title { font-size: 12px; font-weight: 700; color: #074e50; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
  .bd-prevnext-empty { font-size: 12px; color: #cbd5e1; display: flex; align-items: center; height: 100%; }

  /* ── Share bar ── */
  .bd-sharebar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    padding: 20px 24px 24px;
    border-top: 1px solid #f1f5f9;
    margin-top: 20px;
  }
  .bd-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #334155;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
  }
  .bd-back-btn:hover { color: #074e50; }
  .bd-share-btns { display: flex; align-items: center; gap: 8px; }
  .bd-share-label { font-size: 12px; font-weight: 700; color: #64748b; margin-right: 4px; }
  .bd-share-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    color: #fff;
    font-size: 15px;
    text-decoration: none;
    transition: opacity 0.2s, transform 0.2s;
  }
  .bd-share-btn:hover { opacity: 0.85; transform: scale(1.08); }
  .share-fb { background: #1877f2; }
  .share-wa { background: #25d366; }
  .share-tw { background: #000; }

  /* ── Sidebar ── */
  .bd-sidebar {}
  .bd-sidebar-card {
    background: #fff;
    border: 1px solid #e9edf2;
    border-radius: 14px;
    padding: 18px 18px 14px;
    margin-bottom: 20px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.04);
  }
  .bd-sidebar-heading {
    font-size: 13px;
    font-weight: 800;
    color: #0f172a;
    margin: 0 0 14px 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .bd-sidebar-heading::before {
    content: '';
    display: inline-block;
    width: 4px;
    height: 16px;
    background: #074e50;
    border-radius: 2px;
    flex-shrink: 0;
  }
  .bs-item {
    display: flex;
    gap: 10px;
    text-decoration: none;
    color: inherit;
    padding: 8px 0;
    border-bottom: 1px solid #f1f5f9;
    align-items: flex-start;
  }
  .bs-item:last-child { border-bottom: none; }
  .bs-item:hover .bs-title { color: #074e50; }
  .bs-thumb {
    width: 70px;
    height: 52px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
    background: #e2e8f0;
  }
  .bs-thumb img { width: 100%; height: 100%; object-fit: cover; }
  .bs-thumb-ph { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #f0fdf4; }
  .bs-info {}
  .bs-date { font-size: 10px; color: #94a3b8; display: block; margin-bottom: 3px; }
  .bs-title { font-size: 11px; font-weight: 700; color: #0f172a; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; transition: color 0.2s; }
</style>

<div class="bd-outer">

  {{-- Breadcrumb --}}
  <div style="margin-bottom:22px; font-size:12px; color:#64748b; display:flex; gap:6px; align-items:center; flex-wrap:wrap;">
    <a href="{{ route('home') }}" style="color:#074e50; font-weight:600; text-decoration:none;">Beranda</a>
    <i class="fas fa-chevron-right" style="font-size:9px;"></i>
    <a href="{{ route('berita') }}" style="color:#074e50; font-weight:600; text-decoration:none;">Berita</a>
    <i class="fas fa-chevron-right" style="font-size:9px;"></i>
    <span>{{ Str::limit($berita->judul, 55) }}</span>
  </div>

  <div class="bd-layout">

    {{-- ── ARTIKEL UTAMA ── --}}
    <div>
      <div class="bd-card">

        {{-- Cover Image --}}
        <div class="bd-cover-wrap">
          @if($berita->foto)
            <img src="{{ asset($berita->foto) }}" alt="{{ $berita->judul }}">
          @else
            <div class="bd-cover-placeholder">
              <i class="fas fa-newspaper" style="font-size:56px; color:#a7f3d0;"></i>
            </div>
          @endif
        </div>

        {{-- Meta bar --}}
        <div class="bd-meta-bar">
          <span class="bd-kat-badge">{{ $berita->kategori }}</span>
          <span><i class="fas fa-calendar-alt"></i> {{ $berita->tanggal->format('l, d F Y') }}</span>
          <span><i class="fas fa-user-edit"></i> Redaksi LPPM</span>
        </div>

        {{-- Body --}}
        <div class="bd-body">
          <h1 class="bd-title">{{ $berita->judul }}</h1>

          @if($berita->ringkasan)
            <div class="bd-ringkasan">{{ $berita->ringkasan }}</div>
          @endif

          <div class="bd-isi">
            {!! nl2br(e($berita->isi)) !!}
          </div>
        </div>

        {{-- Prev / Next --}}
        <div class="bd-prevnext">
          {{-- Prev --}}
          @if($prev)
            <a href="{{ route('berita.show', $prev->slug) }}" class="bd-prevnext-item" style="text-align:left;">
              <span class="bd-prevnext-label"><i class="fas fa-arrow-left" style="margin-right:4px;"></i> Post Sebelumnya</span>
              <span class="bd-prevnext-title">{{ $prev->judul }}</span>
            </a>
          @else
            <div class="bd-prevnext-item" style="opacity:0.4;">
              <span class="bd-prevnext-label">Post Sebelumnya</span>
              <span class="bd-prevnext-empty">Tidak ada berita sebelumnya</span>
            </div>
          @endif

          {{-- Next --}}
          @if($next)
            <a href="{{ route('berita.show', $next->slug) }}" class="bd-prevnext-item" style="text-align:right;">
              <span class="bd-prevnext-label">Post Selanjutnya <i class="fas fa-arrow-right" style="margin-left:4px;"></i></span>
              <span class="bd-prevnext-title">{{ $next->judul }}</span>
            </a>
          @else
            <div class="bd-prevnext-item" style="opacity:0.4; text-align:right;">
              <span class="bd-prevnext-label">Post Selanjutnya</span>
              <span class="bd-prevnext-empty" style="justify-content:flex-end;">Tidak ada berita selanjutnya</span>
            </div>
          @endif
        </div>

        {{-- Share Bar --}}
        @php
          $shareUrl  = urlencode(url()->current());
          $shareText = urlencode($berita->judul . ' – LPPM STAIMAS Wonogiri');
        @endphp
        <div class="bd-sharebar">
          <a href="{{ route('berita') }}" class="bd-back-btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Berita
          </a>
          <div class="bd-share-btns">
            <span class="bd-share-label">Bagikan:</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
               target="_blank" rel="noopener" class="bd-share-btn share-fb" title="Share ke Facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ $shareText }}%20{{ $shareUrl }}"
               target="_blank" rel="noopener" class="bd-share-btn share-wa" title="Share ke WhatsApp">
              <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}"
               target="_blank" rel="noopener" class="bd-share-btn share-tw" title="Share ke X/Twitter">
              <i class="fab fa-x-twitter"></i>
            </a>
          </div>
        </div>

      </div>
    </div>

    {{-- ── SIDEBAR ── --}}
    <div class="bd-sidebar">

      {{-- Berita Terkait --}}
      @if($lainnya->isNotEmpty())
      <div class="bd-sidebar-card">
        <h3 class="bd-sidebar-heading">Berita Terkait</h3>
        @foreach($lainnya as $b)
          <a href="{{ route('berita.show', $b->slug) }}" class="bs-item">
            <div class="bs-thumb">
              @if($b->foto)
                <img src="{{ asset($b->foto) }}" alt="{{ $b->judul }}">
              @else
                <div class="bs-thumb-ph"><i class="fas fa-newspaper" style="font-size:18px; color:#a7f3d0;"></i></div>
              @endif
            </div>
            <div class="bs-info">
              <span class="bs-date"><i class="fas fa-calendar-alt" style="margin-right:3px;"></i>{{ $b->tanggal->format('d M Y') }}</span>
              <span class="bs-title">{{ $b->judul }}</span>
            </div>
          </a>
        @endforeach
      </div>
      @endif

      {{-- Share di sidebar juga --}}
      <div class="bd-sidebar-card" style="text-align:center;">
        <h3 class="bd-sidebar-heading" style="justify-content:center;">Bagikan Berita</h3>
        <div style="display:flex; gap:10px; justify-content:center; margin-top:4px;">
          <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
             target="_blank" rel="noopener" class="bd-share-btn share-fb" style="width:44px; height:44px; font-size:18px;" title="Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://api.whatsapp.com/send?text={{ $shareText }}%20{{ $shareUrl }}"
             target="_blank" rel="noopener" class="bd-share-btn share-wa" style="width:44px; height:44px; font-size:18px;" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
          </a>
          <a href="https://twitter.com/intent/tweet?text={{ $shareText }}&url={{ $shareUrl }}"
             target="_blank" rel="noopener" class="bd-share-btn share-tw" style="width:44px; height:44px; font-size:18px;" title="X/Twitter">
            <i class="fab fa-x-twitter"></i>
          </a>
        </div>
      </div>

    </div>

  </div>
</div>
@endsection
