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

require "../functions.php";

$judul = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'judul_index'")->fetch_assoc();
$desk_index = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'deskripsi_index'")->fetch_assoc();
$folder_srtmsk = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'folder_srtmsk'")->fetch_assoc();
$folder_srtklr = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'folder_srtklr'")->fetch_assoc();
$foto_index = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'foto_index'")->fetch_assoc();
$footer = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'footer'")->fetch_assoc();

if(isset($_POST["ubah_judul"])) {
    if(ubah_judul($_POST) > 0) {
        echo "<script>
                alert('Judul berhasil diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }else {
        echo "<script>
                alert('Judul gagal diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }
}

if(isset($_POST["ubah_desk"])) {
    if(ubah_desk($_POST) > 0) {
        echo "<script>
                alert('Deskripsi berhasil diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }else {
        echo "<script>
                alert('Deskripsi gagal diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }
}

if(isset($_POST["ubah_folder_srtmsk"])) {
    if(ubah_folder_srtmsk($_POST) > 0) {
        echo "<script>
                alert('Nama Folder berhasil diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }else {
        echo "<script>
                alert('Nama Folder gagal diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }
}

if(isset($_POST["ubah_folder_srtklr"])) {
    if(ubah_folder_srtklr($_POST) > 0) {
        echo "<script>
                alert('Nama Folder berhasil diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }else {
        echo "<script>
                alert('Nama Folder gagal diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }
}

if(isset($_POST["ubah_foto"])) {
    if(ubah_foto($_FILES) > 0) {
        echo "<script>
                alert('Foto berhasil diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }else {
        echo "<script>
                alert('Foto gagal diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }
}

if(isset($_POST["ubah_footer"])) {
    if(ubah_footer($_POST) > 0) {
        echo "<script>
                alert('Footer berhasil diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }else {
        echo "<script>
                alert('Footer gagal diubah')
                // redirect ke halaman pasien
                document.location.href = 'index.php';
              </script> ";
    }
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- icon bs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="../../img/Lambang_Korpolairud.svg">
    <title>SDM KORPOLAIRUD</title>
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
                        <a href="anggota.php" class="nav-link" style="font-weight: 500; margin-right: 250px">Anggota</a>
                    </li>
                    <li class="navbar-item mt-2">
                        <a href="../logout.php" class="btn btn-info rounded d-lg-none d-md-block" style="font-size:14px; font-weight: 500;" onclick="return confirm('Lanjutkan keluar?')">Keluar</a>
                    </li>
                    <li class="navbar-item">
                        <a href="../logout.php" class="btn btn-info rounded d-none d-md-block" style="width: 4.5rem;font-size:14px; font-weight: 500;" onclick="return confirm('Lanjutkan keluar?')">Keluar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-md-none">Menu</span><i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="#" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#ganti_pw">Ganti Password</a>
                                <a href="#" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#ganti_foto">Ganti Foto</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- AKHIR NAVBAR -->

    <!-- INTRO -->
    <section class="mt-5 media-xl">
        <div class="container-lg">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="row g-1 align-items-start">
                        <div class="col-7 col-lg-8">
                            <h1 class="" style="font-weight: 800;"><?= $judul["isi_komponen"]; ?></h1>
                        </div>
                        <div class="col-1 col-lg-2">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#ganti_judul" class="text-dark">
                                <i class="bi bi-pencil-square" ></i>
                            </a>
                        </div>
                        <p class="my-4"><?= $desk_index["isi_komponen"]; ?> <a href="#" data-bs-toggle="modal" data-bs-target="#ganti_deskripsi_index" class="text-dark"><i class="bi bi-pencil-square" ></i></a></p>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div id="mycarousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false" data-bs-touch="false">
                        <div class="carousel-inner rounded mt-2">
                            <?php $foto = explode(',',$foto_index["isi_komponen"]); ?>
                            <?php if(!empty($foto[0])) { ?>
                            <div class="carousel-item active">
                                <img src="../../img/<?= $foto[0]; ?>" class="d-block w-100" style="height: 380px;">
                            </div>
                            <?php }; ?>
                            <?php if(!empty($foto[1])) { ?>
                            <div class="carousel-item">
                                <img src="../../img/<?= $foto[1]; ?>" class="d-block w-100" style="height: 380px;">
                            </div>
                            <?php }; ?><?php if(!empty($foto[2])) { ?>
                            <div class="carousel-item">
                                <img src="../../img/<?= $foto[2]; ?>" class="d-block w-100" style="height: 380px;">
                            </div>
                            <?php }; ?><?php if(!empty($foto[3])) { ?>
                            <div class="carousel-item">
                                <img src="../../img/<?= $foto[3]; ?>" class="d-block w-100" style="height: 380px;">
                            </div>
                            <?php }; ?><?php if(!empty($foto[4])) { ?>
                            <div class="carousel-item">
                                <img src="../../img/<?= $foto[4]; ?>" class="d-block w-100" style="height: 380px;">
                            </div>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- AKHIR INTRO -->
    
    <!-- FOOTER -->
    <footer class="border-top bg-light pt-3">
        <div class="container-xl">
            <p class="text-center"><?= $footer["isi_komponen"]; ?> <a href="#" data-bs-toggle="modal" data-bs-target="#ganti_footer" class="text-dark"><i class="bi bi-pencil-square" ></i></a></p>
        </div>
    </footer>
    <!-- AKHIR FOOTER -->
                    
    <!-- Modal ganti pw -->
    <div class="modal fade" id="ganti_pw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gantiPw" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiPw">Ganti Password</h5> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="ganti_password.php?id=<?= $_SESSION["ky"]; ?>" method="post">
                        <div class="mb-2">
                            <label for="pw_lama" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="pw_lama" placeholder="yang mau diganti..." name="pw_lama" required autocomplete="off" autofocus>
                        </div>
                        <div class="mb-2">
                            <label for="pw_baru" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="pw_baru" name="pw_baru" required placeholder="rahasia banget!" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="kon_pw_baru" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="kon_pw_baru" name="kon_pw_baru" required placeholder="jangan kasih tau orang!" autocomplete="off">
                        </div>
                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ganti foto -->
    <div class="modal fade" id="ganti_foto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gantiFoto" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiFoto">Ganti Foto</h5> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="foto" class="form-label">Pilih Foto <span style="font-size:13px;"> (maksimal 5 foto)</span></label>
                            <input type="file" class="form-control" id="foto" name="foto[]" multiple autocomplete="off" autofocus>
                        </div>
                        <div>
                            <?php foreach($foto as $img) : ?>
                                <img src="../../img/<?= $img; ?>" alt="" width="70px" height="80px">
                            <?php endforeach; ?>
                        </div>
                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="ubah_foto">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ganti judul -->
    <div class="modal fade" id="ganti_judul" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gantiJudul" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiJudul">Ganti Judul</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" value="<?= $judul["id_komponen"]; ?>" name="id_judul">
                        <div class="mb-4">
                            <label for="judul_index" class="form-label">Judul Landing Page</label>
                            <input type="text" class="form-control" id="judul_index" placeholder="Judul landing page..." name="judul_index" required autocomplete="off" autofocus value="<?= $judul["isi_komponen"]; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="ubah_judul">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Modal ganti deskripsi -->
    <div class="modal fade" id="ganti_deskripsi_index" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gantiDesk" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiDesk">Ganti Deskripsi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" value="<?= $desk_index["id_komponen"]; ?>" name="id_desk">
                        <div class="mb-4">
                            <label for="desk_index" class="form-label">Deskripsi Landing Page</label>
                            <textarea name="desk_index" id="desk_index" cols="50" rows="5" class="form_control"><?= $desk_index["isi_komponen"]; ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="ubah_desk">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ganti folder surat masuk -->
    <div class="modal fade" id="ganti_folder_srtmsk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gantiFolderSrtMsk" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiFolderSrtMsk">Ganti Nama Folder Surat Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_folder_srtmsk" value="<?= $folder_srtmsk["id_komponen"]; ?>">
                        <div class="mb-4">
                            <label for="folder_srtmsk" class="form-label">Nama Folder Surat Masuk</label>
                            <input type="text" class="form-control" id="folder_srtmsk" name="folder_srtmsk" required autocomplete="off" autofocus value="<?= $folder_srtmsk["isi_komponen"]; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="ubah_folder_srtmsk">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ganti folder surat keluar -->
    <div class="modal fade" id="ganti_folder_srtklr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gantiFolderSrtMsk" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gantiFolderSrtMsk">Ganti Nama Folder Surat Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_folder_srtklr" value="<?= $folder_srtklr["id_komponen"]; ?>">
                        <div class="mb-4">
                            <label for="folder_srtklr" class="form-label">Nama Folder Surat Keluar</label>
                            <input type="text" class="form-control" id="folder_srtklr" name="folder_srtklr" required autocomplete="off" autofocus value="<?= $folder_srtklr["isi_komponen"]; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="ubah_folder_srtklr">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>