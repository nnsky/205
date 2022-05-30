<?php
session_start();
include '../koneksi.php';

$perihal=$_POST['perihal'];
$brand=$_POST['brand'];
$presmi=$_POST['presmi'];
if($brand=='Alga' && $perihal=='springbed'){
	$type=$_POST['alga'];
}elseif($brand=='Spring Air' && $perihal=='springbed'){
	$type=$_POST['SA'];
}elseif($brand=='Comforta' && $perihal=='springbed'){
	$type=$_POST['Comforta'];
}elseif($brand=='Florance' && $perihal=='springbed'){
	$type=$_POST['Florance'];
}elseif($brand=='Serta' && $perihal=='springbed'){
	$type=$_POST['serta'];
}elseif($brand=='King Koil' && $perihal=='springbed'){
	$type=$_POST['kingkoil'];
}elseif($brand=='Airland' && $perihal=='springbed'){
	$type=$_POST['airland'];
}elseif($brand=='Cosisoft' && $perihal=='springbed'){
	$type=$_POST['cosisoft'];
}elseif($brand=='Dreamline' && $perihal=='springbed'){
	$type=$_POST['dreamline'];
}elseif($brand=='Dunlopillo' && $perihal=='springbed'){
	$type=$_POST['dunlopillo'];
}elseif($brand=='Elite' && $perihal=='springbed'){
	$type=$_POST['elite'];
}elseif($brand=='Lady Americana' && $perihal=='springbed'){
	$type=$_POST['lady'];
}elseif($brand=='Romance' && $perihal=='springbed'){
	$type=$_POST['romance'];
}elseif($brand=='Therapedic' && $perihal=='springbed'){
	$type=$_POST['therapedic'];
}elseif($brand=='Theraspine' && $perihal=='springbed'){
	$type=$_POST['theraspine'];
}elseif($brand=='Sleep Dream' && $perihal=='springbed'){
	$type=$_POST['sleep'];
}elseif($brand=='Silent Night' && $perihal=='springbed'){
	$type=$_POST['silent'];
}elseif($brand=="Protect A Bed" or $perihal=='bantal'){
	$type=$_POST['type'];
}

$date=date('dm');
$user=$_SESSION['username'];
$ck=$_POST['ck'];
$tokped=$_POST['tokped'];
$linktokped=$_POST['linktokped'];
$bl=$_POST['bl'];
$linkbl=$_POST['linkbl'];
$lazada=$_POST['lazada'];
$linklazada=$_POST['linklazada'];
$tokotokped=$_POST['tokotokped'];
$tokobl=$_POST['tokobl'];
$tokolazada=$_POST['tokolazada'];
$ck1=str_replace(".","",$ck);
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

if($tokped1==0 or $tokped1==null){
	$tokpedst=999999999;
}else
	$tokpedst=$tokped1;
if($bl1==0 or $bl1==null){
	$blst=999999999;
}else
	$blst=$bl1;
if($lazada1==0 or $lazada1==null){
	$lazadast=999999999;
}else
	$lazadast=$lazada1;

	
$harga=min($ck1,$tokpedst,$blst,$lazadast);
if($harga==$ck1){
$status="Termurah";	
}else{
$status="Bersaing";
}
   if($perihal=='springbed'){
   $size=$_POST['size'];
   $set=$_POST['set'];
   $nama=$brand.' '.$type.' '.$size.' '.$set;
   $sp="select *from harga where nama='$nama'";
	 $qsp=mysqli_query($conn, $sp);
	 $hsp=mysqli_fetch_array($qsp);
	 if($hsp['nama']==null){
     $sql="insert into harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,disctok,discbl,disclazada,presmi,datepresmi,status,tokotokped,tokobl,tokolazada)Value ('$nama','$ck','$tokped','$linktokped','$bl','$linkbl','$lazada','$linklazada','$date','$date','$date','$date','$user','$user','$user','$user','$disctokped','$discbl','$disclazada','$presmi','$date','$status','$tokotokped','$tokobl','$tokolazada')";
     $conn->query($sql);
      echo '<script>alert("Berhasil")</script>
	      <script>setTimeout(function(){location.href="harga"},1)</script>';
	 }else{
	 echo '<script>alert("Brand Sudah Terdaftar")</script>
	    <script>setTimeout(function(){location.href="harga"},1)</script>';
	 }
   }
   elseif($perihal=='PAB'){
   $size=$_POST['size'];
   $nama=$brand.' '.$type.' '.$size;
   $sp="select *from harga where nama='$nama'";
	 $qsp=mysqli_query($conn, $sp);
	 $hsp=mysqli_fetch_array($qsp);
	  if($hsp['nama']==null){
		  $sql="insert into harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,disctok,discbl,disclazada,presmi,userpresmi,datepresmi,status,tokotokped,tokobl,tokolazada) Value ('$nama','$ck','$tokped','$linktokped','$bl','$linkbl','$lazada','$linklazada','$date','$date','$date','$date','$user','$user','$user','$user','$disctokped','$discbl','$disclazada','$presmi','$user','$date','$status','$tokotokped','$tokobl','$tokolazada')";
    $conn->query($sql);
     echo '<script>alert("Berhasil")</script>
	     <script>setTimeout(function(){location.href="harga"},1)</script>';
	  }else{
		  echo '<script>alert("Brand Sudah Terdaftar")</script>
	     <script>setTimeout(function(){location.href="harga"},1)</script>';
	  };
   }elseif($perihal=='bantal'){
	   $nama=$brand.' '.$type;
	   $sp="select *from harga where nama='$nama'";
		 $qsp=mysqli_query($conn, $sp);
		 $hsp=mysqli_fetch_array($qsp);
		 if($hsp['nama']==null){
	   $sql="insert into harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,disctok,discbl,disclazada,presmi,userpresmi,datepresmi,status,tokotokped,tokobl,tokolazada) Value ('$nama','$ck','$tokped','$linktokped','$bl','$linkbl','$lazada','$linklazada','$date','$date','$date','$date','$user','$user','$user','$user','$disctokped','$discbl','$disclazada','$presmi','$user','$date','$status','$tokotokped','$tokobl','$tokolazada')";
   $conn->query($sql);
    echo '<script>alert("Berhasil")</script>
	    <script>setTimeout(function(){location.href="harga"},1)</script>';
		 }else{
		 echo '<script>alert("Brand Sudah Terdaftar")</script>
	    <script>setTimeout(function(){location.href="harga"},1)</script>';	
		 };
   };
  
  
?>
