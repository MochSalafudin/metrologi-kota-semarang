<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $mode == 'edit' ? 'Edit' : 'Tambah'; ?> Petugas - Admin</title>
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
        .form-control, .form-select { border-radius: 10px; padding: 0.75rem 1rem; border: 2px solid #e9ecef; }
        .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15); }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-brand"><img src="<?= base_url('assets/img/metrologi.png'); ?>" alt="Logo" style="width:38px;height:38px;object-fit:contain;border-radius:50%;"><span>UPTD Metrologi</span></div>
    <ul class="nav-menu">
        <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
        <li><a href="<?= base_url('admin/pengajuan'); ?>"><i class="bi bi-file-earmark-text"></i> Pengajuan</a></li>
        <li><a href="<?= base_url('admin/jadwal'); ?>"><i class="bi bi-calendar-event"></i> Penjadwalan</a></li>
        <li><a href="<?= base_url('admin/petugas'); ?>" class="active"><i class="bi bi-people"></i> Petugas</a></li>
        <li><a href="<?= base_url('admin/sertifikat'); ?>"><i class="bi bi-award"></i> Sertifikat</a></li>
        <li><a href="<?= base_url('admin/notifikasi'); ?>"><i class="bi bi-bell"></i> Notifikasi</a></li>
        <li><hr style="border-color: rgba(255,255,255,0.1);"></li>
        <li><a href="<?= base_url('auth/logout'); ?>"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
    </ul>
</aside>

<main class="main-content">
    <a href="<?= base_url('admin/petugas'); ?>" class="btn mb-3" style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.6rem 1.4rem;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);color:white;border-radius:50px;font-weight:600;font-size:0.9rem;text-decoration:none;border:none;box-shadow:0 4px 15px rgba(102,126,234,0.3);transition:all 0.3s cubic-bezier(0.4,0,0.2,1);" onmouseover="this.style.transform='translateX(-4px)';this.style.boxShadow='0 8px 25px rgba(102,126,234,0.45)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 4px 15px rgba(102,126,234,0.3)'">
        <i class="bi bi-arrow-left"></i>Kembali
    </a>

    <div class="card" style="max-width: 600px;">
        <div class="card-header">
            <i class="bi bi-person-plus me-2"></i><?= $mode == 'edit' ? 'Edit Data Petugas' : 'Tambah Petugas Baru'; ?>
        </div>
        <div class="card-body">
            <?php if(validation_errors()): ?>
                <div class="alert alert-danger"><?= validation_errors(); ?></div>
            <?php endif; ?>

            <form action="<?= $mode == 'edit' ? base_url('admin/edit_petugas/' . $petugas->id) : base_url('admin/tambah_petugas'); ?>" method="post">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" value="<?= $mode == 'edit' ? $petugas->nama : set_value('nama'); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">NIP</label>
                    <input type="text" name="nip" class="form-control" value="<?= $mode == 'edit' ? $petugas->nip : set_value('nip'); ?>" placeholder="Opsional">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jabatan <span class="text-danger">*</span></label>
                    <select name="jabatan" class="form-select" required>
                        <option value="">-- Pilih Jabatan --</option>
                        <?php 
                        $jabatan_list = ['Penera Ahli Muda', 'Penera Ahli Pertama', 'Penera Terampil', 'Penera Mahir', 'Teknisi'];
                        $current = $mode == 'edit' ? $petugas->jabatan : set_value('jabatan');
                        foreach($jabatan_list as $j): ?>
                            <option value="<?= $j; ?>" <?= $current == $j ? 'selected' : ''; ?>><?= $j; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">No. Telepon / WhatsApp</label>
                    <input type="text" name="no_telepon" class="form-control" value="<?= $mode == 'edit' ? $petugas->no_telepon : set_value('no_telepon'); ?>" placeholder="Opsional">
                </div>

                <?php if($mode == 'edit'): ?>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="aktif" <?= $petugas->status == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                        <option value="nonaktif" <?= $petugas->status == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                    </select>
                </div>
                <?php endif; ?>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-save me-2"></i><?= $mode == 'edit' ? 'Simpan Perubahan' : 'Tambah Petugas'; ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
