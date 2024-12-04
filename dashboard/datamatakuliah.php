<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <?php 
    include "layout/sidebar.php";
    ?>

    <!-- Content -->
    <div class="content">
        <div id="content-dosen">

            <h3>Data Mata Kuliah</h3>
            <!-- Button Tambah Data -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
                Tambah Data Mata Kuliah
            </button>

            <!-- Modal Tambah Data-->
            <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Mata Kuliah</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses.php" method="post">
                                <div class="mb-3">
                                    <label for="npp" class="form-label">Kode Mata Kuliah</label>
                                    <input type="text" name="kode_matkul" class="form-control"
                                        placeholder="Masukkan Kode Mata Kuliah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namadosen" class="form-label">Nama Mata Kuliah</label>
                                    <input type="text" name="nama_matkul" class="form-control"
                                        placeholder="Masukkan Nama Mata Kuliah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="namadosen" class="form-label">SKS</label>
                                    <input type="text" name="sks" class="form-control" placeholder="Masukkan SKS"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="namadosen" class="form-label">Jenis Mata Kuliah</label>
                                    <select name="jenis_matkul" class="form-control" required>
                                        <option value="">--Pilih Jenis Mata Kuliah--</option>
                                        <option value="Mata Kuliah Wajib">Mata Kuliah Wajib</option>
                                        <option value="Mata Kuliah Pilihan">Mata Kuliah Pilihan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="namadosen" class="form-label">Semester</label>
                                    <select name="semester" class="form-control" required>
                                        <option value="">--Pilih Semester--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="simpanmk" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Mata Kuliah </th>
                        <th>SKS</th>
                        <th>Jenis Mata Kuliah</th>
                        <th>Semester</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "../koneksi/koneksi.php";
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM matkul");
                    while ($data = mysqli_fetch_array($tampil)) { ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['kdmatkul'] ?></td>
                        <td><?php echo $data['nama_matkul'] ?></td>
                        <td><?php echo $data['sks'] ?></td>
                        <td><?php echo $data['jenis_matkul'] ?></td>
                        <td><?php echo $data['smt'] ?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-warning text-white" data-bs-toggle="modal"
                                data-bs-target="#editData<?php echo $data['kdmatkul'] ?>">Edit</a> |
                            <a href="proses.php?idhapusmk=<?php echo $data['kdmatkul'] ?>"
                                class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>

                    <!-- Modal Edit Data-->
                    <div class="modal fade" id="editData<?php echo $data['kdmatkul'] ?>" tabindex="-1"
                        aria-labelledby="editDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Mata Kuliah</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php 
                                    include "../koneksi/koneksi.php";
                                    $id = $data['kdmatkul'];
                                    $edit = mysqli_query($koneksi, "SELECT * FROM matkul WHERE kdmatkul = '$id'");
                                    $dataedit = mysqli_fetch_array($edit);
                                    ?>
                                    <form action="proses.php" method="post">
                                        <div class="mb-3">
                                            <label for="npp" class="form-label">Kode Mata Kuliah</label>
                                            <input type="text" name="kode_matkul" class="form-control"
                                                placeholder="Masukkan Kode Mata Kuliah" readonly
                                                value="<?= $dataedit['kdmatkul'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="namadosen" class="form-label">Nama Mata Kuliah</label>
                                            <input type="text" name="nama_matkul" class="form-control"
                                                placeholder="Masukkan Nama Mata Kuliah" required
                                                value="<?= $dataedit['nama_matkul'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="namadosen" class="form-label">SKS</label>
                                            <input type="text" name="sks" class="form-control"
                                                placeholder="Masukkan SKS" required value="<?= $dataedit['sks'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="namadosen" class="form-label">Jenis Mata Kuliah</label>
                                            <select name="jenis_matkul" class="form-control" required>
                                                <option value="<?= $dataedit['jenis_matkul'] ?>">
                                                    <?= $dataedit['jenis_matkul'] ?></option>
                                                <option value="">--Pilih Jenis Mata Kuliah--</option>
                                                <option value="Mata Kuliah Wajib">Mata Kuliah Wajib</option>
                                                <option value="Mata Kuliah Pilihan">Mata Kuliah Pilihan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="namadosen" class="form-label">Semester</label>
                                            <select name="semester" class="form-control" required>
                                                <option value="<?= $dataedit['smt'] ?>"><?= $dataedit['smt'] ?></option>
                                                <option value="">--Pilih Semester--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" name="editmk" class="btn btn-warning text-white">Edit</button>
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