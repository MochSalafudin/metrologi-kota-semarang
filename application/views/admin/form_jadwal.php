<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $mode == 'tambah' ? 'Buat' : 'Edit'; ?> Jadwal Pengujian - Admin</title>
    <link rel="icon" href="<?= base_url('assets/img/metrologi.png'); ?>" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --primary: #667eea; --primary-dark: #5a67d8; --secondary: #764ba2; --dark: #1e293b; --sidebar-width: 280px; }
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
        .card { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; }
        .card-header { background: transparent; border-bottom: 1px solid #f1f5f9; padding: 1.25rem 1.5rem; font-weight: 600; }
        .card-body { padding: 1.5rem; }
        .form-label { font-weight: 600; color: var(--dark); }
        .form-control, .form-select { border-radius: 10px; border: 2px solid #e2e8f0; padding: 0.65rem 1rem; }
        .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(102,126,234,0.15); }
        .btn-primary { background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); border: none; border-radius: 10px; font-weight: 600; padding: 0.75rem 2rem; }
        .btn-outline-secondary { border-radius: 10px; font-weight: 600; }
        .pengajuan-info { background: #f8fafc; border-radius: 12px; padding: 1rem 1.25rem; border-left: 4px solid var(--primary); }
        .pengajuan-info .label { font-size: 0.8rem; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; }
        .pengajuan-info .value { font-weight: 600; color: var(--dark); }
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
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
    <a href="<?= base_url('admin/jadwal'); ?>" class="btn mb-3" style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.6rem 1.4rem;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);color:white;border-radius:50px;font-weight:600;font-size:0.9rem;text-decoration:none;border:none;box-shadow:0 4px 15px rgba(102,126,234,0.3);" onmouseover="this.style.transform='translateX(-4px)';this.style.boxShadow='0 8px 25px rgba(102,126,234,0.45)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 4px 15px rgba(102,126,234,0.3)'">
        <i class="bi bi-arrow-left"></i>Kembali ke Penjadwalan
    </a>

    <?php if(validation_errors()): ?>
        <div class="alert alert-danger alert-dismissible fade show"><i class="bi bi-x-circle me-2"></i><?= validation_errors(); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <i class="bi bi-calendar-<?= $mode == 'tambah' ? 'plus' : 'check'; ?> me-2"></i>
            <?= $mode == 'tambah' ? 'Buat Jadwal Pengujian Baru' : 'Edit Jadwal Pengujian'; ?>
        </div>
        <div class="card-body">
            <form action="<?= $mode == 'tambah' ? base_url('admin/tambah_jadwal') : base_url('admin/edit_jadwal/' . $jadwal->id); ?>" method="post">
                
                <?php if($mode == 'tambah'): ?>
                <!-- Pilih Pengajuan -->
                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-file-earmark-text me-1"></i>Pengajuan <span class="text-danger">*</span></label>
                    <?php if(isset($selected_pengajuan_id) && $selected_pengajuan_id && isset($pengajuan_detail)): ?>
                        <input type="hidden" name="pengajuan_id" value="<?= $selected_pengajuan_id; ?>">
                        <div class="pengajuan-info">
                            <div class="row">
                                <div class="col-md-4"><div class="label">No. Registrasi</div><div class="value"><?= $pengajuan_detail->no_registrasi; ?></div></div>
                                <div class="col-md-4"><div class="label">Pemohon</div><div class="value"><?= $pengajuan_detail->nama_pemohon; ?></div></div>
                                <div class="col-md-4"><div class="label">Jenis Layanan</div><div class="value"><?= $pengajuan_detail->jenis_layanan; ?></div></div>
                            </div>
                        </div>
                    <?php else: ?>
                        <select name="pengajuan_id" class="form-select" required>
                            <option value="">-- Pilih Pengajuan --</option>
                            <?php if(isset($pengajuan_list)): foreach($pengajuan_list as $p): ?>
                                <option value="<?= $p->id; ?>" <?= set_value('pengajuan_id') == $p->id ? 'selected' : ''; ?>>
                                    <?= $p->no_registrasi; ?> — <?= $p->nama_pemohon; ?> (<?= $p->jenis_layanan; ?>)
                                </option>
                            <?php endforeach; endif; ?>
                        </select>
                        <small class="form-text text-muted">Hanya pengajuan dengan status "Diproses" yang belum memiliki jadwal aktif.</small>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if($mode == 'edit'): ?>
                <div class="pengajuan-info mb-4">
                    <div class="row">
                        <div class="col-md-4"><div class="label">No. Registrasi</div><div class="value"><?= $jadwal->no_registrasi; ?></div></div>
                        <div class="col-md-4"><div class="label">Pemohon</div><div class="value"><?= $jadwal->nama_pemohon; ?></div></div>
                        <div class="col-md-4"><div class="label">Jenis Layanan</div><div class="value"><?= $jadwal->jenis_layanan; ?></div></div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Petugas -->
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-person-badge me-1"></i>Petugas</label>
                    <select name="petugas_id" class="form-select">
                        <option value="">-- Pilih Petugas --</option>
                        <?php foreach($petugas_list as $pt): ?>
                            <option value="<?= $pt->id; ?>" <?= 
                                ($mode == 'edit' && $jadwal->petugas_id == $pt->id) || 
                                ($mode == 'tambah' && isset($pengajuan_detail) && $pengajuan_detail->petugas_id == $pt->id) ||
                                set_value('petugas_id') == $pt->id
                                ? 'selected' : ''; ?>>
                                <?= $pt->nama; ?> — <?= $pt->jabatan; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row">
                    <!-- Tanggal -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label"><i class="bi bi-calendar3 me-1"></i>Tanggal Pengujian <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_pengujian" class="form-control" required
                            value="<?= $mode == 'edit' ? $jadwal->tanggal_pengujian : set_value('tanggal_pengujian'); ?>"
                            min="<?= date('Y-m-d'); ?>">
                    </div>
                    <!-- Waktu Mulai -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label"><i class="bi bi-clock me-1"></i>Waktu Mulai <span class="text-danger">*</span></label>
                        <input type="time" name="waktu_mulai" class="form-control" required
                            value="<?= $mode == 'edit' ? substr($jadwal->waktu_mulai, 0, 5) : set_value('waktu_mulai', '08:00'); ?>">
                    </div>
                    <!-- Waktu Selesai -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label"><i class="bi bi-clock-history me-1"></i>Waktu Selesai</label>
                        <input type="time" name="waktu_selesai" class="form-control"
                            value="<?= $mode == 'edit' && $jadwal->waktu_selesai ? substr($jadwal->waktu_selesai, 0, 5) : set_value('waktu_selesai'); ?>">
                    </div>
                </div>

                <!-- Lokasi -->
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-geo-alt me-1"></i>Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" class="form-control" required placeholder="Contoh: Kantor UPTD Metrologi Semarang / Alamat tempat usaha"
                        value="<?= $mode == 'edit' ? $jadwal->lokasi : set_value('lokasi'); ?>">
                </div>

                <!-- Catatan -->
                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-chat-left-text me-1"></i>Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3" placeholder="Catatan tambahan (opsional)..."><?= $mode == 'edit' ? $jadwal->catatan : set_value('catatan'); ?></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-<?= $mode == 'tambah' ? 'calendar-plus' : 'check-circle'; ?> me-2"></i>
                        <?= $mode == 'tambah' ? 'Buat Jadwal' : 'Simpan Perubahan'; ?>
                    </button>
                    <a href="<?= base_url('admin/jadwal'); ?>" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
