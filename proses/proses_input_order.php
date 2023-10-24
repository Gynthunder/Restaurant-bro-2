<?php
session_start();
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";

if (!empty($_POST['input_order_validate'])){
  $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_order = '$kode_order'");
  if (mysqli_num_rows($select) > 0){
    $message = '<script>alert("Order yang dimasukkan telah ada");
                window.location="../order"</script>';
  } else {
    $query = mysqli_query($conn, "INSERT INTO tb_order (id_order,meja,pelanggan,pelayan) values 
    ('$kode_order','$meja', '$pelanggan','$_SESSION[id_rm]')");
    if ($query) {
      $message = '<script>alert("Data berhasil dimasukkan");
                  window.location="../?x=orderitem&order='.$kode_order.'&meja='.$meja.'&pelanggan='.$pelanggan.'"</script>';
    }else{
      $message = '<script>alert("Data gagal dimasukkan")</script>';
    }
  }
}
echo $message;
?>