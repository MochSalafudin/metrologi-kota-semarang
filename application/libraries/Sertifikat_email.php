<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat_email {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('email');
    }

    /**
     * Send certificate email to user
     * @param object $pengajuan - pengajuan data with user info
     * @param object $sertifikat - certificate data
     * @return bool
     */
    public function send($pengajuan, $sertifikat)
    {
        if (empty($pengajuan->email)) {
            log_message('error', 'Sertifikat_email: No email found for user');
            return false;
        }

        // Sendmail Configuration (uses Laragon's built-in sendmail)
        $config = [
            'protocol'    => 'sendmail',
            'mailpath'    => 'C:\laragon\bin\sendmail\sendmail.exe -t',
            'mailtype'    => 'html',
            'charset'     => 'utf-8',
            'newline'     => "\r\n",
            'wordwrap'    => TRUE
        ];

        $this->CI->email->initialize($config);
        $this->CI->email->from('metrologi.smg@gmail.com', 'UPTD Metrologi Legal Kota Semarang');
        $this->CI->email->to($pengajuan->email);
        $this->CI->email->subject('Sertifikat Tera - ' . $sertifikat->no_sertifikat . ' | UPTD Metrologi Kota Semarang');

        // Build email body
        $body = $this->_build_certificate_html($pengajuan, $sertifikat);
        $this->CI->email->message($body);

        if ($this->CI->email->send()) {
            log_message('info', 'Sertifikat_email: Email sent to ' . $pengajuan->email);
            return true;
        } else {
            log_message('error', 'Sertifikat_email: Failed to send - ' . $this->CI->email->print_debugger(['headers']));
            return false;
        }
    }

    /**
     * Build certificate HTML with official letterhead
     */
    private function _build_certificate_html($pengajuan, $sertifikat)
    {
        // Encode logos as base64 for embedding in email
        $pemkot_path = FCPATH . 'assets/img/pemkot.png';
        $metrologi_path = FCPATH . 'assets/img/metrologi.png';

        $pemkot_base64 = '';
        $metrologi_base64 = '';

        if (file_exists($pemkot_path)) {
            $pemkot_base64 = 'data:image/png;base64,' . base64_encode(file_get_contents($pemkot_path));
        }
        if (file_exists($metrologi_path)) {
            $metrologi_base64 = 'data:image/png;base64,' . base64_encode(file_get_contents($metrologi_path));
        }

        // Format dates in Indonesian
        $tanggal_terbit = $this->_format_tanggal($sertifikat->tanggal_terbit);
        $tanggal_berlaku = $sertifikat->tanggal_berlaku ? $this->_format_tanggal($sertifikat->tanggal_berlaku) : '-';

        $html = '
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0; padding:0; background-color:#f0f2f5; font-family: Arial, Helvetica, sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0f2f5; padding:30px 0;">
<tr><td align="center">
<table width="700" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">

<!-- KOP SURAT / LETTERHEAD -->
<tr>
<td style="background: linear-gradient(135deg, #1a237e 0%, #283593 100%); padding:0;">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td style="padding: 20px 30px; text-align: center;">
    <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td width="80" style="vertical-align: middle; text-align: center;">
            ' . ($pemkot_base64 ? '<img src="' . $pemkot_base64 . '" width="70" height="85" style="display:block;" alt="Logo Kota Semarang">' : '') . '
        </td>
        <td style="vertical-align: middle; text-align: center; padding: 0 10px;">
            <div style="color: #ffffff; font-size: 11px; font-weight: normal; letter-spacing: 1px; margin-bottom: 2px;">PEMERINTAH KOTA SEMARANG</div>
            <div style="color: #ffffff; font-size: 11px; font-weight: normal; letter-spacing: 1px; margin-bottom: 4px;">DINAS PERDAGANGAN</div>
            <div style="color: #FFD54F; font-size: 18px; font-weight: bold; letter-spacing: 2px; margin-bottom: 4px;">UPTD METROLOGI LEGAL</div>
            <div style="color: #e0e0e0; font-size: 10px; line-height: 1.4;">Jl. Siliwangi No. 360 Semarang &bull; Telp. (024) 7607777</div>
            <div style="color: #e0e0e0; font-size: 10px;">Email: metrologi.smg@gmail.com</div>
        </td>
        <td width="80" style="vertical-align: middle; text-align: center;">
            ' . ($metrologi_base64 ? '<img src="' . $metrologi_base64 . '" width="75" height="75" style="display:block; border-radius:50%;" alt="Logo Metrologi">' : '') . '
        </td>
    </tr>
    </table>
</td>
</tr>
</table>
</td>
</tr>

<!-- GARIS PEMBATAS KOP -->
<tr>
<td style="background: linear-gradient(90deg, #FFD54F, #FFC107, #FFD54F); height: 4px; font-size:0; line-height:0;">&nbsp;</td>
</tr>

<!-- JUDUL SERTIFIKAT -->
<tr>
<td style="padding: 30px 40px 10px; text-align: center;">
    <div style="font-size: 22px; font-weight: bold; color: #1a237e; letter-spacing: 2px; margin-bottom: 5px;">SERTIFIKAT</div>
    <div style="font-size: 14px; color: #455a64; letter-spacing: 1px;">HASIL ' . strtoupper($pengajuan->jenis_layanan) . '</div>
    <div style="width: 80px; height: 3px; background: #FFD54F; margin: 15px auto 0;"></div>
</td>
</tr>

<!-- NOMOR SERTIFIKAT -->
<tr>
<td style="padding: 15px 40px; text-align: center;">
    <table cellpadding="0" cellspacing="0" style="margin: 0 auto; background: #f5f7ff; border-radius: 8px; border: 1px solid #e0e0e0;">
    <tr>
    <td style="padding: 10px 25px;">
        <div style="font-size: 11px; color: #78909c; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 3px;">Nomor Sertifikat</div>
        <div style="font-size: 18px; font-weight: bold; color: #1a237e; font-family: \'Courier New\', monospace; letter-spacing: 1px;">' . $sertifikat->no_sertifikat . '</div>
    </td>
    </tr>
    </table>
</td>
</tr>

<!-- ISI SERTIFIKAT -->
<tr>
<td style="padding: 15px 40px;">
    <div style="font-size: 13px; color: #546e7a; text-align: center; margin-bottom: 20px; line-height: 1.6;">
        Berdasarkan hasil pengujian yang telah dilaksanakan, dengan ini menerangkan bahwa:
    </div>

    <table width="100%" cellpadding="0" cellspacing="0" style="background: #fafafa; border-radius: 10px; border: 1px solid #e8e8e8;">
    <tr>
        <td style="padding: 20px 25px;">
            <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="40%" style="padding: 8px 0; font-size: 13px; color: #78909c; vertical-align: top;">No. Registrasi</td>
                <td style="padding: 8px 0; font-size: 13px; font-weight: bold; color: #37474f;">: ' . $pengajuan->no_registrasi . '</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-size: 13px; color: #78909c; vertical-align: top;">Nama Pemohon</td>
                <td style="padding: 8px 0; font-size: 13px; font-weight: bold; color: #37474f;">: ' . $pengajuan->nama_pemohon . '</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-size: 13px; color: #78909c; vertical-align: top;">Nama Pemilik/Instansi</td>
                <td style="padding: 8px 0; font-size: 13px; font-weight: bold; color: #37474f;">: ' . $pengajuan->nama_pemilik . '</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-size: 13px; color: #78909c; vertical-align: top;">Jenis Layanan</td>
                <td style="padding: 8px 0; font-size: 13px; font-weight: bold; color: #37474f;">: ' . $pengajuan->jenis_layanan . '</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-size: 13px; color: #78909c; vertical-align: top;">Jenis UTTP</td>
                <td style="padding: 8px 0; font-size: 13px; font-weight: bold; color: #37474f;">: ' . $pengajuan->jenis_uttp . '</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-size: 13px; color: #78909c; vertical-align: top;">Kapasitas</td>
                <td style="padding: 8px 0; font-size: 13px; font-weight: bold; color: #37474f;">: ' . $pengajuan->kapasitas . '</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-size: 13px; color: #78909c; vertical-align: top;">Jumlah Alat</td>
                <td style="padding: 8px 0; font-size: 13px; font-weight: bold; color: #37474f;">: ' . $pengajuan->jumlah_alat . ' unit</td>
            </tr>
            </table>
        </td>
    </tr>
    </table>
</td>
</tr>

<!-- TANGGAL BERLAKU -->
<tr>
<td style="padding: 10px 40px 15px;">
    <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td width="50%" style="padding: 10px;">
            <table width="100%" cellpadding="0" cellspacing="0" style="background: #e8f5e9; border-radius: 8px;">
            <tr>
            <td style="padding: 15px; text-align: center;">
                <div style="font-size: 11px; color: #66bb6a; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Tanggal Terbit</div>
                <div style="font-size: 15px; font-weight: bold; color: #2e7d32;">' . $tanggal_terbit . '</div>
            </td>
            </tr>
            </table>
        </td>
        <td width="50%" style="padding: 10px;">
            <table width="100%" cellpadding="0" cellspacing="0" style="background: #fff3e0; border-radius: 8px;">
            <tr>
            <td style="padding: 15px; text-align: center;">
                <div style="font-size: 11px; color: #ffa726; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Berlaku Sampai</div>
                <div style="font-size: 15px; font-weight: bold; color: #e65100;">' . $tanggal_berlaku . '</div>
            </td>
            </tr>
            </table>
        </td>
    </tr>
    </table>
</td>
</tr>

' . ($sertifikat->keterangan ? '
<!-- KETERANGAN -->
<tr>
<td style="padding: 0 40px 15px;">
    <div style="background: #f5f5f5; border-radius: 8px; padding: 15px 20px; border-left: 4px solid #FFD54F;">
        <div style="font-size: 11px; color: #78909c; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Keterangan</div>
        <div style="font-size: 13px; color: #37474f; line-height: 1.5;">' . nl2br(htmlspecialchars($sertifikat->keterangan)) . '</div>
    </div>
</td>
</tr>' : '') . '

<!-- TANDA TANGAN -->
<tr>
<td style="padding: 15px 40px 30px;">
    <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td width="50%">&nbsp;</td>
        <td width="50%" style="text-align: center;">
            <div style="font-size: 12px; color: #546e7a;">Semarang, ' . $tanggal_terbit . '</div>
            <div style="font-size: 12px; color: #546e7a; margin-top: 3px;">Kepala UPTD Metrologi Legal</div>
            <div style="font-size: 12px; color: #546e7a; margin-top: 3px;">Kota Semarang</div>
            <br><br><br>
            <div style="font-size: 13px; font-weight: bold; color: #1a237e; border-bottom: 1px solid #1a237e; display: inline-block; padding-bottom: 2px;">................................</div>
            <div style="font-size: 11px; color: #78909c; margin-top: 3px;">NIP. ................................</div>
        </td>
    </tr>
    </table>
</td>
</tr>

<!-- GARIS BAWAH -->
<tr>
<td style="background: linear-gradient(90deg, #FFD54F, #FFC107, #FFD54F); height: 3px; font-size:0; line-height:0;">&nbsp;</td>
</tr>

<!-- FOOTER -->
<tr>
<td style="background: #1a237e; padding: 20px 40px; text-align: center;">
    <div style="font-size: 11px; color: #b0bec5; margin-bottom: 5px;">Sertifikat ini diterbitkan secara elektronik oleh sistem UPTD Metrologi Legal Kota Semarang</div>
    <div style="font-size: 10px; color: #78909c;">Jl. Siliwangi No. 360, Semarang | Telp. (024) 7607777 | metrologi.smg@gmail.com</div>
    <div style="font-size: 10px; color: #78909c; margin-top: 5px;">&copy; ' . date('Y') . ' UPTD Metrologi Legal - Dinas Perdagangan Kota Semarang</div>
</td>
</tr>

</table>
</td></tr>
</table>
</body>
</html>';

        return $html;
    }

    /**
     * Format date to Indonesian format
     */
    private function _format_tanggal($date)
    {
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        $timestamp = strtotime($date);
        return date('d', $timestamp) . ' ' . $bulan[(int)date('m', $timestamp)] . ' ' . date('Y', $timestamp);
    }
}
