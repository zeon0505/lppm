<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Panel') – LPPM STAIMAS Wonogiri</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    * { box-sizing: border-box; }
    body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f1f5f9; margin: 0; padding: 0; }
    
    /* SIDEBAR STYLING */
    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 260px;
      background-color: #1c2434 !important;
      color: #94a3b8;
      z-index: 1000;
      display: flex;
      flex-direction: column;
      box-shadow: 4px 0 20px rgba(0,0,0,0.15);
      transition: transform 0.3s ease;
    }
    
    .sidebar-brand {
      height: 64px;
      background-color: #111827 !important;
      border-bottom: 1px solid #1f2937;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
    }

    .sidebar-menu {
      flex: 1;
      overflow-y: auto;
      padding: 24px 16px;
    }

    .sidebar-section-title {
      font-size: 10px;
      font-weight: 800;
      color: #64748b;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      margin: 0 0 12px 12px;
      display: block;
    }

    .sidebar-nav-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 14px;
      border-radius: 12px;
      font-size: 13px;
      font-weight: 600;
      color: #cbd5e1;
      text-decoration: none;
      margin-bottom: 4px;
      transition: all 0.2s ease;
    }

    .sidebar-nav-item:hover {
      background-color: #334155;
      color: #ffffff;
    }

    .sidebar-nav-item.active {
      background-color: #334155 !important;
      color: #ffffff !important;
      font-weight: 700;
      border-left: 4px solid #38bdf8;
    }

    .sidebar-nav-item i {
      width: 20px;
      text-align: center;
      font-size: 14px;
      color: #94a3b8;
    }
    .sidebar-nav-item.active i {
      color: #38bdf8;
    }

    /* MAIN CONTENT AREA */
    .admin-main-wrap {
      margin-left: 260px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background-color: #f1f5f9;
    }

    .admin-top-header {
      height: 64px;
      background-color: #ffffff !important;
      border-bottom: 1px solid #e2e8f0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 32px;
      position: sticky;
      top: 0;
      z-index: 900;
    }

    @media (max-width: 1024px) {
      #sidebar { transform: translateX(-100%); }
      #sidebar.open { transform: translateX(0); }
      .admin-main-wrap { margin-left: 0; }
    }
  </style>
</head>
<body>

  <!-- ================= SIDEBAR (TAILADMIN DARK STYLE) ================= -->
  <aside id="sidebar">
    
    <!-- Brand Logo -->
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard') }}" style="display: flex; align-items: center; gap: 12px; text-decoration: none;">
        <img src="{{ asset('assest/image.png') }}" alt="Logo STAIMAS" style="height: 32px; width: auto; max-height: 32px; max-width: 100px; object-fit: contain; background: white; padding: 2px 6px; border-radius: 6px; flex-shrink: 0;">
        <div>
          <span style="font-weight: 800; color: #ffffff; font-size: 14px; display: block; line-height: 1;">LPPM Admin</span>
          <span style="font-size: 9px; color: #38bdf8; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; display: block; margin-top: 3px;">STAIMAS</span>
        </div>
      </a>
      <button onclick="toggleSidebar()" class="lg:hidden" style="background: none; border: none; color: #94a3b8; cursor: pointer;">
        <i class="fas fa-times" style="font-size: 16px;"></i>
      </button>
    </div>

    <!-- Sidebar Links Scrollable -->
    <div class="sidebar-menu">
      
      <!-- NAVIGASI UTAMA -->
      <div style="margin-bottom: 24px;">
        <span class="sidebar-section-title">NAVIGASI UTAMA</span>
        
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="sidebar-nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
          <i class="fas fa-th-large"></i>
          <span>Dashboard</span>
        </a>

        <!-- Kelola Dokumen -->
        <a href="{{ route('admin.dokumen.index') }}" class="sidebar-nav-item {{ Route::is('admin.dokumen.*') ? 'active' : '' }}">
          <i class="fas fa-file-alt"></i>
          <span>Kelola Dokumen</span>
        </a>

        <!-- Kelola Dokumentasi -->
        <a href="{{ route('admin.dokumentasi.index') }}" class="sidebar-nav-item {{ Route::is('admin.dokumentasi.*') ? 'active' : '' }}">
          <i class="fas fa-camera"></i>
          <span>Kelola Dokumentasi</span>
        </a>
      </div>

      <!-- PENGATURAN & AKSES -->
      <div>
        <span class="sidebar-section-title">AKSES WEBSITE</span>
        
        <a href="{{ route('home') }}" target="_blank" class="sidebar-nav-item" style="color: #fde047;">
          <i class="fas fa-external-link-alt" style="color: #fde047;"></i>
          <span>Lihat Website LPPM</span>
        </a>

        <form action="{{ route('admin.logout') }}" method="POST" style="margin-top: 4px;">
          @csrf
          <button type="submit" class="sidebar-nav-item" style="width: 100%; background: none; border: none; cursor: pointer; color: #f87171; text-align: left;">
            <i class="fas fa-sign-out-alt" style="color: #f87171;"></i>
            <span>Logout System</span>
          </button>
        </form>
      </div>

    </div>

    <!-- Sidebar Footer -->
    <div style="padding: 14px; background: #111827; border-top: 1px solid #1f2937; font-size: 11px; color: #64748b; text-align: center;">
      &copy; {{ date('Y') }} LPPM STAIMAS Wonogiri
    </div>

  </aside>

  <!-- ================= MAIN CONTENT WRAPPER ================= -->
  <div class="admin-main-wrap">

    <!-- TOP HEADER BAR -->
    <header class="admin-top-header">
      <div style="display: flex; align-items: center; gap: 16px;">
        <button onclick="toggleSidebar()" class="lg:hidden" style="background: #f1f5f9; border: 1px solid #cbd5e1; padding: 6px 12px; border-radius: 8px; cursor: pointer;">
          <i class="fas fa-bars"></i>
        </button>
        <div>
          <h2 style="margin: 0; font-size: 14px; font-weight: 800; color: #0f172a;">Dashboard Administrator</h2>
          <span style="font-size: 11px; color: #64748b; font-weight: 600;">Sistem Informasi LPPM STAIMAS Wonogiri</span>
        </div>
      </div>

      <div style="display: flex; align-items: center; gap: 12px;">
        <div style="width: 36px; height: 36px; border-radius: 9999px; background: #074e50; color: white; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 14px;">
          A
        </div>
        <div class="hidden sm:block">
          <span style="font-size: 12px; font-weight: 800; color: #0f172a; display: block;">Administrator</span>
          <span style="font-size: 10px; font-weight: 700; color: #059669; display: block;">● Online System</span>
        </div>
      </div>
    </header>

    <!-- PAGE BODY CONTAINER -->
    <main style="padding: 32px; max-width: 1200px; width: 100%; margin: 0 auto; flex: 1;">
      
      @if(session('success'))
        <div style="background: #ecfdf5; border-left: 4px solid #10b981; color: #065f46; padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; font-size: 13px; font-weight: 600; display: flex; align-items: center; justify-content: space-between;">
          <div style="display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-check-circle" style="font-size: 18px; color: #10b981;"></i>
            <span>{{ session('success') }}</span>
          </div>
          <button onclick="this.parentElement.remove()" style="background: none; border: none; color: #10b981; cursor: pointer;">
            <i class="fas fa-times"></i>
          </button>
        </div>
      @endif

      @yield('content')
    </main>

  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('open');
    }
  </script>

</body>
</html>