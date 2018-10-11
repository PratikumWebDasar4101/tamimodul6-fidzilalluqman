<?php
session_start();
require_once("db.php");

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT username, password, nim, nama FROM mahasiswa1 WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        header("Location: halaman_awal.php");
        $_SESSION["user_nim"] = $row["nim"];
        $_SESSION["user_nama"] = $row["nama"];
        $_SESSION["logged_in"] = true;
    }else {
        $_SESSION["pesan_login"] = "Username atau password salah atau tidak ditemukan";
        header("Location: login.php");
    }
}else {
    header("Location: login.php");
}