<?php
include "connect.php";
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
    
    
    if(!empty($_POST ['input_user_validate'])){
        $query = mysqli_query($conn, "UPDATE tb_user SET password=md5('password') WHERE id = '$id'");
        if($query){
          $message = '<script>alert("Password berhasil direset");
                      window.location="../user"</script>';
        }else{
          $message = '<script>alert("Password gagal direset")</script>';
        }
    }echo $message;
?>