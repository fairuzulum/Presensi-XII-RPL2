<?php
include 'filter/koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    echo "
    <script>
    alert('Anda harus login dahulu!');
    document.location.href = '../../login/admin.php';
    </script>
    ";

    exit;
}

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>
    <link href="libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"> <!-- Include file bootstrap-datepicker.min.css -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
  
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3" style="font-size: 32px;">VOID <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                DATA
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="absensi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Cek Absensi</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="datasiswa.php">
                    <i class="fas fa-address-book"></i>
                    <span>Data Siswa</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="inputsiswa.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Input Siswa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Report
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="Report.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Report</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kehadiran Siswa</h6>
                        </div>
                        <div class="card-body">


                            <form method="GET" action="">
                                <div class="row">
                                    <div class="col-sm-3 col-md-2">
                                        <div class="form-group">
                                            <label>Filter Berdasarkan</label>
                                            <select name="filter" id="filter" class="form-control">
                                                <option value="">Pilih</option>
                                                <option value="1">Per Tanggal</option>
                                                <option value="2">Per Bulan</option>
                                                <option value="3">Per Tahun</option>
                                                <option value="4">Per Siswa</option>
                                                <option value="7">Per Status</option>
                                                
                                                <!-- <option value="5">Per Kelas</option>
                                                <option value="6">Per Periode</option> -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" >
                                    <div class="col-sm-3 col-md-2" id="form-tanggal">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control datepicker" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-2" id="form-status">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="sts" class="form-control">
                                                <option value="">Pilih</option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</option>
                                                <option value="terlambat">Terlambat</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                
                             
                                <div class="row">
                                    <div class="col-sm-3 col-md-2" id="form-bulan">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select name="bulan" class="form-control">
                                                <option value="">Pilih</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-md-2" id="form-tahun">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control">
                                                <option value="">Pilih</option>
                                                <?php
                                                $query = "SELECT YEAR(tgl) AS tahun FROM kehadiran GROUP BY YEAR(tgl)"; // Tampilkan tahun sesuai di tabel transaksi
                                                $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
                                                while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                                    echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 col-md-2" id="form-nama">
                                        <div class="form-group">
                                            <label>Nama Siswa</label>
                                            <input type="text" id="nama" name="nama" value="" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 col-md-2" id="form-kelas">
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <input type="text" id="kelas" name="kelas" value="" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="form-periode">
                                    <div class="col-sm-3 col-md-2">
                                        <div class="form-group">
                                            <label>Masukan Periode</label>
                                            <input type="date" name="tanggal_awal" class="form-control datepicker" autocomplete="off" />
                                            <span class="input-group-addon">s/d</span>
                                            <input type="date" name="tanggal_akhir" class="form-control datepicker" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>




                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                                <a href="report.php" class="btn btn-warning">Reset Filter</a>
                            </form>
                            <br>

                            <?php
                            if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
                                $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                                if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                                    echo '<br><a href="proses.php?filter=1&tanggal=' . $_GET['tanggal'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
                                    $query = "SELECT * FROM kehadiran a, tbsiswa b WHERE a.nis=b.nis AND DATE(tgl)='" . $_GET['tanggal'] . "'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
                                } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                                    echo '<br><a href="proses.php?filter=2&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
                                    $query = "SELECT * FROM kehadiran a, tbsiswa b WHERE a.nis=b.nis AND MONTH(tgl)='" . $_GET['bulan'] . "' AND YEAR(tgl)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                                } else if ($filter == '3') { // Jika filter nya 3 (per tahun)
                                    echo '<br><a href="proses.php?filter=3&tahun=' . $_GET['tahun'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
                                    $query = "SELECT * FROM kehadiran a, tbsiswa b WHERE a.nis=b.nis AND YEAR(tgl)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
                                } else if ($filter == '4') {
                                    echo '<br><a href="proses.php?filter=4&nama=' . $_GET['nama'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
                                    $query = "SELECT * FROM kehadiran a, tbsiswa b WHERE a.nis=b.nis AND nama_siswa='" . $_GET['nama'] . "'";
                                } else if ($filter == '5'){
                                    echo '<br><a href="proses.php?filter=5&kelas=' . $_GET['kelas'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
                                    $query = "SELECT * FROM kehadiran a, tbsiswa b WHERE a.nis=b.nis AND Kelas='" . $_GET['kelas'] . "'";
                                } else if($filter == '7'){
                                    echo '<br><a href="proses.php?filter=7&sts=' . $_GET['sts'] . '&tanggal=' . $_GET['tanggal'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
                                    $query = "SELECT * FROM kehadiran a, tbsiswa b WHERE a.nis=b.nis AND status='" . $_GET['sts'] . "'AND DATE(tgl)='" . $_GET['tanggal'] ."'";
                                   
                                } else {
                                    echo '<br><a href="proses.php?filter=6&=tanggal_awal' . $_GET['tanggal_awal'] . '&tanggal_akhir=' . $_GET['tanggal_akhir'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
                                    $query = "SELECT * FROM kehadiran a, tbsiswa b WHERE a.nis=b.nis AND (tgl BETWEEN '".$_GET['tanggal_awal']."' AND '".$_GET['tanggal_akhir']."')";
                                }
                            } else { // Jika user tidak mengklik tombol tampilkan
                                echo '<br><a href="proses.php" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
                                $query = "SELECT * FROM kehadiran a, tbsiswa b WHERE a.nis=b.nis ORDER BY tgl DESC"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
                            }
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query

                                        // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                            
                                            echo "<tr>";
                                            echo "<td>" . $data['tgl'] . "</td>";
                                            echo "<td>" . $data['nis'] . "</td>";
                                            echo "<td>" . $data['nama_siswa'] . "</td>";
                                            echo "<td>" . $data['Kelas'] . "</td>";
                                            echo "<td>" . $data['status'] . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                             
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="js/bootstrap.min.js"></script> <!-- Include file boootstrap.min.js -->
    <script src="libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> <!-- Include library Bootstrap Datepicker -->
 
    <script>
        $(function() {
            $("#nama").autocomplete({
                source: 'carinama.php'
            });
        });
    </script>
    <script>
        $(function() {
            $("#kelas").autocomplete({
                source: 'carikelas.php'
            });
        });
    </script>
    <script>
       
        $(document).ready(function() {
            setDatePicker()
            $('#form-tanggal, #form-bulan, #form-tahun, #form-nama, #form-kelas, #form-periode, #form-status').hide();
            $('#filter').change(function() {
                if ($(this).val() == '1') {
                    $('#form-bulan, #form-tahun, #form-nama, #form-kelas, #form-periode, #form-status').hide();
                    $('#form-tanggal').show();
                } else if ($(this).val() == '2') {
                    $('#form-tanggal, #form-nama, #form-kelas, #form-periode, #form-status').hide();
                    $('#form-bulan, #form-tahun').show();
                } else if ($(this).val() == '3') {
                    $('#form-tanggal, #form-bulan, #form-nama, #form-kelas, #form-periode, #form-status').hide();
                    $('#form-tahun').show();
                } else if ($(this).val() == '4') {
                    $('#form-tanggal, #form-bulan, #form-tahun, #form-kelas, #form-periode, #form-status').hide();
                    $('#form-nama').show();
                } else if ($(this).val() == '5') {
                    $('#form-tanggal, #form-tahun, #form-bulan, #form-nama, #form-periode, #form-status').hide();
                    $('#form-kelas').show();
                } else if  ($(this).val() == '6'){
                    $('#form-tanggal, #form-tahun, #form-bulan, #form-kelas,  #form-status').hide();
                    $('#form-nama, #form-periode').show();
                }else{
                    $('#form-nama, #form-tahun, #form-bulan, #form-kelas, #form-periode').hide();
                    $('#form-tanggal, #form-status').show();
                }
                $('#form-tanggal input, #form-bulan select, #form-status select, #form-tahun select, #form-nama input, #form-kelas input, #form-periode input').val('');
            })
        })

        function setDatePicker() {
            $(".datepicker").datepicker({
                format: "yyyy-mm-dd",
                todayHighlight: true,
                autoclose: true
            }).attr("readonly", "readonly").css({
                "cursor": "pointer",
                "background": "white"
            });
        }

        
    </script>

    <!-- Bootstrap core JavaScript-->


    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>