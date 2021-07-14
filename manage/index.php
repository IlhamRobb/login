<?php 
session_start();
if( !isset($_SESSION['log']) ){
    header('location: ../index.php');
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN dataTable -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <title>Data Karyawan</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Data Karyawan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Tambah Karyawan</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container data-karyawan mt-5">

         <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
        Tambah Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- membuat form dengan method post untuk memanggil file store.php -->
                    <form method="post" action="create.php" name="form">
                    <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <!-- form control -->
                        <div class="mb-3">
                            <!-- input nama -->
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Mahasiswa" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <!-- input no ktp -->
                            <label for="nim" class="form-label">No. KTP</label>
                            <input type="text" class="form-control" id="noktp" placeholder="Masukkan No. KTP Karyawan" name="noktp" required>
                        </div>
                        <div class="mb-3">
                            <!-- input no telepon -->
                            <label for="alamat" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" id="nohp" placeholder="Masukkan No. Telepon Karyawan" name="nohp" required>
                        </div>
                        <div class="mb-3">
                            <!-- input tahun masuk -->
                            <label for="nama" class="form-label">Tahun Masuk</label>
                            <input type="text" class="form-control" id="tahunmasuk" placeholder="Masukkan Tahun Masuk Karyawan" name="tahunmasuk" required>
                        </div>
                        <div class="mb-3">
                            <!-- input jumlah masa kerja -->
                            <label for="nama" class="form-label">Jumlah Masa Kerja</label>
                            <input type="text" class="form-control" id="jmlmasakerja" placeholder="Masukkan Jumlah Masa Kerja Karyawan" name="jmlmasakerja" required>
                        </div>
                        <!-- akhir form control -->
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="SIMPAN">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- akhir modal -->

        <table class="table table-striped" id="tabelKaryawan">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. KTP</th>
                    <th scope="col">No. Telepon</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">Jumlah Masa Kerja</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php

                // memanggil config.php 
                include 'config.php';

                // membuat variabel untuk nomor karyawan yang akan diincrement
                $no = 1;

                // melakukan query
                $karyawan = mysqli_query($koneksi,"select * from karyawan");

                // looping data karyawan
                while($data = mysqli_fetch_array($karyawan)){
        
                ?>
                    <!-- menampilkan data karyawan ke dalam tabel -->
                    <tr>
                        <!-- increment nomor baris $no++ -->
                        <td><?php echo $no++ ?></td>

                        <!-- menampilkan data -->
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['noktp'] ?></td>
                        <td><?php echo $data['nohp'] ?></td>
                        <td><?php echo $data['tahunmasuk'] ?></td>
                        <td><?php echo $data['jmlmasakerja'] ?></td>

                        <!-- kolom ini untuk aksi data mahasiswa -->

                        <td>
                            <a href="detail.php?id=<?php echo $data['id']; ?>" 
                            class="btn btn-success btn-sm text-white">DETAIL</a>

                            <a href="edit.php?id=<?php echo $data['id']; ?>" 
                            class="btn btn-warning btn-sm text-white">EDIT</a>

                            <a href="delete.php?id=<?php echo $data['id']; ?>" 
                            class="btn btn-danger btn-sm" onclick="return confirm('anda yakin akan menghapus data karayawan ini?')">HAPUS</a>

                            <a href="print.php?id=<?php echo $data['id']; ?>" 
                            class="btn btn-primary btn-sm text-white">CETAK</a>
                        </td>
                    </tr>
            
                <?php
                }
                ?>

            </tbody>
        </table>

    </div>
    <!-- dataTable js -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
        $('#tabelKaryawan').DataTable();
        });
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>