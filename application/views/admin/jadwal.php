<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjadwalan Pengujian - Admin</title>
    <link rel="icon" href="<?= base_url('assets/img/metrologi.png'); ?>" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --primary: #667eea; --primary-dark: #5a67d8; --secondary: #764ba2; --success: #10b981; --warning: #f59e0b; --danger: #ef4444; --info: #3b82f6; --dark: #1e293b; --sidebar-width: 280px; }
        * { font-family: 'Inter', sans-serif; }
        body { background: #f1f5f9; min-height: 100vh; }
        .sidebar { position: fixed; top: 0; left: 0; width: var(--sidebar-width); height: 100vh; background: linear-gradient(180deg, var(--dark) 0%, #0f172a 100%); padding: 1.5rem; z-index: 1000; overflow-y: auto; }
        .sidebar-brand { color: white; font-weight: 700; font-size: 1.25rem; padding: 1rem 0; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem; }
        .sidebar-brand img { width: 38px; height: 38px; object-fit: contain; border-radius: 50%; }
        .nav-menu { list-style: none; padding: 0; margin: 0; }
        .nav-menu li { margin-bottom: 0.5rem; }
        .nav-menu a { display: flex; align-items: center; gap: 0.75rem; padding: 0.875rem 1rem; color: rgba(255,255,255,0.7); text-decoration: none; border-radius: 10px; font-weight: 500; }
        .nav-menu a:hover { color: white; }
        .nav-menu a.active { background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); color: white; }
        .nav-menu i { font-size: 1.25rem; }
        .main-content { margin-left: var(--sidebar-width); padding: 2rem; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .page-title h1 { font-weight: 700; color: var(--dark); margin: 0; }
        .page-title p { color: #64748b; margin: 0; }
        .card { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; overflow: hidden; }
        .card-header { background: transparent; border-bottom: 1px solid #f1f5f9; padding: 1.25rem 1.5rem; font-weight: 600; }
        .card-body { padding: 1.5rem; }
        .table { margin: 0; }
        .table thead th { background: #f8fafc; border: none; font-weight: 600; color: #64748b; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; padding: 1rem; }
        .table tbody td { padding: 1rem; vertical-align: middle; border-color: #f1f5f9; }
        .badge-status { padding: 0.4rem 0.75rem; border-radius: 50px; font-size: 0.75rem; font-weight: 600; }
        .badge-dijadwalkan { background: #dbeafe; color: #1e40af; }
        .badge-berlangsung { background: #fef3c7; color: #92400e; }
        .badge-selesai { background: #d1fae5; color: #065f46; }
        .badge-dibatalkan { background: #fee2e2; color: #991b1b; }
        .btn-primary { background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); border: none; border-radius: 10px; font-weight: 600; }
        .btn-outline-primary { border-color: var(--primary); color: var(--primary); border-radius: 10px; font-weight: 600; }
        .btn-outline-primary:hover { background: var(--primary); border-color: var(--primary); }
        .filter-tabs { display: flex; gap: 0.5rem; margin-bottom: 1.5rem; flex-wrap: wrap; }
        .filter-tab { padding: 0.5rem 1.25rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; text-decoration: none; border: 2px solid #e2e8f0; color: #64748b; background: white; transition: all 0.2s ease; }
        .filter-tab:hover { border-color: var(--primary); color: var(--primary); }
        .filter-tab.active { background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); color: white; border-color: transparent; }
        .empty-state { text-align: center; padding: 3rem 1rem; }
        .empty-state i { font-size: 4rem; color: #cbd5e1; }
        .empty-state p { color: #94a3b8; margin-top: 1rem; }
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); transition: transform 0.3s ease; }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-brand"><img src="<?= base_url('assets/img/metrologi.png'); ?>" alt="Logo"><span>UPTD Metrologi</span></div>
    <ul class="nav-menu">
        <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
        <li><a href="<?= base_url('admin/pengajuan'); ?>"><i class="bi bi-file-earmark-text"></i> Pengajuan</a></li>
        <li><a href="<?= base_url('admin/jadwal'); ?>" class="active"><i class="bi bi-calendar-event"></i> Penjadwalan</a></li>
        <li><a href="<?= base_url('admin/petugas'); ?>"><i class="bi bi-people"></i> Petugas</a></li>
        <li><a href="<?= base_url('admin/sertifikat'); ?>"><i class="bi bi-award"></i> Sertifikat</a></li>
        <li><a href="<?= base_url('admin/notifikasi'); ?>"><i class="bi bi-bell"></i> Notifikasi</a></li>
        <li><hr style="border-color: rgba(255,255,255,0.1);"></li>
        <li><a href="<?= base_url('auth/logout'); ?>"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
    </ul>
</aside>

<main class="main-content">
    <div class="top-bar">
        <div class="page-title">
            <h1><i class="bi bi-calendar-event me-2"></i>Penjadwalan Pengujian</h1>
            <p>Kelola jadwal pengujian alat UTTP</p>
        </div>
        <a href="<?= base_url('admin/tambah_jadwal'); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Buat Jadwal Baru
        </a>
    </div>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle me-2"></i><?= $this->session->flashdata('success'); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show"><i class="bi bi-x-circle me-2"></i><?= $this->session->flashdata('error'); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>

    <!-- Filter Tabs -->
    <div class="filter-tabs">
        <a href="<?= base_url('admin/jadwal'); ?>" class="filter-tab <?= $filter_status == 'semua' ? 'active' : ''; ?>">Semua</a>
        <a href="<?= base_url('admin/jadwal/dijadwalkan'); ?>" class="filter-tab <?= $filter_status == 'dijadwalkan' ? 'active' : ''; ?>">Dijadwalkan</a>
        <a href="<?= base_url('admin/jadwal/berlangsung'); ?>" class="filter-tab <?= $filter_status == 'berlangsung' ? 'active' : ''; ?>">Berlangsung</a>
        <a href="<?= base_url('admin/jadwal/selesai'); ?>" class="filter-tab <?= $filter_status == 'selesai' ? 'active' : ''; ?>">Selesai</a>
        <a href="<?= base_url('admin/jadwal/dibatalkan'); ?>" class="filter-tab <?= $filter_status == 'dibatalkan' ? 'active' : ''; ?>">Dibatalkan</a>
    </div>

    <!-- Jadwal Table -->
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. Registrasi</th>
                            <th>Pemohon</th>
                            <th>Petugas</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($jadwal)): ?>
                            <tr>
                                <td colspan="8">
                                    <div class="empty-state">
                                        <i class="bi bi-calendar-x"></i>
                                        <p>Belum ada jadwal pengujian<?= $filter_status != 'semua' ? ' dengan status "' . $filter_status . '"' : ''; ?>.</p>
                                        <a href="<?= base_url('admin/tambah_jadwal'); ?>" class="btn btn-primary btn-sm mt-2"><i class="bi bi-plus-circle me-1"></i>Buat Jadwal</a>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($jadwal as $j): ?>
                            <tr>
                                <td><code><?= $j->no_registrasi; ?></code></td>
                                <td><?= $j->nama_pemohon; ?></td>
                                <td><?= $j->nama_petugas ?: '<span class="text-muted">-</span>'; ?></td>
                                <td>
                                    <div class="fw-semibold"><?= date('d/m/Y', strtotime($j->tanggal_pengujian)); ?></div>
                                    <small class="text-muted"><?= date('l', strtotime($j->tanggal_pengujian)); ?></small>
                                </td>
                                <td>
                                    <?= date('H:i', strtotime($j->waktu_mulai)); ?>
                                    <?= $j->waktu_selesai ? ' - ' . date('H:i', strtotime($j->waktu_selesai)) : ''; ?>
                                </td>
                                <td><?= $j->lokasi; ?></td>
                                <td>
                                    <?php
                                    $badge = 'badge-dijadwalkan';
                                    if($j->status == 'berlangsung') $badge = 'badge-berlangsung';
                                    elseif($j->status == 'selesai') $badge = 'badge-selesai';
                                    elseif($j->status == 'dibatalkan') $badge = 'badge-dibatalkan';
                                    ?>
                                    <span class="badge-status <?= $badge; ?>"><?= ucfirst($j->status); ?></span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="<?= base_url('admin/edit_jadwal/' . $j->id); ?>"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                                            <?php if($j->status == 'dijadwalkan'): ?>
                                                <li><a class="dropdown-item" href="<?= base_url('admin/update_status_jadwal/' . $j->id . '/berlangsung'); ?>"><i class="bi bi-play-circle me-2"></i>Mulai</a></li>
                                                <li><a class="dropdown-item text-danger" href="<?= base_url('admin/update_status_jadwal/' . $j->id . '/dibatalkan'); ?>" onclick="return confirm('Yakin ingin membatalkan jadwal ini?')"><i class="bi bi-x-circle me-2"></i>Batalkan</a></li>
                                            <?php elseif($j->status == 'berlangsung'): ?>
                                                <li><a class="dropdown-item text-success" href="<?= base_url('admin/update_status_jadwal/' . $j->id . '/selesai'); ?>"><i class="bi bi-check-circle me-2"></i>Selesai</a></li>
                                            <?php endif; ?>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="<?= base_url('admin/hapus_jadwal/' . $j->id); ?>" onclick="return confirm('Yakin ingin menghapus jadwal ini?')"><i class="bi bi-trash me-2"></i>Hapus</a></li>
                                        </ul>
                                    </div>
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
