<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$usia = $_POST['usia'];
$email = $_POST['email'];
$paket = $_POST['paket'];
$tanggal = $_POST['tanggal'];
 
// update data ke database
$sql="UPDATE `booking` SET `nama`='$nama',`usia`='$usia',`email`='$email',`paket`='$paket',`tanggal`='$tanggal' WHERE `id_booking`='$id'";
$result=mysqli_query($kon,$sql);
// mengalihkan halaman kembali ke index.php

header("location:admin.php");
 
?>