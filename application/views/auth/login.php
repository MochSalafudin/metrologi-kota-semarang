<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UPTD Metrologi Kota Semarang</title>
    <link rel="icon" href="<?= base_url('assets/img/metrologi.png'); ?>" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --card-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            --input-focus: rgba(102, 126, 234, 0.25);
        }
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .login-header .logo-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-header .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .login-header h2 {
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 0.5rem;
        }
        
        .login-header p {
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .form-floating {
            margin-bottom: 1.25rem;
        }
        
        .form-floating .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1rem 1rem 1rem 3rem;
            height: auto;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-floating .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px var(--input-focus);
        }
        
        .form-floating label {
            padding-left: 3rem;
            color: #6c757d;
        }
        
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            z-index: 5;
        }
        
        .btn-login {
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 1rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }
        
        .register-link {
            text-align: center;
            margin-top: 2rem;
            color: #6c757d;
        }
        
        .register-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .register-link a:hover {
            color: #764ba2;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            font-size: 0.9rem;
            padding: 1rem;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);
            color: white;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #51cf66 0%, #40c057 100%);
            color: white;
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

    </style>
</head>
<body>

    <div class="home-link">
        <a href="<?= base_url(); ?>">
            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-icon">
                    <img src="<?= base_url('assets/img/metrologi.png'); ?>" alt="Logo Metrologi">
                </div>
                <h2>Selamat Datang</h2>
                <p>UPTD Metrologi Kota Semarang</p>
            </div>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger mb-3">
                    <i class="bi bi-exclamation-circle me-2"></i><?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success mb-3">
                    <i class="bi bi-check-circle me-2"></i><?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/login'); ?>" method="post">
                <div class="form-floating position-relative">
                    <i class="bi bi-person input-icon"></i>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>
                
                <div class="form-floating position-relative">
                    <i class="bi bi-lock input-icon"></i>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                
                <button type="submit" class="btn btn-login btn-primary w-100 mt-2">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                </button>
            </form>
            
            <div class="register-link">
                Belum punya akun? <a href="<?= base_url('auth/register'); ?>">Daftar sekarang</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
