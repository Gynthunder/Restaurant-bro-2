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
<nav class="navbar navbar-expand navbar-dark sticky-top" style="background-color: #878F70;" data-aos="fade-down">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RM Mandi Angin</a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="team.php">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Menu</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button"  data-bs-toggle="dropdown" aria-expanded="false">
            Username
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-2" >
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Setting</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-lg">
  <div class="row">
    <!-- Sidebar -->
    <?php include"sidebar.php"; ?>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="col-lg-9  text-white mt-2">
    <div class="card">
  <div class="card-header">
    Order
  </div>
  <div class="card-body">
    <h5 class="card-title">Ini adalah bagian order</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam quam repellendus maiores suscipit ullam asperiores, soluta saepe perferendis rerum ducimus quae cupiditate consectetur, minima voluptate mollitia vitae optio, distinctio laborum?</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </div>
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