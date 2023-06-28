<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "
    <script>
    alert('Anda harus login dahulu!');
    document.location.href = '../../login/siswa.php';
    </script>
    ";

    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Izin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Izin</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <form action="../../function/izin.php" method="POST" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td>NIS</td>
                                <td><input type="text" onkeyup="isi_otomatis()" name="nis" id="nis" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>NAMA</td>
                                <td><input type="text" name="nama" id="nama" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td><input type="text" name="kelas" id="kelas" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td><input type="text" name="jurusan" id="jurusan" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" name="keterangan">
                                            <option selected>Pilih</option>
                                            <option value="Izin">Izin</option>
                                            <option value="Sakit">Sakit</option>
                                        </select>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>Bukti</td>
                                <td>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="gambar">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" name="izin" class="btn btn-primary" value="Kirim">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        function isi_otomatis() {
            var nis = $("#nis").val();
            $.ajax({
                url: '../../function/autofill.php',
                data: "nis=" + nis,
            }).success(function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#nama').val(obj.nama);
                $('#kelas').val(obj.kelas);
                $('#jurusan').val(obj.jurusan);
            });
        }
    </script>
</body>

</html>