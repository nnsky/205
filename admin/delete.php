<?php

include "../koneksi.php";

$id=$_GET['_id'];
$perihal=$_GET['perihal'];
$asal=$_GET['asal'];

if($perihal=="respon" && $asal=='respon'){	
	$sql = "delete from respon where responid='$id'" ;
	 $conn->query($sql);
	 $sqli = "delete from aktifitas where responid='$id'" ;
	 $conn->query($sqli);
	 $sqlii = "delete from notif where responid='$id'" ;
	 $conn->query($sqlii);
	header('location:respon');
}elseif($perihal=='Respon' && $asal=='respons'){
	$sql = "delete from respon where responid='$id'" ;
	 $conn->query($sql);
	 $sqli = "delete from aktifitas where responid='$id'" ;
	 $conn->query($sqli);
	 $sqlii = "delete from notif where responid='$id'" ;
	 $conn->query($sqlii);
	header('location:searchs?&page='.$_GET["page"].'&asal='.$_GET["asal"].'&cari='.$_GET["cari"].'&search='.$_GET["search"].'');
}elseif($perihal=='Respon' && $asal=='index'){
	$sql = "delete from respon where responid='$id'" ;
	 $conn->query($sql);
	 $sqli = "delete from aktifitas where responid='$id'" ;
	 $conn->query($sqli);
	 $sqlii = "delete from notif where responid='$id'" ;
	 $conn->query($sqlii);
	header('location:index.php');
}elseif($perihal=='Kwitansi' && $asal=='kwitansi'){
	 $sql = "delete from kwitansi where kwitansid='$id'" ;
	 $conn->query($sql);
	 $sqli = "delete from aktifitas where responid='$id'" ;
	 $conn->query($sqli);
	header('location:kwitansi?&page='.$_GET["page"].'');
}elseif($perihal=='Kwitansi' && $asal=='kwitansis'){
	 $sql = "delete from kwitansi where kwitansid='$id'" ;
	 $conn->query($sql);
	 $sqli = "delete from aktifitas where responid='$id'" ;
	 $conn->query($sqli);
	header('location:searchs?&page='.$_GET["page"].'&asal='.$_GET["asal"].'&cari='.$_GET["cari"].'&search='.$_GET["search"].'');
}elseif($perihal=='Kwitansi' && $asal=='index'){
	 $sql = "delete from kwitansi where kwitansid='$id'" ;
	 $conn->query($sql);
	 $sqli = "delete from aktifitas where responid='$id'" ;
	 $conn->query($sqli);
	header('location:index');
}elseif($perihal=='akun'){
		 $sql = "delete from akun where id='$id'" ;
	 $conn->query($sql);
	header('location:daftarakun');
}elseif($perihal=='brand'){
		 $sql = "delete from springbed where id='$id'" ;
	 $conn->query($sql);
	header('location:brand');
	
}elseif($perihal=='harga'){
	$sql="delete from harga where id='$id'";
	$conn->query($sql);
	header("location:harga");
}elseif($perihal=='online'){
	$sql="delete from harga where id='$id'";
	$conn->query($sql);
	header("location:online");
}elseif($perihal=='voucher'){
	$sql="delete from voucher where id='$id'";
	$conn->query($sql);
	header("location:voucher");
}elseif($perihal=='voucherck'){
	$sql="delete from voucherck where id='$id'";
	$seri=$_GET["seri"];
	$sqli = "UPDATE voucher SET status='Belum Digunakan' where seri ='$seri'" ;
	$conn->query($sql);
	$conn->query($sqli);
	header("location:voucherck");
}elseif($perihal=='quot'){
	$hapus="delete from quote where id=$id";
	$conn->query($hapus);
	header('location:quot');
}
?>
