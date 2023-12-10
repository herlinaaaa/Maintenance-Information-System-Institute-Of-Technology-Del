<?php
// Memanggil atau membutuhkan file function.php
require '../function.php';
session_start();

$id = $_SESSION['id'];

// Mengambil data dari lapor dengan fungsi get
$id_dok = $_GET['id_dok'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapusdokumen($id_dok) > 0) {
    echo "<script>
                alert('Dokumen berhasil dihapus!');
                document.location.href = 'datalainnya.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data Jadwal Kerja gagal dihapus!');
        </script>";
}