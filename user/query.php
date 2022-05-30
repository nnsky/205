 <?php 
 include '../koneksi.php';
 $asal=$_POST['lokasi'];
 if($asal=='harga' or $asal=='online'){
	$id=$_POST["hasil_id"];
      $query = "SELECT * FROM harga WHERE id = '".$_POST["hasil_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }else if($asal=='brand'){ 
	 $id=$_POST["hasil_id"];
      $query = "SELECT * FROM springbed WHERE id = '".$_POST["hasil_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }
 ?>
