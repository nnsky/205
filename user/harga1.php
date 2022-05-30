<html>
<?php
include '../koneksi.php';
session_start();
if($_SESSION['level']=="online" && $_SESSION['status']=='aktif'){
		$create='block';
	}elseif($_SESSION['level']=='user' && $_SESSION['status']=='aktif'){
		$create='none';
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
	<link rel='stylesheet' href="../css/respon.css">
	<link rel="stylesheet" href="../asset/tablejquery.css">
	<script src="../asset/tablejquery.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="fALe">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	 <a class="navbar-brand" href="index">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="respon">Respon</a></li>
        <li><a href="../logout.php">Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style='margin-top:-30px;'>		
	<br/>
	<button   style='display:<?php echo $create ?>' class="btn btn-primary " data-toggle="modal" data-target="#ModalAdd">Buat</button>
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
	<form role="form" method="POST" action="cekharga.php" >
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
		<option value="140x200">140x200</option>
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
	<td><input type='hidden' name='perihal' value='PAB'></td>
</tr>
<tr>
	<td>
	Harga Tokopedia :
	</td>
	<td><input type='text' name='tokped' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linktokped' placeholder="Link" required></td>

</tr>
<tr>
	<td>
	Harga Bukalapak :
	</td>
	<td><input type='text' name='bl' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linkbl' placeholder="Link" required></td>

</tr>
<tr>
	<td>
	Harga lazada :
	</td>
	<td><input type='text' name='lazada' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linklazada' placeholder="Link" required></td>

</tr>
<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td></tr>		
		
		</table>
	</form>

	</div>
			<div class="div2" style="display:none;">
	<form role="form" method="POST" action="cekharga.php" >
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
	Harga CK :
	</td>
	<td><input type='text' name='ck' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='hidden' name='perihal' value='springbed'></td>
</tr>
<tr>
	<td>
	Harga Tokopedia :
	</td>
	<td><input type='text' name='tokped' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linktokped' placeholder="Link" required></td>

</tr>
<tr>
	<td>
	Harga Bukalapak :
	</td>
	<td><input type='text' name='bl' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linkbl' placeholder="Link" required></td>

</tr>
<tr>
	<td>
	Harga lazada :
	</td>
	<td><input type='text' name='lazada' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linklazada' placeholder="Link" required></td>

</tr>
<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td></tr>		
		
		</table>
	</form>
</div>
				
				<div class="div3" style="display:none;">
	<form role="form" method="POST" action="cekharga.php" >
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
	<td><input type='hidden' name='perihal' value='bantal'></td>
</tr>
<tr>
	<td>
	Harga Tokopedia :
	</td>
	<td><input type='text' name='tokped' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linktokped' placeholder="Link" required></td>

</tr>
<tr>
	<td>
	Harga Bukalapak :
	</td>
	<td><input type='text' name='bl' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linkbl' placeholder="Link" required></td>

</tr>
<tr>
	<td>
	Harga lazada :
	</td>
	<td><input type='text' name='lazada' placeholder="Harga Saat Ini" onkeyup="formatangka(this)" required></td>
	<td><input type='text' name='linklazada' placeholder="Link" required></td>

</tr>
<tr><td><button class="btn btn-success" type="submit">Confirm</button></td><td><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></td></tr>		
		
		</table>
	</form>
	</div>
	
			</div>           
        </div>
    </div>
</div>
	<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[-1, 10, 50, 75], ["All", 10, 50, 75]]
    } );
} );
</script>
<?php
if($_SESSION['level']=="online" && $_SESSION['status']=='aktif'){
?>
<table id="example" class="display table table-hover" cellspacing="0" width="100%" style='font-size:14;'>
        <thead>
	<tr>
	<th class="a">Nama</th>
	<th class="b">Harga CK</th>
	<th class="e">Tokopedia</th>
	<th class="q">Bukalapak</th>
	<th class="">Lazada</th>
	<th class="h">Action</th>
</tr>
        </thead>
        <tbody>

<?php
		$sql="select *from harga";
		$query = mysqli_query($conn, $sql);
		while($hasil=mysqli_fetch_array($query)){
	$a= str_replace(".", "", $hasil['ck']);
	$x= str_replace(".", "", $hasil['tokped']);
	$y= str_replace(".", "", $hasil['bl']);
	$z= str_replace(".", "", $hasil['lazada']);
	
	if($hasil['tokped']==0){
	$b='999999999';	
	}else{
	$b=$x;
	}
	if($hasil['bl']==0){
	$c='999999999';	
	}else{
	$c=$y;
	}
	if($hasil['lazada']=='0'){
	$d='999999999';	
	}else{
	$d=$z;
	}
	$e=min($a,$b,$c,$d);
	if($e!=$a){
	$style='red';
	$filter='Bersaing';	
	}else{
	$style='white';
	$filter='Termurah';
	}
echo '<tr style="background-color:'.$style.'">
	<td>'.$hasil["nama"].'</td>		
	 <td>Rp '.$hasil["ck"].'('.$hasil["dateck"].')</td>
	 <td><a href="'.$hasil["linktokped"].'" target="_blank">Rp '.$hasil["tokped"].'('.$hasil["datetokped"].')</a></td>
	 <td><a href="'.$hasil["linkbl"].'" target="_blank">Rp '.$hasil["bl"].'('.$hasil["datebl"].')</a></td>
	 <td><a href="'.$hasil["linklazada"].'" target="_blank">Rp '.$hasil["lazada"].'('.$hasil["datelazada"].')</a></td>
	  <td><button style="margin-top:-2px; height:35px;" id="'.$hasil['id'].'"class="open_modal btn btn-primary" >'.$filter.'</button></td>
	</tr>';
	}
?>
</tbody>	
		</table>
<div id="ModalRespon" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
	
	<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "editharga.php",
    			   type: "GET",
    			   data : {_id: m},
    			   success: function (ajaxData){
      			   $("#ModalRespon").html(ajaxData);
      			   $("#ModalRespon").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>
<?php
}else{
?>	
<table id="example" class="display table table-hover" cellspacing="0" width="100%" style='font-size:14;'>
        <thead>
	<tr>
	<th class="a">Nama</th>
	<th>Presmi</th>
	<th class="b">Harga Netto</th>
	<th>Harga Jual CK</th>
</tr>
        </thead>
        <tbody>

<?php
		$sql="select *from harga";
		$query = mysqli_query($conn, $sql);
		while($hasil=mysqli_fetch_array($query)){
			if($hasil['presmi']==null){
				$presmi=0;
			};
			if($hasil['jualck']==null){
				$jualck=0;
			}
echo '<tr>
	<td>'.$hasil["nama"].'</td>		
	<td>'.$presmi.'('.$hasil["datepresmi"].')</td>		
	 <td>Rp '.$hasil["ck"].'('.$hasil["dateck"].')</td>
	 <td>'.$jualck.'('.$hasil["datejualck"].')</td>
	 </tr>';
	}
?>
</tbody>	
		</table>
<?php
};
?>
</body>
</html>

