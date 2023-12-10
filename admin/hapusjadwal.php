<?php
// Memanggil atau membutuhkan file function.php
require '../function.php';

// Mengambil data dari lapor dengan fungsi get
$id_jadwal = $_GET['id_jadwal'];

// Jika fungsi hapus lebih dari 0/data terhapus, maka munculkan alert dibawah
if (hapusjadwal($id_jadwal) > 0) {
    echo "<script>
                alert('Data Jadwal Kerja berhasil dihapus!');
                document.location.href = 'datajadwal.php';
            </script>";
} else {
    // Jika fungsi hapus dibawah dari 0/data tidak terhapus, maka munculkan alert dibawah
    echo "<script>
            alert('Data Jadwal Kerja gagal dihapus!');
        </script>";
}