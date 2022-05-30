<html>

<head>
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Latest compiled JavaScript -->
<script src="../asset/bootstrap.min.js"></script>
</head>
<style>
@media print{@page{
margin:0;}
body{margin:1.0cm;}
}
hr {
  -moz-border-bottom-colors: none;
  -moz-border-image: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: #EEEEEE -moz-use-text-color #FFFFFF;
  border-style: solid none;
  border-width: 5px 0;
  margin: 0px 0;
}
</style>
<title>View</title>
<body>
<?php
include "../koneksi.php";

$get=$_GET["id"];
$select="select *from quote where id=$get";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);
$a=explode(",",$array["desk"]);
$b=explode(",",$array["jumlah"]);
$c=explode(",",$array["harga"]);
$f=explode(",",$array["diskon"]);
$e=count ($a);

?>
<div class="row">
	<div class="col-sm-5">
	<img src="../img/q3.png" class="img-responsive">
	<b><span>Jl. Pramuka Raya No 168 - 180</span><br>
	<span>Jakarta Pusat 10570</span><br>
	<span>Phone: (021) 4205550 - 4247749 - 4212323 - 4254682</span><br>
	<span>Email: online@chandrakarya.com</span><br>
	<span>Prepared by: <?php echo $array["user"] ?></span><br></b>
	</div>
	<div class="col-sm-3">
	<img src="../img/q4.png" class="img-responsive"><br>
		<b>
		<table style="font-weight: bold;font-size:15px;">
		<tr>
		<td><b>Date</b></td>
		<td style="border:2px solid;"><b><?php echo $array["tanggal"]?></b></td>
		</tr>
		<tr>
		<td><b>QUOTE #</b></td>
		<td style="border:2px solid;"><b><?php echo $array["quote"]?></b></td>
		</tr>
		<tr>
		<td><b>CUSTOMER ID</b></td>
		<td style="border:2px solid;"><b><?php echo $array["customer"]?></b></td>
		</tr>
		<tr>
		<td><b>VALID UNTIL</b></td>
		<td style="border:2px solid;"><b><?php echo $array["berlaku"]?></b></td>
		</tr>
		</table>
		</b>
	</div>
</div>
<div style="clear:both"></div>
<div class="row">
	<div class="col-sm-6">
		<table class="table table-responsive" style="font-weight: bold;font-size:13px;">
		<tr>
		<td style="background-color:#0000CD; color:white;"><center>CUSTOMER</center></td>
		</tr>
		<tr>
		<td><?php echo $array["nama"] ?></td>
		</tr>
		<tr>
		<td><?php echo $array["perusahaan"] ?></td>
		</tr>
		<tr>
		<td><?php echo $array["alamat"]." , ".$array["pos"]?></td>
		</tr>
		<tr>
		<td><?php echo $array["telp"] ?></td>
		</tr>
		</table>
	</div>
	<div class="col-sm-6">
	
	</div>
</div>
<div style="clear:both"></div>
<div class="col-sm-8">
	<table class="table table-bordered" style="border:3px solid">
	<tr style="border:3px solid">
	<td>DESCRIPTION</td>
	<td>Qty</td>
	<td>Unit Price (Rp)</td>
	<td>AMOUNT (Rp)</td>
	</tr>
	<?php
	for ($i=1;$i<$e;$i++){
	$t=str_replace(".","", $c[$i-1]);
	$s=$t*$b[$i-1];
	echo '
	<tr>
	<td>'.$a[$i-1].'</td>
	<td>'.$b[$i-1].'</td>
	<td>'.number_format($c[$i-1],0,'','.').'</td>
	<td>'.number_format($s,0,'','.').'</td>
	</tr>
	';	
	}
	?>
	</table>
	<div class="col-sm-4">
	
	</div>
</div>
<div class="row" style="font-weight: bold;font-size:15px;">
	<div class="col-sm-5">
	<table class="table table-bordered" style="border:3px solid">
	<tr style="background-color:blue;color:white">
	<td><center>TERMS AND CONDITION</center></td>
	</tr>
	<tr>
	<td>
	<p>1. Customer will be billed after indicating acceptance of this quote</p>
	<p>2. Payment will be due prior to delivery of service and goods</p>
	<p>3. Please fax or mail the signed price quote to the address above</p>
	<p>Customer Acceptance (sign below):</p>
	<p></p>
	<p></p>
	<p></p>
	<p>x.<hr></p>
	<p>Print Name : <?php echo $array["nama"]?></p>
	</td>
	</tr>
	</table>
	</div>
	<div class="col-sm-3">
	Subtotal : Rp <?php
	$sub=0;
	for($s=1;$s<$e;$s++){
	$sub += $c[$s-1] * $b[$s-1];	
	}
	echo number_format($sub,0,'','.');
	?>
	<br>
	Disc : Rp <?php
	$dis=0;
	for($s=1;$s<$e;$s++){
	$dis += (($c[$s-1] * $b[$s-1])*$f[$s-1])/100;
		
	}
	echo number_format($dis,0,'','.');
	?>
	<br>
	PPN : Rp 
	<?php
		if($array["ppn"]=="tidak"){
			echo $ppn=0;
		}else{
			echo $ppn = ($sub - $dis)*10/100;
		
		}
	?>
	<hr>
	TOTAL DUE :Rp  <?php
	$due= $sub + $ppn - $dis;
	echo number_format($due,0,'','.');
	?>
	</div>
	<div class="col-sm-4">
	
	</div>
</div>
<div style="clear:both"></div>
<div class="col-sm-8">
<center style="font-weight: bold;font-size:15px;">
<p>If you have any questions about this price quote, please contact</p>
<p>Phone: 021-4205550 (WA) ; E-Mail : online@chandrakarya.com</p><br>
<h3>Thank You For Your Business!</h3>
</center>
</div>
</body>
</html>
