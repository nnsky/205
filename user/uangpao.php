<?php
include '../koneksi.php';

$id=$_GET['id'];
$nama=$_POST['nama'];
$tanggal=$_POST['tanggal'];
$nota=$_POST['nota'];
$update=$_POST['update'];

if($update =='ya'){
	$x=explode("|",$_POST['jenislama']);
	$jlama=$x[0];
	$slama=$x[1];
	
	$jenis=$_POST['jenis'];
	$seri=$_POST[$jenis];
	
	$update="update stangpao set status='terpakai' where jenis='$jenis' && seri='$seri'";
	$conn->query($update);
	$update1="update stangpao set status='aktif' where jenis='$jlama' && seri='$slama'";
	$conn->query($update1);
	$update2="update vangpao set jenis='$jenis',seri='$seri' where id='$id'";
	$conn->query($update2);
}else{
	
}

$up="update vangpao set nama='$nama',tanggal='$tanggal',nota='$nota' where id='$id'";
$conn->query($up);

echo '<script>alert("Berhasil")</script>
	   <script>setTimeout(function(){location.href="angpao"},1)</script>';

?>
