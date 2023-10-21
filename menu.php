<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu
    LEFT JOIN tb_kategori_menu ON tb_kategori_menu.id = tb_daftar_menu.kategori");
while($record = mysqli_fetch_array($query)){
    $result[] = $record;
}

$select_kat_menu = mysqli_query($conn, "SELECT kategori_menu FROM tb_kategori_menu");
?>
<div class="col-lg-9  text-white mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Menu
        </div>
        <div class="card-body">
            <div class="row"></div>
            <div class="col d-flex justify-content-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah menu
                </button>
            </div>
            <!-- Modal Tambah Menu Baru  -->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/proses_input_user.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto">
                                            <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Nama Menu" name="nama_menu">
                                            <label for="floatingInput">Nama Menu</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Keterangan" name="keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="kat_menu" required>
                                            <option selected hidden value="">Pilih Kategori Menu</option>
                                            <?php
                                            foreach($select_kat_menu as $value){
                                                echo "<option value='" . $value['kategori_menu'] . "'>" . $value['kategori_menu'] . "</option>";
                                            }
                                            ?>
                                            </select>
                                            <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Harga" name="harga" required>
                                            <label for="floatingInput">Harga</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Stok" name="stok" required>
                                            <label for="floatingInput">Stok</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_user_validate"
                                        value="1234">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Akhir  Modal Tambah Menu Baru  -->

            <?php
            foreach ($result as $row) {
            ?>
            <!-- Modal View -->
            <div class="modal fade" id="ModalView<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="proses/proses_input_user.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput"
                                                placeholder="Your Name" name="nama" value="<?php echo $row['nama']?>">
                                            <label for="floatingInput">Nama</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="email" class="form-control" id="floatingInput"
                                                placeholder="name@example.com" name="username" value="<?php echo $row
                                                ['username']?>">
                                            <label for="floatingInput">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                        <select disabled class="form-select" aria-label="Default select example" required
                                            name="level" id="">
                                            <?php
                                            $data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
                                            foreach($data as $key => $value){
                                                if($row['level'] == $key+1){
                                                    echo "<option selected value='$key'>$value</option>";
                                                }else{
                                                    echo "<option value='$key'>$value</option>";
                                                }
                                            }
                                            ?>
                                            </select>
                                            <label for="floatingInput">Level User</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input disabled type="number" class="form-control" id="floatingInput"
                                                placeholder="08xxxxxxxx" name="nohp" value="<?php echo $row['nohp']?>">
                                            <label for="floatingInput">No. Hp</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea disabled class="form-control" name="" id="" style="height:100px"
                                        name="alamat"><?php echo $row['alamat']?></textarea>
                                    <label for="floatingInput">Alamat</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Akhir Modal View -->

            <!-- Modal Edit -->
            <div class="modal fade" id="ModalEdit<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/proses_edit_user.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="row">
                                        <div class="col-lg-6">                                    
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required value="<?php echo $row['nama']?>">
                                                <label for="floatingInput">Nama</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input <?php echo($row['username'] == $_SESSION['username_rm']) ? 'disabled' : '' ; ?> type="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com" name="username" required value="<?php echo $row['username']?>">
                                                <label for="floatingInput">Username</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- pembatas -->
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default select example" required
                                                    name="level" id="">
                                                <?php
                                                $data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
                                                foreach($data as $key => $value){
                                                    if($row['level'] == $key+1){
                                                        echo "<option selected value=".($key+1).">$value</option>";
                                                    }else{
                                                        echo "<option value=".($key+1).">$value</option>";
                                                    }
                                                }
                                                ?>
                                                </select>
                                                <label for="floatingInput">Level User</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="08xxxxxxxx" name="nohp" value="<?php echo $row['nohp']?>">
                                                <label for="floatingInput">No. Hp</label>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <!-- pembatas -->
                                    <div class="form-floating">
                                        <textarea class="form-control" name="" id="" style="height:100px"
                                            name="alamat"><?php echo $row['alamat']?></textarea>
                                        <label for="floatingInput">Alamat</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_user_validate"
                                            value="1234">Save changes</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Akhir Modal Edit -->

            <!-- Modal Delete -->
            <div class="modal fade" id="ModalDelete<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/proses_delete_user.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <div class="col-lg-12">
                                    <?php
                                    if($row['username'] == $_SESSION['username_rm']){
                                        echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun sendiri</div>";
                                    }else{
                                        echo "Apakah anda yakin ingin menghapus user <b>$row[username]</b>";
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="input_user_validate"
                                        value="1234" <?php echo($row['username'] == $_SESSION['username_rm']) ?
                                        'disabled' : '' ; ?>>Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Akhir Modal Delete -->

            <!-- Modal Reset Password -->
            <div class="modal fade" id="ModalResetPassword<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/proses_reset_password.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <div class="col-lg-12">
                                    <?php
                                    if($row['username'] == $_SESSION['username_rm']){
                                        echo "<div class='alert alert-danger'>Anda tidak dapat mereset password sendiri</div>";
                                    }else{
                                        echo "Apakah anda yakin ingin mereset password user <b>$row[username]</b> 
                                        menjadi password bawaan sistem yaitu <b>password</b>";
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="input_user_validate"
                                        value="1234" <?php echo($row['username'] == $_SESSION['username_rm']) ?
                                        'disabled' : '' ; ?>>Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Akhir Modal Reset Password -->

            <?php
            }
            if(empty($result)){
                echo "Data User Tidak Ada";
            }else{

            
            ?>

            <div class=" table-responsive">
                <table class=" table table-striped table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">Foto Menu</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jenis Menu</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($result as $row){
                            echo '<tr>';
                          
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $no++ ?>
                            </th>
                            <td>
                                <div style="width: 90px;">
                                    <img src="asset/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                </div>
                            </td>
                            <td>
                                <?php echo $row['nama_menu'] ?>
                            </td>
                            <td>
                                <?php echo $row['keterangan'] ?>
                            </td>
                            <td>
                                <?php echo ($row['jenis_menu'] == 1) ? "Makanan" : "Minuman" ?>
                            </td>
                            <td>
                                <?php echo $row['kategori_menu'] ?>
                            </td>
                            <td>
                                <?php echo $row['harga'] ?>
                            </td>
                            <td>
                                <?php echo $row['stok'] ?>
                            </td>
                            <td>
                                <div class="d-flex">
                                <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                    data-bs-target="#ModalView<?php echo $row['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg></button>
                                <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                    data-bs-target="#ModalEdit<?php echo $row['id']?>"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-pencil-square"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></button>
                                <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                    data-bs-target="#ModalDelete<?php echo $row['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg></button>
                                <button class="btn btn-secondary btn-sm me-1" data-bs-toggle="modal"
                                    data-bs-target="#ModalResetPassword<?php echo $row['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                        <path 
                                            d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                                        <path 
                                            d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg></button>
                                </div>
                            </td>
                        </tr>

                        <?php }
                        ?>
                    </tbody>
                </table>

            </div>
            <?php
            }
            ?>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>