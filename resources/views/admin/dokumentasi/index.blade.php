@extends('admin.layouts.app')

@section('title', 'Kelola Dokumentasi')

@section('content')
<style>
  .dropzone-box {
    border: 2px dashed #074e50;
    background: #f0fdf4;
    border-radius: 16px;
    padding: 24px;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s ease;
    position: relative;
  }
  .dropzone-box:hover, .dropzone-box.drag-active {
    background: #dcfce7;
    border-color: #059669;
    box-shadow: 0 4px 12px rgba(7, 78, 80, 0.1);
  }
</style>

<div style="display: flex; flex-direction: column; gap: 24px;">

  <!-- Header Section -->
  <div style="background: #ffffff; padding: 24px; border-radius: 16px; border: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
    <div>
      <h1 style="margin: 0; font-size: 18px; font-weight: 800; color: #074e50; display: flex; align-items: center; gap: 8px;">
        <i class="fas fa-camera" style="color: #d97706;"></i> Kelola Dokumentasi Foto
      </h1>
      <p style="margin: 4px 0 0 0; font-size: 12px; color: #64748b;">
        Dukungan <strong>Paste Langsung (Ctrl + V)</strong> dari WhatsApp/Screenshot, Upload File, atau Paste Link URL.
      </p>
    </div>
  </div>

  <!-- Form Upload / Paste Dokumentasi Baru -->
  <div style="background: #ffffff; padding: 24px; border-radius: 16px; border: 1px solid #e2e8f0;">
    <h2 style="margin: 0 0 16px 0; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 8px;">
      <i class="fas fa-plus-circle" style="color: #074e50;"></i> Tambah Foto Dokumentasi Baru
    </h2>

    @if ($errors->any())
      <div style="background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; padding: 12px; border-radius: 12px; margin-bottom: 16px; font-size: 12px;">
        <ul style="margin: 0; padding-left: 20px;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form id="formDokumentasi" action="{{ route('admin.dokumentasi.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 16px;">
      @csrf
      
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
        <div>
          <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 6px;">Judul Kegiatan / Foto <span style="color: #ef4444;">*</span></label>
          <input type="text" name="judul" value="{{ old('judul') }}" required placeholder="Contoh: Workshop Penulisan Jurnal Dosen 2026" style="width: 100%; padding: 10px 14px; font-size: 12px; border-radius: 10px; border: 1px solid #cbd5e1; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 6px;">Kategori <span style="color: #ef4444;">*</span></label>
          <select name="kategori" required style="width: 100%; padding: 10px 14px; font-size: 12px; border-radius: 10px; border: 1px solid #cbd5e1; outline: none;">
            <option value="Kegiatan LPPM">Kegiatan LPPM</option>
            <option value="Penelitian Dosen">Penelitian Dosen</option>
            <option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
            <option value="Workshop & Seminar">Workshop & Seminar</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>
      </div>

      <!-- METODE PILIHAN GAMBAR -->
      <div style="background: #f8fafc; padding: 16px; border-radius: 14px; border: 1px solid #e2e8f0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
          <label style="font-size: 12px; font-weight: 800; color: #074e50;">
            <i class="fas fa-paste" style="margin-right: 6px; color: #d97706;"></i> Input Gambar (Paste / Upload / URL) <span style="color: #ef4444;">*</span>
          </label>
          <span style="font-size: 11px; font-weight: 700; color: #059669; background: #dcfce7; padding: 2px 10px; border-radius: 9999px;">
            <i class="fas fa-[#059669] fa-check-circle mr-1"></i> BISA PASTE LANGSUNG (Ctrl + V)
          </span>
        </div>

        <!-- Radio Selector -->
        <div style="display: flex; gap: 20px; margin-bottom: 14px; font-size: 12px; font-weight: 700; color: #334155;">
          <label style="display: flex; align-items: center; gap: 6px; cursor: pointer;">
            <input type="radio" name="upload_type" value="file" checked onclick="toggleUploadSource('file')">
            <span><i class="fas fa-file-image" style="color: #074e50;"></i> Paste (Ctrl+V) / Upload File</span>
          </label>
          <label style="display: flex; align-items: center; gap: 6px; cursor: pointer;">
            <input type="radio" name="upload_type" value="url" onclick="toggleUploadSource('url')">
            <span><i class="fas fa-link" style="color: #d97706;"></i> Paste Link URL Gambar</span>
          </label>
        </div>

        <!-- FILE / CLIPBOARD DROPZONE -->
        <div id="sourceFileInput">
          <div class="dropzone-box" id="dropzoneBox" onclick="document.getElementById('inputFotoFile').click()">
            <input type="file" name="foto" id="inputFotoFile" accept="image/*" style="display: none;" onchange="handleFileSelected(this.files)">
            
            <div id="dropzonePrompt">
              <div style="width: 48px; height: 48px; background: #ffffff; border-radius: 9999px; display: inline-flex; align-items: center; justify-content: center; color: #074e50; font-size: 20px; margin-bottom: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.06);">
                <i class="fas fa-paste"></i>
              </div>
              <h4 style="margin: 0; font-size: 14px; font-weight: 800; color: #074e50;">Tekan Ctrl + V untuk Paste Foto dari WhatsApp / Clipboard</h4>
              <p style="margin: 4px 0 0 0; font-size: 12px; color: #64748b;">
                Atau <strong>Klik di sini</strong> / <strong>Tarik foto</strong> dari komputer Anda (JPG, PNG, WEBP max 5MB)
              </p>
            </div>

            <!-- PREVIEW HASIL PASTE / FILE -->
            <div id="dropzonePreview" style="display: none; align-items: center; justify-content: center; flex-direction: column; gap: 10px;">
              <img id="previewImg" src="" alt="Preview" style="max-height: 180px; max-width: 100%; border-radius: 10px; border: 2px solid #074e50; object-fit: contain;">
              <div style="font-size: 12px; font-weight: 700; color: #059669; background: #ffffff; padding: 4px 12px; border-radius: 9999px; border: 1px solid #bbf7d0;" id="previewInfo">
                <i class="fas fa-check-circle"></i> Gambar Berhasil Di-Paste / Dipilih!
              </div>
              <button type="button" onclick="event.stopPropagation(); clearPastedFile()" style="background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; padding: 4px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; cursor: pointer;">
                <i class="fas fa-trash"></i> Hapus / Ganti Gambar
              </button>
            </div>

          </div>
        </div>

        <!-- INPUT PASTE LINK URL -->
        <div id="sourceUrlInput" style="display: none;">
          <div style="display: flex; gap: 8px;">
            <span style="background: #e2e8f0; padding: 10px 14px; border-radius: 10px 0 0 10px; color: #64748b; font-size: 12px; font-weight: 700; display: flex; align-items: center;">https://</span>
            <input type="url" name="foto_url" id="inputFotoUrl" value="{{ old('foto_url') }}" placeholder="https://domain.com/path-ke-gambar.jpg" style="flex: 1; padding: 10px 14px; font-size: 12px; border-radius: 0 10px 10px 0; border: 1px solid #cbd5e1; outline: none;">
          </div>
          <span style="display: block; font-size: 11px; color: #64748b; margin-top: 4px;">Tempelkan (paste) link langsung gambar dari Google Drive, Imgur, Canva, dsb.</span>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
        <div>
          <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 6px;">Tanggal Kegiatan</label>
          <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" style="width: 100%; padding: 10px 14px; font-size: 12px; border-radius: 10px; border: 1px solid #cbd5e1; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 6px;">Keterangan / Ringkasan (Opsional)</label>
          <input type="text" name="deskripsi" placeholder="Catatan singkat mengenai dokumentasi foto ini..." style="width: 100%; padding: 10px 14px; font-size: 12px; border-radius: 10px; border: 1px solid #cbd5e1; outline: none;">
        </div>
      </div>

      <div>
        <button type="submit" style="background: #074e50; color: white; padding: 12px 24px; border-radius: 10px; border: none; font-size: 12px; font-weight: 800; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
          <i class="fas fa-upload"></i> Unggah Dokumentasi
        </button>
      </div>
    </form>
  </div>

  <!-- Galeri Foto Dokumentasi Ter-upload -->
  <div style="background: #ffffff; padding: 24px; border-radius: 16px; border: 1px solid #e2e8f0;">
    <h2 style="margin: 0 0 16px 0; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 800; color: #0f172a; display: flex; align-items: center; justify-content: space-between;">
      <span style="display: flex; align-items: center; gap: 8px;"><i class="fas fa-images" style="color: #074e50;"></i> Daftar Foto Dokumentasi ({{ $dokumentasis->count() }})</span>
    </h2>

    @if($dokumentasis->isEmpty())
      <div style="text-align: center; padding: 48px; background: #f8fafc; border-radius: 16px; border: 1px dashed #cbd5e1; color: #64748b;">
        <div style="width: 56px; height: 56px; background: #fffbeb; color: #d97706; border-radius: 9999px; display: inline-flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 12px;">
          <i class="fas fa-image"></i>
        </div>
        <p style="font-size: 13px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">Belum ada foto dokumentasi yang diunggah.</p>
        <p style="font-size: 12px; color: #64748b; margin: 0;">Gunakan form di atas untuk <strong>Paste (Ctrl+V) foto dari WA</strong>, upload file, atau paste link.</p>
      </div>
    @else
      <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px;">
        @foreach($dokumentasis as $dok)
          @php
            $imgSrc = \Illuminate\Support\Str::startsWith($dok->foto, ['http://', 'https://']) ? $dok->foto : asset($dok->foto);
          @endphp
          <div style="border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; background: #f8fafc; display: flex; flex-direction: column;">
            <div style="height: 160px; width: 100%; overflow: hidden; background: #cbd5e1; position: relative;">
              <img src="{{ $imgSrc }}" alt="{{ $dok->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
              <span style="position: absolute; top: 8px; left: 8px; background: rgba(7, 78, 80, 0.9); color: white; font-size: 9px; font-weight: 800; padding: 2px 8px; border-radius: 9999px; text-transform: uppercase;">
                {{ $dok->kategori }}
              </span>
              @if(\Illuminate\Support\Str::startsWith($dok->foto, ['http://', 'https://']))
                <span style="position: absolute; top: 8px; right: 8px; background: rgba(217, 119, 6, 0.9); color: white; font-size: 9px; font-weight: 800; padding: 2px 8px; border-radius: 9999px;">
                  <i class="fas fa-link"></i> URL Link
                </span>
              @endif
            </div>

            <div style="padding: 14px; flex: 1; display: flex; flex-direction: column; justify-between: space-between;">
              <div>
                <span style="font-size: 10px; color: #64748b; font-weight: 600; display: block; margin-bottom: 2px;">
                  <i class="fas fa-calendar-alt" style="margin-right: 4px; color: #074e50;"></i> {{ \Carbon\Carbon::parse($dok->tanggal)->format('d M Y') }}
                </span>
                <h4 style="font-size: 13px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0; line-height: 1.3;">{{ $dok->judul }}</h4>
                @if($dok->deskripsi)
                  <p style="font-size: 11px; color: #64748b; margin: 0; line-height: 1.4;">{{ $dok->deskripsi }}</p>
                @endif
              </div>

              <div style="margin-top: 12px; pt: 8px; border-top: 1px solid #e2e8f0; display: flex; justify-content: flex-end;">
                <form action="{{ route('admin.dokumentasi.delete', $dok->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; padding: 4px 10px; border-radius: 6px; font-size: 10px; font-weight: 700; cursor: pointer;">
                    <i class="fas fa-trash-alt"></i> Hapus
                  </button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>

</div>

<script>
  function toggleUploadSource(type) {
    const fileDiv = document.getElementById('sourceFileInput');
    const urlDiv = document.getElementById('sourceUrlInput');
    const inputFotoFile = document.getElementById('inputFotoFile');
    const inputFotoUrl = document.getElementById('inputFotoUrl');

    if (type === 'file') {
      fileDiv.style.display = 'block';
      urlDiv.style.display = 'none';
      if (inputFotoUrl) inputFotoUrl.value = '';
    } else {
      fileDiv.style.display = 'none';
      urlDiv.style.display = 'block';
      if (inputFotoFile) clearPastedFile();
    }
  }

  function handleFileSelected(files) {
    if (!files || files.length === 0) return;
    const file = files[0];
    if (!file.type.startsWith('image/')) {
      alert('File yang dipilih harus berupa gambar!');
      return;
    }

    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('previewImg').src = e.target.result;
      document.getElementById('dropzonePrompt').style.display = 'none';
      document.getElementById('dropzonePreview').style.display = 'flex';
      document.getElementById('previewInfo').innerHTML = '<i class="fas fa-check-circle"></i> ' + file.name + ' (' + Math.round(file.size/1024) + ' KB)';
    };
    reader.readAsDataURL(file);
  }

  function clearPastedFile() {
    const inputFotoFile = document.getElementById('inputFotoFile');
    if (inputFotoFile) inputFotoFile.value = '';
    document.getElementById('previewImg').src = '';
    document.getElementById('dropzonePrompt').style.display = 'block';
    document.getElementById('dropzonePreview').style.display = 'none';
  }

  // CLIPBOARD PASTE (Ctrl + V) HANDLER
  document.addEventListener('paste', function(e) {
    // Only listen if file mode is active
    const fileRadio = document.querySelector('input[name="upload_type"][value="file"]');
    if (fileRadio && !fileRadio.checked) return;

    const items = (e.clipboardData || e.originalEvent.clipboardData).items;
    let imageItem = null;

    for (let i = 0; i < items.length; i++) {
      if (items[i].type.indexOf('image') !== -1) {
        imageItem = items[i];
        break;
      }
    }

    if (imageItem) {
      e.preventDefault();
      const blob = imageItem.getAsFile();
      const file = new File([blob], 'pasted_image_' + Date.now() + '.png', { type: blob.type });

      // Assign file to input file element via DataTransfer
      const dataTransfer = new DataTransfer();
      dataTransfer.items.add(file);
      const inputFotoFile = document.getElementById('inputFotoFile');
      inputFotoFile.files = dataTransfer.files;

      // Render preview
      handleFileSelected(dataTransfer.files);
    }
  });

  // DRAG & DROP FILE TO DROPZONE
  const dropzone = document.getElementById('dropzoneBox');
  if (dropzone) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
      dropzone.addEventListener(eventName, e => {
        e.preventDefault();
        e.stopPropagation();
      }, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
      dropzone.addEventListener(eventName, () => dropzone.classList.add('drag-active'), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
      dropzone.addEventListener(eventName, () => dropzone.classList.remove('drag-active'), false);
    });

    dropzone.addEventListener('drop', e => {
      const dt = e.dataTransfer;
      const files = dt.files;
      if (files && files.length > 0) {
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(files[0]);
        const inputFotoFile = document.getElementById('inputFotoFile');
        inputFotoFile.files = dataTransfer.files;
        handleFileSelected(dataTransfer.files);
      }
    });
  }
</script>
@endsection