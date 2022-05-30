\<?php
include '../koneksi.php';
session_start();
$lokasi=$_SESSION["lokasi"];
if($_POST['user']==null or $lokasi==null){
	echo '<script>alert("Voucher Gagal Diinput")</script>
 <script>setTimeout(function(){location.href="../logout"},1)</script>';
}else{
$user=$_POST["user"];
$date=date("Ymd");
$date1=date("d M y");
$minggu=date("Wy");
$voucher=$_POST['voucher'];
$seri=$_POST['seri'];
$nama=$_POST['nama'];
$nota=$_POST['nota'];
$total=$_POST['total'];
$potongan=$_POST['potongan'];
$count=count($seri);
for( $i=0; $i <$count; $i++ )
{
$inseri=$seri[$i];
$input="insert into voucherck (voucher,seri,nama,nota,total,potongan,user,lokasi,date,dateup,minggu) Values ('$voucher','$inseri','$nama','$nota','$total','$potongan','$user','$lokasi','$date','$date1','$minggu')";
$conn->query($input);
$sqli = "UPDATE voucher SET status ='Sudah Digunakan' where seri ='$inseri'" ;
$conn->query($sqli);
}
echo '<script>alert("Berhasil")</script>
 <script>setTimeout(function(){location.href="voucherck"},1)</script>';
}
?>
