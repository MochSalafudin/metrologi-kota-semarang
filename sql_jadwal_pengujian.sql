-- ============================================
-- Migration: Tambah tabel tb_jadwal_pengujian
-- ============================================

CREATE TABLE `tb_jadwal_pengujian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pengajuan_id` int NOT NULL,
  `petugas_id` int DEFAULT NULL,
  `tanggal_pengujian` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `lokasi` varchar(255) NOT NULL,
  `catatan` text,
  `status` enum('dijadwalkan','berlangsung','selesai','dibatalkan') NOT NULL DEFAULT 'dijadwalkan',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pengajuan_id` (`pengajuan_id`),
  KEY `petugas_id` (`petugas_id`),
  CONSTRAINT `fk_jadwal_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `tb_pengajuan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_jadwal_petugas` FOREIGN KEY (`petugas_id`) REFERENCES `tb_petugas` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
