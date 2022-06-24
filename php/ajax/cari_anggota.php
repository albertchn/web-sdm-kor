<?php
require '../functions.php';

$jmlh_anggota = query("SELECT * FROM user");

$batas = 10;
$halaman = isset($_GET["halaman"])?(int)$_GET["halaman"] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

if(isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM user WHERE
              nama LIKE '%$keyword%' OR
              username LIKE '%$keyword%' OR
              status LIKE '%$keyword%' ORDER BY nama LIMIT $halaman_awal, $batas
            ";
    
    $data_anggota = query($query);

}

if(empty($_GET["keyword"])) {
    $jumlah_data = count($jmlh_anggota);
} else {
    $jumlah_data = count($data_anggota);

}

$total_halaman = ceil($jumlah_data/$batas);

$nomor = $halaman_awal+1;

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="../../img/Lambang_Korpolairud.svg">
    <title>Surat Masuk</title>
</head>
<body>
    <div class="table-responsive-lg mt-4" id="container_anggota">
        <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered text-center">
            <thead class="table-light">
                <th class="" style="min-width: 2rem">No.</th>
                <th style="min-width: 15rem">Nama</th>
                <th style="min-width: 7rem">NRP</th>
                <th style="min-width: 7rem">Status</th>
                <th style="min-width: 2rem"></th>
            </thead>
            <tbody>
            <?php foreach($data_anggota as $data) : ?>
                <tr>
                    <td class="" style="min-width: 2rem"><?= $nomor++; ?></td>
                    <td class="text-start" style="min-width: 15rem"><?= $data["nama"]; ?></td>
                    <td style="min-width: 7rem"><?= $data["username"]; ?></td>
                    <td style="min-width: 7rem"><?= $data["status"]; ?></td>
                    <td class="dropdown" style="min-width: 2rem">
                        <a class="text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a href="" class="dropdown-item">Edit</a>
                                <a href="hapus_anggota.php?id=<?= $data['id_user']; ?>" class="dropdown-item" onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
                                <a href="ubahstatus.php?id=<?= $data["id_user"]; ?>" class="dropdown-item" onclick="return confirm('Jadikan admin?')">Jadikan Admin</a>
                            </li>
                        </ul>
                    </td>
                    </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <nav>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>