<?php
session_start();
require 'koneksi.php';

if (isset($_POST['masuk'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM regis WHERE username = '$name'");

    // if (mysqli_num_rows($result)===1){a

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($pass, $row['password'])) {
            $_SESSION['logged'] = true; 
            header("Location: admin.php");
            exit();
        }
    }
    $error = true;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
        <div class="chezy"><img src="logoo.png"></li>
        </div>

        <ul class="nav-menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About me</a></li>
            <li><a href="#" onclick="alert('belum bisa')"> News </a></li>
            <li><button><a href="login.php">Sign in</a></button></li>
        </ul>

        <ul id="logo">
            <li><img src="night-mode.png" alt="Logo"></li>
        </ul>
    </div>
    <main>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" class="textfield" required>
            <input type="password" name="password" placeholder="Password" class="textfield" required>
            <div class="remember">
                <!-- <input type="checkbox" name="remember" value="true">
                    <label for="remember">Ingat username ini</label> -->
                <h5>apakah anda ingat password anda ?</h5> <a href="regis.php"> registrasi </a>
            </div>
            <input type="submit" name="masuk" value="Masuk" class="login-btn">
        </form>

    </main>

    <footer>
        <section class="copyright">
            <h2>©copyright designed by CheeZyy</h2>
        </section>
    </footer>

    <script src="script.js"></script>
</body>

</html>