@extends('layouts.app')

@section('title', 'Publikasi & Jurnal')

@section('hero-breadcrumb', 'Publikasi')
@section('hero-title', 'Publikasi Ilmiah & Jurnal LPPM')
@section('hero-subtitle', 'Mengelola jurnal ilmiah kampus terakreditasi dan deseminasi buku karya dosen.')
@section('hero-icon', 'fas fa-journal-whills')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-6">

  <!-- Jurnal Ilmiah List -->
  <div class="mb-12">
    <h2 class="text-xl font-extrabold text-slate-900 mb-6 flex items-center gap-2">
      <i class="fas fa-book text-amber-500"></i> Jurnal Ilmiah STAIMAS Wonogiri
    </h2>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      @foreach($jurnal as $j)
      <div class="bg-white p-6 rounded-xl border border-slate-100 shadow-2xs hover:shadow-xs transition-shadow flex flex-col justify-between">
        <div class="space-y-4">
          <div class="flex justify-between items-start gap-2">
            <h3 class="text-sm font-bold text-slate-900 leading-snug">{{ $j['nama'] }}</h3>
            <span class="bg-[#074e50]/10 text-[#074e50] text-[9px] font-bold px-2 py-0.5 rounded uppercase tracking-wider shrink-0">{{ $j['sinta'] }}</span>
          </div>
          <div class="text-[10px] text-slate-400 space-y-0.5">
            <div><span class="font-semibold text-slate-500">P-ISSN:</span> {{ $j['p_issn'] }}</div>
            <div><span class="font-semibold text-slate-500">E-ISSN:</span> {{ $j['e_issn'] }}</div>
          </div>
          <p class="text-xs text-slate-500 leading-relaxed font-light">
            <span class="font-semibold text-slate-600">Fokus kajian:</span> {{ $j['fokus'] }}
          </p>
        </div>
        <div class="pt-5">
          <a href="{{ $j['link'] }}" target="_blank" class="w-full bg-[#074e50] hover:bg-[#053c3e] text-white text-xs font-semibold py-2 px-3 rounded-lg text-center block transition-colors flex items-center justify-center gap-1.5 shadow-sm">
            Buka Portal Jurnal <i class="fas fa-external-link-alt text-[9px]"></i>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Buku Terbitan Press -->
  <div>
    <h2 class="text-xl font-extrabold text-slate-900 mb-6 flex items-center gap-2">
      <i class="fas fa-book-atlas text-amber-500"></i> Buku & Karya Ilmiah Dosen
    </h2>

    <div class="bg-white rounded-xl border border-slate-100 shadow-2xs overflow-hidden">
      <div class="p-5 border-b border-slate-100">
        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-l-2 border-amber-500 pl-2">Daftar Buku Ber-ISBN Terdaftar</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs border-collapse">
          <thead class="bg-slate-50 text-slate-700 font-bold border-b border-slate-100">
            <tr>
              <th class="p-4">Judul Buku / Buku Ajar</th>
              <th class="p-4">Penulis Dosen</th>
              <th class="p-4">Penerbit</th>
              <th class="p-4 text-center">ISBN</th>
              <th class="p-4 text-center">Tahun Terbit</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-slate-600">
            @foreach($buku as $b)
            <tr class="hover:bg-slate-50/50">
              <td class="p-4 font-bold text-slate-900 leading-normal max-w-sm">{{ $b['judul'] }}</td>
              <td class="p-4 font-medium">{{ $b['penulis'] }}</td>
              <td class="p-4 text-slate-500">{{ $b['penerbit'] }}</td>
              <td class="p-4 text-center font-medium">{{ $b['isbn'] }}</td>
              <td class="p-4 text-center font-medium">{{ $b['tahun'] }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection