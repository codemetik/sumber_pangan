DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    TRIGGER `filosofi_kopi`.`batal_jual_trx` AFTER DELETE
    ON `filosofi_kopi`.`tb_transaksi_jual`
    FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + old.brg_keluar WHERE id_barang = old.id_barang;
    END$$

DELIMITER ;