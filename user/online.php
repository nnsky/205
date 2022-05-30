<html>
<?php
include "menu.php";
	if($_SESSION['level']=="user" && $_SESSION['status']=='aktif' && $array["re_v"]=='block'){
	$lokasi=$_SESSION['lokasi'];	
	}else{
	header("location:../logout.php");
	}
?>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perbandingan Harga</title>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
	<script src='../asset/harga.js'></script>
<style>
.edit{
	display:<?php echo $array['ol_e'] ?>;
	width:50px;
}
</style>
</head>
<body>

<div class="container col-sm-12">		
	<center><div class='col-sm-3'><button   style='display:<?php echo $create ?>' class="btn btn-primary " data-toggle="modal" data-target="#ModalAdd">Buat</button></div>
	<div class='col-sm-7'>
	<form action='cari' method='GET'>
	<select name='cari' style='height:25px;font-size:15px;'>
	<option value='nama'>Nama</option>
	<option value='status'>Status</option>
	</select>
	<input type='text' name='search'>
	<button>Submit</button>
	<input type='hidden' name='asal' value='online'>
	</form>
	</div></center>
</div>
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">FORM Harga</h4>
        </div>
        <div class="modal-body">
	<center>
	<button value='1' class="1 btn btn-primary">Protect A Bed</button>
	<button value='2' class="2 btn btn-success">Spring Bed</button>
	<button value='3' class="3 btn btn-danger">Bantal</button></center>
	<div class="div1" style="display:none">
	<form role="form" method="POST" action="cekonline.php" >
	<table class='table table-hover'>
	<tr>
	<td>Brand</td>
	<td>Nama</td>
	<td>Ukuran</td>
	<td>Toko</td>
	</tr>
	<tr>
	<td>
	<select name='brand'>
		<option value="Protect A Bed">Protect A Bed</option>
		</select>
	</td>
	<td> 
		<select name='type'>
		<?php
		$sql="select *from springbed where brand = 'Protect A Bed'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
	</td>
	<td>
		<select name='size'>
		<option value="100x200">100x200</option>
		<option value="120x200">120x200</option>
		<option value="160x200">160x200</option>
		<option value="180x200">180x200</option>
		<option value="200x200">200x200</option>
		</select>
	</td>
	</tr>
<tr>
	<td>
	Harga CK :
	</td>
	<td><input type='text' name='ck' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td>Harga Pabrik : <input type='hidden' name='perihal' value='PAB'></td>
	<td><input type='text' name='presmi' placeholder="Harga Pabrik" onkeyup="formatangka(this)"></td>
</tr>
<tr>
	<td>
	Harga Tokopedia :
	</td>
	<td><input type='text' name='tokped' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linktokped' placeholder="Link" required></td>
	<td><input type='text' name='tokotokped' placeholder="Nama Toko" required></td>
</tr>
<tr>
	<td>
	Harga Bukalapak :
	</td>
	<td><input type='text' name='bl' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linkbl' placeholder="Link" required></td>
	<td><input type='text' name='tokobl' placeholder="Nama Toko" required></td>
</tr>
<tr>
	<td>
	Harga lazada :
	</td>
	<td><input type='text' name='lazada' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linklazada' placeholder="Link" required></td>
	<td><input type='text' name='tokolazada' placeholder="Nama Toko" required></td>
</tr>
<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td></tr>		
		
		</table>
	</form>

	</div>
			<div class="div2" style="display:none;">
	<form role="form" method="POST" action="cekonline.php" >
	<table class='table table-hover'>
	<tr>
	<td>Brand</td>
	<td>Nama</td>
	<td>Ukuran</td>
	<td>Set</td>
	</tr>
	<tr>
	<td>
	<select name='brand' onchange="showDiv(this)" required>
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
		<option value="Sleep Dream">Sleep Drean</option>
		<option value="Silent Night">Silent Night</option>
		<option value="Spring Air">Spring Air</option>
		<option value="Therapedic">Therapedic</option>
		<option value="Theraspine">Theraspine</option>
		</select>
	</td>
	<td> 
		<select id="alga" style="display:none;" name='alga'>
		<?php
		$sql="select *from springbed where brand = 'Alga'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="sp" style="display:none;" name='SA'>
		<?php
		$sql="select *from springbed where brand = 'Spring Air'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="cm" style="display:none;" name='Comforta'>
		<?php
		$sql="select *from springbed where brand = 'Comforta'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
				?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="florance" style="display:none;" name='Florance'>
		<?php
		$sql="select *from springbed where brand = 'Florance'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="serta" style="display:none;" name='serta'>
		<?php
		$sql="select *from springbed where brand = 'Serta'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="kk" style="display:none;" name='kingkoil'>
		<?php
		$sql="select *from springbed where brand = 'King Koil'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="al" style="display:none;" name='airland'>
		<?php
		$sql="select *from springbed where brand = 'Airland'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="dr" style="display:none;" name='dreamline'>
		<?php
		$sql="select *from springbed where brand = 'Dreamline'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="cos" style="display:none;" name='cosisoft'>
		<?php
		$sql="select *from springbed where brand = 'Cosisoft'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
			</select>
		<select id="lady" style="display:none;" name='lady'>
		<?php
		$sql="select *from springbed where brand = 'Lady Americana'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
			</select>
		<select id="dun" style="display:none;" name='dunlopillo'>
		<?php
		$sql="select *from springbed where brand = 'Dunlopillo'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
			</select>
		<select id="eli" style="display:none;" name='elite'>
		<?php
		$sql="select *from springbed where brand = 'Elite'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
				<select id="rom" style="display:none;" name='romance'>
		<?php
		$sql="select *from springbed where brand = 'Elite'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
				<select id="thera" style="display:none;" name='therapedic'>
		<?php
		$sql="select *from springbed where brand = 'Therapedic'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="spine" style="display:none;" name='theraspine'>
		<?php
		$sql="select *from springbed where brand = 'Theraspine'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="sleep" style="display:none;" name='sleep'>
		<?php
		$sql="select *from springbed where brand = 'Sleep & Dream'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
		<select id="silent" style="display:none;" name='silent'>
		<?php
		$sql="select *from springbed where brand = 'Silent Night'";
		$query = mysqli_query($conn, $sql);
		while($rowdg=mysqli_fetch_array($query)){ 
		?><option value='<?php echo $rowdg["nama"]?>'><?php echo $rowdg["nama"]?></option>;
		<?php
		}
		?>
		</select>
	</td>
	<td>
		<select name='size'>
		<option value="90x200">90x200</option>
		<option value="100x200">100x200</option>
		<option value="120x200">120x200</option>
		<option value="160x200">160x200</option>
		<option value="180x200">180x200</option>
		<option value="200x200">200x200</option>
		</select>
	</td>
	<td>
		<select name="set">
		<option value='Kasur'>Kasur Saja</option>
		<option value='1Set'>1Set</option>
		</select>
	</td>
	</tr>
<tr>
	<td>
	Harga CK :
	</td>
	<td><input type='text' name='ck' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td>Harga Pabrik :
	<input type='hidden' name='perihal' value='springbed'></td>
	<td><input type='text' name='presmi' placeholder='Harga Pabrik' onkeyup="formatangka(this)" required></td>
	</tr>
<tr>
	<td>
	Harga Tokopedia :
	</td>
	<td><input type='text' name='tokped' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linktokped' placeholder="Link" required></td>
	<td><input type='text' name='tokotokped' placeholder="Nama Toko" required></td>
</tr>
<tr>
	<td>
	Harga Bukalapak :
	</td>
	<td><input type='text' name='bl' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linkbl' placeholder="Link" required></td>
	<td><input type='text' name='tokobl' placeholder="Nama Toko" required></td>
</tr>
<tr>
	<td>
	Harga lazada :
	</td>
	<td><input type='text' name='lazada' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linklazada' placeholder="Link" required></td>
	<td><input type='text' name='tokolazada' placeholder="Nama Toko" required></td>
</tr>
<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td></tr>		
		
		</table>
	</form>
</div>
				
				<div class="div3" style="display:none;">
	<form role="form" method="POST" action="cekonline.php" >
	<table class='table table-hover'>
	<tr>
	<td>Brand</td>
	<td>Type</td>
	</tr>
	<tr>
	<td>
	<select name='brand'>
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
	<select name='type'>
	<option value='Bantal'>Bantal</option>
	<option value='Guling'>Guling</option>
	</select>
	</td>
	</tr>
<tr>
	<td>
	Harga CK :
	</td>
	<td><input type='text' name='ck' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td>Harga Pabrik : <input type='hidden' name='perihal' value='bantal'></td>
	<td><input type='text' name='presmi' placeholder="Harga Pabrik" onkeyup="formatangka(this)" required></td>
	</tr>
<tr>
	<td>
	Harga Tokopedia :
	</td>
	<td><input type='text' name='tokped' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linktokped' placeholder="Link" required></td>
	<td><input type='text' name='tokotokped' placeholder="Nama Toko" required></td>
</tr>
<tr>
	<td>
	Harga Bukalapak :
	</td>
	<td><input type='text' name='bl' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linkbl' placeholder="Link" required></td>
	<td><input type='text' name='tokobl' placeholder="Nama Toko" required></td>
</tr>
<tr>
	<td>
	Harga lazada :
	</td>
	<td><input type='text' name='lazada' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linklazada' placeholder="Link" required></td>
	<td><input type='text' name='tokolazada' placeholder="Nama Toko" required></td>
</tr>
<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td></tr>		
		
		</table>
	</form>
	</div>
	
			</div>           
        </div>
    </div>
</div>
<div class='container'>
           <div class="container">  
                     <br />  
                          <table class="table table-bordered" id="table_hasil">  
                               <tr>  
                                <th class="a">Nama</th>
								<th class="b">Harga CK</th>
								<th class="e">Tokopedia</th>
								<th class="q">Bukalapak</th>
								<th class="">Lazada</th>
								<th class="h">Action</th>    
                               </tr>  
                               <?php  
											   while($hasil = mysqli_fetch_array($result))  
											   {
										   if($hasil['tokped']==0 or $hasil['tokped']==null){
					$tokped='0 ('.$hasil["datetokped"].')';
					}else{
					$b=$hasil['tokped'];
					$tokped='<a href="'.$hasil["linktokped"].'" target="_blank">Rp '.$hasil["tokped"].'('.$hasil["datetokped"].')</a>';
					}
					if($hasil['bl']==0 or $hasil['bl']==null){
					
					$bl='0 ('.$hasil["datebl"].')';
					}else{
					$c=$hasil['bl'];
					$bl='<a href="'.$hasil["linkbl"].'" target="_blank">Rp '.$hasil["bl"].'('.$hasil["datebl"].')</a>';
					}
					if($hasil['lazada']==0 or $hasil['lazada']==null){
					$lazada='0 ('.$hasil["datelazada"].')';
					}else{
					$lazada='<a href="'.$hasil["linklazada"].'" target="_blank">Rp '.$hasil["lazada"].'('.$hasil["datelazada"].')</a>';
					$d=$hasil['lazada'];
					};
					
					if($hasil['status']== "Termurah"){
						$style='black';
					}else{
						$style='red';
					};
					
					
				echo '<tr style="color:'.$style.'">
					<td>'.$hasil["nama"].'</td>		
					 <td>Rp '.$hasil["ck"].'('.$hasil["dateck"].')</td>
					 <td>'.$tokped.'</td>
					 <td>'.$bl.'</td>
					 <td>'.$lazada.'</td>';
                               ?>  
                                    <td><input type="button" name="edit" value="<?php echo $hasil['status']?>" id="<?php echo $hasil["id"]; ?>" class="btn btn-primary edit_data" /></td> 
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
           </div>
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
          <li><a href="online.php?page=1">First</a></li>
          <li><a href="online.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <!-- LINK NUMBER -->
        <?php
        // Buat query untuk menghitung semua jumlah data
		//$sql2 = "SELECT COUNT(*) AS jumlah FROM harga";
        //$sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM siswa");
       // $sql2->execute(); // Eksekusi querynya
		$sql2="SELECT * FROM harga";
		$result1=mysqli_query($conn,$sql2);
		$get_jumlah=mysqli_num_rows($result1);
        
        $jumlah_page = ceil($get_jumlah/$limit); // Hitung jumlah halamannya
        $jumlah_number = 5; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="online.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
          <li><a href="online.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="online.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?>
      </ul></center>
	
      </body>  
 </html>  
 
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog modal-lg">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"><center><span id='nama' name='nama'></span></center></h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                             <div class="modal-body">
			<div class='row'>
				<div class='col-sm-2'>
				<b>Asal</b>
				</div>
				<div class='col-sm-3'>
				<b>Harga</b>
				</div>
				<div class='col-sm-3'>
				<b>Link</b>
				</div>
				<div class='col-sm-2'>
				<b>Toko</b>
				</div>
				<div class='col-sm-2'>
				<b>User</b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				Harga Pabrik
				</div>
				<div class='col-sm-3'>
				<input type='text' name='presmi'  onkeyup="formatangka(this)" id="presmi" required>
				</div>
				<div class='col-sm-3'>
				
				</div>
				<div class='col-sm-2'>
				
				</div>
				<div class='col-sm-2'>
				<b><span id='userpresmi'></span></b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				CK
				</div>
				<div class='col-sm-3'>
				<input type='text' name='ck'  onkeyup="formatangka(this)" id='ck' required>
				</div>
				<div class='col-sm-3'>
				
				</div>
				<div class='col-sm-2'>
				
				</div>
				<div class='col-sm-2'>
				<b><span id='userck'></span></b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				Tokopedia
				</div>
				<div class='col-sm-3'>
				<input type='text' name='tokped' onkeyup="formatangka(this)" id='tokped' required>
				</div>
				<div class='col-sm-3'>
				<input type='text' name='linktokped' id='linktokped' required>
				</div>
				<div class='col-sm-2'>
				<input type='text'name='tokotokped' id='tokotokped' style='width:140px' required>
				</div>
				<div class='col-sm-2'>
				<b><span id='usertok'></span></b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				Bukalapak
				</div>
				<div class='col-sm-3'>
				<input type='text' name='bl' onkeyup="formatangka(this)" id='bl' required>
				</div>
				<div class='col-sm-3'>
				<input type='text' name='linkbl' id='linkbl' required>
				</div>
				<div class='col-sm-2'>
				<input  type='text'name='tokobl' id='tokobl'  style='width:140px' required>
				</div>
				<div class='col-sm-2'>
				<b><span id='userbl'></span></b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				Lazada
				</div>
				<div class='col-sm-3'>
				<input type='text' name='lazada' onkeyup="formatangka(this)" id='lazada' required>
				</div>
				<div class='col-sm-3'>
				<input type='text' name='linklazada' id='linklazada' required>
				</div>
				<div class='col-sm-2'>
				<input  type='text'name='tokolazada' id='tokolazada' style='width:140px' required>
				</div>
				<div class='col-sm-2'>
				<b><span id='userlazada'></span></b>
				</div>
				<input type='hidden' name='hasil_id' id='hasil_id'>			
				<input type='hidden' name='user' id='user'>
				<input type='hidden' name='halaman' id='halaman'>
				<input type='hidden' name='cari' id='cari'>
				<input type='hidden' name='search' id='search'>
				<input type='hidden' name='type' id='type'>
			</div>
		</div>	
                </div>  
                <div class="modal-footer">  
				<input type="submit" name="insert" id="insert" value="Simpan" class="btn btn-success" />
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div> 
				</form>  				
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var hasil_id = $(this).attr("id"); 
           $.ajax({  
                url:"query.php",  
                method:"POST",  
                data:{hasil_id:hasil_id,lokasi:"harga"},  
                dataType:"json",  
                success:function(data){  
                     $('#nama').text(data.nama);  
                     $('#presmi').val(data.presmi);  
                     $('#userpresmi').text(data.userpresmi); 
					 $('#ck').val(data.ck);
					 $('#userck').text(data.userck);
					 $('#tokped').val(data.tokped);
					 $('#linktokped').val(data.linktokped);
					 $('#tokotokped').val(data.tokotokped);
					 $('#usertok').text(data.usertok);
					 $('#bl').val(data.bl);
					 $('#linkbl').val(data.linkbl);
					 $('#tokobl').val(data.tokobl);
					 $('#userbl').text(data.userbl);
                     $('#lazada').val(data.lazada);
					 $('#linklazada').val(data.linklazada);
					 $('#tokolazada').val(data.tokolazada);
					 $('#userlazada').text(data.userlazada);
					 $('#halaman').val("<?php echo $halaman?>");
					 $('#user').val("<?php echo $_SESSION['username']?>");
					 $('#cari').val('');
					 $('#search').val('');
					 $('#hasil_id').val(data.id);
					 $('#type').val("harga");
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"update.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Simpan");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#table_hasil').html(data);  
                     }  
                });  
           }  
      });   
 });  
 </script>
 
</div>
</body>
</html>



