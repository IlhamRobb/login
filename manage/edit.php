<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Data Karyawan</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Data Karyawan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                </div>
            </div>
        </div>
    </nav>

    <?php
    //memanggil file config.php
    include './config.php';
    //menangkap id yang dikirim melalui button detail di index.php
    $id= $_GET['id'];
    //melakukan query untuk mendapatkan data karyawan berdasarkan $id
    $karyawan = mysqli_query($koneksi, "select * from karyawan where id='$id'");
    while ($data = mysqli_fetch_assoc($karyawan)){
    ?>
        <div class="container mt-5">
            <p><a href="index.php">Home</a> / Edit Karyawan / <?php echo $data['nama'] ?></p>
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Profil karyawan</p>
                </div>
                <div class="card-body fw-bold">
                    <form method="post" action="update.php">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>">
                        </div>
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
                        <button type="submit" class="btn btn-primary" value="SIMPAN">Update</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>