@extends('admin.layouts.app')

@section('title', 'Kelola Dokumen')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px;">

  <!-- Header Section -->
  <div style="background: #ffffff; padding: 24px; border-radius: 16px; border: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
    <div>
      <h1 style="margin: 0; font-size: 18px; font-weight: 800; color: #074e50; display: flex; align-items: center; gap: 8px;">
        <i class="fas fa-folder-open" style="color: #d97706;"></i> Kelola Dokumen & Panduan Unduhan
      </h1>
      <p style="margin: 4px 0 0 0; font-size: 12px; color: #64748b;">Unggah file PDF/DOCX dari komputer ATAU tempelkan (paste) link URL dokumen (Google Drive / DropBox).</p>
    </div>
  </div>

  <!-- Form Upload / Paste Dokumen Baru -->
  <div style="background: #ffffff; padding: 24px; border-radius: 16px; border: 1px solid #e2e8f0;">
    <h2 style="margin: 0 0 16px 0; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 8px;">
      <i class="fas fa-plus-circle" style="color: #074e50;"></i> Tambah Dokumen / Panduan Baru
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

    <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 16px;">
      @csrf
      
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 16px;">
        <div>
          <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 6px;">Judul Dokumen <span style="color: #ef4444;">*</span></label>
          <input type="text" name="judul" value="{{ old('judul') }}" required placeholder="Contoh: Buku Panduan Penelitian Dosen STAIMAS 2026" style="width: 100%; padding: 10px 14px; font-size: 12px; border-radius: 10px; border: 1px solid #cbd5e1; outline: none;">
        </div>

        <div>
          <label style="display: block; font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 6px;">Kategori Dokumen <span style="color: #ef4444;">*</span></label>
          <select name="kategori" required style="width: 100%; padding: 10px 14px; font-size: 12px; border-radius: 10px; border: 1px solid #cbd5e1; outline: none;">
            <option value="Panduan Penelitian">Panduan Penelitian</option>
            <option value="Panduan Pengabdian (PkM)">Panduan Pengabdian (PkM)</option>
            <option value="Template Proposal">Template Proposal</option>
            <option value="Template Laporan Akhir">Template Laporan Akhir</option>
            <option value="Template Artikel Jurnal">Template Artikel Jurnal</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>
      </div>

      <!-- TAB SUMBER DOKUMEN: FILE vs PASTE LINK -->
      <div style="background: #f8fafc; padding: 16px; border-radius: 14px; border: 1px solid #e2e8f0;">
        <label style="display: block; font-size: 12px; font-weight: 800; color: #074e50; margin-bottom: 10px;">
          <i class="fas fa-file-alt" style="margin-right: 6px; color: #d97706;"></i> Sumber File Dokumen <span style="color: #ef4444;">*</span>
        </label>

        <!-- Radio Selector -->
        <div style="display: flex; gap: 20px; margin-bottom: 14px; font-size: 12px; font-weight: 700; color: #334155;">
          <label style="display: flex; align-items: center; gap: 6px; cursor: pointer;">
            <input type="radio" name="upload_type" value="file" checked onclick="toggleDokumenSource('file')">
            <span><i class="fas fa-upload" style="color: #074e50;"></i> Upload File dari Komputer (PDF/DOCX)</span>
          </label>
          <label style="display: flex; align-items: center; gap: 6px; cursor: pointer;">
            <input type="radio" name="upload_type" value="url" onclick="toggleDokumenSource('url')">
            <span><i class="fas fa-link" style="color: #d97706;"></i> Paste Link URL (Google Drive / DropBox)</span>
          </label>
        </div>

        <!-- Input File Upload -->
        <div id="sourceDokumenFile">
          <input type="file" name="file" id="inputDokumenFile" accept=".pdf,.doc,.docx,.xls,.xlsx,.zip,.rar" style="font-size: 12px; color: #475569;">
          <span style="display: block; font-size: 11px; color: #64748b; margin-top: 4px;">Format PDF, DOC, DOCX, XLS, XLSX (Maksimal 15MB)</span>
        </div>

        <!-- Input Paste Link URL -->
        <div id="sourceDokumenUrl" style="display: none;">
          <div style="display: flex; gap: 8px;">
            <span style="background: #e2e8f0; padding: 10px 14px; border-radius: 10px 0 0 10px; color: #64748b; font-size: 12px; font-weight: 700; display: flex; align-items: center;">https://</span>
            <input type="url" name="file_url" id="inputDokumenUrl" value="{{ old('file_url') }}" placeholder="https://drive.google.com/file/d/xxxx/view atau link file" style="flex: 1; padding: 10px 14px; font-size: 12px; border-radius: 0 10px 10px 0; border: 1px solid #cbd5e1; outline: none;">
          </div>
          <span style="display: block; font-size: 11px; color: #64748b; margin-top: 4px;">Tempelkan (paste) link publik dari Google Drive, DropBox, Canva, atau server kampus.</span>
        </div>
      </div>

      <div>
        <button type="submit" style="background: #074e50; color: white; padding: 12px 24px; border-radius: 10px; border: none; font-size: 12px; font-weight: 800; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
          <i class="fas fa-file-upload"></i> Unggah Dokumen
        </button>
      </div>
    </form>
  </div>

  <!-- Tabel Daftar Dokumen Ter-upload -->
  <div style="background: #ffffff; padding: 24px; border-radius: 16px; border: 1px solid #e2e8f0;">
    <h2 style="margin: 0 0 16px 0; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 800; color: #0f172a; display: flex; align-items: center; justify-content: space-between;">
      <span style="display: flex; align-items: center; gap: 8px;"><i class="fas fa-list" style="color: #074e50;"></i> Daftar Dokumen Terunggah ({{ $dokumens->count() }})</span>
    </h2>

    @if($dokumens->isEmpty())
      <div style="text-align: center; padding: 48px; background: #f8fafc; border-radius: 16px; border: 1px dashed #cbd5e1; color: #64748b;">
        <div style="width: 56px; height: 56px; background: #fffbeb; color: #d97706; border-radius: 9999px; display: inline-flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 12px;">
          <i class="fas fa-folder-open"></i>
        </div>
        <p style="font-size: 13px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">Belum ada dokumen yang diunggah.</p>
        <p style="font-size: 12px; color: #64748b; margin: 0;">Gunakan form di atas untuk mengunggah file panduan ATAU menempelkan (paste) link Google Drive dokumen.</p>
      </div>
    @else
      <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
          <thead>
            <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0; color: #475569; font-weight: 700; text-transform: uppercase; font-size: 11px;">
              <th style="padding: 12px 16px;">Judul Dokumen</th>
              <th style="padding: 12px 16px;">Kategori</th>
              <th style="padding: 12px 16px;">Tipe / Sumber</th>
              <th style="padding: 12px 16px;">Tanggal</th>
              <th style="padding: 12px 16px; text-align: right;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dokumens as $dok)
              @php
                $targetUrl = \Illuminate\Support\Str::startsWith($dok->file_path, ['http://', 'https://']) ? $dok->file_path : asset($dok->file_path);
              @endphp
              <tr style="border-bottom: 1px solid #f1f5f9;">
                <td style="padding: 14px 16px; font-weight: 700; color: #0f172a;">
                  <a href="{{ $targetUrl }}" target="_blank" style="color: #074e50; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-file-pdf" style="color: #d97706; font-size: 16px;"></i>
                    <span>{{ $dok->judul }}</span>
                  </a>
                </td>
                <td style="padding: 14px 16px;">
                  <span style="background: #f0fdf4; color: #074e50; font-size: 10px; font-weight: 800; padding: 3px 10px; border-radius: 9999px; border: 1px solid #bbf7d0;">
                    {{ $dok->kategori }}
                  </span>
                </td>
                <td style="padding: 14px 16px; font-weight: 700; font-size: 11px; color: #64748b;">
                  @if(\Illuminate\Support\Str::startsWith($dok->file_path, ['http://', 'https://']))
                    <span style="color: #d97706;"><i class="fas fa-link"></i> Link URL</span>
                  @else
                    <span style="color: #059669;"><i class="fas fa-file"></i> {{ strtoupper($dok->file_type) }} File</span>
                  @endif
                </td>
                <td style="padding: 14px 16px; color: #64748b; font-size: 12px;">
                  {{ \Carbon\Carbon::parse($dok->created_at)->format('d M Y') }}
                </td>
                <td style="padding: 14px 16px; text-align: right;">
                  <div style="display: flex; gap: 8px; justify-content: flex-end;">
                    <a href="{{ $targetUrl }}" target="_blank" style="background: #f0fdf4; color: #074e50; border: 1px solid #bbf7d0; padding: 5px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; text-decoration: none;">
                      <i class="fas fa-external-link-alt"></i> Buka
                    </a>
                    <form action="{{ route('admin.dokumen.delete', $dok->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" style="background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; padding: 5px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; cursor: pointer;">
                        <i class="fas fa-trash-alt"></i> Hapus
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>

</div>

<script>
  function toggleDokumenSource(type) {
    const fileDiv = document.getElementById('sourceDokumenFile');
    const urlDiv = document.getElementById('sourceDokumenUrl');
    const inputDokumenFile = document.getElementById('inputDokumenFile');
    const inputDokumenUrl = document.getElementById('inputDokumenUrl');

    if (type === 'file') {
      fileDiv.style.display = 'block';
      urlDiv.style.display = 'none';
      if (inputDokumenUrl) inputDokumenUrl.value = '';
    } else {
      fileDiv.style.display = 'none';
      urlDiv.style.display = 'block';
      if (inputDokumenFile) inputDokumenFile.value = '';
    }
  }
</script>
@endsection