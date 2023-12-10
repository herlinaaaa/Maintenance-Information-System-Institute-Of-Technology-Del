<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Struktur Organisasi Sarana & Prasarana Institut Teknologi Del</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

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
                    <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Profil</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="visimisi.php" class="dropdown-item">Visi & Misi</a>
                            <a href="tugasfungsi.php" class="dropdown-item">Tugas & Fungsi</a>
                            <a href="strukturorg.php" class="dropdown-item">Struktur Organisasi</a>
                            <a href="personelorg.php" class="dropdown-item">Personel Organisasi</a>
                        </div>
                    </div>

                    <a href="galeri.php" class="nav-item nav-link">Galeri</a>
                    <a href="lapor.php" class="nav-item nav-link">Lapor Maintenance</a>
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
            <h3 class="display-3 font-weight-bold text-white">Struktur Organisasi</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="index.php">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Struktur Organisasi</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Structure Start -->
    <div class="container-fluid py-5">
        <div class="container p-0">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Struktur Organisasi</span></p>
                <h1 class="mb-4">Institut Teknologi Del</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Wakil Rektor II mempunyai tugas pokok membantu Rektor dalam memimpin pelaksanaan kegiatan dibidang administrasi umum dan keuangan.
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="pl-3">
                            <h5>WR2</h5>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Direktorat Sarana dan Prasarana mempunyai tugas melaksanakan penyusunan norma, standar, prosedur, kriteria, kebijakan, koordinasi pelaksanaan dukungan, dan lainnya.
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="pl-3">
                            <h5>Direktorat Fasilitas</h5>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Seorang yang memiliki tanggung jawab untuk mengatur seluruh kegiatan perusahaan yang berhubungan dengan perawatan segala sarana dan prasarana.
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="pl-3">
                            <h5>Koordinator Maintenance</h5>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
    <!-- Structure End -->

    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-3">
                    <p class="section-title pr-5"><span class="pr-2">Gambar Struktur Organisasi</span></p>
                </div>
                <div class="mb-5">
                    <img class="img-fluid rounded w-100 mb-4" src="img/struktur.JPG" alt="Image">
                </div>
            </div>
        </div>
    </div>

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
