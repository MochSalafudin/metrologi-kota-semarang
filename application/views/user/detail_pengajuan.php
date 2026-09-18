<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengajuan - UPTD Metrologi Kota Semarang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        * { font-family: 'Inter', sans-serif; }
        
        body { background: #f0f2f5; min-height: 100vh; }
        
        .navbar {
            background: var(--primary-gradient) !important;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
            padding: 1rem 0;
        }
        
        .navbar-brand { font-weight: 700; }
        
        .btn-logout {
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-weight: 600;
            border-radius: 10px;
        }
        
        .detail-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .detail-card .card-header {
            background: var(--primary-gradient);
            color: white;
            padding: 1.5rem;
        }
        
        .detail-card .card-body { padding: 1.5rem; }
        
        .info-row {
            display: flex;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f2f5;
        }
        
        .info-row:last-child { border-bottom: none; }
        
        .info-label {
            width: 200px;
            font-weight: 600;
            color: #6c757d;
        }
        
        .info-value { flex: 1; color: #495057; }
        
        .no-reg {
            font-family: 'Courier New', monospace;
            font-weight: 700;
            font-size: 1.25rem;
            color: #667eea;
        }
        
        .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
        }
        
        .badge-pending { background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); color: #c44d00; }
        .badge-diproses { background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%); color: #1565c0; }
        .badge-selesai { background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%); color: #2e7d32; }
        .badge-ditolak { background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%); color: #c62828; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <img src="<?= base_url('assets/img/metrologi.png'); ?>" alt="Logo" style="width:32px;height:32px;object-fit:contain;border-radius:50%;" class="me-2">UPTD Metrologi
        </a>
        <div class="d-flex align-items-center">
            <a href="<?= base_url('auth/logout'); ?>" class="btn btn-logout">
                <i class="bi bi-box-arrow-right me-1"></i>Logout
            </a>
        </div>
    </div>
</nav>

<div class="container py-4">
    <a href="<?= base_url('user/dashboard'); ?>" class="btn mb-4" style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.6rem 1.4rem;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);color:white;border-radius:50px;font-weight:600;font-size:0.9rem;text-decoration:none;border:none;box-shadow:0 4px 15px rgba(102,126,234,0.3);transition:all 0.3s cubic-bezier(0.4,0,0.2,1);" onmouseover="this.style.transform='translateX(-4px)';this.style.boxShadow='0 8px 25px rgba(102,126,234,0.45)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 4px 15px rgba(102,126,234,0.3)'">
        <i class="bi bi-arrow-left"></i>Kembali ke Dashboard
    </a>

    <div class="detail-card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1"><i class="bi bi-file-earmark-text me-2"></i>Detail Pengajuan</h4>
                    <div class="no-reg" style="color: white;"><?= $pengajuan->no_registrasi; ?></div>
                </div>
                <?php
                $badge_class = 'badge-pending';
                $status_text = 'Pending';
                if($pengajuan->status == 'diproses') { $badge_class = 'badge-diproses'; $status_text = 'Diproses'; }
                elseif($pengajuan->status == 'selesai') { $badge_class = 'badge-selesai'; $status_text = 'Selesai'; }
                elseif($pengajuan->status == 'ditolak') { $badge_class = 'badge-ditolak'; $status_text = 'Ditolak'; }
                ?>
                <span class="badge-status <?= $badge_class; ?>"><?= $status_text; ?></span>
            </div>
        </div>
        <div class="card-body">
            <div class="info-row">
                <div class="info-label">Nama Pemohon</div>
                <div class="info-value"><?= $pengajuan->nama_pemohon; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Nama Pemilik/Instansi</div>
                <div class="info-value"><?= $pengajuan->nama_pemilik; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Jenis Layanan</div>
                <div class="info-value"><span class="badge bg-primary"><?= $pengajuan->jenis_layanan; ?></span></div>
            </div>
            <div class="info-row">
                <div class="info-label">Tempat Pengerjaan</div>
                <div class="info-value"><?= $pengajuan->tempat_pengerjaan; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Jenis UTTP</div>
                <div class="info-value"><?= $pengajuan->jenis_uttp; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Kapasitas</div>
                <div class="info-value"><?= $pengajuan->kapasitas; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Jumlah Alat</div>
                <div class="info-value"><?= $pengajuan->jumlah_alat; ?> unit</div>
            </div>
            <?php if($pengajuan->dokumen_pendukung): ?>
            <div class="info-row">
                <div class="info-label">Dokumen Pendukung</div>
                <div class="info-value">
                    <a href="<?= base_url($pengajuan->dokumen_pendukung); ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-file-earmark-arrow-down me-1"></i>Download Dokumen
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <?php if($pengajuan->catatan): ?>
            <div class="info-row">
                <div class="info-label">Catatan</div>
                <div class="info-value"><?= nl2br($pengajuan->catatan); ?></div>
            </div>
            <?php endif; ?>
            <div class="info-row">
                <div class="info-label">Tanggal Pengajuan</div>
                <div class="info-value"><?= date('d F Y, H:i', strtotime($pengajuan->created_at)); ?> WIB</div>
            </div>
        </div>
    </div>

    <?php if(isset($jadwal) && $jadwal): ?>
    <div class="detail-card" style="border: 2px solid #3b82f6;">
        <div class="card-header" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1"><i class="bi bi-calendar-event me-2"></i>Jadwal Pengujian</h4>
                    <div style="opacity: 0.85;">Pengujian telah dijadwalkan untuk pengajuan Anda</div>
                </div>
                <?php
                $jstatus_badge = 'background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%); color: #1565c0;';
                $jstatus_text = ucfirst($jadwal->status);
                if($jadwal->status == 'berlangsung') $jstatus_badge = 'background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); color: #c44d00;';
                elseif($jadwal->status == 'selesai') $jstatus_badge = 'background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%); color: #2e7d32;';
                elseif($jadwal->status == 'dibatalkan') $jstatus_badge = 'background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%); color: #c62828;';
                ?>
                <span class="badge-status" style="<?= $jstatus_badge; ?>"><?= $jstatus_text; ?></span>
            </div>
        </div>
        <div class="card-body">
            <div class="info-row">
                <div class="info-label"><i class="bi bi-calendar3 me-2"></i>Tanggal</div>
                <div class="info-value fw-bold"><?= date('l, d F Y', strtotime($jadwal->tanggal_pengujian)); ?></div>
            </div>
            <div class="info-row">
                <div class="info-label"><i class="bi bi-clock me-2"></i>Waktu</div>
                <div class="info-value"><?= date('H:i', strtotime($jadwal->waktu_mulai)); ?><?= $jadwal->waktu_selesai ? ' - ' . date('H:i', strtotime($jadwal->waktu_selesai)) : ''; ?> WIB</div>
            </div>
            <div class="info-row">
                <div class="info-label"><i class="bi bi-geo-alt me-2"></i>Lokasi</div>
                <div class="info-value"><?= $jadwal->lokasi; ?></div>
            </div>
            <?php if(isset($jadwal->nama_petugas) && $jadwal->nama_petugas): ?>
            <div class="info-row">
                <div class="info-label"><i class="bi bi-person-badge me-2"></i>Petugas</div>
                <div class="info-value">
                    <?= $jadwal->nama_petugas; ?>
                    <?php if(isset($jadwal->hp_petugas) && $jadwal->hp_petugas): ?>
                        <small class="text-muted ms-2">(<?= $jadwal->hp_petugas; ?>)</small>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if($jadwal->catatan): ?>
            <div class="info-row">
                <div class="info-label"><i class="bi bi-chat-left-text me-2"></i>Catatan</div>
                <div class="info-value"><?= nl2br(htmlspecialchars($jadwal->catatan)); ?></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if(isset($sertifikat) && $sertifikat): ?>
    <div class="detail-card" style="border: 2px solid #28a745;">
        <div class="card-header" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1"><i class="bi bi-award me-2"></i>Sertifikat Telah Terbit</h4>
                    <div style="font-family: 'Courier New', monospace; font-weight: 700;"><?= $sertifikat->no_sertifikat; ?></div>
                </div>
                <a href="<?= base_url('user/sertifikat/' . $pengajuan->id); ?>" class="btn btn-light btn-lg" style="font-weight: 700; border-radius: 12px;">
                    <i class="bi bi-download me-2"></i>Download Sertifikat
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="info-row">
                <div class="info-label">Nomor Sertifikat</div>
                <div class="info-value" style="font-weight: 700; color: #28a745;"><?= $sertifikat->no_sertifikat; ?></div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Terbit</div>
                <div class="info-value"><?= date('d F Y', strtotime($sertifikat->tanggal_terbit)); ?></div>
            </div>
            <?php if($sertifikat->tanggal_berlaku): ?>
            <div class="info-row">
                <div class="info-label">Berlaku Sampai</div>
                <div class="info-value"><?= date('d F Y', strtotime($sertifikat->tanggal_berlaku)); ?></div>
            </div>
            <?php endif; ?>
            <?php if($sertifikat->keterangan): ?>
            <div class="info-row">
                <div class="info-label">Keterangan</div>
                <div class="info-value"><?= nl2br(htmlspecialchars($sertifikat->keterangan)); ?></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
