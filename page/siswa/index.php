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
<html>

<head>
    <meta charset="utf-8">
    <title>Halaman Siswa</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">


</head>

<body>
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
            <li class="breadcrumb-item"><a href="profile.php">Profile</a</li>
            <li class="breadcrumb-item"><a href="riwayat.php">Riwayat</a</li>
            <li class="breadcrumb-item"><a href="akun.php">Akun</a</li>
        </ol>
        
    </nav>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a style="margin: 5px;" class="btn btn-outline-primary btn-sm" aria-current="page" href="logout.php">Logout &nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </li>
    </ul>
    <section id="slider" class="pt-5">
        <div class="container" style="margin-top: 20px;">
            <div class="slider">
                <div class="owl-carousel">
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="images/profile.jpg" alt="">
                        </div>

                        <a style="margin: 20px;" href="profile.php" class="btn btn-outline-primary">Profile <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                    </div>
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="images/absensi.jpg" alt="">
                        </div>

                        <a style="margin: 20px;" href="riwayat.php" class="btn btn-outline-primary">Riwayat Absensi <i class="fa fa-paper-plane" aria-hidden="true"></i> </a>
                    </div>
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="images/form.jpg" alt="">
                        </div>

                        <a style="margin: 20px;" href="form.php" class="btn btn-outline-primary">Form Izin <i class="fa fa-paper-plane" aria-hidden="true"></i> </a>
                    </div>
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="images/akun.jpg" alt="">
                        </div>
                        <a style="margin: 20px;" href="akun.php" class="btn btn-outline-primary">Akun <i class="fa fa-paper-plane" aria-hidden="true"></i> </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>