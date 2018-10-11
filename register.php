<?php
session_start();
if(isset($_SESSION["pesan_nama"]) || isset($_SESSION["pesan_nim"]) || isset($_SESSION["pesan_email"])) {
    if(isset($_SESSION["pesan_nama"])) {
        $pesan_nama = $_SESSION["pesan_nama"];
    }else {
        $pesan_nama = "";
    }
    if(isset($_SESSION["pesan_nim"])) {
        $pesan_nim = $_SESSION["pesan_nim"];
    }else {
        $pesan_nim = "";
    }
    if(isset($_SESSION["pesan_email"])) {
        $pesan_email = $_SESSION["pesan_email"];
    }else {
        $pesan_email = "";
    }
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Register</title>
</head>
<body>
	<table align="center" border="1">
		<form action="submit.php" method="post">
			<tr>
				<th>Username</th>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><input type="text" name="nama">
					<?php if(isset($_SESSION["pesan_nama"])) { ?>
					<p><?php echo $pesan_nama ?></p>
					<?php } ?></td>
			</tr>
			<tr>
				<th>Nim</th>
				<td><input type="text" name="nim">
					<?php if(isset($_SESSION["pesan_nim"])) { ?>
                    <p><?php echo $pesan_nim ?></p>
                    <?php } ?>
				</td>
			</tr>
			<tr>
				<th>Kelas</th>
				<td>
					<input type="radio" name="kelas" value="D3MI 41 01">D3MI 41 01<br>
					<input type="radio" name="kelas" value="D3MI 41 02">D3MI 41 02<br>
					<input type="radio" name="kelas" value="D3MI 41 03">D3MI 41 03<br>
					<input type="radio" name="kelas" value="D3MI 41 04">D3MI 41 04<br>
				</td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td>
					<input type="radio" name="jenis_kelamin" value="laki-laki">Laki-laki
					<input type="radio" name="jenis_kelamin" value="perempuan">Perempuan
				</td>
			</tr>
			<tr>
				<th>Hobi</th>
				<td>
					<input type="checkbox" name="hobi[]" value="Olahraga">Olahraga<br>
					<input type="checkbox" name="hobi[]" value="Membaca">Membaca<br>
					<input type="checkbox" name="hobi[]" value="Menulis">Menulis<br>
					<input type="checkbox" name="hobi[]" value="Traveling">Traveling<br>
					<input type="checkbox" name="hobi[]" value="Bermain Musik">Bermain Musik<br>
				</td>
			</tr>
			<tr>
				<th>Fakultas</th>
				<td>
					<select name="fakultas">
						<option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
						<option value="Fakultas Industri Kreatif">Fakultas Industri Kreatif</option>
						<option value="Fakultas Teknik Elektro">Fakultas Teknik Elektro</option>
						<option value="Fakultas Rekayasa Industri Elektro">Fakultas Rekayasa Industri</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><textarea name="alamat" id="" cols="23" rows="5"></textarea></td>
			</tr>
			<tr>
				<td align="right" colspan="2"><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</form>
	</table>
</body>
</html> 