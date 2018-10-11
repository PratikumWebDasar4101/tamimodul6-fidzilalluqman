<?php
session_start();
if(isset($_SESSION["pesan_login"])) {
    $pesan_login = $_SESSION["pesan_login"];
}else {
    $pesan_login = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <form action="proses_login.php" method="post">
        <h2 align="center">Masuk</h2>
        <?php if(isset($_SESSION["pesan_login"])) { ?>
        <p><?php echo $pesan_login; ?></p>
        <?php } ?>
        <table align="center" border="1">
            <tr>
                <th>Username</th>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td align="left" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="register.php">Registrasi</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="submit" value="Masuk"></td>
            </tr>
        </table>
    </form>
</body>
</html>