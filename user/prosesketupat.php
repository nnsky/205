<?php
include '../koneksi.php';
print_R($_POST);
$user=$_POST['user'];

if($user==null){
echo '<script>alert("Voucher Gagal Diinput")</script>
 <script>setTimeout(function(){location.href="../logout"},1)</script>';
}else{
$tanggal=$_POST['tanggal'];
$nota=$_POST['nota'];
$seri=$_POST['seri'];
$select="select *from ketupat where seri='$seri'";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);
$jenis=$array['jenis'];
$lokasi=$array['lokasi'];

$conn->query("insert into vketupat (tanggal,nota,jenis,seri,lokasi,user) values ('$tanggal','$nota','$jenis','$seri','$lokasi','$user')");
$conn->query("update ketupat set status='Terpakai' where seri='$seri'");

echo '<script>alert("Berhasil")</script>
 <script>setTimeout(function(){location.href="vketupat"},1)</script>';
}
?>
