<?php
session_start();


include "../koneksi.php";


//variabel nim yang dikirimkan form.php
$nis = $_GET['nis'];

//mengambil data
$query = mysqli_query($conn, "SELECT * FROM tbsiswa WHERE nis='$nis'");
$siswa = mysqli_fetch_array($query);
$data = array(
            'nama'      =>  @$siswa['nama_siswa'],
            'kelas'      =>  @$siswa['Kelas'],
            'jurusan'   =>  @$siswa['jurusan'],);


//tampil data
echo json_encode($data);
?>