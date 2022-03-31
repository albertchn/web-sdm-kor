<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="img/Lambang_Korpolairud.svg">
    <title>SDM KORPOLAIRUD</title>
    <style>
        body{
            height: 400px;
        }
    </style>
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

            <div class="collapse navbar-collapse justify-content-center align-items-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="php/surat_masuk.php" class="nav-link" style="font-weight: 500;">Surat Masuk</a>
                    </li>
                    <li class="navbar-item">
                        <a href="php/surat_keluar.php" class="nav-link" style="font-weight: 500;">Surat Keluar</a>
                    </li>
                    <li class="navbar-item mt-2">
                        <a href="" class="btn btn-info rounded d-md-none d-sm-block" style="font-size:14px; font-weight: 500;">Keluar</a>
                    </li>
                </ul>
            </div>
            <a href="logout.php" class="btn btn-info rounded d-none d-md-block" style="font-size:14px; font-weight: 500;">Keluar</a>
        </div>
    </nav>
    <!-- AKHIR NAVBAR -->

    <!-- INTRO -->
    <section class="mt-md-5">
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="mt-3 mt-md-5" style="font-weight: 800;">Selamat Datang!</h1>
                    <p class="my-4" >Mari jaga keamanan hati ketika dimintai dokumen-dokumen lama. Back up dokumen adalah cara terbaik demi menjaga keamanan hati dan pikiran jangka panjang!</p>
                    <a class="" href="" style="color:black">Folder Surat Masuk</a>
                    <a class="mt-2 d-block" href="" style="color:black">Folder Surat Masuk</a>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div id="mycarousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false" data-bs-touch="false">
                        <div class="carousel-inner rounded">
                            <div class="carousel-item active mt-2">
                                <img src="img/3.jpeg" class="d-block w-100" style="height: 380px;">
                            </div>
                            <div class="carousel-item">
                                <img src="img/1.jpeg" class="d-block w-100" style="height: 380px;">
                            </div>
                            <div class="carousel-item">
                                <img src="img/2.jpeg" class="d-block w-100" style="height: 380px;">
                            </div>
                            <div class="carousel-item">
                                <img src="img/4.jpeg" class="d-block w-100" style="height: 380px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- AKHIR INTRO -->
    
    <!-- FOOTER -->
    <footer class="border-top bg-light" style="margin-top: 175px">
        <div class="container-xl">
            <p class="p-3 text-center">Created by Albert Christian D & Dennis Montero Pankratov</p>
        </div>
    </footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>