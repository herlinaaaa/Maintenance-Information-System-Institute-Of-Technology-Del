<?php

$con = mysqli_connect("localhost","root","","sarpras");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


function get_title($_title){
    return('<title>'.$_title.'</title>');
}
function open_page($_title){
    echo('<html><head>'.get_title($_title).'</head></body>');
}
function close_page(){
    echo('</body></html>');
}
function redirect($_location){
    header('Location:'.$_location);
}

// function registrasi

    function registrasi($data) {
        global $con;
        $username = stripslashes($data["username"]);
        $email = ($data["email"]);
        $pass = mysqli_real_escape_string($con, $data["pass"]);

        // cek username ada atau belum
       $result = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
       if(mysqli_fetch_assoc($result)){
           echo "<script>
           alert('Username Already Taken!')
                </script>";

                return false;
       }

       $resultem = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
       if(mysqli_fetch_assoc($resultem)){
        echo "<script>
        alert('Email Already Taken!')
             </script>";

             return false;
    }

    // enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);
        mysqli_query($con, "INSERT INTO users VALUES('', '$username', '$email', '$pass')");
        return mysqli_affected_rows($con);
    }


// function login

    function login(){

    global $con;
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    // cek username terdaftar atau tidak
    $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' ");
    $valid = mysqli_fetch_array($result);

    // jika username terdaftar
    if($valid){
        // cek password
        if(password_verify($pass, $valid["pass"])){
            //jika sesuai buat session
            session_start();
            $_SESSION['username'] = $valid['username'];
            $_SESSION['id_user'] = $valid['id_user'];
            header("Location: index.php");
        }else{
            echo "<script>
                alert('Maaf Password Anda Salah'); document.location='login.php'
                </script>";
        }


    }else{
        echo "<script>
            alert('Maaf Username Anda Salah'); document.location='login.php'
            </script>";
    }

}

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $con;

    $result = mysqli_query($con, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// function tambah lapor
function lapor($data)
{
    global $con;

    $id_user = $_SESSION['id_user'];
    $nama = $data['nama'];
    $email = $data['email'];
    $date = $data['date'];
    $lokasi = $data['lokasi'];
    $detail = $data['detail'];
    $gambar = upload();
    $damage = $_POST['damage'];
    $aksi = $_POST['aksi'];
    $petugas = $_POST['petugas'];

    if (!$gambar) {
        return false;
    }

    $lapor = "INSERT INTO lapor VALUES ('', '$id_user', '$nama','$email','$date','$lokasi','$detail','$gambar', '$damage', '$aksi', '$petugas')";

    mysqli_query($con, $lapor);

    return mysqli_affected_rows($con);
}

// Membuat fungsi upload gambar
function upload()
{
  // Syarat
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
  if ($error === 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
      return false;
  }

  // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
  $extValid = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
  $ext = explode('.', $namaFile);
  $ext = strtolower(end($ext));

  // Jika format atau ekstensi bukan gambar maka akan menampilkan alert dibawah
  if (!in_array($ext, $extValid)) {
      echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
      return false;
  }

  // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
  if ($ukuranFile > 3000000) {
      echo "<script>alert('Ukuran gambar anda terlalu besar!');</script>";
      return false;
  }

  // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ext;

  // memindahkan file ke dalam folde img dengan nama baru
  move_uploaded_file($tmpName, 'image/' . $namaFileBaru);

  return $namaFileBaru;
}

// function login

function admin(){

    global $con;
    $username = $_POST['username'];
    $password = md5($_POST['pass']);
    $pass = mysqli_escape_string($con, $password);

    // cek username terdaftar atau tidak
    $r = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username' ");
    $v = mysqli_fetch_array($r);

    // jika username terdaftar
    if($v){
        // cek password
        if($pass == $v["pass"]){
            //jika sesuai buat session
            session_start();
            $_SESSION['username'] = $v['username'];
            $_SESSION['id'] = $v['id'];
            header("Location: index.php");
        }else{
            echo "<script>
                alert('Maaf Password Anda Salah'); document.location='loginadmin.php'
                </script>";
        }


    }else{
        echo "<script>
            alert('Maaf Username Anda Salah'); document.location='loginadmin.php'
            </script>";
    }

}

// Membuat fungsi hapus
function hapus($id)
{
    global $con;
    mysqli_query($con, "DELETE FROM lapor WHERE id = $id");
    return mysqli_affected_rows($con);
}

// Membuat fungsi ubah
function ubah($data)
{

    global $con;

    $id = $_GET['id'];
    $nama = $data['nama'];
    $email = $data['email'];
    $date = $data['date'];
    $lokasi = $data['lokasi'];
    $detail = $data['detail'];
    $damage = $data['damage'];
    $aksi = $data['aksi'];
    $petugas = $data['petugas'];

    $gambar = $data['gambar'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar;
    } else {
        $gambar = upload();
    }

    $lapor = "UPDATE lapor SET aksi = '$aksi', petugas = '$petugas', gambar = '$gambar' WHERE id = $id";

    mysqli_query($con, $lapor);

    return mysqli_affected_rows($con);

}

// fungsi ubah lapor untuk user
// Membuat fungsi ubah
function ubah_laporan_user($data)
{

    global $con;

    $id = $_GET['id'];
    $nama = $data['nama'];
    $email = $data['email'];
    $date = $data['date'];
    $lokasi = $data['lokasi'];
    $detail = $data['detail'];
    $aksi = $data['aksi'];

    $gambar = $data['gambar'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar;
    } else {
        $gambar = upload();
    }

    $ubah_laporan_user = "UPDATE lapor SET nama = '$nama', email = '$email', date = '$date', lokasi = '$lokasi', detail = '$detail', aksi = '$aksi', gambar = '$gambar' WHERE id = $id";

    mysqli_query($con, $ubah_laporan_user);

    return mysqli_affected_rows($con);
}

// FUNCTION JADWAL KERJA

// Membuat fungsi tambah
function tambah($data)
{

    global $con;
    $nama = $data['nama'];
    $date = $data['date'];
    $time_start = $data['time_start'];
    $time_end = $data['time_end'];
    $lokasi = $data['lokasi'];
    $tugas = $data['tugas'];

    $id = $_SESSION['id'];

    $jadwal_kerja = "INSERT INTO jadwal_kerja VALUES ('', '$nama','$date','$time_start','$time_end','$lokasi','$tugas','$id')";
   
    mysqli_query($con, $jadwal_kerja);
    return mysqli_affected_rows($con);
}

// Membuat fungsi hapus
function hapusjadwal($id_jadwal)
{
    global $con;
    mysqli_query($con, "DELETE FROM jadwal_kerja WHERE id_jadwal = $id_jadwal");
    return mysqli_affected_rows($con);
}

// Membuat fungsi ubah
function ubahjadwal($data)
{

    global $con;

    
    $id_jadwal = $_GET['id_jadwal'];
    $nama = $data['nama'];
    $date = $data['date'];
    $time_start = $data['time_start'];
    $time_end = $data['time_end'];
    $lokasi = $data['lokasi'];
    $tugas = $data['tugas'];

    $jadwal_kerja ="UPDATE jadwal_kerja SET nama = '$nama', date = '$date', time_start = '$time_start', time_end = '$time_end', lokasi = '$lokasi', tugas = '$tugas' WHERE id_jadwal = $id_jadwal";
    mysqli_query($con, $jadwal_kerja);
    return mysqli_affected_rows($con);
}


// Membuat fungsi tambah dokumen
function dokumen($data, $files)
{
    $files = up();
    global $con;
    $nama_dok = $data['nama_dok'];
    $file = $files;

    $id = $_SESSION['id'];

    if (!$file) {
        return false;
    }
    $dokumen = "INSERT INTO dokumen VALUES ('','$nama_dok','$file', '$id')";
    
    mysqli_query($con, $dokumen);

    return mysqli_affected_rows($con);
}

function hapusdokumen($id_dok)
{
global $con;
mysqli_query($con, "DELETE FROM dokumen WHERE id_dok = $id_dok");
return mysqli_affected_rows($con);
}
// Membuat fungsi upload file
function up()
{
  // Syarat
  $direktori = "../berkas/";
  $namaFile = $_FILES['file']['name'];
  $ukuranFile = $_FILES['file']['size'];
  $error = $_FILES['file']['error'];

  // Jika tidak mengupload file atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
  if ($error === 4) {
      echo "<script>alert('Pilih file terlebih dahulu!');</script>";
      return false;
  }

  // format atau ekstensi yang diperbolehkan untuk upload file adalah
  $extValid = ['pdf', 'doc', 'docx', 'PDF', 'xls', 'xlsx', 'ppt', 'pptx'];
  $ext = explode('.', $namaFile);
  $ext = strtolower(end($ext));

  // Jika format atau ekstensi bukan file maka akan menampilkan alert dibawah
  if (!in_array($ext, $extValid)) {
      echo "<script>alert('Yang anda upload bukanlah file!');</script>";
      return false;
  }

  // Jika ukuran file lebih 100000000 byte maka akan menampilkan alert dibawah
  if ($ukuranFile > 100000000) {
      echo "<script>alert('Ukuran file anda terlalu besar!');</script>";
      return false;
  }

  // memindahkan file ke dalam folde img dengan nama baru
  move_uploaded_file($_FILES['file']['tmp_name'],$direktori.$namaFile);
  return $namaFile;
}