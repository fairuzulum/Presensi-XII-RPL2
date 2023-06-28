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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Siswa</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

    <div style="margin-top: 10px;" class="container" data-aos="fade-up">
        <div class="main-body">


            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>


            <div style="margin-top: 20px;" class="container">
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-body row">
                                <div class="col-6">
                                    <?php
                                    if (empty($_SESSION['profile'])) {
                                        //jika isi nama foto sama dengan default_foto.jpg maka rubah arah src img
                                        echo "<img src='images/blankpp.png' class='img-fluid rounded-circle w-60'>";
                                    } else {
                                        echo "<img class='img-fluid rounded-circle w-60' src='../../assets/profile/" . $_SESSION['profile'] . "'/>";
                                    }
                                    ?>

                                    <a href=""></a>
                                </div>
                                <div class="col-6 card-title align-self-center mb-0">
                                    <h5><?= $_SESSION['nama_siswa']; ?></h5>
                                    <p class="m-0"><?= $_SESSION['nis']; ?></p>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Kelas : <?= $_SESSION['Kelas']; ?></li>
                                <li class="list-group-item">Jurusan : <?= $_SESSION['jurusan']; ?></li>
                                <li class="list-group-item">Gender : <?= $_SESSION['gender']; ?></li>
                            </ul>
                            <div class="card-body">


                                <div class="container" data-aos="fade-up">

                                    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
                                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                            <div class="portfolio-img">
                                                <center>
                                                    <a href="../../assets/gbrqrcode/<?= $_SESSION['gbrqrcode']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= $_SESSION['nama_siswa']; ?>"><img src="../../assets/gbrqrcode/<?= $_SESSION['gbrqrcode']; ?>" class="img-fluid" alt="" /> </a>
                                                    <a class="btn btn-outline-primary btn-sm" href="../../assets/gbrqrcode/<?= $_SESSION['gbrqrcode']; ?>" download="QRCode.jpg"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download</a>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>