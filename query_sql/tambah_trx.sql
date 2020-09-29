DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    TRIGGER `filosofi_kopi`.`tambah_trx` AFTER INSERT
    ON `filosofi_kopi`.`tb_transaksi`
    FOR EACH ROW BEGIN
		UPDATE barang SET stok = stok + new.brg_masuk;
    END$$

DELIMITER ;