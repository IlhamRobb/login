<?php
// Include koneksi database
include './config.php';

// Menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$noktp = $_POST['noktp'];
$nohp = $_POST['nohp'];
$tahunmasuk = $_POST['tahunmasuk'];
$jmlmasakerja = $_POST['jmlmasakerja'];

// Menginput data ke database
mysqli_query($koneksi, "insert into karyawan values('','$nama','$noktp','$nohp','$tahunmasuk','$jmlmasakerja')");
// Mengembalikan ke halaman awal
header ("Location:./index.php");
    