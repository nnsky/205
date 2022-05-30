<?php 
include "../koneksikupon.php";

$nama=$_POST['nama'];
$email=$_POST['email'];
$id=$_POST['id'];

$input=$conn->query("update pakai set nama='$nama',email='$email' where id='$id' ");
echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="kupon"},1)</script>';
?>
