<?php  
session_start();
require_once("db.php");

if(isset($_POST["submit"])) {
    $username       = $_POST["username"];
    $password       = $_POST["password"];
    $nama 			= $_POST["nama"];
    $nim 			= $_POST["nim"];
    $kelas 			= $_POST["kelas"];
    $jenis_kelamin 	= $_POST["jenis_kelamin"];
    $hobi 			= $_POST["hobi"];
    $fakultas 		= $_POST["fakultas"];
    $alamat 		= $_POST["alamat"];

$inputlagi = "<br><a href='register.php'>Input Lagi</a>";
$br = "<br>";
if (strlen($nama) > 35 || $nama == "") {
		$_SESSION["pesan_nama"] = "Nama harus 35 huruf.";
		header("Location: register.php");
	}
if (!is_numeric($nim) || strlen((string)$nim) > 10) {
		$_SESSION["pesan_nim"] = "Nim harus 10 angka";
		header("Location: register.php");
}else {
        $sql = "INSERT INTO mahasiswa1 VALUES ('$password','$username','$nama',$nim,'$kelas','$jenis_kelamin','" . implode(",",$hobi) . "','$fakultas','$alamat')";

        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            header("Location: login.php");
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>