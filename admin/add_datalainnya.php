<?php

// Memanggil atau membutuhkan file function.php
require '../function.php';
session_start();
$id = $_SESSION['id'];

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {

    if (dokumen($_POST, $_FILES['file']) > 0) {
        echo "<script>
                alert('Dokumen berhasil ditambahkan!');
                document.location.href = 'datalainnya.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Dokumen gagal ditambahkan!');
            </script>";
    }

    // $tipefile = $_FILES['file']['type'];
    // if($tipefile == "application/pdf"){
    //     $nama_dok = $_POST['nama_dok'];
    //     $file = $_FILES['file']['name'];

    //     $id = $_SESSION['id'];

    //     $dokumen = "INSERT INTO dokumen VALUES ('','$nama_dok','$file', '$id')";

    //     mysqli_query($con, $dokumen);

    //     return mysqli_affected_rows($con);

    //     echo "<script>
    //         alert('Dokumen berhasil ditambahkan!');
    //         document.location.href = 'datalainnya.php';
    //         </script>";

    // }



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

    <title>Data Jadwal Lainnya Sarana & Prasarana IT Del</title>
</head>
<body>


    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp; Dokumen</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                        <label class="form-label">Keterangan File</label>
                        <input type="text" class="form-control w-50" name="nama_dok" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File</label>
                        <input type="file" class="form-control w-50" name="file" required>
                    </div>
                    <hr>
                    <a href="datalainnya.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>