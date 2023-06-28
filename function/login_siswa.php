<?php


session_start();

include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM tbsiswa WHERE username='".$username."' AND password='".$password."' limit 1");
$cek = mysqli_num_rows($sql);

if($cek>0){
    $row = mysqli_fetch_assoc($sql);

    $_SESSION['nis'] = $row['nis'];
    $_SESSION['nama_siswa'] = $row['nama_siswa'];
    $_SESSION['gender'] = $row['gender'];
    $_SESSION['Kelas'] = $row['Kelas'];
    $_SESSION['jurusan'] = $row['jurusan'];
    $_SESSION['gbrqrcode'] = $row['gbrqrcode'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['profile'] = $row['profile'];

    header("Location: ../page/siswa/index.php");

}else{
    echo"
    <script>
    alert('Username atau Password Salah');
    document.location.href = '../login/siswa.php';
    </script>
    ";
}




?>