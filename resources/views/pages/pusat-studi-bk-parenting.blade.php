@extends('layouts.app')

@section('title', 'Pusat Studi Bimbingan Konseling, Psikologi & Parenting – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Pusat Studi BK, Psikologi & Parenting')
@section('hero-subtitle', 'Kajian Layanan Konseling Keluarga, Kesehatan Mental, dan Pola Asuh Islami')
@section('hero-breadcrumb', 'Pusat Studi BK & Parenting')

@section('content')
<style>
  .pg-wrap { max-width: 860px; margin: 0 auto; padding: 40px 20px; }
  .pg-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
  .pg-card-head { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; }
  .pg-card-head h3 { margin: 0; font-size: 15px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: 0.05em; display: flex; align-items: center; gap: 10px; }
  .pg-card-head h3 i { color: #d97706; font-size: 16px; }
  .pg-card-body { padding: 28px; font-size: 14px; line-height: 1.8; color: #334155; }
</style>

<div class="pg-wrap">

  <!-- HEADER PROFIL PUSAT STUDI & KETUA -->
  <div class="pg-card" style="border-top: 4px solid #d97706;">
    <div class="pg-card-body" style="padding: 32px;">
      <div style="display: flex; flex-direction: column; md:flex-row; gap: 24px; align-items: center;">
        <div style="width: 100px; height: 100px; border-radius: 9999px; overflow: hidden; border: 3px solid #fef3c7; flex-shrink: 0; background: #fffbeb;" class="shadow-sm">
          @if(file_exists(public_path('assest/dewi.png')))
            <img src="{{ asset('assest/dewi.png') }}" alt="Dr. Dewi Agustini, S.Sos., M.M" style="width: 100px; height: 100px; object-fit: cover; object-position: top;">
          @else
            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #d97706; font-size: 32px;"><i class="fas fa-user-graduate"></i></div>
          @endif
        </div>
        <div style="flex: 1; text-align: left;">
          <span style="font-size: 11px; font-weight: 800; color: #b45309; background: #fffbeb; padding: 4px 12px; border-radius: 9999px; uppercase; letter-spacing: 0.08em; border: 1px solid #fef3c7;">Kepala Pusat Studi</span>
          <h2 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 6px 0 4px 0;">Dr. Dewi Agustini, S.Sos., M.M</h2>
          <p style="margin: 0; color: #64748b; font-size: 13px;">Pusat Studi Bimbingan Konseling, Psikologi & Parenting LPPM STAIMAS Wonogiri</p>
        </div>
      </div>
    </div>
  </div>

  <!-- PROFIL & FOKUS -->
  <div class="pg-card">
    <div class="pg-card-head">
      <h3><i class="fas fa-info-circle"></i> Profil & Fokus Kajian</h3>
    </div>
    <div class="pg-card-body">
      <p style="margin-top: 0;">
        Pusat Studi Bimbingan Konseling, Psikologi & Parenting berfokus pada pengembangan riset dan layanan pengabdian masyarakat di bidang kesehatan mental keluarga, pendampingan konseling Islam, serta penguatan pendidikan ketahanan keluarga Islami.
      </p>
      
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-top: 20px;">
        <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #b45309; margin-bottom: 4px;"><i class="fas fa-heart text-amber-600 mr-2"></i> Parenting Islami</div>
          <div style="font-size: 13px; color: #64748b;">Pendampingan pola asuh anak berbasis nilai-nilai Al-Qur'an dan Sunnah di era digital.</div>
        </div>
        <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #b45309; margin-bottom: 4px;"><i class="fas fa-comments text-amber-600 mr-2"></i> Layanan Konseling</div>
          <div style="font-size: 13px; color: #64748b;">Konseling keluarga, remaja, dan pendampingan psikologis komunitas.</div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
