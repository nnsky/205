<?php
include "../koneksikupon.php";

$nama=$_POST['nama'];
$stock=$_POST['stock'];
$pakai=$_POST['pakai'];
$exp=$_POST['date'];
$expv=date('ymd', strtotime($exp));

$id=$_POST['id'];
$select=mysqli_query($conn,"select kode_kupon from kupon where id='$id'");
$hasil=mysqli_fetch_array($select);

$nomor1=$pakai+1;
$nomor=sprintf("%02d",$pakai+1);
$kupon_aktif=$hasil['kode_kupon'].$nomor;

$input=$conn->query("update kupon set nama='$nama',stock='$stock',pakai='$pakai',exp='$exp',expv='$expv',kupon_aktif='$kupon_aktif' where id='$id'");
echo "<script type='text/javascript'>alert('Berhasil')</script>
<script>setTimeout(function(){location.href='dkupon'} , 1); </script>";
?>
