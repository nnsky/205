<?php
date_default_timezone_set('asia/jakarta');
session_start();
include "../koneksi.php";
$date=date('j F Y');
$id=$_POST['id'];
$tanggapanbaru=$_POST['tanggapan'];
$tanggapanlama=$_POST['tanggapanlama'];
	if($tanggapanlama==null){
		$tanggapan=$tanggapan=$date.'<br>'.ucwords($tanggapanbaru);

	}elseif($tanggapanbaru==null){
		$tanggapan =$tanggapanlama;
	}else{
		$tanggapan=$date.'<br>'.ucwords($tanggapanbaru).'<br>'.$tanggapanlama;
	}
$pesan=$_POST['pesan'];

$select="select * from respon where responid='$id'";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);
$user=$array['user'].','.$_POST['user'];

$nama=$_POST['nama'];
$sumber=$_POST['sumber'];
$kontak=$_POST['kontak'];
$catatan=$_POST['catatan'];
$nota=$_POST['nota'];
$media=$_POST['mediaa'];
$sales=$_POST['sales'];
$status=$_POST['status'];
if($status=='proses'){
	$time=$_POST['time'];
	$hari=date('d M H:i', strtotime('+'.$time.' hours') );
	$jam=date('mdH',strtotime('+'.$time.' hours'));
	}else if($status=='pending'){		
		$hari=date('d M H:i', strtotime('+1 hours') );
		$jam=date('mdH',strtotime('+1 hours'));
	}else{
		$hari=$array['hari'];
		$jam=$array['jam'];
	}
	  $sqli = "UPDATE respon SET catatan='$catatan',jam='$jam',hari='$hari',untuk='$sales',nama='$nama',sumber='$sumber',kontak='$kontak',nota='$nota',media='$media',user='$user',status = '$status',pesan='$pesan',tanggapan = '$tanggapan' WHERE responid = '$id'" ;
	  $conn->query($sqli);
	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="trespon"},1)</script>';
?>
