<html>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Laporan Angpao</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<?php
include 'menu.php';

$date=date('dmY');
?>
</head>
<body>
	<center><h3>Laporan Pemakaian Kupon Harian</h3></center>
	<table class='table table-bordered'>
		<tr>
			<th>No</th>
			<th>Kupon</th>
			<th>Total</th>
		</tr>
		<tr>
			<th>1</th>
			<th>P1</th>
			<th>
			<?php
				$spe="select *from dbpemakaian where paket='P1' && tanggal='$date'";
				$qpe=mysqli_query($conn,$spe);
				$ape=mysqli_num_rows($qpe);
				
				echo $ape;
			?>
			</th>
		</tr>
				<tr>
			<th>2</th>
			<th>P2</th>
			<th>
			<?php
				$spe="select *from dbpemakaian where paket='P2' && tanggal='$date'";
				$qpe=mysqli_query($conn,$spe);
				$ape=mysqli_num_rows($qpe);
				
				echo $ape;
			?>
			</th>
		</tr>
				<tr>
			<th>3</th>
			<th>P3</th>
			<th>
			<?php
				$spe="select *from dbpemakaian where paket='P3' && tanggal='$date'";
				$qpe=mysqli_query($conn,$spe);
				$ape=mysqli_num_rows($qpe);
				
				echo $ape;
			?>
			</th>
		</tr>
		<tr>
			<th>4</th>
			<th>P4</th>
			<th>
			<?php
				$spe="select *from dbpemakaian where paket='P4' && tanggal='$date'";
				$qpe=mysqli_query($conn,$spe);
				$ape=mysqli_num_rows($qpe);
				
				echo $ape;
			?>
			</th>
		</tr>
				<tr>
			<th>5</th>
			<th>P5</th>
			<th>
			<?php
				$spe="select *from dbpemakaian where paket='P5' && tanggal='$date'";
				$qpe=mysqli_query($conn,$spe);
				$ape=mysqli_num_rows($qpe);
				
				echo $ape;
			?>
			</th>
		</tr>
				<tr>
			<th>6</th>
			<th>P6</th>
			<th>
			<?php
				$spe="select *from dbpemakaian where paket='P6' && tanggal='$date'";
				$qpe=mysqli_query($conn,$spe);
				$ape=mysqli_num_rows($qpe);
				
				echo $ape;
			?>
			</th>
		</tr>
	</table>
	<center><h3>Laporan  Penyerahan Voucher ke konsumen - Harian</h3></center>
	<table class='table table-bordered'>
		<tr>
			<th>Tanggal</th>
			<th>Paket</th>
			<th>Jenis</th>
			<th>Brand</th>
			<th>Total</th>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P1</td>
			<td>Matress</td>
			<td>Kingkoil</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P1%' && tanggal='$date' && brand like '%kingkoil%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
				<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P1</td>
			<td>Matress</td>
			<td>Serta - Florence</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P1%' && tanggal='$date' && brand like '%serta%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
			<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P1</td>
			<td>Matress</td>
			<td>Simmons - Airland</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P1%' && tanggal='$date' && brand like '%simmons%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P1</td>
			<td>Matress</td>
			<td>Lady Americana – Elite</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P1%' && tanggal='$date' && brand like '%lady americana%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?>
			</td>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P1</td>
			<td>Matress</td>
			<td>Dreamline – Sleep & Dream</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P1%' && tanggal='$date' && brand like '%dreamline%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
						<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P1</td>
			<td>Matress</td>
			<td>Romance</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P1%' && tanggal='$date' && brand like '%romance%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P2</td>
			<td>Matress</td>
			<td>Kingkoil</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P2%' && tanggal='$date' && brand like '%kingkoil%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
				<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P2</td>
			<td>Matress</td>
			<td>Serta - Florence</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P2%' && tanggal='$date' && brand like '%serta%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
			<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P2</td>
			<td>Matress</td>
			<td>Simmons - Airland</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P2%' && tanggal='$date' && brand like '%simmons%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P2</td>
			<td>Matress</td>
			<td>Lady Americana – Elite</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P2%' && tanggal='$date' && brand like '%lady americana%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?>
			</td>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P2</td>
			<td>Matress</td>
			<td>Dreamline – Sleep & Dream</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P2%' && tanggal='$date' && brand like '%dreamline%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
						<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P2</td>
			<td>Matress</td>
			<td>Romance</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P2%' && tanggal='$date' && brand like '%romance%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P3</td>
			<td>Matress</td>
			<td>Kingkoil</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P3%' && tanggal='$date' && brand like '%kingkoil%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
				<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P3</td>
			<td>Matress</td>
			<td>Serta - Florence</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P3%' && tanggal='$date' && brand like '%serta%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
			<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P3</td>
			<td>Matress</td>
			<td>Simmons - Airland</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P3%' && tanggal='$date' && brand like '%simmons%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P3</td>
			<td>Matress</td>
			<td>Lady Americana – Elite</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P3%' && tanggal='$date' && brand like '%lady americana%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?>
			</td>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P3</td>
			<td>Matress</td>
			<td>Dreamline – Sleep & Dream</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P3%' && tanggal='$date' && brand like '%dreamline%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
						<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P3</td>
			<td>Matress</td>
			<td>Romance</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P3%' && tanggal='$date' && brand like '%romance%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
			<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P4</td>
			<td colspan="2">All (Matrass, Sofa , Quality)</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P4%' && tanggal='$date' && brand like '%All (Matrass,%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
		<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P5</td>
			<td colspan="2">All (Matrass, Sofa , Quality)</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P5%' && tanggal='$date' && brand like '%All (Matrass,%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
				<tr>
			<td><?php  echo date('d-m-Y')?></td>
			<td>P6</td>
			<td colspan="2">All (Matrass, Sofa , Quality)</td>
			<td><?php
			$spv="select *from dbpenyerahan where paket like'%P6%' && tanggal='$date' && brand like '%All (Matrass,%'";
			$qpv=mysqli_query($conn,$spv);
			$apv=mysqli_num_rows($qpv);
			echo $apv;
			
			?></td>
		</tr>
	</table>
	<center><h3>Laporan  Pemakaian Voucher - Harian</h3></center>
	<table class='table table-bordered'>
		<tr>
			<th>No</th>
			<th>Voucher</th>
			<th>Nomor Nota</th>
		</tr>
				<?php
				$date=date('dmY');
				$spv="select *from dbpemakaianvoucher where tanggal='$date' ";
				$qpv=mysqli_query($conn,$spv);
				$lpv=mysqli_fetch_array($qpv);
				$apv=mysqli_num_rows($qpv);
				$no=1;
				for ($i=0;$i<=$apv;$i++){
					echo"<tr><td>".$no++."</td>
					<td>".$lpv['seri']."</td>
					<td>".$lpv['nota']."</td>
					
					</tr>";
					
				}
				?>
	</table>
</body>
</html>

