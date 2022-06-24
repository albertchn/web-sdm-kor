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

    <!-- card -->
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">L O G I N</h1>
                <?php if(isset($invalid_password)) :?>
                    <p>Password salah</p>
                <?php endif; ?>
                <?php if(isset($invalid_username)) :?>
                    <p>Username salah</p>
                <?php endif; ?>
            </div>
            <div class="card-text">
                <form method="POST">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="number" class="form-control" id="username" name="username" autofocus autocomplete="off" required>
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                    </div>
                    <div class="d-grid ">
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- card selesai -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>