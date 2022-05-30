<?php
date_default_timezone_set('asia/jakarta');
session_start();
include "../koneksi.php";
$date=date('j F Y');
$id=$_POST['id'];

		$select="select *from respon where responid='$id'";
		$query=mysqli_query($conn,$select);
		$array=mysqli_fetch_array($query);
		
$tanggapanbaru=$_POST['tanggapan'];
$tanggapanlama=$_POST['tanggapanlama'];
	if($tanggapanlama==null){
		$tanggapan=$tanggapan=$date.'<br>'.ucwords($tanggapanbaru);

	}elseif($tanggapanbaru==null){
		$tanggapan =$tanggapanlama;
	}else{
		$tanggapan=$date.'<br>'.ucwords($tanggapanbaru).'<br>'.$tanggapanlama;
	}
	$status=$_POST['status'];
	$catatan=$_POST['catatan'];
	$time=$_POST['time'];
	if($status=='proses'){
	$hari=date('d M H:i', strtotime('+'.$time.' hours') );
	$jam=date('mdH',strtotime('+'.$time.' hours'));
	}else if($status=='pending'){		
		$hari=date('d M H:i', strtotime('+1 hours') );
		$jam=date('mdH',strtotime('+1 hours'));
	}else{
		$hari=$array['hari'];
		$jam=$array['jam'];
	}
	  if(isset($_POST)){	
	  $user=$array['user'].','.$_POST['user'];
	  
	  $sqli = "UPDATE respon SET catatan='$catatan',hari='$hari',jam='$jam',status = '$status',tanggapan = '$tanggapan',user='$user' WHERE responid = '$id'" ;
	  $conn->query($sqli);
	  }
	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="trespon"},1)</script>';
?>

