<?php
    // panggil file function.php
    require_once 'function.php';

    // jika ada id
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (hapus_tamu($id) > 0) {
            // jika ada data berhasil di hapus maka akan muncul alert
            echo "<script>alert('Data Berhasil di hapus!')</script>";
            // redirect ke halaman buku-tamu.php
            echo "<script>window.location.href='buku-tamu.php'</script>";
        } else {
            // jika data gagal di hapus maka akan muncul alert
            echo "<script>alert('Data Gagal di hapus!')</script>";
        }
    }
?>