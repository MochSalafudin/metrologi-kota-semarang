<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - UPTD Metrologi Kota Semarang</title>
    <link rel="icon" href="<?= base_url('assets/img/metrologi.png'); ?>" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --info-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
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
            z-index: 100;
            position: relative;
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
        
        .welcome-card {
            background: var(--primary-gradient);
            border-radius: 20px;
            padding: 2rem;
            color: white;
            margin-bottom: 2rem;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }
        
        .welcome-card h2 {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .btn-new-pengajuan {
            background: white;
            color: #667eea;
            font-weight: 600;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .btn-new-pengajuan:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .content-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: none;
        }
        
        .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .card-body {
            padding: 0;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background: #f8fafc;
            border: none;
            font-weight: 600;
            color: #64748b;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
        }
        
        .table tbody td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid #f8fafc;
            color: #334155;
            font-size: 0.95rem;
        }
        
        .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.8rem;
        }
        
        .badge-pending { 
            background: linear-gradient(135deg, #ffd194 0%, #ffc371 100%);
            color: #bf360c;
        }
        
        .badge-diproses {
            background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
            color: #1565c0;
        }
        
        .badge-selesai {
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
            color: #2e7d32;
        }
        
        .badge-ditolak {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            color: #c62828;
        }
        
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        .empty-state p {
            color: #6c757d;
            font-size: 1.1rem;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
            color: #1b5e20;
        }
        
        .no-reg {
            font-family: 'Courier New', monospace;
            font-weight: 700;
            color: #667eea;
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
                    <a class="nav-link active" href="<?= base_url('user/dashboard'); ?>">
                        <i class="bi bi-grid-1x2 me-1"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user/pengajuan'); ?>">
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
    <div class="welcome-card">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2><i class="bi bi-hand-wave me-2"></i>Selamat Datang, <?= $this->session->userdata('nama_lengkap'); ?>!</h2>
                <p class="mb-0 opacity-75">Kelola pengajuan layanan UTTP Anda dengan mudah melalui dashboard ini.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="<?= base_url('user/pengajuan'); ?>" class="btn btn-new-pengajuan">
                    <i class="bi bi-plus-lg me-2"></i>Buat Pengajuan Baru
                </a>
            </div>
        </div>
    </div>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success mb-4">
            <i class="bi bi-check-circle-fill me-2"></i><?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="content-card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <span><i class="bi bi-clock-history me-2"></i>Riwayat Pengajuan</span>
            <span class="badge bg-primary"><?= count($pengajuan); ?> Total</span>
        </div>
        <div class="card-body p-0">
            <?php if(empty($pengajuan)): ?>
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <p>Belum ada riwayat pengajuan.</p>
                    <a href="<?= base_url('user/pengajuan'); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-2"></i>Buat Pengajuan Pertama
                    </a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No. Registrasi</th>
                                <th>Jenis Layanan</th>
                                <th>Jenis UTTP</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pengajuan as $p): ?>
                            <tr>
                                <td class="no-reg"><?= $p->no_registrasi; ?></td>
                                <td><?= $p->jenis_layanan; ?></td>
                                <td><?= $p->jenis_uttp; ?></td>
                                <td><?= date('d M Y', strtotime($p->created_at)); ?></td>
                                <td>
                                    <?php
                                    $badge_class = 'badge-pending';
                                    $status_text = 'Pending';
                                    if($p->status == 'diproses') {
                                        $badge_class = 'badge-diproses';
                                        $status_text = 'Diproses';
                                    } elseif($p->status == 'selesai') {
                                        $badge_class = 'badge-selesai';
                                        $status_text = 'Selesai';
                                    } elseif($p->status == 'ditolak') {
                                        $badge_class = 'badge-ditolak';
                                        $status_text = 'Ditolak';
                                    }
                                    ?>
                                    <span class="badge-status <?= $badge_class; ?>"><?= $status_text; ?></span>
                                    <?php if($p->status == 'diproses' && !empty($p->nama_petugas)): ?>
                                    <div class="mt-2 p-2" style="background: #f0f4ff; border-radius: 8px; font-size: 0.78rem; border: 1px solid #d0d9f0;">
                                        <div style="color: #1565c0; font-weight: 600; margin-bottom: 2px;">
                                            <i class="bi bi-person-badge me-1"></i>Petugas:
                                        </div>
                                        <div style="color: #37474f;"><?= $p->nama_petugas; ?></div>
                                        <?php if(!empty($p->hp_petugas)): ?>
                                        <div style="color: #546e7a;">
                                            <i class="bi bi-telephone me-1"></i><?= $p->hp_petugas; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('user/detail/' . $p->id); ?>" class="btn btn-sm btn-outline-primary me-1" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <?php if($p->status == 'selesai'): ?>
                                    <a href="<?= base_url('user/sertifikat/' . $p->id); ?>" class="btn btn-sm btn-success" title="Download Sertifikat">
                                        <i class="bi bi-award me-1"></i>Sertifikat
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
