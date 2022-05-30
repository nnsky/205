<?php
session_start();
if(empty($_SESSION["level"])){
	session_destroy();
}elseif($_SESSION['level'] == 'superadmin' or $_SESSION['level'] == 'admin'){
	header('location:admin/index');
}elseif($_SESSION['level'] == 'user' or $_SESSION['level'] == 'akun' ){
	header('location:user/index');
}else{
	session_destroy();
}
?>
<html>
<head>
 <link rel='stylesheet' href='css/lokasi.css'> 
<title>LOGIN</title>
<img src="img/ck1.png" style="margin-right:auto; margin-left:auto;display:block;width:60%">
<script>
function validhuruf(a)
{
	if(!/^[0-9a-zA-Z ^]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}
</script>
</head>
<body>
<form action="ceklogin" method="POST">
<center><input name="login" type="password" placeholder="Gesek Kartu Disini" onkeyup="validhuruf(this)" style="height:50px; width:350px;font-size:30px; margin-left:35px; margin-top:20px;"></center>
</form>


</body>
</html>
