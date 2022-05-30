<html> <head> <?php include "menu.php";
		include "../koneksiremote.php";
		$cabang = $_SESSION['lokasi']; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/tablejquery.css">
	<script src="../asset/tablejquery.js"></script> <body>
	<div class='container'> <a href="#add1" style='float:left' data-toggle="modal" class="btn btn-primary brand">INPUT KUPON FLASHSALE</a>
		<center><a id='show' class='btn btn-danger btn-lg'>LIST UPDATE KUPON FLASH SALE</a></center>
	</div>
	<div id="add1" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<form action="kupon_proses" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">
							<center><b>FORM KUPON CK</b></center>
						</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class='col-sm-4'>
								<label>Nama Singkat :</label>
								<input type='text' class='form-control' name='nama' required>
							</div>
							<div class='col-sm-4'>
								<label>No Nota :</label>
								<input type='text' class='form-control' name='nota' required>
							</div>
							<div class='col-sm-4'>
								<label>Kode Kupon :</label>
								<input type='text' class='form-control' name='kupon' required>
							</div>
						</div>
						<div class="modal-footer">
							<input type='hidden' name='cabang' value="<?php echo $cabang ?>">
							<button class="btn btn-primary" type="submit">Confirm
							</button> <button type="reset" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancel</button>
						</div>
			</form>
		</div>
	</div>
	</div>
	</div>
	<br>
	<div class='sesi1'>
		<?php
		$select = mysqli_query($conn, "select *from produk");
		while ($hasil = mysqli_fetch_array($select)) {
			if ($hasil['stock'] == 0) {
				$stock = 'Stock Habis';
			} else {
				$stock = '';
			}
			echo "
					<div class='col-sm-3' style='border-style: solid;'>
					<h4>" . $hasil['nama'] . "</h4><br>
					<h4 style='color:red'>" . $hasil['kupon_aktif'] . "(" . $stock . ")</h4>
					</div>
					";
		}
		?>
	</div>
	<div style="clear:both"><br></div>
		<div class='sesi1'>
		<?php
		$select = mysqli_query($conn, "select *from newflash");
		while ($hasil = mysqli_fetch_array($select)) {
			if ($hasil['stock'] == 0) {
				$stock = 'Stock Habis';
			} else {
				$stock = '';
			}
			echo "
					<div class='col-sm-3' style='border-style: solid;'>
					<h4>" . $hasil['nama'] . "</h4><br>
					<h4 style='color:red'>" . $hasil['kupon_aktif'] . "(" . $stock . ")</h4>
					</div>
					";
		}
		?>
	</div>
	<div style="clear:both"><br></div>
	<div class="panel panel-default">
		<div class="panel-body">
			<table id="lookup" class="table table-bordered">
				<thead bgcolor="#eeeeee" align="center">
					<tr>
						<th>Tanggal</th>
						<th>Jenis Kupon</th>
						<th>Nama</th>
						<th>No. Nota</th>
						<th>Kode Kupon</th>
						<th>Cabang</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div> </body> <script src="../asset/jquery.dataTables.js"></script> <script src="../asset/dataTables.bootstrap.js"></script> <script>
	$(document).ready(function() {
		var dataTable = $('#lookup').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				url: "qkupon.php", // json datasource
				type: "post", // method , by default get
				error: function() { // error handling
					$(".lookup-error").html("");
					$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#lookup_processing").css("display", "none");
				}
			}
		});
	});
</script> </body> </html>
