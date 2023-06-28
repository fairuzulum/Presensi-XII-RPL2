<?php

require_once "../koneksi.php";


if (isset($_POST['izin'])) {


    $nis = $_POST['nis'];
    $keterangan = $_POST['keterangan'];

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $ekstensi_diperbolehkan    = array('png', 'jpg', 'jepg');
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];

        if (!empty($gambar)) {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

                //Mengupload gambar
                move_uploaded_file($file_tmp, 'bukti/' . $gambar);

                

                if ($keterangan == "Sakit") {
                    $conn->query("INSERT INTO kehadiran(nis,tgl,status,bukti,sakit) VALUES('$nis',NOW(),'$keterangan','$gambar','1')");
                    echo "
                    <script>
                    alert ('Form Terkirim');
                    document.location.href = '../page/siswa/form.php';
                    </script>
                    ";
                } else {
                    $conn->query("INSERT INTO kehadiran(nis,tgl,status,bukti,izin) VALUES('$nis',NOW(),'$keterangan','$gambar','1')");
                    echo "
                    <script>
                    alert ('Form Terkirim');
                    document.location.href = '../page/siswa/form.php';
                    </script>
                    ";
                }
            }
        } else {
            $gambar = "bank_default.png";
        }
    }
}
