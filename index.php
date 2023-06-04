<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Darren Prasetya">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Tugas PWEB 10 Darren Prasetya</title>
</head>

<body style="background-color: #2c303490">
    <div class="container">
        <p class="h1 text-center mt-3">Data-Data Siswa</p>
        <div style="display: flex; gap: 1rem; align-items: center;">
            <a href="form_simpan.php" class="btn btn-dark my-3">Tambah Siswa</a>
            <a href="download_pdf.php" class="btn btn-primary my-3" style="height: fit-content;">PDF</a>
        </div>

        <table class="table table-dark table-striped table-hover rounded-top-2" style="overflow: hidden;">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Ubah</th>
                    <th scope="col">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $sql = $pdo->prepare("SELECT * FROM siswa");
                $sql->execute();

                while ($data = $sql->fetch()) {
                    echo "<tr>";
                    echo "<td><img src='uploads/" . $data['foto'] . "' width='100' height='100' class='img-thumbnail' alt='foto'></td>";
                    echo "<td>" . $data['nis'] . "</td>";
                    echo "<td>" . $data['name'] . "</td>";
                    echo "<td>" . $data['jenis_kelamin'] . "</td>";
                    echo "<td>" . $data['telp'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td><a href='form_ubah.php?id=" . $data['id'] . "' class='btn btn-warning'>Ubah</a></td>";
                    echo "<td><a href='proses_hapus.php?id=" . $data['id'] . "' class='btn btn-danger'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>