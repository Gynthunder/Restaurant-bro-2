<?php 
$conn= mysqli_connect("localhost", "root", "", "db_rm");
if (!$conn){
    die("Gagal koneksi: " . mysqli_connect_error());
}
?>