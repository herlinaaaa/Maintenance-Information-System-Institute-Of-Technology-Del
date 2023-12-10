<?php

require_once("../function.php");
session_start();

$id = $_SESSION['id'];
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: loginadmin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sarana & Prasarana Institut Teknologi Del</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

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
                    <a href="index.php" class="nav-item nav-link active">Home</a>

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
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Data</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="datajadwal.php" class="dropdown-item">Data Jadwal Kerja</a>
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
    <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left"><br><br>
            <?php echo "<h4>Selamat Datang, " . $_SESSION['username'] ."!". "</h4>"; ?> 
                <h1 class="display-3 font-weight-bold text-white">A New Approach to Fixing broken things</h1>
                <p class="text-white mb-4">
                Institut Teknologi Del (IT Del) menyediakan fasilitas Sarana dan Prasarana untuk dosen, staf penunjang, serta mahasiswa/i di lingkungan kampus.
                Dengan tinggal di lingkungan kampus, seluruh sivitas Del bisa memberikan kontribusi terbaik untuk kelancaran dan kualitas proses akademis dan non-akademis di IT Del. 
                Dengan lingkungan dan fasilitas yang ergonomis, diharapkan juga seluruh sivitas Del bisa menjaga dan merawat Sarana dan Prasarana yang telah disediakan.
                </p>
            </div>
            <div class="col-lg-4 text-center text-lg-right">
                <img class="img-fluid mt-3" src="../img/LOGO.png" alt="" width="270">
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-028-kindergarten h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Akomodasi</h4>
                            <p class="m-0">
                            Institut Teknologi Del (IT Del) menyediakan fasilitas perumahan untuk dosen dan staf penunjang di lingkungan kampus. 
                            Seluruh mahasiswa IT Del diwajibkan tinggal di asrama yang disediakan. Dengan tinggal di asrama yang lokasinya berada di dalam lingkungan kampus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-049-cutlery h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Kantin</h4>
                            <p class="m-0">
                            Kantin Institut Teknologi Del menyediakan menu makanan yang bergizi dan sehat untuk semua mahasiswa/i. 
                            Menu yang disediakan selalu memenuhi standard gizi, sehingga mahasiswa bisa melaksanakan aktifitas perkuliahan dengan sehat dan prima. 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-035-table h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Kelas & Laboratorium</h4>
                            <p class="m-0">
                            Fasilitas laboratorium komputasi dimaksudkan sebagai sarana kerja, pendidikan, penelitian maupun pengabdian pada masyarakat.
                            Kepada para pengguna diharapkan pengertian dan kesadarannya untuk menjaga keutuhan dan keamanan peralatan yang ada
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Perpustakaan</h4>
                            <p class="m-0">
                            Perpustakaan IT Del memiliki visi yaitu "Sebagai pusat informasi terkemuka yang menyediakan layanan informasi cetak maupun cetak dan juga penyedia layanan informasi berteknologi tinggi".
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-024-shape-toy h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Hiburan & Olahraga</h4>
                            <p class="m-0">
                            IT Del juga menyediakan sarana hiburan dan olahraga bagi warga kampus IT Del. 
                            Sarana ini dimaksudkan sebagai media untuk menghilangkan kejenuhan dari kegiatan sehari-hari di IT Del.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Ruangan Terbuka</h4>
                            <p class="m-0">
                            IT Del terbentang luas pemandangan Danau Toba di area belakang kampus. Fasilitas ruang terbuka sering digunakan oleh mahasiswa di lokasi OT dan EH untuk kerja kelompok, belajar individu, dan bersantai.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities End -->

    <!-- Main Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2"> Gambar Sarana dan Prasarana</span></p>
                <h1 class="mb-4">Best Place in IT Del</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="../img/IMG_1442.JPEG" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">Open Theater</h4>
                            <p class="card-text">Suatu Sarana yang disediakan oleh IT Del untuk Sivitas Del yang dapat merasakan secara langsung keindahan Danau Toba</p>
                        </div>
                        <a href="galeri.php" class="btn btn-primary px-4 mx-auto mb-4"> See more Photo</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="../img/IMG_1425.JPEG" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">Saung</h4>
                            <p class="card-text">Suatu Sarana yang disediakan oleh IT Del untuk Sivitas Del yang dapat dipergunakan untuk belajar outdoor dengan udara segar</p>
                        </div>
                        <a href="galeri.php" class="btn btn-primary px-4 mx-auto mb-4"> See more Photo</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="../img/IMG_6962.JPG" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">Perpustakaan</h4>
                            <p class="card-text">Suatu Sarana yang disediakan oleh IT Del untuk Sivitas Del yang dapat dipergunakan untuk belajar di dalam ruangan dengan sangat nyaman</p>
                        </div>
                        <a href="galeri.php" class="btn btn-primary px-4 mx-auto mb-4"> See more Photo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main End -->

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
    <script src="../asset/lib/easing/easing.min.js"></script>
    <script src="../asset/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../asset/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="../asset/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../asset/mail/jqBootstrapValidation.min.js"></script>
    <script src="../asset/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../asset/js/main.js"></script>
</body>

</html>
                
                    
