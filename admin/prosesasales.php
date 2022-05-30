<?php
date_default_timezone_set('asia/jakarta');
include "../koneksi.php";

$nama=$_POST['nama'];
$kontak=$_POST['kontak'];
$nota=$_POST['nota'];
$pengiriman=$_POST['pengiriman'];
$sales=$_POST['sales'];
$sfeed=$_POST['sfeed'];
$tglorder=$_POST['tglorder'];
$tglkirim=$_POST['tglkirim'];
$tglkonfrim=$_POST['tglkonfrim'];
$brand=$_POST['brand'];
$type=$_POST['type'];
$jenis=$_POST['jenis'];
$id=$_POST['id'];
$date=date('j F Y');
$tanggapanbaru=$_POST['tanggapan'];
$tanggapanlama=$_POST['tanggapanlama']; 
$feedback=$_POST['feedback']; 

	if($tanggapanlama==null){
		$tanggapan=$tanggapanbaru;

	}elseif($tanggapanbaru==null){
		$tanggapan =$tanggapanlama;
	}else{
		$tanggapan=$date.'<br>'.ucwords($tanggapanbaru).'<br>'.$tanggapanlama;
	}
$username=$_POST['user'];

$select="select user from asales where ticketid='$id'";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);

$user=$username.','.$array['user'];
$status=$_POST['status'];
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
echo $hari;
$sqli = "UPDATE asales SET hari='$hari',jam='$jam',nama='$nama',sales='$sales',sfeed='$sfeed',tglorder='$tglorder',tglkirim='$tglkirim',tglkonfrim='$tglkonfrim',brand='$brand',type='$type',jenis='$jenis',kontak='$kontak',nota='$nota',pengiriman='$pengiriman',feedback='$feedback',status = '$status',respon = '$tanggapan',user='$user' WHERE ticketid = '$id'" ;
$conn->query($sqli);
	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="trespon"},1)</script>';

?>
