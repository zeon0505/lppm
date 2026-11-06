@extends('admin.layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px;">

  <!-- Header -->
  <div style="background:#fff; padding:24px; border-radius:16px; border:1px solid #e2e8f0; display:flex; justify-content:space-between; align-items:center;">
    <div>
      <h1 style="margin:0; font-size:18px; font-weight:800; color:#074e50; display:flex; align-items:center; gap:8px;">
        <i class="fas fa-newspaper" style="color:#d97706;"></i> Kelola Berita
      </h1>
      <p style="margin:4px 0 0 0; font-size:12px; color:#64748b;">Total {{ $beritas->count() }} berita tersimpan</p>
    </div>
    <a href="{{ route('admin.berita.create') }}" style="display:inline-flex; align-items:center; gap:8px; background:#074e50; color:white; padding:10px 18px; border-radius:12px; font-size:12px; font-weight:800; text-decoration:none;">
      <i class="fas fa-plus"></i> Tambah Berita
    </a>
  </div>

  @if(session('success'))
    <div style="background:#f0fdf4; border:1px solid #bbf7d0; color:#15803d; padding:12px 16px; border-radius:12px; font-size:12px; font-weight:700;">
      <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
  @endif

  <!-- Daftar Berita -->
  <div style="background:#fff; padding:24px; border-radius:16px; border:1px solid #e2e8f0;">
    @if($beritas->isEmpty())
      <div style="text-align:center; padding:48px; background:#f8fafc; border-radius:16px; border:1px dashed #cbd5e1; color:#64748b;">
        <div style="font-size:36px; margin-bottom:12px;">📰</div>
        <p style="font-size:13px; font-weight:700; color:#0f172a; margin:0 0 4px 0;">Belum ada berita.</p>
        <p style="font-size:12px; margin:0;">Klik tombol <strong>Tambah Berita</strong> untuk mulai.</p>
      </div>
    @else
      <div style="display:flex; flex-direction:column; gap:12px;">
        @foreach($beritas as $b)
          <div style="display:flex; gap:16px; border:1px solid #e2e8f0; border-radius:14px; overflow:hidden; background:#f8fafc; align-items:stretch;">
            @php
              $imgSrc = $b->foto ? (\Illuminate\Support\Str::startsWith($b->foto, ['http://', 'https://']) ? $b->foto : asset($b->foto)) : null;
            @endphp
            @if($imgSrc)
              <img src="{{ $imgSrc }}" alt="{{ $b->judul }}" style="width:120px; height:90px; object-fit:cover; flex-shrink:0;">
            @else
              <div style="width:120px; height:90px; background:#e2e8f0; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <i class="fas fa-newspaper" style="color:#94a3b8; font-size:24px;"></i>
              </div>
            @endif
            <div style="flex:1; padding:14px; display:flex; flex-direction:column; justify-content:space-between;">
              <div>
                <div style="display:flex; gap:8px; align-items:center; margin-bottom:4px; flex-wrap:wrap;">
                  <span style="font-size:9px; font-weight:800; background:#074e50; color:white; padding:2px 10px; border-radius:9999px; text-transform:uppercase;">{{ $b->kategori }}</span>
                  @if(!$b->published)
                    <span style="font-size:9px; font-weight:800; background:#fef3c7; color:#b45309; padding:2px 10px; border-radius:9999px;">DRAFT</span>
                  @endif
                  <span style="font-size:10px; color:#64748b;"><i class="fas fa-calendar-alt" style="margin-right:4px;"></i>{{ $b->tanggal->format('d M Y') }}</span>
                </div>
                <h4 style="margin:0 0 4px 0; font-size:13px; font-weight:800; color:#0f172a; line-height:1.3;">{{ $b->judul }}</h4>
                @if($b->ringkasan)
                  <p style="margin:0; font-size:11px; color:#64748b; line-height:1.4;">{{ Str::limit($b->ringkasan, 100) }}</p>
                @endif
              </div>
              <div style="display:flex; gap:8px; margin-top:10px;">
                <a href="{{ route('admin.berita.edit', $b->id) }}" style="background:#eff6ff; color:#1d4ed8; border:1px solid #bfdbfe; padding:4px 12px; border-radius:6px; font-size:10px; font-weight:700; text-decoration:none;">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('admin.berita.delete', $b->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background:#fef2f2; color:#dc2626; border:1px solid #fecaca; padding:4px 12px; border-radius:6px; font-size:10px; font-weight:700; cursor:pointer;">
                    <i class="fas fa-trash-alt"></i> Hapus
                  </button>
                </form>
                <a href="{{ route('berita.show', $b->slug) }}" target="_blank" style="background:#f1f5f9; color:#334155; border:1px solid #e2e8f0; padding:4px 12px; border-radius:6px; font-size:10px; font-weight:700; text-decoration:none;">
                  <i class="fas fa-eye"></i> Lihat
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>

</div>
@endsection

