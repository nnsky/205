<?php
/* Database connection start */
include "../koneksikupon.php";
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'nama',
    1 => 'stock', 
	2 => 'pakai',
	3 => 'kupon_aktif',
	4 => 'exp'
);

// getting total number records without any search
$sql = "SELECT id";
$sql.=" FROM kupon";
$query=mysqli_query($conn, $sql) or die("qbrand.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT merek,type,nama,exp,value,kupon_aktif";
	$sql.=" FROM kupon";
	$sql.=" WHERE nama LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR merek LIKE '%".$requestData['search']['value']."%' ";
    $sql.=" OR type LIKE '%".$requestData['search']['value']."%' ";
    $sql.=" OR exp LIKE '%".$requestData['search']['value']."%' ";
    $sql.=" OR value LIKE '%".$requestData['search']['value']."%' ";
    $sql.=" OR kupon_aktif LIKE '%".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("qkupon.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qdkupon.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM kupon";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qkupon.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["nama"];
    $nestedData[] = $row["stock"];
    $nestedData[] = $row["pakai"];  
    $nestedData[] = $row["kupon_aktif"];
    $nestedData[] = $row["exp"];
	$nestedData[] = '<a href="dkupon_edit?id='.$row["nama"].'" data-toggle="modal" class="btn btn-primary brand">Edit</a>';


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


