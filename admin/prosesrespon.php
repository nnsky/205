<?php
include "../koneksi.php";

$lokasi=$_POST['lokasi'];
$sqlid="select *from nomor";
$query = mysqli_query($conn, $sqlid);
$rowid=mysqli_fetch_array($query);
	if($rowid["$lokasi"]==null){
		$rspnid='1';
		$responid=$lokasi.'1';
		$sqlii="insert into nomor (CM,CH,CPG,KG,AL,CPIK,CBEK,CBDG,a,b) VALUES(0,0,0,0,0,0,0,0,0,0)";
		$conn->query($sqlii);
		 $sqli = "UPDATE nomor SET ".$lokasi." =  1 where ".$lokasi." = 0" ;
		$conn->query($sqli);
	}else{
		$a=$lokasi;
		$rspnid=$rowid["$lokasi"]+1;
		$responid=$lokasi.$rspnid;
		$sqli = "UPDATE nomor SET ".$lokasi." = '$rspnid'" ;
			$conn->query($sqli);
	}
date_default_timezone_set('asia/jakarta');
$date=date('d-n-y, G:i');
$date1=date('j F Y');
$date3=date('G');
$minggu=date('W');

$hubungi=$_POST['hubungi'];
$media=$hubungi.' ('.$_POST[$hubungi].')';

if($_POST['sumber']=="Konsumen Sudah Belanja"){
		$sumber=$_POST['sumber']." - ".$_POST['nota'];
}else{
		$sumber=$_POST['sumber'];
	}
$status1=$_POST['timer'];
if($status1=='sekarang'){
	$status='selesai';
	$tanggapan=$date.'<br>'.ucwords($_POST['responsales']).'<br>';
	$no='0';
	$jam1=0;
	$hari=0;
}else{
	$status='pending';
	$hari=date('d M H:i', strtotime('+'.$status1.' hours') );
	$jam=date('mdH',strtotime('+'.$status1.' hours'));
	$tanggapan="";
}
	
$nama=$_POST['title'].' '.ucwords($_POST['nama']);	
$kontak=$_POST['kontak'];
$untuk=$_POST['sales'];
$kategori=$_POST["kategori"];
$asal="Respon";
$nota=$_POST['nota'];
$jam=$jam1;
$hari=$hari3;
$pesan=$date.' | '.ucwords($_POST['pesan']);
$user=$_POST['user'];
$sql = "INSERT INTO respon (responid,tanggal,media,sumber,nama,kontak,untuk,status,status1,lokasi,pesan,tanggapan,jam,hari,no,kategori,nota,user) VALUES('$responid','$date','$media','$sumber','$nama','$kontak','$untuk','$status','$status','$lokasi','$pesan','$tanggapan','$jam','$hari','$no','$kategori','$nota','$user')";
$conn->query($sql);

echo '<script>alert("Berhasil")</script>
<script>setTimeout(function(){location.href="respon.php"},1)</script>';
?>

