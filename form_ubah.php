<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Aplikasi CRUD dengan PHP</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="w-100 bg-dark text-white p-5">
            <p class="h1 text-center mt-4">Ubah Data Siswa</p>
            <?php
            include "koneksi.php";

            $id = $_GET['id'];

            $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
            $sql->bindParam(':id', $id);
            $sql->execute();

            $data = $sql->fetch();
            ?>
            <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data" class="mt-5">
                <div class="mb-4">
                    <label for="NIS" class="form-label">NIS</label>
                    <input type="text" class="form-control" id="NIS" name="nis" value="<?php echo $data['nis']; ?>">
                </div>
                <div class="mb-4">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name']; ?>">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="male" value="Laki-laki" <?php echo ($data['jenis_kelamin'] == "Laki-laki") ? 'checked' : ''; ?> <label class="form-check-label" for="male">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="female" value="Perempuan" <?php echo ($data['jenis_kelamin'] == "Perempuan") ? 'checked' : ''; ?> <label class="form-check-label" for="female">Perempuan</label>
                </div>
                <div class="mb-4 mt-4">
                    <label for="phone" class="form-label">Telepon</label>
                    <input type="tel" class="form-control" id="phone" name="telp" value="<?php echo $data['telp']; ?>">
                </div>
                <div class="form-floating mb-4">
                    <textarea class="form-control" placeholder="Your address" id="address" name="alamat"><?php echo $data['alamat']; ?></textarea>
                    <label for="address">Alamat</label>
                </div>
                <div class="mb-4">
                    <label for="photo" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="photo" name="foto">
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="index.php" type="button" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>