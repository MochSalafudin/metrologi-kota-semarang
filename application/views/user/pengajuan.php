<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan - UPTD Metrologi Kota Semarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --card-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: #f0f2f5;
            min-height: 100vh;
        }
        
        .navbar {
            background: var(--primary-gradient) !important;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
        }
        
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .btn-logout {
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.5rem 1.25rem;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            background: white;
            color: #667eea;
        }
        
        .page-header {
            background: var(--primary-gradient);
            border-radius: 20px;
            padding: 2rem;
            color: white;
            margin-bottom: 2rem;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }
        
        .page-header h2 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .form-card .card-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 1px solid #e9ecef;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            color: #495057;
        }
        
        .form-card .card-header i {
            color: #667eea;
        }
        
        .form-card .card-body {
            padding: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        }
        
        .form-text {
            color: #6c757d;
            font-size: 0.85rem;
        }
        
        .no-registrasi-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            padding: 1.25rem;
            color: white;
            text-align: center;
        }
        
        .no-registrasi-box label {
            font-size: 0.85rem;
            opacity: 0.8;
            margin-bottom: 0.25rem;
            display: block;
        }
        
        .no-registrasi-box .no-reg {
            font-family: 'Courier New', monospace;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .service-option {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .service-option:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }
        
        .service-option input[type="radio"] {
            display: none;
        }
        
        .service-option input[type="radio"]:checked + .service-content {
            color: #667eea;
        }
        
        .service-option input[type="radio"]:checked ~ .service-option,
        .service-option:has(input[type="radio"]:checked) {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }
        
        .service-option .service-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #667eea;
        }
        
        .service-option .service-name {
            font-weight: 600;
            color: #495057;
        }
        
        .location-option {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1.25rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .location-option:hover {
            border-color: #667eea;
        }
        
        .location-option input[type="radio"]:checked + label {
            color: #667eea;
        }
        
        .location-option:has(input[type="radio"]:checked) {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }
        
        .location-option .location-icon {
            font-size: 1.5rem;
            color: #667eea;
        }
        
        .file-upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            background: #f8f9fa;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .file-upload-area:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }
        
        .file-upload-area i {
            font-size: 3rem;
            color: #adb5bd;
            margin-bottom: 1rem;
        }
        
        .file-upload-area p {
            margin-bottom: 0.5rem;
            color: #495057;
            font-weight: 500;
        }
        
        .file-upload-area small {
            color: #6c757d;
        }
        
        .btn-submit {
            background: var(--primary-gradient);
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }
        
        .btn-secondary-custom {
            background: #f8f9fa;
            border: 2px solid #dee2e6;
            color: #495057;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-secondary-custom:hover {
            background: #e9ecef;
            border-color: #ced4da;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            color: #721c24;
        }
        
        .required-star {
            color: #dc3545;
        }

        /* Custom radio styles */
        .form-check-custom {
            padding: 0;
        }
        
        .form-check-custom .form-check-input {
            margin: 0;
        }
        
        .form-check-custom label {
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/img/metrologi.png'); ?>" alt="Logo" style="width:32px;height:32px;object-fit:contain;border-radius:50%;" class="me-2">UPTD Metrologi
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user/dashboard'); ?>">
                        <i class="bi bi-grid-1x2 me-1"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('user/pengajuan'); ?>">
                        <i class="bi bi-plus-circle me-1"></i>Buat Pengajuan
                    </a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <span class="text-white me-3">
                    <i class="bi bi-person-circle me-1"></i>
                    <?= $this->session->userdata('nama_lengkap'); ?>
                </span>
                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-logout">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="container py-4">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2><i class="bi bi-file-earmark-plus me-2"></i>Form Pengajuan Layanan UTTP</h2>
                <p class="mb-0 opacity-75">Silakan lengkapi formulir berikut untuk mengajukan permohonan layanan.</p>
            </div>
            <div class="col-md-4">
                <div class="no-registrasi-box">
                    <label>Nomor Registrasi</label>
                    <div class="no-reg"><?= $no_registrasi; ?></div>
                </div>
            </div>
        </div>
    </div>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger mb-4">
            <i class="bi bi-exclamation-circle me-2"></i><?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if(validation_errors()): ?>
        <div class="alert alert-danger mb-4">
            <i class="bi bi-exclamation-circle me-2"></i>
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('user/pengajuan'); ?>" method="post" enctype="multipart/form-data">
        
        <!-- Data Pemohon -->
        <div class="form-card">
            <div class="card-header">
                <i class="bi bi-person-badge me-2"></i>Data Pemohon
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama_pemohon" class="form-label">Nama Pemohon <span class="required-star">*</span></label>
                    <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" 
                           value="<?= set_value('nama_pemohon', $this->session->userdata('nama_lengkap')); ?>" required>
                </div>
            </div>
        </div>

        <!-- Data Pemilik UTTP -->
        <div class="form-card">
            <div class="card-header">
                <i class="bi bi-building me-2"></i>Data Pemilik UTTP
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nama_pemilik" class="form-label">Nama Pemilik atau Instansi <span class="required-star">*</span></label>
                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" 
                               value="<?= set_value('nama_pemilik'); ?>" placeholder="Masukkan nama pemilik atau nama instansi" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Dokumen Pendukung</label>
                        <div class="file-upload-area" onclick="document.getElementById('dokumen_pendukung').click()">
                            <i class="bi bi-cloud-arrow-up"></i>
                            <p>Klik atau seret file ke sini</p>
                            <small>Format: PDF, DOC, DOCX, JPEG, JPG • Maksimal 2 MB</small>
                            <input type="file" id="dokumen_pendukung" name="dokumen_pendukung" 
                                   accept=".pdf,.doc,.docx,.jpeg,.jpg" style="display: none;"
                                   onchange="updateFileName(this)">
                        </div>
                        <div id="file-name" class="form-text mt-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jenis Layanan -->
        <div class="form-card">
            <div class="card-header">
                <i class="bi bi-gear me-2"></i>Jenis Layanan <span class="required-star">*</span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3 col-6">
                        <label class="service-option w-100">
                            <input type="radio" name="jenis_layanan" value="Tera" <?= set_radio('jenis_layanan', 'Tera'); ?> required>
                            <div class="service-content">
                                <div class="service-icon"><i class="bi bi-check2-square"></i></div>
                                <div class="service-name">Tera</div>
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="service-option w-100">
                            <input type="radio" name="jenis_layanan" value="Tera Ulang" <?= set_radio('jenis_layanan', 'Tera Ulang'); ?>>
                            <div class="service-content">
                                <div class="service-icon"><i class="bi bi-arrow-repeat"></i></div>
                                <div class="service-name">Tera Ulang</div>
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="service-option w-100">
                            <input type="radio" name="jenis_layanan" value="Pengujian" <?= set_radio('jenis_layanan', 'Pengujian'); ?>>
                            <div class="service-content">
                                <div class="service-icon"><i class="bi bi-clipboard-check"></i></div>
                                <div class="service-name">Pengujian</div>
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 col-6">
                        <label class="service-option w-100">
                            <input type="radio" name="jenis_layanan" value="Kalibrasi" <?= set_radio('jenis_layanan', 'Kalibrasi'); ?>>
                            <div class="service-content">
                                <div class="service-icon"><i class="bi bi-rulers"></i></div>
                                <div class="service-name">Kalibrasi</div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tempat Pengerjaan -->
        <div class="form-card">
            <div class="card-header">
                <i class="bi bi-geo-alt me-2"></i>Tempat Pengerjaan <span class="required-star">*</span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="location-option w-100">
                            <input type="radio" name="tempat_pengerjaan" value="Di Tempat" <?= set_radio('tempat_pengerjaan', 'Di Tempat'); ?> required>
                            <div class="location-icon"><i class="bi bi-house-door"></i></div>
                            <div>
                                <div class="fw-bold">Di Tempat</div>
                                <small class="text-muted">Petugas datang ke lokasi Anda</small>
                            </div>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label class="location-option w-100">
                            <input type="radio" name="tempat_pengerjaan" value="Di Kantor" <?= set_radio('tempat_pengerjaan', 'Di Kantor'); ?>>
                            <div class="location-icon"><i class="bi bi-building"></i></div>
                            <div>
                                <div class="fw-bold">Di Kantor</div>
                                <small class="text-muted">Bawa alat ke kantor UPTD</small>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data UTTP -->
        <div class="form-card">
            <div class="card-header">
                <i class="bi bi-box-seam me-2"></i>Data UTTP (Ukur, Takar, Timbang, dan Perlengkapannya)
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="jenis_uttp" class="form-label">Jenis UTTP <span class="required-star">*</span></label>
                        <input type="text" class="form-control" id="jenis_uttp" name="jenis_uttp" 
                               value="<?= set_value('jenis_uttp'); ?>" placeholder="Contoh: Timbangan, Meteran" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas <span class="required-star">*</span></label>
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" 
                               value="<?= set_value('kapasitas'); ?>" placeholder="Contoh: 100 kg, 50 liter" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="jumlah_alat" class="form-label">Jumlah Alat <span class="required-star">*</span></label>
                        <input type="number" class="form-control" id="jumlah_alat" name="jumlah_alat" 
                               value="<?= set_value('jumlah_alat', 1); ?>" min="1" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Catatan -->
        <div class="form-card">
            <div class="card-header">
                <i class="bi bi-chat-left-text me-2"></i>Catatan untuk Petugas
            </div>
            <div class="card-body">
                <textarea class="form-control" id="catatan" name="catatan" rows="4" 
                          placeholder="Tuliskan catatan atau informasi tambahan jika diperlukan..."><?= set_value('catatan'); ?></textarea>
                <div class="form-text">Opsional - Berikan informasi tambahan yang perlu diketahui petugas</div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="d-flex justify-content-between">
            <a href="<?= base_url('user/dashboard'); ?>" class="btn btn-secondary-custom">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
            <button type="submit" class="btn btn-submit btn-primary">
                <i class="bi bi-send me-2"></i>Kirim Pengajuan
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function updateFileName(input) {
    const fileNameDiv = document.getElementById('file-name');
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const fileSize = (file.size / 1024 / 1024).toFixed(2);
        
        if (file.size > 2 * 1024 * 1024) {
            fileNameDiv.innerHTML = '<span class="text-danger"><i class="bi bi-exclamation-circle me-1"></i>File terlalu besar! Maksimal 2 MB</span>';
            input.value = '';
        } else {
            fileNameDiv.innerHTML = '<span class="text-success"><i class="bi bi-check-circle me-1"></i>' + file.name + ' (' + fileSize + ' MB)</span>';
        }
    } else {
        fileNameDiv.innerHTML = '';
    }
}

// Make service and location options clickable
document.querySelectorAll('.service-option, .location-option').forEach(option => {
    option.addEventListener('click', function() {
        const radio = this.querySelector('input[type="radio"]');
        if (radio) {
            radio.checked = true;
            // Remove active state from siblings
            const name = radio.getAttribute('name');
            document.querySelectorAll(`input[name="${name}"]`).forEach(r => {
                r.closest('.service-option, .location-option')?.classList.remove('active');
            });
            this.classList.add('active');
        }
    });
});
</script>
</body>
</html>
