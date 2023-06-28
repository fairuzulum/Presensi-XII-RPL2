<?php
// Load file koneksi.php
include "koneksi.php";
// Load plugin PHPExcel nya
require_once 'libraries/PHPExcel/PHPExcel.php';
// Panggil class PHPExcel nya
$excel = new PHPExcel();
// Settingan awal fil excel
$excel->getProperties()->setCreator('My Notes Code')
             ->setLastModifiedBy('My Notes Code')
             ->setTitle("Data Absensi")
             ->setSubject("Absensi")
             ->setDescription("Laporan Semua Data Absensi")
             ->setKeywords("Data Transaksi");
// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
  'font' => array('bold' => true), // Set font nya jadi bold
  'alignment' => array(
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);
// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
  'alignment' => array(
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);
if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
  $filter = $_GET['filter']; // Ambil data filder yang dipilih user
  if($filter == '1'){ // Jika filter nya 1 (per tanggal)
    $tgl = date('d-m-y', strtotime($_GET['tanggal']));
    $label = 'Data Transaksi Tanggal '.$tgl;
    $query = "SELECT * FROM transaksi WHERE DATE(tgl)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $label = 'Data Absensi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'];
    $query = "SELECT * FROM kehadiran WHERE MONTH(timein)='".$_GET['bulan']."' AND YEAR(timein)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  }else{ // Jika filter nya 3 (per tahun)
    $label = 'Data Transaksi Tahun '.$_GET['tahun'];
    $query = "SELECT * FROM transaksi WHERE YEAR(tgl)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  }
}else{ // Jika user tidak memilih filter
  $label = 'Semua Data Absensi';
  $query = "SELECT * FROM kehadiran ORDER BY timein"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
}
$excel->setActiveSheetIndex(0);
$excel->getActiveSheet()->setCellValue('A1', "DATA ABSENSI"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->setCellValue('A2', $label); // Set kolom A2 sesuai dengan yang pada variabel $label
$excel->getActiveSheet()->mergeCells('A2:E2'); // Set Merge Cell pada kolom A2 sampai E2
// Buat header tabel nya pada baris ke 4
$excel->getActiveSheet()->setCellValue('A4', "NIS"); // Set kolom A4 dengan tulisan "Tanggal"
$excel->getActiveSheet()->setCellValue('B4', "TIMEIN"); // Set kolom B4 dengan tulisan "Kode Transaksi"
$excel->getActiveSheet()->setCellValue('C4', "TIMEOUT"); // Set kolom C4 dengan tulisan "Barang"
$excel->getActiveSheet()->setCellValue('D4', "LOGDITE"); // Set kolom D4 dengan tulisan "Jumlah"
$excel->getActiveSheet()->setCellValue('E4', "STATUS"); // Set kolom E4 dengan tulisan "Total Harga"
// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
// Set height baris ke 1, 2, 3 dan 4
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
$sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5
while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
  $tgl = date('d-m-Y', strtotime($data['timein'])); // Ubah format tanggal jadi dd-mm-yyyy
  $excel->getActiveSheet()->setCellValue('A'.$numrow, $data['nis']);
  $excel->getActiveSheet()->setCellValue('B'.$numrow, $data['timein']);
  $excel->getActiveSheet()->setCellValue('C'.$numrow, $data['timeout']);
  $excel->getActiveSheet()->setCellValue('D'.$numrow, $data['logdate']);
  $excel->getActiveSheet()->setCellValue('E'.$numrow, $data['status']);
  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
  $no++; // Tambah 1 setiap kali looping
  $numrow++; // Tambah 1 setiap kali looping
}
// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(18); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
// Set judul file excel nya
$excel->getActiveSheet()->setTitle("Laporan Data Transaksi");
$excel->getActiveSheet();
// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Transaksi.xls"'); // Set nama file excel nya
header('Cache-Control: max-age=0');
$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>