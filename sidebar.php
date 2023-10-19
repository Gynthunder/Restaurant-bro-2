<div class="col-lg-3 ">
    <nav class="navbar navbar-expand-lg   rounded-4 border mt-2" style="background-color: #878F70;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-tabs flex-column justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link <?php echo(isset($_GET['x']) && $_GET['x']=='home') ? "link-dark active" : "link-dark"; ?>"
                                href="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php echo(isset($_GET['x']) && $_GET['x']=='order') ? "link-dark active" : "link-dark"; ?>"
                                href="order">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo(isset($_GET['x']) && $_GET['x']=='user') ? "link-dark active" : "link-dark"; ?>"
                                href="user">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo(isset($_GET['x']) && $_GET['x']=='customer') ? "link-dark active" : "link-dark"; ?>"
                                href="customer">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo(isset($_GET['x']) && $_GET['x']=='menu') ? "link-dark active" : "link-dark"; ?>"
                                href="menu">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo(isset($_GET['x']) && $_GET['x']=='report') ? "link-dark active" : "link-dark"; ?>"
                                href="report">Report</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>