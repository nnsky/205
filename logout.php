<html>
<?php
date_default_timezone_set('Asia/Jakarta');
$date = date("j F Y");
include 'koneksi.php';
session_start();

$username=$_SESSION["username"];
$update="update akun set login='".$date."' where username='".$username."' ";
$conn->query($update);

session_destroy();
header("location:index");
?>
</html>

