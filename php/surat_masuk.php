<?php

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="../img/Lambang_Korpolairud.svg">
    <title>SURAT MASUK</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container-xl">
            <a href="../index.php" class="navbar-brand align-items-center ">
                <img src="../img/Lambang_Korpolairud.svg" style="width:50px;height:50px">
                <h5 class="d-inline" style="font-weight: 700;">SDM KORPOLAIRUD</h5>
            </a>    

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
            aria-controls="main-nav" aria-expanded="false" aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center align-items-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="surat_masuk.php" class="nav-link active" style="font-weight: 600;">Surat Masuk</a>
                    </li>
                    <li class="navbar-item">
                        <a href="surat_keluar.php" class="nav-link" style="font-weight: 500;">Surat Keluar</a>
                    </li>
                    <li class="navbar-item mt-2">
                        <a href="" class="btn btn-info rounded d-md-none d-sm-block" style="font-weight: 500;">Keluar</a>
                    </li>
                </ul>
            </div>
            <a href="logout.php" class="btn btn-info rounded d-none d-md-block" style="font-size:14px">Keluar</a>
        </div>
    </nav>
    <!-- AKHIR NAVBAR -->
    
    <!-- SECTION -->
    <section>
        <div class="container-lg" id="=">
            <div class="row mt-4 mb-2">
                <div class="col-12">
                    <h1 class="text-center" style="font-weight: 600;">SURAT MASUK</h1>
                </div>
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-6">
                    <form action="" method="post" class="form-cari mt-3">
                        <input type="text" name="keyword" placeholder="Cari ...." autofocus autocomplete="off" class="keyword form-control mt-2" style="font-size: 13px;">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-8 col-md-6">
                    <botton class="btn btn-primary fw-bold mb-2" data-bs-toggle="modal" data-bs-target="#tambahSurat" style="font-size: 14px; width: 8.1rem">Tambah Surat</botton>
                </div>
            </div>
            <div class="row align-items-center mb-4">
                <div class="col-md-2">
                    <botton class="btn btn-danger fw-bold mb-2" style="font-size: 14px;width: 8.1rem">Hapus Surat</botton>
                </div>
                <div class="col-md-2">
                    <a href="" class="d-none d-md-inline pilsmua" style="margin: -50px;">Pilih Semua</a>
                </div>
                <div class="col-md-2">
                    <a href="" class="d-md-none d-sm-block pilsmua">Pilih Semua</a>
                </div>
            </div>

            <div class="table-responsive-sm">
                <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered table-hover text-center">
                    <thead class="table-light">
                        <th style="width:2rem"></th>
                        <th style="width:6rem">Tgl. Surat</th>
                        <th style="width:10rem">No. Surat</th>
                        <th style="width:23rem">Perihal</th>
                        <th style="width:5rem">File</th>
                        <th style="width:5rem">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="" style="vertical-align: middle; middle; min-width: 2rem"><input type="checkbox"></td>
                            <td style="vertical-align: middle; middle; min-width: 7rem">29-02-2022</td>
                            <td style="vertical-align: middle; middle; min-width: 10rem">B/ND-103/III/KEP/2022</td>
                            <td class="text-start" style="vertical-align: middle; min-width: 23rem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, fuga rem. Doloribus tenetur provident sint iure? Sunt sapiente eaque praesentium, dolor provident beatae asperiores suscipit! Sint vero ab accusamus laborum!</td>
                            <td style="vertical-align: middle; middle; min-width: 5rem">PDF</td>
                            <td class="" style="vertical-align: middle;">
                                <a href="edit.php?" class="btn btn-success mb-2" style="font-size:14px; width: 5rem">Edit</a>
                                <a href="hapus.php?" class="btn btn-danger" style="font-size:14px;  width: 5rem">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="" style="vertical-align: middle; middle; min-width: 2rem"><input type="checkbox"></td>
                            <td style="vertical-align: middle; middle; min-width: 7rem">29-02-2022</td>
                            <td style="vertical-align: middle; middle; min-width: 10rem">B/ND-103/III/KEP/2022</td>
                            <td class="text-start" style="vertical-align: middle; min-width: 23rem">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td style="vertical-align: middle; middle; min-width: 5rem">PDF</td>
                            <td class="" style="vertical-align: middle;">
                                <a href="edit.php?" class="btn btn-success mb-2" style="font-size:14px; width: 5rem">Edit</a>
                                <a href="hapus.php?" class="btn btn-danger" style="font-size:14px;  width: 5rem">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- AKHIR SECTION -->

    <!-- FOOTER -->
    <footer class="bg-light" style="margin-top: 10rem">
        <div class="container-fluid">
            <p class="text-center p-3">Created by Albert Christian D & Dennis Montero P</p>
        </div>
    </footer>
    <!-- AKHIR FOOTER -->

    <!-- Modal -->
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
                            <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required>
                        </div>
                        <div class="mt-3">
                            <label for="no_surat" class="form-label">Nomor Surat</label>
                            <input type="text" name="no_surat" id="no_surat" class="form-control" required>
                        </div>
                        <div class="mt-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" name="perihal" id="perihal" class="form-control" required>
                        </div>
                        <div class="my-3">
                            <label for="pdf" class="form-label">File PDF</label>
                            <input type="file" name="pdf" id="pdf" class="form-control" required>
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

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>