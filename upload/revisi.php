<?php
include "../koneksi.php";
$seri=$_POST['seri'];
$lokasi=$_POST['lokasi'];
$jumlah=$_POST['jumlah'];

for($i=0;$i<$jumlah;$i++){
	$inseri=$seri++;
	$select="update voucher set lokasi='$lokasi' where seri='$inseri'";
	$conn->query($select);
}

?>
