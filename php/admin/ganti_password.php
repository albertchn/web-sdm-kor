<?php
$id = $_GET["id"];

if(!$id){
      header("Location: ../logout.php");    
} 

require '../functions.php';

if(isset($_POST["ubah"])){
    if(ubah_password($_POST, $id) > 0){
        echo "<script>
                alert('Password berhasil diubah!')
                // redirect versi javascript
                document.location.href = 'index.php';
          </script>";
    }
    echo "<script>
                alert('Password gagal diubah!')
                // redirect versi javascript
                document.location.href = 'index.php';
          </script>";
}