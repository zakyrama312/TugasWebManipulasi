<?php 

include "../koneksi/koneksi.php";


// tambah dosen
if (isset($_POST['simpan'])) {
    $npp = $_POST['npp'];
    $dosen = $_POST['dosen'];


    $simpan = mysqli_query($koneksi, "INSERT INTO dosen VALUES ('$npp', '$dosen')");
    if ($simpan) {
        echo "<script>
                alert('Berhasil Ditambahkan');
                window.location.href = 'datadosen.php';
              </script>";
    }
}

// hapus dosen
if (isset($_GET['idhapus'])) { // Tambahkan kondisi untuk cek parameter idhapus
    $id = $_GET['idhapus'];

    $hapus = mysqli_query($koneksi, "DELETE FROM dosen WHERE npp = '$id'");

    if ($hapus) {
        echo "<script>
                alert('Berhasil Dihapus');
                window.location.href = 'datadosen.php';
              </script>";
    }
}

// edit
if(isset($_POST['edit'])){
    $npp = $_POST['npp'];
    $dosen = $_POST['dosen'];

    $edit = mysqli_query($koneksi, "UPDATE dosen SET nmdosen = '$dosen' WHERE npp = '$npp'");
    if ($edit) {
         echo "<script>
                alert('Berhasil Diedit');
                window.location.href = 'datadosen.php';
              </script>";
    }
}




// mata kuliah

// tambah matakuliah
if (isset($_POST['simpanmk'])) {
    $kdmatkul = $_POST['kode_matkul'];
    $nama_matkul = $_POST['nama_matkul'];
    $sks = $_POST['sks'];
    $jenismatkul = $_POST['jenis_matkul'];
    $semester = $_POST['semester'];


    $simpan = mysqli_query($koneksi, "INSERT INTO matkul VALUES ('$kdmatkul', '$nama_matkul', '$sks','$jenismatkul','$semester')");
    if ($simpan) {
        echo "<script>
                alert('Berhasil Ditambahkan');
                window.location.href = 'datamatakuliah.php';
              </script>";
    }
}

// edit matakuliah
if(isset($_POST['editmk'])){
    $kdmatkul = $_POST['kode_matkul'];
    $nama_matkul = $_POST['nama_matkul'];
    $sks = $_POST['sks'];
    $jenismatkul = $_POST['jenis_matkul'];
    $semester = $_POST['semester'];

    $update = mysqli_query($koneksi, "UPDATE matkul SET nama_matkul = '$nama_matkul', sks = '$sks', jenis_matkul = '$jenismatkul', smt = '$semester'");
 if ($update) {
        echo "<script>
                alert('Berhasil Diedit');
                window.location.href = 'datamatakuliah.php';
              </script>";
    }

}

// hapus matakuliah
if(isset($_GET['idhapusmk'])){
     $id = $_GET['idhapusmk'];

    $hapus = mysqli_query($koneksi, "DELETE FROM matkul WHERE kdmatkul = '$id'");

    if ($hapus) {
        echo "<script>
                alert('Berhasil Dihapus');
                window.location.href = 'datamatakuliah.php';
              </script>";
    }
}


// data mahasiswa
// tambah mahasiswa

if(isset($_POST['simpanmhs'])){
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];
    $keterangan = $_POST['keterangan'];


    $cek = mysqli_query($koneksi, "SELECT * FROM mhs WHERE nim = '$nim'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('NIM Sudah Ada');
                window.location.href = 'datamahasiswa.php';
              </script>";
    }else{
        $simpan = mysqli_query($koneksi, "INSERT INTO mhs VALUES ('$nim','$nama_mhs','$jeniskelamin','$alamat','$keterangan')");
        if ($simpan) {
            echo "<script>
                alert('Berhasil Disimpan');
                window.location.href = 'datamahasiswa.php';
              </script>";
        }
    }
}

// edit mahasiswa
if(isset($_POST['editmhs'])){
    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];
    $keterangan = $_POST['keterangan'];


    $edit = mysqli_query($koneksi, "UPDATE mhs SET nama_mahasiswa = '$nama_mhs', jenis_kelamin = '$jeniskelamin', alamat = '$alamat', ket = '$keterangan' ");
    if ($edit) {
        echo "<script>
            alert('Berhasil Diedit');
            window.location.href = 'datamahasiswa.php';
            </script>";
    }
    
}

// hapus mahasiswa
if(isset($_GET['idhapusmhs'])){
     $id = $_GET['idhapusmhs'];

    $hapus = mysqli_query($koneksi, "DELETE FROM mhs WHERE nim = '$id'");

    if ($hapus) {
        echo "<script>
                alert('Berhasil Dihapus');
                window.location.href = 'datamahasiswa.php';
              </script>";
    }
}

?>