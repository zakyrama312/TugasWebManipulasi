<style>
body {
    min-height: 100vh;
}

.sidebar {
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    background-color: #343a40;
    color: white;
}

.sidebar a {
    color: white;
    text-decoration: none;
}

.sidebar a.active {
    background-color: #495057;
}

.sidebar a:hover {
    background-color: #495057;
}

.content {
    margin-left: 250px;
    padding: 20px;
}
</style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <h4 class="text-center py-3">Admin Panel</h4>
        <a href="../dashboard/datadosen.php" class="nav-link p-2 rounded" id="menu-dosen">Data Dosen</a>
        <a href="../dashboard/datamatakuliah.php" class="nav-link p-2 rounded" id="menu-matkul">Data Mata Kuliah</a>
        <a href="../dashboard/datamahasiswa.php" class="nav-link p-2 rounded" id="menu-mahasiswa">Data Mahasiswa</a>
    </div>