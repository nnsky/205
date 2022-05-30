<?php
include 'menu.php';

if(isset($_GET['page'])){
	$halaman=$_GET['page'];
}else{
	$halaman=1;
}
$asal=$_GET['asal'];
$search=$_GET['search'];
$cari=$_GET['cari']; 
$page = (isset($_GET['page']))? $_GET['page'] : 1;
$limit = 10; 
$limit_start = ($page - 1) * $limit;
$query = "SELECT * FROM harga where ".$cari." like '%".$search."%' LIMIT ".$limit_start.",".$limit;
$result = mysqli_query($conn, $query); ; 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
            <title>Hasil Pencarian</title>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
      </head>  
	  <script>
	function formatangka(objek) {
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length;
   j = 0;
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + "." + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   objek.value = c;
}

	</script>
      <body>  
 <?php
if($_GET["asal"]=="harga"){
	echo  "<div class='container'>  
                     <br />  
                          <table class='table table-bordered' id='table_hasil'>  
                               <tr>  
								<th>Nama</th>
								<th>Presmi</th>
								<th>Harga Netto</th>
								<th>Harga Jual CK</th>
								<th>Action</th>    
                               </tr>";
							while($hasil = mysqli_fetch_array($result))  
											   {
												   if($hasil['presmi']==null){
											$presmi=0;
										}else{
											$presmi=$hasil['presmi'];
										};
										if($hasil['jualck']==null){
											$jualck=0;
										}else{
											$jualck=$hasil['jualck'];
										}
										echo '<tr>
											<td>'.$hasil["nama"].'</td>		
											<td>Rp '.$presmi.'('.$hasil["datepresmi"].')</td>		
											 <td>Rp '.$hasil["ck"].'('.$hasil["dateck"].')</td>
											 <td>'.$jualck.'('.$hasil["datejualck"].')</td>
											 <td><div class="col-sm-3"><input type="button" style="display:'.$array['pl_e'].'" name="edit" value="Edit" id="'.$hasil["id"].'" class="btn btn-primary edit_data" /></div>
											 ';?>
											<div class='col-sm-4'><a href='delete.php?&_id=<?php echo  $hasil['id']; ?>&perihal=harga&asal=harga&search=<?php echo $_GET['search']?>&cari=<?php echo $_GET['cari'] ?>&page=<?php echo $halaman?>' style='display:<?php echo $array["pl_e"]?>; width:70px' class='btn btn-danger'>Delete</a></div>
											 <?php
											 echo '</td>
											   <tr>';
											   
											   }
}else if ($_GET["asal"]=="online"){
echo "<div class='container'>
                     <br />  
                          <table class='table table-bordered' id='table_hasil' style='font-size:14px;'>  
                               <tr>  
                                <th>Nama</th>
								<th>Harga CK</th>
								<th>Tokopedia</th>
								<th>Bukalapak</th>
								<th>Lazada</th>
								<th>Action</th>    
                               </tr>"; 
						while($hasil = mysqli_fetch_array($result))  
											   {
										   if($hasil['tokped']==0 or $hasil['tokped']==null){
					$tokped='0 ('.$hasil["datetokped"].')';
					}else{
					$b=$hasil['tokped'];
					//$tokped='<a href="'.$hasil["linktokped"].'" target="_blank">Rp '.$hasil["tokped"].'('.$hasil["datetokped"].')</a>';
					$tokped='<a href="#" target="_blank">Rp '.$hasil["tokped"].'('.$hasil["datetokped"].')</a>';
					}
					if($hasil['bl']==0 or $hasil['bl']==null){
					
					$bl='0 ('.$hasil["datebl"].')';
					}else{
					$c=$hasil['bl'];
					$bl='<a href="'.$hasil["linkbl"].'" target="_blank">Rp '.$hasil["bl"].'('.$hasil["datebl"].')</a>';
					}
					if($hasil['lazada']==0 or $hasil['lazada']==null){
					$lazada='0 ('.$hasil["datelazada"].')';
					}else{
					$lazada='<a href="'.$hasil["linklazada"].'" target="_blank">Rp '.$hasil["lazada"].'('.$hasil["datelazada"].')</a>';
					$d=$hasil['lazada'];
					};
					
					if($hasil['status']== "Termurah"){
						$style='black';
					}else{
						$style='red';
					};
					
					
				echo '<tr style="color:'.$style.'">
					<td>'.$hasil["nama"].'</td>		
					 <td>Rp '.$hasil["ck"].'('.$hasil["dateck"].')</td>
					 <td>'.$tokped.'</td>
					 <td>'.$bl.'</td>
					 <td>'.$lazada.'</td>
					<td><div class="col-sm-5" ><input type="button" style="font-size:14px;display:'.$array['ol_e'].'" name="edit" value="'.$hasil["status"].'" id="'.$hasil["id"].'" class="btn btn-primary edit_data" /></div>'
					?>
					<div class='col-sm-5'><a href='delete.php?&_id=<?php echo  $hasil['id']; ?>&perihal=harga&asal=online&search=<?php echo $_GET['search']?>&cari=<?php echo $_GET['cari'] ?>&page=<?php echo $halaman?>' class='btn btn-danger' style='font-size:14px;display:<?php echo $array["ol_e"]?>'>Delete</a></div>
					</td></tr>
					<?php
					
					;
						
						}
echo " </table>
 
 </div>";
}else{
header("location:../logout");
}
 ?>
 
  <center><ul class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li><a href="cari?page=1&cari=<?php echo $cari ?>&search=<?php echo $search ?>&asal=<?php echo $asal ?>">First</a></li>
          <li><a href="cari?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <!-- LINK NUMBER -->
        <?php
		$sql2="SELECT * FROM harga where ".$cari." like '%".$search."%'";
		$result1=mysqli_query($conn,$sql2);
		$get_jumlah=mysqli_num_rows($result1);
        
        $jumlah_page = ceil($get_jumlah/$limit); // Hitung jumlah halamannya
        $jumlah_number = 5; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li <?php echo $link_active; ?>><a href="cari?page=<?php echo $i; ?>&cari=<?php echo $cari ?>&search=<?php echo $search ?>&asal=<?php echo $asal ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        
        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($page == $jumlah_page){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li><a href="cari?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="cari?page=<?php echo $jumlah_page; ?>&cari=<?php echo $cari ?>&search=<?php echo $search ?>&asal=<?php echo $asal ?>">Last</a></li>
        <?php
        }
        ?>
      </ul></center>
	 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog modal-lg">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"><center><span id='nama' name='nama'></span></center></h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                             <div class="modal-body">
			<?php
			if($asal=='harga'){
			echo "
			<div class='row'>
				<div class='col-sm-6'>
				<h4>Harga</h4>
				</div>
				<div class='col-sm-6'>
				<h4>User</h4>
				</div>
				<br></br>
				<div class='col-sm-6'>
				 Presmi : <input type='text' name='presmi' id='presmi'  onkeyup='formatangka(this)' required>
				</div>
				<div class='col-sm-6'>
				 <span name='userpresmi' id='userpresmi'></span>
				</div>
				<br></br>
				<div class='col-sm-6'>
				 Netto CK : <input type='text' name='ck' id='ck' onkeyup='formatangka(this)' required>
				</div>
				<div class='col-sm-6'>
				<span name='userck' id='userck'> </span>
				</div>
				<br></br>
				<div class='col-sm-6'>
				 JualCK : <input type='text' name='jualck' id='jualck' onkeyup='formatangka(this)'>
				</div>
				<div class='col-sm-6'>
				<span name='userjualck' id='userjualck'></span>
				</div>
				<br></br>
				<input type='hidden' name='hasil_id' id='hasil_id'>			
				<input type='hidden' name='user' id='user'>
				<input type='hidden' name='halaman' id='halaman'>
				<input type='hidden' name='cari' id='cari'>
				<input type='hidden' name='search' id='search'>
				<input type='hidden' name='type' id='type'>
			</div>
		</div>";
			}elseif($asal="online"){
			echo"
			<div class='row'>
				<div class='col-sm-2'>
				<b>Asal</b>
				</div>
				<div class='col-sm-3'>
				<b>Harga</b>
				</div>
				<div class='col-sm-3'>
				<b>Link</b>
				</div>
				<div class='col-sm-2'>
				<b>Toko</b>
				</div>
				<div class='col-sm-2'>
				<b>User</b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				Harga Pabrik
				</div>
				<div class='col-sm-3'>
				<input type='text' name='presmi'  onkeyup='formatangka(this)' id='presmi' required>
				</div>
				<div class='col-sm-3'>
				
				</div>
				<div class='col-sm-2'>
				
				</div>
				<div class='col-sm-2'>
				<b><span id='userpresmi'></span></b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				CK
				</div>
				<div class='col-sm-3'>
				<input type='text' name='ck'  onkeyup='formatangka(this)' id='ck' required>
				</div>
				<div class='col-sm-3'>
				
				</div>
				<div class='col-sm-2'>
				
				</div>
				<div class='col-sm-2'>
				<b><span id='userck'></span></b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				Tokopedia
				</div>
				<div class='col-sm-3'>
				<input type='text' name='tokped' onkeyup='formatangka(this)' id='tokped' required>
				</div>
				<div class='col-sm-3'>
				<input type='text' name='linktokped' id='linktokped' required>
				</div>
				<div class='col-sm-2'>
				<input type='text'name='tokotokped' id='tokotokped' style='width:140px' required>
				</div>
				<div class='col-sm-2'>
				<b><span id='usertok'></span></b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				Bukalapak
				</div>
				<div class='col-sm-3'>
				<input type='text' name='bl' onkeyup='formatangka(this)' id='bl' required>
				</div>
				<div class='col-sm-3'>
				<input type='text' name='linkbl' id='linkbl' required>
				</div>
				<div class='col-sm-2'>
				<input  type='text'name='tokobl' id='tokobl'  style='width:140px' required>
				</div>
				<div class='col-sm-2'>
				<b><span id='userbl'></span></b>
				</div>
				<br><br>
				<div class='col-sm-2'>
				Lazada
				</div>
				<div class='col-sm-3'>
				<input type='text' name='lazada' onkeyup='formatangka(this)' id='lazada' required>
				</div>
				<div class='col-sm-3'>
				<input type='text' name='linklazada' id='linklazada' required>
				</div>
				<div class='col-sm-2'>
				<input  type='text'name='tokolazada' id='tokolazada' style='width:140px' required>
				</div>
				<div class='col-sm-2'>
				<b><span id='userlazada'></span></b>
				</div>
				<input type='hidden' name='hasil_id' id='hasil_id'>			
				<input type='hidden' name='user' id='user'>
				<input type='hidden' name='halaman' id='halaman'>
				<input type='hidden' name='cari' id='cari'>
				<input type='hidden' name='search' id='search'>
				<input type='hidden' name='type' id='type'>
			</div>
			
			";	
			}
			?>
                </div>  
                <div class="modal-footer">
				<input type="submit" name="insert" id="insert" value="Simpan" class="btn btn-success" />
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div> 
				</form>  				
           </div>  
      </div>  
 </div>
 <?php
 if($asal=='harga'){
	 $link='../admin/insert.php';
 }else if($asal=='online'){
	 $link='update.php';
 }
 ?>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var hasil_id = $(this).attr("id"); 
           $.ajax({  
                url:"query.php",  
                method:"POST",  
                data:{hasil_id:hasil_id,lokasi:"harga"},  
                dataType:"json",  
                success:function(data){  
                     $('#nama').text(data.nama);  
                     $('#presmi').val(data.presmi);  
                     $('#userpresmi').text(data.userpresmi); 
					 $('#ck').val(data.ck);
					 $('#userck').text(data.userck);
					  $('#jualck').val(data.jualck);
					  $('#userjualck').text(data.userjualck);
					 $('#tokped').val(data.tokped);
					 $('#linktokped').val(data.linktokped);
					 $('#tokotokped').val(data.tokotokped);
					 $('#usertok').text(data.usertok);
					 $('#bl').val(data.bl);
					 $('#linkbl').val(data.linkbl);
					 $('#tokobl').val(data.tokobl);
					 $('#userbl').text(data.userbl);
                     $('#lazada').val(data.lazada);
					 $('#linklazada').val(data.linklazada);
					 $('#tokolazada').val(data.tokolazada);
					 $('#userlazada').text(data.userlazada);
					 $('#hasil_id').val(data.id);
					 $('#cari').val("<?php echo $cari ?>");
					 $('#user').val("<?php echo $_SESSION['username']?>");
					 $('#halaman').val("<?php echo $halaman?>");
					 $('#search').val("<?php echo $search?>");
					 $('#type').val("cari");
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  

           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo $link ?>",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Simpan");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#table_hasil').html(data);  
                     }  
                });  
           }  
      });   
 });  
 </script>

