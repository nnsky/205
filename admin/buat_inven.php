<?php
include "../koneksi.php";
date_default_timezone_set("Asia/Bangkok");
$date=date('dmy');

$type=$_POST['type'];
$nama=$_POST['nama'];
$gudang=$_POST['gudang'];
$lokasi=$_POST['lokasi'];
$jumlah=$_POST['jumlah'];
$status=$_POST['status'];
$tujuan=$_POST['tujuan'];
$user=$_POST['create'];
$detail=$_POST['detail'];


$query=mysqli_query($conn,"select nik from inven_store where nama_cabang='$gudang'");
$array=mysqli_fetch_array($query);
$nik1=$array['nik']+1;
$nik=$gudang.$nik1;

$insert="insert into inven (type,nama,gudang,lokasi,jumlah,status,user,nik,date,detail) value('$type','$nama','$gudang','$lokasi','$jumlah','$status','$user','$nik','$date','$detail')";
$update=$conn->query("update inven_store set nik='$nik1' where nama_cabang='$gudang'");
$input=$conn->query($insert);

echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="inven"},1)</script>';
?>

