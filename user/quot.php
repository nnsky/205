<html>
<?php
include 'menu.php';
if(empty($_SESSION['level'])){
	header("location:../logout.php");
}elseif($_SESSION['level']=="user" && $_SESSION['status']=='aktif' && $array['pnj_v']=='block'){

}else{
		header("location:../logout.php");	
	}
$lokasi=$_SESSION["lokasi"];	
$tanggal=date('Ymd');
$cari="select *from urut where tanggal='$tanggal' && lokasi='$lokasi' order by id desc";
$cek=mysqli_query($conn,$cari);
$arr=mysqli_fetch_array($cek);

if($arr['nomor']==null){
	
	$no=1;
}else{
	$no=$arr['nomor']+1;
	
}
?>
<head>

	<meta CHarset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quotation</title>
	<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
	<link rel="stylesheet" href="../css/tablejquery.css">
<script src="../asset/tablejquery.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
   <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> 
<script>
     $(function () {
        $('#datetimepicker1').datepicker({
			dateFormat: 'mm/dd/yy'
            });
        });
	  $(function () {
         $('#datetimepicker2').datepicker({
			dateFormat: 'mm/dd/yy'
            });
        });	
  function validangka(a)
{
	if(!/^[0-9 /]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}
$(document).ready(function() {
    $('#example').DataTable( {
    
    } );
} );

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
    function showinput(){
        getSelectValue = document.getElementById("ppn").value;
        if(getSelectValue == "ya"){
            document.getElementById("total").style.display="block";
            document.getElementById("info").style.display="block";
        }else{
            document.getElementById("total").style.display="none";
			document.getElementById("info").style.display="none";
        }
    }
	
    $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".hapus",function(){ 
          $(this).parents(".control-group").remove();
      });


    });

    $(document).ready(function() {


      $(".addterm").click(function(){ 
          var html = $(".cabang").html();
          $(".form-awal").after(html);
      });


      $("body").on("click",".hilang",function(){ 
          $(this).parents(".control-group").remove();
      });


    });	
</script>
</head>
<body>
<div class='col-sm-1'><button style="display:<?php echo $array['pnj_i'] ?>" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Buat</button></div>
<div class='col-sm-1'></div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">QUOTATION</h4>
        </div>
        <div class="modal-body controls test">
         <form action="buat" method="POST">
          <div class="form-group">
			<div class="col-sm-6">
		   <label for="recipient-name" class="col-form-label">Tanggal</label>
            <input id="datetimepicker1" type="text" class="form-control" name="tanggal" autocomplete="off" required>
			</div>
			<div class="col-sm-6">
            <label for="recipient-name" class="col-form-label">Quote#</label>
            <input type="text" class="form-control" name="quote" value="<?php echo $_SESSION["lokasi"].'/'.$tanggal.'/00'.$no?>" readonly required>
			</div>
          </div>
		  <div class="form-group">
			<div class="col-sm-6">
			 <label for="recipient-name" class="col-form-label">Masa Berlaku </label>
            <input id="datetimepicker2" type="text" class="form-control" name="berlaku" autocomplete="off" required>
			</div>
			<div class="col-sm-6">
            <label for="recipient-name" class="col-form-label">ID Konsumen </label>
            <input type="text" class="form-control" name="customer" value="<?php echo $_SESSION['lokasi'].'0'.$no?>" required>
          </div>
		  </div>
		  <div style="clear:both"></div>
			<center><h4>Data Konsumen</h4></center>
		  	 <div class="form-group">
				<label for="recipient-name" class="col-form-label">Nama Konsumen </label><br>
				<div class="col-sm-3">
				<select class="form-control" name="gelar">
				<option name="Bpk">Bpk</option>
				<option name="Ibu">Ibu</option>
				<option name="Sdr">Sdr</option>
				<option name="Sdri">Sdri</option>
				</select>
				</div>
				<div class="col-sm-9">
				<input type="text" class="form-control" name="nama" autocomplete="off" >
				</div>
          </div>
		  	<div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Perusahaan </label>
            <input type="text" class="form-control" name="perusahaan" autocomplete="off">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" autocomplete="off">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Kode Pos & No Telp </label><br>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="pos" placeholder="Kode Pos">
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control"  name="telp" onkeyup="validangka(this)" placeholder="No Telp">
				</div>
			</div>
			 <div style="clear:both"></div>
			<center><h4>Data Pembelian</h4></center>
			<div class="form-group">
			<label for="recipient-name" class="col-form-label">Apakah PPN ditampilkan?</label>
			<select id="ppn" name="ppn" class="form-control" onchange="showinput()">
			   <option value="tidak">Tidak</option>
			   <option value ="ya">Ya</option>
			</select>
					<div id="total" style="display: none;">
					<input type="text" class="form-control" name="total" placeholder="Total PPN" onkeyup="formatangka(this)">
					</div>		
			</div>
		  <div class="form-group col-sm-6">
			 <label for="recipient-name" class="col-form-label">User </label>
			 <input type="text" class="form-control" name="user" value="<?php echo $_SESSION['username'] ?>" readonly required>
          </div>
		 <div class="form-group col-sm-6">
			 <label for="recipient-name" class="col-form-label">Nama Sales </label>
			 <input type="text" class="form-control" name="sales" required>
          </div>
		  <div class="form-group col-sm-4">
			 <label for="recipient-name" class="col-form-label">Nama Bank </label>
			 <input type="text" class="form-control" name="bank" required>
          </div>
		  <div class="form-group col-sm-4">
			 <label for="recipient-name" class="col-form-label">Nomor Rekening </label>
			 <input type="number" class="form-control" name="norek"required>
          </div>
		 <div class="form-group col-sm-4">
			 <label for="recipient-name" class="col-form-label">Atas Nama </label>
			 <input type="text" class="form-control" name="an" required>
          </div>
			<div class="form-group control-group form-awal">
				<label for="recipient-name" class="col-form-label">Terms & Conditions Tambahan</label>
					<input type="text" class="form-control" name="terms[]">	       
			</div>
			<div class="input-group-btn" style="margin-top:10px">
				<button class="btn btn-success addterm" type="button"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
			</div>	
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Note Sales</label>
					<textarea class="form-control" rows="5" name="note"></textarea>
			</div>
			<div class="form-group">
				<div id="info" style="display: none;">
					<span style="color:red">Harga yang di masukan adalah harga sebelum PPN</span>
				</div>
			<label for="recipient-name" class="col-form-label">Deskripsi Barang | Jumlah | Harga</label>
                
		<div class="input-group control-group after-add-more">
			<div class="col-sm-6">
				<input type="text" class="form-control" name="desk[]" placeholder="Deksripsi Barang" required>
			</div>
			<div class="col-sm-2">
				<input type="text" class="form-control" onkeyup="validangka(this)" name="jumlah[]" placeholder="QTY" required>
			</div>
			<div class="col-sm-3">
				<input type="text" class="form-control" onkeyup="formatangka(this)" name="harga[]" placeholder="Harga (RP)" required>
			</div>
          <div class="col-sm-1 input-group-btn"> 
            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
          </div>
        </div>			
			</div>
		</div>
		<div class="form-group col-sm-12">
			 <label for="recipient-name" class="col-form-label">Total Diskon Yang Diberikan (Rp)</label>
			 <input type="text" class="form-control" onkeyup="formatangka(this)" name="diskon" placeholder="Total Diskon" value="0" required>
			</div>
        <div class="modal-footer">
			<input type="hidden" value="quot" name="perihal">
			<input type="hidden" value="<?php echo $_SESSION['lokasi']?>" name="lokasi">
			<input type="hidden" value="<?php echo $no?>" name="nomor">
          <button class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		 </form>
      </div>
      
    </div>
  </div>
  		 <div class="cabang hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="text" class="form-control" name="terms[]">	
            <div class="input-group-btn"> 
              <button class="btn btn-danger hilang" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
            </div>
          </div>
        </div>
        <div class="copy hide">
          <div class="control-group input-group" style="margin-top:10px">
   			<div class="col-sm-6">
				<input type="text" class="form-control" name="desk[]" placeholder="Deksripsi Barang" required>
			</div>
			<div class="col-sm-2">
				<input type="text" class="form-control" onkeyup="validangka(this)" name="jumlah[]" placeholder="QTY" required>
			</div>
			<div class="col-sm-3">
				<input type="text" class="form-control" onkeyup="formatangka(this)" name="harga[]" placeholder="Harga (RP)" required>
			</div>
            <div class="col-sm-1 input-group-btn"> 
              <button class="btn btn-danger hapus" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
            </div>
          </div>
        </div>
 <div class="panel panel-default">
                        <div class="panel-body">
                                    <table id="lookup" class="table table-bordered">  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
								<th>Tanggal</th>
								<th>Quote</th>
								<th>Costumer ID</th>
								<th>Nama</th>
								<th>Berlaku</th>
								<th>Action</th>
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
</body>
        <script src="../asset/jquery.dataTables.js"></script>
        <script src="../asset/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"quoti.php", // json datasource
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
</html>




