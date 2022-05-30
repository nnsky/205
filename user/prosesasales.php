<?php
date_default_timezone_set('asia/jakarta');
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
$status=$_POST['status'];
$time=$_POST['time'];
if($_POST['status']=='selesai'){
	$jam=0;
	$hari=0;
}else if($status=='proses'){
	$hari=date('d M H:i', strtotime('+'.$time.' hours') );
	$jam=date('mdH',strtotime('+'.$time.' hours'));
}else{
	$hari=date('d M H:i', strtotime('+1 hours') );
	$jam=date('mdH',strtotime('+1 hours'));
}

$sqli = "UPDATE asales SET hari='$hari',jam='$jam',status = '$status',respon = '$tanggapan' WHERE ticketid = '$id'" ;
$conn->query($sqli);

echo '<script>alert("Berhasil")</script>
<script>setTimeout(function(){location.href="trespon"},1)</script>';

?>
