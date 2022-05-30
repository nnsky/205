<?php
date_default_timezone_set('asia/jakarta');
session_start();
include "../koneksi.php";
$tanggal=$_POST["tanggal"];
$a=explode("/",$tanggal);
$bulan=$a[2].$a[1];
$dari=$_POST["dari"];
$sampai=$_POST["sampai"];
$real=$dari-1;
  $jumlah= $sampai - $dari;
  $user=$_POST['user'];
  $c=0;
  $b=0;
  $d=0;
  for($i=0;$i<$jumlah;$i++){
	
		  $b += $c+1;
		  $d = $real + $b;
	   $select="select seri,lokasi from voucher where seri=$d && status='Sudah Digunakan' && statvoucher='Aktif'";
	   $query=mysqli_query($conn,$select);
	   $array=mysqli_fetch_array($query);
	   $lokasi=$array["lokasi"];
	   $cekseri=$array['seri'];
	   
	   $selectck="select nota from voucherck where seri=$cekseri";
	   $queryck=mysqli_query($conn,$selectck);
	   $arrayck=mysqli_fetch_array($queryck);
	   $nota=$arrayck['nota'];
		  if($array['seri']==null){
	
		  }else{

		  $insert="insert into notifvoucher (seri,status,lokasi,tanggal,user,bulan,nota)Value ($d,'Kembali','$lokasi','$tanggal','$user',$bulan,'$nota')";
		  $conn->query($insert);
		  $update="update voucher set statvoucher='Tidak Aktif' where seri=$d";
		  $conn->query($update);
	   }
  }
     echo '<script>alert("Berhasil")</script>
	    <script>setTimeout(function(){location.href="vm"},1)</script>';

?>
