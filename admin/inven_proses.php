<?php
include "../koneksi.php";

$user=$_POST['create'];
$lokasi=$_POST['lokasi'];
$jenis=$_POST['jenis'];

if($_POST['tambahan']==''){
	$type=$_POST[$jenis];
	
}else{
	$type=$_POST['tambahan'];
	$conn->query("insert into inven_jenis (jenis,type) value ('$jenis','$type')");
}

$cari=mysqli_query($conn,"select kode from inven order by id desc");

if($cari->num_rows==0){
	$kode_produk='CK0001';
	$kode=1;
}else {
	$hasil=mysqli_fetch_array($cari);
	$kode=$hasil['kode']+1;
	$kode_produk='CK'.sprintf("%04d",$kode);
}

$conn->query("insert into inven (jenis,type,kode_produk,store,user,kode) value ('$jenis','$type','$kode_produk','$lokasi','$user','$kode')");
$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk,user) values ('$jenis','$type','LT Basement','$lokasi',0,0,0,'','$kode_produk','$user')");
$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk,user) values ('$jenis','$type','LT 2','$lokasi',0,0,0,'','$kode_produk','$user')");
$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk,user) values ('$jenis','$type','LT 3','$lokasi',0,0,0,'','$kode_produk','$user')");
$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk,user) values ('$jenis','$type','LT 4','$lokasi',0,0,0,'','$kode_produk','$user')");
$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk,user) values ('$jenis','$type','LT 5','$lokasi',0,0,0,'','$kode_produk','$user')");
$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk,user) values ('$jenis','$type','LT 6','$lokasi',0,0,0,'','$kode_produk','$user')");

if($lokasi=='gck'){
	$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk) values ('$jenis','$type','LT 7','$lokasi',0,0,0,'','$kode_produk','$user')");
	$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk) values ('$jenis','$type','LT 8','$lokasi',0,0,0,'','$kode_produk','$user')");
	$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk) values ('$jenis','$type','LT 9','$lokasi',0,0,0,'','$kode_produk','$user')");
	$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk) values ('$jenis','$type','LT 10','$lokasi',0,0,0,'','$kode_produk','$user')");
	$conn->query("insert into inven_stock (jenis,type,lokasi,store,stock,terpakai,rusak,catatan,kode_produk) values ('$jenis','$type','LT 11','$lokasi',0,0,0,'','$kode_produk','$user')");
}else{

}

echo "<script type='text/javascript'>alert('Berhasil')</script>
              <script>setTimeout(function(){location.href='inven'} , 1); </script>";
?>


