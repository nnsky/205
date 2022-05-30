<?php
include '../koneksi.php';
$voucher=$_POST['voucher'];
$seri=$_POST['seri'];
$exp=$_POST['kadaluarsa'];
$svoucher=$_POST['status'];
$lokasi=$_POST['lokasi'];
$user=$_POST['user'];
if($svoucher=='Aktif'){
$status='Belum Digunakan';
}else{
$status='Sudah Digunakan';
}
$x=explode('/',$exp);
$expv=$x[2].$x[1].$x[0];

$input="insert into voucher (voucher,lokasi,exp,status,seri,statvoucher,user,expv) values('$voucher','$lokasi','$exp','$status','$seri','$svoucher','$user','$expv')";
$conn->query($input);

 echo '<script>alert("Berhasil")</script>
 <script>setTimeout(function(){location.href="voucher"},1)</script>';
?>

