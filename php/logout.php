<?php
session_start();

// memberhetntikan session agar balik ke halaman login
$_SESSION = [];
session_unset();
session_destroy();

// menghapus cookie
// valuenya dikosongkan dan waktunya dibuat -
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header('Location: login.php');
exit;
?>