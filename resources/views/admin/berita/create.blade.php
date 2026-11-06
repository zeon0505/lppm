@extends('admin.layouts.app')

@section('title', 'Tulis Berita Baru')

@section('content')
<style>
  .wr-wrap { display: grid; grid-template-columns: 1fr 280px; gap: 20px; align-items: start; }
  @media(max-width:800px){ .wr-wrap { grid-template-columns: 1fr; } }

  .wr-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 24px;
    margin-bottom: 16px;
  }
  .wr-label {
    display: block;
    font-size: 12px;
    font-weight: 700;
    color: #334155;
    margin-bottom: 7px;
  }
  .wr-label .req { color: #ef4444; margin-left: 2px; }
  .wr-input {
    width: 100%;
    padding: 11px 14px;
    font-size: 13px;
    border-radius: 10px;
    border: 1.5px solid #cbd5e1;
    outline: none;
    font-family: inherit;
    color: #0f172a;
    box-sizing: border-box;
    transition: border-color 0.2s;
  }
  .wr-input:focus { border-color: #074e50; }
  .wr-input::placeholder { color: #94a3b8; }
  textarea.wr-input { resize: vertical; line-height: 1.7; }

  .wr-title-input {
    font-size: 16px;
    font-weight: 700;
    padding: 13px 16px;
    border: 1.5px solid #074e50;
    border-radius: 10px;
  }

  .wr-link-row { display: flex; gap: 8px; }
  .wr-link-row .wr-input { flex: 1; }
  .wr-link-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #074e50;
    color: #fff;
    padding: 0 16px;
    border-radius: 10px;
    font-size: 12px;
    font-weight: 700;
    border: none;
    cursor: pointer;
    white-space: nowrap;
  }

  .wr-foto-preview {
    width: 100%;
    height: 180px;
    border-radius: 10px;
    object-fit: cover;
    display: block;
    margin-bottom: 10px;
    border: 1px solid #e2e8f0;
  }
  .wr-foto-placeholder {
    width: 100%;
    height: 140px;
    border-radius: 10px;
    background: #f8fafc;
    border: 2px dashed #cbd5e1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 8px;
    color: #94a3b8;
    margin-bottom: 10px;
    cursor: pointer;
  }

  /* Sidebar */
  .wr-sidebar-label {
    font-size: 11px;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    display: block;
    margin-bottom: 6px;
    margin-top: 16px;
  }
  .wr-sidebar-label:first-child { margin-top: 0; }
  .wr-select {
    width: 100%;
    padding: 10px 14px;
    font-size: 12px;
    border-radius: 10px;
    border: 1.5px solid #cbd5e1;
    outline: none;
    font-family: inherit;
    color: #0f172a;
    box-sizing: border-box;
    background: #fff;
  }
  .wr-select:focus { border-color: #074e50; }

  .wr-publish-btn {
    width: 100%;
    padding: 13px;
    background: #074e50;
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 800;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background 0.2s;
    margin-top: 20px;
  }
  .wr-publish-btn:hover { background: #063e40; }
  .wr-cancel-btn {
    width: 100%;
    text-align: center;
    display: block;
    margin-top: 10px;
    padding: 10px;
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
  }
  .wr-cancel-btn:hover { color: #0f172a; }

  .wr-page-title { font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0; }
  .wr-page-sub { font-size: 12px; color: #94a3b8; margin: 0 0 20px 0; }

  .err-box {
    background:#fef2f2; border:1px solid #fecaca; color:#b91c1c;
    padding:12px 16px; border-radius:12px; margin-bottom:16px; font-size:12px;
  }
  .d-none { display: none !important; }
</style>

<p class="wr-page-title">Tulis Berita</p>
<p class="wr-page-sub">Berita LPPM / Tulis Baru</p>

@if($errors->any())
  <div class="err-box"><ul style="margin:0;padding-left:18px;">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" id="beritaForm">
  @csrf

  <div class="wr-wrap">

    {{-- ── KIRI: Konten ── --}}
    <div>

      {{-- Judul + Link + Isi --}}
      <div class="wr-card">
        <label class="wr-label">Judul Berita <span class="req">*</span></label>
        <input type="text" name="judul" id="inputJudul" class="wr-input wr-title-input"
               value="{{ old('judul') }}" placeholder="Tulis judul berita yang menarik..." required>

        <div style="margin-top:16px;">
          <label class="wr-label">
            Link Berita
            <span style="color:#94a3b8;font-weight:500;">(opsional, gambar/judul/deskripsi akan otomatis diambil dari link)</span>
          </label>
          <div class="wr-link-row">
            <input type="url" id="inputLinkBerita" class="wr-input"
                   placeholder="https://example.com/berita-staimas...">
            <button type="button" id="btnFetchLink" class="wr-link-btn" onclick="fetchLinkData()">
              <i class="fas fa-sync-alt" id="fetchIcon"></i> Ambil Data Link
            </button>
          </div>
          <p id="fetchStatus" style="font-size:11px; margin:6px 0 0 0; display:none;"></p>
        </div>

        <div style="margin-top:16px;">
          <label class="wr-label">Ringkasan / Deskripsi Singkat <span style="color:#94a3b8;font-weight:500;">(opsional)</span></label>
          <textarea name="ringkasan" id="inputRingkasan" class="wr-input" rows="2"
                    placeholder="Ringkasan singkat berita (tampil di preview kartu)...">{{ old('ringkasan') }}</textarea>
        </div>

        <div style="margin-top:16px;">
          <label class="wr-label">Isi Berita <span class="req">*</span></label>
          <textarea name="isi" class="wr-input" rows="14"
                    placeholder="Tulis isi berita lengkap di sini..." required>{{ old('isi') }}</textarea>
        </div>
      </div>

      {{-- Gambar Berita --}}
      <div class="wr-card">
        <label class="wr-label"><i class="fas fa-image" style="margin-right:5px; color:#074e50;"></i> Gambar Berita <span style="color:#94a3b8;font-weight:500;">(opsional)</span></label>

        <!-- Pilihan 1: Tempel Link Gambar Langsung -->
        <div style="margin-bottom: 14px;">
          <label style="font-size: 11px; font-weight: 700; color: #475569; display: block; margin-bottom: 5px;">
            <i class="fas fa-link" style="color: #074e50;"></i> Tempel (Paste) Link URL Foto:
          </label>
          <div style="display: flex; gap: 8px;">
            <input type="url" name="foto_url_external" id="fotoUrlHidden" class="wr-input"
                   value="{{ old('foto_url_external') }}"
                   placeholder="https://example.com/gambar-berita.jpg"
                   oninput="handleUrlImage(this.value)">
            <button type="button" onclick="previewFromUrlInput()" style="background: #074e50; color: #fff; border: none; padding: 0 16px; border-radius: 10px; font-size: 12px; font-weight: 700; cursor: pointer; white-space: nowrap;">
              <i class="fas fa-eye"></i> Tinjau
            </button>
          </div>
          <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">
            Bisa copy-paste link foto langsung dari internet/website manapun (klik kanan foto &rarr; Copy image address).
          </span>
        </div>

        <div style="position: relative; text-align: center; margin: 16px 0;">
          <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 0;">
          <span style="position: absolute; top: -8px; left: 50%; transform: translateX(-50%); background: #fff; padding: 0 10px; font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase;">
            Atau Upload File Komputer
          </span>
        </div>

        <!-- Pilihan 2: Upload File / Drag Drop -->
        <div class="wr-foto-placeholder {{ old('foto_url_external') ? 'd-none' : '' }}" id="fotoPlaceholder" onclick="document.getElementById('inputFoto').click()">
          <i class="fas fa-cloud-upload-alt" style="font-size:28px;"></i>
          <span style="font-size:12px; font-weight:600;">Klik untuk upload foto dari komputer</span>
          <span style="font-size:11px;">JPG, PNG, WEBP – maks 5MB</span>
        </div>
        <img id="fotoPreview" class="wr-foto-preview {{ old('foto_url_external') ? '' : 'd-none' }}" src="{{ old('foto_url_external') }}" alt="Preview">
        <input type="file" name="foto" id="inputFoto" accept="image/*" style="display:none;"
               onchange="previewFoto(this)">

        <div id="btnGantiFotoWrap" class="{{ old('foto_url_external') ? '' : 'd-none' }}" style="margin-top: 8px;">
          <button type="button" onclick="clearSelectedFoto()" style="background:#fef2f2; color:#dc2626; border:1px solid #fecaca; padding:6px 14px; border-radius:8px; font-size:11px; font-weight:700; cursor:pointer;">
            <i class="fas fa-trash"></i> Hapus / Ganti Foto
          </button>
        </div>
      </div>

    </div>

    {{-- ── KANAN: Sidebar Pengaturan ── --}}
    <div>
      <div class="wr-card">
        <p style="margin:0 0 16px 0; font-size:13px; font-weight:800; color:#0f172a;">Pengaturan Berita</p>

        <span class="wr-sidebar-label">Kategori</span>
        <select name="kategori" class="wr-select">
          <option value="">— Tanpa Kategori —</option>
          @foreach(['Pengumuman','Penelitian','Pengabdian','Publikasi','Kegiatan','Info'] as $kat)
            <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
          @endforeach
        </select>

        <span class="wr-sidebar-label">Tanggal Terbit <span style="color:#ef4444;">*</span></span>
        <input type="date" name="tanggal" class="wr-input"
               value="{{ old('tanggal', date('Y-m-d')) }}" required>

        <span class="wr-sidebar-label">Status Publikasi</span>
        <select name="published" class="wr-select">
          <option value="1" {{ old('published', '1') == '1' ? 'selected' : '' }}>✅ Publish (Tampil di Website)</option>
          <option value="0" {{ old('published') == '0' ? 'selected' : '' }}>📝 Draft (Tidak Tampil)</option>
        </select>

        <button type="submit" class="wr-publish-btn">
          <i class="fas fa-paper-plane"></i> Terbitkan Berita
        </button>
        <a href="{{ route('admin.berita.index') }}" class="wr-cancel-btn">Batal</a>
      </div>
    </div>

  </div>
</form>

<script>
  // ── PREVIEW FOTO DARI FILE ──
  function previewFoto(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = e => {
        const img = document.getElementById('fotoPreview');
        const ph  = document.getElementById('fotoPlaceholder');
        const gantiBtn = document.getElementById('btnGantiFotoWrap');
        img.src = e.target.result;
        img.classList.remove('d-none');
        img.style.display = 'block';
        ph.classList.add('d-none');
        ph.style.display  = 'none';
        if (gantiBtn) {
          gantiBtn.classList.remove('d-none');
          gantiBtn.style.display = 'block';
        }
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  // ── PREVIEW FOTO DARI LINK URL ──
  function handleUrlImage(val) {
    const trimmed = (val || '').trim();
    if (trimmed && (trimmed.startsWith('http://') || trimmed.startsWith('https://'))) {
      const img = document.getElementById('fotoPreview');
      const ph  = document.getElementById('fotoPlaceholder');
      const gantiBtn = document.getElementById('btnGantiFotoWrap');
      img.src = trimmed;
      img.classList.remove('d-none');
      img.style.display = 'block';
      ph.classList.add('d-none');
      ph.style.display  = 'none';
      if (gantiBtn) {
        gantiBtn.classList.remove('d-none');
        gantiBtn.style.display = 'block';
      }
    }
  }

  function previewFromUrlInput() {
    const val = document.getElementById('fotoUrlHidden').value;
    handleUrlImage(val);
  }

  function clearSelectedFoto() {
    const inputFoto = document.getElementById('inputFoto');
    const inputUrl  = document.getElementById('fotoUrlHidden');
    const img       = document.getElementById('fotoPreview');
    const ph        = document.getElementById('fotoPlaceholder');
    const gantiBtn  = document.getElementById('btnGantiFotoWrap');
    if (inputFoto) inputFoto.value = '';
    if (inputUrl)  inputUrl.value = '';
    img.src = '';
    img.classList.add('d-none');
    img.style.display = 'none';
    ph.classList.remove('d-none');
    ph.style.display  = 'flex';
    if (gantiBtn) {
      gantiBtn.classList.add('d-none');
      gantiBtn.style.display = 'none';
    }
  }

  // ── FETCH LINK (OG SCRAPE) ──
  async function fetchLinkData() {
    const url    = document.getElementById('inputLinkBerita').value.trim();
    const status = document.getElementById('fetchStatus');
    const icon   = document.getElementById('fetchIcon');

    if (!url) {
      status.style.display = 'block';
      status.style.color   = '#dc2626';
      status.textContent   = '⚠ Masukkan URL terlebih dahulu.';
      return;
    }

    // Loading state
    icon.className = 'fas fa-spinner fa-spin';
    document.getElementById('btnFetchLink').disabled = true;
    status.style.display = 'none';

    try {
      const fetchUrl = "{{ route('admin.berita.fetch-link') }}";
      const csrfToken = "{{ csrf_token() }}";
      const res = await fetch(fetchUrl, {
        method:  'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ url: url }),
      });

      const data = await res.json();

      if (data.error) {
        status.style.color   = '#dc2626';
        status.textContent   = '✗ ' + data.error;
        status.style.display = 'block';
        return;
      }

      // Auto-fill fields
      if (data.judul) {
        document.getElementById('inputJudul').value = data.judul;
      }
      if (data.ringkasan) {
        document.getElementById('inputRingkasan').value = data.ringkasan;
      }
      if (data.foto) {
        // Show external image preview
        const img = document.getElementById('fotoPreview');
        const ph  = document.getElementById('fotoPlaceholder');
        img.src          = data.foto;
        img.style.display = 'block';
        ph.style.display  = 'none';

        // Store URL in a hidden input so server knows the image URL
        const hiddenImg = document.getElementById('fotoUrlHidden');
        if (hiddenImg) {
          hiddenImg.value = data.foto;
        }
      }

      status.style.color   = '#059669';
      status.textContent   = '✓ Data berhasil diambil dari link!';
      status.style.display = 'block';

    } catch (err) {
      status.style.color   = '#dc2626';
      status.textContent   = '✗ Gagal terhubung ke server.';
      status.style.display = 'block';
    } finally {
      icon.className = 'fas fa-sync-alt';
      document.getElementById('btnFetchLink').disabled = false;
    }
  }
</script>
@endsection
