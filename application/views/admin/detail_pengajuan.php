<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan - Admin</title>
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
        .card { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; margin-bottom: 1.5rem; }
        .card-header { background: transparent; border-bottom: 1px solid #f1f5f9; padding: 1.25rem 1.5rem; font-weight: 600; }
        .info-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; }
        .info-item { padding: 1rem; background: #f8fafc; border-radius: 12px; }
        .info-item label { display: block; font-size: 0.8rem; color: #64748b; margin-bottom: 0.25rem; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-item .value { font-weight: 600; color: var(--dark); font-size: 1rem; }
        .badge-status { padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-diproses { background: #dbeafe; color: #1e40af; }
        .badge-selesai { background: #d1fae5; color: #065f46; }
        .badge-ditolak { background: #fee2e2; color: #991b1b; }
        .status-header { display: flex; align-items: center; justify-content: space-between; padding: 1.5rem; background: linear-gradient(135deg, var(--primary) 0%, #764ba2 100%); border-radius: 16px; color: white; margin-bottom: 1.5rem; }
        .no-reg { font-family: monospace; font-size: 1.5rem; font-weight: 700; }
        .action-buttons { display: flex; gap: 0.75rem; flex-wrap: wrap; }
        @media (max-width: 768px) { .info-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

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
    <a href="<?= base_url('admin/pengajuan'); ?>" class="btn mb-3" style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.6rem 1.4rem;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);color:white;border-radius:50px;font-weight:600;font-size:0.9rem;text-decoration:none;border:none;box-shadow:0 4px 15px rgba(102,126,234,0.3);transition:all 0.3s cubic-bezier(0.4,0,0.2,1);" onmouseover="this.style.transform='translateX(-4px)';this.style.boxShadow='0 8px 25px rgba(102,126,234,0.45)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 4px 15px rgba(102,126,234,0.3)'">
        <i class="bi bi-arrow-left"></i>Kembali ke Daftar
    </a>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle me-2"></i><?= $this->session->flashdata('success'); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show"><i class="bi bi-x-circle me-2"></i><?= $this->session->flashdata('error'); ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    <?php endif; ?>

    <!-- Status Header -->
    <div class="status-header">
        <div>
            <div class="no-reg"><?= $pengajuan->no_registrasi; ?></div>
            <div class="opacity-75"><?= date('d F Y, H:i', strtotime($pengajuan->created_at)); ?> WIB</div>
        </div>
        <?php
        $badge = 'badge-pending'; $status_text = 'Pending';
        if($pengajuan->status == 'diproses') { $badge = 'badge-diproses'; $status_text = 'Diproses'; }
        elseif($pengajuan->status == 'selesai') { $badge = 'badge-selesai'; $status_text = 'Selesai'; }
        elseif($pengajuan->status == 'ditolak') { $badge = 'badge-ditolak'; $status_text = 'Ditolak'; }
        ?>
        <span class="badge-status <?= $badge; ?>" style="font-size: 1rem;"><?= $status_text; ?></span>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Data Pemohon -->
            <div class="card">
                <div class="card-header"><i class="bi bi-person me-2"></i>Data Pemohon</div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item"><label>Nama Pemohon</label><div class="value"><?= $pengajuan->nama_pemohon; ?></div></div>
                        <div class="info-item"><label>Akun User</label><div class="value"><?= $pengajuan->nama_lengkap; ?></div></div>
                        <div class="info-item"><label>Email</label><div class="value"><?= $pengajuan->email ?: '-'; ?></div></div>
                        <div class="info-item"><label>WhatsApp</label><div class="value"><?= $pengajuan->whatsapp ?: '-'; ?></div></div>
                    </div>
                </div>
            </div>

            <!-- Data Pemilik -->
            <div class="card">
                <div class="card-header"><i class="bi bi-building me-2"></i>Data Pemilik UTTP</div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item"><label>Nama Pemilik/Instansi</label><div class="value"><?= $pengajuan->nama_pemilik; ?></div></div>
                        <div class="info-item"><label>Dokumen Pendukung</label><div class="value">
                            <?php if($pengajuan->dokumen_pendukung): ?>
                                <a href="<?= base_url($pengajuan->dokumen_pendukung); ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="bi bi-download me-1"></i>Download</a>
                            <?php else: ?>-<?php endif; ?>
                        </div></div>
                    </div>
                </div>
            </div>

            <!-- Data Layanan -->
            <div class="card">
                <div class="card-header"><i class="bi bi-gear me-2"></i>Data Layanan & UTTP</div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item"><label>Jenis Layanan</label><div class="value"><span class="badge bg-primary"><?= $pengajuan->jenis_layanan; ?></span></div></div>
                        <div class="info-item"><label>Tempat Pengerjaan</label><div class="value"><?= $pengajuan->tempat_pengerjaan; ?></div></div>
                        <div class="info-item"><label>Jenis UTTP</label><div class="value"><?= $pengajuan->jenis_uttp; ?></div></div>
                        <div class="info-item"><label>Kapasitas</label><div class="value"><?= $pengajuan->kapasitas; ?></div></div>
                        <div class="info-item"><label>Jumlah Alat</label><div class="value"><?= $pengajuan->jumlah_alat; ?> unit</div></div>
                        <div class="info-item"><label>Petugas Ditugaskan</label><div class="value"><?= $pengajuan->nama_petugas ?: '<span class="text-muted">Belum ditugaskan</span>'; ?></div></div>
                    </div>
                    <?php if($pengajuan->catatan): ?>
                        <div class="mt-3 p-3 bg-light rounded-3">
                            <label class="text-muted small">Catatan Pemohon:</label>
                            <p class="mb-0"><?= nl2br($pengajuan->catatan); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($sertifikat): ?>
            <div class="card border-success">
                <div class="card-header bg-success text-white"><i class="bi bi-award me-2"></i>Sertifikat Diterbitkan</div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item"><label>No. Sertifikat</label><div class="value text-success fw-bold"><?= $sertifikat->no_sertifikat; ?></div></div>
                        <div class="info-item"><label>Tanggal Terbit</label><div class="value"><?= date('d F Y', strtotime($sertifikat->tanggal_terbit)); ?></div></div>
                        <div class="info-item"><label>Berlaku Sampai</label><div class="value"><?= $sertifikat->tanggal_berlaku ? date('d F Y', strtotime($sertifikat->tanggal_berlaku)) : '-'; ?></div></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-4">
            <!-- Actions -->
            <div class="card">
                <div class="card-header"><i class="bi bi-lightning me-2"></i>Aksi</div>
                <div class="card-body">
                    <?php if($pengajuan->status == 'pending'): ?>
                        <form action="<?= base_url('admin/verify/' . $pengajuan->id); ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tugaskan Petugas</label>
                                <select name="petugas_id" class="form-select" required>
                                    <option value="">-- Pilih Petugas --</option>
                                    <?php foreach($petugas_list as $pt): ?>
                                        <option value="<?= $pt->id; ?>"><?= $pt->nama; ?> - <?= $pt->jabatan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Catatan Admin</label>
                                <textarea name="catatan_admin" class="form-control" rows="3" placeholder="Opsional..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100 mb-2"><i class="bi bi-check-circle me-2"></i>Verifikasi & Proses</button>
                        </form>
                        <form action="<?= base_url('admin/tolak/' . $pengajuan->id); ?>" method="post" class="mt-2">
                            <input type="hidden" name="catatan_admin" value="Pengajuan ditolak oleh admin.">
                            <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Yakin ingin menolak pengajuan ini?')"><i class="bi bi-x-circle me-2"></i>Tolak Pengajuan</button>
                        </form>
                    <?php elseif($pengajuan->status == 'diproses' && !$sertifikat): ?>
                        <form action="<?= base_url('admin/terbitkan_sertifikat/' . $pengajuan->id); ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Keterangan Sertifikat</label>
                                <textarea name="keterangan" class="form-control" rows="3" placeholder="Opsional..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100"><i class="bi bi-award me-2"></i>Terbitkan Sertifikat</button>
                        </form>
                    <?php elseif($pengajuan->status == 'selesai'): ?>
                        <div class="text-center py-3">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                            <p class="mt-2 mb-0 text-success fw-semibold">Pengajuan Selesai</p>
                        </div>
                    <?php elseif($pengajuan->status == 'ditolak'): ?>
                        <div class="text-center py-3">
                            <i class="bi bi-x-circle-fill text-danger" style="font-size: 3rem;"></i>
                            <p class="mt-2 mb-0 text-danger fw-semibold">Pengajuan Ditolak</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Jadwal Pengujian -->
            <?php if(isset($jadwal) && $jadwal): ?>
            <div class="card" style="border: 2px solid #3b82f6;">
                <div class="card-header" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white;">
                    <i class="bi bi-calendar-event me-2"></i>Jadwal Pengujian
                </div>
                <div class="card-body">
                    <div class="info-grid">
                        <div class="info-item"><label>Tanggal</label><div class="value"><?= date('d F Y', strtotime($jadwal->tanggal_pengujian)); ?></div></div>
                        <div class="info-item"><label>Waktu</label><div class="value"><?= date('H:i', strtotime($jadwal->waktu_mulai)); ?><?= $jadwal->waktu_selesai ? ' - ' . date('H:i', strtotime($jadwal->waktu_selesai)) : ''; ?> WIB</div></div>
                        <div class="info-item"><label>Lokasi</label><div class="value"><?= $jadwal->lokasi; ?></div></div>
                        <div class="info-item"><label>Petugas</label><div class="value"><?= $jadwal->nama_petugas ?: '-'; ?></div></div>
                    </div>
                    <?php if($jadwal->catatan): ?>
                        <div class="mt-2 p-2 bg-light rounded"><small class="text-muted">Catatan: <?= $jadwal->catatan; ?></small></div>
                    <?php endif; ?>
                    <div class="mt-3">
                        <?php
                        $jbadge = 'badge-dijadwalkan';
                        if($jadwal->status == 'berlangsung') $jbadge = 'badge-diproses';
                        elseif($jadwal->status == 'selesai') $jbadge = 'badge-selesai';
                        elseif($jadwal->status == 'dibatalkan') $jbadge = 'badge-ditolak';
                        ?>
                        <span class="badge-status <?= $jbadge; ?>">Jadwal: <?= ucfirst($jadwal->status); ?></span>
                        <a href="<?= base_url('admin/edit_jadwal/' . $jadwal->id); ?>" class="btn btn-sm btn-outline-primary ms-2"><i class="bi bi-pencil me-1"></i>Edit</a>
                    </div>
                </div>
            </div>
            <?php elseif($pengajuan->status == 'diproses'): ?>
            <div class="card">
                <div class="card-body text-center py-3">
                    <i class="bi bi-calendar-plus text-primary" style="font-size: 2rem;"></i>
                    <p class="mt-2 mb-2 text-muted">Belum ada jadwal pengujian</p>
                    <a href="<?= base_url('admin/tambah_jadwal/' . $pengajuan->id); ?>" class="btn btn-primary btn-sm"><i class="bi bi-calendar-plus me-1"></i>Buat Jadwal</a>
                </div>
            </div>
            <?php endif; ?>

            <?php if($pengajuan->catatan_admin): ?>
            <div class="card">
                <div class="card-header"><i class="bi bi-chat-left-text me-2"></i>Catatan Admin</div>
                <div class="card-body">
                    <p class="mb-0"><?= nl2br($pengajuan->catatan_admin); ?></p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
