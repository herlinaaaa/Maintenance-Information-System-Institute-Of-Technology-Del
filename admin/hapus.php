<?php
// Memanggil atau membutuhkan file function.php
require '../function.php';

// Mengambil data dari lapor dengan fungsi get
$id = $_GET['id'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapus($id) > 0) {
    echo "<script>
                alert('Data Lapor Kerusakan berhasil dihapus!');
                document.location.href = 'admin.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data Lapor Kerusakan gagal dihapus!');
        </script>";
}