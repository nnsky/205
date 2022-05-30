<html>
<?php
include "menu.php";
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['re_v']=='block'){
$lokasi=$_SESSION['lokasi'];		
	}
?>
<head>
<meta CHarset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="900"> 
 <title>Ticket Respon</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
</head>
<body>
<div class='col-sm-6'>
<p><h4>In Store</h4></p>
<?php
	$select="select *from respon where status='pendings' or status='pending' or status='proses' order by status ASC,no DESC";
	$query=mysqli_query($conn,$select);
	while($array=mysqli_fetch_array($query)){
		if($array['responid']== null){
			echo "Tidak Ada Ticket";
		}else{
			if($array['status']=='proses'){
				$color='success';
			}else{
				$color='danger';
			};
			
		date_default_timezone_set('asia/jakarta');
		$skrg=date('mdH');
		if($array['jam']<$skrg){
			$warna='red';
			$conn->query("update respon set no=1 where responid='".$array['responid']."'");
		}else{
			$warna='white';
		}
			
		echo "
			<div class='col-sm-12' style='border:1px solid;background-color:".$warna.";'>
				<center><h4><a class='btn btn-".$color."' href='tanggapan?&_id=".$array['responid']."&user=".$_SESSION['username']."'>Tiket Respon : ".$array['responid']."</a></h4></center>
				<br>
				<h4><div class='col-sm-6'>Nama : ".$array['nama']."</div> <div class='col-sm-6'>Kontak : ".$array['kontak']."</div> 
				<div class='col-sm-6'>Tanggal : ".$array['tanggal']."</div> <div class='col-sm-6'>Nota : ".$array['nota']."</div>
				<div class='col-sm-6'>Sales : ".$array['untuk']."</div> <div class='col-sm-6'>Waktu Penyelesaian : ".$array['hari']."</div>
				</h4>
				<div style='clear:both'></div><br>
				<h4><p style='margin-left:10px;'>Pesan : </p></h4>
				<h4 style='margin-left:10px;'>".$array['pesan']."</h4>
				<h4><p style='margin-left:10px;'>Respon : </p></h4>
				<h4 style='margin-left:10px;'>".$array['tanggapan']."</h4>
			</div>
			
		";
	}
	}
?>
</div>
<div class='col-sm-6'>
	<p><h4>After Sales<h4/></p>
<?php
	$aselect="select *from asales where status='pending' or status='proses' order by status ASC";
	$aquery=mysqli_query($conn,$aselect);
	while($as=mysqli_fetch_array($aquery)){
		
		if($as['status']=='proses'){
				$color='success';
			}else{
				$color='danger';
			};
		
		date_default_timezone_set('asia/jakarta');
		$skrg=date('mdH');
		if($as['jam']<$skrg){
			$warna='red';
		}else{
			$warna='white';
		}
		echo "
			<div class='col-sm-12' style='border:1px solid;background-color:".$warna.";'>
				<center><h4><a class='btn btn-".$color."' href='tasrespon?&_id=".$as['ticketid']."&user=".$_SESSION['username']."'>Tiket Respon : ".$as['ticketid']."</a></h4></center>
				<br>
				<h4><div class='col-sm-6'>Nama : ".$as['nama']."</div> <div class='col-sm-6'>Kontak : ".$as['kontak']."</div> 
				<div class='col-sm-6'>Tanggal : ".$as['tglkirim']."</div> <div class='col-sm-6'>Nota : ".$as['nota']."</div><br>
				<div class='col-sm-6'>Sales : ".$as['sales']."</div> <div class='col-sm-6'>Batas Pengerjaan : ".$as['hari']."</div><br>
				</h4>
				<div style='clear:both'></div><br>
				<h4><p style='margin-left:10px;'>Feedback : </p></h4>
				<h4 style='margin-left:10px;'>".$as['feedback']."</h4>
				<h4><p style='margin-left:10px;'>Respon : </p></h4>
				<h4 style='margin-left:10px;'>".$as['respon']."</h4>
				
			</div>
			<br>
		";
	}

?>
</div>
</body>
</html>
