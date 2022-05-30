<?php
session_start();
include '../koneksi.php';
$perihal=$_POST['perihal'];
date_default_timezone_set('asia/jakarta');
$minggu=date('Wy');

if($perihal=="akun"){
$username=$_POST['username'];
$us=strtolower($username);
$password=$_POST['password'];
$pw1=strtolower($password);
$pw=password_hash($pw1,PASSWORD_DEFAULT);	
$level=$_POST['level'];	
$lokasi=$_POST['lokasi'];
$status=$_POST['status'];	
$sql="SELECT * FROM akun where username = '$username' ";
$query = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query);
if ($username == $row['username']){
	echo '<script type="text/javascript">alert("Username Sudah Terdaftar")</script>
<script>setTimeout(function(){location.href="daftarakun.php"} , 1); </script>';
$conn->close();
}else{
$sql = "INSERT INTO akun (username,password,level,lokasi,status,re_v,kw_v,pl_v,ol_v,lelang_v,akun_v,br_v) VALUES('$us','$pw','$level','$lokasi','$status','none','none','none','none','none','none','none')";
$conn->query($sql);
$conn->close();
echo '<script type="text/javascript">alert("Pendaftaran Anda Berhasil")</script>
<script>setTimeout(function(){location.href="daftarakun.php"} , 1); </script>';
	}
}elseif($perihal=='Respon'){
	$lokasi=$_POST['lokasi'];
	$sqlid="select *from nomor";
	$query = mysqli_query($conn, $sqlid);
	$rowid=mysqli_fetch_array($query);
	if($rowid["$lokasi"]==null){
		$rspnid='1';
		$responid=$lokasi.'1';
		$sqlii="insert into nomor (CM,CH,CPG,KG,AL,CPIK,CBEK,CBDG,a,b) VALUES(0,0,0,0,0,0,0,0,0,0)";
		$conn->query($sqlii);
		 $sqli = "UPDATE nomor SET ".$lokasi." =  1 where ".$lokasi." = 0" ;
		$conn->query($sqli);
	}else{
		$a=$lokasi;
		$rspnid=$rowid["$lokasi"]+1;
		$responid=$lokasi.$rspnid;
		$sqli = "UPDATE nomor SET ".$lokasi." = '$rspnid'" ;
			$conn->query($sqli);
	}
date_default_timezone_set('asia/jakarta');
$date=date('d n y, G:i');
$date1=date('j F Y');
$date3=date('G');
 $minggu=date('W');

if($date3 <= 10){
	$waktu = 'Selamat Pagi';
}elseif($date3 <= 15){
	$waktu = 'Selamat Siang';
}elseif($date3 <=17){
	$waktu = 'Selamat Sore';
}else {
	$waktu = 'Selamat Malam';
}

$sumber=$_POST['sumber'];
$sumber1=$_POST['sumber1'];

if($sumber=='Other'){	
	$sumber2=$sumber.'('.$sumber1.')';
}else{
		$sumber2=$sumber;
}
$hubungi=$_POST['hubungi'];
$a=$_POST['NT'];
$b=$_POST['WA'];
$c=$_POST['SMS'];
$d=$_POST['Email'];
$e=$_POST['BBM'];

if($hubungi=='Telepon'){
	$media=$hubungi.'('.$a.')';
}elseif($hubungi=='Whatsapp'){
	$media='WA('.$b.')';
}elseif($hubungi=='Sms'){
	$media=$hubungi.'('.$c.')';
}elseif($hubungi=='Email'){
	$media=$hubungi.'('.$d.')';
}elseif($hubungi=='BBM'){
	$media=$hubungi.'('.$e.')';
}

$status1=$_POST['timer'];
if($status1=='sekarang'){
	$status='Complete';
	$tanggapan1=$_POST['responsales'];
	$tanggapan2=$date.'<br>'.ucwords($tanggapan1).'<br>';
	$no='0';
	$jam1=0;
	$hari3=0;
}elseif($status1=='1'){
	$status='Pending';
	$jam1=date('G')+$status1;
	$hari3=date('ynd');
	$tanggapan2="";
	$no='1';
}elseif($status1=='2'){
	$status='Pending';
	$jam1=date('G')+$status1;
	$hari3=date('ynd');
	$tanggapan2="";
	$no='1';
}elseif($status1=='3'){
	$status='Pending';
	$jam1=date('G')+$status1;
	$hari3=date('ynd');
	$tanggapan2="";
	$no='1';
}elseif($status1=='4'){
	$status='Pendings';
	$hari1=date('d')+1;
	if($hari1 <= date('t')){
	$hari3=date('ynd')+1;
	$tanggapan2="";
	$no='1';
}else{
	$abcs=date('n')+1;
	$hari2=date('y').$abcs.'01';
	if($abcs>=13){
		$hari3= date('y')+1 .'01'.'01';
		$tanggapan2="";
		$no='1';
	}else{
		$hari3=$hari2;
		$tanggapan2="";
		$no='1';
	}
	}
}
	$nma=$_POST['nama'];
	$nam=ucwords($nma);
	$title=$_POST['title'];
	$nama=$title.' '.$nam;
	$tanggapan=$tanggapan2;
	$kontak=$_POST['kontak'];
	$untuk=$_POST['sales'];
	$kategori=$_POST["kategori"];
	$asal="Respon";
	$nota=$_POST['nota'];
	$jam=$jam1;
	$hari=$hari3;
	$pesan1=$_POST['pesan'];
	$pesan=ucwords($pesan1);
	$keterangan=$waktu.' Memberitahu Kepada sales '.$untuk.' Diharapkan Segera Memberikan Respon Kepada '.$nama;
	$synopsis=ucwords($keterangan);
	$aktifitas="INSERT INTO aktifitas (responid,sales,tanggal,nama,telp,perihal,tnggal,status,jam,hari,no,lokasi) VALUES ('$responid','$untuk','$date1','$nama','$kontak','$kategori','$minggu','$status','$jam','$hari','$no','$lokasi')";
	$conn->query($aktifitas);
	$notif="INSERT INTO notif (responid,date,asal,sales,nama,status,keterangan,no) VALUES ('$responid','$date','$asal','$untuk','$nama','$status','$synopsis','$no')";
	$conn->query($notif);
	$sql = "INSERT INTO respon (responid,tanggal,media,sumber,nama,kontak,untuk,status,status1,lokasi,pesan,tanggapan,jam,hari,no,kategori,nota) VALUES('$responid','$date','$media','$sumber2','$nama','$kontak','$untuk','$status','$status','$lokasi','$pesan','$tanggapan','$jam','$hari','$no','$kategori','$nota')";
	$conn->query($sql);
	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="respon.php"},1)</script>';
}elseif($perihal=="Kwitansi"){
		$date=date("ynd");
	$lokasi=$_POST['lokasi'];
	$select="select *from nokwn";
	
	$query=mysqli_query($conn,$select);
	$array=mysqli_fetch_array($query);
	$noid=$array[$lokasi]+1;
	$no=$lokasi.'/'.$date.'/'.$noid;
	$update="update nokwn set ".$lokasi."=".$noid." where ".$lokasi."=".$array[$lokasi]."";
	$conn->query($update);
	
	$nama=ucwords($_POST["nama"]);
	$jumlah=$_POST['jumlah'];
	$uang=ucwords($_POST['uang']);
	$info=ucwords($_POST['informasi']);
	$sales=$_POST["sales"];
	$datenew=date ('j F Y');
	$kwitansi="INSERT INTO kwitansi (kwitansid,lokasi,nama,jumlah,terbilang,informasi,sales,tanggal) VALUES ('$no','$lokasi','$nama','$jumlah','$uang','$info','$sales','$datenew')";
	$conn->query($kwitansi);
	echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="kwitansi"},1)</script>';
}elseif($perihal=='brand'){
$brand  = $_POST['brand'];
$type = $_POST['type'];
$count = count($brand);
 for( $i=0; $i <$count; $i++ )
{
	$inbrand=$brand[$i];
	$intype=$type[$i];
	$select="select *from springbed where brand ='".$inbrand."' && nama='".$intype."'";
	$prevResult = $conn->query($select);
                if($prevResult->num_rows > 0){
					
				}else{
	$sql   = "INSERT INTO springbed (brand,nama) VALUES ('$inbrand','$intype')";
	$conn->query($sql);
				}
}
echo '<script>alert("Berhasil")</script>
	<script>setTimeout(function(){location.href="brand"},1)</script>';
}elseif($perihal=='harga'){
$brand=$_POST['brand'];
$jenis=$_POST['jenis'];
if($brand=='Alga'){
	$type=$_POST['alga'];
}elseif($brand=='Spring Air'){
	$type=$_POST['SA'];
}elseif($brand=='Comforta'){
	$type=$_POST['Comforta'];
}elseif($brand=='Florence'){
	$type=$_POST['Florence'];
}elseif($brand=='Serta'){
	$type=$_POST['serta'];
}elseif($brand=='King Koil'){
	$type=$_POST['kingkoil'];
}elseif($brand=='Airland'){
	$type=$_POST['airland'];
}elseif($brand=='Cosisoft'){
	$type=$_POST['cosisoft'];
}elseif($brand=='Dreamline'){
	$type=$_POST['dreamline'];
}elseif($brand=='Dunlopillo'){
	$type=$_POST['dunlopillo'];
}elseif($brand=='Elite'){
	$type=$_POST['elite'];
}elseif($brand=='Lady Americana'){
	$type=$_POST['lady'];
}elseif($brand=='Romance'){
	$type=$_POST['romance'];
}elseif($brand=='Therapedic'){
	$type=$_POST['therapedic'];
}elseif($brand=='Theraspine'){
	$type=$_POST['theraspine'];
}elseif($brand=='Sleep Dream'){
	$type=$_POST['sleep'];
}elseif($brand=='Silent Night'){
	$type=$_POST['silent'];
}elseif($brand=='Superland'){
	$type=$_POST['superland'];
}elseif($brand=='Simmons'){
	$type=$_POST['simmons'];
}elseif($brand=='Bigland'){
	$type=$_POST['bigland'];
}elseif($brand=="Protect A Bed"){
	$type=$_POST['type'];
}elseif($_POST['type']=='Guling' or $_POST['type']=='Bantal'){
	$type=$_POST['type'];
}
$date=date('dm');
$user=$_POST['user'];
$brand=$_POST['brand'];
	$presmi=$_POST['presmi'];
	$netto=$_POST['netto'];
	$jual=$_POST['jual'];
  if($jenis=='springbed'){
	$size=$_POST['size'];
  $set=$_POST['set'];
  $nama=$brand.' '.$type.' '.$size.' '.$set;
  $sp="select *from harga where nama='$nama'";
		$qsp=mysqli_query($conn, $sp);
		$hsp=mysqli_fetch_array($qsp);
		$id=$hsp['id'];
			if($hsp['nama']==null){
			 $sql="insert into harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,presmi,jualck,userpresmi,userjualck,datepresmi,datejualck,status) Value ('$nama','$netto','0','0','0','0','0','0','$date','0','0','0','$user','0','0','0','$presmi','$jual','$user','$user','$date','$date','Termurah')";
			 $conn->query($sql);
				}else{
			 $sql="UPDATE harga SET ck='$netto',userck='$user',dateck='$date',presmi ='$presmi',userpresmi='$user',datepresmi='$date',jualck='$jual',userjualck='$user',datejualck='$date' WHERE id = '$id'" ;
			 $conn->query($sql);
			};
	 echo '<script>alert("Berhasil")</script>
	    <script>setTimeout(function(){location.href="harga"},1)</script>';
  }elseif($jenis=='pab'){
		$size=$_POST['size'];
		$nama=$brand.' '.$type.' '.$size;
		$sp="select *from harga where nama='$nama'";
		$qsp=mysqli_query($conn, $sp);
		$hsp=mysqli_fetch_array($qsp);
		$id=$hsp['id'];
			if($hsp['nama']==null){
			 $sql="insert into harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,presmi,jualck,userpresmi,userjualck,datepresmi,datejualck) Value ('$nama','$netto','0','0','0','0','0','0','$date','0','0','0','$user','0','0','0','$presmi','$jual','$user','$user','$date','$date')";
			 $conn->query($sql);
			 }else{
			 $sql="UPDATE harga SET ck='$netto',userck='$user',dateck='$date',presmi ='$presmi',userpresmi='$user',datepresmi='$date',jualck='$jual',userjualck='$user',datejualck='$date' WHERE id = '$id'" ;
			 $conn->query($sql);
			};
	 echo '<script>alert("Berhasil")</script>
	    <script>setTimeout(function(){location.href="harga"},1)</script>';
  }elseif($jenis=='bantal'){
		$nama=$brand.' '.$type;
		$sp="select *from harga where nama='$nama'";
		$qsp=mysqli_query($conn, $sp);
		$hsp=mysqli_fetch_array($qsp);
		$id=$hsp['id'];
			if($hsp['nama']==null){
			$sql="insert into harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,presmi,jualck,userpresmi,userjualck,datepresmi,datejualck) Value ('$nama','$netto','0','0','0','0','0','0','$date','0','0','0','$user','0','0','0','$presmi','$jual','$user','$user','$date','$date')";
			$conn->query($sql);
			}else{
			$sql="UPDATE harga SET ck='$netto',userck='$user',dateck='$date',presmi ='$presmi',userpresmi='$user',datepresmi='$date',jualck='$jual',userjualck='$user',datejualck='$date' WHERE id = '$id'" ;
			$conn->query($sql);
			};
	echo '<script>alert("Berhasil")</script>
	   <script>setTimeout(function(){location.href="harga"},1)</script>';
}
}elseif($perihal=="online"){
	$date=date('dm');
	$user=$_SESSION['username'];
	$jenis=$_POST['jenis'];
	$brand=$_POST['brand'];
	$ck=$_POST['ck'];
	$presmi=$_POST['presmi'];
	$tokped=$_POST['tokped'];
	$linktokped=$_POST['linktokped'];
	$bl=$_POST['bl'];
	$tokotokped=$_POST['tokotokped'];
	$linkbl=$_POST['linkbl'];
	$tokobl=$_POST['tokobl'];
	$lazada=$_POST['lazada'];
	$linklazada=$_POST['linklazada'];
	$tokolazada=$_POST['tokolazada'];
	
		if($presmi==0){
		$disctokped="0%";
		$discbl="0%";
		$disclazada="0%";
	}else{
		$tokped1= str_replace(".", "", $tokped);
		$presmi1= str_replace(".", "", $presmi);
		$bl1= str_replace(".", "", $bl);
		$lazada1= str_replace(".", "", $lazada);
		
		$a=(1-($tokped1/$presmi1))*100;
		$disctokped=number_format($a,2,'.',',')."%";
		$b=(1-($bl1/$presmi1))*100;
		$discbl=number_format($b,2,'.',',')."%";
		$c=(1-($lazada1/$presmi1))*100;
		$disclazada=number_format($c,2,'.',',')."%";
		}
		$harga=min($ck,$tokped,$bl,$lazada);
		if($harga==$ck){
		$status="Termurah";	
		}else{
		$status="Bersaing";
		}
	
	if($jenis=="PAB"){
	$size=$_POST['size'];
	$type=$_POST['type'];
	$nama=$brand.' '.$type.' '.$size;
	$sp="select *from harga where nama='$nama'";
	$qsp=mysqli_query($conn, $sp);
	$hsp=mysqli_fetch_array($qsp);
	 if($hsp['nama']==null){
		 $sql="insert into harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,disctok,discbl,disclazada,presmi,datepresmi,status,tokotokped,tokobl,tokolazada) Value ('$nama','$ck','$tokped','$linktokped','$bl','$linkbl','$lazada','$linklazada','$date','$date','$date','$date','$user','$user','$user','$user','$disctokped','$discbl','$disclazada','$presmi','$date','$status','$tokotokped','$tokobl','$tokolazada')";
   $conn->query($sql);
    echo '<script>alert("Berhasil")</script>
	    <script>setTimeout(function(){location.href="online"},1)</script>';
	 }else{
		 echo '<script>alert("Brand Sudah Terdaftar")</script>
	    <script>setTimeout(function(){location.href="online"},1)</script>';
	 };
	 
	}elseif($jenis=="springbed"){
	$size=$_POST['size'];
	if($brand=='Alga'){
	$type=$_POST['alga'];
}elseif($brand=='Spring Air'){
	$type=$_POST['SA'];
}elseif($brand=='Comforta'){
	$type=$_POST['Comforta'];
}elseif($brand=='Florence'){
	$type=$_POST['Florence'];
}elseif($brand=='Serta'){
	$type=$_POST['serta'];
}elseif($brand=='King Koil'){
	$type=$_POST['kingkoil'];
}elseif($brand=='Airland'){
	$type=$_POST['airland'];
}elseif($brand=='Cosisoft'){
	$type=$_POST['cosisoft'];
}elseif($brand=='Dreamline'){
	$type=$_POST['dreamline'];
}elseif($brand=='Dunlopillo'){
	$type=$_POST['dunlopillo'];
}elseif($brand=='Elite'){
	$type=$_POST['elite'];
}elseif($brand=='Lady Americana'){
	$type=$_POST['lady'];
}elseif($brand=='Romance'){
	$type=$_POST['romance'];
}elseif($brand=='Therapedic'){
	$type=$_POST['therapedic'];
}elseif($brand=='Theraspine'){
	$type=$_POST['theraspine'];
}elseif($brand=='Sleep Dream'){
	$type=$_POST['sleep'];
}elseif($brand=='Silent Night'){
	$type=$_POST['silent'];
}elseif($brand=='Superland'){
	$type=$_POST['superland'];
}elseif($brand=='Bigland'){
	$type=$_POST['bigland'];
}elseif($brand=='Simmons'){
	$type=$_POST['simmons'];
}else{
		$type=$_POST[$brand];
	}
	$set=$_POST['set'];
	$nama=$brand.' '.$type.' '.$size.' '.$set;
	
	 $sp="select *from harga where nama='$nama'";
	 $qsp=mysqli_query($conn, $sp);
	 $hsp=mysqli_fetch_array($qsp);
	 
	  if($hsp['nama']==null){
      $sql="insert into harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,disctok,discbl,disclazada,presmi,datepresmi,status,tokotokped,tokobl,tokolazada)Value ('$nama','$ck','$tokped','$linktokped','$bl','$linkbl','$lazada','$linklazada','$date','$date','$date','$date','$user','$user','$user','$user','$disctokped','$discbl','$disclazada','$presmi','$date','$status','$tokotokped','$tokobl','$tokolazada')";
      $conn->query($sql);
        echo '<script>alert("Berhasil")</script>
	        <script>setTimeout(function(){location.href="online"},1)</script>';
	   }else{
	   echo '<script>alert("Brand Sudah Terdaftar")</script>
	      <script>setTimeout(function(){location.href="online"},1)</script>';
	   }
	}elseif($jenis=='bantal'){
	$type=$_POST['type'];
	$nama=$brand.' '.$type;
	
	$sp="select *from harga where nama='$nama'";
		$qsp=mysqli_query($conn, $sp);
		$hsp=mysqli_fetch_array($qsp);
		if($hsp['nama']==null){
	   $sql="insert into harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,disctok,discbl,disclazada,presmi,datepresmi,status,tokotokped,tokobl,tokolazada) Value ('$nama','$ck','$tokped','$linktokped','$bl','$linkbl','$lazada','$linklazada','$date','$date','$date','$date','$user','$user','$user','$user','$disctokped','$discbl','$disclazada','$presmi','$date','$status','$tokotokped','$tokobl','$tokolazada')";
   $conn->query($sql);
    echo '<script>alert("Berhasil")</script>
	    <script>setTimeout(function(){location.href="online"},1)</script>';
		 }else{
		 echo '<script>alert("Brand Sudah Terdaftar")</script>
	    <script>setTimeout(function(){location.href="online"},1)</script>';	
		};
	}
	
}else if($perihal=='lelang'){
$nama=$_POST['nama'];
$email=$_POST['email'];
$hp=$_POST['hp'];
$alamat=$_POST['alamat'];
$lelang=$_POST['ikut'];
$dtgck=$_POST['belanja'];
$nik=$_POST['nik'];
$nota=$_POST['nota']."(".$_POST['diskon'].")";
$ikut=$_POST['datang'][0].' '.$_POST['datang'][1].' '.$_POST['datang'][2].' '.$_POST['datang'][3].' '.$_POST['datang'][4].' '.$_POST['datang'][5];
$daftar=$_POST['setdate'];
$petugas=$_POST['petugas'];
$peserta="Jilid ".$_POST['peserta'];
if(empty($_POST["very"])){
$status="Belum Verifikasi";
$query="insert into lelang (nama,email,hp,nik,nota,ikut,alamat,dtgck,daftar,datang,status,petugas,peserta) Values ('$nama','$email','$hp','$nik','$nota','$lelang','$alamat','$dtgck','$daftar','$ikut','$status','$petugas','$peserta')";
$conn->query($query);
echo '<script>alert("Berhasil")</script>
<script>setTimeout(function(){location.href="lelang"},1)</script>';
}else{
$status="Sudah Verifikasi";
$select="select kvouc from lelang order by kvouc DESC";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);
	$kvoucher=$array["kvouc"]+1;
	$kode="CK-0".$kvoucher;
$query="insert into lelang (nama,email,hp,nik,nota,ikut,alamat,dtgck,daftar,datang,status,petugas,peserta,kode,kvouc) Values ('$nama','$email','$hp','$nik','$nota','$lelang','$alamat','$dtgck','$daftar','$ikut','$status','$petugas','$peserta','$kode','$kvoucher')";
$conn->query($query);
echo '<script>alert("Berhasil Kode Voucer Adalah '.$kode.'")</script>
<script>setTimeout(function(){location.href="lelang"},1)</script>';
}
}else if($perihal=="quot"){
$tanggal=$_POST['tanggal'];
$quote=strtoupper($_POST["quote"]);
$berlaku=$_POST['berlaku'];
$customer=strtoupper($_POST["customer"]);
$nama=$_POST["gelar"].". ".ucwords($_POST["nama"]);
if($_POST['nama']==null){
	$nama='';
}else{
	$nama=$_POST["gelar"].". ".ucwords($_POST["nama"]);
}

$perusahaan=strtoupper($_POST["perusahaan"]);
$alamat=ucwords($_POST['alamat']);
$pos=$_POST["pos"];
$telp=$_POST["telp"];
$ppns=$_POST["ppn"];
if($ppns=='tidak'){
$ppn='tidak';
}else{
$ppn=str_replace(".","",$_POST['total']);
}
$lokasi=$_POST["lokasi"];
$sales=ucwords($_POST['sales']);
$terms=$_POST["terms"];$stringterms="";
$note=$_POST['note'];
$user=$_POST['user'];
$desk=$_POST["desk"]; $stringdesk = "";
$jumlah=$_POST['jumlah']; $stringjumlah = "";
$harga=str_replace(".","",$_POST['harga']); $stringharga = "";
$diskon=$_POST["diskon"];
$x=explode("/",$berlaku);
$exp=$x[2].$x[0].$x[1];
$bank='Rek '.strtoupper($_POST['bank']).' : '.$_POST['norek'].' A/N '.ucwords($_POST['an']);


if($terms[0]==null){
	$d='';
}else{
foreach($terms as $key => $value){
	$stringterms .= $value."^";	
	$d=ucwords($stringterms);
	}
}
foreach($desk as $key => $value){
	$stringdesk .= $value.",";	
	$c=ucwords($stringdesk);
	}

foreach($jumlah as $key => $value){
		$stringjumlah .= $value.",";	
}

foreach($harga as $key => $value){
		$stringharga .= $value.",";	
}
$input="insert into quote (tanggal,quote,customer,nama,perusahaan,alamat,pos,telp,ppn,desk,jumlah,harga,diskon,exp,berlaku,user,note,sales,term,bank,lokasi) Values ('$tanggal','$quote','$customer','$nama','$perusahaan','$alamat','$pos','$telp','$ppn','$c','$stringjumlah','$stringharga','$diskon','$exp','$berlaku','$user','$note','$sales','$d','$bank','$lokasi')";
$conn->query($input);

$hari=date('Ymd');
$nomor=$_POST['nomor'];
$masuk="insert into urut (tanggal,nomor,lokasi) value ('$hari','$nomor','$lokasi')";
$conn->query($masuk);
echo '<script>alert("Berhasil")</script>
<script>setTimeout(function(){location.href="quot"},1)</script>';
}
?>






