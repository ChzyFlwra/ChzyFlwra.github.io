<?php
require "koneksi.php";
$id = $_GET['id'];


$result = mysqli_query($conn,"DELETE FROM kapal WHERE id = '$id'");

if ($result) {
    echo "
    <script>
        alert('Data berhasil Dihapus!');
        document.location.href = 'admin.php'
    </script>";
} else {
    echo "
    <script>
        alert('Data Gagal Dihapus!');
        document.location.href = 'admin.php'
    </script>";
}

?>