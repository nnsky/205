<html>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Info Stock</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<?php
include 'menu.php';

?>
</head>
<body>
<center><h3>Stock Kupon Angpao</h3></center>
<table class="table table-bordered">
	<tr>
		<th>Stock</th>
		<th>CM</th>
		<th>CH</th>
		<th>PG</th>
		<th>PIK</th>
		<th>K. Gading</th>
		<th>Bekasi</th>
		<th>Bandung</th>
	</tr>
	<tr>
		<td>A</td>
		<td>
		
		<?php
			$cs="select *from stangpao where jenis='A' && lokasi='CM' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='A' && lokasi='CH' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='A' && lokasi='CPG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='A' && lokasi='CPIK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='A' && lokasi='KG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='A' && lokasi='CBEK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
				<td>
		<?php
			$cs="select *from stangpao where jenis='A' && lokasi='CBDG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
	</tr>
			<td>B</td>
		<td>
		
		<?php
			$cs="select *from stangpao where jenis='B' && lokasi='CM' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='B' && lokasi='CH' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='B' && lokasi='CPG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='B' && lokasi='CPIK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='B' && lokasi='KG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='B' && lokasi='CBEK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
				<td>
		<?php
			$cs="select *from stangpao where jenis='B' && lokasi='CBDG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
	</tr>
			<td>C</td>
		<td>
		
		<?php
			$cs="select *from stangpao where jenis='C' && lokasi='CM' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='C' && lokasi='CH' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='C' && lokasi='CPG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='C' && lokasi='CPIK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='C' && lokasi='KG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='C' && lokasi='CBEK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
				<td>
		<?php
			$cs="select *from stangpao where jenis='C' && lokasi='CBDG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
	</tr>
			<td>D</td>
		<td>
		
		<?php
			$cs="select *from stangpao where jenis='D' && lokasi='CM' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='D' && lokasi='CH' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='D' && lokasi='CPG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='D' && lokasi='CPIK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='D' && lokasi='KG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='D' && lokasi='CBEK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
				<td>
		<?php
			$cs="select *from stangpao where jenis='D' && lokasi='CBDG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
	</tr>
			<td>E</td>
		<td>
		
		<?php
			$cs="select *from stangpao where jenis='E' && lokasi='CM' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='E' && lokasi='CH' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='E' && lokasi='CPG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='E' && lokasi='CPIK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='E' && lokasi='KG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='E' && lokasi='CBEK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
				<td>
		<?php
			$cs="select *from stangpao where jenis='E' && lokasi='CBDG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
	</tr>
	<tr>
			<td>F</td>
		<td>
		
		<?php
			$cs="select *from stangpao where jenis='F' && lokasi='CM' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='F' && lokasi='CH' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='F' && lokasi='CPG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='F' && lokasi='CPIK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='F' && lokasi='KG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='F' && lokasi='CBEK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
				<td>
		<?php
			$cs="select *from stangpao where jenis='F' && lokasi='CBDG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
	</tr>
		<tr>
			<td>G</td>
		<td>
		
		<?php
			$cs="select *from stangpao where jenis='G' && lokasi='CM' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='G' && lokasi='CH' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='G' && lokasi='CPG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='G' && lokasi='CPIK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='G' && lokasi='KG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
		<td>
		<?php
			$cs="select *from stangpao where jenis='G' && lokasi='CBEK' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
				<td>
		<?php
			$cs="select *from stangpao where jenis='G' && lokasi='CBDG' && status='aktif' ";
			$qs=mysqli_query($conn,$cs);
			$fs=mysqli_num_rows($qs);
			echo $fs;
		?>	
		</td>
	</tr>
</body>
</html>
