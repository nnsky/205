<?php
include '../koneksi.php';
$asal=$_GET['asal'];
$id=$_GET['_id'];
$tgpan=$_GET['tgpan'];

if($tgpan=='respon'){
$sql="SELECT * FROM respon where responid = '$id'";
$query = mysqli_query($conn, $sql);
$hasil=mysqli_fetch_array($query);
?>
<script>
	function media(param)
{
if(param==1)
document.getElementById("kuntak").style.display = 'block';
else
document.getElementById("kuntak").style.display = 'none';
}
	</script>

<div class="modal-dialog modal-lg">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center>Edit Data Konsumen</center></h4>
        </div>

        <div class="modal-body">
        	<form action="cekedit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<div class='col-sm-4'><b>Nama : <input type='text' name='nama' value='<?php echo $hasil['nama']?>'></b></div>
                	<div class='col-sm-4'><b>Sumber : <?php echo $hasil['sumber']?></b></div>
                	<div class='col-sm-4'><b>No Telp : <input type='text' name='telp' value='<?php echo $hasil['kontak']?>'></b></div><br><br>
                	<div class='col-sm-4'><b>Status : <?php if($hasil['status'] == 'Pending' or $hasil['status'] == 'Pendings'){
							echo '<span style="color:red">Pending</span>';
							}elseif($hasil['status'] == 'Complete'){
								echo '<span style="color:blue">Complete</span>';
							}?></b></div>
                </div>

                <div class='col-sm-6'>
                	<label for="Description">Pesan</label>
     				<b><textarea rows='6' cols='30' name='pesan' class="form-control" style='overflow:scroll;'><?php echo $hasil['pesan'] ?></textarea></b>
                </div>
				
				<div class='col-sm-6'>
				<label for="Description">Memo Dari Sales : <?php echo $hasil['untuk'] ?></label>
     				<b><span class="form-control" style='overflow:scroll; height:150px;'>
					<?php 
								if($hasil['tanggapan']==null){
									echo 'Maaf Untuk Saat Ini Tidak Ada Respon Dari Sales';
								}else
								echo $hasil['tanggapan'];
								?>
					</span></b><br>
					Apakah Anda Ingin Menambah Memo :
							<input type="radio" name="hubungi" onclick="media(0)" value="Tidak">Tidak
							<input type="radio" name="hubungi" onclick="media(1)" value="Iya" >Iya  <br>
							<textarea id="kuntak" name="tanggapan" class='form-control' rows='5'></textarea>
					</div>
					<div class='form-group' style="padding-bottom: 20px;" >
					Status:
							<select name="status" required>
							<option value="">None</option>
							<option value="Pending">Pending</option>
							<option value="Complete">Complete</option>
							</select><span class="ab">*Ubah Status Di Sini*</span>
							<input type="hidden" name="tanggapanlama" value="<?php echo $hasil['tanggapan'];?>">
							<input type="hidden" name="status1" value="<?php echo $hasil['status1']; ?>">
							<input type="hidden" name="id" value="<?php echo $hasil['responid']; ?>">
							<input type="hidden" name="asal" value="<?php echo $asal ?>">
							<input type="hidden" name="tgpan" value="<?php echo $tgpan ?>">
					</div>
	            <div class="modal-footer">
				<button class="btn btn-success" type="submit">Confirm
	             </button> <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button>
				 </form></div>
	                
	            
            </div>      
        </div>
    </div>
	<?php 
}elseif($tgpan=='kwitansi'){
	$sql="select *from kwitansi where kwitansid = '$id'";
	$query = mysqli_query($conn, $sql);
	$hasil=mysqli_fetch_array($query) 
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Halaman Edit Kwitansi</h4>
        </div>

        <div class="modal-body">
        	<form action="cekedit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
				<div class="modal-body">
    
                <div class="form-group" style="padding-bottom: 20px;">
                <b><div class='col-sm-6'>No Kwitansi :<input type='text' name='idbaru' value="<?php echo $hasil['kwitansid'] ?>"></b></div>
                <b><div class='col-sm-6'>Tanggal : <input type='text' name='tgl' value='<?php echo $hasil['tanggal'] ?>'></b></div><br><br>
                <b><div class='col-sm-6'>Nama : <input type='text' name='nama' value='<?php echo $hasil['nama'] ?>'></b></div>
                <b><div class='col-sm-6'>User : <?php echo $hasil['sales'] ?></b></div><br><br>
                <b><div class='col-sm-6'>Lokasi : 
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
				<b><div class='col-sm-6'>Jumlah : <input type='text' name='jumlah' value='<?php echo $hasil['jumlah'] ?>'></b></div><br><br>
                <input type="hidden" name="asal" value="<?php echo $asal ?>">
				<input type="hidden" name="tgpan" value="<?php echo $tgpan ?>">
				<input type="hidden" name="id" value='<?php echo $hasil["kwitansid"]?>'>
				</div>

                <div class="form-group" style="padding-bottom: 20px;">
                <b>Terbilang : <textarea name='terbilang' cols='40' rows='5'><?php echo $hasil['terbilang']?></textarea></b>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
				<b>Untuk Pembelian : <textarea name='beli' cols='40' rows='7' ><?php echo $hasil['informasi']?></textarea></b>
                </div>
					<button class="btn btn-primary" type="submit">Simpan</button>
	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button> 
				</form>
				<form action="printkwt" method="POST" style='margin-top:-35px; margin-left:150px'>
				<input type="hidden" name="_id" value='<?php echo $hasil["kwitansid"]?>'>
				<input type="submit" class="btn btn-success" value="Print">	
				</form>
            </div>
            </div>

           
        </div>
    </div>
<?php
}elseif($tgpan=='akun'){
$sqldg="select * from akun where id = '$id'";
	$querydg = mysqli_query($conn, $sqldg);
	$hasil=mysqli_fetch_array($querydg); 
?>
	<script type="text/javascript">
function media(param)
{
if(param==1)
document.getElementById("kontak").style.display = 'block';
else
document.getElementById("kontak").style.display = 'none';

}
</script> 
<div class="modal-dialog modal-lg">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Halaman Edit Pegawai</h4>
        </div>

        <div class="modal-body">
        	<form action="cekedit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                  <table class="table table-striped">
<tr>
<td>Username</td>
<td><input type="text" name="username" value=<?php echo $hasil['username']?>></td>
</tr>
<tr>
<td>Level</td>
<td>
<?php
if($hasil['level']=="superadmin"){
	echo '<select name="level">
	<option value="superadmin">superadmin</option>
	<option value="admin">Admin</option>
	<option value="user">User</option>
	<option value="akun">Akun</option>
	<option value="online">Online</option>
	</select>';	
}elseif($hasil['level']=='admin'){
	echo '<select name="level">
	<option value="admin">Admin</option>
	<option value="superadmin">Superadmin</option>
	<option value="user">User</option>
	<option value="akun">Akun</option>
	<option value="online">Online</option>
	</select>';
}elseif($hasil['level']=='user'){
	echo '<select name="level">
	<option value="user">User</option>
	<option value="superadmin">Superadmin</option>
	<option value="admin">Admin</option>
	<option value="akun">Akun</option>
	<option value="online">Online</option>
	</select>';
}elseif($hasil['level']=='akun'){
	echo '<select name="level">
	<option value="akun">Akuntansi</option>
	<option value="superadmin">Superadmin</option>
	<option value="admin">Admin</option>
	<option value="user">User</option>
	<option value="online">Online</option>
	</select>';
}elseif($hasil['level']=='online'){
	echo '<select name="level">
	<option value="online">Online</option>
	<option value="akun">Akuntansi</option>
	<option value="superadmin">Superadmin</option>
	<option value="admin">Admin</option>
	<option value="user">User</option>
	</select>';
}
?>
</td>
<td>Lokasi</td>
<td>
<?php
if($hasil['lokasi']=='CM'){
	echo '<select name="lokasi">
	<option value="CM">Pramuka 180</option>
	<option value="CH">Pramuka 168</option>
	<option value="CPG">Premiun Gallery</option>
	<option value="CPIK">PIK</option>
	<option value="KG">Kelapa Gading</option>
	<option value="AL">Ruko Alsut</option>
	<option value="CBEK">Bekasi</option>
	<option value="CBDG">Bandung</option>
	</select>';
}elseif($hasil['lokasi']=='CH'){
	echo '<select name="lokasi">
	<option value="CH">Pramuka 168</option>
	<option value="CM">Pramuka 180</option>
	<option value="CPG">Premiun Gallery</option>
	<option value="CPIK">PIK</option>
	<option value="KG">Kelapa Gading</option>
	<option value="AL">Ruko Alsut</option>
	<option value="CBEK">Bekasi</option>
	<option value="CBDG">Bandung</option>
	</select>';
}elseif($hasil['lokasi']=='CPG'){
	echo '<select name="lokasi">
	<option value="CPG">Premiun Gallery</option>
	<option value="CM">Pramuka 180</option>
	<option value="CH">Pramuka 168</option>
	<option value="CPIK">PIK</option>
	<option value="KG">Kelapa Gading</option>
	<option value="AL">Ruko Alsut</option>
	<option value="CBEK">Bekasi</option>
	<option value="CBDG">Bandung</option>
	</select>';
}elseif($hasil['lokasi']=='AL'){
	echo '<select name="lokasi">
	<option value="AL">Ruko Alsut</option>
	<option value="CPG">Premiun Gallery</option>
	<option value="CM">Pramuka 180</option>
	<option value="CH">Pramuka 168</option>
	<option value="CPIK">PIK</option>
	<option value="KG">Kelapa Gading</option>
	<option value="CBEK">Bekasi</option>
	<option value="CBDG">Bandung</option>
	</select>';
}elseif($hasil['lokasi']=='CPIK'){
	echo '<select name="lokasi">
	<option value="CPIK">PIK</option>
	<option value="CPG">Premiun Gallery</option>
	<option value="CM">Pramuka 180</option>
	<option value="CH">Pramuka 168</option>
	<option value="KG">Kelapa Gading</option>
	<option value="AL">Ruko Alsut</option>
	<option value="CBEK">Bekasi</option>
	<option value="CBDG">Bandung</option>
	</select>';
}elseif($hasil['lokasi']=='KG'){
	echo '<select name="lokasi">
	<option value="KG">Kelapa Gading</option>
	<option value="CPIK">PIK</option>
	<option value="CPG">Premiun Gallery</option>
	<option value="CM">Pramuka 180</option>
	<option value="CH">Pramuka 168</option>
	<option value="AL">Ruko Alsut</option>
	<option value="CBEK">Bekasi</option>
	<option value="CBDG">Bandung</option>
	</select>';
	}elseif($hasil['lokasi']=='CBEK'){
	echo '<select name="lokasi">
	<option value="CBEK">Bekasi</option>
	<option value="CPIK">PIK</option>
	<option value="CPG">Premiun Gallery</option>
	<option value="CM">Pramuka 180</option>
	<option value="CH">Pramuka 168</option>
	<option value="KG">Kelapa Gading</option>
	<option value="AL">Ruko Alsut</option>
	<option value="CBDG">Bandung</option>
	</select>';
	}elseif($hasil['lokasi']=='CBDG'){
	echo '<select name="lokasi">
	<option value="CBDG">Bandung</option>
	<option value="CPIK">PIK</option>
	<option value="CPG">Premiun Gallery</option>
	<option value="CM">Pramuka 180</option>
	<option value="CH">Pramuka 168</option>
	<option value="KG">Kelapa Gading</option>
	<option value="AL">Ruko Alsut</option>
	<option value="CBEK">Bekasi</option>
	</select>';}?>
</td>
</tr>
<tr>
<td>Status</td>
<td>
<?php
if($hasil['status']=='tidakaktif'){
echo'
<select name="status">
<option value="tidakaktif">Tidak Aktif</option>
<option value="aktif">Aktif</option>
</select>
';	
}else{
echo '
<select name="status">
<option value="aktif">Aktif</option>
<option value="tidakaktif">Tidak Aktif</option>
</select>
';
};
?>
</td>
<td>Ingin Mengubah Password</td>
<td>
<input type="radio" name="pilihan" value="Tidak" onclick="media(0)" checked>Tidak
<input type="radio" name="pilihan" value="Ya" onclick="media(1)" >Ya
</td>
</tr>
<tr>
<td>
<input type="submit" value="Simpan"></td>
<td><input type="hidden" name="id" value="<?php echo $hasil['id']; ?>"></td><td>
<input type='hidden' name='tgpan' value='akun'>
<input type='hidden' name='asal' value='akun'>
</td>
<td>
<div id='kontak' style='display:none'><input type="password" name="password" ></div>
</td>
</tr>
</table>
                </div>

            	</form>
            </div>

           
        </div>
    </div>
<?php	
}elseif($tgpan=='brand'){
	$sql="select *from springbed where id = '$id'";
	$query = mysqli_query($conn, $sql);
	$hasil=mysqli_fetch_array($query) 
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Halaman Edit Brand</h4>
        </div>

        <div class="modal-body">
        	<form action="cekedit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
				<div class="modal-body">
				
                <div class="form-group col-sm-12" style="padding-bottom: 20px;">
					<div class='col-sm-6'>
						Brand :<input type='text' name='brand' value='<?php echo $hasil["brand"]?>'>
					</div>
					<div class='col-sm-6'>
						Nama :<input type='text' name='nama' value='<?php echo $hasil["nama"]?>'>
					</div>
				</div>
				<input type='hidden' name='tgpan' value='brand'>
				<input type='hidden' name='asal' value='brand'>
				<input type='hidden' name='id' value='<?php echo $hasil["id"]?>'>
					<button class="btn btn-primary" type="submit">Simpan</button>
	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button> 
				</form>
            </div>
            </div>

           
        </div>
    </div>
<?php
}elseif($tgpan=='harga'){
session_start();
$sql="select *from harga where id = '$id'";
	$query = mysqli_query($conn, $sql);
	$hasil=mysqli_fetch_array($query) 
?>
<script src='../asset/editharga.js'></script>
<div class="modal-dialog modal-lg">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>Nama : <?php echo $hasil['nama']; ?></b></center></h4>
        </div>

        <div class="modal-body">
        	<form action="cekedit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        	<div class='col-sm-8'><b>Apakah Anda Ingin Mengganti Nama Produk :</b>
					<input type="radio" name="hubungi" onclick="media(0)" value="Tidak" checked>Tidak
					<input type="radio" name="hubungi" onclick="media(1)" value="Iya" >Iya
			</div>
			<div class='col-sm-4' id='brand' style='display:none'> 
			<select name='brandbaru' onchange="showDiv(this)">
			<option value=''>-------------------</option>
			<option value='Protect A Bed'>Protect A Bed</option>
			<option value='Spring Bed'>Spring Bed</option>
			<option value='Bantal'>Bantal</option>
			</select>
			</div>
			<table class='table table-hover'>
			<tr>	
				<td>
						<select name='pabbaru' id="PAB" style="display:none;">
						<?php
						$sql="select *from springbed where brand = 'Protect A Bed'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select name='spbaru' id='springbed' onchange="sp(this)" style='display:none'>
							<option value="">-----</option>
							<option value="Alga">Alga</option>
							<option value="Airland">Airland</option>
							<option value="Comforta">Comforta</option>
							<option value='Cosisoft'>Cosisoft</option>
							<option value="Dreamline">Dreamline</option>
							<option value="Dunlopillo">Dunlopillo</option>
							<option value="Elite">Elite</option>
							<option value="Florance">Florance</option>
							<option value="King Koil">King Koil</option>
							<option value="Lady Americana">Lady Americana</option>
							<option value="Romance">Romance</option>
							<option value="Serta">Serta</option>
							<option value="Sleep Dream">Sleep Dream</option>
							<option value="Silent Night">Silent Night</option>
							<option value="Spring Air">Spring Air</option>
							<option value="Therapedic">Therapedic</option>
							<option value="Theraspine">Theraspine</option>
						</select>
						<select name='brand' id='btl' style='display:none;'>
						<?php
						$sql="select *from springbed where brand = 'bantal'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
								?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
				</td>
				<td>
						<select id="alga1" style="display:none;" name='alga'>
						<?php
						$sql="select *from springbed where brand = 'Alga'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="sp1" style="display:none;" name='SA'>
						<?php
						$sql="select *from springbed where brand = 'Spring Air'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="cm1" style="display:none;" name='cm'>
						<?php
						$sql="select *from springbed where brand = 'Comforta'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="fl1" style="display:none;" name='fl'>
						<?php
						$sql="select *from springbed where brand = 'Florance'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="serta1" style="display:none;" name='serta'>
						<?php
						$sql="select *from springbed where brand = 'Serta'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="kk1" style="display:none;" name='kingkoil'>
						<?php
						$sql="select *from springbed where brand = 'King Koil'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="air1" style="display:none;" name='airland'>
						<?php
						$sql="select *from springbed where brand = 'Airland'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="cos1" style="display:none;" name='cosisoft'>
						<?php
						$sql="select *from springbed where brand = 'Cosisoft'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="dun1" style="display:none;" name='dunlopillo'>
						<?php
						$sql="select *from springbed where brand = 'Dunlopillo'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="dream1" style="display:none;" name='dreamline'>
						<?php
						$sql="select *from springbed where brand = 'Dreamline'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="elit1" style="display:none;" name='elite'>
						<?php
						$sql="select *from springbed where brand = 'Elite'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="roman1" style="display:none;" name='romance'>
						<?php
						$sql="select *from springbed where brand = 'Romance'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="thera1" style="display:none;" name='therapedic'>
						<?php
						$sql="select *from springbed where brand = 'Therapedic'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="spine1" style="display:none;" name='theraspine'>
						<?php
						$sql="select *from springbed where brand = 'Theraspine'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="lady1" style="display:none;" name='lady'>
						<?php
						$sql="select *from springbed where brand = 'Lady Americana'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="sleep1" style="display:none;" name='sleep'>
						<?php
						$sql="select *from springbed where brand = 'Sleep & Dream'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select id="silent1" style="display:none;" name='silent'>
						<?php
						$sql="select *from springbed where brand = 'Silent Night'";
						$query = mysqli_query($conn, $sql);
						while($rowdg=mysqli_fetch_array($query)){ 
						?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
						<?php
						}
						?>
						</select>
						<select name='type' id='type' style='display:none'>
						<option value='Bantal'>Bantal</option>
						<option value='Guling'>Guling</option>
						</select>
						
				</td>
				<td>
					<select id="size" style='display:none' name='sizebaru'>
						<option value="90x200">90x200</option>
						<option value="100x200">100x200</option>
						<option value="120x200">120x200</option>
						<option value="160x200">160x200</option>
						<option value="180x200">180x200</option>
						<option value="200x200">200x200</option>
					</select>
				
				</td>
			</tr>
			<tr>
				<td><select id='setbaru' name='setbaru' style='display:none'>
					<option value='Kasur'>Kasur Saja</option>
					<option value='1Set'>1Set</option>
					</select>
				</td>
			</tr>
				<tr>
					<td>Harga</td>
					<td>User</td>
				</tr>
              <tr>
					<td>Presmi : <input type='text' name='presmi'  onkeyup="formatangka(this)"value='<?php echo $hasil['presmi'] ?>'></td>
					<td><b><?php echo $hasil['userpresmi']?></b></td>
			  </tr>
			  <tr>
					<td>Netto : <input type='text' name='ck' onkeyup="formatangka(this)" value='<?php echo $hasil['ck'] ?>'></td>
					<td><b><?php echo $hasil['userck'] ?></b></td>
			  
			  </tr>
			  <tr>
					<td>Jualck : <input type='text' name='jualck' onkeyup="formatangka(this)" value='<?php echo $hasil['jualck'] ?>'></td>
					<td><b><?php echo $hasil['userjualck'] ?><b></td>
			  </tr>
			</table>
				<div class="modal-footer">
				<input type='hidden' name='id' value='<?php echo $hasil["id"]?>'>
				<input type='hidden' name='user' value='<?php echo $_SESSION["username"]?>'>
				<input type='hidden' name='tgpan' value='harga'>
				<input type='hidden' name='asal' value='harga'>
	                <button class="btn btn-success" type="submit">Confirm
	                </button> <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button>
	            </div></form>
            </div>      
        </div>
    </div>

<?php
}
?>
