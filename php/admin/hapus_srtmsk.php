<?php 
require '../functions.php';

if(!isset($_GET["id"])){
    header("Location: surat_masuk.php");
}

$id = $_GET["id"];

if(hapus_srtmsk($id) > 0) {
    echo "<script>
                // alert('Surat berhasil dihapus!')
                // redirect versi javascript
                document.location.href = 'surat_masuk.php';
          </script>";
}
echo "<script>
        // alert('Surat berhasil dihapus!')
        // redirect versi javascript
        document.location.href = 'surat_masuk.php';
      </script>";