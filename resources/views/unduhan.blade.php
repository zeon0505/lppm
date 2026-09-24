@extends('layouts.app')

@section('title', 'Dokumen Unduhan')

@section('hero-breadcrumb', 'Unduhan')
@section('hero-title', 'Pusat Unduhan Dokumen')
@section('hero-subtitle', 'Dapatkan berkas panduan proposal, laporan kemajuan, format KKN, dan form instrumen PkM.')
@section('hero-icon', 'fas fa-download')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-6">

  <!-- List Unduhan -->
  <div class="bg-white rounded-xl border border-slate-100 shadow-2xs overflow-hidden">
    <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
      <h3 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider border-l-2 border-amber-500 pl-2">Katalog Dokumen Resmi LPPM</h3>
      <span class="text-[10px] text-slate-400 font-medium">Total: {{ count($dokumen) }} File Tersedia</span>
    </div>
    
    <div class="divide-y divide-slate-100">
      @foreach($dokumen as $d)
      <div class="p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50/50 transition-colors">
        <div class="flex items-start gap-4">
          <!-- Icon format file -->
          <div class="w-10 h-10 rounded-lg flex items-center justify-center shrink-0 text-base font-bold
            {{ $d['format'] == 'PDF' ? 'bg-red-50 text-red-600' : 'bg-blue-50 text-blue-600' }}">
            @if($d['format'] == 'PDF')
              <i class="fas fa-file-pdf"></i>
            @else
              <i class="fas fa-file-word"></i>
            @endif
          </div>
          <div class="space-y-1">
            <h4 class="text-sm font-bold text-slate-900 leading-snug">{{ $d['nama'] }}</h4>
            <div class="flex items-center gap-3 text-[10px] text-slate-400">
              <span class="bg-slate-100 px-2 py-0.5 rounded font-medium text-slate-500 uppercase">{{ $d['kategori'] }}</span>
              <span><i class="fas fa-weight-hanging mr-1"></i>{{ $d['ukuran'] }}</span>
            </div>
          </div>
        </div>
        
        <div class="shrink-0 flex items-center gap-2">
          <a href="{{ $d['link'] }}" onclick="event.preventDefault(); alert('Mengunduh berkas: ' + '{{ $d['nama'] }}');" class="bg-[#074e50] hover:bg-[#053c3e] text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors inline-flex items-center gap-1.5 shadow-sm">
            <i class="fas fa-download text-[10px]"></i> Unduh File
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>
@endsection