<?php
session_start();

if(!isset($_SESSION["login"])) [
    header('Location: ../login.php')
];

if(!isset($_SESSION["anggota"])) {
    header('Location: ../login.php');
};

if(isset($_SESSION["start"]) && (time() - $_SESSION["start"] > 600)) {
    session_unset();
    session_destroy();
    header("Location: ../login.php");
}

require '../functions.php';

$data_srtkeluar = query("SELECT * FROM surat_keluar");
$footer = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'footer'")->fetch_assoc();
$judul_srtklr = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'judul_srtklr'")->fetch_assoc();     


if(isset($_POST["tambah"])) {
    if(tambah_srtklr($_POST) > 0) {
        echo "<script>
                alert('Surat berhasil ditambahkan')
                document.location.href = 'surat_keluar.php';
              </script> ";
    }else {
        echo "<script>
                alert('Surat gagal ditambahkan')
                document.location.href = 'surat_keluar.php';
              </script> ";
    }
}

?>

<!doctype html>
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
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../js/cari_srtklr.js"></script>
    <!-- Title Logo -->
    <link rel="shortcut icon" href="../../img/Lambang_Korpolairud.svg">
    <title>SURAT KELUAR</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container-xl">
            <a href="../../index.php" class="navbar-brand align-items-center ">
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
                        <a href="surat_keluar.php" class="nav-link active" style="font-weight: 600; margin-right:250px">Surat Keluar</a>
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
                    <li class="nav-item dropdown d-none d-lg-block" id="navdd">
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
    
    <!-- SECTION -->
    <section>
        <div class="container-lg" id="=">
            <div class="row mt-4 mb-2">
                <div class="col-12">
                    <h1 class="text-center" style="font-weight: 600;"><?= $judul_srtklr["isi_komponen"]; ?></h1>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-8 col-md-4">
                    <form action="" method="post" class="form-cari mt-3">
                        <input type="text" name="keyword" placeholder="Cari ...." autocomplete="off" class="keyword form-control mt-2" style="font-size: 13px;">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-8">
                    <botton class="btn btn-primary fw-bold mb-2 py-2" data-bs-toggle="modal" data-bs-target="#tambahSurat" style="font-size: 15px; width: 9rem">Tambah Surat</botton>
                </div>
            </div>

            <div class="table-responsive-lg mt-4" id="container_srtklr">
                <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered text-center">
                    <thead class="table-light">
                        <th style="min-width:2rem" class="">No.</th>
                        <th style="min-width:7rem">Tgl. Surat</th>
                        <th style="min-width:10rem">No. Surat</th>
                        <th style="min-width:23rem">Perihal</th>
                        <th style="min-width:5rem">File</th>
                        <th style="min-width:3rem"></th>
                    </thead>
                    <tbody> 
                        <?php
                        $batas = 10;
                        $halaman = isset($_GET["halaman"])?(int)$_GET["halaman"] : 1;
                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        $jumlah_data = count($data_srtkeluar);
                        $total_halaman = ceil($jumlah_data/$batas);

                        $surat_keluar = query("SELECT * FROM surat_keluar LIMIT $halaman_awal, $batas");
                        $nomor = $halaman_awal+1;
                        ?>
                        <?php foreach($surat_keluar as $data) : ?>
                            <tr>
                                <td class="" style="vertical-align: middle; min-width: 2rem; margin-top:12px"><?= $nomor++; ?>.</td>
                                <td style="vertical-align: middle; min-width: 7rem"><?= date('d-m-Y', strtotime($data["tgl_surat"])); ?></td>
                                <td style="vertical-align: middle; min-width: 10rem"><?= $data["no_surat"]; ?></td>
                                <td class="text-start" style="vertical-align: middle; min-width: 23rem"><?= $data["perihal"]; ?></td>
                                <td style="vertical-align: middle; min-width: 5rem"><a href="https://drive.google.com/file/d/<?= $data["file"]; ?>/view?usp=drive_open" target="_blank">PDF</a></td>
                                <td class="dropdown" style="vertical-align: middle;">
                                    <a class="text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a href="ubah_srtklr.php?id=<?= $data["id_surat"]; ?>" class="dropdown-item">Edit</a>
                                            <a href="hapus_srtklr.php?id=<?= $data['id_surat']; ?>" class="dropdown-item" onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a  class="page-link text-dark" <?php if($halaman > 1){echo "href='?halaman=$previous'";} ?>><span aria-hidden="true">&laquo;</span></a>
                        </li>
                        <?php for($i=1;$i<=$total_halaman;$i++) : ?>
                            <li class="page-item">
                                <a href="?halaman=<?= $i; ?>" class="page-link text-dark"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item">
                            <a class="page-link text-dark" <?php if($halaman < $total_halaman){echo "href='?halaman=$next'";} ?>><span aria-hidden="true">&raquo;</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- AKHIR SECTION -->

    <!-- FOOTER -->
    <footer class="border-top bg-light" style="margin-top: 10rem;">
        <div class="container-xl">
            <p class="p-3 text-center"><?= $footer["isi_komponen"]; ?></p>
        </div>
    </footer>
    <!-- AKHIR FOOTER -->

    <!-- Modal tambah surat -->
    <div class="modal fade" id="tambahSurat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambah_surat" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_surat">Tambah Surat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required autocomplete="off">
                        </div>
                        <div class="mt-3">
                            <label for="no_surat" class="form-label">Nomor Surat</label>
                            <input type="text" name="no_surat" id="no_surat" class="form-control" required autocomplete="off">
                        </div>
                        <div class="mt-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" name="perihal" id="perihal" class="form-control" required autocomplete="off">
                        </div>
                        <div class="my-3">
                            <label for="file" class="form-label">File PDF</label>
                            <input type="file" name="file" id="file" class="form-control" required autocomplete="off">
                        </div>
                        <div class="modal-footer mt-1">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="tambah" >Tambah</button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>