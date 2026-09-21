# Metrologi Legal Kota Semarang

Aplikasi Sistem Informasi Layanan Metrologi Legal Kota Semarang berbasis web menggunakan framework **CodeIgniter 3**. Sistem ini dirancang untuk memfasilitasi pengajuan tera/tera ulang alat UTTP (Ukur, Takar, Timbang, dan Perlengkapannya), pengelolaan jadwal peneraan, verifikasi petugas, hingga penerbitan sertifikat.

---

##  Fitur Utama

###  **Publik / Pengguna (Pemohon)**
- **Katalog Alat UTTP**: Informasi dan pencarian kategori alat (Massa Timbangan, Volume, Panjang & Tekanan, Kadar Air).
- **Pengajuan Tera / Tera Ulang Online**: Form pendaftaran pengajuan layanan kalibrasi/tera alat.
- **Tracking Status Pengajuan**: Pemantauan status proses pengajuan secara real-time.
- **Unduh Sertifikat**: Mengunduh sertifikat tera yang telah diverifikasi dan disetujui.

###  **Admin & Petugas**
- **Dashboard Statistik**: Ringkasan data pengajuan bulanan, status pengajuan, serta statistik petugas & sertifikat.
- **Manajemen Pengajuan**: Verifikasi dokumen & penetapan petugas penanggung jawab.
- **Penjadwalan Tera**: Pengaturan dan pemantauan jadwal pemeriksaan alat di lapangan/kantor.
- **Manajemen Sertifikat & Notifikasi**: Pembuatan sertifikat hasil tera dan pengiriman notifikasi otomatis kepada pemohon.

---

##  Teknologi yang Digunakan

- **PHP** (Framework CodeIgniter 3)
- **Database**: MySQL / MariaDB
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap / AdminLTE
- **Web Server**: Apache (Laragon / XAMPP)

---

##  Panduan Instalasi Lokal

### 1. Prerequisites (Persyaratan Sistem)
- Web Server: **XAMPP** / **Laragon**
- PHP version: `^7.4` atau `^8.0`
- Database: MySQL / MariaDB

### 2. Langkah-Langkah Instalasi

1. **Clone Repositori**
   ```bash
   git clone https://github.com/MochSalafudin/metrologi-kota-semarang.git
   cd metrologi-kota-semarang
   ```

2. **Konfigurasi Database**
   - Buat database baru di MySQL/phpMyAdmin dengan nama `db_metrologi` (atau sesuai keinginan).
   - Import file database `.sql` (jika tersedia di proyek) ke database yang baru dibuat.
   - Buka file `application/config/database.php` dan sesuaikan kredensial database Anda:
     ```php
     'hostname' => 'localhost',
     'username' => 'root',
     'password' => '',
     'database' => 'db_metrologi',
     ```

3. **Konfigurasi Base URL**
   - Buka file `application/config/config.php` dan atur `base_url`:
     ```php
     $config['base_url'] = 'http://localhost/meterologikotasemarang/';
     ```

4. **Jalankan Aplikasi**
   - Jalankan Apache & MySQL di Laragon / XAMPP.
   - Buka browser dan akses: `http://localhost/meterologikotasemarang/`

---

##  Struktur Direktori Utama

```
meterologikotasemarang/
├── application/
│   ├── config/          # Konfigurasi aplikasi (database, routes, config)
│   ├── controllers/     # Controller (Admin, Auth, Home, User)
│   ├── models/          # Model database (M_pengajuan, M_petugas, M_sertifikat, dll)
│   └── views/           # Tampilan antarmuka (Views publik & admin)
├── system/              # Core framework CodeIgniter 3
├── uploads/             # Direktori penyimpanan dokumen pendukung & sertifikat
└── index.php            # Entry point aplikasi
```

---

##  Lisensi

Proyek ini dikembangkan untuk Sistem Informasi Metrologi Legal Kota Semarang.
