<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <?php 
    include "layout/sidebar.php";
    ?>
    <!-- Content -->
    <div class="content">
        <div id="content-dosen">

            <h3>Data Dosen</h3>
            <!-- Button Tambah Data -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
                Tambah Data Dosen
            </button>

            <!-- Modal Tambah Data-->
            <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Dosen</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses.php" method="post">
                                <div class="mb-3">
                                    <label for="npp" class="form-label">NPP</label>
                                    <input type="number" class="form-control" id="npp" autofocus name="npp"
                                        placeholder="Masukkan NPP" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namadosen" class="form-label">Nama Dosen</label>
                                    <input type="text" class="form-control" id="dosen" name="dosen"
                                        placeholder="Masukkan Nama Dosen" required>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NPP</th>
                        <th>Dosen</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "../koneksi/koneksi.php";
                    $tampil = mysqli_query($koneksi, "SELECT * FROM dosen");
                    while ($data = mysqli_fetch_array($tampil)) { ?>
                    <tr>
                        <td><?php echo $data['npp'] ?></td>
                        <td><?php echo $data['nmdosen'] ?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-warning text-white" data-bs-toggle="modal"
                                data-bs-target="#editData<?php echo $data['npp'] ?>">Edit</a> |
                            <a href="proses.php?idhapus=<?php echo $data['npp'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>

                    <!-- Modal Edit Data-->
                    <div class="modal fade" id="editData<?php echo $data['npp'] ?>" tabindex="-1"
                        aria-labelledby="editDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Dosen</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php 
                                    include "../koneksi/koneksi.php";
                                    $id = $data['npp'];
                                    $edit = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npp = '$id'");
                                    $dataedit = mysqli_fetch_array($edit);
                                    ?>
                                    <form action="proses.php" method="post">
                                        <div class="mb-3">
                                            <label for="npp" class="form-label">NPP</label>
                                            <input type="number" class="form-control" id="npp" readonly
                                                value="<?php echo $dataedit['npp'] ?>" name="npp"
                                                placeholder="Masukkan NPP" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="namadosen" class="form-label">Nama Dosen</label>
                                            <input type="text" class="form-control" id="dosen"
                                                value="<?php echo $dataedit['nmdosen'] ?>" name="dosen"
                                                placeholder="Masukkan Nama Dosen" required>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" name="edit" class="btn btn-warning text-white">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </div>

    <?php include "layout/footer.php" ?>
    </body>

</html>