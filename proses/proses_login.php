<?php 
session_start();

include "connect.php";
// Validasi Pertanyaan Keamanan
$securityAnswer = $_POST['security_question'];

if ($securityAnswer != "8") {
    echo "Jawaban pertanyaan keamanan salah. Harap coba lagi.";
    exit;
}

// Validasi Honeypot Field
if (!empty($_POST['honeypot'])) {
    echo "Anda bukan manusia. Akses ditolak.";
    exit;
} 

    $username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : "";
    
   if(!empty($_POST['submit_validation'])){
        $query = mysqli_query($conn, "SELECT * FROM  tb_user  WHERE username = '$username' && password ='$password'");
        $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
if (!$query) {
    echo "Query error: " . mysqli_error($conn);
}

        $hasil = mysqli_fetch_array ($query);
        if($hasil) {
            echo "Query: SELECT * FROM tb_user WHERE username = '$username' && password = '$password'";
            $_SESSION['username_rm'] = $username;

            header('location:../home');
        }else{ ?>
<script>
alert('Username atau Password yang anda masukkan salah!');
window.location = '../login'
</script>

<?php
        }
    }
    ?>