<?php
//koneksi database
include './koneksi.php';

// menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$noktp = $_POST['noktp'];
$nohp = $_POST['nohp'];
$tahunmasuk = $_POST['tahunmasuk'];
$jmlmasakerja = $_POST['jmlmasakerja'];

// update data ke database 
mysqli_query($koneksi, "update karyawan set id='$id', nama='$nama', noktp='$noktp', nohp='$nohp', tahunmasuk='$tahunmasuk', jmlmasakerja='$jmlmasakerja' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:manage/index.php");
