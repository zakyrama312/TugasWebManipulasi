<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <?php 
    include "layout/sidebar.php";
    ?>

    <!-- Content -->
    <div class="content">
        <div id="content-dosen">

            <h3>Data Mahasiswa</h3>
            <!-- Button Tambah Data -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
                Tambah Data Mahasiswa
            </button>

            <!-- Modal Tambah Data-->
            <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Mahasiswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses.php" method="post">
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
                                    <input type="text" name="nama_mhs" class="form-control"
                                        placeholder="Masukkan Nama Mahasiswa" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jeniskelamin" class="form-control" required>
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control"></textarea>

                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" class="form-control"></textarea>

                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="simpanmhs">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "../koneksi/koneksi.php";
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM mhs");
                    while ($data = mysqli_fetch_array($tampil)) { ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['nim'] ?></td>
                        <td><?php echo $data['nama_mahasiswa'] ?></td>
                        <td><?php echo $data['jenis_kelamin'] ?></td>
                        <td><?php echo $data['alamat'] ?></td>
                        <td><?php echo $data['ket'] ?></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-warning text-white" data-bs-toggle="modal"
                                data-bs-target="#editData<?php echo $data['nim'] ?>">Edit</a> |
                            <a href="proses.php?idhapus=<?php echo $data['nim'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>

                    <!-- Modal Edit Data-->
                    <div class="modal fade" id="editData<?php echo $data['nim'] ?>" tabindex="-1"
                        aria-labelledby="editDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Mahasiswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php 
                                    include "../koneksi/koneksi.php";
                                    $id = $data['nim'];
                                    $edit = mysqli_query($koneksi, "SELECT * FROM mhs WHERE nim = '$id'");
                                    $dataedit = mysqli_fetch_array($edit);
                                    ?>
                                    <form action="proses.php" method="post">
                                        <div class="mb-3">
                                            <label for="nim" class="form-label">NIM</label>
                                            <input type="text" name="nim" class="form-control"
                                                placeholder="Masukkan NIM" required value="<?= $dataedit['nim'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
                                            <input type="text" name="nama_mhs" class="form-control"
                                                placeholder="Masukkan Nama Mahasiswa" required
                                                value="<?= $dataedit['nama_mahasiswa'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                            <select name="jeniskelamin" class="form-control" required>
                                                <option value="<?= $dataedit['jenis_kelamin'] ?>">
                                                    <?= $dataedit['jenis_kelamin'] ?></option>
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea name="alamat"
                                                class="form-control"><?= $dataedit['alamat'] ?></textarea>

                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="form-label">Keterangan</label>
                                            <textarea name="keterangan"
                                                class="form-control"><?= $dataedit['ket'] ?></textarea>

                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" name="editmhs"
                                        class="btn btn-warning text-white">Edit</button>
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