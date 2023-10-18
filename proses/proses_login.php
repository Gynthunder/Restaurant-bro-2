<?php 
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
    $password = (isset($_POST['password'])) ? htmlentities($_POST['password']) : "";
   if(!empty($_POST['submit_validation'])){
        if($username == "abc@abc.com" && $password == "password") {
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