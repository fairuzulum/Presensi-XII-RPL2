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
    <title>Riwayat absensi</title>
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="background-color: #f3f5fa;">
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 14px;">
                                    HADIR</div>
                                <?php
                                include "../../koneksi.php";
                                $nis = $_SESSION['username'];
                                $query = "SELECT COUNT(*) FROM kehadiran WHERE nis = $nis AND hadir = '1'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $count = $row['COUNT(*)'];
                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $count; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 14px;">
                                    SAKIT</div>
                                    <?php
                                include "../../koneksi.php";
                                $nis = $_SESSION['username'];
                                $query = "SELECT COUNT(*) FROM kehadiran WHERE nis = $nis AND sakit = '1'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $count = $row['COUNT(*)'];
                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $count; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 14px;">
                                    IZIN</div>
                                    <?php
                                include "../../koneksi.php";
                                $nis = $_SESSION['username'];
                                $query = "SELECT COUNT(*) FROM kehadiran WHERE nis = $nis AND izin = '1'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $count = $row['COUNT(*)'];
                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $count; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="why-us" class="why-us section-bg" style="margin-top: -20px;">
        <div class="container-fluid" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch order-2 order-lg-1">



                    <h2>Riwayat Absensi Siswa</h2>


                    <div class="accordion-list">
                        <ul>
                            <?php
                            $nis = $_SESSION['username'];
                            include '../../koneksi.php';
                            $data = mysqli_query($conn,  "SELECT*FROM kehadiran  WHERE nis=$nis");
                            $no = 1;
                            while ($a = mysqli_fetch_array($data)) {
                                $tgl = date('j F Y', strtotime($a['tgl']));
                            ?>
                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-<?= $no; ?>" class="collapsed">
                                        <?= $tgl; ?>
                                        <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-<?= $no; ?>" class="collapse" data-bs-parent=".accordion-list">
                                        <label for="exampleFormControlInput1" class="form-label">Jam Masuk</label>
                                        <input class="form-control" type="text" value="<?= $a['timein']; ?>" aria-label="Disabled input example" disabled readonly>
                                        <label for="exampleFormControlInput1" class="form-label">Jam Pulang</label>
                                        <input class="form-control" type="text" value="<?= $a['timeout']; ?>" aria-label="Disabled input example" disabled readonly>
                                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                                        <input class="form-control" type="text" value="<?= $a['status']; ?>" aria-label="Disabled input example" disabled readonly>
                                    </div>
                                </li>
                            <?php $no++;
                            } ?>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </section>







    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>