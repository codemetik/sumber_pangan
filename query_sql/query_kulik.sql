SELECT * FROM tb_customer

SELECT * FROM tb_rols_supplier

SELECT * FROM tb_rols_customer


id_transaksi, x.id_barang, tanggal, nama_barang, brg_masuk, harga * brg_masuk AS total

SELECT y.id_transaksi, x.id_barang, tanggal, nama_barang, nama_supplier, brg_masuk, harga * brg_masuk FROM barang X 
INNER JOIN tb_transaksi Y ON y.id_barang = x.id_barang
INNER JOIN tb_rols_supplier z ON z.id_transaksi = y.id_transaksi
INNER JOIN tb_supplier a ON a.id_supplier = z.id_supplier

SELECT y.id_jual, x.id_barang, tanggal, nama_barang, nama_customer, brg_keluar, harga * brg_keluar AS total FROM barang X 
INNER JOIN tb_transaksi_jual Y ON y.id_barang = x.id_barang
INNER JOIN tb_rols_customer z ON z.id_jual = y.id_jual
INNER JOIN tb_customer a ON a.id_customer = z.id_customer

SELECT * FROM tb_transaksi_jual
SELECT * FROM tb_rols_customer

SELECT * FROM barang X 
INNER JOIN tb_transaksi_jual Y ON y.id_barang = x.id_barang 
INNER JOIN tb_rols_customer z ON z.id_jual = y.id_jual
INNER JOIN tb_customer a ON a.id_customer = z.id_customer

SELECT id_jual, x.id_barang, tanggal, nama_barang, brg_keluar, harga * brg_keluar AS total 
FROM tb_transaksi_jual X 
INNER JOIN barang Y ON y.id_barang = x.id_barang

SELECT * FROM tb_rols_supplier

SELECT * FROM tb_rols_customer
SELECT * FROM tb_transaksi_jual

SELECT * FROM barang Y INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang

SELECT Z.id_transaksi, tanggal, Y.id_barang, nama_barang,nama_supplier, harga, brg_masuk,harga * brg_masuk AS Total 
FROM barang Y 
INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang 
INNER JOIN tb_rols_supplier a ON a.id_transaksi = z.id_transaksi
INNER JOIN tb_supplier b ON b.id_supplier = a.id_supplier
WHERE tanggal BETWEEN '2020-11-17' AND '2020-11-17'

SELECT SUM(brg_masuk), SUM(harga * brg_masuk) AS Total 
FROM barang Y 
INNER JOIN tb_transaksi Z ON z.id_barang = y.id_barang
INNER JOIN tb_rols_supplier a ON a.id_transaksi = z.id_transaksi
INNER JOIN tb_supplier b ON b.id_supplier = a.id_supplier
WHERE tanggal BETWEEN '2020-11-17' AND '2020-11-21'

SELECT * FROM tb_transaksi

SELECT Z.id_jual, tanggal, Y.id_barang, nama_barang, b.id_customer, nama_customer, harga, brg_keluar,harga * brg_keluar AS Total 
FROM barang Y 
INNER JOIN tb_transaksi_jual Z ON z.id_barang = y.id_barang 
INNER JOIN tb_rols_customer a ON a.id_jual = z.id_jual 
INNER JOIN tb_customer b ON b.id_customer = a.id_customer

SELECT MONTH('2020-11-10') AS bulan

SELECT * FROM tb_supplier 

