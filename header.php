<nav class="navbar navbar-expand navbar-dark sticky-top" style="background-color: #878F70;" data-aos="fade-down">
    <div class="container-fluid">
        <a class="navbar-brand" href="home">RM Mandi Angin</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="team.php">Team</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li><a class="dropdown-item" href="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Ubah Password -->
<div class="modal fade" id="ModalUbahPassword<?php echo $row['id']?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="proses/proses_ubah_password.php" method="POST">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="email" class="form-control" id="floatingInput"
                                                placeholder="name@example.com" name="username" required value="<?php echo $_SESSION['username_rm']?>">
                                            <label for="floatingInput">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingPassword"
                                                name="passwordlama" required>
                                            <label for="floatingInput">Password Lama</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingInput"
                                                 name="passwordbaru" required value="<?php echo $_SESSION['username_rm']?>">
                                            <label for="floatingInput">Password Baru</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingPassword"
                                                name="repasswordbaru" required>
                                            <label for="floatingInput">Ulangi Password Baru</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- pembatas -->
                                
                        
                                <!-- pembatas -->




                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="ubah_password_validate"
                                        value="1234">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Akhir Modal Ubah Password -->