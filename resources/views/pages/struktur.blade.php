@extends('layouts.app')

@section('title', 'Struktur Organisasi – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Struktur Organisasi LPPM')
@section('hero-subtitle', 'Bagan Kepengurusan Lembaga Penelitian dan Pengabdian Masyarakat STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Struktur Organisasi')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4 sm:px-6">

  <!-- MAIN ORGANIZATIONAL BOARD CONTAINER -->
  <div class="bg-white rounded-3xl p-6 md:p-12 shadow-sm border border-slate-100">

    <!-- Title Banner -->
    <div class="text-center mb-12">
      <span class="bg-[#074e50]/10 text-[#074e50] text-xs font-bold px-4 py-1.5 rounded-full inline-block mb-2 uppercase tracking-widest">
        LPPM STAIMAS WONOGIRI
      </span>
      <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">
        STRUKTUR ORGANISASI
      </h2>
      <p class="text-slate-500 text-xs md:text-sm mt-1">Bagan Pengelola Lembaga Penelitian dan Pengabdian Masyarakat</p>
    </div>

    <!-- ===== TREE DIAGRAM ===== -->
    <div class="relative max-w-5xl mx-auto space-y-8 z-10">

      <!-- 1. KEPALA LPPM: Nadhiroh, S. Sos. I., M. I.Kom -->
      <div class="flex justify-center text-center">
        <div class="flex flex-col items-center space-y-2">
          <!-- Bulat Photo Profile Avatar Locked 96px -->
          <div style="width: 96px; height: 96px; border-radius: 9999px; overflow: hidden; border: 2px solid #e2e8f0; margin: 0 auto; flex-shrink: 0; background: #f8fafc;" class="shadow-md flex items-center justify-center">
            @if(file_exists(public_path('assest/nadhiroh.png')))
              <img src="{{ asset('assest/nadhiroh.png') }}" alt="Nadhiroh, S. Sos. I., M. I.Kom" style="width: 96px !important; height: 96px !important; max-width: 96px !important; max-height: 96px !important; border-radius: 9999px !important; object-fit: cover !important; object-position: top !important; display: block !important;">
            @else
              <i class="fas fa-user-tie text-3xl text-[#074e50]"></i>
            @endif
          </div>
          <div class="bg-amber-50 border border-amber-100 px-4 py-1.5 rounded-xl inline-block max-w-xs">
            <span class="text-[10px] font-extrabold text-amber-800 uppercase tracking-wider block">Kepala LPPM</span>
            <h4 class="text-xs font-extrabold text-slate-900 mt-0.5">Nadhiroh, S. Sos. I., M. I.Kom</h4>
          </div>
        </div>
      </div>

      <!-- CONNECTOR LINE -->
      <div class="w-0.5 h-8 bg-slate-200 mx-auto"></div>

      <!-- 2. SEKRETARIS LPPM: M. UMAR KHADAFI, M. SOS (khadafi.png) -->
      <div class="flex justify-center text-center">
        <div class="flex flex-col items-center space-y-2">
          <!-- Bulat Photo Profile Avatar Locked 96px -->
          <div style="width: 96px; height: 96px; border-radius: 9999px; overflow: hidden; border: 2px solid #e2e8f0; margin: 0 auto; flex-shrink: 0; background: #f8fafc;" class="shadow-md flex items-center justify-center">
            @if(file_exists(public_path('assest/khadafi.png')))
              <img src="{{ asset('assest/khadafi.png') }}" alt="M. Umar Khadafi, M. Sos" style="width: 96px !important; height: 96px !important; max-width: 96px !important; max-height: 96px !important; border-radius: 9999px !important; object-fit: cover !important; object-position: top !important; display: block !important;">
            @elseif(file_exists(public_path('assest/umar.png')))
              <img src="{{ asset('assest/umar.png') }}" alt="M. Umar Khadafi, M. Sos" style="width: 96px !important; height: 96px !important; max-width: 96px !important; max-height: 96px !important; border-radius: 9999px !important; object-fit: cover !important; object-position: top !important; display: block !important;">
            @else
              <i class="fas fa-user-shield text-3xl text-[#074e50]"></i>
            @endif
          </div>
          <div class="bg-teal-50 border border-teal-100 px-4 py-1.5 rounded-xl inline-block max-w-xs">
            <span class="text-[10px] font-extrabold text-[#074e50] uppercase tracking-wider block">Sekretaris LPPM</span>
            <h4 class="text-xs font-bold text-slate-900 mt-0.5">M. Umar Khadafi, M. Sos</h4>
          </div>
        </div>
      </div>

      <!-- CONNECTOR LINE & HORIZONTAL BAR -->
      <div class="w-0.5 h-8 bg-slate-200 mx-auto"></div>

      <div class="relative py-1">
        <div class="w-full h-0.5 bg-slate-200"></div>
      </div>

      <!-- 3. 4 PUSAT STUDI -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-2">
        
        <!-- Pusat Studi 1: Dr. Dewi Agustini, S.Sos., M.M -->
        <div class="flex flex-col items-center text-center space-y-2">
          <div style="width: 96px; height: 96px; border-radius: 9999px; overflow: hidden; border: 2px solid #e2e8f0; margin: 0 auto; flex-shrink: 0; background: #f8fafc;" class="shadow-md flex items-center justify-center">
            @if(file_exists(public_path('assest/dewi.png')))
              <img src="{{ asset('assest/dewi.png') }}" alt="Dr. Dewi Agustini, S.Sos., M.M" style="width: 96px !important; height: 96px !important; max-width: 96px !important; max-height: 96px !important; border-radius: 9999px !important; object-fit: cover !important; object-position: top !important; display: block !important;">
            @else
              <i class="fas fa-user-graduate text-2xl text-[#074e50]"></i>
            @endif
          </div>
          <div class="bg-slate-50 border border-slate-100 p-2.5 rounded-xl w-full">
            <span class="text-[9px] font-extrabold text-amber-700 bg-amber-50 px-2 py-0.5 rounded uppercase block mb-1 leading-tight">Ka. Pusat Studi Bimbingan Konseling, Psikologi & Parenting</span>
            <h5 class="text-xs font-bold text-slate-900 leading-tight">Dr. Dewi Agustini, S.Sos., M.M</h5>
          </div>
        </div>

        <!-- Pusat Studi 2: Windari, S. H., M. H -->
        <div class="flex flex-col items-center text-center space-y-2">
          <div style="width: 96px; height: 96px; border-radius: 9999px; overflow: hidden; border: 2px solid #e2e8f0; margin: 0 auto; flex-shrink: 0; background: #f8fafc;" class="shadow-md flex items-center justify-center">
            @if(file_exists(public_path('assest/windari.png')))
              <img src="{{ asset('assest/windari.png') }}" alt="Windari, S. H., M. H" style="width: 96px !important; height: 96px !important; max-width: 96px !important; max-height: 96px !important; border-radius: 9999px !important; object-fit: cover !important; object-position: top !important; display: block !important;">
            @else
              <i class="fas fa-user-friends text-2xl text-[#074e50]"></i>
            @endif
          </div>
          <div class="bg-slate-50 border border-slate-100 p-2.5 rounded-xl w-full">
            <span class="text-[9px] font-extrabold text-teal-700 bg-teal-50 px-2 py-0.5 rounded uppercase block mb-1 leading-tight">Ka. Pusat Studi Gender dan Anak</span>
            <h5 class="text-xs font-bold text-slate-900 leading-tight">Windari, S. H., M. H</h5>
          </div>
        </div>

        <!-- Pusat Studi 3: Dr. Ruslina Dwi Wahyuni, S.Sos., M.A.P. -->
        <div class="flex flex-col items-center text-center space-y-2">
          <div style="width: 96px; height: 96px; border-radius: 9999px; overflow: hidden; border: 2px solid #e2e8f0; margin: 0 auto; flex-shrink: 0; background: #f8fafc;" class="shadow-md flex items-center justify-center">
            @if(file_exists(public_path('assest/ruslina.png')))
              <img src="{{ asset('assest/ruslina.png') }}" alt="Dr. Ruslina Dwi Wahyuni, S.Sos., M.A.P." style="width: 96px !important; height: 96px !important; max-width: 96px !important; max-height: 96px !important; border-radius: 9999px !important; object-fit: cover !important; object-position: top !important; display: block !important;">
            @else
              <i class="fas fa-hand-holding-heart text-2xl text-[#074e50]"></i>
            @endif
          </div>
          <div class="bg-slate-50 border border-slate-100 p-2.5 rounded-xl w-full">
            <span class="text-[9px] font-extrabold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded uppercase block mb-1 leading-tight">Ka. Pusat Studi Moderasi Beragama</span>
            <h5 class="text-xs font-bold text-slate-900 leading-tight">Dr. Ruslina Dwi Wahyuni, S.Sos., M.A.P.</h5>
          </div>
        </div>

        <!-- Pusat Studi 4: Fatmah, S.H., M.H -->
        <div class="flex flex-col items-center text-center space-y-2">
          <div style="width: 96px; height: 96px; border-radius: 9999px; overflow: hidden; border: 2px solid #e2e8f0; margin: 0 auto; flex-shrink: 0; background: #f8fafc;" class="shadow-md flex items-center justify-center">
            @if(file_exists(public_path('assest/fatmah.png')))
              <img src="{{ asset('assest/fatmah.png') }}" alt="Fatmah, S.H., M.H" style="width: 96px !important; height: 96px !important; max-width: 96px !important; max-height: 96px !important; border-radius: 9999px !important; object-fit: cover !important; object-position: top !important; display: block !important;">
            @else
              <i class="fas fa-lightbulb text-2xl text-[#074e50]"></i>
            @endif
          </div>
          <div class="bg-slate-50 border border-slate-100 p-2.5 rounded-xl w-full">
            <span class="text-[9px] font-extrabold text-purple-700 bg-purple-50 px-2 py-0.5 rounded uppercase block mb-1 leading-tight">Ka. Pusat Studi Kewirausahaan</span>
            <h5 class="text-xs font-bold text-slate-900 leading-tight">Fatmah, S.H., M.H</h5>
          </div>
        </div>

      </div>

      <!-- CONNECTOR LINE TO KETUA JURNAL -->
      <div class="w-0.5 h-8 bg-slate-200 mx-auto"></div>

      <!-- 4. KETUA JURNAL LPPM: Fadilah Qotimatun Puji Rahayu, S.H., M.H. -->
      <div class="flex justify-center text-center">
        <div class="flex flex-col items-center space-y-2">
          <!-- Bulat Photo Profile Avatar Locked 96px -->
          <div style="width: 96px; height: 96px; border-radius: 9999px; overflow: hidden; border: 2px solid #e2e8f0; margin: 0 auto; flex-shrink: 0; background: #f8fafc;" class="shadow-md flex items-center justify-center">
            @if(file_exists(public_path('assest/fadilah.png')))
              <img src="{{ asset('assest/fadilah.png') }}" alt="Fadilah Qotimatun Puji Rahayu, S.H., M.H." style="width: 96px !important; height: 96px !important; max-width: 96px !important; max-height: 96px !important; border-radius: 9999px !important; object-fit: cover !important; object-position: top !important; display: block !important;">
            @else
              <i class="fas fa-book-reader text-3xl text-[#074e50]"></i>
            @endif
          </div>
          <div class="bg-amber-50 border border-amber-100 px-4 py-1.5 rounded-xl inline-block max-w-xs">
            <span class="text-[10px] font-extrabold text-amber-800 uppercase tracking-wider block">Ketua Jurnal LPPM</span>
            <h4 class="text-xs font-extrabold text-slate-900 mt-0.5">Fadilah Qotimatun Puji Rahayu, S.H., M.H.</h4>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>
@endsection