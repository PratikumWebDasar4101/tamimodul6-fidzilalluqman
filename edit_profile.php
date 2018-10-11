<?php
require_once("db.php");
session_start();

if(isset($_SESSION["user_nim"])) {
	$nim = $_SESSION["user_nim"];
    $sql = "SELECT * FROM mahasiswa1 WHERE nim=$nim";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
<header>
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
<form action="update.php" method="post">
	<h1 align="center">Edit Profile</h1>
        <table align="center" border="1">
			<tr>
				<th>Nama</th>
				<td>
                    <input type="text" name="nama" value="<?php echo $row["nama"] ?>">
                    <?php if(isset($_SESSION["pesan_nama"])) { ?>
                    <p><?php echo $pesan_nama ?></p>
                    <?php } ?>
                </td>
			</tr>
			<tr>
				<th>Nim</th>
				<td>
                    <input type="text" value="<?php echo $row["nim"] ?>" disabled>
                </td>
			</tr>
			<tr>
				<th>Kelas</th>
				<td>
					<input type="radio" name="kelas" value="D3MI 41 01" <?php if($row["kelas"] == 1):echo "checked"; endif ?>>D3MI 41 01<br>
					<input type="radio" name="kelas" value="D3MI 41 02" <?php if($row["kelas"] == 2):echo "checked"; endif ?>>D3MI 41 02<br>
					<input type="radio" name="kelas" value="D3MI 41 03" <?php if($row["kelas"] == 3):echo "checked"; endif ?>>D3MI 41 03<br>
					<input type="radio" name="kelas" value="D3MI 41 04" <?php if($row["kelas"] == 4):echo "checked"; endif ?>>D3MI 41 01
				</td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td>
					<input type="radio" name="jenis_kelamin" value="laki-laki" <?php if($row["jenis_kelamin"] == "laki-laki"):echo "checked"; endif ?>>Laki-laki
					<input type="radio" name="jenis_kelamin" value="perempuan" <?php if($row["jenis_kelamin"] == "perempuan"):echo "checked"; endif ?>>Perempuan
				</td>
			</tr>
			<tr>
				<th>Hobi</th>
                <?php $hobi = explode(",",$row["hobi"]); ?>
				<td>
					<input type="checkbox" name="hobi[]" value="Olahraga" <?php if(in_array("Olahraga",$hobi)):echo "checked"; endif ?>>Olahraga<br>
					<input type="checkbox" name="hobi[]" value="Membaca" <?php if(in_array("Membaca",$hobi)):echo "checked"; endif ?>>Membaca<br>
					<input type="checkbox" name="hobi[]" value="Menulis" <?php if(in_array("Menulis",$hobi)):echo "checked"; endif ?>>Menulis<br>
					<input type="checkbox" name="hobi[]" value="Traveling" <?php if(in_array("Traveling",$hobi)):echo "checked"; endif ?>>Traveling<br>
					<input type="checkbox" name="hobi[]" value="Bermain Musik" <?php if(in_array("Bermain Musik",$hobi)):echo "checked"; endif ?>>Bermain Musik
				</td>
			</tr>
			<tr>
				<td>Fakultas</td>
				<td>
					<select name="fakultas">
						<option <?php if($row["fakultas"] == "Fakultas Ilmu Terapan"):echo "selected";endif ?>>Fakultas Ilmu Terapan</option>
						<option <?php if($row["fakultas"] == "Fakultas Industri Kreatif"):echo "selected";endif ?>>Fakultas Industri Kreatif</option>
						<option <?php if($row["fakultas"] == "Fakultas Teknik Elektro"):echo "selected";endif ?>>Fakultas Teknik Elektro</option>
						<option <?php if($row["fakultas"] == "Fakultas Rekayasa Industri"):echo "selected";endif ?>>Fakultas Rekayasa Industri</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" id="" cols="23" rows="5"><?php echo $row["alamat"] ?></textarea></td>
			</tr>
			<tr>
                <input type="hidden" name="nim" value="<?php echo $row["nim"] ?>">
				<td colspan="2" align="right"><input type="submit" name="submit" value="Kirim"></td>
			</tr>
        </table>
    </form>
</body>
</html>
<?php 
}else {
    echo "Belum Membuat Akun";
} ?>