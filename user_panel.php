<?php
session_start();
require_once 'config.php';

if(isset($_SESSION['user_id'])) {
    // Tampilkan halaman user
} else {
    header("location: login.php");
}
?>