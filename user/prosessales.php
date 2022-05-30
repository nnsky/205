<?php
include "../koneksi.php";
$id=$_POST['id'];
$date=date('j F Y');
$tanggapanbaru=$_POST['tanggapan'];
$tanggapanlama=$_POST['tanggapanlama'];

	if($tanggapanlama==null){
		$tanggapan=$tanggapanbaru;

	}elseif($tanggapanbaru==null){
		$tanggapan =$tanggapanlama;
	}else{
		$tanggapan=$date.'<br>'.ucwords($tanggapanbaru).'<br>'.$tanggapanlama;
	}
	
if($_POST['status']=='Selesai'){
	$status='Proses';
}else{
	$status='Pending';
}
$sqli = "UPDATE asales SET status = '$status',respon = '$tanggapan' WHERE ticketid = '$id'" ;
$conn->query($sqli);

	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="trespon"},1)</script>';

?>
