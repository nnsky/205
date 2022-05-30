<html>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['pl_v']=='block'){

	}elseif($_SESSION['level']=='user'){
		header("location:../logout.php");
	}else{
		header("location:../logout.php");	
	}
?>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pricelist</title>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
	<script src='../asset/harga.js'></script>
	<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<style>
.edit{
	display:<?php echo $array['pl_e'] ?>;
	width:50px;
}
</style>
</head>
<body>
<div class="container col-sm-12">		
	<center><div class='col-sm-3'><button   style='display:<?php echo $array["pl_i"]; ?>;width:60px;' class="btn btn-primary " data-toggle="modal" data-target="#ModalAdd">Buat</button></div>
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
	<form role="form" method="POST" action="buat.php" >
	<table class='table table-hover'>
	<tr>
	<td>Brand</td>
	<td>Nama</td>
	<td>Ukuran</td>
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
	Harga Presmi :
	</td>
	<td><input type='text' name='presmi' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
</tr>
<tr>
	<td>
	Harga  Netto:
	</td>
	<td><input type='text' name='netto' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
</tr>
<tr>
	<td>
	Harga Jual Ck :
	</td>
	<td><input type='text' name='jual' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
<td><input type='hidden' name='perihal' value='harga'></td>
<td><input type='hidden' name='user' value='<?php echo $_SESSION["username"]?>'></td>
<td><input type='hidden' name='jenis' value='pab'></td>
</tr>
<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td></tr>		
		
		</table>
	</form>

	</div>
			<div class="div2" style="display:none;">
	<form role="form" method="POST" action="buat.php" >
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
		<option value="Bigland">Bigland</option>
		<option value="Comforta">Comforta</option>
		<option value='Cosisoft'>Cosisoft</option>
		<option value="Dreamline">Dreamline</option>
		<option value="Dunlopillo">Dunlopillo</option>
		<option value="Elite">Elite</option>
		<option value="Florence">Florence</option>
		<option value="King Koil">King Koil</option>
		<option value="Lady Americana">Lady Americana</option>
		<option value="Romance">Romance</option>
		<option value="Serta">Serta</option>
		<option value="Sleep Dream">Sleep Drean</option>
		<option value="Silent Night">Silent Night</option>
		<option value="Simmons">Simmons</option>
		<option value="Spring Air">Spring Air</option>
		<option value="Superland">Superland</option>
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
		<select id="bigland" style="display:none;" name='bigland'>
		<?php
		$sql="select *from springbed where brand = 'Bigland'";
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
		<select id="Florence" style="display:none;" name='Florence'>
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
		$sql="select *from springbed where brand = 'Romance'";
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
				<select id="superland" style="display:none;" name='superland'>
		<?php
		$sql="select *from springbed where brand = 'Superland'";
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
		<select id="simmons" style="display:none;" name='simmons'>
		<?php
		$sql="select *from springbed where brand = 'Simmons'";
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
		<option value="140x200">140x200</option>
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
	Harga Presmi :
	</td>
	<td><input type='text' name='presmi' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
</tr>
<tr>
	<td>
	Harga  Netto:
	</td>
	<td><input type='text' name='netto' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
</tr>
<tr>
	<td>
	Harga Jual Ck :
	</td>
	<td><input type='text' name='jual' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
<td><input type='hidden' name='perihal' value='harga'></td>
<td><input type='hidden' name='user' value='<?php echo $_SESSION["username"]?>'></td>
<td><input type='hidden' name='jenis' value='springbed'></td>
</tr>
<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td></tr>		
		
		</table>
	</form>
</div>
				
				<div class="div3" style="display:none;">
	<form role="form" method="POST" action="buat.php" >
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
	Harga Presmi :
	</td>
	<td><input type='text' name='presmi' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
</tr>
<tr>
	<td>
	Harga  Netto:
	</td>
	<td><input type='text' name='netto' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
</tr>
<tr>
	<td>
	Harga Jual Ck :
	</td>
	<td><input type='text' name='jual' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
<td><input type='hidden' name='perihal' value='harga'></td>
<td><input type='hidden' name='user' value='<?php echo $_SESSION["username"]?>'></td>
<td><input type='hidden' name='jenis' value='bantal'></td>
</tr>
<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td></tr>		
		
		</table>
	</form>
	</div>
	
			</div>           
        </div>
    </div>
</div>


<div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
								<th>Nama</th>
								<th>Presmi</th>
								<th>Harga Netto</th>
								<th>Harga Jual CK</th>
								<th>Action</th>
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
</body>
        <script src="../asset/jquery.dataTables.js"></script>
        <script src="../asset/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qharga.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
</html>
 
 



