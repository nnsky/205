<?php
include "../koneksi.php";

$seri=$_POST["serivoucher"];
$select="select *from voucher where seri=$seri";
$cari=mysqli_query($conn,$select);
$select=mysqli_fetch_array($cari);

$day=date('Ymd');

if($select["seri"]==null){
	header('location:voucherck?&info=1');
	}else{
	
	if($select['status']=="Belum Digunakan"){
		header('location:voucherck?&info=2');
		
	}else if($select['status']=='Sudah Digunakan' && $select['expv'] >= $day){
		header('location:voucherck?&info=1');
	}else{
		header('location:voucherck?&info=2');
	
	}
}
	
?>
