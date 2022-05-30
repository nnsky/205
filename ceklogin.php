<?php
session_start();
include "koneksi.php";

$tes=$_POST['login'];
$y=strtolower($tes);
$x=explode("^",$y);
$password=$x[0];
$username=$x[1];
$sql="select *from akun where username ='$username'";
$query = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query);
	if($row['username'] == ''){
	echo '<script type="text/javascript">alert("Username Atau Password Anda Salah")</script>
<script>setTimeout(function(){location.href="index.php"} , 1); </script>';
$conn->close();
	}else{
	if(password_verify($password,$row['password'])){
		if($row['level'] == "admin" && $row['status'] == 'aktif'){
			$_SESSION['level'] = $row['level'];
			$_SESSION['username'] =$row['username'];
			$_SESSION['status'] =$row['status'];
			$_SESSION['lokasi']='CM';
			header("location:admin/index");
		}elseif($row['level'] == "user" && $row['status'] == 'aktif'){
			$_SESSION['level'] =$row['level'];
			$_SESSION['username'] =$row['username'];
			$_SESSION['status'] =$row['status'];
			$_SESSION['lokasi']=$row['lokasi'];
			header("location:user/index");
		}
	}else{
	echo	'<script type="text/javascript">alert("Username Atau Password Anda Salah")</script>
		<script>setTimeout(function(){location.href="index"} , 1); </script>';
		$conn->close();
	}
	}
?>
