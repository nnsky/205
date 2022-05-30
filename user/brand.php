<html>
<head>
	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Halaman Brand</title>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<script src='../asset/jquery.min.js'></script>
<script src='../asset/bootstrap.min.js'></script>
<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="user" && $_SESSION['status']=='aktif' && $array['br_v']=='block'){
	
	}else{
		header("location:../logout.php");	
	}
	?>
<style>
* {
  .border-radius(0) !important;
}

#field {
    margin-bottom:20px;
}
.brand{
	display:<?php echo $array['br_e'] ?>;
	width:50px;
}
</style>
<script>
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
<div class="container" style='margin-top:-30px;'>		
	<br/>
	<button style="display:<?php echo $array['br_i']?>" class="btn btn-primary " data-toggle="modal" data-target="#ModalAdd">Buat</button>	
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Daftar Brand</h4>
        </div>
        <div class="modal-body">
          <div class="control-group" id="fields">
            <div class="controls"> 
                <form action='buat.php' method='POST'>
				<input type='hidden' name='perihal' value='brand'>
                    <div class="entry input-group col-sm-12">
                      <div class='col-sm-3'><input class="form-control" name="brand[]" type="text" placeholder="Brand"></div>
					  <div class='col-sm-3'><input class="form-control" name="type[]" type="text" placeholder="Type" /></div>
                    	<div class='col-sm-6'><span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span></div>
						<br><br>
                    </div>
            </div>
            <button class='btn btn-primary'>Simpan</button>
			
                </form>
        </div>
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
	  
                                        <th>Brand</th>
	                                    <th>Nama</th>
	                                    <th class="text-center"> Action </th> 
	  
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
						url :"qbrand.php", // json datasource
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

