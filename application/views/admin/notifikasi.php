<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - Admin</title>
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
        .notif-card { padding: 1.25rem; border-bottom: 1px solid #f1f5f9; display: flex; gap: 1rem; }
        .notif-card:last-child { border-bottom: none; }
        .notif-card.unread { background: #f8fafc; }
        .notif-icon { width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; }
        .notif-icon.pengajuan_baru { background: rgba(102, 126, 234, 0.15); color: var(--primary); }
        .notif-icon.verifikasi { background: rgba(16, 185, 129, 0.15); color: #10b981; }
        .notif-icon.sertifikat { background: rgba(245, 158, 11, 0.15); color: #f59e0b; }
        .notif-icon.info { background: rgba(59, 130, 246, 0.15); color: #3b82f6; }
        .notif-content h6 { margin: 0 0 0.25rem; font-weight: 600; }
        .notif-content p { margin: 0; color: #64748b; font-size: 0.9rem; }
        .notif-time { font-size: 0.8rem; color: #94a3b8; white-space: nowrap; }
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
        <li><a href="<?= base_url('admin/sertifikat'); ?>"><i class="bi bi-award"></i> Sertifikat</a></li>
        <li><a href="<?= base_url('admin/notifikasi'); ?>" class="active"><i class="bi bi-bell"></i> Notifikasi</a></li>
        <li><hr style="border-color: rgba(255,255,255,0.1);"></li>
        <li><a href="<?= base_url('auth/logout'); ?>"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
    </ul>
</aside>

<main class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Notifikasi</h2>
            <p class="text-muted mb-0">Semua notifikasi sistem</p>
        </div>
    </div>

    <div class="card">
        <?php if(empty($notifikasi)): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-bell-slash fs-1 d-block mb-2"></i>
                Tidak ada notifikasi.
            </div>
        <?php else: ?>
            <?php foreach($notifikasi as $n): ?>
            <div class="notif-card <?= $n->dibaca ? '' : 'unread'; ?>">
                <div class="notif-icon <?= $n->tipe; ?>">
                    <?php 
                    $icon = 'bi-info-circle';
                    if($n->tipe == 'pengajuan_baru') $icon = 'bi-file-earmark-plus';
                    elseif($n->tipe == 'verifikasi') $icon = 'bi-check-circle';
                    elseif($n->tipe == 'sertifikat') $icon = 'bi-award';
                    ?>
                    <i class="bi <?= $icon; ?>"></i>
                </div>
                <div class="notif-content flex-grow-1">
                    <h6><?= $n->judul; ?></h6>
                    <p><?= $n->pesan; ?></p>
                </div>
                <div class="notif-time"><?= date('d M Y, H:i', strtotime($n->created_at)); ?></div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
