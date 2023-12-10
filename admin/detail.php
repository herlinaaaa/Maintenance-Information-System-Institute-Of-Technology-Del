<?php
session_start();

$id = $_SESSION['id'];
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: loginadmin.php");
}

// Memanggil atau membutuhkan file function.php
require '../function.php';

// Jika dataLapor diklik maka
if (isset($_POST['dataLapor'])) {
    $output = '';

 // mengambil data lapor dari id yang berasal dari dataLapor
    $detail = "SELECT * FROM lapor WHERE id = '" . $_POST['dataLapor'] . "'";
    $result = mysqli_query($con, $detail);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="../image/'.$row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">Keterangan</th>
                            <td width="60%">' . $row['aksi'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Lokasi Kerusakan dan Tanggal </th>
                            <td width="60%">' . $row['lokasi'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tanggal Kerusakan</th>
                            <td width="60%">'. date("d M Y", strtotime($row['date'])) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Status</th>
                            <td width="60%">' . $row['damage'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama Petugas</th>
                            <td width="60%">' . $row['petugas'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
?>