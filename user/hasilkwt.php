<html>
<head>
<title>Print Kwitansi</title>
<link rel="stylesheet" type="text/css" href="../css/kwitansi.css">
</head>
<body class="h">
<?php
session_start();
$no=strtoupper($_SESSION['no']);
?>
<div class="a">
<img class ="b" src="/img/<?php echo $_SESSION['lks'] ?>.png">
</div>
<div class="c">NO. Kwitansi :<?php echo $no; ?></div>
<p class ="d"> </p>
<table class="e">
<tr> 
<td>Terima Dari </td>
<td>:</td>
<td><?php echo $_SESSION['pembeli'] ?></td>
</tr>
<tr>
<td>Uang Sejumlah</td>
<td>:</td>
<td><?php echo $_SESSION['uang']?></td>
</tr>
<tr>
<td class="k">Untuk Pembayaran</td>
<td>:</td>
<td><?php echo $_SESSION['informasi']?></td>
</tr>
</table>
<p class="f">Rp <?php echo $_SESSION['jumlah'] ?>,-</p>
<div class="g">Jakarta, <?php echo $_SESSION['date']; ?> </div>
<br>
<div><img src="../img/gunting.png" class="p" ></div>
<div class="q">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
<div class="a">
<img class ="b" src="/img/<?php echo $_SESSION['lks'] ?>.png">
</div>
<div class="c">NO. Kwitansi :<?php echo $no; ?></div>
<p class ="d"> </p>
<table class="e">
<tr> 
<td>Terima Dari </td>
<td>:</td>
<td><?php echo $_SESSION['pembeli'] ?></td>
</tr>
<tr>
<td>Uang Sejumlah</td>
<td>:</td>
<td><?php echo $_SESSION['uang']?></td>
</tr>
<tr>
<td style="width:300px;">Untuk Pembayaran</td>
<td>:</td>
<td><?php echo $_SESSION['informasi']?></td>
</tr>
</table>
<p class="f">Rp <?php echo $_SESSION['jumlah'] ?>,-</p>
<div class="g">Jakarta, <?php echo $_SESSION['date']; ?> </div>
</body>
<script>window.print()</script>
</html>
