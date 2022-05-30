<link rel='stylesheet' href='../css/bootstrap.min.css'>
	<script src='../asset/jquery.min.js'></script>
	<script src='../asset/bootstrap.min.js'></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
   <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> 
<script>
     $(function () {
        $('#date').datepicker({
			dateFormat: 'dd MM yy'
            });
        });
</script>
<?php
include "menu.php";
include "../koneksikupon.php";

$nama=$_GET['id'];
$cari=mysqli_query($conn,"select *from kupon where nama='$nama'");

if($cari->num_rows<=0){
    echo '<script>alert("GAGAL. Kupon Tidak Terdeteksi")</script>
	<script>setTimeout(function(){location.href="dkupon"},1)</script>';
}else{
    $hasil=mysqli_fetch_array($cari);

    echo "
    <center>
    <h3>".$hasil['nama']."</h3>
    </center>
    <br>

    <form action='dkupon_edit_proses' method='POST'> 
    <div class='container'>      
        <div class='col-sm-3'>
        <label>Nama Kupon</label>
        <input type='text' name='nama' class='form-control' value='".$hasil['nama']."'>
        </div>

        <div class='col-sm-3'>
        <label>Stock Kupon</label>
        <input type='text' name='stock' class='form-control' value='".$hasil['stock']."'>
        </div>

        <div class='col-sm-3'>
        <label>Penggunaan</label>
        <input type='text' name='pakai' class='form-control' value='".$hasil['pakai']."'>
        </div>

        <div class='col-sm-3'>
        <label>Kadarluasa</label>
        <input type='text' id='date' name='date' class='form-control' value='".$hasil['exp']."'>
        <br>
        <input type='hidden' name='id' value='".$hasil['id']."'>
        <button class='btn btn-primary' type='submit'>Confirm</button>
        <a href='dkupon' class='btn btn-success'>Kembali</a>
        </div>
 
    </div>
    
    </form>
    ";
}

?>
	
