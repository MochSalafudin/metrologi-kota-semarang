<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat <?= $sertifikat->no_sertifikat; ?> - UPTD Metrologi Kota Semarang</title>
    <link rel="icon" href="<?= base_url('assets/img/metrologi.png'); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        * { font-family: 'Inter', sans-serif; margin: 0; padding: 0; box-sizing: border-box; }
        
        body { background: #f0f2f5; }

        .toolbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 0.75rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
        }

        .toolbar a, .toolbar button {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            border: 2px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.15);
            padding: 0.4rem 1rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .toolbar a:hover, .toolbar button:hover {
            background: white;
            color: #667eea;
        }

        .toolbar .toolbar-title {
            color: white;
            font-weight: 700;
            font-size: 1rem;
        }

        .certificate-wrapper {
            display: flex;
            justify-content: center;
            padding: 1.5rem;
        }

        .certificate {
            width: 210mm;
            height: 297mm;
            background: white;
            box-shadow: 0 10px 60px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* KOP SURAT */
        .kop-surat {
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            padding: 15px 35px;
            display: flex;
            align-items: center;
            gap: 15px;
            flex-shrink: 0;
        }

        .kop-logo img { display: block; }

        .kop-text {
            flex: 1;
            text-align: center;
            color: white;
        }

        .kop-text .kop-line-1,
        .kop-text .kop-line-2 {
            font-size: 10px;
            letter-spacing: 1.5px;
            opacity: 0.85;
            margin-bottom: 1px;
        }

        .kop-text .kop-line-main {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 3px;
            color: #FFD54F;
            margin: 3px 0;
        }

        .kop-text .kop-address {
            font-size: 9px;
            opacity: 0.7;
            line-height: 1.4;
        }

        .kop-divider {
            height: 4px;
            background: linear-gradient(90deg, #FFD54F, #FFC107, #FFD54F);
            flex-shrink: 0;
        }

        /* CERTIFICATE BODY */
        .cert-body {
            flex: 1;
            padding: 20px 45px 15px;
            display: flex;
            flex-direction: column;
        }

        .cert-title {
            text-align: center;
            margin-bottom: 15px;
        }

        .cert-title h1 {
            font-size: 22px;
            font-weight: 700;
            color: #1a237e;
            letter-spacing: 4px;
            margin-bottom: 3px;
        }

        .cert-title .cert-subtitle {
            font-size: 12px;
            color: #455a64;
            letter-spacing: 2px;
        }

        .cert-title .cert-line {
            width: 80px;
            height: 3px;
            background: #FFD54F;
            margin: 10px auto 0;
        }

        /* NOMOR */
        .cert-number {
            text-align: center;
            margin-bottom: 12px;
        }

        .cert-number .number-box {
            display: inline-block;
            background: #f5f7ff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 8px 25px;
        }

        .cert-number .number-label {
            font-size: 9px;
            color: #78909c;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }

        .cert-number .number-value {
            font-size: 16px;
            font-weight: 700;
            color: #1a237e;
            font-family: 'Courier New', monospace;
            letter-spacing: 1px;
        }

        /* DESCRIPTION */
        .cert-desc {
            text-align: center;
            font-size: 11px;
            color: #546e7a;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        /* DATA TABLE */
        .cert-data {
            background: #fafafa;
            border: 1px solid #e8e8e8;
            border-radius: 10px;
            padding: 12px 20px;
            margin-bottom: 15px;
        }

        .cert-data table { width: 100%; }

        .cert-data td {
            padding: 5px 0;
            font-size: 11.5px;
            vertical-align: top;
        }

        .cert-data .data-label {
            width: 38%;
            color: #78909c;
        }

        .cert-data .data-value {
            font-weight: 600;
            color: #37474f;
        }

        /* DATES */
        .cert-dates {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .cert-date-box {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
        }

        .cert-date-box.terbit { background: #e8f5e9; }
        .cert-date-box.berlaku { background: #fff3e0; }

        .cert-date-box .date-label {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 3px;
        }

        .cert-date-box.terbit .date-label { color: #66bb6a; }
        .cert-date-box.berlaku .date-label { color: #ffa726; }

        .cert-date-box .date-value {
            font-size: 13px;
            font-weight: 700;
        }

        .cert-date-box.terbit .date-value { color: #2e7d32; }
        .cert-date-box.berlaku .date-value { color: #e65100; }

        /* KETERANGAN */
        .cert-keterangan {
            background: #f5f5f5;
            border-radius: 8px;
            padding: 10px 15px;
            border-left: 4px solid #FFD54F;
            margin-bottom: 15px;
        }

        .cert-keterangan .ket-label {
            font-size: 9px;
            color: #78909c;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 3px;
        }

        .cert-keterangan .ket-value {
            font-size: 11px;
            color: #37474f;
            line-height: 1.4;
        }

        /* SIGNATURE */
        .cert-signature {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
            margin-top: auto;
        }

        .cert-signature .sig-block {
            text-align: center;
            width: 220px;
        }

        .cert-signature .sig-place,
        .cert-signature .sig-title {
            font-size: 11px;
            color: #546e7a;
            margin-bottom: 1px;
        }

        .cert-signature .sig-space { height: 50px; }

        .cert-signature .sig-name {
            font-size: 12px;
            font-weight: 700;
            color: #1a237e;
            border-bottom: 1px solid #1a237e;
            display: inline-block;
            padding-bottom: 1px;
        }

        .cert-signature .sig-nip {
            font-size: 10px;
            color: #78909c;
            margin-top: 2px;
        }

        /* FOOTER */
        .cert-footer {
            background: #1a237e;
            padding: 10px 45px;
            text-align: center;
            flex-shrink: 0;
        }

        .cert-footer p {
            margin: 0;
            font-size: 8px;
            color: #b0bec5;
            line-height: 1.5;
        }

        /* PRINT STYLES */
        @media print {
            body { background: white !important; margin: 0; padding: 0; }
            .toolbar { display: none !important; }
            .certificate-wrapper { padding: 0; margin: 0; }

            .certificate {
                box-shadow: none;
                width: 100%;
                height: 100vh;
            }

            .kop-surat,
            .kop-divider,
            .cert-date-box,
            .cert-keterangan,
            .cert-data,
            .cert-number .number-box,
            .cert-footer {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        @page {
            size: A4;
            margin: 0;
        }
    </style>
</head>
<body>

<!-- TOOLBAR (hidden on print) -->
<div class="toolbar">
    <a href="<?= base_url('user/detail/' . $pengajuan->id); ?>">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
    <span class="toolbar-title">
        <i class="bi bi-award me-1"></i>Sertifikat <?= $sertifikat->no_sertifikat; ?>
    </span>
    <button onclick="window.print()">
        <i class="bi bi-printer me-1"></i>Cetak / Download PDF
    </button>
</div>

<div class="certificate-wrapper">
    <div class="certificate">
        
        <!-- KOP SURAT -->
        <div class="kop-surat">
            <div class="kop-logo">
                <img src="<?= base_url('assets/img/pemkot.png'); ?>" width="55" height="68" alt="Logo Kota Semarang">
            </div>
            <div class="kop-text">
                <div class="kop-line-1">PEMERINTAH KOTA SEMARANG</div>
                <div class="kop-line-2">DINAS PERDAGANGAN</div>
                <div class="kop-line-main">UPTD METROLOGI LEGAL</div>
                <div class="kop-address">
                    Jl. Siliwangi No. 360 Semarang &bull; Telp. (024) 7607777 &bull; Email: metrologi.smg@gmail.com
                </div>
            </div>
            <div class="kop-logo">
                <img src="<?= base_url('assets/img/metrologi.png'); ?>" width="60" height="60" alt="Logo Metrologi" style="border-radius: 50%;">
            </div>
        </div>

        <div class="kop-divider"></div>

        <!-- CERTIFICATE BODY -->
        <div class="cert-body">
            <div class="cert-title">
                <h1>SERTIFIKAT</h1>
                <div class="cert-subtitle">HASIL <?= strtoupper($pengajuan->jenis_layanan); ?></div>
                <div class="cert-line"></div>
            </div>

            <div class="cert-number">
                <div class="number-box">
                    <div class="number-label">Nomor Sertifikat</div>
                    <div class="number-value"><?= $sertifikat->no_sertifikat; ?></div>
                </div>
            </div>

            <div class="cert-desc">
                Berdasarkan hasil pengujian yang telah dilaksanakan oleh UPTD Metrologi Legal<br>
                Dinas Perdagangan Kota Semarang, dengan ini menerangkan bahwa:
            </div>

            <div class="cert-data">
                <table>
                    <tr>
                        <td class="data-label">No. Registrasi</td>
                        <td class="data-value">: <?= $pengajuan->no_registrasi; ?></td>
                    </tr>
                    <tr>
                        <td class="data-label">Nama Pemohon</td>
                        <td class="data-value">: <?= $pengajuan->nama_pemohon; ?></td>
                    </tr>
                    <tr>
                        <td class="data-label">Nama Pemilik / Instansi</td>
                        <td class="data-value">: <?= $pengajuan->nama_pemilik; ?></td>
                    </tr>
                    <tr>
                        <td class="data-label">Jenis Layanan</td>
                        <td class="data-value">: <?= $pengajuan->jenis_layanan; ?></td>
                    </tr>
                    <tr>
                        <td class="data-label">Jenis UTTP</td>
                        <td class="data-value">: <?= $pengajuan->jenis_uttp; ?></td>
                    </tr>
                    <tr>
                        <td class="data-label">Kapasitas</td>
                        <td class="data-value">: <?= $pengajuan->kapasitas; ?></td>
                    </tr>
                    <tr>
                        <td class="data-label">Jumlah Alat</td>
                        <td class="data-value">: <?= $pengajuan->jumlah_alat; ?> unit</td>
                    </tr>
                    <tr>
                        <td class="data-label">Tempat Pengerjaan</td>
                        <td class="data-value">: <?= $pengajuan->tempat_pengerjaan; ?></td>
                    </tr>
                </table>
            </div>

            <div class="cert-dates">
                <div class="cert-date-box terbit">
                    <div class="date-label">Tanggal Terbit</div>
                    <div class="date-value"><?= $tanggal_terbit; ?></div>
                </div>
                <div class="cert-date-box berlaku">
                    <div class="date-label">Berlaku Sampai</div>
                    <div class="date-value"><?= $tanggal_berlaku; ?></div>
                </div>
            </div>

            <?php if($sertifikat->keterangan): ?>
            <div class="cert-keterangan">
                <div class="ket-label">Keterangan</div>
                <div class="ket-value"><?= nl2br(htmlspecialchars($sertifikat->keterangan)); ?></div>
            </div>
            <?php endif; ?>

            <div class="cert-signature">
                <div class="sig-block">
                    <div class="sig-place">Semarang, <?= $tanggal_terbit; ?></div>
                    <div class="sig-title">Kepala UPTD Metrologi Legal</div>
                    <div class="sig-title">Kota Semarang</div>
                    <div class="sig-space"></div>
                    <div class="sig-name">................................</div>
                    <div class="sig-nip">NIP. ................................</div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="cert-footer">
            <p>Sertifikat ini diterbitkan secara resmi oleh UPTD Metrologi Legal - Dinas Perdagangan Kota Semarang</p>
            <p>Jl. Siliwangi No. 360, Semarang | Telp. (024) 7607777 | metrologi.smg@gmail.com</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
