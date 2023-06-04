<?php
include "koneksi.php";

$nis = $_POST['nis'];
$name = $_POST['name'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotobaru = date('dmYHis') . $foto;

$path = "uploads/" . $fotobaru;

if (move_uploaded_file($tmp, $path)) {
    $sql = $pdo->prepare("INSERT INTO siswa(nis, name, jenis_kelamin, telp, alamat, foto) VALUES(:nis,:name,:jk,:telp,:alamat,:foto)");
    $sql->bindParam(':nis', $nis);
    $sql->bindParam(':name', $name);
    $sql->bindParam(':jk', $jenis_kelamin);
    $sql->bindParam(':telp', $telp);
    $sql->bindParam(':alamat', $alamat);
    $sql->bindParam(':foto', $fotobaru);
    $sql->execute();

    if ($sql) {
        header("location: index.php");
    } else {
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }
} else {
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
