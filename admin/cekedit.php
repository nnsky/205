<?php
session_start();
include '../koneksi.php';
date_default_timezone_set('asia/jakarta');
$tgpan=$_POST['tgpan'];
$asal=$_POST['asal'];
$id=$_POST['id'];
if($tgpan=='respon'){
$date=date('j F Y');
$select="select *from respon where responid='".$id."'";
$query=mysqli_query($conn,$select);
$hasil=mysqli_fetch_array($query);
if(empty($_POST['tanggapan'])){
	$tanggapan=$_POST["tanggapan"];
}else{
	$tanggapan=$date.'<br>'.ucwords($_POST["tanggapan"]).'<br>'.$hasil["tanggapan"];
}
$nama=$_POST['nama'];	
$telp=$_POST['telp'];
$status=$_POST['status'];
if($status=='Complete'){
	$status=$status;
	$no='0';
}else{
	$status=$status;
	$no='1';
}

	$sqli = "UPDATE respon SET nama='$nama',kontak='$telp',status = '$status',tanggapan = '$tanggapan',no= '$no' WHERE responid = '$id'" ;
			  $conn->query($sqli);
	  $sql2 = "UPDATE notif SET status = '$status',no= '$no' WHERE responid = '$id'" ;
			  $conn->query($sql2);
	  $sql3 = "UPDATE aktifitas SET status = '$status',no= '$no' WHERE responid = '$id'" ;
			  $conn->query($sql3);
if($asal=="respon"){
	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="respon"},1)</script>';
}else if($asal=="respons"){
	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="respon")</script>';
}
 }elseif($tgpan=='kwitansi'){
	$id=$_POST["id"];
	$select="select * from kwitansi where id='".$id."'";
	$query=mysqli_query($conn,$select);
	$array=mysqli_fetch_array($query);
	
	$nama=ucwords($_POST["nama"]);
	$tgl=$_POST['tgl'];
	$lokasi=$_POST['lokasi'];
	if($lokasi==null){
		$lokasiu=$array["lokasi"];
	}else{
		$lokasiu=$lokasi;
	}
	$jumlah=$_POST['jumlah'];
	$uang=ucwords($_POST['terbilang']);
	$informasi=ucwords($_POST['beli']);
	$idbaru=$_POST['idbaru'];
	$sqli = "UPDATE kwitansi SET kwitansid='$idbaru',nama = '$nama',lokasi='$lokasiu', jumlah ='$jumlah',terbilang ='$uang',informasi ='$informasi',tanggal ='$tgl' WHERE id = '$id'" ;
	$conn->query($sqli);
	echo '<script>alert("Berhasil")</script>
	         <script>setTimeout(function(){location.href="kwitansi"},1)</script>';
	
}elseif($tgpan=='akun'){
	$id=$_POST["id"];
	$select="select * from akun where id ='".$id."'";
	$query=mysqli_query($conn,$select);
	$array=mysqli_fetch_array($query);
	
	$username=$_POST['username'];
	$level=$_POST['level'];
	$status=$_POST['status'];
	$password=$_POST['password'];
	$pass=strtolower($password);
	$pw=password_hash($pass,PASSWORD_DEFAULT);
	$lokasi=$_POST['lokasi'];
	
	if($level==null){
	$levelu=$array['level'];
	}else{
	$levelu=$level;
	}
	if($lokasi==null){
	$lokasiu=$array['lokasi'];
	}else{
	$lokasiu=$lokasi;
	}
	if($status==null){
	$statusu=$array['status'];
	}else{
	$statusu=$status;
	}
	
	if($password==null){
	$passwordu=$array["password"];
	}else{
	$passwordu=$pw;
	
	}
	
	$sqli = "UPDATE akun SET username='$username',password='$passwordu',level = '$levelu', status ='$statusu',lokasi ='$lokasiu' where id ='$id'" ;
	$conn->query($sqli);
	header("location:daftarakun");
}elseif($tgpan=='brand'){
	
	$brand=$_POST['brand'];
	$nama=$_POST['nama'];
	$id=$_POST['id'];
	$sqli = "UPDATE springbed SET brand='$brand',nama='$nama' where id ='$id'" ;
		$conn->query($sqli);
		header("location:brand");
}elseif($tgpan=='voucher'){
	$status=$_POST['status'];
	$statvouc=$_POST['statvouc'];
	
	$select="select *from voucher where id='$id'";
	$query=mysqli_query($conn,$select);
	$array=mysqli_fetch_array($query);
	if($statvouc==null){
	$statvouch=$array["statvoucher"];	
	}else{
	$statvouch=$statvouc;
	}
	if($status==null){
	$instatus=$array["status"];
	}else{
	$instatus=$status;	
	}
	$voucher=$_POST['voucher'];
	$seri= $_POST['seri'];
	$lokasi= $_POST['lokasi'];
	$exp= $_POST['exp'];
	$a=explode('/',$exp);
	$expv=$a[2].$a[1].$a[0];
	
	$user=$_SESSION['username'];


	 $sqli = "UPDATE voucher SET voucher='$voucher',seri='$seri',lokasi='$lokasi',exp='$exp',status='$instatus',statvoucher='$statvouch',user='$user',expv='$expv' where id ='$id'" ;
	 $conn->query($sqli);
	 $sqli = "UPDATE voucherck SET lokasi='$lokasi' where seri ='$seri'" ;
	 $conn->query($sqli);
    echo '<script>alert("Berhasil")</script>
	         <script>setTimeout(function(){location.href="voucher"},1)</script>';
}elseif($tgpan=='voucherck'){
	$voucher=$_POST['voucher'];
	$seri= $_POST['seri'];
	$serilama=$_POST["serilama"];
	$nama=$_POST['nama'];
	$nota=$_POST['nota'];
	$total=$_POST['total'];
	$potongan=$_POST['potongan'];
	$user=$_SESSION['username'];
if($seri==$serilama){ //kalau seri voucher lama dan baru sama
		$serib=$seri;
	$sqli = "UPDATE voucherck SET voucher='$voucher',seri='$serib',nama='$nama',nota='$nota',total='$total',potongan='$potongan',user='$user' where id ='$id'" ;
	 $conn->query($sqli);
     echo '<script>alert("Berhasil")</script>
	         <script>setTimeout(function(){location.href="voucherck"},1)</script>';
	}else{
		$select="select *from voucher where seri='$seri'"; //no seri tidak ada di database
		$query=mysqli_query($conn,$select);
		$array=mysqli_fetch_array($query);
		if($array["status"]=="Sudah Digunakan" && $array["statvoucher"]=="Aktif"){
			echo '<script>alert("GAGAL... NO SERI SUDAH DIGUNAKAN")</script>
	         <script>setTimeout(function(){location.href="voucherck"},1)</script>';
		}elseif($array["status"]=="Sudah Digunakan" && $array["statvoucher"]=="Tidak Aktif"){
			echo '<script>alert("GAGAL... NO SERI Tidak Dapat Digunakan")</script>
	         <script>setTimeout(function(){location.href="voucherck"},1)</script>';
		}elseif($array["status"]=="Belum Digunakan" && $array["statvoucher"]=="Aktif"){
			$serib=$seri;
			$lokasi=$array["lokasi"];
			$sqli = "UPDATE voucherck SET voucher='$voucher',seri='$serib',nama='$nama',nota='$nota',total='$total',potongan='$potongan',user='$user',lokasi='$lokasi' where id ='$id'" ;
			$conn->query($sqli);
			$sqlilama="Update voucher set status='Belum Digunakan' where seri='$serilama'";
			$conn->query($sqlilama);
			$sqlibaru="Update voucher set status='Sudah Digunakan' where seri='$serib'";
			$conn->query($sqlibaru);
echo '<script>alert("GAGAL... NO SERI Tidak Dapat Digunakan")</script>
	         <script>setTimeout(function(){location.href="voucherck"},1)</script>';
		}else{
			echo '<script>alert("GAGAL... NO SERI Tidak Dapat Digunakan")</script>
	         <script>setTimeout(function(){location.href="voucherck"},1)</script>';
		}
		
	}
}elseif($tgpan=='harga'){
$id=$_POST['id'];
$sql="SELECT * FROM harga where id = '$id'";
$query = mysqli_query($conn, $sql);
$hasil=mysqli_fetch_array($query);

$ck=$_POST['ck'];
$presmi=$_POST['presmi'];
$jualck=$_POST['jualck'];
$date=date('dm');
$userck=$_POST['user'];

if($ck == $hasil['ck']){
	$cks=$ck;
	$userck=$hasil['userck'];
	$dateck=$hasil['dateck'];
	
}else{
	$cks=$ck;
	$userck=$userck;
	$dateck=$date;
	
}

if($presmi == $hasil['presmi']){
	$presmi1=$presmi;
	$userpresmi=$hasil['userpresmi'];
	$datepresmi=$hasil['datepresmi'];
	$disctokped1=$hasil["disctok"];
	$discbl1=$hasil["discbl"];
	$disclazada1=$hasil["disclazada"];
}else{ //tidak sama
	$presmi1=$presmi;
	$userpresmi=$userck;
	$datepresmi=$date;
		
		$presmi2= str_replace(".", "", $presmi1);
		$disctok= str_replace(".", "", $hasil["tokped"]);
		$discbl= str_replace(".", "", $hasil["bl"]);
		$disclazada= str_replace(".", "", $hasil["lazada"]);
		$a=(1-($disctok/$presmi2))*100;
		$disctokped1=number_format($a,2,'.',',')."%";
		$b=(1-($discbl/$presmi2))*100;
		$discbl1=number_format($b,2,'.',',')."%";
		$c=(1-($disclazada/$presmi2))*100;
		$disclazada1=number_format($c,2,'.',',')."%";
}
if($jualck == $hasil['jualck']){
	$jualck1=$jualck;
	$userjualck=$hasil['userjualck'];
	$datejualck=$hasil['datejualck'];
	
}else{
	$jualck1=$jualck;
	$userjualck=$userck;
	$datejualck=$date;
	
}

		$sql="UPDATE harga SET ck = '$cks',presmi='$presmi1',datepresmi='$datepresmi',userpresmi ='$userpresmi',jualck='$jualck1',userjualck = '$userjualck',datejualck = '$datejualck',dateck = '$dateck',userck = '$userck',disctok='$disctokped1',discbl='$discbl1',disclazada = '$disclazada1' Where id ='$id'";
		$conn->query($sql);
		echo '<script>alert("Berhasil")</script>
	         <script>setTimeout(function(){location.href="harga"},1)</script>';
	}elseif($tgpan=="online"){
$id=$_POST['id'];
$sql="SELECT * FROM harga where id = '$id'";
$query = mysqli_query($conn, $sql);
$hasil=mysqli_fetch_array($query);

$ck=$_POST['ck'];
$tokped=$_POST['tokped'];
$linktokped=$_POST['linktokped'];
$bl=$_POST['bl'];
$linkbl=$_POST['linkbl'];
$date=date('dm');
$lazada=$_POST['lazada'];
$linklazada=$_POST['linklazada'];
$userck=$_SESSION['username'];

if($ck == $hasil['ck'] && $userck==$hasil['userck']){
	$cks=$ck;
	$userck=$hasil['userck'];
	$dateck=$hasil['dateck'];
	
}else{
	$cks=$ck;
	$userck=$userck;
	$dateck=$date;
	
}
$tokoped=$_POST['tokotokped'];
if($tokped == $hasil['tokped'] && $linktokped==$hasil['linktokped'] && $tokoped==$hasil['tokotokped']){
	$tokpeds=$tokped;
	$linktokpeds=$linktokped;
	$usertokped=$hasil['usertok'];
	$datetokped=$hasil['datetokped'];
	$tokotokped=$hasil['tokotokped'];
}else{
	$tokpeds=$tokped;
	$linktokpeds=$linktokped;
	$usertokped=$userck;
	$datetokped=$date;
	$tokotokped=$tokoped;
}
$tokob=$_POST['tokobl'];
if($bl == $hasil['bl'] && $linkbl==$hasil['linkbl'] && $tokob==$hasil['tokobl']){
	$bls=$bl;
	$linkbls=$linkbl;
	$userbl=$hasil['userbl'];
	$datebl=$hasil['datebl'];
	$tokobl=$hasil['tokobl'];
}else{
	$bls=$bl;
	$linkbls=$linkbl;
	$userbl=$userck;
	$datebl=$date;
	$tokobl=$tokob;
}
$tokola=$_POST['tokolazada'];
if($lazada == $hasil['lazada'] && $linklazada==$hasil['linklazada'] && $tokola==$hasil['tokolazada']){
	$lazadas=$lazada;
	$linklazadas=$linklazada;
	$userlazada=$hasil['userlazada'];
	$datelazada=$hasil['datelazada'];
	$tokolazada=$hasil['tokolazada'];
}else{
	$lazadas=$lazada;
	$linklazadas=$linklazada;
	$userlazada=$userck;
	$datelazada=$date;
	$tokolazada=$tokola;
}	
$presmi=$_POST['presmi'];
if($presmi==0 or $presmi==null){
		$disctokped="0%";
		$discbl="0%";
		$disclazada="0%";
	}else{
		$tokped1= str_replace(".", "", $tokpeds);
		$presmi1= str_replace(".", "", $presmi);
		$bl1= str_replace(".", "", $bls);
		$lazada1= str_replace(".", "", $lazadas);
		
		$a=(1-($tokped1/$presmi1))*100;
		$disctokped=number_format($a,2,'.',',')."%";
		$b=(1-($bl1/$presmi1))*100;
		$discbl=number_format($b,2,'.',',')."%";
		$c=(1-($lazada1/$presmi1))*100;
		$disclazada=number_format($c,2,'.',',')."%";
	};

if($tokpeds==0 or $tokpeds==null){
	$tokpedst=999999999;
}else
	$tokpedst=$tokpeds;
if($bls==0 or $bls==null){
	$blst=999999999;
}else
	$blst=$bls;
if($lazadas==0 or $lazadas==null){
	$lazadast=999999999;
}else
	$lazadast=$lazadas;

$a=min($cks,$tokpedst,$blst,$lazadast);
if($a==$cks){
	$status="Termurah";
}else
	$status="Bersaing";

 $sql="UPDATE harga SET ck = '$cks',tokped='$tokpeds',linktokped='$linktokpeds',bl ='$bls',linkbl='$linkbls',lazada = '$lazadas',linklazada = '$linklazadas',dateck = '$dateck',datetokped = '$datetokped',datebl='$datebl',datelazada='$datelazada',userck = '$userck',usertok = '$usertokped',userbl = '$userbl',userlazada = '$userlazada',status ='$status',disctok='$disctokped',discbl='$discbl',disclazada='$disclazada',tokotokped='$tokotokped',tokobl='$tokobl',tokolazada='$tokolazada' Where id ='$id'";
    $conn->query($sql);
     echo '<script>alert("Berhasil")</script>
	         <script>setTimeout(function(){location.href="online"},1)</script>';
	  
	
	}elseif($tgpan=='lelang'){
	$id=$_POST["id"];
	$nama=$_POST["nama"];
	if(empty($_POST["very"])){
	$update="update lelang set nama='$nama' where id='$id'";
	$conn->query($update);
	echo '<script>alert("Berhasil")</script>
 <script>setTimeout(function(){location.href="lelang"},1)</script>';
	
	}else{
		
	$status="Sudah Verifikasi";
	$select="select *from lelang where id='$id'";
	$query=mysqli_query($conn,$select);
	$array=mysqli_fetch_array($query);
	
	$select1="select *from lelang where peserta ='".$array["peserta"]."' order by kvouc DESC";
	$query1=mysqli_query($conn,$select1);
	$array1=mysqli_fetch_array($query1);
	
	if($array1["kvouc"]==null){
	$kvoucher=200;
	$kode="CK-0200";
	}else{
	$kvoucher=$array1["kvouc"]+1;
	$kode="CK-0".$kvoucher;
	}; 
	$update="update lelang set nama='$nama',status='$status',kode='$kode',kvouc='$kvoucher' where id='$id'";
	$conn->query($update);
	echo '<script>alert("Berhasil Kode Voucer Adalah '.$kode.'")</script>
	<script>setTimeout(function(){location.href="lelang"},1)</script>';
	
	}
	}elseif($tgpan=="quot"){
		$tanggal=$_POST['tanggal'];
$quote=strtoupper($_POST["quote"]);
$berlaku=$_POST['berlaku'];
$customer=strtoupper($_POST["customer"]);
$nama=ucwords($_POST["nama"]);
$perusahaan=strtoupper($_POST["perusahaan"]);
$alamat=ucwords($_POST['alamat']);
$pos=$_POST["pos"];
$telp=$_POST["telp"];
if($_POST['ppn']=='tidak'){
		$ppn=$_POST['ppn'];
}else{
		$ppn=str_replace(".","",$_POST['total']);
}
$desk=$_POST["desk"]; $stringdesk = "";
$jumlah=$_POST['jumlah']; $stringjumlah = "";
$term=$_POST["term"];$stringterm = "";
$note=$_POST['note'];
$bank=$_POST['bank'];
$harga=str_replace(".","",$_POST['harga']); $stringharga = "";
$diskon=$_POST["diskon"]; $stringdiskon = "";
$x=explode("/",$berlaku);
$exp=$x[2].$x[0].$x[1];
$user=$_SESSION["username"];
$id=$_POST['id'];

foreach($desk as $key => $value){
	$stringdesk .= $value.",";	
	}
	
foreach($term as $key => $value){
	$stringterm .= $value."^";	
	}
	
foreach($jumlah as $key => $value){
		$stringjumlah .= $value.",";	
}

foreach($harga as $key => $value){
		$stringharga .= $value.",";	
}
foreach($diskon as $key => $value){
		$stringdiskon .= $value.",";	
}
if(empty($_POST["desk1"][0])){
	$fstringdesk=$stringdesk;
	$fstringjumlah=$stringjumlah;
	$fstringharga=$stringharga;
	$fstringdiskon=$stringdiskon;
}else{
	$desk1=$_POST["desk1"];$stringdesk1="";
	foreach($desk1 as $key => $value){
	$stringdesk1 .= $value.",";	
	}
	$fstringdesk=$stringdesk.$stringdesk1;
	
	
	$jumlah1=$_POST["jumlah1"];$stringjumlah1="";
	foreach($jumlah1 as $key => $value){
	$stringjumlah1 .= $value.",";	
	}
	$fstringjumlah=$stringjumlah.$stringjumlah1;
	
	$harga1=str_replace(".","",$_POST["harga1"]);$stringharga1="";
	foreach($harga1 as $key => $value){
	$stringharga1 .= $value.",";	
	}
	$fstringharga=$stringharga.$stringharga1;
	
	$diskon1=$_POST["diskon1"];$stringdiskon1="";
	foreach($diskon1 as $key => $value){
	$stringdiskon1 .= $value.",";	
	}
	$fstringdiskon=$stringdiskon.$stringdiskon1;	
	}
	
$update="update quote set tanggal='$tanggal',quote='$quote',customer='$customer',nama='$nama',perusahaan='$perusahaan',alamat='$alamat',pos='$pos',telp='$telp',ppn='$ppn',desk='$fstringdesk',jumlah='$fstringjumlah',harga='$fstringharga',diskon='$fstringdiskon',exp='$exp',berlaku='$berlaku',user='$user',note='$note',term='$stringterm',bank='$bank' where id='$id'";
$conn->query($update);
header("location:editquot?id=$id");
	}
?>


