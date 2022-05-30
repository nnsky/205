<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
	<link rel="stylesheet" href="../css/tablejquery.css">
	<script src="../asset/tablejquery.js"></script>
	
</head>
<body> 
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="user" && $_SESSION['status']=='aktif'){

	}elseif($_SESSION['level']=='user'){
		header("location:../logout.php");
	}else{
		header("location:../logout.php");	
	}
$selects="select *from akun where username = '".$_SESSION['username']."'";
$querys=mysqli_query($conn,$selects);
$arrays=mysqli_fetch_array($querys);
?>
<div class='row'>
<h4>
<div class='col-sm-3'>
Username : <?php echo $arrays['username']?><br><br>
</div>
<div class='col-sm-3'>
Level :		<?php echo $arrays['level']?><br><br>
</div>
<div class='col-sm-3'>
Status :	<?php echo $arrays['status']?><br><br>
</div>
<div class='col-sm-3'>
Login Terakhir :	<?php echo $array['lokasi']?><br>
</div>
</div>
</h4>
<center><h4>Aktifitas 1 Minggu Anda</h4></center>
<div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
								<th>ReportId</th>
								<th>Tanggal</th>
								<th>Nama</th>
								<th>Perihal</th>
								<th>Status</th>  
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                     </div>
 <script src="../asset/jquery.dataTables.js"></script>
        <script src="../asset/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"qindex.php", // json datasource
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


