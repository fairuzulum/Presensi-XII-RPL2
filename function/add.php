<?php

include '../koneksi.php';
require_once('phpqrcode/qrlib.php');

$FolderTemp = 'gbrqrcode';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$username = $_POST['username'];
$pass = $_POST['password'];
$n = $nis;
$gbrqrcode = $nis . ".png";
QRcode::png("$n", $gbrqrcode, "H", 6);

$sql = $conn->query("INSERT INTO tbsiswa (nis,nama_siswa,gender,Kelas,jurusan,gbrqrcode,username,password) VALUES ('$nis','$nama','$gender','$kelas','$jurusan','$gbrqrcode','$username','$pass')");



if ($sql) {
    $url = $gbrqrcode;
    $img = '../assets/gbrqrcode/'.$gbrqrcode;
    file_put_contents($img, file_get_contents($url));
    header("location: ../page/admin/inputsiswa.php");
} else {
    echo "Error";
    die($conn->error);
}


?>

<img src="kode<?= $n ?>.png" alt="">


