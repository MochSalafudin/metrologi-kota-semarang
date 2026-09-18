<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - UPTD Metrologi Kota Semarang</title>
    <link rel="icon" href="<?= base_url('assets/img/metrologi.png'); ?>" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --card-shadow: 0 25px 80px rgba(0, 0, 0, 0.2);
            --input-focus: rgba(102, 126, 234, 0.25);
        }
        
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }
        
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            margin: 0;
        }
        
        .register-container {
            width: 100%;
            max-width: 480px;
        }
        
        .register-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: var(--card-shadow);
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo-icon {
            width: 90px;
            height: 90px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        
        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .register-header h2 {
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 0.5rem;
            font-size: 1.75rem;
        }
        
        .register-header p {
            color: #6c757d;
            font-size: 0.95rem;
            margin: 0;
        }
        
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-wrapper .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-size: 1.1rem;
            z-index: 2;
        }
        
        .input-wrapper .form-control {
            width: 100%;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 0.875rem 1rem 0.875rem 3rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
        }
        
        .input-wrapper .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px var(--input-focus);
            outline: none;
        }
        
        .input-wrapper .form-control::placeholder {
            color: #adb5bd;
        }
        
        .btn-register {
            width: 100%;
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 1rem;
            font-weight: 600;
            font-size: 1.1rem;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            margin-top: 0.5rem;
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.5);
        }
        
        .btn-register:active {
            transform: translateY(-1px);
        }
        
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .login-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .login-link a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);
            color: white;
        }
        
        .alert-danger ul {
            margin: 0;
            padding-left: 1.25rem;
        }
        
        .home-link {
            position: fixed;
            top: 1.5rem;
            left: 1.5rem;
            z-index: 100;
        }
        
        .home-link a {
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.65rem 1.25rem;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .home-link a:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateX(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        
        .home-link a i {
            transition: transform 0.3s ease;
        }
        
        .home-link a:hover i {
            transform: translateX(-3px);
        }
        
        .form-hint {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 0.35rem;
        }

        @media (max-width: 576px) {
            .register-card {
                padding: 2rem 1.5rem;
            }
            
            .home-link {
                position: relative;
                top: 0;
                left: 0;
                margin-bottom: 1rem;
                text-align: center;
            }
        }

        .form-control:focus + .input-icon {
            color: #667eea;
        }

    </style>
</head>
<body>

    <div class="home-link d-none d-md-block">
        <a href="<?= base_url(); ?>">
            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>

    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <div class="logo-icon">
                    <img src="<?= base_url('assets/img/metrologi.png'); ?>" alt="Logo Metrologi">
                </div>
                <h2>Buat Akun Baru</h2>
                <p>UPTD Metrologi Kota Semarang</p>
            </div>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle me-2"></i><?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if(validation_errors()): ?>
                <div class="alert alert-danger">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/register'); ?>" method="post">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <div class="input-wrapper">
                        <i class="bi bi-person input-icon"></i>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" 
                               placeholder="Masukkan nama lengkap" value="<?= set_value('nama_lengkap'); ?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="whatsapp">Nomor WhatsApp</label>
                    <div class="input-wrapper">
                        <i class="bi bi-whatsapp input-icon"></i>
                        <input type="tel" class="form-control" id="whatsapp" name="whatsapp" 
                               placeholder="Contoh: 08123456789" value="<?= set_value('whatsapp'); ?>" required>
                    </div>
                    <div class="form-hint">Minimal 10 digit angka</div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email" class="form-control" id="email" name="email" 
                               placeholder="contoh@email.com" value="<?= set_value('email'); ?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <i class="bi bi-at input-icon"></i>
                        <input type="text" class="form-control" id="username" name="username" 
                               placeholder="Pilih username unik" value="<?= set_value('username'); ?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Minimal 5 karakter" required>
                    </div>
                    <div class="form-hint">Minimal 5 karakter</div>
                </div>
                
                <button type="submit" class="btn-register">
                    <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                </button>
            </form>
            
            <div class="login-link">
                Sudah punya akun? <a href="<?= base_url('auth'); ?>">Login di sini</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
