<!DOCTYPE html>
<html>
<head>
	<title>harga</title>
</head>
<body>
<table border="1">
	<tr>
		<th>Nama Barang</th>
		<th>Stok</th>
		<th>Harga</th>
		<th>Hasil</th>
	</tr>
	<tr>
		<th>Buku</th>
		<th><input type="text" name="stok" id="stok" onchange="total()"></th>
		<th><input type="text" name="harga" id="harga" value="5000" readonly></th>
		<th><input type="text" name="hasil" id="hasil" readonly></th>
	</tr>
</table>
<script type="text/javascript">
	function total() {
		var buku = parseInt(document.getElementById('stok').value) * parseInt(document.getElementById('harga').value);
		var total_harga = buku;
		document.getElementById('hasil').value=total_harga;

	}
</script>
</body>
</html>