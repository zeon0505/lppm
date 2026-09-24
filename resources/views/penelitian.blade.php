@extends('layouts.app')

@section('title', 'Penelitian Dosen')

@section('hero-breadcrumb', 'Penelitian')
@section('hero-title', 'Pusat Penelitian Dosen')
@section('hero-subtitle', 'Mengkoordinasikan riset akademik berkualitas untuk publikasi ilmiah nasional dan internasional.')
@section('hero-icon', 'fas fa-microscope')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-6">

  <!-- Info & Panduan -->
  <div class="bg-white rounded-xl border border-slate-100 p-6 md:p-8 shadow-2xs mb-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-8 space-y-3.5">
        <h2 class="text-lg font-bold text-[#074e50]">Pemberitahuan & Skema Penelitian</h2>
        <p class="text-xs text-slate-600 leading-relaxed font-light">
          Riset di STAIMAS Wonogiri berfokus pada inovasi keilmuan agama, hukum islam, pendidikan madrasah, dakwah multimedia, dan regulasi ekonomi syariah. Setiap tahunnya, LPPM memberikan dana hibah internal yang didistribusikan melalui Skema Penelitian Dosen Pemula (PDP) dan Skema Penelitian Kolaboratif / Kerjasama Perguruan Tinggi.
        </p>
        <div class="flex flex-wrap gap-2.5 pt-2">
          <span class="inline-flex items-center gap-1 bg-[#074e50]/5 text-[#074e50] text-[10px] font-bold px-3 py-1 rounded-full"><i class="fas fa-check-circle text-amber-500"></i> Dosen Pemula</span>
          <span class="inline-flex items-center gap-1 bg-[#074e50]/5 text-[#074e50] text-[10px] font-bold px-3 py-1 rounded-full"><i class="fas fa-check-circle text-amber-500"></i> Riset Mandiri</span>
          <span class="inline-flex items-center gap-1 bg-[#074e50]/5 text-[#074e50] text-[10px] font-bold px-3 py-1 rounded-full"><i class="fas fa-check-circle text-amber-500"></i> Riset Kolaboratif</span>
        </div>
      </div>
      <div class="lg:col-span-4 space-y-3 bg-slate-50 p-5 rounded-xl border border-slate-100">
        <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-1.5">Panduan & Dokumen</h3>
        <a href="{{ route('unduhan') }}" class="w-full bg-[#074e50] hover:bg-[#053c3e] text-white text-xs font-semibold py-2 px-3 rounded-lg text-center block transition-colors">
          Lihat Unduhan Proposal
        </a>
        <a href="https://e-journal.staimaswonogiri.ac.id/" target="_blank" class="w-full border border-slate-200 hover:bg-slate-100 text-slate-600 text-xs font-semibold py-2 px-3 rounded-lg text-center block transition-colors">
          Kirim Manuskrip Jurnal
        </a>
      </div>
    </div>
  </div>

  <!-- List Penelitian -->
  <div class="bg-white rounded-xl border border-slate-100 shadow-2xs overflow-hidden">
    <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
      <h3 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider border-l-2 border-amber-500 pl-2">Daftar Penelitian Terkini</h3>
      <span class="text-[10px] text-slate-400 font-medium">Total: {{ count($penelitianList) }} Penelitian Terdaftar</span>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs border-collapse">
        <thead class="bg-slate-50 text-slate-700 font-bold border-b border-slate-100">
          <tr>
            <th class="p-4">Judul Penelitian</th>
            <th class="p-4">Peneliti Utama</th>
            <th class="p-4">Prodi / Kategori</th>
            <th class="p-4 text-center">Tahun</th>
            <th class="p-4 text-center">Status</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-slate-600">
          @foreach($penelitianList as $p)
          <tr class="hover:bg-slate-50/50">
            <td class="p-4 font-bold text-slate-900 leading-normal max-w-md">{{ $p['judul'] }}</td>
            <td class="p-4 font-medium">{{ $p['peneliti'] }}</td>
            <td class="p-4"><span class="bg-teal-50 text-[#074e50] font-semibold px-2 py-0.5 rounded">{{ $p['kategori'] }}</span></td>
            <td class="p-4 text-center font-medium">{{ $p['tahun'] }}</td>
            <td class="p-4 text-center">
              <span class="font-bold px-2 py-0.5 rounded-full text-[9px] uppercase {{ $p['status'] == 'Selesai' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                {{ $p['status'] }}
              </span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection