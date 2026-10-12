-- Request dari form customer eksternal (htdocs/form_customer).
-- Nama kolom sama dengan tsurat supaya bisa langsung diisikan ke form Tambah Data.
CREATE TABLE IF NOT EXISTS `trequest_customer` (
  `id_request` int(11) NOT NULL AUTO_INCREMENT,
  `kebutuhan_klien` text NOT NULL,
  `kategori` varchar(255) NOT NULL DEFAULT '',
  `nama_perusahaan_klien` varchar(255) NOT NULL DEFAULT '',
  `bidang_usaha` int(2) NOT NULL DEFAULT 0,
  `business_line` varchar(255) NOT NULL DEFAULT '',
  `alamat_kantor_klien` text NOT NULL,
  `provinsi` varchar(50) NOT NULL DEFAULT '',
  `kab_kota` varchar(50) NOT NULL DEFAULT '',
  `telepon_office_klien` varchar(20) NOT NULL DEFAULT '',
  `nama_klien` varchar(255) NOT NULL DEFAULT '',
  `nama_klien_2` varchar(255) NOT NULL DEFAULT '',
  `nama_klien_3` varchar(255) NOT NULL DEFAULT '',
  `telepon_klien` varchar(20) NOT NULL DEFAULT '',
  `telepon_klien_2` varchar(20) NOT NULL DEFAULT '',
  `telepon_klien_3` varchar(20) NOT NULL DEFAULT '',
  `email_klien` varchar(255) NOT NULL DEFAULT '',
  `email_klien_2` varchar(255) NOT NULL DEFAULT '',
  `email_klien_3` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(20) NOT NULL DEFAULT 'Baru',
  `nomor_surat` varchar(25) NOT NULL DEFAULT '',
  `tanggal_request` datetime NOT NULL,
  PRIMARY KEY (`id_request`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
