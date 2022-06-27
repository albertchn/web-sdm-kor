<?php
session_start();

if(!isset($_SESSION["login"])) [
    header('Location: ../login.php')
];

if(isset($_SESSION["anggota"])) {
    header('Location: ../../index.php');
};

if(isset($_SESSION["start"]) && (time() - $_SESSION["start"] > 600)) {
    session_unset();
    session_destroy();
    header("Location: ../login.php");
}

if(!isset($_GET["id"])) {
    header("Location: surat_masuk.php");
}

require '../functions.php';
$id = $_GET["id"];

$data_anggota = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id")->fetch_assoc();
$footer = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'footer'")->fetch_assoc();

if(isset($_POST["ubah"])) {
    if(ubah_anggota($_POST, $id) > 0){
        echo "<script>
                alert('Data berhasil diubah')
                // redirect ke halaman pasien
                document.location.href = 'anggota.php';
              </script> ";
    }else {
        echo "<script>
                alert('Data gagal diubah')
                // redirect ke halaman pasien
                // document.location.href = 'anggota.php';
              </script> ";
              echo mysqli_error($conn);
    }
}
?>


<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- icon bs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="../../img/Lambang_Korpolairud.svg">
    <title>UBAH SURAT</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container-xl">
            <a href="index.php" class="navbar-brand align-items-center ">
                <img src="../../img/Lambang_Korpolairud.svg" style="width:50px;height:50px">
                <h5 class="d-inline" style="font-weight: 700;">SDM KORPOLAIRUD</h5>
            </a>    

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
            aria-controls="main-nav" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-items-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="surat_masuk.php" class="nav-link" style="font-weight: 500;">Surat Masuk</a>
                    </li>
                    <li class="navbar-item">
                        <a href="surat_keluar.php" class="nav-link" style="font-weight: 500;">Surat Keluar</a>
                    </li>
                    <li class="navbar-item">
                        <a href="anggota.php" class="nav-link" style="font-weight: 600; margin-right:250px;">Anggota</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#" class="nav-link d-lg-none" data-bs-toggle="modal" data-bs-target="#ganti_pw" style="font-weight: 500;">Ganti Password</a>
                    </li> 
                    <li class="navbar-item mt-2">
                        <a href="../logout.php" class="btn btn-info rounded d-md-none d-sm-block" style="font-size:14px; font-weight: 500;" onclick="return confirm('Lanjutkan keluar?')">Keluar</a>
                    </li>
                    <li class="navbar-item">
                        <a href="../logout.php" class="btn btn-info rounded d-none d-md-block" style="width: 4.5rem;font-size:14px; font-weight: 500;" onclick="return confirm('Lanjutkan keluar?')">Keluar</a>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-md-none">Menu</span><i class="bi bi-three-dots-vertical" class="d-none d-md-block"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="#" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#ganti_pw">Ganti Password</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- AKHIR NAVBAR -->

    <section>
        <div class="" >
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambah_surat">Ubah Surat</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div>
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $data_anggota["nama"]; ?>" required autocomplete="off">
                        </div>
                        <div class="mt-3">
                            <label for="nrp" class="form-label">NRP</label>
                            <input type="number" name="nrp" id="nrp" class="form-control" value="<?= $data_anggota["username"]; ?>" required autocomplete="off">
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="<?= $data_anggota["status"]; ?>" selected>Pilih status</option>
                                <option value="anggota">Anggota</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="ubah" >Ubah</button>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="border-top bg-light pt-3">
        <div class="container-xl">
            <p class="text-center"><?= $footer["isi_komponen"]; ?> <a href="#" data-bs-toggle="modal" data-bs-target="#ganti_footer" class="text-dark"><i class="bi bi-pencil-square" ></i></a></p>
        </div>
    </footer>
    <!-- AKHIR FOOTER -->

    <!-- Modal ganti footer -->
    <div class="modal fade" id="ganti_footer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gantiFooter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiFooter">Ganti Footer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" value="<?= $footer["id_komponen"]; ?>" name="id">
                        <div class="mb-4">
                            <label for="footer" class="form-label">Teks Footer</label>
                            <input type="text" class="form-control" id="footer"  name="footer" required autocomplete="off" autofocus value="<?= $footer["isi_komponen"]; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="ubah_footer">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>