<?php
include "../koneksi103.php";
session_start();
if($_POST['perihal']==null){
	echo '<script>setTimeout(function(){location.href="../logout.php"} , 1); </script>';
		$conn->close();
}else if($_POST['perihal']=="qvangpao"){
	$date=date('dmY');
	$nama=ucwords($_POST['nama']);
	$nik=$_POST['nik'];
	$hp=$_POST['hp'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$kdpkt=$_POST['kdpkt'];
	$matt=$_POST['matt'];
	$sofa=$_POST['sofa'];
	$qual=$_POST['qual'];
	$tglmatt=$_POST['tglmatt'];
	$tglsofa=$_POST['tglsofa'];
	$tglqual=$_POST['tglqual'];

		if($tglqual==null){
			$tglqualbaru=$date;
		}else{
			$tglqualbaru=$tglqual;
		}
	if($tglmatt==null){
			$tglmattbaru=$date;
		}else{
			$tglmattbaru=$tglmatt;
		}
	if($tglsofa==null){
			$tglsofabaru=$date;
		}else{
			$tglsofabaru=$tglsofa;
		}
		
	$serilama=$_POST['serilama'];	
	$seribaru=$_POST['seri'];	
	$sv="select *from dbvoucher where seri='$seribaru'";
	$qv=mysqli_query($conn,$sv);
	$fv=mysqli_fetch_array($qv);
		if($serilama==null){

			if($fv['status']=='terpakai'){
			echo '<script>alert("Gagal")</script>
			<script>setTimeout(function(){location.href="vangpao"},1)</script>';
			$point=0;
			}else{
				$seri=$seribaru;
			$point=1;
			}
	}else{
		$seri=$seribaru;
		$point=1;
	}
		
	if($point==0){
		
	}else{
		
	$mselect="select *from dbkonsumen where seri='$seri'";
	$mquery=mysqli_query($conn,$mselect);
	$ma=mysqli_fetch_array($mquery);
	$lokasi=$_POST['lokasi'];
	$user=$_POST['user'];
	$paket=$kdpkt;
	if($ma['notam'] == $matt){
	}else{	
	$conn->query("insert into dbpemakaian (tanggal,paket,kdpkt,cabang,seri,nota,user) value ('$tglmattbaru','$paket','$kdpkt','$lokasi','$seri','$matt','$user')");
	$conn->query("insert into dbpemakaianvoucher (tanggal,seri,nota,cabang,user) value('$tglmattbaru','$seri','$matt','$lokasi','$user')");
	}
	if($ma['notas']==$sofa){
	}else{
	$conn->query("insert into dbpemakaian (tanggal,paket,kdpkt,cabang,seri,nota,user) value ('$tglsofabaru','$paket','$kdpkt','$lokasi','$seri','$sofa','$user')");		
	$conn->query("insert into dbpemakaianvoucher (tanggal,seri,nota,cabang,user) value('$tglsofabaru','$seri','$sofa','$lokasi','$user')");	
	}
	if($ma['notaq']==$qual){
	}else{
	$conn->query("insert into dbpemakaian (tanggal,paket,kdpkt,cabang,seri,nota,user) value ('$tglqualbaru','$paket','$kdpkt','$lokasi','$seri','$sofa','$user')");
	$conn->query("insert into dbpemakaianvoucher (tanggal,seri,nota,cabang,user) value('$tglqualbaru','$seri','$qual','$lokasi','$user')");	
	}
	$id=$_POST['id'];
	$conn->query("update dbkonsumen set nama='$nama',nik='$nik',hp='$hp',email='$email',alamat='$alamat',notam='$matt',notas='$sofa',notaq='$qual',seri='$seri',tanggalm='$tglmatt',tanggals='$tglsofa',tanggalq='$tglqual' where id='$id'");
	$conn->query("update dbvoucher set status='terpakai' where seri='$seri'");
	$brand=$fv['brand'];
	$conn->query("update dbpenyerahan set brand='$brand',seri='$seri' where kdpkt='$kdpkt'");
	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="vangpao"},1)</script>';
}
}
?>
