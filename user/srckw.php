<?php
include '../koneksi.php';
$id=$_GET['_id'];
$sql="select * from kwitansi where kwitansid ='$id'";
$query=mysqli_query($conn,$sql);
$hasil=mysqli_fetch_array($query);
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <center><h4 class="modal-title" id="myModalLabel">KWITANSI</h4></center>
        </div>

        <div class="modal-body">
    
                <div class="form-group" style="padding-bottom: 20px;">
				<b><div class='col-sm-4'>No Kwitansi : <?php echo $hasil['kwitansid'] ?></b></div>
                <b><div class='col-sm-4'>Tanggal : <?php echo $hasil['tanggal'] ?></b></div>
                <b><div class='col-sm-4'>Nama : <?php echo $hasil['nama'] ?></b></div><br><br>
                <b><div class='col-sm-4'>User : <?php echo $hasil['sales'] ?></b></div>
                <b><div class='col-sm-4'>Lokasi : <?php echo $hasil['lokasi'] ?></b></div>
                <b><div class='col-sm-4'>Jumlah : <?php echo $hasil['jumlah'] ?></b></div>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
               <b><div class='col-sm-8'>Terbilang : <?php echo $hasil['terbilang']?></b></div>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
				<b><div class='col-sm-12'>Untuk Pembelian : <?php echo $hasil['informasi']?></b></div>
                </div>

	            <div class="form-group" style="padding-bottom: 20px;">
					
					<div class='col-sm-4'><form action="srckw1.php" method="POST">
					<input type="hidden" name="_id" value='<?php echo $hasil["kwitansid"]?>'>
						<input type="submit" class="btn btn-success" value="Print">	
						</form></div>
	                <div class='col-sm-4'><button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Cancel</button></div>
	            </div>
            </div>

           
        </div>
    </div>
	