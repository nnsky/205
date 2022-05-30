<?php
include "../koneksi.php";
$akun=$db->createCollection('pegawai');
$id=$db->ck_respon_id;
session_start();

$cursor=$id->find();
foreach($cursor as $nik1);
$nik2=$nik1['AKUN'];
$nik3=$nik2+1;
$nik4='CK'.$nik3;
  date_default_timezone_set('Asia/Jakarta');
  if(isset($_POST)){
	  $date=date('l,d F Y');
	  $nik=$nik4;
	  $jk=$_POST['jk'];
	  $nm=$_POST['nama'];
	  $nama=ucwords($nm);
	  $usr=$_POST['username'];
	  $username=strtoupper($usr);
	  $pw=$_POST['password'];
	  $password=strtoupper($pw);
	  $pwu=password_hash($password,PASSWORD_DEFAULT);
	  $lokasi=$_POST['lokasi'];
	  $level=$_POST['level'];
	  $status=$_POST['status'];
	  $admin=$_SESSION['username'];
	  $input=array('_id'=>$nik,'Daftar'=>$date,'jk'=>$jk,'nama'=>$nama,'username'=>$username,'password'=>$pwu,'level'=>$level,'lokasi'=>$lokasi,'admin'=>$admin,'status'=>$status,'logout'=>' ','login'=>' ');
	  $id->update(array('AKUN'=>$nik2),
	  array('$set' =>array('AKUN'=>$nik3)));
	  $akun->insert($input);
	  header('location:daftarakun.php');
}
?>