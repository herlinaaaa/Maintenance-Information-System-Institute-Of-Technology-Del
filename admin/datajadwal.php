<?php

// Memanggil atau membutuhkan file function.php
require '../function.php';

session_start();
$id = $_SESSION['id'];

if (!isset($_SESSION['id'])) {
    header("Location: loginadmin.php");
}
// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$jadwal_kerja = query("SELECT * FROM jadwal_kerja where id = $id ORDER BY id_jadwal DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jadwal Kerja Sarana & Prasarana Institut Teknologi Del</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <!-- Flaticon Font -->
    <link href="../asset/lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../asset/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../asset/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <span class="text-primary">Maintenance IT Del</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>

                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="visimisi.php" class="dropdown-item">Visi & Misi</a>
                            <a href="tugasfungsi.php" class="dropdown-item">Tugas & Fungsi</a>
                            <a href="strukturorg.php" class="dropdown-item">Struktur Organisasi</a>
                            <a href="personelorg.php" class="dropdown-item">Personel Organisasi</a>
                        </div>
                    </div>

                    <a href="galeri.php" class="nav-item nav-link">Galeri</a>
                    <a href="admin.php" class="nav-item nav-link">Data Lapor Maintenance</a>

                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Data</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="datajadwal.php" class="dropdown-item active">Data Jadwal Kerja</a>
                            <a href="datalainnya.php" class="dropdown-item">Data Dokumen</a>
                        </div>
                    </div>
                    <!-- <a href="jadwal.php" class="nav-item nav-link active">Jadwal Kerja</a> -->
                    <a href="kontak.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="../logout.php" class="btn btn-primary px-4">Logout</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

     <!-- Header Start -->
     <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h3 class="display-3 font-weight-bold text-white">Data Jadwal Kerja</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="index.php">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Data Jadwal Kerja</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Container -->
  <div class="container">
        <div class="row my-2">
            <div class="col-md">
            <a href="addJadwalKerja.php" class="btn btn-primary">&nbsp;Tambah Data</a>
            </div>
        </div>
        
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center">
                    <thead class="table-dark" text-align="center">
                        <tr>
                            <th>No.</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Lokasi Kerja</th>
                            <th>Tugas Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($jadwal_kerja as $row) : ?>
                            <tr>
                                <td align="left"><?= $no++; ?></td>
                                <td align="left" width="200px"><?= $row['nama']; ?></td>
                                <td align="left" width="100px"><?= $row['date']; ?></td>
                                <td align="left"><?= $row['time_start']; ?></td>
                                <td align="left"><?= $row['time_end']; ?> </td>
                                <td align="left" width="200px"><?= $row['lokasi']; ?></td>
                                <td align="left" width="200px"><?= $row['tugas']; ?></td>
                                <td>
                                    <a href="ubah_jadwal.php?id_jadwal=<?= $row['id_jadwal']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;">Ubah</a> ||<br>
                                    <a href="hapusjadwal.php?id_jadwal=<?= $row['id_jadwal']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    <!-- Close Container -->

     <!-- Detail Data -->
     <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-uppercase" id="detail">Detail Data Lapor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="detail-lapor">
                </div>
            </div>
        </div>
    </div>
    <!-- Close Modal Detail Data -->

        <!-- Footer Start -->
        <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-4 mb-6">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 32px; line-height: 40px;">
                    <span class="text-white">A Part Of IT Del</span>
                </a>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="https://twitter.com/intent/follow?original_referer=https%3A%2F%2Fwww.del.ac.id%2F&ref_src=twsrc%5Etfw%7Ctwcamp%5Ebuttonembed%7Ctwterm%5Efollow%7Ctwgr%5Einstitut_del&region=follow_link&screen_name=institut_del"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="https://www.facebook.com/profile.php?id=403538753086034&fref=ts"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="https://instagram.com/it.del?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-6">
                <h3 class="text-primary mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="visimisi.php"><i class="fa fa-angle-right mr-2"></i>Visi & Misi Sarana dan Prasarana</a>
                    <a class="text-white mb-2" href="tugasfungsi.php"><i class="fa fa-angle-right mr-2"></i>Tugas & Fungsi</a>
                    <a class="text-white mb-2" href="strukturorg.php"><i class="fa fa-angle-right mr-2"></i>Struktur Organisasi</a>
                    <a class="text-white mb-2" href="personelorg.php"><i class="fa fa-angle-right mr-2"></i>Personel Organisasi</a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
                </div>
            <div class="col-lg-2 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Maps</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.366447283318!2d99.14619961541551!3d2.3835254580448133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sInstitut%20Teknologi%20Del!5e0!3m2!1sid!2sid!4v1651148569016!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-primary font-weight-bold" href="#">Sistem Informasi Sarana & Prasarana IT Del</a> | All Rights Reserved. Designed
                by
                <a class="text-primary font-weight-bold" href="#">Proyek Akhir Kelompok 12</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="../asset/js/main.js"></script>
 <!-- Bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Data Tables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Fungsi Table
        $('#data').DataTable();
        // Fungsi Table

        // Fungsi Detail
        $('.detail').click(function() {
            var dataLapor = $(this).attr("data-id");
            $.ajax({
                url: "detail.php",
                method: "post",
                data: {
                    dataLapor,
                    dataLapor
                },
                success: function(data) {
                    $('#detail-lapor').html(data);
                    $('#detail').modal("show");
                }
            });
        });
        // Fungsi Detail
    });
</script>


</body>

</html>