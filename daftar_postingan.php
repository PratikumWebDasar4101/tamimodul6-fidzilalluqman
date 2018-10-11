<?php
require_once("db.php");
session_start();

$nim = $_SESSION["user_nim"];

$sql = "SELECT * FROM postingan WHERE nim=$nim";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Post</title>
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
 <table align="center" border=1>
        <tr>
            <td>Judul</td>
            <td>Isi</td>
            <td>Gambar</td>
            <td>Aksi</td>
        </tr>
    <?php 
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {       
    ?>
        <tr>
            <td><b><?php echo $row["judul"] ?></b></td>
            <td><?php echo implode(" ",array_slice(explode(" ",$row["isi"]), 0, 5)) . "..." ?></td>
            <td align="center"><img height="60px" width="100px" border="1" src="uploads/<?php echo $row['gambar'] ?>" alt=""></td>
            <?php $id = $row["id"] ?>
            <td>
                <a href="formUpdate_postingan.php?post_id=<?php echo $id ?>">Edit</a> | 
                <a href="delete.php?post_id=<?php echo $id ?>">Delete</a>
            </td>
        </tr>
    <?php 
        }
    }
    ?>
    </table>
</body>
</html>