<?php
include '../koneksi.php';
session_start();
$username=$_SESSION['username'];
$select="select *from akun where username='$username'";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index">Home</a>
    </div>
	
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		<li style="display:<?php if($array['re_v']=="block"){echo 'block';}else{echo 'none';}?>" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="trespon">Respon Pelanggan
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		<li style="display:<?php echo $array['re_v']?>"><a href="trespon">Ticket Respon</a></li>
		<li style="display:<?php echo $array['re_v']?>"><a href="aftersales">After Sales</a></li>
		<li style="display:<?php echo $array['re_v']?>"><a href='respon'>In Store</a></li>
        </ul>
      </li>
		<li style="display:<?php echo $array['kw_v']?>"><a href="kwitansi">Kwitansi</a></li>
		<li style="display:<?php if($array['pl_v']=="block" or $array['ol_v']=="block" or $array['br_v']=='block'){echo 'block';}else{echo 'none';}?>" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Harga
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		<li style="display:<?php echo $array['pl_v']?>"><a href="harga">Pricelist</a></li>
		<li style="display:<?php echo $array['br_v']?>"><a href='brand'>Brand</a></li>
        </ul>
      </li>
	   <li style="display:<?php echo $array['lelang_v']?>"><a href="lelang">Lelang</a></li>
	   <li style="display:<?php if($array['vck_v']=="block"){echo 'block';}else{echo 'none';}?>" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="voucherck">Voucher CK
        <span class="caret"></span></a>
   <ul class="dropdown-menu">
		<li style="display:<?php echo $array['vck_v']?>"><a href="voucherck">Voucher Cashback</a></li>
		<li style="display:<?php echo $array['vck_v']?>"><a href="vketupat">Voucher Ketupat</a></li>
		 <li style="display:<?php echo $array['vck_v']?>"><a href="angpao">Pohon Angpao</a></li>     
   </ul>
      </li>
      <li style="display:<?php echo $array['vck_v']?>"><a href='kupon'>Kupon</a></li>
	   <li style="display:<?php echo $array['pnj_v']?>"><a href="quot">Quote</a></li>
	  <li style="display:<?php echo $array['inv_v']?>"><a href="inven">Inventaris</a></li>
	<li><a href="../logout">Log Out</a></li>
    </div>
  </div>
</nav>

