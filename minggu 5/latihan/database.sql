CREATE DATABASE penyewaan_mobil;

USE penyewaan_mobil;

-- Operator mendata kendaraan yang bisa disewakan --

CREATE TABLE kendaraan(no_plat VARCHAR(19) PRIMARY KEY, tahun INT(4), tarif INT(10), status VARCHAR(12), id_type INT(19), UNIQUE(no_plat));

CREATE TABLE tipe_kendaraan(id_type INT(19) PRIMARY KEY, type VARCHAR(255));

INSERT INTO kendaraan VALUE('H 1111 AA', '2016', '1000000', 'Baik', '1');

INSERT INTO tipe_kendaraan VALUE('1', 'Toyota Inova');

-- Operator mendata sopir yang tersedia --

CREATE TABLE sopir(id_sopir INT(19) PRIMARY KEY, nama VARCHAR(255), alamat VARCHAR(255), telepon VARCHAR(13), sim CHAR(2), tarif INT(10));

INSERT INTO sopir VALUE('1', 'Agus', 'Tembalang, Semarang', '081234567890', 'A', '500000');

-- Operator Menginput data pelanggan apabila ada pelanggan yang baru pertama kali datang melakukan sewa mobil --

CREATE TABLE pelanggan(no_ktp VARCHAR(19) PRIMARY KEY, nama VARCHAR(255), alamat VARCHAR(255), telepon VARCHAR(13), UNIQUE(no_ktp));

INSERT INTO pelanggan VALUE('3122330101010001', 'Budi', 'Pedurungan, Semarang', '081098765432');

-- Operator mendata proses transaksi sewa mobil --

-- Transaksi Sewa

CREATE TABLE transaksi(no_transaksi VARCHAR(12) PRIMARY KEY, no_plat VARCHAR(19), id_sopir INT(19), no_ktp VARCHAR(19), tanggal_pesan DATE, tanggal_pinjam DATE, tanggal_kembali_rencana DATE, jam_kembali_rencana DATETIME, tanggal_kembali_realisasi DATE, jam_kembali_realisasi DATETIME, denda INT(18), kilometer_pinjam INT(10), kilometer_kembali INT(10), bbm_pinjam INT(10), bbm_kembali INT(10), kondisi_mobil_pinjam VARCHAR(255), kondisi_mobil_kembali VARCHAR(255), kerusakan VARCHAR(12), biaya_kerusakan INT(10), biaya_bbm INT(10));

INSERT INTO transaksi VALUE('INV210421001', 'H 1111 AA', '1', '3122330101010001', '2021-04-21', '2021-04-22', '2021-04-23', '2021-04-23 16:30:00', NULL, NULL, NULL, '10000', NULL, '50', NULL, 'Baik', NULL, NULL, NULL, NULL);

-- Transaksi Pengembalian Mobil

UPDATE transaksi SET tanggal_kembali_realisasi = '2021-04-24', jam_kembali_realisasi = '2021-04-24 16:30:00', kilometer_kembali = '12000', bbm_kembali = '40', kondisi_mobil_kembali = 'Kurang Baik', kerusakan = 'Layar GPS tidak bisa menyala' WHERE no_transaksi = 'INV210421001';

UPDATE kendaraan SET status = 'Kurang Baik' WHERE no_plat = 'H 1111 AA';

-- Denda

UPDATE transaksi SET denda = '100000', biaya_kerusakan = '500000', biaya_bbm = '90000' WHERE no_transaksi = 'INV210421001';

-- Operator dapat memonitoring reporting harian transaksi dan history harian transaksi --

SELECT * FROM transaksi ORDER BY tanggal_pesan ASC;


-- Owner dapat memonitoring rekapitulasi transaksi sesuai filter yang disediakan (harian, mingguan, bulanan dan 1 tahun --

-- Harian

SELECT * FROM transaksi WHERE LEFT(tanggal_pesan, 4) = 2021 AND SUBSTRING(tanggal_pesan, 6, 2) LIKE '03' AND RIGHT(tanggal_pesan, 2) = 22;

-- Bulanan

SELECT * FROM transaksi WHERE LEFT(tanggal_pesan, 4) = 2021 AND SUBSTRING(tanggal_pesan, 6, 2) LIKE '04';

-- Tahunan

SELECT * FROM transaksi WHERE LEFT(tanggal_pesan, 4) = 2021;