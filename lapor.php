<?php

include 'function.php';
session_start();

$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['submit'])) {
    if (lapor($_POST) > 0) {
        echo "<script>
                alert('Berhasil ditambahkan!');
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Gagal ditambahkan!');
            </script>";
    }
}
$user = query("SELECT * FROM users");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lapor Maintenance Sarana & Prasarana Institut Teknologi Del</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="asset/lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="asset/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">
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
                    <a href="lapor.php" class="nav-item nav-link active">Lapor Maintenance</a>
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Unduh</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="jadwal.php" class="dropdown-item">Jadwal Kerja</a>
                            <a href="dokumen.php" class="dropdown-item">Dokumen</a>
                        </div>
                    </div>
                    <a href="kontak.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="logout.php" class="btn btn-primary px-4">Logout</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

     <!-- Header Start -->
     <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h3 class="display-3 font-weight-bold text-white">Lapor Maintenance</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="index.php">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Lapor Maintenance</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Form Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <p class="section-title pr-5"><span class="pr-2">Form Report</span></p>
                    <p>
                    Form laporan kerusakan barang/alat dan usul perbaikan inventaris Institut Teknologi Del, merupakan rekapitulasi kerusakan barang inventaris yang kemudian diusulkan perbaikan dari alat tersebut.
                    Dengan syarat sebagai berikut:
                    </p>
                    <ul class="list-inline m-0">
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Nama diisi dengan nama lengkap</li>
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Lokasi Lapor kerusakan tertera jelas</li>
                        <li class="py-2"><i class="fa fa-check text-success mr-3"></i>Gambar yang dikirim benar - benar kondisi kerusakan yang sedang terjadi dikawasan IT Del</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-body rounded-bottom bg-primary p-5">
                        <?php foreach ($user as $row) : ?>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" name="nama" value="<?= $row['username']; ?>" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" name="email" value="<?= $row['email']; ?>" required="required"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" name="date" value="<?php echo date('Y-m-d'); ?>" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" name="lokasi" placeholder="Lokasi" required="required" />
                                </div>
                                <div class="form-group">
                                <textarea class="form-control" name="detail" placeholder="Detai Kerusakan" required></textarea>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="gambar" class="col-sm-2 control-label">Gambar* </label> -->
                                        <div class="col-sm-13">
                                            <input type="file" class="form-control" name="gambar" placeholder="gambar" required>
                                        </div>
                                 </div>
                                 <div class="form-group">
                                    <select class="custom-select" name="damage" required="required" id="inputGroupSelect01">
                                        <option selected>Tingkat Kerusakan</option>
                                        <option value="Small">Kecil</option>
                                        <option value="Medium">Sedang</option>
                                        <option value="Warning">Parah</option>
                                    </select>
                                </div>
                                <div>
                                <div class="form-group">
                                    <select class="custom-select" name="aksi" required="required" id="inputGroupSelect01">
                                        <option selected>---</option>
                                        <option value="Tolong Diperbaiki.">Tolong Diperbaiki.</option>
                                        <!-- <option value="Sudah Diperbaiki.">Sudah Diperbaiki.</option> -->
                                    </select>
                                </div>
                                <div>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" name="petugas" value="-Petugas Maintenance-" required="required" readonly/>
                                </div><br>
                                    <button class="btn btn-secondary btn-block border-0 py-3" name="submit" type="submit">Send</button>
                                </div>
                            </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form End -->


    <!-- Report Hasil Start -->
    <div class="container-fluid py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <p class="section-title pr-5"><span class="pr-2">Your Report</span></p>
                    <?php echo "<h4>Hai, " . $_SESSION['username'] ."!". "</h4>"; ?> 
                    <?php

                    // menampilkan data sesuai akun yang login
                    $query = $con->query("SELECT * FROM lapor WHERE id_user = '$id_user' ORDER BY id DESC");

                    ?>

                    <div class="row pt-2 pb-2">
                        <div class="row my-3">
                            <div class="col-md">
                                <table id="data" class="table table-striped table-responsive table-hover text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th align="left">No.</th>
                                            <th align="center" width="250px">Date</th>
                                            <th align="left" width="300px">Lokasi Kerusakan</th>
                                            <th align="left" width="200px">Detail</th>
                                            <th>Gambar</th>
                                            <th>Status Kerusakan</th>
                                            <th>Yang bertugas</th>
                                            <th align="left" width="250px">Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($query as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td align="center"><?= $row['date']; ?></td>
                                        <td align="left"><?= $row['lokasi']; ?></td>
                                        <td align="center"><?= $row['detail']; ?></td>
                                        <td><img src="image/<?= $row['gambar']; ?>" width="100%"/></td>
                                        <td align="center"><?= $row['damage']; ?></td>
                                        <td align="left"><?= $row['petugas']; ?></td>
                                        <td align="left"><?= $row['aksi']; ?></td>
                                        <td align="left">
                                        <a href="ubah_lapor_user.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Report Hasil End -->


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
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="asset/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="asset/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="asset/mail/jqBootstrapValidation.min.js"></script>
    <script src="asset/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="asset/js/main.js"></script>
</body>

</html>
