<?php 
// connection to database
$conn = mysqli_connect("localhost", "root", "", "sdmkor");

// basic query convert to array
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah_srtmsk($data) {
    global $conn;
    $no_surat = htmlspecialchars($data["no_surat"]);
    $tgl_surat = htmlspecialchars($data["tgl_surat"]);
    $perihal = htmlspecialchars($data["perihal"]);
    $terima_dari = htmlspecialchars($data["terima_dari"]);
    $kepada = htmlspecialchars($data["kepada"]);
    $jenis_srt = 'masuk';
    $file = upload($jenis_srt);

    if(!$file) return false;

    mysqli_query($conn, "INSERT INTO surat_masuk (no_surat, terima_dari, tgl_surat, perihal, kepada, file) VALUES ('$no_surat','$terima_dari', '$tgl_surat', '$perihal', '$kepada', '$file')");

    return mysqli_affected_rows($conn);
}

function tambah_srtklr($data) {
    global $conn;
    $no_surat = htmlspecialchars($data["no_surat"]);
    $tgl_surat = htmlspecialchars($data["tgl_surat"]);
    $perihal = htmlspecialchars($data["perihal"]);
    $jenis_srt = 'keluar';
    $file = upload($jenis_srt);

    if(!$file) return false;

    mysqli_query($conn, "INSERT INTO surat_keluar (no_surat, tgl_surat, perihal, file) VALUES ('$no_surat', '$tgl_surat', '$perihal', '$file')");

    return mysqli_affected_rows($conn);
}

function tambah_anggota($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $status = htmlspecialchars($data["status"]);

    $username = mysqli_query($conn, "SELECT status FROM user WHERE username = $nrp");
    if(mysqli_num_rows($username) > 0) {
        echo "<script>
                alert('Username sudah terdaftar!')
                document.location.href = 'anggota.php';
              </script> ";
        return false;
    }

    mysqli_query($conn, "INSERT INTO user (nama, username, password, status) VALUES ('$nama', '$nrp', '$nrp', '$status')");

    return mysqli_affected_rows($conn);
}

function hapus_srtmsk($id){
    global $conn;
    $id_surat = $id;

    mysqli_query($conn, "DELETE FROM surat_masuk WHERE id_surat = $id_surat");

    return mysqli_affected_rows($conn);
}

function hapus_srtklr($id){
    global $conn;
    $id_surat = $id;

    mysqli_query($conn, "DELETE FROM surat_keluar WHERE id_surat = $id_surat");

    return mysqli_affected_rows($conn);
}

function hapus_anggota($id){
    global $conn;
    $id_user = $id;

    mysqli_query($conn, "DELETE FROM user WHERE id_user = $id_user");

    return mysqli_affected_rows($conn);
}

function ubah_srtmsk($data, $id) {
    global $conn;
    $no_surat = htmlspecialchars($data["no_surat"]);
    $tgl_surat = htmlspecialchars($data["tgl_surat"]);
    $perihal = htmlspecialchars($data["perihal"]);
    $kepada = htmlspecialchars($data["kepada"]);
    $jenis_srt = 'masuk';

    $fileLama = $data["fileLama"];

    if($_FILES["file"]["error"] === 4){
        $file = $fileLama;
    } else {
        $file = upload($jenis_srt);
    }

    mysqli_query($conn, 
                "UPDATE surat_masuk SET 
                 no_surat = '$no_surat',
                 tgl_surat = '$tgl_surat',
                 perihal = '$perihal',
                 kepada = '$kepada',
                 file = '$file'
                 WHERE id_surat = $id
                ");

    return mysqli_affected_rows($conn);
}

function ubah_srtklr($data, $id) {
    global $conn;
    $no_surat = htmlspecialchars($data["no_surat"]);
    $tgl_surat = htmlspecialchars($data["tgl_surat"]);
    $perihal = htmlspecialchars($data["perihal"]);
    $jenis_srt = 'keluar';

    $fileLama = $data["fileLama"];

    if($_FILES["file"]["error"] === 4){
        $file = $fileLama;
    } else {
        $file = upload($jenis_srt);
    }

    mysqli_query($conn, 
                "UPDATE surat_keluar SET 
                 no_surat = '$no_surat',
                 tgl_surat = '$tgl_surat',
                 perihal = '$perihal',
                 file = '$file'
                 WHERE id_surat = $id
                ");

    return mysqli_affected_rows($conn);
}

function ubah_anggota($data, $id) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["nrp"]);
    $status = htmlspecialchars($data["status"]);

    mysqli_query($conn, 
                "UPDATE user SET 
                 nama = '$nama',
                 username = '$username',
                 status = '$status'
                 WHERE id_user = $id
                ");

    return mysqli_affected_rows($conn);
}

function ubah_password($data, $id){
    global $conn;
    $passLama = htmlspecialchars($data["pw_lama"]);
    $passBaru = htmlspecialchars($data["pw_baru"]);
    $konPassBaru = htmlspecialchars($data["kon_pw_baru"]);

    $pw_lama = mysqli_query($conn, "SELECT `password` FROM user WHERE id_user = $id")->fetch_assoc();
    if($passLama === $pw_lama["password"]) {
        if($passBaru === $konPassBaru){
            mysqli_query($conn, "UPDATE user SET `password` = '$passBaru' WHERE id_user = $id");
        } else {
            echo "<script>
                  alert('Konfirmasi password baru berbeda!');
                  </script>";
                return false;
        }
    } else{
        echo "<script>
                alert('Password lama salah!');
              </script>";
                 return false;
    }
    
    return mysqli_affected_rows($conn);
}

function ubah_status($id){
    global $conn;

    mysqli_query($conn, "UPDATE user SET `status` = 'admin' WHERE id_user = $id");

    return mysqli_affected_rows($conn);
}

function ubah_judul($data) {
    global $conn;
    $judul_index = htmlspecialchars($data["judul_index"]);
    $id = $data["id_judul"];

    mysqli_query($conn, "UPDATE komponen SET isi_komponen = '$judul_index' WHERE id_komponen = $id");
    
    return mysqli_affected_rows($conn);
}

function ubah_desk($data) {
    global $conn;
    $desk_index = htmlspecialchars($data["desk_index"]);
    $id = $data["id_desk"];

    mysqli_query($conn, "UPDATE komponen SET isi_komponen = '$desk_index' WHERE id_komponen = $id");
    
    return mysqli_affected_rows($conn);
}

function ubah_folder_srtmsk($data) {
    global $conn;
    $folder_srtmsk = htmlspecialchars($data["folder_srtmsk"]);
    $id = $data["id_folder_srtmsk"];

    mysqli_query($conn, "UPDATE komponen SET isi_komponen = '$folder_srtmsk' WHERE id_komponen = $id");
    
    return mysqli_affected_rows($conn);
}

function ubah_folder_srtklr($data) {
    global $conn;
    $folder_srtklr = htmlspecialchars($data["folder_srtklr"]);
    $id = $data["id_folder_srtklr"];

    mysqli_query($conn, "UPDATE komponen SET isi_komponen = '$folder_srtklr' WHERE id_komponen = $id");
    
    return mysqli_affected_rows($conn);
}

function ubah_judul_srtmsk($data) {
    global $conn;
    $judul_srtmsk = htmlspecialchars($data["judul_srtmsk"]);
    $id = $data["id_judul"];

    mysqli_query($conn, "UPDATE komponen SET isi_komponen = '$judul_srtmsk' WHERE id_komponen = $id");
    
    return mysqli_affected_rows($conn);
}

function ubah_judul_srtklr($data) {
    global $conn;
    $judul_srtklr = htmlspecialchars($data["judul_srtklr"]);
    $id = $data["id_judul"];

    mysqli_query($conn, "UPDATE komponen SET isi_komponen = '$judul_srtklr' WHERE id_komponen = $id");
    
    return mysqli_affected_rows($conn);
}

function ubah_judul_anggota($data) {
    global $conn;
    $judul_anggota = htmlspecialchars($data["judul_anggota"]);
    $id = $data["id_judul"];

    mysqli_query($conn, "UPDATE komponen SET isi_komponen = '$judul_anggota' WHERE id_komponen = $id");
    
    return mysqli_affected_rows($conn);
}

function ubah_footer($data) {
    global $conn;
    $footer = htmlspecialchars($data["footer"]);
    $id = $data["id"];

    mysqli_query($conn, "UPDATE komponen SET isi_komponen = '$footer' WHERE id_komponen = $id");
    
    return mysqli_affected_rows($conn);
}

function ubah_foto($data) {
    global $conn;
    // var_dump($data);exit;
    if(!empty($data["foto"]["name"][0])) {
        $result = [];
        for($i=0; $i < count($data["foto"]["name"]); $i++) {
            $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
            $ekstensiFoto = explode(".", $_FILES["foto"]["name"][$i]);
            $ekstensiFoto = strtolower(end($ekstensiFoto));
            if ( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
                echo "<script>
                        alert('Ekstensi Foto dilarang!');
                        </script>";
            return false; // agar fungsi tambah tidak dijalankan
            }
            move_uploaded_file($_FILES["foto"]["tmp_name"][$i], '../../img/' . $_FILES["foto"]["name"][$i]);
            $namaFoto[] = $_FILES['foto']['name'][$i];
        }
        $foto = implode(",", $namaFoto);

        mysqli_query($conn, "UPDATE komponen SET isi_komponen = '$foto' WHERE nama_komponen = 'foto_index'");

    }

    return mysqli_affected_rows($conn);
}

function upload($jenis_srt) {
    
    $namaFile = $_FILES["file"]["name"];
    $ukuranFile = $_FILES["file"]["size"];
    $error = $_FILES["file"]["error"];
    $tmpName = $_FILES["file"]["tmp_name"];

    // cek apakah gambar diupload atau tidak
    if ( $error === 4 ) {
        echo "<script>
              alert('File wajib ada!');
              </script>";
        return false; // agar fungsi tambah tidak dijalankan
    }

    // cek apakah yang diupload gambar
    $ekstensiFileValid = ['pdf', 'docx', 'doc'];
    // mengambil ekstensi pada file yg diupload
    // fungsi explode(delimeter, string) untuk memecah string menjadi array
    // delimeter maksudnya adalah ketika ketemu huruf/tanda/sumbil yang ditentukan maka string tersebut akan dipecah setelahnya
    // parameter string adalah kalimatnya
    $ekstensiFile = explode(".", $namaFile);
    // setelah dipecah variabel $ekstensiGambar ditimpa lagi untuk mengambil belakangnya saja dan paksa menjadi lowercase
    $ekstensiFile = strtolower(end($ekstensiFile));
    // mengecek di dalam name filenya
    // fungsi in_array untuk mencari suatu kata di dalam array yang akan menghasilkan false jika tidak ada dan true jika ada
    if ( !in_array($ekstensiFile, $ekstensiFileValid) ) {
        echo "<script>
              alert('Ekstensi file dilarang!');
              </script>";
        return false; // agar fungsi tambah tidak dijalankan
    }

    // cek ukuran file
    if ( $ukuranFile > 10000000 ) {
        echo "<script>
              alert('Ukuran file terlalu besar!');
              </script>";
        return false; // agar fungsi tambah tidak dijalankan
    }

    // menggunakan fungsi move_uploaded_file(tempat penyimpanan, destinasi pemindahannya)
    // destinasinya relatif terhadap file functions ini
    if($jenis_srt == 'masuk') {
        move_uploaded_file($tmpName, '../../fileSuratMasuk/' . $namaFile);
    } else {
        move_uploaded_file($tmpName, '../../fileSuratKeluar/' . $namaFile);
    }

    // mengembalikan nama filenya untuk ditamngkap $gambar di function tambah() agar namanya disimpan di database
    return $namaFile;
}