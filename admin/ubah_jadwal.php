<?php

include '../function.php';
session_start();
// Mengambil data dari id dengan fungsi get
$id_jadwal = $_GET['id_jadwal'];
// Mengambil data dari table siswa dari id yang tidak sama dengan 0
$ubahjadwal = query("SELECT * FROM jadwal_kerja WHERE id_jadwal = $id_jadwal")[0];
// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubahjadwal'])) {
    if (ubahjadwal($_POST) > 0) {
        echo "<script>
                alert('Data jadwal kerja berhasil diubah!');
                document.location.href = 'datajadwal.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data jadwal kerja gagal diubah!');
            </script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Ubah Data Jadwal Kerja Sarana & Prasarana IT Del</title>
</head>
<body>

    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Jadwal Kerja</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                        <label class="form-label">Nama Petugas</label>
                        <input type="text" class="form-control w-50" value="<?= $ubahjadwal['nama']; ?>" name="nama" required>
                </div>      
                <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control w-50" value="<?= $ubahjadwal['date']; ?>" name="date" required>
                </div>  
                <div class="mb-3">
                        <label class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control w-50" value="<?= $ubahjadwal['time_start']; ?>" name="time_start" required>
                </div>  
                <div class="mb-3">
                        <label class="form-label">Waktu Selesai</label>
                        <input type="time" class="form-control w-50" value="<?= $ubahjadwal['time_end']; ?>" name="time_end" required>
                </div>  
                <div class="mb-3">
                        <label class="form-label">Lokasi Kerja </label>
                        <input type="text" class="form-control w-50" value="<?= $ubahjadwal['lokasi']; ?>" name="lokasi" required>
                </div>  
                <div class="mb-3">
                        <label class="form-label">Tugas Pekerjaan</label>
                        <input type="text" class="form-control w-50" value="<?= $ubahjadwal['tugas']; ?>" name="tugas" required>
                </div>
                <hr>
                    <a href="datajadwal.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="ubahjadwal">Ubah</button>
                </form>
            </div>
            </div>
    </div>  