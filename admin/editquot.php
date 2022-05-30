<html>
<head>
<title>Edit</title>
<?php
include "menu.php";
?>

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
        if(getSelectValue == "tidak"){
            document.getElementById("total").style.display="none";
        }else{
            document.getElementById("total").style.display="block";
        }
    }

$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});


$(document).ready(function() {
var max_fields = 3; //maximum input boxes allowed
var wrapper = $(".items"); //Fields wrapper
var add_button = $(".add_field_button"); //Add button ID
 
var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<br><input type="text" class="form-control" name="term[]">'); //add input box
}
});
 
$(wrapper).on("click",".remove_field", function(e){ //user click on remove field
e.preventDefault(); $(this).parents('div').remove(); x--;
})
});
</script>
</head>
<body>
<?php
$get=$_GET["id"];

$select="select *from quote where id='$get'";
$query=mysqli_query($conn,$select);
$array=mysqli_fetch_array($query);


?>
<center><h3>Quotation</h3></center>
<div class="container controls">
<form action="cekedit" method="post">
	<div class="row">
		<div class="col-sm-6">
		<label>Tanggal</label>
		<input type="text" name="tanggal" class="form-control" id="datetimepicker1" value="<?php echo $array['tanggal']?>">
		</div>
		<div class="col-sm-6">
		<label>Quote</label>
		<input type="text" name="quote" class="form-control" value="<?php echo $array['quote'] ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
		<label>Masa Berlaku</label>
		<input type="text" name="berlaku" class="form-control" id="datetimepicker2" value="<?php echo $array['berlaku']?>">
		</div>
		<div class="col-sm-6">
		<label>Id Konsumen</label>
		<input type="text" name="customer" class="form-control" value="<?php echo $array['customer'] ?>">
		</div>
	</div>
	<center><h4>Data Konsumen</h4></center>
	<div class="row">
		<div class="col-sm-4">
		<label>Nama Konsumen</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $array['nama']?>">
		</div>
		<div class="col-sm-6">
		<label>Nama Perusahaan</label>
		<input type="text" name="perusahaan" class="form-control" value="<?php echo $array['perusahaan'] ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
		<label>Alamat</label>
		<input type="text" name="alamat" class="form-control" value="<?php echo $array['alamat']?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
		<label>Kode Pos</label>
		<input type="text" name="pos" class="form-control" value="<?php echo $array['pos']?>">
		</div>
		<div class="col-sm-6">
		<label>Telp</label>
		<input type="text" name="telp" class="form-control" value="<?php echo $array['telp'] ?>">
		</div>
	</div>
	<center><h4>Pembelian</h4></center>
	<div class="row">
		<div class="col-sm-12">
		<label>Ppn</label>
		<?php
		if($array["ppn"]=="tidak"){
		$total='display:none';
		$value='';
		echo "
		<select id='ppn' name='ppn' class='form-control' onchange='showinput()'>
		<option value='tidak'>tidak</option>
		<option value='ya'>Ya</option>
		</select>
		";
		}else{
		$total='display:block';
		$value=$array['ppn'];
			echo "
		<select id='ppn' name='ppn' class='form-control' onchange='showinput()'>
		<option value='ya'>Ya</option>
		<option value='tidak'>tidak</option>
		</select>
		";
		}
		?>
		</div>
	</div>
		<div id="total" style="<?php echo $total ?>" class='col-sm-12'>
	<input type="text" class="form-control" name="total" placeholder="Total PPN" value='<?php echo $value ?>' onkeyup="formatangka(this)">
	</div>
	<div class="row">
		<div class="col-sm-6">
		<label>User</label>
		<input type="text" name="user" class="form-control" value="<?php echo $array['user'] ?>" readonly>
		</div>
		<div class="col-sm-6">
		<label>sales</label>
		<input type="text" name="sales" class="form-control" value="<?php echo $array['sales'] ?>">
		</div>
	</div>
	<div class="row">
			<label>Akun Bank</label>
		<input type="text" name="bank" class="form-control" value="<?php echo $array['bank'] ?>" >
	</div>
	<div class="form-group items">
				<label for="recipient-name" class="col-form-label">Terms & Condition</label>
					<?php
					
					
					if($array["term"]==null){
						echo '<textarea class="form-control" rows="5" name="term[]"></textarea>';
					}else{
					$g=explode("^",$array["term"]);
					$h=count($g);
					
					for($i=1;$i<$h;$i++){
						echo'
						<div class="entry input-group">
			<textarea class="form-control" name="term[]" rows="3">'.$g[$i-1].'</textarea>
						<span class="input-group-btn">
								<button class="btn btn-danger btn-remove" type="button">
									<span class="glyphicon glyphicon-minus"></span>
								</button></span>
								</div>
						';
					}
					}
					?>
			</div>
			<br>
			<button type="button" class="add_field_button">Tambah</button>
	<div class="form-group">
				<label for="recipient-name" class="col-form-label">Note Sales</label>
					<textarea class="form-control" rows="5" name="note" value="<?php $array['note']?>"></textarea>
			</div>
	<div class="row">
	<label for="recipient-name" class="col-form-label">Deskripsi Barang | Jumlah | Harga | Diskon</label>
	<div class="form-group ">
					<?php
					$a=explode(",",$array["desk"]);
					$b=explode(",",$array["jumlah"]);
					$c=explode(",",$array["harga"]);
					$f=explode(",",$array["diskon"]);
					$e=count ($a);
					
					for($s=1;$s<$e;$s++){
					echo '
					<div class="entry input-group col-sm-12">
					<div class="col-sm-5">
						<input type="text" class="form-control" name="desk[]" placeholder="Deksripsi Barang" value ="'.$a[$s-1].'" required>
					</div>
					<div class="col-sm-2">
						<input type="text" class="form-control" onkeyup="validangka(this)" name="jumlah[]" value="'.$b[$s-1].'" placeholder="QTY" required>
						</div>	
					<div class="col-sm-2">
						<input type="text" class="form-control" onkeyup="formatangka(this)" name="harga[]" value="'.number_format($c[$s-1],0,'','.').'" placeholder="Harga (RP)" required>
						</div>
						<div class="col-sm-2">
						<input type="text" class="form-control" name="diskon[]" value="'.$f[$s-1].'" placeholder="Diskon (%)" required>
						</div>
					<div class="col-sm-1">
						<span class="input-group-btn">
								<button class="btn btn-danger btn-remove" type="button">
									<span class="glyphicon glyphicon-minus"></span>
								</button></span>
						</div>
					</div>
					';	
						
					}
					?>
				</div>
	</div>
	<center><h4>Jika Ingin Menambahkan list Barang</h4></center>
	<div class="row">
					<div class="entry input-group col-sm-12">
						<div class="col-sm-6">
						<input type="text" class="form-control" name="desk1[]" placeholder="Deksripsi Barang">
						</div>
						<div class="col-sm-1">
						<input type="text" class="form-control" onkeyup="validangka(this)" name="jumlah1[]" placeholder="QTY">
						</div>
						<div class="col-sm-2">
						<input type="text" class="form-control" onkeyup="formatangka(this)" name="harga1[]" placeholder="Harga (RP)">
						</div>
						<div class="col-sm-2">
						<input type="text" class="form-control" name="diskon1[]" placeholder="Diskon (%)">
						</div>
						<div class="col-sm-1">
						<span class="input-group-btn">
								<button class="btn btn-success btn-add" type="button">
									<span class="glyphicon glyphicon-plus"></span>
								</button></span>
						</div>
					</div>
				</div>
	</div>
</div>
	        <div class="modal-footer">
			<input type="hidden" value="quot" name="tgpan">
			<input type="hidden" value="<?php echo $array["id"] ?>" name="id">
          <button class="btn btn-primary">Simpan</button>
          <a href="quot" class="btn btn-default">Kembali</a>
          <a href="#mydelete" class="btn btn-danger" data-toggle="modal">Hapus</a>
        </div>
</form>

<div id="mydelete" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">			
				<h4 class="modal-title">Anda Yakin Mengahapus ini ?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Data tidak dapat di kembalikan jika sudah di hapus</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<a href="delete?&_id=<?php echo $get ?>&perihal=quot&asal=qout" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</div>
</div> 
    
</body>
</html>

