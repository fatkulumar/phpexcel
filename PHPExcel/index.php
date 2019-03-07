<?php 
$koneksi = mysqli_connect("localhost", "root", "", "toko");
$query = mysqli_query($koneksi, "SELECT * FROM jual");
$quer = mysqli_query($koneksi, "SELECT * FROM jual");
$data = array();
while (($row = mysqli_fetch_array($query)) != null){
	$data[] = $row;
}
echo "jumlah data : ".$jml = count($data);

 ?>
<table class="table">
<thead>
	<tr>
		<th>No</th>
		<th>Nama Kriteria</th>
		<th>Nilai</th>
		<th>Nama Kriteria</th>
	</tr>
</thead>
<tbody>
	<?php 	
		$no=1; 
			for ($i=1; $i < $jml = count($data); $i++) { 
				$a = mysqli_fetch_array($quer);
				for ($j=$i; $j < $jml = count($data); $j++) { 

					echo $a['nama_barang'];
	?>
	<tr>

		<td><?=$no++?></td>
		<td><?=$a['nama_barang'];?></td> 
		<td><?=$j ?></td> 

	<?php }} ?>
	</tr>
</tbody>
</table>

<hr>

<!-- https://packagist.org/packages/phpoffice/phpexcel // alamat packagist PHPExcel -->
<a href="import.php">Import</a>