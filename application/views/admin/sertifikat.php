<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --primary: #667eea; --dark: #1e293b; --sidebar-width: 280px; }
        * { font-family: 'Inter', sans-serif; }
        body { background: #f1f5f9; min-height: 100vh; }
        .sidebar { position: fixed; top: 0; left: 0; width: var(--sidebar-width); height: 100vh; background: linear-gradient(180deg, var(--dark) 0%, #0f172a 100%); padding: 1.5rem; z-index: 1000; }
        .sidebar-brand { color: white; font-weight: 700; font-size: 1.25rem; padding: 1rem 0; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem; }
        .sidebar-brand i { font-size: 1.75rem; color: var(--primary); }
        .nav-menu { list-style: none; padding: 0; margin: 0; }
        .nav-menu li { margin-bottom: 0.5rem; }
        .nav-menu a { display: flex; align-items: center; gap: 0.75rem; padding: 0.875rem 1rem; color: rgba(255,255,255,0.7); text-decoration: none; border-radius: 10px; font-weight: 500; }
        .nav-menu a:hover { color: white; }
        .nav-menu a.active { background: linear-gradient(135deg, var(--primary) 0%, #764ba2 100%); color: white; }
        .main-content { margin-left: var(--sidebar-width); padding: 2rem; }
        .card { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; }
        .table thead th { background: #f8fafc; border: none; font-weight: 600; color: #64748b; font-size: 0.85rem; }
        .table tbody td { padding: 1rem; vertical-align: middle; }
        .cert-badge { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 600; display: inline-block; }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-brand"><img src="<?= base_url('assets/img/metrologi.png'); ?>" alt="Logo" style="width:38px;height:38px;object-fit:contain;border-radius:50%;"><span>UPTD Metrologi</span></div>
    <ul class="nav-menu">
        <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
        <li><a href="<?= base_url('admin/pengajuan'); ?>"><i class="bi bi-file-earmark-text"></i> Pengajuan</a></li>
        <li><a href="<?= base_url('admin/jadwal'); ?>"><i class="bi bi-calendar-event"></i> Penjadwalan</a></li>
        <li><a href="<?= base_url('admin/petugas'); ?>"><i class="bi bi-people"></i> Petugas</a></li>
        <li><a href="<?= base_url('admin/sertifikat'); ?>" class="active"><i class="bi bi-award"></i> Sertifikat</a></li>
        <li><a href="<?= base_url('admin/notifikasi'); ?>"><i class="bi bi-bell"></i> Notifikasi</a></li>
        <li><hr style="border-color: rgba(255,255,255,0.1);"></li>
        <li><a href="<?= base_url('auth/logout'); ?>"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
    </ul>
</aside>

<main class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Sertifikat Terbit</h2>
            <p class="text-muted mb-0">Daftar sertifikat yang telah diterbitkan</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No. Sertifikat</th>
                            <th>No. Registrasi</th>
                            <th>Pemohon</th>
                            <th>Jenis Layanan</th>
                            <th>Tanggal Terbit</th>
                            <th>Berlaku Sampai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($sertifikat)): ?>
                            <tr><td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-award fs-1 d-block mb-2"></i>Belum ada sertifikat yang diterbitkan.
                            </td></tr>
                        <?php else: ?>
                            <?php foreach($sertifikat as $s): ?>
                            <tr>
                                <td><span class="cert-badge"><?= $s->no_sertifikat; ?></span></td>
                                <td><code><?= $s->no_registrasi; ?></code></td>
                                <td><?= $s->nama_pemohon; ?></td>
                                <td><span class="badge bg-primary"><?= $s->jenis_layanan; ?></span></td>
                                <td><?= date('d M Y', strtotime($s->tanggal_terbit)); ?></td>
                                <td><?= $s->tanggal_berlaku ? date('d M Y', strtotime($s->tanggal_berlaku)) : '-'; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
