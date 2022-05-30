<?php
session_start();
if(empty($_GET)){
	echo '<script type="text/javascript">alert("Anda Harus Login")</script>
<script>setTimeout(function(){location.href="../logout.php"} , 1); </script>';
}else{
	$datemin=$_GET["setdatemin"];
	$datemax=$_GET["setdatemax"];
	
	if($datemin>$datemax){
	echo '<script type="text/javascript">alert("Tanggal Anda Salah")</script>
<script>setTimeout(function(){location.href="voucherck.php"} , 1); </script>';
	}else{
	$_SESSION["datemin"]=$datemin;
	$_SESSION["datemax"]=$datemax;
	header("location:laporan");
	}
}
?>
