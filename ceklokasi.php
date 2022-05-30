<?php
session_start();
if(isset($_POST['lokasi'])){
	$lokasi=$_POST['lokasi'];
	$_SESSION['lokasi']=$lokasi;
	header('location:user/index.php');
}
?>