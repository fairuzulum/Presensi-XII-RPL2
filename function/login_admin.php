<?php


session_start();

include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."' limit 1");
$cek = mysqli_num_rows($sql);

if($cek>0){
    $row = mysqli_fetch_assoc($sql);

    $_SESSION['nama'] = $row['nama'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    header("Location: ../page/admin/index.php");

}else{
    echo"
    <script>
    alert('Username atau Password Salah');
    document.location.href = '../login/admin.php';
    </script>
    ";
}




?>