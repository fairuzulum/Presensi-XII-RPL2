<?php
// Load file koneksi.php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Export Excel Plus Filter Tanggal</title>
  <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Include file bootstrap.min.css -->
  <link href="libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"> <!-- Include file bootstrap-datepicker.min.css -->
  <script src="js/jquery.min.js"></script> <!-- Load file jquery -->
</head>

<body style="padding: 0 20px;">
  <h2>Data Transaksi</h2>
  <hr>
  <form method="get" action="">
    <div class="row">
      <div class="col-sm-3 col-md-2">
        <div class="form-group">
          <label>Filter Berdasarkan</label>
          <select name="filter" id="filter" class="form-control">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row" id="form-tanggal">
      <div class="col-sm-3 col-md-2">
        <div class="form-group">
          <label>Tanggal</label>
          <input type="text" name="tanggal" class="form-control datepicker" autocomplete="off" />
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
            $query = "SELECT YEAR(timein) AS tahun FROM kehadiran GROUP BY YEAR(timein)"; // Tampilkan tahun sesuai di tabel transaksi
            $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
              echo '<option value="' . $data['tahun'] . '">' . $data['tahun'] . '</option>';
            }
            ?>
          </select>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Tampilkan</button>
    <a href="index.php" class="btn btn-default">Reset Filter</a>
  </form>
  <hr />
  <?php
  if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
    $filter = $_GET['filter']; // Ambil data filder yang dipilih user
    if ($filter == '1') { // Jika filter nya 1 (per tanggal)
      $tgl = date('d-m-y', strtotime($_GET['tanggal']));
      echo '<b>Data Kehadiran Tanggal ' . $tgl . '</b><br /><br />';
      echo '<a href="proses.php?filter=1&tanggal=' . $_GET['tanggal'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
      $query = "SELECT * FROM kehadiran WHERE DATE(timein)='" . $_GET['tanggal'] . "'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
      $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
      echo '<b>Data Kehadiran Bulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . '</b><br /><br />';
      echo '<a href="proses.php?filter=2&bulan=' . $_GET['bulan'] . '&tahun=' . $_GET['tahun'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
      $query = "SELECT * FROM kehadiran WHERE MONTH(timein)='" . $_GET['bulan'] . "' AND YEAR(timein)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    } else { // Jika filter nya 3 (per tahun)
      echo '<b>Data kehadiran Tahun ' . $_GET['tahun'] . '</b><br /><br />';
      echo '<a href="proses.php?filter=3&tahun=' . $_GET['tahun'] . '" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
      $query = "SELECT * FROM kehadiran WHERE YEAR(timein)='" . $_GET['tahun'] . "'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }
  } else { // Jika user tidak mengklik tombol tampilkan
    echo '<b>Semua Data Transaksi</b><br /><br />';
    echo '<a href="proses.php" class="btn btn-success btn-xs">Export Excel</a><br /><br />';
    $query = "SELECT * FROM kehadiran ORDER BY timein"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
  }
  ?>
  <div class="table-responsive">
    <table class="table table-bordered">
      <tr>
        <th>NIS</th>
        <th>TIMEIN</th>
        <th>TIMEOUT</th>
        <th>LOGDATE</th>
        <th>STATUS</th>
      </tr>
      <?php

      $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
      $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
      if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
          $tgl = date('d-m-Y', strtotime($data['timein'])); // Ubah format tanggal jadi dd-mm-yyyy
          echo "<tr>";
          echo "<td>" . $data['nis'] . "</td>";
          echo "<td>" . $data['timein'] . "</td>";
          echo "<td>" . $data['timeout'] . "</td>";
          echo "<td>" . $data['logdate'] . "</td>";
          echo "<td>" . $data['status'] . "</td>";
          echo "</tr>";
        }
      } else { // Jika data tidak ada
        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
      }
      ?>
    </table>
  </div>
  <script src="js/bootstrap.min.js"></script> <!-- Include file boootstrap.min.js -->
  <script src="libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> <!-- Include library Bootstrap Datepicker -->
  <script>
    $(document).ready(function() { // Ketika halaman selesai di load
      setDatePicker() // Panggil fungsi setDatePicker
      $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
      $('#filter').change(function() { // Ketika user memilih filter
        if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
          $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
          $('#form-tanggal').show(); // Tampilkan form tanggal
        } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
          $('#form-tanggal').hide(); // Sembunyikan form tanggal
          $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
        } else { // Jika filternya 3 (per tahun)
          $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
          $('#form-tahun').show(); // Tampilkan form tahun
        }
        $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
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
</body>

</html>