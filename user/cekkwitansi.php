<?php
session_start();
include "../koneksi.php";

date_default_timezone_set('Asia/Jakarta');
if(isset($_POST)){
$nomor=$_POST['no'];
$no=strtoupper($nomor);
$date=date ('j F Y');
echo $lokasi;
$lokasi=$_POST['lokasi'];
$nama1=$_POST['nama'];
$nama=ucwords($nama1);
$jumlah=$_POST['jumlah'];
$uang=$_POST['uang'];
$ug=ucwords($uang);
$perihal="Kwitansi";
$minggu=date('W');
$informasi=$_POST['informasi'];
$infrm=ucwords($informasi);
$sales=$_SESSION['username'];
$kwitansi="INSERT INTO kwitansi (kwitansid,lokasi,nama,jumlah,terbilang,informasi,sales,tanggal) VALUES ('$no','$lokasi','$nama','$jumlah','$ug','$infrm','$sales','$date')";
$conn->query($kwitansi);
$aktifitas="INSERT INTO aktifitas (responid,sales,tanggal,nama,telp,perihal,tnggal,lokasi) VALUES ('$no','$sales','$date','$nama','$jumlah','$perihal','$minggu','$lokasi')";
$conn->query($aktifitas);
echo '<script>alert("Berhasil")</script>
	 <script>setTimeout(function(){location.href="kwitansi.php"},1)</script>';
}
?>
