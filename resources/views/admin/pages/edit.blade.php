@extends('admin.layouts.app')

@section('title', 'Edit Halaman: ' . $page->title)

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">

  <div class="flex items-center justify-between border-b border-slate-200 pb-4">
    <div>
      <h1 class="text-xl font-bold text-[#074e50]">Edit Halaman: {{ $page->title }}</h1>
      <p class="text-xs text-slate-500 mt-1">Ubah judul, subtitle, dan teks isi konten untuk halaman ini.</p>
    </div>
    <a href="{{ route('admin.pages.index') }}" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
      &larr; Kembali ke daftar
    </a>
  </div>

  <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm">
    <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-xs font-bold text-slate-700 mb-1.5">Judul Halaman</label>
        <input type="text" name="title" value="{{ old('title', $page->title) }}" required class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#074e50]">
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-700 mb-1.5">Subtitle / Deskripsi Singkat Hero Header</label>
        <input type="text" name="subtitle" value="{{ old('subtitle', $page->subtitle) }}" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#074e50]">
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-700 mb-1.5">Isi Konten Halaman (HTML / Teks)</label>
        <textarea name="content" rows="12" class="w-full p-4 text-xs font-mono rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#074e50] leading-relaxed">{{ old('content', $page->content) }}</textarea>
        <span class="text-[10px] text-slate-400 mt-1 block">Anda dapat menggunakan tag HTML seperti &lt;strong&gt;, &lt;p&gt;, &lt;br&gt;, &lt;ul&gt;, &lt;li&gt;.</span>
      </div>

      <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
        <a href="{{ route('admin.pages.index') }}" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-200">
          Batal
        </a>
        <button type="submit" class="px-5 py-2 bg-[#074e50] text-white rounded-xl text-xs font-bold hover:bg-[#053c3e] shadow-md">
          <i class="fas fa-save mr-1"></i> Simpan Perubahan
        </button>
      </div>
    </form>
  </div>

</div>
@endsection