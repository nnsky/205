<?php
include '../koneksi.php';
$id=$_GET['_id'];
$sql="SELECT * FROM harga where id = '$id'";
$query = mysqli_query($conn, $sql);
$hasil=mysqli_fetch_array($query);
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
						<option value="140x200">140x200</option>
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
					<td>Link</td>
					<td>User</td>
				</tr>
              <tr>
					<td>CK : <input type='text' name='ck'  onkeyup="formatangka(this)"value='<?php echo $hasil['ck'] ?>'></td>
					<td></td>
					<td><b><?php echo $hasil['userck']?></b></td>
			  </tr>
			  <tr>
					<td>Tokopedia : <input type='text' name='tokped' onkeyup="formatangka(this)" value='<?php echo $hasil['tokped'] ?>'></td>
					<td>Tokopedia : <input type='text' name='linktokped' value='<?php echo $hasil['linktokped'] ?>' style='width:350px;'></td>
					<td><b><?php echo $hasil['usertok'] ?></b></td>
			  
			  </tr>
			  <tr>
					<td>Bukalapak : <input type='text' name='bl' onkeyup="formatangka(this)" value='<?php echo $hasil['bl'] ?>'></td>
					<td>Bukalapak : <input type='text' name='linkbl' value='<?php echo $hasil['linkbl'] ?>' style='width:350px;'></td>
					<td><b><?php echo $hasil['userbl'] ?><b></td>
			  </tr>
			    <tr>
					<td>Lazada : <input type='text' name='lazada' onkeyup="formatangka(this)" value='<?php echo $hasil['lazada'] ?>'></td>
					<td>Lazada : <input type='text' name='linklazada' value='<?php echo $hasil['linklazada'] ?>' style='width:350px;'></td>
					<td><b><?php echo $hasil['userlazada'] ?></b><input type='hidden' name='id' value='<?php echo $hasil['id']?>'></td>
			  </tr>
			</table>
				<div class="modal-footer">
	                <button class="btn btn-success" type="submit">Confirm
	                </button> <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button>
	            </div></form>
            </div>      
        </div>
    </div>

