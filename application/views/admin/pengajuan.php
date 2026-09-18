<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengajuan - Admin</title>
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
        .card-header { background: transparent; border-bottom: 1px solid #f1f5f9; padding: 1.25rem 1.5rem; font-weight: 600; }
        .filter-tabs { display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1.5rem; }
        .filter-tabs .btn { border-radius: 50px; padding: 0.5rem 1.25rem; font-weight: 500; }
        .table thead th { background: #f8fafc; border: none; font-weight: 600; color: #64748b; font-size: 0.85rem; }
        .table tbody td { padding: 1rem; vertical-align: middle; }
        .badge-status { padding: 0.4rem 0.75rem; border-radius: 50px; font-size: 0.75rem; font-weight: 600; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-diproses { background: #dbeafe; color: #1e40af; }
        .badge-selesai { background: #d1fae5; color: #065f46; }
        .badge-ditolak { background: #fee2e2; color: #991b1b; }
        .btn-action { width: 35px; height: 35px; padding: 0; display: inline-flex; align-items: center; justify-content: center; border-radius: 8px; }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-brand"><img src="<?= base_url('assets/img/metrologi.png'); ?>" alt="Logo" style="width:38px;height:38px;object-fit:contain;border-radius:50%;"><span>UPTD Metrologi</span></div>
    <ul class="nav-menu">
        <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
        <li><a href="<?= base_url('admin/pengajuan'); ?>" class="active"><i class="bi bi-file-earmark-text"></i> Pengajuan</a></li>
        <li><a href="<?= base_url('admin/jadwal'); ?>"><i class="bi bi-calendar-event"></i> Penjadwalan</a></li>
        <li><a href="<?= base_url('admin/petugas'); ?>"><i class="bi bi-people"></i> Petugas</a></li>
        <li><a href="<?= base_url('admin/sertifikat'); ?>"><i class="bi bi-award"></i> Sertifikat</a></li>
        <li><a href="<?= base_url('admin/notifikasi'); ?>"><i class="bi bi-bell"></i> Notifikasi</a></li>
        <li><hr style="border-color: rgba(255,255,255,0.1);"></li>
        <li><a href="<?= base_url('auth/logout'); ?>"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
    </ul>
</aside>

<main class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Kelola Pengajuan</h2>
            <p class="text-muted mb-0">Total <?= $stats['total']; ?> pengajuan</p>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="filter-tabs">
        <a href="<?= base_url('admin/pengajuan'); ?>" class="btn <?= $filter_status == 'semua' ? 'btn-primary' : 'btn-outline-secondary'; ?>">
            Semua <span class="badge bg-light text-dark ms-1"><?= $stats['total']; ?></span>
        </a>
        <a href="<?= base_url('admin/pengajuan/pending'); ?>" class="btn <?= $filter_status == 'pending' ? 'btn-warning' : 'btn-outline-warning'; ?>">
            Pending <span class="badge bg-warning text-dark ms-1"><?= $stats['pending']; ?></span>
        </a>
        <a href="<?= base_url('admin/pengajuan/diproses'); ?>" class="btn <?= $filter_status == 'diproses' ? 'btn-info' : 'btn-outline-info'; ?>">
            Diproses <span class="badge bg-info ms-1"><?= $stats['diproses']; ?></span>
        </a>
        <a href="<?= base_url('admin/pengajuan/selesai'); ?>" class="btn <?= $filter_status == 'selesai' ? 'btn-success' : 'btn-outline-success'; ?>">
            Selesai <span class="badge bg-success ms-1"><?= $stats['selesai']; ?></span>
        </a>
        <a href="<?= base_url('admin/pengajuan/ditolak'); ?>" class="btn <?= $filter_status == 'ditolak' ? 'btn-danger' : 'btn-outline-danger'; ?>">
            Ditolak <span class="badge bg-danger ms-1"><?= $stats['ditolak']; ?></span>
        </a>
    </div>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i><?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No. Registrasi</th>
                            <th>Pemohon</th>
                            <th>Jenis Layanan</th>
                            <th>Jenis UTTP</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($pengajuan)): ?>
                            <tr><td colspan="7" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>Tidak ada data pengajuan.
                            </td></tr>
                        <?php else: ?>
                            <?php foreach($pengajuan as $p): ?>
                            <tr>
                                <td><code class="text-primary fw-bold"><?= $p->no_registrasi; ?></code></td>
                                <td>
                                    <div class="fw-semibold"><?= $p->nama_pemohon; ?></div>
                                    <small class="text-muted"><?= $p->nama_lengkap; ?></small>
                                </td>
                                <td><span class="badge bg-primary"><?= $p->jenis_layanan; ?></span></td>
                                <td><?= $p->jenis_uttp; ?></td>
                                <td><?= date('d M Y', strtotime($p->created_at)); ?></td>
                                <td>
                                    <?php
                                    $badge = 'badge-pending';
                                    if($p->status == 'diproses') $badge = 'badge-diproses';
                                    elseif($p->status == 'selesai') $badge = 'badge-selesai';
                                    elseif($p->status == 'ditolak') $badge = 'badge-ditolak';
                                    ?>
                                    <span class="badge-status <?= $badge; ?>"><?= ucfirst($p->status); ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/detail_pengajuan/' . $p->id); ?>" class="btn btn-action btn-outline-primary" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
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
