<?php
//load the database configuration file
include 'koneksi.php';

if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
                // $prevQuery = "SELECT *FROM asales where tglkonfrim='".$line[0]."' && nama='".$line[3]."'"; 
		 // $prevQuery = "SELECT *FROM ketupat where seri='".$line[3]."'";
                 // $prevQuery = "SELECT *FROM voucherck where seri='".$line[1]."'";                
                $prevQuery = "SELECT * FROM voucher where seri='".$line[0]."' && status='".$line[2]."'";  
                //$prevQuery = "SELECT * FROM voucher where seri='".$line[0]."'";  
				//$prevQuery = "SELECT * FROM stangpao where jenis='".$line[0]."' && seri='".$line[1]."'";  
		$prevResult = $db->query($prevQuery);
                if($prevResult->num_rows > 0){
				//kalau ada yang sama maka akan di update isi kontennya
				//$db->query("UPDATE harga SET tokped ='".$line[1]."',disctok ='".$line[2]."',disctok ='".$line[3]."',bl ='".$line[4]."',discbl ='".$line[5]."',tokobl ='".$line[6]."',lazada ='".$line[7]."',disclazada ='".$line[8]."',tokolazada ='".$line[9]."',status ='".$line[10]."' WHERE id = '".$line[0]."'");
    				//$db->query("update voucher set status='".$line[1]."' where seri = '".$line[0]."'");
				//userjualck='".$line[20]."',datejualck'".$line[21]."',datepresmi='".$line[22]."',status='".$line[23]."',disctok='".$line[24]."',discbl='".$line[25]."',disclazada='".$line[26]."',tokotokped='".$line[27]."',tokobl='".$line[28]."',tokolazada='".$line[29]."'");
			        // $db->query("Delete from voucher where seri='".line[4]."'");               
       				//$db->query("UPDATE voucher set voucher='".$line[0]."',lokasi='".$line[1]."',exp='".$line[2]."',expv='".$line[7]."' where seri='".$line[4]."'");
				//$db->query("update voucher set voucher='".$line[0]."',lokasi='".$line[1]."',exp='".$line[2]."',status='".$line[3]."',expv='".$line[5]."' where seri = '".$line[4]."'");  
				//$db->query("update voucher set lokasi='".$line[1]."' where seri='".$line[0]."'");
				//$db->query("update voucherck set voucher='".$line[0]."' where seri='".$line[1]."' "); 
				//$db->query("update voucher set expv='".$line[1]."'  where seri='".$line[0]."'");
				//$db->query("delete from voucher where seri='".$line[0]."'");
				//$db->query("update voucher set expv='20190830' where seri='".$line[0]."'");
}else{
                    //insert member data into database
                   //(masalah di link tokped,bl,lazada, dan discbl) 
				  //$db->query("INSERT INTO harga (nama,ck,tokped,linktokped,bl,linkbl,lazada,linklazada,dateck,datetokped,datebl,datelazada,userck,usertok,userbl,userlazada,presmi,jualck,userpresmi,userjualck,datejualck,datepresmi,status,disctok,discbl,disclazada,tokotokped,tokobl,tokolazada) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."','".$line[12]."','".$line[13]."','".$line[14]."','".$line[15]."','".$line[16]."','".$line[17]."','".$line[18]."','".$line[19]."','".$line[20]."','".$line[21]."','".$line[22]."','".$line[23]."','".$line[24]."','".$line[25]."','".$line[26]."','".$line[27]."','".$line[28]."')");
				  //$db->query("INSERT INTO akun(id,username,password,level,lokasi,status,login) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."')");
				 // $db->query("INSERT INTO lelang(id,nama,email,hp,rek,kadarluasa,ikut,alamat,dtgck,daftar,datang,kode,status,petugas,Peserta) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."','".$line[12]."','".$line[13]."','".$line[14]."')");
					//$db->query("INSERT INTO springbed (id,brand,nama) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."')");
				//$db->query("INSERT INTO voucher (voucher,lokasi,exp,status,seri,statvoucher,user,expv) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."')");
					//$db->query("insert into voucherck (voucher,seri,nama,nota,total,potongan,user,lokasi,date,dateup,minggu) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."')");
					//$db->query("INSERT INTO members (name, email, phone, created, modified, status) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[3]."','".$line[4]."')");
                    //$db->query("INSERT INTO ref (id,nama,harga) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."')");
					//$db->query("insert into quote (id,tanggal,quote,customer,nama,perusahaan,alamat,pos,telp,ppn,desk,jumlah,harga,diskon,exp,berlaku,user,note,sales,term,bank,lokasi) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."','".$line[12]."','".$line[13]."','".$line[14]."','".$line[15]."','".$line[16]."','".$line[17]."','".$line[18]."','".$line[19]."','".$line[20]."','".$line[21]."')");
					//$db->query("insert into dbkupon (paket,kdpkt,status,tanggal,lokasi,user) value ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."')");
                			//$db->query("insert into dbvoucher(paket,seri,brand,jumlah,lokasi,status,tanggal,user) value ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."')");
					//$db->query("insert into ketupat (voucher,lokasi,jenis,seri,user,tanggal,status) value ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."')");
                       			 //$db->query("INSERT INTO lelang(nama,nik,email,hp,status,alamat,petugas,Peserta) VALUES ('".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','David','Jilid 7')");
						//$cek="select CM from noas";
						//$que=mysqli_query($db,$cek);
						//$arr=mysqli_fetch_array($que);
						//if($arr['CM']==0){
						//$ticketid='CM01';
						//$db->query("update noas set CM='01' where id=1");
						//}else{
						//$angka=$arr['CM']+1;
						//$ticketid="CM".$angka;
						//$db->query("update noas set CM='$angka' where id=1");
						//}
						//$db->query("insert into asales (tglkonfrim,tglorder,nota,nama,tglkirim,pengiriman,sales,status,brand,type,jenis,feedback,sfeed,ticketid,lokasi,user) value ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."','".$line[12]."','".$ticketid."','CM','Tim CM')");
						$db->query("insert into audit (seri,lokasi) VALUES ('".$line[0]."','".$line[1]."')");
						//echo '1 ';	
						//$db->query("insert into stangpao (jenis,seri,lokasi,status,user) value ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','0575dav')");
	}
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
//header("Location: index.php".$qstring);



