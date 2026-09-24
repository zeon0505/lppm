@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('hero-breadcrumb', 'Kontak')
@section('hero-title', 'Hubungi LPPM STAIMAS')
@section('hero-subtitle', 'Kirimkan pertanyaan, usulan proposal kemitraan, atau saran kepada kami.')
@section('hero-icon', 'fas fa-map-location-dot')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-6">

  <!-- Success Notification -->
  @if(session('success'))
  <div class="bg-green-50 border border-green-200 text-green-800 text-xs font-semibold p-4 rounded-xl mb-8 flex items-center gap-3">
    <i class="fas fa-check-circle text-green-600 text-lg"></i>
    <span>{{ session('success') }}</span>
  </div>
  @endif

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mb-12">
    
    <!-- Informasi Detail & Map -->
    <div class="lg:col-span-5 space-y-6">
      
      <!-- Kontak Info -->
      <div class="bg-white p-6 rounded-xl border border-slate-100 shadow-2xs space-y-6">
        <h3 class="text-sm font-bold text-[#074e50] uppercase tracking-wider border-l-2 border-amber-500 pl-2">Alamat & Kantor</h3>
        
        <div class="space-y-4 text-xs text-slate-600">
          <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-teal-50 text-[#074e50] flex items-center justify-center shrink-0 text-xs">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="space-y-0.5">
              <div class="font-bold text-slate-800">Gedung Central STAIMAS</div>
              <p class="leading-relaxed font-light">Jl. Cempaka 6, Wonoboyo, Wonogiri 57615, Jawa Tengah</p>
            </div>
          </div>
          
          <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-teal-50 text-[#074e50] flex items-center justify-center shrink-0 text-xs">
              <i class="fas fa-phone-alt"></i>
            </div>
            <div class="space-y-0.5">
              <div class="font-bold text-slate-800">Telepon / WhatsApp</div>
              <p class="leading-relaxed font-light">082223204552</p>
            </div>
          </div>

          <div class="flex items-start gap-3">
            <div class="w-8 h-8 rounded-lg bg-teal-50 text-[#074e50] flex items-center justify-center shrink-0 text-xs">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="space-y-0.5">
              <div class="font-bold text-slate-800">E-mail Resmi</div>
              <p class="leading-relaxed font-light">lppm@staimaswonogiri.ac.id</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Simulasi Maps -->
      <div class="bg-white rounded-xl border border-slate-100 shadow-2xs overflow-hidden">
        <div class="p-4 border-b border-slate-100">
          <h4 class="text-xs font-bold text-slate-900">Peta Lokasi Kampus</h4>
        </div>
        <div class="h-64 bg-slate-100 flex items-center justify-center text-slate-400 relative">
          <!-- Embed real static map image for premium design fallback -->
          <div class="absolute inset-0 bg-cover bg-center opacity-70" style="background-image: url('https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/110.9257, -7.8136,13,0/600x350?access_token=pk.eyJ1IjoiZXhhbXBsZSIsImEiOiJjajB4ZWZzazAwMDFzMzNyd28zbjh1dnM3In0.example')"></div>
          <div class="relative z-10 text-center px-4 space-y-2">
            <i class="fas fa-map-location text-3xl text-[#074e50]"></i>
            <p class="text-[11px] font-bold text-slate-800">STAIMAS Wonogiri</p>
            <a href="https://maps.google.com/?q=STAIMAS+Wonogiri" target="_blank" class="inline-block bg-[#074e50] hover:bg-[#053c3e] text-white text-[10px] font-semibold py-1.5 px-3 rounded-lg shadow-sm">
              Lihat di Google Maps
            </a>
          </div>
        </div>
      </div>

    </div>

    <!-- Form Kontak -->
    <div class="lg:col-span-7 bg-white p-6 md:p-8 rounded-xl border border-slate-100 shadow-2xs">
      <h3 class="text-sm font-bold text-[#074e50] uppercase tracking-wider mb-6 border-l-2 border-amber-500 pl-2">Hubungi Tim Layanan LPPM</h3>
      
      <form action="{{ route('kontak.kirim') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="space-y-1.5">
            <label for="nama" class="text-xs font-bold text-slate-700">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2.5 text-xs focus:bg-white focus:border-[#074e50] focus:ring-1 focus:ring-[#074e50] outline-none transition-all">
          </div>
          <div class="space-y-1.5">
            <label for="email" class="text-xs font-bold text-slate-700">Alamat E-mail</label>
            <input type="email" id="email" name="email" required class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2.5 text-xs focus:bg-white focus:border-[#074e50] focus:ring-1 focus:ring-[#074e50] outline-none transition-all">
          </div>
        </div>
        
        <div class="space-y-1.5">
          <label for="subjek" class="text-xs font-bold text-slate-700">Subjek Pesan</label>
          <input type="text" id="subjek" name="subjek" required class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2.5 text-xs focus:bg-white focus:border-[#074e50] focus:ring-1 focus:ring-[#074e50] outline-none transition-all">
        </div>

        <div class="space-y-1.5">
          <label for="pesan" class="text-xs font-bold text-slate-700">Isi Pesan Anda</label>
          <textarea id="pesan" name="pesan" rows="5" required class="w-full bg-slate-50 border border-slate-200 rounded-lg p-2.5 text-xs focus:bg-white focus:border-[#074e50] focus:ring-1 focus:ring-[#074e50] outline-none transition-all resize-none"></textarea>
        </div>

        <div class="pt-2">
          <button type="submit" class="w-full sm:w-auto bg-[#074e50] hover:bg-[#053c3e] text-white text-xs font-bold py-2.5 px-6 rounded-lg transition-colors flex items-center justify-center gap-1.5 shadow-sm">
            Kirim Pesan <i class="fas fa-paper-plane text-[10px]"></i>
          </button>
        </div>
      </form>
    </div>

  </div>

</div>
@endsection