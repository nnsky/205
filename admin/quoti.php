<?php
/* Database connection start */
include "../koneksi.php";
session_start();
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'tanggal',
	1 => 'quote',
	2 => 'customer',
	3 => 'nama',
	4 => 'berlaku'
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM quote";
$query=mysqli_query($conn, $sql) or die("quoti.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM qoute";
	$sql.=" WHERE (tanggal LIKE '%".$requestData['search']['value']."%')";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR (quote LIKE '%".$requestData['search']['value']."%')";
	$sql.=" OR (nama LIKE '%".$requestData['search']['value']."%')";
	$sql.=" OR (customer LIKE '%".$requestData['search']['value']."%')";
	$sql.=" OR (berlaku LIKE '%".$requestData['search']['value']."%')";
	$query=mysqli_query($conn, $sql) or die("quoti.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("quoti.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM quote";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("quoti.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$a=explode(",",$row["desk"]);
	$b=explode(",",$row["jumlah"]);
	$c=explode(",",$row["harga"]);
	$d=explode(",",$row["diskon"]);
	$b=count($a);
	
	
	$nestedData[] = $row["tanggal"];
    $nestedData[] = $row["quote"];
    $nestedData[] = $row["customer"];
    $nestedData[] = $row["nama"];
    $nestedData[] = $row["berlaku"];
    $nestedData[] = '<div class="col-sm-6"><a href="editquot?id='.$row["id"].'" class="btn btn-primary">Edit</a></div><div class="col-sm-6"><a target="_blank" href="printpdf?id='.$row["id"].'" class="btn btn-success">Print</a></div>';		
	
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

