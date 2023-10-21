<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$password = md5('password');
    
if(!empty($_POST ['input_user_validate'])){
  $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
  if(mysqli_num_rows($select) > 0){
    $message = '<script>alert("Username yang dimasukkan telah ada");
                window.location="../user"</script>';
  }else{
    $query = mysqli_query($conn, "UPDATE tb_user SET nama='$nama', username='$username', level='$level', nohp='$nohp', alamat='$alamat' WHERE id='$id'");
    if($query){
      $message = '<script>alert("Data berhasil diupdate");
                  window.location="../user"</script>';
    }else{
      $message = '<script>alert("Data gagal diupdate")</script>';
    }
  }
}
echo $message;
?>