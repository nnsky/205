<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif'){

	}elseif($_SESSION['level']=='user'){
		header("location:../logout.php");
	}else{
		header("location:../logout.php");	
	}


if(isset($_GET['page'])){
	$halaman=$_GET['page'];
}else{
	$halaman=1;
}
$asal=$_GET['asal'];
$search=$_GET['search'];
$cari=$_GET['cari']; 
$page = (isset($_GET['page']))? $_GET['page'] : 1;
$limit = 10; 
$limit_start = ($page - 1) * $limit;
if($asal=="respons"){
$query = "SELECT * FROM respon where ".$cari." like '%".$search."%' order by id DESC LIMIT ".$limit_start.",".$limit;
}else if ($asal=="kwitansis"){
$query = "SELECT * FROM kwitansi where ".$cari." like '%".$search."%' order by id DESC LIMIT ".$limit_start.",".$limit;
}
$result = mysqli_query($conn, $query);
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
            <title>Hasil Pensearchan</title>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
      </head>  
<body>
<?php 
if($asal=='respons'){
echo "
<div class='container'>
                     <br />  
                          <table class='table table-bordered' id='table_hasil'>  
                               <tr>  
					<th>Tanggal</th>
					<th>Report_Id</th>
					<th>Nama</th>
					<th>Pesan</th>
					<th>Sales</th>
					<th>Status</th>   
                               </tr>  
							   <tr>
";
function limit_words($string, $word_limit){
	$words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));}
	date_default_timezone_set('asia/jakarta');
	$style='red';
	while($hasil=mysqli_fetch_array($result)){ 
	if($hasil["status"]=='Pending'){
		$class='danger';
	}else{
		$class='primary';
	}
	$d=$hasil['pesan'];
	$pesan= limit_words($d, 3);
	$jam1=$hasil["jam"];
	$jam2=$hasil["hari"];
	$status1=$hasil['status'];
	$tes=date('ynd');
	if($jam1 <=date('G') or $jam2 <date('ynd')){
		$jam3="benar";
	}else{
		$jam3='salah';
	} 
	if($status1 == 'Pending' and $jam3=="benar"){
		$style="red";
	}elseif($status1 =='Pendings' and $jam2 <= $tes){
		$style="red";
	}else{
		$style="black";
	}
	echo '<tr style="color:'.$style.'">
	<td>'.$hasil["tanggal"].'</td>
		  <td>'.$hasil["responid"].'</td>
		  <td>'.$hasil["nama"].'</td>
		  <td>'.$pesan.'</td>
		  <td>'.$hasil["untuk"].'</td>
		  <td>
		  <a href="#add'.$hasil['id'].'" data-toggle="modal" class="btn btn-'.$class.'">'.$hasil["status"].'</a>
		  <a href="delete.php?&_id='.$hasil["responid"].'&perihal=Respon&asal=respons&page='.$halaman.'&cari='.$cari.'&search='.$search.'" class="btn btn-success">Delete</a>
		  </td>
		  ';
		  ?>
<div id="add<?php echo $hasil['id'] ?>" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action='cekedit?&page=<?php echo $halaman ?>&cari=<?php echo $cari?>&search=<?php echo $search?>' method='POST'>   
   <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>Konsumen <?php echo $hasil["nama"]?></b></center></h4>
        </div>
		<div class="modal-body" style='font-weight:bold'>
		<div class='col-sm-4'>
		Nama : <input type='text' name='nama' value="<?php echo $hasil['nama']?>">
		</div>
		<div class='col-sm-4'>
		Sumber : <span><?php echo $hasil["sumber"]?></span>
		</div>
		<div class='col-sm-4'>
		Kontak : <input type='text' name='telp' value="<?php echo $hasil['kontak']?>">
		</div>
		<div class='col-sm-12' style='margin-top:20px;'>
		Status : <?php if($hasil['status'] == 'Pending' or $hasil['status'] == 'Pendings'){
							echo '<span style="color:red">Pending</span>';
							}elseif($hasil['status'] == 'Complete'){
								echo '<span style="color:blue">Complete</span>';
							}
								?>
		</div>
		<div class='col-sm-6' style='margin-top:20px;'>
		Pesan Dari Konsumen
		</div>
		<div class='col-sm-6' style='margin-top:20px;'>
		Memo Dari Sales : <?php echo $hasil["untuk"]?>
		</div>
		<div class='row'>
			<div class='col-sm-6'>
			<span class="form-control" style='overflow:scroll; height:150px;'><?php echo $hasil["pesan"]?></span>
			</div>
			<div class='col-sm-6'>
			<span class="form-control" style='overflow:scroll; height:150px;'>
					<?php 
								if($hasil['tanggapan']==null){
									echo 'Maaf Untuk Saat Ini Tidak Ada Respon Dari Sales';
								}else
								echo $hasil['tanggapan'];
								?>
					</span>
			</div>
		</div>
		<div class='row' style='margin-top:20px;'>
			<div class='col-sm-6'>
			Status:
							<select name="status" required>
							<option value="">None</option>
							<option value="Pending">Pending</option>
							<option value="Complete">Complete</option>
							</select><span class="ab">*Ubah Status Di Sini*</span>
			</div>
			<div class='col-sm-6'>
			<span>Tambahkan Memo</span>
			<textarea name="tanggapan" class='form-control' rows='5'></textarea>
			</div>
		</div>
		</div>	
				<div class="modal-footer">
							<input type="hidden" name="status1" value="<?php echo $hasil['status1']; ?>">
							<input type="hidden" name="id" value="<?php echo $hasil['responid']; ?>">
							<input type="hidden" name="asal" value="respons">
							<input type="hidden" name="tgpan" value="respon">
	                <button class="btn btn-success" type="submit">Confirm
	                </button> <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button>
	            </div></form>
            </div>      
        </div>
</div>		  
<?php		  
		  }
eCHo '</tr>';
?>					   
                          </tr>
						  </table>  
</div> 
<?php 
}else if($asal=='kwitansis'){
echo"
<div class='container'>
                     <br />  
                          <table class='table table-bordered' id='table_hasil'>  
<tr>  
<th>Lokasi</th>
<th>No Kwitansi</th>
<th>Pembeli</th>
<th>Jumlah</th>
<th>Keterangan</th>
<th>Tanggal</th>
<th>Action</th>    
</tr> ";	
function limit_words($string, $word_limit){
$words = explode(" ",$string);
return implode(" ",array_splice($words,0,$word_limit));}
while($hasil=mysqli_fetch_array($result)){ 
	$d=$hasil['informasi'];
	$pesan= limit_words($d, 3);
echo "<tr>
	<td>".$hasil['lokasi']."</td>
	<td>".$hasil['kwitansid']."</td>
	<td>".$hasil['nama']."
	<td>".$hasil['jumlah']."</td>
	<td>".$pesan."</td>
	<td>".$hasil['tanggal']."</td>
	<td>
	<a href='#add".$hasil['id']."' data-toggle='modal' class='btn btn-primary'>Edit</a>
	<a href='delete?&_id=".$hasil['kwitansid']."&perihal=Kwitansi&asal=kwitansis&page=".$halaman."&cari=".$cari."&search=".$search."' class='btn btn-danger'>Delete</a>";	
?>
<div id="add<?php echo $hasil['id'] ?>" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action='cekedit?&page=<?php echo $halaman ?>&cari=<?php echo $cari ?>&search=<?php echo $search ?>' method='POST'>   
   <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>No Kwitansi <?php echo $hasil["kwitansid"]?></b></center></h4>
        </div>
		<div class="modal-body" style='font-weight:bold'>
		   <b><div class='col-sm-6'>No Kwitansi :<input type='text' name='idbaru' value="<?php echo $hasil['kwitansid'] ?>"></div>
                <div class='col-sm-6'>Tanggal : <input type='text' name='tgl' value='<?php echo $hasil['tanggal'] ?>'></div><br><br>
                <div class='col-sm-6'>Nama : <input type='text' name='nama' value='<?php echo $hasil['nama'] ?>' ></div>
                <div class='col-sm-6'>User : <?php echo $hasil['sales'] ?></div><br><br>
                <div class='col-sm-6'>Lokasi : 
				<select name='lokasi'>
				<?php
				if($hasil['lokasi']=='CM'){
				echo'
				<option value="CM">Pramuka 180</option>
				<option value="CH">Pramuka 168</option>
				<option value="CPG">Premium Gallery</option>
				<option value="KG">Kelapa Gading </option>
				<option value="AL">Ruko Alam Sutra </option>
				<option value="CPIK">Pantai Indah Kapuk </option>
				<option value="CBEK">Bekasi </option>
				<option value="CBDG">Bandung </option>
				';	
				}elseif($hasil['lokasi']=='CH'){
					echo '
				<option value="CH">Pramuka 168</option>
				<option value="CM">Pramuka 180</option>
				<option value="CPG">Premium Gallery</option>
				<option value="KG">Kelapa Gading </option>
				<option value="AL">Ruko Alam Sutra </option>
				<option value="CPIK">Pantai Indah Kapuk </option>
				<option value="CBEK">Bekasi </option>
				<option value="CBDG">Bandung </option>';
				}elseif($hasil['lokasi']=='CPG'){
					echo '
				<option value="CPG">Premium Gallery</option>
				<option value="CM">Pramuka 180</option>
				<option value="CH">Pramuka 168</option>
				<option value="KG">Kelapa Gading </option>
				<option value="AL">Ruko Alam Sutra </option>
				<option value="CPIK">Pantai Indah Kapuk </option>
				<option value="CBEK">Bekasi </option>
				<option value="CBDG">Bandung </option>';
				}elseif($hasil['lokasi']=='KG'){
					echo '
				<option value="KG">Kelapa Gading </option>
				<option value="CM">Pramuka 180</option>
				<option value="CH">Pramuka 168</option>
				<option value="CPG">Premium Gallery</option>
				<option value="AL">Ruko Alam Sutra </option>
				<option value="CPIK">Pantai Indah Kapuk </option>
				<option value="CBEK">Bekasi </option>
				<option value="CBDG">Bandung </option>';
				}elseif($hasil['lokasi']=='CPIK'){
					echo '
				<option value="CPIK">Pantai Indah Kapuk </option>
				<option value="CM">Pramuka 180</option>
				<option value="CH">Pramuka 168</option>
				<option value="CPG">Premium Gallery</option>
				<option value="KG">Kelapa Gading </option>
				<option value="AL">Ruko Alam Sutra </option>
				<option value="CBEK">Bekasi </option>
				<option value="CBDG">Bandung </option>';
				}elseif($hasil['lokasi']=='CBEK'){
					echo '
				<option value="CBEK">Bekasi </option>	
				<option value="CM">Pramuka 180</option>
				<option value="CH">Pramuka 168</option>
				<option value="CPG">Premium Gallery</option>
				<option value="KG">Kelapa Gading </option>
				<option value="AL">Ruko Alam Sutra </option>
				<option value="CPIK">Pantai Indah Kapuk </option>
				<option value="CBDG">Bandung </option>';
				}else{
					echo '
				<option value="CBDG">Bandung </option>
				<option value="CM">Pramuka 180</option>
				<option value="CH">Pramuka 168</option>
				<option value="CPG">Premium Gallery</option>
				<option value="KG">Kelapa Gading </option>
				<option value="AL">Ruko Alam Sutra </option>
				<option value="CPIK">Pantai Indah Kapuk </option>
				<option value="CBEK">Bekasi </option>
				';
				}
				?>
				</select></div>
				<div class='col-sm-6'>Jumlah : <input type='text' name='jumlah' value='<?php echo $hasil['jumlah'] ?>' onkeyup="formatangka(this)"></div><br><br>
								
				<div class='col-sm-6'>
                Terbilang :
                </div>
                <div class='col-sm-6'>
				Untuk Pembelian :
                </div>
				<div class='col-sm-6'>
				<textarea name='terbilang' cols='40' rows='5'><?php echo $hasil['terbilang']?></textarea>
				</div>
				<div class='col-sm-6'>
				<textarea name='beli' cols='40' rows='5' ><?php echo $hasil['informasi']?></textarea>
				</div>
				
                <input type="hidden" name="asal" value="kwitansis">
				<input type="hidden" name="tgpan" value="kwitansi">
				<input type="hidden" name="id" value='<?php echo $hasil["kwitansid"]?>'>
			
				</div>			
				<div class="modal-footer" style='margin-top:150px'>
				<a href='printkwt?&_id=<?php echo $hasil["kwitansid"]?>' class='btn btn-info'>Print</a>	
	            <button class="btn btn-success" type="submit">Confirm
	                </button> <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button>
	            </form>
				</div>
			</div>      
        </div>
</div>	
<?php
echo '</tr>';
}					   
?>  
  </table>  
                     </div>  
<?php
}else{
	
}
?>

<center><ul class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li><a href="searchs?page=1">First</a></li>
          <li><a href="searchs?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <!-- LINK NUMBER -->
        <?php
		if($asal=="respons"){
		$sql2="SELECT * FROM respon where ".$cari." like '%".$search."%'";
		}else if($asal=='kwitansis'){
		$sql2="SELECT * FROM kwitansi where ".$cari." like '%".$search."%'";	
		}
		$result1=mysqli_query($conn,$sql2);
		$get_jumlah=mysqli_num_rows($result1);
        
        $jumlah_page = ceil($get_jumlah/$limit); // Hitung jumlah halamannya
        $jumlah_number = 5; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li <?php echo $link_active; ?>><a href="searchs?page=<?php echo $i; ?>&asal=<?php echo $asal?>&cari=<?php echo $cari?>&search=<?php echo $search?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($page == $jumlah_page){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li><a href="searchs?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="searchs?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?>
      </ul></center>
</body>
</html>

