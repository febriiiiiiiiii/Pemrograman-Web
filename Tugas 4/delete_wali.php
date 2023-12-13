<?php 
include 'koneksi.php';

$id_wali = $_GET['id_wali'];

$query="DELETE from wali_mhs where id_wali='$id_wali'";

mysqli_query($koneksi, $query);
header("location:admin.php");

?>