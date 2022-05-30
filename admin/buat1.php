<?php
session_start();
include '../koneksi.php';
$perihal=$_POST['perihal'];
date_default_timezone_set('asia/jakarta');

if($_POST['perihal']==null){
	echo '<script>setTimeout(function(){location.href="../logout.php"} , 1); </script>';
		$conn->close();
}else if($_POST['perihal']=="vangpao"){
	$nama=ucwords ($_POST['gelar'].' '.$_POST['nama']);
	$nik=$_POST['nik'];
	$date=date('dmY');
	$cari="select nik from dbkonsumen where nik='$nik' && tanggal='$date'";
	$qcari=mysqli_query($conn,$cari);
	$acari=mysqli_fetch_array($qcari);
	if($acari['nik']==null){
	$hp=$_POST['hp'];
	$lokasi=$_POST['lokasi'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$paket=$_POST['paket'];
	$kdpkt=$_POST['k'.$paket];
	$seri=$_POST[$paket]; //menentukan seri yang di pakai
	$user=$_POST['user'];
	$matt=$_POST['matt'];
	$sofa=$_POST['sofa'];
	$qual=$_POST['qual'];
	$tglmatt=$_POST['tglmatt'];
	$tglsofa=$_POST['tglsofa'];
	$tglqual=$_POST['tglqual'];
	$conn->query("insert into dbkonsumen (nama,nik,hp,email,alamat,kdpkt,seri,notam,notas,notaq,tanggalm,tanggals,tanggalq,user,tanggal,cabang) VALUE('$nama','$nik','$hp','$email','$alamat','$kdpkt','$seri','$matt','$sofa','$qual','$tglmatt','$tglsofa','$tglqual','$user','$date','$lokasi')");
	$conn->query("update dbvoucher set status='terpakai' where seri='$seri'");
	$conn->query("update dbkupon set status='terpakai' where kdpkt='$kdpkt'");
	$sbrand="select brand from dbvoucher where seri='$seri'";
	$qbrand=mysqli_query($conn,$sbrand);
	$abrand=mysqli_fetch_array($qbrand);
	$brand=$abrand['brand'];
	
		if($tglqual==null){
			$tglqualbaru=$date;
		}else{
			$tglqualbaru=$tglqual;
		}
	if($tglmatt==null){
			$tglmattbaru=$date;
		}else{
			$tglmattbaru=$tglmatt;
		}
	if($tglsofa==null){
			$tglsofabaru=$date;
		}else{
			$tglsofabaru=$tglsofa;
		}
	
	if($brand=='all(matrass,sofa,quality)'){
		$jenis=$brand;
	}else{
		$jenis='Matress';
	}
	$conn->query("insert into dbpenyerahan (tanggal,paket,jenis,brand,cabang,seri,kdpkt,user) VALUE ('$date','$paket','$jenis','$brand','$lokasi','$seri','$kdpkt','$user')");
	if($matt==null){
		
	}else{
		$conn->query("insert into dbpemakaian (tanggal,paket,kdpkt,cabang,seri,nota,user) value('$tglmattbaru','$paket','$kdpkt','$lokasi','$seri','$matt','$user')");
	    $conn->query("insert into dbpemakaianvoucher (tanggal,seri,nota,cabang,user) value('$tglmattbaru','$seri','$matt','$lokasi','$user')");
	};
	if($sofa==null){
		
	}else{
		$conn->query("insert into dbpemakaian (tanggal,paket,kdpkt,cabang,seri,nota,user) value('$tglsofabaru','$paket','$kdpkt','$lokasi','$seri','$sofa','$user')");
		$conn->query("insert into dbpemakaianvoucher (tanggal,seri,nota,cabang,user) value('$tglsofabaru','$seri','$sofa','$lokasi','$user')");
	}
	if($qual==null){
		
	}else{
		$conn->query("insert into dbpemakaian (tanggal,paket,kdpkt,cabang,seri,nota,user) value('$tglqualbaru','$paket','$kdpkt','$lokasi','$seri','$qual','$user')");
		$conn->query("insert into dbpemakaianvoucher (tanggal,seri,nota,cabang,user) value('$tglqualbaru','$seri','$qual','$lokasi','$user')");
	}		
	echo '<script type="text/javascript">alert("Berhasil")</script>
		<script>setTimeout(function(){location.href="vangpao"} , 1); </script>';		
		
	}else{
	echo '<script type="text/javascript">alert("Gagal. Konsumen sudah menggambil voucher hari ini")</script>
		<script>setTimeout(function(){location.href="vangpao"} , 1); </script>';
	}
	
}
?>
