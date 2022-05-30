<?php
include '../koneksi.php';
$id=$_POST['id'];
$cek="select *from dbkonsumen where id='$id'";
$qcek=mysqli_query($conn,$cek);
$acek=mysqli_fetch_array($qcek);

$nama=$_POST['nama']; $nik=$_POST['nik'];
$hp=$_POST['hp']; $email=$_POST['email'];
$kdpkt=$_POST['kdpkt']; $seri=$_POST['seri'];
$matt=$_POST['matt']; $tanggalm=$_POST['tanggalm'];
$sofa=$_POST['sofa'];$tanggals=$_POST['tanggals'];
$qual=$_POST['qual'];$tanggalq=$_POST['tanggalq'];
$lokasi=$_POST['lokasi'];$alamat=$_POST['alamat'];
$user=$_POST['user'];

if($kdpkt==$acek['kdpkt']){
echo 'kdpkt sama';
}else{	
	$kdpktlama=$acek['kdpkt'];
	$conn->query("update dbkonsumen set kdpkt='$kdpkt' where id='$id'");
	$conn->query("update dbkupon set status='terpakai' where kdpkt='$kdpkt'");
	$conn->query("update dbpenyerahan set kdpkt='$kdpkt' where kdpkt='$kdpktlama'");
	$conn->query("update dbkupon set status='aktif' where kdpkt='$kdpktlama'");
	$conn->query("update dbpemakaian set kdpkt='$kdpkt' where kdpkt='$kdpktlama'");
	}
if($seri==$acek['seri']){
echo 'seri sama';
}else{
	$serilama=$acek['seri'];
	$conn->query("update dbvoucher set status='terpakai' where seri='$seri'");
	$conn->query("update dbvoucher set status='aktif' where seri='$serilama'");
	$conn->query("update dbkonsumen set seri='$seri' where seri='$id'");
	$conn->query("update dbpenyerahan set seri='$seri' where='$kdpkt'");
	$conn->query("update dbpemakaianvoucher set seri='$seri' where seri='$serilama'");
}

if($acek['notam']==$matt){
	
}else{
	if($acek['notam']==null){
	$conn->query("update dbkonsumen set notam='$matt',tanggalm='$tanggalm' where id='$id'");
	$conn->query("insert into dbpemakaian (tanggal,paket,kdpkt,cabang,seri,nota,user) value ('$tanggalm','$kdpkt','$kdpkt','$lokasi','$seri','$matt','$user')");
	$conn->query("insert into dbpemakaianvoucher (tanggal,seri,nota,cabang,user) value ('$tanggalm','$seri','$matt','$lokasi','$user')");
	}else{
		
	}
	$mattlama=$acek['notam'];
	$conn->query("update dbpemakaian set nota='$matt',tanggal='$tanggalm' where nota='$mattlama'");
	$conn->query("update dbpemakaianvoucher set nota='$matt',tanggal='$tanggalm' where nota='$mattlama'");

}

if($acek['notas']==$sofa){
	
}else {
	
	if($acek['notam']==null){
	$conn->query("update dbkonsumen set notas='$sofa',tanggals='$tanggals' where id='$id'");
	$conn->query("insert into dbpemakaian (tanggal,paket,kdpkt,cabang,seri,nota,user) value ('$tanggals','$kdpkt','$kdpkt','$lokasi','$seri','$sofa','$user')");
	$conn->query("insert into dbpemakaianvoucher (tanggal,seri,nota,cabang,user) value ('$tanggals','$seri','$sofa','$lokasi','$user')");
	}else{
	}
	$sofalama=$acek['notas'];
	$conn->query("update dbpemakaian set nota='$sofa',tanggal='$tanggals' where nota='$sofalama'");
	$conn->query("update dbpemakaianvoucher set nota='$sofa',tanggal='$tanggals' where nota='$sofalama'");
}

if($qual==$acek['notaq']){
	echo 'quality sama';
}else{
	
		if($acek['notaq']==null){
	$conn->query("update dbkonsumen set notaq='$qual',tanggalq='$tanggalq' where id='$id'");
	$conn->query("insert into dbpemakaian (tanggal,paket,kdpkt,cabang,seri,nota,user) value ('$tanggalq','$kdpkt','$kdpkt','$lokasi','$seri','$quall','$user')");
	$conn->query("insert into dbpemakaianvoucher (tanggal,seri,nota,cabang,user) value ('$tanggalq','$seri','$qual','$lokasi','$user')");
	}else{
	
	}
	$quallama=$acek['notaq'];
	$conn->query("update dbpemakaian set nota='$qual',tanggal='$tanggalq' where nota='$quallama'");
	$conn->query("update dbpemakaianvoucher set nota='$qual',tanggal='$tanggalq' where nota='$quallama'");
	}

$conn->query("update dbkonsumen set nama='$nama',nik='$nik',hp='$hp',alamat='$alamat',email='$email' where id='$id'");

echo '<script type="text/javascript">alert("Berhasil")</script>
		<script>setTimeout(function(){location.href="vangpao"} , 1); </script>';	

?>
