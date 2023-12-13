<?php 
include 'koneksi.php';

$id_wali = $_POST['id_wali'];
$nama_wali = $_POST['nama_wali'];
$jenis_kelamin_wali = $_POST['jenis_kelamin_wali'];
$alamat_wali = $_POST['alamat_wali'];
$query ="UPDATE wali_mhs SET id_wali='$id_wali', nama_wali='$nama_wali', jenis_kelamin_wali='$jenis_kelamin_wali', alamat_wali='$alamat_wali' where id_wali='$id_wali'";
mysqli_query($koneksi, $query);

header("location:admin.php");
?>  