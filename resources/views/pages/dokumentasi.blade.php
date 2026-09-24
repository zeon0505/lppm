@extends('layouts.app')

@section('title', 'Dokumentasi Kegiatan – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Dokumentasi Kegiatan')
@section('hero-subtitle', 'Galeri Foto & Liputan Kegiatan LPPM STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Dokumentasi')

@section('content')
<style>
  .pg-wrap { max-width: 1240px; margin: 0 auto; padding: 40px 20px; }
  
  /* Train Row Container */
  .train-row-wrap {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 24px;
    margin-bottom: 28px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.03);
    overflow: hidden;
  }
  
  .train-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 1px solid #f1f5f9;
  }
  
  .train-header h3 {
    margin: 0;
    font-size: 15px;
    font-weight: 800;
    color: #0f172a;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .train-header h3 i { color: #074e50; }

  /* Drag Scroll Track Container */
  .marquee-track-container {
    position: relative;
    width: 100%;
    overflow-x: auto;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE/Edge */
    padding: 12px 0;
    cursor: grab;
    user-select: none;
    scroll-behavior: smooth;
  }
  .marquee-track-container::-webkit-scrollbar {
    display: none; /* Chrome/Safari */
  }
  .marquee-track-container.is-dragging {
    cursor: grabbing !important;
    scroll-behavior: auto !important;
  }

  .marquee-track {
    display: flex;
    gap: 20px;
    width: max-content;
  }

  /* Photo Card */
  .photo-train-card {
    flex-shrink: 0;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 12px;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    user-select: none;
  }

  .photo-train-card:hover {
    transform: translateY(-6px) scale(1.02);
    box-shadow: 0 14px 28px rgba(7, 78, 80, 0.18);
    border-color: #074e50;
    z-index: 10;
  }

  /* Image keeping natural aspect ratio */
  .photo-train-img {
    height: 220px;
    width: auto;
    max-width: 380px;
    object-fit: contain;
    border-radius: 10px;
    background: #f8fafc;
    display: block;
    pointer-events: none;
  }

  /* Navigation Buttons for Manual Control */
  .track-nav-btn {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #074e50;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  }
  .track-nav-btn:hover {
    background: #074e50;
    color: #ffffff;
    border-color: #074e50;
    box-shadow: 0 4px 10px rgba(7,78,80,0.25);
    transform: scale(1.05);
  }
  .track-nav-btn:active {
    transform: scale(0.95);
  }
</style>

<div class="pg-wrap">

  <!-- Info Header -->
  <div style="background: linear-gradient(135deg, #074e50, #0a6b6e); color: white; border-radius: 20px; padding: 24px 30px; margin-bottom: 28px; display: flex; flex-direction: column; sm:flex-row; justify-content: space-between; align-items: flex-start; sm:items-center; gap: 16px; shadow: 0 4px 15px rgba(7,78,80,0.2);">
    <div>
      <span style="background: rgba(255,255,255,0.15); color: #fde047; font-size: 11px; font-weight: 800; padding: 4px 12px; border-radius: 9999px; text-transform: uppercase; letter-spacing: 0.08em; display: inline-block; margin-bottom: 6px;">
        <i class="fas fa-layer-group mr-1"></i> Galeri Interaktif Menyamping
      </span>
      <h2 style="font-size: 20px; font-weight: 800; margin: 0; color: white;">Dokumentasi Foto Kegiatan LPPM</h2>
      <p style="font-size: 12px; color: #cbd5e1; margin: 4px 0 0 0;">
        Geser foto ke kanan/kiri dengan <strong>tahan & tarik kursor mouse</strong>, atau klik tombol panah!
      </p>
    </div>
    <div style="background: rgba(255,255,255,0.1); padding: 8px 16px; border-radius: 12px; font-size: 12px; font-weight: 700; color: #fff; text-align: center; border: 1px solid rgba(255,255,255,0.2);">
      <i class="fas fa-hand-pointer text-amber-300 mr-1"></i> Tarik Kursor / Klik Tombol Panah
    </div>
  </div>

  @php
    $chunks = $dokumentasis->chunk(5);
  @endphp

  @if($dokumentasis->isEmpty())
    <div style="text-align: center; padding: 60px 20px; background: #ffffff; border-radius: 20px; border: 2px dashed #cbd5e1;">
      <div style="width: 72px; height: 72px; background: #f0fdf4; border-radius: 9999px; display: inline-flex; align-items: center; justify-content: center; color: #074e50; font-size: 32px; margin-bottom: 16px;">
        <i class="fas fa-images"></i>
      </div>
      <h4 style="font-size: 18px; font-weight: 800; color: #0f172a; margin: 0 0 6px 0;">Belum Ada Foto Dokumentasi</h4>
      <p style="color: #64748b; font-size: 13px; max-width: 440px; margin: 0 auto 20px auto;">
        Admin belum mengunggah foto dokumentasi. Unggah file foto ATAU paste link gambar di Dashboard Admin.
      </p>
    </div>
  @else

    @foreach($chunks as $rowIndex => $rowPhotos)
      <div class="train-row-wrap">
        <div class="train-header">
          <h3>
            <i class="fas fa-camera"></i> Baris {{ $rowIndex + 1 }} ({{ $rowPhotos->count() }} Foto Asli)
          </h3>
          <div style="display: flex; align-items: center; gap: 10px;">
            <span style="font-size: 11px; font-weight: 700; color: #64748b; background: #f1f5f9; padding: 4px 12px; border-radius: 9999px;" class="hidden sm:inline-block">
              <i class="fas fa-[#074e50] fa-arrows-alt-h mr-1"></i> Klik panah / Tarik kursor
            </span>
            <button type="button" class="track-nav-btn" onclick="scrollTrack('row-container-{{ $rowIndex }}', -360)" title="Geser Kiri">
              <i class="fas fa-chevron-left"></i>
            </button>
            <button type="button" class="track-nav-btn" onclick="scrollTrack('row-container-{{ $rowIndex }}', 360)" title="Geser Kanan">
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        </div>

        <div class="marquee-track-container" id="row-container-{{ $rowIndex }}" data-direction="{{ $rowIndex % 2 != 0 ? -1 : 1 }}">
          <div class="marquee-track">
            
            {{-- Loop pertama --}}
            @foreach($rowPhotos as $dok)
              @php
                $imgSrc = \Illuminate\Support\Str::startsWith($dok->foto, ['http://', 'https://']) ? $dok->foto : asset($dok->foto);
              @endphp
              <div class="photo-train-card" 
                   data-id="{{ $dok->id }}"
                   onclick="handleCardClick(event, '{{ $imgSrc }}', '{{ addslashes($dok->judul) }}', '{{ addslashes($dok->kategori) }}', '{{ \Carbon\Carbon::parse($dok->tanggal)->format('d M Y') }}', '{{ addslashes($dok->deskripsi ?? '') }}')">
                <img src="{{ $imgSrc }}" alt="{{ $dok->judul }}" class="photo-train-img">
                <div style="width: 100%; margin-top: 10px; display: flex; flex-direction: column; gap: 4px;">
                  <span style="font-size: 9px; font-weight: 800; color: #074e50; background: #f0fdf4; padding: 2px 8px; border-radius: 9999px; text-transform: uppercase; align-self: flex-start; border: 1px solid #bbf7d0;">
                    {{ $dok->kategori }}
                  </span>
                  <div style="font-size: 12px; font-weight: 800; color: #0f172a; line-height: 1.3; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 260px;">
                    {{ $dok->judul }}
                  </div>
                  <div style="font-size: 10px; font-weight: 600; color: #64748b; display: flex; justify-content: space-between; align-items: center;">
                    <span><i class="fas fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($dok->tanggal)->format('d M Y') }}</span>
                    <span style="color: #074e50; font-size: 10px; font-weight: 700;"><i class="fas fa-search-plus"></i> Lihat</span>
                  </div>
                </div>
              </div>
            @endforeach

            {{-- Loop kedua (untuk scroll mulus) --}}
            @foreach($rowPhotos as $dok)
              @php
                $imgSrc = \Illuminate\Support\Str::startsWith($dok->foto, ['http://', 'https://']) ? $dok->foto : asset($dok->foto);
              @endphp
              <div class="photo-train-card" 
                   data-id="{{ $dok->id }}"
                   onclick="handleCardClick(event, '{{ $imgSrc }}', '{{ addslashes($dok->judul) }}', '{{ addslashes($dok->kategori) }}', '{{ \Carbon\Carbon::parse($dok->tanggal)->format('d M Y') }}', '{{ addslashes($dok->deskripsi ?? '') }}')">
                <img src="{{ $imgSrc }}" alt="{{ $dok->judul }}" class="photo-train-img">
                <div style="width: 100%; margin-top: 10px; display: flex; flex-direction: column; gap: 4px;">
                  <span style="font-size: 9px; font-weight: 800; color: #074e50; background: #f0fdf4; padding: 2px 8px; border-radius: 9999px; text-transform: uppercase; align-self: flex-start; border: 1px solid #bbf7d0;">
                    {{ $dok->kategori }}
                  </span>
                  <div style="font-size: 12px; font-weight: 800; color: #0f172a; line-height: 1.3; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 260px;">
                    {{ $dok->judul }}
                  </div>
                  <div style="font-size: 10px; font-weight: 600; color: #64748b; display: flex; justify-content: space-between; align-items: center;">
                    <span><i class="fas fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($dok->tanggal)->format('d M Y') }}</span>
                    <span style="color: #074e50; font-size: 10px; font-weight: 700;"><i class="fas fa-search-plus"></i> Lihat</span>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>
    @endforeach

  @endif

</div>

<!-- LIGHTBOX MODAL -->
<div id="lightboxModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.92); z-index: 9999; backdrop-filter: blur(8px); align-items: center; justify-content: center; padding: 20px;">
  <div style="position: relative; max-width: 900px; width: 100%; background: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);">
    
    <button onclick="closeLightbox()" style="position: absolute; top: 16px; right: 16px; z-index: 20; width: 40px; height: 40px; background: rgba(0,0,0,0.6); color: white; border: none; border-radius: 9999px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 18px;">
      <i class="fas fa-times"></i>
    </button>

    <div style="max-height: 540px; background: #0f172a; display: flex; align-items: center; justify-content: center; padding: 10px;">
      <img id="lightboxImg" src="" alt="Preview" style="max-width: 100%; max-height: 520px; object-fit: contain; border-radius: 8px;">
    </div>

    <div style="padding: 24px;">
      <div style="display: flex; gap: 8px; margin-bottom: 8px; align-items: center;">
        <span id="lightboxCategory" style="background: #f0fdf4; color: #074e50; font-size: 11px; font-weight: 800; padding: 4px 12px; border-radius: 9999px; text-transform: uppercase;"></span>
        <span id="lightboxDate" style="font-size: 12px; color: #64748b; font-weight: 600;"></span>
      </div>
      <h3 id="lightboxTitle" style="font-size: 18px; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;"></h3>
      <p id="lightboxDesc" style="font-size: 13px; color: #475569; margin: 0; line-height: 1.6;"></p>
    </div>

  </div>
</div>

<script>
  let isDragging = false;
  let dragMoved = false;
  let startX = 0;
  let scrollLeft = 0;

  document.addEventListener('DOMContentLoaded', () => {
    const containers = document.querySelectorAll('.marquee-track-container');

    containers.forEach(container => {
      let autoScrollActive = true;
      const dir = parseInt(container.dataset.direction || "1");

      // Continuous Smooth Auto Scroll Loop
      function autoStep() {
        const pausedUntil = parseInt(container.dataset.pausedUntil || "0");
        const isButtonPaused = Date.now() < pausedUntil;

        if (autoScrollActive && !isDragging && !isButtonPaused) {
          container.scrollLeft += 0.6 * dir;

          // Infinite Loop Check
          const maxScroll = container.scrollWidth / 2;
          if (dir > 0 && container.scrollLeft >= maxScroll) {
            container.scrollLeft = 0;
          } else if (dir < 0 && container.scrollLeft <= 0) {
            container.scrollLeft = maxScroll;
          }
        }
        requestAnimationFrame(autoStep);
      }
      requestAnimationFrame(autoStep);

      // Pause auto scroll on hover
      container.addEventListener('mouseenter', () => { autoScrollActive = false; });
      container.addEventListener('mouseleave', () => {
        if (!isDragging) {
          autoScrollActive = true;
        }
      });

      // Mouse Drag-to-Scroll Functionality
      container.addEventListener('mousedown', (e) => {
        isDragging = true;
        dragMoved = false;
        container.classList.add('is-dragging');
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
        autoScrollActive = false;
      });

      window.addEventListener('mouseup', () => {
        if (isDragging) {
          isDragging = false;
          container.classList.remove('is-dragging');
          setTimeout(() => { dragMoved = false; }, 50);
        }
      });

      container.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 1.6;
        if (Math.abs(walk) > 4) {
          dragMoved = true;
        }
        container.scrollLeft = scrollLeft - walk;
      });

      // Touch Swipe Support for Mobile/Tablet
      let touchStartX = 0;
      let touchScrollLeft = 0;

      container.addEventListener('touchstart', (e) => {
        autoScrollActive = false;
        touchStartX = e.touches[0].pageX - container.offsetLeft;
        touchScrollLeft = container.scrollLeft;
      }, { passive: true });

      container.addEventListener('touchmove', (e) => {
        const x = e.touches[0].pageX - container.offsetLeft;
        const walk = (x - touchStartX) * 1.5;
        container.scrollLeft = touchScrollLeft - walk;
      }, { passive: true });

      container.addEventListener('touchend', () => {
        autoScrollActive = true;
      });
    });
  });

  function scrollTrack(containerId, amount) {
    const container = document.getElementById(containerId);
    if (container) {
      container.dataset.pausedUntil = (Date.now() + 1200).toString();
      container.scrollBy({ left: amount, behavior: 'smooth' });
    }
  }

  function handleCardClick(e, imgSrc, title, category, date, desc) {
    if (dragMoved) return;
    openLightbox(imgSrc, title, category, date, desc);
  }

  function openLightbox(imgSrc, title, category, date, desc) {
    document.getElementById('lightboxImg').src = imgSrc;
    document.getElementById('lightboxTitle').innerText = title;
    document.getElementById('lightboxCategory').innerText = category;
    document.getElementById('lightboxDate').innerText = '• ' + date;
    document.getElementById('lightboxDesc').innerText = desc || '';
    document.getElementById('lightboxModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    document.getElementById('lightboxModal').style.display = 'none';
    document.body.style.overflow = 'auto';
  }

  document.getElementById('lightboxModal').addEventListener('click', function(e) {
    if (e.target === this) {
      closeLightbox();
    }
  });
</script>
@endsection
