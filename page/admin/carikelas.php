<?php
include "filter/koneksi.php"; //Include file koneksi
$searchTerm = $_GET['term']; // Menerima kiriman data dari inputan pengguna

$sql="SELECT * FROM tbsiswa WHERE Kelas LIKE '%".$searchTerm."%' ORDER BY nama_siswa ASC"; // query sql untuk menampilkan data mahasiswa dengan operator LIKE

$hasil=mysqli_query($conn,$sql); //Query dieksekusi

//Disajikan dengan menggunakan perulangan
while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['Kelas'];
}
//Nilainya disimpan dalam bentuk json
echo json_encode($data);
?>