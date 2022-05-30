<?php
include '../koneksiremote.php';
$user=$_POST['user'];
$nama=$_POST['nama'];
$tanggal=$_POST['tanggal'];
$nota=$_POST['nota'];
$jenis=$_POST['jenis'];
$seri=$_POST[$jenis];
$lokasi=$_POST['lokasi'];


if($user=='' or $jenis=='kosong'){
	echo '<script type="text/javascript">alert("gagal")</script>
	<script>setTimeout(function(){location.href="../logout.php"} , 1); </script>';
} else{
	$sql="insert into vangpao (nama,tanggal,nota,jenis,seri,lokasi,user) values ('$nama','$tanggal','$nota','$jenis','$seri','$lokasi','$user')";
	$conn->query($sql);
	$ssql="update stangpao set status='Tidak Aktif' where seri='$seri' && jenis='$jenis'";
	$conn->query($ssql);
	echo '<script type="text/javascript">alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="angpao"} , 1); </script>';
}
?> 
