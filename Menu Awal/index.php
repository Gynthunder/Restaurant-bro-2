<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    if (isset($_GET['x']) && $_GET['x']=='home'){
      include "home.php";
    }elseif (isset($_GET['x']) && $_GET['x']=='order'){
      include "order.php";
    }elseif (isset($_GET['x']) && $_GET['x']=='customer'){
      include "customer.php";
    }elseif (isset($_GET['x']) && $_GET['x']=='product'){
      include "product.php";
    }
    ?>
    <!-- End Content -->
  </div>
  <div class="fixed-bottom text-center text-light">
    Copywrite 2023 Brazky Boyss
  </div>
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>