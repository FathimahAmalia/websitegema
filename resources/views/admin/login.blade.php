<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - SMK Gema Cyber School</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 15% 20%, #1e3a8a 0%, #0f172a 45%, #020617 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
        }

        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45);
            max-width: 440px;
            width: 100%;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.15);
            position: relative;
            z-index: 2;
        }

        .login-header {
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: #ffffff;
            padding: 2.25rem 2rem 2rem;
            text-align: center;
            position: relative;
        }

        .login-logo-box {
            width: 64px;
            height: 64px;
            background: #ffffff;
            color: #2563eb;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            margin-bottom: 1rem;
        }

        .login-body {
            padding: 2rem;
        }

        .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.68rem 0.95rem;
            font-size: 0.88rem;
            color: #1e293b;
            background-color: #f8fafc;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .input-group-text {
            border: 1.5px solid #e2e8f0;
            background-color: #f8fafc;
            border-radius: 10px;
        }

        .btn-login {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;
            font-weight: 700;
            padding: 0.75rem;
            border-radius: 10px;
            border: none;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
            transform: translateY(-1px);
        }

        .demo-card {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            padding: 1rem;
            font-size: 0.82rem;
            color: #475569;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <div class="login-logo-box">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h4 class="fw-bold mb-1 letter-spacing-tight">SMK GEMA CYBER</h4>
            <p class="mb-0 text-white-50 small">Panel Masuk Administrator CMS</p>
        </div>

        <div class="login-body">
            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show small py-2 rounded-3" role="alert">
                    <i class="bi bi-info-circle-fill me-1"></i>
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (isset($errors) && $errors->any())
                <div class="alert alert-danger alert-dismissible fade show small py-2 mb-3 rounded-3" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                    {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold text-dark">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0 text-muted">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" name="email" id="email" class="form-control border-start-0 ps-1" placeholder="admin@smkgemacyber.sch.id" value="{{ old('email', 'admin@smkgemacyber.sch.id') }}" required autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small fw-bold text-dark">Kata Sandi (Password)</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0 text-muted">
                            <i class="bi bi-key"></i>
                        </span>
                        <input type="password" name="password" id="password" class="form-control border-start-0 border-end-0 ps-1" placeholder="••••••••" value="password123" required>
                        <button class="btn btn-light border border-start-0 text-muted" type="button" id="togglePasswordBtn" title="Lihat Password">
                            <i class="bi bi-eye" id="togglePasswordIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                        <label class="form-check-label small text-secondary" for="remember">
                            Ingat saya di browser ini
                        </label>
                    </div>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle" style="font-size: 0.7rem;">Super Admin</span>
                </div>

                <button type="submit" class="btn btn-login w-100 d-flex align-items-center justify-content-center gap-2 mb-3">
                    <i class="bi bi-box-arrow-in-right fs-5"></i>
                    <span>Masuk ke Panel Admin</span>
                </button>
            </form>

            <!-- Quick Demo Credential Card -->
            <div class="demo-card mt-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="d-flex align-items-center gap-1.5 fw-bold text-dark">
                        <i class="bi bi-key-fill text-primary"></i>
                        <span>Akun Default Sistem:</span>
                    </div>
                    <button type="button" class="btn btn-sm btn-link p-0 text-primary text-decoration-none fw-semibold small" id="autofillBtn">
                        <i class="bi bi-magic me-1"></i>Isi Otomatis
                    </button>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span>Email:</span>
                    <strong class="text-primary font-monospace">admin@smkgemacyber.sch.id</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Password:</span>
                    <strong class="text-primary font-monospace">password123</strong>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="text-decoration-none small text-muted d-inline-flex align-items-center gap-1 hover-primary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda Website
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password Visibility Toggle
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const passInput = document.getElementById('password');
        const passIcon = document.getElementById('togglePasswordIcon');

        toggleBtn.addEventListener('click', function () {
            if (passInput.type === 'password') {
                passInput.type = 'text';
                passIcon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passInput.type = 'password';
                passIcon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        });

        // Autofill Credentials Button
        const autofillBtn = document.getElementById('autofillBtn');
        const emailInput = document.getElementById('email');

        autofillBtn.addEventListener('click', function() {
            emailInput.value = 'admin@smkgemacyber.sch.id';
            passInput.value = 'password123';
            emailInput.focus();
        });
    </script>
</body>
</html>
