<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
// JavaScript untuk navigasi menu
const menuDosen = document.getElementById('menu-dosen');
const menuMatkul = document.getElementById('menu-matkul');
const menuMahasiswa = document.getElementById('menu-mahasiswa');

const contentDosen = document.getElementById('content-dosen');
const contentMatkul = document.getElementById('content-matkul');
const contentMahasiswa = document.getElementById('content-mahasiswa');

menuDosen.addEventListener('click', function() {
    menuDosen.classList.add('active');
    menuMatkul.classList.remove('active');
    menuMahasiswa.classList.remove('active');

    contentDosen.classList.remove('d-none');
    contentMatkul.classList.add('d-none');
    contentMahasiswa.classList.add('d-none');
});

menuMatkul.addEventListener('click', function() {
    menuDosen.classList.remove('active');
    menuMatkul.classList.add('active');
    menuMahasiswa.classList.remove('active');

    contentDosen.classList.add('d-none');
    contentMatkul.classList.remove('d-none');
    contentMahasiswa.classList.add('d-none');
});

menuMahasiswa.addEventListener('click', function() {
    menuDosen.classList.remove('active');
    menuMatkul.classList.remove('active');
    menuMahasiswa.classList.add('active');

    contentDosen.classList.add('d-none');
    contentMatkul.classList.add('d-none');
    contentMahasiswa.classList.remove('d-none');
});
</script>