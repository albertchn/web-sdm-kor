<?php 
require '../functions.php';

if(!isset($_GET["id"])){
    header("Location: surat_masuk.php");
}

$id = $_GET["id"];

if(hapus_anggota($id) > 0) {
    echo "<script>
                // alert('Anggota berhasil dihapus!')
                // redirect versi javascript
                document.location.href = 'anggota.php';
          </script>";
}
echo "<script>
        // alert('Anggota berhasil dihapus!')
        // redirect versi javascript
        document.location.href = 'anggota.php';
      </script>";