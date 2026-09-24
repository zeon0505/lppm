@extends('layouts.app')

@section('title', 'Ketua Jurnal LPPM – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Ketua Jurnal LPPM')
@section('hero-subtitle', 'Pengelolaan & Tata Kelola Penerbitan Jurnal Ilmiah STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Ketua Jurnal LPPM')

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

  <!-- HEADER PROFIL KETUA JURNAL -->
  <div class="pg-card" style="border-top: 4px solid #d97706;">
    <div class="pg-card-body" style="padding: 32px;">
      <div style="display: flex; flex-direction: column; md:flex-row; gap: 24px; align-items: center;">
        <div style="width: 100px; height: 100px; border-radius: 9999px; overflow: hidden; border: 3px solid #fef3c7; flex-shrink: 0; background: #fffbeb;" class="shadow-sm">
          @if(file_exists(public_path('assest/fadilah.png')))
            <img src="{{ asset('assest/fadilah.png') }}" alt="Fadilah Qotimatun Puji Rahayu, S.H., M.H." style="width: 100px; height: 100px; object-fit: cover; object-position: top;">
          @else
            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #d97706; font-size: 32px;"><i class="fas fa-book-reader"></i></div>
          @endif
        </div>
        <div style="flex: 1; text-align: left;">
          <span style="font-size: 11px; font-weight: 800; color: #b45309; background: #fffbeb; padding: 4px 12px; border-radius: 9999px; uppercase; letter-spacing: 0.08em; border: 1px solid #fef3c7;">Ketua Jurnal LPPM</span>
          <h2 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 6px 0 4px 0;">Fadilah Qotimatun Puji Rahayu, S.H., M.H.</h2>
          <p style="margin: 0; color: #64748b; font-size: 13px;">Pengelola Publikasi Ilmiah & E-Journal LPPM STAIMAS Wonogiri</p>
        </div>
      </div>
    </div>
  </div>

  <!-- PERAN DAN TANGGUNG JAWAB -->
  <div class="pg-card">
    <div class="pg-card-head">
      <h3><i class="fas fa-tasks"></i> Peran & Tata Kelola Jurnal</h3>
    </div>
    <div class="pg-card-body">
      <p style="margin-top: 0;">
        Ketua Jurnal LPPM memimpin perencanaaan, penjaminan mutu editorial, akreditasi berkala, serta indeksasi seluruh publikasi jurnal ilmiah di lingkungan STAIMAS Wonogiri (Jurnal Al-Basirah & Jurnal Li Syabab).
      </p>
      
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-top: 20px;">
        <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #b45309; margin-bottom: 4px;"><i class="fas fa-check-circle mr-2"></i> Penjaminan Mutu Submisi</div>
          <div style="font-size: 13px; color: #64748b;">Pengawasan proses peer-review, pengecekan plagiarisme (Turnitin), dan standar etika publikasi.</div>
        </div>
        <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
          <div style="font-weight: 700; color: #b45309; margin-bottom: 4px;"><i class="fas fa-award mr-2"></i> Akreditasi & Indeksasi</div>
          <div style="font-size: 13px; color: #64748b;">Peningkatan reputasi jurnal menuju terindeks SINTA, Crossref (DOI), dan Google Scholar.</div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
