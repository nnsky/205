<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<?php
include "menu.php";
$user=$_SESSION['username'];
$store=$_SESSION['lokasi'];
$pecah=explode('/',$_GET['edit']);
$jenis=$pecah[0];
$type=$pecah[1];

$store1="GCK,CM,CH,CPG,KG,AL,CPIK,CBEK,CBDG,Sunter,CPI,CMKS";
$store=explode(",",$store1);
$count=count($store)-1;

echo "<form action='inven_edit_proses' method='POST'>";

for($i=0;$i<=$count;$i++){
	$cari=mysqli_query($conn,"select *from inven_stock where jenis='$jenis' && type='$type' && store='$store[$i]'");

	if($cari->num_rows<=0){
		
	}else{
		echo "<h3>STORE : ".$store[$i]." </h3>
		<table class='table table-bordered'>
			 <thead>
			   <tr>
					<th>Lokasi</th>
					<th>Stock</th>
					<th>Terpakai</th>
					<th>Rusak</th>
					<th>Catatan</th>
			   </tr>";
			  while($isi=mysqli_fetch_array($cari)){
				  echo "
				  <tr>
					<th>".$isi['lokasi']."</th>
					<th><input type='number' name='stock[]' value='".$isi['stock']."' required></th>
					<th><input type='number' name='terpakai[]' value='".$isi['terpakai']."' required></th>
					<th><input type='number' name='rusak[]' value='".$isi['rusak']."' required></th>
					<th><input type='text' class='form-control' name='catatan[]' value='".$isi['catatan']."'>
					<input type='hidden' name='lokasi[]' value='".$isi['lokasi']."'>
					<input type='hidden' name='kode_produk[]' value='".$isi['kode_produk']."'>
					</th>
					
				  </tr>
				  ";
			  } 
	echo "    
		</table>
		";
	}
}
echo "
<input type='submit' value='simpan' class='btn btn-primary'>
<input type='hidden' value='".$jenis."' name='jenis'>
<input type='hidden' value='".$type."' name='type'>
<input type='hidden' value='".$user."' name='user'>
<a href='inven' class='btn btn-success'>Kembali</a>
		</form>
";
?>
