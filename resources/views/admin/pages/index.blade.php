@extends('admin.layouts.app')

@section('title', 'Kelola Konten Halaman')

@section('content')
<div class="space-y-6">

  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-xl font-bold text-[#074e50]">Kelola Konten Halaman</h1>
      <p class="text-xs text-slate-500 mt-1">Pilih halaman yang ingin diubah teks, visi-misi, sejarah, atau deskripsinya.</p>
    </div>
  </div>

  <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
    <table class="w-full text-left border-collapse text-xs">
      <thead>
        <tr class="bg-slate-50 text-slate-600 font-bold border-b border-slate-200 uppercase tracking-wider text-[11px]">
          <th class="py-3 px-4">No</th>
          <th class="py-3 px-4">Judul Halaman</th>
          <th class="py-3 px-4">Sub-Judul / Subtitle</th>
          <th class="py-3 px-4">Slug URL</th>
          <th class="py-3 px-4 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100 text-slate-700">
        @foreach($pages as $index => $page)
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="py-3 px-4 font-bold text-slate-400">{{ $index + 1 }}</td>
            <td class="py-3 px-4 font-bold text-[#074e50]">{{ $page->title }}</td>
            <td class="py-3 px-4 text-slate-500 max-w-xs truncate">{{ $page->subtitle ?? '-' }}</td>
            <td class="py-3 px-4 font-mono text-[11px] text-amber-600">/{{ $page->slug }}</td>
            <td class="py-3 px-4 text-center">
              <a href="{{ route('admin.pages.edit', $page->id) }}" class="inline-flex items-center gap-1 bg-amber-500 text-slate-950 font-bold px-3 py-1.5 rounded-lg hover:bg-amber-400 transition-colors">
                <i class="fas fa-edit text-[10px]"></i> Edit Isi
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection