<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

	$lokasi=$_POST['lokasi'];
	$sqlid="select *from nomor";
	$query = mysqli_query($conn, $sqlid);
	$rowid=mysqli_fetch_array($query);
	if($rowid["$lokasi"]==null){
		$rspnid='1';
		$responid=$lokasi.'1';
		$sqlii="insert into nomor VALUES(1,0,0,0,0,0,0,0,0)";
		$conn->query($sqlii);
		$sqli = "UPDATE nomor SET CM =  1 where CM = 0" ;
			$conn->query($sqli);
	}else{
		$a=$lokasi;
		$rspnid=$rowid["$lokasi"]+1;
		$responid=$lokasi.$rspnid;
		$sqli = "UPDATE nomor SET ".$lokasi." = '$rspnid'" ;
			$conn->query($sqli);
	}
	
	$date=date('j F Y, G:i');
$date1=date('j F Y');
$date3=date('G');

if($date3 <= 10){
	$waktu = 'Selamat Pagi';
}elseif($date3 <= 15){
	$waktu = 'Selamat Siang';
}elseif($date3 <=17){
	$waktu = 'Selamat Sore';
}else {
	$waktu = 'Selamat Malam';
}

$sumber=$_POST['sumber'];
$sumber1=$_POST['sumber1'];
if($sumber=='Other'){	
	$sumber2=$sumber.'('.$sumber1.')';
}else{
		$sumber2=$sumber;
}
$hubungi=$_POST['hubungi'];
$a=$_POST['NT'];
$b=$_POST['WA'];
$c=$_POST['SMS'];
$d=$_POST['Email'];
$e=$_POST['BBM'];

if($hubungi=='Telepon'){
	$media=$hubungi.'('.$a.')';
}elseif($hubungi=='Whatsapp'){
	$media='WA('.$b.')';
}elseif($hubungi=='Sms'){
	$media=$hubungi.'('.$c.')';
}elseif($hubungi=='Email'){
	$media=$hubungi.'('.$d.')';
}elseif($hubungi=='BBM'){
	$media=$hubungi.'('.$e.')';
}

$status1=$_POST['timer'];
if($status1=='sekarang'){
	$status='Complete';
	$tanggapan1=$_POST['responsales'];
	$tanggapan2=$date.'<br>'.ucwords($tanggapan1).'<br>';
	$no='0';
	$jam1=0;
	$hari3=0;
}elseif($status1=='1'){
	$status='Pending';
	$jam1=date('G')+$status1;
	$hari3=date('ynd');
	$tanggapan2="";
	$no='1';
}elseif($status1=='2'){
	$status='Pending';
	$jam1=date('G')+$status1;
	$hari3=date('ynd');
	$tanggapan2="";
	$no='1';
}elseif($status1=='3'){
	$status='Pending';
	$jam1=date('G')+$status1;
	$hari3=date('ynd');
	$tanggapan2="";
	$no='1';
}elseif($status1=='4'){
	$status='Pendings';
	$hari1=date('d')+1;
	if($hari1 <= date('t')){
	$hari3=date('ynd')+1;
	$tanggapan2="";
	$no='1';
}else{
	$abcs=date('n')+1;
	$hari2=date('y').$abcs.'01';
	if($abcs>=13){
		$hari3= date('y')+1 .'01'.'01';
		$tanggapan2="";
		$no='1';
	}else{
		$hari3=$hari2;
		$tanggapan2="";
		$no='1';
	}
	}
}

if(isset($_POST)){
	$nma=$_POST['nama'];
	$nam=ucwords($nma);
	$title=$_POST['title'];
	$nama=$title.' '.$nam;
	$tanggapan=$tanggapan2;
	$kontak=$_POST['kontak'];
	$untuk=$_POST['sales'];
	$asal="Respon";
	$jam=$jam1;
	$hari=$hari3;
	$pesan1=$_POST['pesan'];
	$pesan=ucwords($pesan1);
	$keterangan=$waktu.' Memberitahu Kepada sales '.$untuk.' Diharapkan Segera Memberikan Respon Kepada '.$nama;
	$synopsis=ucwords($keterangan);
	$aktifitas="INSERT INTO aktifitas (responid,sales,tanggal,nama,telp,perihal,tnggal,status,jam,hari,no,lokasi) VALUES ('$responid','$untuk','$date1','$nama','$kontak','$asal','tes','$status','$jam','$hari','$no','$lokasi')";
	$conn->query($aktifitas);
	$notif="INSERT INTO notif (responid,date,asal,sales,nama,status,keterangan,no) VALUES ('$responid','$date','$asal','$untuk','$nama','$status','$synopsis','$no')";
	$conn->query($notif);
	$sql = "INSERT INTO respon (responid,tanggal,media,sumber,nama,kontak,untuk,status,status1,lokasi,pesan,tanggapan,jam,hari,no) VALUES('$responid','$date','$media','$sumber2','$nama','$kontak','$untuk','$status','$status','$lokasi','$pesan','$tanggapan','$jam','$hari','$no')";
	$conn->query($sql);
	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="respon.php"},1)</script>';
}else{
	header('location:../logout');
}
?>