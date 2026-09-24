<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin – LPPM STAIMAS Wonogiri</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html, body {
      height: 100vh;
      width: 100vw;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }
    body {
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
      background: linear-gradient(135deg, #032324 0%, #074e50 50%, #042e30 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #1e293b;
      position: relative;
    }

    /* Ambient Soft Glow Effects (Contained inside viewport) */
    .glow-bg-1 {
      position: absolute;
      top: -80px;
      left: -80px;
      width: 320px;
      height: 320px;
      background: rgba(16, 185, 129, 0.15);
      border-radius: 50%;
      filter: blur(70px);
      pointer-events: none;
    }
    .glow-bg-2 {
      position: absolute;
      bottom: -80px;
      right: -80px;
      width: 320px;
      height: 320px;
      background: rgba(245, 158, 11, 0.12);
      border-radius: 50%;
      filter: blur(70px);
      pointer-events: none;
    }

    /* Login Card Container */
    .login-card {
      background: #ffffff;
      width: 90%;
      max-width: 400px;
      border-radius: 24px;
      padding: 38px 32px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
      position: relative;
      z-index: 10;
    }

    .login-header {
      text-align: center;
      margin-bottom: 28px;
    }
    .login-logo {
      height: 48px;
      width: auto;
      margin: 0 auto 14px auto;
      display: block;
      object-fit: contain;
    }
    .login-title {
      font-size: 22px;
      font-weight: 800;
      color: #0f172a;
      letter-spacing: -0.02em;
      margin-bottom: 4px;
    }
    .login-subtitle {
      font-size: 12px;
      color: #64748b;
      font-weight: 500;
    }

    /* Alert Styling */
    .alert-error {
      background-color: #fef2f2;
      border: 1px solid #fecaca;
      color: #991b1b;
      padding: 10px 14px;
      border-radius: 12px;
      font-size: 12px;
      font-weight: 600;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    /* Form Elements */
    .form-group {
      margin-bottom: 18px;
    }
    .form-label {
      display: block;
      font-size: 12px;
      font-weight: 700;
      color: #334155;
      margin-bottom: 6px;
    }
    .input-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }
    .input-icon {
      position: absolute;
      left: 14px;
      color: #94a3b8;
      font-size: 13px;
      pointer-events: none;
      transition: color 0.2s ease;
    }
    .form-input {
      width: 100%;
      padding: 11px 14px 11px 40px;
      font-size: 13px;
      font-family: inherit;
      font-weight: 500;
      color: #0f172a;
      background-color: #f8fafc;
      border: 1.5px solid #e2e8f0;
      border-radius: 12px;
      outline: none;
      transition: all 0.2s ease;
    }
    .form-input::placeholder {
      color: #94a3b8;
      font-weight: 400;
    }
    .form-input:focus {
      background-color: #ffffff;
      border-color: #074e50;
      box-shadow: 0 0 0 3px rgba(7, 78, 80, 0.15);
    }
    .input-wrapper:focus-within .input-icon {
      color: #074e50;
    }

    .toggle-pw-btn {
      position: absolute;
      right: 14px;
      background: none;
      border: none;
      color: #94a3b8;
      cursor: pointer;
      font-size: 13px;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: color 0.2s ease;
    }
    .toggle-pw-btn:hover {
      color: #074e50;
    }

    /* Remember Checkbox */
    .remember-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 22px;
      font-size: 12px;
    }
    .checkbox-label {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      color: #475569;
      font-weight: 600;
      user-select: none;
    }
    .checkbox-label input[type="checkbox"] {
      width: 16px;
      height: 16px;
      accent-color: #074e50;
      border-radius: 4px;
      cursor: pointer;
    }

    /* Submit Button */
    .btn-submit {
      width: 100%;
      padding: 12px 20px;
      background: #074e50;
      color: #ffffff;
      font-size: 13px;
      font-weight: 800;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: all 0.2s ease;
      box-shadow: 0 4px 14px rgba(7, 78, 80, 0.3);
    }
    .btn-submit:hover {
      background: #053b3d;
      transform: translateY(-1px);
      box-shadow: 0 6px 18px rgba(7, 78, 80, 0.4);
    }
    .btn-submit:active {
      transform: translateY(0);
    }

    /* Back Link */
    .back-link-wrap {
      text-align: center;
      margin-top: 24px;
      padding-top: 18px;
      border-top: 1px solid #f1f5f9;
    }
    .back-link {
      font-size: 12px;
      font-weight: 700;
      color: #64748b;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: color 0.2s ease;
    }
    .back-link:hover {
      color: #074e50;
    }
  </style>
</head>
<body>

  <div class="glow-bg-1"></div>
  <div class="glow-bg-2"></div>

  <div class="login-card">
    
    <!-- Logo & Header -->
    <div class="login-header">
      <a href="{{ route('home') }}">
        <img src="{{ asset('assest/image.png') }}" alt="Logo STAIMAS" class="login-logo">
      </a>
      <h1 class="login-title">Login Admin</h1>
      <p class="login-subtitle">Sistem Informasi & Kelola Website LPPM STAIMAS</p>
    </div>

    @if ($errors->any())
      <div class="alert-error">
        <i class="fas fa-exclamation-circle"></i>
        <span>{{ $errors->first() }}</span>
      </div>
    @endif

    <form action="{{ route('admin.login.post') }}" method="POST">
      @csrf
      
      <!-- Email Field -->
      <div class="form-group">
        <label class="form-label">Email</label>
        <div class="input-wrapper">
          <i class="fas fa-envelope input-icon"></i>
          <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                 class="form-input" placeholder="Email">
        </div>
      </div>

      <!-- Password Field -->
      <div class="form-group">
        <label class="form-label">Password</label>
        <div class="input-wrapper">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" id="passwordInput" name="password" required 
                 class="form-input" style="padding-right: 40px;" placeholder="••••••••">
          <button type="button" onclick="togglePassword()" class="toggle-pw-btn" aria-label="Lihat Password">
            <i class="fas fa-eye" id="passwordToggleIcon"></i>
          </button>
        </div>
      </div>

      <!-- Remember Me -->
      <div class="remember-row">
        <label class="checkbox-label">
          <input type="checkbox" name="remember"> 
          <span>Ingat Sesi Saya</span>
        </label>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn-submit">
        <i class="fas fa-sign-in-alt"></i> Masuk Dashboard Admin
      </button>
    </form>

    <!-- Back to Website Link -->
    <div class="back-link-wrap">
      <a href="{{ route('home') }}" class="back-link">
        <i class="fas fa-arrow-left"></i> Kembali ke Website Utama
      </a>
    </div>

  </div>

  <script>
    function togglePassword() {
      const input = document.getElementById('passwordInput');
      const icon = document.getElementById('passwordToggleIcon');
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }
  </script>

</body>
</html>

