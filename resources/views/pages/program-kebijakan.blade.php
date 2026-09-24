<style>
.pg-wrap { max-width: 860px; margin: 0 auto; padding: 40px 20px; }
.pg-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; margin-bottom: 24px; }
.pg-card-head { padding: 18px 28px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; gap: 10px; }
.pg-dot { width: 4px; height: 20px; border-radius: 99px; background: #074e50; flex-shrink: 0; }
.pg-card-title { font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #1e293b; }
.pg-card-body { padding: 28px 28px; font-size: 14px; color: #475569; line-height: 1.85; }
.pg-card-body p { margin-bottom: 14px; }
.pg-card-body p:last-child { margin-bottom: 0; }
.pg-empty { text-align: center; padding: 60px 28px; }
.pg-empty-icon { width: 56px; height: 56px; background: #f8fafc; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
.pg-empty-title { font-size: 15px; font-weight: 700; color: #1e293b; margin-bottom: 8px; }
.pg-empty-desc { font-size: 13px; color: #94a3b8; line-height: 1.7; max-width: 340px; margin: 0 auto 24px; }
.pg-btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: #074e50; color: #fff; font-size: 13px; font-weight: 600; border-radius: 10px; text-decoration: none; transition: background 0.15s; }
.pg-btn:hover { background: #053c3e; }
</style>@extends('layouts.app')
@section('title', 'Program dan Kebijakan – LPPM STAIMAS Wonogiri')
@section('hero-title', 'Program dan Kebijakan')
@section('hero-subtitle', 'Arah strategis penelitian dan pengabdian masyarakat STAIMAS Wonogiri')
@section('hero-breadcrumb', 'Program dan Kebijakan')
@section('hero-icon', 'fas fa-landmark')
@section('content')
<div class="pg-wrap">
  <div class="pg-card">
    <div class="pg-card-head">
      <div class="pg-dot"></div>
      <div class="pg-card-title">Program Strategis LPPM</div>
    </div>
    <div class="pg-card-body">
      <p>LPPM STAIMAS Wonogiri menjalankan program strategis yang diarahkan pada penguatan tri dharma perguruan tinggi, khususnya dalam bidang penelitian dan pengabdian kepada masyarakat. Program dirancang secara terarah, berkelanjutan, dan berorientasi pada kebutuhan nyata masyarakat serta perkembangan ilmu pengetahuan.</p>
      <p>Program-program LPPM meliputi hibah penelitian internal, pembimbingan penulisan artikel ilmiah, pendampingan KKN mahasiswa, serta pengelolaan jurnal ilmiah yang terakreditasi.</p>
    </div>
  </div>
  <div class="pg-card">
    <div class="pg-card-head">
      <div class="pg-dot" style="background:#f59e0b;"></div>
      <div class="pg-card-title">Kebijakan Tata Kelola</div>
    </div>
    <div class="pg-card-body">
      <p>Pelaksanaan penelitian dan pengabdian kepada masyarakat di STAIMAS Wonogiri berpedoman pada Rencana Induk Penelitian (RIP) dan Rencana Strategis (Renstra) LPPM yang disusun secara periodik dan mengacu pada kebijakan nasional dari Kementerian Agama Republik Indonesia.</p>
      <p>Setiap kegiatan penelitian dan pengabdian wajib memenuhi standar etika akademik, prosedur administrasi, dan pelaporan yang ditetapkan dalam panduan resmi LPPM STAIMAS Wonogiri.</p>
    </div>
  </div>
</div>
@endsection
