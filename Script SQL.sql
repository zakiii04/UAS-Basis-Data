
CREATE TABLE Pelanggan (
  id_pelanggan INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  no_hp VARCHAR(15)
);

CREATE TABLE Transaksi (
  id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
  id_pelanggan INT,
  tanggal_terima DATE,
  tanggal_selesai DATE,
  no_nota VARCHAR(10),
  total_bayar DECIMAL(10,2),
  status_pembayaran ENUM('Lunas', 'Belum Lunas'),
  FOREIGN KEY (id_pelanggan) REFERENCES Pelanggan(id_pelanggan)
);

CREATE TABLE Layanan (
  id_layanan INT AUTO_INCREMENT PRIMARY KEY,
  nama_layanan VARCHAR(100),       
  jenis ENUM('Satuan', 'Kiloan'),   
  harga DECIMAL(10,2)      
);

CREATE TABLE Detail_Transaksi (
  id_detail INT AUTO_INCREMENT PRIMARY KEY,
  id_transaksi INT,
  id_layanan INT,
  jumlah DECIMAL(5,2),               
  subtotal DECIMAL(10,2),
  FOREIGN KEY (id_transaksi) REFERENCES Transaksi(id_transaksi),
  FOREIGN KEY (id_layanan) REFERENCES Layanan(id_layanan)
);

CREATE TABLE Pembayaran (
  id_pembayaran INT AUTO_INCREMENT PRIMARY KEY,
  id_transaksi INT,
  tanggal_bayar DATE,
  jumlah_bayar DECIMAL(10,2),
  FOREIGN KEY (id_transaksi) REFERENCES Transaksi(id_transaksi)
);

INSERT INTO Pembayaran (id_transaksi, tanggal_bayar, jumlah_bayar)
VALUES (1, '2025-06-23', 16000);

SELECT 
  t.no_nota,
  p.nama AS nama_pelanggan,
  t.tanggal_terima,
  t.tanggal_selesai,
  l.nama_layanan,
  l.jenis,
  dt.jumlah,
  l.harga,
  dt.subtotal,
  t.total_bayar,
  t.status_pembayaran
FROM Transaksi t
JOIN Pelanggan p ON t.id_pelanggan = p.id_pelanggan
JOIN Detail_Transaksi dt ON t.id_transaksi = dt.id_transaksi
JOIN Layanan l ON dt.id_layanan = l.id_layanan;

TRUNCATE TABLE transaksi;
DELETE FROM detail_transaksi;
DELETE FROM Pembayaran;
DELETE FROM transaksi;
DELETE FROM pelanggan;
DELETE FROM layanan;
DELETE FROM transaksi;

INSERT INTO Pelanggan (id_pelanggan, nama) 
VALUES 
(1, 'KASEP'),
(2, 'ESSA'),
(3, 'LULU'),
(4, 'N''ASAM'),
(5, 'DONI'),
(6, 'T''AI'),
(7, 'GINA'),
(8, 'BEMO'),
(9, 'P''DONY'),
(10, 'ABEL'),
(11, 'MUSI'),
(12, 'STGT'),
(13, 'YUYU'),
(14, 'RIZAL'),
(15, 'POPON'),
(16, 'KARSES'),
(17, 'N''WILDAN'),
(18, 'MA''SAAH'),
(19, 'KO''IRFAN'),
(20, 'TAI'),
(21, 'BU''HESTY'),
(22, 'KAMIL'),
(23, 'BU''TATI'),
(24, 'MEMEY'),
(25, 'T''MAIDAN'),
(26, 'REVA'),
(27, 'T''AYU'),
(28, 'JOY'),
(29, 'LISNAS'),
(30, 'BU''DEWI'),
(31, 'YUYU'),
(32, 'KASEP'),
(33, 'P''EGA'),
(34, 'P''ANDRE'),
(35, 'P''AANG'),
(36, 'P''MUGI'),
(37, 'BU''MIDAH');

INSERT INTO Transaksi (id_pelanggan, tanggal_terima, tanggal_selesai, no_nota, total_bayar, status_pembayaran) 
VALUES
(1, '2024-09-01', '2024-09-01', '6140', 30000.00, 'Lunas'),
(2, '2024-09-01', '2024-09-01', '6141', 30000.00, 'Lunas'),
(3, '2024-09-01', '2024-09-01', '6142', 36000.00, 'Lunas'),
(4, '2024-09-01', '2024-09-01', '6143', 48000.00, 'Lunas'),
(5, '2024-09-01', '2024-09-01', '6144', 30000.00, 'Lunas'),
(6, '2024-09-01', '2024-09-01', '6145', 63000.00, 'Lunas'),
(7, '2024-09-01', '2024-09-01', '6146', 100000.00, 'Lunas'),
(8, '2024-09-02', '2024-09-02', '6147', 36000.00, 'Lunas'),
(9, '2024-09-02', '2024-09-02', '6148', 32000.00, 'Lunas'),
(10, '2024-09-02', '2024-09-02', '6149', 20000.00, 'Lunas'),
(11, '2024-09-02', '2024-09-02', '6150', 28000.00, 'Lunas'),
(12, '2024-09-03', '2024-09-03', '6151', 20000.00, 'Lunas'),
(13, '2024-09-03', '2024-09-03', '6152', 36000.00, 'Lunas'),
(14, '2024-09-03', '2024-09-03', '6153', 36000.00, 'Lunas'),
(15, '2024-09-03', '2024-09-03', '6154', 28000.00, 'Lunas'),
(16, '2024-09-03', '2024-09-03', '6155', 42000.00, 'Lunas'),
(17, '2024-09-03', '2024-09-03', '6156', 42000.00, 'Lunas'),
(18, '2024-09-03', '2024-09-03', '6157', 24000.00, 'Lunas'),
(19, '2024-09-03', '2024-09-03', '6158', 70000.00, 'Lunas'),
(20, '2024-09-03', '2024-09-03', '6159', 56000.00, 'Lunas'),
(21, '2024-09-04', '2024-09-04', '6160', 30000.00, 'Lunas'),
(22, '2024-09-04', '2024-09-04', '6161', 28000.00, 'Lunas'),
(23, '2024-09-04', '2024-09-04', '6162', 28000.00, 'Lunas'),
(24, '2024-09-04', '2024-09-04', '6163', 28000.00, 'Lunas'),
(25, '2024-09-04', '2024-09-04', '6164', 36000.00, 'Lunas'),
(26, '2024-09-06', '2024-09-06', '6165', 16000.00, 'Lunas'),
(27, '2024-09-06', '2024-09-06', '6166', 74000.00, 'Lunas'),
(28, '2024-09-07', '2024-09-07', '6167', 20000.00, 'Lunas'),
(29, '2024-09-07', '2024-09-07', '6168', 41000.00, 'Lunas'),
(30, '2024-09-07', '2024-09-07', '6169', 36000.00, 'Lunas'),
(31, '2024-09-07', '2024-09-07', '6170', 36000.00, 'Lunas'),
(32, '2024-09-07', '2024-09-07', '6171', 32000.00, 'Lunas'),
(33, '2024-09-07', '2024-09-07', '6172', 18000.00, 'Lunas'),
(34, '2024-09-07', '2024-09-07', '6173', 54000.00, 'Lunas'),
(35, '2024-09-07', '2024-09-07', '6174', 67000.00, 'Lunas'),
(36, '2024-09-08', '2024-09-08', '6175', 39000.00, 'Lunas'),
(37, '2024-09-08', '2024-09-08', '6176', 55000.00, 'Lunas');

INSERT INTO Layanan (nama_layanan, jenis, harga) 
VALUES
('Cuci Kering', 'Kiloan', 12000.00),
('Setrika Saja', 'Kiloan', 6000.00),
('Bedcover / Satuan', 'Satuan', 55000.00);

INSERT INTO Detail_Transaksi (id_transaksi, id_layanan, jumlah, subtotal) 
VALUES
(1, 1, 2.50, 30000.00),
(2, 1, 2.50, 30000.00),
(3, 1, 3.00, 36000.00),
(4, 1, 4.00, 48000.00),
(5, 1, 2.50, 30000.00),
(6, 1, 9.00, 63000.00),
(7, 3, 1.00, 100000.00),
(8, 1, 5.00, 36000.00),
(9, 1, 4.50, 32000.00),
(10, 1, 2.50, 20000.00),
(11, 1, 3.50, 28000.00),
(12, 1, 2.50, 20000.00),
(13, 1, 4.50, 36000.00),
(14, 1, 3.50, 36000.00),
(15, 1, 3.50, 28000.00),
(16, 1, 3.50, 42000.00),
(17, 1, 3.50, 42000.00),
(18, 1, 3.00, 24000.00),
(19, 3, 1.00, 70000.00),
(20, 1, 7.00, 56000.00),
(21, 1, 1.00, 30000.00),
(22, 1, 3.50, 28000.00),
(23, 1, 3.50, 28000.00),
(24, 1, 3.50, 28000.00),
(25, 1, 5.50, 36000.00),
(26, 1, 2.00, 16000.00),
(27, 1, 7.00, 74000.00),
(28, 1, 2.50, 20000.00),
(29, 1, 7.00, 41000.00),
(30, 1, 4.50, 36000.00),
(31, 1, 4.50, 36000.00),
(32, 1, 2.50, 32000.00),
(33, 1, 1.50, 18000.00),
(34, 1, 7.50, 54000.00),
(35, 1, 6.00, 67000.00),
(36, 1, 4.50, 39000.00),
(37, 3, 1.00, 55000.00);

DELIMITER //

CREATE TRIGGER after_insert_pembayaran
AFTER INSERT ON Pembayaran
FOR EACH ROW
BEGIN
  UPDATE Transaksi
  SET status_pembayaran = 'Lunas'
  WHERE id_transaksi = NEW.id_transaksi;
END;
//

DELIMITER ;

SELECT 
    t.no_nota,
    p.nama AS nama_pelanggan,
    t.tanggal_terima,
    t.total_bayar,
    t.status_pembayaran
FROM Transaksi t
JOIN Pelanggan p ON t.id_pelanggan = p.id_pelanggan
WHERE t.status_pembayaran = 'Belum Lunas'
ORDER BY t.tanggal_terima ASC;

SELECT 
    p.nama AS nama_pelanggan,
    SUM(t.total_bayar) AS total_pengeluaran
FROM Pelanggan p
JOIN Transaksi t ON p.id_pelanggan = t.id_pelanggan
GROUP BY p.id_pelanggan
ORDER BY total_pengeluaran DESC
LIMIT 5;
