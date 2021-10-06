<?php 
// koneksi database
include 'config.php';
   
$inid=$_GET['id'];

 
// menghapus data dari database
$sql="DELETE FROM transaksi WHERE id ='$inid'";
$result=mysqli_query($mysqli,$sql);
 
// mengalihkan halaman kembali ke index.php

header("location:admin.php");
 
?>