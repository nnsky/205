<?php
/* Database connection start */
include "../koneksi.php";
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
session_start();

$columns = array( 
// datatable column index  => database column name
	0 => 'voucher',
    1 => 'seri', 
	2 => 'nama',
	3 => 'nota',
	4 => 'total',
	5 => 'dateup'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM voucherck where date >='".$_SESSION['datemin']."' && date <= '".$_SESSION['datemax']."' ";
$query=mysqli_query($conn, $sql) or die("qvck.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM voucherck";
	$sql.=" WHERE (voucher LIKE '%".$requestData['search']['value']."%' && date >='".$_SESSION['datemin']."' && date <= '".$_SESSION['datemax']."' )";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR (seri LIKE '%".$requestData['search']['value']."%' && date >='".$_SESSION['datemin']."' && date <= '".$_SESSION['datemax']."' )";
	$sql.=" OR (nama LIKE '%".$requestData['search']['value']."%' && date >='".$_SESSION['datemin']."' && date <= '".$_SESSION['datemax']."' )";
	$sql.=" OR (nota LIKE '%".$requestData['search']['value']."%' && date >='".$_SESSION['datemin']."' && date <= '".$_SESSION['datemax']."' )";
	$sql.=" OR (dateup LIKE '%".$requestData['search']['value']."%' && date >='".$_SESSION['datemin']."' && date <= '".$_SESSION['datemax']."' )";
	$sql.=" OR (status LIKE '%".$requestData['search']['value']."%' && date >='".$_SESSION['datemin']."' && date <= '".$_SESSION['datemax']."' )";
	$sql.=" OR (date LIKE '%".$requestData['search']['value']."%' && date >='".$_SESSION['datemin']."' && date <= '".$_SESSION['datemax']."' )";
	$query=mysqli_query($conn, $sql) or die("qvck.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qvck.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM voucherck voucherck where date >='".$_SESSION['datemin']."' && date <= '".$_SESSION['datemax']."' ";
	$sql.=" ORDER BY id DESC  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qvck.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["voucher"];
    $nestedData[] = $row["seri"];
    $nestedData[] = $row["nama"];
    $nestedData[] = $row["nota"];
    $nestedData[] = $row["total"];
    $nestedData[] = $row["dateup"];
    $nestedData[] = '
	<td><div class="col-sm-2"><a href="#add'.$row['id'].'" data-toggle="modal" class="btn btn-primary brand">Lihat</a></div>
</td>
<div id="add'.$row['id'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
   <div class="modal-content">

    	<div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>'.$row["voucher"]." ".$row["seri"].'</b></center></h4>
        </div>
				<div class="modal-body">
		 <div class="row">
			<div class="col-sm-3">
			Tipe Voucher
			</div>
			<div class="col-sm-3">
			<label>'.$row["voucher"].'</label>
			</div>
			<div class="col-sm-3">
			Kode Seri
			</div>
			<div class="col-sm-3">
			<label>'.$row["seri"].'</label>
			</div><br><br><br>
			<div class="col-sm-3">
			Nama Konsumen
			</div>
			<div class="col-sm-3">
			<label>'.$row["nama"].'</label>
			</div>
			<div class="col-sm-3">
			Nomor Nota
			</div>
			<div class="col-sm-3">
			<label>'.$row["nota"].'</label>
			</div><br><br><br>
			<div class="col-sm-3">
			Total Belanja
			</div>
			<div class="col-sm-3">
			<label>'.$row["total"].'</label>
			</div>
			<div class="col-sm-3">
			Potongan
			</div>
			<div class="col-sm-3">
			<label>'.$row["potongan"].'</label>
			</div><br><br><br>
			<div class="col-sm-12">
			<div class="col-sm-3">
			User : '.$row["user"].'
			</div>
			<div class="col-sm-3">
			Lokasi : '.$row["lokasi"].'
			</div>
			<div class="col-sm-3">
			Tanggal : '.$row["date"].'
			</div>
			</div>
			</div>
	
				<div class="modal-footer">
	                </button> <button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">Cancel</button>
	            </div>
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

