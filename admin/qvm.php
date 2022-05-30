<?php
/* Database connection start */
include "../koneksi.php";
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'tanggal',
    1 => 'nota',
	2 => 'lokasi',
	3 => 'seri',
);

// getting total number records without any search
$sql = "SELECT seri";
$sql.=" FROM notifvoucher";
$query=mysqli_query($conn, $sql) or die("qvm.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT tanggal,nota,lokasi,seri";
	$sql.=" FROM notifvoucher";
	$sql.=" WHERE tanggal LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nota LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR lokasi LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR seri LIKE '%".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("qvm.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qvm.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT tanggal,nota,lokasi,seri";
	$sql.=" FROM notifvoucher";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qvck.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["tanggal"];
    $nestedData[] = $row["nota"];
    $nestedData[] = $row["lokasi"];
    $nestedData[] = $row["seri"];
    $nestedData[] = '<a href="#add'.$row['seri'].'" data-toggle="modal" class="btn btn-primary brand">Edit</a>
	<div id="add'.$row['seri'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg"> 
   <div class="modal-content">

    	<div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>Voucher Kembali</b></center></h4>
        </div>
				<div class="modal-body">
					<div class="form-group">
					<div class="col-sm-6">
					<label for="recipient-name" class="col-form-label">Tanggal</label>
					<input type="text" class="form-control" value="'.$row["tanggal"].'" required>
					</div>
					<div class="col-sm-6">
					<label for="recipient-name" class="col-form-label">Nota</label><br>
					<input type="text" class="form-control" value="'.$row["nota"].'" required>
					</div>
					</div>
					
					<div class="form-group">
					<div class="col-sm-6">
					<label for="recipient-name" class="col-form-label">Lokasi</label>
					<input type="text" class="form-control" value="'.$row["lokasi"].'" required>
					</div>
					<div class="col-sm-6">
					<label for="recipient-name" class="col-form-label">Seri</label><br>
					<input type="text" class="form-control" value="'.$row["seri"].'" required>
					</div>
					</div>
					<br>
				</div>
					        <div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
        </div>
</div>
	
	
	';
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>

