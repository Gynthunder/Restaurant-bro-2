<?php
session_start();
require_once 'config.php';

if(isset($_SESSION['user_id'])) {
    // Tampilkan halaman admin
} else {
    header("location: login.php");
}
?>