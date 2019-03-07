<?php 
$koneksi = mysqli_connect("localhost", "root", "", "toko");
include "vendor/autoload.php";
	if (isset($_POST['import'])) {
		$file = $_FILES['file']['name'];
		$ekstensi = explode(".", $file);
		$file_name = "file-".round(microtime(true)).".".end($ekstensi);
		$sumber = $_FILES['file']['tmp_name'];
		$target_dir = "../_file/";
		$target_file = $target_dir . $file_name;
		$upload = move_uploaded_file($sumber, $target_file);
		
		$obj = PHPExcel_IOFactory::load($target_file);
		$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);
		$sql = "INSERT INTO `excel`(`nama`, `alamat`, `status`) VALUES";
			for ($i=2; $i <= count($all_data) ; $i++) { 
				$nama = $all_data[$i]['A'];
				$alamat = $all_data[$i]['B'];
				$status = $all_data[$i]['C'];
				$sql .= "('$nama', '$alamat', '$status'),";
			}
		$sql = substr($sql, 0, -1);
		$query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));	
		$buang = unlink($target_file);
		if ($buang) {
			header("location: index.php");
		}else{
			echo "gagal";
		}
		
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="" method="POST" enctype="multipart/form-data">
		<label for="file">Import</label>
		<input type="file" name="file" id="file"></input>

		<button name="import">Import</button>
	</form>
	<a href="../_file/sample/upload.xlsx">Download</a>

</body>
</html>