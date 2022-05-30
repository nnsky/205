<html>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="admin" && $_SESSION['status']=='aktif' && $array['pnj_v']=='block'){

}else{
		header("location:../logout.php");	
	}
?>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quotation</title>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
	<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
   <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> 
<script>
     $(function () {
        $('#datetimepicker1').datepicker({
			dateFormat: 'mm/dd/yy'
            });
        });
	  $(function () {
         $('#datetimepicker2').datepicker({
			dateFormat: 'mm/dd/yy'
            });
        });	
  function validangka(a)
{
	if(!/^[0-9 /]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}
$(document).ready(function() {
    $('#example').DataTable( {
    
    } );
} );

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

$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});
</script>
</head>
<body>
<div class='col-sm-1'><button style="display:<?php echo $array['pnj_i'] ?>" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Buat</button></div>
<div class='col-sm-1'></div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">QUOTATION</h4>
        </div>
        <div class="modal-body controls">
         <form action="buat" method="POST">
          <div class="form-group">
			<div class="col-sm-6">
		   <label for="recipient-name" class="col-form-label">Tanggal</label>
            <input id="datetimepicker1" type="text" class="form-control" name="tanggal" required>
			</div>
			<div class="col-sm-6">
            <label for="recipient-name" class="col-form-label">Quote#</label>
            <input type="text" class="form-control" name="quote" required>
			</div>
          </div>
		  <div class="form-group">
			<div class="col-sm-6">
			 <label for="recipient-name" class="col-form-label">Masa Berlaku </label>
            <input id="datetimepicker2" type="text" class="form-control" name="berlaku" required>
			</div>
			<div class="col-sm-6">
            <label for="recipient-name" class="col-form-label">ID Konsumen </label>
            <input type="text" class="form-control" name="customer" required>
          </div>
		  </div>
		  <div style="clear:both"></div>
			<center><h4>Data Konsumen</h4></center>
		  	 <div class="form-group">
				<label for="recipient-name" class="col-form-label">Nama Konsumen </label><br>
				<div class="col-sm-3">
				<select class="form-control" name="gelar">
				<option name="Bpk">Bpk</option>
				<option name="Ibu">Ibu</option>
				<option name="Sdr">Sdr</option>
				<option name="Sdri">Sdri</option>
				</select>
				</div>
				<div class="col-sm-9">
				<input type="text" class="form-control" name="nama" required>
				</div>
          </div>
		  	<div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Perusahaan </label>
            <input type="text" class="form-control" name="perusahaan">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kode Pos & No Telp </label><br>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="pos" placeholder="Kode Pos">
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control"  name="telp" onkeyup="validangka(this)" placeholder="No Telp">
				</div>
			</div>
			 <div style="clear:both"></div>
			<center><h4>Data Pembelian</h4></center>
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Apakah Ada PPN</label>
				<select name="ppn" class="form-control" >
					<option value="tidak">Tidak</option>
					<option value="ya">Ya</option>
				</select>
			</div>
			<div class="form-group">
			<label for="recipient-name" class="col-form-label">Deskripsi Barang</label>
                <div class="entry input-group col-sm-12">
					<div class="col-sm-6">
					<input type="text" class="form-control" name="desk[]" placeholder="Deksripsi Barang" required>
					</div>
					<div class="col-sm-1">
					<input type="text" class="form-control" onkeyup="validangka(this)" name="jumlah[]" placeholder="QTY" required>
					</div>
					<div class="col-sm-2">
					<input type="text" class="form-control" onkeyup="formatangka(this)" name="harga[]" placeholder="Harga (RP)" required>
					</div>
					<div class="col-sm-2">
					<input type="text" class="form-control" name="diskon[]" placeholder="Diskon (%)" required>
					</div>
					<div class="col-sm-1">
					<span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button></span>
					</div>
                </div>
			</div>
		</div>
        <div class="modal-footer">
			<input type="hidden" value="quot" name="perihal">
          <button class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		 </form>
      </div>
      
    </div>
  </div>

 <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
								<th>Tanggal</th>
								<th>Quote</th>
								<th>Costumer ID</th>
								<th>Nama</th>
								<th>Berlaku</th>
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
						url :"quoti.php", // json datasource
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


