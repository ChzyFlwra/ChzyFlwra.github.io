<?php
    require "koneksi.php";

    if (isset($_POST["register"])) {
        $username = strtolower($_POST["username"]);
        $pass = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        if ($pass === $cpassword) {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "SELECT username FROM regis WHERE username = '$username'");

            if (mysqli_fetch_assoc($result)){
                echo "
                <script>
                    alert('Username sudah terdaftar!');
                    document.location.href = 'regis.php';
                </script>";
            }
            else {
                $result = mysqli_query($conn, "INSERT INTO regis VALUES('', '$username', '$pass')");

                if (mysqli_affected_rows($conn) > 0) {
                    echo "
                    <script>
                        alert('Data berhasil ditambahkan, regisrasi berhasil!');
                        document.location.href = 'login.php';
                    </script>";
                }
                else {
                    echo "
                    <script>
                        alert('Data gagal ditambahkan, regisrasi gagal!');
                        document.location.href = 'regis.php';
                    </script>";
                }
            }
        }
        else {
            echo "
            <script>
                alert('Password tidak sama!');
            </script>";
        }
    }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">
        <img src="8k.jpg" alt="">
        <div class="form-container">
            <h1>Masuk</h1><hr>

            <form action="" method ="POST">
                <input type="text" name="username" placeholder="Username" class="textfield" required>
                <input type="password" name="password" placeholder="Password" class="textfield" required>
                <input type="password" name="cpassword" id = "cpassword" placeholder="Confirm Password" autocomplete = "off" class="textfield" required>
                <button type="submit" name="register" class="login-btn"> register </button>
            </form>
        </div>
    </div>
</body>
</html>