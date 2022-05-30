<html> <?php include 'menu.php';
 if(empty($_SESSION['level'])){
	 header("location:../logout.php");
 }elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array["akun_e"]="block"){
	
	 }elseif($_SESSION['level']=='user'){
		 header("location:../logout");
	 }else{
		 header("location:../logout");
	 }
	
$username=$_GET['username']; $select="select * from akun where username ='$username'"; $query=mysqli_query($conn,$select); $array=mysqli_fetch_array($query); ?> <head> <link 
rel='stylesheet' href='../css/bootstrap.min.css'> <script src='../asset/jquery.min.js'></script> <script src='../asset/bootstrap.min.js'></script> </head> <body> <div class='container'> 
<div class='col-sm-5'><h4>Username : <?php echo $_GET["username"]?></h4></div> <div class='col-sm-7'><h4>Hak Akses Akun</h4></div> </div> <form action='buat.php?&username=<?php echo 
$_GET["username"]?>&perihal=akses' method='post'> <table class='table table-hover' style='font-weight: bold;'> <tr> <td>Menu</td> <td>View</td> <td>Insert</td> <td>Edit</td> </tr> <tr> 
<td>Respon</td> <td><input type='checkbox' name='respon_v' value='block' <?php if($array['re_v']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='respon_i' 
value='block' <?php if($array['re_i']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='respon_e' value='block' <?php if($array['re_e']=='block'){echo 
'checked';}else{}?>></td> </tr> <tr> <td>Kwitansi</td> <td><input type='checkbox' name='kwitansi_v' value='block' <?php if($array['kw_v']=='block'){echo 'checked';}else{}?>></td> <td><input 
type='checkbox' name='kwitansi_i' value='block' <?php if($array['kw_i']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='kwitansi_e' value='block' <?php 
if($array['kw_e']=='block'){echo 'checked';}else{}?>></td> </tr> <tr> <td>Pricelist</td> <td><input type='checkbox' name='pl_v' value='block' <?php if($array['pl_v']=='block'){echo 
'checked';}else{}?>></td> <td><input type='checkbox' name='pl_i' value='block' <?php if($array['pl_i']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='pl_e' 
value='block' <?php if($array['pl_e']=='block'){echo 'checked';}else{}?>></td> </tr> <tr> <td>Online</td> <td><input type='checkbox' name='ol_v' value='block' <?php 
if($array['ol_v']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='ol_i' value='block' <?php if($array['ol_i']=='block'){echo 'checked';}else{}?>></td> <td><input 
type='checkbox' name='ol_e' value='block' <?php if($array['ol_e']=='block'){echo 'checked';}else{}?>></td> </tr> <td>Brand</td> <td><input type='checkbox' name='br_v' value='block' <?php 
if($array['br_v']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='br_i' value='block' <?php if($array['br_i']=='block'){echo 'checked';}else{}?>></td> <td><input 
type='checkbox' name='br_e' value='block' <?php if($array['br_e']=='block'){echo 'checked';}else{}?>></td> </tr> <tr> <td>Lelang</td> <td><input type='checkbox' name='lelang_v' 
value='block' <?php if($array['lelang_v']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='lelang_i' value='block' <?php if($array['lelang_i']=='block'){echo 
'checked';}else{}?>></td> <td><input type='checkbox' name='lelang_e' value='block' <?php if($array['lelang_e']=='block'){echo 'checked';}else{}?>></td> </tr> <tr> <td>List Voucher</td> 
<td><input type='checkbox' name='vc_v' value='block' <?php if($array['vc_v']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='vc_i' value='block' <?php 
if($array['vc_i']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='vc_e' value='block' <?php if($array['vc_e']=='block'){echo 'checked';}else{}?>></td> </tr> <tr> 
<td>Voucher</td> <td><input type='checkbox' name='vck_v' value='block' <?php if($array['vck_v']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='vck_i' 
value='block' <?php if($array['vck_i']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='vck_e' value='block' <?php if($array['vck_e']=='block'){echo 
'checked';}else{}?>></td> </tr> <tr> <td>Nota Online</td> <td><input type='checkbox' name='pnj_v' value='block' <?php if($array['pnj_v']=='block'){echo 'checked';}else{}?>></td> <td><input 
type='checkbox' name='pnj_i' value='block' <?php if($array['pnj_i']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='pnj_e' value='block' <?php 
if($array['pnj_e']=='block'){echo 'checked';}else{}?>></td> </tr> <tr> <tr> <td>Inventaris</td> <td><input type='checkbox' name='inv_v' value='block' <?php if($array['inv_v']=='block'){echo 
'checked';}else{}?>></td> <td><input type='checkbox' name='inv_i' value='block' <?php if($array['inv_i']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='inv_e' 
value='block' <?php if($array['inv_e']=='block'){echo 'checked';}else{}?>></td> </tr> <tr> <td>Akun</td> <td><input type='checkbox' name='akun_v' value='block' <?php 
if($array['akun_v']=='block'){echo 'checked';}else{}?>></td> <td><input type='checkbox' name='akun_i' value='block' <?php if($array['akun_i']=='block'){echo 'checked';}else{}?>></td> 
<td><input type='checkbox' name='akun_e' value='block' <?php if($array['akun_e']=='block'){echo 'checked';}else{}?>></td> </tr> </table> <p><button class='btn btn-primary'>Simpan</button> 
<a href='daftarakun' class='btn btn-danger'>Kembali</a></p> </form> </body> </html>
