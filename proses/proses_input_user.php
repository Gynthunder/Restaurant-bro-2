<?php
include "connect.php";
    $nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
    $username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
    $level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
    $nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
    $alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : "";
    
    if(!empty($_POST ['input_user_validate'])){
        $query = mysqli_query($conn, "INSERT INTO tb_user (nama,username,level,nohp,alamat,password) values ('$nama','$username','$level','$nohp','$alamat','$password')");
        if(!$query){
         $message = '<script>alert("Data gagal dimasukan")</script>';
        }else{
          $message = '<script>alert("Data berhasil dimasukan")
          window.location="../user"</script>;
          </script>';
        }
    }echo $message;
?>