<?php
session_start();
include '../koneksi.php';

$id=$_GET['id'];
$sql="select *from kwitansi where id = '$id'";
$query = mysqli_query($conn, $sql);
$hasil=mysqli_fetch_array($query); 

$lks=strtoupper($hasil['lokasi']);
$tgl=$hasil['tanggal'];
$no=$hasil['kwitansid'];
$beli=strtoupper($hasil['nama']);
$jumlah=$hasil['jumlah'];
$uang=ucwords($hasil['terbilang']);
$informasi=ucwords($hasil['informasi']);
?>
<html>
<head>
<title>Print Kwitansi</title>
<link rel="stylesheet" type="text/css" href="../css/kwitansi.css">
</head>
<body class="h">
<div class="a">
<img class ="b" src="../img/<?php echo $lks ?>.png">
</div>
<span style='margin-left:-100px; font-size:15px;'>PT. Chandra Karya Pramuka</span>
<span style='margin-left:-100px; font-size:15px;'>Jl.Pramuka Raya No. 180 RT.006 RW.002 Rawasari</span>
<span style='margin-left:-100px; font-size:15px;'>Jakarta Pusat, DKI Jakarta</span>
<span style='margin-left:-100px; font-size:15px;'>NPWP : 03.163.760.6-024.000</span>
<span style='margin-left:-100px; font-size:15px;'>NO. Kwitansi :<?php echo $no; ?></span>
<p class ="d"> </p>
<table class="e">
<tr> 
<td>Terima Dari </td>
<td>:</td>
<td><?php echo $beli ?></td>
</tr>
<tr>
<td>Uang Sejumlah</td>
<td>:</td>
<td><?php echo $uang?></td>
</tr>
<tr>
<td style="width:300px;">Untuk Pembayaran</td>
<td>:</td>
<td><?php echo $informasi?></td>
</tr>
</table>
<p class="f">Rp <?php echo $jumlah ?>,-</p>
<div class="g">Jakarta, <?php echo $tgl; ?> </div>
<br>
<div><img src="../img/gunting.png" class="p" ></div>
<div class="q">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
<div class="a">
<img class ="b" src="../img/<?php echo $lks ?>.png">
</div>
<span style='margin-left:-100px; font-size:20px;'>NO. Kwitansi :<?php echo $no; ?></span>
<p class ="d"> </p>
<table class="e">
<tr> 
<td>Terima Dari </td>
<td>:</td>
<td><?php echo $beli ?></td>
</tr>
<tr>
<td>Uang Sejumlah</td>
<td>:</td>
<td><?php echo $uang?></td>
</tr>
<tr>
<td style="width:300px;">Untuk Pembayaran</td>
<td>:</td>
<td><?php echo $informasi?></td>
</tr>
</table>
<p class="f">Rp <?php echo $jumlah ?>,-</p>
<div class="g">Jakarta, <?php echo $tgl; ?> </div>
</body>
<script>window.print()</script>
</html>
