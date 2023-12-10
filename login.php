<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In Form</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    

    <!-- Flaticon Font -->
    <link href="asset/lib/flaticon/font/flaticon.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">

    <!-- Add css -->
    <link rel="stylesheet" href="asset/css/login.css">
</head>


<body>
  <div class="container1"><br><br><br><br><br><br>
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5"><br>
          <h5 class="card-title text-center mb-5 fw-light fs-5">Khusus Sivitas IT Del</h5><br>
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>

            <form action="" method="post" >
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="floatingPassword" placeholder="Username" required autocomplete="no">
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password" required>
              </div>
              <div class="d-grid">
              <center><button class="btn btn-primary btn-login text-uppercase fw-bold" name="login" type="submit">Login</button></center>
              </div>
              <hr class="my-4">
              <h5 class="card-title text-center mb-5 fw-light fs-5">Belum punya akun ? || <a href="registrasi.php" > Registrasi </a></h5>
              <h6 class="card-title text-center mb-5 fw-light fs-5">Masuk Sebagai Admin? || <a href="./admin/loginadmin.php" > Disini </a></h6>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

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

<?php

include 'function.php';

if(isset($_POST["login"])){

    if(login($_POST) > 0){
        header("Location: index.php");
    }else{
      echo mysqli_error($con);
    }

  }
?>

</body>

</html>