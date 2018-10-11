<?php
session_start();
require_once("db.php");

$id = $_GET["post_id"];
$sql = "DELETE FROM postingan WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    header("Location: daftar_postingan.php");
}else {
    echo "Gagal";
}
?>