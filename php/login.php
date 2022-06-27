<?php
session_start();

require 'functions.php';



if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1) {
        $data = mysqli_fetch_assoc($result);

        if( $password === $data["password"]) {
            if($data["status"] === "anggota") {
                $_SESSION["login"] = true;
                $_SESSION["anggota"] = true;
                $_SESSION["start"] = time();
                $_SESSION["ky"] = $data["id_user"];
                header('Location: ../index.php');
            } 
            else {
                $_SESSION["login"] = true;
                $_SESSION["ky"] = $data["id_user"];
                $_SESSION["start"] = time();
                header('Location: admin/index.php');
            }
        }
        else {
            echo(mysqli_error($conn));
            $invalid_password = true;
        }
    }
    else {
        echo mysqli_error($conn);
        $invalid_username = true;
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
    <!-- css -->
    <link rel="stylesheet" href="../css/login.css">
    
    <!-- TITLE -->
    <link rel="shortcut icon" href="img/Lambang_Korpolairud.svg">
    <title>LOGIN</title>
</head>
<body>
    <section class="vh-100">
        <div class="container py-4 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-black" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <div class="mb-md-5 mt-md-4">
                                <div class="img text-center">
                                    <img class="mb-2" src="../img/Lambang_Korpolairud.svg" alt="lamabang korpolairud" width="100px">
                                    <h2 class="fw-bold text-uppercase">L O G I N</h2>
                                </div>
                                <?php if(isset($invalid_password)) :?>
                                    <p style="color:red; font-style: italic;">Password salah</p>
                                <?php endif; ?>
                                <?php if(isset($invalid_username)) :?>
                                    <p style="color:red; font-style: italic;">Username salah</p>
                                <?php endif; ?>
                                <form action="" method="post">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="username"><b>NRP</b></label>
                                        <input type="number" id="username" name="username" class="form-control form-control-lg" required autocomplete="off" autofocus style="font-size:16px;" placeholder="harus angka...">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="password"><b>Password</b></label>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" required autocomplete="off" style="font-size:16px;"placeholder="jangan lupa yaa...">
                                    </div>
                                    <div class="button text-center">
                                        <button class="btn btn-outline-light btn-primary mx-2 px-5" type="submit" style="border-radius: 10px;" name="login">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>