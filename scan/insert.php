<?php

require_once "../koneksi.php";

$text = $_POST['text'];
$waktu_sekarang = time(); // Mendapatkan waktu sekarang dalam format timestamp
$batas_waktu_absen = strtotime("08:00:00"); // Batas waktu absen adalah pukul 08:00:00

$sql = "SELECT * FROM kehadiran WHERE nis='$text' AND status='Terlambat' AND tgl= DATE(NOW()) AND TIME(NOW()) BETWEEN '01:00:00' AND '23:00:00' AND DATE(NOW())";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
    $sql = "UPDATE kehadiran set timeout=NOW(), status='Terlambat', hadir='1', terlambat='1' WHERE nis='$text' AND tgl= DATE(NOW())";
    $query = $conn->query($sql);
    echo "
            <script>
             alert ('Absen Pulang Berhasil');
             document.location.href = 'index.php';
            </script>
            ";
} else {
    $cek = "SELECT COUNT(*) as jumlah FROM kehadiran WHERE nis= '$text' AND DATE(tgl) = CURDATE()";
    $result = mysqli_query($conn, $cek);
    
    // Cek hasil query
    if (mysqli_num_rows($result) > 0) {
        // Ambil data
        $data = mysqli_fetch_assoc($result);
        $jumlah = $data['jumlah'];
    
        // Cek apakah siswa sudah absen hari ini
        if ($jumlah > 0) {
            echo "
            <script>
             alert ('Siswa Sudah Absen Hari ini');
             document.location.href = 'index.php';
            </script>
            ";
        } else {
            if ($waktu_sekarang > $batas_waktu_absen) {
                $query = "INSERT INTO kehadiran(nis,tgl,timein,status) VALUES('$text',NOW(),NOW(),'Terlambat')";
                mysqli_query($conn, $query);
                echo "
                    <script>
                     alert ('Siswa Terlambat');
                     document.location.href = 'index.php';
                    </script>
                    ";
            } else {
                $query = "INSERT INTO kehadiran(nis,tgl,timein,status) VALUES('$text',NOW(),NOW(),'Terlambat')";
                mysqli_query($conn, $query);
                echo "
                        <script>
                         alert ('Siswa Terlambat');
                         document.location.href = 'index.php';
                        </script>
                        ";
            }
          
        }
    }
}
mysqli_close($conn);
