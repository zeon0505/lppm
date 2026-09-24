@extends('layouts.app')

@section('title', 'Profil LPPM')

@section('hero-breadcrumb', 'Profil')
@section('hero-title', 'Profil & Struktur Organisasi')
@section('hero-subtitle', 'Mengenal Visi, Misi, Struktur Manajemen, dan Tim Pelaksana LPPM STAIMAS Wonogiri.')
@section('hero-icon', 'fas fa-id-card')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-6">

  <!-- Visi Misi -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
    <!-- Visi -->
    <div class="bg-white p-6 md:p-8 rounded-xl border border-slate-100 shadow-2xs">
      <div class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-teal-50 text-[#074e50] text-lg mb-4">
        <i class="fas fa-eye"></i>
      </div>
      <h2 class="text-xl font-extrabold text-slate-900 mb-4">Visi LPPM</h2>
      <p class="text-sm text-slate-600 leading-relaxed font-light">
        Menjadi lembaga terkemuka dalam penyelenggaraan penelitian dan pengabdian kepada masyarakat berbasis nilai-nilai keislaman dan kearifan lokal yang unggul, profesional, dan kontributif bagi pembangunan bangsa pada tahun 2030.
      </p>
    </div>

    <!-- Misi -->
    <div class="bg-white p-6 md:p-8 rounded-xl border border-slate-100 shadow-2xs">
      <div class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-amber-50 text-amber-600 text-lg mb-4">
        <i class="fas fa-bullseye"></i>
      </div>
      <h2 class="text-xl font-extrabold text-slate-900 mb-4">Misi LPPM</h2>
      <ul class="space-y-3.5 text-sm text-slate-600 font-light">
        <li class="flex items-start gap-2.5">
          <span class="w-5 h-5 rounded-full bg-[#074e50]/10 text-[#074e50] text-xs font-semibold flex items-center justify-center shrink-0 mt-0.5">1</span>
          <span>Menyelenggarakan penelitian di bidang keilmuan Islam, sosial, dan ekonomi yang berkualitas dan responsif terhadap isu-isu kontemporer.</span>
        </li>
        <li class="flex items-start gap-2.5">
          <span class="w-5 h-5 rounded-full bg-[#074e50]/10 text-[#074e50] text-xs font-semibold flex items-center justify-center shrink-0 mt-0.5">2</span>
          <span>Melaksanakan program pengabdian kepada masyarakat melalui pendampingan, pemberdayaan, dan kemitraan strategis dengan berbagai instansi dan UMKM.</span>
        </li>
        <li class="flex items-start gap-2.5">
          <span class="w-5 h-5 rounded-full bg-[#074e50]/10 text-[#074e50] text-xs font-semibold flex items-center justify-center shrink-0 mt-0.5">3</span>
          <span>Mendorong deseminasi, publikasi ilmiah, dan perolehan Hak Kekayaan Intelektual (HKI) hasil karya dosen dan mahasiswa.</span>
        </li>
      </ul>
    </div>
  </div>

  <!-- Struktur Organisasi -->
  <div class="bg-white p-6 md:p-8 rounded-xl border border-slate-100 shadow-2xs mb-12">
    <div class="text-center max-w-xl mx-auto mb-8">
      <h2 class="text-xl font-extrabold text-[#074e50]">Struktur Organisasi</h2>
      <p class="text-xs text-slate-500 mt-1.5">Manajemen inti di balik pelaksanaan penelitian dan pengabdian masyarakat STAIMAS Wonogiri.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
      @foreach($struktur as $s)
      <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 text-center space-y-4 hover:border-[#074e50]/20 hover:bg-white hover:shadow-xs transition-all duration-300">
        <div class="w-24 h-24 rounded-full overflow-hidden mx-auto border-2 border-amber-500 shadow-sm">
          <img src="{{ $s['foto'] }}" alt="{{ $s['nama'] }}" class="w-full h-full object-cover">
        </div>
        <div class="space-y-1">
          <h3 class="text-sm font-bold text-slate-900">{{ $s['nama'] }}</h3>
          <p class="text-[10px] font-bold text-[#074e50] bg-[#074e50]/10 px-2 py-0.5 rounded-full inline-block uppercase tracking-wider">{{ $s['jabatan'] }}</p>
        </div>
        <div class="text-xs text-slate-500 flex items-center justify-center gap-1.5">
          <i class="far fa-envelope text-amber-500"></i>
          <span>{{ $s['email'] }}</span>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>
@endsection