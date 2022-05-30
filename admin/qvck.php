<?php
/* Database connection start */
include "../koneksi.php";
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'voucher',
        1 => 'seri', 
	2 => 'nama',
	3 => 'nota',
	4 => 'total',
        5 => 'lokasi'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM voucherck";
$query=mysqli_query($conn, $sql) or die("qvck.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM voucherck";
	$sql.=" WHERE voucher LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR seri LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR nama LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR nota LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR lokasi LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR date LIKE '%".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("qvck.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qvck.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM voucherck";
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
    $nestedData[] = $row["lokasi"];
    $nestedData[] = '
	<td><div class="col-sm-2"><a href="#add'.$row['id'].'" data-toggle="modal" class="btn btn-primary brand">Edit</a></div>
</td>
<div id="add'.$row['id'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="cekedit" method="POST">   
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
			<input type="text" name="voucher" value="'.$row["voucher"].'" required>
			</div>
			<div class="col-sm-3">
			Kode Seri
			</div>
			<div class="col-sm-3">
			<input type="input" name="seri" value="'.$row["seri"].'">
			</div><br><br><br>
			<div class="col-sm-3">
			Nama Konsumen
			</div>
			<div class="col-sm-3">
			<input type="text" name="nama" value="'.$row["nama"].'" required>
			</div>
			<div class="col-sm-3">
			Nomor Nota
			</div>
			<div class="col-sm-3">
			<input type="input" name="nota" value="'.$row["nota"].'">
			</div><br><br><br>
			<div class="col-sm-3">
			Total Belanja
			</div>
			<div class="col-sm-3">
			<input type="text" onkeyup="formatangka(this)" name="total" value="'.$row["total"].'" required>
			</div>
			<div class="col-sm-3">
			Potongan
			</div>
			<div class="col-sm-3">
			<input type="input" onkeyup="formatangka(this)" name="potongan" value="'.$row["potongan"].'">
			</div><br><br><br>
			<div class="col-sm-12">
			User : '.$row["user"].' &nbsp;&nbsp;&nbsp; Lokasi : '.$row["lokasi"].'
			</div>
			<input type="hidden" name="asal" value="voucherck">
			<input type="hidden" name="id" value="'.$row["id"].'">
			<input type="hidden" name="tgpan" value="voucherck">
			<input type="hidden" name="serilama" value="'.$row["seri"].'">
			</div>
	
				<div class="modal-footer">
				<a href="delete?&perihal=voucherck&_id='.$row["id"].'&seri='.$row["seri"].'" class="btn btn-danger">Hapus</a>
	                <button class="btn btn-primary" type="submit">Confirm
	                </button> <button type="reset" class="btn btn-success"  data-dismiss="modal" aria-hidden="true">Cancel</button>
	            </div></form>
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

