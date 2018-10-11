<?php
require_once("db.php");
session_start();

if (isset($_SESSION["user_nim"])) {
    $nim = $_SESSION["user_nim"];
    $sql = "SELECT * FROM mahasiswa1 WHERE nim='$nim'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index</title>
</head>
<body>
<header>
    <table align="center" border="1" bgcolor="yellow">
    <td align="center">
    <a href="halaman_awal.php">Halaman Awal</a> -
    <a href="daftar_postingan.php">Daftar Posting</a> - 
    <a href="semua_postingan.php">Semua Posting</a> - 
    <a href="edit_profile.php">Edit Profil</a> - 
    <a href="form_posting.php">Posting</a> - 
    <a href="logout.php">Logout</a>
    </td>
    </table>
    </header>
    <br>    
    <table align="center" border="1">
        <tr>
            <td>Nama</td>
            <td><?php echo $row["nama"] ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><?php echo $row["nim"] ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td><?php echo $row["kelas"] ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php echo $row["jenis_kelamin"] ?></td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td><?php echo $row["hobi"] ?></td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td><?php echo $row["fakultas"] ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $row["alamat"] ?></td>
        </tr>
    </table>
</body>
</html>
<?php
}else {
    echo "Silahkan Login";
}