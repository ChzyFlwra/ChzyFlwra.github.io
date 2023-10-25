<?php
require "koneksi.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM kapal where id=$id");

$kapal = [];

while ($row = mysqli_fetch_assoc($result)) {
    $kapal[] = $row;
}

$kapal = $kapal[0];


if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];

    $result = mysqli_query($conn, "UPDATE kapal SET nama = '$nama', deskripsi='$deskripsi', harga='$harga', gambar='$gambar' WHERE id = '$id' ");

    if ($result) {
        echo "
        <script>
            alert('Data berhasil Diubah!');
            document.location.href = 'admin.php'
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Diubah!');
            document.location.href = 'edit.php'
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Edit Data</h1>
            <hr><br>
            <form action="" method="post">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?php echo $kapal['nama'] ?>" class="textfield">
                <label for="deskripsi">deskripsi</label>
                <input type="text" name="deskripsi" value="<?php echo $kapal['deskripsi'] ?>" class="textfield">
                <label for="harga">harga</label>
                <input type="text" name="harga" value="<?php echo $kapal['harga'] ?>" class="textfield">
                <input type="file" name="gambar" value="<?php echo $kapal['gambar'] ?>"" class="textfield">
                <input type="submit" name="edit" value="Edit Data" class="login-btn">
            </form>
        </div>
    </section>
</body>

</html>