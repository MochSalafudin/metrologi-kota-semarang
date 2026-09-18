<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - UPTD Metrologi Kota Semarang</title>
    <link rel="icon" href="<?= base_url('assets/img/metrologi.png'); ?>" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #667eea;
            --primary-dark: #5a67d8;
            --secondary: #764ba2;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --dark: #1e293b;
            --sidebar-width: 280px;
        }
        
        * { font-family: 'Inter', sans-serif; }
        
        body {
            background: #f1f5f9;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--dark) 0%, #0f172a 100%);
            padding: 1.5rem;
            z-index: 1000;
            overflow-y: auto;
        }
        
        .sidebar-brand {
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .sidebar-brand i {
            font-size: 1.75rem;
            color: var(--primary);
        }
        
        .sidebar-brand img {
            width: 38px;
            height: 38px;
            object-fit: contain;
            border-radius: 50%;
        }
        
        .nav-menu { list-style: none; padding: 0; margin: 0; }
        
        .nav-menu li { margin-bottom: 0.5rem; }
        
        .nav-menu a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
        }
        
        .nav-menu a:hover {\r\n            color: white;\r\n        }\r\n        \r\n        .nav-menu a.active {\r\n            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);\r\n            color: white;\r\n        }
        
        .nav-menu i { font-size: 1.25rem; }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
        }
        
        /* Top Bar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .page-title h1 {
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }
        
        .page-title p {
            color: #64748b;
            margin: 0;
        }
        
        .top-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .notification-btn {
            position: relative;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: white;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: #64748b;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .notification-btn:hover {
            background: var(--primary);
            color: white;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.2rem 0.5rem;
            border-radius: 50px;
            animation: badgePulse 2s infinite;
        }
        
        /* Bell ring animation */
        @keyframes bellRing {
            0% { transform: rotate(0); }
            10% { transform: rotate(14deg); }
            20% { transform: rotate(-12deg); }
            30% { transform: rotate(10deg); }
            40% { transform: rotate(-8deg); }
            50% { transform: rotate(6deg); }
            60% { transform: rotate(-4deg); }
            70% { transform: rotate(2deg); }
            80% { transform: rotate(0); }
            100% { transform: rotate(0); }
        }
        
        @keyframes badgePulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15); }
        }
        
        .notification-btn.has-notif i {
            animation: bellRing 2s ease-in-out infinite;
            transform-origin: top center;
        }
        
        .admin-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        
        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .stat-icon.primary { background: rgba(102, 126, 234, 0.15); color: var(--primary); }
        .stat-icon.success { background: rgba(16, 185, 129, 0.15); color: var(--success); }
        .stat-icon.warning { background: rgba(245, 158, 11, 0.15); color: var(--warning); }
        .stat-icon.danger { background: rgba(239, 68, 68, 0.15); color: var(--danger); }
        .stat-icon.info { background: rgba(59, 130, 246, 0.15); color: var(--info); }
        
        .stat-info h3 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }
        
        .stat-info p {
            color: #64748b;
            margin: 0;
            font-size: 0.9rem;
        }
        
        /* Cards */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: none;
            overflow: hidden;
        }
        
        .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: between;
        }
        
        .card-body { padding: 1.5rem; }
        
        /* Table */
        .table {
            margin: 0;
        }
        
        .table thead th {
            background: #f8fafc;
            border: none;
            font-weight: 600;
            color: #64748b;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
        }
        
        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f1f5f9;
        }
        
        .badge-status {
            padding: 0.4rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-diproses { background: #dbeafe; color: #1e40af; }
        .badge-selesai { background: #d1fae5; color: #065f46; }
        .badge-ditolak { background: #fee2e2; color: #991b1b; }
        
        /* Chart Container */
        .chart-container {
            position: relative;
            height: 300px;
        }
        
        /* Notification List */
        .notif-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .notif-item:last-child { border-bottom: none; }
        
        .notif-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(102, 126, 234, 0.15);
            color: var(--primary);
        }
        
        .notif-content h6 {
            margin: 0 0 0.25rem 0;
            font-weight: 600;
            color: var(--dark);
        }
        
        .notif-content p {
            margin: 0;
            font-size: 0.85rem;
            color: #64748b;
        }
        
        .notif-time {
            font-size: 0.75rem;
            color: #94a3b8;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            border-radius: 10px;
            font-weight: 600;
        }
        
        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
            border-radius: 10px;
            font-weight: 600;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary);
            border-color: var(--primary);
        }
        @media (max-width: 992px) {
            .sidebar { 
                transform: translateX(-100%); 
                transition: transform 0.3s ease;
            }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <img src="<?= base_url('assets/img/metrologi.png'); ?>" alt="Logo Metrologi">
        <span>UPTD Metrologi</span>
    </div>
    
    <ul class="nav-menu">
        <li><a href="<?= base_url('admin/dashboard'); ?>" class="active"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
        <li><a href="<?= base_url('admin/pengajuan'); ?>"><i class="bi bi-file-earmark-text"></i> Pengajuan</a></li>
        <li><a href="<?= base_url('admin/jadwal'); ?>"><i class="bi bi-calendar-event"></i> Penjadwalan</a></li>
        <li><a href="<?= base_url('admin/petugas'); ?>"><i class="bi bi-people"></i> Petugas</a></li>
        <li><a href="<?= base_url('admin/sertifikat'); ?>"><i class="bi bi-award"></i> Sertifikat</a></li>
        <li><a href="<?= base_url('admin/notifikasi'); ?>"><i class="bi bi-bell"></i> Notifikasi</a></li>
        <li><hr style="border-color: rgba(255,255,255,0.1);"></li>
        <li><a href="<?= base_url('auth/logout'); ?>"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
    </ul>
</aside>

<!-- Main Content -->
<main class="main-content">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="page-title">
            <h1>Dashboard</h1>
            <p><?= date('l, d F Y'); ?></p>
        </div>
        <div class="top-actions">
            <a href="<?= base_url('admin/notifikasi'); ?>" class="notification-btn<?= $count_notifikasi > 0 ? ' has-notif' : ''; ?>" id="notifBtn">
                <i class="bi bi-bell-fill"></i>
                <span class="notification-badge" id="notifBadge" style="<?= $count_notifikasi > 0 ? '' : 'display:none'; ?>"><?= $count_notifikasi; ?></span>
            </a>
            <div class="admin-info">
                <div class="admin-avatar"><?= strtoupper(substr($this->session->userdata('nama_lengkap'), 0, 1)); ?></div>
                <div>
                    <div class="fw-semibold"><?= $this->session->userdata('nama_lengkap'); ?></div>
                    <small class="text-muted">Administrator</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon primary"><i class="bi bi-file-earmark-text"></i></div>
            <div class="stat-info">
                <h3><?= $stats['total']; ?></h3>
                <p>Total Pengajuan</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon warning"><i class="bi bi-hourglass-split"></i></div>
            <div class="stat-info">
                <h3><?= $stats['pending']; ?></h3>
                <p>Menunggu Verifikasi</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon info"><i class="bi bi-gear"></i></div>
            <div class="stat-info">
                <h3><?= $stats['diproses']; ?></h3>
                <p>Sedang Diproses</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon success"><i class="bi bi-check-circle"></i></div>
            <div class="stat-info">
                <h3><?= $stats['selesai']; ?></h3>
                <p>Selesai</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon danger"><i class="bi bi-people"></i></div>
            <div class="stat-info">
                <h3><?= $count_petugas; ?></h3>
                <p>Petugas Aktif</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Chart -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-bar-chart me-2"></i> Statistik Pengajuan Bulanan <?= date('Y'); ?>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="monthlyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Notifications -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-bell me-2"></i> Notifikasi Terbaru</span>
                    <a href="<?= base_url('admin/notifikasi'); ?>" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0 px-3">
                    <?php if(empty($notifikasi)): ?>
                        <div class="text-center py-4 text-muted">
                            <i class="bi bi-bell-slash fs-1"></i>
                            <p class="mt-2">Tidak ada notifikasi baru</p>
                        </div>
                    <?php else: ?>
                        <?php foreach($notifikasi as $n): ?>
                        <div class="notif-item">
                            <div class="notif-icon"><i class="bi bi-file-earmark-plus"></i></div>
                            <div class="notif-content flex-grow-1">
                                <h6><?= $n->judul; ?></h6>
                                <p><?= substr($n->pesan, 0, 50); ?>...</p>
                            </div>
                            <div class="notif-time"><?= date('H:i', strtotime($n->created_at)); ?></div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Pengajuan -->
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-clock-history me-2"></i> Pengajuan Terbaru</span>
            <a href="<?= base_url('admin/pengajuan'); ?>" class="btn btn-sm btn-primary">Lihat Semua</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. Registrasi</th>
                            <th>Pemohon</th>
                            <th>Jenis Layanan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($recent_pengajuan)): ?>
                            <tr><td colspan="6" class="text-center py-4">Belum ada pengajuan.</td></tr>
                        <?php else: ?>
                            <?php foreach($recent_pengajuan as $p): ?>
                            <tr>
                                <td><code><?= $p->no_registrasi; ?></code></td>
                                <td><?= $p->nama_lengkap; ?></td>
                                <td><span class="badge bg-primary"><?= $p->jenis_layanan; ?></span></td>
                                <td><?= date('d/m/Y', strtotime($p->created_at)); ?></td>
                                <td>
                                    <?php
                                    $badge = 'badge-pending';
                                    if($p->status == 'diproses') $badge = 'badge-diproses';
                                    elseif($p->status == 'selesai') $badge = 'badge-selesai';
                                    elseif($p->status == 'ditolak') $badge = 'badge-ditolak';
                                    ?>
                                    <span class="badge-status <?= $badge; ?>"><?= ucfirst($p->status); ?></span>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/detail_pengajuan/' . $p->id); ?>" class="btn btn-sm btn-outline-primary">
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
<script>
// Monthly Chart
const ctx = document.getElementById('monthlyChart').getContext('2d');
const monthlyData = <?= json_encode(array_values($monthly_stats)); ?>;

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
            label: 'Jumlah Pengajuan',
            data: monthlyData,
            backgroundColor: 'rgba(102, 126, 234, 0.8)',
            borderColor: 'rgba(102, 126, 234, 1)',
            borderWidth: 1,
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { precision: 0 },
                grid: { color: 'rgba(0,0,0,0.05)' }
            },
            x: {
                grid: { display: false }
            }
        }
    }
});
</script>

<!-- Real-time notification polling -->
<script>
let lastNotifCount = <?= $count_notifikasi; ?>;

function checkNotifications() {
    fetch('<?= base_url("admin/get_notif_count"); ?>')
        .then(res => res.json())
        .then(data => {
            const btn = document.getElementById('notifBtn');
            const badge = document.getElementById('notifBadge');
            
            if (data.count > 0) {
                badge.textContent = data.count;
                badge.style.display = 'inline-block';
                btn.classList.add('has-notif');
                
                // Flash effect when new notification arrives
                if (data.count > lastNotifCount) {
                    btn.style.background = 'var(--primary)';
                    btn.style.color = 'white';
                    setTimeout(() => {
                        btn.style.background = 'white';
                        btn.style.color = '#64748b';
                    }, 1500);
                }
            } else {
                badge.style.display = 'none';
                btn.classList.remove('has-notif');
            }
            
            lastNotifCount = data.count;
        })
        .catch(() => {});
}

// Poll every 15 seconds
setInterval(checkNotifications, 15000);
</script>
</body>
</html>
