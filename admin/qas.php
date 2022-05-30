<?php
/* Database connection start */
include "../koneksi.php";
session_start();
/* Database connection end */
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'tglkonfrim',
    1 => 'ticketid', 
	2 => 'nama',
	3 => 'nota',
	4 => 'sales',
	5 => 'status'
	
);

// getting total number records without any search
$sql = "SELECT id";
$sql.=" FROM asales";
$query=mysqli_query($conn, $sql) or die("qas.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM asales";
	$sql.=" WHERE (tglkonfrim LIKE '%".$requestData['search']['value']."%')";  // $requestData['search']['value'] contains search parameter
	$sql.=" OR (ticketid LIKE '%".$requestData['search']['value']."%')";
	$sql.=" OR (nama LIKE '%".$requestData['search']['value']."%')";
	$sql.=" OR (nota LIKE '%".$requestData['search']['value']."%')";
	$sql.=" OR (sales LIKE '%".$requestData['search']['value']."%')";
	$sql.=" OR (status LIKE '%".$requestData['search']['value']."%')";
	$query=mysqli_query($conn, $sql) or die("qas.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qas.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM asales";
	$sql.=" ORDER BY status ASC,ID Desc LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qas.php: get PO");
	
}
	function limit_words($string, $word_limit){
	$words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));}
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["tglkonfrim"];
    $nestedData[] = $row["nota"];
    $nestedData[] = $row["nama"];
    $nestedData[] = $row["pengiriman"];
    $nestedData[] = limit_words($row["feedback"],3);
    $nestedData[] = $row["sales"];
    
	if($row["status"]=="pending"){
			$nestedData[]="<a class='btn btn-danger' href='tasrespon?&_id=".$row['ticketid']."&user=".$_SESSION['username']."'>Pending</a>";
	}else if ($row["status"]=="proses"){
			$nestedData[]="<a class='btn btn-success' href='tasrespon?&_id=".$row['ticketid']."&user=".$_SESSION['username']."'>On-Process</a>";
	}else{
			$nestedData[]="<a class='btn btn-primary' href='tasrespon?&_id=".$row['ticketid']."&user=".$_SESSION['username']."'>Selesai</a>";
	}
	
	$nestedData[] = $row["status"];
   
	
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

