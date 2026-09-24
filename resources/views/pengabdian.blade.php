@extends('layouts.app')

@section('title', 'Pengabdian Masyarakat')

@section('hero-breadcrumb', 'Pengabdian')
@section('hero-title', 'Pengabdian kepada Masyarakat & KKN')
@section('hero-subtitle', 'Memberikan penguatan sosial, ekonomi keagamaan, dan pembinaan UMKM di Wonogiri.')
@section('hero-icon', 'fas fa-people-carry-box')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-6">

  <!-- Info Pengabdian -->
  <div class="bg-white rounded-xl border border-slate-100 p-6 md:p-8 shadow-2xs mb-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-8 space-y-3.5">
        <h2 class="text-lg font-bold text-[#074e50]">Pemberdayaan Masyarakat LPPM</h2>
        <p class="text-xs text-slate-600 leading-relaxed font-light">
          Program Pengabdian kepada Masyarakat (PkM) merupakan wujud bakti sosial akademis dari sivitas akademika STAIMAS Wonogiri. Kami bermitra dengan Kantor Kemenag, KUA, Kelurahan, hingga Badan Usaha Milik Desa (BUMDes) untuk pendampingan sertifikasi halal gratis, penyuluhan pencegahan pernikahan usia dini, pengembangan kurikulum TPA/Madrasah, serta program unggulan Kuliah Kerja Nyata (KKN) Tematik Mahasiswa.
        </p>
        <div class="flex flex-wrap gap-2.5 pt-2">
          <span class="inline-flex items-center gap-1 bg-[#074e50]/5 text-[#074e50] text-[10px] font-bold px-3 py-1 rounded-full"><i class="fas fa-check-circle text-amber-500"></i> Sertifikasi Halal Gratis</span>
          <span class="inline-flex items-center gap-1 bg-[#074e50]/5 text-[#074e50] text-[10px] font-bold px-3 py-1 rounded-full"><i class="fas fa-check-circle text-amber-500"></i> KKN Tematik UMKM</span>
          <span class="inline-flex items-center gap-1 bg-[#074e50]/5 text-[#074e50] text-[10px] font-bold px-3 py-1 rounded-full"><i class="fas fa-check-circle text-amber-500"></i> Penyuluhan Keagamaan</span>
        </div>
      </div>
      <div class="lg:col-span-4 bg-slate-50 p-5 rounded-xl border border-slate-100 space-y-3">
        <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-1.5">Informasi KKN</h3>
        <p class="text-[11px] text-slate-500 font-light leading-normal">
          Dapatkan berkas panduan pelaksanaan KKN Tematik Angkatan XV terbaru, log book kegiatan, dan surat keterangan pendaftaran.
        </p>
        <a href="{{ route('unduhan') }}" class="w-full bg-[#074e50] hover:bg-[#053c3e] text-white text-xs font-semibold py-2 px-3 rounded-lg text-center block transition-colors">
          Unduh Berkas KKN
        </a>
      </div>
    </div>
  </div>

  <!-- List Pengabdian -->
  <div class="bg-white rounded-xl border border-slate-100 shadow-2xs overflow-hidden">
    <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
      <h3 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider border-l-2 border-amber-500 pl-2">Daftar Kegiatan Pengabdian Masyarakat</h3>
      <span class="text-[10px] text-slate-400 font-medium">Total: {{ count($pengabdianList) }} Kegiatan Aktif</span>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs border-collapse">
        <thead class="bg-slate-50 text-slate-700 font-bold border-b border-slate-100">
          <tr>
            <th class="p-4">Judul Pengabdian</th>
            <th class="p-4">Pelaksana Utama</th>
            <th class="p-4">Sasaran Utama</th>
            <th class="p-4">Mitra Kerja / Kolaborasi</th>
            <th class="p-4 text-center">Tahun</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-slate-600">
          @foreach($pengabdianList as $p)
          <tr class="hover:bg-slate-50/50">
            <td class="p-4 font-bold text-slate-900 leading-normal max-w-sm">{{ $p['judul'] }}</td>
            <td class="p-4 font-medium">{{ $p['pelaksana'] }}</td>
            <td class="p-4 font-medium text-slate-500">{{ $p['sasaran'] }}</td>
            <td class="p-4"><span class="bg-amber-50 text-amber-700 font-semibold px-2 py-0.5 rounded border border-amber-100">{{ $p['kemitraan'] }}</span></td>
            <td class="p-4 text-center font-medium">{{ $p['tahun'] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection