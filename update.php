<?php 
// koneksi database
include 'config.php';
$id = $_GET['id'];
$status = ' Selesai ' ;

 
// update data ke database
$sql="UPDATE `transaksi` SET `status`='$status' WHERE `id`='$id'";
$result=mysqli_query($mysqli,$sql);
// mengalihkan halaman kembali ke index.php
echo $id;

header("location:admin.php");

?>