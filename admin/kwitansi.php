<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="refresh" content="90">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Kwitansi</title>
	<link rel="stylesheet" type="text/css" href="../css/kwitansi.css">
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
	<link rel="stylesheet" href="../css/tablejquery.css">
	<script src="../asset/tablejquery.js"></script>
	<script language="JavaScript">
function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}
function validhuruf(a)
{
	if(!/^[a-zA-Z ]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}

</script>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header('location:../logout');
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['kw_v']=='block'){

	}elseif($_SESSION['level']=='user' or $_SESSION['level']=='akun' ){
		header("location:../logout.php");
	}else{
		header("location:../logout.php");
	}
?>
<style>
.edit{
	display:<?php echo $array['kw_e'] ?>;
	width:70px;
}
.buat{
	display:<?php echo $array['kw_i'] ?>;
}	
</style>
</head>
<body>
<div class="container">		
	<div class='col-sm-5'><button class="btn btn-primary buat" data-toggle="modal" data-target="#ModalAdd">Buat</button></div>
	<div class='col-sm-7'></div> 
	
	</div>
</div>
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">FORM Kwitansi</h4>
        </div>
        <div class="modal-body">
		<form role="form" method="POST" action="buat" >
		<table class= "table table-striped">
		<tr>
<td>Lokasi</td>
  
<td>
<select name="lokasi"  class="form-control" required/>
<option value="CM">Pramuka 180</option>
<option value="CPG">Pramier Gallery </option>
<option value="KG">Kelapa Gading </option>
<option value="CH">Pramuka 168</option>
<option value="CPIK">Pantai Indah Kapuk </option>
<option value="CBEK">Bekasi </option>
<option value="CBDG">Bandung </option>
</select>
</td>
</tr>
<tr>
<td>Sudah Diterima</td>
<td><input type="text" class="form-control" name="nama" onkeyup="validhuruf(this)" placeholder="Nama" required/></td>
</tr>
<tr>
<td>Jumlah (Rp)</td> 
<td><input type="text" class="form-control" name="jumlah" onkeyup="formatangka(this)" placeholder="Nominal" required/></td>
</tr>
<tr>
<td>Banyak Uang</td>
<td><textarea name="uang" class="form-control" rows="3" onkeyup="validhuruf(this)" placeholder="Terbilang" required/></textarea></td>
</tr>
<tr>
<td>Untuk Pembayaran</td>
<td><textarea name="informasi" class="form-control" rows="3" placeholder="Untuk Pembayaran"></textarea></td>
</tr>
<tr>
<td><input type="submit" class="btn btn-primary" value="Simpan"></td>
<td><input type="reset" value="Reset">
<input type="hidden" name="perihal" value="Kwitansi">
<input type='hidden' name='sales' value='<?php echo $_SESSION["username"]?>'>
</td>
</tr>
		</table>
    </form>
	</div>
			</div>           
        </div>
    </div>
                                  <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
											 <th>Lokasi</th>
										<th>No Kwitansi</th>
										<th>Pembeli</th>
										<th>Jumlah</th>
										<th>Keterangan</th>
										<th>Tanggal</th>
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
						url :"qkwitansi.php", // json datasource
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
</body>
</html>

