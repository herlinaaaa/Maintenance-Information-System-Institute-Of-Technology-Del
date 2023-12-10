<?php

include 'function.php';
session_start();

// Mengambil data dari id dengan fungsi get
$id = $_GET['id'];
// Mengambil data dari table siswa dari id yang tidak sama dengan 0
$ubah_laporan_user = query("SELECT * FROM lapor WHERE id = $id")[0];

// Jika fungsi ubah lebih dari 0/data terubah, maka munculkan alert dibawah
if (isset($_POST['ubah_laporan_user'])) {
    if (ubah_laporan_user($_POST) > 0) {
        echo "<script>
                alert('Data Lapor berhasil diubah!');
                document.location.href = 'lapor.php';
            </script>";
    } else {
        // Jika fungsi ubah dibawah dari 0/data tidak terubah, maka munculkan alert dibawah
        echo "<script>
                alert('Data Lapor gagal diubah!');
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

    <title>Ubah Lapor Kerusakan Sarana & Prasarana IT Del</title>
</head>
<body>

<div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Lapor</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambar" value="<?= $ubah_laporan_user['gambar']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control w-50" value="<?= $ubah_laporan_user['nama']; ?>" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control w-50" id="email" value="<?= $ubah_laporan_user['email']; ?>" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lapor</label>
                        <input type="date" class="form-control w-50" value="<?= $ubah_laporan_user['date']; ?>" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" class="form-control w-50" value="<?= $ubah_laporan_user['lokasi']; ?>" name="lokasi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Detail Kerusakan</label>
                        <input type="text" class="form-control w-50" value="<?= $ubah_laporan_user['detail']; ?>" name="detail" required>
                    </div>
                    <div class="mb-3">
                        <label for="aksi" class="form-label">Keterangan</label>
                        <input type="text" class="form-control w-50" value="<?= $ubah_laporan_user['aksi']; ?>" name="aksi" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar <i>(Gambar saat ini)</i></label> <br>
                        <img src="image/<?= $ubah_laporan_user['gambar']; ?>" width="30%" style="margin-bottom: 10px;">
                        <input class="form-control form-control-sm w-50" id="gambar" name="gambar" type="file" required>
                    </div>
                    <hr>
                    <a href="lapor.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="ubah_laporan_user">Ubah</button>
                </form>
            </div>
        </div>
    </div>