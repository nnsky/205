<html>
<head>
<?php
include "menu.php";
include "../koneksikupon.php";

?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<title>Data Kupon</title>
<div class='container'>
<a href="#input" style='float:left' data-toggle="modal" class="btn btn-primary brand">INPUT KUPON</a>
</div>
	<div id="input" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="" method="POST">   
   <div class="modal-content">

    	<div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>INPUT KUPON</b></center></h4>
        </div>
				<div class="modal-body">

		 <div class="row">

            <div class='col-sm-4'>
            <label>Merek  :</label>
           <select name='' class='form-control' required>
             <option value=''>-- Pilih Merek --</option>
             <option value='KingKoil'>KingKoil</option>
             <option value='Serta'>Serta</option>
             <option value='Florence'>Florence</option>
           </select>
            </div>
            <div class='col-sm-4'>
            <label>type :</label>
            <input type='text' class='form-control' name='type' required>
            </div>
            <div class='col-sm-4'>
            <label>Nama Produk :</label>
            <input type='text' class='form-control' name='nama' required>
            </div>
		</div>

                        
		 <div class="row">

            <div class='col-sm-4'>
            <label>Masa Aktif</label>
            <select name='exp' class='form-control' required>
              <option  value=''>-- Masa Berlaku -- </option>
              <option value='28 Maret 2021'>28 Maret 2021</option>
            </select>
            </div>
            <div class='col-sm-4'>
            <label>Stock</label>
            <input type='number' class='form-control' name='type' required>
            </div>
            <div class='col-sm-4'>
            <label>Harga Diskon :</label>
            <select name='value' class='form-control' required>
              <option  value=''>-- Potongan Harga -- </option>
              <option value='1jt'>1 jt</option>
              <option value='750'>750.000</option>
              <option value='500'>500.000</option>
            </select>
            </div>
		</div>

        <div class="row">

            <div class='col-sm-4'>
            <label>4 Digit Kode Kupon  :</label>
            <input type='text' class='form-control' name='merek' required>
            </div>
		</div>
	
				<div class="modal-footer">
                  <input type='hidden' name='cabang' value="<?php echo $_SESSION['cabang']?>">
	                <button class="btn btn-primary" type="submit">Confirm
	                </button> <button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">Cancel</button>
	            </div></form>
            </div>      
        </div>
</div> 
</div>
<div style='clear:both'><br></div>

<div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
                                        <th>Nama</th>
                                        <th>stock</th>
                                        <th>pakai</th>
                                        <th>Kode Kupon</th>
                                        <th>Masa Aktif</th>
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
						url :"qdkupon.php", // json datasource
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

