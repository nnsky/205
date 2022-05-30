<?php
include "../koneksi.php";
date_default_timezone_set('asia/jakarta');
$user=$_POST['user'];
if($user==null){
	echo '<script type="text/javascript">alert("Gagal Input")</script>
<script>setTimeout(function(){location.href="../logout.php"} , 1); </script>';
}else{
$lokasi=$_POST['lokasi'];
$select="select *from noas";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);

if($array[$lokasi]==0){
	$ticketid=$lokasi.'01';
	$conn->query("update noas set $lokasi='01' ");
}else{
	$angka=$array[$lokasi]+1;
	$ticketid=$lokasi.$angka;
	$conn->query("update noas set $lokasi=0");
	}

$nama=$_POST['nama'];
$kontak=$_POST['kontak'];
$nota=$_POST['nota'];
$sales=$_POST['sales'];
$tglorder=$_POST['tglorder'];
$tglkirim=$_POST['tglkirim'];
$tglkonfrim=$_POST['tglkonfrim'];
$pengiriman=$_POST['pengiriman'];

$status=$_POST['status'];
if($status='pending'){
	$hari=date('d M H:i', strtotime('+1 hours') );
		$jam=date('mdH',strtotime('+1 hours'));
}else{
	$hari=0;
	$jam=0;
}	
$feedback=$_POST['feedback'];
$sfeed=$_POST['sfeed'];
$tglbuat=date('d/m/Y');
$brand=$_POST['brand'];
$type=$_POST['type'];
$jenis=$_POST['jenis'];


$input="insert into asales (nama,kontak,nota,sales,tglorder,tglkirim,tglkonfrim,pengiriman,status,feedback,sfeed,lokasi,user,tglbuat,ticketid,brand,type,jenis,jam,hari) values ('$nama','$kontak','$nota','$sales','$tglorder','$tglkirim','$tglkonfrim','$pengiriman','$status','$feedback','$sfeed','$lokasi','$user','$tglbuat','$ticketid','$brand','$type','$jenis','$jam','$hari')";
$conn->query($input);

echo '<script type="text/javascript">alert("Berhasil")</script>
<script>setTimeout(function(){location.href="trespon.php"} , 1); </script>';
}
?>
