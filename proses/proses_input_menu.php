<?php
include "connect.php";
$nama_menu = (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$kat_menu = (isset($_POST['kat_menu'])) ? htmlentities($_POST['kat_menu']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";

$kode_rand = rand(10000, 99999)."-";
$target_dir ="../asset/img/".$kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(!empty($_POST ['input_menu_validate'])){
// Cek apakah gambar atau bukan
$cek = getimagesize($_FILES['foto']['tmp_name']);
if($cek === false){
  $message = "Ini bukan file gambar";
  $statusUpload = 0;
}else{
  $statusUpload = 1;
  if(file_exists($target_file)){
    $message ="Maaf, File yang Dimasukkan Telah Ada";
    $statusUpload = 0;
  }else{
    if($_FILES['foto']['size'] > 500000){ //500kb
      $message = "File foto yang diupload terlalu besar";
      $statusUpload = 0;
    }else{
      if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif"){
        $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG dan GIF";
        $statusUpload = 0;
      }
    }
  }
}

if($statusUpload == 0){
  $message = '<script>alert("'.$message.', Gambar tidak dapat diupload");
                window.location="../menu"</script>';
}else{
  $select = mysqli_query($conn, "SELECT * FROM tb_daftar_menu WHERE nama_menu = '$nama_menu'");
  if(mysqli_num_rows($select) > 0){
    $message = '<script>alert("Nama menu yang dimasukkan telah ada");
                window.location="../menu"</script>';
  }else{
    if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)){
      $query = mysqli_query($conn, "INSERT INTO tb_daftar_menu (foto, nama_menu, keterangan, kategori, harga, stok) 
      values ('" . $kode_rand . $_FILES['foto']['name']."', '$nama_menu', '$keterangan', '$kat_menu', '$harga', '$stok')");
    if($query){
      $message = '<script>alert("Data berhasil dimasukkan");
                  window.location="../menu"</script>';
    }else{
      $message = '<script>alert("Data gagal dimasukkan");
                  window.location="../menu"</script>';
    }
    }else{
      $message = '<script>alert("Maaf terjadi kesalahan file tidak dapat diupload");
                window.location="../menu"</script>';
    }
  }  
}
}
echo $message;
?>