<?php
session_start();

if(!isset($_SESSION["login"])) [
    header('Location: php/login.php')
];

if(!isset($_SESSION["anggota"])){
    header("Location: php/admin/index.php");
}

if(isset($_SESSION["start"]) && (time() - $_SESSION["start"] > 600)) {
    session_unset();
    session_destroy();
    header("Location: php/login.php");
}

require "php/functions.php";

$judul = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'judul_index'")->fetch_assoc();
$desk_index = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'deskripsi_index'")->fetch_assoc();
$folder_srtmsk = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'folder_srtmsk'")->fetch_assoc();
$folder_srtklr = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'folder_srtklr'")->fetch_assoc();
$foto_index = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'foto_index'")->fetch_assoc();
$footer = mysqli_query($conn, "SELECT * FROM komponen WHERE nama_komponen = 'footer'")->fetch_assoc();


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- icon bs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="img/Lambang_Korpolairud.svg">
    <title>SDM KORPOLAIRUD</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container-xl">
            <a href="index.php" class="navbar-brand align-items-center ">
                <img src="img/Lambang_Korpolairud.svg" style="width:50px;height:50px">
                <h5 class="d-inline" style="font-weight: 700;">SDM KORPOLAIRUD</h5>
            </a>    

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
            aria-controls="main-nav" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-items-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="php/anggota/surat_masuk.php" class="nav-link" style="font-weight: 500;">Surat Masuk</a>
                    </li>
                    <li class="navbar-item">
                        <a href="php/anggota/surat_keluar.php" class="nav-link" style="font-weight: 500;margin-right: 250px;">Surat Keluar</a>
                    </li>
                    <li class="navbar-item mt-2">
                        <a href="php/logout.php" class="btn btn-info rounded d-lg-none d-md-block" style="font-size:14px; font-weight: 500;" onclick="return confirm('Lanjutkan keluar?')">Keluar</a>
                    </li>
                    <li class="navbar-item">
                        <a href="php/logout.php" class="btn btn-info rounded d-none d-md-block" style="width: 4.5rem;font-size:14px; font-weight: 500;" onclick="return confirm('Lanjutkan keluar?')">Keluar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-md-none">Menu</span><i class="bi bi-three-dots-vertical"></i>
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

    <!-- INTRO -->
    <section class="mt-5" style="">
        <div class="container-lg">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="row g-1 align-items-start">
                        <div class="col-7 col-lg-8">
                            <h1 class="" style="font-weight: 800;"><?= $judul["isi_komponen"]; ?></h1>
                        </div>
                    </div>
                    <p class="my-4"><?= $desk_index["isi_komponen"]; ?></p>
                    <div class="row">
                        <div class="col">
                            <a class="" href="" style="color:black"><?= $folder_srtmsk["isi_komponen"]; ?></a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <a class="" href="" style="color:black"><?= $folder_srtklr["isi_komponen"]; ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div id="mycarousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false" data-bs-touch="false">
                        <div class="carousel-inner rounded mt-2">
                            <?php $foto = explode(',',$foto_index["isi_komponen"]); ?>
                            <?php if(!empty($foto[0])) { ?>
                            <div class="carousel-item active">
                                <img src="img/<?= $foto[0]; ?>" class="d-block w-100" style="height: 380px;">
                            </div>
                            <?php }; ?>
                            <?php if(!empty($foto[1])) { ?>
                            <div class="carousel-item">
                                <img src="img/<?= $foto[1]; ?>" class="d-block w-100" style="height: 380px;">
                            </div>
                            <?php }; ?><?php if(!empty($foto[2])) { ?>
                            <div class="carousel-item">
                                <img src="img/<?= $foto[2]; ?>" class="d-block w-100" style="height: 380px;">
                            </div>
                            <?php }; ?><?php if(!empty($foto[3])) { ?>
                            <div class="carousel-item">
                                <img src="img/<?= $foto[3]; ?>" class="d-block w-100" style="height: 380px;">
                            </div>
                            <?php }; ?><?php if(!empty($foto[4])) { ?>
                            <div class="carousel-item">
                                <img src="img/<?= $foto[4]; ?>" class="d-block w-100" style="height: 380px;">
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
            <p class="text-center"><?= $footer['isi_komponen']; ?></p>
        </div>
    </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>