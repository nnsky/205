<?php
/* Database connection start */
include "../koneksi.php";
session_start();
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'nama',
    1 => 'ck', 
	2 => 'tokped',
	3 => 'bl',
	4 => 'lazada'
);

// getting total number records without any search
$sql = "select *";
$sql.=" FROM harga";
$query=mysqli_query($conn, $sql) or die("qonline.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "select *";
	$sql.=" FROM harga";
	$sql.=" WHERE nama LIKE '%".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR presmi LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR ck LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR jualck LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR status LIKE '%".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("qonline.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("qonline.php: get PO"); // again run query with limit
	
} else {	

	$sql = "select *";
	$sql.=" FROM harga";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("qonline.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$nestedData[] = $row["nama"];
    $nestedData[] = "Rp ".$row["ck"]." (".$row["dateck"].")";
	$nestedData[] = "<a href='".$row['linktokped']."' target='_blank'>Rp ".$row["tokped"]." (".$row["datetokped"].")</a>";
	$nestedData[] = "<a href='".$row['linkbl']."' target='_blank'>Rp ".$row["bl"]." (".$row["datebl"].")</a>";
	$nestedData[] = "<a href='".$row['linklazada']."' target='_blank'>".$row["lazada"]." (".$row["datelazada"].")</a>";
    $nestedData[] = '
<td><div class="col-sm-2"><a href="#add'.$row['id'].'" data-toggle="modal" style="width:100px" class="btn btn-primary edit">'.$row["status"].'</a></div>
</td>
<div id="add'.$row['id'].'" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
<form action="cekedit" method="POST">   
   <div class="modal-content">

    	<div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><center><b>'.$row["nama"].'</b></center></h4>
        </div>
		<div class="row" style="margin-left:50px;">
			<div class="col-sm-2">
				<b>Asal</b>
				</div>
				<div class="col-sm-3">
				<b>Harga</b>
				</div>
				<div class="col-sm-3">
				<b>Link</b>
				</div>
				<div class="col-sm-2">
				<b>Toko</b>
				</div>
				<div class="col-sm-2">
				<b>User</b>
				</div>
				<br><br>
				<div class="col-sm-2">
				Harga Pabrik
				</div>
				<div class="col-sm-3">
				<input type="text" name="presmi"  onkeyup="formatangka(this)" value="'.$row["presmi"].'" required>
				</div>
				<div class="col-sm-3">
				
				</div>
				<div class="col-sm-2">
				
				</div>
				<div class="col-sm-2">
				<label>'.$row["userpresmi"].'</label>
				</div>
				<br><br>
				<div class="col-sm-2">
				CK
				</div>
				<div class="col-sm-3">
				<input type="text" name="ck"  onkeyup="formatangka(this)" value="'.$row["ck"].'" required>
				</div>
				<div class="col-sm-3">
				
				</div>
				<div class="col-sm-2">
				
				</div>
				<div class="col-sm-2">
				<label>'.$row["userck"].'</label>
				</div>
				<br><br>
				<div class="col-sm-2">
				Tokopedia
				</div>
				<div class="col-sm-3">
				<input type="text" name="tokped" onkeyup="formatangka(this)" value="'.$row["tokped"].'" required>
				</div>
				<div class="col-sm-3">
				<input type="text" name="linktokped" value="'.$row["linktokped"].'" required>
				</div>
				<div class="col-sm-2">
				<input type="text"name="tokotokped" value="'.$row["tokotokped"].'" style="width:140px" required>
				</div>
				<div class="col-sm-2">
				<label >'.$row["usertok"].'</label>
				</div>
				<br><br>
				<div class="col-sm-2">
				Bukalapak
				</div>
				<div class="col-sm-3">
				<input type="text" name="bl" onkeyup="formatangka(this)" value="'.$row["bl"].'" required>
				</div>
				<div class="col-sm-3">
				<input type="text" name="linkbl" value="'.$row["linkbl"].'" required>
				</div>
				<div class="col-sm-2">
				<input  type="text" name="tokobl" value="'.$row["tokobl"].'"  style="width:140px" required>
				</div>
				<div class="col-sm-2">
				<label>'.$row["userbl"].'</label>
				</div>
				<br><br>
				<div class="col-sm-2">
				Lazada
				</div>
				<div class="col-sm-3">
				<input type="text" name="lazada" onkeyup="formatangka(this)" value="'.$row["lazada"].'" required>
				</div>
				<div class="col-sm-3">
				<input type="text" name="linklazada" value="'.$row["linklazada"].'" required>
				</div>
				<div class="col-sm-2">
				<input  type="text"name="tokolazada" value="'.$row["tokolazada"].'" style="width:140px" required>
				</div>
				<div class="col-sm-2">
				<label>'.$row["userlazada"].'</label>
				</div>
				<input type="hidden" name="tgpan" value="online">
				<input type="hidden" name="id" value="'.$row["id"].'">
				<input type="hidden" name="user" value="'.$_SESSION["username"].'">
        </div>
		                <div class="modal-footer">
				<a href="delete?&perihal=online&_id='.$row["id"].'" class="btn btn-danger">Hapus</a>
				<input type="submit" name="insert" id="insert" value="Simpan" class="btn btn-success" />
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

