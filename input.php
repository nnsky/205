<?php
include "koneksi.php";
$nama=$_POST['nama'];
$email=$_POST['email'];
$hp=$_POST['hp'];
$alamat=$_POST['alamat'];
$nik=$_POST['nik'];
$nota=$_POST['nota']."(".$_POST['diskon'].")";
$belanja=$_POST['belanja'];
$ikut=$_POST['ikut'];
$a=$_POST['datang'];
$datang=$a[0].' '.$a[1].' '.$a[2].' '.$a[3].' '.$a[3];
$date=$_POST['setdate'];
$petugas=$_POST['petugas'];
$jilid="Jilid ".$_POST['jilid'];

if(empty($_POST["very"])){
$status="Belum verifikasi";
$query="insert into lelang (nama,email,hp,ikut,alamat,dtgck,daftar,datang,petugas,peserta,status) Values ('$nama','$email','$hp','$ikut','$alamat','$belanja','$date','$datang','$petugas','$jilid','$status')";
$conn->query($query);
 echo '<script>alert("Berhasil. Peserta Belum Verifikasi")</script>
 <script>setTimeout(function(){location.href="bazaar"},1)</script>';
}else{
$status="Sudah Verifikasi";
$select="select *from lelang where peserta ='".$jilid."' order by kvouc DESC";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);
if($array["kvouc"]==null){
	$kvoucher=200;
	$kode="CK-0200";
}else{
	$kvoucher=$array["kvouc"]+1;
	$kode="CK-0".$kvoucher;
};
$query="insert into lelang (nama,email,hp,nik,nota,ikut,alamat,dtgck,daftar,datang,petugas,kode,kvouc,peserta,status) Values ('$nama','$email','$hp','$nik','$nota','$ikut','$alamat','$belanja','$date','$datang','$petugas','$kode','$kvoucher','$jilid','$status')";
$conn->query($query);
 echo '<script>alert("Berhasil Kode Voucer Adalah '.$kode.'")</script>
 <script>setTimeout(function(){location.href="bazaar"},1)</script>';
	
}
?>

