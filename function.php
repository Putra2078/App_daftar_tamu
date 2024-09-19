<?php
// panggil file koneksi.php
use LDAP\Result;
require_once 'koneksi.php';

// membuat query ke / dari database
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function tambah data
function tambah_user($data)
{
    global $koneksi;

    $kode       = htmlspecialchars(($data["id_tamu"]));
    $tanggal    = date("Y-m-d");
    $nama_tamu  = htmlspecialchars($data["nama_tamu"]);
    $alamat     = htmlspecialchars(($data["alamat"]));
    $no_hp    = htmlspecialchars(($data["no_hp"]));
    $bertemu    = htmlspecialchars($data["bertemu"]);
    $kepentingan= htmlspecialchars($data["kepentingan"]);

    $query = "INSERT INTO daftar_tamu VALUES ('$kode','$tanggal','$nama_tamu','$alamat','$no_hp','$bertemu','$kepentingan')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows(($koneksi));
}

// function ubah data tamu
function ubah_tamu($data)
{
    global $koneksi;

    $id     = htmlspecialchars(($data["id_tamu"]));
    $nama_tamu  = htmlspecialchars(($data["nama_tamu"]));
    $alamat     = htmlspecialchars(($data["alamat"]));
    $no_hp    = htmlspecialchars(($data["no_hp"]));
    $bertemu    = htmlspecialchars(($data["bertemu"]));
    $kepentingan= htmlspecialchars(($data["kepentingan"]));

    $query = "UPDATE daftar_tamu SET
    nama_tamu = '$nama_tamu',
    alamat    = '$alamat',
    no_hp   = '$no_hp',
    bertemu   = '$bertemu',
    kepentingan = '$kepentingan'
    WHERE id_tamu = '$id'";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// function hapus data tamu
function hapus_tamu($id) {
    global $koneksi;

    $query = "DELETE FROM daftar_tamu WHERE id_tamu = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>