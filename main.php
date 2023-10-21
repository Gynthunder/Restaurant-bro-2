<?php
session_start();
if(empty($_SESSION['username_rm'])){
    header('location:login');
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_rm]'");
$hasil = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard</title>

</head>

<body style="background-color: #3F2E3E; height: 3000px;">
    <?php include"header.php"; ?>
    <div class="container-lg">
        <div class="row">
            <!-- Sidebar -->
            <?php include"sidebar.php"; ?>
            <!-- End Sidebar -->

            <!-- Content -->
            <?php
        // Periksa apakah variabel $page telah didefinisikan
        if (isset($page)) {
            include $page;
        } else {
            // Berikan pesan atau tindakan lain sesuai kebutuhan Anda
            echo "Halaman tidak ditemukan";
        }
        ?>
            <!-- End Content -->
        </div>
        <div class="fixed-bottom text-center bg-light py-2">
            Copywrite 2023 Brazky Boyss
        </div>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch alll the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.need-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(fom => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>