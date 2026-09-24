@extends('layouts.app')

@section('title', 'Jurnal Li Syabab – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Jurnal Li Syabab')
@section('hero-subtitle', 'Jurnal Sosial dan Studi Islam – LPPM STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Jurnal Li Syabab')

@section('content')
<style>
  .pg-wrap { max-width: 860px; margin: 0 auto; padding: 40px 20px; }
  .pg-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
  .pg-card-head { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; }
  .pg-card-head h3 { margin: 0; font-size: 15px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: 0.05em; display: flex; align-items: center; gap: 10px; }
  .pg-card-head h3 i { color: #d97706; font-size: 16px; }
  .pg-card-body { padding: 28px; font-size: 14px; line-height: 1.8; color: #334155; }
  .pg-badge { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; padding: 4px 12px; border-radius: 9999px; }
  .badge-amber { background: #fffbeb; color: #b45309; border: 1px solid #fef3c7; }
  .badge-blue { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }
</style>

<div class="pg-wrap">

  <!-- PROFIL CHIEF EDITOR / PENGELOLA JURNAL (CARD ATAS) -->
  <div class="pg-card" style="border-top: 4px solid #d97706;">
    <div class="pg-card-body" style="padding: 32px; text-align: center;">
      <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <div style="width: 100px; height: 100px; border-radius: 9999px; overflow: hidden; border: 3px solid #fef3c7; flex-shrink: 0; background: #fffbeb; margin-bottom: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
          @if(file_exists(public_path('assest/fadilah.png')))
            <img src="{{ asset('assest/fadilah.png') }}" alt="Fadilah Qotimatun Puji Rahayu, S.H., M.H." style="width: 100%; height: 100%; object-fit: cover; object-position: top;">
          @else
            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #d97706; font-size: 36px;"><i class="fas fa-user"></i></div>
          @endif
        </div>
        <span style="font-size: 11px; font-weight: 800; color: #b45309; background: #fffbeb; padding: 4px 14px; border-radius: 9999px; text-transform: uppercase; letter-spacing: 0.08em; border: 1px solid #fef3c7; margin-bottom: 8px;">
          Chief Editor Jurnal Li Syabab
        </span>
        <h2 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 4px 0 4px 0;">Fadilah Qotimatun Puji Rahayu, S.H., M.H.</h2>
        <p style="margin: 0 0 16px 0; color: #64748b; font-size: 13px;">
          Pengelola Publikasi Ilmiah & E-Journal LPPM STAIMAS Wonogiri
        </p>
        <a href="{{ asset('assest/SK TIM JURNAL.pdf') }}" download target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #d97706; color: white; padding: 10px 20px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; box-shadow: 0 3px 8px rgba(217,119,6,0.25);">
          <i class="fas fa-file-download"></i> Download SK Pengelola
        </a>
      </div>
    </div>
  </div>

  <!-- HERO JOURNAL HEADER CARD -->
  <div class="pg-card">
    <div class="pg-card-body" style="padding: 32px;">
      <div style="display: flex; flex-direction: column; gap: 24px; align-items: flex-start;">
        <div style="width: 120px; flex-shrink: 0;">
          <img src="{{ asset('images/jurnal/cover-lisyabab.png') }}" alt="Cover Jurnal Lisyabab" style="width: 120px; border-radius: 10px; box-shadow: 0 6px 20px rgba(217,119,6,0.25); display: block;">
        </div>
        <div style="flex: 1;">
          <div style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap;">
            <span class="pg-badge badge-amber">Frekuensi: 2 Kali / Tahun</span>
            <span class="pg-badge badge-blue">Karya Mahasiswa & Dosen</span>
          </div>
          <h2 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.02em;">Jurnal Li Syabab</h2>
          <p style="margin: 0; color: #475569; font-size: 14px; line-height: 1.7;">
            Jurnal Lisyabab adalah jurnal akademik yang diterbitkan oleh Lembaga Penelitian dan Pengabdian Masyarakat STAIMAS Wonogiri. Jurnal Lisyabab bertujuan untuk menerbitkan artikel di bidang sosial dan studi Islam, tidak terbatas pada hasil penelitian, tetapi juga studi ilmiah dan kasus-kasus lapangan. Jurnal ini diterbitkan dua kali setahun untuk volume yang sama, dan bertujuan menyediakan media bagi akademisi, peneliti, pakar, dan pengamat untuk berkomunikasi dalam kerangka pengembangan ilmiah di bidang sosial dan studi Islam.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- FOCUS & SCOPE GRID -->
  <div class="pg-card">
    <div class="pg-card-head">
      <h3><i class="fas fa-search"></i> Ruang Lingkup Riset</h3>
    </div>
    <div class="pg-card-body">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
        <div style="padding: 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #b45309; font-size: 13px; margin-bottom: 4px;"><i class="fas fa-users" style="margin-right: 6px;"></i> Ilmu Sosial & Kemasyarakatan</div>
          <p style="font-size: 12px; color: #64748b; margin: 0;">Hasil penelitian, studi ilmiah, dan kasus lapangan di bidang sosial kemasyarakatan.</p>
        </div>
        <div style="padding: 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #b45309; font-size: 13px; margin-bottom: 4px;"><i class="fas fa-book-open" style="margin-right: 6px;"></i> Studi Islam</div>
          <p style="font-size: 12px; color: #64748b; margin: 0;">Kajian keislaman kontemporer, tafsir, pemikiran Islam, dan studi Al-Quran Hadis.</p>
        </div>
        <div style="padding: 16px; border-radius: 12px; background: #f8fafc; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #b45309; font-size: 13px; margin-bottom: 4px;"><i class="fas fa-flask" style="margin-right: 6px;"></i> Riset & Studi Kasus Lapangan</div>
          <p style="font-size: 12px; color: #64748b; margin: 0;">Studi kasus empiris, riset berbasis komunitas, dan kajian lintas disiplin sosial-Islam.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- AKSES PORTAL OJS -->
  <div class="pg-card">
    <div class="pg-card-head">
      <h3><i class="fas fa-upload"></i> Submisi & Akses Online</h3>
    </div>
    <div class="pg-card-body">
      <p style="margin-top: 0; margin-bottom: 20px;">
        Naskah dikirimkan melalui sistem OJS dengan mengikuti panduan penulisan yang berlaku di LPPM STAIMAS Wonogiri.
      </p>
      <div style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="https://e-journal.staimaswonogiri.ac.id/index.php/lisyabab" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #d97706; color: white; padding: 12px 24px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; box-shadow: 0 2px 6px rgba(217,119,6,0.2);">
          <i class="fas fa-globe"></i> Kunjungi Portal Jurnal Li Syabab
        </a>
        <a href="{{ route('dokumen') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #f1f5f9; color: #334155; padding: 12px 24px; border-radius: 10px; font-weight: 700; font-size: 13px; text-decoration: none; border: 1px solid #cbd5e1;">
          <i class="fas fa-file-alt"></i> Petunjuk Penulisan
        </a>
      </div>
    </div>
  </div>

</div>
@endsection
