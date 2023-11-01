<?php
require 'koneksi.php';

    if (isset($_POST['tambah'])){
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];
        date_default_timezone_set('Asia/Makassar');
        $tanggal = date('Y-m-d_h-i-s_');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $gambar_baru = "$tanggal.$nama.$ekstensi";
        $tmp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($tmp, 'image/'.$gambar_baru)){
            $result = mysqli_query($conn, "INSERT INTO kapal (id, nama, deskripsi, harga, gambar) 
            values('', '$nama', '$deskripsi', '$harga', '$gambar_baru')");

            if ($result) {
                echo "
                <script>
                    alert('Data Berhasil DiTambahkan!');
                    document.location.href = 'admin.php'
                </script>";
            }else {
                echo "
                <script>
                    alert('Data Gagal DiTambahkan!');
                    document.location.href = 'tambah.php'
                </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Tambahkan data kapal</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nama">Nama kapal</label>
                <input type="text" name="nama" class="textfield">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" class="textfield">
                <label for="harga">harga kapal</label>
                <input type="text" name="harga" class="textfield">
                <input type="file" name="gambar" class="textfield">
                <input type="submit" name="tambah" value="Tambah Data" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>